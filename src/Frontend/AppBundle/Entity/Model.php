<?php

namespace Frontend\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Make
 *
 * @ORM\Table(name="model")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\ModelRepository")
 */
class Model
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
     * @ORM\Column(name="model_id", type="string", length=255)
     */
    private $modelId;

    
    
    /**
     * @var string
     *
     * @ORM\Column(name="model_display", type="string", length=255)
     */
    private $modelDisplay;

    
   
   
        /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Make" , inversedBy = "models")
     */
    private $make;
    
    
     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Trim", mappedBy="model")
     */
    private $trims;
    
    
    
      /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\VehicleBasicInformation", mappedBy="model")
     */
    private $vehiclesinformation;
    
     
    public function getTrims()
    {
        return $this->trims;
    }
    
    public function getVehiclesinformation()
    {
        return $this->vehiclesinformation;
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
     * Set modelID
     *
     * @param string $modelID
     * @return Model
     */
    public function setModelId($modelID)
    {
        $this->modelId = $modelID;

        return $this;
    }

    /**
     * Get modelId
     *
     * @return string 
     */
    public function getModelId()
    {
        return $this->modelId;
    }
    
    
     /**
     * Set modelD
     *
     * @param string $modelD
     * @return Model
     */
    public function setModelDisplay($modelD)
    {
        $this->modelDisplay = $modelD;

        return $this;
    }

    /**
     * Get modelD
     *
     * @return string 
     */
    public function getModelDisplay()
    {
        return $this->modelDisplay;
    }

    
    
   /**
     * Set make
     *
     * @param string $make
     * @return Make
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

     public function getMake()
    {
        return $this->make;
    }

 

 
    
    
    
    public function __toString()
	{
	return "model";
	}
}
