<?php

namespace Proxies\__CG__\Frontend\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Vehicle extends \Frontend\AppBundle\Entity\Vehicle implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'id', 'vehiclesinformation', 'vehiclesdetails', 'profile', 'user', 'selectByuser', 'status', 'dateCreated', 'views', 'rating', 'serie', 'featured', 'gallery', 'features', 'vehiclesoptions', 'seller_comments', 'full', 'warranty');
        }

        return array('__isInitialized__', 'id', 'vehiclesinformation', 'vehiclesdetails', 'profile', 'user', 'selectByuser', 'status', 'dateCreated', 'views', 'rating', 'serie', 'featured', 'gallery', 'features', 'vehiclesoptions', 'seller_comments', 'full', 'warranty');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Vehicle $proxy) {
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
    public function getSelectByuser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSelectByuser', array());

        return parent::getSelectByuser();
    }

    /**
     * {@inheritDoc}
     */
    public function setSelectByuser($selectByuser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSelectByuser', array($selectByuser));

        return parent::setSelectByuser($selectByuser);
    }

    /**
     * {@inheritDoc}
     */
    public function getWarranty()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWarranty', array());

        return parent::getWarranty();
    }

    /**
     * {@inheritDoc}
     */
    public function setWarranty($warranty)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWarranty', array($warranty));

        return parent::setWarranty($warranty);
    }

    /**
     * {@inheritDoc}
     */
    public function isFull()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isFull', array());

        return parent::isFull();
    }

    /**
     * {@inheritDoc}
     */
    public function setFull($full)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFull', array($full));

        return parent::setFull($full);
    }

    /**
     * {@inheritDoc}
     */
    public function getSellerComments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSellerComments', array());

        return parent::getSellerComments();
    }

    /**
     * {@inheritDoc}
     */
    public function setSellerComments($seller_comments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSellerComments', array($seller_comments));

        return parent::setSellerComments($seller_comments);
    }

    /**
     * {@inheritDoc}
     */
    public function getVehiclesOptions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVehiclesOptions', array());

        return parent::getVehiclesOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function setVehiclesOptions($vehiclesoptions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVehiclesOptions', array($vehiclesoptions));

        return parent::setVehiclesOptions($vehiclesoptions);
    }

    /**
     * {@inheritDoc}
     */
    public function addVehiclesOptions($vehiclesoptions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addVehiclesOptions', array($vehiclesoptions));

        return parent::addVehiclesOptions($vehiclesoptions);
    }

    /**
     * {@inheritDoc}
     */
    public function removeVehiclesOptions(\Frontend\AppBundle\Entity\VehiclesOptions $vehiclesoptions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeVehiclesOptions', array($vehiclesoptions));

        return parent::removeVehiclesOptions($vehiclesoptions);
    }

    /**
     * {@inheritDoc}
     */
    public function getFeatures()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFeatures', array());

        return parent::getFeatures();
    }

    /**
     * {@inheritDoc}
     */
    public function addFeatures(\Frontend\AppBundle\Entity\Features $fe)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addFeatures', array($fe));

        return parent::addFeatures($fe);
    }

    /**
     * {@inheritDoc}
     */
    public function removeFeatures(\Frontend\AppBundle\Entity\Features $fe)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeFeatures', array($fe));

        return parent::removeFeatures($fe);
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
    public function setLocation(\Frontend\AppBundle\Entity\Location $location)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLocation', array($location));

        return parent::setLocation($location);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocation', array());

        return parent::getLocation();
    }

    /**
     * {@inheritDoc}
     */
    public function setGallery(\Frontend\AppBundle\Entity\Gallery $gallery)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGallery', array($gallery));

        return parent::setGallery($gallery);
    }

    /**
     * {@inheritDoc}
     */
    public function getGallery()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGallery', array());

        return parent::getGallery();
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
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function getReviews()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReviews', array());

        return parent::getReviews();
    }

    /**
     * {@inheritDoc}
     */
    public function getReviewsByStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReviewsByStatus', array($status));

        return parent::getReviewsByStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getInquiries()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInquiries', array());

        return parent::getInquiries();
    }

    /**
     * {@inheritDoc}
     */
    public function getNewInquiries()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNewInquiries', array());

        return parent::getNewInquiries();
    }

    /**
     * {@inheritDoc}
     */
    public function getNewReviews($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNewReviews', array($status));

        return parent::getNewReviews($status);
    }

    /**
     * {@inheritDoc}
     */
    public function setDateCreated($dateCreated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateCreated', array($dateCreated));

        return parent::setDateCreated($dateCreated);
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
    public function setViews($views)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setViews', array($views));

        return parent::setViews($views);
    }

    /**
     * {@inheritDoc}
     */
    public function getViews()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getViews', array());

        return parent::getViews();
    }

    /**
     * {@inheritDoc}
     */
    public function setRating(\Frontend\AppBundle\Entity\ProfileRate $rating)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRating', array($rating));

        return parent::setRating($rating);
    }

    /**
     * {@inheritDoc}
     */
    public function getRating()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRating', array());

        return parent::getRating();
    }

    /**
     * {@inheritDoc}
     */
    public function setSerie($serie)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSerie', array($serie));

        return parent::setSerie($serie);
    }

    /**
     * {@inheritDoc}
     */
    public function getSerie()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSerie', array());

        return parent::getSerie();
    }

    /**
     * {@inheritDoc}
     */
    public function setFeatured($featured)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFeatured', array($featured));

        return parent::setFeatured($featured);
    }

    /**
     * {@inheritDoc}
     */
    public function getFeatured()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFeatured', array());

        return parent::getFeatured();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getVehiclesdetails()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVehiclesdetails', array());

        return parent::getVehiclesdetails();
    }

    /**
     * {@inheritDoc}
     */
    public function setVehiclesdetails($vehiclesdetails)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVehiclesdetails', array($vehiclesdetails));

        return parent::setVehiclesdetails($vehiclesdetails);
    }

    /**
     * {@inheritDoc}
     */
    public function getVehiclesinformation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVehiclesinformation', array());

        return parent::getVehiclesinformation();
    }

    /**
     * {@inheritDoc}
     */
    public function setVehiclesinformation($vehiclesinformation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVehiclesinformation', array($vehiclesinformation));

        return parent::setVehiclesinformation($vehiclesinformation);
    }

}
