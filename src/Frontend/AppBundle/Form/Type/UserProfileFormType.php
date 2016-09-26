<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserProfileFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label'=>'First Name','attr' => array('class' => 'form-control'),'required' => true))
            ->add('lastName', null, array('label'=>'Last Name','attr' => array('class' => 'form-control'),'required' => true))
            ->add('phone', null, array('label'=>'Phone','attr' => array('class' => 'form-control'),'required' => true))
            ->add('email', null, array('label'=>'Email','attr' => array('class' => 'form-control'),'required' => true))
                
            ;
         
    }

            

    public function getName()
    {
        return 'userProfile';
    }
}
