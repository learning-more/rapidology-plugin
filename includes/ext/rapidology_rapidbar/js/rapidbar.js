jQuery(window).on('load', function ($) {
    if(rapidbar.admin_bar){
        jQuery('.rad_rapidology_rapidbar').css('margin-top', '32px');
    }
   setTimeout(rapidbar_add_padding, 1000);


    jQuery('.rad_rapidology_redirect_page, .rad_rapidology_rapidbar .rad_rapidology_close_button').on('click', function(){
        setTimeout(rapidbar_remove_padding, 400); //use set timeout as it is used the other closing functions
    });
});



function rapidbar_add_padding(){
    var firstDiv = jQuery('body').find("div:first"); //we are going to assume this is the entire page container
    var header = jQuery('header'); //we assume this will be your header
    var firstDivPadding = firstDiv.css('padding-top');
    firstDivPadding = parseInt(firstDivPadding.replace('px', '')) + 30;
    var headerPadding = header.css('padding-top');
    headerPadding = parseInt(headerPadding.replace('px', '')) + 30;
    jQuery(firstDiv).css('padding-top', firstDivPadding);
    jQuery(header).css('padding-top', headerPadding);

}

function rapidbar_remove_padding(){
    var firstDiv = jQuery('body').find("div:first"); //we are going to assume this is the entire page container
    var header = jQuery('header'); //we assume this will be your header
    var firstDivPadding = firstDiv.css('padding-top');
    firstDivPadding = parseInt(firstDivPadding.replace('px', '')) - 30;
    var headerPadding = header.css('padding-top');
    headerPadding = parseInt(headerPadding.replace('px', '')) - 30;
    jQuery(firstDiv).css('padding-top', firstDivPadding);
    jQuery(header).css('padding-top', headerPadding);

}



