<?php

namespace Frontend\AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Vehicle
 *
 * @ORM\Table(name="vehiclebasicinformation")
 * @ORM\Entity
 * @UniqueEntity(fields="stock_number", message="Stock number already exist")
 */
class VehicleBasicInformation
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
     * @ORM\Column(name="zipcode", type="string", length=255 )
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="msrp", type="string", length=255 , nullable=true)
     */
    private $msrp;

    /**
     * @var string
     *
     * @ORM\Column(name="vin", type="string", length=255)
     */
    private $vin;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Year" , inversedBy = "vehiclesinformation")
     * @ORM\OrderBy({"year" = "DESC"})
     *
     */
    private $year;


    /**
     * @var integer
     *
         * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Condition" , inversedBy = "vehiclesinformation")
     */
    private $condition;

    /**
     * @return int
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * Set condition
     *
     * @param Frontend\AppBundle\Entity\Condition $condition
     * @return Vehicle
     */
    public function setCondition(\Frontend\AppBundle\Entity\Condition $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Model" , inversedBy = "vehiclesinformation")
     */
    private $model;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\Make" , inversedBy = "vehiclesinformation")
     */
    private $make;


    /**
     * @ORM\ManyToOne(targetEntity="Frontend\AppBundle\Entity\VehicleStyle", inversedBy = "vehiclesinformation")
     *
     */
    private $bodyStyle;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=false)
     */
    private $price;


    /**
     * @var float
     *
     * @ORM\Column(name="mileage", type="float", nullable=false)
     */
    private $mileage;


    /**
     * @var bigint
     *
     * @ORM\Column(name="stock_number", type="bigint", nullable=true, unique=true)
     */
    private $stock_number;

    /**
     * @return bigint
     */
    public function getStockNumber()
    {
        return $this->stock_number;
    }

    /**
     * @param bigint $stock_number
     */
    public function setStockNumber($stock_number)
    {
        $this->stock_number = $stock_number;
    }

    /**
     * Get year
     *
     * @return Frontend\AppBundle\Entity\Year
     */
    public function getYear()
    {
        return $this->year;
    }



    /**
     * Set year
     *
     * @param Frontend\AppBundle\Entity\Year $year
     * @return Vehicle
     */
    public function setYear(\Frontend\AppBundle\Entity\Year $year)
    {
        $this->year = $year;

        return $this;
    }


    /**
     * Get make
     *
     * @return Frontend\AppBundle\Entity\Make
     */
    public function getMake()
    {
        return $this->make;
    }



    /**
     * Set make
     *
     * @param Frontend\AppBundle\Entity\Make $make
     * @return Vehicle
     */
    public function setMake(\Frontend\AppBundle\Entity\Make $make)
    {
        $this->make = $make;

        return $this;
    }





    /**
     * Get model
     *
     * @return Frontend\AppBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }



    /**
     * Set model
     *
     * @param Frontend\AppBundle\Entity\Model $model
     * @return Vehicle
     */
    public function setModel(\Frontend\AppBundle\Entity\Model $model)
    {
        $this->model = $model;

        return $this;
    }


    /**
     * Set price
     *
     * @param string $price
     * @return VehicleDescription
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getMsrp()
    {
        return $this->msrp;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return VehicleDescription
     */
    public function setMsrp($msrp)
    {
        $this->msrp = $msrp;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }


    /**
     * Set mileage
     *
     * @param string $mileage
     * @return VehicleDescription
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return string
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set vin
     *
     * @param string $vin
     * @return VehicleDescription
     */
    public function setVin($vin)
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * Get vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    public function __toString()
	{
	return $this->getDescription()->getName();
	}

    /**
     * @return mixed
     */
    public function getBodyStyle()
    {
        return $this->bodyStyle;
    }

    /**
     * @param mixed $bodyStyle
     */
    public function setBodyStyle($bodyStyle)
    {
        $this->bodyStyle = $bodyStyle;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }
        
        
        
        
     
}
