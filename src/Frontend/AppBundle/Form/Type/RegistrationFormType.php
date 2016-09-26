<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\True;


class RegistrationFormType extends BaseType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        parent::buildForm($builder, $options);

        $builder
            ->add('email', 'email', array('label' => 'Email', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control', 'placeholder' => 'Email *')))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => ' ', 'attr' => array('class' => 'form-control', 'placeholder' => 'Password *')),
                'second_options' => array('label' => ' ', 'attr' => array('class' => 'form-control', 'placeholder' => 'Confirm Password *')),
                'invalid_message' => 'Passwords must match!',


            ))
            ->add('name', null, array('label' => 'First Name', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control', 'placeholder' => 'First Name *'), 'required' => true))
            ->add('lastname', null, array('label' => 'Last Name', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control', 'placeholder' => 'Last Name *'), 'required' => true))
            ->add('type', 'entity', array('label' => 'Profile', 'attr' => array('class' => 'form-control'), 'class' => 'AppBundle:UserType', 'property' => 'name', 'required' => true, 'empty_value' => 'Choose Profile'))
            ->add('phone', null, array('label' => 'Phone', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control', 'placeholder' => 'Phone *')/*, 'required' => true*/))
            ->add("t_and_c", "checkbox", array("mapped" => false, "constraints" => new True(array("message" => "Please accept the Terms and conditions in order to register"))))//->add('recaptcha', 'ewz_recaptcha')
        ;
        $builder->remove('username');
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
        ));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }


    public function getName()
    {
        return 'app_user_registration';
    }
}
