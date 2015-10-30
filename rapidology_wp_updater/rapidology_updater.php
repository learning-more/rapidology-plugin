<?php
/*
* Plugin Name: Rapidology By LeadPages Updater
* Plugin URI: http://www.rapidology.com?utm_campaign=rp-rp&utm_medium=wp-plugin-screen
* Version: 1.0
* Description: 100% Free List Building & Popup Plugin...With Over 100 Responsive Templates & 6 Different Display Types For Growing Your Email Newsletter
* Author: Rapidology
* Author URI: http://www.rapidology.com?utm_campaign=rp-rp&utm_medium=wp-plugin-screen
* License: GPLv2 or later
*/

/**
 *
 * This is a very simple plugin that should be deleted as soon as the update is finished.
 * Upon acceptance from the WordPress repo we need to rename the plugin folder from rapidology to rapidology-by-leadpages
 * to recieve updates from the repo
 *
 */

function rapidology_updater(){
	$old_file = WP_PLUGIN_DIR.'/rapidology';
	$new_file = WP_PLUGIN_DIR.'/rapidology-by-leadpages';

	deactivate_plugins( 'rapidology/rapidology.php' );
	rename($old_file, $new_file);
	//$result = activate_plugin( 'rapidology-by-leadpages/rapidology.php', '', true );
	if ( is_wp_error( $result ) ) {
		print_r($result);die();
	}
}
register_activation_hook( __FILE__, 'rapidology_updater' );

