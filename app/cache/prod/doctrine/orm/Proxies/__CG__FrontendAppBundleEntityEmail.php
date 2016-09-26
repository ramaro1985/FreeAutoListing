<?php

namespace Proxies\__CG__\Frontend\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Email extends \Frontend\AppBundle\Entity\Email implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'id', 'profile', 'user', 'vehicle', 'remitent_mail', 'remitent_name', 'remitent_phone', 'subject', 'body_mail', 'offer_text', 'offer', 'opened', 'dateCreated');
        }

        return array('__isInitialized__', 'id', 'profile', 'user', 'vehicle', 'remitent_mail', 'remitent_name', 'remitent_phone', 'subject', 'body_mail', 'offer_text', 'offer', 'opened', 'dateCreated');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Email $proxy) {
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
    public function setProfile(\Frontend\AppBundle\Entity\Profile $profile)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProfile', array($profile));

        return parent::setProfile($profile);
    }

    /**
     * {@inheritDoc}
     */
    public function getProfile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProfile', array());

        return parent::getProfile();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\Frontend\AppBundle\Entity\User $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array());

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function getVehicle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVehicle', array());

        return parent::getVehicle();
    }

    /**
     * {@inheritDoc}
     */
    public function setVehicle($vehicle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVehicle', array($vehicle));

        return parent::setVehicle($vehicle);
    }

    /**
     * {@inheritDoc}
     */
    public function getRemitentMail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRemitentMail', array());

        return parent::getRemitentMail();
    }

    /**
     * {@inheritDoc}
     */
    public function setRemitentMail($remitent_mail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRemitentMail', array($remitent_mail));

        return parent::setRemitentMail($remitent_mail);
    }

    /**
     * {@inheritDoc}
     */
    public function getRemitentName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRemitentName', array());

        return parent::getRemitentName();
    }

    /**
     * {@inheritDoc}
     */
    public function setRemitentName($remitent_name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRemitentName', array($remitent_name));

        return parent::setRemitentName($remitent_name);
    }

    /**
     * {@inheritDoc}
     */
    public function getRemitentPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRemitentPhone', array());

        return parent::getRemitentPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setRemitentPhone($remitent_phone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRemitentPhone', array($remitent_phone));

        return parent::setRemitentPhone($remitent_phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubject', array());

        return parent::getSubject();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubject($subject)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubject', array($subject));

        return parent::setSubject($subject);
    }

    /**
     * {@inheritDoc}
     */
    public function getBodyMail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBodyMail', array());

        return parent::getBodyMail();
    }

    /**
     * {@inheritDoc}
     */
    public function setBodyMail($body_mail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBodyMail', array($body_mail));

        return parent::setBodyMail($body_mail);
    }

    /**
     * {@inheritDoc}
     */
    public function getOfferText()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOfferText', array());

        return parent::getOfferText();
    }

    /**
     * {@inheritDoc}
     */
    public function setOfferText($offer_text)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOfferText', array($offer_text));

        return parent::setOfferText($offer_text);
    }

    /**
     * {@inheritDoc}
     */
    public function isOffer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isOffer', array());

        return parent::isOffer();
    }

    /**
     * {@inheritDoc}
     */
    public function setOffer($offer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOffer', array($offer));

        return parent::setOffer($offer);
    }

    /**
     * {@inheritDoc}
     */
    public function isOpened()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isOpened', array());

        return parent::isOpened();
    }

    /**
     * {@inheritDoc}
     */
    public function setOpened($opened)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOpened', array($opened));

        return parent::setOpened($opened);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateCreated', array());

        return parent::getDateCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateCreated($dateCreated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateCreated', array($dateCreated));

        return parent::setDateCreated($dateCreated);
    }

}
