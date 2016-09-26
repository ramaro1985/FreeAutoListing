<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OtherPaymentsOptionsFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('checkout', 'choice', array('label'=>'Check-Out','attr' => array('class' => 'form-control'), 'choices' => array('0' => '12 AM','1' => '1 AM', '2' => '2 AM', '3' => '3 AM', '4' => '4 AM', '5' => '5 AM', '6' => '6 AM', '7' => '7 AM', '8' => '8 AM', '9' => '9 AM', '10' => '10 AM', '11' => '11 AM', '12' => '12 PM', '13' => '1 PM', '14' => '2 PM', '15' => '3 PM', '16' => '4 PM', '17' => '5 PM', '18' => '6 PM', '19' => '7 PM', '20' => '8 PM', '21' => '9 PM', '22' => '10 PM', '23' => '11 PM'),'required' => false,'empty_value' => 'Select'))
        ->add('checkin', 'choice', array('label'=>'Check-In','attr' => array('class' => 'form-control'), 'choices' => array('0' => '12 AM','1' => '1 AM', '2' => '2 AM', '3' => '3 AM', '4' => '4 AM', '5' => '5 AM', '6' => '6 AM', '7' => '7 AM', '8' => '8 AM', '9' => '9 AM', '10' => '10 AM', '11' => '11 AM', '12' => '12 PM', '13' => '1 PM', '14' => '2 PM', '15' => '3 PM', '16' => '4 PM', '17' => '5 PM', '18' => '6 PM', '19' => '7 PM', '20' => '8 PM', '21' => '9 PM', '22' => '10 PM', '23' => '11 PM'),'required' => false,'empty_value' => 'Select'))        
        ->add('maximumStay', null , array('validation_groups' => array('otherPayments'),'label'=>'Maximum Stay','attr' => array('class' => 'form-control'), 'required' => false))
        ->add('depositRequirements', null , array('label'=>'Deposit Requirements','attr' => array('class' => 'form-control'), 'required' => false))
        ->add('cancellationRefundPolicie', null , array('label'=>'Cancellation & Refund Policy','attr' => array('class' => 'form-control'), 'required' => false))    
            ;
    }

    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Frontend\AppBundle\Entity\OtherPaymentsOptions',
        ));
    }
             
            

    public function getName()
    {
        return 'otherPaymentsOptions';
    }
}
