<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactFrontReply
 *
 * @ORM\Table(name="contactfrontreply")
 * @ORM\Entity
 */
class ContactFrontReply
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
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\ContactFront" , inversedBy = "replys")
     */
    
    private $contact;
    
    
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\User" , inversedBy = "contactReplys")
     */
    
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;


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
     * Set contact
     *
     * @param integer $contact
     * @return ContactReply
     */
    public function setContact(\Frontend\AppBundle\Entity\ContactFront $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return integer 
     */
    public function getContact()
    {
        return $this->contact;
    }
    
    /**
     * Set user
     *
     * @param integer $user
     * @return ContactReply
     */
    public function setUser(\Frontend\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }
    

    /**
     * Set text
     *
     * @param string $text
     * @return InquiryReply
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return InquiryReply
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
}
