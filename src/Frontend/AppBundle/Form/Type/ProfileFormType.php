<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\File;

class ProfileFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('description', new DescriptionFormType())
                //->add('contact', new ContactFormType())
                ->add('photo', null , array('label'=>'Dealership Logo', 'constraints' => array(new File(array('maxSize'=>'2M'))), 'data_class' =>null, 'required' => false, 'attr' => array('accept'=>'image/*'))) 
                //->add('propertyDetails', new PropertyDetailsFormType())
                ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Profile',
        ));
    }

    public function getName() {
        return 'profile';
    }

}
