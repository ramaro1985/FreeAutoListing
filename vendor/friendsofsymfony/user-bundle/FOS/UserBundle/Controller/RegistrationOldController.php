<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

/**
 * Controller managing the registration
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class RegistrationController extends ContainerAware
{

    public function registerAction(Request $request)
    {
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');

        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $user = $userManager->createUser();
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('registration');
        $user->setConfirmationToken($csrfToken);
        // $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();
        $form->setData($user);

        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
                $user->setIpAddress($ip_addr);
                $user->setDateCreated(new \DateTime);
                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    //$url = $this->container->get('router')->generate('fos_user_registration_confirmed');
                    $url = $this->container->get('router')->generate('fos_user_registration_check_email', array('user' => $user));
                    //fos_user_registration_check_email       
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }
        }
        // $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('registration');
        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.' . $this->getEngine(), array(
            'form' => $form->createView(),
            'csrf_token' => $csrfToken,
        ));
    }

    /**
     * Tell the user to check his email provider
     */
//--------------------------------------------------------------------------------------------------------------------------------------------
    public function checkEmailAction($user)
    {
        $user = $this->container->get('fos_user.user_manager')->findUserByUsernameOrEmail($user);
        $email = $user->getEmail();
        $email = $this->container->get('session')->get('fos_user_send_confirmation_email/email');
        $this->container->get('session')->remove('fos_user_send_confirmation_email/email');
        $user = $this->container->get('fos_user.user_manager')->findUserByEmail($email);
        $email = $this->get('session')->get('fos_user_send_confirmation_email/email');


        $this->get('session')->remove('fos_user_send_confirmation_email/email');

        $user = $this->get('fos_user.user_manager')->findUserByEmail($email);

        $user = array('name' => "pepe", 'email' => "pepe@yahoo.es");
        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with email "%s" does not exist', $email));
        }

        $this->sendEmailAction($user->getEmail());
        $this->sendEmailAdminAction($user->getEmail(), 'admin@homeescape.com');

        $this->container->get('fos_user.mailer')->sendResettingEmailMessage($user);
        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:checkEmail.html.' . $this->getEngine(), array(
            'user' => $user,
        ));


    }

    public function sendEmailAction($user)
    {
        $user_obj = $this->container->get('fos_user.user_manager')->findUserByEmail($user);
        $url = $this->container->get('router')->generate('fos_user_registration_confirm', array('token' => $user_obj->getConfirmationToken()), true);
        $message = \Swift_Message::newInstance()
            ->setSubject('Thank you for registering with HomeEscape')
            ->setFrom('registration@homeescape.com', 'Free Auto Listing')
            ->setTo($user)
            ->setBody($this->container->get('templating')->renderResponse('AppBundle:Default:confirmation-mail.html.twig', array(
                'user' => $user_obj,
                'url' => $url
            ))->getContent(), 'text/html');

        $this->container->get('mailer')->send($message);
    }

    public function sendEmailAdminAction($user, $admin)
    {
        $user_obj = $this->container->get('fos_user.user_manager')->findUserByEmail($user);
        $url = $this->container->get('router')->generate('fos_user_registration_confirm', array('token' => $user_obj->getConfirmationToken()), true);
        $message = \Swift_Message::newInstance()
            ->setSubject('New Account Created')
            ->setFrom('registration@homeescape.com', 'Free Auto Listing')
            ->setTo($admin)
            ->setBody($this->container->get('templating')->renderResponse('AppBundle:Default:confirmation-mail.html.twig', array(
                'user' => $user_obj,
                'url' => $url
            ))->getContent(), 'text/html');

        $this->container->get('mailer')->send($message);
    }

//--------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * Receive the confirmation token from user email provider, login the user
     */
    public function confirmAction(Request $request, $token)
    {
        //echo($token);
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $userManager->findUserByConfirmationToken($token);

        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with confirmation token "%s" does not exist', $token));
        }

        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');

        $user->setConfirmationToken(null);
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_CONFIRM, $event);

        $userManager->updateUser($user);

        if (null === $response = $event->getResponse()) {
            $url = $this->container->get('router')->generate('fos_user_registration_confirmed');
            $response = new RedirectResponse($url);
        }

        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_CONFIRMED, new FilterUserResponseEvent($user, $request, $response));

        return $response;
    }

    /**
     * Tell the user his account is now confirmed
     */
    public function confirmedAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:confirmed.html.' . $this->getEngine(), array(
            'user' => $user,
        ));
    }

    protected function getEngine()
    {
        return $this->container->getParameter('fos_user.template.engine');
    }

}
