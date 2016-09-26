<?php

/* CommonBundle:Default:support_ticket.html.twig */
class __TwigTemplate_bc3c7ea0a008b444ddc567128922c92f217fe086da473d1247f6b12ca5157a9a extends Twig_Template
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
        echo "<div class=\"fc-form fc-collapsed hidden-xs\" id=\"fc_chat_layout\" style=\"bottom: 0px;\">
    <div id=\"fc_chat_header\">
        <span id=\"fc_chat_title\">We would love to hear from you</span>
        <span class=\"lc-minimize hide pull-right\">−</span>
    </div>
    <div id=\"fc_chat_container hide\" style=\"background-color: #ffffff;\">
        <div class=\"thank-u hide\" style=\"padding: 25px 5px 25px 5px; color:#555555\">
            
        </div>
        <div class=\"fc_pre-form hide\" style=\"padding: 5px 5px 15px 5px\">
            <p style=\"padding-bottom: 8px\">Help us make HomeEscape better. Good or bad, we can't wait to hear your feedback.</p>
            <ul class=\"formfield_wrap\" style=\"padding: 0\">
                <form id=\"quickSupport\" action=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("contact_owner_support");
        echo "\">
                <li class=\"txtfield_wrap\">
                    <textarea  class=\"form-control\"  id=\"message\" placeholder=\"Message *\" style=\"height: 85px;\"></textarea>
                </li>
                <li class=\"error hide\">
                    
                </li>
          
                    <a  id=\"sendTicket\" class=\"btn btn-default\">Submit </a>
              </form>
            </ul>
            
        </div>
        
    </div>
</div>





<script type=\"text/javascript\">
    jQuery(document).ready(function () {
        jQuery('#fc_chat_title').click(function(){
            jQuery('.fc_pre-form , #fc_chat_container, .lc-minimize').removeClass('hide');
             jQuery('.thank-u').html('');
            jQuery('.thank-u').addClass('hide');
            jQuery('.thank-u').fadeIn();
           
        });
        
        jQuery('.lc-minimize').click(function(){
        jQuery('.fc_pre-form, .lc-minimize').addClass('hide');
           
        });
        
        
        
        function disableFormContactReservation() {
            jQuery('#quickSupport').find('textarea').attr('disabled', 'disabled')
            jQuery(\"#quickSupport\").css(\"opacity\", 0.37);
        }



        function enableFormContactReservation() {
            jQuery('#quickSupport').find('textarea').val('');
            jQuery('#quickSupport').find('textarea').removeAttr('disabled');
            jQuery(\"#quickSupport\").css(\"opacity\", 1);
            jQuery('.fc_pre-form, .lc-minimize').addClass('hide');
            jQuery('.thank-u').html('<b>We appreciate your feedback. Standby, Support will get back to you shortly.</b>');
            jQuery('.thank-u').removeClass('hide');
            jQuery('.thank-u').delay(3000).fadeOut();
           
        }

        function submitFormContactReservation() {

            jQuery.ajax({
                statusCode: {
                    500: function () {
                        //enableFormConfirmReservation();
                         jQuery('#quickSupport #error').removeClass('hide');
                        jQuery('#quickSupport #error').html(\"<span class='glyphicon glyphicon-warning-sign' style='margin-right:15px;color:#d9534f'></span><span class='text-danger'>There was an error, try again</span>\");
                    }
                },
                url: jQuery('#quickSupport').attr('action'),
                type: \"POST\",
                data: {mensaje: jQuery('#message').val()},
                async: false,
                success: function (response) {
                    enableFormContactReservation();
                   
                }
            });
        }


        jQuery('#quickSupport #sendTicket').click(function (e) {
           
            validateFormContact();

        });

 


        function validateFormContact() {
            var bValid = true;
            bValid = bValid && checkLength(jQuery('#quickSupport #message'), 1, 500);
            if (bValid) {
                disableFormContactReservation();
                submitFormContactReservation();
            }

        }
        
        jQuery('#quickSupport #message').keydown(function (){
        jQuery(this).css('box-shadow','0 0 0 rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(80, 175, 255, 1)');    
        });
        
          function checkLength(o, min, max) {
            if (o.val().length < min) {
            createPopover(o);
                    return false;
            } else {
            return true;
            }
            }
            
                function createPopover(elem){
                elem.attr('data-toggle', 'popover');
             elem.css('box-shadow','0 0 0 rgba(0, 0, 0, 1) inset, 0 0 8px rgba(255, 0, 0, 1)');
                    elem.focus();
            }

    });




</script>";
    }

    public function getTemplateName()
    {
        return "CommonBundle:Default:support_ticket.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 226,  118 => 82,  107 => 74,  88 => 63,  82 => 61,  622 => 295,  568 => 238,  536 => 208,  533 => 207,  518 => 205,  515 => 204,  495 => 197,  492 => 196,  486 => 194,  483 => 193,  477 => 191,  474 => 190,  469 => 188,  466 => 187,  464 => 186,  457 => 185,  452 => 183,  444 => 179,  440 => 177,  436 => 175,  433 => 174,  429 => 172,  427 => 171,  422 => 169,  418 => 168,  414 => 167,  408 => 163,  403 => 161,  397 => 159,  395 => 158,  385 => 157,  380 => 154,  372 => 149,  369 => 148,  366 => 147,  358 => 142,  355 => 141,  352 => 140,  350 => 139,  338 => 130,  334 => 129,  328 => 128,  311 => 122,  299 => 120,  295 => 119,  291 => 118,  279 => 117,  259 => 115,  229 => 113,  215 => 108,  212 => 107,  188 => 105,  168 => 103,  165 => 102,  162 => 101,  159 => 100,  150 => 97,  147 => 96,  135 => 92,  132 => 91,  129 => 90,  126 => 89,  123 => 88,  112 => 84,  89 => 65,  87 => 64,  80 => 60,  114 => 85,  111 => 37,  98 => 72,  93 => 33,  56 => 15,  53 => 14,  39 => 10,  37 => 9,  30 => 7,  26 => 6,  305 => 121,  298 => 201,  288 => 194,  271 => 116,  260 => 172,  250 => 165,  233 => 114,  223 => 144,  213 => 137,  202 => 129,  146 => 82,  138 => 93,  120 => 87,  97 => 66,  92 => 46,  67 => 32,  61 => 29,  28 => 8,  29 => 9,  185 => 104,  178 => 101,  170 => 104,  156 => 99,  154 => 90,  144 => 95,  134 => 76,  130 => 75,  110 => 57,  101 => 35,  90 => 47,  83 => 43,  70 => 36,  65 => 33,  63 => 32,  19 => 1,  251 => 96,  246 => 95,  243 => 94,  238 => 87,  232 => 80,  226 => 75,  201 => 30,  195 => 106,  191 => 26,  187 => 117,  183 => 24,  179 => 23,  175 => 22,  171 => 21,  166 => 20,  163 => 94,  157 => 17,  153 => 98,  149 => 15,  145 => 14,  141 => 94,  136 => 11,  131 => 10,  128 => 9,  122 => 7,  117 => 86,  106 => 98,  104 => 52,  96 => 88,  94 => 87,  86 => 81,  84 => 80,  78 => 26,  76 => 75,  50 => 52,  47 => 12,  42 => 9,  36 => 7,  34 => 6,  27 => 7,  99 => 23,  91 => 64,  85 => 41,  79 => 15,  77 => 40,  72 => 22,  69 => 33,  62 => 17,  55 => 26,  49 => 6,  44 => 19,  41 => 18,  33 => 13,);
    }
}
