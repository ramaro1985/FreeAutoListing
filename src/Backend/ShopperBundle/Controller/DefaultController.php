<?php

namespace Backend\ShopperBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Frontend\AppBundle\Form\Type\UserFormType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Frontend\AppBundle\Entity\SavedCars;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Frontend\CommonBundle\Controller\GetPdf;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        if (!$suser || $suser == "anon.") {
            return $this->forward("AppBundle:Default:index");
        }
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $vehicles = $em->getRepository('AppBundle:Vehicle')->findBy(array('full' => true), null, 5, null);
        $dispatcher = $this->container->get('event_dispatcher');

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::CHANGE_PASSWORD_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.change_password.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        $open_modal = false;
        $pass_change = false;
        $edit_profile_succes = false;
        $exist_email = false;
        $edit_user_succes = false;

        if ($request->isMethod('POST')) {

            if ($request->get('cancelAccVal') && $request->get('cancelAccVal') == 'yes') {
                $user->setEnabled(false);
                $em->persist($user);
                $em->flush();

                return $this->redirect(
                    $this->generateUrl('fos_user_security_logout')
                );
            }

            if ($request->get('edit_profile') && $request->get('edit_profile') == 'yes') {


                if ($request->get('email')) {

                    $emailExist = $em->getRepository('AppBundle:User')->findByEmail($request->get('email'));
                    if (!$emailExist) {
                        $user->setUserName($request->get('email'));
                        $user->setEmail($request->get('email'));
                        $exist_email = false;
                        $edit_profile_succes = true;
                        $pass_change = false;
                        $edit_user_succes = false;

                    } else {
                        $exist_email = true;
                        $edit_profile_succes = false;
                        $pass_change = false;
                    }

                } else {
                    if ($request->get('user')['zipCode']) {
                        $user->setZipCode($request->get('user')['zipCode']);

                        $user->setName($request->get('user')['name']);
                        $user->setLastName($request->get('user')['lastName']);
                        $user->setPhone($request->get('user')['phone']);
                        $edit_user_succes = true;

                    } else {
                        $user->setName($request->get('name'));
                        $user->setLastName($request->get('lastname'));
                        $user->setPhone($request->get('phone'));
                        $edit_profile_succes = true;
                    }


                }

                $em->persist($user);
                $em->flush();

            } else {
                $form->bind($request);

                if ($form->isValid()) {

                    $userManager = $this->container->get('fos_user.user_manager');

                    $event = new FormEvent($form, $request);
                    $dispatcher->dispatch(FOSUserEvents::CHANGE_PASSWORD_SUCCESS, $event);

                    $userManager->updateUser($user);

                    if (null === $response = $event->getResponse()) {
                        $url = $this->container->get('router')->generate('fos_user_profile_show');
                        $response = new RedirectResponse($url);
                    }

                    $pass_change = true;
                    $open_modal = false;
                    $edit_user_succes = false;
                    $exist_email = false;
                } else {
                    $pass_change = false;
                    $open_modal = true;
                    $edit_user_succes = false;
                    $exist_email = false;

                }
            }


        }

        //if ($request->get('edit_shopper') && $request->get('edit_shopper') == 'yes') {

        $form1 = $this->createForm(new UserFormType(), $user);

        return $this->render(
            'ShopperBundle:Default:user-account.html.twig',
            array(
                'form' => $form1->createView(),
                'form1' => $form->createView(),
                'form2' => $form1->createView(),
                'form3' => $form->createView(),
                'email' => $user->getEmail(),
                'open_modal' => $open_modal,
                'pass_change' => $pass_change,
                'edit_profile_succes' => $edit_profile_succes,
                'exist_email' => $exist_email,
                'edit_user_succes' => $edit_user_succes,
                'vehiclessaved' => $user->getUsersavedcars(),
                'vehiclesall' => $vehicles,
            )
        );
    }

    public function addCarToUserAction(Request $request)
    {

        try {
            $vehicle_serie = $request->get("serie");
            $em = $this->getDoctrine()->getManager();
            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_serie);
            $suser = $this->get('security.context')->getToken()->getUser();
            $user = $em->getRepository('AppBundle:User')->find($suser->getId());
            $counter = count($user->getUsersavedcars());
            $savedcar = new SavedCars();
            $savedcar->setUser($user);
            $savedcar->setVehicle($vehicle);
            $savedcar->setNotes("No notes where added");
            $user->addSavedCars($savedcar);
            $em->persist($user);
            $em->flush();
            $result = $counter < count($user->getVehiclessaved());
            $response['response'] = $result;
            $response['savedcar_id'] = $savedcar->getId();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
            $response['response'] = false;
            $response['error'] = $ex->getMessage();
        }

        return new JsonResponse($response);
    }

    public function removeCarSavedAction(Request $request)
    {
        try {
            $vehicle_serie = $request->get("serie");
            $em = $this->getDoctrine()->getManager();
            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_serie);
            $savedcar = $em->getRepository('AppBundle:SavedCars')->findOneByVehicle($vehicle->getId());
            $suser = $this->get('security.context')->getToken()->getUser();
            $user = $em->getRepository('AppBundle:User')->find($suser->getId());
            $counter = count($user->getUsersavedcars());
            $user->removeSavedCars($savedcar);
            $em->persist($user);
            $em->flush();
            $result = $counter > count($user->getVehiclessaved());
            $response['response'] = $result;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
            $response['response'] = false;
            $response['error'] = $ex->getMessage();
        }

        return new JsonResponse($response);
    }

    public function updateCarSavedAction(Request $request)
    {
        try {
            $savedcar_id = $request->get("savedcar_id");
            $savedcar_notes = $request->get("savedcar_notes");

            $em = $this->getDoctrine()->getManager();
            $savedcar = $em->getRepository('AppBundle:SavedCars')->find($savedcar_id);
            $savedcar->setNotes($savedcar_notes);

            $em->persist($savedcar);
            $em->flush();
            $response['response'] = true;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
            $response['response'] = false;
            $response['error'] = $ex->getMessage();
        }

        return new JsonResponse($response);
    }

    public function myAccountAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $add = false;

        $breadcrumbs = array(
            array('name' => 'My Account', 'path' => '', 'class' => '')
        );

        $dispatcher = $this->container->get('event_dispatcher');

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::CHANGE_PASSWORD_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.change_password.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        $open_modal = false;
        $pass_change = false;
        $edit_profile_succes = false;
        $exist_email = false;
        $edit_user_succes = false;

        if ($request->isMethod('POST')) {

            if ($request->get('cancelAccVal') && $request->get('cancelAccVal') == 'yes') {
                $user->setEnabled(false);
                $em->persist($user);
                $em->flush();

                return $this->redirect(
                    $this->generateUrl('fos_user_security_logout')
                );
            }

            if ($request->get('edit_profile') && $request->get('edit_profile') == 'yes') {


                if ($request->get('email')) {

                    $emailExist = $em->getRepository('AppBundle:User')->findByEmail($request->get('email'));
                    if (!$emailExist) {
                        $user->setUserName($request->get('email'));
                        $user->setEmail($request->get('email'));
                        $exist_email = false;
                        $edit_profile_succes = true;
                        $pass_change = false;
                        $edit_user_succes = false;

                    } else {
                        $exist_email = true;
                        $edit_profile_succes = false;
                        $pass_change = false;
                    }

                } else {
                    if ($request->get('user')['zipCode']) {
                        $user->setZipCode($request->get('user')['zipCode']);

                        $user->setName($request->get('user')['name']);
                        $user->setLastName($request->get('user')['lastName']);
                        $user->setPhone($request->get('user')['phone']);
                        $edit_user_succes = true;

                    } else {
                        $user->setName($request->get('name'));
                        $user->setLastName($request->get('lastname'));
                        $user->setPhone($request->get('phone'));
                        $edit_profile_succes = true;
                    }


                }

                $em->persist($user);
                $em->flush();

            } else {
                $form->bind($request);

                if ($form->isValid()) {

                    $userManager = $this->container->get('fos_user.user_manager');

                    $event = new FormEvent($form, $request);
                    $dispatcher->dispatch(FOSUserEvents::CHANGE_PASSWORD_SUCCESS, $event);

                    $userManager->updateUser($user);

                    if (null === $response = $event->getResponse()) {
                        $url = $this->container->get('router')->generate('fos_user_profile_show');
                        $response = new RedirectResponse($url);
                    }

                    $pass_change = true;
                    $open_modal = false;
                    $edit_user_succes = false;
                    $exist_email = false;
                } else {
                    $pass_change = false;
                    $open_modal = true;
                    $edit_user_succes = false;
                    $exist_email = false;

                }
            }


        }

        if ($request->get('edit_shopper') && $request->get('edit_shopper') == 'yes') {

            $form1 = $this->createForm(new UserFormType(), $user);

            return $this->render(
                'ShopperBundle:Default:user-account.html.twig',
                array(
                    'name' => $user->getName(),
                    'form' => $form1->createView(),
                    'form1' => $form->createView(),
                    'email' => $user->getEmail(),
                    'open_modal' => $open_modal,
                    'pass_change' => $pass_change,
                    'edit_profile_succes' => $edit_profile_succes,
                    'exist_email' => $exist_email,
                    'edit_user_succes' => $edit_user_succes,
                )
            );
        } else {
            return $this->render(
                'AdminBundle:Default:user-account.html.twig',
                array(
                    //'add' => $add,
                    'breadcrumbs' => $breadcrumbs,
                    'user' => $user,
                    'form' => $form->createView(),
                    'open_modal' => $open_modal,
                    'pass_change' => $pass_change,
                    'edit_profile_succes' => $edit_profile_succes

                )
            );
        }

    }

    public function getPdfPageAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $vehicles = $em->getRepository('AppBundle:Vehicle')->findBy(array('full' => true), null, 5, null);
        $html = $this->renderView('CommonBundle:Layout:savedcars.html.twig', array(
            'vehiclessaved' => $user->getUsersavedcars(),
            'vehiclesall' => $vehicles,
        ));

        $pdfGenerator = new GetPdf($this);
        $pdf = $pdfGenerator->getPdfcreator();
        // set font
        // set font
        $pdf->SetFont('dejavusans', '', 10);

        // add a page
        $pdf->AddPage();
        // output the HTML content

        $pdf->writeHTML($html, true, false, true, false, '');


        //return new Response();
        return new StreamedResponse(function () use ($pdf) {
            $pdf->Output('My Saved Cars.pdf');
        });
        /*return $this->render(
            'CommonBundle:Layout:savedcars.html.twig',
            array(
                'vehiclessaved' => $user->getUsersavedcars(),
                'vehiclesall' => $vehicles,

            )
        );*/
    }
}
