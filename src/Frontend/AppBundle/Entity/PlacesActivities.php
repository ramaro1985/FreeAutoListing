<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlacesActivities
 *
 * @ORM\Table(name="placesactivities")
 * @ORM\Entity
 */
class PlacesActivities
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="car", type="string", length=255, nullable=true)
     */
    private $car;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_airport", type="string", length=255 , nullable=true)
     */
    private $nearestAirport;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_airport_distance", type="integer", nullable=true)
     */
    private $nearestAirportDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_airport_distance_unit", type="integer", nullable=true)
     */
    private $nearestAirportDistanceUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_beach", type="string", length=255, nullable=true)
     */
    private $nearestBeach;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_beach_distance", type="integer", nullable=true)
     */
    private $nearestBeachDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_beach_distance_unit", type="integer", nullable=true)
     */
    private $nearestBeachDistanceUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_ferry", type="string", length=255, nullable=true)
     */
    private $nearestFerry;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_ferry_distance", type="integer", nullable=true)
     */
    private $nearestFerryDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_ferry_distance_unit", type="integer", nullable=true)
     */
    private $nearestFerryDistanceUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_train", type="string", length=255, nullable=true)
     */
    private $nearestTrain;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_train_distance", type="integer", nullable=true)
     */
    private $nearestTrainDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_train_distance_unit", type="integer", nullable=true)
     */
    private $nearestTrainDistanceUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_highway", type="string", length=255, nullable=true)
     */
    private $nearestHighway;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_highway_distance", type="integer", nullable=true)
     */
    private $nearestHighwayDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_highway_distance_unit", type="integer", nullable=true)
     */
    private $nearestHighwayDistanceUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_bar", type="string", length=255, nullable=true)
     */
    private $nearestBar;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_bar_distance", type="integer", nullable=true)
     */
    private $nearestBarDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_bar_distance_unit", type="integer", nullable=true)
     */
    private $nearestBarDistanceUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_ski", type="string", length=255, nullable=true)
     */
    private $nearestSki;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_ski_distance", type="integer", nullable=true)
     */
    private $nearestSkiDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_ski_distance_unit", type="integer", nullable=true)
     */
    private $nearestSkiDistanceUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_golf", type="string", length=255, nullable=true)
     */
    private $nearestGolf;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_golf_distance", type="integer", nullable=true)
     */
    private $nearestGolfDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_golf_distance_unit", type="integer", nullable=true)
     */
    private $nearestGolfDistanceUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_restaurant", type="string", length=255, nullable=true)
     */
    private $nearestRestaurant;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_restaurant_distance", type="integer", nullable=true)
     */
    private $nearestRestaurantDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="nearest_restaurant_distance_unit", type="integer", nullable=true)
     */
    private $nearestRestaurantDistanceUnit;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set car
     *
     * @param string $car
     * @return PlacesActivities
     */
    public function setCar($car)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return string 
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set nearestAirport
     *
     * @param string $nearestAirport
     * @return PlacesActivities
     */
    public function setNearestAirport($nearestAirport)
    {
        $this->nearestAirport = $nearestAirport;

        return $this;
    }

    /**
     * Get nearestAirport
     *
     * @return string 
     */
    public function getNearestAirport()
    {
        return $this->nearestAirport;
    }

    /**
     * Set nearestAirportDistance
     *
     * @param integer $nearestAirportDistance
     * @return PlacesActivities
     */
    public function setNearestAirportDistance($nearestAirportDistance)
    {
        $this->nearestAirportDistance = $nearestAirportDistance;

        return $this;
    }

    /**
     * Get nearestAirportDistance
     *
     * @return integer 
     */
    public function getNearestAirportDistance()
    {
        return $this->nearestAirportDistance;
    }

    /**
     * Set nearestAirportDistanceUnit
     *
     * @param integer $nearestAirportDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestAirportDistanceUnit($nearestAirportDistanceUnit)
    {
        $this->nearestAirportDistanceUnit = $nearestAirportDistanceUnit;

        return $this;
    }

    /**
     * Get nearestAirportDistanceUnit
     *
     * @return integer 
     */
    public function getNearestAirportDistanceUnit()
    {
        return $this->nearestAirportDistanceUnit;
    }

    /**
     * Set nearestBeach
     *
     * @param string $nearestBeach
     * @return PlacesActivities
     */
    public function setNearestBeach($nearestBeach)
    {
        $this->nearestBeach = $nearestBeach;

        return $this;
    }

    /**
     * Get nearestBeach
     *
     * @return string 
     */
    public function getNearestBeach()
    {
        return $this->nearestBeach;
    }

    /**
     * Set nearestBeachDistance
     *
     * @param integer $nearestBeachDistance
     * @return PlacesActivities
     */
    public function setNearestBeachDistance($nearestBeachDistance)
    {
        $this->nearestBeachDistance = $nearestBeachDistance;

        return $this;
    }

    /**
     * Get nearestBeachDistance
     *
     * @return integer 
     */
    public function getNearestBeachDistance()
    {
        return $this->nearestBeachDistance;
    }

    /**
     * Set nearestBeachDistanceUnit
     *
     * @param integer $nearestBeachDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestBeachDistanceUnit($nearestBeachDistanceUnit)
    {
        $this->nearestBeachDistanceUnit = $nearestBeachDistanceUnit;

        return $this;
    }

    /**
     * Get nearestBeachDistanceUnit
     *
     * @return integer 
     */
    public function getNearestBeachDistanceUnit()
    {
        return $this->nearestBeachDistanceUnit;
    }

    /**
     * Set nearestFerry
     *
     * @param string $nearestFerry
     * @return PlacesActivities
     */
    public function setNearestFerry($nearestFerry)
    {
        $this->nearestFerry = $nearestFerry;

        return $this;
    }

    /**
     * Get nearestFerry
     *
     * @return string 
     */
    public function getNearestFerry()
    {
        return $this->nearestFerry;
    }

    /**
     * Set nearestFerryDistance
     *
     * @param integer $nearestFerryDistance
     * @return PlacesActivities
     */
    public function setNearestFerryDistance($nearestFerryDistance)
    {
        $this->nearestFerryDistance = $nearestFerryDistance;

        return $this;
    }

    /**
     * Get nearestFerryDistance
     *
     * @return integer 
     */
    public function getNearestFerryDistance()
    {
        return $this->nearestFerryDistance;
    }

    /**
     * Set nearestFerryDistanceUnit
     *
     * @param integer $nearestFerryDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestFerryDistanceUnit($nearestFerryDistanceUnit)
    {
        $this->nearestFerryDistanceUnit = $nearestFerryDistanceUnit;

        return $this;
    }

    /**
     * Get nearestFerryDistanceUnit
     *
     * @return integer 
     */
    public function getNearestFerryDistanceUnit()
    {
        return $this->nearestFerryDistanceUnit;
    }

    /**
     * Set nearestTrain
     *
     * @param string $nearestTrain
     * @return PlacesActivities
     */
    public function setNearestTrain($nearestTrain)
    {
        $this->nearestTrain = $nearestTrain;

        return $this;
    }

    /**
     * Get nearestTrain
     *
     * @return string 
     */
    public function getNearestTrain()
    {
        return $this->nearestTrain;
    }

    /**
     * Set nearestTrainDistance
     *
     * @param integer $nearestTrainDistance
     * @return PlacesActivities
     */
    public function setNearestTrainDistance($nearestTrainDistance)
    {
        $this->nearestTrainDistance = $nearestTrainDistance;

        return $this;
    }

    /**
     * Get nearestTrainDistance
     *
     * @return integer 
     */
    public function getNearestTrainDistance()
    {
        return $this->nearestTrainDistance;
    }

    /**
     * Set nearestTrainDistanceUnit
     *
     * @param integer $nearestTrainDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestTrainDistanceUnit($nearestTrainDistanceUnit)
    {
        $this->nearestTrainDistanceUnit = $nearestTrainDistanceUnit;

        return $this;
    }

    /**
     * Get nearestTrainDistanceUnit
     *
     * @return integer 
     */
    public function getNearestTrainDistanceUnit()
    {
        return $this->nearestTrainDistanceUnit;
    }

    /**
     * Set nearestHighway
     *
     * @param string $nearestHighway
     * @return PlacesActivities
     */
    public function setNearestHighway($nearestHighway)
    {
        $this->nearestHighway = $nearestHighway;

        return $this;
    }

    /**
     * Get nearestHighway
     *
     * @return string 
     */
    public function getNearestHighway()
    {
        return $this->nearestHighway;
    }

    /**
     * Set nearestHighwayDistance
     *
     * @param integer $nearestHighwayDistance
     * @return PlacesActivities
     */
    public function setNearestHighwayDistance($nearestHighwayDistance)
    {
        $this->nearestHighwayDistance = $nearestHighwayDistance;

        return $this;
    }

    /**
     * Get nearestHighwayDistance
     *
     * @return integer 
     */
    public function getNearestHighwayDistance()
    {
        return $this->nearestHighwayDistance;
    }

    /**
     * Set nearestHighwayDistanceUnit
     *
     * @param integer $nearestHighwayDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestHighwayDistanceUnit($nearestHighwayDistanceUnit)
    {
        $this->nearestHighwayDistanceUnit = $nearestHighwayDistanceUnit;

        return $this;
    }

    /**
     * Get nearestHighwayDistanceUnit
     *
     * @return integer 
     */
    public function getNearestHighwayDistanceUnit()
    {
        return $this->nearestHighwayDistanceUnit;
    }

    /**
     * Set nearestBar
     *
     * @param string $nearestBar
     * @return PlacesActivities
     */
    public function setNearestBar($nearestBar)
    {
        $this->nearestBar = $nearestBar;

        return $this;
    }

    /**
     * Get nearestBar
     *
     * @return string 
     */
    public function getNearestBar()
    {
        return $this->nearestBar;
    }

    /**
     * Set nearestBarDistance
     *
     * @param integer $nearestBarDistance
     * @return PlacesActivities
     */
    public function setNearestBarDistance($nearestBarDistance)
    {
        $this->nearestBarDistance = $nearestBarDistance;

        return $this;
    }

    /**
     * Get nearestBarDistance
     *
     * @return integer 
     */
    public function getNearestBarDistance()
    {
        return $this->nearestBarDistance;
    }

    /**
     * Set nearestBarDistanceUnit
     *
     * @param integer $nearestBarDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestBarDistanceUnit($nearestBarDistanceUnit)
    {
        $this->nearestBarDistanceUnit = $nearestBarDistanceUnit;

        return $this;
    }

    /**
     * Get nearestBarDistanceUnit
     *
     * @return integer 
     */
    public function getNearestBarDistanceUnit()
    {
        return $this->nearestBarDistanceUnit;
    }

    /**
     * Set nearestSki
     *
     * @param string $nearestSki
     * @return PlacesActivities
     */
    public function setNearestSki($nearestSki)
    {
        $this->nearestSki = $nearestSki;

        return $this;
    }

    /**
     * Get nearestSki
     *
     * @return string 
     */
    public function getNearestSki()
    {
        return $this->nearestSki;
    }

    /**
     * Set nearestSkiDistance
     *
     * @param integer $nearestSkiDistance
     * @return PlacesActivities
     */
    public function setNearestSkiDistance($nearestSkiDistance)
    {
        $this->nearestSkiDistance = $nearestSkiDistance;

        return $this;
    }

    /**
     * Get nearestSkiDistance
     *
     * @return integer 
     */
    public function getNearestSkiDistance()
    {
        return $this->nearestSkiDistance;
    }

    /**
     * Set nearestSkiDistanceUnit
     *
     * @param integer $nearestSkiDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestSkiDistanceUnit($nearestSkiDistanceUnit)
    {
        $this->nearestSkiDistanceUnit = $nearestSkiDistanceUnit;

        return $this;
    }

    /**
     * Get nearestSkiDistanceUnit
     *
     * @return integer 
     */
    public function getNearestSkiDistanceUnit()
    {
        return $this->nearestSkiDistanceUnit;
    }

    /**
     * Set nearestGolf
     *
     * @param string $nearestGolf
     * @return PlacesActivities
     */
    public function setNearestGolf($nearestGolf)
    {
        $this->nearestGolf = $nearestGolf;

        return $this;
    }

    /**
     * Get nearestGolf
     *
     * @return string 
     */
    public function getNearestGolf()
    {
        return $this->nearestGolf;
    }

    /**
     * Set nearestGolfDistance
     *
     * @param integer $nearestGolfDistance
     * @return PlacesActivities
     */
    public function setNearestGolfDistance($nearestGolfDistance)
    {
        $this->nearestGolfDistance = $nearestGolfDistance;

        return $this;
    }

    /**
     * Get nearestGolfDistance
     *
     * @return integer 
     */
    public function getNearestGolfDistance()
    {
        return $this->nearestGolfDistance;
    }

    /**
     * Set nearestGolfDistanceUnit
     *
     * @param integer $nearestGolfDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestGolfDistanceUnit($nearestGolfDistanceUnit)
    {
        $this->nearestGolfDistanceUnit = $nearestGolfDistanceUnit;

        return $this;
    }

    /**
     * Get nearestGolfDistanceUnit
     *
     * @return integer 
     */
    public function getNearestGolfDistanceUnit()
    {
        return $this->nearestGolfDistanceUnit;
    }

    /**
     * Set nearestRestaurant
     *
     * @param string $nearestRestaurant
     * @return PlacesActivities
     */
    public function setNearestRestaurant($nearestRestaurant)
    {
        $this->nearestRestaurant = $nearestRestaurant;

        return $this;
    }

    /**
     * Get nearestRestaurant
     *
     * @return string 
     */
    public function getNearestRestaurant()
    {
        return $this->nearestRestaurant;
    }

    /**
     * Set nearestRestaurantDistance
     *
     * @param integer $nearestRestaurantDistance
     * @return PlacesActivities
     */
    public function setNearestRestaurantDistance($nearestRestaurantDistance)
    {
        $this->nearestRestaurantDistance = $nearestRestaurantDistance;

        return $this;
    }

    /**
     * Get nearestRestaurantDistance
     *
     * @return integer 
     */
    public function getNearestRestaurantDistance()
    {
        return $this->nearestRestaurantDistance;
    }

    /**
     * Set nearestRestaurantDistanceUnit
     *
     * @param integer $nearestRestaurantDistanceUnit
     * @return PlacesActivities
     */
    public function setNearestRestaurantDistanceUnit($nearestRestaurantDistanceUnit)
    {
        $this->nearestRestaurantDistanceUnit = $nearestRestaurantDistanceUnit;

        return $this;
    }

    /**
     * Get nearestRestaurantDistanceUnit
     *
     * @return integer 
     */
    public function getNearestRestaurantDistanceUnit()
    {
        return $this->nearestRestaurantDistanceUnit;
    }
}
