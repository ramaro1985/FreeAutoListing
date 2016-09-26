<?php

namespace Backend\SuperAdminBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


    
 
class NewUserFormType extends AbstractType
{
    
   

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
         $builder
            ->add('email', 'email', array('label' => 'Email', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control', 'placeholder'=>'Email')))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => ' ' , 'attr' => array('class' => 'form-control', 'placeholder'=>'Password')),
                'second_options' => array('label' => ' ' , 'attr' => array('class' => 'form-control', 'placeholder'=>'Confirm Password')),
                'invalid_message' => 'Passwords must match!',
                
               
            ))   
            ->add('name', null, array('label' => 'First Name', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control' , 'placeholder'=>'First name *')))  
            ->add('lastname', null, array('label' => 'Last Name', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control' , 'placeholder'=>'Last name *')))  
            ->add('phone', null, array('label' => 'Phone', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control' , 'placeholder'=>'Phone *')))
                 
                
        ;
         
    }

    
  
    
     
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\User',
        ));
    }
             
            

    public function getName()
    {
        return 'new_user';
    }
}
