<?php

/* AppBundle:Default:index.html.twig */
class __TwigTemplate_cbaa5887857ad566514bee0fca3e14d9c4a394b677e4de89c31e23cf43a74459 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CommonBundle:Layout:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'metadescriptions' => array($this, 'block_metadescriptions'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CommonBundle:Layout:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 3
    public function block_metadescriptions($context, array $blocks = array())
    {
        // line 4
        echo "  <meta name=\"description\" content=\"Find & book vacation rentals with Home Escape. Rent everything including cabins, condos, apartments, houses or villas. The whole house. The whole family. A whole vacation.\">     
  <meta name=\"keywords\" content=\"vacation rentals, condos, accommodations, renting vacation homes, vacation home rentals, vacation rentals by owner, renting vacation homes, beach house, cabin rental, cottage rental, great rentals, Florida vacation rentals, Cape Cod vacation rentals, Outer Banks vacation rentals, Hawaii vacation rentals, vacation home, vacation homes, vacation rental, renting lodging, discount lodging, holiday homes, villas for rent, cabins for rent, rental cabins, cottages for rent, rent cottages, rent cabins, rent villas, rental villas, condos for rent, condo rentals, pet friendly vacation rentals, accessible vacation rentals, rentals for holidays, weekend vacation rentals\">  
  ";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "  ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <!--<link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />-->
";
    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        echo " ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo " ";
    }

    // line 12
    public function block_header($context, array $blocks = array())
    {
        // line 13
        echo " ";
        echo twig_include($this->env, $context, "CommonBundle:Default:header.html.twig");
        echo "
 ";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo " ";
        echo twig_include($this->env, $context, "AppBundle:Default:home-content.html.twig");
        echo "
 ";
    }

    // line 19
    public function block_footer($context, array $blocks = array())
    {
        // line 20
        echo " ";
        echo twig_include($this->env, $context, "CommonBundle:Default:footer.html.twig");
        echo "   
 ";
    }

    public function getTemplateName()
    {
        return "AppBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 20,  93 => 19,  86 => 17,  83 => 16,  76 => 13,  73 => 12,  65 => 11,  59 => 9,  54 => 8,  51 => 7,  45 => 4,  42 => 3,  34 => 2,);
    }
}
