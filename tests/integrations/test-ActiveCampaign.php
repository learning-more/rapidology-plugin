<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-activecampaign.php');

class IntegrationsTestActiveCampaign extends WP_UnitTestCase {

  function setup() {
	// replace this with some actual testing code
	$this->integration = new rapidology_activecampaign();
	$this->apiKey = '59e7111ad66787d1442747ddc53695a7a7231cb8fa8a93feba3e6bfba856e74fa8534ad6';
	$this->url = 'https://leadpages.api-us1.com';
	$this->name = 'ActiveCampaignGetFormsTest';
	$this->badApiKey = 'badkey';
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
	$form_id = '1435';
	$first_name = 'Rapidology';
	$last_name = 'Integration Test';
	$email = 'integration_test@ave81test.com';
	$lists = ['10']; //needs to be an array
	$results = $this->integration->subscribe_active_campaign($this->url, $this->apiKey, $first_name , $last_name, $email, $lists, $form_id, true);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $results, 'We could not successfully subscribe to active campaign. HINT: email address may already be a contact.');
  }


}

