<?php

namespace Backend\SuperAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TagsFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         //$user = $options['attr']['user'];
         //$status = $options['attr']['status'];
        $builder
            ->add('name', null, array('label'=>'Name','attr' => array('class' => 'form-control'),'required' => true))
            ;
         
    }

    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Tags',
        ));
    }
             
            

    public function getName()
    {
        return 'tags';
    }
}
