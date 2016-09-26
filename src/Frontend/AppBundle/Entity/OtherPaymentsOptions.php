<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OtherPaymentsOptions
 *
 * @ORM\Table(name="otherpaymentsoptions")
 * @ORM\Entity
 */
class OtherPaymentsOptions
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
     * @var \DateTime
     *
     * @ORM\Column(name="checkout", type="string", length=255, nullable=true)
     */
    private $checkout;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checkin", type="string", length=255, nullable=true)
     */
    private $checkin;

    /**
     * @var integer
     *
     * @ORM\Column(name="maximumStay", type="string", length=255, nullable=true)
     */
    private $maximumStay;

    /**
     * @var float
     *
     * @ORM\Column(name="depositRequirements", type="text", nullable=true)
     */
    private $depositRequirements;

    /**
     * @var string
     *
     * @ORM\Column(name="cancellationRefundPolicie", type="text", nullable=true)
     */
    private $cancellationRefundPolicie;


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
     * Set checkout
     *
     * @param string checkout
     * @return OtherPaymentsOptions
     */
    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;

        return $this;
    }

    /**
     * Get checkout
     *
     * @return string
     */
    public function getCheckout()
    {
        return $this->checkout;
    }

    /**
     * Set checkin
     *
     * @param \DateTime $checkin
     * @return OtherPaymentsOptions
     */
    public function setCheckin($checkin)
    {
        $this->checkin = $checkin;

        return $this;
    }

    /**
     * Get checkin
     *
     * @return \DateTime 
     */
    public function getCheckin()
    {
        return $this->checkin;
    }

    /**
     * Set maximumStay
     *
     * @param integer $maximumStay
     * @return OtherPaymentsOptions
     */
    public function setMaximumStay($maximumStay)
    {
        $this->maximumStay = $maximumStay;

        return $this;
    }

    /**
     * Get maximumStay
     *
     * @return integer 
     */
    public function getMaximumStay()
    {
        return $this->maximumStay;
    }

    /**
     * Set depositRequirements
     *
     * @param float $depositRequirements
     * @return OtherPaymentsOptions
     */
    public function setDepositRequirements($depositRequirements)
    {
        $this->depositRequirements = $depositRequirements;

        return $this;
    }

    /**
     * Get depositRequirements
     *
     * @return float 
     */
    public function getDepositRequirements()
    {
        return $this->depositRequirements;
    }

    /**
     * Set cancellationRefundPolicie
     *
     * @param string $cancellationRefundPolicie
     * @return OtherPaymentsOptions
     */
    public function setCancellationRefundPolicie($cancellationRefundPolicie)
    {
        $this->cancellationRefundPolicie = $cancellationRefundPolicie;

        return $this;
    }

    /**
     * Get cancellationRefundPolicie
     *
     * @return string 
     */
    public function getCancellationRefundPolicie()
    {
        return $this->cancellationRefundPolicie;
    }
}
