<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rates
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity
 */
class Gallery
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
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ProfileImage", mappedBy="gallery", cascade={"persist", "remove"})
     * @ORM\OrderBy({"orden" = "ASC"})
     */
    private $profileImages;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\VehicleImage", mappedBy="gallery", cascade={"persist", "remove"})
     * @ORM\OrderBy({"orden" = "ASC"})
     */
    private $vehicleImages;


    public function __construct()
    {

        $this->profileImages = new ArrayCollection();
        $this->vehicleImages = new ArrayCollection();

    }


    public function addProfileImage(ProfileImage $image)
    {
        $image->setGallery($this);
        $this->profileImages->add($image);
    }

    public function removeProfileImage(ProfileImage $image)
    {
        $this->profileImages->removeElement($image);
    }

    public function addVehicleImage(VehicleImage $image)
    {
        $image->setGallery($this);
        $this->vehicleImages->add($image);
    }

    public function removeVehicleImage(VehicleImage $image)
    {
        $this->vehicleImages->removeElement($image);
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
     * Get profileImages
     *
     * @return string
     */
    public function getProfileImages()
    {
        return $this->profileImages;
    }
    public function getVehicleImages()
    {
        return $this->vehicleImages;
    }


}
