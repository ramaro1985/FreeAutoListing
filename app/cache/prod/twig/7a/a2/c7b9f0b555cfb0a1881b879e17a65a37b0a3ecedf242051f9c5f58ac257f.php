<?php

/* FOSUserBundle:Registration:register.html.twig */
class __TwigTemplate_7aa2c7b9f0b555cfb0a1881b879e17a65a37b0a3ecedf242051f9c5f58ac257f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CommonBundle:Default:base.html.twig");

        $this->blocks = array(
            'footer' => array($this, 'block_footer'),
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

    // line 1
    public function block_footer($context, array $blocks = array())
    {
        echo twig_include($this->env, $context, "CommonBundle:Default:footer-login.html.twig");
        echo "  ";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo " Register  ";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/fal-style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
    <style>
        #type_container {
            visibility: hidden;
            position: absolute;
        }

    </style>
";
    }

    // line 18
    public function block_javascripts($context, array $blocks = array())
    {
        echo " ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo " ";
    }

    // line 19
    public function block_header($context, array $blocks = array())
    {
        // line 20
        echo "     ";
        echo twig_include($this->env, $context, "CommonBundle:Default:header-cars.html.twig");
        echo "
 ";
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        // line 24
        echo "     ";
        $this->env->loadTemplate("FOSUserBundle:Registration:register_content.html.twig")->display($context);
        // line 25
        echo " ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 25,  88 => 24,  85 => 23,  78 => 20,  75 => 19,  67 => 18,  54 => 9,  49 => 8,  46 => 7,  40 => 5,  33 => 1,);
    }
}
