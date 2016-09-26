<?php

namespace Backend\PrivateSellerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Frontend\AppBundle\Entity\Gallery;
use Frontend\AppBundle\Form\Type\GalleryFormType;
use \DateTime;
use Symfony\Component\Validator\Constraints\Null;
use Backend\AdminBundle\Controller\Utils;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PrivateSellerBundle:Default:index.html.twig', array('name' => $name));
    }

    public function addCarAction($type, $vehicle_id)
    {
        //return $this->render('PrivateSellerBundle:Default:index.html.twig', array('name' => $name));
    }

    public function userVehiclescontentAction($user_id, Request $request)
    {
        if ($request->getMethod() == 'POST') {
            try {

                $limit = $request->get("limit");
                $year = $request->get("year");
                $sort = $request->get("sort");
                $make = $request->get("make");
                $start = $request->get("start");


                $session = $request->getSession();
                $session->set("paginator_limit", $limit);

                $em = $this->getDoctrine()->getManager();
                $suser = $this->get('security.context')->getToken()->getUser();
                $user = $em->getRepository('AppBundle:User')->find($suser->getId());

                $filtro = array(
                    'dealer' => null,
                    'user' => $user->getId(),
                    'year' => $year,
                    'make' => $make,
                    'sort' => $sort
                );

                $vehicles = $em->getRepository('AppBundle:Vehicle')->filterProperties($filtro);
                $paginator = $this->get('knp_paginator');

                $vehicles_list = $paginator->paginate(
                    $vehicles,
                    $this->get('request')->query->get('page', $start),
                    $session->get("paginator_limit")
                );

            } catch (\Exception $ex) {
                throw new \Exception($ex->getMessage());
                $response['success'] = false;
                $response['error'] = $ex->getMessage();
            }
        }

        return $this->renderVehiclesContentPage($user, $vehicles_list);

    }

    public function renderVehiclesContentPage($user, $vehicles_list)
    {
        return $this->render(
            'PrivateSellerBundle:Default:user-vehicles-content.html.twig',
            array(
                'vehicles' => $vehicles_list,
                'user' => $user
            )
        );
    }

    public function userImboxAction($type, Request $request)
    {
        $add = false;
        $session = $session = $request->getSession();

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $email_obj = $user->getEmails();
        $count_email_obj = count($email_obj);

        if ($count_email_obj > 0) {

            if ($type == "emails") {
                $emails = $em->getRepository('AppBundle:Email')->findBy(
                    array('offer' => false, 'user' => $user->getId()),
                    array('dateCreated' => 'DESC')
                );
            } else {
                if ($type == "offers") {
                    $emails = $em->getRepository('AppBundle:Email')->findBy(
                        array('offer' => true, 'user' => $user->getId()),
                        array('dateCreated' => 'DESC')
                    );
                }
            }
            $emails;
            $breadcrumbs = array(array('name' => '', 'path' => 'admin_user_homepage', 'class' => ''));

            return $this->render(
                'PrivateSellerBundle:Default:user-imbox.html.twig',
                array(
                    'add' => $add,
                    'path' => 'editPropertyHome',
                    'root' => 'none',
                    'count_vehicles' => 0,
                    'user' => $user,
                    'breadcrumbs' => $breadcrumbs,
                    'emails' => $emails
                )
            );
        }

    }

    public function emailContentAction($mail_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $session = $request->getSession();
        // $mail_id = $request->get('mail_id');
        $new = $request->get('new');

        $email = $em->getRepository('AppBundle:Email')->find($mail_id);

        if (!$email->isOpened()) {

            if ($email->isOffer()) {
                Utils::decrementNewEmailOfferSessionCounter($request);
                $breadcrumbs = array(array('name' => 'Offers', 'path' => "", 'class' => ''));
            } else {
                Utils::decrementNewEmailMessageSessionCounter($request);
                $breadcrumbs = array(array('name' => 'Inbox', 'path' => '', 'class' => ''));
            }
            $email->setOpened(1);
            $em->persist($email);
            $em->flush();
        }
        if ($email->isOffer()) {
            $breadcrumbs = array(array('name' => 'Offers', 'path' => "", 'class' => ''));
        } else {
            $breadcrumbs = array(array('name' => 'Inbox', 'path' => '', 'class' => ''));
        }

        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\InquiryReplyFormType());

        return $this->render(
            'PrivateSellerBundle:Default:email.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $email->getId(),
                'inq' => $email,
                'add' => true,
                'root' => 'none',
                'breadcrumbs' => $breadcrumbs,
                'email' => $email,
                'count_vehicles' => 0
            )
        );
    }

    public function renderCarDetailsAction($serie, Request $request)
    {
        $em = $this->getdoctrine()->getmanager();
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($serie);

        $secondbreadcrum = ($vehicle->getProfile() != null) ? $vehicle->getProfile()->getDescription()->getName() : "Private Seller";
        $thirdbreadcrum = $vehicle->getVehiclesinformation()->getCondition()->getName() . " "
            . $vehicle->getVehiclesinformation()->getYear()->getYear() . " "
            . $vehicle->getVehiclesinformation()->getMake()->getMakeDisplay() . " "
            . $vehicle->getVehiclesinformation()->getModel()->getModelDisplay();

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $secondbreadcrum, 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $thirdbreadcrum, 'path' => '', 'class' => 'active')
        );


        return $this->render(
            'PrivateSellerBundle:Default:car-details-dashboard.html.twig',
            array(
                'vehicle' => $vehicle,
                'breadcrumbs' => $breadcrumbs,
                'profile_selected' => $secondbreadcrum,
                'count_vehicles' => 0
            )
        );
    }

    public function savedCarsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();

        $secondbreadcrum = "Saved Cars";


        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $secondbreadcrum, 'path' => '', 'class' => '')
        );


        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $vehicles = $em->getRepository('AppBundle:Vehicle')->findBy(array('full' => true), null, 5, null);

        return $this->render(
            'PrivateSellerBundle:Default:saved-cars.html.twig',
            array(
                'vehiclessaved' => $user->getUsersavedcars(),
                'vehiclesall' => $vehicles,
                'breadcrumbs' => $breadcrumbs,
                'profile_selected' => $secondbreadcrum,
                'count_vehicles' => 0
            )
        );
    }

    public function findCarAction(Request $request)
    {
        $response = new Response();
        try {
            $em = $this->getDoctrine()->getManager();
            $serie = $request->get("serie");
            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($serie);

            $response->setContent(json_encode((Array)$vehicle));
        } catch (\Exception $ex) {
            $response['success'] = false;
            $response['error'] = $ex->getMessage();
        }

        return $response;

    }

    public function viewallAction(Request $request)
    {

        if ($request->getMethod() == 'POST') {
            try {
                $start = $request->get("start");
                $limit = $request->get("limit");
            } catch (\Exception $ex) {
                throw new \Exception($ex->getMessage());
            }

        }else{
            $start = 1;
            $limit = 12;
        }

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $vehicles = $user->getVehicles();
        $obj_year = $em->getRepository('AppBundle:Year')->findAll();
        $obj_make = $em->getRepository('AppBundle:Make')->findAll();
        $paginator = $this->get('knp_paginator');
        $session = $request->getSession();
        $session->set("paginator_limit", $limit);
        $vehicles_list = $paginator->paginate(
            $vehicles,
            $this->get('request')->query->get('page', $start),
            $session->get("paginator_limit")
        );

        $secondbreadcrum = "My Cars";
        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $secondbreadcrum, 'path' => '', 'class' => '')
        );

        return $this->render(
            'PrivateSellerBundle:Default:mycars.html.twig',
            array(
                'vehicles' => $vehicles_list,
                'breadcrumbs' => $breadcrumbs,
                'profile_selected' => $secondbreadcrum,
                'count_vehicles' => count($vehicles),
                'user' => $user,
                'obj_year' => $obj_year,
                'obj_make' => $obj_make,
            )
        );
    }

}
