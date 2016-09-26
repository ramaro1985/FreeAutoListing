<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 27/08/2015
 * Time: 8:55
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Frontend\AppBundle\Entity\TrimRepository;

class VehicleDetailsFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'doors',
            'entity',
            array(
                'label' => 'Doors',
                'attr' => array('class' => 'form-control'),
                'class' => 'AppBundle:Doors',
                'property' => 'name',
                'empty_value' => "",
                'required' => false,
                'multiple' => false,
                'expanded' => false
            )
        )->add(
            'enginetype',
            'entity',
            array(
                'label' => 'Engine Type',
                'attr' => array('class' => 'form-control'),
                'class' => 'AppBundle:EngineType',
                'property' => 'name',
                'empty_value' => "",
                'required' => false,
                'multiple' => false,
                'expanded' => false
            )
        )->add(
            'transmission',
            'entity',
            array(
                'label' => 'Transmission',
                'attr' => array('class' => 'form-control'),
                'class' => 'AppBundle:Transmission',
                'property' => 'name',
                'empty_value' => "",
                'required' => false,
                'multiple' => false,
                'expanded' => false
            )
        )->add(
            'fueltype',
            'entity',
            array(
                'label' => 'Fuel Type',
                'attr' => array('class' => 'form-control'),
                'class' => 'AppBundle:FuelType',
                'property' => 'name',
                'empty_value' => "",
                'required' => false,
                'multiple' => false,
                'expanded' => false
            )
        )->add(
            'drive',
            'entity',
            array(
                'label' => 'Drive Type',
                'attr' => array('class' => 'form-control'),
                'class' => 'AppBundle:VehicleDriveType',
                'property' => 'name',
                'empty_value' => "",
                'required' => false,
                'multiple' => false,
                'expanded' => false
            )
        )->add(
            'exteriorcolor',
            'entity',
            array(
                'label' => 'Exterior Color',
                'attr' => array('class' => 'form-control'),
                'class' => 'AppBundle:Colors',
                'property' => 'colorname',
                'empty_value' => "",
                'required' => false,
                'multiple' => false,
                'expanded' => false
            )
        )->add(
            'interiorcolor',
            'entity',
            array(
                'label' => 'Interior Color',
                'attr' => array('class' => 'form-control'),
                'class' => 'AppBundle:Colors',
                'property' => 'colorname',
                'empty_value' => "",
                'required' => false,
                'multiple' => false,
                'expanded' => false
            )
        );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\VehicleDetails',
            )
        );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return "vehicledetails";
    }

} 