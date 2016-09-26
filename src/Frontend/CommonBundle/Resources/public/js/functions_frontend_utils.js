/**
 * Created by Rafael on 29/09/2015.
 */

function CreateFilterBox(id_element, contentvalue, name) {

    var id_text = id_element + "_filter_box";
    var filterBox = jQuery('<div class="panel panel-default sidebar_panel"><div class="panel-body" id="' + id_text + '">' +
    '<div class="col-md-12 col-sm-12 col-xs-12 no_padding">' +
    '<span class="pull-left">' + name + '</span>' +
    '<span class="badge pull-right close_filter_box" onclick="javascript:DestroyFilterBox(this)">x</span>' +
    '</div>' + contentvalue +
    '</div></div>');

    return filterBox;
}

function AddValueTofilterBox(filterbox, value) {
    var tag = '<li><a href="#" class="values">' + value + '</a></li>'
    filterbox.find(".list-unstyled").append(tag);
}

function FindValueToFilterBox(filterbox, text, parent) {
    var values = jQuery(filterbox).find(".values");
    var added = false;
    var elem = null;
    var filterboxdeleted = false;
    if (values.length > 0) {
        values.each(function () {
            if (this.textContent == text) {
                added = true;
                elem = this;
                return;
            }
        });
    }
    if (!added) {
        AddValueTofilterBox(jQuery(filterbox), text);
        if (jQuery(parent.parentElement).hasClass("make_filter_extended"))
            CreateModelSelect.call(parent);
        if (!waitTofind)
            jQuery("#btn-search").trigger("click");

    } else {
        if (elem != null) {
            if (values.length == 1) {
                jQuery(elem).parents(".sidebar_panel").fadeOut(300, function () {
                    jQuery(this).remove();
                    jQuery("#btn-search").trigger("click");
                });
                filterboxdeleted = true;
            }
            else
                jQuery(elem).fadeOut(50, function () {
                    jQuery(this).remove();
                    jQuery("#btn-search").trigger("click");
                });
        }
        if (jQuery(parent.parentElement).hasClass("make_filter_extended"))
            jQuery("li[makedisplay='" + text + "']").remove()
    }
    return filterboxdeleted;
}
function FilterBox(fill, name) {

    var fill_filter = '#' + fill + '_filter';
    var fill_filter_box = '#' + fill + '_filter_box';

    jQuery(fill_filter).find(".list-item").not(":first").click(function () {
        var text = jQuery(this).find("a").text();
        var idattr = jQuery(this).find("a").attr("id");
        SetActiveClass(this);
        if (jQuery(fill_filter_box).size() == 0) {
            var content = '<ul class="col-md-12 list-unstyled">' +
                '<li>' +
                '<a href="javascript:void(0)" id="' + idattr + '" class="values">' + text + '</a>' +
                '</li>' +
                '</ul>';
            // var filterBox+fill = CreateFilterBox(fill, content, name);
            jQuery("#filters_panel").prepend(CreateFilterBox(fill, content, name));
            if (this.parentElement.id == "make_filter")
                CreateModelSelect.call(this);
            jQuery("#btn-search").trigger("click");

        } else {
            var filterboxdeleted = FindValueToFilterBox(fill_filter_box, text, this);
            if (filterboxdeleted)
                var tagany = jQuery(this).siblings()[0];
            jQuery(tagany).addClass("active");
        }
    });

}

function FilterBoxAction(fill, name, elem, popClassToClose) {

    var fill_filter = '#' + fill + '_filter';
    var fill_filter_box = '#' + fill + '_filter_box';

    var text = jQuery(elem).find("a").text();
    var idattr = jQuery(elem).find("a").attr("id");
    //SetActiveClass(elem);
    if (jQuery(fill_filter_box).size() == 0) {
        var content = '<ul class="col-md-12 list-unstyled">' +
            '<li>' +
            '<a href="javascript:void(0)" id="' + idattr + '" class="values">' + text + '</a>' +
            '</li>' +
            '</ul>';
        jQuery("#filters_panel").prepend(CreateFilterBox(fill, content, name));
        jQuery("#btn-search").trigger("click");
        if (jQuery(elem.parentElement).hasClass("make_filter_extended"))
            CreateModelSelect.call(elem);
    } else {
        var filterboxdeleted = FindValueToFilterBox(fill_filter_box, text, elem);
        if (filterboxdeleted)
            var tagany = jQuery(elem).siblings()[0];
        jQuery(tagany).addClass("active");
    }

    if (popClassToClose) {
        jQuery('a.' + popClassToClose).webuiPopover('hide');
    }
}

function SetActiveClass(elem) {

    if (jQuery(elem).find("a").attr("id") == "all" && !jQuery(this).hasClass("active")) {
        jQuery(elem).siblings().removeClass("active");
        var parentid = jQuery(elem).parent().attr("id");
        RemoveBoxFilter(parentid);
    }
    jQuery(elem).toggleClass("active");
    if (jQuery(elem).siblings(".All").hasClass("active"))
        jQuery(elem).siblings(".All").removeClass("active");
}


jQuery(document).ready(function (){
    /**
     *  Cambiar los badge del accordion en la vista movil
     *
     * */
    jQuery('.collapse').on('hide.bs.collapse', function () {
        var panelheading = jQuery(this).siblings(".panel-heading");
        jQuery(panelheading).find(".glyphicon").removeClass("glyphicon-chevron-down");
        jQuery(panelheading).find(".glyphicon").addClass("glyphicon-chevron-right");
    })

    jQuery('.collapse').on('show.bs.collapse', function () {
        var panelheading = jQuery(this).siblings(".panel-heading");
        jQuery(panelheading).find(".glyphicon").removeClass("glyphicon-chevron-right");
        jQuery(panelheading).find(".glyphicon").addClass("glyphicon-chevron-down");
    })

});

