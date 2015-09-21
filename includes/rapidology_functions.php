<?php

//create shortcode for onclick popups

function rapidology_on_click_intent( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"optin_id" => '0'
	), $atts));
	return '<div class="rad_rapidology_click_trigger_element"  data-optin_id="'.$optin_id.'">'.$content.'</div>';
}

add_shortcode("rapidology_on_click_intent", "rapidology_on_click_intent");

?>