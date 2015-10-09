<?php
if (!class_exists('RAD_Dashboard')) {
	require_once(RAD_RAPIDOLOGY_PLUGIN_DIR . 'rapidology.php');
}

class rapidology_redirect extends RAD_Rapidology{

	function redirect_authorize($name){
		$this->update_account( 'redirect', sanitize_text_field( $name ), array(
			'is_authorized'   => 'true'
		) );
		return 'success';
	}


}