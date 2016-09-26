<?php

namespace Frontend\AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="boolean", nullable=true)
     */
    private $displayName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="display_email", type="boolean", nullable=true)
     */
    private $displayEmail;

    /**
     * @var string
     * @Assert\Regex("/^[0-9]{10}/")
     * @Assert\Length(min=1, max=10)
     * @ORM\Column(name="phone1", type="string", length=255, nullable=true)
     * 
     */
    private $phone1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="display_phone1", type="boolean", nullable=true)
     */
    private $displayPhone1;

    /**
     * @var string
     * @Assert\Regex("/^[0-9]{10}/")
     * @Assert\Length(min=1, max=10)
     * @ORM\Column(name="phone2", type="string", length=255, nullable=true)
     */
    private $phone2;

    
    /**
     * @var string
     *
     * @ORM\Column(name="display_phone2", type="boolean", nullable=true)
     */
    private $displayPhone2;
    
    /**
     * @var string
     * @Assert\Regex("/^[0-9]{10}/")
     * @Assert\Length(min=1, max=10)
     * @ORM\Column(name="phone3", type="string", length=255, nullable=true)
     */
    private $phone3;

    
     /**
     * @var string
     *
     * @ORM\Column(name="display_phone3", type="boolean", nullable=true)
     */
    private $displayPhone3;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;
    
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="display_fax", type="boolean", nullable=true)
     */
    private $displayFax;
    
     /**
     * @var string
     *
     * @ORM\Column(name="web_page", type="string", length=255, nullable=true)
     */
    private $webPage;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="display_webpage", type="boolean", nullable=true)
     */
    private $displayWebPage;
    
      /**
     * @var string
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Languages", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="languages_id", referencedColumnName="id")
     */
    private $languages;
   
    
    
      /**
     * @var string
     *
     * @ORM\Column(name="contact_type", type="integer")
     */
    private $contactType;
    
      
      /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $countryphonecode;

    
    

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
     * @return Contact
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
    
    
      public function getCountryPhoneCode()
    {
        return $this->countryphonecode;
    }     
    
     public function setCountryPhoneCode($countryphonecode)
    {
        $this->countryphonecode = $countryphonecode;
        return $this;
    }  
    
    
     /**
     * Set name
     *
     * @param string $contactType
     * @return Contact
     */
    public function setContactType($contactType)
    {
        $this->contactType = $contactType;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getContactType()
    {
        return $this->contactType;
    }
    
     /**
     * Set displayName
     *
     * @param string $displayName
     * @return Contact
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }


    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    
    
    
     
     /**
     * Set displayEmail
     *
     * @param string $displayEmail
     * @return Contact
     */
    public function setDisplayEmail($displayEmail)
    {
        $this->displayEmail = $displayEmail;

        return $this;
    }

    /**
     * Get displayEmail
     *
     * @return string 
     */
    public function getDisplayEmail()
    {
        return $this->displayEmail;
    }

    /**
     * Set phone1
     *
     * @param string $phone1
     * @return Contact
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;

        return $this;
    }

    /**
     * Get phone1
     *
     * @return string 
     */
    public function getPhone1()
    {
        return $this->phone1;
    }
    
    
    /**
     * Set displayPhone1
     *
     * @param string $displayPhone1
     * @return Contact
     */
    public function setDisplayPhone1($displayPhone1)
    {
        $this->displayPhone1 = $displayPhone1;

        return $this;
    }

    /**
     * Get displayPhone1
     *
     * @return string 
     */
    public function getDisplayPhone1()
    {
        return $this->displayPhone1;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     * @return Contact
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2
     *
     * @return string 
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    
    
    
     /**
     * Set displayPhone2
     *
     * @param string $displayPhone2
     * @return Contact
     */
    public function setDisplayPhone2($displayPhone2)
    {
        $this->displayPhone2 = $displayPhone2;

        return $this;
    }

    /**
     * Get displayPhone2
     *
     * @return string 
     */
    public function getDisplayPhone2()
    {
        return $this->displayPhone2;
    }
    /**
     * Set phone3
     *
     * @param string $phone3
     * @return Contact
     */
    public function setPhone3($phone3)
    {
        $this->phone3 = $phone3;

        return $this;
    }

    /**
     * Get phone3
     *
     * @return string 
     */
    public function getPhone3()
    {
        return $this->phone3;
    }
    
    
    
     /**
     * Set displayPhone3
     *
     * @param string $displayPhone3
     * @return Contact
     */
    public function setDisplayPhone3($displayPhone3)
    {
        $this->displayPhone3 = $displayPhone3;

        return $this;
    }

    /**
     * Get displayPhone3
     *
     * @return string 
     */
    public function getDisplayPhone3()
    {
        return $this->displayPhone3;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Contact
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }
    
    
    
    /**
     * Set displayFax
     *
     * @param string $displayFax
     * @return Contact
     */
    public function setDisplayFax($displayFax)
    {
        $this->displayFax = $displayFax;

        return $this;
    }

    /**
     * Get displayFax
     *
     * @return string 
     */
    public function getDisplayFax()
    {
        return $this->displayFax;
    }
      /**
     * Set WebPage
     *
     * @param string $WebPage
     * @return Contact
     */
    public function setWebPage($WebPage)
    {
        $this->webPage = $WebPage;

        return $this;
    }

    /**
     * Get webPage
     *
     * @return string 
     */
    public function getWebPage()
    {
        return $this->webPage;
    }
    
    
    
    
    /**
     * Set displayWebPage
     *
     * @param string $displayWebPage
     * @return Contact
     */
    public function setDisplayWebPage($displayWebPage)
    {
        $this->displayWebPage = $displayWebPage;

        return $this;
    }

    /**
     * Get displayWebPage
     *
     * @return string 
     */
    public function getDisplayWebPage()
    {
        return $this->displayWebPage;
    }
      /**
     * Set Language
     *
     * @param string $Language
     * @return Contact
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get Language
     *
     * @return string 
     */
    public function getLanguages()
    {
        return $this->languages;
    }
    
    
    
    
  
    
    
    
}
