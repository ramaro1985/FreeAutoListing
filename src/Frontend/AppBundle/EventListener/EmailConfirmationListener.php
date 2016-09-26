<?php
namespace Frontend\AppBundle\EventListener;

use FOS\UserBundle\EventListener\EmailConfirmationListener as FOSEmailConfirmationListener;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Mailer\MailerInterface;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EmailConfirmationListener extends FOSEmailConfirmationListener
{
    private $mailer;
    private $tokenGenerator;
    private $router;
    private $session;

    public function __construct(MailerInterface $mailer, TokenGeneratorInterface $tokenGenerator, UrlGeneratorInterface $router, SessionInterface $session)
    {
        $this->mailer = $mailer;
        $this->tokenGenerator = $tokenGenerator;
        $this->router = $router;
        $this->session = $session;
    }
    
    public function onResendConfirm(GetResponseUserEvent $event)
    {

        /** @var $user \FOS\UserBundle\Model\UserInterface */
        $user = $event->getUser();

        $user->setEnabled(false);
        if (null === $user->getConfirmationToken()) {
            $user->setConfirmationToken($this->tokenGenerator->generateToken());
        }

        $this->mailer->sendConfirmationEmailMessage($user);
        $this->session->set('fos_user_send_confirmation_email/email', $user->getEmail());

        $url = $this->router->generate('fos_user_registration_check_email');
        $event->setResponse(new RedirectResponse($url));        
        
    }    
}