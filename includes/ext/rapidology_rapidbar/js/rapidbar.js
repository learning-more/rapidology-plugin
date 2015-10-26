//TODO CLEANUP THIS WHOLE FILE, SO MUCH REPETITION IN HERE
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
    //do some fun scroll stuff to add and remove padding with static top bar

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
    var firstDiv = jQuery('body').find("div:first"); //we are going to assume this is the entire page container
    var header = jQuery('header'); //we assume this will be your header
    //now lets fine out what kind of rapidbar it is so we know if we need 35 or 50px of padding
    var paddingNeeded =  ( jQuery('.rad_rapidology_rapidbar_form_content button').data('service') == 'redirect') ? 35 : 50;
    var firstDivPadding = firstDiv.css('padding-top');
    firstDivPadding = parseInt(firstDivPadding.replace('px', '')) + paddingNeeded;
    var headerPadding = header.css('padding-top');
    headerPadding = parseInt(headerPadding.replace('px', '')) + paddingNeeded;
    jQuery(firstDiv).css('padding-top', firstDivPadding);
    jQuery(header).css('padding-top', headerPadding);
}

function rapidbar_remove_padding(){
    var firstDiv = jQuery('body').find("div:first"); //we are going to assume this is the entire page container
    var header = jQuery('header'); //we assume this will be your header
    var firstDivPadding = firstDiv.css('padding-top');
    //now lets fine out what kind of rapidbar it is so we know if we need 35 or 50px of padding
    firstDivPadding = parseInt(firstDivPadding.replace('px', '')) - rapidbarSubmitPaddingNeeded;
    var headerPadding = header.css('padding-top');
    headerPadding = parseInt(headerPadding.replace('px', '')) - rapidbarSubmitPaddingNeeded;
    jQuery(firstDiv).css('padding-top', firstDivPadding);
    jQuery(header).css('padding-top', headerPadding);

    var redirectUrl = jQuery('.rad_rapidology_submit_subscription').data('redirect_url');
    if(redirectUrl) { //dont want to remove if they have a redirect setup with a timer as we want the form to stick around
      jQuery('.rad_rapidology_rapidbar').remove();
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
                    jQuery(buttonText).attr('style', 'color: ' + textColor + ' !important');
                }
            }
        });
    }, delay);
}




