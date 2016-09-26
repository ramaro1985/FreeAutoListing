<?php

namespace Backend\SupportAdminBundle\Controller;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends BaseController
{
     /**
     * {@inheritDoc}
     */
    public function renderLogin(array $data)
    {
        $requestAttributes = $this->container->get('request')->attributes;

        if ('support_login' === $requestAttributes->get('_route')) {
            $template = sprintf('SupportAdminBundle:Default:login.html.twig');
        } else {
            $template = sprintf('FOSUserBundle:Security:login.html.twig');
        }

        return $this->container->get('templating')->renderResponse($template, $data);
    }
    
   
  
}
