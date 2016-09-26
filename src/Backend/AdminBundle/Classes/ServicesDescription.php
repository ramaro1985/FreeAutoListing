<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 20/08/2015
 * Time: 8:28
 */

namespace Backend\AdminBundle\Classes;

use Frontend\AppBundle\Entity\Services;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ServicesDescription extends  AbstractType {

    private $services;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param mixed $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }
    private $description;

   public function __construct(){
       $this->services = new Services();
       $description = "";
   }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return "servicedescription";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'select' => array(
                    'services' => $this->getServices(),
                    'description' => $this->getDescription(),
                )
            ));
    }

    public function getParent()
    {
        return 'form';
    }

}