<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-campaign_monitor.php');

class IntegrationsTestCampaignMonitor extends WP_UnitTestCase {

  function setup() {
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path.'/testCreds.php');

	$this->instance 	= $testCreds->campaignmonitior->instance;
	$this->integration 	= new $this->instance();
	$this->apiKey 		= $testCreds->campaignmonitior->apiKey;
	$this->name 		= $testCreds->campaignmonitior->name;
	$this->badApiKey 	= $testCreds->campaignmonitior->badApiKey;
	$this->email 		= $testCreds->campaignmonitior->email;
	$this->first_name	= $testCreds->campaignmonitior->first_name;
	$this->last_name	= $testCreds->campaignmonitior->last_name;
	$this->list_id		= $testCreds->campaignmonitior->list_id;
	$this->bademail		= $testCreds->campaignmonitior->bademail;

  }


  function test_campaign_monitor_lists_success(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_campaign_monitor_lists($this->apiKey, $this->name);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  function test_campaign_monitor_lists_fail(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_campaign_monitor_lists($this->badApiKey, $this->name);
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  function test_subscribe_campaign_monitor_success(){
	$this->assertInstanceOf($this->instance, $this->integration);

	$results = $this->integration->subscribe_campaign_monitor( $this->apiKey, $this->email, $this->list_id);
	$expectedResult = 'success';
	//accepting Already subscribed as a satisfactory result as it indicated we had communicated with the api and recieved a response and api call is working as expected
	$this->assertEquals($expectedResult, $results, $results);
  }

  function test_subscribe_campaign_monitor_fail_bad_api(){
	//submit with invalid creds
	$this->assertInstanceOf($this->instance, $this->integration);
	$first_name = 'Rapidology';
	$last_name = 'Integration Test';
	$email = 'integration_test@ave81test.com';
	$list_id = '6f5c2b6b5b7da3e8b97ed04fa3961fed-invalidkey';
	$results = $this->integration->subscribe_campaign_monitor( $this->badApiKey, $this->email, $this->list_id);
	$expectedResult = 'success';
	//accepting Already subscribed as a satisfactory result as it indicated we had communicated with the api and recieved a response and api call is working as expected
	$this->assertNotEquals($expectedResult, $results, $results);
  }
  function test_subscribe_campaign_monitor_fail_bad_email(){
	//submit with invalid email
	$this->assertInstanceOf($this->instance, $this->integration);
	$first_name = 'Rapidology';
	$last_name = 'Integration Test';
	$email = 'integration_test@ave81testcom';//ommited . before .com as that could be a common mistake and should make api fail
	$list_id = '6f5c2b6b5b7da3e8b97ed04fa3961fed-invalidkey';
	$results = $this->integration->subscribe_campaign_monitor( $this->apiKey, $this->bademail, $this->list_id);
	$expectedResult = 'success';
	//accepting Already subscribed as a satisfactory result as it indicated we had communicated with the api and recieved a response and api call is working as expected
	$this->assertNotEquals($expectedResult, $results, $results);
  }

}

