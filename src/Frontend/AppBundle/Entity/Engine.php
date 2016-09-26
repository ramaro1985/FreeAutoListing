<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Engine
 *
 * @ORM\Table(name="engine")
 * @ORM\Entity
 */
class Engine
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="horsepower", type="string", length=255)
     */
    private $horsepower;
    
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="torque", type="string", length=255)
     */
    private $torque;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="full", type="string", length=255)
     */
    private $full;

    /**
     * @return string
     */
    public function getFull()
    {
        return $this->full;
    }

    /**
     * @param string $full
     */
    public function setFull($full)
    {
        $this->full = $full;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\EngineType" , inversedBy = "engines")
     */
    private $type;
   

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\VehicleDetails", mappedBy="engine")
     */
    //private $vehiclesdetails;
    
   
    public function getVehicleDetails()
    {
        return $this->vehiclesdetails;
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
     * Set name
     *
     * @param string $name
     * @return Engine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    
     /**
     * Set type
     *
     * @param string $type
     * @return Engine
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

 
 
      /**
     * Set horsepower
     *
     * @param string $horsepower
     * @return Engine
     */
    public function setHorsePower($horsepower)
    {
        $this->horsepower = $horsepower;

        return $this;
    }

    /**
     * Get horsepower
     *
     * @return string 
     */
    public function getHorsepower()
    {
        return $this->horsepower;
    }

    
      /**
     * Set torque
     *
     * @param string $torque
     * @return Engine
     */
    public function setTorque($torque)
    {
        $this->torque = $torque;

        return $this;
    }

    /**
     * Get torque
     *
     * @return string 
     */
    public function getTorque()
    {
        return $this->torque;
    }
    
    
    public function __toString()
	{
	return $this->getName();
	}
}
