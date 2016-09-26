<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\StatusRepository")
 */
class Status
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;
    


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Profile", mappedBy="status")
     */
    private $profiles;
    
    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ContactFront", mappedBy="status")
     */
    private $contacts;
    
     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ContactInvestor", mappedBy="status")
     */
    private $contactsInvestor;
    
    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ContactOwner", mappedBy="status")
     */
    private $contactsOwner;
    
   
    
    
     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Review", mappedBy="status")
     */
    private $reviews;
    
    
    
    
    
    
    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\News", mappedBy="status")
     */
    private $news;
    
     /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Blog", mappedBy="status")
     */
    private $blogs;
    
  
    
   
     public function getReviews() {
        return $this->reviews;
    }
      public function getNews() {
        return $this->news;
    }
    
      public function getBlogs() {
        return $this->blogs;
    }
    
    
    public function getProfiles() {
        return $this->profiles;
    }
    
     
    public function getInquiries() {
        return $this->inquiries;
    }
    
     public function getContacts() {
        return $this->contacts;
    }
    
    public function getContactsInvestor() {
        return $this->contactsInvestor;
    }
    
    public function getContactsOwner() {
        return $this->contactsOwner;
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

    /**
     * Set description
     *
     * @param string $description
     * @return Status
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
     * Set type
     *
     * @param integer $type
     * @return Status
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }
    
    
    
    public function __toString()
	{
	return $this->getName();
	}
}
