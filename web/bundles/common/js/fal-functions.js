/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function () {

    jQuery("#panel_sell").mouseover(function () {
        $(this).css("background-image", "url('../web/bundles/common/images/home/banner-sell.jpg')");
        form = jQuery("#form_sell_header");
    });
    jQuery("#panel_sell").mouseout(function () {
        $(this).css("background-image", "url('../web/bundles/common/images/home/banner-sell-b&w.jpg')");
    });
    jQuery("#panel_buy").mouseover(function () {
        $(this).css("background-image", "url('../web/bundles/common/images/home/banner-buy.jpg')");
        form = jQuery("#form_buy_header");
    });
    jQuery("#panel_buy").mouseout(function () {
        $(this).css("background-image", "url('../web/bundles/common/images/home/banner-buy-b&w.jpg')");
    });

    /**
     *  eventos para cuando se da click en el boton de mostrar los link  para editar
     * */
    jQuery(".show-edit-links").click(function(){
        var panel = jQuery(this).attr("mipanel");
        jQuery("#"+panel).find('.element_hidden').toggle();
    });


});


