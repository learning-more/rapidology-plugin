<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-salesforce.php');

class IntegrationsTestSalesforce extends WP_UnitTestCase {

  function setup() {
	$this->instance			= 'rapidology_salesforce';
	$this->integration		= new $this->instance();
	$this->url				= 'na34'; // url just needs to be the suddomain of the url you see when you login to salesforce. Method fills out the rest
	$this->url_invalid		= 'n34';
	$this->version			= '34.0'; //needs to be a float
	$this->client_key		= '3MVG9KI2HHAq33Rwtq6CPtB1l0q8YRCtc5TTUvZgE_xlCKrPdvcs14cCqal7ppVsSvAf3np93DJTQzsF6jr.J';
	$this->client_secret	= '3342271131906994273';
	$this->username_sf		= 'brandon.braner@ave81.com';
	$this->password_sf		= 'Jonah12!';
	$this->token			= 'cDADPfTrXPz2Y05ow1YOdibG8';
	$this->token_invalid	= 'invalidtoken';
	$this->name 			= 'salesforcetest';
	$this->fistname			= 'rapidology';
	$this->last_name		= 'test';
	$this->email			= 'rapidologytest@ave81.com';
	$this->list_id			= '70161000000DeVw';
  }

  /**
   * @group success
   */
  function test_get_salesforce_cmpaigns_success(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_salesforce_campagins($this->url, $this->version, $this->client_key, $this->client_secret, $this->username_sf, $this->password_sf, $this->token, $this->name);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group failing
   */
  function test_get_salesforce_cmpaigns_fail_invalid_token(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_salesforce_campagins($this->url, $this->version, $this->client_key, $this->client_secret, $this->username_sf, $this->password_sf, $this->token_invalid, $this->name);
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }
  /**
   * @group failing
   */
  function test_get_salesforce_cmpaigns_fail_invalid_url(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_salesforce_campagins($this->url_invalid, $this->version, $this->client_key, $this->client_secret, $this->username_sf, $this->password_sf, $this->token, $this->name);
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group success
   */
  function test_subscribe_salesforce_success(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->subscribe_salesforce($this->url, $this->version, $this->client_key, $this->client_secret, $this->username_sf, $this->password_sf, $this->token, $this->name, $this->last_name, $this->email, $this->list_id);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

/*
 *
 *
  function test_campaign_monitor_lists_fail(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	//setup items needed to make http call Should we mock this out?
	$result = $this->integration->get_salesforce_campagins($url, $version, $client_key, $client_secret, $username_sf, $password_sf, $token, $name);
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
*/
}

