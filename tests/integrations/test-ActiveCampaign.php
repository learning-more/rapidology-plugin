<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-activecampaign.php');

class IntegrationsTestActiveCampaign extends WP_UnitTestCase {

  function setup() {
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path.'/testCreds.php');
	// replace this with some actual testing code
	$this->instance 	= $testCreds->activecampaign->instance;
	$this->integration 	= new $this->instance();
	$this->apiKey 		= $testCreds->activecampaign->apiKey;
	$this->url 			= $testCreds->activecampaign->url;
	$this->name 		= $testCreds->activecampaign->name;
	$this->badApiKey 	= $testCreds->activecampaign->badApiKey;

	$this->form_id		=$testCreds->activecampaign->form_id;
	$this->first_name	=$testCreds->activecampaign->first_name;
	$this->last_name	=$testCreds->activecampaign->last_name;
	$this->email		=$testCreds->activecampaign->email;
	$this->lists		=$testCreds->activecampaign->lists;
  }


  function test_get_active_campagin_forms_success(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf('rapidology_activecampaign', $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_active_campagin_forms($this->url, $this->apiKey, $this->name);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, 'Test for getting Active Campaign forms failed');
  }

  function test_get_active_campagin_forms_fail(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf('rapidology_activecampaign', $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_active_campagin_forms($this->url, $this->badApiKey, $this->name);
	$unexpectedResult = 'success';
	$this->assertNotEquals($unexpectedResult, $result, 'Test to ensure proper failure of active campaign form retrieval returned success, it should  not.');
  }

  function test_subscribe_active_campaign_success(){
	$this->assertInstanceOf('rapidology_activecampaign', $this->integration);
	$results = $this->integration->subscribe_active_campaign($this->url, $this->apiKey, $this->first_name , $this->last_name, $this->email, $this->lists, $this->form_id);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $results, 'We could not successfully subscribe to active campaign. HINT: email address may already be a contact.');
  }


}

