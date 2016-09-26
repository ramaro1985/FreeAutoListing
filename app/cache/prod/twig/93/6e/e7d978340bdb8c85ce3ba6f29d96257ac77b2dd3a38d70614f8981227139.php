<?php

/* TwigBundle:Exception:error404.html.twig */
class __TwigTemplate_936ee7d978340bdb8c85ce3ba6f29d96257ac77b2dd3a38d70614f8981227139 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CommonBundle:Layout:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CommonBundle:Layout:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Page not Found | ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        echo " ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo " ";
    }

    // line 5
    public function block_javascripts($context, array $blocks = array())
    {
        echo " ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo " ";
    }

    // line 6
    public function block_header($context, array $blocks = array())
    {
        // line 7
        echo "    <div id=\"header\" class=\"container-fluid\" style=\"position: relative\">
        <div class=\"container\">
            <div class=\"row hidden-xs\">
                <div id=\"logo\" class=\"col-xs-12 col-md-6 col-sm-4 hidden-xs\">
                    <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\">
                        <img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/logo.png"), "html", null, true);
        echo "\" alt=\"Home\"/></a>
                </div>

                <div id=\"logo1\" class=\"col-xs-12 col-md-6 col-sm-6 visible-xs\">
                    <a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\">
                        <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/logo.png"), "html", null, true);
        echo "\" alt=\"Home\"/></a>
                </div>


                <div id=\"chat\" class=\"col-xs-12 col-md-6  col-sm-8\">

                    <div class=\"pull-right\">
                        <nav>


                            <ul id=\"mainMenu\" class=\"nav nav-pills nav-main\">
                                
                                <li>
                                    <a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("contact_us");
        echo "\">Support</a>
                                </li>
                               
                            </ul>                       
                        </nav></div>


                </div>


            </div>

            <div class=\"row visible-xs\">
                <div class=\"col-md-2 col-sm-2 col-xs-2\">
                    <nav class=\"navbar\" role=\"navigation\" >
                        <div class=\"container-fluid\">
                            <div class=\"navbar-header\" style=\"margin-right: -33px\">
                                <button class=\"navbar-toggle collapsed\" data-target=\"#bs-example-navbar-collapse-9\" data-toggle=\"collapse\" type=\"button\">
                                    <span class=\"sr-only\">Toggle navigation</span>
                                    <span class=\"icon-bar\"></span>
                                    <span class=\"icon-bar\"></span>
                                    <span class=\"icon-bar\"></span>
                                </button>  

                            </div>
                            <div id=\"bs-example-navbar-collapse-9\" class=\"navbar-collapse collapse\" style=\"width: 200px;padding-left: 0;margin-left: -25px;\">
                                <ul id=\"mainMenu\" class=\"nav navbar-nav\">
                                    <li><a href=\"";
        // line 57
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\">Support</a></li>
                                 
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div id=\"logo\" class=\"col-xs-9 col-md-6\" style=\"padding-left: 10px\">
                    <a href=\"";
        // line 65
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/logo.png"), "html", null, true);
        echo "\" alt=\"Home\"/></a>
                </div>
            </div>
        </div>
        <div id=\"raya\" style=\"height:3px; background:#ffffff\">  </div>
        <div id=\"raya\" style=\"height:5px; background:#2c9ec8\">  </div>
        <div id=\"form\" class=\"container-fluid\">
            <div class=\"container text-center\">
                <form class=\"\" role=\"form\" style=\"padding: 11px 0\" action=\"";
        // line 73
        echo $this->env->getExtension('routing')->getPath("properties");
        echo "\">

                    <div class=\"row\">

                        <div class=\"col-xs-12 col-md-4\">
                            <input name=\"searchtext\" id=\"searchtext\" type=\"text\" value=\"\" class=\"form-control\" placeholder=\"Enter destination or property ID\">
                        </div>

                        <div class=\"calendar input-group col-xs-6 col-sm-3 col-md-2 pull-left calendario\">
                            <input id=\"datepicker1\" name=\"checkin\" type=\"text\" class=\"form-control\" placeholder=\"Check-in\" value=\"\">
                            <span class=\"input-group-addon\"><img src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/icon Calendar.png"), "html", null, true);
        echo "\" /></span>
                        </div>   

                        <div  class=\"calendar input-group col-xs-6 col-sm-3 col-md-2 pull-left calendario\">
                            <input id=\"datepicker2\" name=\"checkout\" type=\"text\" class=\"form-control\" placeholder=\"Check-out\" value=\"\">
                            <span class=\"input-group-addon\"><img src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/icon Calendar.png"), "html", null, true);
        echo "\" /></span>
                        </div>  

                        <div  class=\"sleeps input-group hidden-xs col-md-1 col-sm-3 pull-left\">

                            <select name=\"sleeps\" class=\"form-control\" >
                                <option disabled=\"disabled\" selected=\"selected\" value=\"\"> Sleeps</option>
                                <option value=\"1\">1+</option>
                                <option value=\"2\" >2+</option>
                                <option value=\"3\" >3+</option>
                                <option value=\"4\">4+</option>
                                <option value=\"5\" >5+</option>
                                <option value=\"6\">6+</option>
                                <option value=\"7\">7+</option>
                                <option value=\"8\">8+</option>
                                <option value=\"9\">9+</option>
                                <option value=\"10\">10+</option>
                                <option value=\"11\">11+</option>
                                <option value=\"12\">12+</option>
                                <option value=\"13\">13 or more</option>

                            </select>
                            <span class=\"input-group-addon\"><i class=\"fa fa-users\" style=\"color: #B5B5B5;padding-top: 3px; font-size: 16px;\"></i></span>


                        </div>
                        <div class=\"col-xs-12 col-md-2 col-sm-3 text-left\" >
                            <button id=\"btnsave\" type=\"submit\" class=\"hide\">Save</button>
                            <a id=\"btnsearch\" href=\"#\" class=\"btn  btn-block btn-gradient-search\">Search<span class=\"glyphicon glyphicon-search\" style=\"padding-left: 10px\"></span></a>

                        </div>
                    </div>
                    <input type=\"hidden\" id=\"location_locality\" class=\"add\" name=\"location_locality\">
                    <input type=\"hidden\" id=\"location_postal_town\" class=\"add\" name=\"location_postal_town\">
                    <input type=\"hidden\" id=\"location_administrative_area_level_2\" class=\"add\" name=\"location_administrative_area_level_2\">
                    <input type=\"hidden\" id=\"location_administrative_area_level_1\" class=\"add\" name=\"location_administrative_area_level_1\">
                    <input type=\"hidden\" id=\"location_neighborhood\" class=\"add\" name=\"location_neighborhood\">
                    <input type=\"hidden\" id=\"location_postal_code\" class=\"add\" name=\"location_postal_code\">
                    <input type=\"hidden\" id=\"location_country\" class=\"add\" name=\"location_country\">


                </form>
            </div>



        </div>


    </div>


";
    }

    // line 142
    public function block_body($context, array $blocks = array())
    {
        // line 143
        echo "
    <div class=\"container-fluid fluid-404\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-12 col-md-12 col-xs-12\">



                    <div class=\"row\">
                        <div class=\"col-sm-4 col-md-4  col-md-offset-4 col-sm-offset-4 col-xs-12 box-404\">
                            <h1>404</h1>
                            <h2>Sorry,<br> We couldn't find that page!</h2>
                            
                            <h3>The web guy will check it out when he comes back from the beach.</h3>
                            <a href=\"";
        // line 157
        echo $this->env->getExtension('routing')->getPath("app_homepage");
        echo "\">Take me Home</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




";
    }

    // line 170
    public function block_footer($context, array $blocks = array())
    {
        // line 171
        echo "    ";
        echo twig_include($this->env, $context, "CommonBundle:Default:footer.html.twig");
        echo "   
    <script type=\"text/javascript\">
        jQuery(document).ready(function () {
            //------------------------------------------------------------------------------
         

        
        jQuery('#searchtext').keydown(function(event){
             if(event.keyCode !== 13 && event.keyCode !== 9 && event.keyCode !== 16 && event.keyCode !== 17 && event.keyCode !== 18 && event.keyCode !== 27 && event.keyCode !== 35 && event.keyCode !== 36 && event.keyCode !== 37 && event.keyCode !== 38 && event.keyCode !== 39 && event.keyCode !== 40) {
                jQuery('#search').find('.add').each(function () {
                jQuery(this).val('');
            });
            }
            
            
              if (event.which == 13 && jQuery('.pac-container:visible').length) return false;
        
        });
        

            //------------------------------------------------------------------------------
            jQuery('#btnsearch').click(function (e) {

                if (checkDate(jQuery('#datepicker1'), jQuery('#datepicker2'))) {
                    jQuery('#btnsave').trigger('click');
                }
                e.preventDefault();
            });

            var placeSearch, autocomplete;
            var componentForm = {
                locality: 'long_name',
                postal_town: 'long_name',
                administrative_area_level_2: 'short_name',
                administrative_area_level_1: 'long_name',
                country: 'long_name',
                neighborhood: 'long_name',
                postal_code: 'short_name'


            };

            function initialize() {
                // Create the autocomplete object, restricting the search
                // to geographical location types.
                autocomplete = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('searchtext')),
                        {types: ['(regions)']});
                // When the user selects an address from the dropdown,
                // populate the address fields in the form.
                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    fillInAddress(autocomplete);
                });
            }

            function fillInAddress(autocomplete) {
                // Get the place details from the autocomplete object.
                var place = autocomplete.getPlace();
                //jQuery('#response').html(place.address_components);
                // Get each component of the address from the place details
                // and fill the corresponding field on the form.

                jQuery('#search').find('.add').each(function () {
                    jQuery(this).val('');
                });



                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];



                    //if(place.address_components[i].types[0] === 'postal_town'){
                    //var addressType1 = place.address_components[i].types[0];  
                    //var town = place.address_components[i]['long_name'];   
                    //document.getElementById('stateName').value = town;
                    //}   

                    if (componentForm[addressType]) {

                        var val = place.address_components[i][componentForm[addressType]];
                        var addressType1 = \"location_\" + addressType;
                        document.getElementById(addressType1).value = val;

                    }

                }



            }


            google.maps.event.addDomListener(window, 'load', initialize);

            function createPopover(elem, text) {
                elem.attr('data-toggle', 'popover');
                elem.attr('data-placement', 'top');
                elem.attr('data-content', text);
                elem.attr('data-container', 'body');
                elem.popover();
                elem.trigger('click');
                elem.focus();
            }

            function checkDate(o, u) {
                if (u.val() < o.val()) {
                    createPopover(u, 'Invalid Date');
                    return false;

                } else {
                    return true;
                }
            }

        });




    </script>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 171,  265 => 170,  248 => 157,  232 => 143,  229 => 142,  172 => 88,  164 => 83,  151 => 73,  138 => 65,  127 => 57,  97 => 30,  81 => 17,  77 => 16,  70 => 12,  66 => 11,  60 => 7,  57 => 6,  49 => 5,  41 => 4,  33 => 3,);
    }
}
