<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 27/08/2015
 * Time: 8:03
 */

namespace Backend\AdminBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Collections\ArrayCollection;
use Frontend\AppBundle\Entity\Feeds;
use Frontend\AppBundle\Entity\Profile;
use Frontend\AppBundle\Entity\Description;
use Frontend\AppBundle\Entity\Location;
use Frontend\AppBundle\Entity\Gallery;
use Frontend\AppBundle\Entity\ProfileServices;
use Frontend\AppBundle\Entity\Services;
use Frontend\AppBundle\Entity\Vehicle;
use Frontend\AppBundle\Entity\User;
use Frontend\AppBundle\Entity\VehiclesOptions;
use Frontend\AppBundle\Entity\VehicleBasicInformation;
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
use Frontend\AppBundle\Form\Type\VehicleSellerComments;
use Frontend\AppBundle\Form\Type\VehicleSellerCommentsFormType;
use Frontend\AppBundle\Form\Type\VehicleFormType;
use Frontend\AppBundle\Form\Type\VehicleOptionsFormType;
use Frontend\AppBundle\Form\Type\VehicleWarrantyFormType;
use Proxies\__CG__\Frontend\AppBundle\Entity\Make;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Backend\AdminBundle\Classes;
use Backend\AdminBundle;
use \DateTime;
use Backend\AdminBundle\Classes\MobileDetect;

class VehicleController extends Controller
{


    public function vehicleInformatcionAction($type, $prop_pk, $vehicle_id, Request $request)
    {

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $vehicle = null;
        $profile_selected = "";
        $basicinformation = null;
        $details = null;
        $form = null;
        $adding = false;

        $detect = new MobileDetect();
        $ismobile = $detect->isMobile();
        $session->set('VOptions', null);
        $session->set('VGalleryOpen', null);
        $session->set('VGallery', null);
        $session->set('VWarranty', null);

        if ($prop_pk != "no") {
            if ($request->get("selected_prop_pk") != null) {
                $prop_pk = $request->get("selected_prop_pk");
            }
            $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
            $profile_selected = $Profile->getDescription()->getName();
            $breadcrumbs = array(
                array('name' => 'Dealers', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => $profile_selected, 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => 'Vehicle Information', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => 'Vehicle ' . $vehicle_id, 'path' => '', 'class' => 'active'),
            );

        } else {
            $Profile = new Profile();
            $profile_selected = "";
            $breadcrumbs = array(
                array('name' => 'Dealers', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => 'Select Dealer', 'path' => 'admin_user_homepage', 'class' => 'active'),
            );
        }

        if ($vehicle_id == "new") {
            $adding = true;
            $vehicle = new Vehicle();
            $form = $this->createForm(new VehicleFormType(), $vehicle);
        } else {
            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
            $form = $this->createForm(new VehicleFormType(), $vehicle);
        }

        $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        $profilesInfo = Utils::GenerateProfilesInfoList($profiles);

        $form->handleRequest($request);
        $vehicle = $form->getData();

        if ($type == "open") {
            $session->set('vehicle_saved', 1);

            return $this->renderVehicleInformation(
                $prop_pk,
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user,
                $Profile,
                $profilesInfo,
                $profile_selected,
                $ismobile,
                $session,
                null
            );
        }

        if ($form->isValid()) {

            $session = $request->getSession();
            $make_id = $session->get('make_id');
            $model_id = $session->get('model_id');
            $trim_id = $session->get('model_id');

            $Profile->setDateUpdate(new \DateTime);
            if ($vehicle_id == "new") {
                $vehicle->setSerie($this->renderCarSerie());
            }

            if ($adding) {
                $vehicle->setViews(0);
            }

            $vehicle->getVehiclesinformation()->setMake($em->getRepository('AppBundle:Make')->find($make_id));
            $vehicle->getVehiclesinformation()->setModel($em->getRepository('AppBundle:Model')->find($model_id));
            $vehicle->getVehiclesdetails()->setTrim($em->getRepository('AppBundle:Trim')->find($trim_id));
            $vehicle->setDateCreated(new \DateTime);

            $Profile->addProfileVehicles($vehicle);
            $em->persist($Profile);
            $em->flush();
            $vehicle_id = $vehicle->getSerie();

            $breadcrumbs = array(
                array('name' => 'Dealers', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => $profile_selected, 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => 'Vehicle Information', 'path' => 'admin_user_homepage', 'class' => ''),
                array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
            );
            if ($type == "save" || $ismobile == true) {

                $tabActive = $request->get('tabActive');
                return $this->renderVehicleInformation(
                    $prop_pk,
                    $vehicle_id,
                    $form,
                    $breadcrumbs,
                    $user,
                    $Profile,
                    $profilesInfo,
                    $profile_selected,
                    $ismobile,
                    $session,
                    $tabActive
                );

            } else {
                // if is continue it redirect to location page
                return $this->redirect(
                    $this->generateUrl(
                        'vehicle_options',
                        array('type' => "open", 'prop_pk' => $Profile->getSerie(), 'vehicle_id' => $vehicle_id)
                    )
                );
            }
        }
        $session->set('vehicle_saved', 1);
        return $this->renderVehicleInformation(
            $prop_pk,
            $vehicle_id,
            $form,
            $breadcrumbs,
            $user,
            $Profile,
            $profilesInfo,
            $profile_selected,
            $ismobile,
            $session,
            null
        );

    }

    public function deleteVehicleProfileAction($vehicle_id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
        $emails = $em->getRepository('AppBundle:Email')->findByVehicle($vehicle);

        foreach ($emails as $email) {
            if ($email->isOffer()) {
                Utils::decrementNewEmailOfferSessionCounter($request);
            } else {
                Utils::decrementNewEmailMessageSessionCounter($request);
            }
        }
        $em->remove($vehicle);
        $em->flush();
        if ($vehicle->getProfile()) {
            return $this->redirect($this->generateUrl('profile_view', array('prop_pk' => $vehicle->getProfile()->getSerie())));
        } else {
            return $this->redirect($this->generateUrl('admin_user_homepage'));
        }
    }

    public function vehicleOptionsAction($type, $prop_pk, $vehicle_id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $vehicle = null;
        $profile_selected = "";
        $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);

        $form = $this->createForm(new VehicleOptionsFormType(), $vehicle);

        $profile_selected = $Profile->getDescription()->getName();
        $breadcrumbs = array(
            array('name' => 'Dealers', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $profile_selected, 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Vehicle Options', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );

        $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        $profilesInfo = Utils::GenerateProfilesInfoList($profiles);

        if ($type == "open") {
            $session->set('vehicle_saved', 1);

            return $this->rendervehicleoptionspage(
                $prop_pk,
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user,
                $profilesInfo,
                $profile_selected
            );
        }

        $form->handleRequest($request);
        $vehicle = $form->getData();
        if ($form->isValid()) {
            $em->persist($vehicle);
            $em->flush();
        }

        if ($type == "save") {

            return $this->rendervehicleoptionspage(
                $prop_pk,
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user,
                $profilesInfo,
                $profile_selected
            );
        } else {
            // if is continue it redirect to location page
            $detect = new MobileDetect();
            $ismobile = $detect->isMobile();
            $tabActive = $request->get('tabActiveOption');
            if ($ismobile == true) {
                $session->set('VOptions', true);
                return $this->renderVehicleInformation(
                    $prop_pk,
                    $vehicle_id,
                    $form,
                    $breadcrumbs,
                    $user,
                    $Profile,
                    $profilesInfo,
                    $profile_selected,
                    $ismobile,
                    $session,
                    $tabActive
                );
            } else {
                return $this->redirect(
                    $this->generateUrl(
                        'vehicle_gallery',
                        array('type' => "open", 'prop_pk' => $Profile->getSerie(), 'vehicle_id' => $vehicle_id)
                    )
                );
            }
        }
    }

    public function vehicleGalleryAction($type, $prop_pk, $vehicle_id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);

        $profile_selected = $Profile->getDescription()->getName();

        $breadcrumbs = array(
            array('name' => 'Dealers', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $profile_selected, 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Photos', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );
        $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        $profilesInfo = Utils::GenerateProfilesInfoList($profiles);
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
        $Gallery = $vehicle->getGallery();
        $form = $this->createForm(new GalleryFormType(), $Gallery);

        if ($type == "open") {

            $detect = new MobileDetect();
        $ismobile = $detect->isMobile();

            if ($ismobile == true) {
                $session->set('VGalleryOpen', true);
                return $this->renderVehicleInformation(
                    $prop_pk,
                    $vehicle_id,
                    $form,
                    $breadcrumbs,
                    $user,
                    $Profile,
                    $profilesInfo,
                    $profile_selected,
                    $ismobile,
                    $session,
                    null
                );
            } else {
                return $this->rendervehiclegallerypage(
                    $prop_pk,
                    $vehicle_id,
                    $form,
                    $breadcrumbs,
                    $user,
                    $profilesInfo,
                    $profile_selected,
                    $Profile
                );
            }

        } else {
            $originalImages = new ArrayCollection();
            foreach ($Gallery->getProfileImages() as $image) {
                $originalImages->add($image);
            }

            $form->handleRequest($request);
            $editGallery = $form->getData();

            if (count($Gallery->getProfileImages()) > 0) {
                $Owner = $Profile->getUser();
                $OwnerId = $Owner->getId();
                $ProfileId = $Profile->getSerie();
                $counter = 1;
                foreach ($editGallery->getProfileImages() as $image1) {
                    //var_dump($image1);

                    $img_p = $image1->getUploadRootDir();
                    $img_p1 = $image1->getUploadRootDir();

                    $img_pf = "uploads/images" . '/' . $OwnerId . '/' . $ProfileId . '/Car /' . $vehicle_id . '/';

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

                $em->persist($Profile);
                $em->flush();

                $session->set('saved', 1);

                if ($type == 'save') {
                    return $this->rendervehiclegallerypage(
                        $prop_pk,
                        $vehicle_id,
                        $form,
                        $breadcrumbs,
                        $user,
                        $profilesInfo,
                        $profile_selected,
                        $Profile
                    );
                } else {
                    // if is continue it redirect to feeds page
                    $detect = new MobileDetect();
                    $ismobile = $detect->isMobile();
                    $tabActive = $request->get("tabActiveGall");
                    if ($ismobile == true) {
                        $session->set('VGalleryOpen', null);
                        $session->set('VGallery', true);
                        return $this->renderVehicleInformation(
                            $prop_pk,
                            $vehicle_id,
                            $form,
                            $breadcrumbs,
                            $user,
                            $Profile,
                            $profilesInfo,
                            $profile_selected,
                            $ismobile,
                            $session,
                            $tabActive
                        );
                    } else {
                        return $this->redirect(
                            $this->generateUrl(
                                'vehicle_warranty',
                                array('type' => "open", 'prop_pk' => $prop_pk, 'vehicle_id' => $vehicle_id)
                            )
                        );
                    }
                }
            }

            return $this->rendervehiclegallerypage(
                $prop_pk,
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user,
                $profilesInfo,
                $profile_selected,
                $Profile
            );
        }

    }

    public function vehicleWarrantyAction($type, $prop_pk, $vehicle_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
        $profile_selected = $Profile->getDescription()->getName();

        $breadcrumbs = array(
            array('name' => 'Dealers', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $profile_selected, 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Warranty', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $vehicle = null;
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);

        $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        $profilesInfo = Utils::GenerateProfilesInfoList($profiles);

        $form = $this->createForm(new VehicleWarrantyFormType(), $vehicle);

        if ($type == "open") {

            return $this->renderwarrantypage(
                $prop_pk,
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user,
                $Profile,
                $profilesInfo,
                $profile_selected
            );
        }

        $form->handleRequest($request);
        $vehicle = $form->getData();

        if ($form->isValid()) {
            $em->persist($vehicle);
            $em->flush();
        }

        if ($type == 'save') {
            return $this->renderwarrantypage(
                $prop_pk,
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user,
                $profilesInfo,
                $profile_selected,
                $Profile
            );
        } else {
            // if is continue it redirect to location page
            $ismobile = ($request->get("ismobile") == null) ? null : $request->get("ismobile") == "true";
            $tabActive = $request->get("tabActiveWarr");
            if ($ismobile == true) {
                $session->set('VWarranty', true);
                return $this->renderVehicleInformation(
                    $prop_pk,
                    $vehicle_id,
                    $form,
                    $breadcrumbs,
                    $user,
                    $Profile,
                    $profilesInfo,
                    $profile_selected,
                    $ismobile,
                    $session,
                    $tabActive

                );
            } else {
                return $this->redirect(
                    $this->generateUrl(
                        'vehicle_seller_comments',
                        array('type' => "open", 'prop_pk' => $prop_pk, 'vehicle_id' => $vehicle_id)
                    )
                );
            }
        }
    }

    public function vehicleSellerCommentsAction($type, $prop_pk, $vehicle_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
        $profile_selected = $Profile->getDescription()->getName();

        $breadcrumbs = array(
            array('name' => 'Dealers', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $profile_selected, 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Serller Comments', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $vehicle = null;
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);

        $profiles = $em->getRepository('AppBundle:Profile')->getPropertiesByUserAndStatusBoth(
            $user,
            $this->container->getParameter('status.active'),
            $this->container->getParameter('status.inactive')
        );

        $profilesInfo = Utils::GenerateProfilesInfoList($profiles);

        $form = $this->createForm(new VehicleSellerCommentsFormType(), $vehicle);

        if ($type == "open") {

            return $this->rendersellercommentspage(
                $prop_pk,
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user,
                $Profile,
                $profilesInfo,
                $profile_selected
            );
        }

        $form->handleRequest($request);
        $vehicle = $form->getData();

        if ($form->isValid()) {
            $vehicle->setFull(true);
            $em->persist($vehicle);
            $em->flush();
        }

        if ($type == 'save') {
            return $this->rendersellercommentspage(
                $prop_pk,
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user,
                $Profile,
                $profilesInfo,
                $profile_selected
            );

        } else {
            $ismobile = ($request->get("ismobile") == null) ? null : $request->get("ismobile") == "true";
            $tabActive = $request->get("tabActiveSell");
            if ($ismobile == true) {
                return $this->renderVehicleInformation(
                    $prop_pk,
                    $vehicle_id,
                    $form,
                    $breadcrumbs,
                    $user,
                    $Profile,
                    $profilesInfo,
                    $profile_selected,
                    $ismobile,
                    $session,
                    $tabActive
                );
            } else {
                return $this->forward(
                    'AdminBundle:FALManageDashBoard:renderDealerInformation',
                    array('prop_pk' => $prop_pk)
                );
            }
        }

    }

    public function findMakesAction(Request $request)
    {

        try {

            $em = $this->getDoctrine()->getManager();
            $year_id = $request->get("year_id");
            $entities = $em->getRepository('AppBundle:Make')->findByyear($year_id);
            $makes = array();
            foreach ($entities as $entity) {
                $make['value'] = $entity->getId();
                $make['text'] = $entity->getMakeId();
                $makes[] = $make;
            }
            $response = new Response();
            $response->setContent(json_encode($makes));
        } catch (\Exception $ex) {
            $response['success'] = false;
            $response['error'] = $ex->getMessage();
        }

        return $response;

    }

    public function findModelsAction(Request $request)
    {

        try {

            $em = $this->getDoctrine()->getManager();
            $make_id = $request->get("make_id");

            $session = $request->getSession();
            $session->set('make_id', $make_id);

            $entities = $em->getRepository('AppBundle:Model')->findBymake($make_id);
            $makes = array();
            foreach ($entities as $entity) {
                $make['value'] = $entity->getId();
                $make['text'] = $entity->getModelId();
                $makes[] = $make;
            }
            $response = new Response();
            $response->setContent(json_encode($makes));
        } catch (\Exception $ex) {
            $response['success'] = false;
            $response['error'] = $ex->getMessage();
        }

        return $response;

    }

    public function findTrimsAction(Request $request)
    {

        try {

            $em = $this->getDoctrine()->getManager();
            $model_id = $request->get("model_id");
            $entities = $em->getRepository('AppBundle:Trim')->findBymodel($model_id);
            $trims = array();

            $session = $request->getSession();
            $session->set('model_id', $model_id);

            foreach ($entities as $entity) {
                $trim['value'] = $entity->getId();
                $trim['text'] = $entity->getTrimId();
                $trims[] = $trim;
            }
            $response = new Response();
            $response->setContent(json_encode($trims));
        } catch (\Exception $ex) {
            $response['success'] = false;
            $response['error'] = $ex->getMessage();
        }

        return $response;

    }

    public function SetTrimSessionAction(Request $request)
    {

        try {

            $trim_id = $request->get("trim_id");

            $session = $request->getSession();
            $session->set('trim_id', $trim_id);

            $response = new Response();
            $response->setContent(json_encode($trim_id));
        } catch (\Exception $ex) {
            $response['success'] = false;
            $response['error'] = $ex->getMessage();
        }

        return $response;

    }

    /**
     * @param $prop_pk
     * @param $vehicle_id
     * @param $form
     * @param $breadcrumbs
     * @param $user
     * @param $Profile
     * @param $profilesInfo
     * @param $profile_selected
     * @return Response
     */
    public function renderVehicleInformation($prop_pk, $vehicle_id, $form, $breadcrumbs, $user, $Profile, $profilesInfo, $profile_selected, $ismobile, $session, $tabActive)
    {
        $em = $this->getDoctrine()->getManager();

        $make = null;
        $model = null;
        $trim = null;

        if ($vehicle_id != 'new') {
            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
            $make = $vehicle->getVehiclesinformation()->getMake();
            $model = $vehicle->getVehiclesinformation()->getModel();
            $trim = $vehicle->getVehiclesdetails()->getTrim();


        }

        if ($ismobile == true) {

            if ($vehicle_id != 'new') {
                $form = $this->createForm(new VehicleFormType(), $vehicle);
                $formOption = $this->createForm(new VehicleOptionsFormType(), $vehicle);
                $Gallery = $vehicle->getGallery();
                $formGall = $this->createForm(new GalleryFormType(), $Gallery);
                $formWarr = $this->createForm(new VehicleWarrantyFormType(), $vehicle);
                $formSeller = $this->createForm(new VehicleSellerCommentsFormType(), $vehicle);

            } else {
                $form = $this->createForm(new VehicleFormType());
                $formOption = $this->createForm(new VehicleOptionsFormType());
                $formGall = $this->createForm(new GalleryFormType());
                $formWarr = $this->createForm(new VehicleWarrantyFormType());
                $formSeller = $this->createForm(new VehicleSellerCommentsFormType());
            }

            $VOptions = ($session->get("VOptions") == null) ? null : $session->get("VOptions") == "true";
            $VGalleryOpen = ($session->get("VGalleryOpen") == null) ? null : $session->get("VGalleryOpen") == "true";
            $VGallery = ($session->get("VGallery") == null) ? null : $session->get("VGallery") == "true";
            $VWarranty = ($session->get("VWarranty") == null) ? null : $session->get("VWarranty") == "true";

            return $this->render(
                'AdminBundle:VehicleForm:vehicle-information.html.twig',
                array(
                    'form' => $form->createView(),
                    'formOption' => $formOption->createView(),
                    'formGall' => $formGall->createView(),
                    'formWarr' => $formWarr->createView(),
                    'formSeller' => $formSeller->createView(),
                    'prop_pk' => $prop_pk,
                    'user' => $user,
                    'logo' => $Profile->getPath(),
                    'profiles' => $profilesInfo,
                    'vehicle_id' => $vehicle_id,
                    'profile_selected' => $profile_selected,
                    'make' => $make,
                    'model' => $model,
                    'trim' => $trim,
                    'ismobile' => $ismobile,
                    'VOptions' => $VOptions,
                    'VGalleryOpen' => $VGalleryOpen,
                    'VGallery' => $VGallery,
                    'VWarranty' => $VWarranty,
                    'prop' => $Profile,
                    'tabActive' => $tabActive
                )
            );
        } else {
            return $this->render(
                'AdminBundle:VehicleForm:vehicle-information.html.twig',
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
                    'user' => $user,
                    'logo' => $Profile->getPath(),
                    'profiles' => $profilesInfo,
                    'vehicle_id' => $vehicle_id,
                    'profile_selected' => $profile_selected,
                    'make' => $make,
                    'model' => $model,
                    'trim' => $trim,
                    'ismobile' => $ismobile
                )
            );
        }

    }

    public
    function renderCarSerie()
    {

        $rand = rand(1, 999999);

        if (strlen($rand) == 1) {
            $serie = 'CAR-11111' . $rand;
        } else {
            if (strlen($rand) == 2) {
                $serie = 'CAR-1111' . $rand;
            } else {
                if (strlen($rand) == 3) {
                    $serie = 'CAR-111' . $rand;
                } else {
                    if (strlen($rand) == 4) {
                        $serie = 'CAR-11' . $rand;
                    } else {
                        if (strlen($rand) == 5) {
                            $serie = 'CAR-1' . $rand;
                        } else {
                            if (strlen($rand) == 6) {
                                $serie = 'CAR-' . $rand;
                            }
                        }
                    }
                }
            }
        }

        return $serie;
    }

    /**
     * @param $prop_pk
     * @param $vehicle_id
     * @param $form
     * @param $breadcrumbs
     * @param $user
     * @param $profilesInfo
     * @param $profile_selected
     * @return Response
     */
    public function rendervehicleoptionspage(
        $prop_pk,
        $vehicle_id,
        $form,
        $breadcrumbs,
        $user,
        $profilesInfo,
        $profile_selected
    )
    {
        return $this->render(
            'AdminBundle:VehicleForm:vehicle-options.html.twig',
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
                'user' => $user,
                'profiles' => $profilesInfo,
                'vehicle_id' => $vehicle_id,
                'profile_selected' => $profile_selected
            )
        );
    }

    /**
     * @param $prop_pk
     * @param $vehicle_id
     * @param $form
     * @param $breadcrumbs
     * @param $user
     * @param $profilesInfo
     * @param $profile_selected
     * @return Response
     */
    public function rendervehiclegallerypage(
        $prop_pk,
        $vehicle_id,
        $form,
        $breadcrumbs,
        $user,
        $profilesInfo,
        $profile_selected,
        $Profile
    )
    {
        return $this->render(
            'AdminBundle:VehicleForm:vehicle-photos.html.twig',
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
                'user' => $user,
                'profiles' => $profilesInfo,
                'vehicle_id' => $vehicle_id,
                'profile_selected' => $profile_selected,
                'prop' => $Profile
            )
        );
    }

    public function uploadMultipleVehicleImagesAction($prop_pk, $vehicle_id)
    {
        $em = $this->getDoctrine()->getManager();
        $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);
        $response = new Response();
        $Owner = $Profile->getUser();
        $OwnerId = $Owner->getId();
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
        $upload_handler = new \Backend\AdminBundle\Classes\UploadHandler(null, true, null, $Profile, $em, $vehicle);

        return $response->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param $prop_pk
     * @param $vehicle_id
     * @param $form
     * @param $breadcrumbs
     * @param $user
     * @param $Profile
     * @param $profilesInfo
     * @param $profile_selected
     * @return mixed
     */
    public function rendersellercommentspage(
        $prop_pk,
        $vehicle_id,
        $form,
        $breadcrumbs,
        $user,
        $Profile,
        $profilesInfo,
        $profile_selected
    )
    {
        return $this->render(
            'AdminBundle:VehicleForm:vehicle-seller-comments.html.twig',
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
                'user' => $user,
                'logo' => $Profile->getPath(),
                'profiles' => $profilesInfo,
                'vehicle_id' => $vehicle_id,
                'profile_selected' => $profile_selected
            )
        );
    }

    public function renderwarrantypage($prop_pk, $vehicle_id, $form, $breadcrumbs, $user, $Profile, $profilesInfo, $profile_selected)
    {
        return $this->render(
            'AdminBundle:VehicleForm:vehicle-warranty.html.twig',
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
                'user' => $user,
                // 'logo' => $Profile->getPath(),
                'profiles' => $profilesInfo,
                'vehicle_id' => $vehicle_id,
                'profile_selected' => $profile_selected
            )
        );
    }

    public function paginator_generic($class, $start, $limit, $fill)
    {

        $em = $this->getDoctrine()->getManager();


        //$dql = 'SELECT a FROM AppBundle:Vehicle a';

        $dql = "SELECT a FROM $class a $fill ORDER BY a.id ASC";
        $entities = $em->createQuery($dql);
// Creating pagnination
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', $start),
            $limit
        );

        return $pagination;

    }

    public function dealerVehiclescontentAction($prop_pk, Request $request)
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
                $Profile = $em->getRepository('AppBundle:Profile')->findOneBySerie($prop_pk);

                $filtro = array(
                    'dealer' => $prop_pk,
                    'user' => null,
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

        return $this->renderVehiclesContentPage($prop_pk, $vehicles_list, $Profile);

    }

    /**
     * @param $prop_pk
     * @param $vehicles_list
     * @param $Profile
     * @return Response
     */
    public function renderVehiclesContentPage($prop_pk, $vehicles_list, $Profile)
    {
        return $this->render(
            'AdminBundle:DealerForm:dealer-vehicles-content.html.twig',
            array(
                'vehicles_list' => $vehicles_list,
                'profile' => $Profile,
                'prop_pk' => $prop_pk
            )
        );
    }
}