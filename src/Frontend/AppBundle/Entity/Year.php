<?php

namespace Frontend\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;

/**
 * Year
 *
 * @ORM\Table(name="year")
 * @ORM\Entity
 *
 */
class Year
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
     * @var string     *
     *
     * @ORM\Column(name="year", type="string", length=255)
     * @OrderBy({"year" = "DESC"})
     *
     */
    private $year;


     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Make", mappedBy="year")
     */
    private $makes;


    public function __construct()
    {

        $this->makes = new ArrayCollection();
    }

    
      /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\VehicleBasicInformation", mappedBy="year")
     *
     */
    
    private $vehiclesinformation;
    
    
    public function getVehiclesinformation()
    {
        return $this->vehiclesinformation;
    }
    
    
    public function getMakes()
    {
        return $this->makes;
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
     * Set year
     *
     * @param string $year
     * @return Year
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

 
    
    
    
    public function __toString()
	{
	return $this->getYear();
	}
}
