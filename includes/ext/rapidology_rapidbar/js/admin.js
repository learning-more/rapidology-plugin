(function($){
    //check to see if on click is checked or if it is clicked to enable
    // the shortcode button

    $body = $('body');

    $(function(){
        //check if click trigger is checked on load, if so show the shortcode button else hide it.
       if($('.rad_rapidology_click_trigger input').prop('checked') == 'true'){
           console.log('show');
           $('.rad_dashboard_next_shortcode').show();
       }else{
           $('.rad_dashboard_next_shortcode').hide();
       }
    });

    //trigger shortcode button on click of trigger checkbox
    $body.on('click', '.rad_rapidology_click_trigger input', function(){
      var checked = ($(this).prop('checked'));
      if(checked == 'true'){
        $('.rad_dashboard_next_shortcode').show();
      }else{
          $('.rad_dashboard_next_shortcode').hide();
      }
    });
})(jQuery);