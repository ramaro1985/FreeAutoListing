<?php

namespace Backend\AdminBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Frontend\AppBundle\Entity\Profile;
use Frontend\AppBundle\Entity\Description;
use Frontend\AppBundle\Entity\Location;
use Frontend\AppBundle\Entity\Gallery;
use Frontend\AppBundle\Form\Type\GalleryFormType;
use Frontend\AppBundle\Form\Type\ProfileFormType;
use Frontend\AppBundle\Form\Type\PropertyEditFormType;
use Frontend\AppBundle\Form\Type\DescriptionFormType;
use Frontend\AppBundle\Form\Type\PoliciesPaymentsFormType;
use Frontend\AppBundle\Form\Type\AmenitiesFormType;
use Frontend\AppBundle\Form\Type\LocationFormType;
use Frontend\AppBundle\Form\Type\RatesFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use \DateTime;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Frontend\AppBundle\Entity\SavedCars;
use Frontend\AppBundle\Entity\User;
use Frontend\AppBundle\Form\Type\UserFormType;
use Backend\AdminBundle\Classes\MobileDetect;

class DefaultController extends Controller
{

//-----------------------------------------------------------------------------------     

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

    public function isPrivateSeller($user)
    {
        if ($user->getType() == $this->container->getParameter('usertype.private')) {
            return true;
        } else {
            return false;
        }
    }


    public function isDealership($user)
    {
        if ($user->getType() == $this->container->getParameter('usertype.dealer')) {
            return true;
        } else {
            return false;
        }
    }

    public function indexAction(Request $request)
    {
        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = false;

        $breadcrumbs = array(
            array('name' => 'Create your Dealership', 'path' => 'admin_user_homepage', 'class' => '')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $session = $request->getSession();
        $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );
        $detect = new MobileDetect();
        $ismobile = $detect->isMobile();
        $emails = $em->getRepository('AppBundle:Email')->findByProfiles($profiles, 'all');
        if ($user->getType()->getId() == 2) {
            Utils::SetSessionsVars(
                $request,
                $em,
                $emails,
                $this->container->getParameter('status.posted'),
                $profiles
            );
            if ($this->checkUserProfiles($user)) {

                $breadcrumbs = array(
                    array('name' => 'Dashboard', 'path' => 'admin_user_homepage', 'class' => '')
                );


                $profilesInfo = Utils::GenerateProfilesInfoList($profiles);
                $sumary = Utils::GenerateSumaryInfoList($profiles, $user);

                $paginator = $this->get('knp_paginator');
                $pagination = $paginator->paginate($profiles, $this->get('request')->query->get('page', 1), 10);


                $form = $this->createForm(new \Frontend\AppBundle\Form\Type\InquiryReplyFormType());

                return $this->render(
                    'AdminBundle:Default:user.html.twig',
                    //'AdminBundle:Default:user-dashboard.html.twig',
                    array(
                        'form' => $form->createView(),
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
                        'emails' => $emails,
                        'sumary' => $sumary,
                        'ismobile' => $ismobile
                    )
                );

            } else {
                $properties_select = false;
                $list = true;
                $prop_pk = "new";

                //si falta algun profile por completar cargarlo
                $propertyEntity = new Profile();
                $saveValue = 0;
                if (count($user->getUserProfiles()) > 0) {
                    if ($user->getUserProfiles()[0]->getFull() == 0) {
                        $propertyEntity = $user->getUserProfiles()[0];
                        $prop_pk = $propertyEntity->getSerie();
                        $saveValue = 1;
                    }
                }

                $form = $this->createForm(new ProfileFormType(), $propertyEntity, array());
                $suser = $this->get('security.context')->getToken()->getUser();
                $user = $em->getRepository('AppBundle:User')->find($suser->getId());

                // store an attribute for reuse during a later user request
                $session->set('saved', $saveValue);
                $session->set('email_news', 0);
                $session->set('email_offers', 0);

                if ($saveValue == 0) {
                    $session->set('propertiesCount', 0);

                    return $this->render('AdminBundle:Layout:welcome-add-newprofile.html.twig', array());
                } else {
                    $ismobile = $session->get("ismobile") == "true";
                    if ($prop_pk == "new") {
                        $Profile = new Profile();
                        $form = $this->createForm(new ProfileFormType(), $Profile);
                    } else {
                        $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
                        $form = $this->createForm(new ProfileFormType(), $Profile);
                    }

                    return $this->render(
                        'AdminBundle:DealerForm:new-profile.html.twig',
                        array(
                            'form' => $form->createView(),
                            'form1' => $form->createView(),
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
                            'ismobile' => $ismobile,
                            'step' => 1
                        )
                    );
                }
            }
        } else {
            if ($user->getType()->getId() == 1) {


                $vehicles = $user->getVehicles();
                $views = 0;
                $count_vehicles = count($vehicles);
                $breadcrumbs = array(
                    array('name' => 'Dashboard', 'path' => '', 'class' => '')
                );

                if ($count_vehicles > 0) {

                    $emails = $em->getRepository('AppBundle:Email')->findByVehicles($vehicles);

                    foreach ($vehicles as $vehicle) {
                        $views += $vehicle->getViews();
                    }


                    Utils::SetSessionsVars(
                        $request,
                        $em,
                        $emails,
                        $this->container->getParameter('status.posted'),
                        0
                    );

                    $obj_year = $em->getRepository('AppBundle:Year')->findAll();
                    $obj_make = $em->getRepository('AppBundle:Make')->findAll();

                    $paginator = $this->get('knp_paginator');

                    $vehicles = $paginator->paginate(
                        $vehicles,
                        1,
                        $count_vehicles
                    );

                    return $this->render(
                        'PrivateSellerBundle:Default:user.html.twig',
                        array(
                            'add' => $add,
                            'breadcrumbs' => $breadcrumbs,
                            'count_vehicles' => $count_vehicles,
                            'vehicles' => $vehicles,
                            'emails' => $emails,
                            'user' => $user,
                            'obj_year' => $obj_year,
                            'obj_make' => $obj_make,
                            'views' => $views
                        )
                    );
                } else {
                    $session->set('email_news', 0);
                    $session->set('email_offers', 0);

                    return $this->render(
                        'PrivateSellerBundle:Layout:welcome-add-newcar.html.twig',
                        array(
                            'add' => $add,
                            'breadcrumbs' => $breadcrumbs,
                            'count_vehicles' => 0,
                            //'vehicles' => $vehicles,
                            //'emails' => $emails,
                            //'sumary' => $sumary
                        )
                    );
                }

            } else {
                if ($user->getType()->getId() == 3) {

                    $form = $this->createForm(new UserFormType(), $user);
                    $seriecar = $session->get("savedCar");
                    if ($seriecar && $seriecar != "") {
                        $vehicles = $user->getVehiclessaved();
                        $exist = false;
                        foreach ($vehicles as $vehicle) {
                            if ($vehicle->getSerie() == $seriecar) {
                                $exist = true;
                                break;
                            }
                        }
                        if (!$exist) {
                            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($seriecar);
                            $savedcar = new SavedCars();
                            $savedcar->setUser($user);
                            $savedcar->setVehicle($vehicle);
                            $savedcar->setNotes("No notes was added");
                            $user->addSavedCars($savedcar);
                            $em->persist($user);
                            $em->flush();
                        }
                    }
                    $open_modal = false;
                    $pass_change = false;
                    $edit_profile_succes = false;
                    $edit_user_succes = false;

                    $dispatcher = $this->container->get('event_dispatcher');

                    $event = new GetResponseUserEvent($user, $request);
                    $dispatcher->dispatch(FOSUserEvents::CHANGE_PASSWORD_INITIALIZE, $event);

                    if (null !== $event->getResponse()) {
                        return $event->getResponse();
                    }

                    /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
                    $formFactory = $this->container->get('fos_user.change_password.form.factory');

                    $form1 = $formFactory->createForm();
                    $form1->setData($user);

                    //$vehicles = $user->getVehiclessaved();
                    $form1 = $formFactory->createForm();
                    $form1->setData($user);
                    $vehiclesall = $em->getRepository('AppBundle:Vehicle')->findBy(
                        array('full' => true),
                        null,
                        5,
                        null
                    );

                    //$vehiclesall = $vehiclesall->slice(0,2);

                    return $this->render(
                        'ShopperBundle:Default:user-account.html.twig',
                        array(
                            'name' => $user->getName(),
                            'form' => $form->createView(),
                            'form1' => $form1->createView(),
                            'form2' => $form->createView(),
                            'form3' => $form1->createView(),
                            //'count_vehicles' => 0,
                            'vehiclessaved' => $user->getUsersavedcars(),
                            'email' => $user->getEmail(),
                            'open_modal' => $open_modal,
                            'pass_change' => $pass_change,
                            'edit_profile_succes' => $edit_profile_succes,
                            'exist_email' => false,
                            'edit_user_succes' => $edit_user_succes,
                            'vehiclesall' => $vehiclesall,
                        )
                    );
                }
            }
        }

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

        if ($request->isMethod('POST')) {

            if ($request->get('edit_profile') && $request->get('edit_profile') == 'yes') {

                $user->setName($request->get('name'));
                $user->setLastName($request->get('lastname'));
                $user->setPhone($request->get('phone'));

                $em->persist($user);
                $em->flush();

                $edit_profile_succes = true;

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
                } else {
                    $pass_change = false;
                    $open_modal = true;
                }
            }


        }
        if ($user->getType()->getId() == 2) {
            return $this->render(
                'AdminBundle:Default:account.html.twig',
                array(
                    'add' => $add,
                    'breadcrumbs' => $breadcrumbs,
                    'user' => $user,
                    'form' => $form->createView(),
                    'open_modal' => $open_modal,
                    'pass_change' => $pass_change,
                    'edit_profile_succes' => $edit_profile_succes

                )
            );
        } else {
            if ($user->getType()->getId() == 1) {
                return $this->render(
                    'PrivateSellerBundle:Default:account.html.twig',
                    array(
                        'add' => $add,
                        'breadcrumbs' => $breadcrumbs,
                        'user' => $user,
                        'form' => $form->createView(),
                        'open_modal' => $open_modal,
                        'pass_change' => $pass_change,
                        'edit_profile_succes' => $edit_profile_succes,
                        'count_vehicles' => 0

                    )
                );
            } else {
                return $this->render(
                    'PrivateSellerBundle:Default:account.html.twig',
                    array(
                        'add' => $add,
                        'breadcrumbs' => $breadcrumbs,
                        'user' => $user,
                        'form' => $form->createView(),
                        'open_modal' => $open_modal,
                        'pass_change' => $pass_change,
                        'edit_profile_succes' => $edit_profile_succes,
                        'count_vehicles' => 0

                    )
                );
            }
        }

    }

    public function deactivationFormAction($serie)
    {
        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\DeactivationRequestFormType(),
            new \Frontend\AppBundle\Entity\UserRequest()
        );

        return $this->render(
            'AdminBundle:Default:property-deactivation-form.html.twig',
            array('form' => $form->createView(), 'serie' => $serie)
        );
    }

    public function adminAction()
    {
        return $this->render('AdminBundle:Default:admin.html.twig', array());
    }

    public function profileReviewsAction($prop_pk, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $add = false;
        $countperpage = 4;
        $profile_selected = null;
        $profile_selected = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $profile_selected, 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Reviews', 'path' => '', 'class' => '')
        );


        if ($request->isMethod('POST')) {


            if ($request->get("start") && $request->get("start") != null) {
                $start = $request->get("start");
            } else {
                $start = 1;
            }

            $profile_selected = $em->getRepository('AppBundle:Profile')->find($request->get('profile_id'));
            $reviewsP = $em->getRepository('AppBundle:Review')->findByProfile($profile_selected);

            $paginator = $this->get('knp_paginator');
            $reviews = $paginator->paginate(
                $reviewsP,
                $this->get('request')->query->get('page', $start),
                $countperpage
            );

            return $this->render(
                'AdminBundle:DealerForm:reviews-content-load.html.twig',
                array(
                    'reviews' => $reviews
                )
            );


        } else {
            $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
                $user,
                $this->container->getParameter('status.active'),
                $this->container->getParameter('status.inactive')
            );

            $session = $request->getSession();
           /* $reviewsP = $em->getRepository('AppBundle:Review')->findByProfile($profiles);*/
            $reviewsP = $profile_selected->getReviewsByStatus($this->container->getParameter('status.active'));
            $session->set('dealer_reviews', count($reviewsP));

            $profilesInfo = Utils::GenerateProfilesInfoList($profiles);

            $paginator = $this->get('knp_paginator');
            $reviews = $paginator->paginate($reviewsP, $this->get('request')->query->get('page', 1), $countperpage);

            return $this->render(
                'AdminBundle:DealerForm:reviews.html.twig',
                array(
                    'add' => $add,
                    'breadcrumbs' => $breadcrumbs,
                    'reviews' => $reviews,
                    'profiles' => $profilesInfo,
                    'profile_selected' => $profile_selected,
                    'prop_pk' => $profile_selected->getSerie()
                )
            );

        }


    }

//-----------------------------------------------------------------------------------------------
    public function adminPropertiesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $properties = $em->getRepository('AppBundle:Property')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', 1), 6);

        return $this->render('AdminBundle:Default:admin-properties.html.twig', array('properties' => $pagination));
    }

//-----------------------------------------------------------------------------------------------
    public function wrongAreaAction()
    {

        return $this->render('AdminBundle:Default:wrong-area.html.twig');
    }

    //------------------------------------------------------------------------------------------------

    public function registerProfileAction()
    {
        return $this->render('AdminBundle:LogRegister:register.html.twig');
    }

//-----------------------------------------------------------------------------------------------    
    public function routerAction(Request $request)
    {


        if ($this->get('security.context')->isGranted('ROLE_ADMIN') || $this->get('security.context')->isGranted(
                'ROLE_SUPPORT'
            )
        ) {
            $this->get('security.context')->setToken(null);
            $this->get('request')->getSession()->invalidate();

            return $this->redirect($this->generateUrl('admin_logout'));
        } else {
            if ($this->get('security.context')->isGranted('ROLE_USER')) {

                $user = $this->get('security.context')->getToken()->getUser();

                return $this->redirect($this->generateUrl('admin_user_homepage'));
            }
        }

        return $this->render("AppBundle:Default:index.html.twig");
    }

//------------------------------------------------------------------------------------------------
    public function inquiriesAction($id, $filtro)
    {

        $properties_select = true;
        $filter = false;
        $add = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $list = true;

        $nights = array();

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatus(
            $user,
            $this->container->getParameter('status.active')
        );

        //$properties = new ArrayCollection();
        $inquiries = new ArrayCollection();

        $Property = $em->getRepository('AppBundle:Property')->findOneBy(
            array('serie' => $id, 'status' => $this->container->getParameter('status.active'))
        );

        if ($Property != null) {
            if ($filtro == 'new') {

                $inquiriesList = $Property->getNewInquiries();
                foreach ($inquiriesList as $enquiry) {
                    if ($enquiry->getStartDate() != '' && $enquiry->getEndDate() != '') {
                        $nights = $this->calculateDays($enquiry->getStartDate(), $enquiry->getEndDate());
                    }
                    $inquiries->add(array('inquiry' => $enquiry, 'nights' => $nights));
                }
            } else {
                $inquiriesList = $Property->getInquiries();
                foreach ($inquiriesList as $enquiry) {
                    if ($enquiry->getStartDate() != '' && $enquiry->getEndDate() != '') {
                        $nights = $this->calculateDays($enquiry->getStartDate(), $enquiry->getEndDate());
                    }
                    $inquiries->add(array('inquiry' => $enquiry, 'nights' => $nights));
                }
            }


        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($inquiries, $this->get('request')->query->get('page', 1), 10);


        return $this->render(
            'AdminBundle:Default:inquiries.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $Property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'inquiries' => $pagination,
                'prop_pk' => $id,
                'filtro' => $filtro,
                'properties' => $properties,
                'path' => 'admin_user_inquiries',
                'root' => 'property_inquiries_list'
            )
        );
    }

    public function inquiriesDetailAction($id, $prop_pk, $filtro)
    {

        $properties_select = false;
        $filter = false;
        $add = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $list = true;

        $em = $this->getDoctrine()->getManager();

        $Inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);
        $Inquiry->setViewed(true);
        $em->persist($Inquiry);
        $em->flush();

        $breadcrumbs = array(
            array('name' => 'Inquiries', 'path' => 'admin_user_inquiries', 'class' => ''),
            array('name' => $Inquiry->getGuest(), 'path' => '', 'class' => 'active')
        );

        return $this->render(
            'AdminBundle:Default:inquiriesDetail.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'inquiry' => $Inquiry,
                'prop_pk' => $prop_pk,
                'filtro' => $filtro
            )
        );
    }

    public function personalInfoAction($filtro)
    {

        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $list = false;
        $add = false;

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );
        if ($filtro == 'new') {
            $news = $em->getRepository('AppBundle:News')->findBy(
                array('new' => true, 'status' => $this->container->getParameter('status.posted')),
                array('dateCreated' => 'DESC')
            );
        } else {
            $news = $em->getRepository('AppBundle:News')->findBy(
                array('status' => $this->container->getParameter('status.posted')),
                array('dateCreated' => 'DESC')
            );
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($news, $this->get('request')->query->get('page', 1), 10);


        return $this->render(
            'AdminBundle:Default:personal.html.twig',
            array(
                'filtro' => $filtro,
                'path' => 'editPropertyHome',
                'news' => $pagination,
                'properties' => $properties,
            )
        );
    }

    public function newsDetailAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $new = $em->getRepository('AppBundle:News')->find($id);
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        return $this->render(
            'AdminBundle:Default:newsDetail.html.twig',
            array(
                'new' => $new,
                'path' => 'editPropertyHome',
                'filtro' => 'new',
                'properties' => $properties
            )
        );
    }

    public function reservationsAction($id, $filtro)
    {

        $properties_select = true;
        $filter = false;
        $print = false;
        $add = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = true;
        $list = true;

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $reservations = new ArrayCollection();

        $Property = $em->getRepository('AppBundle:Property')->findOneBy(
            array('serie' => $id, 'status' => $this->container->getParameter('status.active'))
        );


        if ($Property != null) {

            if ($filtro == 'all') {

                foreach ($Property->getReservations() as $reservation) {
                    $nights = $this->calculateDays($reservation->getCheckIn(), $reservation->getCheckout());
                    $reservations->add(array('reservation' => $reservation, 'nights' => $nights));
                }
            } else {
                if ($filtro == 'pending') {
                    foreach ($Property->getReservationsByStatus(
                        $this->container->getParameter('status.pending')
                    ) as $reservation) {
                        $nights = $this->calculateDays($reservation->getCheckIn(), $reservation->getCheckout());
                        $reservations->add(array('reservation' => $reservation, 'nights' => $nights));
                    }
                } else {
                    if ($filtro == 'confirmed') {
                        foreach ($Property->getReservationsByStatus(
                            $this->container->getParameter('status.confirmed')
                        ) as $reservation) {
                            $nights = $this->calculateDays($reservation->getCheckIn(), $reservation->getCheckout());
                            $reservations->add(array('reservation' => $reservation, 'nights' => $nights));
                        }
                    }
                }
            }


        }


        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($reservations, $this->get('request')->query->get('page', 1), 10);


        return $this->render(
            'AdminBundle:Default:reservations.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $Property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'reservations' => $pagination,
                'prop_pk' => $id,
                'path' => 'admin_user_reservations',
                'filtro' => $filtro,
                'root' => 'property_reservations_list'
            )
        );
    }

    public function calculateDays($date1, $date2)
    {
        return $date2->diff($date1)->days;
    }

    public function renderPropertySerie()
    {

        $rand = rand(1, 999999);

        if (strlen($rand) == 1) {
            $serie = 'FAL-11111' . $rand;
        } else {
            if (strlen($rand) == 2) {
                $serie = 'FAL-1111' . $rand;
            } else {
                if (strlen($rand) == 3) {
                    $serie = 'FAL-111' . $rand;
                } else {
                    if (strlen($rand) == 4) {
                        $serie = 'FAL-11' . $rand;
                    } else {
                        if (strlen($rand) == 5) {
                            $serie = 'FAL-1' . $rand;
                        } else {
                            if (strlen($rand) == 6) {
                                $serie = 'FAL-' . $rand;
                            }
                        }
                    }
                }
            }
        }

        return $serie;
    }

    public function renderSerie()
    {

        $rand = rand(1, 999999);

        if (strlen($rand) == 1) {
            $serie = '11111' . $rand;
        } else {
            if (strlen($rand) == 2) {
                $serie = '1111' . $rand;
            } else {
                if (strlen($rand) == 3) {
                    $serie = '111' . $rand;
                } else {
                    if (strlen($rand) == 4) {
                        $serie = '11' . $rand;
                    } else {
                        if (strlen($rand) == 5) {
                            $serie = '1' . $rand;
                        } else {
                            if (strlen($rand) == 6) {
                                $serie = $rand;
                            }
                        }
                    }
                }
            }
        }

        return $serie;
    }

    public function createReservationCalendarAction(Request $request)
    {

        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $property_id = $request->get('id');
        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $checkIn = $request->get('checkIn');
        $checkOut = $request->get('checkOut');
        $checkinhour = $request->get('checkinhour');
        $checkouthour = $request->get('checkouthour');
        $adults = $request->get('adults');
        $children = $request->get('children');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $mobile = $request->get('mobile');
        //$inquiry_id = $request->get('inquiry');

        $Reservation = new \Frontend\AppBundle\Entity\Reservation();

        $reservations_in_range = $em->getRepository('AppBundle:Reservation')->checkReservationAvailableByProperty(
            $property_id,
            \DateTime::createFromFormat("m/d/Y", $checkIn),
            \DateTime::createFromFormat("m/d/Y", $checkOut),
            $checkinhour,
            $checkouthour,
            null
        );
        var_dump(count($reservations_in_range));

        if ($reservations_in_range != null) {
            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        } else {

            try {

                $Property = $em->getRepository('AppBundle:Property')->find($property_id);

                $status_confirmed_id = $this->container->getParameter('status.confirmed');
                $Status_conf = $em->getRepository('AppBundle:Status')->find($status_confirmed_id);


                $Reservation->setProperty($Property);
                $Reservation->setCheckIn(\DateTime::createFromFormat("m/d/Y", $checkIn));
                $Reservation->setCheckout(\DateTime::createFromFormat("m/d/Y", $checkOut));
                $Reservation->setFirstName($firstName);
                $Reservation->setLastName($lastName);
                $Reservation->setEmail($email);
                $Reservation->setAdults($adults);
                $Reservation->setChildren($children);
                $Reservation->setPhone($phone);
                $Reservation->setMobile($mobile);
                $Reservation->setCheckInHour($checkinhour);
                $Reservation->setCheckOutHour($checkouthour);
                $Reservation->setDateCreated(new \DateTime);
                $Reservation->setStatus($Status_conf);
                $em->persist($Reservation);
                //$em->persist($Inquiry);
                $em->flush();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();

                return $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
            }
        }

        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function createReservationInquiryAction(Request $request)
    {

        $response = new Response();

        //$type = $request->get('type');
        //$prop_pk  = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();


        try {

            $status_confirmed_id = $this->container->getParameter('status.confirmed');
            $Status_conf = $em->getRepository('AppBundle:Status')->find($status_confirmed_id);
            $inquiry_id = $request->get('id');
            $checkIn = \DateTime::createFromFormat("m/d/Y", $request->get('checkIn'));
            $checkOut = \DateTime::createFromFormat("m/d/Y", $request->get('checkOut'));
            $checkInHour = $request->get('checkinhour');
            $checkOutHour = $request->get('checkouthour');

            $Inquiry = $em->getRepository('AppBundle:Inquiry')->find($inquiry_id);
            $Inquiry->setBooked(true);

            if ($checkOut <= $checkIn) {
                return $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
            }

            $reservations_in_range = $em->getRepository('AppBundle:Reservation')->checkReservationAvailableByProperty(
                $Inquiry->getProperty()->getId(),
                $checkIn,
                $checkOut,
                $checkInHour,
                $checkOutHour,
                null
            );
            if ($reservations_in_range != null) {
                return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }


            $Reservation = new \Frontend\AppBundle\Entity\Reservation();
            $Reservation->setProperty($Inquiry->getProperty());
            $Reservation->setCheckIn($checkIn);
            $Reservation->setCheckout($checkOut);
            $Reservation->setFirstName($Inquiry->getGuest());
            $Reservation->setLastName($Inquiry->getLastName());
            $Reservation->setEmail($Inquiry->getEmail());
            $Reservation->setAdults($Inquiry->getAdults());
            $Reservation->setChildren($Inquiry->getChildren());
            $Reservation->setPhone($Inquiry->getPhone());
            $Reservation->setCheckInHour($checkInHour);
            $Reservation->setCheckOutHour($checkOutHour);
            $Reservation->setDateCreated(new \DateTime);
            $Reservation->setStatus($Status_conf);

            $em->persist($Reservation);
            $em->persist($Inquiry);
            $em->flush();

            //*********************************** Send Email to Guest Informing the confirmation of the Inquiry ***********************************************************//
            $template = "AdminBundle:Default:new-reservation-confirmed-mail.html.twig";
            $options = array('reservation' => $Reservation, 'property' => $Reservation->getProperty());
            //$to = "support@homeescape.com";
            $to = $Reservation->getEmail();
            $from = array("booking@homeescape.com", 'HomeEscape');
            $subject = 'Your Reservation Request for property #' . $Reservation->getProperty()->getSerie(
                ) . ' has been confirmed';

            $this->sendEmail($template, $options, $to, $from, $subject);


        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        }


        return $response->setStatusCode(Response::HTTP_OK);
        //return $this->redirect($this->generateUrl('admin_user_reservations', array('id' => $Reservation->getProperty()->getSerie())));
    }

    public function createUserRequestAction(Request $request)
    {

        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $property_id = $request->get('serie');
        $text = $request->get('text');


        try {
            $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($property_id);
            $status_active_id = $this->container->getParameter('status.active');
            $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);

            $userRequest = new \Frontend\AppBundle\Entity\UserRequest();
            $userRequest->setDateCreated(new \DateTime);
            $userRequest->setProperty($Property);
            $userRequest->setStatus($Status_active);
            $userRequest->setText($text);
            $userRequest->setUser($user);
            $em->persist($userRequest);
            $em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function confirmReservationAction(Request $request)
    {


        $response = new Response();

        //$type = $request->get('type');
        //$prop_pk  = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $active_reservations = new ArrayCollection();


        try {

            $status_confirmed_id = $this->container->getParameter('status.confirmed');
            $Status_conf = $em->getRepository('AppBundle:Status')->find($status_confirmed_id);

            $reservation_id = $request->get('id');
            $checkIn = \DateTime::createFromFormat("m/d/Y", $request->get('checkIn'));
            $checkOut = \DateTime::createFromFormat("m/d/Y", $request->get('checkOut'));
            $checkInHour = $request->get('checkinhour');
            $checkOutHour = $request->get('checkouthour');

            $Reservation = $em->getRepository('AppBundle:Reservation')->find($reservation_id);

            if ($checkOut <= $checkIn) {
                return $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
            }

            $reservations_in_range = $em->getRepository('AppBundle:Reservation')->checkReservationAvailableByProperty(
                $Reservation->getProperty()->getId(),
                $checkIn,
                $checkOut,
                $checkInHour,
                $checkOutHour,
                $Reservation->getId()
            );
            if ($reservations_in_range != null) {
                return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            $Reservation->setStatus($Status_conf);
            $Reservation->setCheckIn($checkIn);
            $Reservation->setCheckout($checkOut);
            $Reservation->setCheckInHour($checkInHour);
            $Reservation->setCheckOutHour($checkOutHour);

            $em->persist($Reservation);
            $em->flush();

            //*********************************** Send Email to Guest Informing the confirmation ***********************************************************//
            $template = "AdminBundle:Default:new-reservation-confirmed-mail.html.twig";
            $options = array('reservation' => $Reservation, 'property' => $Reservation->getProperty());
            //$to = "support@homeescape.com";
            $to = $Reservation->getEmail();
            $from = array("booking@homeescape.com", 'HomeEscape');
            $subject = 'Your Reservation Request for property #' . $Reservation->getProperty()->getSerie(
                ) . ' has been confirmed';

            $this->sendEmail($template, $options, $to, $from, $subject);

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        }


        return $response->setStatusCode(Response::HTTP_OK);
        //return $this->redirect($this->generateUrl('admin_user_reservations', array('id' => $Reservation->getProperty()->getSerie())));
    }

    public function contactReservationGuestAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $reservation_id = $request->get('resId');
        $mensaje = $request->get('mensaje');

        //*********************************** Send Email to Guest ***********************************************************// 

        try {

            $reservation = $em->getRepository('AppBundle:Reservation')->find($reservation_id);

            $reply = new \Frontend\AppBundle\Entity\ReservationReply();
            $reply->setDateCreated(new \DateTime());
            $reply->setReservation($reservation);
            $reply->setText($mensaje);
            $em->persist($reply);
            //$em->persist($inquiry);
            $em->flush();
            $property = $reservation->getProperty();
            //*****************  SEND EMAIL TO GUEST **********************************************//

            $template = "AdminBundle:Default:new-reservation-reply-mail.html.twig";
            $options = array('reservation' => $reservation, 'reply' => $reply);
            //$to = "support@homeescape.com";
            $to = $reservation->getEmail();
            $from = array("booking@homeescape.com", 'HomeEscape');
            $subject = 'Regarding Your Reservation Request';

            $this->sendEmail($template, $options, $to, $from, $subject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response->setStatusCode(Response::HTTP_OK);
        //return $this->redirect($this->generateUrl('admin_user_reservations', array('id' => $Reservation->getProperty()->getSerie())));
    }

    public function contactOwnerSupportAction(Request $request)
    {

        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        $mensaje = $request->get('mensaje');
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $status_id = $this->container->getParameter('status.pending');
        $status = $em->getRepository('AppBundle:Status')->find($status_id);

        //*********************************** Send Email to Guest ***********************************************************// 

        if (isset($mensaje) && $mensaje != "") {
            try {
                $contact = new \Frontend\AppBundle\Entity\ContactOwner();
                $contact->setUser($user);
                $contact->setText($mensaje);
                $contact->setSerie($this->renderSerie());
                $contact->setDateCreated(new \DateTime());
                $contact->setStatus($status);
                $contact->setReplied(false);
                $em->persist($contact);
                //$em->persist($inquiry);
                $em->flush();

                //*****************  SEND EMAIL TO Admin **********************************************//

                $template = "AdminBundle:Default:owner-support-admin-mail.html.twig";
                $options = array('contact' => $contact);
                $to = "support@homeescape.com";
                $from = array("support@homeescape.com", 'HomeEscape');
                $subject = "New Owner Support Contact from " . $contact->getUser()->getName() . ' ' . $contact->getUser(
                    )->getLastName();

                $templateClient = "AdminBundle:Default:owner-support-client-mail.html.twig";
                $toClient = $contact->getUser()->getEmail();
                $subjectClient = "Thank you for contacting HomeEscape Owners Support.";

                $this->sendEmail($template, $options, $to, $from, $subject);
                $this->sendEmail($templateClient, $options, $toClient, $from, $subjectClient);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();

                return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response->setStatusCode(Response::HTTP_OK);
        //return $this->redirect($this->generateUrl('admin_user_reservations', array('id' => $Reservation->getProperty()->getSerie())));
    }

    public function cancelReservationAction(Request $request)
    {


        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        $status_pending_id = $this->container->getParameter('status.pending');
        $Status_pend = $em->getRepository('AppBundle:Status')->find($status_pending_id);

        $reservation_id = $request->get('resId');

        $Reservation = $em->getRepository('AppBundle:Reservation')->find($reservation_id);

        try {
            $Reservation->setStatus($Status_pend);
            $em->persist($Reservation);
            $em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response->setStatusCode(Response::HTTP_OK);
        //return $this->redirect($this->generateUrl('admin_user_reservations', array('id' => $Reservation->getProperty()->getSerie())));
    }

    public function createReservationAction($id, $filtro, Request $request)
    {


        //$type = $request->get('type');
        //$prop_pk  = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReservationFormType(),
            new \Frontend\AppBundle\Entity\Reservation(),
            array(
                'attr' => array(
                    'user' => $user,
                    'status' => $this->container->getParameter('status.active'),
                    'property' => $id
                )
            )
        );
        $form->handleRequest($request);
        $active_reservations = new ArrayCollection();
        //$reservations_in_range = new ArrayCollection();

        $status_confirmed_id = $this->container->getParameter('status.confirmed');
        $status_pending_id = $this->container->getParameter('status.pending');
        $Status_conf = $em->getRepository('AppBundle:Status')->find($status_confirmed_id);
        $Status_pend = $em->getRepository('AppBundle:Status')->find($status_pending_id);


        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Reservations', 'path' => '', 'class' => 'active')
        );


        $property = $em->getRepository('AppBundle:Property')->findOneBy(
            array('serie' => $id, 'status' => $this->container->getParameter('status.active'))
        );

        if ($form->isValid()) {
            $Reservation = new \Frontend\AppBundle\Entity\Reservation();
            $Reservation = $form->getData();

            $property_id = $form['property']->getData();
            $checkIn = $form['checkIn']->getData();
            $checkOut = $form['checkOut']->getData();
            $checkInHour = $form['checkinhour']->getData();
            $checkOutHour = $form['checkouthour']->getData();
            //var_dump($property_id);
            $status = $form['status']->getData();

            if ($checkOut <= $checkIn) {
                $this->get('session')->getFlashBag()->add('notice', 'Date Range Invalid !');

                return $this->render(
                    'AdminBundle:Default:reservationForm.html.twig',
                    array(
                        'form' => $form->createView(),
                        'id' => $id,
                        'path' => 'create_reservation_owner',
                        'property' => $property,
                        'filtro' => $filtro,
                        'root' => 'property_reservations_list'
                    )
                );
            }


            if ($status->getId() == $status_confirmed_id) {
                $reservations_in_range = $em->getRepository(
                    'AppBundle:Reservation'
                )->checkReservationAvailableByProperty(
                    $property_id,
                    $checkIn,
                    $checkOut,
                    $checkInHour,
                    $checkOutHour,
                    null
                );
                if ($reservations_in_range != null) {

                    $this->get('session')->getFlashBag()->add('notice', 'The property is reserved on this date !');

                    return $this->render(
                        'AdminBundle:Default:reservationForm.html.twig',
                        array(
                            'form' => $form->createView(),
                            'id' => $id,
                            'path' => 'create_reservation_owner',
                            'property' => $property,
                            'filtro' => $filtro,
                            'root' => 'property_reservations_list'
                        )
                    );
                }
            }

            $Reservation->setDateCreated(new \DateTime);
            $em->persist($Reservation);
            $em->flush();


            return $this->redirect(
                $this->generateUrl(
                    'admin_user_reservations',
                    array('id' => $Reservation->getProperty()->getSerie(), 'filtro' => $filtro)
                )
            );
        }

        return $this->render(
            'AdminBundle:Default:reservationForm.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $id,
                'path' => 'create_reservation_owner',
                'property' => $property,
                'filtro' => $filtro,
                'root' => 'property_reservations_list'
            )
        );
    }

    public function bookitFormAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $Inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);
        $Property = $Inquiry->getProperty();
        //$active_reservations = new ArrayCollection();
        $now = new DateTime();

        $Reservation = new \Frontend\AppBundle\Entity\Reservation();
        if ($Inquiry->getStartDate() < $now) {
            $Reservation->setCheckIn($now);
        } else {
            $Reservation->setCheckIn($Inquiry->getStartDate());
        }

        if ($Inquiry->getEndDate() < $now) {
            $Reservation->setCheckout($now);
        } else {
            $Reservation->setCheckout($Inquiry->getEndDate());
        }
        $Reservation->setFirstName($Inquiry->getGuest());
        $Reservation->setLastName($Inquiry->getLastName());
        $Reservation->setAdults($Inquiry->getAdults());
        $Reservation->setChildren($Inquiry->getChildren());
        $Reservation->setEmail($Inquiry->getEmail());
        $Reservation->setPhone($Inquiry->getPhone());
        $Reservation->setProperty($Property);
        //$Reservation->setDateCreated(new \DateTime);


        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReservationFormType(),
            $Reservation,
            array(
                'attr' => array(
                    'user' => $Property->getUser(),
                    'status' => $this->container->getParameter('status.active'),
                    'property' => $Property->getSerie()
                )
            )
        );

        return $this->render(
            'AdminBundle:Default:bookitForm.html.twig',
            array('form' => $form->createView(), 'id' => $id, 'property' => $Property)
        );
    }

    public function editReservationAction($id, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $Reservation = $em->getRepository('AppBundle:Reservation')->find($id);

        if (!$Reservation) {
            throw $this->createNotFoundException('No Reservation found for is ' . $id);
        }

        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\editReservationFormType(),
            $Reservation,
            array(
                'attr' => array(
                    'resId' => $Reservation->getId(),
                    'user' => $Reservation->getProperty()->getUser(),
                    'status' => $this->container->getParameter('status.active'),
                    'property' => $Reservation->getProperty()->getSerie()
                )
            )
        );
        $form->handleRequest($request);
        $checkIn = $form['checkIn']->getData();
        $checkOut = $form['checkOut']->getData();

        if ($form->isValid()) {

            $reservations_in_range = $em->getRepository('AppBundle:Reservation')->checkReservationAvailableByProperty(
                $property_id,
                $checkIn,
                $checkOut,
                $checkInHour,
                $checkOutHour,
                null
            );

            if ($reservations_in_range != null) {

                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'The property is reserved on this date !'
                );

                return $this->render(
                    'AdminBundle:Default:reservation-form.html.twig',
                    array(
                        'form' => $form->createView(),
                        'id' => $Reservation->getId(),
                        'property' => $Reservation->getProperty(),
                    )
                );
            } else {


                //$Reservation->setDateUpdated(new \DateTime);
                $em->persist($Reservation);
                $em->flush();


                return $this->redirect(
                    $this->generateUrl(
                        'admin_user_reservations',
                        array('id' => $Reservation->getProperty()->getSerie())
                    )
                );
            }
        }

        return $this->render(
            'AdminBundle:Default:reservation-form.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $Reservation->getId(),
                'property' => $Reservation->getProperty(),
            )
        );
    }

    public function editReservationOldAction($id, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $Reservation = $em->getRepository('AppBundle:Reservation')->find($id);

        if (!$Reservation) {
            throw $this->createNotFoundException('No Reservation found for is ' . $id);
        }

        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReservationFormType(),
            $Reservation,
            array(
                'attr' => array(
                    'user' => $Reservation->getProperty()->getUser(),
                    'status' => $this->container->getParameter('status.active'),
                    'property' => $Reservation->getProperty()->getSerie()
                )
            )
        );
        $form->handleRequest($request);
        $checkIn = $form['checkIn']->getData();
        $checkOut = $form['checkOut']->getData();

        if ($form->isValid()) {

            $reservations_in_range = $em->getRepository('AppBundle:Reservation')->checkReservationAvailableByProperty(
                $property_id,
                $checkIn,
                $checkOut,
                $checkInHour,
                $checkOutHour,
                null
            );

            if ($reservations_in_range != null) {

                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'The property is reserved on this date !'
                );

                return $this->render(
                    'AdminBundle:Default:reservation-form.html.twig',
                    array(
                        'form' => $form->createView(),
                        'id' => $Reservation->getId(),
                        'property' => $Reservation->getProperty(),
                    )
                );
            } else {


                //$Reservation->setDateUpdated(new \DateTime);
                $em->persist($Reservation);
                $em->flush();


                return $this->redirect(
                    $this->generateUrl(
                        'admin_user_reservations',
                        array('id' => $Reservation->getProperty()->getSerie())
                    )
                );
            }
        }

        return $this->render(
            'AdminBundle:Default:reservation-form.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $Reservation->getId(),
                'property' => $Reservation->getProperty(),
            )
        );
    }

    public function contactFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $contact = new \Frontend\AppBundle\Entity\Contact();

        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ContactFormType(), $contact);

        return $this->render(
            'AdminBundle:Default:contactForm.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    public function contactEditFormAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:Contact')->find($id);

        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ContactFormType(), $contact);

        return $this->render(
            'AdminBundle:Default:contactForm.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    public function periodFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $period = new \Frontend\AppBundle\Entity\Period();
        $property_id = $request->get('id');
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\PeriodsFormType(), $period);

        return $this->render(
            'AdminBundle:Default:periodForm.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $property_id
            )
        );
    }

    public function editPeriodFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $id = $request->get('id');
        $property_id = $request->get('pid');
        $period = $em->getRepository('AppBundle:Period')->find($id);

        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\PeriodsFormType(), $period);

        return $this->render(
            'AdminBundle:Default:periodForm.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $property_id
            )
        );
    }


    public function editPeriodStandardFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $id = $request->get('id');
        $property_id = $request->get('pid');
        $period = $em->getRepository('AppBundle:Period')->find($id);

        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\editPeriodsFormType(), $period);

        return $this->render(
            'AdminBundle:Default:periodStandardForm.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $property_id
            )
        );
    }

    public function replyInquiryFormAction($id, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $InquiryReply = new \Frontend\AppBundle\Entity\InquiryReply();
        $Inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);


        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\InquiryReplyFormType(), $InquiryReply);

        return $this->render(
            'AdminBundle:Default:inquiryReadReply-form.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $Inquiry->getId(),
                'inq' => $Inquiry,
            )
        );
    }

    public function replyInquiryListFormAction($id, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\InquiryReplyFormType());
        $email = $em->getRepository('AppBundle:Email')->find($id);

        return $this->render(
            'AdminBundle:Default:inquiryReplyListAdd-form.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $email->getId(),
                'inq' => $email,
                'email' => $email
            )
        );
    }

    public function noteInquiryFormAction($id, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $InquiryNote = new \Frontend\AppBundle\Entity\InquiryNote();
        $Inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);


        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\InquiryNoteFormType(), $InquiryNote);

        return $this->render(
            'AdminBundle:Default:inquiryNote-form.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $Inquiry->getId(),
                'inq' => $Inquiry,
            )
        );
    }

    public function bookInquiryFormAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $Inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);
        $Property = $Inquiry->getProperty();

        //$active_reservations = new ArrayCollection();
        $now = new DateTime();

        $Reservation = new \Frontend\AppBundle\Entity\Reservation();
        if ($Inquiry->getStartDate() < $now) {
            $Reservation->setCheckIn($now);
        } else {
            $Reservation->setCheckIn($Inquiry->getStartDate());
        }

        if ($Inquiry->getEndDate() < $now) {
            $Reservation->setCheckout($now);
        } else {
            $Reservation->setCheckout($Inquiry->getEndDate());
        }
        $Reservation->setFirstName($Inquiry->getGuest());
        $Reservation->setLastName($Inquiry->getLastName());
        $Reservation->setAdults($Inquiry->getAdults());
        $Reservation->setChildren($Inquiry->getChildren());
        $Reservation->setEmail($Inquiry->getEmail());
        $Reservation->setPhone($Inquiry->getPhone());
        $Reservation->setProperty($Property);
        //$Reservation->setDateCreated(new \DateTime);


        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReservationFormType(),
            $Reservation,
            array(
                'attr' => array(
                    'user' => $Property->getUser(),
                    'status' => $this->container->getParameter('status.active'),
                    'property' => $Property->getSerie()
                )
            )
        );

        return $this->render(
            'AdminBundle:Default:bookitModalForm.html.twig',
            array('form' => $form->createView(), 'id' => $id, 'property' => $Property)
        );
    }

    public function calendarAction($id)
    {


        $properties_select = true;
        $filter = false;
        $add = true;
        $print = false;
        $download = false;
        $search = false;
        $location = false;

        $expired_alert = false;
        $new_reservation = false;
        $list = false;

        $suser = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();

        $property = $em->getRepository('AppBundle:Property')->findOneBy(
            array('serie' => $id, 'status' => $this->container->getParameter('status.active'))
        );

        if ($property != null) {
            $breadcrumbs = array(
                array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => $property->getDescription()->getName(), 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => 'Calendar', 'path' => '', 'class' => 'active')
            );
        } else {
            $breadcrumbs = array(
                array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => 'Calendar', 'path' => '', 'class' => 'active')
            );
        }

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReservationFormType(),
            new \Frontend\AppBundle\Entity\Reservation(),
            array(
                'attr' => array(
                    'user' => $user,
                    'status' => $this->container->getParameter('status.active'),
                    'property' => $id
                )
            )
        );

        return $this->render(
            'AdminBundle:Default:calendar.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'form' => $form->createView(),
                'path' => 'admin_user_calendar',
                'root' => 'property_calendar_list'
            )
        );
    }

    public function devuelveArrayFechasEntreOtrasDos($fechaInicio, $fechaFin)
    {
        $arrayFechas = array();
        $fechaMostrar = $fechaInicio;

        while (strtotime($fechaMostrar) <= strtotime($fechaFin)) {
            $arrayFechas[] = $fechaMostrar;
            $fechaMostrar = date("n/j/Y", strtotime($fechaMostrar . " + 1 day"));
        }

        return $arrayFechas;
    }

    public function getreservedDaysAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $id = $request->request->get('id');
        $property = $em->getRepository('AppBundle:Property')->find($id);
        $dates = array();
        $dates1 = array();
        $response_array = array();
        $reservations = $property->getReservationsByStatus($this->container->getParameter('status.confirmed'));
        $reservationsPending = $property->getReservationsByStatus($this->container->getParameter('status.pending'));
        foreach ($reservationsPending as $res) {
            array_push(
                $dates1,
                $this->devuelveArrayFechasEntreOtrasDos(
                    $res->getCheckIn()->format('n/j/Y'),
                    $res->getCheckout()->format('n/j/Y')
                )
            );
            //array_push($dates, $reservation->getCheckout()->format('n/j/Y'));
        }

        foreach ($reservations as $reservation) {
            array_push(
                $dates,
                $this->devuelveArrayFechasEntreOtrasDos(
                    $reservation->getCheckIn()->format('n/j/Y'),
                    $reservation->getCheckout()->format('n/j/Y')
                )
            );
            //array_push($dates, $reservation->getCheckout()->format('n/j/Y'));
        }
        $date_array = $dates;
        $date_array1 = $dates1;
        array_push($response_array, $date_array);
        array_push($response_array, $date_array1);

        //you can return result as JSON
        return new Response(json_encode($response_array));
    }

    public function updateNewInquiryAction()
    {
        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $request = $this->get('request');
        $id = $request->request->get('id');


        try {

            $inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);
            $inquiry->setViewed(true);
            $em->persist($inquiry);
            $em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function updateNewReviewAction()
    {
        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $request = $this->get('request');
        $id = $request->request->get('id');


        try {

            $review = $em->getRepository('AppBundle:review')->find($id);
            $review->setViewed(true);
            $em->persist($review);
            $em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function saveInquiryReplyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $request = $this->get('request');
        $id = $request->request->get('id');
        $text = $request->request->get('text');

        try {

            $email = $em->getRepository('AppBundle:Email')->find($id);
            $reply = new \Frontend\AppBundle\Entity\EmailReply();
            $reply->setDateCreated(new \DateTime());
            $reply->setEmail($email);
            $reply->setText($text);
            $em->persist($reply);
            $em->flush();

            //*****************  SEND EMAIL TO GUEST **********************************************//

            /*$template = "AdminBundle:Default:new-inquiry-reply-mail.html.twig";
            $options = array('Inquiry' => $email, 'reply' => $reply);
            $to = $email->getRemitentMail();
            $from = array("inquiry@homeescape.com", 'Free Auto Listing');
            $subject = 'Your Email for vehicle #' . $email->getVehicle()->getSerie() . ' has been replied';

            $this->sendEmail($template, $options, $to, $from, $subject);*/

            return $response->setStatusCode(Response::HTTP_OK);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function saveInquiryNoteAction()
    {
        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $request = $this->get('request');
        $id = $request->request->get('id');
        //$form = $request->request->get('form');
        $text = $request->request->get('text');


        try {

            $status_id = $this->container->getParameter('status.replied');
            $status = $em->getRepository('AppBundle:Status')->find($status_id);
            $inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);
            $inquiry->setStatus($status);
            $note = new \Frontend\AppBundle\Entity\InquiryNote();
            $note->setDateCreated(new \DateTime());
            $note->setInquiry($inquiry);
            $note->setText($text);
            $em->persist($note);
            //$em->persist($inquiry);
            $em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function saveReviewReplyAction()
    {
        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $request = $this->get('request');
        $id = $request->request->get('id');
        //$form = $request->request->get('form');
        $text = $request->request->get('text');
        $status_id = $this->container->getParameter('status.replied');

        try {

            //$status = $em->getRepository('AppBundle:Status')->find($status_id);
            $review = $em->getRepository('AppBundle:Review')->find($id);
            //$review->setStatus($status);
            $reply = new \Frontend\AppBundle\Entity\ReviewReply();
            $reply->setDateCreated(new \DateTime());
            $reply->setReview($review);
            $reply->setText($text);
            $em->persist($reply);
            //$em->persist($inquiry);
            $em->flush();

            //*****************  SEND EMAIL TO GUEST **********************************************//
            $template = "AdminBundle:Default:new-review-reply-mail.html.twig";
            $options = array('review' => $review, 'reply' => $reply);
            $to = $review->getEmail();
            $from = array("review@homeescape.com", 'HomeEscape');
            $subject = 'Your Review for property #' . $review->getProperty()->getSerie() . ' has been replied';
            $this->sendEmail($template, $options, $to, $from, $subject);

        } catch (Exception $ex) {
            echo $ex->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function calendarMonthAction($id)
    {

        $properties_select = true;
        $filter = false;
        $add = true;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $list = false;

        $suser = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        if ($id == 'all') {
            $property = $em->getRepository('AppBundle:Property')->findOneBy(
                array('user' => $suser->getId()),
                array('dateCreated' => 'DESC')
            );
        } else {
            $property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);
        }

        /* $suser = $this->get('security.context')->getToken()->getUser();
          $user = $em->getRepository('AppBundle:User')->find($suser->getId());
          $properties = $user->getUserProperties(); */

        if (isset($property)) {
            $breadcrumbs = array(
                array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => $property->getDescription()->getName(), 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => 'Calendar', 'path' => '', 'class' => 'active')
            );
        } else {
            $breadcrumbs = array(
                array('name' => 'Error', 'path' => '', 'class' => 'active')
            );
        }

        return $this->render(
            'AdminBundle:Default:calendarMonth.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'property' => $property,
                'path' => 'admin_user_calendar'
            )
        );
    }

    public function reviewsAction($id, $filtro)
    {


        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());


        $reviews = new ArrayCollection();
        $reviews1 = new ArrayCollection();

        $Property = $em->getRepository('AppBundle:Property')->findOneBy(
            array('serie' => $id, 'status' => $this->container->getParameter('status.active'))
        );

        if ($Property != null) {
            if ($filtro == 'all') {

                foreach ($Property->getReviewsByStatus($this->container->getParameter('status.active')) as $review) {
                    $reviews1->add($review);
                }
            } else {
                if ($filtro == 'new') {
                    foreach ($Property->getNewReviews($this->container->getParameter('status.active')) as $review) {
                        $reviews1->add($review);
                    }
                }
            }


            // ordeno la lista de reviews con los mas nuevos arriba
            $iterator = $reviews1->getIterator();
            $iterator->uasort(
                function ($a, $b) {
                    return ($a->getId() < $b->getId()) ? 1 : -1;
                }
            );
            $reviews = new ArrayCollection(iterator_to_array($iterator));

        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($reviews, $this->get('request')->query->get('page', 1), 10);


        return $this->render(
            'AdminBundle:Default:reviews.html.twig',
            array(
                'reviews' => $pagination,
                'id' => $id,
                'property' => $Property,
                'path' => 'admin_user_reviews',
                'filtro' => $filtro,
                'root' => 'property_reviews_list'
            )
        );
    }

    public function createReviewAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReviewFormType(),
            new \Frontend\AppBundle\Entity\Review(),
            array('attr' => array('user' => $user, 'status' => $this->container->getParameter('status.active')))
        );
        $form->handleRequest($request);

        $ip_addr = $_SERVER['REMOTE_ADDR'];


        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'New Review', 'path' => '', 'class' => 'active')
        );

        if ($form->isValid()) {

            $Review = new \Frontend\AppBundle\Entity\Review();
            $Review = $form->getData();

            $property = $form['property']->getData();
            $propertyRate = $property->getRating();

            $propertyRate->setTotalCount($propertyRate->getTotalCount() + 1);
            $propertyRate->setTotalRate($propertyRate->getTotalRate() + $form['valoration']->getData());
            $propertyRate->setAverage($propertyRate->calcAverage());

            $em->persist($propertyRate);
            $status_id = $this->container->getParameter('status.pending');
            $Status = $em->getRepository('AppBundle:Status')->find($status_id);
            $Review->setStatus($Status);
            $Review->setIpAddress($ip_addr);
            $Review->setDateCreated(new \DateTime);
            $Review->setDateUpdated(new \DateTime);
            $em->persist($Review);
            $em->flush();


            return $this->redirect($this->generateUrl('admin_user_reviews', array('id' => 'all')));
        }

        return $this->render(
            'AdminBundle:Default:reviewForm.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    public function editReviewAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $Review = $em->getRepository('AppBundle:Review')->find($id);

        if (!$Review) {
            throw $this->createNotFoundException('No Review found for this ' . $id);
        }

        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReviewFormType(),
            $Review,
            array(
                'attr' => array(
                    'user' => $Review->getProperty()->getUser(),
                    'status' => $this->container->getParameter('status.active')
                )
            )
        );
        $form->handleRequest($request);


        if ($form->isValid()) {
            $Review->setDateUpdated(new \DateTime);
            $em->persist($Review);
            $em->flush();


            return $this->redirect($this->generateUrl('admin_user_reviews', array('id' => 'all')));
        }

        return $this->render(
            'AdminBundle:Default:editReviewForm.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $Review->getId()
            )
        );
    }

    public function editUserProfileAction($uid, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($uid);

        $name = $request->get('userProfile')['name'];
        $lastname = $request->get('userProfile')['lastName'];
        $email = $request->get('userProfile')['email'];
        $phone = $request->get('userProfile')['phone'];

        if (isset($name) && isset($lastname) && isset($email)) {
            $user->setName($name);
            $user->setLastName($lastname);
            $user->setEmail($email);
            $user->setEmailCanonical($email);
            $user->setUsername($email);
            $user->setUsernameCanonical($email);
            $user->setPhone($phone);
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_user_account'));
        }

        $breadcrumbs = array(
            array('name' => 'Account Information', 'path' => 'admin_user_account', 'class' => ''),
            array('name' => 'Edit', 'path' => '', 'class' => 'active')
        );

        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        return $this->render(
            'AdminBundle:Default:userProfileForm.html.twig',
            array(
                'user' => $uid,
                'path' => 'editPropertyHome',
                'name' => $user->getName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
                'phone' => $user->getPhone(),
                'root' => 'none',
                'breadcrumbs' => $breadcrumbs,
                'add' => false,
                'list' => false,
                'properties_select' => true,
                'properties' => $properties,
                'filter' => false,
                'new_reservation' => false,
                'print' => false,
                'download' => false,
                'expired_alert' => false,
                'search' => false,

            )
        );
    }

    public function settingsAction()
    {

        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = false;

        $breadcrumbs = array(
            array('name' => 'Settings', 'path' => 'admin_user_settings', 'class' => '')
        );

        return $this->render(
            'AdminBundle:Default:settings.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'print' => $print,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'add' => $add,
                'list' => $list,
                'path' => 'editPropertyHome'
            )
        );
    }

    public function accountAction()
    {

        $properties_select = true;
        $filter = false;
        $add = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $list = true;


        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        $breadcrumbs = array(
            array('name' => 'Account Information', 'path' => 'admin_user_account', 'class' => '')
        );

        return $this->render(
            'AdminBundle:Default:user-account.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'user' => $user,
                'path' => 'editPropertyHome',
                'properties' => $properties,
                'root' => 'none'
            )
        );
    }

    public function listingAction()
    {

        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = true;
        $new_reservation = false;
        $add = false;
        $list = false;

        $breadcrumbs = array(
            array('name' => 'My Properties', 'path' => 'admin_user_homepage', 'class' => '')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );


        return $this->render(
            'AdminBundle:Default:propertyEditList.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'message' => 'Please select the listing you would like to edit:',
                'properties' => $properties,
                'path' => "edit_property",
                'type' => 'description',
                'root' => 'none'
            )
        );
    }

    public function listingInquiriesAction()
    {

        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = false;


        $breadcrumbs = array(
            array('name' => 'My Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Inquiries', 'path' => '', 'class' => 'active')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatus(
            $user,
            $this->container->getParameter('status.active')
        );

        $newInquiries = $em->getRepository('AppBundle:Inquiry')->getLastInquiriesByUser(
            $suser->getId(),
            10,
            $this->container->getParameter('status.active')
        );

        return $this->render(
            'AdminBundle:Default:propertyInquiriesList.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'message' => 'Select a property to show their Inquiries:',
                'properties' => $properties,
                'path' => "admin_user_inquiries",
                'param' => 'full',
                'inquiries' => $newInquiries,
                'root' => 'none'
            )
        );
    }

    public function listingReservationsAction()
    {

        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = false;

        $breadcrumbs = array(
            array('name' => 'My Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Reservations', 'path' => '', 'class' => 'active')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatus(
            $user,
            $this->container->getParameter('status.active')
        );
        $newReservations = $em->getRepository('AppBundle:Reservation')->getLastReservationsByUser(
            $suser->getId(),
            10,
            $this->container->getParameter('status.active')
        );


        return $this->render(
            'AdminBundle:Default:propertyReservationsList.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'message' => 'Select a property to show their Reservations:',
                'properties' => $properties,
                'path' => 'admin_user_reservations',
                'param' => 'all',
                'reservations' => $newReservations,
                'root' => 'none'
            )
        );
    }

    public function listingCalendarAction()
    {

        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = true;
        $new_reservation = false;
        $add = false;
        $list = false;

        $breadcrumbs = array(
            array('name' => 'My Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Calendar', 'path' => '', 'class' => 'active')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );


        return $this->render(
            'AdminBundle:Default:propertyCalendarList.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'message' => "Select a property to show it's Calendar:",
                'properties' => $properties,
                'path' => 'admin_user_calendar',
                'root' => 'none'
            )
        );
    }

    public function listingDeactivateAction()
    {

        $properties_select = false;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = true;
        $new_reservation = false;
        $add = false;
        $list = false;

        $breadcrumbs = array(
            array('name' => 'My Properties', 'path' => 'admin_user_homepage', 'class' => '')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatus(
            $user,
            $this->container->getParameter('status.active')
        );
        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\DeactivationRequestFormType(),
            new \Frontend\AppBundle\Entity\UserRequest()
        );


        return $this->render(
            'AdminBundle:Default:propertyDeactivateList.html.twig',
            array(
                'form' => $form->createView(),
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'message' => "Select a property to deactivate:",
                'properties' => $properties
            )
        );
    }

    public function listingReviewsAction()
    {

        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = false;

        $breadcrumbs = array(
            array('name' => 'My Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Reviews', 'path' => '', 'class' => 'active')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatus(
            $user,
            $this->container->getParameter('status.active')
        );
        $newReviews = $em->getRepository('AppBundle:Review')->getLastReviewsByUser(
            $suser->getId(),
            10,
            $this->container->getParameter('status.active')
        );


        return $this->render(
            'AdminBundle:Default:propertyReviewsList.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'message' => "Select a property to show their Reviews:",
                'properties' => $properties,
                'path' => 'admin_user_reviews',
                'param' => 'all',
                'reviews' => $newReviews,
                'root' => 'none'
            )
        );
    }

    public function toolsAction()
    {

        $properties_select = true;
        $filter = false;
        $print = true;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = true;

        $breadcrumbs = array(
            array('name' => 'My Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Tools', 'path' => '', 'class' => 'active')
        );

        return $this->render(
            'AdminBundle:Default:tools.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'print' => $print,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs
            )
        );
    }

    public function dashboardAction($id)
    {

        $properties_select = true;
        $filter = false;
        $add = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $list = false;
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReservationFormType(),
            new \Frontend\AppBundle\Entity\Reservation(),
            array(
                'attr' => array(
                    'user' => $suser->getId(),
                    'status' => $this->container->getParameter('status.active'),
                    'property' => $id
                )
            )
        );

        $property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);
        $propertyRate = $property->getRating();
        $rating = $propertyRate->getAverage();
        $news = $em->getRepository('AppBundle:News')->findBy(
            array('new' => true, 'status' => $this->container->getParameter('status.posted')),
            array('dateCreated' => 'DESC')
        );
        /* $suser = $this->get('security.context')->getToken()->getUser();
          $user = $em->getRepository('AppBundle:User')->find($suser->getId());
          $properties = $user->getUserProperties(); */
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );
        if (isset($property)) {

            $past_reservations = $em->getRepository('AppBundle:Reservation')->getPastReservationsByProperty($property);
            $status_id = $this->container->getParameter('status.inactive');
            $Status = $em->getRepository('AppBundle:Status')->find($status_id);


            $inquiries = $property->getNewInquiries();
            $reservation = $em->getRepository('AppBundle:Reservation')->getCurrentReservationByProperty($property);
            $next_reservation = $em->getRepository('AppBundle:Reservation')->getNextReservationByProperty($property);
            $inquiries_count = count($inquiries);

            $breadcrumbs = array(
                array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => $property->getDescription()->getName(), 'path' => '', 'class' => 'active')
            );
        } else {
            $breadcrumbs = array(
                array('name' => 'Error', 'path' => '', 'class' => 'active')
            );
        }

        return $this->render(
            'AdminBundle:Default:dashboard.html.twig',
            array(
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'print' => $print,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'property' => $property,
                'inquiries_count' => $inquiries_count,
                'inquiries' => $inquiries,
                'current_reservation' => $reservation,
                'next_reservation' => $next_reservation,
                'rating' => $rating,
                'form' => $form->createView(),
                'id' => $id,
                'properties' => $properties,
                'path' => 'editPropertyHome',
                'news' => $news,
                'root' => 'admin_user_homepage'
            )
        );
    }

    public function listPropertiesAction($id, $path, $root, $param = null, $type = null)
    {

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        if ($path == 'admin_user_inquiries' || $path == 'admin_user_reservations' || $path == 'admin_user_reviews' || $path == 'admin_user_calendar' || $path == 'create_reservation_owner') {
            $properties = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatus(
                $user,
                $this->container->getParameter('status.active')
            );
        } else {
            $properties = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
                $user,
                $this->container->getParameter('status.active'),
                $this->container->getParameter('status.inactive')
            );
        }

        //$properties = $user->getUserPropertiesByStatus(1);

        return $this->render(
            'AdminBundle:Default:listProperties.html.twig',
            array(
                'properties' => $properties,
                'id' => $id,
                'path' => $path,
                'param' => $param,
                'type' => $type,
                'root' => $root,
            )
        );
    }


    public function notesAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $Inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);

        return $this->render(
            'AdminBundle:Default:notes.html.twig',
            array(
                'inquiry' => $Inquiry
            )
        );
    }

    public function replysAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $Inquiry = $em->getRepository('AppBundle:Inquiry')->find($id);

        return $this->render(
            'AdminBundle:Default:replys.html.twig',
            array(
                'inquiry' => $Inquiry
            )
        );
    }

    public function addPropertyAction(Request $request)
    {

        $properties_select = false;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = true;

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $session->set('saved', 0);


        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'New Property', 'path' => '', 'class' => 'active')
        );

        $em = $this->getDoctrine()->getManager();
        $propertyEntity = new Property();
        $form = $this->createForm(new PropertyFormType(), $propertyEntity, array());
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        return $this->render(
            'AdminBundle:Default:propertyForm.html.twig',
            array(
                'form' => $form->createView(),
                'properties_select' => $properties_select,
                'filter' => $filter,
                'add' => $add,
                'list' => $list,
                'print' => $print,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'prop_pk' => 'new',
                'user' => $user
            )
        );
    }

    public function generateFormAction($id, $type, Request $request)
    {

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $session->set('saved', 0);

        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);

        return $this->generateForm($Property->getSerie(), $type);
    }

    public function callgenerateFormAction($id, $type, Request $request)
    {
        generateForm($id, $type);
    }

    public function generateForm($id, $type)
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $session->set('saved', 0);
        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Profile')->findOneBySerie($id);
        switch ($type) {
            case 'amenities':

                $breadcrumbs = array(
                    array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                );

                $form = $this->createForm(new AmenitiesFormType(), new Amenities());
                if ($Property->getAmenities() == null) {
                    return $this->render(
                        'AdminBundle:Default:' . $type . 'Form.html.twig',
                        array(
                            'form' => $form->createView(),
                            'properties_select' => false,
                            'filter' => false,
                            'add' => false,
                            'list' => true,
                            'print' => false,
                            'download' => false,
                            'search' => false,
                            'location' => false,
                            'property' => false,
                            'expired_alert' => false,
                            'new_reservation' => false,
                            'breadcrumbs' => $breadcrumbs,
                            'prop_pk' => $Property->getSerie()
                        )
                    );
                } else {

                    $breadcrumbs = array(
                        array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                        array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                    );

                    return $this->redirect(
                        $this->generateUrl(
                            'edit_amenities_property',
                            array('id' => $Property->getSerie(), 'type' => $type)
                        )
                    );
                }

                break;
            case 'location':

                $breadcrumbs = array(
                    array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                );

                $form = $this->createForm(new LocationFormType(), new Location());
                if ($Property->getLocation() == null) {
                    return $this->render(
                        'AdminBundle:Default:' . $type . 'Form.html.twig',
                        array(
                            'form' => $form->createView(),
                            'properties_select' => false,
                            'filter' => false,
                            'add' => false,
                            'list' => true,
                            'print' => false,
                            'download' => false,
                            'search' => false,
                            'location' => false,
                            'property' => false,
                            'expired_alert' => false,
                            'new_reservation' => false,
                            'breadcrumbs' => $breadcrumbs,
                            'prop_pk' => $Property->getSerie(),
                            'prop' => $Property
                        )
                    );
                } else {

                    $breadcrumbs = array(
                        array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                        array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                    );

                    return $this->render(
                        'AdminBundle:Default:editLocationForm.html.twig',
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
                            'id' => $Property->getSerie(),
                            'propertyE' => $Property
                        )
                    );
                }

                break;

            case 'description':

                $breadcrumbs = array(
                    array('name' => 'Create your Dealership ', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => $Property->getSerie(), 'path' => '', 'class' => 'active')
                );


                $form = $this->createForm(new DescriptionFormType(), new Description());
                if ($Property->getDescription() == null) {

                    return $this->render(
                        'AdminBundle:Default:new-profile.html.twig',
                        array(
                            'form' => $form->createView(),
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
                            'prop_pk' => $Property->getSerie()
                        )
                    );
                } else {

                    $breadcrumbs = array(
                        array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                        array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                    );

                    return $this->redirect(
                        $this->generateUrl('edit_property', array('id' => $Property->getSerie(), 'type' => $type))
                    );
                }

                break;

            case 'policiesPayments':

                $breadcrumbs = array(
                    array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                );


                $form = $this->createForm(new PoliciesPaymentsFormType(), new PoliciesPayments());
                if ($Property->getPoliciesPayments() == null) {

                    return $this->render(
                        'AdminBundle:Default:' . $type . 'Form.html.twig',
                        array(
                            'form' => $form->createView(),
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
                            'prop_pk' => $Property->getSerie()
                        )
                    );
                } else {

                    $breadcrumbs = array(
                        array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                        array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                    );

                    return $this->redirect(
                        $this->generateUrl(
                            'edit_policies_property',
                            array('id' => $Property->getSerie(), 'type' => $type)
                        )
                    );
                }

                break;

            case 'rates':

                $breadcrumbs = array(
                    array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                );


                if ($Property->getRates() == null) {
                    //echo 'entre por aki';
                    //exit;
                    $rates = new Rates();
                    //$period = new \Frontend\AppBundle\Entity\Period();
                    //$rates->getPeriods()->add($period);

                    $form = $this->createForm(new RatesFormType(), $rates);

                    return $this->render(
                        'AdminBundle:Default:' . $type . 'Form.html.twig',
                        array(
                            'form' => $form->createView(),
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
                            'prop_pk' => $Property->getSerie()
                        )
                    );
                } else {

                    $form = $this->createForm(new RatesFormType(), $Property->getRates());

                    return $this->render(
                        'AdminBundle:Default:editRatesForm.html.twig',
                        array(
                            'form' => $form->createView(),
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
                            'id' => $Property->getSerie()
                        )
                    );
                }

                break;

            case 'gallery':

                $breadcrumbs = array(
                    array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                );

                $gallery = new Gallery();

                $form = $this->createForm(new GalleryFormType(), $gallery);

                $breadcrumbs = array(
                    array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                );

                return $this->redirect(
                    $this->generateUrl('edit_gallery_property', array('id' => $Property->getSerie(), 'type' => $type))
                );


                break;


            case 'calendar':

                $suser = $this->get('security.context')->getToken()->getUser();
                $user = $em->getRepository('AppBundle:User')->find($suser->getId());
                $form = $this->createForm(
                    new \Frontend\AppBundle\Form\Type\ReservationFormType(),
                    new \Frontend\AppBundle\Entity\Reservation(),
                    array(
                        'attr' => array(
                            'user' => $user,
                            'status' => $this->container->getParameter('status.active'),
                            'property' => $id
                        )
                    )
                );

                $breadcrumbs = array(
                    array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                );

                return $this->render(
                    'AdminBundle:Default:' . $type . 'Form.html.twig',
                    array(
                        'properties_select' => false,
                        'filter' => false,
                        'print' => false,
                        'add' => false,
                        'list' => true,
                        'download' => false,
                        'search' => false,
                        'location' => false,
                        'property' => $Property,
                        'expired_alert' => false,
                        'new_reservation' => false,
                        'breadcrumbs' => $breadcrumbs,
                        'prop_pk' => $Property->getSerie(),
                        'form' => $form->createView()
                    )
                );


                break;

            default:

                $breadcrumbs = array(
                    array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
                    array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
                );

                $form = $this->createForm(new DescriptionFormType(), new Description());
                if ($Property->getDescription() == null) {

                    return $this->render(
                        'AdminBundle:Default:' . $type . 'Form.html.twig',
                        array(
                            'form' => $form->createView(),
                            'properties_select' => false,
                            'filter' => false,
                            'print' => false,
                            'download' => false,
                            'search' => false,
                            'add' => false,
                            'list' => true,
                            'location' => false,
                            'property' => false,
                            'expired_alert' => false,
                            'new_reservation' => false,
                            'breadcrumbs' => $breadcrumbs
                        )
                    );


                    break;
                }
        }
    }

    public function createLocationPropertyAction($prop_pk, Request $request)
    {
        $session = $request->getSession();
        $type = $request->get('type');
        $prop_pk = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new LocationFormType(), new Location());
        $form->handleRequest($request);
        $Property = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);

        $location = $form->getData();
        $country = $form['country']->getData();


        if ($country == 'United States') {
            $country = "USA";
        }
        $location->setCountry($country);
        $region = $form['administrative_area_level_1']->getData();
        $city = $form['locality']->getData();

        if ($form->isValid()) {
            $Property->setLocation($location);
            $Property->setDateCreated(new \DateTime);
            //$Property->setDateUpdated(new \DateTime);
            $em->persist($Property);
            $em->flush();
            $session->set('saved', 1);


            if ($type == 'location') {
                return $this->redirect(
                    $this->generateUrl(
                        'edit_location_property',
                        array('id' => $Property->getSerie(), 'type' => $type, 'prop' => $Property)
                    )
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }

        return $this->generateForm($Property->getSerie(), $type);
    }

    public function editLocationPropertyAction($id, Request $request)
    {


        $session = $request->getSession();
        $type = $request->get('type');
        $properties_select = false;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = true;


        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Property ' . $id, 'path' => '', 'class' => 'active')
        );


        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Profile')->findOneBySerie($id);

        if (!$Property) {
            throw $this->createNotFoundException('No Property found for this id ' . $id);
        }


        //$Property->setDateUpdated(new \DateTime);
        $em->persist($Property);
        $em->flush();
        $session->set('saved', 1);


        return $this->generateForm($Property->getSerie(), $type);


    }

    public function createAmenitiesPropertyAction($prop_pk, Request $request)
    {
        $session = $request->getSession();
        $type = $request->get('type');
        $prop_pk = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new AmenitiesFormType(), new Amenities());
        $form->handleRequest($request);
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($prop_pk);
        $amenities = $form->getData();

        if ($form->isValid()) {
            $Property->setAmenities($amenities);
            $Property->setDateCreated(new \DateTime);
            $Property->setDateUpdated(new \DateTime);
            $em->persist($Property);
            $em->flush();
            $session->set('saved', 1);

            if ($type == 'amenities') {
                return $this->redirect(
                    $this->generateUrl('edit_amenities_property', array('id' => $Property->getSerie(), 'type' => $type))
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }

        return $this->generateForm($Property->getSerie(), $type);
    }

    public function editAmenitiesPropertyAction($id, Request $request)
    {
        $session = $request->getSession();
        $type = $request->get('type');
        $properties_select = false;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = true;

        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Property ' . $id, 'path' => '', 'class' => 'active')
        );


        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);

        if (!$Property) {
            throw $this->createNotFoundException('No Property found for this id ' . $id);
        }

        $form = $this->createForm(new AmenitiesFormType(), $Property->getAmenities());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $Property->setDateUpdated(new \DateTime);
            $em->persist($Property);
            $em->flush();
            $session->set('saved', 1);
            if ($type == 'amenities') {
                return $this->redirect(
                    $this->generateUrl('edit_amenities_property', array('id' => $Property->getSerie(), 'type' => $type))
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }

        return $this->render(
            'AdminBundle:Default:editAmenitiesForm.html.twig',
            array(
                'form' => $form->createView(),
                'properties_select' => $properties_select,
                'filter' => $filter,
                'print' => $print,
                'add' => $add,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'id' => $Property->getSerie()
            )
        );
    }

    public function createPoliciesPropertyAction($prop_pk, Request $request)
    {
        $session = $request->getSession();
        $type = $request->get('type');
        $prop_pk = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new PoliciesPaymentsFormType(), new PoliciesPayments());
        $form->handleRequest($request);
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($prop_pk);
        $policy = $form->getData();

        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
        );

        if ($form->isValid()) {
            $Property->setPoliciesPayments($policy);
            $Property->setDateCreated(new \DateTime);
            $Property->setDateUpdated(new \DateTime);
            $em->persist($Property);
            $em->flush();
            $session->set('saved', 1);

            $template = "AdminBundle:Default:new-property-admin-mail.html.twig";
            $options = array('property' => $Property);
            $to = 'listing@homeescape.com';
            $toAdmin = 'admin@homeescape.com';
            $from = array("listing@homeescape.com", 'HomeEscape');
            $subject = "New listing created!";

            $templateClient = "AdminBundle:Default:new-property-owner-mail.html.twig";
            $toClient = $Property->getContact()->getEmail();
            $subjectClient = "Thank you for listing your property!";

            $this->sendEmail($template, $options, $to, $from, $subject);
            $this->sendEmail($template, $options, $toAdmin, $from, $subject);
            $this->sendEmail($templateClient, $options, $toClient, $from, $subjectClient);

            if ($type == 'policiesPayments') {
                return $this->redirect(
                    $this->generateUrl('edit_policies_property', array('id' => $Property->getSerie(), 'type' => $type))
                );
            } elseif ($type == 'finish') {
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Success! Your property is under review and will be live within 24-72 hours.'
                );

                return $this->redirect($this->generateUrl('admin_user_homepage'));
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }


        }

        return $this->render(
            'AdminBundle:Default:policiesPaymentsForm.html.twig',
            array(
                'form' => $form->createView(),
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
                'prop_pk' => $Property->getSerie()
            )
        );
    }

    public function editPoliciesPropertyAction($id, Request $request)
    {
        $session = $request->getSession();
        $type = $request->get('type');
        $properties_select = false;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = true;
        $session->set('saved', 0);
        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Property ' . $id, 'path' => '', 'class' => 'active')
        );


        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);

        if (!$Property) {
            throw $this->createNotFoundException('No Property found for is ' . $id);
        }

        $form = $this->createForm(new PoliciesPaymentsFormType(), $Property->getPoliciesPayments());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $Property->setDateUpdated(new \DateTime);
            $em->persist($Property);
            $em->flush();


            $session->set('saved', 1);

            if ($type == 'policiesPayments') {
                return $this->redirect(
                    $this->generateUrl('edit_policies_property', array('id' => $Property->getSerie(), 'type' => $type))
                );
            } elseif ($type == 'finish') {
                return $this->redirect($this->generateUrl('admin_user_homepage'));
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }


        return $this->render(
            'AdminBundle:Default:editPoliciesPaymentsForm.html.twig',
            array(
                'form' => $form->createView(),
                'properties_select' => $properties_select,
                'filter' => $filter,
                'print' => $print,
                'add' => $add,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'id' => $Property->getSerie()
            )
        );
    }

    public function createPropertyAction($prop_pk, Request $request)
    {

        $type = $request->get('type');
        $prop_pk = $request->get('prop_pk');
        $session = $request->getSession();
        $breadcrumbs = array(
            array('name' => 'Create your Dealearship', 'path' => 'admin_user_homepage', 'class' => '')
        );

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $form = $this->createForm(new ProfileFormType(), new Profile());
        $form->handleRequest($request);
        $Property = $form->getData();
        $description = $form->get('description')->getData();
        $contact = new \Frontend\AppBundle\Entity\Contact();

        if ($form->isValid()) {

            if ($prop_pk != 'new') {
                return $this->redirect(
                    $this->generateUrl(
                        'edit_property',
                        array('id' => $prop_pk, 'type' => $type, 'property' => $Property)
                    )
                );
            }

            $Property = new Profile();
            $Property->setDateCreated(new \DateTime);

            $contact_config = $request->get('contact-info');

            if ($contact_config == '1') {
                if ($request->get('contact')['phoneM'] != "") {
                    $user->setPhone($request->get('contact')['phoneM']);
                    $em->persist($user);
                    $em->flush();
                }

                $contact->setName($user->getName() . ' ' . $user->getLastName());
                $contact->setEmail($user->getEmail());
                $contact->setPhone1($user->getPhone());
                $contact->setContactType(1);
                $Property->setContact($contact);
            } else {

                $contact->setName($request->get('contact')['name']);
                $contact->setEmail($request->get('contact')['email']);
                $contact->setPhone1($request->get('contact')['phone1']);
                $contact->setPhone2($request->get('contact')['phone2']);
                $contact->setPhone3($request->get('contact')['phone3']);
                $contact->setFax($request->get('contact')['fax']);

                $languages = new \Frontend\AppBundle\Entity\Languages();

                if (isset($request->get('contact')['languages']['english'])) {
                    $languages->setEnglish($request->get('contact')['languages']['english']);
                } else {
                    $languages->setEnglish(0);
                }
                if (isset($request->get('contact')['languages']['spanish'])) {
                    $languages->setSpanish($request->get('contact')['languages']['spanish']);
                } else {
                    $languages->setSpanish(0);
                }
                if (isset($request->get('contact')['languages']['russian'])) {
                    $languages->setRussian($request->get('contact')['languages']['russian']);
                } else {
                    $languages->setRussian(0);
                }
                if (isset($request->get('contact')['languages']['chinese'])) {
                    $languages->setChinese($request->get('contact')['languages']['chinese']);
                } else {
                    $languages->setChinese(0);
                }
                if (isset($request->get('contact')['languages']['french'])) {
                    $languages->setFrench($request->get('contact')['languages']['french']);
                } else {
                    $languages->setFrench(0);
                }
                if (isset($request->get('contact')['languages']['german'])) {
                    $languages->setGerman($request->get('contact')['languages']['german']);
                } else {
                    $languages->setGerman(0);
                }
                if (isset($request->get('contact')['languages']['portuguese'])) {
                    $languages->setPortuguese($request->get('contact')['languages']['portuguese']);
                } else {
                    $languages->setPortuguese(0);
                }
                if (isset($request->get('contact')['languages']['arabic'])) {
                    $languages->setArabic($request->get('contact')['languages']['arabic']);
                } else {
                    $languages->setArabic(0);
                }

                $contact->setLanguages($languages);

                $contact->setContactType(2);
                $Property->setContact($contact);
            }

            $propertyRate = new \Frontend\AppBundle\Entity\ProfileRate();
            $propertyRate->setTotalCount(0);
            $propertyRate->setTotalRate(0);
            $propertyRate->setAverage(0);


            $status_id = $this->container->getParameter('status.inactive');
            $Status = $em->getRepository('AppBundle:Status')->find($status_id);
            $Property->setRating($propertyRate);
            $Property->setStatus($Status);
            $Property->setUser($user);
            $Property->setDescription($description);
            $Property->setViews(0);
            $Property->setFull(0);
            $Property->setSerie($this->renderPropertySerie());
            //$Property->setGallery(new Gallery());

            $em->persist($Property);
            $em->flush();

            // store an attribute for reuse during a later user request
            $session->set('saved', 1);


            if ($type == 'description') {
                return $this->redirect(
                    $this->generateUrl(
                        'edit_property',
                        array('id' => $Property->getSerie(), 'type' => $type, 'property' => $Property)
                    )
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }

        return $this->render(
            'AdminBundle:Default:new-profile.html.twig',
            array(
                'form' => $form->createView(),
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
                'user' => $user

            )
        );
    }

    public function editPropertyAction($id, Request $request)
    {

        $session = $request->getSession();
        $type = $request->get('type');
        $properties_select = false;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = true;


        $session->set('saved', 0);
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $Property = $em->getRepository('AppBundle:Profile')->findOneBySerie($id);

        if (!$Property) {
            throw $this->createNotFoundException('No Property found for this id ' . $id);
        }

        $breadcrumbs = array(
            array('name' => 'Dealership', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $Property->getSerie(), 'path' => '', 'class' => 'active')
        );


        $form = $this->createForm(new ProfileFormType, $Property);
        $form->handleRequest($request);
        $Property = $form->getData();

        if ($form->isValid()) {
            //$Property->setDateUpdated(new \DateTime);

            $request_description = $form->get('description')->getData();
            $contact_config = $request->get('contact-info');
            $contact = $Property->getContact();
            if ($contact_config == '1') {
                if ($request->get('contact')['phoneM'] != "") {
                    $user->setPhone($request->get('contact')['phoneM']);
                    $em->persist($user);
                    $em->flush();
                }
                $contact->setName($user->getName() . ' ' . $user->getLastName());
                $contact->setEmail($user->getEmail());
                $contact->setPhone1($user->getPhone());
                //$contact->setCountryPhoneCode($user->getCountryPhoneCode());
                $contact->setContactType(1);
                //$Property->setContact($contact);    
            } else {

                $contact->setName($request->get('contact')['name']);
                $contact->setEmail($request->get('contact')['email']);
                $contact->setPhone1($request->get('contact')['phone1']);
                $contact->setPhone2($request->get('contact')['phone2']);
                $contact->setPhone3($request->get('contact')['phone3']);
                $contact->setFax($request->get('contact')['fax']);

                $languages = new \Frontend\AppBundle\Entity\Languages();

                if (isset($request->get('contact')['languages']['english'])) {
                    $languages->setEnglish($request->get('contact')['languages']['english']);
                } else {
                    $languages->setEnglish(0);
                }
                if (isset($request->get('contact')['languages']['spanish'])) {
                    $languages->setSpanish($request->get('contact')['languages']['spanish']);
                } else {
                    $languages->setSpanish(0);
                }
                if (isset($request->get('contact')['languages']['russian'])) {
                    $languages->setRussian($request->get('contact')['languages']['russian']);
                } else {
                    $languages->setRussian(0);
                }
                if (isset($request->get('contact')['languages']['chinese'])) {
                    $languages->setChinese($request->get('contact')['languages']['chinese']);
                } else {
                    $languages->setChinese(0);
                }
                if (isset($request->get('contact')['languages']['french'])) {
                    $languages->setFrench($request->get('contact')['languages']['french']);
                } else {
                    $languages->setFrench(0);
                }
                if (isset($request->get('contact')['languages']['german'])) {
                    $languages->setGerman($request->get('contact')['languages']['german']);
                } else {
                    $languages->setGerman(0);
                }
                if (isset($request->get('contact')['languages']['portuguese'])) {
                    $languages->setPortuguese($request->get('contact')['languages']['portuguese']);
                } else {
                    $languages->setPortuguese(0);
                }
                if (isset($request->get('contact')['languages']['arabic'])) {
                    $languages->setArabic($request->get('contact')['languages']['arabic']);
                } else {
                    $languages->setArabic(0);
                }

                $contact->setLanguages($languages);
                $contact->setContactType(2);
                //$Property->setContact($contact);    
            }

            $Property->setDescription($request_description);
            $em->persist($Property);
            $em->flush();

            // store an attribute for reuse during a later user request
            $session->set('saved', 1);

            if ($type == 'description') {
                return $this->redirect(
                    $this->generateUrl(
                        'edit_property',
                        array('id' => $Property->getSerie(), 'type' => $type, 'property' => $Property)
                    )
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }


        return $this->render(
            'AdminBundle:Default:editNewProfileForm.html.twig',
            array(
                'form' => $form->createView(),
                'properties_select' => $properties_select,
                'filter' => $filter,
                'print' => $print,
                'add' => $add,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'id' => $Property->getSerie(),
                'property' => $Property
            )
        );
    }

    public function createRatesPropertyAction($prop_pk, Request $request)
    {

        $session = $request->getSession();
        $type = $request->get('type');
        $prop_pk = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new RatesFormType(), new Rates());
        $form->handleRequest($request);
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($prop_pk);
        //$rates = $form->getData();


        $Rate = new \Frontend\AppBundle\Entity\Rates();
        $Property->setRates($Rate);

        if (isset($request->get('period')['seasonName'])) {

            $period = new \Frontend\AppBundle\Entity\Period();
            $period->setSeasonName($request->get('period')['seasonName']);
            $period->setStartDate(\DateTime::createFromFormat("m/d/Y", $request->get('period')['startDate']));
            $period->setEndDate(\DateTime::createFromFormat("m/d/Y", $request->get('period')['endDate']));
            $period->setMinStay($request->get('period')['minStay']);
            $period->setNightly($request->get('period')['nightly']);
            $period->setWeekly($request->get('period')['weekly']);
            $period->setMonthly($request->get('period')['monthly']);
            $period->setNotes($request->get('period')['notes']);
            $Rate->addPeriod($period);
            $Property->setDateUpdated(new \DateTime);
            $em->persist($Property);
            $em->flush();

            $session->set('saved', 1);
            //echo 'llegue aqui';
            //exit;


            if ($type == 'rates') {

                return $this->redirect(
                    $this->generateUrl('edit_rates_property', array('id' => $Property->getSerie(), 'type' => $type))
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }

        return $this->generateForm($Property->getSerie(), $type);
    }

    public function editRatesPropertyAction($id, Request $request)
    {

        $session = $request->getSession();
        $type = $request->get('type');
        $properties_select = false;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = true;

        //$session->set('saved', 1);
        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);

        if ($Property->getRates() != null) {
            $Rate = $em->getRepository('AppBundle:Rates')->find($Property->getRates()->getId());
        } else {
            $Rate = new \Frontend\AppBundle\Entity\Rates();
            $Property->setRates($Rate);
        }

        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
        );


        if (!$Property) {
            throw $this->createNotFoundException('No Property found for is ' . $id);
        }

        $form = $this->createForm(new RatesFormType(), $Rate);
        $form->handleRequest($request);


        if (isset($request->get('period')['seasonName'])) {

            if ($request->get('edit') == '0') {
                $period = new \Frontend\AppBundle\Entity\Period();
            } else {
                $period = $em->getRepository('AppBundle:Period')->find($request->get('periodId'));
            }

            $startDate = null;
            $endDate = null;
            $weekly = null;
            $month = null;
            $night = null;

            if ($request->get('period')['startDate'] != "") {
                $startDate = \DateTime::createFromFormat("m/d/Y", $request->get('period')['startDate']);
            }
            if ($request->get('period')['endDate'] != "") {
                $endDate = \DateTime::createFromFormat("m/d/Y", $request->get('period')['endDate']);
            }

            if ($request->get('period')['nightly'] != "") {
                $night = $request->get('period')['nightly'];
            }

            if ($request->get('period')['weekly'] != "") {
                $weekly = $request->get('period')['weekly'];
            }

            if ($request->get('period')['monthly'] != "") {
                $month = $request->get('period')['monthly'];
            }

            $period->setSeasonName($request->get('period')['seasonName']);
            $period->setStartDate($startDate);
            $period->setEndDate($endDate);
            $period->setMinStay($request->get('period')['minStay']);
            $period->setNightly($night);
            $period->setWeekly($weekly);
            $period->setMonthly($month);
            $period->setNotes($request->get('period')['notes']);
            $Rate->addPeriod($period);
            $Property->setDateUpdated(new \DateTime);
            $em->persist($Property);
            $em->flush();

            $session->set('saved', 1);
            //echo 'llegue aqui';
            //exit;


            if ($type == 'rates') {

                return $this->redirect(
                    $this->generateUrl('edit_rates_property', array('id' => $Property->getSerie(), 'type' => $type))
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }


        return $this->generateForm($Property->getSerie(), $type);
    }

    public function createCalendarPropertyAction($prop_pk, Request $request)
    {

        $type = $request->get('type');
        $prop_pk = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($prop_pk);
        $session = $request->getSession();
        $session->set('saved', 1);


        return $this->generateForm($Property->getSerie(), $type);
    }

    public function deletePeriodAction(Request $request)
    {
        $response = new Response();
        $periodId = $request->get('periodId');
        $em = $this->getDoctrine()->getManager();


        try {
            $period = $em->getRepository('AppBundle:Period')->find($periodId);
            $em->remove($period);
            $em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        return $response->setStatusCode(Response::HTTP_OK);

        //return $this->generateForm($Property->getSerie(), $type);
    }

    public function saveImageAction(Request $request)
    {
        $response = new Response();
        $session = $request->getSession();
        $pictureId = $request->get('pictId');
        $property_id = $request->get('id');
        $orden = $request->get('orden');
        $photo = $request->files->get('photo');
        $title = $request->get('title');
        $em = $this->getDoctrine()->getManager();

        $session->set('saved', 0);


        try {
            $property = $em->getRepository('AppBundle:Profile')->findOneBySerie($property_id);
            $Owner = $property->getUser();
            $OwnerId = $Owner->getId();
            $gallery = $property->getGallery();

            if ($pictureId == 'new') {
                $counter = 1;
                $image = New \Frontend\AppBundle\Entity\ProfileImage();
                $image->setOrden($orden);
                $image->setGallery($gallery);
                $image->setTitle($title);
                $image->setPhoto($photo);
                //$gallery->addPropertyImage($image);   
                $img_p = $image->getUploadRootDir();
                $rand = rand(1, 99999);
                //echo("pth: ".$img_p);
                // $img_p = $image->getUploadRootDir();   
                //  $img_p = "";
                //$img_pf="symfony/web/uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */;
                $img_pf = "uploads/images" . '/' . $OwnerId . '/' . $property_id . '/'/* .$image->getId() */
                ;
                $img_pf2 = $OwnerId . '/' . $property_id . '/'/* .$image->getId() */
                ;
                $img_p .= $img_pf;
                //$iid=$image1->getId();
                //echo("id: ".$counter);
                $myid = "";
                $myid .= $property_id;
                $myid .= "_";
                $myid .= $rand;
                $image->upload($img_p, $img_pf, $myid);
            } else {
                $image = $em->getRepository('AppBundle:PropertyImage')->find($pictureId);
                $image->setTitle($title);
            }
            $em->persist($image);
            $em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();

            return $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        return $response->setStatusCode(Response::HTTP_OK);

        //return $this->generateForm($Property->getSerie(), $type);
    }

    public function newImageFormAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $i = $request->get('i');
        $pictId = $request->get('pictId');
        $image = $em->getRepository('AppBundle:ProfileImage')->find($pictId);
        $fs = new \Symfony\Component\Filesystem\Filesystem();
        //var_dump($image->getPath());
        $fs->remove(array('symlink', $image->getPath(), $image->getFileName()));
        $gallery = $image->getGallery();
        $gallery->removeProfileImage($image);

        $em->remove($image);
        $em->persist($gallery);
        $em->flush();

        return $this->render('AdminBundle:Default:image-form.html.twig', array('i' => $i));
    }

    public function newImageMultipleFormAction(Request $request)
    {

        $i = $request->get('i');
        $file = $request->get('file');

        return $this->render('AdminBundle:Default:image-multiple-form.html.twig', array('i' => $i, 'file' => $file));
    }

    public function editCalendarPropertyAction($id, Request $request)
    {
        $type = $request->get('type');
        $session = $request->getSession();
        $session->set('saved', 1);

        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);

        if (!$Property) {
            throw $this->createNotFoundException('No Property found for this id' . $id);
        }


        return $this->generateForm($Property->getSerie(), $type);
    }

//---------------------------------------------------------------------------------------------------------
    public function createGalleryPropertyAction($prop_pk, Request $request)
    {
        $session = $request->getSession();
        $type = $request->get('type');
        $prop_pk = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new GalleryFormType(), new Gallery());
        $form->handleRequest($request);
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($prop_pk);
        $Owner = $Property->getUser();
        $OwnerId = $Owner->getId();
        $PropertyId = $Property->getSerie();
        $gallery = $form->getData();


        if ($form->isValid()) {
            $counter = 1;
            foreach ($gallery->getPropertyImages() as $image1) {
                $img_p = $image1->getUploadRootDir();
                //echo("pth: ".$img_p);
                // $img_p = $image->getUploadRootDir();   
                //  $img_p = "";
                //$img_pf="symfony/web/uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */;
                $img_pf = "uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */
                ;
                $img_pf2 = $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */
                ;
                $img_p .= $img_pf;
                //$iid=$image1->getId();
                //echo("id: ".$counter);
                $myid = "";
                $myid .= $PropertyId;
                $myid .= "_";
                $myid .= $counter;
                $image1->upload($img_p, $img_pf, $myid);
                $counter++;
            }
            $Property->setGallery($gallery);


            $Property->setDateCreated(new \DateTime);
            $Property->setDateUpdated(new \DateTime);
            $em->persist($Property);
            $em->flush();
            $session->set('saved', 1);
            if ($type == 'gallery') {

                return $this->redirect(
                    $this->generateUrl('edit_gallery_property', array('id' => $Property->getSerie(), 'type' => $type))
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }

        return $this->generateForm($Property->getSerie(), $type);
    }

    public function editGalleryPropertyAction($id, Request $request)
    {
        $session = $request->getSession();
        $type = $request->get('type');
        $properties_select = false;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = false;
        $list = true;


        $session->set('saved', 0);
        $em = $this->getDoctrine()->getManager();
        $Property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);
        $Owner = $Property->getUser();
        $OwnerId = $Owner->getId();
        $PropertyId = $Property->getSerie();
        $Gallery = $em->getRepository('AppBundle:Gallery')->find($Property->getGallery()->getId());

        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Property ' . $Property->getSerie(), 'path' => '', 'class' => 'active')
        );

        if (!$Property) {
            throw $this->createNotFoundException('No Property found for this id ' . $id);
        }

        $originalImages = new ArrayCollection();
        // Create an ArrayCollection of the current Tag objects in the database
        // $counter=0;
        foreach ($Gallery->getPropertyImages() as $image) {
            $originalImages->add($image);
            //$counter++;
            //$originalImages->
        }


        $form = $this->createForm(new GalleryFormType(), $Gallery);
        $form->handleRequest($request);
        $editGallery = $form->getData();
        //var_dump(count($editGallery->getPropertyImages()));
        //exit;


        if ($form->isValid()) {

            $counter = 1;
            foreach ($editGallery->getPropertyImages() as $image1) {
                //var_dump($image1);

                $img_p = $image1->getUploadRootDir();
                $img_p1 = $image1->getUploadRootDir();
                //echo("pth: ".$img_p);
                // $img_p = $image->getUploadRootDir();
                //  $img_p = "";
                //$img_pf="symfony/web/uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */;
                $img_pf = "uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */
                ;
                //$img_pf_tumb = "uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/tumb/'/* .$image->getId() */;
                $img_pf2 = $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */
                ;
                $img_p .= $img_pf;
                //$img_p1.=$img_pf_tumb;
                //$iid=$image1->getId();
                //echo("id: ".$counter);
                $rand = rand(1, 99999);
                $myid = "";
                $myid .= $PropertyId;
                $myid .= "_";
                $myid .= $rand;
                //$image1->uploadThumb($img_p, $img_pf_tumb, $myid);
                $image1->upload($img_p, $img_pf, $myid);
                //$image1->upload($img_p1, $img_pf, $myid);
                // if (!file_exists($img_p1)) {
                //   mkdir($img_p1, 0777, true);
                // }
                //move_uploaded_file( $image1->getFileName() ,  $img_p1 );
                //$image1->uploadThumb($img_p1, $img_pf_tumb, $myid);


                if ($image1->getPath() == null) {
                    $editGallery->removePropertyImage($image1);
                }
                $counter++;
            }

            foreach ($originalImages as $image) {
                // $img_p = $image->getUploadRootDir();
                $img_p = $image->getUploadRootDir();
                // $img_p = "";
                $img_pf = "symfony/web/uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/original/'/* .$image->getId() */
                ;
                $img_pf2 = "uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */
                ;
                $img_pf_tumb = "uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/tumb/'/* .$image->getId() */
                ;
                $img_p .= $img_pf2;
                //$img_d = $OwnerId . '/' . $PropertyId;
                $iid = $image->getId();
                //$this->createthumb($name, $filename, $new_w, $new_h);
                //$image->upload($img_p, $img_pf, $iid);
            }


            $Property->setDateUpdated(new \DateTime);
            $Property->setTab4(true);
            $em->persist($Property);
            $em->flush();

            $session->set('saved', 1);
            if ($type == 'gallery') {
                return $this->redirect(
                    $this->generateUrl(
                        'edit_gallery_property',
                        array('id' => $Property->getSerie(), 'type' => $type, 'prop' => $Property)
                    )
                );
            } else {
                return $this->generateForm($Property->getSerie(), $type);
            }
        }

        return $this->render(
            'AdminBundle:Default:editGalleryForm.html.twig',
            array(
                'form' => $form->createView(),
                'properties_select' => $properties_select,
                'filter' => $filter,
                'print' => $print,
                'add' => $add,
                'list' => $list,
                'download' => $download,
                'search' => $search,
                'location' => $location,
                'property' => $property,
                'expired_alert' => $expired_alert,
                'new_reservation' => $new_reservation,
                'breadcrumbs' => $breadcrumbs,
                'id' => $Property->getSerie(),
                'prop' => $Property
            )
        );
    }

    public function replyFormAction($id, Request $request)
    {


        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\InquiryReplyFormType(),
            new \Frontend\AppBundle\Entity\InquiryReply()
        );


        //$properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatus($user, $this->container->getParameter('status.active'));

        return $this->render(
            'AdminBundle:Default:replyForm.html.twig',
            array('form' => $form->createView(), 'id' => $id)
        );
    }

    public function reviewReplyFormAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository('AppBundle:review')->find($id);
        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReviewReplyFormType(),
            new \Frontend\AppBundle\Entity\ReviewReply()
        );

        return $this->render(
            'AdminBundle:Default:reviewReply-form.html.twig',
            array('form' => $form->createView(), 'id' => $id, 'review' => $review)
        );
    }

    public function inquiryNoteFormAction($id, Request $request)
    {


        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\InquiryNoteFormType(),
            new \Frontend\AppBundle\Entity\InquiryNote()
        );

        return $this->render(
            'AdminBundle:Default:inquiryNoteForm.html.twig',
            array('form' => $form->createView(), 'id' => $id)
        );
    }

    public function findRegionsAction(Request $request)
    {

        $country = $request->get('country');

        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository('AppBundle:Regions')->findRegionsByCountry($country);

        return $this->render('AdminBundle:Default:regions.html.twig', array('regions' => $regions));
    }

    public function findCitiesAction(Request $request)
    {

        $region = $request->get('region');

        $em = $this->getDoctrine()->getManager();
        $cities = $em->getRepository('AppBundle:Cities')->findCitiesByRegion($region);

        return $this->render('AdminBundle:Default:cities.html.twig', array('cities' => $cities));
    }


    public function sendEmail($template, $options, $to, $from, $subject)
    {

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from[0], $from[1])
            ->setTo($to)
            ->setBody($this->renderView($template, $options), 'text/html');

        $this->get('mailer')->send($message);
    }


}
