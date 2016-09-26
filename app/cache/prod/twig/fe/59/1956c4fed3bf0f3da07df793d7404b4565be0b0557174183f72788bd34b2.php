<?php

/* AdminBundle:Default:user-menu.html.twig */
class __TwigTemplate_fe591956c4fed3bf0f3da07df793d7404b4565be0b0557174183f72788bd34b2 extends Twig_Template
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
        echo "<div id=\"globalnav-nav\" class=\"pull-left visible-lg visible-md\" style=\"min-height: 770px;\">
    <nav class=\"nav nav-dash\">
        <header class=\"hidden-phone\"><i class=\"glyphicon glyphicon-cog\" style=\"margin-right: 8px\"></i><span
                    class=\"bold_text_white\">Tool Box</span></header>
        <div class=\"container-fluid\">
            <ul id=\"navigation\" class=\"nav nav-list\">
                <li id=\"sideLinkProperties\" class=\"\">
                    <a class=\"\" href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("admin_user_homepage");
        echo "\" target=\"\" data-attr=\"sideLinkProperties\">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li id=\"resrvationManager\" class=\"nav-header\" style=\"margin-top: 15px\">
                    <span style=\"font-size: 14px;font-weight: 600\">Inquiries Manager</span>
                    <hr style=\"text-decoration: solid #000000\">
                </li>

                <li id=\"sideLinkInquiries\" class=\"\">
                    <a class=\"selected\" href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("dealer_imbox", array("type" => "emails"));
        echo "\" target=\"\"
                       data-attr=\"sideLinkInquiries\">
                        <span>Inbox </span>
                        <span class=\"badge badge-important\"> ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "email_news"), "method"), "html", null, true);
        echo "</span>
                    </a>
                </li>

                <li id=\"sideLinkReservations\" class=\"\">
                    <a class=\"\" href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("dealer_imbox", array("type" => "offers"));
        echo "\" target=\"\"
                       data-attr=\"sideLinkReservations\">
                        <span>Offers</span>
                        <span class=\"badge badge-important\"> ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "email_offers"), "method"), "html", null, true);
        echo "</span>
                    </a>
                </li>
                ";
        // line 32
        if (array_key_exists("prop_pk", $context)) {
            // line 33
            echo "                    <li id=\"sideLinkCalendar\" class=\"\">
                        <a class=\"\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dealer_reviews", array("prop_pk" => (isset($context["prop_pk"]) ? $context["prop_pk"] : null))), "html", null, true);
            echo "\" target=\"\"
                           data-attr=\"sideLinkReservations\">
                            <span>Reviews</span>
                            <span class=\"badge badge-important\"> ";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "dealer_reviews"), "method"), "html", null, true);
            echo "</span>
                        </a>
                    </li>
                ";
        }
        // line 41
        echo "                <li id=\"listingManager\" class=\"nav-header\" style=\"margin-top: 15px\">
                    <span style=\"font-size: 14px;font-weight: 600\">Dealer Manager</span>
                    <hr>
                </li>
                <li id=\"sideLinkEditListing\" class=\"\">
                    <a class=\"\" href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("admin_user_dashboard");
        echo "\" target=\"\" data-attr=\"sideLinkEditListing\">
                        <span>Dealer Book </span>
                        <span class=\"badge badge-important\"> ";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "propertiesCount"), "method"), "html", null, true);
        echo "</span>
                    </a>
                </li>
                <li id=\"sideLinkEditListing\" class=\"\">
                    <a class=\"\" href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("set_description", array("type" => "open", "prop_pk" => "new")), "html", null, true);
        echo "\" target=\"\"
                       data-attr=\"sideLinkEditListing\">
                        <span>Add New Dealer</span>
                        <span class=\"badge badge-important\"></span>
                    </a>
                </li>

                <li id=\"toolsAndResource\" class=\"nav-header\" style=\"margin-top: 15px\">
                    <span style=\"font-size: 14px;font-weight: 600\">Inventory Manager</span>
                    <hr>
                </li>
                <li id=\"sideLinkToolkit\" class=\"\">
                    <a class=\"\"
                       href=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("create_vehicle_basic_info", array("type" => "open", "prop_pk" => "no", "vehicle_id" => "new")), "html", null, true);
        echo "\"
                       target=\"\" data-attr=\"sideLinkToolkit\">
                        <span>Add New Car</span>
                        <span class=\"badge badge-important\"></span>
                    </a>
                </li>
                <li id=\"toolsAndResource\" class=\"nav-header\" style=\"margin-top: 15px\">
                    <span style=\"font-size: 14px;font-weight: 600\">Tools & Resources</span>
                    <hr>
                </li>
                <li id=\"sideLinkToolkit\" class=\"\">
                    <a class=\"\" href=\"";
        // line 76
        echo $this->env->getExtension('routing')->getPath("admin_user_account");
        echo "\" target=\"\" data-attr=\"sideLinkToolkit\">
                        <a href=\"";
        // line 77
        echo $this->env->getExtension('routing')->getPath("my_account");
        echo "\">My Account</a>
                        <span class=\"badge badge-important\"></span>
                    </a>
                </li>
                <li id=\"sideLinkCommunity\" class=\"\">
                    <a class=\"\" href=\"";
        // line 82
        echo $this->env->getExtension('routing')->getPath("admin_user_personal", array("filtro" => "new"));
        echo "\" target=\"\"
                       data-attr=\"sideLinkCommunity\">

                        <span>What's new?</span><span class=\"badge\"
                                                      style=\"margin-left: 10px\">";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "news"), "method"), "html", null, true);
        echo "</span>
                        <span class=\"badge badge-important\"></span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

</div>

<!------------------------------------ MOBILE Nav ---------------------------------->
<!--
<div id=\"mobile-nav\" class=\"pull-left visible-xs\">
    <nav class=\"nav nav-dash\">
        <div class=\"panel-group\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\" role=\"tab\" id=\"headingTwo\">
                    <h4 class=\"panel-title\">

                        <a class=\"collapsed\" style=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\"
                           href=\"#collapseTwo\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">
                            Tool Box
                            <span class=\"glyphicon glyphicon-chevron-down pull-right\" aria-hidden=\"true\"></span>
                        </a>
                    </h4>
                </div>
                <div id=\"collapseTwo\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingTwo\">
                    <div class=\"panel-body\">
                        <ul id=\"navigation\" class=\"nav nav-list\">
                            <li id=\"sideLinkProperties\" class=\"\">
                                <a class=\"\" href=\"";
        // line 117
        echo $this->env->getExtension('routing')->getPath("admin_user_homepage");
        echo "\" target=\"\"
                                   data-attr=\"sideLinkProperties\">
                                    <span>My Listings</span>
                                    <span class=\"badge badge-important\"></span>
                                </a>
                            </li>
                            <li id=\"resrvationManager\" class=\"nav-header\">
                                <span>Reservation Manager</span>
                                <hr>
                            </li>

                            <li id=\"sideLinkInquiries\" class=\"\">
                                <a class=\"selected\" href=\"";
        // line 129
        echo $this->env->getExtension('routing')->getPath("property_inquiries_list");
        echo "\" target=\"\"
                                   data-attr=\"sideLinkInquiries\">
                                    <span>Inquiries</span>
                                    <span class=\"badge badge-important\"></span>
                                </a>
                            </li>

                            <li id=\"sideLinkReservations\" class=\"\">
                                <a class=\"\" href=\"";
        // line 137
        echo $this->env->getExtension('routing')->getPath("property_reservations_list");
        echo "\" target=\"\"
                                   data-attr=\"sideLinkReservations\">
                                    <span>Reservations</span>
                                    <span class=\"badge badge-important\"></span>
                                </a>
                            </li>
                            <li id=\"sideLinkCalendar\" class=\"\">
                                <a class=\"\" href=\"";
        // line 144
        echo $this->env->getExtension('routing')->getPath("property_calendar_list");
        echo "\" target=\"\"
                                   data-attr=\"sideLinkCalendar\">
                                    <span>Calendar</span>
                                    <span class=\"badge badge-important\"></span>
                                </a>
                            </li>
                            <li id=\"sideLinkReviews\" class=\"\">
                                <a class=\"\" href=\"";
        // line 151
        echo $this->env->getExtension('routing')->getPath("property_reviews_list");
        echo "\" target=\"\"
                                   data-attr=\"sideLinkReviews\">
                                    <span>Reviews</span>
                                    <span class=\"badge badge-important\"></span>
                                </a>
                            </li>

                            <div class='hidden-xs'>

                                <li id=\"listingManager\" class=\"nav-header\">
                                    <span>Listing Manager</span>
                                    <hr>
                                </li>
                                <li id=\"sideLinkEditListing\" class=\"\">
                                    <a class=\"\" href=\"";
        // line 165
        echo $this->env->getExtension('routing')->getPath("property_edit_list");
        echo "\" target=\"\"
                                       data-attr=\"sideLinkEditListing\">
                                        <span>Edit Listing</span>
                                        <span class=\"badge badge-important\"></span>
                                    </a>
                                </li>
                                <li id=\"sideLinkEditListing\" class=\"\">
                                    <a class=\"\" href=\"";
        // line 172
        echo $this->env->getExtension('routing')->getPath("addProperty");
        echo "\" target=\"\"
                                       data-attr=\"sideLinkEditListing\">
                                        <span>Add Listing</span>
                                        <span class=\"badge badge-important\"></span>
                                    </a>
                                </li>

                                <li id=\"sideLinkEditListing\" class=\"\">
                                    <a class=\"\" href=\"";
        // line 180
        echo $this->env->getExtension('routing')->getPath("property_deactivate_list");
        echo "\" target=\"\"
                                       data-attr=\"sideLinkEditListing\">
                                        <span>Deactivate Listing</span>
                                        <span class=\"badge badge-important\"></span>
                                    </a>
                                </li>

                            </div>

                            <li id=\"toolsAndResource\" class=\"nav-header\">
                                <span>Tools & Resources</span>
                                <hr>
                            </li>
                            <li id=\"sideLinkToolkit\" class=\"\">
                                <a class=\"\" href=\"";
        // line 194
        echo $this->env->getExtension('routing')->getPath("admin_user_account");
        echo "\" target=\"\"
                                   data-attr=\"sideLinkToolkit\">
                                    <span>My Account</span>
                                    <span class=\"badge badge-important\"></span>
                                </a>
                            </li>
                            <li id=\"sideLinkCommunity\" class=\"\">
                                <a class=\"\" href=\"";
        // line 201
        echo $this->env->getExtension('routing')->getPath("admin_user_personal", array("filtro" => "new"));
        echo "\" target=\"\"
                                   data-attr=\"sideLinkCommunity\">

                                    <span>What's new?</span><span class=\"badge\"
                                                                  style=\"margin-left: 10px\">";
        // line 205
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "get", array(0 => "news"), "method"), "html", null, true);
        echo "</span>
                                    <span class=\"badge badge-important\"></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
 <!------------------------------------ END MOBILE Nav ---------------------------------->";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:user-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  305 => 205,  298 => 201,  288 => 194,  271 => 180,  260 => 172,  250 => 165,  233 => 151,  223 => 144,  213 => 137,  202 => 129,  146 => 82,  138 => 77,  120 => 65,  97 => 48,  92 => 46,  67 => 32,  61 => 29,  28 => 8,  29 => 9,  185 => 104,  178 => 101,  170 => 98,  156 => 91,  154 => 90,  144 => 83,  134 => 76,  130 => 75,  110 => 57,  101 => 53,  90 => 47,  83 => 43,  70 => 36,  65 => 33,  63 => 32,  19 => 1,  251 => 96,  246 => 95,  243 => 94,  238 => 87,  232 => 80,  226 => 75,  201 => 30,  195 => 112,  191 => 26,  187 => 117,  183 => 24,  179 => 23,  175 => 22,  171 => 21,  166 => 20,  163 => 94,  157 => 17,  153 => 86,  149 => 15,  145 => 14,  141 => 13,  136 => 11,  131 => 10,  128 => 9,  122 => 7,  117 => 6,  106 => 98,  104 => 52,  96 => 88,  94 => 87,  86 => 81,  84 => 80,  78 => 37,  76 => 75,  50 => 52,  47 => 21,  42 => 9,  36 => 7,  34 => 6,  27 => 7,  99 => 23,  91 => 19,  85 => 41,  79 => 15,  77 => 40,  72 => 34,  69 => 33,  62 => 10,  55 => 26,  49 => 6,  44 => 19,  41 => 18,  33 => 3,);
    }
}
