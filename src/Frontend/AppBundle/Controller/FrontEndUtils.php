<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 14/09/2015
 * Time: 1:18
 */

namespace Frontend\AppBundle\Controller;


use Doctrine\Common\Collections\ArrayCollection;

class FrontEndUtils
{

    public static function CreatePriceList()
    {

        $prices = new ArrayCollection();
        $sum = 2000;
        for ($i = 1; $i < 20; $i++) {
            $prices->add(floatval($i * $sum));
        }

        return $prices;

    }

    public static function CreateMileageList()
    {

        $mileage = new ArrayCollection();
        $sum = 100;
        for ($i = 0; $i < 7; $i++) {

            if ($i == 0) {
                $mileage->add(floatval($sum));
            } else if ($i == 5 || $i == 6) {
                $mileage->add(floatval(100000));
            } else {
                $mileage->add(floatval($mileage[$i - 1] + $sum));
            }

        }

        return $mileage;

    }


} 