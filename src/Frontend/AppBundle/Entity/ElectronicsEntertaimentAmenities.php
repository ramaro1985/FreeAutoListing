<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElectronicsEntertaimentAmenities
 *
 * @ORM\Table(name="electronicsentertaimentamenities")
 * @ORM\Entity
 */
class ElectronicsEntertaimentAmenities
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
     * @ORM\Column(name="cableTv", type="boolean")
     */
    private $cableTv;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dialUpInternetAccess", type="boolean")
     */
    private $dialUpInternetAccess;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dvdLibrary", type="boolean")
     */
    private $dvdLibrary;

    /**
     * @var boolean
     *
     * @ORM\Column(name="homeStereo", type="boolean")
     */
    private $homeStereo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="premiunChannels", type="boolean")
     */
    private $premiunChannels;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tv", type="boolean")
     */
    private $tv;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tvGames", type="boolean")
     */
    private $tvGames;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vcrPlayer", type="boolean")
     */
    private $vcrPlayer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wirelessInternetAccess", type="boolean")
     */
    private $wirelessInternetAccess;


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
     * Set cableTv
     *
     * @param boolean $cableTv
     * @return ElectronicsEntertaimentAmenities
     */
    public function setCableTv($cableTv)
    {
        $this->cableTv = $cableTv;

        return $this;
    }

    /**
     * Get cableTv
     *
     * @return boolean 
     */
    public function getCableTv()
    {
        return $this->cableTv;
    }

    /**
     * Set dialUpInternetAccess
     *
     * @param boolean $dialUpInternetAccess
     * @return ElectronicsEntertaimentAmenities
     */
    public function setDialUpInternetAccess($dialUpInternetAccess)
    {
        $this->dialUpInternetAccess = $dialUpInternetAccess;

        return $this;
    }

    /**
     * Get dialUpInternetAccess
     *
     * @return boolean 
     */
    public function getDialUpInternetAccess()
    {
        return $this->dialUpInternetAccess;
    }

    /**
     * Set dvdLibrary
     *
     * @param boolean $dvdLibrary
     * @return ElectronicsEntertaimentAmenities
     */
    public function setDvdLibrary($dvdLibrary)
    {
        $this->dvdLibrary = $dvdLibrary;

        return $this;
    }

    /**
     * Get dvdLibrary
     *
     * @return boolean 
     */
    public function getDvdLibrary()
    {
        return $this->dvdLibrary;
    }

    /**
     * Set homeStereo
     *
     * @param boolean $homeStereo
     * @return ElectronicsEntertaimentAmenities
     */
    public function setHomeStereo($homeStereo)
    {
        $this->homeStereo = $homeStereo;

        return $this;
    }

    /**
     * Get homeStereo
     *
     * @return boolean 
     */
    public function getHomeStereo()
    {
        return $this->homeStereo;
    }

    /**
     * Set premiunChannels
     *
     * @param boolean $premiunChannels
     * @return ElectronicsEntertaimentAmenities
     */
    public function setPremiunChannels($premiunChannels)
    {
        $this->premiunChannels = $premiunChannels;

        return $this;
    }

    /**
     * Get premiunChannels
     *
     * @return boolean 
     */
    public function getPremiunChannels()
    {
        return $this->premiunChannels;
    }

    /**
     * Set tv
     *
     * @param boolean $tv
     * @return ElectronicsEntertaimentAmenities
     */
    public function setTv($tv)
    {
        $this->tv = $tv;

        return $this;
    }

    /**
     * Get tv
     *
     * @return boolean 
     */
    public function getTv()
    {
        return $this->tv;
    }

    /**
     * Set tvGames
     *
     * @param boolean $tvGames
     * @return ElectronicsEntertaimentAmenities
     */
    public function setTvGames($tvGames)
    {
        $this->tvGames = $tvGames;

        return $this;
    }

    /**
     * Get tvGames
     *
     * @return boolean 
     */
    public function getTvGames()
    {
        return $this->tvGames;
    }

    /**
     * Set vcrPlayer
     *
     * @param boolean $vcrPlayer
     * @return ElectronicsEntertaimentAmenities
     */
    public function setVcrPlayer($vcrPlayer)
    {
        $this->vcrPlayer = $vcrPlayer;

        return $this;
    }

    /**
     * Get vcrPlayer
     *
     * @return boolean 
     */
    public function getVcrPlayer()
    {
        return $this->vcrPlayer;
    }

    /**
     * Set wirelessInternetAccess
     *
     * @param boolean $wirelessInternetAccess
     * @return ElectronicsEntertaimentAmenities
     */
    public function setWirelessInternetAccess($wirelessInternetAccess)
    {
        $this->wirelessInternetAccess = $wirelessInternetAccess;

        return $this;
    }

    /**
     * Get wirelessInternetAccess
     *
     * @return boolean 
     */
    public function getWirelessInternetAccess()
    {
        return $this->wirelessInternetAccess;
    }
}
