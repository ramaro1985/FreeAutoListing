<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HomeAmenities
 *
 * @ORM\Table(name="homeamenities")
 * @ORM\Entity
 */
class HomeAmenities
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
     * @var boolean
     *
     * @ORM\Column(name="airConditioned", type="boolean")
     */
    private $airConditioned;

    /**
     * @var boolean
     *
     * @ORM\Column(name="balcony", type="boolean")
     */
    private $balcony;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ceilingFans", type="boolean")
     */
    private $ceilingFans;

    /**
     * @var boolean
     *
     * @ORM\Column(name="petsAllowed", type="boolean")
     */
    private $petsAllowed;

    /**
     * @var boolean
     *
     * @ORM\Column(name="communityExerciseRoom", type="boolean")
     */
    private $communityExerciseRoom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fullkitchen", type="boolean")
     */
    private $fullkitchen;

    /**
     * @var boolean
     *
     * @ORM\Column(name="garage", type="boolean")
     */
    private $garage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="longTermRenters", type="boolean")
     */
    private $longTermRenters;

    /**
     * @var boolean
     *
     * @ORM\Column(name="heater", type="boolean")
     */
    private $heater;

    /**
     * @var boolean
     *
     * @ORM\Column(name="nonSmokingOnly", type="boolean")
     */
    private $nonSmokingOnly;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pool", type="boolean")
     */
    private $pool;

    /**
     * @var boolean
     *
     * @ORM\Column(name="childrenWelcome", type="boolean")
     */
    private $childrenWelcome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="telephone", type="boolean")
     */
    private $telephone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fireplace", type="boolean")
     */
    private $fireplace;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hotTub", type="boolean")
     */
    private $hotTub;

    /**
     * @var boolean
     *
     * @ORM\Column(name="washingMachine", type="boolean")
     */
    private $washingMachine;

    /**
     * @var boolean
     *
     * @ORM\Column(name="parking", type="boolean")
     */
    private $parking;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wheelchairAccessible", type="boolean")
     */
    private $wheelchairAccessible;


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
     * Set airConditioned
     *
     * @param boolean $airConditioned
     * @return HomeAmenities
     */
    public function setAirConditioned($airConditioned)
    {
        $this->airConditioned = $airConditioned;

        return $this;
    }

    /**
     * Get airConditioned
     *
     * @return boolean 
     */
    public function getAirConditioned()
    {
        return $this->airConditioned;
    }

    /**
     * Set balcony
     *
     * @param boolean $balcony
     * @return HomeAmenities
     */
    public function setBalcony($balcony)
    {
        $this->balcony = $balcony;

        return $this;
    }

    /**
     * Get balcony
     *
     * @return boolean 
     */
    public function getBalcony()
    {
        return $this->balcony;
    }

    /**
     * Set ceilingFans
     *
     * @param boolean $ceilingFans
     * @return HomeAmenities
     */
    public function setCeilingFans($ceilingFans)
    {
        $this->ceilingFans = $ceilingFans;

        return $this;
    }

    /**
     * Get ceilingFans
     *
     * @return boolean 
     */
    public function getCeilingFans()
    {
        return $this->ceilingFans;
    }

    /**
     * Set petsAllowed
     *
     * @param boolean $petsAllowed
     * @return HomeAmenities
     */
    public function setPetsAllowed($petsAllowed)
    {
        $this->petsAllowed = $petsAllowed;

        return $this;
    }

    /**
     * Get petsAllowed
     *
     * @return boolean 
     */
    public function getPetsAllowed()
    {
        return $this->petsAllowed;
    }

    /**
     * Set communityExerciseRoom
     *
     * @param boolean $communityExerciseRoom
     * @return HomeAmenities
     */
    public function setCommunityExerciseRoom($communityExerciseRoom)
    {
        $this->communityExerciseRoom = $communityExerciseRoom;

        return $this;
    }

    /**
     * Get communityExerciseRoom
     *
     * @return boolean 
     */
    public function getCommunityExerciseRoom()
    {
        return $this->communityExerciseRoom;
    }

    /**
     * Set fullkitchen
     *
     * @param boolean $fullkitchen
     * @return HomeAmenities
     */
    public function setFullkitchen($fullkitchen)
    {
        $this->fullkitchen = $fullkitchen;

        return $this;
    }

    /**
     * Get fullkitchen
     *
     * @return boolean 
     */
    public function getFullkitchen()
    {
        return $this->fullkitchen;
    }

    /**
     * Set garage
     *
     * @param boolean $garage
     * @return HomeAmenities
     */
    public function setGarage($garage)
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * Get garage
     *
     * @return boolean 
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * Set longTermRenters
     *
     * @param boolean $longTermRenters
     * @return HomeAmenities
     */
    public function setLongTermRenters($longTermRenters)
    {
        $this->longTermRenters = $longTermRenters;

        return $this;
    }

    /**
     * Get longTermRenters
     *
     * @return boolean 
     */
    public function getLongTermRenters()
    {
        return $this->longTermRenters;
    }

    /**
     * Set heater
     *
     * @param boolean $heater
     * @return HomeAmenities
     */
    public function setHeater($heater)
    {
        $this->heater = $heater;

        return $this;
    }

    /**
     * Get heater
     *
     * @return boolean 
     */
    public function getHeater()
    {
        return $this->heater;
    }

    /**
     * Set nonSmokingOnly
     *
     * @param boolean $nonSmokingOnly
     * @return HomeAmenities
     */
    public function setNonSmokingOnly($nonSmokingOnly)
    {
        $this->nonSmokingOnly = $nonSmokingOnly;

        return $this;
    }

    /**
     * Get nonSmokingOnly
     *
     * @return boolean 
     */
    public function getNonSmokingOnly()
    {
        return $this->nonSmokingOnly;
    }

    /**
     * Set pool
     *
     * @param boolean $pool
     * @return HomeAmenities
     */
    public function setPool($pool)
    {
        $this->pool = $pool;

        return $this;
    }

    /**
     * Get pool
     *
     * @return boolean 
     */
    public function getPool()
    {
        return $this->pool;
    }

    /**
     * Set childrenWelcome
     *
     * @param boolean $childrenWelcome
     * @return HomeAmenities
     */
    public function setChildrenWelcome($childrenWelcome)
    {
        $this->childrenWelcome = $childrenWelcome;

        return $this;
    }

    /**
     * Get childrenWelcome
     *
     * @return boolean 
     */
    public function getChildrenWelcome()
    {
        return $this->childrenWelcome;
    }

    /**
     * Set telephone
     *
     * @param boolean $telephone
     * @return HomeAmenities
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return boolean 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set fireplace
     *
     * @param boolean $fireplace
     * @return HomeAmenities
     */
    public function setFireplace($fireplace)
    {
        $this->fireplace = $fireplace;

        return $this;
    }

    /**
     * Get fireplace
     *
     * @return boolean 
     */
    public function getFireplace()
    {
        return $this->fireplace;
    }

    /**
     * Set hotTub
     *
     * @param boolean $hotTub
     * @return HomeAmenities
     */
    public function setHotTub($hotTub)
    {
        $this->hotTub = $hotTub;

        return $this;
    }

    /**
     * Get hotTub
     *
     * @return boolean 
     */
    public function getHotTub()
    {
        return $this->hotTub;
    }

    /**
     * Set washingMachine
     *
     * @param boolean $washingMachine
     * @return HomeAmenities
     */
    public function setWashingMachine($washingMachine)
    {
        $this->washingMachine = $washingMachine;

        return $this;
    }

    /**
     * Get washingMachine
     *
     * @return boolean 
     */
    public function getWashingMachine()
    {
        return $this->washingMachine;
    }

    /**
     * Set parking
     *
     * @param boolean $parking
     * @return HomeAmenities
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return boolean 
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set wheelchairAccessible
     *
     * @param boolean $wheelchairAccessible
     * @return HomeAmenities
     */
    public function setWheelchairAccessible($wheelchairAccessible)
    {
        $this->wheelchairAccessible = $wheelchairAccessible;

        return $this;
    }

    /**
     * Get wheelchairAccessible
     *
     * @return boolean 
     */
    public function getWheelchairAccessible()
    {
        return $this->wheelchairAccessible;
    }
}
