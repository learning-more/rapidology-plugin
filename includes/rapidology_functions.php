<?php

/**
*@return string
* create shortcode for onclick popups
*/
function rapidology_on_click_intent( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"optin_id" => '0'
	), $atts));
	return '<div class="rad_rapidology_click_trigger_element"  data-optin_id="'.$optin_id.'">'.$content.'</div>';
}

add_shortcode("rapidology_on_click_intent", "rapidology_on_click_intent");


/**
 * @param string $wp
 * @param string $php
 * check for correct wp and php versions
 */
function rapid_version_check( $wp = '3.5', $php = '5.4' ) {
	global $wp_version;
	if ( version_compare( PHP_VERSION, $php, '<' ) )
		$flag = 'PHP';
	elseif
	( version_compare( $wp_version, $wp, '<' ) )
		$flag = 'WordPress';
	else
		return;
	$version = 'PHP' == $flag ? $php : $wp;
	deactivate_plugins( basename( __FILE__ ) );
	wp_die('<p><strong>Rapidology - By Leadpages</strong> plugin requires '.$flag.'  version '.$version.' or greater.</p><p>PHP Version: 5.6 & WordPress: 4.3 recommended</p>','Plugin Activation Error',  array( 'response'=>200, 'back_link'=>TRUE ) );
}

?>