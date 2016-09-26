<?php
namespace Frontend\AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;
use Frontend\AppBundle\Entity\SavedCars;

/**
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\UserRepository")
 * @ORM\Table(name="users_fos")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * Get id
     *
     * @return integer
     */


    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;


    /**
     * @ORM\Column(type="string", length=255, nullable=true )
     */
    protected $lastname;


    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=255)
     */
    private $ipAddress;

    /**
     * @Assert\Regex("/^[0-9]{10}/")
     * @Assert\Length(min=1, max=10)
     * @ORM\Column(type="string", length=255, nullable=true )
     */
    protected $phone;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Profile", mappedBy="user")
     */
    protected $userProfiles;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Vehicle", mappedBy="user", cascade={"persist", "remove"})
     */

    private $vehicles;

    /**
     * @ORM\ManyToMany(targetEntity="Frontend\AppBundle\Entity\Vehicle")
     * @ORM\JoinTable(name="user_vehiclessaved",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="vehicle_id", referencedColumnName="id", unique=false)}
     *      )
     **/


    /**
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\SavedCars", mappedBy="user" ,cascade={"persist","remove"}, orphanRemoval=TRUE )
     **/
    private $usersavedcars;

    /**
     * @return mixed
     */
    public function getUsersavedcars()
    {
        return $this->usersavedcars;
    }

    /**
     * @param mixed $usersavedcars
     */
    public function setUsersavedcars($usersavedcars)
    {
        $this->usersavedcars = $usersavedcars;
    }

    /**
     * return a list with al vehicles in the list of saved cars
     */
    public function getVehiclessaved()
    {
        $vehiclessaved = new ArrayCollection();
        foreach ($this->usersavedcars as $usedcar) {
            $vehiclessaved->add($usedcar->getVehicle());
        }

        return $vehiclessaved;
    }

    public function addSavedCars(SavedCars $car)
    {
        if (!$this->usersavedcars->contains($car)) {
            $car->setUser($this); // synchronously updating inverse side
            $this->usersavedcars->add($car);
        }
    }

    public function removeSavedCars(SavedCars $car)
    {
        if ($this->usersavedcars->contains($car)) {
            $this->usersavedcars->removeElement($car);
        }
        return $this;
    }

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ContactOwner", mappedBy="user")
     */
    protected $userContactsOwner;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ContactFrontReply", mappedBy="user")
     */
    protected $contactReplys;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\ContactOwnerReply", mappedBy="user")
     */
    protected $contactOwnerReplys;

    /**
     * @Recaptcha\True
     */
    public $recaptcha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date")
     */
    private $dateCreated;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\News", mappedBy="user")
     */
    protected $userNews;


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\UserType" , inversedBy = "users")
     */
    private $type;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Blog", mappedBy="user")
     */
    protected $userBlogs;

    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebook_id;

    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebook_access_token;


    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Frontend\AppBundle\Entity\Email", mappedBy="user", cascade={"persist", "remove"})
     */

    private $emails;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=255, nullable=true)
     */

    private $zipCode;

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }


    public function __construct()
    {
        parent::__construct();
        $this->emails = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
        $this->usersavedcars = new ArrayCollection();
    }

    public function getEmails()
    {
        return $this->emails;
    }

    public function addProfileEmails(Email $email)
    {
        if (!$this->emails->contains($email)) {
            $email->setUser($this); // synchronously updating inverse side
            $this->emails->add($email);

        }

    }

    public function getVehicles()
    {
        return $this->vehicles;
    }

    public function addUserVehicles(Vehicle $vehicle)
    {
        if (!$this->vehicles->contains($vehicle)) {
            $vehicle->setUser($this); // synchronously updating inverse side
            $this->vehicles->add($vehicle);

        }

    }

    public function getUserProfiles()
    {
        return $this->userProfiles;
    }

    public function getUserContactsReplys()
    {
        return $this->contactReplys;
    }

    public function getUserOwnerContactsReplys()
    {
        return $this->contactOwnerReplys;
    }


    public function getUserContactsOwner()
    {
        return $this->userContactsOwner;
    }


    public function getUserNews()
    {
        return $this->userNews;
    }

    public function getUserBlogs()
    {
        return $this->userBlogs;
    }


    public function setEmail($email)
    {
        parent::setEmail($email);
        $this->setUsername($email);
    }

    public function getEmail()
    {
        return parent::getEmail();
    }

//------------------------------------------------
    public function getUserName()
    {
        return parent::getUsername();
    }

//------------------------------------------------
    public function getRolesS()
    {
        $roles = parent::getRoles();

        /*$rol="";
        for($i=0;$i<count($roles);$i++)
        {
        $rol=$rol.$roles[$i];
        $rol=$rol. " ";    
        }    */

        return $roles[0];
    }

//------------------------------------------------
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }


    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /*public function getUserCountry() {
    $countryphonecode = $this->getCountryPhoneCode();    
    $array_paises    = new \Doctrine\Common\Collections\ArrayCollection();
    $array_paises = \Frontend\CommonBundle\CommonBundle::listadoPaisesCodigoPhone();
    
    foreach ($array_paises as $key => $pais) {
        if ($key == $countryphonecode){
            return $pais;
        }
    }
    
    }*/


    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    public function setFacebookId($facebookId)
    {
        $this->facebook_id = $facebookId;

        return $this;
    }


    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }

    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebook_access_token = $facebookAccessToken;

        return $this;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return User
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Property
     */
    public function setDateCreated(\DateTime $dateCreated = null)
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

?>
