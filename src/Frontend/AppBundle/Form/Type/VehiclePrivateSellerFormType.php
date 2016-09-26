<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 27/08/2015
 * Time: 8:21
 */

namespace Frontend\AppBundle\Form\Type;

use Frontend\AppBundle\Entity\VehicleBasicInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VehiclePrivateSellerFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vehiclesdetails', new VehicleDetailsFormType())
            ->add('vehiclesinformation', new VehicleInformationFormType(true))
            ->add('vehiclesoptions', 'entity', array(
                    'label' => '',
                    'class' => 'AppBundle:VehiclesOptions',
                    'property' => 'name',
                    'expanded' => true,
                    'multiple' => true,)
            )
            ->add('warranty',
                'textarea',
                array('label' => 'asd',
                    'attr' => array('class' => 'form-control description disabled',
                        'rows'=>4,
                        'placeholder' => 'Warranty Description'),
                    'max_length' => 800, 'required' => false))
            ->add('seller_comments',
                'textarea',
                array('label' => 'asd',
                    'attr' => array('class' => 'form-control description disabled',
                        'rows'=>4,
                        'placeholder' => 'Seller Comments'),
                        'max_length' => 800, 'required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\Vehicle',
                'cascade_validation' => true,
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
        return "vehicle";
    }
}