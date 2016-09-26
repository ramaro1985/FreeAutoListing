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
use Frontend\AppBundle\Entity\MakeRepository;
use Frontend\AppBundle\Entity\ModelRepository;
use Doctrine\ORM\EntityRepository;

class VehicleInformationFormType extends AbstractType
{

    private $private_seller = false;

    public function __construct($isPrivate)
    {
        $this->private_seller = ($isPrivate != null) ? $isPrivate : false;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'zipcode',
                null,
                array(
                    'label' => 'Zip Code where vehicle will be sold',
                    'attr' => array('class' => 'form-control'),
                    'required' => true
                )
            )
            ->add('vin', null, array('label' => 'VIN', 'attr' => array('class' => 'form-control'), 'required' => false))
            ->add(
                'bodystyle',
                'entity',
                array(
                    'label' => 'Body Style',
                    'attr' => array('class' => 'form-control'),
                    'class' => 'AppBundle:VehicleStyle',
                    'property' => 'name',
                    'empty_value' => "Select a Style",
                    'required' => true,
                    'multiple' => false,
                    'expanded' => false
                )
            )
            ->add(
                'condition',
                'entity',
                array(
                    'label' => 'Condition',
                    'attr' => array('class' => 'form-control'),
                    'class' => 'AppBundle:Condition',
                    'property' => 'name',
                    'empty_value' => "Select a Condition",
                    'required' => true,
                    'multiple' => false,
                    'expanded' => false
                )
            )
            ->add(
                'mileage',
                null,
                array(
                    'label' => 'Mileage',
                    'attr' => array('class' => 'form-control'),
                    'required' => true
                )
            )
            ->add(
                'price',
                null,
                array(
                    'label' => 'Price',
                    'attr' => array('class' => 'form-control'),
                    'required' => true
                )
            );

        if ($this->private_seller == false)
            $builder->add(
                'stock_number',
                null,
                array(
                    'label' => 'Stock Number',
                    'attr' => array('class' => 'form-control', 'required' => true),
                    'required' => true
                )
            )->add(
                'year',
                'entity',
                array(
                    'label' => 'Year',
                    'attr' => array('class' => 'form-control'),
                    'class' => 'AppBundle:Year',
                    'property' => 'year',
                    'empty_value' => "Select a Year",
                    'required' => true,
                    'multiple' => false,
                    'expanded' => false,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.year', 'DESC');
                    }
                )
            )->add(
                'msrp',
                null,
                array(
                    'label' => 'Msrp',
                    'attr' => array('class' => 'form-control'),
                    'required' => false
                )
            );

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\VehicleBasicInformation',
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
        return "vehicleinformation";
    }

} 