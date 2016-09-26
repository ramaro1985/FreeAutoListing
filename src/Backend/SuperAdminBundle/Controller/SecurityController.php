<?php

namespace Backend\SuperAdminBundle\Controller;
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

        if ('admin_login' === $requestAttributes->get('_route')) {
            $template = sprintf('SuperAdminBundle:Default:login.html.twig');
        } else {
            $template = sprintf('FOSUserBundle:Security:login.html.twig');
        }

        return $this->container->get('templating')->renderResponse($template, $data);
    }
    
   
  
}
