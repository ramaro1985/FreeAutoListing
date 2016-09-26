<?php

/* AppBundle:FAL:cars-compare-content.html.twig */
class __TwigTemplate_0fc92f4b2acc827dd4c4ae81ca2b9dafdb72ace32777a2124351a80400caf7d6 extends Twig_Template
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
        echo "<div style=\"width: 100%;background-color:#f4f4f4 \">

<div class=\"container\">
<div id=\"main\" class=\"col-md-12\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"secondNav\">
                <h1 style=\"font-size: 18px;\">Compare these vehicles</h1>
            </div>
        </div>
        <div class=\"col-md-6 text-right\" style=\"margin-top: 20px;\">
            <a href=\"#\" style=\"text-decoration: none;\"><i
                        class=\"glyphicon glyphicon-print\"></i> Printeable version</a>
        </div>
    </div>
</div>
";
        // line 17
        $context["counter"] = 0;
        // line 18
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 19
            echo "    ";
            $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
            // line 20
            echo "    ";
            $context["vehicleoptions"] = $this->getAttribute((isset($context["form_vehicle1_options"]) ? $context["form_vehicle1_options"] : null), "vehiclesoptions");
        }
        // line 22
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 23
            echo "    ";
            $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
            // line 24
            echo "    ";
            $context["vehicleoptions"] = $this->getAttribute((isset($context["form_vehicle2_options"]) ? $context["form_vehicle2_options"] : null), "vehiclesoptions");
        }
        // line 26
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 27
            echo "    ";
            $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
            // line 28
            echo "    ";
            $context["vehicleoptions"] = $this->getAttribute((isset($context["form_vehicle3_options"]) ? $context["form_vehicle3_options"] : null), "vehiclesoptions");
        }
        // line 30
        $context["columnwidth"] = (80 / (isset($context["counter"]) ? $context["counter"] : null));
        echo "<!-- 80 couse the first column have width 20 -->
<form action=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("compare_cars");
        echo "\" method=\"POST\">
<div class=\"container-fluid\">
<div class=\"table-responsive\">
<table class=\"table table-bordered table-hover\" style=\"background-color: white\">
<th valign=\"top\"
    style=\"border-left-color: transparent;border-top-color:transparent;width: 20%;background-color: #ffffff \">
                        <span>Back to <a style=\"text-decoration: underline;\" href=\"javascript:history.back(-1);\">search
                                result</a></span>
</th>
";
        // line 40
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 41
            echo "    <input type=\"hidden\" id=\"image-0\" name=\"image-0\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "serie"), "html", null, true);
            echo "\"/>
    <input type=\"hidden\" id=\"image-0_imagesrc\" name=\"image-0_imagesrc\"
           value=\"";
            // line 43
            echo twig_escape_filter($this->env, (isset($context["vehicle1image"]) ? $context["vehicle1image"] : null), "html", null, true);
            echo "\"/>
    <th id=\"1\" style=\"border-top-color:transparent; background-color: white;width: ";
            // line 44
            echo twig_escape_filter($this->env, (isset($context["columnwidth"]) ? $context["columnwidth"] : null), "html", null, true);
            echo "%\">
        <button id=\"remove1\"
                onclick=\"document.getElementById('image-0').setAttribute('value','')\"
                type=\"submit\" class=\"btn btn-primary\"
                style=\"margin-left: 5px; background-color: lightgrey;border-color:transparent;color: #1F1F1F;border-radius: 0px\">
            Remove
        </button>
        <br/>

        <div class=\"thumbnail\" style=\"margin-bottom: 5px !important;\">
            <img src=\"";
            // line 54
            echo twig_escape_filter($this->env, (isset($context["vehicle1image"]) ? $context["vehicle1image"] : null), "html", null, true);
            echo "\"/>
        </div>
        <div style=\"margin-bottom: 5px !important;\">
            <a href=\"javascript:void(0)\" id=\"email1\" class=\"btn btn-primary\"
               data-toggle=\"modal\"
               data-target=\"#myModalCar\"
               style=\"margin-left: 5px; background-color: #cb2020;border-color:transparent;color: white;border-radius: 0px;padding: 6px 25px;\">
                Email Owner
            </a>
        </div>
        <div style=\"margin-bottom: 5px !important;\">
            <button id=\"save1\" class=\"btn btn-primary\"
                    style=\"margin-left: 5px; background-color: transparent;border-color:#f4f4f4;color: #1F1F1F;border-radius: 4px\">
                Save this car
            </button>
        </div>
    </th>
";
        }
        // line 72
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 73
            echo "    <input type=\"hidden\" id=\"image-1\" name=\"image-1\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "serie"), "html", null, true);
            echo "\"/>
    <input type=\"hidden\" id=\"image-1_imagesrc\" name=\"image-1_imagesrc\"
           value=\"";
            // line 75
            echo twig_escape_filter($this->env, (isset($context["vehicle2image"]) ? $context["vehicle2image"] : null), "html", null, true);
            echo "\"/>
    <th style=\"border-top-color:transparent; background-color: white;width: ";
            // line 76
            echo twig_escape_filter($this->env, (isset($context["columnwidth"]) ? $context["columnwidth"] : null), "html", null, true);
            echo "%\">
        <button onclick=\"document.getElementById('image-1').setAttribute('value','')\"
                type=\"submit\" class=\"btn btn-primary\"
                style=\"margin-left: 5px; background-color: lightgrey;border-color:transparent;color: #1F1F1F;border-radius: 0px\">
            Remove
        </button>
        <br/>

        <div class=\"thumbnail\" style=\"margin-bottom: 5px !important;\">
            <img src=\"";
            // line 85
            echo twig_escape_filter($this->env, (isset($context["vehicle2image"]) ? $context["vehicle2image"] : null), "html", null, true);
            echo "\"/>
        </div>
        <div style=\"margin-bottom: 5px !important;\">
            <a href=\"javascript:void(0)\" id=\"email2\" class=\"btn btn-primary\"
               data-toggle=\"modal\"
               data-target=\"#myModalCar\"
               style=\"margin-left: 5px; background-color: #cb2020;border-color:transparent;color: white;border-radius: 0px;padding: 6px 25px;\">
                Email Owner
            </a>
        </div>
        <div style=\"margin-bottom: 5px !important;\">
            <button id=\"save2\" class=\"btn btn-primary\"
                    style=\"margin-left: 5px; background-color: transparent;border-color:#f4f4f4;color: #1F1F1F;border-radius: 4px\">
                Save this car
            </button>
        </div>
    </th>
";
        }
        // line 103
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 104
            echo "    <input type=\"hidden\" id=\"image-2\" name=\"image-2\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "serie"), "html", null, true);
            echo "\"/>
    <input type=\"hidden\" id=\"image-2_imagesrc\" name=\"image-2_imagesrc\"
           value=\"";
            // line 106
            echo twig_escape_filter($this->env, (isset($context["vehicle3image"]) ? $context["vehicle3image"] : null), "html", null, true);
            echo "\"/>
    <th style=\"border-top-color:transparent; background-color: white\">
        <button id=\"remvove3\"
                onclick=\"document.getElementById('image-2').setAttribute('value','')\"
                type=\"submit\" class=\"btn btn-primary\"
                style=\"margin-left: 5px; background-color: lightgrey;border-color:transparent;color: #1F1F1F;border-radius: 0px\">
            Remove
        </button>
        <br/>

        <div class=\"thumbnail\" style=\"margin-bottom: 5px !important;\">
            <img src=\"";
            // line 117
            echo twig_escape_filter($this->env, (isset($context["vehicle3image"]) ? $context["vehicle3image"] : null), "html", null, true);
            echo "\"/>
        </div>
        <a href=\"javascript:void(0)\" id=\"email3\" class=\"btn btn-primary\"
           data-toggle=\"modal\"
           data-target=\"#myModalCar\"
           style=\"margin-bottom: 5px;margin-left: 5px; background-color: #cb2020;border-color:transparent;color: white;border-radius: 0px;padding: 6px 25px;\">
            Email Owner
        </a>

        <div style=\"margin-bottom: 5px !important;\">
            <button id=\"save3\" class=\"btn btn-primary\"
                    style=\"margin-left: 5px; background-color: transparent;border-color:#f4f4f4;color: #1F1F1F;border-radius: 4px\">
                Save this car
            </button>
        </div>

    </th>
";
        }
        // line 135
        echo "<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Description
    </td>
    ";
        // line 139
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 140
            echo "        <td style=\"text-decoration: underline;color:#337ab7; \">
            ";
            // line 141
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "year"), "year"), "html", null, true);
            echo "
            ";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "make"), "makeDisplay"), "html", null, true);
            echo "
            ";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "model"), "modelDisplay"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 146
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 147
            echo "        <td style=\"text-decoration: underline;color:#337ab7; \">
            ";
            // line 148
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "year"), "year"), "html", null, true);
            echo "
            ";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "make"), "makeDisplay"), "html", null, true);
            echo "
            ";
            // line 150
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "model"), "modelDisplay"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 153
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 154
            echo "        <td style=\"text-decoration: underline;color:#337ab7; \">
            ";
            // line 155
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "year"), "year"), "html", null, true);
            echo "
            ";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "make"), "makeDisplay"), "html", null, true);
            echo "
            ";
            // line 157
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "model"), "modelDisplay"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 160
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Stock
        #
    </td>
    ";
        // line 166
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 167
            echo "        <td>
            ";
            // line 168
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "getStockNumber", array(), "method"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 171
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 172
            echo "        <td>
            ";
            // line 173
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "getStockNumber", array(), "method"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 176
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 177
            echo "        <td>
            ";
            // line 178
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "getStockNumber", array(), "method"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 181
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Exterior
        Color
    </td>
    ";
        // line 187
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 188
            echo "        <td>
            ";
            // line 189
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesdetails"), "exteriorcolor"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 192
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 193
            echo "        <td>
            ";
            // line 194
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesdetails"), "exteriorcolor"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 197
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 198
            echo "        <td>
            ";
            // line 199
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesdetails"), "exteriorcolor"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 202
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Interior
        Color
    </td>
    ";
        // line 208
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 209
            echo "        <td>
            ";
            // line 210
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesdetails"), "interiorcolor"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 213
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 214
            echo "        <td>
            ";
            // line 215
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesdetails"), "interiorcolor"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 218
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 219
            echo "        <td>
            ";
            // line 220
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesdetails"), "interiorcolor"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 223
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Mileage
    </td>
    ";
        // line 228
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 229
            echo "        <td>
            ";
            // line 230
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "mileage"), "html", null, true);
            echo "M
        </td>
    ";
        }
        // line 233
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 234
            echo "        <td>
            ";
            // line 235
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "mileage"), "html", null, true);
            echo "M
        </td>
    ";
        }
        // line 238
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 239
            echo "        <td>
            ";
            // line 240
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "mileage"), "html", null, true);
            echo "M
        </td>
    ";
        }
        // line 243
        echo "</tr>
<tr>
    <td style=\"padding: 15px; font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Price
        *
    </td>
    ";
        // line 249
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 250
            echo "        <td style=\"padding: 15px;font-weight: 700;\">
            \$";
            // line 251
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "price")), "html", null, true);
            echo " *
        </td>
    ";
        }
        // line 254
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 255
            echo "        <td style=\"padding: 15px;font-weight: 700;\">
            \$";
            // line 256
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "price")), "html", null, true);
            echo " *
        </td>
    ";
        }
        // line 259
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 260
            echo "        <td style=\"padding: 15px;font-weight: 700;\">
            \$";
            // line 261
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "price")), "html", null, true);
            echo " *
        </td>
    ";
        }
        // line 264
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">MSRP
        (new)
    </td>
    ";
        // line 269
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 270
            echo "
        ";
            // line 271
            if ((null === $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "msrp"))) {
                // line 272
                echo "            <td>
                N/A
            </td>
        ";
            } else {
                // line 276
                echo "            <td>
                \$";
                // line 277
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "msrp")), "html", null, true);
                echo "
            </td>
        ";
            }
            // line 280
            echo "
    ";
        }
        // line 282
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 283
            echo "
        ";
            // line 284
            if ((null === $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "msrp"))) {
                // line 285
                echo "            <td>
                N/A
            </td>
        ";
            } else {
                // line 289
                echo "            <td>
                \$";
                // line 290
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "msrp")), "html", null, true);
                echo "
            </td>
        ";
            }
            // line 293
            echo "
    ";
        }
        // line 295
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 296
            echo "
        ";
            // line 297
            if ((null === $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "msrp"))) {
                // line 298
                echo "            <td>
                N/A
            </td>
        ";
            } else {
                // line 302
                echo "            <td>
                \$";
                // line 303
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "msrp")), "html", null, true);
                echo "
            </td>
        ";
            }
            // line 306
            echo "
    ";
        }
        // line 308
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Vehicle's Location
    </td>
    ";
        // line 313
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 314
            echo "        <td>
            ";
            // line 315
            if ((!(null === $this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "profile")))) {
                // line 316
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "profile"), "description"), "address"), "html", null, true);
                echo "
            ";
            } else {
                // line 318
                echo "                -
            ";
            }
            // line 320
            echo "        </td>
    ";
        }
        // line 322
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 323
            echo "        <td>
            ";
            // line 324
            if ((!(null === $this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "profile")))) {
                // line 325
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "profile"), "description"), "address"), "html", null, true);
                echo "
            ";
            } else {
                // line 327
                echo "                -
            ";
            }
            // line 329
            echo "
        </td>
    ";
        }
        // line 332
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 333
            echo "        <td>
            ";
            // line 334
            if ((!(null === $this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "profile")))) {
                // line 335
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "profile"), "description"), "address"), "html", null, true);
                echo "
            ";
            } else {
                // line 337
                echo "                -
            ";
            }
            // line 339
            echo "
        </td>
    ";
        }
        // line 342
        echo "</tr>
<tr>
    <td class=\"title\" style=\"background-color: #585858\">
        <h3 style=\"margin-top: 10px; font-size: 18px\">Specifications</h3>
    </td>
    <td style=\"background-color: #585858\" colspan=\"";
        // line 347
        echo twig_escape_filter($this->env, (isset($context["counter"]) ? $context["counter"] : null), "html", null, true);
        echo "\" class=\"title\"></td>
</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Engine
    </td>
    ";
        // line 353
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 354
            echo "        <td>
            ";
            // line 355
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesdetails"), "enginetype"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 358
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 359
            echo "        <td>
            ";
            // line 360
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesdetails"), "enginetype"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 363
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 364
            echo "        <td>
            ";
            // line 365
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesdetails"), "enginetype"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 368
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Doors/Body
    </td>
    ";
        // line 373
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 374
            echo "        <td>
            ";
            // line 375
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesdetails"), "doors"), "html", null, true);
            echo "
            ";
            // line 376
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "bodyStyle"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 379
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 380
            echo "        <td>
            ";
            // line 381
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesdetails"), "doors"), "html", null, true);
            echo "
            ";
            // line 382
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "bodyStyle"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 385
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 386
            echo "        <td>
            ";
            // line 387
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesdetails"), "doors"), "html", null, true);
            echo "
            ";
            // line 388
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "bodyStyle"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 391
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Drive
    </td>
    ";
        // line 396
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 397
            echo "        <td>
            ";
            // line 398
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesdetails"), "drive"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 401
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 402
            echo "        <td>
            ";
            // line 403
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesdetails"), "drive"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 406
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 407
            echo "        <td>
            ";
            // line 408
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesdetails"), "drive"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 411
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">
        Transmission
    </td>
    ";
        // line 416
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 417
            echo "        <td>
            ";
            // line 418
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesdetails"), "transmission"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 421
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 422
            echo "        <td>
            ";
            // line 423
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesdetails"), "transmission"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 426
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 427
            echo "        <td>
            ";
            // line 428
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesdetails"), "transmission"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 431
        echo "</tr>
<tr>
    <td style=\"font-weight: 700; background-color: #f4f4f4; border-left-color: transparent\">Fuel
        type
    </td>
    ";
        // line 436
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 437
            echo "        <td>
            ";
            // line 438
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesdetails"), "fueltype"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 441
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 442
            echo "        <td>
            ";
            // line 443
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesdetails"), "fueltype"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 446
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 447
            echo "        <td>
            ";
            // line 448
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesdetails"), "fueltype"), "name"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 451
        echo "</tr>
<tr>
    <td class=\"title\" style=\"background-color: #585858\">
        <h3 style=\"margin-top: 10px; font-size: 18px\">Equipment</h3>
    </td>
    <td style=\"background-color: #585858\" colspan=\"";
        // line 456
        echo twig_escape_filter($this->env, (isset($context["counter"]) ? $context["counter"] : null), "html", null, true);
        echo "\" class=\"title\"></td>
</tr>
";
        // line 458
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["vehicleoptions"]) ? $context["vehicleoptions"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["vo"]) {
            // line 459
            echo "    <tr>
        <td style=\"background-color: #f4f4f4; border-left-color: transparent\">
            ";
            // line 461
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["vo"]) ? $context["vo"] : null), 'label');
            echo "
        </td>
        ";
            // line 463
            if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
                // line 464
                echo "            <td>
                <span hidden=\"\">";
                // line 465
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form_vehicle1_options"]) ? $context["form_vehicle1_options"] : null), "vehiclesoptions"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), array(), "array"), 'widget');
                echo "</span>
                <span class=\"glyphicon glyphicon-ok arrow hide\"></span>
            </td>
        ";
            }
            // line 469
            echo "        ";
            if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
                // line 470
                echo "            <td>
                <span hidden=\"\">";
                // line 471
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form_vehicle2_options"]) ? $context["form_vehicle2_options"] : null), "vehiclesoptions"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), array(), "array"), 'widget');
                echo "</span>
                <span class=\"glyphicon glyphicon-ok arrow hide\"></span>
            </td>
        ";
            }
            // line 475
            echo "        ";
            if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
                // line 476
                echo "            <td>
                <span hidden=\"\">";
                // line 477
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form_vehicle3_options"]) ? $context["form_vehicle3_options"] : null), "vehiclesoptions"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), array(), "array"), 'widget');
                echo "</span>
                <span class=\"glyphicon glyphicon-ok arrow hide\"></span>
            </td>
        ";
            }
            // line 481
            echo "    </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 483
        echo "<tr>
    <td class=\"title\" style=\"background-color: #585858\">
        <h3 style=\"margin-top: 10px; font-size: 18px\">Seller Comments</h3>
    </td>
    <td style=\"background-color: #585858\" colspan=\"";
        // line 487
        echo twig_escape_filter($this->env, (isset($context["counter"]) ? $context["counter"] : null), "html", null, true);
        echo "\" class=\"title\"></td>
</tr>
<tr>
    <td style=\"border-left-color: transparent;border-bottom-color: transparent;background-color: #f4f4f4;\"></td>
    ";
        // line 491
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 492
            echo "        <td>
            ";
            // line 493
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "sellerComments"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 496
        echo "    ";
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 497
            echo "        <td>
            ";
            // line 498
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "SellerComments"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 501
        echo "    ";
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 502
            echo "        <td>
            ";
            // line 503
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "SellerComments"), "html", null, true);
            echo "
        </td>
    ";
        }
        // line 506
        echo "</tr>
</table>
</div>
</div>
</form>
</div>
</div>
<div class=\"modal fade\" id=\"myModalCar\" tabindex=\"-1\" role=\"dialog\"
     aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" style=\"max-width: 400px;\">
        <div class=\"modal-content\">
            <div class=\"modal-header\" style=\"background-color: lightgrey\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">Send Email</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"container-fluid\">
                    <form id=\"form-description\"

                          method=\"POST\"
                          class=\"form-horizontal\">
                        <fieldset>
                            <div class=\"col-md-12\" style=\"padding: 0px 33px;\">
                                <div class=\"\">
                                    <br>
                                    <br>

                                    <div class=\"form-group no_padding\">
                                        <ul class=\"no_padding list-unstyled\">
                                            <li>
                                                <span id=\"price_veh\"
                                                      style=\"font-size: 16px;font-weight: bold; font-style: inherit;\"></span>
                                            </li>
                                            <li>
                                                <span id=\"description_veh\" style=\"font-size: 14px;\"></span>
                                            </li>
                                            <li>
                                                <span id=\"mileage_veh\" style=\"font-size: 14px;\"></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class=\"form-group\">
                                        ";
        // line 549
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_email"]) ? $context["form_email"] : null), "remitent_name"), 'widget');
        echo "
                                    </div>
                                    <div class=\"form-group\">
                                        ";
        // line 552
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_email"]) ? $context["form_email"] : null), "remitent_mail"), 'widget');
        echo "
                                    </div>
                                    <div class=\"form-group\">
                                        ";
        // line 555
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_email"]) ? $context["form_email"] : null), "remitent_phone"), 'widget');
        echo "
                                    </div>
                                    <div class=\"form-group\">
                                        ";
        // line 558
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_email"]) ? $context["form_email"] : null), "body_mail"), 'widget');
        echo "
                                    </div>
                                    <div class=\"form-group\">
                                        <div class=\"row hide\" id=\"loadingOff\"
                                             style=\"margin-left: 2px\">
                                            <img id=\"loading\"
                                                 src=\"";
        // line 564
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/common/images/loading.gif"), "html", null, true);
        echo "\"
                                                 style=\"font-size:12px;  border: 0 none;\"
                                                 class=\"\">
                                            &nbsp; Sending
                                            Message...
                                        </div>
                                    </div>
                                    <div class=\"form-group\">
                                        <br>
                                        <br>
                                        <input type=\"hidden\" id=\"vehicle_serie\" name=\"vehicle_serie\" value=\"\">

                                        <div class=\"col-md-9 col-sm-9 col-xs-9\"
                                             style=\"padding-left: 0px\">
                                            <a href=\"javascript:void(0)\" id=\"submit_email\"
                                               class=\"btn btn-default btn-block text-uppercase btn-danger col-md-7\">
                                                SEND EMAIL
                                            </a>
                                        </div>
                                        <div class=\"col-md-2 col-sm-2 col-xs-2\"
                                             style=\"padding-left: 0px\">
                                            <button type=\"button\"
                                                    class=\"btn btn-toolbar close-btn text-uppercase\"
                                                    data-dismiss=\"modal\"
                                                    style=\"background-color: white;color: blue;\">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
        // line 595
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_email"]) ? $context["form_email"] : null), 'rest');
        echo "
                            <br>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type=\"text/javascript\">

    jQuery(document).ready(function () {

        jQuery(\"input:checked\").each(function () {
            jQuery(this).parent().next().removeClass(\"hide\");
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

        function disableForm() {
            jQuery('#form-description').find('input ,button, textarea').attr('disabled', 'disabled')
            jQuery(\"#form-description\").css(\"opacity\", 0.37);
            jQuery(\"#loadingOff\").removeClass(\"hide\");
            jQuery(\"#succes_mess\").addClass(\"hide\");
        }

        function resetForm() {
            jQuery('#form-description').find('input, textarea').val('');
        }

        function enableForm() {
            jQuery('#form-description').find('input , button, textarea').removeAttr('disabled')
            jQuery(\"#form-description\").css(\"opacity\", 1);
        }

        function checkSelected(o) {
            if (o.val() == 0) {
                createPopover(o, 'Please fill out this field');
                return false;
            } else {
                return true;
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

        function checkRegexp(o, regexp) {
            if (!( regexp.test(o.val()) )) {
                createPopover(o, 'Invalid field');
                return false;
            } else {
                return true;
            }
        }

        function validateForm() {
            var bValid = true;
            bValid = bValid && checkSelected(jQuery('#email_remitent_name'));
            bValid = bValid && checkLength(jQuery('#email_remitent_name'), 4, 100);
            bValid = bValid && checkSelected(jQuery('#email_remitent_mail'));
            bValid = bValid && checkSelected(jQuery('#email_body_mail'));
            bValid = bValid && checkLength(jQuery('#email_body_mail'), 2, 240);
            bValid = bValid && checkLength(jQuery('#email_remitent_mail'), 4, 100);
            bValid = bValid && checkRegexp(jQuery('#email_remitent_mail'), /^((([a-z]|\\d|[!#\\\$%&'\\*\\+\\-\\/=\\?\\^_`{\\|}~]|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])+(\\.([a-z]|\\d|[!#\\\$%&'\\*\\+\\-\\/=\\?\\^_`{\\|}~]|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])+)*)|((\\x22)((((\\x20|\\x09)*(\\x0d\\x0a))?(\\x20|\\x09)+)?(([\\x01-\\x08\\x0b\\x0c\\x0e-\\x1f\\x7f]|\\x21|[\\x23-\\x5b]|[\\x5d-\\x7e]|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])|(\\\\([\\x01-\\x09\\x0b\\x0c\\x0d-\\x7f]|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF]))))*(((\\x20|\\x09)*(\\x0d\\x0a))?(\\x20|\\x09)+)?(\\x22)))@((([a-z]|\\d|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])|(([a-z]|\\d|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])([a-z]|\\d|-|\\.|_|~|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])*([a-z]|\\d|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])))\\.)+(([a-z]|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])|(([a-z]|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])([a-z]|\\d|-|\\.|_|~|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])*([a-z]|[\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF])))\\.?\$/i);

            if (bValid) {
                disableForm();
                submitForm();
            }
        }

        var price = 'Listed Price: \$';
        var milage = 'Milage: ';
        var name = null;
        var yearr = null;
        var makee = null;
        var modell = null;
        ";
        // line 687
        $context["serie"] = "";
        // line 688
        echo "
        ";
        // line 689
        if ((array_key_exists("vehicle1", $context) && (!(null === (isset($context["vehicle1"]) ? $context["vehicle1"] : null))))) {
            // line 690
            echo "        jQuery('#email1').click(function () {
            name = \"";
            // line 691
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "condition"), "name")), "html", null, true);
            echo " \";
            yearr = \"";
            // line 692
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "year"), "year")), "html", null, true);
            echo " \";
            makee = \"";
            // line 693
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "make"), "makeDisplay")), "html", null, true);
            echo " \";
            modell = \"";
            // line 694
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "model"), "modelDisplay")), "html", null, true);
            echo "\";
            jQuery('#price_veh').text(price +";
            // line 695
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "price"), "html", null, true);
            echo ");
            jQuery('#description_veh').text(name + yearr + makee + modell);
            jQuery('#mileage_veh').text(\"Milage: \" + \"";
            // line 697
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "vehiclesinformation"), "mileage"), "html", null, true);
            echo "\");

            //jQuery('#vehicle_serie').val(";
            // line 699
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "serie"), "html", null, true);
            echo ");

            ";
            // line 701
            $context["serie"] = $this->getAttribute((isset($context["vehicle1"]) ? $context["vehicle1"] : null), "serie");
            // line 702
            echo "        });
        ";
        }
        // line 704
        echo "
        ";
        // line 705
        if ((array_key_exists("vehicle2", $context) && (!(null === (isset($context["vehicle2"]) ? $context["vehicle2"] : null))))) {
            // line 706
            echo "        jQuery('#email2').click(function () {
            name = \"";
            // line 707
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "condition"), "name")), "html", null, true);
            echo " \";
            yearr = \"";
            // line 708
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "year"), "year")), "html", null, true);
            echo " \";
            makee = \"";
            // line 709
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "make"), "makeDisplay")), "html", null, true);
            echo " \";
            modell = \"";
            // line 710
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "model"), "modelDisplay")), "html", null, true);
            echo "\";
            jQuery('#price_veh').text(price +";
            // line 711
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "price"), "html", null, true);
            echo ");
            jQuery('#description_veh').text(name + yearr + makee + modell);
            jQuery('#mileage_veh').text(\"Milage: \" + \"";
            // line 713
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "vehiclesinformation"), "mileage"), "html", null, true);
            echo "\");

            //jQuery('#vehicle_serie').val(";
            // line 715
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "serie"), "html", null, true);
            echo ");
            ";
            // line 716
            $context["serie"] = $this->getAttribute((isset($context["vehicle2"]) ? $context["vehicle2"] : null), "serie");
            // line 717
            echo "        });
        ";
        }
        // line 719
        echo "
        ";
        // line 720
        if ((array_key_exists("vehicle3", $context) && (!(null === (isset($context["vehicle3"]) ? $context["vehicle3"] : null))))) {
            // line 721
            echo "        jQuery('#email3').click(function () {
            name = \"";
            // line 722
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "condition"), "name")), "html", null, true);
            echo " \";
            yearr = \"";
            // line 723
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "year"), "year")), "html", null, true);
            echo " \";
            makee = \"";
            // line 724
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "make"), "makeDisplay")), "html", null, true);
            echo " \";
            modell = \"";
            // line 725
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "model"), "modelDisplay")), "html", null, true);
            echo "\";
            jQuery('#price_veh').text(price +";
            // line 726
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "price"), "html", null, true);
            echo ");
            jQuery('#description_veh').text(name + yearr + makee + modell);
            jQuery('#mileage_veh').text(\"Milage: \" + \"";
            // line 728
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "vehiclesinformation"), "mileage"), "html", null, true);
            echo "\");

            //jQuery('#vehicle_serie').val(";
            // line 730
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "serie"), "html", null, true);
            echo ");
            ";
            // line 731
            $context["serie"] = $this->getAttribute((isset($context["vehicle3"]) ? $context["vehicle3"] : null), "serie");
            // line 732
            echo "        });
        ";
        }
        // line 734
        echo "
        function submitForm() {

            var remitent_mail;
            var remitent_phone;
            var remitent_name;
            var body_mail;
            var offer_text;

            remitent_name = jQuery('#email_remitent_name').val();
            remitent_mail = jQuery('#email_remitent_mail').val();
            remitent_phone = jQuery('#email_remitent_phone').val();
            body_mail = jQuery('#email_body_mail').val();

            jQuery.ajax({
                url: \"";
        // line 749
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("car_details", array("serie" => (isset($context["serie"]) ? $context["serie"] : null))), "html", null, true);
        echo "\",
                type: \"POST\",
                data: {
                    formulario: 'mail',
                    remitent_name: remitent_name,
                    remitent_mail: remitent_mail,
                    remitent_phone: remitent_phone,
                    body_mail: body_mail,
                    compare_car: true
                },
                async: false,
                success: function () {
                    resetForm();
                    enableForm();

                    jQuery(\"#loadingOff\").addClass(\"hide\");
                    jQuery(\"#myModalCar\").modal('destroy');
                }
            });
        }

        jQuery('#submit_email').click(function () {
            validateForm();
        })

    });

</script>";
    }

    public function getTemplateName()
    {
        return "AppBundle:FAL:cars-compare-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1379 => 749,  1362 => 734,  1358 => 732,  1356 => 731,  1352 => 730,  1347 => 728,  1342 => 726,  1338 => 725,  1334 => 724,  1330 => 723,  1326 => 722,  1323 => 721,  1321 => 720,  1318 => 719,  1314 => 717,  1312 => 716,  1308 => 715,  1303 => 713,  1298 => 711,  1294 => 710,  1290 => 709,  1286 => 708,  1282 => 707,  1279 => 706,  1277 => 705,  1274 => 704,  1270 => 702,  1268 => 701,  1263 => 699,  1258 => 697,  1253 => 695,  1249 => 694,  1245 => 693,  1241 => 692,  1237 => 691,  1234 => 690,  1232 => 689,  1229 => 688,  1227 => 687,  1132 => 595,  1098 => 564,  1089 => 558,  1083 => 555,  1077 => 552,  1071 => 549,  1026 => 506,  1020 => 503,  1017 => 502,  1014 => 501,  1008 => 498,  1005 => 497,  1002 => 496,  996 => 493,  993 => 492,  991 => 491,  984 => 487,  978 => 483,  963 => 481,  956 => 477,  953 => 476,  950 => 475,  943 => 471,  940 => 470,  937 => 469,  930 => 465,  927 => 464,  925 => 463,  920 => 461,  916 => 459,  899 => 458,  894 => 456,  887 => 451,  881 => 448,  878 => 447,  875 => 446,  869 => 443,  866 => 442,  863 => 441,  857 => 438,  854 => 437,  852 => 436,  845 => 431,  839 => 428,  836 => 427,  833 => 426,  827 => 423,  824 => 422,  821 => 421,  815 => 418,  812 => 417,  810 => 416,  803 => 411,  797 => 408,  794 => 407,  791 => 406,  785 => 403,  782 => 402,  779 => 401,  773 => 398,  770 => 397,  768 => 396,  761 => 391,  755 => 388,  751 => 387,  748 => 386,  745 => 385,  739 => 382,  735 => 381,  732 => 380,  729 => 379,  723 => 376,  719 => 375,  716 => 374,  714 => 373,  707 => 368,  701 => 365,  698 => 364,  695 => 363,  689 => 360,  686 => 359,  683 => 358,  677 => 355,  674 => 354,  672 => 353,  663 => 347,  656 => 342,  651 => 339,  647 => 337,  641 => 335,  639 => 334,  636 => 333,  633 => 332,  628 => 329,  624 => 327,  618 => 325,  616 => 324,  613 => 323,  610 => 322,  606 => 320,  602 => 318,  596 => 316,  594 => 315,  591 => 314,  589 => 313,  582 => 308,  578 => 306,  572 => 303,  569 => 302,  563 => 298,  561 => 297,  558 => 296,  555 => 295,  551 => 293,  545 => 290,  542 => 289,  536 => 285,  534 => 284,  531 => 283,  528 => 282,  524 => 280,  518 => 277,  515 => 276,  509 => 272,  507 => 271,  504 => 270,  502 => 269,  495 => 264,  489 => 261,  486 => 260,  483 => 259,  477 => 256,  474 => 255,  471 => 254,  465 => 251,  462 => 250,  460 => 249,  452 => 243,  446 => 240,  443 => 239,  440 => 238,  434 => 235,  431 => 234,  428 => 233,  422 => 230,  419 => 229,  417 => 228,  410 => 223,  404 => 220,  401 => 219,  398 => 218,  392 => 215,  389 => 214,  386 => 213,  380 => 210,  377 => 209,  375 => 208,  367 => 202,  361 => 199,  358 => 198,  355 => 197,  349 => 194,  346 => 193,  343 => 192,  337 => 189,  334 => 188,  332 => 187,  324 => 181,  318 => 178,  315 => 177,  312 => 176,  306 => 173,  303 => 172,  300 => 171,  294 => 168,  291 => 167,  289 => 166,  281 => 160,  275 => 157,  271 => 156,  267 => 155,  264 => 154,  261 => 153,  255 => 150,  251 => 149,  247 => 148,  244 => 147,  241 => 146,  235 => 143,  231 => 142,  227 => 141,  224 => 140,  222 => 139,  216 => 135,  195 => 117,  181 => 106,  175 => 104,  173 => 103,  152 => 85,  140 => 76,  136 => 75,  130 => 73,  128 => 72,  107 => 54,  94 => 44,  90 => 43,  84 => 41,  82 => 40,  70 => 31,  66 => 30,  62 => 28,  59 => 27,  57 => 26,  53 => 24,  50 => 23,  48 => 22,  44 => 20,  39 => 18,  37 => 17,  19 => 1,  78 => 17,  75 => 16,  68 => 13,  65 => 12,  58 => 10,  55 => 9,  49 => 7,  46 => 6,  41 => 19,  38 => 4,  32 => 2,);
    }
}
