<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfileRate
 *
 * @ORM\Table(name="profilerate")
 * @ORM\Entity(repositoryClass="Frontend\AppBundle\Entity\ProfileRateRepository")
 */
class ProfileRate
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
     * @var float
     *
     * @ORM\Column(name="totalRate", type="float")
     */
    private $totalRate;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalCount", type="integer")
     */
    private $totalCount;

    /**
     * @var float
     *
     * @ORM\Column(name="average", type="float")
     */
    private $average;

    
    
    public function calcAverage()
    {
       $average =  $this->totalRate / $this->totalCount;

        return $average;
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
     * Set totalRate
     *
     * @param float $totalRate
     * @return PropertyRate
     */
    public function setTotalRate($totalRate)
    {
        $this->totalRate = $totalRate;

        return $this;
    }

    /**
     * Get totalRate
     *
     * @return float 
     */
    public function getTotalRate()
    {
        return $this->totalRate;
    }

    /**
     * Set totalCount
     *
     * @param integer $totalCount
     * @return PropertyRate
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * Get totalCount
     *
     * @return integer 
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * Set average
     *
     * @param float $average
     * @return PropertyRate
     */
    public function setAverage($average)
    {
        $this->average = $average;

        return $this;
    }

    /**
     * Get average
     *
     * @return float 
     */
    public function getAverage()
    {
        return $this->average;
    }
}
