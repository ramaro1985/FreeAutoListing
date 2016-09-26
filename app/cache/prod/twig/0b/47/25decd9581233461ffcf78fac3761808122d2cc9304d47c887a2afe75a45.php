<?php

/* AppBundle:FAL:all-results-cars.html.twig */
class __TwigTemplate_0b4725decd9581233461ffcf78fac3761808122d2cc9304d47c887a2afe75a45 extends Twig_Template
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
        echo "<div class=\"row row_cars\">
    ";
        // line 2
        if ((twig_length_filter($this->env, (isset($context["vehicles"]) ? $context["vehicles"] : null)) > 5)) {
            // line 3
            echo "        ";
            $context["total"] = 6;
            // line 4
            echo "    ";
        } else {
            // line 5
            echo "        ";
            $context["total"] = twig_length_filter($this->env, (isset($context["vehicles"]) ? $context["vehicles"] : null));
            // line 6
            echo "    ";
        }
        // line 7
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["vehicles"]) ? $context["vehicles"] : null), 0, 6));
        foreach ($context['_seq'] as $context["_key"] => $context["vehicle"]) {
            // line 8
            echo "        ";
            if ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile")) {
                // line 9
                echo "            ";
                $context["pf"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "profileimages"), 0, array(), "array");
                // line 10
                echo "            ";
                $context["profileimageslength"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "profileimages"));
                // line 11
                echo "            ";
                $context["photoid"] = $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile");
                // line 12
                echo "            ";
                $context["vehicle_image"] = $this->getAttribute((isset($context["pf"]) ? $context["pf"] : null), "getwebpaththumbnailVehicle", array(0 => (isset($context["photoid"]) ? $context["photoid"] : null), 1 => $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie")), "method");
                // line 13
                echo "        ";
            } elseif ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user")) {
                // line 14
                echo "            ";
                $context["photoid"] = $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user"), "id");
                // line 15
                echo "            ";
                if (((!(null === $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"))) && (!(null === $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "vehicleimages"))))) {
                    // line 16
                    echo "                ";
                    $context["pf"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "vehicleimages"), 0, array(), "array");
                    // line 17
                    echo "                ";
                    $context["vehicle_image"] = $this->getAttribute((isset($context["pf"]) ? $context["pf"] : null), "getwebpaththumbnailVehicle", array(0 => (isset($context["photoid"]) ? $context["photoid"] : null), 1 => $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie")), "method");
                    // line 18
                    echo "                ";
                    $context["profileimageslength"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "vehicleimages"));
                    // line 19
                    echo "            ";
                } else {
                    // line 20
                    echo "                ";
                    $context["vehicle_image"] = "bundles/common/images/image-bg.jpg";
                    // line 21
                    echo "                ";
                    $context["profileimageslength"] = 0;
                    // line 22
                    echo "            ";
                }
                // line 23
                echo "        ";
            }
            // line 24
            echo "        ";
            $context["issaved"] = false;
            // line 25
            echo "        ";
            if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
                // line 26
                echo "            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["savedcars"]) ? $context["savedcars"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["car_serie"]) {
                    // line 27
                    echo "                ";
                    if (((isset($context["car_serie"]) ? $context["car_serie"] : null) == $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie"))) {
                        // line 28
                        echo "                    ";
                        $context["issaved"] = true;
                        // line 29
                        echo "                ";
                    }
                    // line 30
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car_serie'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 31
                echo "        ";
            }
            // line 32
            echo "        ";
            $context["car_serie"] = $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie");
            // line 33
            echo "        <div class=\"col-md-4\"
             style=\"margin-top: 15px\">

            <div class=\"col-md-12 borderBoxShadows\" car-serie=\"";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["car_serie"]) ? $context["car_serie"] : null), "html", null, true);
            echo "\"
                 style=\"padding-bottom: 0px;padding-top: 7px;background-color: #ffffff\">
                <div class=\"form-inline text-right\" style=\"padding: 0px 0px 7px 0px;font-size: 12px\">
                    <div class=\"form-group\">
                        <label class=\"checkbox-inline\">
                            <input type=\"checkbox\" class=\"compare_check\" style=\"margin-top: 1px\"> COMPARE
                        </label>
                        ";
            // line 43
            if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
                // line 44
                echo "                            ";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "type"), "id") != 2)) {
                    // line 45
                    echo "                                <label class=\"checkbox-inline savecar_option ";
                    if ((isset($context["issaved"]) ? $context["issaved"] : null)) {
                        echo "saved";
                    }
                    echo "\"
                                       car-serie=\"";
                    // line 46
                    echo twig_escape_filter($this->env, (isset($context["car_serie"]) ? $context["car_serie"] : null), "html", null, true);
                    echo "\"
                                       style=\"margin-left: 0px;padding-left: 10px\">
                                    ";
                    // line 48
                    if ((isset($context["issaved"]) ? $context["issaved"] : null)) {
                        echo " SAVED CAR ";
                    } else {
                        echo " SAVE CAR ";
                    }
                    // line 49
                    echo "                                </label>
                            ";
                }
                // line 51
                echo "                        ";
            } else {
                // line 52
                echo "                            <label class=\"checkbox-inline show-pop-large_logregister\"
                                   onclick=\"javascript:SetCarSerieInSession(this)\" data-placement=\"auto\"
                                   car-serie=\"";
                // line 54
                echo twig_escape_filter($this->env, (isset($context["car_serie"]) ? $context["car_serie"] : null), "html", null, true);
                echo "\"
                                   style=\"margin-left: 0px;padding-left: 10px\">SAVE CAR
                            </label>
                        ";
            }
            // line 58
            echo "                    </div>
                </div>
                <div class=\"\">
                    <a href=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("car_details", array("serie" => (isset($context["car_serie"]) ? $context["car_serie"] : null))), "html", null, true);
            echo "\">
                        <div class=\"thumbnail\">

                            <img src=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((isset($context["vehicle_image"]) ? $context["vehicle_image"] : null)), "html", null, true);
            echo "\" id=\"car_image_";
            echo twig_escape_filter($this->env, (isset($context["car_serie"]) ? $context["car_serie"] : null), "html", null, true);
            echo "\"
                                 alt=\"\" ";
            // line 65
            if ((null === $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"))) {
                echo " style=\"width: 100%; ";
                if (((isset($context["vehicle_image"]) ? $context["vehicle_image"] : null) == "bundles/common/images/image-bg.jpg")) {
                    echo " height: 177px ";
                }
                echo " \"";
            }
            echo "/>

                            <div class=\"views\">
                                        <span> <span
                                                    class=\"glyphicon glyphicon-camera\"></span> ";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["profileimageslength"]) ? $context["profileimageslength"] : null), "html", null, true);
            echo "</span>
                            </div>
                        </div>
                    </a>

                    <p id=\"car_info_";
            // line 74
            echo twig_escape_filter($this->env, (isset($context["car_serie"]) ? $context["car_serie"] : null), "html", null, true);
            echo "\" class=\"text-left\"
                       style=\"font-size: 16px;margin-top: 16px;margin-bottom:0px;min-height: 45px;\">
                        ";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "condition"), "name"), "html", null, true);
            echo "
                        ";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "year"), "year"), "html", null, true);
            echo "
                        ";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "make"), "makeDisplay"), "html", null, true);
            echo "
                        ";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "model"), "modelDisplay"), "html", null, true);
            echo "
                    </p>

                    <p class=\"text-left\" style=\"line-height: 145%;margin-bottom: 5px;font-size: 14px\">
                                            <span> Price: <span
                                                        class=\"price_text\"
                                                        style=\"font-size: 18px\">\$";
            // line 85
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "price")), "html", null, true);
            echo "</span></span><br>
                        ";
            // line 86
            if ((($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile", array(), "any", true, true) && (!(null === $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile")))) && ($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "msrp") != 0))) {
                // line 87
                echo "                            <span class=\"bo\">MSRP: \$";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "msrp")), "html", null, true);
                echo "</span><br>
                        ";
            } else {
                // line 89
                echo "                            <span class=\"bo\"></span><br>
                        ";
            }
            // line 91
            echo "                    </p>

                    <p class=\"text-left\" style=\"margin-bottom: 0px;font-size: 14px\">
                        Mileage: <span>";
            // line 94
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "mileage")), "html", null, true);
            echo "</span><br>
                    </p>

                    <p class=\"text-left\" style=\"margin-bottom: 0px\">
                        Color: <span>";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesdetails"), "exteriorcolor"), "html", null, true);
            echo "</span><br>
                    </p>
                </div>
                <div class=\"row\">
                    <hr/>
                </div>

                <div class=\"col-md-12 no_padding\" style=\"min-height: 73px;padding-top: 3px;\">
                    <div class=\"thumbnail col-md-4\">
                        ";
            // line 107
            if ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile")) {
                // line 108
                echo "                            <div class=\"logo img-responsive\"
                                 style=\"background-image:url('";
                // line 109
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile"), "logo")), "html", null, true);
                echo "');height: 56px;width:100%\">
                            </div>
                        ";
            } elseif ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user")) {
                // line 112
                echo "                            <div class=\"logo img-responsive\"
                                 style=\"margin-top: 2px;margin-bottom: 2px;background-image:url('";
                // line 113
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/for-sale.jpg"), "html", null, true);
                echo "');height: 56px;width:100%\">
                            </div>
                        ";
            }
            // line 116
            echo "                    </div>
                    <div class=\"col-md-8\" style=\"padding-left: 10px\">
                        <p class=\"text-left\" style=\"line-height: 1.3;margin-bottom: 0px\">
                            ";
            // line 119
            if ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile")) {
                // line 120
                echo "                                <span style=\"font-size: 16px\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile"), "description"), "name"), "html", null, true);
                echo "</span><br>
                                <span class=\"bo\"
                                      style=\"font-size: 14px\">";
                // line 122
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile"), "description"), "phone"), "html", null, true);
                echo "</span><br>
                                <span class=\"small\">4 miles from 45877</span>
                            ";
            } elseif ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user")) {
                // line 125
                echo "                                <span style=\"font-size: 16px\">Private Seller</span>
                                <br>
                                <span style=\"font-size: 14px\">";
                // line 127
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user"), "phone"), "html", null, true);
                echo "</span>
                            ";
            }
            // line 129
            echo "                        </p>
                    </div>
                </div>
            </div>


        </div>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vehicle'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "
</div>


<!-- DIV DE PUBLICIDAD  -->
<div class=\"container-fluid\" style=\"height: 145px;margin-top: 15px\">
    <script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
    <!-- FreeAutoListing Car Profile -->
    <ins class=\"adsbygoogle\">
            style=\"display:block\"
            data-ad-client=\"ca-pub-7661672510407172\"
            data-ad-slot=\"3129379241\"
            data-ad-format=\"auto\">
    </ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

    <script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
    <!-- FreeAutoListing Search Results -->
    <ins class=\"adsbygoogle\">
            style=\"display:block\"
            data-ad-client=\"ca-pub-7661672510407172\"
            data-ad-slot=\"6082845642\"
            data-ad-format=\"auto\">
    </ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>


";
        // line 170
        if ((twig_length_filter($this->env, (isset($context["vehicles"]) ? $context["vehicles"] : null)) > 6)) {
            // line 171
            echo "    <div class=\"row row_cars\">
        ";
            // line 172
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["vehicles"]) ? $context["vehicles"] : null), 6, twig_length_filter($this->env, (isset($context["vehicles"]) ? $context["vehicles"] : null))));
            foreach ($context['_seq'] as $context["_key"] => $context["vehicle"]) {
                // line 173
                echo "            ";
                if ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile")) {
                    // line 174
                    echo "                ";
                    $context["pf"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "profileimages"), 0, array(), "array");
                    // line 175
                    echo "                ";
                    $context["profileimageslength"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "profileimages"));
                    // line 176
                    echo "                ";
                    $context["photoid"] = $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile");
                    // line 177
                    echo "                ";
                    $context["vehicle_image"] = $this->getAttribute((isset($context["pf"]) ? $context["pf"] : null), "getwebpaththumbnailVehicle", array(0 => (isset($context["photoid"]) ? $context["photoid"] : null), 1 => $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie")), "method");
                    // line 178
                    echo "            ";
                } elseif ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user")) {
                    // line 179
                    echo "                ";
                    $context["photoid"] = $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user"), "id");
                    // line 180
                    echo "                ";
                    if (((!(null === $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"))) && (!(null === $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "vehicleimages"))))) {
                        // line 181
                        echo "                    ";
                        $context["pf"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "vehicleimages"), 0, array(), "array");
                        // line 182
                        echo "                    ";
                        $context["vehicle_image"] = $this->getAttribute((isset($context["pf"]) ? $context["pf"] : null), "getwebpaththumbnailVehicle", array(0 => (isset($context["photoid"]) ? $context["photoid"] : null), 1 => $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie")), "method");
                        // line 183
                        echo "                    ";
                        $context["profileimageslength"] = twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"), "vehicleimages"));
                        // line 184
                        echo "                ";
                    } else {
                        // line 185
                        echo "                    ";
                        $context["vehicle_image"] = "bundles/common/images/image-bg.jpg";
                        // line 186
                        echo "                    ";
                        $context["profileimageslength"] = 0;
                        // line 187
                        echo "                ";
                    }
                    // line 188
                    echo "            ";
                }
                // line 189
                echo "            ";
                $context["issaved"] = false;
                // line 190
                echo "            ";
                if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
                    // line 191
                    echo "                ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["savedcars"]) ? $context["savedcars"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["car_serie"]) {
                        // line 192
                        echo "                    ";
                        if (((isset($context["car_serie"]) ? $context["car_serie"] : null) == $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie"))) {
                            // line 193
                            echo "                        ";
                            $context["issaved"] = true;
                            // line 194
                            echo "                    ";
                        }
                        // line 195
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car_serie'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 196
                    echo "            ";
                }
                // line 197
                echo "            ";
                $context["car_serie"] = $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie");
                // line 198
                echo "
            <div class=\"col-md-4\"
                 style=\"margin-bottom: 15px\">

                <div class=\"col-md-12 borderBoxShadows\"
                     style=\"padding-bottom: 0px;padding-top: 10px;background-color: #ffffff\">
                    <div class=\"form-inline text-right\" style=\"padding: 0px 0px 7px 0px;font-size: 12px\">
                        <div class=\"form-group\">
                            <label class=\"checkbox-inline\">
                                <input type=\"checkbox\" class=\"compare_check\" style=\"margin-top: 1px\"> COMPARE
                            </label>
                            ";
                // line 209
                if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
                    // line 210
                    echo "                                ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "type"), "id") != 2)) {
                        // line 211
                        echo "                                    <label class=\"checkbox-inline savecar_option ";
                        if ((isset($context["issaved"]) ? $context["issaved"] : null)) {
                            echo "saved";
                        }
                        echo "\"
                                           car-serie=\"";
                        // line 212
                        echo twig_escape_filter($this->env, (isset($context["car_serie"]) ? $context["car_serie"] : null), "html", null, true);
                        echo "\"
                                           style=\"margin-left: 0px;padding-left: 10px\">
                                        ";
                        // line 214
                        if ((isset($context["issaved"]) ? $context["issaved"] : null)) {
                            echo " SAVED CAR ";
                        } else {
                            echo " SAVE CAR ";
                        }
                        // line 215
                        echo "                                    </label>
                                    ";
                    }
                    // line 217
                    echo "                            ";
                } else {
                    // line 218
                    echo "                                <label class=\"checkbox-inline show-pop-large_logregister\"
                                       onclick=\"javascript:SetCarSerieInSession(this)\" data-placement=\"auto\"
                                       car-serie=\"";
                    // line 220
                    echo twig_escape_filter($this->env, (isset($context["car_serie"]) ? $context["car_serie"] : null), "html", null, true);
                    echo "\"
                                       style=\"margin-left: 0px;padding-left: 10px\">SAVE CAR
                                </label>
                            ";
                }
                // line 224
                echo "                        </div>
                    </div>
                    <div class=\"\">
                        <a href=\"";
                // line 227
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("car_details", array("serie" => $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "serie"))), "html", null, true);
                echo "\">
                            <div class=\"thumbnail\">

                                <img src=\"";
                // line 230
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((isset($context["vehicle_image"]) ? $context["vehicle_image"] : null)), "html", null, true);
                echo "\"
                                     alt=\"\" ";
                // line 231
                if ((null === $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "gallery"))) {
                    echo " style=\"width: 100%; ";
                    if (((isset($context["vehicle_image"]) ? $context["vehicle_image"] : null) == "bundles/common/images/image-bg.jpg")) {
                        echo " height: 177px ";
                    }
                    echo " \"";
                }
                echo "/>

                                <div class=\"views\">
                                        <span> <span
                                                    class=\"glyphicon glyphicon-camera\"></span> ";
                // line 235
                echo twig_escape_filter($this->env, (isset($context["profileimageslength"]) ? $context["profileimageslength"] : null), "html", null, true);
                echo "</span>
                                </div>
                            </div>
                        </a>

                        <p class=\"text-left\" style=\"font-size: 16px;margin-top: 16px;min-height: 45px;\">
                            ";
                // line 241
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "condition"), "name"), "html", null, true);
                echo "
                            ";
                // line 242
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "year"), "year"), "html", null, true);
                echo "
                            ";
                // line 243
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "make"), "makeDisplay"), "html", null, true);
                echo "
                            ";
                // line 244
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "model"), "modelDisplay"), "html", null, true);
                echo "
                        </p>

                        <p class=\"text-left\" style=\"line-height: 145%;margin-bottom: 14px;font-size: 14px\">
                                            <span> Price: <span
                                                        class=\"price_text\"
                                                        style=\"font-size: 18px\">\$";
                // line 250
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "price")), "html", null, true);
                echo "</span></span><br>
                            ";
                // line 251
                if (($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile", array(), "any", true, true) && (!(null === $this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile"))))) {
                    // line 252
                    echo "                                <span class=\"bo\">MSRP: \$";
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "msrp")), "html", null, true);
                    echo "</span>
                                <br>
                            ";
                } else {
                    // line 255
                    echo "                                <span class=\"bo\"></span><br>
                            ";
                }
                // line 257
                echo "                        </p>

                        <p class=\"text-left\" style=\"margin-bottom: 0px;font-size: 14px\">
                            Mileage: <span>";
                // line 260
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesinformation"), "mileage")), "html", null, true);
                echo "</span><br>
                        </p>

                        <p class=\"text-left\" style=\"margin-bottom: 0px\">
                            Color: <span>";
                // line 264
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "vehiclesdetails"), "exteriorcolor"), "html", null, true);
                echo "</span><br>
                        </p>
                    </div>
                    <div class=\"row\">
                        <hr/>
                    </div>

                    <div class=\"col-md-12 no_padding\" style=\"min-height: 73px;padding-top: 5px;padding-bottom: 5px;\">
                        <div class=\"thumbnail col-md-3\">
                            ";
                // line 273
                if ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile")) {
                    // line 274
                    echo "                                <div class=\"logo img-responsive\"
                                     style=\"margin-top: 2px;margin-bottom: 2px;background-image:url('";
                    // line 275
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile"), "logo")), "html", null, true);
                    echo "');height: 50px;width:100%\">
                                </div>
                            ";
                } elseif ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user")) {
                    // line 278
                    echo "                                <div class=\"logo img-responsive\"
                                     style=\"margin-top: 2px;margin-bottom: 2px;background-image:url('";
                    // line 279
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/for-sale.jpg"), "html", null, true);
                    echo "');height: 50px;width:100%\">
                                </div>
                            ";
                }
                // line 282
                echo "                        </div>
                        <div class=\"col-md-9\" style=\"padding-left: 10px\">
                            <p class=\"text-left\" style=\"line-height: 1.3;margin-bottom: 0px\">
                                ";
                // line 285
                if ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile")) {
                    // line 286
                    echo "                                    <span style=\"font-size: 16px\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile"), "description"), "name"), "html", null, true);
                    echo "</span><br>
                                    <span class=\"bo\"
                                          style=\"font-size: 14px\">";
                    // line 288
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "profile"), "description"), "phone"), "html", null, true);
                    echo "</span><br>
                                    <span class=\"small\">4 miles from 45877</span>
                                ";
                } elseif ($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user")) {
                    // line 291
                    echo "                                    <span style=\"font-size: 16px\">Private Seller</span>
                                    <br>
                                    <span style=\"font-size: 14px\">";
                    // line 293
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle"]) ? $context["vehicle"] : null), "user"), "phone"), "html", null, true);
                    echo "</span>
                                ";
                }
                // line 295
                echo "                            </p>
                        </div>
                    </div>
                </div>


            </div>

        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vehicle'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 304
            echo "
    </div>


";
        }
        // line 309
        echo "
<div class=\"pagination pull-right\" style=\"margin-top: 15px\">
    ";
        // line 311
        echo $this->env->getExtension('knp_pagination')->render((isset($context["vehicles"]) ? $context["vehicles"] : null));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:FAL:all-results-cars.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  692 => 311,  688 => 309,  681 => 304,  667 => 295,  662 => 293,  658 => 291,  652 => 288,  646 => 286,  644 => 285,  639 => 282,  633 => 279,  630 => 278,  624 => 275,  621 => 274,  619 => 273,  607 => 264,  595 => 257,  591 => 255,  584 => 252,  582 => 251,  578 => 250,  569 => 244,  565 => 243,  561 => 242,  557 => 241,  548 => 235,  535 => 231,  531 => 230,  525 => 227,  520 => 224,  513 => 220,  509 => 218,  506 => 217,  502 => 215,  496 => 214,  491 => 212,  481 => 210,  479 => 209,  466 => 198,  463 => 197,  460 => 196,  454 => 195,  451 => 194,  448 => 193,  445 => 192,  440 => 191,  437 => 190,  434 => 189,  431 => 188,  428 => 187,  425 => 186,  422 => 185,  419 => 184,  416 => 183,  413 => 182,  410 => 181,  407 => 180,  404 => 179,  398 => 177,  395 => 176,  392 => 175,  389 => 174,  386 => 173,  382 => 172,  379 => 171,  377 => 170,  329 => 129,  320 => 125,  314 => 122,  308 => 120,  306 => 119,  301 => 116,  295 => 113,  292 => 112,  286 => 109,  283 => 108,  281 => 107,  269 => 98,  262 => 94,  257 => 91,  253 => 89,  247 => 87,  245 => 86,  232 => 79,  228 => 78,  224 => 77,  220 => 76,  215 => 74,  207 => 69,  194 => 65,  188 => 64,  177 => 58,  170 => 54,  166 => 52,  163 => 51,  159 => 49,  153 => 48,  141 => 45,  138 => 44,  136 => 43,  126 => 36,  121 => 33,  115 => 31,  109 => 30,  106 => 29,  103 => 28,  100 => 27,  95 => 26,  92 => 25,  89 => 24,  86 => 23,  83 => 22,  80 => 21,  77 => 20,  71 => 18,  68 => 17,  65 => 16,  62 => 15,  59 => 14,  56 => 13,  53 => 12,  47 => 10,  44 => 9,  36 => 7,  33 => 6,  27 => 4,  24 => 3,  22 => 2,  1234 => 979,  1071 => 819,  1043 => 794,  810 => 564,  651 => 408,  632 => 392,  610 => 373,  600 => 260,  581 => 349,  570 => 346,  566 => 344,  562 => 343,  543 => 326,  532 => 323,  528 => 321,  524 => 320,  505 => 303,  501 => 301,  498 => 300,  495 => 299,  492 => 298,  489 => 297,  484 => 211,  458 => 270,  447 => 267,  443 => 265,  439 => 264,  420 => 247,  409 => 244,  405 => 242,  401 => 178,  383 => 225,  372 => 222,  368 => 220,  364 => 219,  343 => 138,  332 => 197,  328 => 195,  324 => 127,  289 => 161,  279 => 158,  275 => 156,  271 => 155,  252 => 138,  241 => 85,  237 => 133,  233 => 132,  210 => 111,  202 => 109,  199 => 108,  195 => 107,  182 => 61,  174 => 94,  171 => 93,  167 => 92,  148 => 46,  140 => 73,  135 => 72,  131 => 71,  118 => 32,  110 => 58,  105 => 57,  101 => 56,  72 => 29,  55 => 22,  45 => 15,  40 => 13,  37 => 12,  34 => 11,  30 => 5,  19 => 1,  102 => 30,  97 => 29,  94 => 28,  87 => 25,  84 => 24,  78 => 22,  74 => 19,  69 => 20,  66 => 46,  50 => 11,  46 => 6,  41 => 8,  38 => 4,  32 => 2,);
    }
}
