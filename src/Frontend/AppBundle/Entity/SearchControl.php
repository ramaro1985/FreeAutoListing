<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SearchControl
 *
 * @ORM\Table(name="searchcontrol")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\SearchControlRepository")
 */
class SearchControl
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
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="country_slug", type="string", length=255, nullable=true)
     */
    private $countrySlug;

     /**
     * @var string
     *
     * @ORM\Column(name="stateProvince", type="string", length=255, nullable=true)
     */
    private $stateProvince;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="stateProvince_slug", type="string", length=255, nullable=true)
     */
    private $stateProvinceSlug;
   

     /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $locality;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="city_slug", type="string", length=255, nullable=true)
     */
    private $localitySlug;
    
    
         /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=255, nullable=true)
     */
    private $serial;
    
           /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=255, nullable=true)
     */
    private $IP;

    
               /**
     * @var string
     *
     * @ORM\Column(name="count", type="string", length=255, nullable=true)
     */
    private $count;


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
     * Set countrySlug
     *
     * @param string $countrySlug
     * @return Location
     */
    public function setCountrySlug($countrySlug)
    {
        $this->countrySlug = $countrySlug;

        return $this;
    }

    /**
     * Get countrySlug
     *
     * @return string 
     */
    public function getCountrySlug()
    {
        return $this->countrySlug;
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
     * Set stateProvinceSlug
     *
     * @param string $stateProvinceSlug
     * @return Location
     */
    public function setStateProvinceSlug($stateProvinceSlug)
    {
        $this->stateProvinceSlug = $stateProvinceSlug;

        return $this;
    }

    /**
     * Get stateProvinceSlug
     *
     * @return string 
     */
    public function getStateProvinceSlug()
    {
        return $this->stateProvinceSlug;
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
     * Set citySlug
     *
     * @param string $citySlug
     * @return Location
     */
    public function setLocalitySlug($citySlug)
    {
        $this->localitySlug = $citySlug;

        return $this;
    }

    /**
     * Get citySlug
     *
     * @return string 
     */
    public function getLocalitySlug()
    {
        return $this->localitySlug;
    }
 


    /**
     * Set serial
     *
     * @param string $serial
     * @return Location
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }
    
    
     /**
     * Set IP
     *
     * @param string $ip
     * @return Location
     */
    public function setIp($ip)
    {
        $this->IP = $ip;

        return $this;
    }

    /**
     * Get IP
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->IP;
    }
    
    
      /**
     * Set count
     *
     * @param string $count
     * @return Location
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return string 
     */
    public function getCount()
    {
        return $this->count;
    }
    
   
}
