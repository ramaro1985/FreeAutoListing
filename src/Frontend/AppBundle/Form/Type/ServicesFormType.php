<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServicesFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder->add(
            'services',
            'entity',
            array(
                'label' => 'Services',
                'attr' => array('class' => ''),
                'class' => 'AppBundle:Services',
                'property' => 'name',
                'multiple' => true,
                'expanded' => true
            )
        );*/
        $builder
            ->add('profileservices', 'collection', array('type' => new ProfileServicesFormType()))
            ->add('services' , 'entity' , array(
                'class'    => 'AppBundle:Services' ,
                'property' => 'name' ,
                'expanded' => true ,
                'multiple' => true , ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\Profile',
                'em'         => '' ,
            )
        );
    }

    public function getName()
    {
        return 'services';
    }

}
