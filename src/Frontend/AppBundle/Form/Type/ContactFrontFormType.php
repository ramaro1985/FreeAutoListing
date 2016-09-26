<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\True;


class ContactFrontFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $contacttime = Array();
        $contacttime["1:00 am"] = "1:00 am";
        $contacttime["1:30 am"] = "1:30 am";
        $contacttime["2:00 am"] = "2:00 am";
        $contacttime["2:30 am"] = "2:30 am";
        $contacttime["3:00 am"] = "3:00 am";
        $contacttime["3:30 am"] = "3:30 am";
        $contacttime["4:00 am"] = "4:00 am";
        $contacttime["4:30 am"] = "4:30 am";
        $contacttime["5:00 am"] = "5:00 am";
        $contacttime["5:30 am"] = "5:30 am";
        $contacttime["6:00 am"] = "6:00 am";
        $contacttime["6:30 am"] = "6:30 am";
        $contacttime["7:00 am"] = "7:00 am";
        $contacttime["7:30 am"] = "7:30 am";
        $contacttime["8:00 am"] = "8:00 am";
        $contacttime["8:30 am"] = "8:30 am";
        $contacttime["9:00 am"] = "9:00 am";
        $contacttime["9:30 am"] = "9:30 am";
        $contacttime["10:00 am"] = "10:00 am";
        $contacttime["10:30 am"] = "10:30 am";
        $contacttime["11:00 am"] = "11:00 am";
        $contacttime["11:30 am"] = "12:30 am";
        $contacttime["12:00 am"] = "12:00 am";
        $contacttime["12:30 am"] = "12:30 am";

        $builder
            ->add('name', null, array('label' => 'First Name', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('lastName', null, array('label' => 'Last Name', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('email', null, array('validation_groups' => array('contactFront'), 'label' => 'Email', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('phone', null, array('validation_groups' => array('contactFront'), 'label' => 'Phone', 'attr' => array('class' => 'form-control'), 'required' => false))
            ->add('text', null, array('validation_groups' => array('contactFront'), 'label' => 'Message', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('userType', 'choice', array('label' => 'I am a:', 'attr' => array('style' => 'padding-top: 0px;display: inline-flex;','class' => 'checkbox'), 'choices' => array('2' => 'Dealer', '1' => 'Private Seller'), 'multiple' => false, 'expanded' => true, 'required' => true, 'empty_value' => false, 'data' => '2'))
            ->add('contacttime', 'choice', array('label' => 'Best Contact Time', 'attr' => array('class' => 'form-control'), 'choices' => $contacttime, 'required' => false, 'empty_value' => "Best Contact Time"))
            ->add('replied', "checkbox", array('label' => "Yes, I want to receive automotive info and promotions by email(you can unsubscribe at any time).", 'empty_data' => 0, 'required' => false, ));
    }

    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\ContactFront',
        ));
    }
             
            

    public function getName()
    {
        return 'contactfront';
    }
}
