<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocationFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('country', null, array('label'=>'Country','attr' => array('class' => 'form-control add' ),'required' => false))
                ->add('address', null, array('label'=>'Full Address','attr' => array('class' => 'form-control'),'required' => true))
                ->add('property_number', null, array('attr' => array('class' => 'form-control', 'placeholder'=>'Apartment #'),'required' => false))
                ->add('administrative_area_level_1', null, array('label'=>'State Code','attr' => array('class' => 'form-control add'),'required' => false))
                ->add('route', null, array('label'=>'Street Address','attr' => array('class' => 'form-control add'),'required' => false))
                ->add('stateProvince', null, array('label'=>'State or Region','attr' => array('class' => 'form-control add'),'required' => false))
                ->add('locality', null, array('label'=>'City','attr' => array('class' => 'form-control add'),'required' => false))
                ->add('sublocality', 'hidden', array('attr' => array('class' => 'form-control add'),'required' => false))
                ->add('postal_code', null, array('label'=>'Postal Code','attr' => array('class' => 'form-control add'),'required' => false))
                ->add('administrative_area_level_2', 'hidden', array('attr' => array('class' => 'form-control add'),'required' => false))
                ->add('administrative_area_level_3', 'hidden', array('attr' => array('class' => 'form-control add'),'required' => false))
                ->add('administrative_area_level_4', 'hidden', array('attr' => array('class' => 'form-control add'),'required' => false))
                ->add('administrative_area_level_5', 'hidden', array('attr' => array('class' => 'form-control add'),'required' => false))
                ->add('postal_town', 'hidden', array('attr' => array('class' => 'form-control add'),'required' => false))
                ->add('neighborhood', 'hidden', array('attr' => array('class' => 'form-control add'),'required' => false))
                ->add('postal_code_prefix', 'hidden', array('attr' => array('class' => 'form-control add'),'required' => false))
                ->add('public', null, array('label'=>'show the exact address on the map','attr' => array('checked'=>true,'class' => 'form-control'),'required' => false))
                
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Location',
        ));
    }

    public function getName() {
        return 'location';
    }

}
