<?php

/* AppBundle:FAL:search-results-content-popovers.html.twig */
class __TwigTemplate_382e5fb93b725e2f2c9009aa3744d6374475fb447e178cca1fffea9525017a7e extends Twig_Template
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
        echo "<div id=\"makepopover_content\" class=\"col-md-12 col-xs-12\" style=\"margin-top:5px;font-size: 12px;display: none\">
    <div class=\"form-group\">
        <div class=\"form-inline\">
            <div class=\"list-group\" id=\"make_filter_extended\">
                ";
        // line 5
        $context["totalOptions"] = intval(floor(((-twig_length_filter($this->env, (isset($context["obj_make"]) ? $context["obj_make"] : null))) / 4)));
        // line 6
        echo "                ";
        $context["aux"] = 0;
        // line 7
        echo "
                <div class=\"col-md-12\">
                    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["obj_make"]) ? $context["obj_make"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["make"]) {
            // line 10
            echo "                        <div class=\"col-sm-3 make_filter_extended\" style=\"padding-left: 7px;padding-right: 7px\">
                            <div class=\"list-item\" onclick=\"javascript:MakeListItemCLick(this)\">
                                <span class=\"glyphicon glyphicon-ok\"></span>
                                <a href=\"#item\" id=\"";
            // line 13
            echo "\" class=\"\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["make"]) ? $context["make"] : null), "makeId"), "html", null, true);
            echo "</a>
                            </div>
                        </div>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['make'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
                </div>

            </div>
            <div class=\"col-md-12\">
                <hr style=\"border: 2px solid darkgrey;width: 100%;margin-top: 0px\"/>
                <a href=\"javascript:ShowResult_Makes_Extended_List()\" class=\"btn btn-default\" data-placement=\"right\">Show
                    Results</a>
                <a href=\"javascript:ClearSelecions_Make()\" class=\"btn btn-default\" data-placement=\"right\">Clear
                    Selections</a>
            </div>
        </div>
    </div>
</div>

<div id=\"bodystylepopover_content\" class=\"col-md-12 col-xs-12\" style=\"margin-top:5px;font-size: 12px;display: none\">
    <div class=\"form-group\">
        <div class=\"form-inline\">
            ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["bodystyles"]) ? $context["bodystyles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["bodystyle"]) {
            // line 37
            echo "                <div class=\"col-md-3\" style=\"margin-bottom: 20px\">
                    <div class=\"thumbnail bdstyle_img\" onclick=\"javascript:SelectBodyStyle(this)\"
                         bdstyle_id=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bodystyle"]) ? $context["bodystyle"] : null), "id"), "html", null, true);
            echo "\" bdstyle=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bodystyle"]) ? $context["bodystyle"] : null), "name"), "html", null, true);
            echo "\">
                        <img class=\"img-responsive\"
                             src=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("bundles/common/images/bodystyle/" . $this->getAttribute((isset($context["bodystyle"]) ? $context["bodystyle"] : null), "id")) . ".jpg")), "html", null, true);
            echo "\"/>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bodystyle'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "        </div>
        <div class=\"col-md-12\">
            <hr style=\"border: 2px solid darkgrey;width: 100%;margin-top: 0px\"/>
            <a href=\"javascript:ShowResult_BodyStyle_Extended_List()\" class=\"btn btn-default\" data-placement=\"right\">Show
                Results</a>
            <a href=\"javascript:ClearSelecions_BodyStyle()\" class=\"btn btn-default\" data-placement=\"right\">Clear
                Selections</a>
        </div>
    </div>
</div>

<div id=\"registerlogpopover_content\" class=\"col-md-12 col-xs-12\" style=\"margin-top:5px;font-size: 12px;display: none\">
    <div class=\"form-group\">
        <a href=\"";
        // line 58
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" class=\"btn btn-primary btn-block text-uppercase\">Sign up
            to save your favorites</a>
    </div>
    <div class=\"form-group\">
        <p class=\"text-center\">
            By signing up, I agree to FreeAutoListing's <a
                    href=\"";
        // line 64
        echo $this->env->getExtension('routing')->getPath("terms");
        echo "\">Terms and Conditions</a> and <a
                    href=\"";
        // line 65
        echo $this->env->getExtension('routing')->getPath("privacy_policy");
        echo "\">Privacy Policy</a>
        </p>
    </div>
    <div class=\"form-group\">
        <div class=\"col-md-12 no_padding\" style=\"height: 19px\">
            <hr style=\"width: 100%;margin-bottom: 0px;\"/>
            <span class=\"hr_text\">or</span>
        </div>
    </div>
    <div class=\"form-group\" style=\"margin-bottom: 0px\">
        <p class=\"text-center\" style=\"padding-top: 30px;\">
            Have an account already?
            <a id=\"login\" href=\"";
        // line 77
        echo $this->env->getExtension('routing')->getPath("owner_login");
        echo "\" style=\"text-decoration: none;\"> Log In</a>
        </p>
    </div>

</div>

<div class=\"modal fade\" id=\"confirm_added\" tabindex=\"-1\" role=\"dialog\"
     aria-labelledby=\"myConfirmAdded\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <div id=\"loading_div\" class=\"col-md-3 pull-left form-inline text-left\" style=\"margin: 15px 10px 0 0;\">
                    <span>Saving...</span>
                    <img id=\"vehicle_vehiclesinformation_make_loading\"
                         src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/loading.gif"), "html", null, true);
        echo "\" alt=\"\"/>
                </div>

                <a href=\"javascript:void(0)\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\" style=\"padding: 15px 15px 0 \">
                    <span aria-hidden=\"true\">Close&nbsp;x</span></a>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\">
                    <div class=\"col-md-12 modal-body-info\">
                        <p>
                            &nbsp;Your car has been saved. You can add notes.
                        </p

                    </div>
                    <div class=\"col-md-12 modal-body-car-info no_padding\" style=\"margin-top: 15px;\">
                        <div class=\"thumbnail col-md-2 no_padding\">
                            <img id=\"car_image\" src=\"bundles/common/images/image-bg.jpg\" alt=\"\"/>
                        </div>
                        <div class=\"col-md-10\" style=\"padding: 15px 0px 15px 15px;\">

                            <p id=\"car_details\">
                            </p>
                        </div>
                    </div>
                    <div class=\"col-md-12 modal-body-notes no_padding\">
                        <textarea id=\"savecar_notes\" name=\"\" id=\"\" cols=\"30\" rows=\"3\" style=\"padding: 5px\"
                                  placeholder=\"Notes (Optional)\"></textarea>
                    </div>
                    <div class=\"col-md-12 no_padding\" style=\"margin-top: 15px\">
                        <button id=\"btnupdate\" class=\"btn btn-primary disabled text-uppercase\">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    jQuery(\"#login\").click(function (e) {
        e.preventDefault();
        alert(\"aaa\");
    });
    (function () {

        var settings = {
            trigger: 'click',
            title: 'Pop Title',
            content: '<p>This is webui popover demo.</p><p>just enjoy it and have fun !</p>',
            width: 300,
            multi: true,
            closeable: false,
            style: '',
            delay: 300,
            padding: true
        };

        function initPopover() {

            var largeContent = jQuery('#makepopover_content').html(),
                    largeSettings = {
                        content: largeContent,
                        width: 670,
                        height: 595,
                        title: 'Make',
                        delay: {show: 300, hide: 1000},
                        closeable: true
                    };
            var popLarge = jQuery('a.show-pop-large').webuiPopover('destroy').webuiPopover(jQuery.extend({}, settings, largeSettings));

            var largeContent = jQuery('#bodystylepopover_content').html(),
                    largeSettings = {
                        content: largeContent,
                        width: 660,
                        height: 365,
                        title: 'Body Style',
                        delay: {show: 300, hide: 1000},
                        closeable: true
                    };
            var popLarge = jQuery('a.show-pop-large_bodystyle').webuiPopover('destroy').webuiPopover(jQuery.extend({}, settings, largeSettings));

            //registerlogpopover_content show-pop-large_logregister
            var register = jQuery('#registerlogpopover_content').html(),
                    registerSettings = {
                        content: register,
                        width: 400,
                        height: 181,
                        title: ' ',
                        delay: {show: 300, hide: 1000},
                        closeable: false
                    };

            jQuery('label.show-pop-large_logregister').webuiPopover('destroy').webuiPopover(jQuery.extend({}, settings, registerSettings));
            /*jQuery('label.show-pop-large_logregister').on(\"click\",function(){
             jQuery(this).webuiPopover('destroy').webuiPopover(jQuery.extend({}, settings, registerSettings));
             });*/


            jQuery('body').on('click', '.pop-click', function (e) {
                e.preventDefault();
                console.log('clicked');
            });

        }

        initPopover();
    })();

    function SetCarSerieInSession(elem) {
        cartosaveinsession = jQuery(elem).attr(\"car-serie\");
        jQuery.post(\"";
        // line 201
        echo $this->env->getExtension('routing')->getPath("savecarinsession");
        echo "\", {serie: cartosaveinsession});
    }
</script>";
    }

    public function getTemplateName()
    {
        return "AppBundle:FAL:search-results-content-popovers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  273 => 201,  160 => 91,  143 => 77,  128 => 65,  124 => 64,  90 => 41,  75 => 36,  25 => 5,  114 => 39,  108 => 36,  91 => 29,  79 => 37,  73 => 23,  52 => 16,  43 => 13,  29 => 6,  692 => 311,  688 => 309,  681 => 304,  667 => 295,  662 => 293,  658 => 291,  652 => 288,  646 => 286,  644 => 285,  639 => 282,  633 => 279,  630 => 278,  624 => 275,  621 => 274,  619 => 273,  607 => 264,  595 => 257,  591 => 255,  584 => 252,  582 => 251,  578 => 250,  569 => 244,  565 => 243,  561 => 242,  557 => 241,  548 => 235,  535 => 231,  531 => 230,  525 => 227,  520 => 224,  513 => 220,  509 => 218,  506 => 217,  502 => 215,  496 => 214,  491 => 212,  481 => 210,  479 => 209,  466 => 198,  463 => 197,  460 => 196,  454 => 195,  451 => 194,  448 => 193,  445 => 192,  440 => 191,  437 => 190,  434 => 189,  431 => 188,  428 => 187,  425 => 186,  422 => 185,  419 => 184,  416 => 183,  413 => 182,  410 => 181,  407 => 180,  404 => 179,  398 => 177,  395 => 176,  392 => 175,  389 => 174,  386 => 173,  382 => 172,  379 => 171,  377 => 170,  329 => 129,  320 => 125,  314 => 122,  308 => 120,  306 => 119,  301 => 116,  295 => 113,  292 => 112,  286 => 109,  283 => 108,  281 => 107,  269 => 98,  262 => 94,  257 => 91,  253 => 89,  247 => 87,  245 => 86,  232 => 79,  228 => 78,  224 => 77,  220 => 76,  215 => 74,  207 => 69,  194 => 65,  188 => 64,  177 => 58,  170 => 54,  166 => 52,  163 => 51,  159 => 49,  153 => 48,  141 => 45,  138 => 44,  136 => 43,  126 => 36,  121 => 33,  115 => 58,  109 => 30,  106 => 29,  103 => 34,  100 => 45,  95 => 26,  92 => 25,  89 => 28,  86 => 27,  83 => 39,  80 => 21,  77 => 20,  71 => 18,  68 => 17,  65 => 20,  62 => 19,  59 => 18,  56 => 13,  53 => 12,  47 => 10,  44 => 9,  36 => 7,  33 => 6,  27 => 6,  24 => 4,  22 => 3,  1234 => 979,  1071 => 819,  1043 => 794,  810 => 564,  651 => 408,  632 => 392,  610 => 373,  600 => 260,  581 => 349,  570 => 346,  566 => 344,  562 => 343,  543 => 326,  532 => 323,  528 => 321,  524 => 320,  505 => 303,  501 => 301,  498 => 300,  495 => 299,  492 => 298,  489 => 297,  484 => 211,  458 => 270,  447 => 267,  443 => 265,  439 => 264,  420 => 247,  409 => 244,  405 => 242,  401 => 178,  383 => 225,  372 => 222,  368 => 220,  364 => 219,  343 => 138,  332 => 197,  328 => 195,  324 => 127,  289 => 161,  279 => 158,  275 => 156,  271 => 155,  252 => 138,  241 => 85,  237 => 133,  233 => 132,  210 => 111,  202 => 109,  199 => 108,  195 => 107,  182 => 61,  174 => 94,  171 => 93,  167 => 92,  148 => 46,  140 => 73,  135 => 72,  131 => 71,  118 => 32,  110 => 58,  105 => 35,  101 => 56,  72 => 29,  55 => 18,  45 => 15,  40 => 13,  37 => 12,  34 => 9,  30 => 7,  19 => 1,  102 => 30,  97 => 29,  94 => 30,  87 => 25,  84 => 24,  78 => 22,  74 => 19,  69 => 20,  66 => 46,  50 => 11,  46 => 13,  41 => 11,  38 => 10,  32 => 7,);
    }
}
