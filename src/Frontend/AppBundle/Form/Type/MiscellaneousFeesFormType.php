<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MiscellaneousFeesFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cleaningFee', null, array('label'=>'Cleaning Fee','attr' => array('class' => 'form-control'),'required' => false))
            ->add('lodgingTax', null, array('label'=>'Lodging Tax','attr' => array('class' => 'form-control'),'required' => false))
            ->add('otherFees', null, array('label'=>'Other Fees','attr' => array('class' => 'form-control'),'required' => false))    
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Frontend\AppBundle\Entity\MiscellaneousFees',
        ));
    }
             
            

    public function getName()
    {
        return 'miscellaneousFees';
    }
}
