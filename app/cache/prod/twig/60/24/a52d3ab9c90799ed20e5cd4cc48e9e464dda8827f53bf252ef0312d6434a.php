<?php

/* CommonBundle:Default:filtersCarsResult.html.twig */
class __TwigTemplate_6024a52d3ab9c90799ed20e5cd4cc48e9e464dda8827f53bf252ef0312d6434a extends Twig_Template
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
        echo "<ul class=\"nav navbar-nav\" id=\"input_search\" style=\"margin: 0;\">

    <label class=\"navbar-text text-uppercase bold_text_black\" for=\"sort_list\" style=\"margin-left: 0px !important; font-size: 11px\">Sort
        by</label>
    <li class=\"dropdown\" id=\"sort_list\" style=\"min-width: 109px;border:1px solid black;\">
        <a href=\"#\" class=\"dropdown-toggle text-uppercase text-right\"
           data-toggle=\"dropdown\"><span sort_id=\"0\" class=\"pull-left selected\" style=\"font-size: 11px\">All</span>
            <b class=\"caret\" style=\"color: #000000\"></b>
        </a>
        <ul class=\"dropdown-menu car_filters\">
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"0\" style=\"font-size: 11px\">All</a></li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"1\" style=\"font-size: 11px\">Price-Highest</a>
            </li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"2\" style=\"font-size: 11px\">Price-Lowest</a></li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"3\" style=\"font-size: 11px\">Mileage-Highest</a>
            </li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"4\" style=\"font-size: 11px\">Mileage-Lowest</a>
            </li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"5\" style=\"font-size: 11px\">Year-Newest</a></li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"6\" style=\"font-size: 11px\">Year-Oldest</a></li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"7\" style=\"font-size: 11px\">Make-A to Z</a></li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"8\" style=\"font-size: 11px\">Make-Z to A</a></li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"9\" style=\"font-size: 11px\">Model-A to Z</a></li>
            <li><a class=\"sort_link\" href=\"javascript:void(0)\" sort_id=\"1\" style=\"font-size: 11px\">Moldel-Z to A</a>
            </li>

        </ul>
    </li>
    <label class=\"navbar-text text-uppercase bold_text_black\" for=\"view_list\" style=\"font-size: 11px\">view</label>
    <li class=\"dropdown\" id=\"view_list\" style=\"min-width: 50px;border:1px solid black;\">
        <a href=\"#\" class=\"dropdown-toggle text-uppercase text-right\"
           data-toggle=\"dropdown\"><span view_id=\"12\" class=\"pull-left selected\" style=\"font-size: 11px\">12</span>
            <b class=\"caret\" style=\"color: #000000\"></b>
        </a>
        <ul class=\"dropdown-menu count_filter\">
            <li><a class=\"view_link\" href=\"javascript:void(0)\" view_id=\"12\"
                   style=\"padding: 3px 10px;font-size: 11px\">12</a></li>
            <li><a class=\"view_link\" href=\"javascript:void(0)\" view_id=\"24\"
                   style=\"padding: 3px 10px;font-size: 11px\">24</a></li>
        </ul>
    </li>
</ul>

<ul class=\"nav navbar-nav \" style=\"margin: 0; padding-left: 10px\">
    <img id=\"loading\" class=\"hide\"
         src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/loading.gif"), "html", null, true);
        echo "\" alt=\"\"/>
</ul>";
    }

    public function getTemplateName()
    {
        return "CommonBundle:Default:filtersCarsResult.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1234 => 979,  1071 => 819,  1043 => 794,  810 => 564,  651 => 408,  632 => 392,  610 => 373,  600 => 366,  581 => 349,  570 => 346,  566 => 344,  562 => 343,  543 => 326,  532 => 323,  528 => 321,  524 => 320,  505 => 303,  501 => 301,  498 => 300,  495 => 299,  492 => 298,  489 => 297,  484 => 294,  458 => 270,  447 => 267,  443 => 265,  439 => 264,  420 => 247,  409 => 244,  405 => 242,  401 => 241,  383 => 225,  372 => 222,  368 => 220,  364 => 219,  343 => 200,  332 => 197,  328 => 195,  324 => 194,  289 => 161,  279 => 158,  275 => 156,  271 => 155,  252 => 138,  241 => 135,  237 => 133,  233 => 132,  210 => 111,  202 => 109,  199 => 108,  195 => 107,  182 => 96,  174 => 94,  171 => 93,  167 => 92,  148 => 75,  140 => 73,  135 => 72,  131 => 71,  118 => 60,  110 => 58,  105 => 57,  101 => 56,  72 => 29,  55 => 22,  45 => 15,  40 => 13,  37 => 12,  34 => 11,  30 => 10,  19 => 1,  102 => 30,  97 => 29,  94 => 28,  87 => 25,  84 => 24,  78 => 22,  74 => 21,  69 => 20,  66 => 46,  50 => 7,  46 => 6,  41 => 5,  38 => 4,  32 => 2,);
    }
}
