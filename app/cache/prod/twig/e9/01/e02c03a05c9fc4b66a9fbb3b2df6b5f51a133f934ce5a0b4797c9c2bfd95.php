<?php

/* CommonBundle:Default:header.html.twig */
class __TwigTemplate_e901e02c03a05c9fc4b66a9fbb3b2df6b5f51a133f934ce5a0b4797c9c2bfd95 extends Twig_Template
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
        echo "<header>
";
        // line 2
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 3
            echo "    <nav class=\"navbar navbar-fixed-top visible-lg visible-md\"
         style=\"background-color: black;min-height: 18px; margin-bottom: 0px; position: relative\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-xs-11 col-xs-offset-1 col-md-10 col-md-offset-2 col-sm-6 col-sm-offset-6\">
                    <ul class=\"nav navbar-nav navbar-right small\"
                        style=\"margin-bottom: 0px;padding-top: 3px;padding-right: 6px;\">
                        <label
                                style=\"text-decoration: none; color: white;margin-bottom: 0px\">Welcome, ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "name"), "html", null, true);
            echo " </label>
                        <a href=\"
                                 ";
            // line 13
            if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "type"), "id") == 1) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "type"), "id") == 2))) {
                // line 14
                echo "                                    ";
                echo $this->env->getExtension('routing')->getPath("my_account");
                echo "
                                    ";
            } else {
                // line 16
                echo "                                    ";
                echo $this->env->getExtension('routing')->getPath("shopper_page");
                echo "
                                    ";
            }
            // line 18
            echo "                                    \" class=\"\"
                           style=\"text-decoration: none; color: white;\">&nbsp;&nbsp;&nbsp;My Account&nbsp;&nbsp;</a>
                        <span class=\"divider-vertical\"></span>
                        <a href=\"";
            // line 21
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
            // line 30
            echo "    <nav class=\"navbar navbar-fixed-top\"
         style=\"background-color: black;min-height: 18px; margin-bottom: 0px; position: relative\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-xs-12 col-md-6 col-md-offset-6\">
                    <div class=\"col-xs-11 col-xs-offset-1 col-md-10 col-md-offset-2 col-sm-6 col-sm-offset-6 no_padding\">
                        <ul class=\"nav navbar-nav small\" style=\"padding-top: 4px;\">
                            <a href=\"";
            // line 37
            echo $this->env->getExtension('routing')->getPath("owner_login");
            echo "\" class=\"text-uppercase\"
                               style=\"text-decoration: none; color: white;\">Sign In</a>
                            <span class=\"divider-vertical\"></span>
                            <a href=\"";
            // line 40
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
        // line 53
        echo "<div class=\"container-fluid visible-lg visible-md\">
<div class=\"row\">
    <div class=\"col-xs-12 col-md-12 no_padding\">
        <div class=\"col-xs-12 col-md-6 no_padding \">
            <div id=\"panel_buy\" class=\"panel\">
                <div class=\"grises\">
                    <img class=\"img-responsive\" style=\"width: 100%;\"
                         src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/home/banner-buy.jpg"), "html", null, true);
        echo "\" alt=\"\"/>
                </div>
                <div class=\"col-xs-12 col-md-7 div_logo\">
                    <div id=\"link_menu\" class=\"col-xs-2 col-md-2\">
                        <span id=\"showslidepanel\" class=\"menu_icon\"></span>
                    </div>
                    <div class=\"col-xs-10 col-md-10 text-center\">
                        <a href=\"";
        // line 67
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\">
                            <img class=\"logo col-xs-12 col-md-12\"
                                 src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/home/logo.png"), "html", null, true);
        echo " \">
                        </a>
                    </div>
                </div>
                <div class=\"col-md-5 div_form_in_header left\">
                    <h1 class=\"text-right text-uppercase bold_text\">buy</h1>

                    <form id=\"form_buy_header\"
                          action=\"";
        // line 77
        echo $this->env->getExtension('routing')->getPath("search_car_results");
        echo "\" method=\"POST\">

                        <div class=\"btn-group-vertical btn-group-lg\" style=\"width: 100%\">
                            <div class=\"dropdown\">
                                <a id=\"buy_year_btn\" role=\"button\" href=\"#\"
                                   class=\"btn btn-default dropdown-toggle panel_button btn-lg\"
                                   data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">
                                    <small name=\"year\" class=\"pull-left\">any year</small>
                                    <input class=\"year_value\" type=\"hidden\" name=\"year\" value=\"all\"/>
                                    <span class=\"caret\"></span>
                                </a>
                                <ul class=\"dropdown-menu year_dropdown pre-scrollable buy\"
                                    aria-labelledby=\"buy_year_btn\">
                                    <li>
                                        <a id='all' href='javascript:void(0)'
                                           onclick='javascript:ChangeDropDownValue(this)'>any year</a>
                                    </li>
                                    ";
        // line 94
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["years"]) ? $context["years"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["y"]) {
            // line 95
            echo "                                        <li><a id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["y"]) ? $context["y"] : null), "id"), "html", null, true);
            echo "\" href=\"javascript:void(0)\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["y"]) ? $context["y"] : null), "year"), "html", null, true);
            echo "</a></li>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['y'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "                                </ul>
                            </div>
                            <div class=\"dropdown\">
                                <a id=\"buy_make_button\" href=\"javascript:void(0)\"
                                   class=\"btn btn-default dropdown-toggle panel_button btn-lg make_btn\"
                                   data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">
                                    <small class=\"pull-left\">any make</small>
                                    <input class=\"make_value\" type=\"hidden\" name=\"make\" value=\"all\"/>
                                    <span class=\"caret\"></span>
                                    <span class=\"loading_icon hide\"></span>
                                </a>
                                <ul class=\"dropdown-menu make_dropdown pre-scrollable\"
                                    aria-labelledby=\"buy_make_button\">
                                    <li>
                                        <a id='all' href='javascript:void(0)'
                                           onclick='javascript:ChangeDropDownValue(this)'>any make</a>
                                    </li>
                                    ";
        // line 114
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["makes_distinct"]) ? $context["makes_distinct"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 115
            echo "                                        <li><a id=\"";
            echo "\" href=\"javascript:void(0)\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "makeId"), "html", null, true);
            echo "</a>
                                        </li>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "                                </ul>

                            </div>
                            <div class=\"dropdown\">
                                <a id=\"buy_model_btn\" name=\"model\" role=\"button\" href=\"#\"
                                   class=\"btn btn-default dropdown-toggle panel_button btn-lg model_btn\"
                                   data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">
                                    <small class=\"pull-left\">any model</small>
                                    <input class=\"model_value\" type=\"hidden\" name=\"model\" value=\"all\"/>
                                    <span class=\"caret\"></span>
                                    <span class=\"loading_icon hide\"></span>
                                </a>
                                <ul class=\"dropdown-menu model_dropdown pre-scrollable\"
                                    aria-labelledby=\"buy_model_btn\">

                                </ul>
                            </div>

                            <div class=\"dropdown\">

                                <input type=\"text\" id=\"zipcode_input\" name=\"zipcode\"
                                       class=\"btn btn-default panel_button btn-lg dropdown_input\"
                                       style=\"float:left;width:49%;text-align: left !important;padding: 12.5px 16px;font-size: 110%\"
                                       placeholder=\"zip code\"/>

                                        <button type=\"submit\"
                                                style=\"float:right;width:49%;text-align: center !important;padding: 10px 0px;\"
                                                class=\"btn btn-default panel_button btn-lg text-center  text-uppercase panel_left_different\">
                                            <small>Search</small>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class=\"slidepanel\">
                            <div class=\"col-xs-12 col-md-12\" style=\"padding: 15px 15px;\">
                                <span id=\"hideslidepanel\" class=\"menu_icon_slide pull-right\"></span>
                            </div>
                            <div class=\"list-group col-xs-12 first_list no_padding\">
                                <a href=\"";
        // line 157
        echo $this->env->getExtension('routing')->getPath("search_car_results");
        echo "\" class=\"list-group-item\">Cars for sale</a>
                                <a href=\"javascript:jQuery('#list').trigger('click');\" class=\"list-group-item\">Sell my
                                    car</a>
                                <a href=\"";
        // line 160
        echo $this->env->getExtension('routing')->getPath("about_us");
        echo "\" class=\"list-group-item\">About freeauto</a>
                                <a href=\"";
        // line 161
        echo $this->env->getExtension('routing')->getPath("why_free");
        echo "\" class=\"list-group-item\">Why Free</a>
                                <a href=\"#item\" class=\"list-group-item\">Support</a>
                                <a href=\"#item\" class=\"list-group-item\">Help</a>
                                <a href=\"";
        // line 164
        echo $this->env->getExtension('routing')->getPath("contact_us");
        echo "\" class=\"list-group-item\">Contact Us</a>
                            </div>
                            <div class=\"list-group col-xs-12 no_padding second_list\">
                                <a href=\"";
        // line 167
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register", array("tab" => "2"));
        echo "\"
                                   class=\"list-group-item\">Register as a
                                    Dealer</a>
                                <a href=\"";
        // line 170
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register", array("tab" => "3"));
        echo "\"
                                   class=\"list-group-item\">Register as a
                                    Private Seller</a>
                                <a href=\"";
        // line 173
        echo $this->env->getExtension('routing')->getPath("owner_login");
        echo "\" class=\"list-group-item\">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-xs-12 col-md-6 no_padding\">
                    <div id=\"panel_sell\" class=\"panel\">
                        <div class=\"grises\">
                            <img class=\"img-responsive\" style=\"width: 100%;\"
                                 src=\"";
        // line 182
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/home/banner-sell.jpg"), "html", null, true);
        echo "\" alt=\"\"/>
                        </div>
                        <div class=\"col-md-5 div_form_in_header right\">
                            <h1 class=\"text-left text-uppercase bold_text\">sell</h1>

                    <form id=\"form_sell_header\"
                          action=\"";
        // line 188
        echo $this->env->getExtension('routing')->getPath("step1_vehicle_register");
        echo "\" method=\"POST\">

                        <div class=\"btn-group-vertical btn-group-lg\" style=\"width: 100%\">
                            <div class=\"dropdown\">
                                <a id=\"sell_year_btn\" role=\"button\" href=\"#\"
                                   class=\"btn btn-default dropdown-toggle panel_button btn-lg\"
                                   data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">
                                    <small name=\"year\" class=\"pull-left\">any year</small>
                                    <input class=\"year_value\" type=\"hidden\" name=\"year\" value=\"all\"/>
                                    <span class=\"caret\"></span>
                                    <input type=\"hidden\" id=\"year_val\" value=\"0\">
                                </a>
                                <ul class=\"dropdown-menu year_dropdown sell pre-scrollable\"
                                    aria-labelledby=\"sell_year_btn\">
                                    <li>
                                        <a id='all' href='javascript:void(0)'
                                           onclick='javascript:ChangeDropDownValue(this)'>any year</a>
                                    </li>
                                    ";
        // line 206
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["years"]) ? $context["years"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["y"]) {
            // line 207
            echo "                                        <li><a id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["y"]) ? $context["y"] : null), "id"), "html", null, true);
            echo "\" href=\"javascript:void(0)\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["y"]) ? $context["y"] : null), "year"), "html", null, true);
            echo "</a></li>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['y'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 209
        echo "                                </ul>
                            </div>
                            <div class=\"dropdown\">
                                <a id=\"sell_make_button\" href=\"javascript:void(0)\"
                                   class=\"btn btn-default dropdown-toggle panel_button btn-lg make_btn\"
                                   data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">
                                    <small class=\"pull-left\">any make</small>
                                    <input class=\"make_value\" type=\"hidden\" name=\"make\" value=\"all\"/>
                                    <span class=\"caret\"></span>
                                    <span class=\"loading_icon hide\"></span>
                                </a>
                                <ul class=\"dropdown-menu make_dropdown pre-scrollable\"
                                    aria-labelledby=\"sell_make_button\">
                                </ul>

                            </div>
                            <div class=\"dropdown\">
                                <a id=\"sell_model_btn\" name=\"model\" role=\"button\" href=\"#\"
                                   class=\"btn btn-default dropdown-toggle panel_button btn-lg model_btn\"
                                   data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">
                                    <small class=\"pull-left\">any model</small>
                                    <input class=\"model_value\" type=\"hidden\" name=\"model\" value=\"all\"/>
                                    <span class=\"caret\"></span>
                                    <span class=\"loading_icon hide\"></span>
                                </a>
                                <ul class=\"dropdown-menu model_dropdown pre-scrollable\"
                                    aria-labelledby=\"sell_model_btn\">
                                </ul>
                            </div>

                            <div class=\"dropdown\">
                                <input type=\"text\" id=\"zipcode_input\" name=\"zipcode\"
                                       class=\"btn btn-default panel_button btn-lg dropdown_input\"
                                       style=\"float:left;width:49%;text-align: left !important;padding: 12.5px 16px;font-size: 110%\"
                                       placeholder=\"zip code\"/>

                                <a id=\"list\"
                                   style=\"float:right;width:49%;text-align: center !important;padding: 10px 0px;\"
                                   class=\"btn btn-default panel_button btn-lg text-center  text-uppercase panel_right_different\">
                                    <small>List my car</small>
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</header>
<header class=\"container-fluid visible-xs visible-sm\" style=\"display: table;height: 100%\">
    <p></p>
    <section class=\"col-xs-12 col-sm-12 no_padding clearfix\">
        <div id=\"header_links\" class=\"col-xs-12   pull-left\" style=\"display: inline-block\">
            <div class=\"col-xs-10 col-sm-10 text-left\">
                <a href=\"";
        // line 266
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\">
                    <img class=\"logo img-responsive\"
                         src=\"";
        // line 268
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/home/logo.png"), "html", null, true);
        echo " \">
                </a>
            </div>
            <div id=\"link_menu\" class=\"col-xs-2 col-sm-2\">
                <span class=\"menu_icon-mobile\"></span>
            </div>
        </div>
    </section>
    <section class=\"content col-xs-12 col-sm-12 no_padding text-center\">
        <div class=\"col-xs-12 col-sm-10 col-sm-offset-1\">
            <a href=\"";
        // line 278
        echo $this->env->getExtension('routing')->getPath("movil_search_filters");
        echo "\"
               class=\"btn buttons_mobile_device btn-lg btn-block text-uppercase\"><span>buy a car</span></a>

            <p></p>
            <a href=\"javascript:void(0)\" class=\"btn buttons_mobile_device btn-lg btn-block text-uppercase\"><span>sell your car</span></a>

            <div class=\"container-fluid text-center\">
                or <a href=\"";
        // line 285
        echo $this->env->getExtension('routing')->getPath("owner_login");
        echo "\" style=\"color: #ffffff;font-weight: bold;text-decoration: none\">sign
                    in</a>
            </div>
        </div>
    </section>
</header>

<script type=\"text/javascript\">

var form = null;


jQuery(document).ready(function () {

    jQuery(\"#panel_sell\").mouseover(function () {
        form = jQuery(\"#form_sell_header\");
    });

    jQuery(\"#panel_buy\").mouseover(function () {
        form = jQuery(\"#form_buy_header\");
    });

    jQuery(\"#showslidepanel\").on(\"click\", function () {
        jQuery(\".slidepanel\").show().stop().animate({
            left: \"0%\"
        }, 500, \"linear\");
        jQuery(this).hide();
    });

    jQuery(\"#hideslidepanel\").on(\"click\", function () {
        jQuery(\".slidepanel\").stop().animate({
            left: \"-200px\"
        }, 500, \"linear\", function () {
            jQuery(this).hide();
            jQuery(\"#showslidepanel\").fadeIn(\"fast\");
        });
        //jQuery(this).hide();
    });

    jQuery(\".year_value\").val(\"all\");
    jQuery(\".make_value\").val(\"all\");
    jQuery(\".model_value\").val(\"all\");

    jQuery(\".div_form_in_header\").mouseover(function () {
        jQuery(this).siblings(\".grises\").find(\"img\").addClass(\"hover\");
    });

    jQuery(\".year_dropdown li a\").click(function () {

        form = (jQuery(this).parents(\".year_dropdown\").hasClass(\"sell\")) ? jQuery(\"#form_sell_header\") : jQuery(\"#form_buy_header\");

        var make = form.find(\".make_btn\");
        var makeDropdown = form.find(\".make_dropdown\");
        var modelDropdown = form.find(\".model_dropdown\");
        ChangeDropDownValue(jQuery(makeDropdown).children()[0]);
        ChangeDropDownValue(jQuery(modelDropdown).children()[0]);
        jQuery(makeDropdown).children().not(\":lt(1)\").remove();
        jQuery(modelDropdown).children().not(\":lt(1)\").remove();
        ChangeDropDownValue(this);
        jQuery(form).find(\".year_value\").val(jQuery(this).attr(\"id\"));
        jQuery(form).find(\".make_value\").val(\"all\");
        jQuery(form).find(\".model_value\").val(\"all\");
        var year = jQuery(this).attr('id');

        if (form.attr('id') == 'form_sell_header') {
            jQuery('#year_val').val(year);
        }

        if (year != \"\" && year != \"all\") {
            make.find(\".loading_icon\").removeClass('hide');
            make.find(\".caret\").addClass('hide');
            make.addClass('disable');

            jQuery.post('";
        // line 358
        echo $this->env->getExtension('routing')->getPath("find_makes_by_year_front");
        echo "',
                    {
                        year_id: year
                    },
                    function (data) {
                        if (data.error != undefined && data.error != \"\")
                            alert(data.error);

                        makeDropdown.children().remove();
                        makeDropdown.append(jQuery(
                                '<li><a id=\"all\" href=\"javascript:void(0)\" onclick=\"javascript:ChangeDropDownValue(this)\">any make</a></li>'));

                        jQuery.each(data, function (i) {

                            CreateLinkToDropdown(this, makeDropdown, SelectMakeEvent, true);
                        });
                        make.find(\".loading_icon\").addClass('hide');
                        make.find(\".caret\").removeClass('hide');
                        make.removeClass('disable');
                    }, \"json\");
        } else if (year == \"all\") {
            ";
        // line 379
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["makes_distinct"]) ? $context["makes_distinct"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["make"]) {
            // line 380
            echo "            CreateLinkToDropdown({
                \"text\": \"";
            // line 381
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["make"]) ? $context["make"] : null), "makeId"), "html", null, true);
            echo "\"
            }, makeDropdown, SelectMakeEvent, false);
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['make'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 384
        echo "        }
    });

    jQuery(\".make_dropdown li a\").click(function () {
        ChangeDropDownValue(this);

        var model = form.find(\".model_btn\");
        var modelDropdown = form.find(\".model_dropdown\");
        ChangeDropDownValue(jQuery(modelDropdown).children()[0]);
        jQuery(modelDropdown).children().not(\":lt(1)\").remove();
        var make = jQuery(this).attr('id');
        //var parameter = (!make) ? jQuery(this).text() : make;
        var parameter = jQuery(this).text();
        //jQuery(form).find(\"#make_value\").val(parameter);
        jQuery(form).find(\".make_value\").val(parameter);
        //if (parameter != \"\") {
        if (parameter != \"all\") {
            model.find(\".loading_icon\").removeClass('hide');
            model.find(\".caret\").addClass('hide');
            model.addClass('disable');
            jQuery.post('";
        // line 404
        echo $this->env->getExtension('routing')->getPath("find_models_by_make_front");
        echo "',
                    {
                        make_id: parameter
                    },
                    function (data) {
                        if (data.error != undefined && data.error != \"\")
                            alert(data.error);
                        modelDropdown.children().remove();
                        modelDropdown.append(jQuery(
                                \"<li><a id='all' href='javascript:void(0)' onclick='javascript:ChangeDropDownValue(this)'>any model</a></li>\"));

                        jQuery.each(data, function () {
                            CreateLinkToDropdown(this, modelDropdown, SelectModelEvent, false);
                        });

                        model.find(\".loading_icon\").addClass('hide');
                        model.find(\".caret\").removeClass('hide');
                        model.removeClass('disable');

                    }, \"json\");
        }
    });

    jQuery(\".model_dropdown li a\").click(function () {
        ChangeDropDownValue(this);
        jQuery(this).parents(\".dropdown\").find(\".dropdown-toggle\").find(\"input\").text(jQuery(this).text());
    });

    jQuery(\"#make_btn\").click(function () {
        if (jQuery(this).hasClass(\"disabled\"))
            return;
    });

    jQuery(\"#model_btn\").click(function () {
        if (jQuery(this).hasClass(\"disabled\"))
            return;
    });

    jQuery('#list').click(function (e) {

            var bValid = true;


            bValid = bValid && checkSelected(jQuery(form).find(\".vehicle_vehiclesinformation_zipcode\"));
            bValid = bValid && checkSelected(jQuery(form).find(\".vehicle_vehiclesinformation_vin\"));
            bValid = bValid && checkSelected(jQuery(form).find(\".vehicle_vehiclesinformation_condition\"));

            bValid = bValid && checkSelected(jQuery(form).find(\".year_value\"));
            bValid = bValid && checkSelected(jQuery(form).find('.make_value'));
            bValid = bValid && checkSelected(jQuery(form).find('.model_value'));

            bValid = bValid && checkSelected(jQuery(form).find('.vehicle_vehiclesinformation_bodystyle'));
            bValid = bValid && checkSelected(jQuery(form).find('.vehicle_vehiclesinformation_mileage'));
            bValid = bValid && checkSelected(jQuery(form).find('.vehicle_vehiclesinformation_price'));

            if (bValid || (jQuery(form).find(\".year_value\").val() == 'all' && jQuery(form).find(\".make_value\").val() == 'all' && jQuery(form).find(\".model_value\").val() == 'all')) {
                jQuery('#form_sell_header').submit();
            }
        });

});

function SelectMakeEvent() {


    ChangeDropDownValue(this);

    var model = form.find(\".model_btn\");
    var modelDropdown = form.find(\".model_dropdown\");
    var make = \"\";
    if (form.attr('id') == 'form_sell_header') {
        make = jQuery(this).attr(\"id\");
    } else
        make = jQuery(this).text();
    if (make != \"all\") {

        jQuery(form).find('.make_value').val(make);

        model.find(\".loading_icon\").removeClass('hide');
        model.find(\".caret\").addClass('hide');
        model.addClass('disable');
        jQuery.post('";
        // line 485
        echo $this->env->getExtension('routing')->getPath("find_models_by_make_front");
        echo "',
                {
                    make_id: make
                },
                function (data) {
                    if (data.error != undefined && data.error != \"\")
                        alert(data.error);
                    modelDropdown.children().remove();
                    modelDropdown.append(jQuery(
                            \"<li><a id='all' href='javascript:void(0)' onclick='javascript:ChangeDropDownValue(this)'>any model</a></li>\"));

                    jQuery.each(data, function () {
                        CreateLinkToDropdown(this, modelDropdown, SelectModelEvent, true);
                    });

                    model.find(\".loading_icon\").addClass('hide');
                    model.find(\".caret\").removeClass('hide');
                    model.removeClass('disable');

                }, \"json\");
    }
}

function CreateLinkToDropdown(element, dropdown, clickFunction, haveId) {
    var tag_a = document.createElement('a');
    if (haveId && element.value != null)
        tag_a.id = element.value;
    tag_a.text = element.text;
    var li = document.createElement('li');
    jQuery(tag_a).appendTo(li);
    dropdown.append(li);
    jQuery(tag_a).bind(\"click\", clickFunction);
}

function SelectModelEvent() {
    var model = jQuery(this).attr('id');
    if (model && model != \"\") {
        if (form.attr('id') == 'form_sell_header') {
            jQuery(form).find('.model_value').val(model);
        }
    }
    else
        jQuery(form).find('.model_value').val(jQuery(this).text());
    //jQuery(this).parents(\".dropdown\").find(\".dropdown-toggle\").find(\"input\").val(jQuery(this).text());

    ChangeDropDownValue(this);

}

function ChangeDropDownValue(element) {
    jQuery(element).parents(\".dropdown\").find(\".dropdown-toggle\").find(\"small\").text(jQuery(element).text());
}

function checkSelected(o) {
    if (o.val() == 0 || o.val() == \"all\") {
        return false;
    } else {
        return true;
    }
}

</script>";
    }

    public function getTemplateName()
    {
        return "CommonBundle:Default:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  646 => 485,  562 => 404,  540 => 384,  531 => 381,  528 => 380,  524 => 379,  500 => 358,  424 => 285,  414 => 278,  401 => 268,  396 => 266,  337 => 209,  326 => 207,  322 => 206,  301 => 188,  292 => 182,  280 => 173,  274 => 170,  268 => 167,  252 => 160,  246 => 157,  205 => 118,  194 => 115,  190 => 114,  171 => 97,  160 => 95,  156 => 94,  136 => 77,  125 => 69,  120 => 67,  110 => 60,  101 => 53,  85 => 40,  79 => 37,  70 => 30,  58 => 21,  53 => 18,  47 => 16,  41 => 14,  39 => 13,  24 => 3,  22 => 2,  19 => 1,  282 => 130,  277 => 129,  272 => 128,  267 => 9,  262 => 164,  256 => 161,  251 => 6,  241 => 139,  237 => 138,  233 => 137,  228 => 135,  224 => 134,  220 => 133,  216 => 131,  214 => 130,  212 => 129,  210 => 128,  162 => 83,  154 => 78,  129 => 55,  123 => 51,  117 => 47,  111 => 43,  94 => 28,  88 => 25,  84 => 24,  80 => 23,  72 => 21,  68 => 20,  64 => 19,  60 => 18,  56 => 17,  40 => 8,  35 => 7,  33 => 6,  26 => 1,  96 => 20,  93 => 19,  86 => 17,  83 => 16,  76 => 22,  73 => 12,  65 => 11,  59 => 9,  54 => 8,  51 => 7,  45 => 10,  42 => 9,  34 => 11,);
    }
}
