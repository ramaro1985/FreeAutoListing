<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Persistence\ObjectManager;
use Frontend\AppBundle\Entity\ProfileServices;
use Frontend\AppBundle\Entity\Email;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\ProfileRepository")
 */
class Profile
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
    private $location;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Gallery", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="gallery_id", referencedColumnName="id" )
     */
    private $gallery;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Description", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="description_id", referencedColumnName="id")
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Contact", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\User" , inversedBy = "userProfiles")
     */
    private $user;


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Status" , inversedBy = "profiles")
     */
    private $status;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Review", mappedBy="profile", cascade={"persist", "remove"})
     */
    private $reviews;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_update", type="date")
     */
    private $dateUpdate;

    /**
     * @return \DateTime
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * @param \DateTime $dateUpdate
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
    }


    /**
     * @var integer
     * @ORM\Column(name="views", type="integer", nullable=true )
     */
    private $views;


    /**
     * @var integer
     * @ORM\Column(name="full", type="integer" )
     */
    private $full;


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
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=255, nullable=true)
     */
    private $file_name;

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

    private $logo;

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->getPath();
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @ORM\OneToMany(targetEntity="Profile", mappedBy="parent")
     **/
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Profile", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ProfileServices", mappedBy="profiles" ,cascade={"persist","remove"}, orphanRemoval=TRUE )
     **/
    private $profileservices;

    protected $services;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Feeds", cascade={"persist", "remove"})
     */
    private $feeds;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\Amenities" , cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="amenities_id", referencedColumnName="id")
     */
    // private $amenities;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Vehicle", mappedBy="profile", cascade={"persist", "remove"})
     */

    private $vehicles;

    /**
     * @ORM\OneToOne(targetEntity="Frontend\AppBundle\Entity\UsefulInformation", cascade={"persist", "remove"})
     */
    private $usefulinformation;

    /**
     * @return mixed
     */

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Email", mappedBy="profile", cascade={"persist", "remove"})
     */

    private $emails;

    public function getUsefulinformation()
    {
        return $this->usefulinformation;
    }

    /**
     * @param mixed $usefulinformation
     */
    public function setUsefulinformation($usefulinformation)
    {
        $this->usefulinformation = $usefulinformation;
    }


    public function __construct()
    {

        $this->inquiries = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->profileservices = new ArrayCollection();

        $this->gallery = new Gallery();
        $this->services = new ArrayCollection();
        $this->descriptionList = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
        $this->emails = new ArrayCollection();

    }

    // Important
    public function getServices()
    {
        $services = new ArrayCollection();

        foreach ($this->profileservices as $p) {
            $services[] = $p->getServices();
        }

        return $services;
    }

    // Important
    public function setServices($services)
    {
        $this->services = $services;


    }

    public function HasService($profileServices, $service)
    {
        foreach ($profileServices as $profservice) {
            if ($profservice->getServices()->getId() == $service->getId()) {
                return $profservice;
            }
        }

        return null;
    }


    public function getVehicles()
    {
        return $this->vehicles;
    }

    public function getVehiclesComplete()
    {
        $result = new ArrayCollection();
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->isFull())
                $result->add($vehicle);
        }
        return $result;
    }

    public function addProfileVehicles(Vehicle $vehicle)
    {
        if (!$this->vehicles->contains($vehicle)) {
            $vehicle->setProfile($this); // synchronously updating inverse side
            $this->vehicles->add($vehicle);
        }

    }

    public function getEmails()
    {
        return $this->emails;
    }

    public function addProfileEmails(Email $email)
    {
        if (!$this->emails->contains($email)) {
            $email->setProfile($this); // synchronously updating inverse side
            $this->emails->add($email);

        }

    }

    public function removeProfileEmails(Email $email)
    {


        return $this->emails->removeElement($email);

    }

    public function removeProfileVehicles(Vehicle $vehicle)
    {


        return $this->vehicles->removeElement($vehicle);

    }

    /**
     * Get profileservices
     *
     * @return Frontend\AppBundle\Entity\ProfileServices
     */

    public function getProfileServices()
    {
        return $this->profileservices;
    }

    /**
     * Set profileservices
     *
     * @param Frontend\AppBundle\Entity\ProfileServices $profileservices
     * @return Profile
     */
    public function setProfileServices(\Frontend\AppBundle\Entity\ProfileServices $profileservices)
    {
        if (is_array($profileservices)) {
            $this->profileservices = $profileservices;
        } else {
            $this->profileservices->clear();
            $this->profileservices->add($profileservices);
        }

        return $this;
    }

    public function addProfileServices(ProfileServices $profileservices)
    {
        if (!$this->profileservices->contains($profileservices)) {
            $profileservices->setProfile($this); // synchronously updating inverse side
            $this->profileservices->add($profileservices);

        }

    }

    public function removeProfileServices(ProfileServices $profileservices)
    {


        return $this->profileservices->removeElement($profileservices);

    }


    /**
     * Get feeds
     *
     * @return Frontend\AppBundle\Entity\Feeds
     */

    public function getFeeds()
    {
        return $this->feeds;
    }

    /**
     * Set feeds
     *
     * @param Frontend\AppBundle\Entity\Feeds $feeds
     * @return Property
     */
    public function setFeeds(\Frontend\AppBundle\Entity\Feeds $feeds)
    {
        $this->feeds = $feeds;

        return $this;
    }

    /*public function addFeed(Feeds $feed)
    {
        $feed->setProfile($this); // synchronously updating inverse side
        $this->feeds->add($feed);
    }*/

    /*public function removeFeeds(Feeds $feed)
    {

        $feed->removeProfile($this);
        $this->feeds->removeElement($feed);


    }*/


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
     * @param string $gallery
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
     * Set amenities
     *
     * @param string $amenities
     * @return Property
     */
    /* public function setAmenities(\Frontend\AppBundle\Entity\Amenities $amenities)
     {
         $this->$amenities = $amenities;

         return $this;
     }*/

    /**
     * Get amenities
     *
     * @return string
     */
    /* public function getAmenities()
     {
         return $this->$amenities;
     }*/

    /**
     * Set parent
     *
     * @param string $parent
     * @return Profile
     */
    public function setParent(\Frontend\AppBundle\Entity\Profile $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }


    /**
     * Set description
     *
     * @param string $description
     * @return Property
     */
    public function setDescription(\Frontend\AppBundle\Entity\Description $description)
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
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set contact
     *
     * @param Frontend\AppBundle\Entity\Contact $contact
     * @return Property
     */
    public function setContact(\Frontend\AppBundle\Entity\Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }


    /**
     * Set user
     *
     * @param Frontend\AppBundle\Entity\User $user
     * @return Property
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
     * Get reviews
     *
     * @return string
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    public function addProfileReviews(Review $review)
    {
        if (!$this->reviews->contains($review)) {
            $review->setProfile($this); // synchronously updating inverse side
            $this->reviews->add($review);

        }

    }

    public function removeProfileReviews(Review $review)
    {


        return $this->reviews->removeElement($review);

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
     * Set full
     *
     * @param $full
     * @return Property
     */
    public function setFull($full)
    {
        $this->full = $full;

        return $this;
    }


    /**
     * Get full
     *
     * @return integer
     */
    public function getFull()
    {
        return $this->full;
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


    /*public function getAbsolutePath()
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
        return '';
    }

    public function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '';
    }
*/

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir() . '/' . $this->path;
    }

    public function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        //return __DIR__.'symfony/web/'.$this->getUploadDir();
        return '';
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images';
    }

    public function upload($dir, $ipath, $iiid)
    {


        if (null === $this->getPhoto()) {
            return;
        }

        $img_n = $this->getPhoto()->getClientOriginalName();

        //$this->path = $ipath . $img_n;
        $this->file_name = $img_n;
        $ext = "";
        $dot = false;
        //$ext=$ext."g";
        for ($i = 0; $i < strlen($img_n); $i++) {//FIX/LOCTIONS
            if ($img_n[$i] == "." && !$dot)
                $dot = true;
            if ($dot)
                $ext .= $img_n[$i];
            //$ext=$ext."g";
        }
        // set the path property to the filename where you've saved the file
        $this->path = $this->path = $ipath . $iiid . $ext;;

        $this->getPhoto()->move($dir, $iiid . $ext);

        $this->photo = null;


        return true;
    }


    public function __tostring()
    {
        return "profiles";
    }

    public function FindServiceByServiceId($serv_id)
    {

        foreach ($this->profileservices as $serv) {
            if ($serv->getServices()->getId() == $serv_id)
                return $serv->getServices();
        }

        return null;
    }

    private $inventory;

    /**
     * @return mixed
     */
    public function getInventory()
    {
        $vehicles_complete = 0;
        foreach ($this->vehicles as $car) {
            if ($car->isFull())
                $vehicles_complete++;
        }
        return $vehicles_complete;
    }


}
