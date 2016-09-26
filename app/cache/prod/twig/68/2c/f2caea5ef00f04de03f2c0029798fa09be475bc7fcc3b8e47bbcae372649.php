<?php

/* AdminBundle:Default:user.html.twig */
class __TwigTemplate_682cf2caea5ef00f04de03f2c0029798fa09be475bc7fcc3b8e47bbcae372649 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AdminBundle:Layout:user-admin.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'header' => array($this, 'block_header'),
            'menu' => array($this, 'block_menu'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AdminBundle:Layout:user-admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        echo " ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo " ";
    }

    // line 4
    public function block_javascripts($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/functions-backend.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 8
    public function block_header($context, array $blocks = array())
    {
        $this->displayParentBlock("header", $context, $blocks);
        echo "  ";
    }

    // line 10
    public function block_menu($context, array $blocks = array())
    {
        $this->displayParentBlock("menu", $context, $blocks);
        echo "  ";
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "     ";
        echo twig_include($this->env, $context, "AdminBundle:Default:content-header.html.twig");
        echo "
     ";
        // line 14
        if ((!(isset($context["ismobile"]) ? $context["ismobile"] : null))) {
            // line 15
            echo "         ";
            echo twig_include($this->env, $context, "AdminBundle:Default:user-inquiries.html.twig");
            echo "
     ";
        } else {
            // line 17
            echo "         ";
            echo twig_include($this->env, $context, "AdminBundle:Default:user-menu-movil.html.twig");
            echo "
     ";
        }
        // line 19
        echo "     ";
        echo twig_include($this->env, $context, "AdminBundle:Default:user-content.html.twig");
        echo "

 ";
    }

    // line 23
    public function block_footer($context, array $blocks = array())
    {
        $this->displayParentBlock("footer", $context, $blocks);
        echo "  ";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 23,  91 => 19,  85 => 17,  79 => 15,  77 => 14,  72 => 13,  69 => 12,  62 => 10,  55 => 8,  49 => 6,  44 => 5,  41 => 4,  33 => 3,);
    }
}
