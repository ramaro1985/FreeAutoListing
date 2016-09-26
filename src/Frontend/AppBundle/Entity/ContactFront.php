<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
//use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

/**
 * contactfront
 *
 * @ORM\Table(name="contactfront")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\ContactFrontRepository")
 */
class ContactFront
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
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Status" , inversedBy = "contacts")
     */
    private $status;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_type", type="string" , length=255, nullable=true)
     */
    private $userType;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;


    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255,nullable=true)
     */
    private $subject;
    /**
     * @var text
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="property_serie", type="string", length=7, nullable=true)
     */
    private $property;


    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255, nullable=true)
     */
    private $file_name;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ContactFrontReply", mappedBy="contact")
     */
     protected $replys;

    /**
     * @return mixed
     */
    public function getReplys()
    {
        return $this->replys;
    }

    /**
     * @param mixed $replys
     */
    public function setReplys($replys)
    {
        $this->replys = $replys;
    }


    /**
     * @var File
     *
     * @Assert\File(maxSize = "1M")
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="contacttime", type="text" , nullable=true)
     */

    private $contacttime;

    /**
     * @return string
     */
    public function getContacttime()
    {
        return $this->contacttime;
    }

    /**
     * @param string $contacttime
     */
    public function setContacttime($contacttime)
    {
        $this->contacttime = $contacttime;
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


    public function getPath()
    {
        return $this->path;
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
     * Set subject
     *
     * @param string $subject
     * @return ContactFront
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @var boolean
     * @ORM\Column(name="replied", type="boolean", nullable=true)
     */
    private $replied;

    /**
     * @return boolean
     */
    public function isReplied()
    {
        return $this->replied;
    }

    /**
     * @param boolean $replied
     */
    public function setReplied($replied)
    {
        $this->replied = $replied;
    }
    /**
     * Set userType
     *
     * @param string $type
     * @return ContactFront
     */
    public function setUserType($type)
    {
        $this->userType = $type;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->userType;
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
     * Set property
     *
     * @param $property
     * @return Inquirie
     */
    public function setProperty($property)
    {
        $this->property = $property;
        return $this;
    }

    /**
     * Get property
     *
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }


    /**
     * Set file_name
     *
     * @param string $file_name
     * @return file_name
     */
    public function setFileName($fileName)
    {
        $this->file_name = $fileName;

        return $this;
    }

    /**
     * Get file_name
     *
     * @return integer
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Owner
     */
    public function setPhoto(UploadedFile $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }


   /* public function getReplys()
    {
        return $this->replys;
    }*/


    /**
     * Set path
     *
     * @param string $path
     * @return Description
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }


    /**
     * Set serie
     *
     * @param string $serie
     * @return ContactFront
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


    public function getAbsolutePath()
    {
        // return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
        return null === $this->path ? null : 'uploads/images' . '/' . $this->path;
        //return null === $this->path ? null : $this->path;
    }


    public function getWebPath()
    {
        // return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
        return null === $this->path ? null : $this->path;

    }

    public function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        //$em = $this->getDoctrine()->getManager();
        //return __DIR__.'/../../../../web/'.$this->getUploadDir();
        return '';
    }

    public function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '';
    }


    public function upload($dir, $ipath)
    {


        if (null === $this->getPhoto()) {
            return;
        }

        $img_n = $this->getPhoto()->getClientOriginalName();

        $this->path = $ipath . $img_n;
        $this->file_name = $img_n;

        $path = $this->path;

        $this->getPhoto()->move($dir, $img_n);

        $this->photo = null;


        return true;
    }
}
