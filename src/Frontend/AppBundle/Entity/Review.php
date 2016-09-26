<?php

namespace Frontend\AppBundle\Entity;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Review
 *
 * @ORM\Table(name="review")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\ReviewRepository")
 */
class Review
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;


    /**
     * @var boolean
     * @ORM\Column(name="purchase", type="boolean")
     */
    private $purchase;

    /**
     * @var float
     *
     * @ORM\Column(name="customerservice", type="float", nullable=true)
     */
     private $customerservice;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="facilities", type="float" ,nullable=true)
     */
    private $facilities;

    /**
     * @var float
     *
     * @ORM\Column(name="overall", type="float", nullable=true)
     */
    private $overall;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", nullable=true)
     */
    private $city;

    /**
     * @Assert\Regex("/^[0-9]{10}/")
     * @Assert\Length(min=1, max=10)
     * @ORM\Column(type="string", length=255, nullable=true )
     */

    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date")
     */
    private $dateCreated;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="date", nullable=true)
     */
    private $dateUpdated;
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_posted", type="date",  nullable=true)
     */
    private $datePosted;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stay_date", type="date" , nullable=true)
     */
    private $stayDate;

    
    
    /**
     * @var string
     *
     * @ORM\Column(name="review_top", type="string", length=255, nullable=true)
     */
    private $reviewTop;

    /**
     * @var string
     *
     * @ORM\Column(name="valoration", type="float", nullable=true)
     */
   // private $valoration;
    
    
    
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Profile" , inversedBy = "reviews")
     */
    private $profile;
    
     /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="viewed", type="boolean")
     */
    private $viewed;
    
      /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=255)
     */
    private $ipAddress;

    
     /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Status" , inversedBy = "reviews")
     */
    private $status;
    
    
     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ReviewReply", mappedBy="review")
     */
    private $replys;
    
    
    /**
     * @Recaptcha\True
     */
    //public $recaptcha;
    
    /**
     * Get replys
     *
     * @return string 
     */
    public function getReplys()
    {
        return $this->replys;
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
     * Set title
     *
     * @param string $title
     * @return Review
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    
     /**
     * Set viewed
     *
     * @param boolean $viewed
     * @return review
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;

        return $this;
    }

    /**
     * Get viewed
     *
     * @return boolean 
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    
     /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return Review
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Review
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
     * Set dateCreated
     *
     * @param \DateTime $date
     * @return Review
     */
    public function setDateCreated($date)
    {
        $this->dateCreated = $date;

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
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Review
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }
    
    
     /**
     * Set datePosted
     *
     * @param \DateTime $datePosted
     * @return Review
     */
    public function setDatePosted($datePosted)
    {
        $this->datePosted = $datePosted;

        return $this;
    }

    /**
     * Get datePosted
     *
     * @return \DateTime 
     */
    public function getDatePosted()
    {
        return $this->datePosted;
    }
    
    
    
    /**
     * Set stayDate
     *
     * @param \DateTime $stayDate
     * @return Review
     */
    public function setStayDate($date)
    {
        $this->stayDate = $date;

        return $this;
    }

    /**
     * Get stayDate
     *
     * @return \DateTime 
     */
    public function getStayDate()
    {
        return $this->stayDate;
    }

    /**
     * Set reviewTop
     *
     * @param string $reviewTop
     * @return Review
     */
    public function setReviewTop($reviewTop)
    {
        $this->reviewTop = $reviewTop;

        return $this;
    }

    /**
     * Get reviewTop
     *
     * @return string 
     */
    public function getReviewTop()
    {
        return $this->reviewTop;
    }

    /**
     * Set valoration
     *
     * @param string $valoration
     * @return Review
     */
    /*public function setValoration($valoration)
    {
        $this->valoration = $valoration;

        return $this;
    }*/

    /**
     * Get valoration
     *
     * @return string 
     */
   /* public function getValoration()
    {
        return $this->valoration;
    }*/
    
    
     /**
     * Set profile
     *
     * @param Frontend\AppBundle\Entity\Profile $profile
     * @return Review
     */
    public function setProfile(\Frontend\AppBundle\Entity\Profile $profile)
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * Get profile
     *
     * @return string 
     */
    public function getProfile()
    {
        return $this->profile;
    }
    
    
    
    /**
     * Set status
     *
     * @param Frontend\AppBundle\Entity\Status $status
     * @return Property
     */
    public function setStatus(\Frontend\AppBundle\Entity\Status $status)
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
     * Set email
     *
     * @param string $email
     * @return Review
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
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return float
     */
    public function getCustomerservice()
    {
        return $this->customerservice;
    }

    /**
     * @param float $customerservice
     */
    public function setCustomerservice($customerservice)
    {
        $this->customerservice = $customerservice;
    }

    /**
     * @return float
     */
    public function getFacilities()
    {
        return $this->facilities;
    }

    /**
     * @param float $facilities
     */
    public function setFacilities($facilities)
    {
        $this->facilities = $facilities;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getOverall()
    {
        return $this->overall;
    }

    /**
     * @param float $overall
     */
    public function setOverall($overall)
    {
        $this->overall = $overall;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return boolean
     */
    public function isPurchase()
    {
        return $this->purchase;
    }

    /**
     * @param boolean $purchase
     */
    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;
    }
    
}
