<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\File;

class FeedsFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('facebook', 'url', array('label'=>'Facebook','attr' => array('class' => 'form-control add' ),'required' => false))
            ->add('twitter', 'url' , array('label'=>'Twitter','attr' => array('class' => 'form-control'),'required' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
                'data_class' => 'Frontend\AppBundle\Entity\Feeds',
            ));
    }

    public function getName() {
        return 'feeds';
    }

}
