<?php

namespace Frontend\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Make
 *
 * @ORM\Table(name="make")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\MakeRepository")
 */
class Make
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
     * @ORM\Column(name="make_id", type="string", length=255)
     */
    private $makeId;

    
    
    /**
     * @var string
     *
     * @ORM\Column(name="make_display", type="string", length=255)
     */
    private $makeDisplay;

    
    /**
     * @var string
     *
     * @ORM\Column(name="make_country", type="string", length=255)
     */
    private $makeCountry;

     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Model", mappedBy="make")
     */
     private $models;

    public function __construct()
    {

        $this->models = new ArrayCollection();
    }
    
     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\VehicleBasicInformation", mappedBy="make")
     */
    private $vehiclesinformation;

    
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Year" , inversedBy = "makes")
     */
    private $year;

     
    public function getVehiclesinformation()
    {
        return $this->vehiclesinformation;
    }
       
    public function getModels()
    {
        return $this->models;
    }
    
    
    
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
     * Set makeID
     *
     * @param string $makeID
     * @return Make
     */
    public function setMakeId($makeID)
    {
        $this->makeId = $makeID;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getMakeId()
    {
        return $this->makeId;
    }
    
    
    
     /**
     * Set year
     *
     * @param string $year
     * @return Make
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getYear()
    {
        return $this->year;
    }
    
    
    
     /**
     * Set makeID
     *
     * @param string $makeID
     * @return Make
     */
    public function setMakeDisplay($makeD)
    {
        $this->makeDisplay = $makeD;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getMakeDisplay()
    {
        return $this->makeDisplay;
    }

    
    
      /**
     * Set makeCountry
     *
     * @param string $makeCountry
     * @return Make
     */
    public function setMakeCountry($country)
    {
        $this->makeCountry = $country;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getMakeCountry()
    {
        return $this->makeCountry;
    }


 
    
    
    
    public function __toString()
	{
	return $this->getMakeDisplay();
	}
}
