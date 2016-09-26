<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Make
 *
 * @ORM\Table(name="trim")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\TrimRepository")
 */
class Trim
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
     * @ORM\Column(name="trim_id", type="string", length=255)
     */
    private $trimId;


    /**
     * @var string
     *
     * @ORM\Column(name="trim_display", type="string", length=255)
     */
    private $trimDisplay;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\VehicleDetails", mappedBy="trim")
     */
    //private $vehiclesdetails;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Model" , inversedBy = "trims")
     */
    private $model;


    /* public function getVehiclesDetails()
     {
         return $this->vehiclesdetails;
     }
    */


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
    public function setTrimId($trimId)
    {
        $this->trimId = $trimId;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getTrimId()
    {
        return $this->trimId;
    }


    /**
     * Set trimD
     *
     * @param string $trimD
     * @return Make
     */
    public function setTrimDisplay($trimD)
    {
        $this->trimDisplay = $trimD;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getTrimDisplay()
    {
        return $this->trimDisplay;
    }


    /**
     * Set model
     *
     * @param string $model
     * @return Make
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }


    public function __toString()
    {
        return $this->getTrimDisplay();
    }
}
