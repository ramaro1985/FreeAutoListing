<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ContactInvestorFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
     
        $builder
            ->add('name', null, array('label'=>'First Name*','attr' => array('class' => 'form-control'),'required' => true))
            ->add('lastName', null, array('label'=>'Last Name*','attr' => array('class' => 'form-control'),'required' => true))
            ->add('email', null , array('validation_groups' => array('contactInvestor'),'label'=>'Email*','attr' => array('class' => 'form-control'), 'required' => true))
            ->add('phone', null , array('validation_groups' => array('contactInvestor'),'label'=>'Phone','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('text', null , array('validation_groups' => array('contactInvestor'),'label'=>'Message*','attr' => array('class' => 'form-control'), 'required' => true))
            ->add('recaptcha', 'ewz_recaptcha');
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\ContactInvestor',
        ));
    }
             
            

    public function getName()
    {
        return 'contactinvestor';
    }
}
