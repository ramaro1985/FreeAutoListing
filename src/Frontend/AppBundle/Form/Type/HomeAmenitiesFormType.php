<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HomeAmenitiesFormType extends AbstractType {
    
       

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder                
                ->add('airConditioned', 'checkbox' , array('label'=> 'Air Conditioned',  'required' => false))
                ->add('balcony', 'checkbox' , array('label'=> 'Balcony',  'required' => false))
                ->add('ceilingFans', 'checkbox' , array('label'=> 'Ceiling Fans',  'required' => false))
                ->add('petsAllowed', 'checkbox' , array('label'=> 'Pets Allowed', 'required' => false))
                ->add('communityExerciseRoom', 'checkbox' , array('label'=> 'Community Exercise Room', 'required' => false))
                ->add('fullkitchen', 'checkbox' , array('label'=> 'Full Kitchen',  'required' => false))
                ->add('garage', 'checkbox' , array('label'=> 'Garage',  'required' => false))
                ->add('longTermRenters', 'checkbox' , array('label'=> 'Long Term Renters', 'required' => false))
                ->add('heater', 'checkbox' , array('label'=> 'Heater',  'required' => false))
                ->add('nonSmokingOnly', 'checkbox' , array('label'=> 'Non Smoking Only',  'required' => false))
                ->add('pool', 'checkbox' , array('label'=> 'Pool',  'required' => false))
                ->add('childrenWelcome', 'checkbox' , array('label'=> 'Children Welcome',  'required' => false))
                ->add('telephone', 'checkbox' , array('label'=> 'Telephone',  'required' => false))
                ->add('fireplace', 'checkbox' , array('label'=> 'Fireplace',  'required' => false))
                ->add('hotTub', 'checkbox' , array('label'=> 'Hot Tub',  'required' => false))
                ->add('washingMachine', 'checkbox' , array('label'=> 'Washing Machine',  'required' => false))
                ->add('parking', 'checkbox' , array('label'=> 'Parking',  'required' => false))
                ->add('linens', 'checkbox' , array('label'=> 'Linens Provided',  'required' => false))
                ->add('towels', 'checkbox' , array('label'=> 'Towels Provided',  'required' => false))
                ->add('yard', 'checkbox' , array('label'=> 'Yard/Garden',  'required' => false))
                ->add('deck', 'checkbox' , array('label'=> 'Deck/Patio',  'required' => false))
                ->add('wheelchairAccessible', 'checkbox' , array('label'=> 'Wheelchair Accessible',  'required' => false))
            ;
        ;
    }
    
    

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\HomeAmenities',
        ));
    }
    
    public function getName() {
        return 'homeAmenities';
    }

}

?>
