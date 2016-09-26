<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentsOptions
 *
 * @ORM\Table(name="paymentsoptions")
 * @ORM\Entity
 */
class PaymentsOptions
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
     * @var boolean
     *
     * @ORM\Column(name="americanExpress", type="boolean", nullable=true)
     */
    private $americanExpress;

    /**
     * @var boolean
     *
     * @ORM\Column(name="wireTransfer", type="boolean", nullable=true)
     */
    private $wireTransfer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mastercard", type="boolean", nullable=true)
     */
    private $mastercard;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cashiersCheck", type="boolean", nullable=true)
     */
    private $cashiersCheck;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visa", type="boolean", nullable=true)
     */
    private $visa;

    /**
     * @var boolean
     *
     * @ORM\Column(name="moneyOrder", type="boolean", nullable=true)
     */
    private $moneyOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(name="discover", type="boolean", nullable=true)
     */
    private $discover;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paypal", type="boolean", nullable=true)
     */
    private $paypal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="onlinePayment", type="boolean", nullable=true)
     */
    private $onlinePayment;


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
     * Set americanExpress
     *
     * @param boolean $americanExpress
     * @return PaymentsOptions
     */
    public function setAmericanExpress($americanExpress)
    {
        $this->americanExpress = $americanExpress;

        return $this;
    }

    /**
     * Get americanExpress
     *
     * @return boolean 
     */
    public function getAmericanExpress()
    {
        return $this->americanExpress;
    }

    /**
     * Set wireTransfer
     *
     * @param boolean $wireTransfer
     * @return PaymentsOptions
     */
    public function setWireTransfer($wireTransfer)
    {
        $this->wireTransfer = $wireTransfer;

        return $this;
    }

    /**
     * Get wireTransfer
     *
     * @return boolean 
     */
    public function getWireTransfer()
    {
        return $this->wireTransfer;
    }

    /**
     * Set mastercard
     *
     * @param boolean $mastercard
     * @return PaymentsOptions
     */
    public function setMastercard($mastercard)
    {
        $this->mastercard = $mastercard;

        return $this;
    }

    /**
     * Get mastercard
     *
     * @return boolean 
     */
    public function getMastercard()
    {
        return $this->mastercard;
    }

    /**
     * Set cashiersCheck
     *
     * @param boolean $cashiersCheck
     * @return PaymentsOptions
     */
    public function setCashiersCheck($cashiersCheck)
    {
        $this->cashiersCheck = $cashiersCheck;

        return $this;
    }

    /**
     * Get cashiersCheck
     *
     * @return boolean 
     */
    public function getCashiersCheck()
    {
        return $this->cashiersCheck;
    }

    /**
     * Set visa
     *
     * @param boolean $visa
     * @return PaymentsOptions
     */
    public function setVisa($visa)
    {
        $this->visa = $visa;

        return $this;
    }

    /**
     * Get visa
     *
     * @return boolean 
     */
    public function getVisa()
    {
        return $this->visa;
    }

    /**
     * Set moneyOrder
     *
     * @param boolean $moneyOrder
     * @return PaymentsOptions
     */
    public function setMoneyOrder($moneyOrder)
    {
        $this->moneyOrder = $moneyOrder;

        return $this;
    }

    /**
     * Get moneyOrder
     *
     * @return boolean 
     */
    public function getMoneyOrder()
    {
        return $this->moneyOrder;
    }

    /**
     * Set discover
     *
     * @param boolean $discover
     * @return PaymentsOptions
     */
    public function setDiscover($discover)
    {
        $this->discover = $discover;

        return $this;
    }

    /**
     * Get discover
     *
     * @return boolean 
     */
    public function getDiscover()
    {
        return $this->discover;
    }

    /**
     * Set paypal
     *
     * @param boolean $paypal
     * @return PaymentsOptions
     */
    public function setPaypal($paypal)
    {
        $this->paypal = $paypal;

        return $this;
    }

    /**
     * Get paypal
     *
     * @return boolean 
     */
    public function getPaypal()
    {
        return $this->paypal;
    }

    /**
     * Set onlinePayment
     *
     * @param boolean $onlinePayment
     * @return PaymentsOptions
     */
    public function setOnlinePayment($onlinePayment)
    {
        $this->onlinePayment = $onlinePayment;

        return $this;
    }

    /**
     * Get onlinePayment
     *
     * @return boolean 
     */
    public function getOnlinePayment()
    {
        return $this->onlinePayment;
    }
}
