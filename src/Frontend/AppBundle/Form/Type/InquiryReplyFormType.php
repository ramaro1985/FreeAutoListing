<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InquiryReplyFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', 'textarea', array('label' => '', 'attr' => array('class' => 'form-control description disabled', 'rows' => 6), 'max_length' => 2000, 'required' => true));

    }

    public function getName()
    {
        return 'inquiryReply';
    }
}
