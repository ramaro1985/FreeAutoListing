<?php

/* LiipImagineBundle:Form:form_div_layout.html.twig */
class __TwigTemplate_bb9b1d97671a729a46f2f688943f8186ef28148972dd513561dec9bf7cfbd4a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'liip_imagine_image_widget' => array($this, 'block_liip_imagine_image_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('liip_imagine_image_widget', $context, $blocks);
    }

    public function block_liip_imagine_image_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        ";
        if ((isset($context["image_path"]) ? $context["image_path"] : null)) {
            // line 4
            echo "            <div>
                ";
            // line 5
            if ((isset($context["link_url"]) ? $context["link_url"] : null)) {
                // line 6
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, (((isset($context["link_filter"]) ? $context["link_filter"] : null)) ? ($this->env->getExtension('liip_imagine')->filter((isset($context["link_url"]) ? $context["link_url"] : null), (isset($context["link_filter"]) ? $context["link_filter"] : null))) : ((isset($context["link_url"]) ? $context["link_url"] : null))), "html", null, true);
                echo "\" ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["link_attr"]) ? $context["link_attr"] : null));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo twig_escape_filter($this->env, (isset($context["attrname"]) ? $context["attrname"] : null), "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, (isset($context["attrvalue"]) ? $context["attrvalue"] : null), "html", null, true);
                    echo "\" ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
                ";
            }
            // line 8
            echo "
                <img src=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter((isset($context["image_path"]) ? $context["image_path"] : null), (isset($context["image_filter"]) ? $context["image_filter"] : null)), "html", null, true);
            echo "\" ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["image_attr"]) ? $context["image_attr"] : null));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo twig_escape_filter($this->env, (isset($context["attrname"]) ? $context["attrname"] : null), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, (isset($context["attrvalue"]) ? $context["attrvalue"] : null), "html", null, true);
                echo "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo " />

                ";
            // line 11
            if ((isset($context["link_url"]) ? $context["link_url"] : null)) {
                // line 12
                echo "                    </a>
                ";
            }
            // line 14
            echo "            </div>
        ";
        }
        // line 16
        echo "
        ";
        // line 17
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "LiipImagineBundle:Form:form_div_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  58 => 9,  29 => 3,  97 => 40,  83 => 34,  55 => 8,  35 => 5,  30 => 2,  27 => 1,  22 => 43,  20 => 1,  394 => 290,  249 => 148,  242 => 144,  230 => 135,  206 => 114,  202 => 113,  198 => 112,  192 => 108,  187 => 104,  178 => 97,  163 => 85,  151 => 76,  140 => 68,  134 => 65,  124 => 58,  120 => 57,  116 => 56,  112 => 55,  92 => 43,  84 => 40,  77 => 12,  68 => 34,  50 => 18,  43 => 6,  38 => 5,  36 => 10,  26 => 2,  21 => 2,  19 => 1,  162 => 38,  157 => 37,  152 => 36,  145 => 26,  141 => 25,  137 => 24,  133 => 23,  129 => 22,  125 => 21,  121 => 20,  117 => 19,  113 => 18,  109 => 17,  104 => 50,  101 => 15,  94 => 12,  90 => 36,  86 => 10,  81 => 14,  73 => 6,  62 => 39,  59 => 38,  56 => 37,  45 => 30,  42 => 29,  39 => 15,  37 => 6,  32 => 4,  25 => 1,  91 => 25,  88 => 17,  85 => 16,  78 => 8,  75 => 11,  67 => 18,  54 => 36,  49 => 8,  46 => 7,  40 => 5,  33 => 9,);
    }
}
