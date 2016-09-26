<?php
namespace Frontend\AppBundle\EventListener;

use Symfony\Component\Routing\RouterInterface;

use Presta\SitemapBundle\Service\SitemapListenerInterface;
use Presta\SitemapBundle\Event\SitemapPopulateEvent;
use Presta\SitemapBundle\Sitemap\Url\UrlConcrete;
use Doctrine\ORM\EntityManager;

class SitemapListener implements SitemapListenerInterface
{
    private $router;
    private $em;

    public function __construct(RouterInterface $router , EntityManager $em)
    {
        $this->router = $router;
        $this->em = $em;
    }

    public function populateSitemap(SitemapPopulateEvent $event)
    {
        
      
        $section = $event->getSection();
        if (is_null($section) || $section == 'default') {
            //get absolute homepage url
            $url = $this->router->generate('app_homepage', array(), true);
           
            
            
            $properties = $this->em->getRepository('AppBundle:Property')->findBy(array('status' => '1'));
            foreach ($properties as $property) {
            $url = $this->router->generate('property_profile', array('id' => $property->getSerie()), true);
            
                $event->getGenerator()->addUrl(
                new UrlConcrete(
                    $url,
                    new \DateTime(),
                    UrlConcrete::CHANGEFREQ_HOURLY,
                    1
                ),
                'default'
            );          
            }

            //add homepage url to the urlset named default
            $event->getGenerator()->addUrl(
                new UrlConcrete(
                    $url,
                    new \DateTime(),
                    UrlConcrete::CHANGEFREQ_HOURLY,
                    1
                ),
                'default'
            );
          
        }
    }
}