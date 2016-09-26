<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Range;

class PeriodsFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('seasonName', null, array('label'=>'Period Name','attr' => array('class' => 'form-control'),'required' => true))
            ->add('startDate', 'date', array('format' => 'MM/dd/yyyy','widget'=>'single_text','label'=>'Start Date','attr' => array('class' => 'form-control period-calendar'),'required' => true))
            ->add('endDate', 'date', array('format' => 'MM/dd/yyyy','widget'=>'single_text','label'=>'End Date','attr' => array('class' => 'form-control period-calendar'),'required' => true))
            ->add('minStay',null, array('validation_groups' => array('propertyPeriod'), 'label'=>'Minimum Stay','attr' => array('class' => 'form-control'),'required' => true))    
            ->add('nightly', null, array('validation_groups' => array('propertyPeriod'),'label'=>'Per Night','attr' => array('class' => 'form-control'),'required' => true))    
            ->add('weekly', null, array('validation_groups' => array('propertyPeriod'),'label'=>'Weekly','attr' => array('class' => 'form-control'),'required' => false))        
            ->add('monthly', null, array('validation_groups' => array('propertyPeriod'),'label'=>'Monthly','attr' => array('class' => 'form-control'),'required' => false))          
            ->add('notes', null , array('label'=>'Additional Notes','attr' => array('class' => 'form-control'), 'required' => false))
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Period',
        ));
    }
             
            

    public function getName()
    {
        return 'period';
    }
}
