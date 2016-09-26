<?php

/* AdminBundle:Default:user-dashboard.html.twig */
class __TwigTemplate_dc2b6c00fdc07a6247fb9da4ae780030715a208ccc9edeb7aef3a6ed2313c638 extends Twig_Template
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
        echo "
     ";
        // line 14
        if ((isset($context["ismobile"]) ? $context["ismobile"] : null)) {
            // line 15
            echo "         ";
            echo twig_include($this->env, $context, "AdminBundle:Default:user-menu-movil.html.twig");
            echo "
     ";
        }
        // line 17
        echo "
     ";
        // line 18
        echo twig_include($this->env, $context, "AdminBundle:Default:content-header.html.twig");
        echo "
     <div class=\"row\" style=\"  margin-top: 12px;\">
         <div class=\"navbar\"
              style=\"border-radius: 0px;margin-bottom: 10px; min-height: 35px; margin-top: 0px;margin-bottom: 0px\">
             <div class=\"col-xs-12 col-sm-12 col-md-12 ";
        // line 22
        if ((isset($context["ismobile"]) ? $context["ismobile"] : null)) {
            echo " no_padding ";
        }
        echo "\" style=\"font-size: 12px\">

                 ";
        // line 25
        echo "                 <ul class=\"nav navbar-nav\" id=\"input_search\" style=\"margin: 1px;\">
                     <label class=\"navbar-text text-uppercase bold_text no_padding pull-left\" for=\"price_list\"
                            style=\"color: #000000;margin-left: 0px;margin-right: 10px\">Sort
                         by</label>
                     <li class=\"dropdown no_padding col-xs-4\" id=\"price_list\"
                         style=\"min-width: 120px;border: 1px solid black;\">
                         <a href=\"#\" class=\"dropdown-toggle text-uppercase text-right\"
                            data-toggle=\"dropdown\"><span class=\"pull-left\">newest</span>
                             <b class=\"caret\" style=\"color: #000000\"></b>
                         </a>
                         <ul class=\"dropdown-menu\">
                             ...
                         </ul>
                     </li>
                 </ul>
                 ";
        // line 41
        echo "             </div>
         </div>
     </div>

     ";
        // line 45
        echo twig_include($this->env, $context, "AdminBundle:Default:user-dashboard-content.html.twig");
        echo "

 ";
    }

    // line 49
    public function block_footer($context, array $blocks = array())
    {
        $this->displayParentBlock("footer", $context, $blocks);
        echo "  ";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:user-dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 49,  123 => 45,  117 => 41,  100 => 25,  93 => 22,  86 => 18,  83 => 17,  77 => 15,  75 => 14,  72 => 13,  69 => 12,  62 => 10,  55 => 8,  49 => 6,  44 => 5,  41 => 4,  33 => 3,);
    }
}
