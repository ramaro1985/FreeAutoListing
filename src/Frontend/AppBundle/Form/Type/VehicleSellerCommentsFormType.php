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

class VehicleSellerCommentsFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('seller_comments', 'textarea', array('label' => '', 'attr' => array('class' => 'form-control description disabled','rows'=>4, 'placeholder' => 'Seller Comments','onchange'=> 'SellerChangeEvent(this)' , 'onkeypress' => 'contador_regresivo(this, event,"vehiclesellercomments_seller_comments") '), 'max_length' => 2000, 'required' => false));
            ->add('seller_comments', 'textarea', array('label' => '', 'attr' => array('class' => 'form-control description disabled','rows'=>4, 'placeholder' => 'Seller Comments'), 'max_length' => 2000, 'required' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Frontend\AppBundle\Entity\Vehicle',
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
        return "vehiclesellercomments";
    }

}