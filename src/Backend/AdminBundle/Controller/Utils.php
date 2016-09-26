<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/08/2015
 * Time: 9:33
 */

namespace Backend\AdminBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

class Utils
{

    /**
     * @param $profiles
     * @return ArrayCollection
     */
    public static function GenerateProfilesInfoList($profiles)
    {
        $profilesInfo = new ArrayCollection();
        foreach ($profiles as $profile) {
            $prof = Array();
            $prof['id'] = $profile->getId();
            $prof['logo'] = $profile->getLogo();
            $prof['name'] = $profile->getDescription()->getName();
            $prof['prop_pk'] = $profile->getSerie();
            $prof['status'] = $profile->getStatus()->getName();

            if ($profile->getVehicles() != null)
                $prof['inventory'] = count($profile->getVehicles());
            else
                $prof['inventory'] = 0;

            $prof['views'] = $profile->getViews();
            $profilesInfo->add($prof);
        }


        return $profilesInfo;
    }

    /**
     * @param $profiles
     * @return ArrayCollection
     */
    public static function GenerateSumaryInfoList($profiles, $user)
    {
        $sumary = Array();
        $active = 0;
        $inactive = 0;
        $visits = 0;
        $lastupdate = "";
        foreach ($profiles as $profile) {
            if ($profile->getStatus()->getType() == 0) {
                $inactive++;
            } else {
                if ($profile->getStatus()->getType() == 1) {
                    $active++;
                }
            }
            $visits += $profile->getViews();
            $lastupdate = $profile->getDateUpdate()->format("M d, Y");
        }

        $sumary['active'] = $active;
        $sumary['inactive'] = $inactive;
        $sumary['visits'] = $visits;
        $sumary['update'] = $lastupdate;//la ultima actividad que se le ha hecho al usuario
        $sumary['created'] = $user->getDateCreated()->format("M d, Y");

        return $sumary;
    }


    /**
     * @param Request $request
     * @param $em
     * @param $emails
     * @param $status
     * @param $profilescount
     */
    public static function SetSessionsVars(Request $request, $em, $emails, $status, $profiles)
    {
        $news = $em->getRepository('AppBundle:News')->findBy(
            array('new' => true, 'status' => $status)
        );
        $emails_news = 0;
        $emails_offers_new = 0;
        foreach ($emails as $email) {
            if (!$email->isOffer() && !$email->isOpened())
                $emails_news++;
            if ($email->isOffer() && !$email->isOpened())
                $emails_offers_new++;

        }

        $session = $request->getSession();
        // store an attribute for reuse during a later user request
        $session->set('news', COUNT($news));

        $session->set('email_news', $emails_news);
        $session->set('email_offers', $emails_offers_new);

        $session->set('propertiesCount', count($profiles));
        $reviews = $em->getRepository('AppBundle:Review')->findByProfile($profiles);
        $session->set('dealer_reviews', count($reviews));
    }

    public static function incrementNewEmailMessageSessionCounter(Request $request)
    {
        $session = $request->getSession();
        $session->set('email_news', $session->get('email_news') + 1);
    }

    public static function decrementNewEmailMessageSessionCounter(Request $request)
    {
        $session = $request->getSession();
        if ($session->get('email_news') > 0) {
            $session->set('email_news', $session->get('email_news') - 1);
        }
    }

    public static function incrementNewEmailOfferSessionCounter(Request $request)
    {
        $session = $request->getSession();
        $session->set('email_offer', $session->get('email_offer') + 1);
    }

    public static function decrementNewEmailOfferSessionCounter(Request $request)
    {
        $session = $request->getSession();
        if ($session->get('email_offer') > 0) {
            $session->set('email_offer', $session->get('email_offer') - 1);
        }
    }
} 