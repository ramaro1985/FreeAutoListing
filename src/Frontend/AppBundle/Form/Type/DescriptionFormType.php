<?php

namespace Frontend\AppBundle\Form\Type;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DescriptionFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $hoursOpen = Array();
        $hoursOpen["1:00 am"] = "1:00 am";
        $hoursOpen["1:30 am"] = "1:30 am";
        $hoursOpen["2:00 am"] = "2:00 am";
        $hoursOpen["2:30 am"] = "2:30 am";
        $hoursOpen["3:00 am"] = "3:00 am";
        $hoursOpen["3:30 am"] = "3:30 am";
        $hoursOpen["4:00 am"] = "4:00 am";
        $hoursOpen["4:30 am"] = "4:30 am";
        $hoursOpen["5:00 am"] = "5:00 am";
        $hoursOpen["5:30 am"] = "5:30 am";
        $hoursOpen["6:00 am"] = "6:00 am";
        $hoursOpen["6:30 am"] = "6:30 am";
        $hoursOpen["7:00 am"] = "7:00 am";
        $hoursOpen["7:30 am"] = "7:30 am";
        $hoursOpen["8:00 am"] = "8:00 am";
        $hoursOpen["8:30 am"] = "8:30 am";
        $hoursOpen["9:00 am"] = "9:00 am";
        $hoursOpen["9:30 am"] = "9:30 am";
        $hoursOpen["10:00 am"] = "10:00 am";
        $hoursOpen["10:30 am"] = "10:30 am";
        $hoursOpen["11:00 am"] = "11:00 am";
        $hoursOpen["11:30 am"] = "12:30 am";
        $hoursOpen["12:00 am"] = "12:00 am";
        $hoursOpen["12:30 am"] = "12:30 am";
        $hoursClose = Array();
        $hoursClose["1:00 pm"] = "1:00 pm";
        $hoursClose["1:30 pm"] = "1:30 pm";
        $hoursClose["2:00 pm"] = "2:00 pm";
        $hoursClose["2:30 pm"] = "2:30 pm";
        $hoursClose["3:00 pm"] = "3:00 pm";
        $hoursClose["3:30 pm"] = "3:30 pm";
        $hoursClose["4:00 pm"] = "4:00 pm";
        $hoursClose["4:30 pm"] = "4:30 pm";
        $hoursClose["5:00 pm"] = "5:00 pm";
        $hoursClose["5:30 pm"] = "5:30 pm";
        $hoursClose["6:00 pm"] = "6:00 pm";
        $hoursClose["6:30 pm"] = "6:30 pm";
        $hoursClose["7:00 pm"] = "7:00 pm";
        $hoursClose["7:30 pm"] = "7:30 pm";
        $hoursClose["8:00 pm"] = "8:00 pm";
        $hoursClose["8:30 pm"] = "8:30 pm";
        $hoursClose["9:00 pm"] = "9:00 pm";
        $hoursClose["9:30 pm"] = "9:30 pm";
        $hoursClose["10:00 pm"] = "10:00 pm";
        $hoursClose["10:30 pm"] = "10:30 pm";
        $hoursClose["11:00 pm"] = "11:00 pm";
        $hoursClose["11:30 pm"] = "12:30 pm";
        $hoursClose["12:00 pm"] = "12:00 pm";
        $hoursClose["12:30 pm"] = "12:30 pm";

        $builder
            ->add('name', null, array('label' => 'Dealer Name', 'attr' => array('class' => 'form-control'), 'required' => true))
            //->add('tagline', null, array('label' => 'Tagline', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('address', null, array('label' => 'Address', 'attr' => array('class' => 'form-control', 'onFocus' => "geolocate()", 'placeholder' => " "), 'required' => true))
            //->add('hours', 'choice', array('label' => 'Operation Hours', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('hoursopen', 'choice', array('label' => 'Operation Hours', 'attr' => array('class' => 'form-control'), 'choices' => $hoursOpen, 'required' => false, 'empty_value' => "Opens at"))
            ->add('hoursclose', 'choice', array('label' => 'Operation Hours', 'attr' => array('class' => 'form-control'), 'choices' => $hoursClose, 'required' => false, 'empty_value' => "Closes at"))
            //->add('whyBuyNew', null, array('label' => 'Why you should buy a new car from us', 'attr' => array('class' => 'form-control'), 'required' => false))
            //->add('whyBuyUsed', null, array('label' => 'Why you should buy a used car from us', 'attr' => array('class' => 'form-control'), 'required' => false))
            //->add('Disclaimer', null, array('label' => 'Dealer Disclaimer', 'attr' => array('class' => 'form-control'), 'required' => false))
            ->add('phone', null, array('label' => 'Phone Number', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('email', 'email', array('label' => 'Email Address', 'attr' => array('class' => 'form-control'), 'required' => true))
            ->add('webPage', 'url', array('default_protocol' => 'http://, ftp://,https://', 'label' => 'Website URL', 'attr' => array('class' => 'form-control'), 'required' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Description',
        ));
    }

    public function getName()
    {
        return 'description';
    }

}
