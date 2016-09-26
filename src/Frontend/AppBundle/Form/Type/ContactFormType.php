<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactFormType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('name', null , array( 'label'=>'Contact Name', 'required' => true, 'attr' => array('class' => 'form-control')))
            //->add('displayName', 'choice' , array('label'=>'Display','attr' => array('class' => 'form-control'),'choices' => array(false => 'No', true => 'Yes') , 'required' => false, 'empty_value' => false))
            ->add('phone1', null , array('label'=>'Phone Number', 'attr' => array('class' => 'form-control'),'required' => true))
            //->add('displayPhone1', 'choice' , array('label'=>'Display','attr' => array('class' => 'form-control'),'choices' => array( false => 'No', true => 'Yes') , 'required' => false, 'empty_value' => false))
            //->add('phone2', null, array('label'=>'Alternate Phone','attr' => array('class' => 'form-control'),'required' => false))
            //->add('displayPhone2',  'choice' , array('label'=>'Display','attr' => array('class' => 'form-control'),'choices' => array(false => 'No', true => 'Yes') , 'required' => false, 'empty_value' => false))
            //->add('phone3', null , array('label'=>'International Phone','attr' => array('class' => 'form-control'),'required' => false))
            //->add('displayPhone3', 'choice' , array('label'=>'Display','attr' => array('class' => 'form-control'),'choices' => array(false => 'No', true=> 'Yes') , 'required' => false, 'empty_value' => false))
            //->add('fax', null, array('label'=>'Fax','attr' => array('class' => 'form-control'),'required' => false))
            //->add('displayFax',  'choice' , array('label'=>'Display','attr' => array('class' => 'form-control'),'choices' => array(false => 'No', true => 'Yes') , 'required' => false, 'empty_value' => false))
            ->add('email', 'email', array('label'=>'Email Address','attr' => array('class' => 'form-control'),'required' => true))
            //->add('displayEmail', 'choice' , array('label'=>'Display','attr' => array('class' => 'form-control'),'choices' => array(false => 'No', true => 'Yes') , 'required' => false, 'empty_value' => false))
            ->add('webPage', 'url', array('label'=>'Website URL','attr' => array('class' => 'form-control'),'required' => false))
            //->add('displayWebPage',  'choice' , array('label'=>'Display','attr' => array('class' => 'form-control'),'choices' => array(false => 'No', true => 'Yes') , 'required' => false, 'empty_value' => false))
            //->add('languages', new LanguagesFormType())
            
            ;
         
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Frontend\AppBundle\Entity\Contact',
        ));
    }
             
            

    public function getName()
    {
        return 'contact';
    }
}
