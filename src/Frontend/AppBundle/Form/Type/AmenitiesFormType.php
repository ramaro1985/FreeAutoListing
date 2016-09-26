<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AmenitiesFormType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('homeAmenities', new HomeAmenitiesFormType())
                ->add('electronicsEntertaimentAmenities', new ElectronicsEntertaimentAmenitiesFormType())
                ->add('kitchenAmenities', new KitchenAmenitiesFormType())
                ->add('attractionsAmenities', new AttractionsAmenitiesFormType())
                ->add('additionalInfo', null , array('label'=>'Additional Information','attr' => array('class' => 'form-control')))
                ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Amenities',
        ));
    }
    
    public function getName() {
        return "amenities";
    }    
}

?>
