<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropertyEditFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('description', new DescriptionFormType())
                
                ->add('placesActivities', new PlacesActivitiesFormType())
                ->add('propertyDetails', new PropertyDetailsFormType())
                ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Property',
        ));
    }

    public function getName() {
        return 'property';
    }

}
