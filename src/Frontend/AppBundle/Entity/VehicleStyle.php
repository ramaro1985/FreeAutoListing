<?php
/**
 * Created by PhpStorm.
 * User: rafael.leyva
 * Date: 8/27/2015
 * Time: 3:09 PM
 */

namespace Frontend\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * VehicleStyle
 *
 * @ORM\Table(name="vehiclestyle")
 * @ORM\Entity
 */
class VehicleStyle {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\VehicleBasicInformation", mappedBy="bodyStyle")
     */
    private $vehiclesinformation;

    public function getVehiclesinformation()
    {
        return $this->vehiclesinformation;
    }

} 