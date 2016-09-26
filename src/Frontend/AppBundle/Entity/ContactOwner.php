<?php

namespace Frontend\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

/**
 * contactowner
 *
 * @ORM\Table(name="contactowner")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\ContactOwnerRepository")
 */
class ContactOwner
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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\User" , inversedBy = "userContactsOwner")
     */
    private $user;
    

    /**
     * @var boolean
     *
     * @ORM\Column(name="replied", type="boolean")
     */
    private $replied;
    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date")
     */
    private $dateCreated;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Status" , inversedBy = "contactsOwner")
     */
    private $status;

  

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
     * @Recaptcha\True
     */
    public $recaptcha;
    
     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ContactOwnerReply", mappedBy="contact")
     */
    protected $replys;
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
     * Set user
     *
     * @param Frontend\AppBundle\Entity\User $user
     * @return ContactOwner
     */
    public function setUser(\Frontend\AppBundle\Entity\User $user)
    {
        $this->user = $user;
        return $this;
    }

     /**
     * Get user
     *
     * @return Frontend\AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
 
   
    /**
     * Set replied
     *
     * @param boolean $replied
     * @return ContactOwner
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return 
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
     * @return 
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
     * Set text
     *
     * @param string $text
     * @return 
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
    
    
      public function getReplys() {
        return $this->replys;
    }
    
    
    
  

}
