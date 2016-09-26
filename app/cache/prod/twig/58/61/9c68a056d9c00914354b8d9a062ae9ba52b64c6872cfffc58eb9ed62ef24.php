<?php

/* AppBundle:FAL:search-results.html.twig */
class __TwigTemplate_58619c68a056d9c00914354b8d9a062ae9ba52b64c6872cfffc58eb9ed62ef24 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CommonBundle:Default:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CommonBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo " Free Auto Listing | Search ";
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/search-result-style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/jquery.webui-popover.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
    <style>
        #header #navbar li {
            font-size: 14px;
            text-transform: uppercase;
        }

        #header #navbar li a {
            padding: 15px;
        }
    </style>
";
    }

    // line 19
    public function block_javascripts($context, array $blocks = array())
    {
        // line 20
        echo "     ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
     <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jquery.webui-popover.min.js"), "html", null, true);
        echo "\"></script>
     <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/functions_frontend_utils.js"), "html", null, true);
        echo "\"></script>
 ";
    }

    // line 24
    public function block_header($context, array $blocks = array())
    {
        // line 25
        echo "     ";
        echo twig_include($this->env, $context, "CommonBundle:Default:header-cars.html.twig");
        echo "
 ";
    }

    // line 28
    public function block_body($context, array $blocks = array())
    {
        // line 29
        echo "     ";
        echo twig_include($this->env, $context, "AppBundle:FAL:search-results-content.html.twig");
        echo "
     ";
        // line 30
        echo twig_include($this->env, $context, "AppBundle:FAL:search-results-content-popovers.html.twig");
        echo "

 ";
    }

    public function getTemplateName()
    {
        return "AppBundle:FAL:search-results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 30,  97 => 29,  94 => 28,  87 => 25,  84 => 24,  78 => 22,  74 => 21,  69 => 20,  66 => 19,  50 => 7,  46 => 6,  41 => 5,  38 => 4,  32 => 2,);
    }
}
