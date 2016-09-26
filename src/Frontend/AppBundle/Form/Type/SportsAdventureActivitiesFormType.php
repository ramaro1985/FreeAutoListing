<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SportsAdventureActivitiesFormType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('basketballcourt', 'checkbox' , array('label'=> 'basketball court',  'required' => false))
                ->add('cycling', 'checkbox' , array('label'=> 'cycling',  'required' => false))
                ->add('deepseafishing', 'checkbox' , array('label'=> 'deepsea fishing',  'required' => false))
                ->add('equestrianevent', 'checkbox' , array('label'=> 'equestrian events', 'required' => false))
                ->add('fishing', 'checkbox' , array('label'=> 'fishing', 'required' => false))
                ->add('flyfishing', 'checkbox' , array('label'=> 'fly fishing',  'required' => false))
                ->add('freshwaterfishing', 'checkbox' , array('label'=> 'freshwater fishing',  'required' => false))
                ->add('golf', 'checkbox' , array('label'=> 'golf', 'required' => false))
                ->add('golfprivilegesoptional', 'checkbox' , array('label'=> 'golf privileges optional',  'required' => false))
                ->add('hiking', 'checkbox' , array('label'=> 'hiking',  'required' => false))
                ->add('hunting', 'checkbox' , array('label'=> 'hunting',  'required' => false))
                ->add('huntingbiggame', 'checkbox' , array('label'=> 'hunting big game', 'required' => false))
                ->add('huntingsmallgame', 'checkbox' , array('label'=> 'hunting small game', 'required' => false))
                ->add('iceskating', 'checkbox' , array('label'=> 'ice kating', 'required' => false))
                ->add('jetskiing', 'checkbox' , array('label'=> 'jet skiing', 'required' => false))
                ->add('mountainbiking', 'checkbox' , array('label'=> 'mountain biking',  'required' => false))                
                ->add('mountainclimbing', 'checkbox' , array('label'=> 'mountain climbing',  'required' => false))                
                ->add('mountainneering', 'checkbox' , array('label'=> 'mountain neering',  'required' => false))                
                ->add('paragliding', 'checkbox' , array('label'=> 'paragliding',  'required' => false))                
                ->add('pierfishing', 'checkbox' , array('label'=> 'pier fishing',  'required' => false))                
                ->add('rating', 'checkbox' , array('label'=> 'rating',  'required' => false))                
                ->add('rollerblading', 'checkbox' , array('label'=> 'roller blading',  'required' => false))                
                ->add('sailing', 'checkbox' , array('label'=> 'sailing',  'required' => false))                
                ->add('scubadiving', 'checkbox' , array('label'=> 'scuba diving or snorkeling',  'required' => false))                
                ->add('skiliftprivileges', 'checkbox' , array('label'=> 'ski lift privileges',  'required' => false))                
                ->add('skiprivilegesoptional', 'checkbox' , array('label'=> 'ski privileges optional',  'required' => false))                
                ->add('skiing', 'checkbox' , array('label'=> 'skiing',  'required' => false))                
                ->add('snorkeling', 'checkbox' , array('label'=> 'snorkeling',  'required' => false))                
                ->add('soundbayfiching', 'checkbox' , array('label'=> 'sound/bay fishing',  'required' => false))                
                ->add('spelunking', 'checkbox' , array('label'=> 'spelunking',  'required' => false))                
                ->add('surffishing', 'checkbox' , array('label'=> 'surf fishing',  'required' => false))                
                ->add('surfing', 'checkbox' , array('label'=> 'surfing',  'required' => false))                
                ->add('swiming', 'checkbox' , array('label'=> 'swimming',  'required' => false))                
                ->add('tennis', 'checkbox' , array('label'=> 'tennis',  'required' => false))                
                ->add('waterskiing', 'checkbox' , array('label'=> 'water skiing',  'required' => false))                
                ->add('watertubing', 'checkbox' , array('label'=> 'water tubing',  'required' => false))                
                ->add('whitewaterratting', 'checkbox' , array('label'=> 'whitewater rafting',  'required' => false))                
                ->add('windsurfing', 'checkbox' , array('label'=> 'wind-surfing',  'required' => false))                
            ;
         
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\SportsAdventureActivities',
        ));
    }
    
    public function getName() {
        return "sportsadventureactivities";
    }
}

?>
