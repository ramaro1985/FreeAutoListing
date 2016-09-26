<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AttractionsAmenitiesFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('barNightClub', 'checkbox' , array('label'=> 'Bar/Night Club',  'required' => false))
                ->add('beach', 'checkbox' , array('label'=> 'Beach',  'required' => false))
                ->add('casino', 'checkbox' , array('label'=> 'Casino',  'required' => false))
                ->add('charterBoats', 'checkbox' , array('label'=> 'Charter Boats', 'required' => false))
                ->add('deepSeaFishing', 'checkbox' , array('label'=> 'Deep Sea Fishing', 'required' => false))
                ->add('airports', 'checkbox' , array('label'=> 'Airports',  'required' => false))
                ->add('horsebackRiding', 'checkbox' , array('label'=> 'Horseback Riding',  'required' => false))
                ->add('shopping', 'checkbox' , array('label'=> 'Shopping', 'required' => false))
                ->add('snorkeling', 'checkbox' , array('label'=> 'Snorkeling',  'required' => false))
               
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Frontend\AppBundle\Entity\AttractionsAmenities',
        ));
    }
             
            

    public function getName()
    {
        return 'attractionsAmenities';
    }
}
