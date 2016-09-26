<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 04/08/2015
 * Time: 12:54
 */

namespace Backend\AdminBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Frontend\AppBundle\Entity\Feeds;
use Frontend\AppBundle\Entity\Profile;

use Frontend\AppBundle\Entity\Location;
use Frontend\AppBundle\Entity\Gallery;
use Frontend\AppBundle\Entity\ProfileServices;

use Frontend\AppBundle\Form\Type\GalleryFormType;
use Frontend\AppBundle\Form\Type\ProfileFormType;

use Frontend\AppBundle\Form\Type\ServicesAndUsefullInformationFormType;
use Frontend\AppBundle\Form\Type\LocationFormType;
use Frontend\AppBundle\Form\Type\FeedsFormType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Backend\AdminBundle\Classes;
use Backend\AdminBundle\Classes\MobileDetect;
use Backend\AdminBundle;
use Backend\AdminBundle\Controller\Utils;
use \DateTime;

class FALController extends Controller
{

    public function CreateDescriptionList($serviceAll, $profileServices)
    {
        $descriptionList = new ArrayCollection();
        foreach ($serviceAll as $service) {

            $result = $this->HasService($profileServices, $service);
            if ($result != null) {
                $descriptionList->add($result->getDescription());
            } else {
                $descriptionList->add("");
            }

        }

        return $descriptionList;
    }

    public function HasService($profileServices, $service)
    {
        foreach ($profileServices as $profservice) {
            if ($profservice->getServices() == $service) {
                return $profservice;
            }
        }

        return null;
    }

    /*
     *  Formulario de Profile: Verificar si el tab esta completado enviarlo al siquiente
     */
    public function verifyTabAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            try {
                $id = $request->get("id");
                $tab = $request->get("current_tab");
                $em = $this->getdoctrine()->getmanager();
                $profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($id);

                if (!$profile) {
                    $response['success'] = false;
                    throw $this->createNotFoundException('No Property found for this id ' . $id);
                }

                $response['success'] = ($profile->getDescription() != null && $profile->getContact() != null);


            } catch (\Exception $ex) {
                throw new \Exception($ex->getMessage());
                $response['success'] = false;
                $response['error'] = $ex->getMessage();
            }

            return new JsonResponse($response);
        }
    }

    /**
     *    Controllers for Complete Profile Info on Mobile Devices
     */

    /*public function createDealerMobileAction($type, $step, $prop_pk, Request $request)
    {

        $adding = false;
        $descriptionList = null;
        $formservice = null;
        $formgallery = null;
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $Profile = null;
        $description = null;
        $form = null;
        if ($prop_pk == "new") {
            $adding = true;
            $Profile = new Profile();
        } else {
            $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
        }
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $form = $this->createForm(new ProfileFormType(), $Profile);

        //if($session->get("saved") > 0) {
        $formservice = $this->createForm(
            new ServicesAndUsefullInformationFormType(),
            $Profile,
            array('em' => $em)
        );
        $servicesAll = $em->getRepository('AppBundle:Services')->findAll();
        $descriptionList = $this->CreateDescriptionList($servicesAll, $Profile->getProfileServices());
        //}

        //if($session->get("saved") > 1){
        if ($Profile->getGallery() != null && $Profile->getGallery()->getId() != null) {
            $Gallery = $em->getRepository('AppBundle:Gallery')->find($Profile->getGallery()->getId());
        }
        if ($Gallery == null) {
            $Gallery = new Gallery();
        }
        $formgallery = $this->createForm(new GalleryFormType(), $Gallery);
        $Profile->setGallery($Gallery);
        //}

        switch ($step) {
            case 1:
                $form->handleRequest($request);
                $description = $form->get('description')->getData();
                $Profile = $form->getData();
                if ($form->isValid() && $type != "open") {
                    $this->SaveDescriptionDealerInfo(
                        $request,
                        $Profile,
                        $adding,
                        $em,
                        $user,
                        $suser,
                        $session,
                        $description
                    );
                }
                break;
            case 2:
                $formservice->handleRequest($request);
                $Profile = $formservice->getData();
                if ($formservice->isValid() && $type != "open") {
                    $this->SaveServicesAndAmenitiesDealerInfo($request, $adding, $em, $Profile, $formservice, $session);
                }
                break;
            case 3:
                $originalImages = $this->GetOriginalImages($Gallery);
                $formgallery->handleRequest($request);
                $editGallery = $formgallery->getData();
                if (count($Gallery->getProfileImages()) > 0) {
                    $this->SaveGalleryDealerInfo($Profile, $editGallery, $originalImages, $em, $session);
                }
                break;
        }

        if ($type == 'continue') {
            $step++;
        }

        $prop_pk = $Profile->getSerie();
        if ($prop_pk == null) {
            $prop_pk = "new";
        }

        return $this->render(
            'AdminBundle:DealerForm:Mobile/new-profile-mobile.html.twig',
            array(
                'form' => $form->createView(),
                'form1' => $form->createView(),
                'formservice' => $formservice->createView(),
                'formgallery' => $formgallery->createView(),
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
                'prop_pk' => $prop_pk,
                'user' => $user,
                'logo' => $Profile->getPath(),
                'profile' => $Profile,
                'step' => $step,
                'servicesdescriptions' => $descriptionList
            )
        );
    }*/


    /**
     *    Controllers for Complete Profile Info
     */

    public function descriptionAction($type, $prop_pk, Request $request)
    {
        $adding = false;
        $session = $request->getSession();
        /*$breadcrumbs = array(
            array('name' => 'Create your Dealearship', 'path' => 'admin_user_homepage', 'class' => '')
        );*/

        $breadcrumbs = array(
            array('name' => 'Create your Dealearship', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Profile ' . $prop_pk, 'path' => '', 'class' => 'active')
        );

        $em = $this->getDoctrine()->getManager();

        $Profile = null;

        $description = null;
        $form = null;
        if ($prop_pk == "new") {
            $adding = true;
            /*$Profile = new Profile();*/
            $form = $this->createForm(new ProfileFormType(), new Profile());
        } else {
            $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
            $form = $this->createForm(new ProfileFormType(), $Profile);
        }

        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $form->handleRequest($request);
        $Profile = $form->getData();

        $detect = new MobileDetect();
        $ismobile = $detect->isMobile();

        if ($type == "open") {
            $session->set('saved', 1);
            if (!$ismobile) {
                return $this->renderNewProfileDescriptionContactPage($form, $breadcrumbs, $Profile, $user, $ismobile);
            } else {
                return $this->RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, 1, $type);
            }
        }
        $description = $form->get('description')->getData();

        if ($form->isValid()) {

            $this->SaveDescriptionDealerInfo(
                $request,
                $Profile,
                $adding,
                $em,
                $user,
                $suser,
                $session,
                $description
            );

        }//implementar function para renderear la pagina de new-profile-mobile generica desde aqui si ismobile es true
        if ($ismobile) {

            $step = 1;

            return $this->RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, $step, $type);

        }
        if ($type == "save") {

            return $this->renderNewProfileDescriptionContactPage($form, $breadcrumbs, $Profile, $user, $ismobile);

        } else {
            // if is continue it redirect to location page
            return $this->redirect(
                $this->generateUrl('set_amenities', array('type' => "open", 'prop_pk' => $Profile->getSerie()))
            );
        }
    }

    /*public function locationAction($type, $prop_pk, Request $request)
    {

        $session = $request->getSession();
        $adding = false;
        //$type = $request->get('type');
        //$prop_pk = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $form = null;
        $location = null;
        $Profile = null;
        if ($prop_pk == "new") {
            $adding = true;
            $Profile = new Profile();
            $form = $this->createForm(new LocationFormType(), new Location());
        } else {
            $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
            $form = $this->createForm(new LocationFormType(), $Profile->getLocation());
        }

        $breadcrumbs = array(
            array('name' => 'Create your Dealearship', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Profile ' . $prop_pk, 'path' => '', 'class' => 'active')
        );

        if ($type == "open") {
            return $this->renderLocationPage($form, $breadcrumbs, $Profile);
        }

        $form->handleRequest($request);

        $location = $form->getData();
        $country = $form['country']->getData();

        if ($country == 'United States') {
            $country = "USA";
        }
        $location->setCountry($country);
        $region = $form['administrative_area_level_1']->getData();
        $city = $form['locality']->getData();

        if ($form->isValid()) {

            if ($adding) {
                $suser = $this->get('security.context')->getToken()->getUser();
                $user = $em->getRepository('AppBundle:User')->find($suser->getId());
                $this->createprofile($Profile, $em, $request, $user);
            }

            $Profile->setLocation($location);
            $Profile->setDateCreated(new \DateTime);
            //$Property->setDateUpdated(new \DateTime);
            $em->persist($Profile);
            $em->flush();
            $session->set('saved', 1);

            if ($type == "save") {

                return $this->renderLocationPage($form, $breadcrumbs, $Profile);

            } else {
                // if is continue it redirect to amenities page
                return $this->redirect(
                    $this->generateUrl('set_amenities', array('type' => "open", 'prop_pk' => $Profile->getSerie()))
                );
            }
        }

        return $this->renderLocationPage($form, $breadcrumbs, $Profile);
    }*/

    public function services_amenitiesAction($type, $prop_pk, Request $request)
    {

        $session = $request->getSession();
        $adding = false;
        //$type = $request->get('type');
        //$prop_pk = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $form = null;
        $Profile = null;
        $servicesAll = $em->getRepository('AppBundle:Services')->findAll();

        if ($prop_pk == "new") {
            $adding = true;
            $Profile = new Profile();
            $form = $this->createForm(new ServicesAndUsefullInformationFormType(), new ProfileServices());
        } else {
            $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);

            $form = $this->createForm(new ServicesAndUsefullInformationFormType(), $Profile, array('em' => $em));
        }

        $breadcrumbs = array(
            array('name' => 'Create your Dealearship', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Profile ' . $prop_pk, 'path' => '', 'class' => 'active')
        );

        $detect = new MobileDetect();
        $ismobile = $detect->isMobile();

        if ($type == "open") {
            if (!$ismobile) {
                $descriptionList = $this->CreateDescriptionList($servicesAll, $Profile->getProfileServices());

                return $this->renderServicesAmenitiesPage(
                    $type,
                    $form,
                    $breadcrumbs,
                    $Profile,
                    $descriptionList
                );
            } else {
                return $this->RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, 1, $type);
            }
        }
        $form->handleRequest($request);
        $Profile = $form->getData();

        if ($form->isValid()) {
            //if (count($services) > 0) {
            $this->SaveServicesAndAmenitiesDealerInfo($request, $adding, $em, $Profile, $form, $session);

        }

        $descriptionList = $this->CreateDescriptionList($servicesAll, $Profile->getProfileServices());
        if ($ismobile) {

            $step = 2;

            return $this->RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, $step, $type);

        }
        if ($type == 'save') {
            return $this->renderServicesAmenitiesPage(
                $type,
                $form,
                $breadcrumbs,
                $Profile,
                $descriptionList,
                $ismobile
            );
        } else {
            // if is continue it redirect to location page
            return $this->redirect(
                $this->generateUrl('set_gallery', array('type' => "open", 'prop_pk' => $Profile->getSerie()))
            );
        }

        return $this->renderServicesAmenitiesPage($type, $form, $breadcrumbs, $Profile, $descriptionList);
    }

    public function galleryAction($type, $prop_pk, Request $request)
    {

        $session = $request->getSession();
        $type = $request->get('type');
        /* $properties_select = false;
         $filter = false;
         $print = false;
         $download = false;
         $search = false;
         $location = false;
         $property = false;
         $expired_alert = false;
         $new_reservation = false;
         $add = false;*/
        /*$list = true;*/
        $form = null;
        $Profile = null;
        $adding = false;
        $session->set('saved', 0);
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $Gallery = null;

        if ($prop_pk == "new") {
            $adding = true;
            $Profile = new Profile();
            $form = $this->createForm(new GalleryFormType(), new Gallery());
            $Gallery = new Gallery();
        } else {
            $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
            if ($Profile->getGallery() != null && $Profile->getGallery()->getId() != null) {
                $Gallery = $em->getRepository('AppBundle:Gallery')->find($Profile->getGallery()->getId());
            }
            if ($Gallery == null) {
                $Gallery = new Gallery();
            }
        }

        $form = $this->createForm(new GalleryFormType(), $Gallery);
        $Profile->setGallery($Gallery);

        $breadcrumbs = array(
            array('name' => 'Create your Dealearship', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Profile ' . $Profile->getSerie(), 'path' => '', 'class' => 'active')
        );

        if (!$Profile) {
            throw $this->createNotFoundException('No Property found for this id ' . $prop_pk);
        }

        $detect = new MobileDetect();
        $ismobile = $detect->isMobile();

        if ($type == "open") {
            if (!$ismobile) {
                return $this->renderGalleriesPage($type, $form, $breadcrumbs, $Profile);
            } else {
                return $this->RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, 3, $type);
            }
        }

        $form->handleRequest($request);
        //$services = $form->getData();

        $originalImages = $this->GetOriginalImages($Gallery);


        $form = $this->createForm(new GalleryFormType(), $Gallery);
        $form->handleRequest($request);
        $editGallery = $form->getData();

        // if ($form->isValid()) {
        if (count($Gallery->getProfileImages()) > 0) {

            $this->SaveGalleryDealerInfo($Profile, $editGallery, $originalImages, $em, $session);

            if ($ismobile) {

                $step = 3;

                return $this->RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, $step, $type);

            }

            if ($type == 'save') {
                return $this->renderGalleriesPage($type, $form, $breadcrumbs, $Profile);
            } else {
                // if is continue it redirect to feeds page
                return $this->redirect(
                    $this->generateUrl('set_feeds', array('type' => "open", 'prop_pk' => $Profile->getSerie()))
                );
            }

        }

        return $this->renderGalleriesPage($type, $form, $breadcrumbs, $Profile);
    }

    public function feedsAction($type, $prop_pk, Request $request)
    {
        $session = $request->getSession();
        $adding = false;
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $form = null;
        $Profile = null;
        if ($prop_pk == "new") {
            $adding = true;
            $Profile = new Profile();
            $form = $this->createForm(new FeedsFormType(), new Feeds());
        } else {
            $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
            $form = $this->createForm(new FeedsFormType(), $Profile->getFeeds());
        }

        $breadcrumbs = array(
            array('name' => 'Create your Dealearship', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Profile ' . $prop_pk, 'path' => '', 'class' => 'active')
        );

        $detect = new MobileDetect();
        $ismobile = $detect->isMobile();

        if ($type == "open") {
            if (!$ismobile) {
                return $this->renderFeedsPage($type, $form, $breadcrumbs, $Profile);
            } else {
                return $this->RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, 4, $type);
            }
        }

        $form->handleRequest($request);
        $feeds = $form->getData();

        if ($form->isValid()) {

            if ($adding) {
                $suser = $this->get('security.context')->getToken()->getUser();
                $user = $em->getRepository('AppBundle:User')->find($suser->getId());
                $this->createprofile($Profile, $em, $request, $user);
            }

            $Profile->setFeeds($feeds);
            //$Profile->setDateCreated(new \DateTime);

            $Profile->setDateUpdate(new \DateTime);
            $em->persist($Profile);
            $em->flush();
            $session->set('saved', 4);

            if ($ismobile && $type != "end") {
                $step = 4;

                return $this->RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, $step, $type);

            }

            if ($type == 'save') {
                return $this->renderFeedsPage($type, $form, $breadcrumbs, $Profile, $ismobile);
            } else {
                if ($type == "end") {
                    // if is end it finish the form after validate
                    if ($Profile->getDescription() == null || $Profile->getContact() == null) {
                        return $this->redirect(
                            $this->generateUrl(
                                'set_description',
                                array('type' => "open", 'prop_pk' => $Profile->getSerie())
                            )
                        );
                    }
                    /* if ($Profile->getLocation() == null) {
                         return $this->redirect(
                             $this->generateUrl(
                                 'set_location',
                                 array('type' => "open", 'prop_pk' => $Profile->getSerie())
                             )
                         );
                     }*/
                    if (count($Profile->getProfileServices()) == 0) {
                        return $this->redirect(
                            $this->generateUrl(
                                'set_amenities',
                                array('type' => "open", 'prop_pk' => $Profile->getSerie())
                            )
                        );
                    }
                    if ($Profile->getFeeds() == null) {
                        return $this->renderFeedsPage($type, $form, $breadcrumbs, $Profile);
                    } else {
                        $Profile->setFull(1);
                        $em->persist($Profile);
                        $em->flush();
                        /*$response = $this->forward(
                            'AdminBundle:Default:index',
                            array(
                                'request' => $request
                            )
                        );

                        return $response;*/

                        /*return $this->redirect(
                            $this->generateUrl('car_details', array())
                        );*/
                        $news = $em->getRepository('AppBundle:News')->findBy(
                            array('new' => true, 'status' => $this->container->getParameter('status.posted'))
                        );
                        $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
                            $user,
                            $this->container->getParameter('status.active'),
                            $this->container->getParameter('status.inactive')
                        );
                        $session = $request->getSession();
                        // store an attribute for reuse during a later user request
                        $session->set('news', COUNT($news));
                        $session->set('propertiesCount', count($profiles));

                        $profilesInfo = Utils::GenerateProfilesInfoList($profiles);
                        $sumary = Utils::GenerateSumaryInfoList($profiles, $user);

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
                        $paginator = $this->get('knp_paginator');
                        $pagination = $paginator->paginate($profiles, $this->get('request')->query->get('page', 1), 10);

                        return $this->render(
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
                }
            }
        } else {
            return $this->renderFeedsPage($type, $form, $breadcrumbs, $Profile);
        }
    }

    /***
     *      Utils
     **/

    public
    function createprofile(
        $Profile,
        $em,
        $request,
        $user
    ) {

        $propertyRate = new \Frontend\AppBundle\Entity\ProfileRate();
        $propertyRate->setTotalCount(0);
        $propertyRate->setTotalRate(0);
        $propertyRate->setAverage(0);


        $status_id = $this->container->getParameter('status.inactive');
        $Status = $em->getRepository('AppBundle:Status')->find(1);
        $Profile->setRating($propertyRate);
        $Profile->setStatus($Status);
        $Profile->setUser($user);
        $Profile->setViews(0);
        $Profile->setFull(0);
        $Profile->setSerie($this->renderPropertySerie());
        //$Property->setGallery(new Gallery());
    }

    public
    function renderPropertySerie()
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

    /**
     * @param $Profile
     * @param $em
     * @param $request
     * @param $user
     */
    public
    function createContact(
        $Profile,
        $em,
        $request,
        $user,
        $adding
    ) {
        if ($adding || !$Profile->getContact()) {
            $contact = new \Frontend\AppBundle\Entity\Contact();
        } else {
            $contact = $Profile->getContact();
        }

        //$contact_config = $request->get('contact-info');
        $contact_config = '1';

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
            $Profile->setContact($contact);
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
            $Profile->setContact($contact);
        }
    }

    /**
     * @param $form
     * @param $breadcrumbs
     * @param $Profile
     * @param $user
     * @return Response
     */
    public
    function renderNewProfileDescriptionContactPage(
        $form,
        $breadcrumbs,
        $Profile,
        $user,
        $ismobile
    ) {


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
                'prop_pk' => $this->GetProp_Pk($Profile),
                'user' => $user,
                'logo' => $Profile->getPath(),
                'ismobile' => $ismobile,
                'step' => 1
            )
        );
    }

    /**
     * @param $form
     * @param $breadcrumbs
     * @param $Profile
     * @return Response
     */
    public
    function renderLocationPage(
        $form,
        $breadcrumbs,
        $Profile
    ) {

        return $this->render(
            'AdminBundle:DealerForm:locationForm.html.twig',
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
                'prop_pk' => $this->GetProp_Pk($Profile),
                'prop' => $Profile
            )
        );
    }

    /**
     * @param $type
     * @param $form
     * @param $breadcrumbs
     * @param $Profile
     * @return Response
     */
    public
    function renderServicesAmenitiesPage(
        $type,
        $form,
        $breadcrumbs,
        $Profile,
        $descriptionList
    ) {
        $services = null;
        //$services = ($Profile->getServices() != null) ? $Profile->getServices() : null;

        //$form1 = $this->createForm(new ProfileFormType(), $Profile);

        return $this->render(
            'AdminBundle:DealerForm:amenitiesForm.html.twig',
            array(
                'form' => $form->createView(),
                //'form1' => $form1->createView(),
                'form2' => $form->createView(),
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
                'prop_pk' => $this->GetProp_Pk($Profile),
                'servicesdescriptions' => $descriptionList
            )
        );
    }


    public
    function renderGalleriesPage(
        $type,
        $form,
        $breadcrumbs,
        $Profile
    ) {
        $gallery = null;
        //$gallery = $Profile->getGallery();


        $form1 = $this->createForm(new ProfileFormType(), $Profile);

        return $this->render(
            'AdminBundle:DealerForm:editGalleryForm.html.twig',
            array(
                'form' => $form->createView(),
                'form1' => $form1->createView(),
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
                'prop_pk' => $this->GetProp_Pk($Profile),
                'prop' => $Profile
            )
        );
    }

    /**
     * @param $type
     * @param $form
     * @param $breadcrumbs
     * @param $Profile
     * @return Response
     */
    public
    function renderFeedsPage(
        $type,
        $form,
        $breadcrumbs,
        $Profile
    ) {
        $feeds = null;
        $feeds = ($Profile->getFeeds() != null) ? $Profile->getFeeds() : null;

        return $this->render(
            'AdminBundle:DealerForm:feedsForm.html.twig',
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
                'prop_pk' => $this->GetProp_Pk($Profile),
                'feeds' => $feeds
            )
        );
    }

    public function uploadMultipleAction($prop_pk)
    {
        $em = $this->getDoctrine()->getManager();
        if ($prop_pk == "new") {
            $Profile = new Profile();
            $suser = $this->get('security.context')->getToken()->getUser();
            $user = $em->getRepository('AppBundle:User')->find($suser->getId());
            $this->createprofile($Profile, $em, null, $user);
            $Profile->setDateCreated(new \DateTime);
            $em->persist($Profile);
            $em->flush();
            $prop_pk = $Profile->getSerie();
        }

        $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
        $response = new Response();
        $Owner = $Profile->getUser();
        $OwnerId = $Owner->getId();
        $upload_handler = new \Backend\AdminBundle\Classes\UploadHandler(null, true, null, $Profile, $em, null);

        return $response->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param $Profile
     * @param $adding
     * @param $em
     * @param $user
     * @param $suser
     * @param $session
     * @param $description
     */
    public function SaveDescriptionDealerInfo(
        Request $request,
        $Profile,
        $adding,
        $em,
        $user,
        $suser,
        $session,
        $description
    ) {
        $Profile->setDateUpdate(new \DateTime);
        if ($_FILES != null && array_key_exists('profile_photoM', $_FILES)) {
            if ($_FILES ['profile_photoM']['size'] != 0) {
                $upLoad = new UploadedFile(
                    $_FILES ['profile_photoM']['tmp_name'],
                    $_FILES ['profile_photoM']['name'],
                    $mimeType = $_FILES ['profile_photoM']['type'],
                    $size = $_FILES ['profile_photoM']['size'],
                    $error = $_FILES ['profile_photoM']['error'],
                    $test = false
                );
                $Profile->setPhoto($upLoad);
            }
        }

        if ($adding) {
            $this->createprofile($Profile, $em, $request, $user);
            $Profile->setDateCreated(new \DateTime);
        }

        //salvar logo
        $img_p = $Profile->getUploadRootDir();
        $img_pf = "uploads/images" . '/' . $suser->getId() . '/' . $Profile->getSerie() . '/logo/';
        $img_p .= $img_pf;
        $myid = "";
        $myid .= $Profile->getSerie();
        $Profile->upload($img_p, $img_pf, $myid);

        $this->createContact($Profile, $em, $request, $user, $adding);

        $Profile->setDescription($description);
        $em->persist($Profile);
        $em->flush();

        // store an attribute for reuse during a later user request
        $session->set('saved', 1);
    }

    /**
     * @param Request $request
     * @param $adding
     * @param $em
     * @param $Profile
     * @param $form
     * @param $session
     */
    public function SaveServicesAndAmenitiesDealerInfo(
        Request $request,
        $adding,
        $em,
        $Profile,
        $form,
        $session
    ) {
        $profileServicesOld = $em->getRepository('AppBundle:ProfileServices')->findByProfiles($Profile);
        if ($adding) {
            $suser = $this->get('security.context')->getToken()->getUser();
            $user = $em->getRepository('AppBundle:User')->find($suser->getId());
            $this->createprofile($Profile, $em, $request, $user);
        }
        $servicesAdded = $form->get('services')->getData();

        foreach ($servicesAdded as $s) {
            $description = $request->get("servicesAndUsefullInformation_services_" . $s->getId());
            $serv = $this->HasService($Profile->getProfileservices(), $s);
            if ($serv == null) {
                $serv = new ProfileServices();
                $serv->setProfile($Profile);
                $serv->setDescription($description);
                $serv->setServices($s);

            } else {
                $serv->setDescription($description);
            }

            $Profile->addProfileServices($serv);


        }

        if (count($profileServicesOld) > 0) {
            foreach ($profileServicesOld as $psold) {
                $prof = $Profile->FindServiceByServiceId($psold->getServices()->getId());
                if (!$servicesAdded->contains($prof->getServices())) {
                    $Profile->getProfileServices()->removeElement($psold);
                }
            }
        }

        //$Profile->setDateCreated(new \DateTime);
        $Profile->setDateUpdate(new \DateTime);
        $em->persist($Profile);
        $em->flush();
        $session->set('saved', 2);
    }

    /**
     * @param $Profile
     * @param $editGallery
     * @param $originalImages
     * @param $em
     * @param $session
     */
    public function SaveGalleryDealerInfo($Profile, $editGallery, $originalImages, $em, $session)
    {
        $Owner = $Profile->getUser();
        $OwnerId = $Owner->getId();
        $ProfileId = $Profile->getSerie();
        $counter = 1;
        foreach ($editGallery->getProfileImages() as $image1) {
            //var_dump($image1);

            $img_p = $image1->getUploadRootDir();
            $img_p1 = $image1->getUploadRootDir();

            $img_pf = "uploads/images" . '/' . $OwnerId . '/' . $ProfileId . '/'/* .$image->getId() */
            ;

            $img_pf2 = $OwnerId . '/' . $ProfileId . '/'/* .$image->getId() */
            ;
            $img_p .= $img_pf;

            $rand = rand(1, 99999);
            $myid = "";
            $myid .= $ProfileId;
            $myid .= "_";
            $myid .= $rand;

            $image1->upload($img_p, $img_pf, $myid);


            if ($image1->getPath() == null) {
                $editGallery->removeProfileImage($image1);
            }
            $counter++;
        }

        foreach ($originalImages as $image) {
            // $img_p = $image->getUploadRootDir();
            $img_p = $image->getUploadRootDir();
            // $img_p = "";
            $img_pf = "symfony/web/uploads/images" . '/' . $OwnerId . '/' . $ProfileId . '/original/'/* .$image->getId() */
            ;
            $img_pf2 = "uploads/images" . '/' . $OwnerId . '/' . $ProfileId . '/'/* .$image->getId() */
            ;
            $img_pf_tumb = "uploads/images" . '/' . $OwnerId . '/' . $ProfileId . '/tumb/'/* .$image->getId() */
            ;
            $img_p .= $img_pf2;

            $iid = $image->getId();

        }


        $Profile->setDateUpdate(new \DateTime);
        //$Profile->setTab4(true);
        $em->persist($Profile);
        $em->flush();

        $session->set('saved', 3);
    }

    /**
     * @param $Gallery
     * @return ArrayCollection
     */
    public function GetOriginalImages($Gallery)
    {
        $originalImages = new ArrayCollection();
        // Create an ArrayCollection of the current Tag objects in the database
        // $counter=0;
        foreach ($Gallery->getProfileImages() as $image) {
            $originalImages->add($image);
            //$counter++;
            //$originalImages->
        }

        return $originalImages;
    }

    /**
     * @param $prop_pk
     * @param $session
     * @param $Profile
     * @param $em
     * @param $user
     * @param $step
     * @param $type
     * @return Response
     */
    public function RenderProfileMobilePage($prop_pk, $session, $Profile, $em, $user, $step, $type)
    {
        $descriptionList = null;
        $formservice = null;
        $formserviceView = null;
        $formgalleryView = null;
        $formgallery = null;
        $form = null;
        $formfeeds = null;
        $formfeedsView = null;
        $feeds = null;
        $step = ($type == "save" || $type == "open" ) ? $step : $step + 1;
        //if type is open then render all objects of profile to the page
        if($type == "open"){
            $step = 4;
        }
        $form = $this->createForm(new ProfileFormType(), $Profile);
        if ($step > 1) {
            $formservice = $this->createForm(
                new ServicesAndUsefullInformationFormType(),
                $Profile,
                array('em' => $em)
            );
            $formserviceView = $formservice->createView();
            $servicesAll = $em->getRepository('AppBundle:Services')->findAll();
            $descriptionList = $this->CreateDescriptionList($servicesAll, $Profile->getProfileServices());
        }
        if ($step > 2) {
            if ($Profile->getGallery() != null && $Profile->getGallery()->getId() != null) {
                $Gallery = $em->getRepository('AppBundle:Gallery')->find($Profile->getGallery()->getId());
            }
            if ($Gallery == null) {
                $Gallery = new Gallery();
            }
            $formgallery = $this->createForm(new GalleryFormType(), $Gallery);
            $formgalleryView = $formgallery->createView();
        }

        if ($step > 3) {
            $formfeeds = $this->createForm(new FeedsFormType(), $Profile->getFeeds());
            $formfeedsView = $formfeeds->createView();
            $feeds = ($Profile->getFeeds() != null) ? $Profile->getFeeds() : null;
        }

        return $this->render(
            'AdminBundle:DealerForm:Mobile/new-profile-mobile.html.twig',
            array(
                'form' => $form->createView(),
                'form1' => $form->createView(),
                'formservice' => $formserviceView,
                'formgallery' => $formgalleryView,
                'formfeed' => $formfeedsView,
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
                'prop_pk' => $this->GetProp_Pk($Profile),
                'user' => $user,
                'logo' => $Profile->getPath(),
                'profile' => $Profile,
                'step' => $step,
                'servicesdescriptions' => $descriptionList,
                'feeds' => $feeds
            )
        );
    }

    /**
     * @param $Profile
     * @return string
     */
    public function GetProp_Pk($Profile)
    {
        $prop = $Profile->getSerie();
        if ($prop == null) {
            $prop = "new";

            return $prop;
        }

        return $prop;
    }

}