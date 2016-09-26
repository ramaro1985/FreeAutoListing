<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileServicesFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('name', null, array('label'=>'Name','attr' => array('class' => 'form-control add' ),'required' => true))
            ->add('description', 'textarea' , array('label'=>'Description','attr' => array('class' => 'form-control'),'required' => true))
        ;*/
        $builder/*->add(
            'services',
            'entity',
            array(
                'label' => 'Services',
                'attr' => array('class' => 'service_element'),
                'class' => 'AppBundle:Services',
                'property' => 'name',
                'multiple' => true,
                'expanded' => true
            )
        )*/->add('description', 'textarea' , array('label'=>'','attr' => array('class' => 'form-control description disabled','placeholder' => 'Description','row'=>'2'),'required' => false ))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\ProfileServices',
                'cascade_validation' => true,
            )
        );
    }

    public function getName()
    {
        return 'profileservices';
    }

}
