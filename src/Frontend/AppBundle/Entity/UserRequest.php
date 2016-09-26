<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserRequest
 *
 * @ORM\Table(name="userrequest")
 * @ORM\Entity
 */
class UserRequest
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
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Profile")
     */
    private $profile;


    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Status" )
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date")
     */
    private $dateCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", nullable=true )
     */
    private $text;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }


    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\User" )
     */
    private $user;


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
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Property
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


    public function __toString()
    {
        return $this->getDescription()->getName();
    }


    public function setUser(\Frontend\AppBundle\Entity\User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }
}
