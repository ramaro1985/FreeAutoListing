<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SettingsViewFormType extends AbstractType {
    
    private $caractersallowed = '200'; 
    
    public function getName() {
        return 'settingsview';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\SettingAndView',
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder                
                ->add('beachfront', 'checkbox' , array('label' => 'Beachfront', 'required' => false))
                ->add('beachfront_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('beachview', 'checkbox', array('label' => 'Beach View', 'required' => false))
                ->add('beachview_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('oceanfront', 'checkbox', array('label' => 'Oceanfront', 'required' => false))
                ->add('oceanfront_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('oceanview', 'checkbox', array('label' => 'Ocean View', 'required' => false))
                ->add('oceanview_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('lakefront', 'checkbox', array('label' => 'Lakefront', 'required' => false))
                ->add('lakefront_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('lakeview', 'checkbox', array('label' => 'Lake View', 'required' => false))
                ->add('lakeview_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('waterfront', 'checkbox', array('label' => 'Waterfront', 'required' => false))
                ->add('waterfront_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('waterview', 'checkbox', array('label' => 'Water View', 'required' => false))
                ->add('waterview_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('golfcoursefront', 'checkbox', array('label' => 'Golf Course Front', 'required' => false))
                ->add('golfcoursefront_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('golfcourseview', 'checkbox', array('label' => 'Golf Course View', 'required' => false))
                ->add('golfcourseview_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('ski_in', 'checkbox', array('label' => 'Ski-In', 'required' => false))
                ->add('ski_in_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('ski_out', 'checkbox', array('label' => 'Ski-Out', 'required' => false))
                ->add('ski_out_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('rural', 'checkbox', array('label' => 'Rural', 'required' => false))
                ->add('rural_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('mountainview', 'checkbox', array('label' => 'Mountain View', 'required' => false))
                ->add('mountainview_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('monumentview', 'checkbox', array('label' => 'Monument View', 'required' => false))
                ->add('monumentview_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('downtown', 'checkbox', array('label' => 'Downtown', 'required' => false))
                ->add('downtown_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('village', 'checkbox', array('label' => 'Village', 'required' => false))
                ->add('village_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('resort', 'checkbox', array('label' => 'Resort', 'required' => false))
                ->add('resort_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('neartheocean', 'checkbox', array('label' => 'Near The Ocean', 'required' => false))
                ->add('neartheocean_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('town', 'checkbox', array('label' => 'Town', 'required' => false))
                ->add('town_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('lake', 'checkbox', array('label' => 'Lake', 'required' => false))
                ->add('lake_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
                ->add('river', 'checkbox', array('label' => 'River', 'required' => false))
                ->add('river_details', 'textarea', array('attr' => array('class' => 'form-control', 'placeholder' => 'Add details about this feature (optional).','maxlength' => $this->caractersallowed,'disabled'=>'true')))
        ;
    }

}

?>
