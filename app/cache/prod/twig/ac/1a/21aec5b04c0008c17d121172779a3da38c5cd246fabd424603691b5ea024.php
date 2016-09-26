<?php

/* AdminBundle:Default:user-inquiries.html.twig */
class __TwigTemplate_ac1a21aec5b04c0008c17d121172779a3da38c5cd246fabd424603691b5ea024 extends Twig_Template
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
        echo "<style>
    #inquiries-container .carousel-control {
        background-color: transparent;
        height: 100%;
        position: relative;
        opacity: 1
    }

    .btn-default {
        background-color: rgba(68, 70, 71, 0.79);
        color: white;
        border: none;
    }

    .btn-default.focus, .btn-default:focus {
        background-color: rgba(55, 57, 58, 0.85);
        color: white;
        border: none;
    }

    .btn-default:hover {
        background-color: rgba(52, 54, 55, 0.85);
        color: white;
        border: none;
    }

    .btn-default.active, .btn-default:active, .open > .dropdown-toggle.btn-default {
        background-color: rgba(52, 54, 55, 0.85);
        color: white;
        border: none;
    }

    .btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open > .dropdown-toggle.btn-default.focus, .open > .dropdown-toggle.btn-default:focus, .open > .dropdown-toggle.btn-default:hover {
        background-color: rgba(52, 54, 55, 0.85);
        color: white;
        border: none;
    }

    .btn-default.active, .btn-default:active, .open > .dropdown-toggle.btn-default {
        background-image: none
    }

    .email_buttons {
        padding: 90px;
        position: absolute;
        background-color: rgba(254, 254, 254, 0.54) !important;
        margin-left: -15px;
        height: 100%;
    }

    .logo {
        height: 84px;
    }
</style>
<div id=\"inquiries-container\" class=\"container-fluid no_padding\">

    <div class=\"col-md-12 no_padding\">
        <div class=\"pull-left\" style=\"padding-top: 6px;padding-bottom: 6px\">
            <span class=\"bold_text\"
                  style=\"color:#000000\">Inquiries ( ";
        // line 60
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "email_news"), "method") + $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "email_offers"), "method")), "html", null, true);
        echo "
                new)</span>
        </div>
        <div class=\"pull-right col-md-1\" style=\"padding: 2px 14px 0px 28px;\">
            ";
        // line 64
        if ((twig_length_filter($this->env, (isset($context["emails"]) ? $context["emails"] : null)) > 3)) {
            // line 65
            echo "                <a class=\"carousel-control pull-left\" href=\"#inquiries_carrusel\" data-slide=\"prev\">
                    <span class=\"glyphicon glyphicon-triangle-left\" style=\"color: #000000\"></span>
                </a>
                <a class=\"carousel-control pull-right\" href=\"#inquiries_carrusel\" data-slide=\"next\">
                    <span class=\"glyphicon glyphicon-triangle-right\" style=\"color: #000000\"></span>
                </a>
            ";
        }
        // line 72
        echo "        </div>
    </div>


</div>

<div id=\"inquiries\" class=\"container-fluid no_padding\">

    <div id=\"inquiries_carrusel\" class=\"carousel slide\" data-interval=\"false\" data-ride=\"carousel\">

        <!-- Bloque para las imágenes -->
        <div class=\"carousel-inner\">
            ";
        // line 84
        $context["total_emails"] = twig_length_filter($this->env, (isset($context["emails"]) ? $context["emails"] : null));
        // line 85
        echo "            ";
        $context["count"] = 0;
        // line 86
        echo "            ";
        $context["step_"] = 0;
        // line 87
        echo "            ";
        if (((isset($context["total_emails"]) ? $context["total_emails"] : null) == 1)) {
            // line 88
            echo "                ";
            $context["step_"] = 1;
            // line 89
            echo "                ";
            $context["jump"] = 1;
            // line 90
            echo "                ";
            $context["rest"] = 1;
            // line 91
            echo "            ";
        }
        // line 92
        echo "            ";
        if (((isset($context["total_emails"]) ? $context["total_emails"] : null) == 2)) {
            // line 93
            echo "                ";
            $context["step_"] = 2;
            // line 94
            echo "                ";
            $context["jump"] = 2;
            // line 95
            echo "                ";
            $context["rest"] = 0;
            // line 96
            echo "            ";
        }
        // line 97
        echo "            ";
        if (((isset($context["total_emails"]) ? $context["total_emails"] : null) >= 3)) {
            // line 98
            echo "                ";
            $context["step_"] = 3;
            // line 99
            echo "                ";
            $context["jump"] = 3;
            // line 100
            echo "                ";
            $context["rest"] = 0;
            // line 101
            echo "            ";
        }
        // line 102
        echo "
            ";
        // line 103
        if (((isset($context["step_"]) ? $context["step_"] : null) > 0)) {
            // line 104
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, ((isset($context["total_emails"]) ? $context["total_emails"] : null) - (isset($context["rest"]) ? $context["rest"] : null)), (isset($context["step_"]) ? $context["step_"] : null)));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 105
                echo "                    <div class=\"row_cars carrusel_tumb old item  ";
                if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                    echo " active ";
                }
                echo "\">
                        ";
                // line 106
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["emails"]) ? $context["emails"] : null), (isset($context["i"]) ? $context["i"] : null), 3));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["emails_n"]) {
                    // line 107
                    echo "
                            <div class=\"col-md-4 ";
                    // line 108
                    if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                        echo " first ";
                    } elseif ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) {
                        echo " last ";
                    } else {
                        echo " middle ";
                    }
                    echo "\"
                                 style=\"min-width: 317.766px ; min-height: 376px\">
                                <div class=\"col-md-12 previewbox borderBoxShadows\"
                                     style=\"padding-bottom: 10px;padding-top: 10px;background-color: #ffffff\">
                                    <div class=\"col-md-12 email_buttons hide\">
                                        <a id=\"read";
                    // line 113
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "id"), "html", null, true);
                    echo "\"
                                           image=\"<a class='thumbnail pull-left' style='margin-bottom: 0px'>";
                    // line 114
                    if ($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "profile")) {
                        if (($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle") && (!(null === $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "gallery"))))) {
                            $context["pf"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "gallery"), "profileimages"), 0, array(), "array");
                            echo "<img src='";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["pf"]) ? $context["pf"] : null), "getwebpaththumbnailVehicle", array(0 => $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "profile"), 1 => $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "serie")), "method")), "html", null, true);
                            echo "' class='img-responsive'/>";
                        } else {
                            echo "<img src='";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/private-profile.jpg"), "html", null, true);
                            echo "'class='img-responsive'/>";
                        }
                    } else {
                        if (($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle") && (!(null === $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "gallery"))))) {
                            $context["pf"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "gallery"), "vehicleimages"), 0, array(), "array");
                            echo " <img src='";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["pf"]) ? $context["pf"] : null), "getwebpaththumbnailVehicle", array(0 => $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "user"), "id"), 1 => $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "serie")), "method")), "html", null, true);
                            echo "' class='img-responsive'/>";
                        } else {
                            echo " <img src='";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/image-bg.jpg"), "html", null, true);
                            echo "' class='img-responsive' style='width: 100%'/> <br/>";
                        }
                    }
                    echo " \"
                                           vehiclesinformation=\"";
                    // line 115
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "condition"), "name"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "getYear", array(), "method"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "getMake", array(), "method"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "getModel", array(), "method"), "modelDisplay"), "html", null, true);
                    echo "<br><span class='bold_text_black'>Price: \$";
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "price")), "html", null, true);
                    echo "</span>\"
                                           vehiclesinformation1=\"Milage: ";
                    // line 116
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "mileage"), "html", null, true);
                    echo "<br/>Color: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesdetails"), "exteriorcolor"), "html", null, true);
                    echo "<br/>Stock #: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "stockNumber"), "html", null, true);
                    echo "<br/>\"
                                           logo=\"";
                    // line 117
                    if ((!(null === $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "profile"), "logo")))) {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "profile"), "logo")), "html", null, true);
                        echo " ";
                    } else {
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/image-bg.jpg"), "html", null, true);
                        echo " ";
                    }
                    echo "\"
                                           linkto=\"";
                    // line 118
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("profile_view", array("prop_pk" => $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "profile"), "serie"))), "html", null, true);
                    echo "\"
                                           profilename=\"";
                    // line 119
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "profile"), "description"), "name"), "html", null, true);
                    echo "\"
                                           email_inf1=\"<span class='date'> ";
                    // line 120
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "datecreated"), "M d, Y - h:i a"), "html", null, true);
                    echo "</span><br/><span class='bold_text_black'> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "remitentname"), "html", null, true);
                    echo ":</span>\"
                                           email_inf2=\"<span class=''>Email:</span> <span class='blue_link'>";
                    // line 121
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "remitentMail"), "html", null, true);
                    echo "</span><br/><span class=''>Phone:</span> <span class='blue_link'> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "remitentphone"), "html", null, true);
                    echo "</span>\"
                                           email_inf3=\" ";
                    // line 122
                    if ($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "offer")) {
                        echo "<h3>Offer: \$";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "offertext"), "html", null, true);
                        echo " </h3>";
                    } else {
                        echo "<span>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "bodymail"), "html", null, true);
                        echo "</span>";
                    }
                    echo "\"
                                           data-toggle=\"modal\"
                                           data-target=\"#myModalInquiryListRead\"
                                           class=\"btn btn-default btn-block text-center text-uppercase read\">
                                            <small>Read</small>
                                        </a>
                                        <a id=\"";
                    // line 128
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "id"), "html", null, true);
                    echo "\" name=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "remitentname"), "html", null, true);
                    echo "\"
                                           offer=\"<h3>Offer: \$";
                    // line 129
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "offertext"), "html", null, true);
                    echo " </h3>\"
                                           body=\"";
                    // line 130
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "bodymail"), "html", null, true);
                    echo "\"
                                           data-toggle=\"modal\"
                                           data-target=\"#myModalInquiryListReply\"
                                           class=\"btn btn-default btn-block text-center text-uppercase reply\">
                                            <small>Reply</small>
                                        </a>
                                    </div>
                                    <div class=\"thumbnail\" style=\"margin-bottom: 0px;\">

                                        ";
                    // line 139
                    if (($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle") && (!(null === $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "gallery"))))) {
                        // line 140
                        echo "                                            ";
                        $context["pf"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "gallery"), "profileimages"), 0, array(), "array");
                        // line 141
                        echo "                                            <a href=\"javascript:void(0)\" class=\"thumbnail\" style=\"margin-bottom: 0px \">
                                                <img src=\"";
                        // line 142
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["pf"]) ? $context["pf"] : null), "getwebpaththumbnailVehicle", array(0 => $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "profile"), 1 => $this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "serie")), "method")), "html", null, true);
                        echo "\"
                                                     alt=\"\"
                                                     class=\"img-responsive\"/>
                                            </a>
                                        ";
                    } else {
                        // line 147
                        echo "                                            ";
                        $context["pf"] = 0;
                        // line 148
                        echo "                                            <a href=\"javascript:void(0)\" class=\"thumbnail\" style=\"margin-bottom: 0px \">
                                                <img src=\"";
                        // line 149
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/image-bg.jpg"), "html", null, true);
                        echo "\"
                                                     alt=\"\"
                                                     class=\"img-responsive\" style=\"width: 100%;height: 201px\"/>
                                            </a>
                                        ";
                    }
                    // line 154
                    echo "
                                        <div class=\" caption \" style=\"padding-right: 0px;padding-left: 0px\">
                                            <a href=\"#\" class=\"pull-left blue_text\"
                                               style=\"text-decoration: no-underline;\">";
                    // line 157
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "condition"), "name"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "getYear", array(), "method"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "getMake", array(), "method"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "getModel", array(), "method"), "modelDisplay"), "html", null, true);
                    echo "</a>
                                            ";
                    // line 158
                    if ($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle")) {
                        // line 159
                        echo "                                                <span class=\"pull-right bold_text_black\">\$";
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "price")), "html", null, true);
                        echo "</span>
                                                <br>
                                                <span class=\"pull-left\">stock #: ";
                        // line 161
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "vehicle"), "vehiclesinformation"), "stockNumber"), "html", null, true);
                        echo "</span>
                                            ";
                    }
                    // line 163
                    echo "                                        </div>

                                        <div class=\"row line_with_image\" style=\"margin-top: 10px\">
                                            <hr/>
                                            <a href=\"";
                    // line 167
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("email_content", array("mail_id" => $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "id"))), "html", null, true);
                    echo "\"
                                               opened=\"";
                    // line 168
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "opened"), "html", null, true);
                    echo "\"
                                               mail_id=\"";
                    // line 169
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "id"), "html", null, true);
                    echo "\"
                                               class=\"line_icon
                                                ";
                    // line 171
                    if ($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "offer")) {
                        // line 172
                        echo "                                                    icon-offer
                                                ";
                    } else {
                        // line 174
                        echo "                                                  ";
                        if (($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "opened") == 1)) {
                            // line 175
                            echo "                                                    messageicon
                                                  ";
                        } else {
                            // line 177
                            echo "                                                    messageicon_new
                                                  ";
                        }
                        // line 179
                        echo "                                                ";
                    }
                    echo "\"></a>
                                        </div>

                                        <div class=\"clearfix\">
                                            <span class=\"date\"> ";
                    // line 183
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "datecreated"), "M d, Y - h:i a"), "html", null, true);
                    echo "</span><br>
                                                <span class=\"user_name bold_text_black\"
                                                      style=\"color: #000000;\">";
                    // line 185
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "remitentname"), "html", null, true);
                    if ($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "offer")) {
                        echo "'s Offer:";
                    }
                    echo "</span><br>
                                            ";
                    // line 186
                    if ($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "offer")) {
                        // line 187
                        echo "                                                <span class=\"blue_text\"
                                                      style=\"font-size: 14px \">\$";
                        // line 188
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "offertext")), "html", null, true);
                        echo "</span>
                                            ";
                    } else {
                        // line 190
                        echo "                                                ";
                        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "bodymail")) < 35)) {
                            // line 191
                            echo "                                                    <span style=\"font-size: 14px \">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "bodymail"), "html", null, true);
                            echo "...</span>
                                                ";
                        } else {
                            // line 193
                            echo "                                                    ";
                            $context["bodyMail"] = twig_split_filter($this->getAttribute((isset($context["emails_n"]) ? $context["emails_n"] : null), "bodymail"), "", 35);
                            // line 194
                            echo "                                                    <span style=\"font-size: 14px \">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bodyMail"]) ? $context["bodyMail"] : null), 0, array(), "array"), "html", null, true);
                            echo "...</span>
                                                ";
                        }
                        // line 196
                        echo "                                            ";
                    }
                    // line 197
                    echo "                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['emails_n'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 204
                echo "                        ";
                $context["count"] = ((isset($context["count"]) ? $context["count"] : null) + 3);
                // line 205
                echo "                    </div>
                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 207
            echo "            ";
        }
        // line 208
        echo "        </div>
    </div>
</div>
<div class=\"modal fade\" id=\"myModalInquiryListReply\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span
                            aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">Reply Form</h4>

                <div class=\"alert hide\" id=\"succes_reply\"
                     style=\"background-color: #0cffdd\">
                    <button type=\"button\" class=\"close\"
                            data-dismiss=\"alert\">&times;</button>

                    <strong>Succes!</strong> Your Email has been replied
                    succesfully....
                </div>
            </div>
            <div class=\"modal-body\">
                <div class=\"col-md-7 col-sm-8 col-xs-9\" style=\"padding-left: 0px !important;\">
                    <p>
                        <span class=\"bold_text_black\" id=\"remitent\"></span>
                    </p>
                </div>
                <div class=\"col-md-12 col-sm-12 col-xs-12 text-left\" id=\"content\"
                     style=\"max-resolution: 15px;padding-left: 0px !important;margin-top: 0px !important;\">
                </div>
                <form id=\"formListReply\" action=\"";
        // line 238
        echo $this->env->getExtension('routing')->getPath("save_inquiry_reply");
        echo "\"
                      method=\"POST\" class=\"form-horizontal\">
                    <div class=\"row\">
                        <div class=\"col-md-12 col-sm-12 col-xs-12\">Reply</div>
                        <div class=\"col-md-12 col-sm-12 col-xs-12\">
                            <textarea id=\"inquiryReply_text\" class=\"form-control description disabled\" rows=\"6\"
                                      maxlength=\"2000\" required=\"required\" name=\"inquiryReply[text]\"></textarea>
                        </div>
                    </div>

                    <input type=\"hidden\" id=\"id\" name=\"id\" value=\"\">
                </form>
            </div>
            <div class=\"modal-footer\">
                <div class=\"row\">
                    <div class=\"col-md-7 col-sm-7 col-xs-12\">
                        <div id=\"error\"></div>
                    </div>
                    <div class=\"col-md-5 col-sm-5 col-xs-12\">
                        <button type=\"button\" class=\"btn btn-default close-btn\" data-dismiss=\"modal\">Close
                        </button>
                        <button type=\"button\" class=\"btn btn-primary confirm-send\">Reply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=\"modal fade\" id=\"myModalInquiryListRead\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\" style=\"border-radius: 0px\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span
                            aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">Read Email</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\">
                    <div style=\"margin-left:15px;margin-right: 15px\">
                        <div class=\"borderBoxShadows col-md-12 col-xs-12 col-lg-12\"
                             style=\"background-color: white; padding:15px\">
                            <div class=\"col-md-3 no_padding\">
                                <div class=\"thumbnail\" style=\"margin-bottom: 10px;\">
                                    <div id=\"vehicle_image\"></div>
                                    <div class=\"clearfix\"></div>
                                    <div class=\"caption\" style=\"margin-bottom: 10px;padding-left: 0px;\">
                                        <p id=\"vehiclesinformation\" style='display: inline-block;margin-top: 10px'></p>

                                        <p id=\"vehiclesinformation1\"></p>

                                        ";
        // line 295
        echo "                                        <div class=\"thumbnail\" style=\"margin-bottom: 0px;margin-top: 10px\" id=\"image_user\">
                                            <div class=\"col-md-9 logo img-responsive\">

                                            </div>
                                            <div class=\"caption col-md-12 col-sm-12 col-xs-12\"
                                                 style=\"padding-left: 0px\"><a
                                                        href=\"\"
                                                        class=\"blue_text\"></a></div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class=\"col-md-9\">
                                <div class=\"col-md-7 col-sm-8 col-xs-9\">
                                    <p id=\"email_inf1\"></p>

                                    <p style=\"margin-top: 10px\" id=\"email_inf2\"></p>
                                </div>
                                <div class=\"col-md-12 col-sm-12 col-xs-12 text-left\"
                                     style=\"max-resolution: 15px;\" id=\"email_inf3\"></div>
                            </div>

                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <div class=\"row\">
                    <div class=\"col-md-7 col-sm-7 col-xs-12\">
                        <div id=\"error\"></div>
                    </div>
                    <div class=\"col-md-5 col-sm-5 col-xs-12\">
                        <button type=\"button\" class=\"btn btn-default close-btn\" data-dismiss=\"modal\">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type=\"text/javascript\">
    jQuery(document).ready(function () {

        jQuery('.read').click(function () {
            jQuery('#vehicle_image').html(jQuery(this).attr('image'));
            jQuery('#vehiclesinformation').html(jQuery(this).attr('vehiclesinformation'));
            jQuery('#vehiclesinformation1').html(jQuery(this).attr('vehiclesinformation1'));

            jQuery('#image_user .logo').css(\"background-image\",\"url('\"+ jQuery(this).attr('logo') +\"')\");
            jQuery('#image_user .caption a').attr(\"href\",jQuery(this).attr('linkto'));
            jQuery('#image_user .caption a').text(jQuery(this).attr('profilename'));
            jQuery('#email_inf1').html(jQuery(this).attr('email_inf1'));
            jQuery('#email_inf2').html(jQuery(this).attr('email_inf2'));
            jQuery('#email_inf3').html(jQuery(this).attr('email_inf3'));
        });

        jQuery('.reply').click(function () {
            jQuery(\"#succes_reply\").addClass(\"hide\");
            jQuery('#remitent').html(jQuery(this).attr('name') + ':');
            jQuery('#id').val(jQuery(this).attr('id'));
            if (jQuery(this).attr('body') != null && jQuery(this).attr('body') != '') {
                jQuery('#content').html('<span>' + jQuery(this).attr('body') + '</span>');
            } else {
                jQuery('#content').html(jQuery(this).attr('offer'));
            }
        });

        function disableFormReadReply() {
            jQuery('#myModalInquiryListReply #formListReply').find('textarea').attr('disabled', 'disabled')
            jQuery(\"#myModalInquiryListReply #formListReply\").css(\"opacity\", 0.37);
        }

        function enableFormReadReply() {
            jQuery('#myModalInquiryListReply #formListReply').find('textarea').val('');
            jQuery('#myModalInquiryListReply #formListReply').find('textarea').removeAttr('disabled');
            jQuery(\"#myModalInquiryListReply #formListReply\").css(\"opacity\", 1);
        }

        function submitFormReadReply() {

            jQuery.ajax({
                statusCode: {
                    500: function () {
                        jQuery(\"#succes_reply\").addClass(\"hide\");
                        jQuery('#myModalInquiryListReply #error').html(\"<span class='glyphicon glyphicon-warning-sign' style='margin-right:15px;color:#d9534f'></span><span class='text-danger'>There was an error, try again</span>\");
                    }
                },
                url: jQuery('#myModalInquiryListReply #formListReply').attr('action'),
                type: \"POST\",
                data: {id: jQuery(\"#id\").val(), text: jQuery('#myModalInquiryListReply #inquiryReply_text').val()},
                async: false,
                success: function (response) {
                    jQuery(\"#succes_reply\").removeClass(\"hide\");
                    enableFormReadReply();
                }
            });
        }

        jQuery('#myModalInquiryListReply .confirm-send').click(function (e) {
            validateFormReadReply();

        });
        jQuery('#myModalInquiryListReply').find('textarea').each(function () {
            jQuery(this).focusout(function () {
                jQuery(this).popover('destroy');
            });
        });
        function validateFormReadReply() {
            var bValid = true;
            bValid = bValid && checkLength(jQuery('#myModalInquiryListReply #inquiryReply_text'), 5, 500);
            if (bValid) {
                disableFormReadReply();
                submitFormReadReply();
            }
        }

        function checkLength(o, min, max) {
            if (o.val().length < min) {
                createPopover(o, 'Please fill out this field');
                return false;
            } else {
                return true;
            }
        }

        function createPopover(elem, text) {
            elem.attr('data-toggle', 'popover');
            elem.attr('data-placement', 'bottom');
            elem.attr('data-content', text);
            elem.attr('data-container', 'body');
            elem.popover();
            elem.trigger('click');
            elem.focus();
        }

        jQuery(\".previewbox\").mouseover(function () {
            jQuery(this).find(\".line_icon\").css(\"opacity\", 0.5);
            jQuery(this).find(\".email_buttons\").removeClass(\"hide\").fadeIn();
        });

        jQuery(\".previewbox\").mouseout(function () {
            jQuery(this).find(\".line_icon\").css(\"opacity\", 1);
            jQuery(this).find(\".email_buttons\").addClass(\"hide\");
        });


    });
</script>";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:user-inquiries.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  622 => 295,  568 => 238,  536 => 208,  533 => 207,  518 => 205,  515 => 204,  495 => 197,  492 => 196,  486 => 194,  483 => 193,  477 => 191,  474 => 190,  469 => 188,  466 => 187,  464 => 186,  457 => 185,  452 => 183,  444 => 179,  440 => 177,  436 => 175,  433 => 174,  429 => 172,  427 => 171,  422 => 169,  418 => 168,  414 => 167,  408 => 163,  403 => 161,  397 => 159,  395 => 158,  385 => 157,  380 => 154,  372 => 149,  369 => 148,  366 => 147,  358 => 142,  355 => 141,  352 => 140,  350 => 139,  338 => 130,  334 => 129,  328 => 128,  311 => 122,  299 => 120,  295 => 119,  291 => 118,  279 => 117,  259 => 115,  229 => 113,  215 => 108,  212 => 107,  188 => 105,  168 => 103,  165 => 102,  162 => 101,  159 => 100,  150 => 97,  147 => 96,  135 => 92,  132 => 91,  129 => 90,  126 => 89,  123 => 88,  112 => 84,  89 => 65,  87 => 64,  80 => 60,  114 => 85,  111 => 37,  98 => 72,  93 => 33,  56 => 15,  53 => 14,  39 => 10,  37 => 9,  30 => 7,  26 => 6,  305 => 121,  298 => 201,  288 => 194,  271 => 116,  260 => 172,  250 => 165,  233 => 114,  223 => 144,  213 => 137,  202 => 129,  146 => 82,  138 => 93,  120 => 87,  97 => 48,  92 => 46,  67 => 32,  61 => 29,  28 => 8,  29 => 9,  185 => 104,  178 => 101,  170 => 104,  156 => 99,  154 => 90,  144 => 95,  134 => 76,  130 => 75,  110 => 57,  101 => 35,  90 => 47,  83 => 43,  70 => 36,  65 => 33,  63 => 32,  19 => 1,  251 => 96,  246 => 95,  243 => 94,  238 => 87,  232 => 80,  226 => 75,  201 => 30,  195 => 106,  191 => 26,  187 => 117,  183 => 24,  179 => 23,  175 => 22,  171 => 21,  166 => 20,  163 => 94,  157 => 17,  153 => 98,  149 => 15,  145 => 14,  141 => 94,  136 => 11,  131 => 10,  128 => 9,  122 => 7,  117 => 86,  106 => 98,  104 => 52,  96 => 88,  94 => 87,  86 => 81,  84 => 80,  78 => 26,  76 => 75,  50 => 52,  47 => 12,  42 => 9,  36 => 7,  34 => 6,  27 => 7,  99 => 23,  91 => 32,  85 => 41,  79 => 15,  77 => 40,  72 => 22,  69 => 33,  62 => 17,  55 => 26,  49 => 6,  44 => 19,  41 => 18,  33 => 8,);
    }
}
