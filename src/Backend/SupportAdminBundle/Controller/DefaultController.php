<?php

namespace Backend\SupportAdminBundle\Controller;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    //-----------------------------------------------------------------------------------------------    
    public function routerAction() {
        
        if ($this->get('security.context')->isGranted('ROLE_SUPPORT') || $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            return $this->redirect($this->generateUrl('support_view_user_owner'));
        } else if ($this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('support_logout'));
        }
        return $this->render("AppBundle:Default:index.html.twig");
    }

    //----------------------------------------------------------------------------------    
    public function usersAction() {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();
        return $this->render('SupportAdminBundle:Default:users.html.twig', array('users' => $users));
    }

//-----------------------------------------------------------------------------------
    public function add_userAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        

        $form = $this->createForm(new \Backend\SuperAdminBundle\Form\Type\NewUserFormType(), new \Frontend\AppBundle\Entity\User());
        $form->handleRequest($request);

        $user = new \Frontend\AppBundle\Entity\User();
        $name = $request->get('new_user')['name'];
        $lastname = $request->get('new_user')['lastname'];
        $email =  $request->get('new_user')['email'];
        $password = $request->get('new_user')['plainPassword']['first']; 
        $password1 = $request->get('new_user')['plainPassword']['second'];
         $phone =  $request->get('new_user')['phone'];

         
        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'News', 'path' => 'clear_all_filters_news', 'class' => ''),
            array('name' => 'Create', 'path' => '', 'class' => 'active'));
         
        
        
        if ($name != "" && $lastname != "" && $email != "" && $password != "" && $password1 != "") {
            
            if ($password != $password1){
                
                  return $this->render('SupportAdminBundle:Default:user-add.html.twig', array(
                    'form' => $form->createView(),
                    'breadcrumbs' => $breadcrumbs,
                    'error' => 'Passwords must match!'
                 
        ));
            }
            
            
            $userAlready = $this->container->get('fos_user.user_manager')->findUserByUsernameOrEmail($email);
            if($userAlready == null){
                $encoder_service = $this->get('security.encoder_factory');
            $encoder = $encoder_service->getEncoder($user);
            $encoded_pass = $encoder->encodePassword($password1, $user->getSalt());

            $userManager = $this->get('fos_user.user_manager');
            $userDb = $userManager->createUser();
            $userDb->setUsername($email);
            $userDb->setUsernameCanonical($email);
            $userDb->setEmail($email);
            $userDb->setEmailCanonical($email);
            $userDb->setPlainPassword($encoded_pass);
            $userDb->setName($name);
            $userDb->setLastName($lastname);
            $userDb->setPhone($phone);
            $userDb->setRoles(array('ROLE_SUPPORT'));
            $userDb->setDateCreated(new \DateTime);
            $em->persist($userDb);
            $em->flush();


            return $this->redirect($this->generateUrl('support_view_user_owner'));
            }
            else {
              return $this->render('SupportAdminBundle:Default:user-add.html.twig', array(
                    'form' => $form->createView(),
                    'breadcrumbs' => $breadcrumbs,
                    'error' => 'The username or email already exist in the database!'
                 
        ));  
            }
            
            
        }


        return $this->render('SupportAdminBundle:Default:user-add.html.twig', array(
                    'form' => $form->createView(),
                    'breadcrumbs' => $breadcrumbs,
                    'buttons' => false,
                    'searchNews' => false,
                    'filterNews' => false,
        ));
    }

//-----------------------------------------------------------------------------------
    public function create_userAction() {
        $name = $request->get('name');
        $last_name = $request->get('last-name');
        $user_name = $request->get('user-name');
        $phone = $request->get('phone');
        $password = $request->get('password');
        $email = $request->get('email');
        $em = $this->getDoctrine()->getManager();
        $user = new \Frontend\AppBundle\Entity\User();
        $user->setName($name);
        $user->setLastName($last_name);
        $user->setUsername($user_name);
        $user->setPhone($phone);
        $user->setPassword($password);
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();
        return $this->render('SupportAdminBundle:Default:users.html.twig', array('users' => $users));
    }

//-----------------------------------------------------------------------------------
    public function user_editAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
        return $this->render('SupportAdminBundle:Default:user-edit.html.twig', array('user' => $user));
    }

//-----------------------------------------------------------------------------------
    public function property_editAction($id) {
        $em = $this->getDoctrine()->getManager();
        $property = $em->getRepository('AppBundle:Property')->find($id);
        return $this->render('SupportAdminBundle:Default:property-edit.html.twig', array('property' => $property));
    }

//-----------------------------------------------------------------------------------
    public function usermodifyAction(Request $request) {
        $name = $request->get('name');
        $last_name = $request->get('last-name');
        $user_name = $request->get('user-name');
        $phone = $request->get('phone');
        $phone_code = $request->get('phone-code');
        $email = $request->get('email');
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $suser = $em->getRepository('AppBundle:User')->find($id);
        echo( $id);
        echo("id");
        //$user = $em->getRepository('AppBundle:User')->findOneBy(array('user' => $suser->getId()));
        $user = $em->getRepository('AppBundle:User')->find($id);
        $user->setName($name);
        $user->setLastName($last_name);
        $user->setUsername($user_name);
        $user->setCountryPhoneCode($phone_code);
        $user->setPhone($phone);
        $user->setEmail($email);
        $em->persist($user);
        $em->flush();

        //$user = $em->getRepository('AppBundle:User')->find($mid);
        $users = $em->getRepository('AppBundle:User')->findAll();
        return $this->render('SupportAdminBundle:Default:users.html.twig', array('users' => $users));
        //return $this->render('AdminBundle:Default:a.html.twig', array('user'=>$user));
    }

//-----------------------------------------------------------------------------------        
    public function indexAction(Request $request) {
        $properties_select = true;
        $filter = false;
        $print = false;
        $download = false;
        $search = false;
        $location = false;
        $property = false;
        $expired_alert = false;
        $new_reservation = false;
        $add = true;
        $list = false;

        $breadcrumbs = array(
            array('name' => 'Properties', 'path' => 'support_user_homepage', 'class' => ''));

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $properties = $em->getRepository('AppBundle:Property')->getPropertiesByUserAndStatusBoth($user, $this->container->getParameter('status.active'), $this->container->getParameter('status.inactive'));

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', 1), 4);
        $news = $em->getRepository('AppBundle:News')->findBy(array('new' => true, 'status' => $this->container->getParameter('status.posted')));
        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $session->set('news', count($news));
        $form = $this->createForm(new \Frontend\AppBundle\Form\Type\DeactivationRequestFormType(), new \Frontend\AppBundle\Entity\UserRequest());





        return $this->render('AdminBundle:Default:user.html.twig', array(
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
                    'properties' => $pagination,
                    'path' => 'editPropertyHome',
                    'form' => $form->createView()
        ));
    }

    public function adminAction() {
        return $this->render('SupportAdminBundle:Default:admin.html.twig', array());
    }

//-----------------------------------------------------------------------------------------------
    public function adminPropertiesAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();

        $filtro = array(
            'searchtext' => $session->get('sasearchtext'),
            'featured' => $session->get('featured'),    
            'status' => $session->get('sastatus')
        );
        $properties = $em->getRepository('AppBundle:Property')->filterSuperAdminProperties($filtro);
        $paginator = $this->get('knp_paginator');
        $page = 1;
        if ($request->get('page') != '') {
            $page = $this->get('request')->query->get('page');
        }

        $filter_id = '';
        $status = $request->get('sastatus');
        if ($status != "" && $status != null) {
            $filter_id = $status;
        }

        if ($filter_id == '1') {
            $filter = 'Active';
        } elseif ($filter_id == '2') {
            $filter = 'Inactive';
        } else {
            $filter = 'Filter';
        }


        $pagination = $paginator->paginate($properties, $this->get('request')->query->get('page', $page), 30);
        //$pagination->setTemplate('SuperAdminBundle:Default:sliding.html.twig');
        //$pagination->setParam('sastatus', $status);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'Properties', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:admin-properties.html.twig', array(
                    'properties' => $pagination,
                    'breadcrumbs' => $breadcrumbs,
                    'search' => true,
                    'filterP' => true,
                    'page' => $page,
                    'filter' => $filter,
                    'buttons' => true,
        ));
    }

    //activate Property Admin

    public function activatePropertyAction($id, $page) {

        $em = $this->getDoctrine()->getManager();
        $property = $em->getRepository('AppBundle:Property')->find($id);
        $status_active_id = $this->container->getParameter('status.active');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $property->setStatus($Status_active);
        $em->persist($property);
        $em->flush();
        
         if($property->getLocation() != null){
        $country = $property->getLocation()->getCountry();
       
        
        $region = $property->getLocation()->getStateProvince();
        $city = $property->getLocation()->getLocality();
        
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
        $search->setCount(0);
        $em->persist($search);
        $em->flush();
        }
        
        $Country_DB = $em->getRepository('AppBundle:CountryStats')->findOneByName($country);
        $Region_DB = $em->getRepository('AppBundle:RegionStats')->findOneByName($region);
        $City_DB = $em->getRepository('AppBundle:CityStats')->findOneByName($city);
        
        
        if (count($Country_DB) == 0) {
                $countryStats = new \Frontend\AppBundle\Entity\CountryStats();
                $countryStats->setName($country);
                $countryStats->setCount(1);
                $em->persist($countryStats);
                $em->flush();
            } else {
                $Country_DB->setCount($Country_DB->getCount() + 1);
                $em->persist($Country_DB);
                $em->flush();
            }

            if (count($Region_DB) == 0) {
                $regionStats = new \Frontend\AppBundle\Entity\RegionStats();
                $regionStats->setName($region);
                $regionStats->setCount(1);
                $em->persist($regionStats);
                $em->flush();
            } else {
                $Region_DB->setCount($Region_DB->getCount() + 1);
                $em->persist($Region_DB);
                $em->flush();
            }

            if (count($City_DB) == 0) {
                $cityStats = new \Frontend\AppBundle\Entity\CityStats();
                $cityStats->setName($city);
                $cityStats->setCount(1);
                $em->persist($cityStats);
                $em->flush();
            } else {
                $City_DB->setCount($City_DB->getCount() + 1);
                $em->persist($City_DB);
                $em->flush();
            }
        
        }
        
        $date = date('c',time());
                // Open and parse the XML file
        $xml = simplexml_load_file("sitemap.xml");
        // Create a child in the first topic node
        $child = $xml->addChild("url");
        // Add the text attribute
        $child->addChild("loc", "https://www.homeescape.com/vacation-rental/".$property->getSerie()."/");
        $child->addChild("lastmod", "$date");
        $child->addChild("changefreq", "daily");
        $child->addChild("priority", "1.0");
        $xml->asXML("sitemap.xml");
        
        
        $template = "SupportAdminBundle:Default:new-property-owner-mail.html.twig";
            $options = array('property' => $property);
            //$to = "support@homeescape.com";
            $to = $property->getContact()->getEmail();
            $from = array("listing@homeescape.com", 'HomeEscape');
            $subject = 'Your Listing #' . $property->getSerie() . ' has been activated';

            $this->sendEmail($template, $options, $to, $from, $subject);
            $this->facebookDebugger('https://www.homeescape.com/vacation-rental/'.$property->getSerie().'/');

        return $this->redirect($this->generateUrl('support_view_properties', array('page' => $page)));
    }

    //deactivate Property Admin

    public function deactivatePropertyAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $property = $em->getRepository('AppBundle:Property')->find($id);

        $status_inactive_id = $this->container->getParameter('status.inactive');
        $Status_inactive = $em->getRepository('AppBundle:Status')->find($status_inactive_id);
        $property->setStatus($Status_inactive);
        $em->persist($property);
        $em->flush();
        
        if($property->getLocation() != null){
        $country = $property->getLocation()->getCountry();
       
        
        $region = $property->getLocation()->getStateProvince();
        $city = $property->getLocation()->getLocality();
      
        
        $Country_DB = $em->getRepository('AppBundle:CountryStats')->findOneByName($country);
        $Region_DB = $em->getRepository('AppBundle:RegionStats')->findOneByName($region);
        $City_DB = $em->getRepository('AppBundle:CityStats')->findOneByName($city);
        
        
        if (count($Country_DB) > 0) {
               $Country_DB->setCount($Country_DB->getCount() - 1);
                $em->persist($Country_DB);
                $em->flush();
            }

            if (count($Region_DB) > 0) {
              
                $Region_DB->setCount($Region_DB->getCount() - 1);
                $em->persist($Region_DB);
                $em->flush();
            }

            if (count($City_DB) > 0) {
            
                $City_DB->setCount($City_DB->getCount() - 1);
                $em->persist($City_DB);
                $em->flush();
            }
        
        }
        
             $xml = simplexml_load_file("sitemap.xml");
        $urls = $xml->url;
        for( $i = 0; $i < $urls->count(); $i++) {
    // For each person you get all the phoneNums tags
        $loc = $urls[$i]->loc;
        // We get all of the attributes, and select the one on index 0 -the ONLY attribute in this given case
            if ($loc =="https://www.homeescape.com/vacation-rental/".$property->getSerie()."/"){
                unset($xml->url[$i]);
            }
            }
        $xml->asXML("sitemap.xml");

        return $this->redirect($this->generateUrl('support_view_properties', array('page' => $page)));
    }
    
    
    
    
     public function activateFeaturedPropertyAction($id, $page) {

        $em = $this->getDoctrine()->getManager();
        $property = $em->getRepository('AppBundle:Property')->find($id);
        $property->setFeatured(1);
        $em->persist($property);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_properties', array('page' => $page)));
        }
        
        public function deactivateFeaturedPropertyAction($id, $page) {

        $em = $this->getDoctrine()->getManager();
        $property = $em->getRepository('AppBundle:Property')->find($id);
        $property->setFeatured(0);
        $em->persist($property);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_properties', array('page' => $page)));
        }

    public function activateNewsAction($id, $page) {

        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('AppBundle:News')->find($id);
        $status_active_id = $this->container->getParameter('status.posted');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $news->setStatus($Status_active);
        if ($news->getDatePosted() == null || $news->getDatePosted() == '') {
            $news->setDatePosted(new \DateTime);
        }
        $em->persist($news);
        $em->flush();

        return $this->redirect($this->generateUrl('list_news', array('page' => $page)));
    }

    //deactivate Property Admin

    public function deactivateNewsAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('AppBundle:News')->find($id);
        $status_active_id = $this->container->getParameter('status.pending');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $news->setStatus($Status_active);
        $em->persist($news);
        $em->flush();

        return $this->redirect($this->generateUrl('support_list_news', array('page' => $page)));
    }
    
    
    public function activateUserAction($id, $page) {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
        $user->setEnabled('1');
        $em->persist($user);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_user_owner', array('page' => $page)));
    }

    //deactivate Property Admin

    public function deactivateUserAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
        $user->setEnabled('0');
        $em->persist($user);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_user_owner', array('page' => $page)));
    }

    public function deleteNewsAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('AppBundle:News')->find($id);
        $em->remove($news);
        $em->flush();

        return $this->redirect($this->generateUrl('support_list_news', array('page' => $page)));
    }

    public function deleteContactsAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactFront')->find($id);
        
         $replys = $contact->getReplys();
        if($replys != null){
            foreach ($replys as $reply){
              $em->remove($reply);   
            }
        }
        $em->remove($contact);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_contacts', array('page' => $page)));
    }

    public function deleteContactsInvestorAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactInvestor')->find($id);
        $em->remove($contact);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_contacts_investor', array('page' => $page)));
    }

    public function deleteContactsOwnerAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactOwner')->find($id);
        
        $replys = $contact->getReplys();
        if($replys != null){
            foreach ($replys as $reply){
              $em->remove($reply);   
            }
        }
        
        $em->remove($contact);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_contacts_owner', array('page' => $page)));
    }

    public function deleteInquiryAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:Inquiry')->find($id);
        $em->remove($contact);
        $em->flush();

        return $this->redirect($this->generateUrl('support_admin_view_inquiries', array('page' => $page)));
    }

    public function searchAction(Request $request) {

        $session = $request->getSession();
        $searchtext = $request->get('sasearchtext');
        $status = $request->get('sastatus');
        
        $session->set('sasearchtext', $searchtext);
        
        if($status == 'F'){
        $session->set('sastatus', '');
        $session->set('featured', '1');
        }else{
        $session->set('sastatus', $status);    
        } 


        return $this->redirect($this->generateUrl('support_view_properties'));
    }

    public function searchNewsAction(Request $request) {

        $session = $request->getSession();

        $searchtext = $request->get('sasearchtextnews');
        $status = $request->get('sastatusnews');


        $session->set('sasearchtextnews', $searchtext);
        $session->set('sastatusnews', $status);


        return $this->redirect($this->generateUrl('support_list_news'));
    }

    public function searchInquiriesAction(Request $request) {
        $session = $request->getSession();
        $searchtext = $request->get('sasearchtextinq');
        $status = $request->get('sastatusinq');
        $session->set('sasearchtextinq', $searchtext);
        $session->set('sastatusinq', $status);
        return $this->redirect($this->generateUrl('support_admin_view_inquiries'));
    }

    public function searchContactsAction(Request $request) {
        $session = $request->getSession();
        $searchtext = $request->get('sasearchtextcontacts');
        $status = $request->get('sastatuscontacts');
        $reply = $request->get('sareply');
        $session->set('sasearchtextcontacts', $searchtext);
        $session->set('sastatuscontacts', $status);
        $session->set('sareply', $reply);
        return $this->redirect($this->generateUrl('support_view_contacts'));
    }

    public function searchUserOwnerAction(Request $request) {
        $session = $request->getSession();
        $searchtext = $request->get('sasearchtextusersown');
        $status = $request->get('sastatususerown');
        $session->set('sasearchtextusersown', $searchtext);
        $session->set('sastatususerown', $status);

        return $this->redirect($this->generateUrl('support_view_user_owner'));
    }

    public function searchContactsInvestorAction(Request $request) {
        $session = $request->getSession();
        $searchtext = $request->get('sasearchtextcontactsinv');
        $status = $request->get('sastatuscontactsinv');
        $session->set('sasearchtextcontactsinv', $searchtext);
        $session->set('sastatuscontactsinv', $status);
        return $this->redirect($this->generateUrl('support_view_contacts_investor'));
    }

    public function searchContactsOwnerAction(Request $request) {
        $session = $request->getSession();
        $searchtext = $request->get('sasearchtextcontactsown');
        $status = $request->get('sastatuscontactsown');
        $reply = $request->get('sareplyown');
        $session->set('sasearchtextcontactsown', $searchtext);
        $session->set('sastatuscontactsown', $status);
        $session->set('sareplyown', $reply);
        return $this->redirect($this->generateUrl('support_view_contacts_owner'));
    }
    
    
    
     public function openTicketContactsAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactFront')->find($id);
        $status_active_id = $this->container->getParameter('status.active');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $contact->setStatus($Status_active);
        $em->persist($contact);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_contacts', array('page' => $page)));
    }
    
      public function openOwnerTicketContactsAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactOwner')->find($id);
        $status_active_id = $this->container->getParameter('status.active');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $contact->setStatus($Status_active);
        $em->persist($contact);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_contacts_owner', array('page' => $page)));
    }
    
      public function closeOwnerTicketContactsAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactOwner')->find($id);
        $status_active_id = $this->container->getParameter('status.inactive');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $contact->setStatus($Status_active);
        $em->persist($contact);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_contacts_owner', array('page' => $page)));
    }
    
    
     public function closeTicketContactsAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactFront')->find($id);
        $status_active_id = $this->container->getParameter('status.inactive');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $contact->setStatus($Status_active);
        $em->persist($contact);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_contacts', array('page' => $page)));
    }
    
    
    public function replyTicketContactsAction($id, $page, Request $request) {
           
        $response = new Response();
       
        try{
        $em = $this->getDoctrine()->getManager();
        $message = $request->get('mensaje');
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
       
        $contact = $em->getRepository('AppBundle:ContactFront')->find($id);
        $reply = new \Frontend\AppBundle\Entity\ContactFrontReply();
        //$status_active_id = $this->container->getParameter('status.inactive');
        //$Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $contact->setReplied(true);
        
         
        $reply->setContact($contact);
        $reply->setUser($user);
        $reply->setDateCreated(new \DateTime());
        $reply->setText($message);
        
        $em->persist($reply);
        $em->persist($contact);
        $em->flush();
        
        $template = "SupportAdminBundle:Default:support-client-mail.html.twig";
        $options = array('contact' => $contact, 'reply'=>$reply);
        //$to = "support@homeescape.com";
        $to = $contact->getEmail();
        $from = array("support@homeescape.com", 'HomeEscape');
        $subject = 'Regarding Case #' . $contact->getSerie();

        $this->sendEmail($template, $options, $to, $from, $subject);
        
        
        return $response->setStatusCode(Response::HTTP_OK);
         } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        
    }
    
      public function replyCloseTicketContactsAction($id, $page, Request $request) {
          $response = new Response();
           try{
               
               
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactFront')->find($id);
        $reply = new \Frontend\AppBundle\Entity\ContactFrontReply();
        
        $message = $request->get('mensaje');
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $status_active_id = $this->container->getParameter('status.inactive');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        
        $contact->setStatus($Status_active);
        $contact->setReplied(true);
        
        $reply->setContact($contact);
        $reply->setUser($user);
        $reply->setDateCreated(new \DateTime());
        $reply->setText($message);
        
        $em->persist($reply);        
        $em->persist($contact);
        $em->flush();
        $template = "SupportAdminBundle:Default:support-client-mail.html.twig";
        $options = array('contact' => $contact, 'reply'=>$reply);
        //$to = "support@homeescape.com";
        $to = $contact->getEmail();
        $from = array("support@homeescape.com", 'HomeEscape');
        $subject = 'Regarding Case #' . $contact->getSerie();

        $this->sendEmail($template, $options, $to, $from, $subject);
        
        
         return $response->setStatusCode(Response::HTTP_OK);
        } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
    }
    
    
    
    
    public function replyOwnerTicketContactsAction($id, $page, Request $request) {
           
        $response = new Response();
       
        try{
        $em = $this->getDoctrine()->getManager();
        $message = $request->get('mensaje');
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
       
        $contact = $em->getRepository('AppBundle:ContactOwner')->find($id);
        $reply = new \Frontend\AppBundle\Entity\ContactOwnerReply();
        //$status_active_id = $this->container->getParameter('status.inactive');
        //$Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $contact->setReplied(true);
        
         
        $reply->setContact($contact);
        $reply->setUser($user);
        $reply->setDateCreated(new \DateTime());
        $reply->setText($message);
        
        $em->persist($reply);
        $em->persist($contact);
        $em->flush();
        
        $template = "SupportAdminBundle:Default:support-client-owner-mail.html.twig";
        $options = array('contact' => $contact, 'reply'=>$reply);
        //$to = "support@homeescape.com";
        $to = $contact->getUser()->getEmail();
        $from = array("support@homeescape.com", 'HomeEscape');
        $subject = 'Regarding Case #' . $contact->getSerie();

        $this->sendEmail($template, $options, $to, $from, $subject);
        
        
        return $response->setStatusCode(Response::HTTP_OK);
         } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        
    }
    
      public function replyCloseOwnerTicketContactsAction($id, $page, Request $request) {
          $response = new Response();
           try{
               
               
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('AppBundle:ContactOwner')->find($id);
        $reply = new \Frontend\AppBundle\Entity\ContactOwnerReply();
        
        $message = $request->get('mensaje');
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());
        $status_active_id = $this->container->getParameter('status.inactive');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        
        $contact->setStatus($Status_active);
        $contact->setReplied(true);
        
        $reply->setContact($contact);
        $reply->setUser($user);
        $reply->setDateCreated(new \DateTime());
        $reply->setText($message);
        
        $em->persist($reply);        
        $em->persist($contact);
        $em->flush();
        $template = "SupportAdminBundle:Default:support-client-owner-mail.html.twig";
        $options = array('contact' => $contact, 'reply'=>$reply);
        //$to = "support@homeescape.com";
        $to = $contact->getUser()->getEmail();
        $from = array("support@homeescape.com", 'HomeEscape');
        $subject = 'Regarding Case #' . $contact->getSerie();

        $this->sendEmail($template, $options, $to, $from, $subject);
        
        
         return $response->setStatusCode(Response::HTTP_OK);
        } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            return $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            }
    }


    public function clearAllFiltersAction(Request $request) {

        $session = $request->getSession();

        $session->set('sasearchtext', '');
        $session->set('featured', '');
        $session->set('sastatus', '');



        return $this->redirect($this->generateUrl('support_view_properties'));
    }

    public function clearAllFiltersNewsAction(Request $request) {

        $session = $request->getSession();


        $session->set('sasearchtextnews', '');
        $session->set('sastatusnews', '');


        return $this->redirect($this->generateUrl('support_list_news'));
    }

    public function clearAllFiltersInquiriesAction(Request $request) {

        $session = $request->getSession();
        $session->set('sasearchtextinq', '');
        $session->set('sastatusinq', '');


        return $this->redirect($this->generateUrl('support_admin_view_inquiries'));
    }

    public function clearAllFiltersContactsAction(Request $request) {

        $session = $request->getSession();
        $session->set('sasearchtextcontacts', '');
        $session->set('sastatuscontacts', '');
        $session->set('sareply', '');

        return $this->redirect($this->generateUrl('support_view_contacts'));
    }

    public function clearAllFiltersContactsInvestorAction(Request $request) {

        $session = $request->getSession();
        $session->set('sasearchtextcontactsinv', '');
        $session->set('sastatuscontactsinv', '');


        return $this->redirect($this->generateUrl('support_view_contacts_investor'));
    }

    public function clearAllFiltersContactsOwnerAction(Request $request) {

        $session = $request->getSession();
        $session->set('sasearchtextcontactsown', '');
        $session->set('sastatuscontactsown', '');
         $session->set('sareplyown', '');


        return $this->redirect($this->generateUrl('support_view_contacts_owner'));
    }

    public function clearAllFiltersUserOwnerAction(Request $request) {

        $session = $request->getSession();
        $session->set('sasearchtextusersown', '');
        $session->set('sastatususerown', '');


        return $this->redirect($this->generateUrl('support_view_user_owner'));
    }

    public function clearFilterAction(Request $request) {

        $session = $request->getSession();
        $session->set('sastatus', '');
         $session->set('featured', '');
        return $this->redirect($this->generateUrl('support_view_properties'));
    }

    public function clearFilterUserOwnerAction(Request $request) {

        $session = $request->getSession();
        $session->set('sastatususerown', '');

        return $this->redirect($this->generateUrl('support_view_user_owner'));
    }

    public function clearFilterNewsAction(Request $request) {

        $session = $request->getSession();
        $session->set('sastatusnews', '');

        return $this->redirect($this->generateUrl('support_list_news'));
    }

    public function clearFilterInquiriesAction(Request $request) {

        $session = $request->getSession();
        $session->set('sastatusinq', '');

        return $this->redirect($this->generateUrl('support_admin_view_inquiries'));
    }

    public function listNewsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $filtro = array(
            'searchtextnews' => $session->get('sasearchtextnews'),
            'status' => $session->get('sastatusnews')
        );

        $page = 1;
        if ($request->get('page') != '') {
            $page = $this->get('request')->query->get('page');
        }

        $news = $em->getRepository('AppBundle:News')->filterNews($filtro);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($news, $this->get('request')->query->get('page', $page), 30);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'admin_admin_homepage', 'class' => ''),
            array('name' => 'News', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:news.html.twig', array(
                    'news' => $pagination,
                    'breadcrumbs' => $breadcrumbs,
                    'search' => false,
                    'searchNews' => true,
                    'buttons' => true,
                    'page' => $page,
                    'filterNews' => true,
        ));
    }

    public function createNewsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());

        $form = $this->createForm(new \Backend\SuperAdminBundle\Form\Type\NewsFormType(), new \Frontend\AppBundle\Entity\News());
        $form->handleRequest($request);


        $status_posted_id = $this->container->getParameter('status.posted');
        $status_pending_id = $this->container->getParameter('status.pending');
        $Status_post = $em->getRepository('AppBundle:Status')->find($status_posted_id);
        $Status_pend = $em->getRepository('AppBundle:Status')->find($status_pending_id);


        if ($form->isValid()) {
            $News = new \Frontend\AppBundle\Entity\News();
            $News = $form->getData();
            $News->setDateCreated(new \DateTime);
            $News->setUser($user);
            $News->setNew(1);
            if ($form['status']->getData() == $Status_post) {
                $News->setDatePosted(new \DateTime);
            }

            $em->persist($News);
            $em->flush();


            return $this->redirect($this->generateUrl('support_list_news'));
        }

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'News', 'path' => 'support_clear_all_filters_news', 'class' => ''),
            array('name' => 'Create', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:newsForm.html.twig', array(
                    'form' => $form->createView(),
                    'breadcrumbs' => $breadcrumbs,
                    'buttons' => false,
                    'searchNews' => false,
                    'filterNews' => false,
        ));
    }

    public function editNewsAction($id, Request $request) {




        //$type = $request->get('type');
        //$prop_pk  = $request->get('prop_pk');
        $em = $this->getDoctrine()->getManager();
        $suser = $this->get('security.context')->getToken()->getUser();
        $user = $em->getRepository('AppBundle:User')->find($suser->getId());


        $news = $em->getRepository('AppBundle:News')->find($id);
        $form = $this->createForm(new \Backend\SuperAdminBundle\Form\Type\NewsFormType(), $news);
        $form->handleRequest($request);


        $status_posted_id = $this->container->getParameter('status.posted');
        $status_pending_id = $this->container->getParameter('status.pending');
        $Status_post = $em->getRepository('AppBundle:Status')->find($status_posted_id);
        $Status_pend = $em->getRepository('AppBundle:Status')->find($status_pending_id);


        if ($form->isValid()) {

            $News = $form->getData();
            $em->persist($News);
            $em->flush();

            return $this->redirect($this->generateUrl('support_edit_news', array('id' => $id)));
        }

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'News', 'path' => 'support_clear_all_filters_news', 'class' => ''),
            array('name' => 'Edit', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:editNewsForm.html.twig', array(
                    'form' => $form->createView(),
                    'breadcrumbs' => $breadcrumbs,
                    'searchNews' => false,
                    'filterNews' => false,
                    'new' => $news,
                    'buttons' => false,
        ));
    }

    public function adminInquiriesAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $session = $request->getSession();

        $filtro = array(
            'searchtext' => $session->get('sasearchtextinq'),
            'status' => $session->get('sastatusinq')
        );


        $inquiries = $em->getRepository('AppBundle:Inquiry')->filterSuperAdminInquiries($filtro);
        $paginator = $this->get('knp_paginator');
        $page = 1;
        if ($request->get('page') != '') {
            $page = $this->get('request')->query->get('page');
        }

        $filter_id = '';
        $status = $request->get('sastatusinq');
        if ($status != "" && $status != null) {
            $filter_id = $status;
        }

        if ($filter_id == '1') {
            $filter = 'Active';
        } elseif ($filter_id == '2') {
            $filter = 'Inactive';
        } else {
            $filter = 'Filter';
        }


        $pagination = $paginator->paginate($inquiries, $this->get('request')->query->get('page', $page), 30);
        //$pagination->setTemplate('SuperAdminBundle:Default:sliding.html.twig');
        //$pagination->setParam('sastatus', $status);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'Inquiries', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:admin-inquiries.html.twig', array(
                    'inquiries' => $pagination,
                    'breadcrumbs' => $breadcrumbs,
                    'searchInq' => true,
                    'filterInq' => true,
                    'page' => $page,
                    'filter' => $filter,
                    'buttons' => true,
        ));
    }

    public function adminContactsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $filtro = array(
            'searchtextcontacts' => $session->get('sasearchtextcontacts'),
            'status' => $session->get('sastatuscontacts'),
            'reply' => $session->get('sareply')
        );

        $page = 1;
        if ($request->get('page') != '') {
            $page = $this->get('request')->query->get('page');
        }

        $news = $em->getRepository('AppBundle:ContactFront')->filterContacts($filtro);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($news, $this->get('request')->query->get('page', $page), 30);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'Support Contacts', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:admin-contacts.html.twig', array(
                    'contacts' => $pagination,
                    'breadcrumbs' => $breadcrumbs,
                    'page' => $page,
        ));
    }

    public function adminUserOwnerAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $filtro = array(
            'searchtextuser' => $session->get('sasearchtextusersown'),
            'status' => $session->get('sastatususerown')
        );

        $page = 1;
        if ($request->get('page') != '') {
            $page = $this->get('request')->query->get('page');
        }

        $news = $em->getRepository('AppBundle:User')->filterUsers($filtro);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($news, $this->get('request')->query->get('page', $page), 30);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'Users', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:admin-users.html.twig', array(
                    'users' => $pagination,
                    'breadcrumbs' => $breadcrumbs,
                    'page' => $page,
        ));
    }

    public function adminContactsInvestorAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $filtro = array(
            'searchtextcontacts' => $session->get('sasearchtextcontactsinv'),
            'status' => $session->get('sastatuscontactsinv')
        );

        $page = 1;
        if ($request->get('page') != '') {
            $page = $this->get('request')->query->get('page');
        }

        $news = $em->getRepository('AppBundle:ContactInvestor')->filterContacts($filtro);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($news, $this->get('request')->query->get('page', $page), 30);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'Investor Contacts', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:admin-contacts-investor.html.twig', array(
                    'contacts' => $pagination,
                    'breadcrumbs' => $breadcrumbs,
                    'page' => $page,
        ));
    }

    public function adminContactsOwnerAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $filtro = array(
            'searchtextcontacts' => $session->get('sasearchtextcontactsown'),
            'status' => $session->get('sastatuscontactsown'),
            'reply' => $session->get('sareplyown')
        );

        $page = 1;
        if ($request->get('page') != '') {
            $page = $this->get('request')->query->get('page');
        }

        $news = $em->getRepository('AppBundle:ContactOwner')->filterContacts($filtro);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($news, $this->get('request')->query->get('page', $page), 30);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'Owner Contacts', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:admin-contacts-owner.html.twig', array(
                    'contacts' => $pagination,
                    'breadcrumbs' => $breadcrumbs,
                    'page' => $page,
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
    
     function facebookDebugger($url) {

        $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v1.0/?id='. urlencode($url). '&scrape=1');
              curl_setopt($ch, CURLOPT_POST, 1);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $r = curl_exec($ch);
        return $r;

    }
    
    
    
   public function previewPropertyAction($id ,$page, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $property = $em->getRepository('AppBundle:Property')->findOneBySerie($id);
        $periodos = new ArrayCollection();
        $propertyRate = $property->getRating();
        $rating = $propertyRate->getAverage();
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
        
        
        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'Properties', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => $property->getSerie(), 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:property-preview.html.twig', array(
                    'breadcrumbs' => $breadcrumbs,
                    'page' => $page,
                    'property'=>$property,
                     'rating' => $rating,
                      'periodos' => $periodos,
        ));
    }
    
    
    public function searchReviewsAction(Request $request) {
        $session = $request->getSession();
        $searchtext = $request->get('sasearchtextreviews');
        $status = $request->get('sastatusreviews');
        $session->set('sasearchtextreviews', $searchtext);
        $session->set('sastatusreviews', $status);

        return $this->redirect($this->generateUrl('support_view_reviews'));
    }
    
          public function clearAllFiltersReviewsAction(Request $request) {

        $session = $request->getSession();


        $session->set('sasearchtextreviews', '');
        $session->set('sastatusreviews', '');


        return $this->redirect($this->generateUrl('support_view_reviews'));
    }
    
      public function clearFilterReviewsAction(Request $request) {

        $session = $request->getSession();
        $session->set('sastatusreviews', '');

        return $this->redirect($this->generateUrl('support_view_reviews'));
    }
    
    public function adminReviewsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $filtro = array(
            'searchtext' => $session->get('sasearchtextreviews'),
            'status' => $session->get('sastatusreviews')
        );

        $page = 1;
        if ($request->get('page') != '') {
            $page = $this->get('request')->query->get('page');
        }

        $news = $em->getRepository('AppBundle:Review')->filterSuperAdminReviews($filtro);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($news, $this->get('request')->query->get('page', $page), 30);

        $breadcrumbs = array(
            array('name' => 'Dashboard', 'path' => 'support_admin_homepage', 'class' => ''),
            array('name' => 'Reviews', 'path' => '', 'class' => 'active'));

        return $this->render('SupportAdminBundle:Default:admin-reviews.html.twig', array(
                    'reviews' => $pagination,
                    'breadcrumbs' => $breadcrumbs,
                    'page' => $page,
        ));
    }
    
     
      public function deleteReviewAction($id, $page) {
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository('AppBundle:Review')->find($id);
        $em->remove($review);
        $em->flush();

        return $this->redirect($this->generateUrl('support_view_reviews', array('page' => $page)));
    }
    
    
    public function activateReviewAction($id, $page) {
        
        
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository('AppBundle:Review')->find($id);
        $status_active_id = $this->container->getParameter('status.posted');
        $Status_active = $em->getRepository('AppBundle:Status')->find($status_active_id);
        $review->setStatus($Status_active);
        
        if ($review->getDatePosted() == null || $review->getDatePosted() == '') {
            $review->setDatePosted(new \DateTime);
        }
        
        
        $propertyRate = $review->getProperty()->getRating();
        $propertyRate->setTotalCount($propertyRate->getTotalCount() + 1);
        $propertyRate->setTotalRate($propertyRate->getTotalRate() + $review->getValoration());
        $propertyRate->setAverage($propertyRate->calcAverage());
        $em->persist($propertyRate);
        
        $em->persist($review);
        $em->flush();
       
        
        
         return $this->redirect($this->generateUrl('support_view_reviews', array('page' => $page)));
    }
    
    
     public function deactivateReviewAction($id, $page) {
        
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository('AppBundle:Review')->find($id);
        $status_inactive_id = $this->container->getParameter('status.pending');
        $Status_inactive = $em->getRepository('AppBundle:Status')->find($status_inactive_id);
        $review->setStatus($Status_inactive);
        
        $propertyRate = $review->getProperty()->getRating();
        $propertyRate->setTotalCount($propertyRate->getTotalCount() - 1);
        $propertyRate->setTotalRate($propertyRate->getTotalRate() - $review->getValoration());
        
        if($propertyRate->getTotalCount() > 0){
        $propertyRate->setAverage($propertyRate->calcAverage());
        }else {
        $propertyRate->setAverage(0);    
        }
        $em->persist($propertyRate);
        
        $em->persist($review);
        $em->flush();
       
        return $this->redirect($this->generateUrl('support_view_reviews', array('page' => $page)));
    }
    

}
