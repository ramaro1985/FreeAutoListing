<?php

/* AppBundle:FAL:cars-compare.html.twig */
class __TwigTemplate_bbe70c11d62e5672f33891c315afe0a4c6516278271736906553f9f28921128e extends Twig_Template
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
        echo " Free Auto Listing | Compare Cars ";
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <!--<link href=\"";
        // line 6
        echo "{ asset('bundles/common/css/search-result-style.css') }}\" rel=\"stylesheet\" />-->
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/car-compare-styles.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
";
    }

    // line 9
    public function block_javascripts($context, array $blocks = array())
    {
        // line 10
        echo "     ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
 ";
    }

    // line 12
    public function block_header($context, array $blocks = array())
    {
        // line 13
        echo "     ";
        echo twig_include($this->env, $context, "CommonBundle:Default:header-cars.html.twig");
        echo "
 ";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "     ";
        echo twig_include($this->env, $context, "AppBundle:FAL:cars-compare-content.html.twig");
        echo "
 ";
    }

    public function getTemplateName()
    {
        return "AppBundle:FAL:cars-compare.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 17,  75 => 16,  68 => 13,  65 => 12,  58 => 10,  55 => 9,  49 => 7,  46 => 6,  41 => 5,  38 => 4,  32 => 2,);
    }
}
