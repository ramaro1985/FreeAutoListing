<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ChangePasswordFormType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Security\Core\Validator\Constraint\UserPassword as OldUserPassword;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ChangePasswordFormType extends BaseType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
          parent::buildForm($builder, $options);
          
          if (class_exists('Symfony\Component\Security\Core\Validator\Constraints\UserPassword')) {
            $constraint = new UserPassword();
        } else {
            // Symfony 2.1 support with the old constraint class
            $constraint = new OldUserPassword();
        }
          
          
          $builder->add('current_password', 'password', array(
            'label' => ' ',
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'constraints' => $constraint,
            'validation_groups' => array('Default'),
            'attr' => array('class' => 'form-control', 'placeholder'=>'Current Password')
        ));
        $builder->add('plainPassword', 'repeated', array(
            'type' => 'password',
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => ' ',  'attr' => array('class' => 'form-control', 'placeholder'=>'New Password')),
            'second_options' => array('label' => ' ',  'attr' => array('class' => 'form-control', 'placeholder'=>'Retype Password')),
            'invalid_message' => 'fos_user.password.mismatch',
           
        ));
          
       
    }
   
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
          parent::setDefaultOptions($resolver);
       
          $resolver->setDefaults(array(
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
        ));
    }
             
            

    public function getName()
    {
        return 'app_user_change_password';
    }
}
