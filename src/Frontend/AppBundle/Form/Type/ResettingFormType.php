<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Frontend\AppBundle\Form\Type;
use FOS\UserBundle\Form\Type\ResettingFormType as BaseType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResettingFormType extends BaseType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
          parent::buildForm($builder, $options);
        $builder->add('plainPassword', 'repeated', array(
            'type' => 'password',
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => ' ' ,'attr' => array('class' => 'form-control', 'placeholder'=>'form.new_password')),
            'second_options' => array('label' => ' ' ,'attr' => array('class' => 'form-control', 'placeholder'=>'form.new_password_confirmation')),
            'invalid_message' => 'fos_user.password.mismatch',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
          parent::setDefaultOptions($resolver);
          
        
    }

    
      public function getParent()
    {
        return 'fos_user_resetting';
    }
             
    
    
    public function getName()
    {
        return 'app_user_resetting';
    }
}
