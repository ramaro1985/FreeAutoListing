<?php

namespace Proxies\__CG__\Frontend\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Description extends \Frontend\AppBundle\Entity\Description implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'name', 'tagline', 'address', 'description', 'hoursopen', 'hoursclose', 'whyBuyNew', 'whyBuyUsed', 'Disclaimer', 'phone', 'email', 'webPage');
        }

        return array('__isInitialized__', 'id', 'name', 'tagline', 'address', 'description', 'hoursopen', 'hoursclose', 'whyBuyNew', 'whyBuyUsed', 'Disclaimer', 'phone', 'email', 'webPage');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Description $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress', array());

        return parent::getAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress($address)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', array($address));

        return parent::setAddress($address);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setTagline($tagline)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTagline', array($tagline));

        return parent::setTagline($tagline);
    }

    /**
     * {@inheritDoc}
     */
    public function getTagline()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTagline', array());

        return parent::getTagline();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', array($description));

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', array());

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setHoursOpen($hoursopen)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHoursOpen', array($hoursopen));

        return parent::setHoursOpen($hoursopen);
    }

    /**
     * {@inheritDoc}
     */
    public function getHoursOpen()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHoursOpen', array());

        return parent::getHoursOpen();
    }

    /**
     * {@inheritDoc}
     */
    public function setHoursClose($hoursclose)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHoursClose', array($hoursclose));

        return parent::setHoursClose($hoursclose);
    }

    /**
     * {@inheritDoc}
     */
    public function getHoursClose()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHoursClose', array());

        return parent::getHoursClose();
    }

    /**
     * {@inheritDoc}
     */
    public function setWhyBuyNew($whyNew)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWhyBuyNew', array($whyNew));

        return parent::setWhyBuyNew($whyNew);
    }

    /**
     * {@inheritDoc}
     */
    public function getWhyBuyNew()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWhyBuyNew', array());

        return parent::getWhyBuyNew();
    }

    /**
     * {@inheritDoc}
     */
    public function setWhyBuyUsed($whyUsed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWhyBuyUsed', array($whyUsed));

        return parent::setWhyBuyUsed($whyUsed);
    }

    /**
     * {@inheritDoc}
     */
    public function getWhyBuyUsed()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWhyBuyUsed', array());

        return parent::getWhyBuyUsed();
    }

    /**
     * {@inheritDoc}
     */
    public function setDisclaimer($Disclaimer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDisclaimer', array($Disclaimer));

        return parent::setDisclaimer($Disclaimer);
    }

    /**
     * {@inheritDoc}
     */
    public function getDisclaimer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDisclaimer', array());

        return parent::getDisclaimer();
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', array());

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone($phone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', array($phone));

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getWebPage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebPage', array());

        return parent::getWebPage();
    }

    /**
     * {@inheritDoc}
     */
    public function setWebPage($webPage)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWebPage', array($webPage));

        return parent::setWebPage($webPage);
    }

}
