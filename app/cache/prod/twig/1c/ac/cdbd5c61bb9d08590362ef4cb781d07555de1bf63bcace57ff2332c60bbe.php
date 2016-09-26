<?php

/* AdminBundle:Layout:user-admin.html.twig */
class __TwigTemplate_1caccdbd5c61bb9d08590362ef4cb781d07555de1bf63bcace57ff2332c60bbe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'metadescriptions' => array($this, 'block_metadescriptions'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'header' => array($this, 'block_header'),
            'menu' => array($this, 'block_menu'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    ";
        // line 6
        $this->displayBlock('metadescriptions', $context, $blocks);
        // line 7
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 19
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 51
        echo "
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/free-auto.png"), "html", null, true);
        echo "\" />

</head>


<body>
<div id=\"fb-root\"></div>
<script>
    if (window.location.hash == '#_=_') {
        window.location.hash = ''; // for older browsers, leaves a # behind
        history.pushState('', document.title, window.location.pathname); // nice and clean
        //e.preventDefault(); // no page reload
    }
</script>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3\";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
";
        // line 75
        $this->displayBlock('header', $context, $blocks);
        // line 76
        echo "<div class=\"container\" style=\"margin-top: 20px;\">
    <div class=\"row\">

        <div class=\"col-md-2 col-xs-12 menu-owner no_padding\">
            ";
        // line 80
        $this->displayBlock('menu', $context, $blocks);
        // line 81
        echo "        </div>


        <div class=\"col-md-10 col-xs-12 content-owner\" style=\"min-height: 700px\">
            <div id=\"content-page\">

                ";
        // line 87
        $this->displayBlock('body', $context, $blocks);
        // line 88
        echo "            </div>
        </div>

    </div>

</div>
";
        // line 94
        $this->displayBlock('footer', $context, $blocks);
        // line 98
        echo "




</body>
</html>
";
    }

    // line 6
    public function block_metadescriptions($context, array $blocks = array())
    {
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "My Dashboard";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
        <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/jquery-ui-1.10.4.custom.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />

        <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/dashboard_style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
        <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/jRating.jquery.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/fullcalendar.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/fullcalendar.print.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    ";
    }

    // line 19
    public function block_javascripts($context, array $blocks = array())
    {
        // line 20
        echo "        <script  src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jquery-1.11.3.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jquery-ui-1.10.4.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/transition.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jRating.jquery.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/fullcalendar.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/tooltip.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/popover.js"), "html", null, true);
        echo "\"></script>


        <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jquery.bxslider.min.js"), "html", null, true);
        echo "\"></script>

        <!--<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places&language=en\"></script>-->
        <script>
            window.twttr = (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0], t = window.twttr || {};
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = \"https://platform.twitter.com/widgets.js\";
                fjs.parentNode.insertBefore(js, fjs);
                t._e = [];
                t.ready = function (f) {
                    t._e.push(f);
                };
                return t;
            }(document, \"script\", \"twitter-wjs\"));
        </script>

    ";
    }

    // line 75
    public function block_header($context, array $blocks = array())
    {
        echo twig_include($this->env, $context, "AdminBundle:Default:header.html.twig");
    }

    // line 80
    public function block_menu($context, array $blocks = array())
    {
        echo twig_include($this->env, $context, "AdminBundle:Default:user-menu.html.twig");
    }

    // line 87
    public function block_body($context, array $blocks = array())
    {
    }

    // line 94
    public function block_footer($context, array $blocks = array())
    {
        // line 95
        echo "    ";
        echo twig_include($this->env, $context, "CommonBundle:Default:footer.html.twig");
        echo "
    ";
        // line 96
        echo twig_include($this->env, $context, "CommonBundle:Default:support_ticket.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Layout:user-admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 96,  246 => 95,  243 => 94,  238 => 87,  232 => 80,  226 => 75,  201 => 30,  195 => 27,  191 => 26,  187 => 25,  183 => 24,  179 => 23,  175 => 22,  171 => 21,  166 => 20,  163 => 19,  157 => 17,  153 => 16,  149 => 15,  145 => 14,  141 => 13,  136 => 11,  131 => 10,  128 => 9,  122 => 7,  117 => 6,  106 => 98,  104 => 94,  96 => 88,  94 => 87,  86 => 81,  84 => 80,  78 => 76,  76 => 75,  50 => 52,  47 => 51,  42 => 9,  36 => 7,  34 => 6,  27 => 1,  99 => 23,  91 => 19,  85 => 17,  79 => 15,  77 => 14,  72 => 13,  69 => 12,  62 => 10,  55 => 8,  49 => 6,  44 => 19,  41 => 4,  33 => 3,);
    }
}
