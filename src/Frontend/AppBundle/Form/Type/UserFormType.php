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

class UserFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Name', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('lastName', null, array('label' => 'Last Name', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('zipCode', null, array('label' => 'Zip Code', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('phone', null, array('validation_groups' => array('contactFront'), 'label' => 'Mobile Number', 'attr' => array('class' => 'form-control'), 'required' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\User',
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
        return "user";
    }
}