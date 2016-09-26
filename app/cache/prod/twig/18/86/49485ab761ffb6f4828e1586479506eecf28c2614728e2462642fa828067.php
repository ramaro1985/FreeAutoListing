<?php

/* AppBundle:Front:why-free.html.twig */
class __TwigTemplate_188649485ab761ffb6f4828e1586479506eecf28c2614728e2462642fa828067 extends Twig_Template
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
        echo "Free Auto Listing | Why Free";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 6
    public function block_javascripts($context, array $blocks = array())
    {
        $this->displayParentBlock("javascripts", $context, $blocks);
    }

    // line 7
    public function block_header($context, array $blocks = array())
    {
        // line 8
        echo "     ";
        echo twig_include($this->env, $context, "CommonBundle:Default:header-cars.html.twig");
        echo "
 ";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "     ";
        echo twig_include($this->env, $context, "AppBundle:Front:why-free-content.html.twig");
        echo "
 ";
    }

    public function getTemplateName()
    {
        return "AppBundle:Front:why-free.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 11,  64 => 10,  57 => 8,  54 => 7,  48 => 6,  41 => 4,  38 => 3,  32 => 2,);
    }
}
