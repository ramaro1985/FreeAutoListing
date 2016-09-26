<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 27/08/2015
 * Time: 8:55
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OfferFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'remitent_name',
                null,
                array(
                    'attr' => array('class' => 'form-control', 'widget' => 'single_text', 'placeholder' => 'Full Name'),
                )
            )->add(
                'remitent_mail',
                'email',
                array(
                    'attr' => array('class' => 'form-control', 'widget' => 'single_text', 'placeholder' => 'Email'),
                    'required' => true
                )
            )->add(
                'remitent_phone',
                'number',
                array(
                    'attr' => array('class' => 'form-control', 'widget' => 'single_text', 'placeholder' => 'Phone (Optional)'),
                    'required' => false
                )
            )->add(
                'text',
                'number',
                array('attr' => array('class' => 'form-control', 'widget' => 'single_text'),
                    'required' => true
                )
            );

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\Email',
            )
        );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return "offer";
    }

} 