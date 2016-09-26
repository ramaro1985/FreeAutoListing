<?php

namespace Backend\AdminBundle\Controller;
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

        if ('owner_login' === $requestAttributes->get('_route')) {
            $template = sprintf('AdminBundle:LogRegister:login.html.twig');
        } else {
            $template = sprintf('FOSUserBundle:Security:login.html.twig');
        }

        return $this->container->get('templating')->renderResponse($template, $data);
    }

}
