<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 23/08/2015
 * Time: 10:53
 */

namespace Backend\AdminBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Frontend\AppBundle\Entity\Feeds;
use Frontend\AppBundle\Entity\Profile;
use Frontend\AppBundle\Entity\Description;
use Frontend\AppBundle\Entity\Location;
use Frontend\AppBundle\Entity\Gallery;
use Frontend\AppBundle\Entity\ProfileServices;
use Frontend\AppBundle\Entity\Services;
use Frontend\AppBundle\Form\Type\GalleryFormType;
use Frontend\AppBundle\Form\Type\ProfileFormType;
use Frontend\AppBundle\Form\Type\ProfileServicesFormType;
use Frontend\AppBundle\Form\Type\ServicesAndUsefullInformationFormType;
use Frontend\AppBundle\Form\Type\ServicesFormType;
use Frontend\AppBundle\Form\Type\PropertyEditFormType;
use Frontend\AppBundle\Form\Type\DescriptionFormType;
use Frontend\AppBundle\Form\Type\PoliciesPaymentsFormType;
use Frontend\AppBundle\Form\Type\AmenitiesFormType;
use Frontend\AppBundle\Form\Type\LocationFormType;
use Frontend\AppBundle\Form\Type\FeedsFormType;
use Frontend\AppBundle\Form\Type\RatesFormType;
use Frontend\AppBundle\Form\Type\UsefulInformationFormType;
use Frontend\AppBundle\Form\Type\InquiryReplyFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Backend\AdminBundle\Classes;
use Backend\AdminBundle\Classes\MobileDetect;
use Backend\AdminBundle;
use \DateTime;

class FALManageDashBoardController extends Controller
{

    public function dashboardAction(Request $request)
    {

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Dealers ', 'path' => '', 'class' => 'active')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $news = $em->getRepository('AppBundle:News')->findBy(
            array('new' => true, 'status' => $this->container->getParameter('status.posted'))
        );
        $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        $profilesInfo = Utils::GenerateProfilesInfoList($profiles);
        $sumary = Utils::GenerateSumaryInfoList($profiles, $user);

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $session->set('news', COUNT($news));
        $session->set('propertiesCount', count($profiles));
        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = false;
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($profiles, $this->get('request')->query->get('page', 1), 10);
        $detect = new MobileDetect();
        $ismobile = $detect->isMobile();
        return $this->render(
        //'AdminBundle:Default:user.html.twig',
            'AdminBundle:Default:user-dashboard.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'list' => $list,
                'print' => $print,
                'download' => $download,
                'search' => $search,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'properties' => $pagination,
                'path' => 'editPropertyHome',
                'root' => 'none',
                'profiles' => $profilesInfo,
                'sumary' => $sumary,
                'ismobile' => $ismobile
            )
        );

    }

    public function renderDealerInformationAction($prop_pk, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
        $session = $request->getSession();
        //$countperpage = ($session->get("paginator_limit")) ? $session->get("paginator_limit") : 12;
        $countperpage = 12;

        //$vehicles = $em->getRepository('AppBundle:Vehicle')->findAll();
        $filtro = array(
            'dealer' => $prop_pk,
            'user' => null,
            'year' => 0,
            'make' => 0,
            'sort' => 0
        );

        $vehicles = $em->getRepository('AppBundle:Vehicle')->filterProperties($filtro);


        $paginator = $this->get('knp_paginator');
        $vehicles_list = $paginator->paginate(
            $vehicles,
            $this->get('request')->query->get('page', 1),
            $countperpage
        );

        $emails = $em->getRepository('AppBundle:Email')->findBy(
            array('profile' => $Profile->getId()),
            array('dateCreated' => 'DESC')
        );

        $reviewsP = $Profile->getReviews();
        $reviews = $paginator->paginate($reviewsP, $this->get('request')->query->get('page', 1), 4);

        $get = $this->get('request')->query->get('page');
        if ($this->get('request')->query->get('page') == null) {

            $profile_selected = $Profile->getDescription()->getName();

            $breadcrumbs = array(
                array('name' => 'Dashboard', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => $profile_selected, 'path' => 'admin_user_homepage', 'class' => '')
            );

            $em = $this->getDoctrine()->getManager();
            $user = $this->get('security.context')->getToken()->getUser();
            $vehicle = null;

            $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
                $user,
                $this->container->getParameter('status.active'),
                $this->container->getParameter('status.inactive')
            );

            $profile_id = $Profile->getId();
            $obj_year = $em->getRepository('AppBundle:Year')->findBy(
                array(),
                array('year' => 'ASC')
            );
            $obj_make = $em->getRepository('AppBundle:Make')->selectDistinctMakes();
            $profilesInfo = Utils::GenerateProfilesInfoList($profiles);

            $Profile->setViews($Profile->getViews() + 1);
            $em->persist($Profile);
            $em->flush();

            $detect = new MobileDetect();
            $ismobile = $detect->isMobile();

            return $this->render(
                'AdminBundle:DealerForm:dealer-dashboard.html.twig',
                array(
                    'properties_select' => false,
                    'filter' => false,
                    'print' => false,
                    'add' => false,
                    'list' => true,
                    'download' => false,
                    'search' => false,
                    'location' => false,
                    'property' => false,
                    'expired_alert' => false,
                    'new_reservation' => false,
                    'breadcrumbs' => $breadcrumbs,
                    'prop_pk' => $prop_pk,
                    'user' => $user,
                    'logo' => $Profile->getPath(),
                    'profiles' => $profilesInfo,
                    'profile_selected' => $profile_selected,
                    'profile' => $Profile,
                    'obj_year' => $obj_year,
                    'obj_make' => $obj_make,
                    'vehicles_list' => $vehicles_list,
                    'emails' => $emails,
                    'reviews' => $reviews,
                    'ismobile' => $ismobile
                )
            );
        } else {
            return $this->renderVehiclesContentPage($prop_pk, $vehicles_list, $Profile);
        }
    }

    public function createUserRequestAction(Request $request)
    {

        $text = $request->get('text');
        if ($text == "active") {
            $em = $this->getDoctrine()->getManager();
            $suser = $this->get('security.context')->getToken()->getUser();
            $user = $em->getRepository('AppBundle:User')->find($suser->getId());

            $profile_id = $request->get('id');
            $text = $request->get('text');


            try {
                $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($profile_id);
                $status_active_id = $this->container->getParameter('status.active');
                $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
                $actualStatus = $Profile->getStatus()->getName();
                $userRequest = new \Frontend\AppBundle\Entity\UserRequest();
                $userRequest->setDateCreated(new \DateTime);
                $userRequest->setProfile($Profile);
                $userRequest->setStatus($Status_active);
                $userRequest->setText($text);
                $userRequest->setUser($user);
                $em->persist($userRequest);
                $em->flush();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();

                return $response['error'] = setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            //$response['status'] = $actualStatus;
            $response['status'] = "active";

            return new JsonResponse($response);
        } else {
            $response[result] = "ok";

            return new JsonResponse($response);
        }
    }

    public function dealerImboxAction($type, Request $request)
    {
        $add = false;
        $session = $session = $request->getSession();

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        if ($this->checkUserProfiles($user)) {

            $breadcrumbs = array(
                array('name' => 'Dashboard', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => 'Inbox', 'path' => '', 'class' => 'active')
            );

            $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
                $user,
                $this->container->getParameter('status.active'),
                $this->container->getParameter('status.inactive')
            );

            $profilesInfo = Utils::GenerateProfilesInfoList($profiles);
            $session->set('propertiesCount', count($profiles));

            if ($type == "emails") {
                $emails = $em->getRepository('AppBundle:Email')->findByProfiles($profiles, "email");
                $session->set('type', false);
            } else {
                $emails = $em->getRepository('AppBundle:Email')->findByProfiles($profiles, "offer");
                $session->set('type', true);
            }

            return $this->render(
                'AdminBundle:DealerForm:dealer-imbox.html.twig',
                array(
                    'add' => $add,
                    'path' => 'editPropertyHome',
                    'root' => 'none',
                    'profiles' => $profilesInfo,
                    'breadcrumbs' => $breadcrumbs,
                    'emails' => $emails
                    //'emails' => $emails[0]
                )
            );
        } else {
            return $this->redirect(
                $this->generateUrl('admin_user_homepage')
            );
        }

    }

    public function dealerImboxLoadAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $profile_id = $request->get('profile_id');
        $session = $session = $request->getSession();
        $type = $session->get('type');


        $profile_obj = $em->getRepository('AppBundle:Profile')->findOneById($profile_id);
        $emails = $em->getRepository('AppBundle:Email')->findBy(
            array('profile' => $profile_obj, 'offer' => $type),
            array('opened' => 'ASC')
        );

        return $this->render(
            'AdminBundle:DealerForm:dealer-imbox-load.html.twig',
            array(
                'profile_id' => $profile_id,
                'emails' => $emails
            )
        );
    }

    public function emailContentAction($mail_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $session = $request->getSession();
        //$mail_id = $request->get('mail_id');
        //$new = $request->get('new');

        $email = $em->getRepository('AppBundle:Email')->find($mail_id);

        if (!$email->isOpened()) {
            //$session->set('email_news', ($session->get('email_news') - 1));
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
            'AdminBundle:DealerForm:email.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $email->getId(),
                'inq' => $email,
                'add' => true,
                'root' => 'none',
                'breadcrumbs' => $breadcrumbs,
                'email' => $email
            )
        );
    }

    public function checkUserProfiles($user)
    {
        $profilescount = count($user->getUserProfiles());
        if ($profilescount > 0) {
            //if ($profilescount == 1) {
            $profile = $user->getUserProfiles()[0];

            return $profile->getFull() == 1;
            /*} else
                return true;*/
        } else {
            return false;
        }
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
            array('name' => $secondbreadcrum, 'path' => '', 'class' => ''),
            array('name' => $thirdbreadcrum, 'path' => '', 'class' => 'active')
        );


        return $this->render(
            'AdminBundle:Default:car-details-dashboard.html.twig',
            array(
                'vehicle' => $vehicle,
                'breadcrumbs' => $breadcrumbs,
                'profile_selected' => $secondbreadcrum
            )
        );
    }
}