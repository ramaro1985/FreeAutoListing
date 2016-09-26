<?php

/* FOSUserBundle:Registration:register_content.html.twig */
class __TwigTemplate_d6f1c4dbd0125128d84b466c06bd48efb5ba5f2763f84e40e5b55768fc24b5d6 extends Twig_Template
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
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email"), 'errors')) {
            // line 2
            echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center text-danger alert alert-danger\"
                 role=\"alert\">";
            // line 5
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email"), 'errors');
            echo "</div>
        </div>
    </div>
";
        }
        // line 9
        echo "
";
        // line 10
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), 'errors')) {
            // line 11
            echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center text-danger alert alert-danger\"
                 role=\"alert\">";
            // line 14
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), 'errors');
            echo "</div>
        </div>
    </div>
";
        }
        // line 18
        echo "<div class=\"container-fluid\">
    <div class=\"container\">
        <div class=\"row\" style=\"margin-top: 30px\">
            <div class=\"col-md-6 col-md-offset-3 text-center\">
                <div class=\"col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 no_padding\">
                    <a href=\"javascript:void(0);\" style=\"font-size:80%;font-weight: bold;border-radius: 0px\"
                       class=\"btn btn-lg btn-block text-uppercase panel_left_different\">
                        We are 100% free!<span style=\"color: #000000\"> Curious why?</span>
                    </a>

                </div>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-md-6 col-md-offset-3 text-center login-form-container\">
                <form id=\"form-register\" action=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo "
                      method=\"POST\" class=\"form-horizontal\" style=\"margin-top: 20px\">
                    <div class=\"tabbable\">
                        <ul class=\"nav nav-tabs\">
                            <li id=\"shopper_tab\" ";
        // line 38
        if (((isset($context["currenttab"]) ? $context["currenttab"] : null) == 1)) {
            echo " class=\"active\"  ";
        }
        echo "><a aria-expanded=\"false\" href=\"#dealer\"
                                                                   data-toggle=\"tab\">Register</a></li>
                            <li id=\"dealership_tab\" ";
        // line 40
        if (((isset($context["currenttab"]) ? $context["currenttab"] : null) == 2)) {
            echo " class=\"active\"  ";
        }
        echo " ><a aria-expanded=\"false\" href=\"#dealer\" data-toggle=\"tab\">Register
                                    as a
                                    Dealerschip</a></li>
                            <li id=\"private_seller_tab\" ";
        // line 43
        if (((isset($context["currenttab"]) ? $context["currenttab"] : null) == 3)) {
            echo " class=\"active\"  ";
        }
        echo " ><a aria-expanded=\"true\" href=\"#dealer\" data-toggle=\"tab\">Register
                                    as a
                                    Private Seller</a></li>
                        </ul>
                        <div id=\"myTabContent\" class=\"tab-content tab_borders\">
                            <div class=\"tab-pane fade active in\" id=\"dealer\">
                                <fieldset>
                                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderer->renderCsrfToken("registration"), "html", null, true);
        echo "\">

                                    <div class=\"form-group\">

                                        <div class=\"col-sm-12 text-danger\">
                                            ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name"), 'errors');
        echo "
                                            ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastname"), 'errors');
        echo "
                                            ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), 'errors');
        echo "
                                            ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone"), 'errors');
        echo "
                                        </div>
                                    </div>
                                    <div class=\"form-group\" style=\"margin-bottom: 10px\">

                                        <div class=\"col-sm-5 col-md-5 col-md-offset-1 col-sm-offset-1\"
                                             style=\"margin-bottom: 10px\">
                                            ";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name"), 'widget');
        echo "
                                        </div>
                                        <div class=\"col-sm-5 col-md-5\">
                                            ";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "lastname"), 'widget');
        echo "
                                        </div>
                                    </div>


                                    <div class=\"form-group\" style=\"margin-bottom: 10px\">

                                        <div class=\"col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1\">
                                            ";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "email"), 'widget');
        echo "

                                        </div>
                                    </div>

                                    <div class=\"form-group\" style=\"margin-bottom: 10px\">

                                        <div class=\"col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1\"
                                             style=\"margin-bottom: 10px\">
                                            ";
        // line 85
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "plainPassword"), 'widget');
        echo "
                                        </div>
                                        <div class=\"col-sm-1 col-md-1 hidden-xs\"
                                             style=\"margin-top: 20px;padding-left: 0\">
                        <span class=\"glyphicon glyphicon-info-sign\" data-toggle=\"tooltip\" data-placement=\"right\"
                              title=\"Must have at least 6 characters, 1 number, 1 upper case (example: Passw5)\"></span>
                                        </div>

                                    </div>

                                    <div class=\"form-group\">
                                        <div class=\"ol-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1\">
                                            ";
        // line 97
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "phone"), 'widget');
        echo "
                                        </div>
                                    </div>

                                    <div class=\"form-group\" style=\"margin-bottom: 5px; margin-top: 20px\">
                                        <div class=\"col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1 text-left\">
                                            ";
        // line 104
        echo "                                        </div>

                                        <div class=\"col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1 text-left\">
                                            ";
        // line 108
        echo "                                        </div>
                                        <div class=\"col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1 text-left\">
                                            <label style=\"margin-top: 10px; margin-bottom: 10px\">

                            <span style=\"display: inline; font-weight: 400\"> ";
        // line 112
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "t_and_c"), 'widget');
        echo " I accept the <a
                                        href=\"";
        // line 113
        echo $this->env->getExtension('routing')->getPath("terms");
        echo "\">Terms and Conditions</a> and <a
                                        href=\"";
        // line 114
        echo $this->env->getExtension('routing')->getPath("privacy_policy");
        echo "\">Privacy Policy</a></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class=\"form-group\" style=\"margin-bottom: 10px; margin-top: 5px\">
                                        <div class=\"col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1\">
                                            <div class=\"col-sm-3 col-md-3 text-left no_padding\">
                                                <input type=\"hidden\" value=\"0\" id=\"invalid\"/>
                                                <button id=\"btn-submit\" type=\"submit\"
                                                        class=\"btn btn-block panel_left_different\">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type=\"hidden\" name=\"sourcecode\" value=\"1\" id=\"sourcecode\"/>
                                    <input type='hidden' name='formID' value='13231' id=\"formID\"/>
                                    <input type='hidden' name='weburl' value='1' id=\"weburl\"/>
                                    <input type='hidden' name='isDedicatedClient' value='0' id=\"isDedicatedClient\"/>

                                    <div id=\"type_container\">
                                        ";
        // line 135
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "type"), 'widget');
        echo "
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                    </div>

                    ";
        // line 144
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                </form>
            </div>
            <div class=\"col-md-8 col-md-offset-2 col-xs-12 col-sm-12 no_padding\" style=\"margin-top: 15px;\">
                <img src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/commons/shadow.png"), "html", null, true);
        echo "\" alt=\" \" style=\"width: 100%;\"/>
            </div>

        </div>
    </div>
</div>
</div>

<script type=\"text/javascript\">

    jQuery(\"#type_container select\").val(\"3\");

    /* jQuery(\"#shopper_tab\").click(function(){
     jQuery(\"#type_container select\").val(\"3\");
     });

     jQuery(\"#dealership_tab\").click(function(){
     jQuery(\"#type_container select\").val(\"2\");
     });

     jQuery(\"#private_seller_tab\").click(function(){
     jQuery(\"#type_container select\").val(\"1\");
     });*/

    jQuery(document).ready(function () {

        //jQuery(\"#type_container select\").val(\"2\");

        jQuery(\"#shopper_tab\").click(function () {
            jQuery(\"#type_container select\").val(\"3\");
            //'required' => true
            jQuery(\"#fos_user_registration_form_phone\").removeAttr('required');
        });

        jQuery(\"#dealership_tab\").click(function () {
            jQuery(\"#type_container select\").val(\"2\");
            jQuery(\"#fos_user_registration_form_phone\").attr('required', true);
        });

        jQuery(\"#private_seller_tab\").click(function () {
            jQuery(\"#type_container select\").val(\"1\");
            jQuery(\"#fos_user_registration_form_phone\").attr('required', true);
        });

        jQuery(function () {
            jQuery(\".glyphicon-info-sign\").tooltip();
        });


        jQuery('#fos_user_registration_form_plainPassword_second').focusout(function () {
            if (jQuery(this).val() !== '' && jQuery('#fos_user_registration_form_plainPassword_first').val()) {
                if (jQuery(this).val() !== jQuery('#fos_user_registration_form_plainPassword_first').val()) {
                    createPopover(jQuery(this), 'Passwords does not match');
                    jQuery(this).css('box-shadow', '0 0 0 rgba(0, 0, 0, 1) inset, 0 0 8px rgba(255, 0, 0, 1)');
                    jQuery('#invalid').val('1');

                } else {
                    jQuery(this).css('box-shadow', 'none');
                    jQuery(this).popover('destroy');
                    jQuery('#invalid').val('0');
                }
            }
        });


        jQuery('#fos_user_registration_form_plainPassword_second').click(function () {
            jQuery(this).popover('destroy');
        });
        jQuery('#fos_user_registration_form_plainPassword_first, #fos_user_registration_form_name, #fos_user_registration_form_lastname, #fos_user_registration_form_email').click(function () {
            jQuery('#fos_user_registration_form_plainPassword_second').popover('destroy');
        });

        /*jQuery('#btn-submit').click(function (e){
         if(jQuery('#invalid').val() === '1' ){
         jQuery('#fos_user_registration_form_plainPassword_second').focus();
         e.preventDefault();
         }else {
         if (validateForm()){
         if(!validateRecaptcha()){
         e.preventDefault();
         }else{
         jQuery.ajax({
         type: \"POST\",
         url: 'https://app.mobilestorm.com/cp/manageforms/addSubscriber.php',
         data: {
         email: jQuery('#fos_user_registration_form_email').val(),
         formID: jQuery('#formID').val(),
         weburl: jQuery('#weburl').val(),
         isDedicatedClient: jQuery('#isDedicatedClient').val(),
         sourcecode: jQuery('#sourcecode').val()
         },
         async: false,
         success: function (data) {

         }
         });
         }
         }
         }

         });*/


        function validateForm() {
            var bValid = true;
            bValid = bValid && checkLength(jQuery('#fos_user_registration_form_name'), 1, 100);
            bValid = bValid && checkLength(jQuery('#fos_user_registration_form_lastname'), 1, 100);
            bValid = bValid && checkLength(jQuery('#fos_user_registration_form_plainPassword_first'), 6, 100);
            bValid = bValid && checkLength(jQuery('#fos_user_registration_form_plainPassword_second'), 6, 100);
            bValid = bValid && checkLength(jQuery('#fos_user_registration_form_phone'), 10, 10);
            bValid = bValid && checkChecked(jQuery('#fos_user_registration_form_t_and_c'));

            return bValid;
        }


        function checkLength(o, min, max) {
            if (o.val().length < min || o.val().length > max) {
                //createPopover(o, 'Please fill out this field');
                return false;
            } else {
                return true;
            }
        }


        function checkChecked(o) {
            if (!o.prop('checked')) {
                //createPopover(o, 'Please fill out this field');
                return false;
            } else {
                return true;
            }
        }

        jQuery('#fos_user_registration_form_t_and_c').prop('checked')

        function validateRecaptcha() {

            var data_2;
            jQuery.ajax({
                type: \"POST\",
                url: '";
        // line 290
        echo $this->env->getExtension('routing')->getPath("validate_captcha");
        echo "',
                data: jQuery('#form-register').serialize(),
                async: false,
                success: function (data) {
                    var response = JSON.parse(data);
                    if (response.nocaptcha === \"true\") {
                        data_2 = 1;
                    } else if (response.spam === \"true\") {
                        data_2 = 1;
                    }
                    else {
                        data_2 = 0;
                    }

                }


            });

            if (data_2 != 0) {
                //e.preventDefault();
                if (data_2 == 1) {
                    alert(\"Please check the captcha\");
                    return false;
                } else {
                    alert(\"Please Don't spam\");
                    return false;
                }
            } else {
                return true;
            }

        }


        function createPopover(elem, text) {
            elem.attr('data-toggle', 'popover');
            elem.attr('data-placement', 'right');
            elem.attr('data-content', text);
            elem.attr('data-container', 'body');
            elem.popover();
            elem.trigger('click');

        }

    });

</script>";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  394 => 290,  249 => 148,  242 => 144,  230 => 135,  206 => 114,  202 => 113,  198 => 112,  192 => 108,  187 => 104,  178 => 97,  163 => 85,  151 => 76,  140 => 68,  134 => 65,  124 => 58,  120 => 57,  116 => 56,  112 => 55,  92 => 43,  84 => 40,  77 => 38,  68 => 34,  50 => 18,  43 => 14,  38 => 11,  36 => 10,  26 => 5,  21 => 2,  19 => 1,  162 => 38,  157 => 37,  152 => 36,  145 => 26,  141 => 25,  137 => 24,  133 => 23,  129 => 22,  125 => 21,  121 => 20,  117 => 19,  113 => 18,  109 => 17,  104 => 50,  101 => 15,  94 => 12,  90 => 11,  86 => 10,  81 => 9,  73 => 6,  62 => 39,  59 => 38,  56 => 37,  45 => 30,  42 => 29,  39 => 15,  37 => 8,  32 => 6,  25 => 1,  91 => 25,  88 => 24,  85 => 23,  78 => 8,  75 => 19,  67 => 18,  54 => 36,  49 => 8,  46 => 7,  40 => 5,  33 => 9,);
    }
}
