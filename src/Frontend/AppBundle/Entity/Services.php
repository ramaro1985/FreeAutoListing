<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="services")
 * @ORM\Entity
 */
class Services
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
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ProfileServices", mappedBy="services", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     **/
    private $profileservices;




    public function __construct()
    {
        $this->profileservices = new \Doctrine\Common\Collections\ArrayCollection();

    }


    public function getProfileServices()
    {
        return $this->profileservices;
    }

    public function addtProfileServices(ProfileServices $profileServices)
    {
        if (!$this->profileServices->contains($profileServices)) {
            $this->profileServices->add($profileServices);
            $profileServices->setCompany($this);
        }

        return $this;
    }

    public function removeProfileServices(ProfileServices $profileServices)
    {
        $this->profileServices->removeElement($profileServices);
        if ($this->profileServices->contains($profileServices)) {
            $this->profileServices->removeElement($profileServices);
            $profileServices->setCompany(null);
        }

        return $this;
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

    public function getServices(){
        return $this;
    }

    public function setServices(\Doctrine\Common\Collections\ArrayCollection $services){
        $this->services = $services;
    }

    public function _tostring(){
        return "services";
    }
}
