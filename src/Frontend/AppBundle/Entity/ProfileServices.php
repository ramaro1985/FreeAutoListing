<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ProfileServices
 *
 * @ORM\Table(name="profileservices")
 * @ORM\Entity
 */
class ProfileServices
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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Profile", inversedBy="profileservices" )
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id", nullable=FALSE)
     */
    private $profiles;

   /* public function __construct()
    {
        $this->profiles = new \Doctrine\Common\Collections\ArrayCollection();
    }*/


    public function getProfiles()
    {
        return $this->profiles;
    }

    public function setProfile(Profile $profile)
    {
        $this->profiles = $profile;
    }

    /*public function removeProfile(Profile $profile)
    {
        $this->profiles->removeElement($profile);
    }*/

    public function __construct()
    {

        //$this->services = new ArrayCollection();

    }

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Services")
     *
     **/
    /**
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Services", inversedBy="profileservices")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id", nullable=FALSE)
     */
    private $services;

    /**
     * Get services
     *
     * @return Frontend\AppBundle\Entity\Services
     */

    public function getServices()
    {
        return $this->services;
    }
    /**
     * Set services
     *
     * @param Frontend\AppBundle\Entity\Services $services
     * @return Property
     */
    public function setServices(\Frontend\AppBundle\Entity\Services $services)
    {
        $this->services = $services;

        return $this;
    }

    /*public function addService(Services $service)
    {
        $service->addProfileServices($this); // synchronously updating inverse side
        $this->services->add($service);
    }

    public function removeService(Services $service)
    {

        $service->removeProfile($this);
        $this->services->removeElement($service);


    }*/


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
     * Set profileId
     *
     * @param integer $profileId
     * @return ProfileServices
     */
    /*public function setProfileId($profileId)
    {
        $this->profileId = $profileId;

        return $this;
    }*/

    /**
     * Get profileId
     *
     * @return integer 
     */
   /* public function getProfileId()
    {
        return $this->profileId;
    }*/

    /**
     * Set serviceId
     *
     * @param integer $serviceId
     * @return ProfileServices
     */
    /*public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;

        return $this;
    }*/

    /**
     * Get serviceId
     *
     * @return integer 
     */
   /* public function getServiceId()
    {
        return $this->serviceId;
    }*/

    /**
     * Set description
     *
     * @param string $description
     * @return ProfileServices
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function _tostring(){
        return "profileservices";
    }
}
