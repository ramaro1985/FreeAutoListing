<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Frontend\AppBundle\Entity\Languages;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Description
 *
 * @ORM\Table(name="usefulinformation")
 * @ORM\Entity
 */
class UsefulInformation
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
     * @ORM\Column(name="why_new", type="text" , nullable=true)
     */
    private $whyBuyaCar;
    
          /**
     * @var string
     *
     * @ORM\Column(name="disclaimer", type="text" , nullable=true)
     */
    private $Disclaimer;


    /**
     * @ORM\ManyToMany(targetEntity="Frontend\AppBundle\Entity\Languages")
     * @ORM\JoinTable(name="usefulinformation_languages",
     *      joinColumns={@ORM\JoinColumn(name="usfulinformation_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="languages_id", referencedColumnName="id", unique=false)}
     *      )
     **/
    private $languages;

    public function __construct()
    {
        $this->languages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param mixed $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    public function addLanguages($languages)
    {
        $this->languages->add($languages);
    }

    public function removeLanguages(Languages $languages)
    {
        $this->languages->removeElement($languages);
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
     * Set whyBuyaCar
     *
     * @param string $whyBuyaCar
     * @return Profile
     */
    public function setWhyBuyaCar($whyBuyaCar)
    {
        $this->whyBuyaCar = $whyBuyaCar;
        return $this;
    }

    /**
     * Get whyBuyNew
     *
     * @return string 
     */
    public function getWhyBuyaCar()
    {
        return $this->whyBuyaCar;
    }

     /**
     * Set Disclaimer
     *
     * @param string $Disclaimer
     * @return Profile
     */
    public function setDisclaimer($Disclaimer)
    {
        $this->Disclaimer = $Disclaimer;
        return $this;
    }

    /**
     * Get Disclaimer
     *
     * @return string 
     */
    public function getDisclaimer()
    {
        return $this->Disclaimer;
    }
    
}
