jQuery(window).on('load', function () {
    var rapidbar_displayed = jQuery('.rad_rapidology_rapidbar').length;
    var rapidbar_timedelay = jQuery('.rad_rapidology_rapidbar.rad_rapidology_rapidbar_trigger_auto').data('delay');
    var delay = '' !== rapidbar_timedelay ? rapidbar_timedelay * 1000 : 500;
    if(rapidbar.admin_bar && rapidbar_displayed) {
        setTimeout(function () {
            jQuery('.rad_rapidology_rapidbar').css('margin-top', '32px');
        }, delay);
    }
    if(rapidbar_displayed) {
        setTimeout(rapidbar_add_padding, delay);
    }
    jQuery('.rad_rapidology_redirect_page, .rad_rapidology_rapidbar .rad_rapidology_close_button, .rad_rapidology_rapidbar .rad_rapidology_submit_subscription').on('click', function(){
        setTimeout(rapidbar_remove_padding, 3000); //use set timeout as it is used the other closing functions
    });
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
    var paddingNeeded =  ( jQuery('.rad_rapidology_rapidbar_form_content button').data('service') == 'redirect') ? 35 : 50;
    firstDivPadding = parseInt(firstDivPadding.replace('px', '')) - paddingNeeded;
    var headerPadding = header.css('padding-top');
    headerPadding = parseInt(headerPadding.replace('px', '')) - paddingNeeded;
    jQuery(firstDiv).css('padding-top', firstDivPadding);
    jQuery(header).css('padding-top', headerPadding);

    if(jQuery('.rad_rapidology_submit_subscription').data('redirect_url').length == '0') { //dont want to remove if they have a redirect setup with a timer as we want the form to stick around
        jQuery('.rad_rapidology_rapidbar').remove();
    }
}




