<?php

/**
 * @return array
 * @description list of all email providers supported in Rapidology. This list is used whenc creating a new optin
 * and selecting a new provider. Please keep it alphabetical
 */
$email_providers_array = array(
	'activecampaign'	=>  'Active Campaign' ,
	'aweber'			=>  'AWeber' ,
	'campaign_monitor'	=>  'Campaign Monitor' ,
	'constant_contact'	=>  'Constant Contact' ,
	'custom_html'		=>  'Custom HTML Form' ,
	'emma'				=>  'Emma' ,
	'feedblitz'			=>  'Feedblitz' ,
	'getresponse'		=>  'GetResponse' ,
	'hubspot'           =>  'HubSpot Lists' ,
	'hubspot-standard'	=>	'HubSpot Standard',
	'icontact'			=>  'iContact' ,
	'infusionsoft'		=>  'Infusionsoft' ,
	'madmimi'			=>  'Mad Mimi' ,
	'mailchimp'         =>  'MailChimp' ,
	'mailpoet'			=>  'MailPoet' ,
	'ontraport'			=>  'Ontraport' ,
	'salesforce'		=>  'Salesforce' ,
	'sendinblue'		=>  'Sendinblue' ,
);


//setup new array for creating a new provider when creating a new optin
//setup default selection
$email_providers_new_optin = array(
	'empty'		=> __('Select One...', 'rapidology')
);
//loop through providers and add them to array. adding wordpress function for internationalization
foreach ($email_providers_array as $key => $value){
	$email_providers_new_optin[$key] = __( $value , 'rapidology');
}

//providers to show name fields on when creating optins
$show_name_fields =  array(
	'constant_contact',
	'sendinblue',
	'feedblitz',
	'mailpoet',
	'campaign_monitor',
	'madmimi',
	'icontact',
	'mailchimp',
	'ontraport',
	'infusionsoft',
	'salesforce',
	'activecampaign',
	'hubspot',
	'hubspot-standard',
	'emma'
);


/**
 * Get all optins that are valid for rapidbars for dropdown in the admin
 */

$all_optins = get_option('rad_rapidology_options');
$valid_optins = array(
	'nopopup'	=> 'Select Optin'
);
$i=0;

foreach($all_optins as $optin => $options){

	if($options['optin_type'] == 'pop_up' || $options['optin_type'] == 'flyin' && $options['optin_status'] == 'active' && $options['display_on'][0] == 'everything'){
		$valid_optins[$optin] = $options['optin_name'];
		$i++;
	}
}


/**
 * Rapidbar position and sticky or not
 */

$rapidbar_position = array(
	'stickytop'			=> 'Sticky on top',
	'stickybottom'		=> 'Sticky on bottom',
	'nonsticktop'		=> 'Static top',
	'nonstickbottom'	=> 'Static bottom'
);
?>