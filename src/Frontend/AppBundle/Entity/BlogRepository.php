<?php

namespace Frontend\AppBundle\Entity;

use \DateTime;
use Doctrine\ORM\EntityRepository;

/**
 * BlogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BlogRepository extends EntityRepository
{
       public function filterNews($filtro){
        
        $status = $filtro['status'];
        $searchtext = $filtro['searchtextblog'];   
           
        $actual = new DateTime();
        $now = date_format($actual, 'Y-m-d');        
        
        $qb = $this->createQueryBuilder('n');
        $qb->select('n, s');
        $qb->join('n.status', 's');
        
        if(isset($searchtext) && $searchtext != '' ){
        $qb->andWhere('n.tittle like :searchtext');
        $qb->setParameter('searchtext', '%'.$searchtext.'%');
        }
        
        if(isset($status) && $status != ''){
        $qb->andWhere('s.id = :status');
        $qb->setParameter('status', $status);
        }
        $qb->orderBy('n.dateCreated','DESC');
        $query = $qb->getQuery();
       
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
        }
        
        }
        
        
        public function getBlogsByStatus($status){
        
        $qb = $this->createQueryBuilder('b');
        $qb->select('b, s');
        $qb->join('b.status', 's');
        $qb->andWhere('s.id = :status');
        $qb->setParameter('status', $status);
        $qb->orderBy('b.id','DESC');
        $qb->orderBy('b.datePosted','DESC');
        
        $query = $qb->getQuery();
       
        try {
        return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
        }
        
        }
        
        
        
        
    
    
}
