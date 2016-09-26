<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KitchenAmenities
 *
 * @ORM\Table(name="kitchenamenities")
 * @ORM\Entity
 */
class KitchenAmenities
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
     * @ORM\Column(name="blender", type="boolean")
     */
    private $blender;

    /**
     * @var boolean
     *
     * @ORM\Column(name="coffeMaker", type="boolean")
     */
    private $coffeMaker;

    /**
     * @var boolean
     *
     * @ORM\Column(name="freezer", type="boolean")
     */
    private $freezer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="garbageDisposal", type="boolean")
     */
    private $garbageDisposal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="kitchenUtensils", type="boolean")
     */
    private $kitchenUtensils;

    /**
     * @var boolean
     *
     * @ORM\Column(name="potsPans", type="boolean")
     */
    private $potsPans;

    /**
     * @var boolean
     *
     * @ORM\Column(name="toaster", type="boolean")
     */
    private $toaster;

    /**
     * @var boolean
     *
     * @ORM\Column(name="oven", type="boolean")
     */
    private $oven;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dishwasher", type="boolean")
     */
    private $dishwasher;

    /**
     * @var boolean
     *
     * @ORM\Column(name="stove", type="boolean")
     */
    private $stove;

    /**
     * @var boolean
     *
     * @ORM\Column(name="microwave", type="boolean")
     */
    private $microwave;

    /**
     * @var boolean
     *
     * @ORM\Column(name="grill", type="boolean")
     */
    private $grill;


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
     * Set blender
     *
     * @param boolean $blender
     * @return KitchenAmenities
     */
    public function setBlender($blender)
    {
        $this->blender = $blender;

        return $this;
    }

    /**
     * Get blender
     *
     * @return boolean 
     */
    public function getBlender()
    {
        return $this->blender;
    }

    /**
     * Set coffeMaker
     *
     * @param boolean $coffeMaker
     * @return KitchenAmenities
     */
    public function setCoffeMaker($coffeMaker)
    {
        $this->coffeMaker = $coffeMaker;

        return $this;
    }

    /**
     * Get coffeMaker
     *
     * @return boolean 
     */
    public function getCoffeMaker()
    {
        return $this->coffeMaker;
    }

    /**
     * Set freezer
     *
     * @param boolean $freezer
     * @return KitchenAmenities
     */
    public function setFreezer($freezer)
    {
        $this->freezer = $freezer;

        return $this;
    }

    /**
     * Get freezer
     *
     * @return boolean 
     */
    public function getFreezer()
    {
        return $this->freezer;
    }

    /**
     * Set garbageDisposal
     *
     * @param boolean $garbageDisposal
     * @return KitchenAmenities
     */
    public function setGarbageDisposal($garbageDisposal)
    {
        $this->garbageDisposal = $garbageDisposal;

        return $this;
    }

    /**
     * Get garbageDisposal
     *
     * @return boolean 
     */
    public function getGarbageDisposal()
    {
        return $this->garbageDisposal;
    }

    /**
     * Set kitchenUtensils
     *
     * @param boolean $kitchenUtensils
     * @return KitchenAmenities
     */
    public function setKitchenUtensils($kitchenUtensils)
    {
        $this->kitchenUtensils = $kitchenUtensils;

        return $this;
    }

    /**
     * Get kitchenUtensils
     *
     * @return boolean 
     */
    public function getKitchenUtensils()
    {
        return $this->kitchenUtensils;
    }

    /**
     * Set potsPans
     *
     * @param boolean $potsPans
     * @return KitchenAmenities
     */
    public function setPotsPans($potsPans)
    {
        $this->potsPans = $potsPans;

        return $this;
    }

    /**
     * Get potsPans
     *
     * @return boolean 
     */
    public function getPotsPans()
    {
        return $this->potsPans;
    }

    /**
     * Set toaster
     *
     * @param boolean $toaster
     * @return KitchenAmenities
     */
    public function setToaster($toaster)
    {
        $this->toaster = $toaster;

        return $this;
    }

    /**
     * Get toaster
     *
     * @return boolean 
     */
    public function getToaster()
    {
        return $this->toaster;
    }

    /**
     * Set oven
     *
     * @param boolean $oven
     * @return KitchenAmenities
     */
    public function setOven($oven)
    {
        $this->oven = $oven;

        return $this;
    }

    /**
     * Get oven
     *
     * @return boolean 
     */
    public function getOven()
    {
        return $this->oven;
    }

    /**
     * Set dishwasher
     *
     * @param boolean $dishwasher
     * @return KitchenAmenities
     */
    public function setDishwasher($dishwasher)
    {
        $this->dishwasher = $dishwasher;

        return $this;
    }

    /**
     * Get dishwasher
     *
     * @return boolean 
     */
    public function getDishwasher()
    {
        return $this->dishwasher;
    }

    /**
     * Set stove
     *
     * @param boolean $stove
     * @return KitchenAmenities
     */
    public function setStove($stove)
    {
        $this->stove = $stove;

        return $this;
    }

    /**
     * Get stove
     *
     * @return boolean 
     */
    public function getStove()
    {
        return $this->stove;
    }

    /**
     * Set microwave
     *
     * @param boolean $microwave
     * @return KitchenAmenities
     */
    public function setMicrowave($microwave)
    {
        $this->microwave = $microwave;

        return $this;
    }

    /**
     * Get microwave
     *
     * @return boolean 
     */
    public function getMicrowave()
    {
        return $this->microwave;
    }

    /**
     * Set grill
     *
     * @param boolean $grill
     * @return KitchenAmenities
     */
    public function setGrill($grill)
    {
        $this->grill = $grill;

        return $this;
    }

    /**
     * Get grill
     *
     * @return boolean 
     */
    public function getGrill()
    {
        return $this->grill;
    }
}
