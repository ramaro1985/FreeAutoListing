<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amenities
 *
 * @ORM\Table(name="amenities")
 * @ORM\Entity
 */
class Amenities
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
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\HomeAmenities", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="home_amenities_id", referencedColumnName="id")
     */
    private $homeAmenities;

     /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\ElectronicsEntertaimentAmenities", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="electronics_entertaiment_id", referencedColumnName="id")
     */
    private $electronicsEntertaimentAmenities;

     /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\KitchenAmenities", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="kitchen_amenities_id", referencedColumnName="id")
     */
    private $kitchenAmenities;

     /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\AttractionsAmenities", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="attractions_amenities_id", referencedColumnName="id")
     */
    private $attractionsAmenities;

    
    
    /**
     * @var string
     *
     * @ORM\Column(name="additional_info", type="text", nullable=true)
     */
    private $additionalInfo;


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
     * Set homeAmenities
     *
     * @param string $homeAmenities
     * @return Amenities
     */
    public function setHomeAmenities(\Frontend\AppBundle\Entity\HomeAmenities $homeAmenities)
    {
        $this->homeAmenities = $homeAmenities;

        return $this;
    }

    /**
     * Get homeAmenities
     *
     * @return string 
     */
    public function getHomeAmenities()
    {
        return $this->homeAmenities;
    }
    
   
    
    /**
     * Set electronicsEntertaimentAmenities
     *
     * @param string $electronicsEntertaimentAmenities
     * @return Amenities
     */
    public function setElectronicsEntertaimentAmenities(\Frontend\AppBundle\Entity\ElectronicsEntertaimentAmenities $electronicsEntertaimentAmenities)
    {
        $this->electronicsEntertaimentAmenities = $electronicsEntertaimentAmenities;

        return $this;
    }

    /**
     * Get electronicsEntertaimentAmenities
     *
     * @return string 
     */
    public function getElectronicsEntertaimentAmenities()
    {
        return $this->electronicsEntertaimentAmenities;
    }
    
    
    
    
      /**
     * Set kitchenAmenities
     *
     * @param string $kitchenAmenities
     * @return Amenities
     */
    public function setKitchenAmenities(\Frontend\AppBundle\Entity\KitchenAmenities $kitchenAmenities)
    {
        $this->kitchenAmenities = $kitchenAmenities;

        return $this;
    }

    /**
     * Get kitchenAmenities
     *
     * @return string 
     */
    public function getKitchenAmenities()
    {
        return $this->kitchenAmenities;
    }

    
    
       /**
     * Set attractionsAmenities
     *
     * @param string $attractionsAmenities
     * @return Amenities
     */
    public function setAttractionsAmenities(\Frontend\AppBundle\Entity\AttractionsAmenities $attractionsAmenities)
    {
        $this->attractionsAmenities = $attractionsAmenities;

        return $this;
    }

    /**
     * Get attractionsAmenities
     *
     * @return string 
     */
    public function getAttractionsAmenities()
    {
        return $this->attractionsAmenities;
    }
    
    
    /**
     * Set additionalInfo
     *
     * @param string $additionalInfo
     * @return Amenities
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;

        return $this;
    }

    /**
     * Get additionalInfo
     *
     * @return string 
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }
}
