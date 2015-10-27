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
		$php_check = 'PHP';
	if
	( version_compare( $wp_version, $wp, '<' ) )
		$wp_check = 'WordPress';


	if(isset($php_check)){
	?>
	<div class="error">
        	<p><?php _e( 'Rapidology Notice: Your version of php is unsupported. You may notice some features may not work. Please upgrade to php 5.4 or higher.', 'rapidology' ); ?></p>
		</div>
	<?php
	}
	if(isset($wp_check)){
		?>
		<div class="error">
			<p><?php _e( 'Rapidology Notice: Your version of Wordpress is unsupported. You may notice some features may not work. Please upgrade to WordPress 3.5 or higher.', 'rapidology' ); ?></p>
		</div>
		<?php
	}
}


/**
 * @param $name
 * @param $last_name
 * @return array
 * @description takes the first and last name field, runs so low level logic to decide which fields to drop them into
 */

function rapidology_name_splitter($name, $last_name){

	$return_array=array(); //array of names to be returned
	if($last_name == ''){
		//check to see if firstname has a space, which is assumed to seperate first and last
		$first_space = stripos($name, ' '); //get first occurance of a space
		$second_space = strripos($name, ' '); // get second occurance of a space to check if 3 names were entered

		if($second_space > $first_space || $first_space > 0){
			$name_array = explode(' ', $name); //explode name into an array
			$first_name = array_shift($name_array);
			$name = $first_name;
			$last_name = implode(' ', $name_array); //implode all other names into a string and assign to last name
		}else{
			$last_name = 'WebLead';//generic last name
		}

	}

	$return_array['name'] = $name;
	$return_array['last_name'] = $last_name;
	return $return_array;
}

//autoloader

function rapidology_ext_autoloader($class) {
	if(false !== strpos($class, 'rapidology')) {
		include RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/ext/'.$class.'/class.' . $class . '.php';
	}
}


function rename_plugin_folders_update(){
	//potentialy rename file to match wordpress
	$old_file = WP_PLUGIN_DIR.'/rapidology';
	$new_file = WP_PLUGIN_DIR.'/rapidology_by_leadpages';
	if(file_exists( $old_file )) {
		global $wp_filesystem;
		if (empty($wp_filesystem)) {
			require_once(ABSPATH . '/wp-admin/includes/file.php');
			WP_Filesystem();
		}
		if (!file_exists($new_file)) {
			$wp_filesystem->mkdir($new_file);
			//copy_dir($old_file, $new_file, array('.DS_STORE'));
		}

	}
	$deactivate = deactivate_plugins( plugin_basename( $old_file ) );
	$wp_filesystem->rmdir( $old_file );
	$activate = activate_plugin( plugin_basename( $new_file ) );

}

//add_filter( 'admin_init', 'rename_plugin_folders_update');
function rapidologly_update()
{
	//check if we are updating from github or wordpress
	$update = file_get_contents('https://r0014-2-dot-rapidology-home.appspot.com/download/wp_update.json');
	$update = json_decode($update);
	if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
		if ($update->wordpress_update == false) {
			$config = array(
				'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
				'proper_folder_name' => dirname(plugin_basename(__FILE__)), // this is the name of the folder your plugin lives in
				'zip_url' => 'https://rapidology.com/download/rapidology.zip', // the zip url of the github repo
				'release_url' => 'https://api.github.com/repos/leadpages/rapidology-plugin/releases',
				'api_url' => 'https://api.github.com/repos/leadpages/rapidology-plugin', // the github API url of your github repo
				'raw_url' => 'https://raw.github.com/leadpages/rapidology-plugin/master', // the github raw url of your github repo
				'github_url' => 'https://github.com/leadpages/rapidology-plugin', // the github url of your github repo
				'sslverify' => true, // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
				'requires' => '3.5', // which version of WordPress does your plugin require?
				'tested' => '4.3', // which version of WordPress is your plugin tested up to?
				'readme' => 'README.md' // which file to use as the readme for the version number
			);
			new Rapidology_GitHub_Updater($config);
		}
	}
}
?>