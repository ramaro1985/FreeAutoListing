<?php
/**
 * Created by PhpStorm.
 * User: rafael.leyva
 * Date: 9/8/2015
 * Time: 2:32 PM
 */

namespace Frontend\AppBundle\Controller;

use Backend\AdminBundle\Controller\Utils;
use Doctrine\Common\Collections\ArrayCollection;
use Frontend\AppBundle\Entity\ContactFront;
use Frontend\AppBundle\Entity\ContactFrontReply;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Frontend\AppBundle\Entity\Inquiry;
use Frontend\AppBundle\Entity\User;
use Frontend\AppBundle\Entity\Review;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Frontend\AppBundle\Form\Type\EmailFormType;
use Frontend\AppBundle\Entity\Email;
use Frontend\AppBundle\Form\Type\OfferFormType;
use Symfony\Component\Validator\Constraints\Date;
use Frontend\AppBundle\Form\Type\VehicleOptionsFormType;
use Frontend\AppBundle\Form\Type\ReviewFormType;
use Frontend\AppBundle\Form\Type\ContactFrontFormType;
use Symfony\Component\Yaml\Tests\A;


class FrontendFALController extends Controller
{

    public function searchCarResultsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$vehicles = $em->getRepository('AppBundle:Vehicle')->findAll();
        $suser = $this->get('security.context')->getToken()->getUser();
        $savedcars = $this->GetSavedCars($suser, $em);

        $searchlist = array();
        $filtro = array();
        $filtro['sort'] = 0;
        $vehicles = null;
        $error = true;
        if ($request->getMethod() == "POST") {
            $filtro['year'] = $request->get("year");
            $filtro['make'] = $request->get("make");
            $filtro['model'] = $request->get("model");
            $filtro['zipcode'] = $request->get("zipcode");

            $searchlist['years'] = $this->GetYearFilterBox($filtro, $em);
            $searchlist['makes'] = $this->getMakeFilterBox($filtro, $em);
            $searchlist['models'] = $this->getModelFilterBox($filtro, $em);
            $searchlist['zipcode'] = $this->getZipCodeFilterBox($filtro);

            $vehicles = $em->getRepository('AppBundle:Vehicle')->SearchCarsResults($filtro);
            $error = false;
        }
        if ($error) {
            $vehicles = $em->getRepository('AppBundle:Vehicle')->findBy(array('full' => true));
        }
        $conditions = $em->getRepository('AppBundle:Condition')->findAll();
        $bodystyles = $em->getRepository('AppBundle:VehicleStyle')->findAll();
        $transmissions = $em->getRepository('AppBundle:Transmission')->findAll();
        $fuels = $em->getRepository('AppBundle:FuelType')->findAll();
        $doorss = $em->getRepository('AppBundle:Doors')->findAll();
        $colors = $em->getRepository('AppBundle:Colors')->findAll();
        $obj_year = $em->getRepository('AppBundle:Year')->findBy(
            array(),
            array('year' => 'DESC')
        );
        //$obj_make = $em->getRepository('AppBundle:Make')->findAll();
        $obj_make = $em->getRepository('AppBundle:Make')->selectDistinctMakes();
        //$obj_model = $em->getRepository('AppBundle:Model')->findAll();
        $obj_model = array();
        $prices = FrontEndUtils::CreatePriceList();
        $mileage = FrontEndUtils::CreateMileageList();

        $countperpage = 12;

        $paginator = $this->get('knp_paginator');
        $vehicles_list = $paginator->paginate(
            $vehicles,
            $this->get('request')->query->get('page', 1),
            $countperpage
        );
        if ($this->get('request')->query->get('page') == null) {
            return $this->render(
                'AppBundle:FAL:search-results.html.twig',
                array(
                    'vehicles' => $vehicles_list,
                    'obj_year' => $obj_year,
                    'obj_make' => $obj_make,
                    'obj_model' => $obj_model,
                    'filterlist' => $searchlist,
                    'conditions' => $conditions,
                    'bodystyles' => $bodystyles,
                    'transmissions' => $transmissions,
                    'fuels' => $fuels,
                    'doorss' => $doorss,
                    'prices' => $prices,
                    'mileages' => $mileage,
                    'colors' => $colors,
                    'savedcars' => $savedcars
                )
            );
        } else {
            return $this->render(
                'AppBundle:FAL:all-results-cars.html.twig',
                array(
                    'vehicles' => $vehicles_list,
                    'savedcars' => $savedcars
                )
            );
        }
    }

    public function carDetailsAction($serie, Request $request)
    {

        $em = $this->getdoctrine()->getmanager();
        if ($serie != 'no_serie') {
            $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($serie);
        }


        if ($request->getMethod() == 'POST') {


            if ($request->get("profile") && $request->get("profile") != null) {

                $profile_obj = $em->getRepository('AppBundle:Profile')->findOneBySerie($request->get("profile"));
                $email_to = $profile_obj->getContact()->getEmail();
            } else {
                if ($vehicle->getProfile()) {
                    $profile_obj = $vehicle->getProfile();
                    $email_to = $profile_obj->getContact()->getEmail();
                } else {
                    if ($vehicle->getUser()) {
                        $user_obj = $vehicle->getUser();
                        $email_to = $user_obj->getEmail();
                    }
                }
            }
            $body_mail = $request->get("body_mail");
            $offer = $request->get("offer_text");
            $remitent_mail = $request->get("remitent_mail");
            $remitent_name = $request->get("remitent_name");
            $remitent_phone = $request->get("remitent_phone");

            $obj_email = new Email();
            if ($body_mail && $body_mail != "") {
                $obj_email->setBodyMail($body_mail);
                $obj_email->setOffer(false);
            } else {
                $obj_email->setOfferText($offer);
                $obj_email->setOffer(true);
            }
            $obj_email->setDateCreated(new \DateTime);
            $obj_email->setOpened(false);

            if ($request->get("profile") && $request->get("profile") != null) {

                $obj_email->setProfile($profile_obj);
                $obj_email->setSubject("Email");

            } else {

                if ($vehicle->getProfile()) {
                    $obj_email->setProfile($profile_obj);
                } else {
                    if ($vehicle->getUser()) {
                        $obj_email->setUser($user_obj);
                    }
                }
                $obj_email->setVehicle($vehicle);

                if ($request->get("formulario") == 'mail') {
                    $obj_email->setSubject("Comment of Car");
                    $subject = "Comment of Car";
                } else {
                    if ($request->get("formulario") == 'offer') {
                        $obj_email->setSubject("Offer of Car");
                        $subject = "Offer of Car";
                    }
                }
            }

            $obj_email->setRemitentName($remitent_name);
            $obj_email->setRemitentPhone($remitent_phone);
            $obj_email->setRemitentMail($remitent_mail);

            $em->persist($obj_email);
            $em->flush();

            if ($obj_email->isOffer()) {
                Utils::incrementNewEmailOfferSessionCounter($request);
            } else {
                Utils::incrementNewEmailMessageSessionCounter($request);
            }

            //send email to real email address of dealer

            /* $template = "AppBundle:FAL:email.txt.twig";
               $options = array('body_mail' => $body_mail);
               $to = $email_to;
               $from = array("booking@homeescape.com", 'Free Auto Listing');
               $subject = $subject;

               $this->sendEmail($template, $options, $to, $from, $subject);*/

            if ($request->get('compare_car') && $request->get('compare_car') == true) {

                try {
                    return new JsonResponse(
                        [
                            'success' => true
                        ]
                    );

                } catch (\Exception $exception) {
                    return new JsonResponse(
                        [
                            'success' => false,
                            'code' => $exception->getCode(),
                            'message' => $exception->getMessage(),
                        ]
                    );

                }
            }

        }

        $form = $this->createForm(new EmailFormType());
        $offer = $this->createForm(new OfferFormType());

        $basicinfo = $vehicle->getVehiclesinformation();
        $make = $basicinfo->getMake()->getId();
        $year = $basicinfo->getYear()->getId();
        $model = $basicinfo->getModel()->getId();
        $currentId = $vehicle->getId();
        $filtro = array(
            'year' => $year,
            'make' => $make,
            'model' => $model,
            'current_id' => $currentId
        );
        $vehicle->setViews($vehicle->getViews() + 1);
        $em->persist($vehicle);
        $em->flush();
        $similiar = $this->FindSimilarModels(new ArrayCollection(), $filtro, $vehicle, 0);

        return $this->render(
            'AppBundle:FAL:car-details.html.twig',
            array(
                'vehicle' => $vehicle,
                'similars' => $similiar,
                'form' => $form->createView(),
                'form_offer' => $offer->createView(),
            )
        );
    }

    public function allVehiclesContentAction(Request $request)
    {

        if ($request->getMethod() == 'POST') {
            try {

                $limit = $request->get("limit");
                $sort = $request->get("sort");
                $start = $request->get("start");


                $session = $request->getSession();
                $session->set("paginator_limit", $limit);

                $em = $this->getDoctrine()->getManager();

                $filtro = array(
                    'dealer' => '',
                    'user' => null,
                    'sort' => $sort
                );

                $vehicles = $em->getRepository('AppBundle:Vehicle')->filterCarResult($filtro);

                $paginator = $this->get('knp_paginator');
                $vehicles_list = $paginator->paginate(
                    $vehicles,
                    $this->get('request')->query->get('page', $start),
                    $limit
                );

            } catch (\Exception $ex) {
                throw new \Exception($ex->getMessage());
                $response['success'] = false;
                $response['error'] = $ex->getMessage();
            }
        }
        $suser = $this->get('security.context')->getToken()->getUser();
        $savedcars = $this->GetSavedCars($suser, $em);
        return $this->render(
            'AppBundle:FAL:all-results-cars.html.twig',
            array(
                'vehicles' => $vehicles_list,
                'savedcars' => $savedcars
            )
        );

    }

    public function searchAllVehiclesContentAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            try {
                $profileserie = $request->get("profile");
                $limit = $request->get("limit");
                $start = $request->get("start");
                $zipcode = ($request->get("zipcode") == null) ? array() : $request->get("zipcode");
                $model = ($request->get("model") == null) ? array() : $request->get("model");
                $make = ($request->get("make") == null) ? array() : $request->get("make");
                $year = ($request->get("year") == null) ? array() : $request->get("year");
                if (count($year) > 0) {
                    $year = $this->GetYearRangeValues($year[0]);
                }
                $condition = ($request->get("condition") == null) ? array() : $request->get("condition");
                $transmission = ($request->get("transmission") == null) ? array() : $request->get("transmission");
                $bodystyle = ($request->get("bodystyle") == null) ? array() : $request->get("bodystyle");
                $fuel = ($request->get("fuel") == null) ? array() : $request->get("fuel");
                $doors = ($request->get("doors") == null) ? array() : $request->get("doors");
                $drive = ($request->get("drives") == null) ? array() : $request->get("drives");
                $engine = ($request->get("engines") == null) ? array() : $request->get("engines");
                $prices = ($request->get("prices") == null) ? array() : $request->get("prices");
                $sort = $request->get("sort");
                $interiorcolor = ($request->get("interiorcolor") == null) ? array() : $request->get("interiorcolor");
                $exteriorcolor = ($request->get("exteriorcolor") == null) ? array() : $request->get("exteriorcolor");
                $mileage = ($request->get("mileage") == null) ? array() : $request->get("mileage");
                if (count($mileage) > 0) {
                    $mileage = explode(" ", $mileage[0]);
                }

                $filtro = array(
                    'zipcode' => $zipcode,
                    'model' => $model,
                    'make' => $make,
                    'year' => $year,
                    'condition' => $condition,
                    'bodystyle' => $bodystyle,
                    'transmission' => $transmission,
                    'fuel' => $fuel,
                    'doors' => $doors,
                    'prices' => $prices,
                    'sort' => $sort,
                    'drive' => null,
                    'engine' => null,
                    'trim' => null,
                    'private' => null,
                    'mileage' => $mileage,
                    'interiorcolor' => $interiorcolor,
                    'exteriorcolor' => $exteriorcolor,
                    'profileserie' => $profileserie,
                );
                $session = $request->getSession();
                $session->set("paginator_limit", $limit);

                $em = $this->getDoctrine()->getManager();
                $vehicles = $em->getRepository('AppBundle:Vehicle')->SearchCarsAllFiltersResults($filtro);

                $paginator = $this->get('knp_paginator');
                $vehicles_list = $paginator->paginate(
                    $vehicles,
                    $this->get('request')->query->get('page', $start),
                    $limit
                );

            } catch (\Exception $ex) {
                throw new \Exception($ex->getMessage());
                $response['success'] = false;
                $response['error'] = $ex->getMessage();
            }
        }
        $suser = $this->get('security.context')->getToken()->getUser();
        $savedcars = $this->GetSavedCars($suser, $em);

        return $this->render(
            'AppBundle:FAL:all-results-cars.html.twig',
            array(
                'vehicles' => $vehicles_list,
                'savedcars' => $savedcars
            )
        );
    }

    public function movilsearchAllVehiclesContentAction(Request $request)
    {

        try {
            $vehicles_list = $this->GetVehicleListFromFilter($request);

            $em = $this->getDoctrine()->getManager();
            $conditions = $em->getRepository('AppBundle:Condition')->findAll();
            $years = $em->getRepository('AppBundle:Year')->findBy(
                array(),
                array('year' => 'DESC')
            );
            $makes = $em->getRepository('AppBundle:Make')->selectDistinctMakes();
            $colors = $em->getRepository('AppBundle:Colors')->findAll();
            $transmissions = $em->getRepository('AppBundle:Transmission')->findAll();
            $engines = $em->getRepository('AppBundle:EngineType')->findAll();
            $fuels = $em->getRepository('AppBundle:FuelType')->findAll();
            $drives = $em->getRepository('AppBundle:VehicleDriveType')->findAll();
            $doors = $em->getRepository('AppBundle:Doors')->findAll();
            $bodystyles = $em->getRepository('AppBundle:VehicleStyle')->findAll();
            $mileage = FrontEndUtils::CreateMileageList();
            $prices = FrontEndUtils::CreateMileageList();


        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
            $response['success'] = false;
            $response['error'] = $ex->getMessage();
        }


        return $this->render(
            'AppBundle:FAL:movil-all-results-cars.html.twig',
            array(
                'conditions' => $conditions,
                'years' => $years,
                'obj_make' => $makes,
                'vehicles' => $vehicles_list,
                'colors' => $colors,
                'transmissions' => $transmissions,
                'engines' => $engines,
                'fuels' => $fuels,
                'drives' => $drives,
                'doors' => $doors,
                'bodystyles' => $bodystyles,
                'prices' => $prices,
                'mileages' => $mileage
            )
        );
    }

    public function movilSearchFiltersAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $conditions = $em->getRepository('AppBundle:Condition')->findAll();
        $years = $em->getRepository('AppBundle:Year')->findBy(
            array(),
            array('year' => 'DESC')
        );
        $styles = $em->getRepository('AppBundle:VehicleStyle')->findAll();
        $obj_make = $em->getRepository('AppBundle:Make')->selectDistinctMakes();
        $prices = FrontEndUtils::CreatePriceList();
        $transmissions = $em->getRepository('AppBundle:Transmission')->findAll();

        return $this->render(
            'AppBundle:FAL:movil-search-filters.html.twig',
            array(
                'conditions' => $conditions,
                'years' => $years,
                'prices' => $prices,
                'styles' => $styles,
                'makes' => $obj_make,
                'transmissions' => $transmissions

            )
        );
    }

    public function movilAllResultCarsContentAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            try {
                $zipcode = ($request->get("zipcode") == null) ? array() : $request->get("zipcode");
                $model = ($request->get("model") == null) ? array() : $request->get("model");
                $make = ($request->get("make") == null) ? array() : $request->get("make");
                $year = ($request->get("year") == null) ? array() : $request->get("year");
                $condition = ($request->get("condition") == null) ? array() : $request->get("condition");
                $transmission = ($request->get("transmissions") == null) ? array() : $request->get("transmissions");
                $bodystyle = ($request->get("bodystyle") == null) ? array() : $request->get("bodystyle");
                $fuel = ($request->get("fuels") == null) ? array() : $request->get("fuels");
                $doors = ($request->get("doors") == null) ? array() : $request->get("doors");
                $drive = ($request->get("drives") == null) ? array() : $request->get("drives");
                $engine = ($request->get("engines") == null) ? array() : $request->get("engines");
                $trims = ($request->get("trims") == null) ? array() : $request->get("trims");
                $prices = ($request->get("prices") == null) ? array() : $request->get("prices");
                $private = ($request->get("private") == null) ? array() : $request->get("private");
                $mileage = ($request->get("mileage") == null) ? array() : $request->get("mileage");
                $interiorcolor = ($request->get("interiorcolor") == null) ? array() : $request->get("interiorcolor");
                $mileage = explode(" ", $mileage[0]);

                $sort = $request->get("sort");

                $filtro = array(
                    'zipcode' => $zipcode,
                    'model' => $model,
                    'make' => $make,
                    'year' => $year,
                    'condition' => $condition,
                    'bodystyle' => $bodystyle,
                    'transmission' => $transmission,
                    'fuel' => $fuel,
                    'doors' => $doors,
                    'prices' => $prices,
                    'prices' => null,
                    'sort' => $sort,
                    'drive' => $drive,
                    'engine' => $engine,
                    'trim' => $trims,
                    'private' => $private,
                    'mileage' => $mileage,
                    'interiorcolor' => $interiorcolor,
                    'exteriorcolor' => null,
                    'profileserie' => null,
                );
                $em = $this->getDoctrine()->getManager();
                $vehicles = $em->getRepository('AppBundle:Vehicle')->SearchCarsAllFiltersResults($filtro);

            } catch (\Exception $ex) {
                throw new \Exception($ex->getMessage());
                $response['success'] = false;
                $response['error'] = $ex->getMessage();
            }
        }

        return $this->render(
            'AppBundle:FAL:movil-all-results-cars-content.html.twig',
            array(
                'vehicles' => $vehicles,
                'obj_model' => $em->getRepository('AppBundle:Model')->findAll()
            )
        );
    }

    public function MovilCarDetailsAction($serie, Request $request)
    {

        $em = $this->getdoctrine()->getmanager();
        $vehicle = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($serie);

        if ($request->getMethod() == 'POST') {


            if ($vehicle->getProfile()) {
                $profile_obj = $vehicle->getProfile();
                $email_to = $profile_obj->getContact()->getEmail();
            } else {
                if ($vehicle->getUser()) {
                    $user_obj = $vehicle->getUser();
                    $email_to = $user_obj->getEmail();
                }
            }

            $body_mail = $request->get("body_mail");
            $offer = $request->get("offer_text");
            $remitent_mail = $request->get("remitent_mail");
            $remitent_name = $request->get("remitent_name");
            $remitent_phone = $request->get("remitent_phone");

            $obj_email = new Email();
            if ($body_mail && $body_mail != "") {
                $obj_email->setBodyMail($body_mail);
                $obj_email->setOffer(false);
            } else {
                $obj_email->setOfferText($offer);
                $obj_email->setOffer(true);
            }
            $obj_email->setDateCreated(new \DateTime);
            $obj_email->setOpened(false);

            if ($vehicle->getProfile()) {
                $obj_email->setProfile($profile_obj);
            } else {
                if ($vehicle->getUser()) {
                    $obj_email->setUser($user_obj);
                }
            }
            $obj_email->setVehicle($vehicle);
            $obj_email->setRemitentName($remitent_name);
            $obj_email->setRemitentPhone($remitent_phone);
            $obj_email->setRemitentMail($remitent_mail);
            //$obj_email->setRemitentLastName($remitent_last_name);

            if ($request->get("formulario") == 'mail') {
                $obj_email->setSubject("Comment of Car");
            } else {
                if ($request->get("formulario") == 'offer') {
                    $obj_email->setSubject("Offer of Car");
                }
            }

            $em->persist($obj_email);
            $em->flush();

            if ($obj_email->isOffer()) {
                Utils::incrementNewEmailOfferSessionCounter($request);
            } else {
                Utils::incrementNewEmailMessageSessionCounter($request);
            }

            //send email to real email address of dealer

            $template = "AppBundle:FAL:email.txt.twig";
            $options = array('body_mail' => $body_mail);
            $to = $email_to;
            $from = array("booking@homeescape.com", 'Free Auto Listing');
            $subject = "Comment of Car";

            $this->sendEmail($template, $options, $to, $from, $subject);

        }

        $form = $this->createForm(new EmailFormType());
        $offer = $this->createForm(new OfferFormType());

        $basicinfo = $vehicle->getVehiclesinformation();
        $make = $basicinfo->getMake()->getId();
        $year = $basicinfo->getYear()->getId();
        $model = $basicinfo->getModel()->getId();
        $currentId = $vehicle->getId();
        $filtro = array(
            'year' => $year,
            'make' => $make,
            'model' => $model,
            'current_id' => $currentId
        );
        $vehicle->setViews($vehicle->getViews() + 1);
        $em->persist($vehicle);
        $em->flush();
        $similiar = $this->FindSimilarModels(new ArrayCollection(), $filtro, $vehicle, 0);

        return $this->render(
            'AppBundle:FAL:movil-car-details.html.twig',
            array(
                'vehicle' => $vehicle,
                'similars' => $similiar,
                'form' => $form->createView(),
                'form_offer' => $offer->createView(),
            )
        );
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

    public function FindSimilarModels($result, $filter, $vehicle, $counter)
    {
        if (count($result) >= 3) {
            return $result;
        } else {
            switch ($counter) {
                case 0:
                    $filter_new = $filter;
                    break;
                case 1:
                    $filter_new = array(
                        'year' => $filter['year'],
                        'make' => $filter['make'],
                        'model' => '',
                        'current_id' => $filter['current_id']
                    );
                    break;
                case 2:
                    $filter_new = array(
                        'year' => '',
                        'make' => $filter['make'],
                        'model' => '',
                        'current_id' => $filter['current_id']
                    );
                    break;
                case 3:
                    $filter_new = array(
                        'year' => $filter['year'],
                        'make' => '',
                        'model' => '',
                        'current_id' => $filter['current_id']
                    );
                    break;
                case 4:
                    return new ArrayCollection();
            }
            $em = $this->getdoctrine()->getmanager();
            $ids = new ArrayCollection();
            foreach ($result as $v) {
                $ids->add($v->getId());
            }
            $resultArray = $em->getRepository('AppBundle:Vehicle')->FilterSimilarModels($filter_new, $ids);
            foreach ($resultArray as $v) {
                $result->add($v);
            }
            $this->FindSimilarModels($result, $filter_new, $vehicle, $counter + 1);
        }

        return $result;
    }

    public function findMakesAction(Request $request)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $year_id = $request->get("year_id");
            //$entities = $em->getRepository('AppBundle:Make')->findByyear($year_id);
            $entities = $em->getRepository('AppBundle:Make')->findBy(
                array("year" => $year_id),
                array('makeId' => 'ASC')
            );
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
            //si es un texto buscar todas las instancias de esa marca en cualquier año
            $makesIds = new ArrayCollection();
            $makes = array();

            if (!is_numeric($make_id)) {

                $entities = $em->getRepository('AppBundle:Make')->findBymakeId($make_id);
                foreach ($entities as $entity) {
                    $makesIds->add($entity->getId());
                }

                $entities = $em->getRepository('AppBundle:Model')->selectDistinctModels($makesIds);

                foreach ($entities as $entity) {

                    $make['text'] = $entity['modelId'];
                    $makes[] = $make;
                }

            } else {

                $entitiesMake = $em->getRepository('AppBundle:Make')->find($make_id);
                $entities = $em->getRepository('AppBundle:Model')->findBymake($entitiesMake);

                foreach ($entities as $entity) {

                    $make['value'] = $entity->getId();
                    $make['text'] = $entity->getModelId();
                    $makes[] = $make;
                }
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
            $trimsIds = new ArrayCollection();
            if (!is_numeric($model_id)) {
                $entities = $em->getRepository('AppBundle:Model')->findBymodelId($model_id);
                foreach ($entities as $entity) {
                    $trimsIds->add($entity->getId());
                }

                $entities = $em->getRepository('AppBundle:Trim')->selectDistinctTrims($trimsIds);
                $trims = array();
                foreach ($entities as $entity) {
                    //    $make['value'] = $entity['id'];
                    $trim['text'] = $entity['trimId'];
                    $trims[] = $trim;
                }
            } else {
                $entitiesTrim = $em->getRepository('AppBundle:Model')->find($model_id);

                $entities = $em->getRepository('AppBundle:Trim')->findBymodel($entitiesTrim);
                $trims = array();
                foreach ($entities as $entity) {
                    //    $make['value'] = $entity['id'];
                    $trim['value'] = $entity->getId();
                    $trim['text'] = $entity->getTrimId();
                    $trims[] = $trim;
                }
            }

            $response = new Response();
            $response->setContent(json_encode($trims));
        } catch (\Exception $ex) {
            $response['success'] = false;
            $response['error'] = $ex->getMessage();
        }

        return $response;
    }

    public function compareCarsAction(Request $request)
    {

        $car1serie = $request->get("image-0");
        $car2serie = $request->get("image-1");
        $car3serie = $request->get("image-2");
        $em = $this->getdoctrine()->getmanager();
        $vehicle1 = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($car1serie);
        $vehicle2 = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($car2serie);
        $vehicle3 = $em->getRepository('AppBundle:Vehicle')->findOneBySerie($car3serie);
        $vehicle1imagesrc = null;
        $vehicle2imagesrc = null;
        $vehicle3imagesrc = null;
        $form_firstcar_options = null;
        $form_secondcar_options = null;
        $form_thirdcar_options = null;
        if ($vehicle1 != null) {
            $form_firstcar_options = $this->createForm(new VehicleOptionsFormType(), $vehicle1)->createView();
            $vehicle1imagesrc = $request->get("image-0_imagesrc");
        }
        if ($vehicle2 != null) {
            $form_secondcar_options = $this->createForm(new VehicleOptionsFormType(), $vehicle2)->createView();
            $vehicle2imagesrc = $request->get("image-1_imagesrc");
        }
        if ($vehicle3 != null) {
            $form_thirdcar_options = $this->createForm(new VehicleOptionsFormType(), $vehicle3)->createView();
            $vehicle3imagesrc = $request->get("image-2_imagesrc");
        }

        $email = $this->createForm(new EmailFormType());

        return $this->render(
            'AppBundle:FAL:cars-compare.html.twig',
            array(
                'vehicle1' => $vehicle1,
                'vehicle2' => $vehicle2,
                'vehicle3' => $vehicle3,
                'vehicle1image' => $vehicle1imagesrc,
                'vehicle2image' => $vehicle2imagesrc,
                'vehicle3image' => $vehicle3imagesrc,
                'form_vehicle1_options' => $form_firstcar_options,
                'form_vehicle2_options' => $form_secondcar_options,
                'form_vehicle3_options' => $form_thirdcar_options,
                'form_email' => $email->createView(),
            )
        );
    }

    public function contactUsAction(Request $request)
    {

        $ContactFront = new ContactFront();
        $form = $this->createForm(new ContactFrontFormType(), $ContactFront);
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == "POST") {

            $form->handleRequest($request);
            $ContactFront = $form->getData();
            $ContactFront->setDateCreated(new \DateTime);

            $email = $ContactFront->getEmail();

            $user = $em->getRepository('AppBundle:User')->findOneByEmail($email);
            if (!$user) {

                return $this->render(
                    'AppBundle:Front:contact-us.html.twig',
                    array(
                        'invalid_username' => $email,
                        'form' => $form->createView()
                    )
                );
            } else {
                $em->persist($ContactFront);
                $em->flush();

                $ContactFrontReply = new ContactFrontReply();
                $ContactFrontReply->setDateCreated((new \DateTime));
                $ContactFrontReply->setContact($ContactFront);
                $ContactFrontReply->setUser($user);
                $ContactFrontReply->setText($ContactFront->getText());

                $em->persist($ContactFrontReply);
                $em->flush();

                return $this->redirect($this->generateUrl('owner_login'));
            }

        }

        return $this->render(
            'AppBundle:Front:contact-us.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }


    public function aboutUsAction(Request $request)
    {

        return $this->render('AppBundle:Front:about-us.html.twig');
    }

    public function whyFreeAction(Request $request)
    {

        return $this->render('AppBundle:Front:why-free.html.twig');
    }

    public function dealerInfoAction($profile, $tab, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Profile = $em->getRepository('AppBundle:Profile')->findOneBy(
            array('serie' => $profile, 'status' => $this->container->getParameter('status.active'))
        );

        $searchlist = array();
        $filtro = array();
        $filtro['sort'] = 0;
        if ($request->getMethod() == "POST") {
            $filtro['year'] = "all";
            $filtro['make'] = "all";
            $filtro['model'] = "all";
            $filtro['zipcode'] = "";

            $searchlist['years'] = $this->GetYearFilterBox($filtro, $em);
            $searchlist['makes'] = $this->getMakeFilterBox($filtro, $em);
            $searchlist['models'] = $this->getModelFilterBox($filtro, $em);
            $searchlist['zipcode'] = $this->getZipCodeFilterBox($filtro);
        }
        $conditions = $em->getRepository('AppBundle:Condition')->findAll();
        $bodystyles = $em->getRepository('AppBundle:VehicleStyle')->findAll();
        $transmissions = $em->getRepository('AppBundle:Transmission')->findAll();
        $fuels = $em->getRepository('AppBundle:FuelType')->findAll();
        $doorss = $em->getRepository('AppBundle:Doors')->findAll();
        $colors = $em->getRepository('AppBundle:Colors')->findAll();
        $obj_year = $em->getRepository('AppBundle:Year')->findBy(
            array(),
            array('year' => 'DESC')
        );
        $obj_make = $em->getRepository('AppBundle:Make')->selectDistinctMakes();
        $obj_model = array();
        $prices = FrontEndUtils::CreatePriceList();
        $mileage = FrontEndUtils::CreateMileageList();
        $countperpage = 4;

        $paginator = $this->get('knp_paginator');
        $vehicles_list = $paginator->paginate(
            $Profile->getVehiclesComplete(),
            $this->get('request')->query->get('page', 1),
            $countperpage
        );

        $suser = $this->get('security.context')->getToken()->getUser();
        $savedcars = new ArrayCollection();
        if ($suser != "anon.") {
            $user = $em->getRepository('AppBundle:User')->find($suser->getId());
            $list = $user->getVehiclessaved();
            foreach ($list as $car) {
                $savedcars->add($car->getSerie());
            }

        }

        if ($request->getMethod() == "POST") {
            $formrev = $this->createForm(
                new \Frontend\AppBundle\Form\Type\ReviewFormType()
            //new \Frontend\AppBundle\Entity\Review()
            //array('attr' => array('user' => $user, 'status' => $this->container->getParameter('status.active')))
            );

            $formrev->handleRequest($request);

            $ip_addr = $_SERVER['REMOTE_ADDR'];
            if ($formrev->isValid()) {
                $Review = new \Frontend\AppBundle\Entity\Review();
                $Review = $formrev->getData();
                if (!$Review->getPrice()) {
                    $Review->setPrice(0);
                }
                if (!$Review->getOverall()) {
                    $Review->setOverall(0);
                }
                if (!$Review->getFacilities()) {
                    $Review->setFacilities(0);
                }
                if (!$Review->getCustomerservice()) {
                    $Review->setCustomerservice(0);
                }

                $profileRate = $Profile->getRating();

                $profileRate->setTotalCount($profileRate->getTotalCount() + 1);
                $profileRate->setTotalRate(
                    $profileRate->getTotalRate() + $formrev['customerservice']->getData()
                    + $formrev['price']->getData() + $formrev['facilities']->getData() + $formrev['overall']->getData()
                );
                $profileRate->setAverage($profileRate->calcAverage());

                $em->persist($profileRate);
                $status_id = $this->container->getParameter('status.pending');
                $Status = $em->getRepository('AppBundle:Status')->find($status_id);
                $Review->setStatus($Status);
                $Review->setIpAddress($ip_addr);
                $Review->setDateCreated(new \DateTime);
                $Review->setDateUpdated(new \DateTime);
                $Review->setDatePosted(new \DateTime);
                $Review->setViewed(false);
                $Profile->addProfileReviews($Review);
                //$em->persist($Review);
                $em->persist($Profile);
                $em->flush();
                $tab = 3;
            }
        }
        $form = $this->createForm(new EmailFormType());

        $reviewform = $this->createForm(new ReviewFormType());

        $paginator = $this->get('knp_paginator');
        $reviews = $paginator->paginate($Profile->getReviews(), $this->get('request')->query->get('page', 1), $countperpage);

        return $this->render(
            'AppBundle:FAL:dealer-info.html.twig',
            array(
                'reviews' => $reviews,
                'profile' => $Profile,
                'vehicles' => $vehicles_list,
                'obj_year' => $obj_year,
                'obj_make' => $obj_make,
                'obj_model' => $obj_model,
                'filterlist' => $searchlist,
                'conditions' => $conditions,
                'bodystyles' => $bodystyles,
                'transmissions' => $transmissions,
                'fuels' => $fuels,
                'doorss' => $doorss,
                'prices' => $prices,
                'mileages' => $mileage,
                'colors' => $colors,
                'form' => $form->createView(),
                'savedcars' => $savedcars,
                'reviewform' => $reviewform->createView(),
                'currenttab' => $tab
            )
        );
    }


   /* public function addReviewToProfileAction($profile, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$suser = $this->get('security.context')->getToken()->getUser();
        //$user = $em->getRepository('AppBundle:User')->find($suser->getId());


        $Profile = $em->getRepository('AppBundle:Profile')->findOneBy(
            array('serie' => $profile, 'status' => $this->container->getParameter('status.active'))
        );

        $form = $this->createForm(
            new \Frontend\AppBundle\Form\Type\ReviewFormType()
        //new \Frontend\AppBundle\Entity\Review()
        //array('attr' => array('user' => $user, 'status' => $this->container->getParameter('status.active')))
        );
        $form->handleRequest($request);

        $ip_addr = $_SERVER['REMOTE_ADDR'];
        if ($form->isValid()) {
            $Review = new \Frontend\AppBundle\Entity\Review();
            $Review = $form->getData();
            if (!$Review->getPrice()) {
                $Review->setPrice(0);
            }
            if (!$Review->getOverall()) {
                $Review->setOverall(0);
            }
            if (!$Review->getFacilities()) {
                $Review->setFacilities(0);
            }
            if (!$Review->getCustomerservice()) {
                $Review->setCustomerservice(0);
            }

            $profileRate = $Profile->getRating();

            $profileRate->setTotalCount($profileRate->getTotalCount() + 1);
            $profileRate->setTotalRate(
                $profileRate->getTotalRate() + $form['customerservice']->getData()
                + $form['price']->getData() + $form['facilities']->getData() + $form['overall']->getData()
            );
            $profileRate->setAverage($profileRate->calcAverage());

            $em->persist($profileRate);
            $status_id = $this->container->getParameter('status.pending');
            $Status = $em->getRepository('AppBundle:Status')->find($status_id);
            $Review->setStatus($Status);
            $Review->setIpAddress($ip_addr);
            $Review->setDateCreated(new \DateTime);
            $Review->setDateUpdated(new \DateTime);
            $Review->setDatePosted(new \DateTime);
            $Review->setViewed(false);
            $Profile->addProfileReviews($Review);
            //$em->persist($Review);
            $em->persist($Profile);
            $em->flush();

        }

        return $this->forward(
            "AppBundle:FrontendFAL:dealerInfo",
            array('profile' => $Profile->getSerie(), 'tab' => 3, 'request' => $request)
        );
    }*/


    /**
     * @param $filtro
     * @param $em
     * @return array
     */
    public function GetYearFilterBox($filtro, $em)
    {
        $years = array();
        $values = new ArrayCollection();
        if ($filtro['year'] != "" && $filtro['year'] != "all") {
            $years['name'] = "Year";
            $y = $em->getRepository('AppBundle:Year')->find($filtro['year']);
            $values->add($y->getId());
            $values->add($y->getYear());
            $years['values'] = $values;
        }

        return $years;
    }

    /**
     * @param $filtro
     * @param $em
     * @return array
     */
    public function getMakeFilterBox($filtro, $em)
    {
        $makes = array();
        $values = new ArrayCollection();

        if ($filtro['make'] != "" && $filtro['make'] != "all") {
            $makes['name'] = "Make";
            //$m = $em->getRepository('AppBundle:Make')->findBymakeId($filtro['make']);
            $values->add($filtro['make']);
            $values->add($filtro['make']);
            $makes['values'] = $values;
        }

        return $makes;
    }

    /**
     * @param $filtro
     * @param $em
     * @return array
     */
    public function getModelFilterBox($filtro, $em)
    {
        $models = array();
        $values = new ArrayCollection();
        if ($filtro['model'] != "" && $filtro['model'] != "all") {
            $models['name'] = "Model";
            //$m = $em->getRepository('AppBundle:Model')->find($filtro['model']);
            $values->add($filtro['model']);
            $values->add($filtro['model']);
            $models['values'] = $values;
        }

        return $models;
    }

    /**
     * @param $filtro
     * @return array
     */
    public function getZipCodeFilterBox($filtro)
    {
        $zipcode = array();
        $values = new ArrayCollection();

        if ($filtro['zipcode'] != "") {
            $zipcode['name'] = "Zipcode";
            $values->add("");
            $values->add($filtro['zipcode']);
            $zipcode['values'] = $values;
        }

        return $zipcode;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function GetVehicleListFromFilter(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limit = $request->get("limit");
        $start = $request->get("start");
        $zipcode = ($request->get("zipcode") == null) ? array() : $request->get("zipcode");
        $make = ($request->get("makeV") == null) ? array() : $request->get("makeV");
        $model = ($request->get("modelV") == null) ? array() : $request->get("modelV");
        $trim = ($request->get("trimV") == null) ? array() : $request->get("trimV");


        $makeV = array();
        $modelV = array();
        $trimV = array();

        if ($make != null) {
            $makeV[0] = $make;
        }
        if ($model != null) {
            $modeVl[0] = $model;
        }
        if ($trim != null) {
            $trimV[0] = $trim;
        }


        $allValue = "All";
        //$condition = array();
        if (!is_array($request->get("year"))) {
            $year = ($request->get("year") != null && $request->get("year") != $allValue) ? explode(
                ",",
                $request->get("year")
            ) : array();
        } else {
            $year = ($request->get("year") != null && $request->get("year") != $allValue) ? $request->get(
                "year"
            ) : array();
        }
        if (!is_array($request->get("condition"))) {
            $condition = ($request->get("condition") != null && $request->get("condition") != $allValue) ? explode(
                ",",
                $request->get("condition")
            ) : array();
        } else {
            $condition = ($request->get("condition") != null && $request->get(
                    "condition"
                ) != $allValue) ? $request->get("condition") : array();
        }
        if (!is_array($request->get("bodystyle"))) {
            $bodystyle = ($request->get("bodystyle") != null && $request->get("bodystyle") != $allValue) ? explode(
                ",",
                $request->get("bodystyle")
            ) : array();
        } else {
            $bodystyle = ($request->get("bodystyle") != null && $request->get(
                    "bodystyle"
                ) != $allValue) ? $request->get("bodystyle") : array();
        }

        $transmission = ($request->get("transmission") == null) ? array() : $request->get("transmission");
        //$bodystyle = ($request->get("bodystyle") == null) ? array() : $request->get("bodystyle");
        $fuel = ($request->get("fuel") == null) ? array() : $request->get("fuel");
        $doors = ($request->get("doors") == null) ? array() : $request->get("doors");
        $prices = ($request->get("prices") == null) ? array() : $request->get("prices");
        $sort = $request->get("sort");


        $filtro = array(
            'zipcode' => $zipcode,
            'model' => $modelV,
            'make' => $makeV,
            'year' => $year,
            //'trim' => $year,
            'condition' => $condition,
            'bodystyle' => $bodystyle,
            'transmission' => $transmission,
            'fuel' => $fuel,
            'doors' => $doors,
            'prices' => $prices,
            'sort' => $sort,
            'drive' => null,
            'engine' => null,
            'trim' => $trimV,
            'private' => null,
            'mileage' => null,
            'interiorcolor' => null,
            'exteriorcolor' => null,
            'profileserie' => null,
        );
        $session = $request->getSession();
        $session->set("paginator_limit", $limit);

        $em = $this->getDoctrine()->getManager();
        $vehicles = $em->getRepository('AppBundle:Vehicle')->SearchCarsAllFiltersResults($filtro);

        $paginator = $this->get('knp_paginator');
        $vehicles_list = $paginator->paginate(
            $vehicles,
            $this->get('request')->query->get('page', $start),
            $limit
        );

        return $vehicles_list;
    }

    public function GetYearRangeValues($range)
    {
        $result = new ArrayCollection();
        if (strpos($range, "-")) {
            $temp = explode("-", $range);
            $result->add(trim($temp[0]));
            $result->add(trim($temp[1]));
        } else {
            $result->add(trim($range));
            $result->add(trim($range));
        }

        return $result;
    }

    public function saveCarSerieAction(Request $request)
    {
        $serie = $request->get("serie");
        $session = $request->getSession();
        $session->set("savedCar", $serie);

        return new JsonResponse(
            [
                'success' => true
            ]
        );;
    }

    /**
     * @param $suser
     * @param $em
     * @return ArrayCollection
     */
    public function GetSavedCars($suser, $em)
    {
        $savedcars = new ArrayCollection();
        if ($suser != "anon.") {
            $user = $em->getRepository('AppBundle:User')->find($suser->getId());
            $list = $user->getVehiclessaved();
            foreach ($list as $car) {
                $savedcars->add($car->getSerie());
            }

            return $savedcars;

        }

        return $savedcars;
    }


}