<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReviewFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$user = $options['attr']['user'];
        //$status = $options['attr']['status'];
        $builder
            ->add('name', null, array('label' => 'Name', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('title', null, array('label' => 'Title', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('description', null, array('label' => 'Your Review', 'attr' => array('class' => 'form-control', 'rows' => '5'), 'required' => true))
            ->add('email', 'email', array('label' => 'Email', 'attr' => array('class' => 'form-control'), 'required' => false))
            ->add('city', null, array('label' => 'City, State', 'attr' => array('class' => 'form-control'), 'required' => false))
            ->add('purchase', 'choice', array(
                    'choices' => array(true => 'yes', false => 'no'),
                    'expanded' => true, 'label' => 'Did you purchase a vehicle from us?',
                'attr' => array('class' =>'radio'))
            )
            ->add('customerservice', 'hidden', array('required' => false))
            ->add('price', 'hidden', array('required' => false))
            ->add('overall', 'hidden', array('required' => false))
            ->add('facilities', 'hidden', array('required' => false))
            ->add('phone', null, array('validation_groups' => array('contactFront'), 'label' => 'Phone Number', 'attr' => array('class' => 'form-control'), 'required' => false));


    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Review',
        ));
    }
             
            

    public function getName()
    {
        return 'review';
    }
}
