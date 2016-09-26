<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentsOptionsFormType extends AbstractType
{
    
 public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('americanExpress', 'checkbox' , array('label'=> 'American Express',  'required' => false))
                ->add('wireTransfer', 'checkbox' , array('label'=> 'Wire Transfer',  'required' => false))
                ->add('mastercard', 'checkbox' , array('label'=> 'Mastercard',  'required' => false))
                ->add('cashiersCheck', 'checkbox' , array('label'=> "Cashier's Check", 'required' => false))
                ->add('visa', 'checkbox' , array('label'=> 'Visa', 'required' => false))
                ->add('moneyOrder', 'checkbox' , array('label'=> 'Money Order',  'required' => false))
                ->add('discover', 'checkbox' , array('label'=> 'Discover',  'required' => false))
                ->add('paypal', 'checkbox' , array('label'=> 'Paypal', 'required' => false))
                ->add('onlinePayment', 'checkbox' , array('label'=> 'Online Payment',  'required' => false))
                
            ;
         
    }


    
    
      public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Frontend\AppBundle\Entity\PaymentsOptions',
        ));
    }
             
            

    public function getName()
    {
        return 'paymentsOptions';
    }
}
