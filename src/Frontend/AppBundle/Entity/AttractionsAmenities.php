<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttractionsAmenities
 *
 * @ORM\Table(name="attractionsamenities")
 * @ORM\Entity
 */
class AttractionsAmenities
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
     * @ORM\Column(name="barNightClub", type="boolean")
     */
    private $barNightClub;

    /**
     * @var boolean
     *
     * @ORM\Column(name="beach", type="boolean")
     */
    private $beach;

    /**
     * @var boolean
     *
     * @ORM\Column(name="casino", type="boolean")
     */
    private $casino;

    /**
     * @var boolean
     *
     * @ORM\Column(name="charterBoats", type="boolean")
     */
    private $charterBoats;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deepSeaFishing", type="boolean")
     */
    private $deepSeaFishing;

    /**
     * @var boolean
     *
     * @ORM\Column(name="airports", type="boolean")
     */
    private $airports;

    /**
     * @var boolean
     *
     * @ORM\Column(name="horsebackRiding", type="boolean")
     */
    private $horsebackRiding;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shopping", type="boolean")
     */
    private $shopping;

    /**
     * @var boolean
     *
     * @ORM\Column(name="snorkeling", type="boolean")
     */
    private $snorkeling;


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
     * Set barNightClub
     *
     * @param boolean $barNightClub
     * @return AttractionsAmenities
     */
    public function setBarNightClub($barNightClub)
    {
        $this->barNightClub = $barNightClub;

        return $this;
    }

    /**
     * Get barNightClub
     *
     * @return boolean 
     */
    public function getBarNightClub()
    {
        return $this->barNightClub;
    }

    /**
     * Set beach
     *
     * @param boolean $beach
     * @return AttractionsAmenities
     */
    public function setBeach($beach)
    {
        $this->beach = $beach;

        return $this;
    }

    /**
     * Get beach
     *
     * @return boolean 
     */
    public function getBeach()
    {
        return $this->beach;
    }

    /**
     * Set casino
     *
     * @param boolean $casino
     * @return AttractionsAmenities
     */
    public function setCasino($casino)
    {
        $this->casino = $casino;

        return $this;
    }

    /**
     * Get casino
     *
     * @return boolean 
     */
    public function getCasino()
    {
        return $this->casino;
    }

    /**
     * Set charterBoats
     *
     * @param boolean $charterBoats
     * @return AttractionsAmenities
     */
    public function setCharterBoats($charterBoats)
    {
        $this->charterBoats = $charterBoats;

        return $this;
    }

    /**
     * Get charterBoats
     *
     * @return boolean 
     */
    public function getCharterBoats()
    {
        return $this->charterBoats;
    }

    /**
     * Set deepSeaFishing
     *
     * @param boolean $deepSeaFishing
     * @return AttractionsAmenities
     */
    public function setDeepSeaFishing($deepSeaFishing)
    {
        $this->deepSeaFishing = $deepSeaFishing;

        return $this;
    }

    /**
     * Get deepSeaFishing
     *
     * @return boolean 
     */
    public function getDeepSeaFishing()
    {
        return $this->deepSeaFishing;
    }

    /**
     * Set airports
     *
     * @param boolean $airports
     * @return AttractionsAmenities
     */
    public function setAirports($airports)
    {
        $this->airports = $airports;

        return $this;
    }

    /**
     * Get airports
     *
     * @return boolean 
     */
    public function getAirports()
    {
        return $this->airports;
    }

    /**
     * Set horsebackRiding
     *
     * @param boolean $horsebackRiding
     * @return AttractionsAmenities
     */
    public function setHorsebackRiding($horsebackRiding)
    {
        $this->horsebackRiding = $horsebackRiding;

        return $this;
    }

    /**
     * Get horsebackRiding
     *
     * @return boolean 
     */
    public function getHorsebackRiding()
    {
        return $this->horsebackRiding;
    }

    /**
     * Set shopping
     *
     * @param boolean $shopping
     * @return AttractionsAmenities
     */
    public function setShopping($shopping)
    {
        $this->shopping = $shopping;

        return $this;
    }

    /**
     * Get shopping
     *
     * @return boolean 
     */
    public function getShopping()
    {
        return $this->shopping;
    }

    /**
     * Set snorkeling
     *
     * @param boolean $snorkeling
     * @return AttractionsAmenities
     */
    public function setSnorkeling($snorkeling)
    {
        $this->snorkeling = $snorkeling;

        return $this;
    }

    /**
     * Get snorkeling
     *
     * @return boolean 
     */
    public function getSnorkeling()
    {
        return $this->snorkeling;
    }
}
