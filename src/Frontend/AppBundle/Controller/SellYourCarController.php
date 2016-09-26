<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 22/09/2015
 * Time: 10:16
 */

namespace Frontend\AppBundle\Controller;


use Doctrine\Common\Collections\ArrayCollection;
use Frontend\AppBundle\Entity\Vehicle;

use Frontend\AppBundle\Entity\VehicleDetails;

use Frontend\AppBundle\Entity\VehicleBasicInformation;

use Frontend\AppBundle\Form\Type\GalleryVehicleFormType;
use Frontend\AppBundle\Form\Type\GalleryVehiclesFormType;

use Frontend\AppBundle\Form\Type\VehicleImageFormType;

use Frontend\AppBundle\Form\Type\VehicleSellerComments;


use Frontend\AppBundle\Entity\VehicleOption;
use Frontend\AppBundle\Form\Type\VehicleSellerCommentsFormType;
use Frontend\AppBundle\Form\Type\VehicleFormType;
use Frontend\AppBundle\Form\Type\VehiclePrivateSellerFormType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Backend\AdminBundle\Classes;
use Backend\AdminBundle;
use \DateTime;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;

class SellYourCarController extends Controller
{


    public function Step1VehicleRegisterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $year = $request->get("year");
        $make = $request->get("make");
        $model = $request->get("model");
        $zipcode = $request->get("zipcode");
        $trim = $request->get("trim");

        $adding = true;
        $vehicle = new Vehicle();
        $vehicleinfo = new VehicleBasicInformation();
        $vehicleDet = new VehicleDetails();

        $obj_year = null;
        $obj_make = null;
        $obj_model = null;

        if ($year != null && $year != "all") {
            $obj_year = $em->getRepository('AppBundle:Year')->find($year);
            $vehicleinfo->setYear($obj_year);
        }
        if ($make != null && $make != "all") {
            $obj_make = $em->getRepository('AppBundle:Make')->find($make);
            $vehicleinfo->setMake($obj_make);
        }
        if ($model != null && $model != "all") {
            $obj_model = $em->getRepository('AppBundle:Model')->find($model);
            $vehicleinfo->setModel($obj_model);
        }
        if ($trim != null && $trim != "all") {
            $obj_trim = $em->getRepository('AppBundle:Trim')->find($trim);
            $vehicleDet->setTrim($obj_trim);
        }
        $vehicleinfo->setZipcode($zipcode);

        $vehicle->setVehiclesinformation($vehicleinfo);
        $vehicle->setVehiclesdetails($vehicleDet);

        $form = $this->createForm(new VehiclePrivateSellerFormType(), $vehicle);

        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            $vehicle = $form->getData();

            if ($form->isValid()) {

                $vehicle->setSerie($this->renderCarSerie());
                if ($adding)
                    $vehicle->setViews(0);
                $vehicle->setDateCreated(new \DateTime);

                $em->persist($vehicle);
                $em->flush();

                return $this->redirect(
                    $this->generateUrl(
                        'step2_vehicle_register',
                        array('type' => 'open', 'vehicle_id' => $vehicle->getSerie())
                    )
                );
            }
        }
        $years = $em->getRepository('AppBundle:Year')->findBy(
            array(),
            array('year' => 'DESC')
        );
        $makes = null;
        $models = null;
        $trims = null;
        if ($obj_year != null) {
            $makes = $em->getRepository('AppBundle:Make')->findByyear($obj_year);
        }
        if ($obj_make != null) {
            $models = $em->getRepository('AppBundle:Model')->findBymake($obj_make);
        }
        if ($obj_model != null) {
            $trims = $em->getRepository('AppBundle:Trim')->findBymodel($obj_model);
        }
        return $this->render(
            'AppBundle:SellYourCar:step1-vehicle-register.html.twig',
            array(
                'form' => $form->createView(),
                'add' => $adding,
                'vehicle_id' => null,
                'obj_year' => $obj_year,
                'years' => $years,
                'make' => $obj_make,
                'makes' => $makes,
                'model' => $obj_model,
                'models' => $models,
                'trims' => $trims,
            )
        );
    }

    public function Step2VehicleRegisterAction($type, $vehicle_id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
        $Gallery = $vehicle->getGallery();
        $form = $this->createForm(new GalleryVehiclesFormType(), $Gallery);

        if ($type == 'open') {
            return $this->render(
                'AppBundle:SellYourCar:step2-vehicle-register.html.twig',
                array(
                    'form' => $form->createView(),
                    'add' => true,
                    'vehicle_id' => $vehicle_id,
                    'id' => 'VehiclesNoUsser' . $vehicle->getId()
                )
            );
        } else {

            $form->handleRequest($request);
            $editGallery = $form->getData();

            if ($Gallery && count($Gallery->getVehicleImages()) > 0) {
                $OwnerId = 'VehiclesNoUsser' . $vehicle->getId();
                $counter = 1;
                foreach ($editGallery->getVehicleImages() as $image1) {


                    $img_p = $image1->getUploadRootDir();
                    $img_pf = "uploads/images" . '/' . $OwnerId . '/' . $vehicle_id . '/';

                    $img_p .= $img_pf;

                    $rand = rand(1, 99999);
                    $myid = "";
                    $myid .= 'VehiclesNoUsser' . $vehicle->getId();
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

                if ($type == 'continue') {
                    return $this->redirect(
                        $this->generateUrl(
                            'step3_privateseller_register',
                            array('vehicle_id' => $vehicle_id)
                        )
                    );
                }

            } else {
                if ($type == 'continue') {
                    return $this->redirect(
                        $this->generateUrl(
                            'step3_privateseller_register',
                            array('vehicle_id' => $vehicle_id)
                        )
                    );
                }
            }

        }
    }

    public function uploadMultipleVehicleImagesAction($vehicle_id)
    {
        $em = $this->getDoctrine()->getManager();

        $response = new Response();
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
        $user = null;

        $upload_handler = new \Frontend\AppBundle\Classes\UploadHandler(null, true, null, null, $em, $vehicle);

        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function saveImageAction(Request $request)
    {

        $response = new Response();
        $session = $request->getSession();
        $pictureId = $request->get('pictId');
        $vehicle_id = $request->get('vehicle_id');
        $orden = $request->get('orden');
        $photo = $request->files->get('photo');
        $title = $request->get('title');
        $em = $this->getDoctrine()->getManager();

        $session->set('saved', 0);


        try {
            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);
            $OwnerId = 'VehiclesNoUsser' . $vehicle->getId();
            $gallery = $vehicle->getGallery();

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
                $myid .= 'VehiclesNoUsser' . $vehicle->getId();
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

        $fs->remove(array('symlink', $image->getPath(), $image->getFileName()));
        $gallery = $image->getGallery();
        $gallery->removeVehicleImage($image);

        $em->remove($image);
        $em->persist($gallery);
        $em->flush();

        return $this->render('AdminBundle:Default:image-form.html.twig', array('i' => $i));
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

    public function Step3PrivateSellerRegisterAction($vehicle_id, Request $request)
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

        $em = $this->getDoctrine()->getManager();
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($vehicle_id);

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
                $user->setEnabled(true);
                $userManager->updateUser($user);
                $vehicle->setFull(true);
                $user->addUserVehicles($vehicle);
                $em->persist($user);
                $em->flush();

                $email = $user->getEmail();

                if ($vehicle->getGallery() != null) {
                    rename("..\\web\\uploads\\images\\" . 'VehiclesNoUsser' . $vehicle->getId(), "..\\web\\uploads\\images\\" . $user->getId());
                }
                if (null === $response = $event->getResponse()) {
                    $url = $this->container->get('router')->generate('fos_user_registration_check_email', array('user' => $user));
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }
        }

        return $this->container->get('templating')->renderResponse('AppBundle:SellYourCar:step3-vehicle-register.html.twig', array(
            'form' => $form->createView(),
            'csrf_token' => $csrfToken,
            'vehicle_id' => $vehicle_id
        ));
    }

    public function resendEmailConfirmation($user)
    {
        $user_obj = $this->container->get('fos_user.user_manager')->findUserByEmail($user);
        $url = $this->container->get('router')->generate('fos_user_registration_confirm', array('token' => $user_obj->getConfirmationToken()), true);
        $message = \Swift_Message::newInstance()
            ->setSubject('Account Confirmation')
            ->setFrom('registration@homeescape.com', 'Free Auto Listing')
            ->setTo($user)
            ->setBody($this->container->get('templating')->renderResponse('AppBundle:Default:confirmation-mail.html.twig', array(
                'user' => $user_obj,
                'url' => $url
            ))->getContent(), 'text/html');

        $this->container->get('mailer')->send($message);
    }


}