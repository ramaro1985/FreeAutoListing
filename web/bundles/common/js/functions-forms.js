/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

  jQuery(document).ready(function() {
      
            jQuery('#select-property').change(function(){
            window.location = jQuery('#select-property').val();
            }); 
            
            
            jQuery(function() {
            jQuery( "#datepick" ).datepicker();
            });

      /**
       *  Cambiar los badge del accordion en la vista movil
       *
       * */
      jQuery('.collapse').on('hide.bs.collapse', function () {
          var panelheading = jQuery(this).siblings(".panel-heading");
          jQuery(panelheading).find(".glyphicon").not(".nochange").removeClass("glyphicon-chevron-down");
          jQuery(panelheading).find(".glyphicon").not(".nochange").addClass("glyphicon-chevron-right");
      })

      jQuery('.collapse').on('show.bs.collapse', function () {
          var panelheading = jQuery(this).siblings(".panel-heading");
          jQuery(panelheading).find(".glyphicon").not(".nochange").removeClass("glyphicon-chevron-right");
          jQuery(panelheading).find(".glyphicon").not(".nochange").addClass("glyphicon-chevron-down");
      })
     
        });  
