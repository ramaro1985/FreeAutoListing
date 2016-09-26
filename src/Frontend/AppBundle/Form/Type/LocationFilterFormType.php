<?php

namespace Frontend\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Frontend\AppBundle\Entity\CountriesRepository;
use Frontend\AppBundle\Entity\RegionsRepository;
use Frontend\AppBundle\Entity\CitiesRepository;

class LocationFilterFormType extends AbstractType {

    
     public function __construct($em) {
        $this->em = $em;
    }
    
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $country = $options['attr']['country'];
        $region = $options['attr']['region'];
        $city = $options['attr']['city'];
        $zipCode = $options['attr']['zipCode'];
        
      if ($country != ''){
          $builder->add('country', 'entity', array('label'=>'Country',
                     'query_builder' => function (CountriesRepository $er) use ($country) {
                return $er->createQueryBuilder('c')
                ->select('c')
                ->orderBy('c.id', 'ASC');
            }    
                 ,'data'=> $this->em->getReference("AppBundle:Countries", $country)
                 ,'attr' => array('class' => 'form-control'),'class' => 'AppBundle:Countries','property' => 'country_name' , 'empty_value' => 'Select', 'required'=>false));   
        }else {
            $builder->add('country', 'entity', array('label'=>'Country',
                     'query_builder' => function (CountriesRepository $er) use ($country) {
                return $er->createQueryBuilder('c')
                ->select('c')
                ->orderBy('c.id', 'ASC');
            }    
                ,'data'=> $this->em->getReference("AppBundle:Countries", '231')
                 ,'attr' => array('class' => 'form-control'),'class' => 'AppBundle:Countries','property' => 'country_name' , 'empty_value' => 'Select', 'required'=>false));   
        }
        
        
         if ($region != ''){
        $builder->add('stateProvince', 'entity', array('label'=>'State/Province',
                      'query_builder' => function (RegionsRepository $er) use ($region) {
                return $er->createQueryBuilder('r')
                ->select('r')
                ->orderBy('r.id', 'ASC');
            }    
                 ,'data'=> $this->em->getReference("AppBundle:Regions", $region)
                   , 'attr' => array('class' => 'form-control'),'class' => 'AppBundle:Regions','property' => 'region_name' , 'empty_value' => 'Select', 'required'=>false));
         }else {
              
             $builder->add('stateProvince', 'entity', array('label'=>'State/Province',
                      'query_builder' => function (RegionsRepository $er) use ($country,$region) {
                return $er->createQueryBuilder('r')
                ->select('r')
                ->andWhere('r.country = :country')
                ->orderBy('r.id', 'ASC')
                ->setParameter('country', $country);
            }    
                   , 'attr' => array('class' => 'form-control'),'class' => 'AppBundle:Regions','property' => 'region_name' , 'empty_value' => 'Select', 'required'=>false));
          
         } 
         
         if ($city != ''){
        $builder->add('city', 'entity', array('label'=>'City',
                      'query_builder' => function (CitiesRepository $er) use ($city) {
                return $er->createQueryBuilder('ci')
                ->select('ci')
                ->orderBy('ci.id', 'ASC');
            }    
                 ,'data'=> $this->em->getReference("AppBundle:Cities", $city)
                   , 'attr' => array('class' => 'form-control'),'class' => 'AppBundle:Cities','property' => 'city_name' , 'empty_value' => 'Select', 'required'=>false));
         }else {
             $builder->add('city', 'entity', array('label'=>'City',
                      'query_builder' => function (CitiesRepository $er) use ($city) {
                return $er->createQueryBuilder('ci')
                ->select('ci')
                ->orderBy('ci.id', 'ASC');
            }    
                   , 'attr' => array('class' => 'form-control'),'class' => 'AppBundle:Cities','property' => 'city_name' , 'empty_value' => 'Select', 'required'=>false));
          
         }
                $builder->add('zipCode', null, array('label'=>'Zip Code','attr' => array('class' => 'form-control', 'value'=>$zipCode), 'required'=>false))
        ;
                 
                    
       
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AppBundle\Entity\Location',
        ));
    }

    public function getName() {
        return 'location';
    }

}
