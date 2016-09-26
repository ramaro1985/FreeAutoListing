<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Description
 *
 * @ORM\Table(name="description")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\DescriptionRepository")
 */
class Description
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
     * @ORM\Column(name="tagline", type="string", length=255 , nullable=true)
     */
    private $tagline;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255 )
     */
    private $address;

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

   
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text" , nullable=true)
     */
    private $description;

   
          /**
 * @var string
 *
 * @ORM\Column(name="hoursopen", type="text" , nullable=true)
 */
    private $hoursopen;

    /**
     * @var string
     *
     * @ORM\Column(name="hoursclose", type="text" , nullable=true)
     */
    private $hoursclose;
    
    
          /**
     * @var string
     *
     * @ORM\Column(name="why_new", type="text" , nullable=true)
     */
    private $whyBuyNew;

  
          /**
     * @var string
     *
     * @ORM\Column(name="why_used", type="text" , nullable=true)
     */
    private $whyBuyUsed;
    
    
          /**
     * @var string
     *
     * @ORM\Column(name="disclaimer", type="text" , nullable=true)
     */
    private $Disclaimer;

    /**
     * @var string
     * @Assert\Regex("/^[0-9]{10}/")
     * @Assert\Length(min=1, max=10)
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     *
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="web_page", type="string", length=255, nullable=true)
     */
    private $webPage;
    
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
     * @return Description
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

   
  /**
     * Set tagline
     *
     * @param string $tagline
     * @return Description
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;

        return $this;
    }

    /**
     * Get tagline
     *
     * @return string 
     */
    public function getTagline()
    {
        return $this->tagline;
    }
   
   

    /**
     * Set description
     *
     * @param string $description
     * @return Description
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
    
  
     
     /**
 * Set hoursopen
 *
 * @param string $hoursopen
 * @return Profile
 */
    public function setHoursOpen($hoursopen)
    {
        $this->hoursopen = $hoursopen;

        return $this;
    }

    /**
     * Get hoursopen
     *
     * @return string
     */
    public function getHoursOpen()
    {
        return $this->hoursopen;
    }

    /**
     * Set hoursClose
     *
     * @param string $hoursClose
     * @return Profile
     */
    public function setHoursClose($hoursclose)
    {
        $this->hoursclose = $hoursclose;

        return $this;
    }

    /**
     * Get hoursClose
     *
     * @return string
     */
    public function getHoursClose()
    {
        return $this->hoursclose;
    }
    
    
    /**
     * Set whyBuyNew
     *
     * @param string $whyNew
     * @return Profile
     */
    public function setWhyBuyNew($whyNew)
    {
        $this->whyBuyNew = $whyNew;
        return $this;
    }

    /**
     * Get whyBuyNew
     *
     * @return string 
     */
    public function getWhyBuyNew()
    {
        return $this->whyBuyNew;
    }
        
    
    
     
    /**
     * Set whyUsed
     *
     * @param string $whyUsed
     * @return Profile
     */
    public function setWhyBuyUsed($whyUsed)
    {
        $this->whyBuyUsed = $whyUsed;
        return $this;
    }

    /**
     * Get whyUsed
     *
     * @return string 
     */
    public function getWhyBuyUsed()
    {
        return $this->whyBuyUsed;
    }
    
    
     /**
     * Set Disclaimer
     *
     * @param string $Disclaimer
     * @return Profile
     */
    public function setDisclaimer($Disclaimer)
    {
        $this->Disclaimer = $Disclaimer;
        return $this;
    }

    /**
     * Get Disclaimer
     *
     * @return string 
     */
    public function getDisclaimer()
    {
        return $this->Disclaimer;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getWebPage()
    {
        return $this->webPage;
    }

    /**
     * @param string $webPage
     */
    public function setWebPage($webPage)
    {
        $this->webPage = $webPage;
    }
    
}
