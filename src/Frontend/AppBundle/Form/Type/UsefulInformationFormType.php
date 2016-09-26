<?php

namespace Frontend\AppBundle\Form\Type;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsefulInformationFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add(
            'languages',
            'entity',
            array(
                'label' => 'Languages Spoken',
                'attr' => array('class' => 'service_element'),
                'class' => 'AppBundle:Languages',
                'property' => 'name',
                'multiple' => true,
                'expanded' => true
            )
        )
            ->add(
                'whyBuyaCar',
                'textarea',
                array(
                    'label' => 'Why to Buy a Car from this Dealer',
                    'attr' => array('class' => 'form-control'),
                    'required' => false
                )
            )
            ->add(
                'Disclaimer',
                null,
                array('label' => 'Dealer Disclaimer', 'attr' => array('class' => 'form-control'), 'required' => false)
            );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\UsefulInformation',
            )
        );
    }

    public function getName()
    {
        return 'UsefulInformation';
    }

}
