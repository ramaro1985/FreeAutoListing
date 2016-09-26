<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Frontend\AppBundle\Entity\PropertyRepository;

class InquiryFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
     
        $builder
            ->add('guest', null, array('label'=>'First Name','attr' => array('class' => 'form-control'),'required' => true))
            ->add('lastName', null, array('label'=>'Last Name','attr' => array('class' => 'form-control'),'required' => true))
            ->add('startDate', 'date', array('label'=>'Arrival','widget'=>'single_text','format' => 'MM/dd/yyyy','attr' => array('class' => 'form-control period-calendar'),'required' => false))
            ->add('endDate', 'date', array('label'=>'Departure','widget' => 'single_text','format' => 'MM/dd/yyyy','attr' => array('class' => 'form-control period-calendar'),'required' => false))    
            ->add('adults', 'choice', array('label'=>'Adults','attr' => array('class' => 'form-control'),'choices' => array('0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'),'required' => false,'empty_value' => 'Adults'))          
            ->add('children', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'),'required' => false,'empty_value' => 'Children'))                
            ->add('email', null , array('label'=>'Email','attr' => array('class' => 'form-control'), 'required' => true))
            ->add('phone', 'number' , array('label'=>'Phone Number','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('text', null , array('label'=>'Message to owner','attr' => array('class' => 'form-control'), 'required' => true))
            ->add('recaptcha1', 'ewz_recaptcha')
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Inquiry',
        ));
    }
             
            

    public function getName()
    {
        return 'inquiry';
    }
}
