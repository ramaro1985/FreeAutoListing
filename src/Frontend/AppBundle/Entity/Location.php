<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity
 */
class Location
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
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=true)
     */
    private $route;
    
     /**
     * @var string
     *
     * @ORM\Column(name="property_number", type="string", length=255, nullable=true)
     */
    private $property_number;

     /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

     /**
     * @var string
     *
     * @ORM\Column(name="stateProvince", type="string", length=255, nullable=true)
     */
    private $stateProvince;
    
     /**
     * @var string
     *
     * @ORM\Column(name="stateCode", type="string", length=255, nullable=true)
     */
    private $administrative_area_level_1;
    
    
         /**
     * @var string
     *
     * @ORM\Column(name="administrative_area_level_2", type="string", length=255, nullable=true)
     */
    private $administrative_area_level_2;
    
         /**
     * @var string
     *
     * @ORM\Column(name="administrative_area_level_3", type="string", length=255, nullable=true)
     */
    private $administrative_area_level_3;
    
    
         /**
     * @var string
     *
     * @ORM\Column(name="administrative_area_level_4", type="string", length=255, nullable=true)
     */
    private $administrative_area_level_4;
    
    
         /**
     * @var string
     *
     * @ORM\Column(name="administrative_area_level_5", type="string", length=255, nullable=true)
     */
    private $administrative_area_level_5;

     /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $locality;

     /**
     * @var string
     *
     * @ORM\Column(name="sublocality", type="string", length=255, nullable=true)
     */
    private $sublocality;
       /**
     * @var string
     *
     * @ORM\Column(name="postal_town", type="string", length=255 , nullable=true)
     */
    private $postal_town;
    
           /**
     * @var string
     *
     * @ORM\Column(name="neighborhood", type="string", length=255 , nullable=true)
     */
    private $neighborhood;
    
    
   /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=255 , nullable=true)
     */
    private $postal_code;

    
     /**
     * @var string
     *
     * @ORM\Column(name="postal_code_prefix", type="string", length=255 , nullable=true)
     */
    private $postal_code_prefix;
    
    
       /**
     * @var string
     *
     * @ORM\Column(name="public", type="boolean",  nullable=true)
     */
    private $public;




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
     * Set address
     *
     * @param string $address
     * @return Location
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }
    
     /**
     * Set public
     *
     * @param string $Public
     * @return Location
     */
    public function setPublic($Public)
    {
        $this->public = $Public;

        return $this;
    }

    /**
     * Get public
     *
     * @return string 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set route
     *
     * @param string $address2
     * @return Location
     */
    public function setRoute($address2)
    {
        $this->route = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }

    
     /**
     * Set streetNumber
     *
     * @param string $streetNumber
     * @return Location
     */
    public function setPropertyNumber($streetNumber)
    {
        $this->property_number = $streetNumber;

        return $this;
    }

    /**
     * Get streetNumber
     *
     * @return string 
     */
    public function getPropertyNumber()
    {
        return $this->property_number;
    }

 

    /**
     * Set country
     *
     * @param string $country
     * @return Location
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set stateProvince
     *
     * @param string $stateProvince
     * @return Location
     */
    public function setStateProvince($stateProvince)
    {
        $this->stateProvince = $stateProvince;

        return $this;
    }

    /**
     * Get stateProvince
     *
     * @return string 
     */
    public function getStateProvince()
    {
        return $this->stateProvince;
    }
    
    /**
     * Set stateProvince
     *
     * @param string $stateProvince
     * @return Location
     */
    public function setAdministrativeAreaLevel1($stateCode)
    {
        $this->administrative_area_level_1 = $stateCode;

        return $this;
    }

    /**
     * Get stateProvince
     *
     * @return string 
     */
    public function getAdministrativeAreaLevel1()
    {
        return $this->administrative_area_level_1;
    }
    
    
     /**
     * Set AdministrativeAreaLevel2
     *
     * @param string $stateCode2
     * @return Location
     */
    public function setAdministrativeAreaLevel2($stateCode2)
    {
        $this->administrative_area_level_2 = $stateCode2;

        return $this;
    }

    /**
     * Get AdministrativeAreaLevel2
     *
     * @return string 
     */
    public function getAdministrativeAreaLevel2()
    {
        return $this->administrative_area_level_2;
    }
    
    
    
    /**
     * Set AdministrativeAreaLevel3
     *
     * @param string $stateCode3
     * @return Location
     */
    public function setAdministrativeAreaLevel3($stateCode3)
    {
        $this->administrative_area_level_3 = $stateCode3;

        return $this;
    }

    /**
     * Get AdministrativeAreaLevel3
     *
     * @return string 
     */
    public function getAdministrativeAreaLevel3()
    {
        return $this->administrative_area_level_3;
    }
    
    
    
      /**
     * Set AdministrativeAreaLevel4
     *
     * @param string $stateCode4
     * @return Location
     */
    public function setAdministrativeAreaLevel4($stateCode4)
    {
        $this->administrative_area_level_4 = $stateCode4;

        return $this;
    }

    /**
     * Get AdministrativeAreaLevel4
     *
     * @return string 
     */
    public function getAdministrativeAreaLevel4()
    {
        return $this->administrative_area_level_4;
    }
    
    
    
    
      /**
     * Set AdministrativeAreaLevel5
     *
     * @param string $stateCode5
     * @return Location
     */
    public function setAdministrativeAreaLevel5($stateCode5)
    {
        $this->administrative_area_level_5 = $stateCode5;

        return $this;
    }

    
    
    /**
     * Get AdministrativeAreaLevel5
     *
     * @return string 
     */
    public function getAdministrativeAreaLevel5()
    {
        return $this->administrative_area_level_5;
    }
    
    
     /**
     * Set sublocality
     *
     * @param string $sublocality
     * @return Location
     */
    public function setSublocality($sublocality)
    {
        $this->sublocality = $sublocality;

        return $this;
    }

    
    
    /**
     * Get sublocality
     *
     * @return string 
     */
    public function getSublocality()
    {
        return $this->sublocality;
    }
    
    
    
      /**
     * Set postal_town
     *
     * @param string $postalTown
     * @return Location
     */
    public function setPostalTown($postalTown)
    {
        $this->postal_town = $postalTown;

        return $this;
    }

    /**
     * Get postal_town
     *
     * @return string 
     */
    public function getPostalTown()
    {
        return $this->postal_town;
    }
    
    
    
     /**
     * Set neighborhood
     *
     * @param string $neighborhood
     * @return Location
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * Get neighborhood
     *
     * @return string 
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }
    
    
      
     /**
     * Set postal_code_prefix
     *
     * @param string $CodePrefix
     * @return Location
     */
    public function setPostalCodePrefix($CodePrefix)
    {
        $this->postal_code_prefix = $CodePrefix;

        return $this;
    }

    /**
     * Get postal_code_prefix
     *
     * @return string 
     */
    public function getPostalCodePrefix()
    {
        return $this->postal_code_prefix;
    }



    /**
     * Set city
     *
     * @param string $city
     * @return Location
     */
    public function setLocality($city)
    {
        $this->locality = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getLocality()
    {
        return $this->locality;
    }

   

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Location
     */
    public function setPostalCode($zipCode)
    {
        $this->postal_code = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }
    
    
    public function __toString()
	{
	return $this->getAddress();
	}
}
