<?php

namespace Frontend\AppBundle\Form\Type;

use Frontend\AppBundle\Entity\ProfileServices;
use Frontend\AppBundle\Entity\UsefulInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServicesAndUsefullInformationFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder/*->add('profileservices', 'collection', array('type' => new ProfileServicesFormType()))*/
            ->add('services', 'entity', array(
                'class' => 'AppBundle:Services',
                'property' => 'name',
                'expanded' => true,
                'multiple' => true,))
            ->add('usefulinformation', new UsefulInformationFormType());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\Profile',
                'cascade_validation' => true,
                'em'         => '' ,
            )
        );
    }

    public function getName()
    {
        return 'servicesAndUsefullInformation';
    }

}
