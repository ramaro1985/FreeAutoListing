<?php

/* EWZRecaptchaBundle:Form:ewz_recaptcha_widget.html.twig */
class __TwigTemplate_c22ac31d56ec4e2d3a4a4f21447d4fd07cdf7b4d5fef8d835989827b0cfabc8d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ewz_recaptcha_widget' => array($this, 'block_ewz_recaptcha_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('ewz_recaptcha_widget', $context, $blocks);
        // line 43
        echo "
";
    }

    // line 1
    public function block_ewz_recaptcha_widget($context, array $blocks = array())
    {
        // line 2
        ob_start();
        // line 3
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars"), "ewz_recaptcha_enabled")) {
            // line 4
            echo "        ";
            if ((!$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars"), "ewz_recaptcha_ajax"))) {
                // line 5
                echo "            <script src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars"), "url_challenge"), "html", null, true);
                echo "\" type=\"text/javascript\"></script>
            <div class=\"g-recaptcha\" data-theme=\"";
                // line 6
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "options"), "theme"), "html", null, true);
                echo "\" data-type=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "options"), "type"), "html", null, true);
                echo "\" data-sitekey=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars"), "public_key"), "html", null, true);
                echo "\"></div>
            <noscript>
                <div style=\"width: 302px; height: 352px;\">
                    <div style=\"width: 302px; height: 352px; position: relative;\">
                        <div style=\"width: 302px; height: 352px; position: absolute;\">
                            <iframe src=\"https://www.google.com/recaptcha/api/fallback?k=";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars"), "public_key"), "html", null, true);
                echo "\"
                                    frameborder=\"0\" scrolling=\"no\"
                                    style=\"width: 302px; height:352px; border-style: none;\"
                            >
                            </iframe>
                        </div>
                        <div style=\"width: 250px; height: 80px; position: absolute; border-style: none; bottom: 21px; left: 25px; margin: 0px; padding: 0px; right: 25px;\">
                            <textarea id=\"g-recaptcha-response\" name=\"g-recaptcha-response\"
                                      class=\"g-recaptcha-response\"
                                      style=\"width: 250px; height: 80px; border: 1px solid #c1c1c1; margin: 0px; padding: 0px; resize: none;\"
                            >
                            </textarea>
                        </div>
                    </div>
                </div>
            </noscript>
        ";
            } else {
                // line 28
                echo "            <div id=\"ewz_recaptcha_div\"></div>

            <script type=\"text/javascript\">
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.onload = function() {
                    Recaptcha.create('";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars"), "public_key"), "html", null, true);
                echo "', 'ewz_recaptcha_div', ";
                echo twig_jsonencode_filter((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "options", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "options"), array())) : (array())));
                echo ");
                }
                script.src = '";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars"), "url_api"), "html", null, true);
                echo "';
                document.getElementsByTagName('head')[0].appendChild(script);
            </script>
        ";
            }
            // line 40
            echo "    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "EWZRecaptchaBundle:Form:ewz_recaptcha_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  97 => 40,  83 => 34,  55 => 11,  35 => 4,  30 => 2,  27 => 1,  22 => 43,  20 => 1,  394 => 290,  249 => 148,  242 => 144,  230 => 135,  206 => 114,  202 => 113,  198 => 112,  192 => 108,  187 => 104,  178 => 97,  163 => 85,  151 => 76,  140 => 68,  134 => 65,  124 => 58,  120 => 57,  116 => 56,  112 => 55,  92 => 43,  84 => 40,  77 => 38,  68 => 34,  50 => 18,  43 => 6,  38 => 5,  36 => 10,  26 => 5,  21 => 2,  19 => 1,  162 => 38,  157 => 37,  152 => 36,  145 => 26,  141 => 25,  137 => 24,  133 => 23,  129 => 22,  125 => 21,  121 => 20,  117 => 19,  113 => 18,  109 => 17,  104 => 50,  101 => 15,  94 => 12,  90 => 36,  86 => 10,  81 => 9,  73 => 6,  62 => 39,  59 => 38,  56 => 37,  45 => 30,  42 => 29,  39 => 15,  37 => 8,  32 => 3,  25 => 1,  91 => 25,  88 => 24,  85 => 23,  78 => 8,  75 => 28,  67 => 18,  54 => 36,  49 => 8,  46 => 7,  40 => 5,  33 => 9,);
    }
}
