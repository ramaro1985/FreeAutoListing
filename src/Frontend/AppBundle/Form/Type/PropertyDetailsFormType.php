<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropertyDetailsFormType extends AbstractType {
    
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('size', null , array('validation_groups' => array('propertyDetails'), 'label'=>'Property Size', 'required' => true, 'attr' => array('class' => 'form-control')))
            ->add('sizeUnit', 'choice', array('required' => true,'label'=>'Measure unit','attr' => array('class' => 'form-control'), 'choices' => array('0' => 'SQ-FT','1' => 'SQ-MT', '2' => 'SQ-KM'),'empty_value' => false))            
            ->add('type', 'entity', array('required' => true, 'label'=>'Property Type','attr' => array('class' => 'form-control'),'class' => 'AppBundle:PropertyType','property' => 'name', 'empty_value' => 'Select'))
            ->add('locationType', 'entity', array('required' => true,'label'=>'Location Type','attr' => array('class' => 'form-control'),'class' => 'AppBundle:LocationType','property' => 'name' , 'empty_value' => 'Select'))
            ->add('bedrooms', 'choice', array('required' => true,'label'=>'Bedrooms','attr' => array('class' => 'form-control'), 'choices' => array('1' => '1','2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10 or more'),'empty_value' => 'Select'))            
            ->add('bathrooms', 'choice', array('required' => true,'label'=>'Bathrooms','attr' => array('class' => 'form-control'), 'choices' => array('1' => '1','2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10 or more'),'empty_value' => 'Select'))                
            ->add('half_bath', 'choice', array('label'=>'Half-Baths','required' => false,'attr' => array('class' => 'form-control'), 'choices' => array('1' => '1','2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10 or more'),'empty_value' => 'Select'))               
            ->add('sleeps', 'choice', array('required' => true,'label'=>'Sleeps','attr' => array('class' => 'form-control'), 'choices' => array('1' => '1','2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10 or more'),'empty_value' => 'Select'))               
            ->add('currency', 'entity', array('label'=>'Currency','attr' => array('class' => 'form-control'),'required' => false,  'class' => 'AppBundle:Currency','property' => 'name','empty_value' => 'Select'))                
            ->add('arrangement', null , array('required' => true,'label'=>'Bedding Arrangement','attr' => array('class' => 'form-control')))    
            ;
         
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\PropertyDetails',
        ));
    }
    
    public function getName() {
        return "propertyDetails";
    }
}


?>
