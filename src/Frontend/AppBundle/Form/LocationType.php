<?php

namespace Frontend\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address')
            ->add('route')
            ->add('property_number')
            ->add('country')
            ->add('stateProvince')
            ->add('administrative_area_level_1')
            ->add('administrative_area_level_2')
            ->add('administrative_area_level_3')
            ->add('administrative_area_level_4')
            ->add('administrative_area_level_5')
            ->add('locality')
            ->add('sublocality')
            ->add('postal_town')
            ->add('neighborhood')
            ->add('postal_code')
            ->add('postal_code_prefix')
            ->add('public')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Location'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'frontend_appbundle_location';
    }
}
