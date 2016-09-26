<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fuel
 *
 * @ORM\Table(name="fuel")
 * @ORM\Entity
 */
class Fuel
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
     * @ORM\Column(name="capacity", type="string", length=255)
     */
    private $capacity;

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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\FuelType" , inversedBy = "fuels")
     */
    private $type;

    /*public function getVehicleDetails()
    {
        return $this->vehiclesdetails;
    }*/





    /**
     * Set type
     *
     * @param string $type
     * @return Fuel
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
     * Set capacity
     *
     * @param string $capacity
     * @return Fuel
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return string
     */
    public function getCapacity()
    {
        return $this->capacity;
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
     * @return Status
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





    public function __toString()
    {
        return $this->getName();
    }
}
