<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\EmailRepository")
 */
class Email
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Profile" , inversedBy = "emails")
     */
    private $profile;

    /**
     * Set profile
     *
     * @param Frontend\AppBundle\Entity\Profile $profile
     * @return Profile
     */
    public function setProfile(\Frontend\AppBundle\Entity\Profile $profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return Frontend\AppBundle\Entity\Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\User" , inversedBy = "emails")
     */
    private $user;

    /**
     * Set user
     *
     * @param Frontend\AppBundle\Entity\User $user
     * @return User
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
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Vehicle")
     * @ORM\JoinColumn(name="vehicle_id", referencedColumnName="id")
     */
    private $vehicle;

    /**
     * @return mixed
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @param mixed $vehicle
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="remitent_mail", type="string", length=255 )
     */
    private $remitent_mail;

    /**
     * @var string
     *
     * @ORM\Column(name="remitent_last_name", type="string", length=255 )
     */
    //private $remitent_last_name;

    /**
     * @return string
     */
   /* public function getRemitentLastName()
    {
        return $this->remitent_last_name;
    }*/

    /**
     * @param string $remitent_last_name
     */
   /* public function setRemitentLastName($remitent_last_name)
    {
        $this->remitent_last_name = $remitent_last_name;
    }*/

    /**
     * @return remitent_mail
     */
    public function getRemitentMail()
    {
        return $this->remitent_mail;
    }

    /**
     * @param remitent_mail $remitent_mail
     */
    public function setRemitentMail($remitent_mail)
    {
        $this->remitent_mail = $remitent_mail;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="remitent_name", type="string", length=255 )
     */
    private $remitent_name;

    /**
     * @return string
     */
    public function getRemitentName()
    {
        return $this->remitent_name;
    }

    /**
     * @param string $remitent_name
     */
    public function setRemitentName($remitent_name)
    {
        $this->remitent_name = $remitent_name;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="remitent_phone", type="string", length=25 )
     */
    private $remitent_phone;

    /**
     * @return string
     */
    public function getRemitentPhone()
    {
        return $this->remitent_phone;
    }

    /**
     * @param string $remitent_phone
     */
    public function setRemitentPhone($remitent_phone)
    {
        $this->remitent_phone = $remitent_phone;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255 )
     */
    private $subject;

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @var text
     *
     * @ORM\Column(name="body_mail", type="text", length=1000, nullable=true )
     */
    private $body_mail;

    /**
     * @return text
     */
    public function getBodyMail()
    {
        return $this->body_mail;
    }

    /**
     * @param text $body_mail
     */
    public function setBodyMail($body_mail)
    {
        $this->body_mail = $body_mail;
    }

    /**
     * @var string
     * @Assert\Regex("/^[0-9]{10}/")
     * @ORM\Column(name="offer_text", type="string", length=255, nullable=true)
     *
     */
    private $offer_text;

    /**
     * @return string
     */
    public function getOfferText()
    {
        return $this->offer_text;
    }

    /**
     * @param string $offer_text
     */
    public function setOfferText($offer_text)
    {
        $this->offer_text = $offer_text;
    }

    /**
     * @var boolean
     * @ORM\Column(name="offer", type="boolean")
     */
    private $offer;

    /**
     * @return boolean
     */
    public function isOffer()
    {
        return $this->offer;
    }

    /**
     * @param boolean $offer
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;
    }



    /**
     * @var boolean
     * @ORM\Column(name="opened", type="boolean")
     */
    private $opened;

    /**
     * @return boolean
     */
    public function isOpened()
    {
        return $this->opened;
    }

    /**
     * @param boolean $opened
     */
    public function setOpened($opened)
    {
        $this->opened = $opened;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }


}
