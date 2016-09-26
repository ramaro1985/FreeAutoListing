<?php

/* AdminBundle:Default:content-header.html.twig */
class __TwigTemplate_210fad42ff825ecebf9133168335f741e2b72ca05cf32ff9b706ad65c37108c8 extends Twig_Template
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
        echo "<div class=\"container-fluid\">
    <header>
        <div class=\"row hidden-xs\">

            <ul class=\"breadcrumb breadcrumb-cap\">
                ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 7
            echo "
                    <li class=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "class", array(), "array"), "html", null, true);
            echo "\">
                        ";
            // line 9
            if (($this->getAttribute((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "path", array(), "array") != "")) {
                // line 10
                echo "                            <a href=\"";
                echo $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "path", array(), "array"));
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "name", array(), "array"), "html", null, true);
                echo "</a>
                        ";
            } else {
                // line 12
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "name", array(), "array"), "html", null, true);
                echo "
                        ";
            }
            // line 14
            echo "                        ";
            if (($this->getAttribute((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "class", array(), "array") == "")) {
                // line 15
                echo "                            <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/line1.jpg"), "html", null, true);
                echo "\">
                        ";
            }
            // line 17
            echo "

                    </li>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
                <li class=\"col-md-4 pull-right clearfix\" style=\"padding-top: 4px;padding-right: 0px\">
                    <div class=\"input-group \">
                        <input type=\"text\" id=\"select_dealer_input\" class=\"form-control\"
                               placeholder=\"";
        // line 26
        if ((array_key_exists("profile_selected", $context) && ((isset($context["profile_selected"]) ? $context["profile_selected"] : null) != ""))) {
            echo twig_escape_filter($this->env, (isset($context["profile_selected"]) ? $context["profile_selected"] : null), "html", null, true);
        } else {
            echo "Select Dealer";
        }
        echo "\"/>
                      <span class=\"input-group-btn\">
                         <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\"
                                 style=\"background-color: #E6E6E6\"><span
                                     class=\"caret\"></span></button>
                          <ul class=\"dropdown-menu pull-right\" role=\"menu\">
                              ";
        // line 32
        if (array_key_exists("profiles", $context)) {
            // line 33
            echo "                                  ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["profiles"]) ? $context["profiles"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["profile"]) {
                // line 34
                echo "                                      <li><a href=\"#\" class=\"selected_dealer\"
                                             id_profile=\" ";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "name"), "html", null, true);
                echo "</a></li>
                                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['profile'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                              ";
        }
        // line 38
        echo "                          </ul>
                      </span>
                    </div>
                </li>

            </ul>


        </div>
    </header>
</div>
<script type=\"text/javascript\">
    jQuery(document).ready(function () {

        /*
         *  Al hacer en las listas despleglables seleccionar el elemento marcado
         *
         */
        jQuery(\".selected_dealer\").click(function () {
            jQuery(\"#select_dealer_input\").attr(\"placeholder\", jQuery(this).text());
        });

    });

</script>


          ";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:content-header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 38,  111 => 37,  98 => 34,  93 => 33,  56 => 15,  53 => 14,  39 => 10,  37 => 9,  30 => 7,  26 => 6,  305 => 205,  298 => 201,  288 => 194,  271 => 180,  260 => 172,  250 => 165,  233 => 151,  223 => 144,  213 => 137,  202 => 129,  146 => 82,  138 => 77,  120 => 65,  97 => 48,  92 => 46,  67 => 32,  61 => 29,  28 => 8,  29 => 9,  185 => 104,  178 => 101,  170 => 98,  156 => 91,  154 => 90,  144 => 83,  134 => 76,  130 => 75,  110 => 57,  101 => 35,  90 => 47,  83 => 43,  70 => 36,  65 => 33,  63 => 32,  19 => 1,  251 => 96,  246 => 95,  243 => 94,  238 => 87,  232 => 80,  226 => 75,  201 => 30,  195 => 112,  191 => 26,  187 => 117,  183 => 24,  179 => 23,  175 => 22,  171 => 21,  166 => 20,  163 => 94,  157 => 17,  153 => 86,  149 => 15,  145 => 14,  141 => 13,  136 => 11,  131 => 10,  128 => 9,  122 => 7,  117 => 6,  106 => 98,  104 => 52,  96 => 88,  94 => 87,  86 => 81,  84 => 80,  78 => 26,  76 => 75,  50 => 52,  47 => 12,  42 => 9,  36 => 7,  34 => 6,  27 => 7,  99 => 23,  91 => 32,  85 => 41,  79 => 15,  77 => 40,  72 => 22,  69 => 33,  62 => 17,  55 => 26,  49 => 6,  44 => 19,  41 => 18,  33 => 8,);
    }
}
