<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // shopper_page
        if (rtrim($pathinfo, '/') === '/myaccount') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'shopper_page');
            }

            return array (  '_controller' => 'Backend\\ShopperBundle\\Controller\\DefaultController::indexAction',  '_route' => 'shopper_page',);
        }

        // add_carsaved_to_user
        if (rtrim($pathinfo, '/') === '/addsavecartouser') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'add_carsaved_to_user');
            }

            return array (  '_controller' => 'Backend\\ShopperBundle\\Controller\\DefaultController::addCarToUserAction',  '_route' => 'add_carsaved_to_user',);
        }

        // remove_carsaved_in_user
        if (rtrim($pathinfo, '/') === '/removesavedcarinuser') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'remove_carsaved_in_user');
            }

            return array (  '_controller' => 'Backend\\ShopperBundle\\Controller\\DefaultController::removeCarSavedAction',  '_route' => 'remove_carsaved_in_user',);
        }

        // update_carsaved_in_user
        if (rtrim($pathinfo, '/') === '/updatesavedcarinuser') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'update_carsaved_in_user');
            }

            return array (  '_controller' => 'Backend\\ShopperBundle\\Controller\\DefaultController::updateCarSavedAction',  '_route' => 'update_carsaved_in_user',);
        }

        // printsavedcars
        if (rtrim($pathinfo, '/') === '/getpdf') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'printsavedcars');
            }

            return array (  '_controller' => 'Backend\\ShopperBundle\\Controller\\DefaultController::getPdfPageAction',  '_route' => 'printsavedcars',);
        }

        if (0 === strpos($pathinfo, '/secured')) {
            // admin_user_homepage
            if (rtrim($pathinfo, '/') === '/secured') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_user_homepage');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'admin_user_homepage',);
            }

            // admin_user_dashboard
            if (rtrim($pathinfo, '/') === '/secured/dashboard') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_user_dashboard');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALManageDashBoardController::dashboardAction',  '_route' => 'admin_user_dashboard',);
            }

            // admin_wrong_area
            if (rtrim($pathinfo, '/') === '/secured/wrongarea') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_wrong_area');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::wrongAreaAction',  '_route' => 'admin_wrong_area',);
            }

        }

        // fos_create_user
        if (rtrim($pathinfo, '/') === '/register') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fos_create_user');
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_create_user',);
        }

        if (0 === strpos($pathinfo, '/secured')) {
            // admin_router
            if (rtrim($pathinfo, '/') === '/secured/router') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_router');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::routerAction',  '_route' => 'admin_router',);
            }

            if (0 === strpos($pathinfo, '/secured/inquiries')) {
                // admin_user_inquiries
                if (preg_match('#^/secured/inquiries/(?P<id>[^/]++)/(?P<filtro>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_inquiries')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::inquiriesAction',));
                }

                // admin_user_inquiries_detail
                if (preg_match('#^/secured/inquiries/(?P<prop_pk>[^/]++)/detail/(?P<id>[^/]++)/(?P<filtro>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_inquiries_detail')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::inquiriesDetailAction',));
                }

            }

            if (0 === strpos($pathinfo, '/secured/news')) {
                // admin_user_personal
                if (preg_match('#^/secured/news/(?P<filtro>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_personal')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::personalInfoAction',));
                }

                // admin_news_detail
                if (0 === strpos($pathinfo, '/secured/news/detail') && preg_match('#^/secured/news/detail/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_news_detail')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::newsDetailAction',));
                }

            }

            if (0 === strpos($pathinfo, '/secured/reservation')) {
                // admin_user_reservations
                if (0 === strpos($pathinfo, '/secured/reservations') && preg_match('#^/secured/reservations/(?P<id>[^/]++)/(?P<filtro>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_reservations')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::reservationsAction',));
                }

                // create_reservation_owner
                if (0 === strpos($pathinfo, '/secured/reservation/create') && preg_match('#^/secured/reservation/create/(?P<id>[^/]++)/(?P<filtro>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_reservation_owner')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createReservationAction',));
                }

            }

            // create_reservation_calendar
            if ($pathinfo === '/secured/calendar/reservation/create') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createReservationCalendarAction',  '_route' => 'create_reservation_calendar',);
            }

            // create_reservation_inquiry
            if ($pathinfo === '/secured/inquiry/reservation/create') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createReservationInquiryAction',  '_route' => 'create_reservation_inquiry',);
            }

            // edit_reservation
            if (0 === strpos($pathinfo, '/secured/reservation/edit') && preg_match('#^/secured/reservation/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_reservation')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editReservationAction',));
            }

            if (0 === strpos($pathinfo, '/secured/inquiry')) {
                // reply_inquiry_form
                if (0 === strpos($pathinfo, '/secured/inquiry/form') && preg_match('#^/secured/inquiry/form/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'reply_inquiry_form')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::replyInquiryFormAction',));
                }

                // reply_inquiry_list_form
                if (0 === strpos($pathinfo, '/secured/inquiry/list/form') && preg_match('#^/secured/inquiry/list/form/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'reply_inquiry_list_form')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::replyInquiryListFormAction',));
                }

                // book_inquiry_form
                if (0 === strpos($pathinfo, '/secured/inquiry/book') && preg_match('#^/secured/inquiry/book/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'book_inquiry_form')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::bookInquiryFormAction',));
                }

            }

            if (0 === strpos($pathinfo, '/secured/calendar')) {
                // admin_user_calendar
                if (preg_match('#^/secured/calendar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_calendar')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::calendarAction',));
                }

                // admin_user_calendar_month
                if (0 === strpos($pathinfo, '/secured/calendarmonth') && preg_match('#^/secured/calendarmonth/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_calendar_month')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::calendarMonthAction',));
                }

            }

            if (0 === strpos($pathinfo, '/secured/review')) {
                // admin_user_reviews
                if (0 === strpos($pathinfo, '/secured/reviews') && preg_match('#^/secured/reviews/(?P<id>[^/]++)/(?P<filtro>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_user_reviews');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_reviews')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::reviewsAction',));
                }

                // edit_review
                if (0 === strpos($pathinfo, '/secured/review/edit') && preg_match('#^/secured/review/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_review')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editReviewAction',));
                }

            }

            // edit_user_profile
            if (0 === strpos($pathinfo, '/secured/account/edit') && preg_match('#^/secured/account/edit/(?P<uid>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_user_profile')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editUserProfileAction',));
            }

            // admin_user_settings
            if (rtrim($pathinfo, '/') === '/secured/settings') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_user_settings');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::settingsAction',  '_route' => 'admin_user_settings',);
            }

            // admin_user_account
            if (rtrim($pathinfo, '/') === '/secured/account') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_user_account');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::accountAction',  '_route' => 'admin_user_account',);
            }

            // admin_user_tools
            if (rtrim($pathinfo, '/') === '/secured/tools') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_user_tools');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::toolsAction',  '_route' => 'admin_user_tools',);
            }

            // editPropertyHome
            if (0 === strpos($pathinfo, '/secured/property') && preg_match('#^/secured/property/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'editPropertyHome')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::dashboardAction',));
            }

            // listProperties
            if (0 === strpos($pathinfo, '/secured/listing') && preg_match('#^/secured/listing/(?P<id>[^/]++)/(?P<path>[^/]++)/(?P<root>[^/]++)(?:/(?P<param>[^/]++)(?:/(?P<type>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'listProperties')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::listPropertiesAction',  'param' => NULL,  'type' => NULL,));
            }

            if (0 === strpos($pathinfo, '/secured/pro')) {
                if (0 === strpos($pathinfo, '/secured/property')) {
                    // addProperty
                    if (rtrim($pathinfo, '/') === '/secured/property/add') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'addProperty');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::addPropertyAction',  '_route' => 'addProperty',);
                    }

                    // property_edit_list
                    if (rtrim($pathinfo, '/') === '/secured/property/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'property_edit_list');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::listingAction',  '_route' => 'property_edit_list',);
                    }

                    // property_inquiries_list
                    if (rtrim($pathinfo, '/') === '/secured/property/inquiries/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'property_inquiries_list');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::listingInquiriesAction',  '_route' => 'property_inquiries_list',);
                    }

                    // property_reservations_list
                    if (rtrim($pathinfo, '/') === '/secured/property/reservations/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'property_reservations_list');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::listingReservationsAction',  '_route' => 'property_reservations_list',);
                    }

                    // property_calendar_list
                    if (rtrim($pathinfo, '/') === '/secured/property/calendar/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'property_calendar_list');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::listingCalendarAction',  '_route' => 'property_calendar_list',);
                    }

                    // property_deactivate_list
                    if (rtrim($pathinfo, '/') === '/secured/property/deactivate/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'property_deactivate_list');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::listingDeactivateAction',  '_route' => 'property_deactivate_list',);
                    }

                    // property_reviews_list
                    if (rtrim($pathinfo, '/') === '/secured/property/reviews/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'property_reviews_list');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::listingReviewsAction',  '_route' => 'property_reviews_list',);
                    }

                }

                if (0 === strpos($pathinfo, '/secured/profile')) {
                    // create_property
                    if (0 === strpos($pathinfo, '/secured/profile/details/create') && preg_match('#^/secured/profile/details/create/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createPropertyAction',));
                    }

                    // createDealerMobile
                    if (0 === strpos($pathinfo, '/secured/profile/create') && preg_match('#^/secured/profile/create/(?P<type>[^/\\-]++)\\-(?P<step>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'createDealerMobile')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALController::createDealerMobileAction',  'type' => 'save',));
                    }

                    // set_description
                    if (0 === strpos($pathinfo, '/secured/profile/details/edit') && preg_match('#^/secured/profile/details/edit/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'set_description')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALController::descriptionAction',));
                    }

                    // set_location
                    if (0 === strpos($pathinfo, '/secured/profile/location/edit') && preg_match('#^/secured/profile/location/edit/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'set_location')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALController::locationAction',));
                    }

                    // set_amenities
                    if (0 === strpos($pathinfo, '/secured/profile/amenities/edit') && preg_match('#^/secured/profile/amenities/edit/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'set_amenities')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALController::services_amenitiesAction',));
                    }

                    // set_feeds
                    if (0 === strpos($pathinfo, '/secured/profile/feeds/edit') && preg_match('#^/secured/profile/feeds/edit/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'set_feeds')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALController::feedsAction',));
                    }

                    // set_gallery
                    if (0 === strpos($pathinfo, '/secured/profile/gallery/edit') && preg_match('#^/secured/profile/gallery/edit/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'set_gallery')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALController::galleryAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/secured/property')) {
                    if (0 === strpos($pathinfo, '/secured/property/upload-multiple')) {
                        // upload_multiple
                        if (preg_match('#^/secured/property/upload\\-multiple/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_multiple')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALController::uploadMultipleAction',));
                        }

                        // upload_multiple_vehicle
                        if (0 === strpos($pathinfo, '/secured/property/upload-multiple-vehicles-images') && preg_match('#^/secured/property/upload\\-multiple\\-vehicles\\-images/(?P<prop_pk>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'upload_multiple_vehicle')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::uploadMultipleVehicleImagesAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/secured/property/location')) {
                        // create_location_property
                        if (0 === strpos($pathinfo, '/secured/property/location/create') && preg_match('#^/secured/property/location/create/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_location_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createLocationPropertyAction',));
                        }

                        // edit_location_property
                        if (0 === strpos($pathinfo, '/secured/property/location/edit') && preg_match('#^/secured/property/location/edit/(?P<type>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_location_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editLocationPropertyAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/secured/property/amenities')) {
                        // create_amenities_property
                        if (0 === strpos($pathinfo, '/secured/property/amenities/create') && preg_match('#^/secured/property/amenities/create/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_amenities_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createAmenitiesPropertyAction',));
                        }

                        // edit_amenities_property
                        if (0 === strpos($pathinfo, '/secured/property/amenities/edit') && preg_match('#^/secured/property/amenities/edit/(?P<type>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_amenities_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editAmenitiesPropertyAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/secured/property/policies')) {
                        // create_policies_property
                        if (0 === strpos($pathinfo, '/secured/property/policies/create') && preg_match('#^/secured/property/policies/create/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_policies_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createPoliciesPropertyAction',));
                        }

                        // edit_policies_property
                        if (0 === strpos($pathinfo, '/secured/property/policies/edit') && preg_match('#^/secured/property/policies/edit/(?P<type>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_policies_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editPoliciesPropertyAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/secured/property/rates')) {
                        // create_rates_property
                        if (0 === strpos($pathinfo, '/secured/property/rates/create') && preg_match('#^/secured/property/rates/create/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_rates_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createRatesPropertyAction',));
                        }

                        // edit_rates_property
                        if (0 === strpos($pathinfo, '/secured/property/rates/edit') && preg_match('#^/secured/property/rates/edit/(?P<type>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_rates_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editRatesPropertyAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/secured/property/calendar')) {
                        // create_calendar_property
                        if (0 === strpos($pathinfo, '/secured/property/calendar/create') && preg_match('#^/secured/property/calendar/create/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_calendar_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createCalendarPropertyAction',));
                        }

                        // edit_calendar_property
                        if (0 === strpos($pathinfo, '/secured/property/calendar/edit') && preg_match('#^/secured/property/calendar/edit/(?P<type>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_calendar_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editCalendarPropertyAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/secured/property/gallery')) {
                        // create_gallery_property
                        if (0 === strpos($pathinfo, '/secured/property/gallery/create') && preg_match('#^/secured/property/gallery/create/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_gallery_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::createGalleryPropertyAction',));
                        }

                        // edit_gallery_property
                        if (0 === strpos($pathinfo, '/secured/property/gallery/edit') && preg_match('#^/secured/property/gallery/edit/(?P<type>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_gallery_property')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editGalleryPropertyAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/secured/profile/vehicle/edit')) {
                    // create_vehicle_basic_info
                    if (0 === strpos($pathinfo, '/secured/profile/vehicle/edit/information') && preg_match('#^/secured/profile/vehicle/edit/information/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'create_vehicle_basic_info')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::vehicleInformatcionAction',));
                    }

                    // vehicle_options
                    if (0 === strpos($pathinfo, '/secured/profile/vehicle/edit/options') && preg_match('#^/secured/profile/vehicle/edit/options/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_options')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::vehicleOptionsAction',));
                    }

                    // vehicle_seller_comments
                    if (0 === strpos($pathinfo, '/secured/profile/vehicle/edit/sellers') && preg_match('#^/secured/profile/vehicle/edit/sellers/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_seller_comments')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::vehicleSellerCommentsAction',));
                    }

                    // vehicle_warranty
                    if (0 === strpos($pathinfo, '/secured/profile/vehicle/edit/warranty') && preg_match('#^/secured/profile/vehicle/edit/warranty/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_warranty')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::vehicleWarrantyAction',));
                    }

                    // vehicle_gallery
                    if (0 === strpos($pathinfo, '/secured/profile/vehicle/edit/gallery') && preg_match('#^/secured/profile/vehicle/edit/gallery/(?P<type>[^/]++)/(?P<prop_pk>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'vehicle_gallery')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::vehicleGalleryAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/secured/inquiry')) {
                if (0 === strpos($pathinfo, '/secured/inquiry/reply')) {
                    // reply_form
                    if (0 === strpos($pathinfo, '/secured/inquiry/reply/form') && preg_match('#^/secured/inquiry/reply/form/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'reply_form')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::replyFormAction',));
                    }

                    // save_inquiry_reply
                    if ($pathinfo === '/secured/inquiry/reply/save') {
                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::saveInquiryReplyAction',  '_route' => 'save_inquiry_reply',);
                    }

                }

                // update_new_inquiry
                if (rtrim($pathinfo, '/') === '/secured/inquiry/update') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'update_new_inquiry');
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::updateNewInquiryAction',  '_route' => 'update_new_inquiry',);
                }

            }

            // update_new_review
            if (rtrim($pathinfo, '/') === '/secured/review/update') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'update_new_review');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::updateNewReviewAction',  '_route' => 'update_new_review',);
            }

            // save_inquiry_note
            if ($pathinfo === '/secured/inquiry/note/save') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::saveInquiryNoteAction',  '_route' => 'save_inquiry_note',);
            }

            // save_review_reply
            if ($pathinfo === '/secured/review/reply/save') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::saveReviewReplyAction',  '_route' => 'save_review_reply',);
            }

            if (0 === strpos($pathinfo, '/secured/property')) {
                // calendar_reservations
                if (rtrim($pathinfo, '/') === '/secured/property/reserved') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'calendar_reservations');
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::getreservedDaysAction',  '_route' => 'calendar_reservations',);
                }

                // generate_form
                if (0 === strpos($pathinfo, '/secured/property/edit') && preg_match('#^/secured/property/edit/(?P<type>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'generate_form')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::generateFormAction',));
                }

            }

            if (0 === strpos($pathinfo, '/secured/inquiry')) {
                // inquiry_notes
                if (0 === strpos($pathinfo, '/secured/inquiry/notes') && preg_match('#^/secured/inquiry/notes/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'inquiry_notes')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::notesAction',));
                }

                // inquiry_replys
                if (0 === strpos($pathinfo, '/secured/inquiry/replys') && preg_match('#^/secured/inquiry/replys/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'inquiry_replys')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::replysAction',));
                }

            }

            if (0 === strpos($pathinfo, '/secured/pro')) {
                if (0 === strpos($pathinfo, '/secured/profile')) {
                    // create_user_request
                    if (rtrim($pathinfo, '/') === '/secured/profile/deactivate/request') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'create_user_request');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALManageDashBoardController::createUserRequestAction',  '_route' => 'create_user_request',);
                    }

                    if (0 === strpos($pathinfo, '/secured/profile/find')) {
                        if (0 === strpos($pathinfo, '/secured/profile/find/m')) {
                            // find_makes_by_year
                            if (rtrim($pathinfo, '/') === '/secured/profile/find/makes') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'find_makes_by_year');
                                }

                                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::findMakesAction',  '_route' => 'find_makes_by_year',);
                            }

                            // find_models_by_make
                            if (rtrim($pathinfo, '/') === '/secured/profile/find/models') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'find_models_by_make');
                                }

                                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::findModelsAction',  '_route' => 'find_models_by_make',);
                            }

                        }

                        // find_trims_by_model
                        if (rtrim($pathinfo, '/') === '/secured/profile/find/trims') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'find_trims_by_model');
                            }

                            return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::findTrimsAction',  '_route' => 'find_trims_by_model',);
                        }

                        // set_trims_session
                        if (rtrim($pathinfo, '/') === '/secured/profile/find/set_trims') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'set_trims_session');
                            }

                            return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::SetTrimSessionAction',  '_route' => 'set_trims_session',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/secured/property/edit/country/regions')) {
                    // find_regions
                    if (rtrim($pathinfo, '/') === '/secured/property/edit/country/regions') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'find_regions');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::findRegionsAction',  '_route' => 'find_regions',);
                    }

                    // find_cities
                    if (rtrim($pathinfo, '/') === '/secured/property/edit/country/regions/cities') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'find_cities');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::findCitiesAction',  '_route' => 'find_cities',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/secured/reservation/c')) {
                // confirm_reservation
                if (rtrim($pathinfo, '/') === '/secured/reservation/confirm') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'confirm_reservation');
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::confirmReservationAction',  '_route' => 'confirm_reservation',);
                }

                // cancel_reservation
                if (rtrim($pathinfo, '/') === '/secured/reservation/cancel') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'cancel_reservation');
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::cancelReservationAction',  '_route' => 'cancel_reservation',);
                }

                // contact_reservation_guest
                if (rtrim($pathinfo, '/') === '/secured/reservation/contact') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'contact_reservation_guest');
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::contactReservationGuestAction',  '_route' => 'contact_reservation_guest',);
                }

            }

            // contact_owner_support
            if (rtrim($pathinfo, '/') === '/secured/owner/contact') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'contact_owner_support');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::contactOwnerSupportAction',  '_route' => 'contact_owner_support',);
            }

            if (0 === strpos($pathinfo, '/secured/property')) {
                if (0 === strpos($pathinfo, '/secured/property/user/contact')) {
                    // contact_form
                    if ($pathinfo === '/secured/property/user/contact') {
                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::contactFormAction',  '_route' => 'contact_form',);
                    }

                    // edit_contact_form
                    if (0 === strpos($pathinfo, '/secured/property/user/contact/edit') && preg_match('#^/secured/property/user/contact/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_contact_form')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::contactEditFormAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/secured/property/period')) {
                    // period_form
                    if ($pathinfo === '/secured/property/period/add') {
                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::periodFormAction',  '_route' => 'period_form',);
                    }

                    // edit_period_form
                    if (rtrim($pathinfo, '/') === '/secured/property/period/edit') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'edit_period_form');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editPeriodFormAction',  '_route' => 'edit_period_form',);
                    }

                }

                // edit_period_standard_form
                if (rtrim($pathinfo, '/') === '/secured/property/standardperiod/edit') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'edit_period_standard_form');
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::editPeriodStandardFormAction',  '_route' => 'edit_period_standard_form',);
                }

                // delete_period
                if (rtrim($pathinfo, '/') === '/secured/property/period/edit/delete') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'delete_period');
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::deletePeriodAction',  '_route' => 'delete_period',);
                }

                if (0 === strpos($pathinfo, '/secured/property/gallery/image')) {
                    // save_image
                    if (rtrim($pathinfo, '/') === '/secured/property/gallery/image/save') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'save_image');
                        }

                        return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::saveImageAction',  '_route' => 'save_image',);
                    }

                    if (0 === strpos($pathinfo, '/secured/property/gallery/image/form')) {
                        // new_image_form
                        if ($pathinfo === '/secured/property/gallery/image/form/new') {
                            return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::newImageFormAction',  '_route' => 'new_image_form',);
                        }

                        // image_multiple_form
                        if ($pathinfo === '/secured/property/gallery/image/form/multiple') {
                            return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::newImageMultipleFormAction',  '_route' => 'image_multiple_form',);
                        }

                    }

                }

            }

        }

        // verify_profile_tab
        if ($pathinfo === '/verify-tab') {
            return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALController::verifyTabAction',  '_route' => 'verify_profile_tab',);
        }

        if (0 === strpos($pathinfo, '/secured')) {
            if (0 === strpos($pathinfo, '/secured/pr')) {
                if (0 === strpos($pathinfo, '/secured/profile')) {
                    if (0 === strpos($pathinfo, '/secured/profile/view')) {
                        // profile_view
                        if (preg_match('#^/secured/profile/view/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'profile_view')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALManageDashBoardController::renderDealerInformationAction',));
                        }

                        // dealer_vehicles_content
                        if (0 === strpos($pathinfo, '/secured/profile/view/vehicles/content') && preg_match('#^/secured/profile/view/vehicles/content/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'dealer_vehicles_content')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::dealerVehiclescontentAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/secured/profile/dealer_imbox')) {
                        // dealer_imbox
                        if (preg_match('#^/secured/profile/dealer_imbox/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'dealer_imbox')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALManageDashBoardController::dealerImboxAction',));
                        }

                        // dealer_imbox_load
                        if ($pathinfo === '/secured/profile/dealer_imbox_load') {
                            return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALManageDashBoardController::dealerImboxLoadAction',  '_route' => 'dealer_imbox_load',);
                        }

                    }

                    // email_content
                    if (0 === strpos($pathinfo, '/secured/profile/email_content') && preg_match('#^/secured/profile/email_content/(?P<mail_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'email_content')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALManageDashBoardController::emailContentAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/secured/private')) {
                    // private_add_car
                    if (0 === strpos($pathinfo, '/secured/private/add-car') && preg_match('#^/secured/private/add\\-car/(?P<type>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_add_car')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::addCarAction',));
                    }

                    if (0 === strpos($pathinfo, '/secured/private/v')) {
                        // user_vehicles_content
                        if (0 === strpos($pathinfo, '/secured/private/view/vehicles/content') && preg_match('#^/secured/private/view/vehicles/content/(?P<user_id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_vehicles_content')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::userVehiclescontentAction',));
                        }

                        if (0 === strpos($pathinfo, '/secured/private/vehicle/edit')) {
                            // private_create_vehicle_basic_info
                            if (preg_match('#^/secured/private/vehicle/edit/(?P<type>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_create_vehicle_basic_info')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\VehicleController::vehicleInformatcionAction',));
                            }

                            // private_vehicle_options
                            if (0 === strpos($pathinfo, '/secured/private/vehicle/edit/options') && preg_match('#^/secured/private/vehicle/edit/options/(?P<type>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_vehicle_options')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\VehicleController::vehicleOptionsAction',));
                            }

                            // private_vehicle_gallery
                            if (0 === strpos($pathinfo, '/secured/private/vehicle/edit/gallery') && preg_match('#^/secured/private/vehicle/edit/gallery/(?P<type>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_vehicle_gallery')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\VehicleController::vehicleGalleryAction',));
                            }

                            // private_vehicle_seller_comments
                            if (0 === strpos($pathinfo, '/secured/private/vehicle/edit/sellers') && preg_match('#^/secured/private/vehicle/edit/sellers/(?P<type>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_vehicle_seller_comments')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\VehicleController::vehicleSellerCommentsAction',));
                            }

                            // private_vehicle_warranty
                            if (0 === strpos($pathinfo, '/secured/private/vehicle/edit/warranty') && preg_match('#^/secured/private/vehicle/edit/warranty/(?P<type>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_vehicle_warranty')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\VehicleController::vehicleWarrantyAction',));
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/secured/private/gallery/image')) {
                        // private_new_image_form
                        if ($pathinfo === '/secured/private/gallery/image/form/new') {
                            return array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\VehicleController::newImageFormAction',  '_route' => 'private_new_image_form',);
                        }

                        // private_save_image
                        if (rtrim($pathinfo, '/') === '/secured/private/gallery/image/save') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'private_save_image');
                            }

                            return array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\VehicleController::saveImageAction',  '_route' => 'private_save_image',);
                        }

                    }

                    // private_upload_multiple_vehicle
                    if (0 === strpos($pathinfo, '/secured/private/upload-multiple-vehicles-images') && preg_match('#^/secured/private/upload\\-multiple\\-vehicles\\-images/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_upload_multiple_vehicle')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\VehicleController::uploadMultipleVehicleImagesAction',));
                    }

                }

                // my_account
                if (rtrim($pathinfo, '/') === '/secured/profile/my-account') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'my_account');
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::myAccountAction',  '_route' => 'my_account',);
                }

                if (0 === strpos($pathinfo, '/secured/private')) {
                    // user_imbox
                    if (0 === strpos($pathinfo, '/secured/private/user_inbox') && preg_match('#^/secured/private/user_inbox/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_imbox')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::userImboxAction',));
                    }

                    // user_email_content
                    if (0 === strpos($pathinfo, '/secured/private/email_content') && preg_match('#^/secured/private/email_content/(?P<mail_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_email_content')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::emailContentAction',));
                    }

                }

            }

            // car_details_dashboard
            if (0 === strpos($pathinfo, '/secured/dashboard/car/detail') && preg_match('#^/secured/dashboard/car/detail/(?P<serie>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'car_details_dashboard')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\FALManageDashBoardController::renderCarDetailsAction',));
            }

            // private_car_details_dashboard
            if (0 === strpos($pathinfo, '/secured/private/dashboard/car/detail') && preg_match('#^/secured/private/dashboard/car/detail/(?P<serie>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_car_details_dashboard')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::renderCarDetailsAction',));
            }

            // delete_vehicle_profile
            if (0 === strpos($pathinfo, '/secured/dashboard/car/delete') && preg_match('#^/secured/dashboard/car/delete/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_vehicle_profile')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\VehicleController::deleteVehicleProfileAction',));
            }

            if (0 === strpos($pathinfo, '/secured/pr')) {
                // private_saved_cars
                if (rtrim($pathinfo, '/') === '/secured/private/saved/cars') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'private_saved_cars');
                    }

                    return array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::savedCarsAction',  '_route' => 'private_saved_cars',);
                }

                // dealer_reviews
                if (0 === strpos($pathinfo, '/secured/profile/reviews') && preg_match('#^/secured/profile/reviews/(?P<prop_pk>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'dealer_reviews')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::profileReviewsAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/protected')) {
            if (0 === strpos($pathinfo, '/protected/admin')) {
                // admin_admin_homepage
                if (rtrim($pathinfo, '/') === '/protected/admin') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_admin_homepage');
                    }

                    return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminAction',  '_route' => 'admin_admin_homepage',);
                }

                // admin_view_properties
                if (rtrim($pathinfo, '/') === '/protected/admin/properties') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_view_properties');
                    }

                    return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminPropertiesAction',  '_route' => 'admin_view_properties',);
                }

                // admin_edit_user
                if (0 === strpos($pathinfo, '/protected/admin/users') && preg_match('#^/protected/admin/users/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_edit_user')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::user_editAction',));
                }

                // admin_edit_property
                if (0 === strpos($pathinfo, '/protected/admin/property') && preg_match('#^/protected/admin/property/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_edit_property')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::property_editAction',));
                }

                if (0 === strpos($pathinfo, '/protected/admin/users')) {
                    // admin_add_user
                    if (rtrim($pathinfo, '/') === '/protected/admin/users/add') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_add_user');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::add_userAction',  '_route' => 'admin_add_user',);
                    }

                    // admin_create_user
                    if (rtrim($pathinfo, '/') === '/protected/admin/users/create') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_create_user');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::create_userAction',  '_route' => 'admin_create_user',);
                    }

                    // admin_admin_users
                    if (rtrim($pathinfo, '/') === '/protected/admin/users') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_admin_users');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::usersAction',  '_route' => 'admin_admin_users',);
                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/propert')) {
                    if (0 === strpos($pathinfo, '/protected/admin/property')) {
                        // admin_activate_property
                        if (0 === strpos($pathinfo, '/protected/admin/property/activate') && preg_match('#^/protected/admin/property/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_activate_property');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_activate_property')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::activatePropertyAction',));
                        }

                        // admin_deactivate_property
                        if (0 === strpos($pathinfo, '/protected/admin/property/deactivate') && preg_match('#^/protected/admin/property/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_deactivate_property');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deactivate_property')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deactivatePropertyAction',));
                        }

                        // admin_activate_property_featured
                        if (0 === strpos($pathinfo, '/protected/admin/property/activatefeatured') && preg_match('#^/protected/admin/property/activatefeatured/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_activate_property_featured');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_activate_property_featured')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::activateFeaturedPropertyAction',));
                        }

                        // admin_deactivate_property_featured
                        if (0 === strpos($pathinfo, '/protected/admin/property/deactivatefeatured') && preg_match('#^/protected/admin/property/deactivatefeatured/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_deactivate_property_featured');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deactivate_property_featured')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deactivateFeaturedPropertyAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/protected/admin/properties')) {
                        // admin_delete_property
                        if (0 === strpos($pathinfo, '/protected/admin/properties/delete') && preg_match('#^/protected/admin/properties/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_delete_property');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_property')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deletePropertyAction',));
                        }

                        // admin_preview_property
                        if (0 === strpos($pathinfo, '/protected/admin/properties/preview') && preg_match('#^/protected/admin/properties/preview/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_preview_property');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_preview_property')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::previewPropertyAction',));
                        }

                    }

                }

            }

            // super_admin_router
            if (rtrim($pathinfo, '/') === '/protected/router') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'super_admin_router');
                }

                return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::routerAction',  '_route' => 'super_admin_router',);
            }

            if (0 === strpos($pathinfo, '/protected/admin')) {
                if (0 === strpos($pathinfo, '/protected/admin/properties')) {
                    // super_admin_search
                    if (rtrim($pathinfo, '/') === '/protected/admin/properties/search') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'super_admin_search');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchAction',  '_route' => 'super_admin_search',);
                    }

                    if (0 === strpos($pathinfo, '/protected/admin/properties/clear/filter')) {
                        // clear_all_filters
                        if (rtrim($pathinfo, '/') === '/protected/admin/properties/clear/filters') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'clear_all_filters');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersAction',  '_route' => 'clear_all_filters',);
                        }

                        // clear_filter
                        if (rtrim($pathinfo, '/') === '/protected/admin/properties/clear/filter') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'clear_filter');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterAction',  '_route' => 'clear_filter',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/news')) {
                    // list_news
                    if (rtrim($pathinfo, '/') === '/protected/admin/news/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'list_news');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::listNewsAction',  '_route' => 'list_news',);
                    }

                    // create_news
                    if (rtrim($pathinfo, '/') === '/protected/admin/news/create') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'create_news');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::createNewsAction',  '_route' => 'create_news',);
                    }

                    // edit_news
                    if (0 === strpos($pathinfo, '/protected/admin/news/edit') && preg_match('#^/protected/admin/news/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'edit_news');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_news')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::editNewsAction',));
                    }

                    // admin_activate_news
                    if (0 === strpos($pathinfo, '/protected/admin/news/activate') && preg_match('#^/protected/admin/news/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_activate_news');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_activate_news')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::activateNewsAction',));
                    }

                    if (0 === strpos($pathinfo, '/protected/admin/news/de')) {
                        // admin_deactivate_news
                        if (0 === strpos($pathinfo, '/protected/admin/news/deactivate') && preg_match('#^/protected/admin/news/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_deactivate_news');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deactivate_news')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deactivateNewsAction',));
                        }

                        // admin_delete_news
                        if (0 === strpos($pathinfo, '/protected/admin/news/delete') && preg_match('#^/protected/admin/news/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_delete_news');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_news')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteNewsAction',));
                        }

                    }

                    // super_admin_news_search
                    if (rtrim($pathinfo, '/') === '/protected/admin/news/search') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'super_admin_news_search');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchNewsAction',  '_route' => 'super_admin_news_search',);
                    }

                    if (0 === strpos($pathinfo, '/protected/admin/news/clear/filter')) {
                        // clear_all_filters_news
                        if (rtrim($pathinfo, '/') === '/protected/admin/news/clear/filters') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'clear_all_filters_news');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersNewsAction',  '_route' => 'clear_all_filters_news',);
                        }

                        // clear_filter_news
                        if (rtrim($pathinfo, '/') === '/protected/admin/news/clear/filter') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'clear_filter_news');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterNewsAction',  '_route' => 'clear_filter_news',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/inquiries')) {
                    // admin_view_inquiries
                    if (rtrim($pathinfo, '/') === '/protected/admin/inquiries') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_view_inquiries');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminInquiriesAction',  '_route' => 'admin_view_inquiries',);
                    }

                    // super_admin_inquiries_search
                    if (rtrim($pathinfo, '/') === '/protected/admin/inquiries/search') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'super_admin_inquiries_search');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchInquiriesAction',  '_route' => 'super_admin_inquiries_search',);
                    }

                    if (0 === strpos($pathinfo, '/protected/admin/inquiries/clear/filter')) {
                        // clear_all_filters_inquiries
                        if (rtrim($pathinfo, '/') === '/protected/admin/inquiries/clear/filters') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'clear_all_filters_inquiries');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersInquiriesAction',  '_route' => 'clear_all_filters_inquiries',);
                        }

                        // clear_filter_inquiries
                        if (rtrim($pathinfo, '/') === '/protected/admin/inquiries/clear/filter') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'clear_filter_inquiries');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterInquiriesAction',  '_route' => 'clear_filter_inquiries',);
                        }

                    }

                    // admin_delete_inquiry
                    if (0 === strpos($pathinfo, '/protected/admin/inquiries/delete') && preg_match('#^/protected/admin/inquiries/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_delete_inquiry');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_inquiry')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteInquiryAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/contact')) {
                    if (0 === strpos($pathinfo, '/protected/admin/contacts')) {
                        // admin_view_contacts
                        if (rtrim($pathinfo, '/') === '/protected/admin/contacts') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_view_contacts');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminContactsAction',  '_route' => 'admin_view_contacts',);
                        }

                        // super_admin_contacts_search
                        if (rtrim($pathinfo, '/') === '/protected/admin/contacts/search') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'super_admin_contacts_search');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchContactsAction',  '_route' => 'super_admin_contacts_search',);
                        }

                        if (0 === strpos($pathinfo, '/protected/admin/contacts/clear/filter')) {
                            // clear_all_filters_contacts
                            if (rtrim($pathinfo, '/') === '/protected/admin/contacts/clear/filters') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'clear_all_filters_contacts');
                                }

                                return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersContactsAction',  '_route' => 'clear_all_filters_contacts',);
                            }

                            // clear_filter_contacts
                            if (rtrim($pathinfo, '/') === '/protected/admin/contacts/clear/filter') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'clear_filter_contacts');
                                }

                                return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterContactsAction',  '_route' => 'clear_filter_contacts',);
                            }

                        }

                        // admin_delete_contacts
                        if (0 === strpos($pathinfo, '/protected/admin/contacts/delete') && preg_match('#^/protected/admin/contacts/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_delete_contacts');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_contacts')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteContactsAction',));
                        }

                        // admin_open_contact_ticket
                        if (0 === strpos($pathinfo, '/protected/admin/contacts/open') && preg_match('#^/protected/admin/contacts/open/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_open_contact_ticket');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_open_contact_ticket')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::openTicketContactsAction',));
                        }

                        // admin_close_contact_ticket
                        if (0 === strpos($pathinfo, '/protected/admin/contacts/close') && preg_match('#^/protected/admin/contacts/close/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_close_contact_ticket');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_close_contact_ticket')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::closeTicketContactsAction',));
                        }

                        if (0 === strpos($pathinfo, '/protected/admin/contacts/reply')) {
                            // admin_reply_contact_ticket
                            if (preg_match('#^/protected/admin/contacts/reply/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'admin_reply_contact_ticket');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_reply_contact_ticket')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::replyTicketContactsAction',));
                            }

                            // admin_reply_close_contact_ticket
                            if (0 === strpos($pathinfo, '/protected/admin/contacts/replyclose') && preg_match('#^/protected/admin/contacts/replyclose/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'admin_reply_close_contact_ticket');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_reply_close_contact_ticket')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::replyCloseTicketContactsAction',));
                            }

                        }

                        if (0 === strpos($pathinfo, '/protected/admin/contacts-')) {
                            if (0 === strpos($pathinfo, '/protected/admin/contacts-investor')) {
                                // admin_view_contacts_investor
                                if (rtrim($pathinfo, '/') === '/protected/admin/contacts-investor') {
                                    if (substr($pathinfo, -1) !== '/') {
                                        return $this->redirect($pathinfo.'/', 'admin_view_contacts_investor');
                                    }

                                    return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminContactsInvestorAction',  '_route' => 'admin_view_contacts_investor',);
                                }

                                // super_admin_contacts_search_investor
                                if (rtrim($pathinfo, '/') === '/protected/admin/contacts-investor/search') {
                                    if (substr($pathinfo, -1) !== '/') {
                                        return $this->redirect($pathinfo.'/', 'super_admin_contacts_search_investor');
                                    }

                                    return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchContactsInvestorAction',  '_route' => 'super_admin_contacts_search_investor',);
                                }

                                if (0 === strpos($pathinfo, '/protected/admin/contacts-investor/clear/filter')) {
                                    // clear_all_filters_contacts_investor
                                    if (rtrim($pathinfo, '/') === '/protected/admin/contacts-investor/clear/filters') {
                                        if (substr($pathinfo, -1) !== '/') {
                                            return $this->redirect($pathinfo.'/', 'clear_all_filters_contacts_investor');
                                        }

                                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersContactsInvestorAction',  '_route' => 'clear_all_filters_contacts_investor',);
                                    }

                                    // clear_filter_contacts_investor
                                    if (rtrim($pathinfo, '/') === '/protected/admin/contacts-investor/clear/filter') {
                                        if (substr($pathinfo, -1) !== '/') {
                                            return $this->redirect($pathinfo.'/', 'clear_filter_contacts_investor');
                                        }

                                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterContactsInvestorAction',  '_route' => 'clear_filter_contacts_investor',);
                                    }

                                }

                                // admin_delete_contacts_investor
                                if (0 === strpos($pathinfo, '/protected/admin/contacts-investor/delete') && preg_match('#^/protected/admin/contacts\\-investor/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                                    if (substr($pathinfo, -1) !== '/') {
                                        return $this->redirect($pathinfo.'/', 'admin_delete_contacts_investor');
                                    }

                                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_contacts_investor')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteContactsInvestorAction',));
                                }

                            }

                            if (0 === strpos($pathinfo, '/protected/admin/contacts-owner')) {
                                // admin_view_contacts_owner
                                if (rtrim($pathinfo, '/') === '/protected/admin/contacts-owner') {
                                    if (substr($pathinfo, -1) !== '/') {
                                        return $this->redirect($pathinfo.'/', 'admin_view_contacts_owner');
                                    }

                                    return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminContactsOwnerAction',  '_route' => 'admin_view_contacts_owner',);
                                }

                                // super_admin_contacts_search_owner
                                if (rtrim($pathinfo, '/') === '/protected/admin/contacts-owner/search') {
                                    if (substr($pathinfo, -1) !== '/') {
                                        return $this->redirect($pathinfo.'/', 'super_admin_contacts_search_owner');
                                    }

                                    return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchContactsOwnerAction',  '_route' => 'super_admin_contacts_search_owner',);
                                }

                                if (0 === strpos($pathinfo, '/protected/admin/contacts-owner/clear/filter')) {
                                    // clear_all_filters_contacts_owner
                                    if (rtrim($pathinfo, '/') === '/protected/admin/contacts-owner/clear/filters') {
                                        if (substr($pathinfo, -1) !== '/') {
                                            return $this->redirect($pathinfo.'/', 'clear_all_filters_contacts_owner');
                                        }

                                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersContactsOwnerAction',  '_route' => 'clear_all_filters_contacts_owner',);
                                    }

                                    // clear_filter_contacts_owner
                                    if (rtrim($pathinfo, '/') === '/protected/admin/contacts-owner/clear/filter') {
                                        if (substr($pathinfo, -1) !== '/') {
                                            return $this->redirect($pathinfo.'/', 'clear_filter_contacts_owner');
                                        }

                                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterContactsOwnerAction',  '_route' => 'clear_filter_contacts_owner',);
                                    }

                                }

                                // admin_delete_contacts_owner
                                if (0 === strpos($pathinfo, '/protected/admin/contacts-owner/delete') && preg_match('#^/protected/admin/contacts\\-owner/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                                    if (substr($pathinfo, -1) !== '/') {
                                        return $this->redirect($pathinfo.'/', 'admin_delete_contacts_owner');
                                    }

                                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_contacts_owner')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteContactsOwnerAction',));
                                }

                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/protected/admin/contactowner')) {
                        // admin_open_contactowner_ticket
                        if (0 === strpos($pathinfo, '/protected/admin/contactowner/open') && preg_match('#^/protected/admin/contactowner/open/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_open_contactowner_ticket');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_open_contactowner_ticket')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::openOwnerTicketContactsAction',));
                        }

                        // admin_close_contactowner_ticket
                        if (0 === strpos($pathinfo, '/protected/admin/contactowner/close') && preg_match('#^/protected/admin/contactowner/close/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_close_contactowner_ticket');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_close_contactowner_ticket')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::closeOwnerTicketContactsAction',));
                        }

                        if (0 === strpos($pathinfo, '/protected/admin/contactowner/reply')) {
                            // admin_reply_contactowner_ticket
                            if (preg_match('#^/protected/admin/contactowner/reply/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'admin_reply_contactowner_ticket');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_reply_contactowner_ticket')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::replyOwnerTicketContactsAction',));
                            }

                            // admin_reply_close_contactowner_ticket
                            if (0 === strpos($pathinfo, '/protected/admin/contactowner/replyclose') && preg_match('#^/protected/admin/contactowner/replyclose/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'admin_reply_close_contactowner_ticket');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_reply_close_contactowner_ticket')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::replyCloseOwnerTicketContactsAction',));
                            }

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/user')) {
                    if (0 === strpos($pathinfo, '/protected/admin/user-owner')) {
                        // admin_view_user_owner
                        if (rtrim($pathinfo, '/') === '/protected/admin/user-owner') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_view_user_owner');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminUserOwnerAction',  '_route' => 'admin_view_user_owner',);
                        }

                        // super_admin_user_search_owner
                        if (rtrim($pathinfo, '/') === '/protected/admin/user-owner/search') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'super_admin_user_search_owner');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchUserOwnerAction',  '_route' => 'super_admin_user_search_owner',);
                        }

                        if (0 === strpos($pathinfo, '/protected/admin/user-owner/clear/filter')) {
                            // clear_all_filters_user_owner
                            if (rtrim($pathinfo, '/') === '/protected/admin/user-owner/clear/filters') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'clear_all_filters_user_owner');
                                }

                                return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersUserOwnerAction',  '_route' => 'clear_all_filters_user_owner',);
                            }

                            // clear_filter_user_owner
                            if (rtrim($pathinfo, '/') === '/protected/admin/user-owner/clear/filter') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'clear_filter_user_owner');
                                }

                                return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterUserOwnerAction',  '_route' => 'clear_filter_user_owner',);
                            }

                        }

                        // admin_delete_user_owner
                        if (0 === strpos($pathinfo, '/protected/admin/user-owner/delete') && preg_match('#^/protected/admin/user\\-owner/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_delete_user_owner');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_user_owner')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteUserOwnerAction',));
                        }

                    }

                    // admin_activate_user
                    if (0 === strpos($pathinfo, '/protected/admin/user/activate') && preg_match('#^/protected/admin/user/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_activate_user');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_activate_user')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::activateUserAction',));
                    }

                    // admin_deactivate_user
                    if (0 === strpos($pathinfo, '/protected/admin/user/deactivate') && preg_match('#^/protected/admin/user/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_deactivate_user');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deactivate_user')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deactivateUserAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/review')) {
                    if (0 === strpos($pathinfo, '/protected/admin/reviews')) {
                        // admin_view_reviews
                        if (rtrim($pathinfo, '/') === '/protected/admin/reviews') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_view_reviews');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminReviewsAction',  '_route' => 'admin_view_reviews',);
                        }

                        // super_admin_search_reviews
                        if (rtrim($pathinfo, '/') === '/protected/admin/reviews/search') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'super_admin_search_reviews');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchReviewsAction',  '_route' => 'super_admin_search_reviews',);
                        }

                        if (0 === strpos($pathinfo, '/protected/admin/reviews/clear/filter')) {
                            // clear_all_filters_reviews
                            if (rtrim($pathinfo, '/') === '/protected/admin/reviews/clear/filters') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'clear_all_filters_reviews');
                                }

                                return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersReviewsAction',  '_route' => 'clear_all_filters_reviews',);
                            }

                            // clear_filter_reviews
                            if (rtrim($pathinfo, '/') === '/protected/admin/reviews/clear/filter') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'clear_filter_reviews');
                                }

                                return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterReviewsAction',  '_route' => 'clear_filter_reviews',);
                            }

                        }

                        // admin_delete_reviews
                        if (0 === strpos($pathinfo, '/protected/admin/reviews/delete') && preg_match('#^/protected/admin/reviews/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_delete_reviews');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_reviews')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteReviewAction',));
                        }

                    }

                    // admin_activate_review
                    if (0 === strpos($pathinfo, '/protected/admin/review/activate') && preg_match('#^/protected/admin/review/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_activate_review');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_activate_review')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::activateReviewAction',));
                    }

                    // admin_deactivate_review
                    if (0 === strpos($pathinfo, '/protected/admin/review/deactivate') && preg_match('#^/protected/admin/review/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_deactivate_review');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deactivate_review')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deactivateReviewAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/blog')) {
                    // list_blog
                    if (rtrim($pathinfo, '/') === '/protected/admin/blog/list') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'list_blog');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::listBlogAction',  '_route' => 'list_blog',);
                    }

                    // create_blog
                    if (rtrim($pathinfo, '/') === '/protected/admin/blog/create') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'create_blog');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::createBlogAction',  '_route' => 'create_blog',);
                    }

                    // edit_blog
                    if (0 === strpos($pathinfo, '/protected/admin/blog/edit') && preg_match('#^/protected/admin/blog/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'edit_blog');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_blog')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::editBlogAction',));
                    }

                    // admin_activate_blog
                    if (0 === strpos($pathinfo, '/protected/admin/blog/activate') && preg_match('#^/protected/admin/blog/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_activate_blog');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_activate_blog')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::activateBlogAction',));
                    }

                    if (0 === strpos($pathinfo, '/protected/admin/blog/de')) {
                        // admin_deactivate_blog
                        if (0 === strpos($pathinfo, '/protected/admin/blog/deactivate') && preg_match('#^/protected/admin/blog/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_deactivate_blog');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_deactivate_blog')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deactivateBlogAction',));
                        }

                        // admin_delete_blog
                        if (0 === strpos($pathinfo, '/protected/admin/blog/delete') && preg_match('#^/protected/admin/blog/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_delete_blog');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_blog')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteBlogAction',));
                        }

                    }

                    // super_admin_blog_search
                    if (rtrim($pathinfo, '/') === '/protected/admin/blog/search') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'super_admin_blog_search');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchBlogAction',  '_route' => 'super_admin_blog_search',);
                    }

                    if (0 === strpos($pathinfo, '/protected/admin/blog/clear/filter')) {
                        // clear_all_filters_blog
                        if (rtrim($pathinfo, '/') === '/protected/admin/blog/clear/filters') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'clear_all_filters_blog');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersBlogAction',  '_route' => 'clear_all_filters_blog',);
                        }

                        // clear_filter_blog
                        if (rtrim($pathinfo, '/') === '/protected/admin/blog/clear/filter') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'clear_filter_blog');
                            }

                            return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearFilterBlogAction',  '_route' => 'clear_filter_blog',);
                        }

                    }

                    // admin_delete_image_blog
                    if (rtrim($pathinfo, '/') === '/protected/admin/blog/image/delete') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_delete_image_blog');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteImageBlogAction',  '_route' => 'admin_delete_image_blog',);
                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/tags')) {
                    // admin_view_tags
                    if (rtrim($pathinfo, '/') === '/protected/admin/tags') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_view_tags');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminTagsAction',  '_route' => 'admin_view_tags',);
                    }

                    // super_admin_search_tags
                    if (rtrim($pathinfo, '/') === '/protected/admin/tags/search') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'super_admin_search_tags');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchTagsAction',  '_route' => 'super_admin_search_tags',);
                    }

                    // clear_all_filters_tags
                    if (rtrim($pathinfo, '/') === '/protected/admin/tags/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'clear_all_filters_tags');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersTagsAction',  '_route' => 'clear_all_filters_tags',);
                    }

                    // admin_delete_tags
                    if (0 === strpos($pathinfo, '/protected/admin/tags/delete') && preg_match('#^/protected/admin/tags/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_delete_tags');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_tags')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteTagsAction',));
                    }

                    // create_tag
                    if (rtrim($pathinfo, '/') === '/protected/admin/tags/create') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'create_tag');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::createTagsAction',  '_route' => 'create_tag',);
                    }

                    // edit_tag
                    if (0 === strpos($pathinfo, '/protected/admin/tags/edit') && preg_match('#^/protected/admin/tags/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'edit_tag');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_tag')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::editTagsAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/protected/admin/categories')) {
                    // admin_view_categories
                    if (rtrim($pathinfo, '/') === '/protected/admin/categories') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_view_categories');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::adminCategoriesAction',  '_route' => 'admin_view_categories',);
                    }

                    // super_admin_search_categories
                    if (rtrim($pathinfo, '/') === '/protected/admin/categories/search') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'super_admin_search_categories');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::searchCategoriesAction',  '_route' => 'super_admin_search_categories',);
                    }

                    // clear_all_filters_categories
                    if (rtrim($pathinfo, '/') === '/protected/admin/categories/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'clear_all_filters_categories');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::clearAllFiltersCategoriesAction',  '_route' => 'clear_all_filters_categories',);
                    }

                    // admin_delete_categories
                    if (0 === strpos($pathinfo, '/protected/admin/categories/delete') && preg_match('#^/protected/admin/categories/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_delete_categories');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_categories')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::deleteCategoriesAction',));
                    }

                    // create_categories
                    if (rtrim($pathinfo, '/') === '/protected/admin/categories/create') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'create_categories');
                        }

                        return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::createCategoriesAction',  '_route' => 'create_categories',);
                    }

                    // edit_categories
                    if (0 === strpos($pathinfo, '/protected/admin/categories/edit') && preg_match('#^/protected/admin/categories/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'edit_categories');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_categories')), array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\DefaultController::editCategoriesAction',));
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/support')) {
            if (0 === strpos($pathinfo, '/support/admin')) {
                // support_admin_homepage
                if ($pathinfo === '/support/admin') {
                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::adminAction',  '_route' => 'support_admin_homepage',);
                }

                // support_view_properties
                if (rtrim($pathinfo, '/') === '/support/admin/properties') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_view_properties');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::adminPropertiesAction',  '_route' => 'support_view_properties',);
                }

                // support_edit_user
                if (0 === strpos($pathinfo, '/support/admin/users') && preg_match('#^/support/admin/users/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_edit_user')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::user_editAction',));
                }

                // support_edit_property
                if (0 === strpos($pathinfo, '/support/admin/property') && preg_match('#^/support/admin/property/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_edit_property')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::property_editAction',));
                }

                if (0 === strpos($pathinfo, '/support/admin/users')) {
                    // support_add_user
                    if (rtrim($pathinfo, '/') === '/support/admin/users/add') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_add_user');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::add_userAction',  '_route' => 'support_add_user',);
                    }

                    // support_create_user
                    if (rtrim($pathinfo, '/') === '/support/admin/users/create') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_create_user');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::create_userAction',  '_route' => 'support_create_user',);
                    }

                    // modify_user
                    if (rtrim($pathinfo, '/') === '/support/admin/users/modify') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'modify_user');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::usermodifyAction',  '_route' => 'modify_user',);
                    }

                    // support_admin_users
                    if (rtrim($pathinfo, '/') === '/support/admin/users') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_admin_users');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::usersAction',  '_route' => 'support_admin_users',);
                    }

                }

                if (0 === strpos($pathinfo, '/support/admin/propert')) {
                    if (0 === strpos($pathinfo, '/support/admin/property')) {
                        // support_activate_property
                        if (0 === strpos($pathinfo, '/support/admin/property/activate') && preg_match('#^/support/admin/property/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_activate_property');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_activate_property')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::activatePropertyAction',));
                        }

                        // support_deactivate_property
                        if (0 === strpos($pathinfo, '/support/admin/property/deactivate') && preg_match('#^/support/admin/property/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_deactivate_property');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_deactivate_property')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deactivatePropertyAction',));
                        }

                        // support_activate_property_featured
                        if (0 === strpos($pathinfo, '/support/admin/property/activatefeatured') && preg_match('#^/support/admin/property/activatefeatured/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_activate_property_featured');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_activate_property_featured')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::activateFeaturedPropertyAction',));
                        }

                        // support_deactivate_property_featured
                        if (0 === strpos($pathinfo, '/support/admin/property/deactivatefeatured') && preg_match('#^/support/admin/property/deactivatefeatured/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_deactivate_property_featured');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_deactivate_property_featured')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deactivateFeaturedPropertyAction',));
                        }

                    }

                    // support_preview_property
                    if (0 === strpos($pathinfo, '/support/admin/properties/preview') && preg_match('#^/support/admin/properties/preview/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_preview_property');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_preview_property')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::previewPropertyAction',));
                    }

                }

            }

            // support_admin_router
            if (rtrim($pathinfo, '/') === '/support/router') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'support_admin_router');
                }

                return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::routerAction',  '_route' => 'support_admin_router',);
            }

            if (0 === strpos($pathinfo, '/support/properties')) {
                // support_admin_search
                if (rtrim($pathinfo, '/') === '/support/properties/search') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_admin_search');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::searchAction',  '_route' => 'support_admin_search',);
                }

                if (0 === strpos($pathinfo, '/support/properties/clear/filter')) {
                    // support_clear_all_filters
                    if (rtrim($pathinfo, '/') === '/support/properties/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_all_filters');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearAllFiltersAction',  '_route' => 'support_clear_all_filters',);
                    }

                    // support_clear_filter
                    if (rtrim($pathinfo, '/') === '/support/properties/clear/filter') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_filter');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearFilterAction',  '_route' => 'support_clear_filter',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/support/news')) {
                // support_list_news
                if (rtrim($pathinfo, '/') === '/support/news/list') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_list_news');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::listNewsAction',  '_route' => 'support_list_news',);
                }

                // support_create_news
                if (rtrim($pathinfo, '/') === '/support/news/create') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_create_news');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::createNewsAction',  '_route' => 'support_create_news',);
                }

                // support_edit_news
                if (0 === strpos($pathinfo, '/support/news/edit') && preg_match('#^/support/news/edit/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_edit_news');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_edit_news')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::editNewsAction',));
                }

            }

            if (0 === strpos($pathinfo, '/support/admin/news')) {
                // support_activate_news
                if (0 === strpos($pathinfo, '/support/admin/news/activate') && preg_match('#^/support/admin/news/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_activate_news');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_activate_news')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::activateNewsAction',));
                }

                if (0 === strpos($pathinfo, '/support/admin/news/de')) {
                    // support_deactivate_news
                    if (0 === strpos($pathinfo, '/support/admin/news/deactivate') && preg_match('#^/support/admin/news/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_deactivate_news');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_deactivate_news')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deactivateNewsAction',));
                    }

                    // support_delete_news
                    if (0 === strpos($pathinfo, '/support/admin/news/delete') && preg_match('#^/support/admin/news/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_delete_news');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_delete_news')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deleteNewsAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/support/news')) {
                // support_admin_news_search
                if (rtrim($pathinfo, '/') === '/support/news/search') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_admin_news_search');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::searchNewsAction',  '_route' => 'support_admin_news_search',);
                }

                if (0 === strpos($pathinfo, '/support/news/clear/filter')) {
                    // support_clear_all_filters_news
                    if (rtrim($pathinfo, '/') === '/support/news/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_all_filters_news');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearAllFiltersNewsAction',  '_route' => 'support_clear_all_filters_news',);
                    }

                    // support_clear_filter_news
                    if (rtrim($pathinfo, '/') === '/support/news/clear/filter') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_filter_news');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearFilterNewsAction',  '_route' => 'support_clear_filter_news',);
                    }

                }

            }

            // support_admin_view_inquiries
            if (rtrim($pathinfo, '/') === '/support/admin/inquiries') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'support_admin_view_inquiries');
                }

                return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::adminInquiriesAction',  '_route' => 'support_admin_view_inquiries',);
            }

            if (0 === strpos($pathinfo, '/support/inquiries')) {
                // support_admin_inquiries_search
                if (rtrim($pathinfo, '/') === '/support/inquiries/search') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_admin_inquiries_search');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::searchInquiriesAction',  '_route' => 'support_admin_inquiries_search',);
                }

                if (0 === strpos($pathinfo, '/support/inquiries/clear/filter')) {
                    // support_clear_all_filters_inquiries
                    if (rtrim($pathinfo, '/') === '/support/inquiries/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_all_filters_inquiries');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearAllFiltersInquiriesAction',  '_route' => 'support_clear_all_filters_inquiries',);
                    }

                    // support_clear_filter_inquiries
                    if (rtrim($pathinfo, '/') === '/support/inquiries/clear/filter') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_filter_inquiries');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearFilterInquiriesAction',  '_route' => 'support_clear_filter_inquiries',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/support/admin')) {
                // support_delete_inquiry
                if (0 === strpos($pathinfo, '/support/admin/inquiries/delete') && preg_match('#^/support/admin/inquiries/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_delete_inquiry');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_delete_inquiry')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deleteInquiryAction',));
                }

                // support_view_contacts
                if (rtrim($pathinfo, '/') === '/support/admin/contacts') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_view_contacts');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::adminContactsAction',  '_route' => 'support_view_contacts',);
                }

            }

            if (0 === strpos($pathinfo, '/support/contacts')) {
                // support_admin_contacts_search
                if (rtrim($pathinfo, '/') === '/support/contacts/search') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_admin_contacts_search');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::searchContactsAction',  '_route' => 'support_admin_contacts_search',);
                }

                if (0 === strpos($pathinfo, '/support/contacts/clear/filter')) {
                    // support_clear_all_filters_contacts
                    if (rtrim($pathinfo, '/') === '/support/contacts/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_all_filters_contacts');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearAllFiltersContactsAction',  '_route' => 'support_clear_all_filters_contacts',);
                    }

                    // support_clear_filter_contacts
                    if (rtrim($pathinfo, '/') === '/support/contacts/clear/filter') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_filter_contacts');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearFilterContactsAction',  '_route' => 'support_clear_filter_contacts',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/support/admin/contacts')) {
                // support_delete_contacts
                if (0 === strpos($pathinfo, '/support/admin/contacts/delete') && preg_match('#^/support/admin/contacts/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_delete_contacts');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_delete_contacts')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deleteContactsAction',));
                }

                // support_open_contact_ticket
                if (0 === strpos($pathinfo, '/support/admin/contacts/open') && preg_match('#^/support/admin/contacts/open/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_open_contact_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_open_contact_ticket')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::openTicketContactsAction',));
                }

                // support_close_contact_ticket
                if (0 === strpos($pathinfo, '/support/admin/contacts/close') && preg_match('#^/support/admin/contacts/close/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_close_contact_ticket');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_close_contact_ticket')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::closeTicketContactsAction',));
                }

                if (0 === strpos($pathinfo, '/support/admin/contacts/reply')) {
                    // support_reply_contact_ticket
                    if (preg_match('#^/support/admin/contacts/reply/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_reply_contact_ticket');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_reply_contact_ticket')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::replyTicketContactsAction',));
                    }

                    // support_reply_close_contact_ticket
                    if (0 === strpos($pathinfo, '/support/admin/contacts/replyclose') && preg_match('#^/support/admin/contacts/replyclose/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_reply_close_contact_ticket');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_reply_close_contact_ticket')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::replyCloseTicketContactsAction',));
                    }

                }

                // support_view_contacts_investor
                if (rtrim($pathinfo, '/') === '/support/admin/contacts-investor') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_view_contacts_investor');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::adminContactsInvestorAction',  '_route' => 'support_view_contacts_investor',);
                }

            }

            if (0 === strpos($pathinfo, '/support/contacts-investor')) {
                // support_admin_contacts_search_investor
                if (rtrim($pathinfo, '/') === '/support/contacts-investor/search') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_admin_contacts_search_investor');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::searchContactsInvestorAction',  '_route' => 'support_admin_contacts_search_investor',);
                }

                if (0 === strpos($pathinfo, '/support/contacts-investor/clear/filter')) {
                    // support_clear_all_filters_contacts_investor
                    if (rtrim($pathinfo, '/') === '/support/contacts-investor/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_all_filters_contacts_investor');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearAllFiltersContactsInvestorAction',  '_route' => 'support_clear_all_filters_contacts_investor',);
                    }

                    // support_clear_filter_contacts_investor
                    if (rtrim($pathinfo, '/') === '/support/contacts-investor/clear/filter') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_filter_contacts_investor');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearFilterContactsInvestorAction',  '_route' => 'support_clear_filter_contacts_investor',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/support/admin/contacts-')) {
                // support_delete_contacts_investor
                if (0 === strpos($pathinfo, '/support/admin/contacts-investor/delete') && preg_match('#^/support/admin/contacts\\-investor/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_delete_contacts_investor');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_delete_contacts_investor')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deleteContactsInvestorAction',));
                }

                // support_view_contacts_owner
                if (rtrim($pathinfo, '/') === '/support/admin/contacts-owner') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_view_contacts_owner');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::adminContactsOwnerAction',  '_route' => 'support_view_contacts_owner',);
                }

            }

            if (0 === strpos($pathinfo, '/support/contacts-owner')) {
                // support_admin_contacts_search_owner
                if (rtrim($pathinfo, '/') === '/support/contacts-owner/search') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_admin_contacts_search_owner');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::searchContactsOwnerAction',  '_route' => 'support_admin_contacts_search_owner',);
                }

                if (0 === strpos($pathinfo, '/support/contacts-owner/clear/filter')) {
                    // support_clear_all_filters_contacts_owner
                    if (rtrim($pathinfo, '/') === '/support/contacts-owner/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_all_filters_contacts_owner');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearAllFiltersContactsOwnerAction',  '_route' => 'support_clear_all_filters_contacts_owner',);
                    }

                    // support_clear_filter_contacts_owner
                    if (rtrim($pathinfo, '/') === '/support/contacts-owner/clear/filter') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_filter_contacts_owner');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearFilterContactsOwnerAction',  '_route' => 'support_clear_filter_contacts_owner',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/support/admin')) {
                if (0 === strpos($pathinfo, '/support/admin/contacts-owner')) {
                    // support_delete_contacts_owner
                    if (0 === strpos($pathinfo, '/support/admin/contacts-owner/delete') && preg_match('#^/support/admin/contacts\\-owner/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_delete_contacts_owner');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_delete_contacts_owner')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deleteContactsOwnerAction',));
                    }

                    // support_open_contactowner_ticket
                    if (0 === strpos($pathinfo, '/support/admin/contacts-owner/open') && preg_match('#^/support/admin/contacts\\-owner/open/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_open_contactowner_ticket');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_open_contactowner_ticket')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::openOwnerTicketContactsAction',));
                    }

                    // support_close_contactowner_ticket
                    if (0 === strpos($pathinfo, '/support/admin/contacts-owner/close') && preg_match('#^/support/admin/contacts\\-owner/close/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_close_contactowner_ticket');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_close_contactowner_ticket')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::closeOwnerTicketContactsAction',));
                    }

                    if (0 === strpos($pathinfo, '/support/admin/contacts-owner/reply')) {
                        // support_reply_contactowner_ticket
                        if (preg_match('#^/support/admin/contacts\\-owner/reply/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_reply_contactowner_ticket');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_reply_contactowner_ticket')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::replyOwnerTicketContactsAction',));
                        }

                        // support_reply_close_contactowner_ticket
                        if (0 === strpos($pathinfo, '/support/admin/contacts-owner/replyclose') && preg_match('#^/support/admin/contacts\\-owner/replyclose/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_reply_close_contactowner_ticket');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_reply_close_contactowner_ticket')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::replyCloseOwnerTicketContactsAction',));
                        }

                    }

                }

                // support_view_user_owner
                if (rtrim($pathinfo, '/') === '/support/admin/user-owner') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_view_user_owner');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::adminUserOwnerAction',  '_route' => 'support_view_user_owner',);
                }

            }

            if (0 === strpos($pathinfo, '/support/user-owner')) {
                // support_admin_user_search_owner
                if (rtrim($pathinfo, '/') === '/support/user-owner/search') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_admin_user_search_owner');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::searchUserOwnerAction',  '_route' => 'support_admin_user_search_owner',);
                }

                if (0 === strpos($pathinfo, '/support/user-owner/clear/filter')) {
                    // support_clear_all_filters_user_owner
                    if (rtrim($pathinfo, '/') === '/support/user-owner/clear/filters') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_all_filters_user_owner');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearAllFiltersUserOwnerAction',  '_route' => 'support_clear_all_filters_user_owner',);
                    }

                    // support_clear_filter_user_owner
                    if (rtrim($pathinfo, '/') === '/support/user-owner/clear/filter') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_clear_filter_user_owner');
                        }

                        return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearFilterUserOwnerAction',  '_route' => 'support_clear_filter_user_owner',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/support/admin')) {
                if (0 === strpos($pathinfo, '/support/admin/user')) {
                    // support_activate_user
                    if (0 === strpos($pathinfo, '/support/admin/user/activate') && preg_match('#^/support/admin/user/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_activate_user');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_activate_user')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::activateUserAction',));
                    }

                    // support_deactivate_user
                    if (0 === strpos($pathinfo, '/support/admin/user/deactivate') && preg_match('#^/support/admin/user/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_deactivate_user');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_deactivate_user')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deactivateUserAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/support/admin/review')) {
                    if (0 === strpos($pathinfo, '/support/admin/reviews')) {
                        // support_view_reviews
                        if (rtrim($pathinfo, '/') === '/support/admin/reviews') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_view_reviews');
                            }

                            return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::adminReviewsAction',  '_route' => 'support_view_reviews',);
                        }

                        // support_admin_search_reviews
                        if (rtrim($pathinfo, '/') === '/support/admin/reviews/search') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_admin_search_reviews');
                            }

                            return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::searchReviewsAction',  '_route' => 'support_admin_search_reviews',);
                        }

                        if (0 === strpos($pathinfo, '/support/admin/reviews/clear/filter')) {
                            // support_clear_all_filters_reviews
                            if (rtrim($pathinfo, '/') === '/support/admin/reviews/clear/filters') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'support_clear_all_filters_reviews');
                                }

                                return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearAllFiltersReviewsAction',  '_route' => 'support_clear_all_filters_reviews',);
                            }

                            // support_clear_filter_reviews
                            if (rtrim($pathinfo, '/') === '/support/admin/reviews/clear/filter') {
                                if (substr($pathinfo, -1) !== '/') {
                                    return $this->redirect($pathinfo.'/', 'support_clear_filter_reviews');
                                }

                                return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::clearFilterReviewsAction',  '_route' => 'support_clear_filter_reviews',);
                            }

                        }

                        // support_delete_reviews
                        if (0 === strpos($pathinfo, '/support/admin/reviews/delete') && preg_match('#^/support/admin/reviews/delete/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'support_delete_reviews');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_delete_reviews')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deleteReviewAction',));
                        }

                    }

                    // support_activate_review
                    if (0 === strpos($pathinfo, '/support/admin/review/activate') && preg_match('#^/support/admin/review/activate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_activate_review');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_activate_review')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::activateReviewAction',));
                    }

                    // support_deactivate_review
                    if (0 === strpos($pathinfo, '/support/admin/review/deactivate') && preg_match('#^/support/admin/review/deactivate/(?P<id>[^/]++)/(?P<page>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'support_deactivate_review');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'support_deactivate_review')), array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\DefaultController::deactivateReviewAction',));
                    }

                }

            }

        }

        // common_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'common_homepage')), array (  '_controller' => 'Frontend\\CommonBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/private-seller')) {
            if (0 === strpos($pathinfo, '/private-seller/step')) {
                // step1_vehicle_register
                if ($pathinfo === '/private-seller/step-details') {
                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\SellYourCarController::Step1VehicleRegisterAction',  '_route' => 'step1_vehicle_register',);
                }

                // step2_vehicle_register
                if (0 === strpos($pathinfo, '/private-seller/step_photos') && preg_match('#^/private\\-seller/step_photos/(?P<type>[^/]++)/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'step2_vehicle_register')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\SellYourCarController::Step2VehicleRegisterAction',));
                }

            }

            // step2_save_image
            if (rtrim($pathinfo, '/') === '/private-seller/gallery/image/save') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'step2_save_image');
                }

                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\SellYourCarController::saveImageAction',  '_route' => 'step2_save_image',);
            }

            if (0 === strpos($pathinfo, '/private-seller/step')) {
                if (0 === strpos($pathinfo, '/private-seller/step2_')) {
                    // step2_upload_multiple_vehicle
                    if (0 === strpos($pathinfo, '/private-seller/step2_upload-multiple-vehicles-images') && preg_match('#^/private\\-seller/step2_upload\\-multiple\\-vehicles\\-images/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'step2_upload_multiple_vehicle')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\SellYourCarController::uploadMultipleVehicleImagesAction',));
                    }

                    // step2_private_save_image
                    if (rtrim($pathinfo, '/') === '/private-seller/step2_gallery/image/save') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'step2_private_save_image');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\SellYourCarController::saveImageAction',  '_route' => 'step2_private_save_image',);
                    }

                }

                // step3_privateseller_register
                if (0 === strpos($pathinfo, '/private-seller/step-register') && preg_match('#^/private\\-seller/step\\-register/(?P<vehicle_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'step3_privateseller_register')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\SellYourCarController::Step3PrivateSellerRegisterAction',));
                }

            }

        }

        // app_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'app_homepage');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'app_homepage',);
        }

        // app_list_properties
        if (rtrim($pathinfo, '/') === '/search/vacation-rentals') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'app_list_properties');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchCarResultsAction',  '_route' => 'app_list_properties',);
        }

        if (0 === strpos($pathinfo, '/vacation-rentals')) {
            // update_sort
            if (0 === strpos($pathinfo, '/vacation-rentals/sort') && preg_match('#^/vacation\\-rentals/sort/(?P<sort>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'update_sort')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::updateSortAction',));
            }

            if (0 === strpos($pathinfo, '/vacation-rentals/filtro')) {
                // update_filtro_movil
                if (rtrim($pathinfo, '/') === '/vacation-rentals/filtro/movil') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'update_filtro_movil');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::updateFiltroMovilAction',  '_route' => 'update_filtro_movil',);
                }

                // update_filtro_price
                if (rtrim($pathinfo, '/') === '/vacation-rentals/filtro/price') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'update_filtro_price');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::updateFiltroPriceAction',  '_route' => 'update_filtro_price',);
                }

                // update_filtro_sleeps
                if (rtrim($pathinfo, '/') === '/vacation-rentals/filtro/sleeps') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'update_filtro_sleeps');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::updateFiltroSleepsAction',  '_route' => 'update_filtro_sleeps',);
                }

                if (0 === strpos($pathinfo, '/vacation-rentals/filtro/b')) {
                    // update_filtro_bedrooms
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/filtro/bedrooms') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'update_filtro_bedrooms');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::updateFiltroBedroomsAction',  '_route' => 'update_filtro_bedrooms',);
                    }

                    // update_filtro_bathrooms
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/filtro/bathrooms') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'update_filtro_bathrooms');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::updateFiltroBathroomsAction',  '_route' => 'update_filtro_bathrooms',);
                    }

                    // update_filtro_booking
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/filtro/booking') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'update_filtro_booking');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::updateFiltroBookingAction',  '_route' => 'update_filtro_booking',);
                    }

                }

                // update_filtro_more
                if (rtrim($pathinfo, '/') === '/vacation-rentals/filtro/more') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'update_filtro_more');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::updateFiltroMoreAction',  '_route' => 'update_filtro_more',);
                }

            }

            // search_results
            if (0 === strpos($pathinfo, '/vacation-rentals/world') && preg_match('#^/vacation\\-rentals/world(?:/(?P<country>[^/]++)(?:/(?P<region>[^/]++)(?:/(?P<city>[^/]++))?)?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_results')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchResultsAction',  'country' => NULL,  'region' => NULL,  'city' => NULL,));
            }

        }

        // properties
        if (rtrim($pathinfo, '/') === '/search') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'properties');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::propertiesAction',  '_route' => 'properties',);
        }

        if (0 === strpos($pathinfo, '/vacation-rental')) {
            // property_profile
            if (preg_match('#^/vacation\\-rental/(?P<id>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'property_profile');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'property_profile')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::profileAction',));
            }

            if (0 === strpos($pathinfo, '/vacation-rentals')) {
                if (0 === strpos($pathinfo, '/vacation-rentals/location')) {
                    // photo_tour
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/location/phototour') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'photo_tour');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::loadPhotoTourAction',  '_route' => 'photo_tour',);
                    }

                    // description
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/location/description') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'description');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::loadDescriptionAction',  '_route' => 'description',);
                    }

                    // amenities
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/location/amenities') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'amenities');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::loadAmenitiesAction',  '_route' => 'amenities',);
                    }

                    // map
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/location/map') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'map');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::loadMapAction',  '_route' => 'map',);
                    }

                    // calendar
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/location/calendar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'calendar');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::loadCalendarAction',  '_route' => 'calendar',);
                    }

                    // rates
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/location/rates') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'rates');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::loadRatesAction',  '_route' => 'rates',);
                    }

                    // payments
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/location/payments') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'payments');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::loadPaymentsAction',  '_route' => 'payments',);
                    }

                    // reviews
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/location/reviews') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'reviews');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::loadReviewsAction',  '_route' => 'reviews',);
                    }

                }

                // create_inquiry
                if (rtrim($pathinfo, '/') === '/vacation-rentals/property/inquiry/create') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'create_inquiry');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::createInquiryAction',  '_route' => 'create_inquiry',);
                }

                // review_form
                if (rtrim($pathinfo, '/') === '/vacation-rentals/review/form') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'review_form');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::reviewFormAction',  '_route' => 'review_form',);
                }

                if (0 === strpos($pathinfo, '/vacation-rentals/property/re')) {
                    // create_review
                    if (rtrim($pathinfo, '/') === '/vacation-rentals/property/review/create') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'create_review');
                        }

                        return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::createReviewAction',  '_route' => 'create_review',);
                    }

                    if (0 === strpos($pathinfo, '/vacation-rentals/property/reserv')) {
                        // create_reservation
                        if (rtrim($pathinfo, '/') === '/vacation-rentals/property/reservation/create') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'create_reservation');
                            }

                            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::createReservationAction',  '_route' => 'create_reservation',);
                        }

                        // AcmeHomeBundle_ajax_update_mydata
                        if (rtrim($pathinfo, '/') === '/vacation-rentals/property/reserved') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'AcmeHomeBundle_ajax_update_mydata');
                            }

                            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::getreservedDaysAction',  '_route' => 'AcmeHomeBundle_ajax_update_mydata',);
                        }

                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/search')) {
            if (0 === strpos($pathinfo, '/search/regions')) {
                // search_regions
                if (rtrim($pathinfo, '/') === '/search/regions') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'search_regions');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchRegionsAction',  '_route' => 'search_regions',);
                }

                // search_cities
                if (rtrim($pathinfo, '/') === '/search/regions/cities') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'search_cities');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchCitiesAction',  '_route' => 'search_cities',);
                }

            }

            // search_by_state
            if ($pathinfo === '/search/states') {
                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchByStateAction',  '_route' => 'search_by_state',);
            }

            // search_by_country
            if (0 === strpos($pathinfo, '/search/countries') && preg_match('#^/search/countries/(?P<country>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_by_country')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchByCountryAction',));
            }

        }

        if (0 === strpos($pathinfo, '/vacation-rentals/world')) {
            // search_by_nation_name
            if (preg_match('#^/vacation\\-rentals/world/(?P<country>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'search_by_nation_name');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_by_nation_name')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchByNationNameAction',));
            }

            // search_by_state_name
            if (preg_match('#^/vacation\\-rentals/world/(?P<country>[^/]++)/(?P<state>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'search_by_state_name');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_by_state_name')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchByStateNameAction',));
            }

            // search_by_city_name
            if (preg_match('#^/vacation\\-rentals/world/(?P<country>[^/]++)/(?P<state>[^/]++)/(?P<city>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'search_by_city_name');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_by_city_name')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchByCityNameAction',));
            }

        }

        // search_by_location_type
        if (0 === strpos($pathinfo, '/search/location') && preg_match('#^/search/location/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'search_by_location_type')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchByLocationTypeAction',));
        }

        // search_world
        if (rtrim($pathinfo, '/') === '/vacation-rentals/world') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'search_world');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::searchWorldAction',  '_route' => 'search_world',);
        }

        // app_list_properties_ajax
        if (rtrim($pathinfo, '/') === '/search/properties-ajax') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'app_list_properties_ajax');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::getPropertyByCountryStringAction',  '_route' => 'app_list_properties_ajax',);
        }

        // reset_filtro_price
        if ($pathinfo === '/vacation-rentals/filtro/price/reset') {
            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::resetPriceFilterAction',  '_route' => 'reset_filtro_price',);
        }

        // help_center
        if (rtrim($pathinfo, '/') === '/help-center') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'help_center');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::helpCenterAction',  '_route' => 'help_center',);
        }

        if (0 === strpos($pathinfo, '/contact')) {
            // contact_us
            if ($pathinfo === '/contactUs') {
                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::contactUsAction',  '_route' => 'contact_us',);
            }

            // create_contact
            if (rtrim($pathinfo, '/') === '/contact-us/create') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'create_contact');
                }

                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::createContactAction',  '_route' => 'create_contact',);
            }

        }

        // about_us
        if ($pathinfo === '/aboutUs') {
            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::aboutUsAction',  '_route' => 'about_us',);
        }

        // content_guidelines
        if (rtrim($pathinfo, '/') === '/content-guidelines') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'content_guidelines');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::contentGuidelinesAction',  '_route' => 'content_guidelines',);
        }

        if (0 === strpos($pathinfo, '/investor')) {
            // investor
            if (rtrim($pathinfo, '/') === '/investor') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'investor');
                }

                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::investorAction',  '_route' => 'investor',);
            }

            // create_investor
            if (rtrim($pathinfo, '/') === '/investor/create') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'create_investor');
                }

                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::createInvestorAction',  '_route' => 'create_investor',);
            }

        }

        // terms
        if (rtrim($pathinfo, '/') === '/terms-conditions') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'terms');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::termsAction',  '_route' => 'terms',);
        }

        // validate_captcha
        if (rtrim($pathinfo, '/') === '/captcha/validate') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'validate_captcha');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::validateCaptchaAction',  '_route' => 'validate_captcha',);
        }

        // privacy_policy
        if (rtrim($pathinfo, '/') === '/privacy-policy') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'privacy_policy');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::privacyPolicyAction',  '_route' => 'privacy_policy',);
        }

        // how_works
        if (rtrim($pathinfo, '/') === '/how-it-works') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'how_works');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::howWorksAction',  '_route' => 'how_works',);
        }

        if (0 === strpos($pathinfo, '/blog')) {
            // blog
            if (rtrim($pathinfo, '/') === '/blog') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'blog');
                }

                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::blogAction',  '_route' => 'blog',);
            }

            // blog_detail
            if (preg_match('#^/blog/(?P<slug>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'blog_detail');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_detail')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::blogDetailAction',));
            }

        }

        // user_registration_resend_confirm
        if ($pathinfo === '/login/resend-confirm') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_user_registration_resend_confirm;
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\DefaultController::resendConfirmAction',  '_route' => 'user_registration_resend_confirm',);
        }
        not_user_registration_resend_confirm:

        // search_car_results
        if ($pathinfo === '/search-cars-result') {
            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::searchCarResultsAction',  '_route' => 'search_car_results',);
        }

        // car_details
        if (0 === strpos($pathinfo, '/car-details') && preg_match('#^/car\\-details/(?P<serie>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'car_details')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::carDetailsAction',));
        }

        if (0 === strpos($pathinfo, '/view/vehicles')) {
            // all_vehicles_content
            if ($pathinfo === '/view/vehicles/content') {
                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::allVehiclesContentAction',  '_route' => 'all_vehicles_content',);
            }

            // search_all_vehicles_content
            if ($pathinfo === '/view/vehicles/search') {
                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::searchAllVehiclesContentAction',  '_route' => 'search_all_vehicles_content',);
            }

        }

        if (0 === strpos($pathinfo, '/find')) {
            if (0 === strpos($pathinfo, '/find/m')) {
                // find_makes_by_year_front
                if (rtrim($pathinfo, '/') === '/find/makes') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'find_makes_by_year_front');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::findMakesAction',  '_route' => 'find_makes_by_year_front',);
                }

                // find_models_by_make_front
                if (rtrim($pathinfo, '/') === '/find/models') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'find_models_by_make_front');
                    }

                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::findModelsAction',  '_route' => 'find_models_by_make_front',);
                }

            }

            // find_trims_by_model_front
            if (rtrim($pathinfo, '/') === '/find/trims') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'find_trims_by_model_front');
                }

                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::findTrimsAction',  '_route' => 'find_trims_by_model_front',);
            }

        }

        if (0 === strpos($pathinfo, '/view/mobile')) {
            // movil_search_filters
            if ($pathinfo === '/view/mobiles/vehicles/search') {
                return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::movilSearchFiltersAction',  '_route' => 'movil_search_filters',);
            }

            if (0 === strpos($pathinfo, '/view/mobile/vehicles/search')) {
                // movil_search_all_vehicles_content
                if ($pathinfo === '/view/mobile/vehicles/search') {
                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::movilsearchAllVehiclesContentAction',  '_route' => 'movil_search_all_vehicles_content',);
                }

                // movil_all_results_cars_content
                if ($pathinfo === '/view/mobile/vehicles/search/ajax') {
                    return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::movilAllResultCarsContentAction',  '_route' => 'movil_all_results_cars_content',);
                }

            }

        }

        // movil_car_details
        if (0 === strpos($pathinfo, '/mobile/car-details') && preg_match('#^/mobile/car\\-details/(?P<serie>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'movil_car_details')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::movilCarDetailsAction',));
        }

        // compare_cars
        if (rtrim($pathinfo, '/') === '/compare-cars') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'compare_cars');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::compareCarsAction',  '_route' => 'compare_cars',);
        }

        // why_free
        if ($pathinfo === '/whyFree') {
            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::whyFreeAction',  '_route' => 'why_free',);
        }

        // dealer-info
        if (0 === strpos($pathinfo, '/vehicle/dealer/info') && preg_match('#^/vehicle/dealer/info/(?P<profile>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'dealer-info')), array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::dealerInfoAction',  'tab' => 1,));
        }

        // savecarinsession
        if ($pathinfo === '/savecarserie') {
            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::saveCarSerieAction',  '_route' => 'savecarinsession',);
        }

        // private_seller_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'private_seller_homepage')), array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::indexAction',));
        }

        // compare_cars_private
        if (rtrim($pathinfo, '/') === '/compare-cars') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'compare_cars_private');
            }

            return array (  '_controller' => 'Frontend\\AppBundle\\Controller\\FrontendFALController::compareCarsAction',  '_route' => 'compare_cars_private',);
        }

        // find_car
        if ($pathinfo === '/find-car-info') {
            return array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::findCarAction',  '_route' => 'find_car',);
        }

        // viewallvehicles
        if ($pathinfo === '/view-all-vehiclesuserVehiclescontent') {
            return array (  '_controller' => 'Backend\\PrivateSellerBundle\\Controller\\DefaultController::viewallAction',  '_route' => 'viewallvehicles',);
        }

        if (0 === strpos($pathinfo, '/protected/log')) {
            if (0 === strpos($pathinfo, '/protected/login')) {
                // admin_login
                if (rtrim($pathinfo, '/') === '/protected/login') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_login');
                    }

                    return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\SecurityController::loginAction',  '_route' => 'admin_login',);
                }

                // admin_login_check
                if (rtrim($pathinfo, '/') === '/protected/login_check') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_login_check');
                    }

                    return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\SecurityController::checkAction',  '_route' => 'admin_login_check',);
                }

            }

            // admin_logout
            if (rtrim($pathinfo, '/') === '/protected/logout') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_logout');
                }

                return array (  '_controller' => 'Backend\\SuperAdminBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'admin_logout',);
            }

        }

        // owner_login
        if (rtrim($pathinfo, '/') === '/login') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'owner_login');
            }

            return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\SecurityController::loginAction',  '_route' => 'owner_login',);
        }

        if (0 === strpos($pathinfo, '/support/log')) {
            if (0 === strpos($pathinfo, '/support/login')) {
                // support_login
                if (rtrim($pathinfo, '/') === '/support/login') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_login');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\SecurityController::loginAction',  '_route' => 'support_login',);
                }

                // support_login_check
                if (rtrim($pathinfo, '/') === '/support/login_check') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'support_login_check');
                    }

                    return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\SecurityController::checkAction',  '_route' => 'support_login_check',);
                }

            }

            // support_logout
            if (rtrim($pathinfo, '/') === '/support/logout') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'support_logout');
                }

                return array (  '_controller' => 'Backend\\SupportAdminBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'support_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (preg_match('#^/register/(?P<tab>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_register')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  'tab' => '1',));
                }

                // fos_user_registration_check_email
                if (preg_match('#^/register/(?P<tab>[^/]++)/check\\-email/(?P<user>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_registration_check_email;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_check_email')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',));
                }
                not_fos_user_registration_check_email:

                // fos_user_registration_confirm
                if (preg_match('#^/register/(?P<tab>[^/]++)/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_registration_confirm;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                }
                not_fos_user_registration_confirm:

                // fos_user_registration_confirmed
                if (preg_match('#^/register/(?P<tab>[^/]++)/confirmed$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_registration_confirmed;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirmed')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',));
                }
                not_fos_user_registration_confirmed:

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/login')) {
            // hwi_oauth_connect
            if (rtrim($pathinfo, '/') === '/login') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'hwi_oauth_connect');
                }

                return array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::connectAction',  '_route' => 'hwi_oauth_connect',);
            }

            // hwi_oauth_connect_service
            if (0 === strpos($pathinfo, '/login/service') && preg_match('#^/login/service/(?P<service>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_connect_service')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::connectServiceAction',));
            }

            // hwi_oauth_connect_registration
            if (0 === strpos($pathinfo, '/login/registration') && preg_match('#^/login/registration/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_connect_registration')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::registrationAction',));
            }

            // hwi_oauth_service_redirect
            if (preg_match('#^/login/(?P<service>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hwi_oauth_service_redirect')), array (  '_controller' => 'HWI\\Bundle\\OAuthBundle\\Controller\\ConnectController::redirectToServiceAction',));
            }

            // facebook_login
            if ($pathinfo === '/login/check-facebook') {
                return array('_route' => 'facebook_login');
            }

        }

        if (0 === strpos($pathinfo, '/media/cache/resolve')) {
            // liip_imagine_filter_runtime
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/rc/(?P<hash>[^/]++)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter_runtime;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter_runtime')), array (  '_controller' => 'liip_imagine.controller:filterRuntimeAction',));
            }
            not_liip_imagine_filter_runtime:

            // liip_imagine_filter
            if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_liip_imagine_filter;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter')), array (  '_controller' => 'liip_imagine.controller:filterAction',));
            }
            not_liip_imagine_filter:

        }

        if (0 === strpos($pathinfo, '/sitemap')) {
            // PrestaSitemapBundle_index
            if (preg_match('#^/sitemap\\.(?P<_format>xml)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'PrestaSitemapBundle_index')), array (  '_controller' => 'Presta\\SitemapBundle\\Controller\\SitemapController::indexAction',));
            }

            // PrestaSitemapBundle_section
            if (preg_match('#^/sitemap\\.(?P<name>[^/\\.]++)\\.(?P<_format>xml)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'PrestaSitemapBundle_section')), array (  '_controller' => 'Presta\\SitemapBundle\\Controller\\SitemapController::sectionAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
