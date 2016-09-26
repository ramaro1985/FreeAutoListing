<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LeisureActivitiesFormType extends AbstractType {
    
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('antiquing', 'checkbox' , array('label'=> 'antiquing',  'required' => false))
                ->add('beachcombing', 'checkbox' , array('label'=> 'beachcombing',  'required' => false))
                ->add('birdwatching', 'checkbox' , array('label'=> 'bird watching',  'required' => false))
                ->add('ecotourism', 'checkbox' , array('label'=> 'ecotourism', 'required' => false))
                ->add('gamblingcasinos', 'checkbox' , array('label'=> 'gambling casinos', 'required' => false))
                ->add('horsebackriding', 'checkbox' , array('label'=> 'horseback riding',  'required' => false))
                ->add('horseshoes', 'checkbox' , array('label'=> 'horseshoes',  'required' => false))
                ->add('luaus', 'checkbox' , array('label'=> 'luaus', 'required' => false))
                ->add('outletshopping', 'checkbox' , array('label'=> 'outlet shopping',  'required' => false))
                ->add('paddleboating', 'checkbox' , array('label'=> 'paddle boating',  'required' => false))
                ->add('photofraphy', 'checkbox' , array('label'=> 'photofraphy',  'required' => false))
                ->add('scenicdrives', 'checkbox' , array('label'=> 'scenic drives', 'required' => false))
                ->add('sightseeing', 'checkbox' , array('label'=> 'sight seeing', 'required' => false))
                ->add('sleddig', 'checkbox' , array('label'=> 'sleddig', 'required' => false))
                ->add('walking', 'checkbox' , array('label'=> 'walking', 'required' => false))
                ->add('whalewatching', 'checkbox' , array('label'=> 'whale watching',  'required' => false))                
            ;
         
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\LeisureActivities',
        ));
    }
    
    public function getName() {
        return "leisureactivities";
    }
}


?>
