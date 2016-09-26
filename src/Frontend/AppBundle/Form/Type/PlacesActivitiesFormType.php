<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlacesActivitiesFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('car', 'choice', array('label'=>'Car','attr' => array('class' => 'car pull-left'),'choices' => array('0' => 'necessary','1' => 'not necessary','2' => 'recommended' ), 'multiple'=> false, 'expanded' => true ,'required' => false, 'empty_value' => false))
            ->add('nearestAirport', null , array('label'=>'Nearest Airport','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestAirportDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestAirportDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'), 'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            ->add('nearestBeach', null , array('label'=>'Nearest Beach','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestBeachDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestBeachDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            ->add('nearestFerry', null , array('label'=>'Nearest Ferry','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestFerryDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestFerryDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            ->add('nearestTrain', null , array('label'=>'Nearest Train','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestTrainDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestTrainDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            ->add('nearestHighway', null , array('label'=>'Nearest Highway','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestHighwayDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestHighwayDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            ->add('nearestBar', null , array('label'=>'Nearest Bar','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestBarDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestBarDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            ->add('nearestSki', null , array('label'=>'Nearest Ski','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestSkiDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestSkiDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            ->add('nearestGolf', null , array('label'=>'Nearest Golf','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestGolfDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestGolfDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            ->add('nearestRestaurant', null , array('label'=>'Nearest Restaurant','attr' => array('class' => 'form-control'), 'required' => false))
            ->add('nearestRestaurantDistance', 'number', array('attr' => array('class' => 'form-control','placeholder'=>'Distance') , 'required' => false))
            ->add('nearestRestaurantDistanceUnit', 'choice', array('attr' => array('class' => 'form-control'),'choices' => array('0' => 'Miles','1' => 'Kilometers', '2' => 'Meters'),'required' => false,'empty_value' => false))
            
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Frontend\AppBundle\Entity\PlacesActivities',
        ));
    }
             
            

    public function getName()
    {
        return 'placesActivities';
    }
}
