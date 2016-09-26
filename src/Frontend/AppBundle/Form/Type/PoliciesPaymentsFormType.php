<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PoliciesPaymentsFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('miscellaneousFees', new MiscellaneousFeesFormType())
                ->add('otherPaymentsOptions', new OtherPaymentsOptionsFormType())
                ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\PoliciesPayments',
        ));
    }

    public function getName() {
        return 'policiesPayments';
    }

}
