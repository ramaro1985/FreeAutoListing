<?php

/* AdminBundle:Default:header.html.twig */
class __TwigTemplate_9d59d10baea3a5034ce64ddc3343405e1f3f06f1bad28b97096a22026aa6d70d extends Twig_Template
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
        echo "<div id=\"header-admin\" class=\"container-fluid\">
    <div class=\"container\">

        <div class=\"row hidden-xs\">

            <div id=\"logo\" class=\"col-xs-12 col-md-6  col-sm-4 hidden-xs\">
                <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/logo.png"), "html", null, true);
        echo "\"></a>
            </div>
            <!-- end of #logo -->


            <div id=\"chat\" class=\"col-xs-12 col-md-6 col-sm-8\">

                <div class=\"pull-right\">
                    <nav>


                        <ul id=\"mainMenu\" class=\"nav nav-pills nav-main\">

                            <li>
                                <div class=\"btn-group\">
                                    <a class=\"btn \" href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("contact_us");
        echo "\">Support</a>
                                </div>
                            </li>
                            <li class=\"hide\">

                                <a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\">News</a>

                            </li>

                            <li>
                                ";
        // line 32
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 33
            echo "                                    <div class=\"btn-group\">Welcome,</div>
                                    <div class=\"btn-group\">
                                        <a class=\"btn dropdown-toggle login\" data-toggle=\"dropdown\">
                                            <span style=\"margin-right: 10px\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "name"), "html", null, true);
            echo " </span><span
                                                    class=\"path glyphicon glyphicon-chevron-down\"></span>
                                        </a>
                                        <ul class=\"dropdown-menu\" role=\"menu\">
                                            <li><a href=\"";
            // line 40
            echo $this->env->getExtension('routing')->getPath("my_account");
            echo "\">My Account</a></li>
                                            <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModalSupport\">Contact
                                                    Support</a></li>
                                            <li><a href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("fos_user_change_password");
            echo "\">Change Password</a>
                                            </li>
                                            <li class=\"divider\"></li>
                                            <li>
                                                <a href=\"";
            // line 47
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "</a>
                                            </li>
                                        </ul>
                                    </div>

                                ";
        } else {
            // line 53
            echo "
                                    <a class=\"login\" href=\"";
            // line 54
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">Login »</a>

                                ";
        }
        // line 57
        echo "                            </li>
                        </ul>
                    </nav>

                </div>

            </div>

        </div>

        <div class=\"row visible-xs\">
            <nav class=\"navbar header_nav\" style=\"margin-bottom: 10px;\">
                <div class=\"row\">
                    <div class=\"col-md-12 col-sm-12\">
                        <div class=\"navbar-header\" style=\"margin-right: -33px\">
                            <div class=\"row\">
                                <div class=\"col-xs-8 col-sm-6\">
                                    <div id=\"logo\">
                                        <a href=\"";
        // line 75
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\"><img
                                                    src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/search/logo.png"), "html", null, true);
        echo "\" alt=\"Home\"/></a>
                                    </div>
                                </div>
                                <div class=\"col-xs-4 col-sm-4 text-center\">
                                    <button class=\"navbar-toggle collapsed\" data-target=\"#navbar\"
                                            data-toggle=\"collapse\" type=\"button\" style=\"float: none\">
                                        <span class=\"sr-only\">Toggle navigation</span>
                                        <img src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/home/menu-icon.png"), "html", null, true);
        echo "\" alt=\" \"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id=\"navbar\" class=\"navbar-right navbar-collapse collapse col-md-9 col-sm-6 col-xs-10\">
                            <ul class=\"nav navbar-nav navbar-right text-uppercase\" style=\"margin-top: 15px\">
                                ";
        // line 90
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 91
            echo "                                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("admin_user_account");
            echo "\">My Account</a></li>
                                    <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#myModalSupport\">Contact
                                            Support</a></li>
                                    <li><a href=\"";
            // line 94
            echo $this->env->getExtension('routing')->getPath("fos_user_change_password");
            echo "\">Change Password</a>
                                    </li>
                                    <li class=\"divider\"></li>
                                    <li>
                                        <a href=\"";
            // line 98
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "</a>
                                    </li>
                                ";
        } else {
            // line 101
            echo "                                    <li><a class=\"login\" href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">Login</a>
                                    </li>
                                ";
        }
        // line 104
        echo "                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
";
        // line 112
        echo twig_include($this->env, $context, "AdminBundle:Default:owner-support-form.html.twig");
        echo "
</div>
<div class=\"hidden-xs\" id=\"raya\" style=\"height:2px; background:#ffffff\"></div>
<div class=\"hidden-xs\" id=\"raya\" style=\"height:2px; background:#AE0303;\"></div>
<div class=\"visible-xs\" id=\"raya\" style=\"height:2px; background:#ffffff\"></div>
<div class=\"visible-xs\" id=\"raya\" style=\"height:2px; background:#AE0303;margin-top:-15px;\"></div>
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 104,  178 => 101,  170 => 98,  156 => 91,  154 => 90,  144 => 83,  134 => 76,  130 => 75,  110 => 57,  101 => 53,  90 => 47,  83 => 43,  70 => 36,  65 => 33,  63 => 32,  19 => 1,  251 => 96,  246 => 95,  243 => 94,  238 => 87,  232 => 80,  226 => 75,  201 => 30,  195 => 112,  191 => 26,  187 => 25,  183 => 24,  179 => 23,  175 => 22,  171 => 21,  166 => 20,  163 => 94,  157 => 17,  153 => 16,  149 => 15,  145 => 14,  141 => 13,  136 => 11,  131 => 10,  128 => 9,  122 => 7,  117 => 6,  106 => 98,  104 => 54,  96 => 88,  94 => 87,  86 => 81,  84 => 80,  78 => 76,  76 => 75,  50 => 52,  47 => 22,  42 => 9,  36 => 7,  34 => 6,  27 => 7,  99 => 23,  91 => 19,  85 => 17,  79 => 15,  77 => 40,  72 => 13,  69 => 12,  62 => 10,  55 => 27,  49 => 6,  44 => 19,  41 => 4,  33 => 3,);
    }
}
