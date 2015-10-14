<?php
if (!class_exists('RAD_Dashboard')) {
	require_once(RAD_RAPIDOLOGY_PLUGIN_DIR . 'rapidology.php');
}

class rapidology_redirect extends RAD_Rapidology{

	function redirect_authorize($name){

		$current_lists = get_site_option('rapidology_redirect_lists');
		$lists = json_decode($current_lists, true);

		$this->update_account( 'redirect', sanitize_text_field( $name ), array(
			'lists'         => $lists,
			'is_authorized' => 'true',
		) );
		return 'success';
	}


}