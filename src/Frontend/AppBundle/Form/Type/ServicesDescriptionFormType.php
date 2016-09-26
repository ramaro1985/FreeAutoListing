<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 20/08/2015
 * Time: 8:27
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Backend\AdminBundle\Classes\ServicesDescription;

class ServicesDescriptionFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('name', null, array('label'=>'Name','attr' => array('class' => 'form-control add' ),'required' => true))
            ->add('description', 'textarea' , array('label'=>'Description','attr' => array('class' => 'form-control'),'required' => true))
        ;*/
        $builder->add(
            'services',
            new ServicesDescription(),
            array(
                /*'label' => 'Services',
                'attr' => array('class' => ''),
                //'class' => 'AppBundle:Services',
                'property' => 'name',
                'multiple' => true,
                'expanded' => true*/
            )
        );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\ProfileServicesServices',
                'cascade_validation' => true,
            )
        );
    }

    public function getName()
    {
        return 'servicesDescription';
    }

}