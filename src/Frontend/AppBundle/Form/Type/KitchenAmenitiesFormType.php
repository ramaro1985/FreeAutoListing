<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class KitchenAmenitiesFormType extends AbstractType
{
    
 public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('blender', 'checkbox' , array('label'=> 'Blender',  'required' => false))
                ->add('coffeMaker', 'checkbox' , array('label'=> 'Coffee Maker',  'required' => false))
                ->add('freezer', 'checkbox' , array('label'=> 'Freezer',  'required' => false))
                ->add('garbageDisposal', 'checkbox' , array('label'=> 'Garbage Disposal', 'required' => false))
                ->add('kitchenUtensils', 'checkbox' , array('label'=> 'Kitchen Utensils', 'required' => false))
                ->add('potsPans', 'checkbox' , array('label'=> 'Pots and Pans',  'required' => false))
                ->add('toaster', 'checkbox' , array('label'=> 'Toaster',  'required' => false))
                ->add('oven', 'checkbox' , array('label'=> 'Oven', 'required' => false))
                ->add('dishwasher', 'checkbox' , array('label'=> 'Dishwasher',  'required' => false))
                ->add('stove', 'checkbox' , array('label'=> 'Stove',  'required' => false))
                ->add('microwave', 'checkbox' , array('label'=> 'Microwave', 'required' => false))
                ->add('grill', 'checkbox' , array('label'=> 'Grill',  'required' => false))
            ;
         
    }


    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Frontend\AppBundle\Entity\KitchenAmenities',
        ));
    }
             
            

    public function getName()
    {
        return 'kitchenAmenities';
    }
}
