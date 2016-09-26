<?php

/* AdminBundle:Default:user-content.html.twig */
class __TwigTemplate_5058e789990e87f2bbd4d68336354beea69446c3a91c0b10a42f745647f639bd extends Twig_Template
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
        echo "<div id=\"container\" class=\"container-fluid properties-container no_padding\">


    <div class=\"col-xs-12 col-sm-12 col-md-8 no_padding borderBoxShadows\" style=\"border:0px;background-color:white;margin-top: 14px;\">
        <div class=\"col-xs-12 col-sm-12 col-md-12\">
            <h5 class=\"bold_text\" style=\"color: #000000\">What's New?</h5>
        </div>
        <div>
            <hr style=\"border-top: 1px solid #CCCCCC\"/>
        </div>

        <div class=\"col-xs-12 col-sm-12 col-md-12 no_padding\">
            <div class=\"col-xs-9 col-sm-9 col-md-9\">
                <a href=\"#\" class=\"link_style\">New tool added to the web site</a>

                <p class=\"\">Texto de contenido del primer ítem</p>
            </div>
            <div class=\"col-xs-3 text-right\">
                <span class=\"date\"> Aug 11, 2015</span>
            </div>
        </div>
        <div class=\"col-xs-12 col-sm-12 col-md-12 no_padding\">
            <div class=\"col-xs-9\">
                <a href=\"#\" class=\"link_style\">New tool added to the web site</a>

                <p class=\"\">Texto de contenido del primer ítem</p>
            </div>
            <div class=\"col-xs-3 text-right\">
                <span class=\"date\"> Aug 11, 2015</span>
            </div>
        </div>
        <div class=\"col-xs-12 no_padding\">
            <div class=\"col-xs-9\">
                <a href=\"#\" class=\"link_style\">New tool added to the web site</a>

                <p class=\"\">Texto de contenido del primer ítem</p>
            </div>
            <div class=\"col-xs-3 text-right\">
                <span class=\"date\"> Aug 11, 2015</span>
            </div>
        </div>
        <hr/>
        <div class=\"col-xs-12 text-right\" style=\"padding-bottom: 10px\">
            <a href=\"#\" class=\"link_style\">View older news</a>
        </div>
    </div>

<div class=\"col-xs-12 col-md-4 pull-right no_padding borderBoxShadows\" style=\"background-color: #ffffff;margin-top: 14px;\">
    <div class=\"col-xs-12\">
        <h5 class=\"bold_text\" style=\"color: #000000\">Account Sumary</h5>
    </div>
    <hr/>
    <div class=\"col-xs-12\">

        <div class=\"col-xs-12 no_padding summaryfields\">
            <div class=\"col-xs-4 no_padding \">
                <span class=\"pull-left\">Status</span>
            </div>
            <div class=\"col-xs-8 text-left\">
                ";
        // line 60
        if (($this->getAttribute((isset($context["sumary"]) ? $context["sumary"] : null), "active") != 0)) {
            // line 61
            echo "                    <span id=\"status\" style=\"color: #15790f;padding-right: 5px\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sumary"]) ? $context["sumary"] : null), "active"), "html", null, true);
            echo " active</span>
                ";
        }
        // line 63
        echo "                ";
        if (($this->getAttribute((isset($context["sumary"]) ? $context["sumary"] : null), "inactive") != 0)) {
            // line 64
            echo "                    <span id=\"status\" style=\"color: #791212\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sumary"]) ? $context["sumary"] : null), "inactive"), "html", null, true);
            echo " inactive</span>
                ";
        }
        // line 66
        echo "            </div>
        </div>

        <div class=\"col-xs-12 no_padding summaryfields\">
            <div class=\"col-xs-4 no_padding\">
                <span class=\"pull-left\">Visits</span>
            </div>
            <div class=\"col-xs-8 text-left\">
                <span id=\"visits\" class=\"bold_text\" style=\"color: #000000\">";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sumary"]) ? $context["sumary"] : null), "visits"), "html", null, true);
        echo "</span>
            </div>
        </div>
        <div class=\"col-xs-12 no_padding summaryfields\">
            <div class=\"col-xs-4 no_padding\">
                <span class=\"pull-left\">Updates</span>
            </div>
            <div class=\"col-xs-8 text-left\">
                <span id=\"updated\">";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sumary"]) ? $context["sumary"] : null), "update"), "html", null, true);
        echo "</span>
            </div>
        </div>
        <div class=\"col-xs-12 no_padding summaryfields\" style=\"padding-bottom: 27px\">
            <div class=\"col-xs-4 no_padding\">
                <span class=\"pull-left\">Created</span>
            </div>
            <div class=\"col-xs-8 text-left\">
                <span id=\"created\">";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sumary"]) ? $context["sumary"] : null), "created"), "html", null, true);
        echo "</span>
            </div>
        </div>

    </div>
</div>


<script type=\"text/javascript\">
    jQuery(document).ready(function () {


        jQuery(function () {
            jQuery('[data-toggle=\"tooltip\"]').tooltip();
        });

        jQuery('.basic').jRating({
            isDisabled: true,
            nbRates: 0,
            sendRequest: false,
            rateMax: 5,
            bigStarsPath: '../bundles/common/css/icons/stars.png', // path of the icon stars.png
            smallStarsPath: '../bundles/common/css/icons/small.png', // path of the icon small.png

        });

        jQuery('.basictemp').each(function () {
            jQuery(this).attr(\"data-average\", jQuery(this).parent().find('.valoration').val()).attr(\"data-id\", 1);

        });
        //jQuery('.basictemp').attr(\"data-average\",1).attr(\"data-id\",1);

        jQuery('.basic').remove();
        jQuery('.basictemp').jRating({
            isDisabled: true,
            nbRates: 0,
            sendRequest: false,
            rateMax: 5,
            showRateInfo: true,
            bigStarsPath: '../bundles/common/css/icons/stars.png', // path of the icon stars.png
            smallStarsPath: '../bundles/common/css/icons/small.png', // path of the icon small.png


        });


        function createPopover(elem, text) {
            elem.attr('data-toggle', 'popover');
            elem.attr('data-placement', 'right');
            elem.attr('data-content', text);
            elem.attr('data-container', 'body');
            elem.popover();
            elem.trigger('click');
            elem.focus();
        }

        jQuery('.deactivate-form').find('input , select').each(function () {
            jQuery(this).focusout(function () {
                jQuery(this).popover('destroy');
            });
        });


        function checkLength(o, min, max) {
            if (o.val().length < min) {
                createPopover(o, 'Please fill out this field');

                return false;
            } else {
                return true;
            }
        }


        function checkRegexp(o, regexp) {
            if (!( regexp.test(o.val()) )) {
                createPopover(o, 'Invalid field');
                return false;
            } else {
                return true;
            }
        }


        function checkSelected(o) {
            if (o.val() == \"\") {
                createPopover(o, 'Please fill out this field');
                return false;
            } else {
                return true;
            }
        }

        function checkDate(o, u) {
            if (u.val() < o.val()) {
                createPopover(u, 'Invalid Date');
                return false;

            } else {
                return true;
            }
        }

        function validateForm(serie) {
            var bValid = true;
            bValid = bValid && checkLength(jQuery('#deactivationRequest_text'), 2, 400);

            if (bValid) {
                disableForm();
                submitForm(serie);
            }

        }


        function disableForm() {
            jQuery('.ui-dialog').find('#deactivationRequest_text').attr('disabled', 'disabled')
            jQuery(\"#loading\").show();
            jQuery(\".deactivate-form\").css(\"opacity\", 0.37);
            jQuery(\".ui-dialog\").find(\".ui-dialog-buttonset\").css(\"opacity\", 0.37);
        }

        function resetForm() {
            jQuery('.ui-dialog').find('#deactivationRequest_text').val('');
        }

        function enableForm() {
            jQuery('.ui-dialog').find('#deactivationRequest_text').removeAttr('disabled');
            jQuery(\".deactivate-form\").css(\"opacity\", 1);
            jQuery(\".ui-dialog\").find(\".ui-dialog-buttonset\").css(\"opacity\", 1);
            jQuery(\"#loading\").hide();
        }


        function submitForm(serie) {
            jQuery.ajax({
                url: '";
        // line 226
        echo $this->env->getExtension('routing')->getPath("create_user_request");
        echo "',
                type: \"POST\",
                data: {id: serie, text: jQuery('#deactivationRequest_text').val()},
                async: false,
                success: function (response) {
                    jQuery('#dialog-form').dialog(\"close\");
                    resetForm();
                    enableForm();
                    showForm1();
                }
            });

        }


    });

</script>";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:user-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 226,  118 => 82,  107 => 74,  88 => 63,  82 => 61,  622 => 295,  568 => 238,  536 => 208,  533 => 207,  518 => 205,  515 => 204,  495 => 197,  492 => 196,  486 => 194,  483 => 193,  477 => 191,  474 => 190,  469 => 188,  466 => 187,  464 => 186,  457 => 185,  452 => 183,  444 => 179,  440 => 177,  436 => 175,  433 => 174,  429 => 172,  427 => 171,  422 => 169,  418 => 168,  414 => 167,  408 => 163,  403 => 161,  397 => 159,  395 => 158,  385 => 157,  380 => 154,  372 => 149,  369 => 148,  366 => 147,  358 => 142,  355 => 141,  352 => 140,  350 => 139,  338 => 130,  334 => 129,  328 => 128,  311 => 122,  299 => 120,  295 => 119,  291 => 118,  279 => 117,  259 => 115,  229 => 113,  215 => 108,  212 => 107,  188 => 105,  168 => 103,  165 => 102,  162 => 101,  159 => 100,  150 => 97,  147 => 96,  135 => 92,  132 => 91,  129 => 90,  126 => 89,  123 => 88,  112 => 84,  89 => 65,  87 => 64,  80 => 60,  114 => 85,  111 => 37,  98 => 72,  93 => 33,  56 => 15,  53 => 14,  39 => 10,  37 => 9,  30 => 7,  26 => 6,  305 => 121,  298 => 201,  288 => 194,  271 => 116,  260 => 172,  250 => 165,  233 => 114,  223 => 144,  213 => 137,  202 => 129,  146 => 82,  138 => 93,  120 => 87,  97 => 66,  92 => 46,  67 => 32,  61 => 29,  28 => 8,  29 => 9,  185 => 104,  178 => 101,  170 => 104,  156 => 99,  154 => 90,  144 => 95,  134 => 76,  130 => 75,  110 => 57,  101 => 35,  90 => 47,  83 => 43,  70 => 36,  65 => 33,  63 => 32,  19 => 1,  251 => 96,  246 => 95,  243 => 94,  238 => 87,  232 => 80,  226 => 75,  201 => 30,  195 => 106,  191 => 26,  187 => 117,  183 => 24,  179 => 23,  175 => 22,  171 => 21,  166 => 20,  163 => 94,  157 => 17,  153 => 98,  149 => 15,  145 => 14,  141 => 94,  136 => 11,  131 => 10,  128 => 9,  122 => 7,  117 => 86,  106 => 98,  104 => 52,  96 => 88,  94 => 87,  86 => 81,  84 => 80,  78 => 26,  76 => 75,  50 => 52,  47 => 12,  42 => 9,  36 => 7,  34 => 6,  27 => 7,  99 => 23,  91 => 64,  85 => 41,  79 => 15,  77 => 40,  72 => 22,  69 => 33,  62 => 17,  55 => 26,  49 => 6,  44 => 19,  41 => 18,  33 => 8,);
    }
}
