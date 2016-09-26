<?php

/* CommonBundle:Default:header-cars.html.twig */
class __TwigTemplate_0cf1decedd96e7026f57163333f90f45d82996edc6bc859b73259f4837903e4b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<style>
    .divider-vertical {
        height: 50px;
        border-right: 1px solid #7E7E7E;
        /*border-left: 1px solid #7E7E7E;*/
        margin-top: 5px;
        margin-bottom: 5px;
        margin: 0px 5px 0px 5px;
        border-right-color: #eef8f1;
    }
</style>
";
        // line 12
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 13
            echo "    <nav class=\"navbar navbar-fixed-top visible-lg visible-md\"
         style=\"background-color: black;min-height: 18px; margin-bottom: 0px; position: relative\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-xs-11 col-xs-offset-1 col-md-10 col-md-offset-2 col-sm-6 col-sm-offset-6\">
                    <ul class=\"nav navbar-nav navbar-right small\" style=\"margin-bottom: 0px;padding-top: 3px;padding-right: 6px;\">
                        <label
                                style=\"text-decoration: none; color: white;margin-bottom: 0px\">Welcome, ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "name"), "html", null, true);
            echo "</label>
                        <a href=\"
                                 ";
            // line 22
            if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "type"), "id") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "type"), "id") == 2))) {
                // line 23
                echo "                                    ";
                echo $this->env->getExtension('routing')->getPath("my_account");
                echo "
                                    ";
            } else {
                // line 25
                echo "                                    ";
                echo $this->env->getExtension('routing')->getPath("shopper_page");
                echo "
                                    ";
            }
            // line 27
            echo "                                    \" class=\"\"
                           style=\"text-decoration: none; color: white;\">&nbsp;&nbsp;&nbsp;My Account&nbsp;&nbsp;</a>
                        <span class=\"divider-vertical\"></span>
                        <a href=\"";
            // line 30
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\" class=\"\"
                           style=\"text-decoration: none; color: white;padding-left: 7px;\">Sing Out
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
";
        } else {
            // line 39
            echo "    <nav class=\"navbar navbar-fixed-top\"
         style=\"background-color: black;min-height: 18px; margin-bottom: 0px; position: relative\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-xs-12 col-md-6 col-md-offset-6\">
                    <div class=\"col-xs-11 col-xs-offset-1 col-md-10 col-md-offset-2 col-sm-6 col-sm-offset-6 no_padding\">
                        <ul class=\"nav navbar-nav small\" style=\"padding-top: 4px;\">
                            <a href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("owner_login");
            echo "\" class=\"text-uppercase\"
                               style=\"text-decoration: none; color: white;\">Sign In</a>
                            <span class=\"divider-vertical\"></span>
                            <a href=\"";
            // line 49
            echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
            echo "\" class=\"text-uppercase\"
                               style=\"text-decoration: none; color: white;\"> Sign Up</a>
                            <a href=\"·\" class=\"text-uppercase\"
                               style=\"text-decoration: none; color: white;padding-left: 10px;\">FaceBook
                                Sign
                                Up</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
";
        }
        // line 62
        echo "<header id=\"header\" style=\"border-bottom: 2px solid #D5D5D5\">
    <div class=\"container\">
        <nav class=\"navbar header_nav\" style=\"margin-bottom: 10px;\">
            <div class=\"row\">
                <div class=\"col-md-12 col-sm-12\">
                    <div class=\"navbar-header col-md-3 col-sm-12 col-xs-12 no_padding\">
                        <div class=\"col-sm-6 col-xs-3 pull-right\">
                            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\"
                                    data-target=\"#navbar\"
                                    aria-expanded=\"false\" aria-controls=\"navbar\">
                                <span class=\"sr-only\">Toggle navigation</span>
                                <img src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/home/menu-icon.png"), "html", null, true);
        echo "\" alt=\" \"/>
                            </button>
                        </div>
                        <div class=\"col-md-12 col-xs-9 col-sm-6 no_padding\" style=\"padding-top: 8px\">
                            <a href=\"";
        // line 77
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\">
                                <img src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/search/logo.png"), "html", null, true);
        echo "\" alt=\" \"
                                     style=\"width: 92%;\"/>
                            </a>
                        </div>
                    </div>
                    <div id=\"navbar\" class=\"navbar-right navbar-collapse collapse col-md-9 col-sm-6 col-xs-10\">
                        <ul class=\"nav navbar-nav navbar-right text-uppercase\" style=\"margin-top: 15px\">
                            <li><a href=\"#\">Cars for sale</a></li>
                            <li><a href=\"#\">Sell my car</a></li>
                            <li><a href=\"";
        // line 87
        echo $this->env->getExtension('routing')->getPath("about_us");
        echo "\">About freeauto</a></li>
                            <li><a href=\"";
        // line 88
        echo $this->env->getExtension('routing')->getPath("why_free");
        echo "\">Why Free</a></li>
                            <li><a href=\"#\">Support</a></li>
                            <li><a href=\"#\">Help</a></li>
                            <li><a href=\"";
        // line 91
        echo $this->env->getExtension('routing')->getPath("contact_us");
        echo "\">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "CommonBundle:Default:header-cars.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 91,  150 => 88,  146 => 87,  134 => 78,  130 => 77,  123 => 73,  94 => 49,  88 => 46,  67 => 30,  56 => 25,  50 => 23,  43 => 20,  34 => 13,  32 => 12,  19 => 1,  220 => 127,  197 => 107,  153 => 66,  135 => 51,  126 => 45,  122 => 44,  110 => 62,  105 => 31,  98 => 27,  92 => 23,  90 => 22,  85 => 20,  81 => 18,  79 => 39,  75 => 15,  72 => 14,  65 => 10,  62 => 27,  59 => 8,  48 => 22,  40 => 3,  33 => 2,);
    }
}
