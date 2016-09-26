<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Frontend\AppBundle\Entity\VehiclesOptions;

/**
 * Vehicle
 *
 * @ORM\Table(name="vehicle")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\VehicleRepository")
 */
class Vehicle
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
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Location", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id" )
     */
    //private $location;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\VehicleDescription", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="description_id", referencedColumnName="id")
     */
    //private $description;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\VehicleBasicInformation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="vehicleinformation_id", referencedColumnName="id")
     */
    private $vehiclesinformation;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\VehicleDetails", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="vehiclesdetails_id", referencedColumnName="id")
     */
    private $vehiclesdetails;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Contact", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    //private $contact;


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Profile" , inversedBy = "vehicles" )
     */
    private $profile;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\User" , inversedBy = "vehicles" )
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\User" )
     */
    private $selectByuser;

    /**
     * @return int
     */
    public function getSelectByuser()
    {
        return $this->selectByuser;
    }

    /**
     * @param int $selectByuser
     */
    public function setSelectByuser($selectByuser)
    {
        $this->selectByuser = $selectByuser;
    }


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Status")
     */
    private $status;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Review", mappedBy="vehicles")
     */
    //private $reviews;


    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Specifications", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="specifications_id", referencedColumnName="id")
     */
    //private $specifications;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;


    /**
     * @var integer
     * @ORM\Column(name="views", type="integer", nullable=true )
     */
    private $views;


    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\ProfileRate", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="rating_id", referencedColumnName="id")
     */
    private $rating;


    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string", length=255 )
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="featured", type="boolean", nullable=true )
     */
    private $featured;


    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Gallery" , cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="gallery_id", referencedColumnName="id")
     */
    private $gallery;


    /**
     * @ORM\ManyToMany(targetEntity="Features", mappedBy="vehicles")
     **/
    private $features;

    /**
     * @ORM\ManyToMany(targetEntity="Frontend\AppBundle\Entity\VehiclesOptions")
     * @ORM\JoinTable(name="vehicles_options",
     *      joinColumns={@ORM\JoinColumn(name="vehicles_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="options_id", referencedColumnName="id", unique=false)}
     *      )
     **/
    private $vehiclesoptions;

    /**
     * @var  text
     *
     * @ORM\Column(name="seller_comments", type="string", length=2000, nullable=true)
     */
    private $seller_comments;

    /**
     * @var boolean
     * @ORM\Column(name="full", type="boolean")
     */
    private $full;

    /**
     * @var  text
     *
     * @ORM\Column(name="warranty", type="string", length=2000, nullable=true)
     */
    private $warranty;

    /**
     * @return text
     */
    public function getWarranty()
    {
        return $this->warranty;
    }

    /**
     * @param text $warranty
     */
    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;
    }

    /**
     * @return boolean
     */
    public function isFull()
    {
        return $this->full;
    }

    /**
     * @param boolean $full
     */
    public function setFull($full)
    {
        $this->full = $full;
    }

    /**
     * @return text
     */
    public function getSellerComments()
    {
        return $this->seller_comments;
    }

    /**
     * @param text $seller_comments
     */
    public function setSellerComments($seller_comments)
    {
        $this->seller_comments = $seller_comments;
    }

    /**
     * @return mixed
     */
    public function getVehiclesOptions()
    {
        return $this->vehiclesoptions;
    }

    /**
     * @param mixed $vehiclesoptions
     */
    public function setVehiclesOptions($vehiclesoptions)
    {
        $this->vehiclesoptions = $vehiclesoptions;
    }

    public function addVehiclesOptions($vehiclesoptions)
    {
        $this->vehiclesoptions->add($vehiclesoptions);
    }

    public function removeVehiclesOptions(VehiclesOptions $vehiclesoptions)
    {
        $this->vehiclesoptions->removeElement($vehiclesoptions);
    }

    public function __construct()
    {
        $this->inquiries = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->features = new ArrayCollection();
        $this->vehiclesoptions = new ArrayCollection();
        $this->setFull(false);
        $this->setViews(0);
    }


    public function getFeatures()
    {
        return $this->features;
    }

    public function addFeatures(Features $fe)
    {
        $fe->addVehicle($this); // synchronously updating inverse side
        $this->features->add($fe);
    }

    public function removeFeatures(Features $fe)
    {

        $fe->removeVehicle($this);
        $this->features->removeElement($fe);


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
     * Set location
     *
     * @param string $location
     * @return Property
     */
    public function setLocation(\Frontend\AppBundle\Entity\Location $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }


    /**
     * Set gallery
     *
     * @param Frontend\AppBundle\Entity\Gallery $gallery
     * @return Property
     */
    public function setGallery(\Frontend\AppBundle\Entity\Gallery $gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return string
     */
    public function getGallery()
    {
        return $this->gallery;
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
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }


    /**
     * Get reviews
     *
     * @return string
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    public function getReviewsByStatus($status)
    {
        $reviewsE = new ArrayCollection();
        foreach ($this->reviews as $review) {
            if ($review->getStatus()->getId() == $status) {
                $reviewsE->add($review);
            }
        }

        return $reviewsE;
    }


    /**
     * Get inquiries
     *
     * @return string
     */
    public function getInquiries()
    {
        return $this->inquiries;
    }

    public function getNewInquiries()
    {
        $newInquiries = new ArrayCollection();

        foreach ($this->inquiries as $inquiry) {
            if (!$inquiry->getViewed()) {
                $newInquiries->add($inquiry);
            }
        }

        return $newInquiries;
    }


    public function getNewReviews($status)
    {
        $newReviews = new ArrayCollection();

        foreach ($this->reviews as $review) {
            if (!$review->getViewed() && $review->getStatus()->getId() == $status) {
                $newReviews->add($review);
            }
        }

        return $newReviews;
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


    /**
     * Set views
     *
     * @param $views
     * @return Property
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }


    /**
     * Get views
     *
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }


    /**
     * Set rating
     *
     * @param string $rating
     * @return Property
     */
    public function setRating(\Frontend\AppBundle\Entity\ProfileRate $rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }


    /**
     * Set serie
     *
     * @param string $serie
     * @return Property
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


    /**
     * Set featured
     *
     * @param string $featured
     * @return Property
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured
     *
     * @return string
     */
    public function getFeatured()
    {
        return $this->featured;
    }


    public function __toString()
    {
        return "vehicles";
    }

    /**
     * @return mixed
     */
    public function getVehiclesdetails()
    {
        return $this->vehiclesdetails;
    }

    /**
     * @param mixed $vehiclesdetails
     */
    public function setVehiclesdetails($vehiclesdetails)
    {
        $this->vehiclesdetails = $vehiclesdetails;
    }

    /**
     * @return mixed
     */
    public function getVehiclesinformation()
    {
        return $this->vehiclesinformation;
    }

    /**
     * @param mixed $vehiclesinformation
     */
    public function setVehiclesinformation($vehiclesinformation)
    {
        $this->vehiclesinformation = $vehiclesinformation;
    }

}
