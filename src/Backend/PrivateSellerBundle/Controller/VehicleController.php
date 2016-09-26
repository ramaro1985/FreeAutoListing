<?php
/**
 * Created by PhpStorm.
 * User: Roberto
 * Date: 27/08/2016
 * Time: 8:03
 */

namespace Backend\PrivateSellerBundle\Controller;


use Doctrine\Common\Collections\ArrayCollection;

use Frontend\AppBundle\Entity\Vehicle;

use Frontend\AppBundle\Form\Type\GalleryVehicleFormType;
use Frontend\AppBundle\Form\Type\GalleryVehiclesFormType;

use Frontend\AppBundle\Form\Type\VehicleImageFormType;

use Frontend\AppBundle\Form\Type\VehicleSellerComments;
use Frontend\AppBundle\Form\Type\VehicleSellerCommentsFormType;
use Frontend\AppBundle\Form\Type\VehicleFormType;
use Frontend\AppBundle\Form\Type\VehicleWarrantyFormType;
use Frontend\AppBundle\Form\Type\VehicleOptionsFormType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Backend\AdminBundle\Classes;
use Backend\AdminBundle;
use \DateTime;

class VehicleController extends Controller
{


    public function vehicleInformatcionAction($type, $vehicle_id, Request $request)
    {

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $vehicle = null;
        $basicinformation = null;
        $details = null;
        $form = null;
        $adding = false;


        if ($vehicle_id == "new") {
            $adding = true;
            $vehicle = new Vehicle();
            $form = $this->createForm(new VehicleFormType(), $vehicle);
        } else {
            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
            $form = $this->createForm(new VehicleFormType(), $vehicle);
        }

        $form->handleRequest($request);
        $vehicle = $form->getData();

        $breadcrumbs = array(
            array('name' => 'DashBoard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Vehicle Information', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );

        if ($type == "open") {
            $session->set('vehicle_saved', 1);

            return $this->renderVehicleInformation(
                $vehicle_id,
                $form,
                $user, $breadcrumbs
            );
        }

        if ($form->isValid()) {

            $session = $request->getSession();
            $make_id = $session->get('make_id');
            $model_id = $session->get('model_id');
            $trim_id = $session->get('model_id');

            if ($vehicle_id == "new") {
                $vehicle->setSerie($this->renderCarSerie());
            }

            if ($adding)
                $vehicle->setViews(0);

            $vehicle->getVehiclesinformation()->setMake($em->getRepository('AppBundle:Make')->find($make_id));
            $vehicle->getVehiclesinformation()->setModel($em->getRepository('AppBundle:Model')->find($model_id));
            $vehicle->getVehiclesdetails()->setTrim($em->getRepository('AppBundle:Trim')->find($trim_id));
            $vehicle->setDateCreated(new \DateTime);

            $user->addUserVehicles($vehicle);
            $em->persist($user);

            $em->flush();
            $vehicle_id = $vehicle->getSerie();
            if ($type == "save") {

                return $this->renderVehicleInformation(
                    $vehicle_id,
                    $form,
                    $user, $breadcrumbs
                );

            } else {
                // if is continue it redirect to location page
                return $this->redirect(
                    $this->generateUrl(
                        'private_vehicle_options',
                        array('type' => "open", 'vehicle_id' => $vehicle_id)
                    )
                );
            }

        }


        $session->set('vehicle_saved', 1);


        return $this->renderVehicleInformation(
            $vehicle_id,
            $form,
            $user, $breadcrumbs
        );

    }

    public function vehicleOptionsAction($type, $vehicle_id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);

        $form = $this->createForm(new VehicleOptionsFormType(), $vehicle);

        $breadcrumbs = array(
            array('name' => 'DashBoard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Vehicle Options', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );

        if ($type == "open") {
            $session->set('vehicle_saved', 1);

            return $this->rendervehicleoptionspage(
                $vehicle_id,
                $form,
                $user, $breadcrumbs
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
                $vehicle_id,
                $form,
                $user, $breadcrumbs
            );
        } else {
            // if is continue it redirect to location page
            return $this->redirect(
                $this->generateUrl(
                    'private_vehicle_gallery',
                    array('type' => "open", 'vehicle_id' => $vehicle_id)
                )
            );
        }
    }

    public function vehicleGalleryAction($type, $vehicle_id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
        $Gallery = $vehicle->getGallery();
        $form = $this->createForm(new GalleryVehiclesFormType(), $Gallery);

        $breadcrumbs = array(
            array('name' => 'DashBoard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Photos', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );

        if ($type == "open") {
            return $this->rendervehiclegallerypage(
                $vehicle_id,
                $form,
                $user, $breadcrumbs
            );
        } else {

            $originalImages = new ArrayCollection();

            foreach ($Gallery->getVehicleImages() as $image) {
                $originalImages->add($image);
            }

            $form->handleRequest($request);
            $editGallery = $form->getData();

            if (count($Gallery->getVehicleImages()) > 0) {
                $OwnerId = $user->getId();
                $counter = 1;
                foreach ($editGallery->getVehicleImages() as $image1) {


                    $img_p = $image1->getUploadRootDir();
                    $img_pf = "uploads/images" . '/' . $OwnerId . '/' . $vehicle_id . '/';

                    $img_p .= $img_pf;

                    $rand = rand(1, 99999);
                    $myid = "";
                    $myid .= $user->getId();
                    $myid .= "_";
                    $myid .= $rand;

                    $image1->upload($img_p, $img_pf, $myid);


                    if ($image1->getPath() == null) {
                        $editGallery->removeVehicleImage($image1);
                    }
                    $counter++;
                }

                $em->persist($vehicle);
                $em->flush();

                $session->set('saved', 1);

                if ($type == 'save') {
                    return $this->rendervehiclegallerypage(
                        $vehicle_id,
                        $form,
                        $user, $breadcrumbs
                    );
                } else {
                    // if is continue it redirect to feeds page
                    return $this->redirect(
                        $this->generateUrl(
                            'private_vehicle_warranty',
                            array('type' => "open", 'vehicle_id' => $vehicle_id)
                        )
                    );
                }

            }

            return $this->rendervehiclegallerypage(
                $vehicle_id,
                $form,
                $user, $breadcrumbs
            );
        }

    }

    public function vehicleWarrantyAction($type, $vehicle_id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $breadcrumbs = array(
            array('name' => 'DashBoard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Warranty', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $vehicle = null;
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);

        $form = $this->createForm(new VehicleWarrantyFormType(), $vehicle);

        if ($type == "open") {

            return $this->renderwarrantypage(
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user
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
                $vehicle_id,
                $form,
                $breadcrumbs,
                $user
            );
        } else {
            // if is continue it redirect to feeds page
            return $this->redirect(
                $this->generateUrl(
                    'private_vehicle_seller_comments',
                    array('type' => "open", 'vehicle_id' => $vehicle_id)
                )
            );
        }
    }

    public function vehicleSellerCommentsAction($type, $vehicle_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $vehicle = null;
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);

        $breadcrumbs = array(
            array('name' => 'DashBoard', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => 'Seller Comments', 'path' => 'admin_user_homepage', 'class' => ''),
            array('name' => $vehicle_id, 'path' => '', 'class' => 'active'),
        );

        $form = $this->createForm(new VehicleSellerCommentsFormType(), $vehicle);

        if ($type == "open") {

            return $this->rendersellercommentspage(
                $vehicle_id,
                $form,
                $user,
                $breadcrumbs
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
                $vehicle_id,
                $form,
                $user
            );

        } else {
            return $this->forward('AdminBundle:Default:index');
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
    public function renderVehicleInformation(
        $vehicle_id,
        $form,
        $user, $breadcrumbs

    )
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
        return $this->render(
            'PrivateSellerBundle:Default:vehicle-information.html.twig',
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
                'user' => $user,
                'vehicle_id' => $vehicle_id,
                'count_vehicles' => 0,
                'make' => $make,
                'model' => $model,
                'trim' => $trim
            )
        );
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

        $vehicle_id,
        $form,
        $user, $breadcrumbs

    )
    {
        return $this->render(
            'PrivateSellerBundle:Default:vehicle-options.html.twig',
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
                'user' => $user,
                'vehicle_id' => $vehicle_id,
                'count_vehicles' => 0
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

        $vehicle_id,
        $form,
        $user, $breadcrumbs

    )
    {

        return $this->render(
            'PrivateSellerBundle:Default:vehicle-photos.html.twig',
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
                'breadcrumbs' => $breadcrumbs,
                'new_reservation' => false,
                'user' => $user,
                'vehicle_id' => $vehicle_id,
                'count_vehicles' => 0
            )
        );
    }

    public function uploadMultipleVehicleImagesAction($vehicle_id)
    {
        $em = $this->getDoctrine()->getManager();

        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $response = new Response();
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);

        $upload_handler = new \Backend\PrivateSellerBundle\Classes\UploadHandler(null, true, null, $user, $em, $vehicle);

        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function saveImageAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $response = new Response();
        $session = $request->getSession();
        $pictureId = $request->get('pictId');
        $orden = $request->get('orden');
        $photo = $request->files->get('photo');
        $title = $request->get('title');
        $em = $this->getDoctrine()->getManager();

        $session->set('saved', 0);


        try {
            $OwnerId = $user->getId();
            $gallery = $user->getVehicles()->getGallery();

            if ($pictureId == 'new') {
                $counter = 1;
                $image = New \Frontend\AppBundle\Entity\VehicleImage();
                $image->setOrden($orden);
                $image->setGallery($gallery);
                $image->setTitle($title);
                $image->setPhoto($photo);
                //$gallery->addPropertyImage($image);
                $img_p = $image->getUploadRootDir();
                $rand = rand(1, 99999);

                $img_pf = "uploads/images" . '/' . $OwnerId . '/';

                $img_p .= $img_pf;
                //$iid=$image1->getId();
                //echo("id: ".$counter);
                $myid = "";
                $myid .= $user->getId();
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
    }

    public function newImageFormAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $i = $request->get('i');
        $pictId = $request->get('pictId');
        $image = $em->getRepository('AppBundle:VehicleImage')->find($pictId);
        $fs = new \Symfony\Component\Filesystem\Filesystem();
        //var_dump($image->getPath());
        $fs->remove(array('symlink', $image->getPath(), $image->getFileName()));
        $gallery = $image->getGallery();
        $gallery->removeVehicleImage($image);

        $em->remove($image);
        $em->persist($gallery);
        $em->flush();

        return $this->render('AdminBundle:Default:image-form.html.twig', array('i' => $i));
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
        $vehicle_id,
        $form,
        $user,
        $breadcrumbs
    )
    {
        $breadcrumbs = array(
            array('name' => '', 'path' => '', 'class' => '')
        );
        return $this->render(
            'PrivateSellerBundle:Default:vehicle-seller-comments.html.twig',
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
                'user' => $user,
                'vehicle_id' => $vehicle_id,
                'count_vehicles' => 0
            )
        );
    }

    public function renderwarrantypage($vehicle_id, $form, $breadcrumbs, $user)
    {
        return $this->render(
            'PrivateSellerBundle:Default:vehicle-warranty.html.twig',
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
                'user' => $user,
                'vehicle_id' => $vehicle_id,
                'count_vehicles' => 0
            )
        );
    }

    public function paginator_generic($class, $start, $limit, $fill)
    {

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT a FROM $class a $fill ORDER BY a.id ASC";
        $entities = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', $start),
            $limit
        );

        return $pagination;

    }
}