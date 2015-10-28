(function($) {
    //setup some variables to use throughout
    var isSticky = ($('.rad_rapidology_rapidbar').hasClass('stickytop')) ? true : false;
    var rapidbar_displayed = jQuery('.rad_rapidology_rapidbar').length;
    var rapidbar_timedelay = jQuery('.rad_rapidology_rapidbar.rad_rapidology_rapidbar_trigger_auto').data('delay');
    var delay = '' !== rapidbar_timedelay ? rapidbar_timedelay * 1000 : 500;

    //put wrapper around sticky bar for relative positioning
    if(isSticky == true && rapidbar_displayed && rapidbar.admin_bar){

            setTimeout(function () {
                $('.rad_rapidology_rapidbar').css('margin-top', '32px');
            }, delay);
        }

       $("<div class='sticky_adminbar_push'></div>").insertBefore('.stickytop');
       $('.stickytop').wrap("<div class='fixed-wrapper'></div>");
       $('.fixed-wrapper').wrap("<div class='stickytop_wrapper'></div>");



    /*---------------------------------------
    ------------Adding heights for bar-------
    -----------------------------------------*/
    $(window).on('load', function () {
        //set inital heights
        new_height = $('.rad_rapidology_rapidbar').height();
        rapidbar_add_padding(new_height);
        replicate_text_color(delay);
    });


    $(window).resize(function() {
        new_height = $('.rad_rapidology_rapidbar').height();
        console.log(new_height);
        rapidbar_add_padding(new_height);
    });

    function rapidbar_add_padding(height){
        $('body').attr('data-rad_height', height);
        /*---fixed header heights----*/
        var header = $('header');
        if($(header).css('position') == 'fixed' || $(header).css('position') == 'absolute'){
            $(header).css('margin-top', height);
            $(header).attr('data-rapid_height', height);
        }

        jQuery('body').children().each(function(){
            var this_el = jQuery(this);
            if (jQuery(this_el).css('position') == 'fixed' || jQuery(this_el).css('position') == 'absolute' ) {
                if(!jQuery(this_el).hasClass('rad_rapidology_rapidbar') && jQuery(this_el).attr('id') != 'wpadminbar') {
                    var current_padding_top_el = jQuery(this_el).css('padding-top');
                    var new_padding_el = parseInt(current_padding_top_el.replace('px', '')) + height;
                    jQuery(this_el).css('padding-top', height);
                    jQuery(this_el).attr('data-rapid_height', height);
                }
            }
        });
        $('.sticky_adminbar_push').css('height', '32');
    }


    /*------------------------------------------
     ------------removing heights for bar-------
     ------------------------------------------*/

    // triggers for closing rapidbar
    jQuery('.rad_rapidology_redirect_page, .rad_rapidology_rapidbar .rad_rapidology_close_button').on('click', function () {
        setTimeout(rapidbar_remove_padding, 400); //use set timeout as it is used the other closing functions
    });

    //scroll trigger to remove padding
    if(isSticky == false) {
        jQuery(window).scroll(function () {
            rad_scroll_height = $('.rad_rapidology_rapidbar').height();
            var scroll = $(window).scrollTop();
            if (scroll >= rad_scroll_height) {
                rapidbar_remove_padding(false);
            } else {
                rapidbar_add_padding(rad_scroll_height);
            }
        });
    }

    function rapidbar_remove_padding(remove_bar){
        height = $('.rad_rapidology_rapidbar').height(); //get height of bar
        var removebar = (remove_bar == false ? false : true);
        var header = $('header');
        console.log($(header).data('rapid_height'));
        if($(header).data('rapid_height')){
            var current_height = $(header).data('rapid_height');
            console.log(current_height - height);
            $(header).css('margin-top', current_height - height);
        }
        $('.sticky_adminbar_push').css('height', '0');

        $("[data-rapid_height]").each(function(){
            var padding_to_remove = jQuery(this).data('rapid_height');
            var current_padding = jQuery(this).css('padding-top');
            var new_padding_el = parseInt(current_padding.replace('px', '')) - padding_to_remove;
            $(this).css('padding-top', new_padding_el);
        });

        if(removebar == true) {
            var redirectUrl = $('.rad_rapidology_submit_subscription').data('redirect_url');
            if (redirectUrl) { //dont want to remove if they have a redirect setup with a timer as we want the form to stick around
                $('.rad_rapidology_rapidbar').remove();
            }
        }
    }

    function replicate_text_color(delay){
        //loop through any rapidbar on the page and set the color appropriately if text color has been changed in the admin editor
        //only happens on btns as links
        setTimeout(function(delay){
            jQuery('.rad_rapidology_rapidbar').each(function(){
                var this_el = jQuery(this);
                var button = jQuery(this_el).find('button'); //find our button on this form
                var btnAsLink = jQuery(button).attr('class').match(/btnaslink/); //make sure button has link class
                if(btnAsLink && btnAsLink.index > 0) { //if the result index from match is > 0 then we can change it, if not we won't.
                    var barTextEl = jQuery(this_el.find('.rad_rapidology_form_text p span'));
                    var textColor = barTextEl.css('color');
                    if (textColor) {
                        var buttonText = jQuery(this_el.find('.rad_rapidology_button_text'));
                        jQuery(buttonText).attr('style', 'color: ' + textColor + ' !important; text-decoration: underline !important');
                    }else{
                        jQuery('.rad_rapidology_button_text').attr('style', 'text-decoration: underline !important');
                    }
                }
            });
        }, delay);
    }
})( jQuery );





