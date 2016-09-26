<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LanguagesFormType extends AbstractType {
    
       

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder                
                ->add('english', 'checkbox' , array('label'=> 'English',  'required' => false))
                ->add('spanish', 'checkbox' , array('label'=> 'Spanish',  'required' => false))
                ->add('russian', 'checkbox' , array('label'=> 'Russian',  'required' => false))
                ->add('chinese', 'checkbox' , array('label'=> 'Chinese', 'required' => false))
                ->add('german', 'checkbox' , array('label'=> 'German', 'required' => false))
                ->add('french', 'checkbox' , array('label'=> 'French',  'required' => false))
                ->add('portuguese', 'checkbox' , array('label'=> 'Portuguese',  'required' => false))
                ->add('arabic', 'checkbox' , array('label'=> 'Arabic', 'required' => false))
                
            ;
        ;
    }
    
    

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Languages',
        ));
    }
    
    public function getName() {
        return 'languages';
    }

}

?>
