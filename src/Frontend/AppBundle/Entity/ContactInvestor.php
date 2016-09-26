<?php

namespace Frontend\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

/**
 * contactfront
 *
 * @ORM\Table(name="contactinvestor")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\ContactInvestorRepository")
 */
class ContactInvestor
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
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;
    
   
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date")
     */
    private $dateCreated;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Status" , inversedBy = "contactsInvestor")
     */
    private $status;

  
    
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;
    
    
      /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serie;
   

     /**
     * @var text
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="replied", type="boolean")
     */
    private $replied;


        /**
     * @Recaptcha\True
     */
    public $recaptcha;
    
    
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
     * @return ContactFront
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
     * Set replied
     *
     * @param boolean $replied
     * @return ContactFront
     */
    public function setReplied($replied)
    {
        $this->replied = $replied;

        return $this;
    }

    /**
     * Get replied
     *
     * @return boolean 
     */
    public function getReplied()
    {
        return $this->replied;
    }

 
    
    /**
     * Set lastName
     *
     * @param string $lastName
     * @return ContactFront
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
     /**
     * Set email
     *
     * @param string $email
     * @return ContactFront
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Inquiries
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Inquiries
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

  

    /**
     * Set phone
     *
     * @param string $phone
     * @return Inquiries
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    
     /**
     * Set text
     *
     * @param string $text
     * @return Inquiries
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }
  
    
      /**
     * Set serie
     *
     * @param string $serie
     * @return ContactOwner
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return string 
     */
    public function getSerie()
    {
        return $this->serie;
    }

}
