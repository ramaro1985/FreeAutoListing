<?php

/* CommonBundle:Layout:base.html.twig */
class __TwigTemplate_3bd0d78fafd71960d6ca3bd414c79c92b58be8e4ecd3e652da68403ff9d67895 extends Twig_Template
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
    <meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    ";
        // line 6
        $this->displayBlock('metadescriptions', $context, $blocks);
        // line 7
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 10
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/free-auto.png"), "html", null, true);
        echo "\"/>
</head>
<body>
<link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=Satisfy\">-->
<link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
<link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/jquery-ui-1.10.4.custom.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
<link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/bootstrap-datepicker.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
<link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/fal-style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
<link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<link href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/jRating.jquery.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/css/jquery.bxslider.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jquery-1.11.3.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

<!--<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places&language=en\"></script>-->
<!--<script src=\"";
        // line 28
        echo "{ asset('bundles/common/js/fal-functions.js') }}\"></script>-->
<script>

    window.fbAsyncInit = function () {
        // init the FB JS SDK
        FB.init({
            appId: '446247792210841', // App ID from the app dashboard
            status: true, // Check Facebook Login status
            version: 'v2.3'
        });
    };

    jQuery(document).ready(function () {

        jQuery(\"#panel_sell\").parent().mouseover(function () {
            //jQuery(this).find(\"#panel_sell\").css(\"background-image\", \"url('";
        // line 43
        echo "{ asset('bundles/common/images/home/banner-sell.jpg') }}')\");
            jQuery(this).find(\".grises img\").addClass(\"hover\");
        });
        jQuery(\"#panel_sell\").parent().mouseout(function () {
            //jQuery(this).find(\"#panel_sell\").css(\"background-image\", \"url('";
        // line 47
        echo "{ asset('bundles/common/images/home/banner-sell-bw.jpg') }}')\");
            jQuery(this).find(\".grises img\").removeClass(\"hover\");
        });
        jQuery(\"#panel_buy\").parent().mouseover(function () {
            //jQuery(this).find(\"#panel_buy\").css(\"background-image\", \"url('";
        // line 51
        echo "{ asset('bundles/common/images/home/banner-buy.jpg') }}')\");
            jQuery(this).find(\".grises img\").addClass(\"hover\");
        });
        jQuery(\"#panel_buy\").parent().mouseout(function () {
            //jQuery(this).find(\"#panel_buy\").css(\"background-image\", \"url('";
        // line 55
        echo "{ asset('bundles/common/images/home/banner-buy-bw.jpg') }}')\");
            jQuery(this).find(\".grises img\").removeClass(\"hover\");
        });

        /**
         *  eventos para cuando se da click en el boton de mostrar los link  para editar
         * */
        /*jQuery(\".show-edit-links\").click(function(){
            var panel = jQuery(this).attr(\"mipanel\");
            jQuery(\"#\"+panel).find('.element_hidden').toggle();
        });*/




    });

   /* function fb_login(e) {

        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                // connected
                alert('Already connected!');
                document.location = \"";
        // line 78
        echo $this->env->getExtension('routing')->getUrl("hwi_oauth_service_redirect", array("service" => "facebook"));
        echo "\";
            } else {
                // not_authorized
                FB.login(function (response) {
                    if (response.authResponse) {
                        document.location = \"";
        // line 83
        echo $this->env->getExtension('routing')->getUrl("hwi_oauth_service_redirect", array("service" => "facebook"));
        echo "\";
                    } else {
                        //alert('Cancelled.');
                    }
                }, {scope: 'email'});
            }
        });
        e.preventDefault();
    }*/

    if (window.location.hash == '#_=_') {
        window.location.hash = ''; // for older browsers, leaves a # behind
        history.pushState('', document.title, window.location.pathname); // nice and clean
        //e.preventDefault(); // no page reload
    }


</script>
<script>
   /* window.twttr = (function (d, s, id) {
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
    }(document, \"script\", \"twitter-wjs\"));*/
</script>
<!--<script src=\"https://apis.google.com/js/platform.js\" async defer></script>-->

<!--<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3\";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>-->
";
        // line 128
        $this->displayBlock('header', $context, $blocks);
        // line 129
        $this->displayBlock('body', $context, $blocks);
        // line 130
        $this->displayBlock('footer', $context, $blocks);
        // line 131
        echo "

<script src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jquery-ui-1.10.4.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/raphael.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jquery.usmap.min.js"), "html", null, true);
        echo "\"></script>

<script src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jRating.jquery.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/jquery.bxslider.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/js/bootstrap-datepicker.min.js"), "html", null, true);
        echo "\"></script>


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
        echo "Free Auto Listing";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 9
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 128
    public function block_header($context, array $blocks = array())
    {
    }

    // line 129
    public function block_body($context, array $blocks = array())
    {
    }

    // line 130
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CommonBundle:Layout:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 130,  277 => 129,  272 => 128,  267 => 9,  262 => 8,  256 => 7,  251 => 6,  241 => 139,  237 => 138,  233 => 137,  228 => 135,  224 => 134,  220 => 133,  216 => 131,  214 => 130,  212 => 129,  210 => 128,  162 => 83,  154 => 78,  129 => 55,  123 => 51,  117 => 47,  111 => 43,  94 => 28,  88 => 25,  84 => 24,  80 => 23,  72 => 21,  68 => 20,  64 => 19,  60 => 18,  56 => 17,  40 => 8,  35 => 7,  33 => 6,  26 => 1,  96 => 20,  93 => 19,  86 => 17,  83 => 16,  76 => 22,  73 => 12,  65 => 11,  59 => 9,  54 => 8,  51 => 7,  45 => 10,  42 => 9,  34 => 2,);
    }
}
