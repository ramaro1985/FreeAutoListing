/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


  jQuery(document).scroll(function() {
                    jQuery("#datepicker1,#datepicker2").datepicker("hide");
            });

        

jQuery(document).ready(function(){  
        
     
         //********************** HOME DATE CALENDARS *****************************//
        
           /*  jQuery( "#datepicker1" ).datepicker1({
                startDate: '-0d',
                autoclose: true,
                clearBtn: true
            });
            
             jQuery( "#datepicker2" ).datepicker1({
                startDate: '-0d',
                autoclose: true,
                clearBtn: true
            });
         
            jQuery("#datepicker1,#datepicker2").click(function (){
             jQuery(this).datepicker1("show");
            });
            
             jQuery(".calendar .input-group-addon").click(function (){
             jQuery(this).parent().find('input').datepicker1("show");
            });
             */
          
        
        //*********************   MAPA *************************************//
         var src;
        var src1;
        
          jQuery("#map1 img").mouseover(function(){
         
         src = jQuery(this).attr("src");
         src1 = src.replace(".jpg", "-hover.jpg");   
         this.src = src1;
    

            })
            
         jQuery("#map1 img").mouseout(function(){
            
          src = jQuery(this).attr("src");
          src1 = src.replace("-hover.jpg", ".jpg");   
          this.src = src1;
    

            })
            
         
         jQuery('#map').usmap({
	    
	 
	  
            'showLabels': true,
             'stateHoverAnimation': 100,
                       
           'labelTextStyles': {
            fill: "#fff",
            'stroke': 'none',
            'font-weight': 300,
            'stroke-width': 0,
            'font-size': '10px'
          },
          
           'stateHoverStyles': {
            fill: "#032A8F",
            stroke: "none",
            scale: [1.1, 1.1]
          },
          
            'labelBackingHoverStyles': {
                  fill: "#032A8F",
                  stroke: "none"
                },
                
                
            
             'labelBackingStyles': {
                fill: "#2e80ba",
                stroke: "none",
                "stroke-width": 0,
                "stroke-linejoin": "round",
                scale: [1, 1]
              },
            
            
             'stateStyles': {
                fill: "#2e80ba",
                stroke: "#C2D9DF",
                "stroke-width": 1,
                "stroke-linejoin": "round",
                scale: [1, 1]
              },
             
             
	     
	    'click' : function(event, data) {
               
                 switch(data.name) {
          case 'AK':
         jQuery('#state').val('Alaska');
            break;
            
            case 'WA':
           jQuery('#state').val('Washington');  break;
            
              case 'OR':
           jQuery('#state').val('Oregon');  break;
            
              case 'CA':
           jQuery('#state').val('California');  break;
            
              case 'NV':
           jQuery('#state').val('Nevada');  break;
          
               case 'AZ':
           jQuery('#state').val('Arizona');  break;
            
               case 'UT':
           jQuery('#state').val('Utah');  break;
            
               case 'ID':
           jQuery('#state').val('Idaho');  break;
                  
               case 'MT':
           jQuery('#state').val('Montana');  break;
            
               case 'WY':
           jQuery('#state').val('Wyoming');  break;
            
               case 'CO':
           jQuery('#state').val('Colorado');  break;
            
            
              
               case 'NM':
           jQuery('#state').val('New Mexico');  break;
            
               case 'ND':
           jQuery('#state').val('North Dakota');  break;
            
                case 'SD':
           jQuery('#state').val('South Dakota');  break;
         
                case 'NE':
           jQuery('#state').val('Nebraska');  break;
            
                 case 'KS':
           jQuery('#state').val('Kansas');  break;
           
           
                case 'OK':
           jQuery('#state').val('Oklahoma');  break;
            
                case 'TX':
           jQuery('#state').val('Texas');  break;
            
                  case 'MN':
           jQuery('#state').val('Minnesota');  break;
         
                 case 'IA':
           jQuery('#state').val('Iowa');  break;
            
                 case 'MO':
           jQuery('#state').val('Missouri');  break;
            
                 case 'AR':
           jQuery('#state').val('Arkansas');  break;
            
                case 'LA':
           jQuery('#state').val('Louisiana');  break;
            
                  case 'WI':
           jQuery('#state').val('Wisconsin');  break;  
            
                  case 'IL':
           jQuery('#state').val('Illinois');  break; 
            
                  case 'MS':
           jQuery('#state').val('Mississippi');  break; 
            
                case 'MI':
           jQuery('#state').val('Michigan');  break; 
            
                case 'IN':
           jQuery('#state').val('Indiana');  break; 
            
                case 'KY':
           jQuery('#state').val('Kentucky');  break; 
            
                  case 'TN':
           jQuery('#state').val('Tennessee');  break;   
            
                case 'AL':
           jQuery('#state').val('Alabama');  break;  
            
               case 'GA':
           jQuery('#state').val('Georgia');  break;   
            
            
               case 'FL':
           jQuery('#state').val('Florida');  break; 
            
               case 'SC':
           jQuery('#state').val('South Carolina');  break;  
            
                case 'NC':
           jQuery('#state').val('North Carolina');  break;
            
            
                   case 'VA':
           jQuery('#state').val('Virginia');  break;
            
                   case 'WV':
           jQuery('#state').val('West Virginia');  break;
            
                    case 'OH':
           jQuery('#state').val('Ohio');  break;
             
                   case 'PA':
           jQuery('#state').val('Pennsylvania');  break;   
            
            
            case 'NY':
           jQuery('#state').val('New York');  break;   
               
            case 'ME':
           jQuery('#state').val('Maine');  break; 
            
              case 'HI':
           jQuery('#state').val('Hawaii');  break; 
         
              case 'VT':
           jQuery('#state').val('Vermont');  break; 
         
              case 'NH':
           jQuery('#state').val('New Hampshire');  break; 
         
              case 'MA':
           jQuery('#state').val('Massachusetts');  break; 
         
              case 'RI':
           jQuery('#state').val('Rhode Island');  break; 
         
              case 'CT':
           jQuery('#state').val('Connecticut');  break; 
         
              case 'NJ':
           jQuery('#state').val('New Jersey');  break; 
         
              case 'DE':
           jQuery('#state').val('Delaware');  break; 
         
         case 'MD':
           jQuery('#state').val('Maryland');  break;
           
         case 'DC':
           jQuery('#state').val('District of Columbia');  break;
           
           
           
        }
        
	       jQuery( "#target" ).submit();
     
                
	    }
        
	  });
      
    }); 


    //*************************  REGISTRATION FORM *****************************//
    
  
        
        jQuery('#form-register input').keypress(function(e){   
            if(e.which == 13){
              if(jQuery('#form-register input:checkbox').is(':checked')) {  
             return true; 
             }else {
             return false;
             }
              
              
            }
          });  
       

      
    
    jQuery('#form-register input:checkbox').click(function (e){
       
       if(jQuery(this).is(':checked')) {  
           jQuery('#form-register button:submit').removeClass('disabled');
           
        } else {  
            jQuery('#form-register button:submit').addClass('disabled');
           
        }  
       
        
        
    });
    
    
     jQuery('#form-register button:submit').click(function (){
        jQuery('#form-register').submit();
    });
    
    