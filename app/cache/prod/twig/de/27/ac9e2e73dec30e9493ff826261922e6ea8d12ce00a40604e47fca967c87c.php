<?php

/* KnpPaginatorBundle:Pagination:sliding.html.twig */
class __TwigTemplate_de27ac9e2e73dec30e9493ff826261922e6ea8d12ce00a40604e47fca967c87c extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        if (((isset($context["pageCount"]) ? $context["pageCount"] : null) > 1)) {
            // line 4
            echo "<div class=\"pagination\">
    ";
            // line 5
            if ((array_key_exists("first", $context) && ((isset($context["current"]) ? $context["current"] : null) != (isset($context["first"]) ? $context["first"] : null)))) {
                // line 6
                echo "        <span class=\"first\">
            <a href=\"";
                // line 7
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["first"]) ? $context["first"] : null)))), "html", null, true);
                echo "\">&lt;&lt;</a>
        </span>
    ";
            }
            // line 10
            echo "
    ";
            // line 11
            if (array_key_exists("previous", $context)) {
                // line 12
                echo "        <span class=\"previous\">
            <a href=\"";
                // line 13
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["previous"]) ? $context["previous"] : null)))), "html", null, true);
                echo "\">&lt;</a>
        </span>
    ";
            }
            // line 16
            echo "
    ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagesInRange"]) ? $context["pagesInRange"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 18
                echo "        ";
                if (((isset($context["page"]) ? $context["page"] : null) != (isset($context["current"]) ? $context["current"] : null))) {
                    // line 19
                    echo "            <span class=\"page\">
                <a href=\"";
                    // line 20
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["page"]) ? $context["page"] : null)))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true);
                    echo "</a>
            </span>
        ";
                } else {
                    // line 23
                    echo "            <span class=\"current\">";
                    echo twig_escape_filter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true);
                    echo "</span>
        ";
                }
                // line 25
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "
    ";
            // line 28
            if (array_key_exists("next", $context)) {
                // line 29
                echo "        <span class=\"next\">
            <a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["next"]) ? $context["next"] : null)))), "html", null, true);
                echo "\">&gt;</a>
        </span>
    ";
            }
            // line 33
            echo "
    ";
            // line 34
            if ((array_key_exists("last", $context) && ((isset($context["current"]) ? $context["current"] : null) != (isset($context["last"]) ? $context["last"] : null)))) {
                // line 35
                echo "        <span class=\"last\">
            <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : null), twig_array_merge((isset($context["query"]) ? $context["query"] : null), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : null) => (isset($context["last"]) ? $context["last"] : null)))), "html", null, true);
                echo "\">&gt;&gt;</a>
        </span>
    ";
            }
            // line 39
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "KnpPaginatorBundle:Pagination:sliding.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 39,  108 => 36,  91 => 29,  79 => 25,  73 => 23,  52 => 16,  43 => 12,  29 => 6,  692 => 311,  688 => 309,  681 => 304,  667 => 295,  662 => 293,  658 => 291,  652 => 288,  646 => 286,  644 => 285,  639 => 282,  633 => 279,  630 => 278,  624 => 275,  621 => 274,  619 => 273,  607 => 264,  595 => 257,  591 => 255,  584 => 252,  582 => 251,  578 => 250,  569 => 244,  565 => 243,  561 => 242,  557 => 241,  548 => 235,  535 => 231,  531 => 230,  525 => 227,  520 => 224,  513 => 220,  509 => 218,  506 => 217,  502 => 215,  496 => 214,  491 => 212,  481 => 210,  479 => 209,  466 => 198,  463 => 197,  460 => 196,  454 => 195,  451 => 194,  448 => 193,  445 => 192,  440 => 191,  437 => 190,  434 => 189,  431 => 188,  428 => 187,  425 => 186,  422 => 185,  419 => 184,  416 => 183,  413 => 182,  410 => 181,  407 => 180,  404 => 179,  398 => 177,  395 => 176,  392 => 175,  389 => 174,  386 => 173,  382 => 172,  379 => 171,  377 => 170,  329 => 129,  320 => 125,  314 => 122,  308 => 120,  306 => 119,  301 => 116,  295 => 113,  292 => 112,  286 => 109,  283 => 108,  281 => 107,  269 => 98,  262 => 94,  257 => 91,  253 => 89,  247 => 87,  245 => 86,  232 => 79,  228 => 78,  224 => 77,  220 => 76,  215 => 74,  207 => 69,  194 => 65,  188 => 64,  177 => 58,  170 => 54,  166 => 52,  163 => 51,  159 => 49,  153 => 48,  141 => 45,  138 => 44,  136 => 43,  126 => 36,  121 => 33,  115 => 31,  109 => 30,  106 => 29,  103 => 34,  100 => 33,  95 => 26,  92 => 25,  89 => 28,  86 => 27,  83 => 22,  80 => 21,  77 => 20,  71 => 18,  68 => 17,  65 => 20,  62 => 19,  59 => 18,  56 => 13,  53 => 12,  47 => 10,  44 => 9,  36 => 7,  33 => 6,  27 => 5,  24 => 4,  22 => 3,  1234 => 979,  1071 => 819,  1043 => 794,  810 => 564,  651 => 408,  632 => 392,  610 => 373,  600 => 260,  581 => 349,  570 => 346,  566 => 344,  562 => 343,  543 => 326,  532 => 323,  528 => 321,  524 => 320,  505 => 303,  501 => 301,  498 => 300,  495 => 299,  492 => 298,  489 => 297,  484 => 211,  458 => 270,  447 => 267,  443 => 265,  439 => 264,  420 => 247,  409 => 244,  405 => 242,  401 => 178,  383 => 225,  372 => 222,  368 => 220,  364 => 219,  343 => 138,  332 => 197,  328 => 195,  324 => 127,  289 => 161,  279 => 158,  275 => 156,  271 => 155,  252 => 138,  241 => 85,  237 => 133,  233 => 132,  210 => 111,  202 => 109,  199 => 108,  195 => 107,  182 => 61,  174 => 94,  171 => 93,  167 => 92,  148 => 46,  140 => 73,  135 => 72,  131 => 71,  118 => 32,  110 => 58,  105 => 35,  101 => 56,  72 => 29,  55 => 17,  45 => 15,  40 => 13,  37 => 12,  34 => 11,  30 => 5,  19 => 2,  102 => 30,  97 => 29,  94 => 30,  87 => 25,  84 => 24,  78 => 22,  74 => 19,  69 => 20,  66 => 46,  50 => 11,  46 => 13,  41 => 11,  38 => 10,  32 => 7,);
    }
}
