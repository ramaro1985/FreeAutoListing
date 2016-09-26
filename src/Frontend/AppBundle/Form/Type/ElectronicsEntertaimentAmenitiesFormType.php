<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ElectronicsEntertaimentAmenitiesFormType extends AbstractType {
    
     public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder                
                ->add('cableTv', 'checkbox' , array('label'=> 'Cable/Satellite',  'required' => false))
                ->add('dialUpInternetAccess', 'checkbox' , array('label'=> 'Internet Access',  'required' => false))
                ->add('dvdLibrary', 'checkbox' , array('label'=> 'Movie Library',  'required' => false))
                ->add('homeStereo', 'checkbox' , array('label'=> 'Stereo', 'required' => false))
                ->add('premiunChannels', 'checkbox' , array('label'=> 'Premium Channels', 'required' => false))
                ->add('tv', 'checkbox' , array('label'=> 'TV',  'required' => false))
                ->add('tvGames', 'checkbox' , array('label'=> 'Video Games',  'required' => false))
                ->add('vcrPlayer', 'checkbox' , array('label'=> 'Toys', 'required' => false))
                ->add('wirelessInternetAccess', 'checkbox' , array('label'=> 'Wireless Internet Access',  'required' => false))
                ->add('boardGames', 'checkbox' , array('label'=> 'Board & Card Games',  'required' => false))
                ->add('books', 'checkbox' , array('label'=> 'Books',  'required' => false))
                ->add('musicLibrary', 'checkbox' , array('label'=> 'Music Library',  'required' => false))
               
            ;
        
    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\ElectronicsEntertaimentAmenities',
        ));
    }
    
    public function getName() {
        return "electronicsEntertaimentAmenities";
    }
}

?>
