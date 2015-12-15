<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-campaign_monitor.php');

class IntegrationsTestCampaignMonitor extends WP_UnitTestCase {

  function setup() {
	// replace this with some actual testing code
	//test account is under brandon.braner@ave81.com
	$this->instance = 'rapidology_campaign_monitor';
	$this->integration = new $this->instance();
	$this->apiKey = '59aa1cf985e1b529a19f69aa1c786ff6';
	$this->name = 'CampaignMonitorTest';
	$this->badApiKey = 'badkey';

  }


  function test_campaign_monitor_lists_success(){
	//ensure object is created and is instance of the correct provider
	echo $this->instance;
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_campaign_monitor_lists($this->apiKey, $this->name);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  function test_campaign_monitor_lists_fail(){
	//ensure object is created and is instance of the correct provider
	echo $this->instance;
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_campaign_monitor_lists($this->badApiKey, $this->name);
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  function test_subscribe_campaign_monitor_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$first_name = 'Rapidology';
	$last_name = 'Integration Test';
	$email = 'integration_test@ave81test.com';
	$list_id = '6f5c2b6b5b7da3e8b97ed04fa3961fed';
	$results = $this->integration->subscribe_campaign_monitor( $this->apiKey, $email, $list_id, $name = '' );
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
	$results = $this->integration->subscribe_campaign_monitor( $this->apiKey, $email, $list_id, $name = '' );
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
	$results = $this->integration->subscribe_campaign_monitor( $this->apiKey, $email, $list_id, $name = '' );
	$expectedResult = 'success';
	//accepting Already subscribed as a satisfactory result as it indicated we had communicated with the api and recieved a response and api call is working as expected
	$this->assertNotEquals($expectedResult, $results, $results);
  }
  /*


  function test_subscribe_active_campaign_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$form_id = '1435';
	$first_name = 'Rapidology';
	$last_name = 'Integration Test';
	$email = 'integration_test@ave81test.com';
	$lists = ['10']; //needs to be an array
	$results = $this->integration->subscribe_active_campaign($this->url, $this->apiKey, $first_name , $last_name, $email, $lists, $form_id, true);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $results, 'We could not successfully subscribe to active campaign. HINT: email address may already be a contact.');
  }
*/

}

