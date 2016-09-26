<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GalleryFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('profileImages', 'collection', array('type' => new ProfileImageFormType(),'allow_add' => true, 'required'=>false, 'by_reference' => false,'allow_delete' => true))
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Gallery',
        ));
    }
             
            

    public function getName()
    {
        return 'gallery';
    }
}
