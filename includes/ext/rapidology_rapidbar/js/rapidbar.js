jQuery(window).on('load', function ($) {
    if(rapidbar.admin_bar){
        jQuery('.rad_rapidology_rapidbar').css('margin-top', '32px');
    }
   setTimeout(rapidbar_fix_padding, 1000);

});

function rapidbar_fix_padding(){
    var firstDiv = jQuery('body').find("div:first"); //we are going to assume this is the entire page container
    var header = jQuery(firstDiv).find("div:first"); //we assume this will be your header
    var firstDivPadding = firstDiv.css('padding-top');
    firstDivPadding = parseInt(firstDivPadding.replace('px', '')) + 30;
    var headerPadding = header.css('padding-top');
    headerPadding = parseInt(headerPadding.replace('px', '')) + 30;
    jQuery(firstDiv).css('padding-top', firstDivPadding);
    jQuery(header).css('padding-top', headerPadding);

}