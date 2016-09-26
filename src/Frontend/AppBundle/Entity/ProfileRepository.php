<?php

namespace Frontend\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use \DateTime;

/**
 * ProfileRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProfileRepository extends EntityRepository
{
     public function getPropertiesByUserAndStatus($user, $status){
        
        $qb = $this->createQueryBuilder('p');
        $qb->select('p, u');
        $qb->join('p.user', 'u');
        $qb->andWhere('p.status = :id');
        $qb->andWhere('u.id = :uid');
        $qb->setParameter('id', $status)->setParameter('uid', $user);
        $query = $qb->getQuery();
       
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
        }
        
        }
        
         public function findOneBySerieStatus($id, $status){
        
        $qb = $this->createQueryBuilder('p');
        $qb->select('p, s');
        $qb->join('p.status', 's');
        $qb->andWhere('p.serie = :id');
        $qb->andWhere('s.id = :status');
        $qb->setParameter('id', $id)->setParameter('status', $status);
        $query = $qb->getQuery();
       
        try {
        return $query->getOneOrNullResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
        }
        
        }
        
          public function getPropertiesByUserAndStatusBoth($user, $status, $status1){
        
        $qb = $this->createQueryBuilder('p');
        $qb->select('p, u');
        $qb->join('p.user', 'u');
        $qb->andWhere('p.status = :id OR p.status = :id1');
        $qb->andWhere('u.id = :uid');
        $qb->setParameter('id', $status)->setParameter('id1', $status1)->setParameter('uid', $user);
        $query = $qb->getQuery();
       
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
        }
        
        }
        
        public function filterProperties($filtro, $status){
        

       // $sleeps = $filtro['sleeps'];
        $checkin= $filtro['checkin'];
        $checkout = $filtro['checkout'];
        $searchtext = $filtro['searchtext'];
        $country = $filtro['country'];
        $region = $filtro['region'];  
        $city = $filtro['city'];
        //$zipCode = $filtro['zipCode'];
        $minPrice = $filtro['minPrice'];
        $maxPrice = $filtro['maxPrice'];
        $minSleeps = $filtro['minSleeps'];
        $maxSleeps = $filtro['maxSleeps'];
        $minBedrooms = $filtro['minBedrooms'];
        $maxBedrooms = $filtro['maxBedrooms'];
        $minBathrooms = $filtro['minBathrooms'];
        $maxBathrooms = $filtro['maxBathrooms'];
        $moreLocation = $filtro['moreLocation'];
        $moreProperty = $filtro['moreProperty'];
        $moreAmenities = $filtro['moreAmenities'];
        $sort = $filtro['sort'];
        
        $actual = new DateTime();
        $now = date_format($actual, 'Y-m-d');        
        //var_dump($moreLocation);
        //var_dump($moreProperty);
        //var_dump($moreAmenities);
        $qb = $this->createQueryBuilder('p');
        $qb->select('p, pd, l');
        $qb->join('p.propertyDetails', 'pd');
        $qb->join('p.location', 'l');
        
        
         if(isset($minPrice)&& $minPrice != '' || isset($maxPrice)&& $maxPrice != '' || isset($sort)&& $sort != '' || $sort == 'Price: Low to High' || $sort == 'Price: High to Low'){
        $qb->join('p.rates', 'rat');
        $qb->join('rat.periods', 'pe');
        }
        
        if(isset($searchtext) && $searchtext != '' && $country == '' && $region == '' && $city == ''){
        $qb->andWhere('p.serie = :searchtext');
        $qb->setParameter('searchtext', $searchtext);
        }
         
        if(isset($country) && $country != ''){
        $qb->andWhere('l.country like :country');
        $qb->setParameter('country', $country);
        }
        
        if(isset($region) && $region != ''){
        $qb->andWhere('l.stateProvince like :regionName');
        $qb->setParameter('regionName', $region);
        }
        
        if(isset($city) && $city != ''){
        $qb->andWhere('l.locality like :city');
        $qb->setParameter('city', $city);
        }
      
        
        if ((isset($checkin) && $checkin != '') ||  (isset($checkout) && $checkout != '')){
         $qb->join('p.reservations', 'r');    
        }
    
        
        
        $qb->andWhere('p.status = :status');
        
        /*if(isset($sleeps)){
        $qb->andWhere('pd.sleeps >= :sleeps'); 
        $qb->setParameter('sleeps', $sleeps);
        }*/
        if(isset($moreLocation)&& $moreLocation[0] != ''){
           $qb->join('pd.locationType', 'lt'); 
            for ( $i = 0; $i < count($moreLocation); $i++) {
                if($i == 0){
                 $qb->andWhere('lt.name = :locationName'.$i);
                }else {
                $qb->orWhere('lt.name = :locationName'.$i);    
                }
                 $qb->setParameter('locationName'.$i, $moreLocation[$i]);
                 
            }
            
        
        
        }
        
        if(isset($moreProperty) && $moreProperty[0] != ''){
           $qb->join('pd.type', 'ty'); 
            for ( $i = 0; $i < count($moreProperty); $i++) {
                if($i == 0){
                 $qb->andWhere('ty.name = :propertyName'.$i);
                }else {
                $qb->orWhere('ty.name = :propertyName'.$i);    
                }
                 $qb->setParameter('propertyName'.$i, $moreProperty[$i]);
                 
            }
            
        
        
        }
        
         
        if(isset($moreAmenities) && $moreAmenities[0] != ''){
           $qb->join('p.amenities', 'am'); 
            $qb->join('am.homeAmenities', 'ha'); 
            for ( $i = 0; $i < count($moreAmenities); $i++) {
                 switch ($moreAmenities[$i]) {
            case 'airConditioned':
                $qb->andWhere('ha.airConditioned = 1');
                break;    
            case 'balcony':
                $qb->andWhere('ha.balcony = 1');
                break;   
            case 'ceilingFans':
                $qb->andWhere('ha.ceilingFans = 1');
                break;     
            case 'petsAllowed':
                $qb->andWhere('ha.petsAllowed = 1');
                break;  
            case 'communityExerciseRoom':
                $qb->andWhere('ha.communityExerciseRoom = 1');
                break;  
            case 'fullkitchen':
                $qb->andWhere('ha.fullkitchen = 1');
                break;  
            case 'garage':
                $qb->andWhere('ha.garage = 1');
                break;  
            case 'longTermRenters':
                $qb->andWhere('ha.longTermRenters = 1');
                break;  
            case 'heater':
                $qb->andWhere('ha.heater = 1');
                break;  
            case 'nonSmokingOnly':
                $qb->andWhere('ha.nonSmokingOnly = 1');
                break;  
            case 'pool':
                $qb->andWhere('ha.pool = 1');
                break;  
            case 'childrenWelcome':
                $qb->andWhere('ha.childrenWelcome = 1');
                break;  
            case 'telephone':
                $qb->andWhere('ha.telephone = 1');
                break;  
            case 'fireplace':
                $qb->andWhere('ha.fireplace = 1');
                break;  
            case 'hotTub':
                $qb->andWhere('ha.hotTub = 1');
                break;  
            case 'washingMachine':
                $qb->andWhere('ha.washingMachine = 1');
                break;  
            case 'parking':
                $qb->andWhere('ha.parking = 1');
                break;  
            case 'wheelchairAccessible':
                $qb->andWhere('ha.wheelchairAccessible = 1');
                break;  
            
                 }
                
                 
                 
            }
            
        
        
        }
        
        
         if(isset($minSleeps)&& $minSleeps != ''){
        $qb->andWhere('pd.sleeps >= :minSleeps'); 
        $qb->setParameter('minSleeps', $minSleeps);
        }
        
         if(isset($maxSleeps)&& $maxSleeps != ''){
        $qb->andWhere('pd.sleeps <= :maxSleeps'); 
        $qb->setParameter('maxSleeps', $maxSleeps);
        }
        
           if(isset($minBedrooms)&& $minBedrooms != ''){
        $qb->andWhere('pd.bedrooms >= :minBedrooms'); 
        $qb->setParameter('minBedrooms', $minBedrooms);
        }
        
         if(isset($maxBedrooms)&& $maxBedrooms != ''){
        $qb->andWhere('pd.bedrooms <= :maxBedrooms'); 
        $qb->setParameter('maxBedrooms', $maxBedrooms);
        }
        
        
          if(isset($minBathrooms)&& $minBathrooms != ''){
        $qb->andWhere('pd.bathrooms >= :minBathrooms'); 
        $qb->setParameter('minBathrooms', $minBathrooms);
        }
        
         if(isset($maxBathrooms)&& $maxBathrooms != ''){
        $qb->andWhere('pd.bathrooms <= :maxBathrooms'); 
        $qb->setParameter('maxBathrooms', $maxBathrooms);
        }
        /* ******************  HACER VALIDACION DEL FILTRO DEL FORMULARIO PRINCIPAL****************************/
        if(isset($checkin) && $checkin != ''){
        $checkinok = \DateTime::createFromFormat("m/d/Y", $checkin);    
           
        $qb->andWhere(':checkin != r.checkIn AND :checkin != r.checkout');
        $qb->andWhere(':checkin <= r.checkIn OR :checkin >= r.checkout');
        $qb->setParameter('checkin', $checkinok);
        }
        
        if(isset($checkout) && $checkout != ''){
        $checkoutok = \DateTime::createFromFormat("m/d/Y", $checkout);    
        $qb->andWhere(':checkout != r.checkIn AND :checkout != r.checkout');
        $qb->andWhere(':checkout <= r.checkIn OR :checkout >= r.checkout');
        $qb->setParameter('checkout', $checkoutok);
        
        }
        
        if(isset($minPrice) && $minPrice != ''){
        $qb->andWhere('pe.weekly >= :minPrice'); 
        $qb->setParameter('minPrice', $minPrice);
        }
        
        
         if(isset($maxPrice)&& $maxPrice != ''){
        $qb->andWhere('pe.weekly <= :maxPrice'); 
        $qb->setParameter('maxPrice', $maxPrice);
        }
     
        
   
        
    
        
         if(isset($sort)&& $sort != ''){
             switch ($sort) {
               // aqui se ordenara segun algun criterio de pago
                 case 'Default Sort':
                    $qb->orderBy('p.id', 'DESC');
                     break; 
                case 'Price: Low to High':
                    $qb->orderBy('pe.nightly', 'ASC');
                     break;
                case 'Price: High to Low':
                   $qb->orderBy('pe.nightly', 'DESC');
                     break;  
                case 'Number of Reviews':
                    
                   $qb->join('p.rating', 'pr');
                   $qb->orderBy('pr.totalCount', 'DESC');
                     break;
                case 'Bedrooms: Fewest to Most':
                    $qb->orderBy('pd.bedrooms', 'ASC');
                     break;
                 case 'Bedrooms: Most to Fewest':
                    $qb->orderBy('pd.bedrooms', 'DESC');
                     break;
                 case 'Bathrooms: Fewest to Most':
                    $qb->orderBy('pd.bathrooms', 'ASC');
                     break;
                 case 'Bathrooms: Most to Fewest':
                    $qb->orderBy('pd.bathrooms', 'DESC');
                     break;
                 default:
                     break;
             }
          
        } 
        
        
        
        $qb->setParameter('status', $status);
        $query = $qb->getQuery();
       
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
        }
        
        }
        
   
    
        
        
        public function filterSuperAdminProperties($filtro){
        
       
        $searchtext = $filtro['searchtext'];
        //$country = $filtro['country'];
        //$region = $filtro['region'];  
        //$city = $filtro['city'];
        $status = $filtro['status'];
        $featured = $filtro['featured'];
        
        $actual = new DateTime();
        $now = date_format($actual, 'Y-m-d');        
        //var_dump($moreLocation);
        //var_dump($moreProperty);
        //var_dump($moreAmenities);
        $qb = $this->createQueryBuilder('p');
        $qb->select('p, pd');
        $qb->join('p.propertyDetails', 'pd');
        //$qb->join('p.location', 'l');
        $qb->join('p.status', 'st');
        $qb->join('p.user', 'u');
        
        /* if(isset($minPrice)&& $minPrice != '' || isset($maxPrice)&& $maxPrice != '' || isset($sort)&& $sort != '' || $sort == 'Price: Low to High' || $sort == 'Price: High to Low'){
        $qb->join('p.rates', 'rat');
        $qb->join('rat.periods', 'pe');
        }*/
        
        if(isset($searchtext) && $searchtext != '' ){
        $qb->andWhere('p.serie like :searchtext OR u.email like :searchtext');
        $qb->setParameter('searchtext', '%'.$searchtext.'%');
        }
        
          if(isset($featured) && $featured != '' ){
        $qb->andWhere('p.featured = :featured');
        $qb->setParameter('featured', $featured);
        }
        
        if(isset($status) && $status != ''){
        $qb->andWhere('st.id = :status');
        $qb->setParameter('status', $status);
        }
         
        /*if(isset($country) && $country != ''){
        $qb->andWhere('l.country like :country');
        $qb->setParameter('country', $country);
        }
        
        if(isset($region) && $region != ''){
        $qb->andWhere('l.stateProvince like :regionName');
        $qb->setParameter('regionName', $region);
        }
        
        if(isset($city) && $city != ''){
        $qb->andWhere('l.locality like :city');
        $qb->setParameter('city', $city);
        }*/






        $qb->orderBy('p.dateCreated','DESC');
        $query = $qb->getQuery();
       
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
        }
        
        }
        
        
    
    
}