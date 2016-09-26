<?php

/* AdminBundle:Default:user-dashboard-content.html.twig */
class __TwigTemplate_8648a1f738ae29876ef97839a24ae81466514712b542742c6435b803b210e099 extends Twig_Template
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
        echo "<div class=\"row\">
    <div id=\"container\" class=\"\">

        ";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["profiles"]) ? $context["profiles"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["profile"]) {
            // line 5
            echo "
            <div class=\"col-xs-12 col-sm-6 col-md-6 ";
            // line 6
            if ((isset($context["ismobile"]) ? $context["ismobile"] : null)) {
                echo " no_padding ";
            }
            echo "\" ";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") > 2) || (isset($context["ismobile"]) ? $context["ismobile"] : null))) {
                echo " style=\"margin-top:10px\" ";
            }
            echo ">
                <div class=\"container-fluid borderBoxShadows\"
                     style=\"background-color: white;padding-bottom: 0px;padding-top: 10px;padding-right: 0px\">
                    <div class=\"thumbnail\">
                        <div class=\"col-xs-4 col-sm-5 col-md-5 logo img-responsive\"
                             style=\"background-image:url('";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "logo")), "html", null, true);
            echo "');\">

                        </div>
                        <div class=\"col-xs-8 col-sm-7 col-md-7 caption\" style=\"padding-top: 0px\">
                            <h4 style=\"  margin-bottom: 1px;\">";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "name"), "html", null, true);
            echo "</h4>
                            <span style=\"font-size: 12;color: #808080\">Inventory <span
                                        id=\"inventory\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "inventory"), "html", null, true);
            echo "</span> cars</span>

                            <div class=\"col-xs-12 no_padding\" style=\"margin-top: 5px;\">
                                <span class=\"rating\"
                                      style=\"color: #ff571d;font-size: 15px;font-weight: 400\"> 4.6 </span>
                            </div>
                            <div class=\"col-xs-12 no_padding\" style=\"margin-top: 5px;\">
                                <span class=\"views\"
                                      style=\"font-size: 15px;font-weight: 400\">views: ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "views"), "html", null, true);
            echo "</span>
                            </div>
                            <div class=\"col-xs-12 no_padding\" style=\"padding-top: 5px\">
                                ";
            // line 28
            if (($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "status") == "active")) {
                // line 29
                echo "                                    ";
                $context["statuscolor"] = "#15790f";
                // line 30
                echo "                                ";
            } elseif (($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "status") == "inactive")) {
                // line 31
                echo "                                    ";
                $context["statuscolor"] = "#791212";
                // line 32
                echo "                                ";
            }
            // line 33
            echo "                                <span id=\"status_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "prop_pk"), "html", null, true);
            echo "\"
                                      style=\"padding-right:5px;color: ";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["statuscolor"]) ? $context["statuscolor"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "status"), "html", null, true);
            echo "</span>
                                <img id=\"status_loading_";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "prop_pk"), "html", null, true);
            echo "\" class=\"hide\"
                                     src=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/loading.gif"), "html", null, true);
            echo "\" alt=\"\"/>
                            </div>

                        </div>
                        <div class=\"col-xs-12 col-sm-12 col-md-12 text-right\" style=\"bottom: 11px;\">
                            <li class=\"dropdown list-unstyled\" data-toggle=\"tooltip\" title=\"\"
                                data-original-title=\"Options\">
                                <a href=\"javascript:void(0)\" data-target=\"#\" class=\"dropdown-toggle\"
                                   data-toggle=\"dropdown\"
                                   style=\"text-decoration: no-underline;color: #3763ff\">Options
                                    <b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu pull-right\">
                                    <li><a href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("profile_view", array("prop_pk" => $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "prop_pk"))), "html", null, true);
            echo "\">View</a></li>
                                    <li>
                                        <a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("set_description", array("type" => "open", "prop_pk" => $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "prop_pk"))), "html", null, true);
            echo "\">Edit</a>
                                    </li>
                                    <li>
                                        <a href=\"javascript:SendStatusRequest('";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "prop_pk"), "html", null, true);
            echo "');\">Deactivate</a>
                                    </li>
                                </ul>
                                </ul>
                            </li>

                        </div>
                    </div>
                </div>
            </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['profile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "

    </div>
</div>
<script type=\"text/javascript\">
    jQuery(document).ready(function () {


    });

    function SendStatusRequest(prop_pk) {
        /*jQuery(\"#status_loading_\" + prop_pk).removeClass(\"hide\");
         jQuery.ajax({
         url: \"
        ";
        // line 78
        echo "\",
         type: \"POST\",
         data: {id: prop_pk, text: jQuery('#status_' + prop_pk).text()},
         async: true,
         success: function (response) {
         jQuery('#status_' + prop_pk).text(response.status);
         jQuery(\"#status_loading_\" + prop_pk).addClass(\"hide\");
         },
         fail: function(response){
         alert(response.error);
         }
         });*/
    }

</script>";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:user-dashboard-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 78,  167 => 64,  142 => 53,  136 => 50,  131 => 48,  116 => 36,  112 => 35,  106 => 34,  101 => 33,  98 => 32,  95 => 31,  92 => 30,  89 => 29,  87 => 28,  81 => 25,  70 => 17,  65 => 15,  58 => 11,  24 => 4,  19 => 1,  130 => 49,  123 => 45,  117 => 41,  100 => 25,  93 => 22,  86 => 18,  83 => 17,  77 => 15,  75 => 14,  72 => 13,  69 => 12,  62 => 10,  55 => 8,  49 => 6,  44 => 6,  41 => 5,  33 => 3,);
    }
}
