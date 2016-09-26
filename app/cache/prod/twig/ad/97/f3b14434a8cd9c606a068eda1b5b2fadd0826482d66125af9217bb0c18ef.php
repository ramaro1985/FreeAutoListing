<?php

/* AppBundle:FAL:search-results-content.html.twig */
class __TwigTemplate_ad97f3b14434a8cd9c606a068eda1b5b2fadd0826482d66125af9217bb0c18ef extends Twig_Template
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
        echo "<div class=\"container\" style=\"margin-top: 20px;\">
<div class=\"col-xs-12 col-md-12 col-sm-12\">
<div id=\"sidebar-left\" class=\"col-md-2 col-sm-3\" style=\"background-color: white\">
<div class=\"row\">
<div class=\"container-fluid no_padding\">
<div class=\"col-md-12 \">
<h6 class=\"text-uppercase  bold_text\">Your Search</h6>

<div id=\"filters_panel\">
    ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["filterlist"]) ? $context["filterlist"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["filterbox"]) {
            // line 11
            echo "        ";
            if ((twig_length_filter($this->env, (isset($context["filterbox"]) ? $context["filterbox"] : null)) > 0)) {
                // line 12
                echo "            <div class=\"panel panel-default sidebar_panel\">
                <div class=\"panel-body\" id=\"";
                // line 13
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["filterbox"]) ? $context["filterbox"] : null), "name", array(), "array")), "html", null, true);
                echo "_filter_box\">
                    <div class=\"col-md-12 col-sm-12 col-xs-12 no_padding\">
                        <span class=\"pull-left\">";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filterbox"]) ? $context["filterbox"] : null), "name", array(), "array"), "html", null, true);
                echo "</span>
                                            <span class=\"badge pull-right close_filter_box\"
                                                  onclick=\"javascript:DestroyFilterBox(this)\">x</span>
                    </div>
                    <ul class=\"col-md-12 list-unstyled\">
                        <li>
                            <a href=\"#\" class=\"values\"
                               id=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["filterbox"]) ? $context["filterbox"] : null), "values", array(), "array"), 0, array(), "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["filterbox"]) ? $context["filterbox"] : null), "values", array(), "array"), 1, array(), "array"), "html", null, true);
                echo "</a>
                        </li>
                    </ul>
                </div>
            </div>
        ";
            }
            // line 28
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filterbox'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "</div>

<div class=\"col-md-12 col-sm-12 col-xs-12 no_padding\">
    <div class=\"col-md-7 col-sm-7 col-xs-7 no_padding\">
        <a id=\"btn-search\" href=\"javascript:void(0)\"
           class=\"btn btn-danger btn-group-justified text-uppercase\">Search</a>
    </div>
    <div class=\"col-md-4 col-sd-4 col-xd-4 col-md-offset-1 col-sm-offset-1 no_padding\">
        <a href=\"javascript:removeAllFilterBox();\" class=\"btn btn-sm\">Clear all</a>
    </div>
</div>
<div class=\"clearfix\"></div>
<div class=\"row\">

<div class=\"list-group\" style=\"margin-top: 30px\">
<div id=\"year_filter\" class=\"list-group-item\" data-toggle=\"tooltip\" data-placement=\"left\">


    <div class=\"panel-body\" style=\"padding: 5px 0px \">
        <li class=\"dropdown list-group-item-text\" style=\"margin-top: 0px;\">
            <a id=\"min_year\" href=\"#\" class=\"dropdown-toggle text-right\"
               data-toggle=\"dropdown\"><span class=\"pull-left minimum_text\"
                                            style=\"font-size: 13px\">Minimum Year</span>
                <b class=\"caret\" style=\"color: #000000\"></b>
            </a>
            <ul class=\"dropdown-menu pre-scrollable minimum_list\">
                <li style=\"text-align: left\">
                    ";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["obj_year"]) ? $context["obj_year"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["year"]) {
            // line 57
            echo "                        <a href=\"javascript:void(0)\" class=\"min\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["year"]) ? $context["year"] : null), "id"), "html", null, true);
            echo "\"
                           style=\"padding: 3px 10px;font-size: 11px\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["year"]) ? $context["year"] : null), "year"), "html", null, true);
            echo "</a>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['year'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                </li>
            </ul>
        </li>
        <li class=\"dropdown list-group-item-text\">
            <a href=\"#\" id=\"max_year\" class=\"dropdown-toggle text-right\"
               data-toggle=\"dropdown\"><span class=\"pull-left maximum_text\"
                                            style=\"font-size: 13px\">Maximum Year</span>
                <b class=\"caret\" style=\"color: #000000\"></b>
            </a>
            <ul class=\"dropdown-menu pre-scrollable maximum_list\">
                <li style=\"text-align: left\">
                    ";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["obj_year"]) ? $context["obj_year"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["year"]) {
            // line 72
            echo "                        <a href=\"javascript:void(0)\" class=\"max\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["year"]) ? $context["year"] : null), "id"), "html", null, true);
            echo "\"
                           style=\"padding: 3px 10px;font-size: 11px\">";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["year"]) ? $context["year"] : null), "year"), "html", null, true);
            echo "</a>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['year'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                </li>
            </ul>
        </li>
    </div>

</div>
<div id=\"price_filter\" class=\"list-group-item\">
    <div class=\"panel-body\" style=\"padding: 5px 0px \">

        <li class=\"dropdown list-group-item-text\" style=\"margin-top: 0px;\">
            <a href=\"#\" class=\"dropdown-toggle text-right\"
               data-toggle=\"dropdown\"><span class=\"pull-left minimum_text\"
                                            style=\"font-size: 13px\">Minimum Price</span>
                <b class=\"caret\" style=\"color: #000000\"></b>
            </a>
            <ul class=\"dropdown-menu minimum_list\">
                <li style=\"text-align: left\">
                    ";
        // line 92
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["prices"]) ? $context["prices"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["price"]) {
            // line 93
            echo "                        <a href=\"javascript:void(0)\"
                           style=\"padding: 3px 10px;font-size: 11px\">\$";
            // line 94
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["price"]) ? $context["price"] : null), 0, "."), "html", null, true);
            echo "</a>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['price'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "                </li>
            </ul>
        </li>
        <li class=\"dropdown list-group-item-text\">
            <a href=\"#\" class=\"dropdown-toggle text-right\"
               data-toggle=\"dropdown\"><span class=\"pull-left maximum_text\"
                                            style=\"font-size: 13px\">Maximum Price</span>
                <b class=\"caret\" style=\"color: #000000\"></b>
            </a>
            <ul class=\"dropdown-menu maximum_list\">
                <li style=\"text-align: left\">
                    ";
        // line 107
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["prices"]) ? $context["prices"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["price"]) {
            // line 108
            echo "                        <a href=\"javascript:void(0)\"
                           style=\"padding: 3px 10px;font-size: 11px\">\$";
            // line 109
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["price"]) ? $context["price"] : null), 0, "."), "html", null, true);
            echo "</a>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['price'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 111
        echo "                </li>
            </ul>
        </li>

    </div>
</div>
<div class=\"list-group-item\" id=\"condition\">

    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapseOne\" aria-expanded=\"false\" aria-controls=\"collapseOne\"
        style=\"list-style: none;\">Condition
    </li>

    <div id=\"collapseOne\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group\" id=\"condition_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"javascript:void(0)\" id=\"all\" class=\"\">All</a>
            </div>
            ";
        // line 132
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["conditions"]) ? $context["conditions"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["condition"]) {
            // line 133
            echo "                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    <a href=\"#item\" id=\"";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["condition"]) ? $context["condition"] : null), "id"), "html", null, true);
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["condition"]) ? $context["condition"] : null), "name"), "html", null, true);
            echo "</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['condition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "        </div>
    </div>
</div>
<div id=\"make\" class=\"list-group-item\">

    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapsedmake\" aria-expanded=\"false\" aria-controls=\"collapsedmake\"
        style=\"list-style: none;\">Make
    </li>
    <div id=\"collapsedmake\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group make_filter_extended\" id=\"make_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" id=\"all\" class=\"\">All</a>
            </div>
            ";
        // line 155
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 8));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 156
            echo "                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    <a href=\"#item\" id=\"";
            // line 158
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["obj_make"]) ? $context["obj_make"] : null), (isset($context["i"]) ? $context["i"] : null), array(), "array"), "makeId"), "html", null, true);
            echo "</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "            <!--<button class=\"btn-group-justified btn-default\" data-toggle=\"popover\" id=\"moreMake\">Choose More >></button>-->
            <a href=\"#\" class=\"btn show-pop-large btn-group-justified btn-default\" data-placement=\"right\">Choose More
                >></a>
        </div>
    </div>
</div>
<div id=\"model_filter\" class=\"list-group-item\">
    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapsedmodel\" aria-expanded=\"false\" aria-controls=\"collapsedmodel\"
        style=\"list-style: none;\">Model
    </li>
    <div id=\"collapsedmodel\" class=\"collapse\" aria-labelledby=\"headingOne\">
        <!--<div class=\"list-item active All\">
            <span class=\"glyphicon glyphicon-ok\"></span>
            <a href=\"javascript:ChangeDropDownValueModel(this)\"  id=\"all\" class=\"\">All</a>
        </div>-->
    </div>
</div>

<div id=\"bodystyle\" class=\"list-group-item\">
    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapsedbodystyle\" aria-expanded=\"false\" aria-controls=\"collapsedbodystyle\"
        style=\"list-style: none;\">Body Style
    </li>
    <div id=\"collapsedbodystyle\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group\" id=\"bodystyle_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" id=\"all\" class=\"\">All</a>
            </div>
            ";
        // line 194
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 195
            echo "                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    <a href=\"#item\" id=\"";
            // line 197
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["bodystyles"]) ? $context["bodystyles"] : null), (isset($context["i"]) ? $context["i"] : null), array(), "array"), "id"), "html", null, true);
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["bodystyles"]) ? $context["bodystyles"] : null), (isset($context["i"]) ? $context["i"] : null), array(), "array"), "name"), "html", null, true);
            echo "</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        echo "            <a href=\"#\" class=\"btn show-pop-large_bodystyle btn-group-justified btn-default\" data-placement=\"right\">Choose
                More
                >></a>
        </div>
    </div>
</div>
<div id=\"interiorcolor\" class=\"list-group-item\">
    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapsedinteriorcolor\" aria-expanded=\"false\" aria-controls=\"collapsedinteriorcolor\"
        style=\"list-style: none;\">Interior Color
    </li>
    <div id=\"collapsedinteriorcolor\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group pre-scrollable\" id=\"interiorcolor_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" id=\"all\" class=\"\">All</a>
            </div>
            ";
        // line 219
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["colors"]) ? $context["colors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
            // line 220
            echo "                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    <a href=\"#item\" id=\"";
            // line 222
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["color"]) ? $context["color"] : null), "id"), "html", null, true);
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["color"]) ? $context["color"] : null), "colorname"), "html", null, true);
            echo "</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 225
        echo "        </div>
    </div>
</div>
<div id=\"exteriorcolor\" class=\"list-group-item\">
    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapsedexteriorcolor\" aria-expanded=\"false\" aria-controls=\"collapsedexteriorcolor\"
        style=\"list-style: none;\">Exterior Color
    </li>
    <div id=\"collapsedexteriorcolor\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group pre-scrollable\" id=\"exteriorcolor_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" id=\"all\" class=\"\">All</a>
            </div>
            ";
        // line 241
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["colors"]) ? $context["colors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
            // line 242
            echo "                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    <a href=\"#item\" id=\"";
            // line 244
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["color"]) ? $context["color"] : null), "id"), "html", null, true);
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["color"]) ? $context["color"] : null), "colorname"), "html", null, true);
            echo "</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 247
        echo "        </div>
    </div>
</div>

<div id=\"transmission\" class=\"list-group-item\">
    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapsedtransmission\" aria-expanded=\"false\" aria-controls=\"collapsedtransmission\"
        style=\"list-style: none;\">Transmission
    </li>
    <div id=\"collapsedtransmission\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group\" id=\"transmission_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" id=\"all\" class=\"\">All</a>
            </div>
            ";
        // line 264
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["transmissions"]) ? $context["transmissions"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["transmission"]) {
            // line 265
            echo "                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    <a href=\"#item\" id=\"";
            // line 267
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["transmission"]) ? $context["transmission"] : null), "id"), "html", null, true);
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["transmission"]) ? $context["transmission"] : null), "name"), "html", null, true);
            echo "</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['transmission'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 270
        echo "        </div>
    </div>
</div>
<div id=\"mileage\" class=\"list-group-item\">
    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapsedmileage\" aria-expanded=\"false\" aria-controls=\"collapsedtransmission\"
        style=\"list-style: none;\">Mileage
    </li>
    <div id=\"collapsedmileage\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group\" id=\"mileage_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" id=\"all\" class=\"\">All</a>
            </div>
            <div class=\"list-item\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" class=\"under\">Under 30,000</a>
            </div>
            <div class=\"list-item\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" class=\"under\">Under 60,000</a>
            </div>
            <!--";
        // line 294
        echo "% for m in mileages %}
                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    ";
        // line 297
        echo "% if loop.last %}
                    <a href=\"#item\" class=\"over\">Over ";
        // line 298
        echo "{ m }}</a>
                    ";
        // line 299
        echo "% else %}
                        <a href=\"#item\" class=\"under\">Under ";
        // line 300
        echo "{ m }}</a>
                    ";
        // line 301
        echo "% endif %}
                </div>
            ";
        // line 303
        echo "% endfor %}-->
        </div>
    </div>
</div>
<div id=\"fuel\" class=\"list-group-item\">
    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapsedfuel\" aria-expanded=\"false\" aria-controls=\"collapsedfuel\"
        style=\"list-style: none;\">Fuel
    </li>
    <div id=\"collapsedfuel\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group\" id=\"fuel_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" id=\"all\" class=\"\">All</a>
            </div>
            ";
        // line 320
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fuels"]) ? $context["fuels"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["fuel"]) {
            // line 321
            echo "                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    <a href=\"#item\" id=\"";
            // line 323
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fuel"]) ? $context["fuel"] : null), "id"), "html", null, true);
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fuel"]) ? $context["fuel"] : null), "name"), "html", null, true);
            echo "</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fuel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 326
        echo "        </div>
    </div>
</div>
<div id=\"doors\" class=\"list-group-item\">

    <span class=\"glyphicon glyphicon-chevron-right pull-right small\"></span>
    <li class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\"
        href=\"#collapseddoors\" aria-expanded=\"false\" aria-controls=\"collapseddoors\"
        style=\"list-style: none;\">Doors
    </li>
    <div id=\"collapseddoors\" class=\"collapse\" aria-labelledby=\"headingOne\">

        <div class=\"list-group\" id=\"doors_filter\">
            <div class=\"list-item active All\">
                <span class=\"glyphicon glyphicon-ok\"></span>
                <a href=\"#item\" id=\"all\" class=\"\">All</a>
            </div>
            ";
        // line 343
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["doorss"]) ? $context["doorss"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["doors"]) {
            // line 344
            echo "                <div class=\"list-item\">
                    <span class=\"glyphicon glyphicon-ok\"></span>
                    <a href=\"#item\" id=\"";
            // line 346
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doors"]) ? $context["doors"] : null), "id"), "html", null, true);
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doors"]) ? $context["doors"] : null), "name"), "html", null, true);
            echo "</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doors'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 349
        echo "        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class=\"col-md-10 col-sm-7\">
    <div class=\"col-md-12 \" style=\"background-color: #ffffff;\">

        <nav class=\"navbar\" role=\"navigation\"
             style=\"background-color: white;border-radius: 0px;padding:0px;margin-bottom: 0px;min-height: 40px;\">
            <div class=\"collapse navbar-collapse navbar-ex1-collapse\"
                 style=\"padding-left: 0px;padding-right: 0px;padding-top: 3px;\">
                <div class=\"col-md-10 no_padding pull-left\">
                    ";
        // line 366
        echo twig_include($this->env, $context, "CommonBundle:Default:filtersCarsResult.html.twig");
        echo "
                </div>
            </div>
        </nav>
    </div>
    <div class=\"col-md-12\" id=\"compare_panel\" hidden=\"\">
        <div id=\"compare_image_container\" class=\"col-md-6 text-left no_padding\">
            <!--<div class=\"compare_cars_photo img-responsive\" hasfoto=\"no\" style=\"background-image:url(";
        // line 373
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/for-sale.jpg"), "html", null, true);
        echo ")\">
             <div class=\"reset\">X</div>
            </div>-->
            <div class=\"compare_cars_photo thumbnail\">
                <div class=\"reset\" hidden=\"\" onclick=\"ResetCompareImage(this,0)\">X</div>
                <img class=\"img-responsive\" style=\"height: 100%; border: 1px solid white;\"/>
            </div>
            <div class=\"compare_cars_photo thumbnail\">
                <div class=\"reset\" hidden=\"\" onclick=\"ResetCompareImage(this,1)\">X</div>
                <img class=\"img-responsive\" style=\"height: 100%; border: 1px solid white;\"/>
            </div>
            <div class=\"compare_cars_photo thumbnail\">
                <div class=\"reset\" hidden=\"\" onclick=\"ResetCompareImage(this,2)\">X</div>
                <img class=\"img-responsive\" style=\"height: 100%;border: 1px solid white;\"/>
            </div>
        </div>
        <div class=\"col-md-3\" style=\"padding: 26px 0px;\">
            <label><span id=\"compare_counter\">0</span> <span id=\"cartext\">car</span> selected to compare</label>
        </div>
        <form action=\"";
        // line 392
        echo $this->env->getExtension('routing')->getPath("compare_cars");
        echo "\" method=\"POST\" target=\"_blank\">
            <input type=\"hidden\" id=\"image-0\" name=\"image-0\" value=\"\"/>
            <input type=\"hidden\" id=\"image-1\" name=\"image-1\" value=\"\"/>
            <input type=\"hidden\" id=\"image-2\" name=\"image-2\" value=\"\"/>
            <input type=\"hidden\" id=\"image-0_imagesrc\" name=\"image-0_imagesrc\" value=\"\"/>
            <input type=\"hidden\" id=\"image-1_imagesrc\" name=\"image-1_imagesrc\" value=\"\"/>
            <input type=\"hidden\" id=\"image-2_imagesrc\" name=\"image-2_imagesrc\" value=\"\"/>

            <div class=\"col-md-3\" style=\"padding: 21px 15px;\">
                <button id=\"btncompare\" type=\"submit\" class=\"btn btn-primary disabled\">Compare</button>
                <label id=\"clearAllCompare\" style=\"padding-left: 10px;\">Clear All</label>
            </div>
        </form>
    </div>
    <div id=\"all_vehicles_content\">

        ";
        // line 408
        echo twig_include($this->env, $context, "AppBundle:FAL:all-results-cars.html.twig");
        echo "

    </div>
</div>
</div>
</div>
</div>

</div>

<script type=\"text/javascript\">

var waitTofind = false;
var start = 1;
function ChangeDropDownValueModel(element) {

    jQuery(element).parents(\".dropdown\").find(\".dropdown-toggle\").find(\"span\").text(jQuery(element).text());

    var fill = 'model';
    var name = 'Model';

    var fill_filter = '#' + fill + '_filter';
    var fill_filter_box = '#' + fill + '_filter_box';

    var text = jQuery(element).text();
    if (text != 'All') {
        if (jQuery(fill_filter_box).size() == 0) {
            var content = '<ul class=\"col-md-12 list-unstyled\">' +
                    '<li>' +
                    '<a href=\"javascript:void(0)\" class=\"values\">' + text + '</a>' +
                    '</li>' +
                    '</ul>';
            jQuery(\"#filters_panel\").prepend(CreateFilterBox(fill, content, name));
            jQuery(\"#btn-search\").trigger(\"click\");
        } else {
            FindValueToFilterBox(fill_filter_box, text);
        }
    }
}

function ClearSelecions_Make() {
    jQuery(\"#make_filter_extended .active\").each(function () {
        jQuery(this).removeClass(\"active\");
    });
}


function ShowResult_Makes_Extended_List() {
    waitTofind = true;
    var counter = jQuery(\"#make_filter_extended .active\").size();

    var values = jQuery(\"#make_filter_box\").find(\".values\");

    if (counter > 1) {
        var all_list = jQuery(\"#make_filter .list-item\")[0];
        jQuery(all_list).removeClass(\"active\");
    }
    jQuery(\"#make_filter_extended .active\").each(function (i) {
        var text = jQuery(this).find(\"a\").text();
        if (!findValue(text)) {
            if (i == counter - 1) {
                waitTofind = false;
                FilterBoxAction('make', 'Makes', this, \"show-pop-large\");
            }
            else
                FilterBoxAction('make', 'Makes', this);
        }
    });

    function findValue(text) {
        var exist = false;
        values.each(function () {
            if (this.textContent == text) {
                exist = true;
                return;
            }
        });
        return exist;
    }
}

function ClearSelecions_BodyStyle() {
    jQuery(\".bdstyle_img .active\").each(function () {
        jQuery(this).removeClass(\"active\");
    });
}

function ShowResult_BodyStyle_Extended_List() {
    var counter = jQuery(\".bdstyle_img.active\").size();

    var values = jQuery(\"#bodystyle_filter_box\").find(\".values\");

    var fill = \"bodystyle\";
    var name = \"Body Style\";

    /* if (counter > 1) {
     var all_list = jQuery(\"#make_filter .list-item\")[0];
     jQuery(all_list).removeClass(\"active\");
     }*/

    var fill_filter_box = '#bodystyle_filter_box';

    jQuery(\".bdstyle_img.active\").each(function (i) {
        var text = jQuery(this).attr(\"bdstyle\");
        var idattr = jQuery(this).attr(\"bdstyle_id\");
        if (jQuery(fill_filter_box).size() == 0) {
            var content = '<ul class=\"col-md-12 list-unstyled\">' +
                    '<li>' +
                    '<a href=\"javascript:void(0)\" id=\"' + idattr + '\" class=\"values\">' + text + '</a>' +
                    '</li>' +
                    '</ul>';
            // var filterBox+fill = CreateFilterBox(fill, content, name);
            jQuery(\"#filters_panel\").prepend(CreateFilterBox(fill, content, name));
            //jQuery(\"#btn-search\").trigger(\"click\");

        } else {
            var filterboxdeleted = FindValueToFilterBox(fill_filter_box, text, this);
            if (filterboxdeleted)
                var tagany = jQuery(elem).siblings()[0];
            jQuery(tagany).addClass(\"active\");
        }
        jQuery(this).removeClass(\"active\");
        jQuery(this).find(\"img\").removeClass(\"active\");

    });

    /* function findValue(text) {
     var exist = false;
     values.each(function () {
     if (this.textContent == text) {
     exist = true;
     return;
     }
     });
     return exist;
     }*/
}

function RemoveBoxFilter(currentfilter) {
    var box = document.getElementById(currentfilter + \"_box\");
    jQuery(box).fadeOut().remove();
}


function CreateModelSelect() {
    var tag_a = jQuery(this).find(\"a\")[0];
    var id_make = tag_a.id;
    var make = tag_a.text;
    var a = null;
    var makedisplay, makeid;
    if (tag_a.id == \"all\") {
        jQuery(\"#collapsedmodel\").collapse('toggle');
        jQuery(\"#collapsedmodel\").children().remove();
    } else if (jQuery(tag_a).parent().hasClass(\"active\")) {
        a = '<a onClick=\"javascript:ChangeDropDownValueModel(tag_a)\" href=\"javascript:void(0)\" id=\"all\" style=\"padding: 3px 10px;font-size: 11px\">All</a>';

        jQuery.post('";
        // line 564
        echo $this->env->getExtension('routing')->getPath("find_models_by_make_front");
        echo "',
                {
                    make_id: make
                },
                function (data) {
                    if (data.error != undefined && data.error != \"\")
                        alert(data.error);
                    else
                        jQuery.each(data, function () {
                            a += '<a onClick=\"javascript:ChangeDropDownValueModel(this)\" href=\"javascript:void(0)\" id=\"' + this.value + '\"style=\"padding: 3px 10px;font-size: 11px\">' + this.text + '</a>';
                        });
                    var dropdown = CreateDropdownInModel(make, make, a);
                    jQuery('#collapsedmodel').append(dropdown);
                    jQuery(\"#collapsedmodel\").collapse('show');
                }, \"json\");

    } else {
        jQuery(\"#make_\" + id_make).remove();
    }
}
jQuery(document).ready(function () {

    jQuery(\".dropdown\").find(\".dropdown-menu li a\").click(function () {
        ChangeDropDownValue(this);
    });

    jQuery('.collapse').on('show.bs.collapse', function () {
        var arrow = jQuery(this).parent().find(\".glyphicon-chevron-right\");
        arrow.removeClass(\"glyphicon-chevron-right\");
        arrow.addClass(\"glyphicon-chevron-down\");
    });

    jQuery('.collapse').on('hidden.bs.collapse', function () {
        var arrow = jQuery(this).parent().find(\".glyphicon-chevron-down\");
        arrow.removeClass(\"glyphicon-chevron-down\");
        arrow.addClass(\"glyphicon-chevron-right\");
    });

    jQuery(\"#make_filter_extended\").find(\".list-item a\").click(function () {
        // jQuery(this).parent().trigger('click');
        MakeListItemCLick(jQuery(this).parent());
    });

    function CreateLinkToDropdown(element, dropdown, clickFunction, haveId) {
        var tag_a = document.createElement('a');
        if (haveId)
            tag_a.id = element.value;
        tag_a.text = element.text;
        var li = document.createElement('li');
        jQuery(tag_a).appendTo(li);
        dropdown.append(li);
        jQuery(tag_a).bind(\"click\", clickFunction);
    }


    /**
     *  request the controller with all the filters values when one sort option has been selected
     * */
    jQuery('.sort_link').click(function () {
        var text = jQuery(this).text();
        var sort_id = jQuery(this).attr(\"sort_id\");
        jQuery(\"#sort_list\").find(\".selected\").attr(\"sort_id\", sort_id);
        jQuery(\"#sort_list\").find(\".selected\").text(text);
    });
    /**
     *  request the controller with all the filters values when one sort option has been selected
     * */
    jQuery('.view_link').click(function () {
        var text = jQuery(this).text();
        var view_id = jQuery(this).attr(\"view_id\");
        jQuery(\"#view_list\").find(\".selected\").attr(\"view_id\", view_id);
        jQuery(\"#view_list\").find(\".selected\").text(text);
    });

    /** Price
     *  click event of the element of the filter inquieries for create the filterbox info
     *  this functions are in functions_frontend_utils.js file this function create de filterBox or add a value if already exits
     */
    jQuery(\"#price_filter\").find(\".dropdown-menu li a\").click(function () {
        if (jQuery(\"#price_filter\").find(\".minimum_text\").text() != \"Minimum Price\" && jQuery(\"#price_filter\").find(\".maximum_text\").text() != \"Maximum Price\") {

            var minprice = jQuery(\"#price_filter\").find(\".minimum_text\").text();
            var maxprice = jQuery(\"#price_filter\").find(\".maximum_text\").text();
            var text = minprice + \" - \" + maxprice;

            minprice = parseFloat(minprice.split(\"\$\")[1]);
            maxprice = parseFloat(maxprice.split(\"\$\")[1]);
            if (minprice < maxprice) {
                if (jQuery(\"#price_filter_box\").size() == 0) {
                    var content = '<ul class=\"col-md-12 list-unstyled\">' +
                            '<li>' +
                            '<a href=\"javascript:void(0)\" class=\"values\">' + text + '</a>' +
                            '</li>' +
                            '</ul>';
                    var pricefilterBox = CreateFilterBox(\"price\", content, \"Price\");
                    jQuery(\"#filters_panel\").prepend(pricefilterBox);
                    jQuery(\"#btn-search\").trigger(\"click\");

                } else {
                    jQuery(\"#price_filter_box\").find(\".list-unstyled li a\").text(text);
                }
            } else {
                jQuery(\"#price_filter\").find(\".minimum_text\").text(\"Minimum Price\");
                jQuery(\"#price_filter\").find(\".maximum_text\").text(\"Maximum Price\");
                //alert(\"el precio minimo debe ser menor que el maximo\")
            }
        }
    });

    /** year
     *  click event of the element of the filter inquieries for create the filterbox info
     *  this functions are in functions_frontend_utils.js file this function create de filterBox or add a value if already exits
     */
    jQuery(\"#year_filter\").find(\".dropdown-menu li a\").click(function () {
        if (jQuery(\"#year_filter\").find(\".minimum_text\").text() != \"Minimum Year\" && jQuery(\"#year_filter\").find(\".maximum_text\").text() != \"Maximum Year\") {

            var minyear = jQuery(\"#year_filter\").find(\".minimum_text\").text();
            var maxyear = jQuery(\"#year_filter\").find(\".maximum_text\").text();
            var text = minyear + \" - \" + maxyear;

            if (minyear < maxyear) {
                if (jQuery(\"#year_filter_box\").size() == 0) {
                    var content = '<ul class=\"col-md-12 list-unstyled\">' +
                            '<li>' +
                            '<a href=\"javascript:void(0)\" class=\"values\">' + text + '</a>' +
                            '</li>' +
                            '</ul>';
                    var yearfilterBox = CreateFilterBox(\"year\", content, \"Year\");
                    jQuery(\"#filters_panel\").prepend(yearfilterBox);
                    jQuery(\"#btn-search\").trigger(\"click\");

                } else {
                    jQuery(\"#year_filter_box\").find(\".list-unstyled li a\").text(text);
                }
            } else {
                jQuery(\"#year_filter\").find(\".minimum_text\").text(\"Minimum Year\");
                jQuery(\"#year_filter\").find(\".maximum_text\").text(\"Maximum Year\");
            }
        }
    });

    FilterBox('condition', 'Condition');
    FilterBox('transmission', 'Transmission');
    FilterBox('bodystyle', 'Body Style');
    FilterBox('fuel', 'Fuel');
    FilterBox('doors', 'Doors');
    FilterBox('year', 'Years');
    FilterBox('make', 'Makes');
    FilterBox('model', 'Model');
    FilterBox('mileage', 'Mileage');
    FilterBox('interiorcolor', 'Interior Color');
    FilterBox('exteriorcolor', 'Exterior Color');

    jQuery(\"#btn-search\").click(GetSearchValues);


    /**
     *   Compare checkbox event on images boxes
     * */

    jQuery(\"input:checked\").each(function () {
        this.checked = false;
    });

    // jQuery(\".compare_check\").on('change',function () {
    jQuery(document).on('change', \".compare_check\", function () {
        var check = this;
        if (jQuery(\"#compare_panel\").css(\"display\") == \"none\")
            jQuery(\"#compare_panel\").slideDown(\"slow\");
        if (check.checked == true) {
            var imagebox = jQuery(check).parents(\".borderBoxShadows\");
            var car_serie = imagebox.attr(\"car-serie\");
            var imagen = imagebox.find(\"img\")[0];
            var currentsrcimage = imagen.src;
            var inserted = false;
            jQuery(\"#compare_image_container .compare_cars_photo\").each(function (i) {
                if (!jQuery(this).hasClass(\"hasphoto\") && !inserted) {
                    //jQuery(this).css(\"background-image\",\"url('\"+ currentsrcimage +\"')\")
                    jQuery(this).find(\"img\").attr(\"src\", currentsrcimage);
                    jQuery(this).addClass(\"hasphoto\");
                    jQuery(this).find(\".reset\").show();
                    inserted = true;
                    jQuery(check).attr(\"image_compare\", i);
                    jQuery(\"#compare_counter\").text(parseInt(jQuery(\"#compare_counter\").text()) + 1);
                    jQuery(\"#image-\" + i).val(car_serie);
                    jQuery(\"#image-\" + i + \"_imagesrc\").val(currentsrcimage);

                    if (parseInt(jQuery(\"#compare_counter\").text()) > 1) {
                        jQuery(\"#btncompare\").removeClass(\"disabled\");
                        jQuery(\"#cartext\").text(\"cars\");
                    }
                }
            });
            if (!inserted)
                check.checked = false;
        } else {
            var asociated = jQuery(check).attr(\"image_compare\");
            jQuery(\"#compare_image_container .compare_cars_photo\").each(function (i) {
                if (i == asociated) {
                    jQuery(this).find(\"img\").attr(\"src\", \"\");
                    jQuery(this).removeClass(\"hasphoto\");
                    jQuery(\"#compare_counter\").text(parseInt(jQuery(\"#compare_counter\").text()) - 1);
                    jQuery(this).find(\".reset\").hide();
                    jQuery(\"#image-\" + i).val(\"\");
                    jQuery(\"#image-\" + i + \"_imagesrc\").val(\"\");
                    if (parseInt(jQuery(\"#compare_counter\").text()) < 2) {
                        jQuery(\"#btncompare\").addClass(\"disabled\");
                        jQuery(\"#cartext\").text(\"car\");
                    }
                    if (parseInt(jQuery(\"#compare_counter\").text()) == 0)
                        jQuery(\"#compare_panel\").slideUp(\"slow\");

                }
            });
        }
    });

    //jQuery(\".savecar_option\").on(\"click\", function () {
    jQuery(document).on(\"click\", \".savecar_option\", function () {
        var savecarelement = jQuery(this);
        if (savecarelement.text().toLowerCase().trim() == \"save car\") {
            var vehicle_serie = savecarelement.attr(\"car-serie\");
            var savecar_image = document.getElementById(\"car_image_\" + vehicle_serie);
            var savecar_info = document.getElementById(\"car_info_\" + vehicle_serie);
            document.getElementById(\"car_image\").src = savecar_image.src;
            document.getElementById(\"car_details\").textContent = savecar_info.textContent;
            jQuery(\"#loading_div\").find(\"span\").text(\"Saving...\");
            jQuery(\"#loading_div\").removeClass(\"hide\");
            jQuery(\"#btnupdate\").addClass(\"disabled\");
            jQuery('#confirm_added').modal(\"show\");
            jQuery.post('";
        // line 794
        echo $this->env->getExtension('routing')->getPath("add_carsaved_to_user");
        echo "',
                    {
                        serie: vehicle_serie
                    },
                    function (data) {
                        if (data.response) {
                            savecarelement.text(\"SAVED CAR\");
                            savecarelement.addClass(\"saved\");
                            jQuery(\"#btnupdate\").attr(\"currentsavedcar\", data.savedcar_id);
                            jQuery(\"#btnupdate\").removeClass(\"disabled\");
                        }
                        else {
                            alert(data.error);
                        }
                        jQuery(\"#loading_div\").addClass(\"hide\");
                    });
        }
    });

    jQuery(document).on(\"click\", \"#btnupdate\", function () {
        if (!jQuery(this).hasClass(\"disabled\")) {
            var car_id = jQuery(this).attr(\"currentsavedcar\");
            var notes = jQuery(\"#savecar_notes\").val();
            jQuery(\"#loading_div\").find(\"span\").text(\"Updating...\");
            jQuery(\"#loading_div\").removeClass(\"hide\");
            jQuery.post('";
        // line 819
        echo $this->env->getExtension('routing')->getPath("update_carsaved_in_user");
        echo "',
                    {
                        savedcar_id: car_id,
                        savedcar_notes: notes
                    },
                    function (data) {
                        if (data.response) {
                            setTimeout(function () {
                                jQuery('#confirm_added').modal(\"hide\");
                            }, 200);
                        }
                        else {
                            alert(data.error);
                        }
                        jQuery(\"#loading_div\").addClass(\"hide\");
                    });
        }
    });

    jQuery(\"#clearAllCompare\").click(function () {
        jQuery(\"#compare_image_container .compare_cars_photo\").each(function (i) {
            if (jQuery(this).hasClass(\"hasphoto\")) {
                jQuery(this).find(\"img\").attr(\"src\", \"\");
                jQuery(this).removeClass(\"hasphoto\");
                jQuery(\"#compare_counter\").text(0);
                jQuery(\"#btncompare\").addClass(\"disabled\");
                jQuery(\"#compare_panel\").slideUp(\"slow\");
            }
        });
        for (var i = 0; i < 3; i++) {
            jQuery(\"#image-\" + i).val(\"\");
            jQuery(\"#image-\" + i + \"_imagesrc\").val(\"\");
        }
        jQuery(\"input:checked\").each(function () {
            this.checked = false;
        });
        jQuery(\".reset\").hide();
    });

    jQuery(\".btn-primary\").click(function (e) {
        if (jQuery(this).hasClass(\"disabled\"))
            e.preventDefault();
    });

    /**
     *  filters top click options
     * */
    jQuery(\".car_filters li a,.count_filter li a\").on(\"click\", function () {
        GetSearchValues();
    });

})
;

function ResetCompareImage(elem, pos) {
    var compareBox = jQuery(elem).parent();
    jQuery(compareBox).find(\"img\").attr(\"src\", \"\");
    jQuery(compareBox).removeClass(\"hasphoto\");
    jQuery(\"#compare_counter\").text(parseInt(jQuery(\"#compare_counter\").text()) - 1);
    jQuery(compareBox).find(\".reset\").hide();
    jQuery(\"#image-\" + pos).val(\"\");
    jQuery(\"input[image_compare='\" + pos + \"']\")[0].checked = false;
    if (parseInt(jQuery(\"#compare_counter\").text()) < 2)
        jQuery(\"#btncompare\").addClass(\"disabled\");
    if (parseInt(jQuery(\"#compare_counter\").text()) == 0)
        jQuery(\"#compare_panel\").slideUp(\"slow\");
}

function MakeListItemCLick(elem) {
    jQuery(elem).toggleClass(\"active\");
}
;

jQuery(\"#all_vehicles_content\").on(\"click\", \".pagination span a\", function () {
    var url = jQuery(this).attr(\"href\");
    var currentvalue = url.split(\"page=\")[1];
    start = currentvalue;
    GetSearchValues();
    return false;
});

function DestroyFilterBox(element) {
    jQuery(element).parents(\".sidebar_panel\").fadeOut(300, function () {
        var currentboxId = jQuery(this).find(\".panel-body\").attr(\"id\");
        if (currentboxId == \"make_filter_box\") {
            jQuery(\"#collapsedmodel\").collapse('toggle');
            jQuery(\"#collapsedmodel\").children().remove();
            if (jQuery(\"#model_filter_box\").size() > 0) {
                jQuery(\"#model_filter_box\").remove();
            }
            jQuery(\"#make_filter_extended .list-item.active\").each(function () {
                jQuery(this).removeClass(\"active\");
            });
        }
        if (currentboxId == \"model_filter_box\") {
            jQuery(\"#collapsedmodel\").children().each(function () {
                var name = jQuery(this).attr(\"makedisplay\");
                jQuery(this).find(\"span\").text(name + \" Model\");
            });
        }

        if (currentboxId == \"bodystyle_filter_box\") {
            jQuery(\".bdstyle_img\").removeClass(\"active\");
            jQuery(\".bdstyle_img img\").removeClass(\"active\");
        }

        var idfilterbox = \"#\" + currentboxId.split(\"_\")[0] + \"_filter\";
        jQuery(idfilterbox).find(\".list-item \").removeClass(\"active\");
        jQuery(jQuery(idfilterbox).find(\".list-item \")[0]).addClass(\"active\");
        if (idfilterbox = \"#year_filter\") {
            jQuery(idfilterbox).find(\".dropdown:first a span\").text(\"Minimum Year\");
            jQuery(idfilterbox).find(\".dropdown:last a span\").text(\"Maximum Year\");
        }

        if (idfilterbox = \"#price_filter\") {
            jQuery(idfilterbox).find(\".dropdown:first a span\").text(\"Minimum Price\");
            jQuery(idfilterbox).find(\".dropdown:last a span\").text(\"Maximum Price\");
        }
        jQuery(this).remove();
        jQuery(\"#btn-search\").trigger(\"click\");
    });
}

function removeAllFilterBox() {
    //jQuery(\".close_filter_box\").trigger(\"click\");
    var counter = jQuery(\".close_filter_box\").size();
    if (counter > 1)
        waitTofind = true;
    jQuery(\".close_filter_box\").each(function (i) {
        if (i == counter - 1)
            waitTofind = false;
        jQuery(this).trigger(\"click\");
    });
}

function ChangeDropDownValue(element) {

    jQuery(element).parents(\".dropdown\").find(\".dropdown-toggle\").find(\"span\").text(jQuery(element).text());
}

function GetSearchValues() {

    var zipcode = GetValuesinArray(\"zipcode_filter_box\");
    var model = GetValuesinArray(\"model_filter_box\");
    var make = GetValuesinArray(\"make_filter_box\");
    var year = GetValuesinArray(\"year_filter_box\");
    var condition = GetValuesinArray(\"condition_filter_box\");
    var bodystyle = GetValuesinArray(\"bodystyle_filter_box\");
    var transmission = GetValuesinArray(\"transmission_filter_box\");
    var fuel = GetValuesinArray(\"fuel_filter_box\");
    var doors = GetValuesinArray(\"doors_filter_box\");
    var mileage = GetValuesinArray(\"mileage_filter_box\");
    var interiorcolor = GetValuesinArray(\"interiorcolor_filter_box\");
    var exteriorcolor = GetValuesinArray(\"exteriorcolor_filter_box\");
    var prices = GetPricesSearchValues();
    var sort_id = jQuery(\"#sort_list\").find(\".selected\").attr(\"sort_id\");
    var limit = jQuery(\"#view_list\").find(\".selected\").attr(\"view_id\");

    jQuery(\"#loading\").removeClass(\"hide\");
    jQuery.ajax({
        url: '";
        // line 979
        echo $this->env->getExtension('routing')->getPath("search_all_vehicles_content");
        echo "',
        type: \"POST\",
        data: {
            zipcode: zipcode,
            model: model,
            make: make,
            year: year,
            condition: condition,
            bodystyle: bodystyle,
            transmission: transmission,
            fuel: fuel,
            doors: doors,
            prices: prices,
            mileage: mileage,
            interiorcolor: interiorcolor,
            exteriorcolor: exteriorcolor,
            sort: sort_id,
            start: start,
            limit: limit
        },
        success: function (response) {
            jQuery('#all_vehicles_content').empty();
            jQuery(\"#loading\").addClass(\"hide\");
            jQuery('#all_vehicles_content').html(response);
        },
        error: function (response) {
            jQuery(\"#loading\").addClass(\"hide\");
            alert(response);
        }
    });
}
/**
 *  Find values literal en the list
 * */
function GetValuesinArray(elementid) {
    var valuesArray = Array();
    if (jQuery(\"#\" + elementid).size() > 0) {
        var values = jQuery(\"#\" + elementid + \" ul\").find(\".values\");
        values.each(function () {
            valuesArray.push(jQuery(this).text());
        });
    }
    return valuesArray;
}

/**
 *  Get mileage values
 * **/
function GetPricesSearchValues() {
    var valuesArray = Array();
    if (jQuery(\"#\" + elementid).size() > 0) {
        var values = jQuery(\"#\" + elementid + \" ul\").find(\"li\");
        values.each(function () {
            valuesArray.push(jQuery(this).find('a').text());
        });
    }
    return valuesArray;
}

/**
 *  Get price values
 * **/
function GetPricesSearchValues() {
    var result = Array();
    if (jQuery(\"#price_filter_box\").size() > 0) {
        var prices = jQuery(\"#price_filter_box\").find(\"ul li a\").text();
        var minprice = prices.split(\" - \")[0];
        var maxprice = prices.split(\" - \")[1];
        minprice = parseFloat(minprice.split(\"\$\")[1]) * 1000;
        maxprice = parseFloat(maxprice.split(\"\$\")[1]) * 1000;
        result.push(minprice);
        result.push(maxprice);
        return result;
    }
}

/**
 *  Create dropdown model
 * */
function CreateDropdownInModel(makeid, name, a) {
    var dropdown = jQuery('<li id=\"make_' + makeid + '\" makedisplay=\"' + name + '\" class=\"dropdown list-group-item-text \">' +
    '<a href=\"#\" class=\"dropdown-toggle text-right\" data-toggle=\"dropdown\">' +
    '<span class=\"pull-left\" style=\"font-size: 11px\">' + name + ' Model</span>' +
    '<b class=\"caret\" style=\"color: #000000\"></b>' +
    '</a>' +
    '<ul class=\"dropdown-menu pre-scrollable\">' +
    '<li style=\"text-align: left\" id=\"model_list\"> ' + a + ' </li></ul></li>');
    return dropdown;
}


</script>
<script>
    function SelectBodyStyle(elem) {
        jQuery(elem).toggleClass(\"active\");
        jQuery(elem).find(\"img\").toggleClass(\"active\");

        /* var fill_filter_box = '#bodystyle_filter_box';
         var fill = \"bodystyle\";
         var name = \"Body Style\"

         var text = jQuery(elem).attr(\"bdstyle\");
         var idattr = jQuery(elem).attr(\"bdstyle_id\");
         if (jQuery(fill_filter_box).size() == 0) {
         var content = '<ul class=\"col-md-12 list-unstyled\">' +
         '<li>' +
         '<a href=\"javascript:void(0)\" id=\"' + idattr + '\" class=\"values\">' + text + '</a>' +
         '</li>' +
         '</ul>';
         // var filterBox+fill = CreateFilterBox(fill, content, name);
         jQuery(\"#filters_panel\").prepend(CreateFilterBox(fill, content, name));
         jQuery(\"#btn-search\").trigger(\"click\");

         } else {
         var filterboxdeleted = FindValueToFilterBox(fill_filter_box, text);
         if (filterboxdeleted)
         var tagany = jQuery(elem).siblings()[0];
         jQuery(tagany).addClass(\"active\");
         }*/
    }


</script>";
    }

    public function getTemplateName()
    {
        return "AppBundle:FAL:search-results-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1234 => 979,  1071 => 819,  1043 => 794,  810 => 564,  651 => 408,  632 => 392,  610 => 373,  600 => 366,  581 => 349,  570 => 346,  566 => 344,  562 => 343,  543 => 326,  532 => 323,  528 => 321,  524 => 320,  505 => 303,  501 => 301,  498 => 300,  495 => 299,  492 => 298,  489 => 297,  484 => 294,  458 => 270,  447 => 267,  443 => 265,  439 => 264,  420 => 247,  409 => 244,  405 => 242,  401 => 241,  383 => 225,  372 => 222,  368 => 220,  364 => 219,  343 => 200,  332 => 197,  328 => 195,  324 => 194,  289 => 161,  279 => 158,  275 => 156,  271 => 155,  252 => 138,  241 => 135,  237 => 133,  233 => 132,  210 => 111,  202 => 109,  199 => 108,  195 => 107,  182 => 96,  174 => 94,  171 => 93,  167 => 92,  148 => 75,  140 => 73,  135 => 72,  131 => 71,  118 => 60,  110 => 58,  105 => 57,  101 => 56,  72 => 29,  55 => 22,  45 => 15,  40 => 13,  37 => 12,  34 => 11,  30 => 10,  19 => 1,  102 => 30,  97 => 29,  94 => 28,  87 => 25,  84 => 24,  78 => 22,  74 => 21,  69 => 20,  66 => 28,  50 => 7,  46 => 6,  41 => 5,  38 => 4,  32 => 2,);
    }
}
