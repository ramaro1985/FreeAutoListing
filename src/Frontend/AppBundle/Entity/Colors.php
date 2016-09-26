<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Colors
 *
 * @ORM\Table(name="colors")
 * @ORM\Entity
 */
class Colors
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
     * @ORM\Column(name="colorname", type="string", length=255)
     */
    private $colorname;

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
     * Set colorname
     *
     * @param string $colorname
     * @return Colors
     */
    public function setColorname($colorname)
    {
        $this->colorname = $colorname;

        return $this;
    }

    /**
     * Get colorname
     *
     * @return string
     */
    public function getColorname()
    {
        return $this->colorname;
    }


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\VehicleDetails", mappedBy="drive")
     */
    private $vehicledetails;

    public function __toString()
    {
        return $this->getColorname() ;
    }


}
