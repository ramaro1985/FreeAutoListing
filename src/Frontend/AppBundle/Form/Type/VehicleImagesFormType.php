<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\File;

class VehicleImagesFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('attr' => array('class' => 'form-control'),'required' => false))
            ->add('orden', null, array('attr' => array('class' => 'form-control'),'required' => false))    
            ->add('photo', null , array( 'constraints' => array(new File(array('maxSize'=>'5M'))), 'data_class' =>null, 'required' => false, 'attr' => array('accept'=>'image/*','onchange'=>'preview(this);')))
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\VehicleImage',
        ));
    }
             
            

    public function getName()
    {
        return 'vehicleImages';
    }
}
