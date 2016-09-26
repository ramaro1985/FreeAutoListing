<?php

/* AdminBundle:LogRegister:login.html.twig */
class __TwigTemplate_50c0986cede7992779c61bb3d32a788f5edbbc0002e01c0bfdee79015bd44e80 extends Twig_Template
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " | Owner Login";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        echo " ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo " ";
    }

    // line 4
    public function block_javascripts($context, array $blocks = array())
    {
        echo " ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo " 
  

 ";
    }

    // line 8
    public function block_header($context, array $blocks = array())
    {
        // line 9
        echo "
     ";
        // line 10
        echo twig_include($this->env, $context, "CommonBundle:Default:header-cars.html.twig");
        echo "
  
 ";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        // line 15
        echo " 

    ";
        // line 17
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 18
            echo "    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center text-danger alert alert-danger\" role=\"alert\"><span class=\"glyphicon glyphicon-remove\" style=\"margin-right: 7px\"></span>";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : null)), "html", null, true);
            echo "</div>
        </div>
         ";
            // line 22
            if (($this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : null)) == "User account is disabled.")) {
                // line 23
                echo "             
            
        <div class=\"row\">
            <div class=\"col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center\" role=\"alert\">
            Trouble recieving confirmation link? <a href=\"";
                // line 27
                echo $this->env->getExtension('routing')->getPath("user_registration_resend_confirm");
                echo "\"> Resend Email</a>
            </div>
        </div>
        ";
            }
            // line 31
            echo "        
    </div>
";
        }
        // line 34
        echo "   
    <div class=\"container\">
        <div class=\"row\" style=\"margin-top: 20px\">
        <div class=\"col-md-6 col-md-offset-3 text-center\">
        <h1>Owner Login</h1>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-md-6 col-md-offset-3 text-center login-form-container\">
            <form id=\"form-login\" action=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\"  method=\"POST\" class=\"form-horizontal\" style=\"margin-top: 20px\">
    <input type=\"hidden\" name=\"_csrf_token\"   value=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderer->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">
   
            
    <div class=\"form-group\" style=\"margin-bottom: 20px\">
 
         <div class=\"col-sm-12\">
             <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" required=\"required\" placeholder=\"Email\"/>
     
    </div>
  </div> 
    
        <div class=\"form-group\" style=\"margin-bottom: 8px\">
 
         <div class=\"col-sm-12\">
             <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" required=\"required\" placeholder=\"Password\"/>
    </div>
  </div>  
    
    <div class=\"form-group\" style=\"margin-bottom: 5px\">
 
         <div class=\"col-sm-12 text-left\">
             <a href=\"";
        // line 66
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_request");
        echo "\"> Forgot password? </a>
    </div>
  </div>  
    
     
    
    
    <div class=\"form-group\" style=\"margin-bottom: 5px\">
 
         <div class=\"col-sm-6 col-xs-8 text-left\">
             <label style=\"margin-top: 10px\">
                 <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" ><span style=\"display: inline; font-weight: 400\"> Keep me signed in </span>
    </label>
    </div>
        
        <div class=\"col-sm-6 col-xs-4 text-right\">
      <button type=\"submit\" class=\"btn btn-primary\">Sign In</button>
    </div>
    

  </div> 
             
             <div class=\"form-group\" style=\"margin-bottom: 5px\">
 
         
        
        <div class=\"col-sm-12 text-left\">
     <div id=\"fb-root\"></div>  
   

        <a href=\"#\" class=\"facebook_button\" onclick=\"fb_login(event);\">Log in with Facebook</a>
    
    </div>
        
  </div>
    
    <div style=\"border-bottom: 1px dashed #B6C9D7;margin-top: 13px;\"> </div>
    
    <div class=\"form-group\" style=\"margin-top: 1em;\">
        <div class=\"col-sm-12 col-xs-12 text-center\">
      
            Dont have an account yet ? <a href=\"";
        // line 107
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\">Register Here</a>
   </div>
  </div>
    
 
</form>
                </div>
            </div>
</div>
    
    
    
    
    
    
    
    

";
    }

    // line 127
    public function block_footer($context, array $blocks = array())
    {
        echo twig_include($this->env, $context, "CommonBundle:Default:footer-login.html.twig");
        echo "  ";
    }

    public function getTemplateName()
    {
        return "AdminBundle:LogRegister:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 127,  197 => 107,  153 => 66,  135 => 51,  126 => 45,  122 => 44,  110 => 34,  105 => 31,  98 => 27,  92 => 23,  90 => 22,  85 => 20,  81 => 18,  79 => 17,  75 => 15,  72 => 14,  65 => 10,  62 => 9,  59 => 8,  48 => 4,  40 => 3,  33 => 2,);
    }
}
