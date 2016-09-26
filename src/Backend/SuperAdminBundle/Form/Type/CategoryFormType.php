<?php

namespace Backend\SuperAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder
            ->add('name', null, array('label'=>'Name','attr' => array('class' => 'form-control'),'required' => true))
            ->add('description', null, array('label'=>'Description','attr' => array('class' => 'form-control'),'required' => true))
            ;
         
    }

    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Category',
        ));
    }
             
            

    public function getName()
    {
        return 'category';
    }
}
