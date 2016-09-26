/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




jQuery(document).ready(function () {




    jQuery('#select-property').change(function () {
        window.location = jQuery('#select-property').val();
    });




    jQuery(function () {
        jQuery(".navbar-inner li").click(function (e) {
            var divhide = jQuery(".navbar-inner li.active").children().attr('href');
            jQuery(".navbar-inner li.active").addClass('divider-vertical');
            jQuery(".navbar-inner li.active").removeClass('active');
            jQuery(this).addClass('active');
            jQuery(this).removeClass('divider-vertical');
            jQuery(divhide).css('display', 'none');
            var divid = jQuery(this).children().attr('href');
            jQuery(divid).css('display', 'block');
            e.preventDefault();

        });



    });



    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var calendar = jQuery('#calendar').fullCalendar({
        header: {
            left: '',
            center: 'prev, title, next',
            right: ''

        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true // make the event "stick"
                        );
            }
            calendar.fullCalendar('unselect');
        },
        editable: true,
        events: [
            {
                title: 'All Day Event',
                start: new Date(y, m, 1)
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2)
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d - 3, 16, 0),
                allDay: false
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d + 4, 16, 0),
                allDay: false
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/'
            }
        ]
    });







    jQuery(function () {
        var name = jQuery("#name"),
                email = jQuery("#email"),
                password = jQuery("#password"),
                allFields = jQuery([]).add(name).add(email).add(password),
                tips = jQuery(".validateTips");

        function updateTips(t) {
            tips
                    .text(t)
                    .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function checkLength(o, n, min, max) {
            if (o.val().length > max || o.val().length < min) {
                o.addClass("ui-state-error");
                updateTips("Length of " + n + " must be between " +
                        min + " and " + max + ".");
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp(o, regexp, n) {
            if (!(regexp.test(o.val()))) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        jQuery("#dialog-form").dialog({
            autoOpen: false,
            height: 300,
            width: 350,
            modal: true,
            buttons: {
                "Create an account": function () {
                    var bValid = true;
                    allFields.removeClass("ui-state-error");

                    bValid = bValid && checkLength(name, "username", 3, 16);
                    bValid = bValid && checkLength(email, "email", 6, 80);
                    bValid = bValid && checkLength(password, "password", 5, 16);

                    bValid = bValid && checkRegexp(name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter.");
                    // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
                    bValid = bValid && checkRegexp(email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com");
                    bValid = bValid && checkRegexp(password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9");

                    if (bValid) {
                        jQuery("#users tbody").append("<tr>" +
                                "<td>" + name.val() + "</td>" +
                                "<td>" + email.val() + "</td>" +
                                "<td>" + password.val() + "</td>" +
                                "</tr>");
                        jQuery(this).dialog("close");
                    }
                },
                Cancel: function () {
                    jQuery(this).dialog("close");
                }
            },
            close: function () {
                //allFields.val( "" ).removeClass( "ui-state-error" );
            }
        });




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


