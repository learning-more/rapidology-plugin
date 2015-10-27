
jQuery(window).on('load', function () {
    var rapidbar_displayed = jQuery('.rad_rapidology_rapidbar').length;
    var rapidbar_timedelay = jQuery('.rad_rapidology_rapidbar.rad_rapidology_rapidbar_trigger_auto').data('delay');
    var delay = '' !== rapidbar_timedelay ? rapidbar_timedelay * 1000 : 500;
    var isTop = (jQuery('.rad_rapidology_rapidbar').hasClass('stickytop') || jQuery('.rad_rapidology_rapidbar').hasClass('nonsticktop') ) ? true : false;
    var staticTop = (jQuery('.rad_rapidology_rapidbar').hasClass('nonsticktop')) ? true : false;
    var staticBottom = (jQuery('.rad_rapidology_rapidbar').hasClass('nonstickbottom')) ? true : false;
    var stickyBottom = (jQuery('.rad_rapidology_rapidbar').hasClass('stickybottom')) ? true : false;

    //add padding to top of page for top bars if admin bar is displayed
    if(rapidbar.admin_bar && rapidbar_displayed && isTop) {
        setTimeout(function () {
            jQuery('.rad_rapidology_rapidbar').css('margin-top', '32px');
        }, delay);
    }
    //add padding to top for all top bars
    if(rapidbar_displayed && isTop) {
        setTimeout(rapidbar_add_padding, delay);
    }
    //add padding to bottom of body for static bottom bar
    if(rapidbar_displayed && stickyBottom){
        jQuery('body').addClass('rapidbar_bottom_padding');
    }
    jQuery(window).scroll(function(){
        var scroll = jQuery(window).scrollTop();
        if(scroll >= 30){
          rapidbar_remove_padding(false);
            jQuery('body').attr('data-rad_padding_added', false);
        }else if(jQuery('body').attr('data-rad_padding_added') == 'false'){
            jQuery('body').removeAttr('data-rad_padding_added');
            rapidbar_add_padding();

        }

    });
    //remove padding for top bars
    if(isTop || staticTop) {
        jQuery('.rad_rapidology_rapidbar .rad_rapidology_submit_subscription').on('click', function () {
            setTimeout(rapidbar_remove_padding, 3000); //use set timeout as it is used the other closing functions
        });
        jQuery('.rad_rapidology_redirect_page, .rad_rapidology_rapidbar .rad_rapidology_close_button').on('click', function () {
            setTimeout(rapidbar_remove_padding, 400); //use set timeout as it is used the other closing functions
        });
    }
    replicate_text_color(delay);
});

function rapidbar_add_padding(){
    if(jQuery('header')) {
        var header = jQuery('header');
        //if header exists see if position is fixed if so get its top property so we can add to it
        if (header && jQuery(header).css('position') == 'fixed') {
            var current_header_top_space = jQuery(header).css('padding-top');
        }
    }
    //find first div to add padding to for rapidbar
    var first_div = jQuery('body div:first');
    var first_div_current_padding = jQuery(first_div).css('padding-top');
    var paddingNeeded =  ( jQuery('.rad_rapidology_rapidbar_form_content button').data('service') == 'redirect') ? 35 : 50;
    //prepare new values
    if(current_header_top_space) {
        var newPaddingHeader = parseInt(current_header_top_space.replace('px', '')) + paddingNeeded;
        //padding added to header if needed and data attribute to remove later
        jQuery(header).css('padding-top', newPaddingHeader);
        jQuery(header).attr('data-rad_padding', paddingNeeded);
    }
    var newPaddingDiv = parseInt(first_div_current_padding.replace('px', '')) + paddingNeeded;
    //add padding to body, adding padding from first div to keep consitancy on site
    jQuery('body').css('padding-top', newPaddingDiv);
    jQuery('body').attr('data-rad_padding', paddingNeeded);

    jQuery('body').children().each(function(){
        var this_el = jQuery(this);
            if (jQuery(this_el).css('position') == 'fixed') {
                if(!jQuery(this_el).hasClass('rad_rapidology_rapidbar') && jQuery(this_el).attr('id') != 'wpadminbar') {
                var current_padding_top_el = jQuery(this_el).css('padding-top');
                var new_padding_el = parseInt(current_padding_top_el.replace('px', '')) + paddingNeeded;
                jQuery(this_el).css('padding-top', new_padding_el);
                jQuery(this_el).attr('data-rad_padding', paddingNeeded);
            }
        }
    });
}

function rapidbar_remove_padding(remove_bar){
    var removebar = (remove_bar == false ? false : true);
    jQuery("[data-rad_padding]").each(function(){
       var padding_to_remove = jQuery(this).data('rad_padding');
       var current_padding = jQuery(this).css('padding-top');
       var new_padding_el = parseInt(current_padding.replace('px', '')) - padding_to_remove;
       jQuery(this).css('padding-top', new_padding_el);
    });

    jQuery('body').removeAttr('data-rad_padding_added');
    if(removebar == true) {
        var redirectUrl = jQuery('.rad_rapidology_submit_subscription').data('redirect_url');
        if (redirectUrl) { //dont want to remove if they have a redirect setup with a timer as we want the form to stick around
            jQuery('.rad_rapidology_rapidbar').remove();
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




