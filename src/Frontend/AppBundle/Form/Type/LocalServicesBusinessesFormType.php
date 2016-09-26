<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocalServicesBusinessesFormType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('atmbank', 'checkbox' , array('label'=> 'ATM/bank',  'required' => false))
                ->add('fitnesscenter', 'checkbox' , array('label'=> 'fitness center',  'required' => false))
                ->add('groceries', 'checkbox' , array('label'=> 'groceries',  'required' => false))
                ->add('hospital', 'checkbox' , array('label'=> 'hospital', 'required' => false))
                ->add('laundromat', 'checkbox' , array('label'=> 'laundromat', 'required' => false))
                ->add('massagetherpist', 'checkbox' , array('label'=> 'massage therapist',  'required' => false))                               
                ->add('medicalservices', 'checkbox' , array('label'=> 'medical services',  'required' => false))                               
                ->add('babysitter', 'checkbox' , array('label'=> 'Babysitter',  'required' => false)) 
            ;
         
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\LocalServicesBusinesses',
        ));
    }
    
    public function getName() {
        return "localservicesbusinesses";
    }    
}

?>
