<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Feeds
 *
 * @ORM\Table(name="feeds")
 * @ORM\Entity
 */
class Feeds
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
     * @ORM\Column(name="facebook", type="string", length=255 , nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Profiles", inversedBy="feeds" , cascade={"persist", "remove"})
     *
     **/
    //private $profiles;


   /* public function __construct()
    {
        $this->profiles = new \Doctrine\Common\Collections\ArrayCollection();
    }


    public function getProfiles()
    {
        return $this->profiles;
    }


    public function addProfile(Profile $profile)
    {
        $this->profiles->add($profile);
    }

    public function removeProfile(Profile $profile)
    {
        $this->profiles->removeElement($profile);
    }
*/


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
     * Set titulo
     *
     * @param string $facebook
     * @return Feeds
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Feeds
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

}
