<?php

namespace Frontend\AppBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Frontend\AppBundle\Entity\Inquiry;
use Frontend\AppBundle\Entity\Review;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{


    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $years = $em->getRepository('AppBundle:Year')->findBy(
            array(),
            array('year' => 'DESC')
        );
        //$makes = $em->getRepository('AppBundle:Make')->findAll();
        $makesDistinct = $em->getRepository('AppBundle:Make')->selectDistinctMakes();
        //$models = $em->getRepository('AppBundle:Model')->findAll();
        $models = array();

        return $this->render('AppBundle:Default:index.html.twig',
            array(
                'years' => $years,
                //'makes' => $makes,
                'makes_distinct' => $makesDistinct,
                'models' => $models
            )
        );
    }

    public function resendConfirmAction(Request $request)
    {
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('user.resend_confirm.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');


        $user = $userManager->createUser();

        $form = $formFactory->createForm();
        $form->setData($user);

        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $email = $user->getEmail();
                $user = $userManager->findUserByEmail($email);

                $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('registration');
                $user->setConfirmationToken($csrfToken);

                if (null === $user) {
                    return $this->container->get('templating')->renderResponse('AppBundle:Default:resend_confirm.html.twig', array('invalid_username' => $email, 'form' => $form->createView()));
                }

                $event = new GetResponseUserEvent($user, $request);
                // $dispatcher->dispatch(\Frontend\AppBundle\UserEvents::REGISTRATION_RESEND, $event);
                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {

                    $url = $this->container->get('router')->generate('fos_user_registration_check_email', array('user' => $email));
                    $response = new RedirectResponse($url);
                    $this->resendEmailConfirmation($email);
                }

                return $response;
            }
        }

        return $this->render('AppBundle:Default:resend_confirm.html.twig', array(
            'form' => $form->createView(),
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


    public function listPropertiesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        // store an attribute for reuse during a later user request

        $filtro = array('searchtext' => $session->get('searchtext'),
            'checkin' => $session->get('checkin'),
            'checkout' => $session->get('checkout'),
            'minSleeps' => $session->get('minSleeps'),
            'country' => $request->get('country'),
            'region' => $request->get('region'),
            'city' => $request->get('city'),
            'zipCode' => $request->get('zipCode')
        );

        $featured_properties = $em->getRepository('AppBundle:Property')->findBy(array('featured' => true, 'status' => $this->container->getParameter('status.active')));
        $properties = $em->getRepository('AppBundle:Property')->filterProperties($filtro, $this->container->getParameter('status.active'));
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\LocationFilterFormType(), new \Frontend\AppBundle\Entity\Location());
        $featured = new \Doctrine\Common\Collections\ArrayCollection();

        for ($i = 0; $i < 3; $i++) {
            $featured->add($featured_properties[$i]);
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', 1), 5);
        $session->set('results', count($properties));

        return $this->render('AppBundle:Default:list.html.twig', array(
                    'featuredProperties' => $featured,
                    'properties' => $pagination,
                    'form' => $form->createView()
        ));
    }

    public function propertiesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $searchText = $request->get('searchtext');
        $city = $request->get('location_locality');
        $region = $request->get('location_administrative_area_level_1');
        $country = $request->get('location_country');
        
        if($country == "United States"){
            $country = "USA";
        }
        $checkin = $request->get('checkin');
        $checkout = $request->get('checkout');
        $sleeps = $request->get('sleeps');

        $session->set('searchtext', $searchText);
        $session->set('checkin', $checkin);
        $session->set('checkout', $checkout);
        $session->set('minSleeps', $sleeps);
        $session->set('country', $country);
        $session->set('region', $region);
        $session->set('city', $city);
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);
        
        if($country_url != "" && $region_url == "" && $city_url != ""){
        $region_url = "region";   
        }
        
        $search = $em->getRepository('AppBundle:SearchControl')->findSearch($country_url, $region_url, $city_url);
        if($search == null){
        $search = new \Frontend\AppBundle\Entity\SearchControl();
        $search->setCountry($country);
        $search->setCountrySlug($country_url);
        $search->setStateProvince($region);
        $search->setStateProvinceSlug($region_url);
        $search->setLocality($city);
        $search->setLocalitySlug($city_url);
        $search->setSerial($this->renderSearchSerial());
        $search->setIp($ip_addr);
        $search->setCount(1);
        }else {
        $search->setCount($search->getCount()+1);  
        }
        $em->persist($search);
        $em->flush();
        
      
        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)
        ));
    }
    
    
    
     public function renderSearchSerial() {

        $rand = rand(1, 99999);

        if (strlen($rand) == 1) {
            $serie = 's1111' . $rand;
        } else if (strlen($rand) == 2) {
            $serie = 's111' . $rand;
        } else if (strlen($rand) == 3) {
            $serie = 's11' . $rand;
        } else if (strlen($rand) == 4) {
            $serie = 's1' . $rand;
        } else if (strlen($rand) == 5) {
            $serie = 's' . $rand;
        }

        return $serie;
    }
    
            function seoUrl($string) {
            //Lower case everything
            $string = strtolower($string);
            //Make alphanumeric (removes all other characters)
            $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
            //Clean up multiple dashes or whitespaces
            $string = preg_replace("/[\s-]+/", " ", $string);
            //Convert whitespaces and underscore to dash
            $string = preg_replace("/[\s_]/", "-", $string);
            return $string;
            }

    public function updateSortAction($sort = 'Default Sort', Request $request) {

        $session = $request->getSession();
        // store an attribute for reuse during a later user request

        $session->set('sort', $sort);
        
        
        $country = $session->get('country');
        $region = $session->get('region');
        $city = $session->get('city');
        
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)
        ));
    }

    public function updateFiltroMovilAction(Request $request) {

        $session = $request->getSession();

        $minprice = $request->get('minPrice');
        $maxprice = $request->get('maxPrice');
        $minSleeps = $request->get('minSleeps');
        $maxSleeps = $request->get('maxSleeps');
        $minBedrooms = $request->get('minBedrooms');
        $maxBedrooms = $request->get('maxBedrooms');
        $minBathrooms = $request->get('minBathrooms');
        $maxBathrooms = $request->get('maxBathrooms');

        $array1 = array();
        $array2 = array();
        $array3 = array();

        // store an attribute for reuse during a later user request
        $MoreLocation = $request->get('moreLocation');
        $array1 = explode(',', $MoreLocation);
        $session->set('MoreLocation', $array1);

        $MoreProperty = $request->get('moreProperty');
        $array2 = explode(',', $MoreProperty);
        $session->set('MoreProperty', $array2);

        $MoreAmenities = $request->get('moreAmenities');
        $array3 = explode(',', $MoreAmenities);
        $session->set('MoreAmenities', $array3);



        $session->set('minPrice', $minprice);
        $session->set('maxPrice', $maxprice);
        $session->set('minSleeps', $minSleeps);
        $session->set('maxSleeps', $maxSleeps);
        $session->set('minBedrooms', $minBedrooms);
        $session->set('maxBedrooms', $maxBedrooms);
        $session->set('minBathrooms', $minBathrooms);
        $session->set('maxBathrooms', $maxBathrooms);
        
        $country = $session->get('country');
        $region = $session->get('region');
        $city = $session->get('city');
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)));
    }

    public function updateFiltroPriceAction(Request $request) {

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $minprice = $request->get('sminPrice');
        $maxprice = $request->get('smaxPrice');
        $session->set('minPrice', $minprice);
        $session->set('maxPrice', $maxprice);

        $country = $session->get('country');
        $region = $session->get('region');
        $city = $session->get('city');
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)));
    }

    public function updateFiltroSleepsAction(Request $request) {

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $minsleeps = $request->get('sminSleeps');
        $maxsleeps = $request->get('smaxSleeps');
        $session->set('minSleeps', $minsleeps);
        $session->set('maxSleeps', $maxsleeps);


        $country = $session->get('country');
        $region = $session->get('region');
        $city = $session->get('city');
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)));
    }

    public function updateFiltroBedroomsAction(Request $request) {

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $minBedrooms = $request->get('sminBedrooms');
        $maxBedrooms = $request->get('smaxBedrooms');
        $session->set('minBedrooms', $minBedrooms);
        $session->set('maxBedrooms', $maxBedrooms);


        $country = $session->get('country');
        $region = $session->get('region');
        $city = $session->get('city');
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)));
    }

    public function updateFiltroBathroomsAction(Request $request) {

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $minBathrooms = $request->get('sminBathrooms');
        $maxBathrooms = $request->get('smaxBathrooms');
        $session->set('minBathrooms', $minBathrooms);
        $session->set('maxBathrooms', $maxBathrooms);

        $country = $session->get('country');
        $region = $session->get('region');
        $city = $session->get('city');
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)));
    }

    public function updateFiltroMoreAction(Request $request) {
        $array1 = array();
        $array2 = array();
        $array3 = array();

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $MoreLocation = $request->get('sMoreLocation');
        $array1 = explode(',', $MoreLocation);
        $session->set('MoreLocation', $array1);

        $MoreProperty = $request->get('sMoreProperty');
        $array2 = explode(',', $MoreProperty);
        $session->set('MoreProperty', $array2);

        $MoreAmenities = $request->get('sMoreAmenities');
        $array3 = explode(',', $MoreAmenities);
        $session->set('MoreAmenities', $array3);


         $country = $session->get('country');
        $region = $session->get('region');
        $city = $session->get('city');
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)));
    }

  

//---------------------------------------------------------------------------------------------------------------------
    public function searchResultsAction(Request $request, $country, $region , $city) {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $sort = $session->get('sort');

        if (!isset($sort) || $sort == "") {
            $sort = "Default Sort";
            $session->set('sort', $sort);
        }
      
        
        
        $search = $em->getRepository('AppBundle:SearchControl')->findSearch($country, $region, $city);
        
       
        $filtro = array(
            'searchtext' => $session->get('searchtext'),
            'checkin' => $session->get('checkin'),
            'checkout' => $session->get('checkout'),
            'sleeps' => $session->get('sleeps'),
            'country' => $search->getCountry(),
            'region' => $search->getStateProvince(),
            'city' => $search->getLocality(),
            'minPrice' => $session->get('minPrice'),
            'maxPrice' => $session->get('maxPrice'),
            'minSleeps' => $session->get('minSleeps'),
            'maxSleeps' => $session->get('maxSleeps'),
            'minBedrooms' => $session->get('minBedrooms'),
            'maxBedrooms' => $session->get('maxBedrooms'),
            'minBathrooms' => $session->get('minBathrooms'),
            'maxBathrooms' => $session->get('maxBathrooms'),
            'moreLocation' => $session->get('MoreLocation'),
            'moreProperty' => $session->get('MoreProperty'),
            'moreAmenities' => $session->get('MoreAmenities'),
            'sort' => $session->get('sort')
        );
        //---------------------------------------------------------------
     
        $featured = new \Doctrine\Common\Collections\ArrayCollection();
        $featuredP = new \Doctrine\Common\Collections\ArrayCollection();
        $featuredP2 = new \Doctrine\Common\Collections\ArrayCollection();

        $locationTypes = $em->getRepository('AppBundle:LocationType')->findAll();
        $propertyTypes = $em->getRepository('AppBundle:PropertyType')->findAll();
        $homeAmenities = $em->getRepository('AppBundle:HomeAmenities')->findAll();
        $properties = $em->getRepository('AppBundle:Property')->filterProperties($filtro, $this->container->getParameter('status.active')); //VLADE
        //echo(count($properties));
        $session->set('results', count($properties));
        //--------------------------------------------------------------------------
   
        //--------------------------------------------------------------------------
        foreach ($properties as $propertyF) {
            if ($propertyF->getFeatured() == true) {
                $featuredP->add($propertyF);
            }
        }
        //--------------------------------------------------------------------------
     
        //--------------------------------------------------------------------------
        if ($featuredP->count() >= 4) {
            for ($i = 0; $i < 4; $i++) {
                $featured->add($featuredP[$i]);
            }
        } else {
            for ($i = 0; $i < $featuredP->count(); $i++) {
                $featured->add($featuredP[$i]);
            }
        }
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', 1), 10);
        //-----------------------------------------------------------------------------------------------------------
        
        $bcountry =  $search->getCountry();
        $bstate = $search->getStateProvince();
        $bcity = $search->getLocality();
        $world = "World";
        
        
       
        $activeBreadcrumb = $bcity;
        $path = "../../../../bundles/common/css/icons/stars.png";
        if($bcity == '' && $bstate == '' && $bcountry == ''){
         $path = "../bundles/common/css/icons/stars.png";  
         $activeBreadcrumb = $world;   
        }else if($bcity == '' && $bstate == ''){
             $path = "../../bundles/common/css/icons/stars.png"; 
            $activeBreadcrumb = $bcountry;
        } else if($bcity == ''){
        $activeBreadcrumb = $bstate;
         $path = "../../../bundles/common/css/icons/stars.png"; 
        }
       
        //------------------------------------------------------------------------------------------------------        
        $breadcrumbs = array(
            array('title' => 'Search', 'name' => 'Search', 'path' => 'none', 'class' => '', 'link' => '0', 'home' => 'HomeEscape', 'from-btn' => '1'),
            array('title' => 'World', 'name' => $world, 'path' => 'none', 'class' => '', 'from-btn' => '1'),
            array('title' => 'Country', 'name' => $bcountry, 'country' => $bcountry, 'path' => 'search_results', 'class' => '', 'from-btn' => '1', 'country_slug'=>$country),
            array('title' => 'State', 'name' => $bstate, 'country' => $bcountry, 'path' => 'search_results', 'class' => '', 'from-btn' => '1', 'country_slug'=>$country, 'region_slug'=>$region),
            array('title' => 'City', 'name' => $bcity, 'country' => $bcountry, 'state' => $bstate, 'path' => 'search_results', 'class' => '', 'from-btn' => '1', 'country_slug'=>$country, 'region_slug'=>$region, 'city_slug'=>$city)
        );
 
        //------------------------------------------------------------------------------------------------------
        return $this->render('AppBundle:Default:list.html.twig', array(
                    'featuredProperties' => $featured,
                    'properties' => $pagination,
                    'locationTypes' => $locationTypes,
                    'propertyTypes' => $propertyTypes,
                    'breadcrumbs' => $breadcrumbs,
                    'homeAmenities' => $homeAmenities,
                    'world' => $world,
                    'country' => $bcountry,
                    'state' => $bstate,
                    'city' => $bcity,
                    'starsPath'=> $path,
                    'activeBreadcrumb'=>$activeBreadcrumb

                        //'prices'=>$pricesPerNight,
                        // 'form'=>$form->createView()     
        ));
    }

    public function createReservationAction(Request $request) {

        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        
        
        
         if ($request->getMethod() == "POST") {
             
        $property_idr = $request->get('id');
        $firstNamer = $request->get('firstName');
        $lastNamer = $request->get('lastName');
        $checkInr = $request->get('checkIn');
        $checkOutr = $request->get('checkOut');
        $checkinhourr = $request->get('checkinhour');
        $checkouthourr = $request->get('checkouthour');
        $adultsr = $request->get('adults');
        $childrenr = $request->get('children');
        $emailr = $request->get('email');
        $phoner = $request->get('phone');
        $mobiler = $request->get('mobile');     
      
        
        $property_id = $this->test_input($property_idr);
        $firstName = $this->test_input($firstNamer);
        $lastName = $this->test_input($lastNamer);
        $checkIn = $this->test_input($checkInr);
        $checkOut = $this->test_input($checkOutr);
        $checkinhour = $this->test_input($checkinhourr);
        $checkouthour = $this->test_input($checkouthourr);
        $adults = $this->test_input($adultsr);
        $children = $this->test_input($childrenr);
        $email = $this->test_input($emailr);
        $phone = $this->test_input($phoner);
        $mobile = $this->test_input($mobiler);
        }else {
         return $response->setStatusCode(Response::HTTP_UNAUTHORIZED);   
        }

        
        //$inquiry_id = $request->get('inquiry');


        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ReservationFrontFormType, new \Frontend\AppBundle\Entity\Reservation(), array('attr' => array('status' => $this->container->getParameter('status.active'), 'property' => $property_id)));
        $form->handleRequest($request);
        $Reservation = new \Frontend\AppBundle\Entity\Reservation();

        try {

            $reservations_in_range = $em->getRepository('AppBundle:Reservation')->checkReservationAvailableByProperty($property_id, \DateTime::createFromFormat("m/d/Y", $checkIn), \DateTime::createFromFormat("m/d/Y", $checkOut), $checkinhour, $checkouthour, null);

            if ($reservations_in_range != null) {


                return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {

                $Property = $em->getRepository('AppBundle:Property')->find($property_id);



                $status_pending_id = $this->container->getParameter('status.pending');
                $Status_pend = $em->getRepository('AppBundle:Status')->find($status_pending_id);

                $Reservation->setStatus($Status_pend);
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


                $template = "AppBundle:Default:new-reservation-mail.html.twig";
                $options = array('property' => $Property, 'reservation' => $Reservation);
                $to = $Property->getContact()->getEmail();
                $from = array("booking@homeescape.com", 'HomeEscape');
                $subject = $Reservation->getFirstName() . ' ' . $Reservation->getLastName() . " sent you a Reservation Request!";

                $templateClient = "AppBundle:Default:new-reservation-client-mail.html.twig";
                $toClient = $email;
                $subjectClient = "Thank you for your Reservation Request!";

                $this->sendEmail($template, $options, $to, $from, $subject);
                $this->sendEmail($templateClient, $options, $toClient, $from, $subjectClient);

                $em->persist($Reservation);
                //$em->persist($Inquiry);
                $em->flush();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function getreservedDaysAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('request');
        $id = $request->request->get('id');
        $property = $em->getRepository('AppBundle:Property')->find($id);
        $dates = array();
        $dates1 = array();
        $response_array = array();
        $reservations = $property->getReservationsByStatus($this->container->getParameter('status.confirmed'));
        $reservationsPending = array();
        foreach ($reservationsPending as $res) {
            array_push($dates1, $this->devuelveArrayFechasEntreOtrasDos($res->getCheckIn()->format('n/j/Y'), $res->getCheckout()->format('n/j/Y')));
            //array_push($dates, $reservation->getCheckout()->format('n/j/Y'));
        }

        foreach ($reservations as $reservation) {
            array_push($dates, $this->devuelveArrayFechasEntreOtrasDos($reservation->getCheckIn()->format('n/j/Y'), $reservation->getCheckout()->format('n/j/Y')));
            //array_push($dates, $reservation->getCheckout()->format('n/j/Y'));
        }
        $date_array = $dates;
        $date_array1 = $dates1;
        array_push($response_array, $date_array);
        array_push($response_array, $date_array1);

        //you can return result as JSON
        return new Response(json_encode($response_array));
    }

    public function devuelveArrayFechasEntreOtrasDos($fechaInicio, $fechaFin) {
        $arrayFechas = array();
        $fechaMostrar = $fechaInicio;

        while (strtotime($fechaMostrar) <= strtotime($fechaFin)) {
            $arrayFechas[] = $fechaMostrar;
            $fechaMostrar = date("n/j/Y", strtotime($fechaMostrar . " + 1 day"));
        }

        return $arrayFechas;
    }

    public function profileAction($id, Request $request) {
      
        $session = $request->getSession();
      
        $em = $this->getDoctrine()->getManager();
        $property = $em->getRepository('AppBundle:Property')->findOneBySerieStatus($id, $this->container->getParameter('status.active'));
        
        if($property == null){
            throw $this->createNotFoundException('The Property does not exist');
        }
        
        $propertyRate = $property->getRating();
        $rating = $propertyRate->getAverage();
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ReservationFrontFormType(), new \Frontend\AppBundle\Entity\Reservation(), array('attr' => array('status' => $this->container->getParameter('status.active'), 'property' => $id)));
        $form1 = $this->createForm(new \Frontend\AppBundle\Form\Type\InquiryFormType(), new \Frontend\AppBundle\Entity\Inquiry());

        $views = $property->getViews();
        $property->setViews($views + 1);
        $em->persist($property);
        $em->flush();
        $periodos = new ArrayCollection();
        $reviews = $em->getRepository('AppBundle:Review')->getReviewsByPropertyAndStatus($property->getId(), $this->container->getParameter('status.posted'));
        $rate = $property->getRates();
        if ($rate !== null) {
            $periods = $rate->getPeriods();
            foreach ($periods as $period) {
                //\DateTime::createFromFormat("Y-m-d", $checkIn)  


                $periodos->add($period);
            }
        } else {
            $periodos->add(null);
        }

        if (count($periodos) == 0) {
            $periodos->add(null);
        }
        
        $countryName = $property->getLocation()->getCountry();
        $stateName = $property->getLocation()->getStateProvince();
        $cityName = $property->getLocation()->getLocality();
        $country_url = $this->seoUrl($countryName);
        $region_url = $this->seoUrl($stateName);
        $city_url = $this->seoUrl($cityName);
        
        $session->set('country', $countryName);
        $session->set('region', $stateName);
        $session->set('city', $cityName);
        
        $breadcrumbs = array(
            array('title' => 'Search', 'name' => 'Search', 'path' => 'none', 'class' => '', 'link' => '1', 'home' => 'HomeEscape'),
            array('title' => 'World', 'name' => 'World', 'path' => 'none', 'class' => '', 'link' => '1'),
            array('title' => 'Country', 'name' => $countryName, 'path' => 'search_results', 'class' => '', 'link' => '1', 'country_slug' => $country_url),
            array('title' => 'State', 'name' => $stateName, 'country_slug' => $country_url, 'region_slug' => $region_url, 'path' => 'search_results', 'class' => '', 'link' => '1'),
            array('title' => 'City', 'name' => $cityName, 'country_slug' =>$country_url,  'region_slug' => $region_url,'city_slug' => $city_url, 'path' => 'search_results', 'class' => '', 'link' => '1'),
            array('title' => 'Name', 'name' => $property->getSerie(), 'path' => 'search_results', 'class' => '', 'link' => '1')
        );


        //---------------------------------------------------------------------------------------------------------------
        return $this->render('AppBundle:Default:profile.html.twig', array(
                    'form1' => $form1->createView(),
                    'rating' => $rating,
                    'form' => $form->createView(),
                    'id' => $id,
                    'property' => $property,
                    'periodos' => $periodos,
                    'reviews' => $reviews,
                    'breadcrumbs' => $breadcrumbs
        ));
    }

    public function getProperty($id) {
        $em = $this->getDoctrine()->getManager();
        $property = $em->getRepository('AppBundle:Property')->find($id);
        return $property;
    }

    public function loadPhotoTourAction(Request $request) {
        $id = $request->get('id');
        $property = $this->getProperty($id);

        return $this->render('AppBundle:Default:photoTour.html.twig', array(
                    'property' => $property
        ));
    }

    public function loadAmenitiesAction(Request $request) {
        $id = $request->get('id');
        $property = $this->getProperty($id);

        return $this->render('AppBundle:Default:amenities.html.twig', array(
                    'property' => $property
        ));
    }

    public function loadMapAction(Request $request) {
        $id = $request->get('id');
        $property = $this->getProperty($id);

        return $this->render('AppBundle:Default:map.html.twig', array(
                    'property' => $property
        ));
    }

    public function loadCalendarAction(Request $request) {
        $id = $request->get('id');
        $property = $this->getProperty($id);
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ReservationFrontFormType(), new \Frontend\AppBundle\Entity\Reservation(), array('attr' => array('status' => $this->container->getParameter('status.active'), 'property' => $id)));

        return $this->render('AppBundle:Default:calendar.html.twig', array(
                    'property' => $property,
                    'form' => $form->createView()
        ));
    }

    public function loadRatesAction(Request $request) {
        $id = $request->get('id');
        $property = $this->getProperty($id);

        return $this->render('AppBundle:Default:rates.html.twig', array(
                    'property' => $property
        ));
    }

    public function loadReviewsAction(Request $request) {
        $id = $request->get('id');
        $property = $this->getProperty($id);
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ReviewFormType(), new \Frontend\AppBundle\Entity\Review());
        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository('AppBundle:Review')->getReviewsByPropertyAndStatus($id, $this->container->getParameter('status.posted'));

        return $this->render('AppBundle:Default:reviews.html.twig', array(
                    'property' => $property,
                    'form' => $form->createView(),
                    'reviews' => $reviews
        ));
    }

    public function loadPaymentsAction(Request $request) {
        $id = $request->get('id');
        $property = $this->getProperty($id);

        return $this->render('AppBundle:Default:payments.html.twig', array(
                    'property' => $property
        ));
    }

    public function loadDescriptionAction(Request $request) {
        $id = $request->get('id');
        $property = $this->getProperty($id);

        return $this->render('AppBundle:Default:description.html.twig', array(
                    'property' => $property
        ));
    }

    public function createInquiryAction(Request $request) {

        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        $id = $request->get('id');
        $property = $this->getProperty($id);

        
        if ($request->getMethod() == "POST") {
        $firstNamer = $request->get('firstName');
        $lastNamer = $request->get('lastName');
        $checkInr = $request->get('checkIn');
        $checkOutr = $request->get('checkOut');
        $adultsr = $request->get('adults');
        $childrenr = $request->get('children');
        $emailr = $request->get('email');
        $phoner = $request->get('phone');
        $textr = $request->get('text');
        
        $firstName = $this->test_input($firstNamer);
        $lastName = $this->test_input($lastNamer);
        $checkIn = $this->test_input($checkInr);
        $checkOut = $this->test_input($checkOutr);
        $adults = $this->test_input($adultsr);
        $children = $this->test_input($childrenr);
        $email = $this->test_input($emailr);
        $phone = $this->test_input($phoner);
        $text = $this->test_input($textr);
        }else {
         return $response->setStatusCode(Response::HTTP_UNAUTHORIZED);   
        }
        
        

        try {
            
            $status_pending_id = $this->container->getParameter('status.pending');
            $Status_pend = $em->getRepository('AppBundle:Status')->find($status_pending_id);

            $Inquiry = new Inquiry();
            $Inquiry->setGuest($firstName);
            $Inquiry->setLastName($lastName);
            if ($checkIn != '')
                $Inquiry->setStartDate(\DateTime::createFromFormat("m/d/Y", $checkIn));
            if ($checkOut != '')
                $Inquiry->setEndDate(\DateTime::createFromFormat("m/d/Y", $checkOut));
            $Inquiry->setAdults($adults);
            $Inquiry->setChildren($children);
            $Inquiry->setEmail($email);
            $Inquiry->setPhone($phone);
            $Inquiry->setProperty($property);
            $Inquiry->setDateCreated(new \DateTime);
            $Inquiry->setViewed(false);
            $Inquiry->setBooked(false);
            $Inquiry->setText($text);
            $Inquiry->setStatus($Status_pend);


            $template = "AppBundle:Default:new-inquiry-mail.html.twig";
            $options = array('property' => $property, 'Inquiry' => $Inquiry);
            $to = $property->getContact()->getEmail();
            $from = array("inquiry@homeescape.com", 'HomeEscape');
            $subject = $Inquiry->getGuest() . ' ' . $Inquiry->getLastName() . " sent you an inquiry!";

            $templateClient = "AppBundle:Default:new-inquiry-client-mail.html.twig";
            $toClient = $email;
            $subjectClient = "Thank you for your Inquiry!";

            $this->sendEmail($template, $options, $to, $from, $subject);
            $this->sendEmail($templateClient, $options, $toClient, $from, $subjectClient);


            $em->persist($Inquiry);
            $em->flush();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        return $response->setStatusCode(Response::HTTP_OK);
    }
    
    
    
    public function reviewFormAction(Request $request) {


        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ReviewFormType(), new \Frontend\AppBundle\Entity\Review());


        //$properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatus($user, $this->container->getParameter('status.active'));

        return $this->render('AppBundle:Default:reviewForm.html.twig', array('form' => $form->createView()));
    }

    public function createReviewAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        
        if ($request->getMethod() == "POST") {
        $idr = $request->get('id');
        $firstNamer = $request->get('name');
        $titler = $request->get('title');
        $textr = $request->get('text');
        $dater = $request->get('date');
        $emailr = $request->get('email');
        $valorationr = $request->get('valoration');      
             
        $id = $this->test_input($idr);
        $firstName = $this->test_input($firstNamer);
        $title = $this->test_input($titler);
        $text = $this->test_input($textr);
        $date = $this->test_input($dater);
        $email = $this->test_input($emailr);
        $valoration = $this->test_input($valorationr);
        $property = $this->getProperty($id);
        }else {
         return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);   
        }
        
        
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $status_id = $this->container->getParameter('status.pending');
        $status = $em->getRepository('AppBundle:Status')->find($status_id);

        try {

            $Review = new Review();
            $Review->setGuest($firstName);
            $Review->setTitle($title);
            $Review->setStayDate(\DateTime::createFromFormat("m/d/Y", $date));
            $Review->setDescription($text);
            $Review->setValoration($valoration);
            $Review->setEmail($email);
            $Review->setIpAddress($ip_addr);
            $Review->setStatus($status);
            $Review->setViewed(false);
            $Review->setProperty($property);
            $Review->setDateCreated(new \DateTime);

         
//**********************************************************************************************************************************            

            $em->persist($Review);
            $em->flush();
            
          
            $template = "AppBundle:Default:new-review-client-mail.html.twig";
            $options = array('review' => $Review);
            $to = $email;
            $from = array("review@homeescape.com", 'HomeEscape');
            $subject = 'Thank You for Leaving a Review';
            $this->sendEmail($template, $options, $to, $from, $subject);
            
            
            $template_admin = "AppBundle:Default:new-review-admin-mail.html.twig";
            $to_admin = "support@homeescape.com";
            $from_admin = $email;
            $subject_admin = 'New Review created for property # '.$Review->getProperty()->getSerie();
            $this->sendEmail($template_admin, $options, $to_admin, $from_admin, $subject_admin);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
             return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response->setStatusCode(Response::HTTP_OK);
    }

    public function searchRegionsAction(Request $request) {

        $country = $request->get('country');

        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository('AppBundle:Regions')->findRegionsByCountry($country);

        return $this->render('AppBundle:Default:regions.html.twig', array('regions' => $regions));
    }

    public function searchCitiesAction(Request $request) {

        $region = $request->get('region');

        $em = $this->getDoctrine()->getManager();
        $cities = $em->getRepository('AppBundle:Cities')->findCitiesByRegion($region);

        return $this->render('AppBundle:Default:cities.html.twig', array('cities' => $cities));
    }

    public function searchByStateAction(Request $request) {
       $em = $this->getDoctrine()->getManager();
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $country = "USA";
        $region = $request->get('state');
        $city = '';
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = '';
        
        $search = $em->getRepository('AppBundle:SearchControl')->findSearch($country_url, $region_url, $city_url);
        if($search == null){
        $search = new \Frontend\AppBundle\Entity\SearchControl();
        $search->setCountry($country);
        $search->setCountrySlug($country_url);
        $search->setStateProvince($region);
        $search->setStateProvinceSlug($region_url);
        $search->setLocality($city);
        $search->setLocalitySlug($city_url);
        $search->setSerial($this->renderSearchSerial());
        $search->setIp($ip_addr);
        $search->setCount(1);
        }else {
        $search->setCount($search->getCount()+1);  
        }
        $em->persist($search);
        $em->flush();
        
        
        return $this->redirect($this->generateUrl('search_by_state_name', array('country' => $country_url, 'state' => $region_url))
        );
    }

    public function searchByLocationTypeAction($type, Request $request) {


        $session = $request->getSession();

        $array1 = array($type);
        $session->set('MoreLocation', $array1);
        $session->set('country', '');
        $session->set('region', '');
        $session->set('city', '');

        $country = $request->get('country');
        $region = $request->get('region');
        $city = $request->get('city');
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)));
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function getPropertyByCountryStringAction() {
        $em = $this->getDoctrine()->getManager();
        $featured_properties = new \Doctrine\Common\Collections\ArrayCollection();
        // $countryName = new \Doctrine\Common\Collections\ArrayCollection();
        $locations = array();
        $featured_properties = $em->getRepository('AppBundle:Property')->findBy(array('status' => $this->container->getParameter('status.active')));
        foreach ($featured_properties as $propertyF) {
            $locId = $propertyF->getLocation();
            $cityId = $locId->getCity();
            $stateId = $locId->getStateProvince();
            $countryId = $locId->getCountry();
            $cityName;
            if ($cityId != null)
                $cityName = $em->getRepository('AppBundle:Cities')->find($cityId)->getCityName();
            else
                $cityName = $em->getRepository('AppBundle:Regions')->find($stateId)->getRegionName();
            $regionName = $em->getRepository('AppBundle:Regions')->find($stateId)->getRegionName();
            $countryName = $em->getRepository('AppBundle:Countries')->find($countryId)->getCountryName();
            $locations[count($locations)] = $cityName . ", " . $regionName;
            $locations[count($locations)] = $regionName . ", " . "(" . $countryName . ")";
            $locations[count($locations)] = $countryName;
        }
        $counters = array();
        $locs = array();
        for ($d = 0; $d < count($locations); $d++) {
            $counters[count($counters)] = 1;
            $locs[count($locs)] = $locations[$d];
        }
        //-------------------------------------------------------------------------------     
        $locations2 = array();
        //-------------------------------------------------------------------------------     
        for ($i = 0; $i < (count($locations)) - 1; $i++) {
            for ($s = $i + 1; $s < count($locations); $s++) {
                if ($locations[$i] == $locations[$s]) {
                    if ($locations[$i] != "X") {
                        $locations[$s] = "X";
                        $counters[$i] ++;
                    }
                } else if ($s == count($locations) && $locations[$s] != "X")
                    $counters[$s] ++;
            }
        }
        for ($h = 0; $h < (count($locations)); $h++) {
            if ($locations[$h] != "X")
                $locations2[count($locations2)] = $locations[$h] . " " . "(" . $counters[$h] . ")";
        }
        return new JsonResponse($locations2);
    }

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function searchByCountryAction($country, Request $request) {

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $countryName = "";
        $countryName = $em->getRepository('AppBundle:Countries')->findBy(array('id' => $country));
        $countryName = $countryName[0]->getCountryName();
        $session->set('countryName', $countryName);
        $session->set('country', $country);
        $session->set('region', '');
        $session->set('regionName', '');
        $session->set('searchtext', '');
        return $this->redirect($this->generateUrl('search_results'));
    }

//-----------------------------------------------------------------------------------------------------------------------------------
    public function searchByNationNameAction($country, Request $request) {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        //$country = $em->getRepository('AppBundle:Countries')->findBy(array('countryName' => $country));
        
        $search = $em->getRepository('AppBundle:SearchControl')->findSearch($country);
        
        $countryName = $search->getCountry();
       
        
        $filtro = array(
            'searchtext' => '',
            'checkin' => $session->get('checkin'),
            'checkout' => $session->get('checkout'),
            'sleeps' => $session->get('sleeps'),
            'country' => $countryName,
            'region' => '',
            'city' => '',
            'minPrice' => $session->get('minPrice'),
            'maxPrice' => $session->get('maxPrice'),
            'minSleeps' => $session->get('minSleeps'),
            'maxSleeps' => $session->get('maxSleeps'),
            'minBedrooms' => $session->get('minBedrooms'),
            'maxBedrooms' => $session->get('maxBedrooms'),
            'minBathrooms' => $session->get('minBathrooms'),
            'maxBathrooms' => $session->get('maxBathrooms'),
            'moreLocation' => $session->get('MoreLocation'),
            'moreProperty' => $session->get('MoreProperty'),
            'moreAmenities' => $session->get('MoreAmenities'),
            'sort' => $session->get('sort')
        );
        $properties = $em->getRepository('AppBundle:Property')->filterProperties($filtro, $this->container->getParameter('status.active'));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', 1), 10);
        $locationTypes = $em->getRepository('AppBundle:LocationType')->findAll();
        $propertyTypes = $em->getRepository('AppBundle:PropertyType')->findAll();
        $homeAmenities = $em->getRepository('AppBundle:HomeAmenities')->findAll();
        
        
        $breadcrumbs = array(
            array('title' => 'Search', 'name' => 'Search', 'path' => 'none', 'class' => '', 'link' => '0', 'home' => 'HomeEscape'),
            array('title' => 'World', 'name' => 'World', 'path' => 'none', 'class' => '', 'link' => '0'),
            array('title' => 'Country', 'name' => $countryName, 'path' => 'search_results', 'class' => '', 'link' => '0', 'country_slug'=>$country)
            
        );
//==========================================================================
        $featured = new \Doctrine\Common\Collections\ArrayCollection();
        $featuredP = new \Doctrine\Common\Collections\ArrayCollection();
        foreach ($properties as $propertyF) {
            if ($propertyF->getFeatured() == true) {
                $featuredP->add($propertyF);
            }
        }

        if ($featuredP->count() >= 4) {
            for ($i = 0; $i < 4; $i++) {
                $featured->add($featuredP[$i]);
            }
        } else {
            for ($i = 0; $i < $featuredP->count(); $i++) {
                $featured->add($featuredP[$i]);
            }
        }

        $session->set('results', count($properties));
        $session->set('region', '');
        $session->set('city', '');
        
//==========================================================================
       
        $path = "../../../bundles/common/css/icons/stars.png";
        $activeBreadcrumb = $countryName;
      
       

        return $this->render('AppBundle:Default:list.html.twig', array(
                    'featuredProperties' => $featured,
                    'properties' => $pagination,
                    'locationTypes' => $locationTypes,
                    'propertyTypes' => $propertyTypes,
                    'breadcrumbs' => $breadcrumbs,
                    'homeAmenities' => $homeAmenities,
                    'country' => $countryName,
                    'state' => '',
                    'city' => '',
                    'starsPath'=>$path,
                    'activeBreadcrumb'=>$activeBreadcrumb
                        //'prices'=>$pricesPerNight,
                        // 'form'=>$form->createView()     
        ));
    }

//-----------------------------------------------------------------------------------------------------------------------------------
    public function searchByStateNameAction($country, $state, Request $request) {

        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        //$countryName = $em->getRepository('AppBundle:Countries')->findBy(array('countryName' => $country));
        // $countryName = $countryName[0]->getCountryName();
        $featured = new \Doctrine\Common\Collections\ArrayCollection();
        $featuredP = new \Doctrine\Common\Collections\ArrayCollection();
        $paginator = $this->get('knp_paginator');

        $locationTypes = $em->getRepository('AppBundle:LocationType')->findAll();
        $propertyTypes = $em->getRepository('AppBundle:PropertyType')->findAll();
        $homeAmenities = $em->getRepository('AppBundle:HomeAmenities')->findAll();
        
        $search = $em->getRepository('AppBundle:SearchControl')->findSearch($country, $state);
        
        
          if($search == null){
        $search = new \Frontend\AppBundle\Entity\SearchControl();
        $search->setCountry($session->get('country'));
        $search->setCountrySlug($country);
        $search->setStateProvince($session->get('region'));
        $search->setStateProvinceSlug($state);
        $search->setSerial($this->renderSearchSerial());
        $search->setCount(1);
        }else {
        $search->setCount($search->getCount()+1);  
        }
        
        
        $countryName = $search->getCountry();
        $stateName = $search->getStateProvince();
        
      

        $filtro = array(
            // 'searchtext' => $countryName,
            'searchtext' => "",
            'checkin' => $session->get('checkin'),
            'checkout' => $session->get('checkout'),
            'sleeps' => $session->get('sleeps'),
            'country' => $countryName,
            'region' => $stateName,
            'city' => "",
            'minPrice' => $session->get('minPrice'),
            'maxPrice' => $session->get('maxPrice'),
            'minSleeps' => $session->get('minSleeps'),
            'maxSleeps' => $session->get('maxSleeps'),
            'minBedrooms' => $session->get('minBedrooms'),
            'maxBedrooms' => $session->get('maxBedrooms'),
            'minBathrooms' => $session->get('minBathrooms'),
            'maxBathrooms' => $session->get('maxBathrooms'),
            'moreLocation' => $session->get('MoreLocation'),
            'moreProperty' => $session->get('MoreProperty'),
            'moreAmenities' => $session->get('MoreAmenities'),
            'sort' => $session->get('sort')
        );
        $properties = $em->getRepository('AppBundle:Property')->filterProperties($filtro, $this->container->getParameter('status.active'));
        //  $properties = new \Doctrine\Common\Collections\ArrayCollection();
        /* foreach ($properties2 as $prop) {
          if ($prop->getLocation()->getStateProvince() == $state)
          $properties->add($prop);
          } */
        

        if (count($properties) > 0) {
//==========================================================================

            foreach ($properties as $propertyF) {
                if ($propertyF->getFeatured() == true) {
                    $featuredP->add($propertyF);
                }
            }


            if ($featuredP->count() >= 4) {
                for ($i = 0; $i < 4; $i++) {
                    $featured->add($featuredP[$i]);
                }
            } else {
                for ($i = 0; $i < $featuredP->count(); $i++) {
                    $featured->add($featuredP[$i]);
                }
            }
        }

        
        
         $path  =   "../../../../bundles/common/css/icons/stars.png";
         $activeBreadcrumb = $stateName;
      
       
        
        $breadcrumbs = array(
            array('title' => 'Search', 'name' => 'Search', 'path' => 'none', 'class' => '', 'link' => '0', 'home' => 'HomeEscape'),
            array('title' => 'World', 'name' => 'World', 'path' => 'none', 'class' => '', 'link' => '0'),
            array('title' => 'Country', 'name' => $countryName, 'path' => 'search_results', 'class' => '', 'link' => '0', 'country_slug'=> $country),
            array('title' => 'State', 'name' => $stateName, 'country' => $countryName, 'path' => 'search_results', 'class' => '', 'link' => '0', 'country_slug'=>$country, 'region_slug'=>$state)
        );

        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', 1), 10);
        $session->set('city','');
        $session->set('results', count($properties));
//==========================================================================
        return $this->render('AppBundle:Default:list.html.twig', array(
                    'featuredProperties' => $featured,
                    'properties' => $pagination,
                    'locationTypes' => $locationTypes,
                    'propertyTypes' => $propertyTypes,
                    'breadcrumbs' => $breadcrumbs,
                    'homeAmenities' => $homeAmenities,
                    'country' => $countryName,
                    'state' => $stateName,
                    'city' => '',
                    'starsPath'=> $path,
                    'activeBreadcrumb'=>$activeBreadcrumb
                        //'prices'=>$pricesPerNight,
                        // 'form'=>$form->createView()     
        ));
    }

//-----------------------------------------------------------------------------------------------------------------------------------
    public function searchByCityNameAction($country, $state, $city, Request $request) {
        
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
         $ip_addr = $_SERVER['REMOTE_ADDR'];
        $search = $em->getRepository('AppBundle:SearchControl')->findSearch($country, $state, $city);
        
         if($search == null){
        $search = new \Frontend\AppBundle\Entity\SearchControl();
        $search->setCountry($session->get('country'));
        $search->setCountrySlug($country);
        $search->setStateProvince($session->get('region'));
        $search->setStateProvinceSlug($state);
        $search->setLocality($session->get('city'));
        $search->setLocalitySlug($city);
        $search->setSerial($this->renderSearchSerial());
        $search->setIp($ip_addr);
        $search->setCount(1);
        }else {
        $search->setCount($search->getCount()+1);  
        }
        
        $countryName = $search->getCountry();
        $stateName = $search->getStateProvince();
        $cityName = $search->getLocality();
      
        $filtro = array(
            // 'searchtext' => $countryName,
            'searchtext' => $city,
            'checkin' => $session->get('checkin'),
            'checkout' => $session->get('checkout'),
            'sleeps' => $session->get('sleeps'),
            'country' => $countryName,
            'region' => $stateName,
            'city' => $cityName,
            'minPrice' => $session->get('minPrice'),
            'maxPrice' => $session->get('maxPrice'),
            'minSleeps' => $session->get('minSleeps'),
            'maxSleeps' => $session->get('maxSleeps'),
            'minBedrooms' => $session->get('minBedrooms'),
            'maxBedrooms' => $session->get('maxBedrooms'),
            'minBathrooms' => $session->get('minBathrooms'),
            'maxBathrooms' => $session->get('maxBathrooms'),
            'moreLocation' => $session->get('MoreLocation'),
            'moreProperty' => $session->get('MoreProperty'),
            'moreAmenities' => $session->get('MoreAmenities'),
            'sort' => $session->get('sort')
        );
        $properties = $em->getRepository('AppBundle:Property')->filterProperties($filtro, $this->container->getParameter('status.active'));
        $featured = new \Doctrine\Common\Collections\ArrayCollection();
        $featuredP = new \Doctrine\Common\Collections\ArrayCollection();

        
       

        if (count($properties) > 0) {


            foreach ($properties as $propertyF) {
                if ($propertyF->getFeatured() == true) {
                    $featuredP->add($propertyF);
                }
            }


            if ($featuredP->count() >= 4) {
                for ($i = 0; $i < 4; $i++) {
                    $featured->add($featuredP[$i]);
                }
            } else {
                for ($i = 0; $i < $featuredP->count(); $i++) {
                    $featured->add($featuredP[$i]);
                }
            }
        } 

        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', 1), 10);
        $locationTypes = $em->getRepository('AppBundle:LocationType')->findAll();
        $propertyTypes = $em->getRepository('AppBundle:PropertyType')->findAll();
        $homeAmenities = $em->getRepository('AppBundle:HomeAmenities')->findAll();
        
        
     
        
         $activeBreadcrumb = $cityName;
         $path = "../../../../../bundles/common/css/icons/stars.png";

        $breadcrumbs = array(
            array('title' => 'Search', 'name' => 'Search', 'path' => 'none', 'class' => '', 'link' => '0', 'home' => 'HomeEscape'),
            array('title' => 'World', 'name' => 'World', 'path' => 'none', 'class' => '', 'link' => '0'),
            array('title' => 'Country', 'name' => $countryName, 'path' => 'search_results', 'class' => '', 'link' => '0', 'country_slug'=>$country),
            array('title' => 'State', 'name' => $stateName, 'country' => $countryName, 'path' => 'search_results', 'class' => '', 'link' => '0', 'country_slug'=>$country, 'region_slug'=>$state),
            array('title' => 'City', 'name' => $cityName, 'country' => $countryName, 'state' => $stateName, 'path' => 'search_results', 'class' => '', 'link' => '0', 'country_slug'=>$country, 'region_slug'=>$state, 'city_slug'=>$city)
        );
//==========================================================================



        $session->set('results', count($properties));
//==========================================================================
        return $this->render('AppBundle:Default:list.html.twig', array(
                    'featuredProperties' => $featured,
                    'properties' => $pagination,
                    'locationTypes' => $locationTypes,
                    'propertyTypes' => $propertyTypes,
                    'breadcrumbs' => $breadcrumbs,
                    'homeAmenities' => $homeAmenities,
                    'country' => $countryName,
                    'state' => $stateName,
                    'city' => $cityName,
                    'starsPath' => $path,
                    'activeBreadcrumb'=>$activeBreadcrumb
                        //'prices'=>$pricesPerNight,
                        // 'form'=>$form->createView()     
        ));
    }

//-----------------------------------------------------------------------------------------------------------------------------------
    public function searchWorldAction(Request $request) {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        // echo $text2;
        $filtro = array(
            'searchtext' => "",
            'checkin' => $session->get('checkin'),
            'checkout' => $session->get('checkout'),
            'sleeps' => $session->get('sleeps'),
            'country' => "",
            'region' => "",
            'city' => "",
            'minPrice' => $session->get('minPrice'),
            'maxPrice' => $session->get('maxPrice'),
            'minSleeps' => $session->get('minSleeps'),
            'maxSleeps' => $session->get('maxSleeps'),
            'minBedrooms' => $session->get('minBedrooms'),
            'maxBedrooms' => $session->get('maxBedrooms'),
            'minBathrooms' => $session->get('minBathrooms'),
            'maxBathrooms' => $session->get('maxBathrooms'),
            'moreLocation' => $session->get('MoreLocation'),
            'moreProperty' => $session->get('MoreProperty'),
            'moreAmenities' => $session->get('MoreAmenities'),
            'sort' => $session->get('sort')
        );
     

        $featured = new \Doctrine\Common\Collections\ArrayCollection();
        $featuredP = new \Doctrine\Common\Collections\ArrayCollection();
        //    $featuredP2 = new \Doctrine\Common\Collections\ArrayCollection();

        $locationTypes = $em->getRepository('AppBundle:LocationType')->findAll();
        $propertyTypes = $em->getRepository('AppBundle:PropertyType')->findAll();
        $homeAmenities = $em->getRepository('AppBundle:HomeAmenities')->findAll();
        $properties = $em->getRepository('AppBundle:Property')->filterProperties($filtro, $this->container->getParameter('status.active')); //VLADE
        $session->set('results', count($properties));
        $session->set('country', '');
        $session->set('region', '');
        $session->set('city', '');
        $session->set('searchtext', '');
        

        foreach ($properties as $propertyF) {
            if ($propertyF->getFeatured() == true) {
                $featuredP->add($propertyF);
            }
        }

        if ($featuredP->count() >= 4) {
            for ($i = 0; $i < 4; $i++) {
                $featured->add($featuredP[$i]);
            }
        } else {
            for ($i = 0; $i < $featuredP->count(); $i++) {
                $featured->add($featuredP[$i]);
            }
        }
        
         
        
        
        $activeBreadcrumb = 'World';
        $path = "../../bundles/common/css/icons/stars.png";
        
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', 1), 10);
//-----------------------------------------------------------------------------------------------------------  
        $breadcrumbs = array(
            array('title' => 'Search', 'name' => 'Search', 'path' => 'none', 'class' => '', 'link' => '0', 'home' => 'HomeEscape'),
            array('title' => 'World', 'name' => 'World', 'path' => 'none', 'class' => '', 'link' => '0')
        );
//------------------------------------------------------------------------------------------------------
        
        return $this->render('AppBundle:Default:list.html.twig', array(
                    'featuredProperties' => $featured,
                    'properties' => $pagination,
                    'locationTypes' => $locationTypes,
                    'propertyTypes' => $propertyTypes,
                    'breadcrumbs' => $breadcrumbs,
                    'homeAmenities' => $homeAmenities,
                    'country' => '',
                    'state' => '',
                    'city' => '',
                    'starsPath'=>$path,
                    'activeBreadcrumb'=>$activeBreadcrumb
                        //'prices'=>$pricesPerNight,
                        // 'form'=>$form->createView()     
        ));
    }

    public function resetPriceFilterAction(Request $request) {
        $session = $request->getSession();
        $session->set('minPrice', '');
        $session->set('maxPrice', '');

        $country = $session->get('country');
        $region = $session->get('region');
        $city = $session->get('city');
        
        $country_url = $this->seoUrl($country);
        $region_url = $this->seoUrl($region);
        $city_url = $this->seoUrl($city);

        return $this->redirect($this->generateUrl('search_results', array('country'=>$country_url, 'region'=>$region_url, 'city'=>$city_url)));
    }

    public function helpCenterAction(Request $request) {

        return $this->render('AppBundle:Default:help-center.html.twig', array());
    }

    public function contactUsAction(Request $request) {
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ContactFrontFormType(), new \Frontend\AppBundle\Entity\ContactFront());
        return $this->render('AppBundle:Default:contact.html.twig', array('form' => $form->createView()));
    }

    public function aboutUsAction(Request $request) {

        return $this->render('AppBundle:Default:about.html.twig');
    }

    public function termsAction(Request $request) {

        return $this->render('AppBundle:Default:terms.html.twig');
    }
    
     public function privacyPolicyAction(Request $request) {

        return $this->render('AppBundle:Default:privacyPolicy.html.twig');
    }

    public function contentGuidelinesAction(Request $request) {

        return $this->render('AppBundle:Default:contentGuidelines.html.twig');
    }

    
     public function howWorksAction(Request $request) {

        return $this->render('AppBundle:Default:howitworks.html.twig');
    }
    
    
       public function blogAction(Request $request) {
           
        $em = $this->getDoctrine()->getManager();
        $blogs = $em->getRepository('AppBundle:Blog')->getBlogsByStatus($this->container->getParameter('status.posted'));
        $tags = $em->getRepository('AppBundle:Tags')->findAll();
        $recentBlogs = new ArrayCollection();
      
        foreach ($blogs as $key => $blog) {
            if($key < 3){
            $recentBlogs->add($blog);    
            }
        }    
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($blogs, $this->get('request')->query->get('page', 1), 10);
        
        return $this->render('AppBundle:Default:blog.html.twig', array('blogs'=>$pagination, 'tags'=>$tags, 'recentBlogs'=>$recentBlogs));
    }
    
        public function blogDetailAction($slug ,Request $request) {
           
        $em = $this->getDoctrine()->getManager();
        $blogs = $em->getRepository('AppBundle:Blog')->getBlogsByStatus($this->container->getParameter('status.posted'));
        $tags = $em->getRepository('AppBundle:Tags')->findAll();
        $recentBlogs = new ArrayCollection();
      
        foreach ($blogs as $key => $blog) {
            if($key < 3){
            $recentBlogs->add($blog);    
            }
        }    
        $blog = $em->getRepository('AppBundle:Blog')->findOneBy(array('slug'=>$slug));
        
          
        
        return $this->render('AppBundle:Default:blogDetail.html.twig', array('blog'=>$blog, 'tags'=>$tags, 'recentBlogs'=>$recentBlogs));
    }
    
    
    public function investorAction(Request $request) {

        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ContactInvestorFormType(), new \Frontend\AppBundle\Entity\ContactInvestor());
        return $this->render('AppBundle:Default:investor.html.twig', array('form' => $form->createView()));
    }

    public function createContactAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ContactFrontFormType(), new \Frontend\AppBundle\Entity\ContactFront());
        $form->handleRequest($request);
        $contact = $form->getData();
        $status_id = $this->container->getParameter('status.pending');
        $status = $em->getRepository('AppBundle:Status')->find($status_id);
        
        if ($form->isValid()) {
            $contact->setDateCreated(new \DateTime);
            $contact->setSerie($this->renderSerie());
            $contact->setStatus($status);
            $contact->setReplied(false);
            $img_p = $contact->getUploadRootDir();
            //echo("pth: ".$img_p);
            // $img_p = $image->getUploadRootDir();   
            //  $img_p = "";
            //$img_pf="symfony/web/uploads/images" . '/' . $OwnerId . '/' . $PropertyId . '/'/* .$image->getId() */;
            $img_pf = "uploads/images/contact/" . $form['email']->getData() . '/'/* .$image->getId() */;
            $img_p.=$img_pf;
            //$iid=$image1->getId();
            //echo("id: ".$counter);

            $contact->upload($img_p, $img_pf);

            $em->persist($contact);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'message', 'Your message has been sent! One of our associates will reply to you as soon as possible. Case #'.$contact->getSerie()
            );

            $template = "AppBundle:Default:customer-support-admin-mail.html.twig";
            $options = array('contact' => $contact);
            $to = "support@homeescape.com";
            //$to = "devtelx1@gmail.com";
            $from = array("support@homeescape.com", 'HomeEscape');
            $subject = "New Customer Support Contact from " . $form['name']->getData() . ' ' . $form['lastName']->getData();

            $templateClient = "AppBundle:Default:customer-support-client-mail.html.twig";
            $toClient = $form['email']->getData();
            $subjectClient = "Thank you for contacting HomeEscape Customer Support.";

            $this->sendEmail($template, $options, $to, $from, $subject);
            $this->sendEmail($templateClient, $options, $toClient, $from, $subjectClient);

            return $this->redirect($this->generateUrl('contact_us', array()));
        }
        return $this->render('AppBundle:Default:contact.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function createInvestorAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\ContactInvestorFormType(), new \Frontend\AppBundle\Entity\ContactInvestor());
        $form->handleRequest($request);
        $contact = $form->getData();
        $status_id = $this->container->getParameter('status.pending');
        $status = $em->getRepository('AppBundle:Status')->find($status_id);

        if ($form->isValid()) {
            $contact->setDateCreated(new \DateTime);
            $contact->setSerie($this->renderSerie());
            $contact->setStatus($status);
            $contact->setReplied(false);
            $em->persist($contact);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'message', 'Your message has been sent! One of our associates will reply to you as soon as possible.'
            );

            $template = "AppBundle:Default:investor-admin-mail.html.twig";
            $options = array('contact' => $contact);
            $to = "support@homeescape.com";
            $from = array("support@homeescape.com", 'HomeEscape');
            $subject = "New Investor Contact from " . $form['name']->getData() . ' ' . $form['lastName']->getData();

            $templateClient = "AppBundle:Default:investor-client-mail.html.twig";
            $toClient = $form['email']->getData();
            $subjectClient = "Thank you for contacting HomeEscape.";

            $this->sendEmail($template, $options, $to, $from, $subject);
            $this->sendEmail($templateClient, $options, $toClient, $from, $subjectClient);

            return $this->redirect($this->generateUrl('investor'));
        }
        return $this->render('AppBundle:Default:investor.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function sendEmail($template, $options, $to, $from, $subject) {

        $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($from[0], $from[1])
                ->setTo($to)
                ->setBody($this->renderView($template, $options), 'text/html')
        ;

        $this->get('mailer')->send($message);
    }
    
    
    public function validateCaptchaAction(Request $request){
        
          $captcha= $request->get('g-recaptcha-response');
          $response = new Response();
          
     if(!$captcha){
          $data = array('nocaptcha' => 'true');
          return new Response(json_encode($data));
          //return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
         
        }

        //$responsecaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeJ-AUTAAAAAEBwgsHoA2ISxZGLVrmSsGk53tEN&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
       
        $isValid = $this->checkAnswer('6LeJ-AUTAAAAAEBwgsHoA2ISxZGLVrmSsGk53tEN', $_SERVER['REMOTE_ADDR'], $captcha);

        if(!$isValid)
        {
          $data = array('spam' => 'true');
          return new Response(json_encode($data));
          //return $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        }else
        {
          $data = array('spam' => 'false');
          return new Response(json_encode($data));
          //return $response->setStatusCode(Response::HTTP_OK);
        }
    }
    
    
     private function checkAnswer($privateKey, $remoteip, $response)
    {
        if ($remoteip == null || $remoteip == '') {
            throw new ValidatorException('For security reasons, you must pass the remote ip to reCAPTCHA');
        }

        // discard spam submissions
        if ($response == null || strlen($response) == 0) {
            return false;
        }

        $response = $this->httpGet('https://www.google.com', '/recaptcha/api/siteverify', array(
            'secret'   => $privateKey,
            'remoteip' => $remoteip,
            'response' => $response
        ));

        $response = json_decode($response, true);

        if ($response['success'] == true) {
            return true;
        }

        return false;
    }
    
     private function httpGet($host, $path, $data)
    {
        $host = sprintf('%s%s?%s', $host, $path, http_build_query($data));

        return file_get_contents($host);
    }

    
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    
    
     public function renderSerie() {

        $rand = rand(1, 999999);

        if (strlen($rand) == 1) {
            $serie = '11111' . $rand;
        } else if (strlen($rand) == 2) {
            $serie = '1111' . $rand;
        } else if (strlen($rand) == 3) {
            $serie = '111' . $rand;
        } else if (strlen($rand) == 4) {
            $serie = '11' . $rand;
        } else if (strlen($rand) == 5) {
            $serie =  '1' .$rand;
        }else if (strlen($rand) == 6) {
            $serie =  $rand;
        }
        return $serie;
    }



//-----------------------------------------------------------------------------------------------------------------------------------
}
