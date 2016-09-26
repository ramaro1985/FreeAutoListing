<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * VehicleDetails
 *
 * @ORM\Table(name="vehicle_details")
 * @ORM\Entity
 */
class VehicleDetails
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Trim" )
     */
    private $trim;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Doors")
     */
    private $doors;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\EngineType")
     */
    private $enginetype;

    /**
     * @return int
     */
    public function getEnginetype()
    {
        return $this->enginetype;
    }

    /**
     * @param int $enginetype
     */
    public function setEnginetype($enginetype)
    {
        $this->enginetype = $enginetype;
    }
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Transmission" )
     */
    private $transmission;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\FuelType")
     */
    private $fueltype;

    /**
     * @return int
     */
    public function getFueltype()
    {
        return $this->fueltype;
    }

    /**
     * @param int $fueltype
     */
    public function setFueltype($fueltype)
    {
        $this->fueltype = $fueltype;
    }

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\VehicleDriveType" , inversedBy = "vehicledetails")
     */
    private $drive;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Colors")
     */
    private $exteriorcolor;

    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Colors")
     */
    private $interiorcolor;

    /**
     * @return int
     */
    public function getDoors()
    {
        return $this->doors;
    }

    /**
     * @param int $doors
     */
    public function setDoors($doors)
    {
        $this->doors = $doors;
    }

    /**
     * @return int
     */
    public function getDrive()
    {
        return $this->drive;
    }

    /**
     * @param int $drive
     */
    public function setDrive($drive)
    {
        $this->drive = $drive;
    }

   /**
     * @return string
     */
    public function getExteriorcolor()
    {
        return $this->exteriorcolor;
    }

    /**
     * @param string $exteriorcolor
     */
    public function setExteriorcolor($exteriorcolor)
    {
        $this->exteriorcolor = $exteriorcolor;
    }

    /**
     * @return string
     */
    public function getInteriorcolor()
    {
        return $this->interiorcolor;
    }

    /**
     * @param string $interiorcolor
     */
    public function setInteriorcolor($interiorcolor)
    {
        $this->interiorcolor = $interiorcolor;
    }

    /**
     * @return int
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * @param int $transmission
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
    }

    /**
     * @return int
     */
    public function getTrim()
    {
        return $this->trim;
    }

    /**
     * @param int $trim
     */
    public function setTrim($trim)
    {
        $this->trim = $trim;
    }



}
