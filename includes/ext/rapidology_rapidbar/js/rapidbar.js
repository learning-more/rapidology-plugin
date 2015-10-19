jQuery(window).on('load', function ($) {
    var rapidbar_displayed = jQuery('.rad_rapidology_rapidbar').length;
    if(rapidbar.admin_bar && rapidbar_displayed){
        jQuery('.rad_rapidology_rapidbar').css('margin-top', '32px');
    }
    if(rapidbar_displayed) {
        setTimeout(rapidbar_add_padding, 500);
    }
    jQuery('.rad_rapidology_redirect_page, .rad_rapidology_rapidbar .rad_rapidology_close_button, .rad_rapidology_rapidbar .rad_rapidology_submit_subscription').on('click', function(){
        setTimeout(rapidbar_remove_padding, 3000); //use set timeout as it is used the other closing functions
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

    if(jQuery('.rad_rapidology_submit_subscription').data('redirect_url').length == '0') { //dont want to remove if they have a redirect setup with a timer as we want the form to stick around
        jQuery('.rad_rapidology_rapidbar').remove();
    }


}

(function($){
    //check to see if on click is checked or if it is clicked to enable
    // the shortcode button

    function rapidbar_display( $current_popup_auto, $delay ) {
        var page_id = $current_popup_auto.find( '.rad_rapidology_submit_subscription' ).data( 'page_id' ),
            optin_id = $current_popup_auto.find( '.rad_rapidology_submit_subscription' ).data( 'optin_id' ),
            list_id = $current_popup_auto.find( '.rad_rapidology_submit_subscription' ).data( 'list_id' );

        if ( ! $current_popup_auto.hasClass( 'rad_rapidology_animated' ) ) {
            var $cookies_expire_auto = $current_popup_auto.data( 'cookie_duration' ) ? $current_popup_auto.data( 'cookie_duration' ) : false,
                $already_subscribed = checkCookieValue( 'rad_rapidology_subscribed_to_' + optin_id + list_id, 'true' );

            if ( ( ( false !== $cookies_expire_auto && ! checkCookieValue( 'etRapidologyCookie_' + optin_id, 'true' ) ) || false == $cookies_expire_auto ) && ! $already_subscribed ) {
                if ( false !== $cookies_expire_auto ) {
                    make_popup_visible ( $current_popup_auto, $delay, $cookies_expire_auto, 'etRapidologyCookie_' + optin_id + '=true' );
                } else {
                    make_popup_visible ( $current_popup_auto, $delay, '', '' );
                }
            }
        }
    }


    if( $( '.rad_rapidology_rapidbar.rad_rapidology_rapidbar_trigger_auto' ).length ) {
        alert('test');
        $( '.rad_rapidology_rapidbar.rad_rapidology_rapidbar_trigger_auto:not(.rad_rapidology_visible)' ).each( function() {
            var this_el = $( this ),
                delay = '' !== this_el.data( 'delay' ) ? this_el.data( 'delay' ) * 1000 : 0;
            auto_popup( this_el, delay );
        });
    }

})(jQuery);


