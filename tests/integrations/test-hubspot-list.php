<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-hubspot.php');

class IntegrationsTestHubspotList extends WP_UnitTestCase {
  function setup(){
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path.'/testCreds.php');

	$this->instance				= $testCreds->hubspotList->instance;
	$this->integration			= new $testCreds->hubspotList->instance();
	$this->account_id			= $testCreds->hubspotList->account_id;
	$this->account_id_bad		= $testCreds->hubspotList->account_id_bad;
	$this->apiKey				= $testCreds->hubspotList->apiKey;
	$this->badApiKey			= $testCreds->hubspotList->badApiKey;
	$this->email				= $testCreds->hubspotList->email;
	$this->bademail				= $testCreds->hubspotList->bademail;
	$this->list_id				= $testCreds->hubspotList->list_id;
	$this->name					= $testCreds->hubspotList->name;
	$this->first_name			= $testCreds->hubspotList->first_name;
	$this->last_name			= $testCreds->hubspotList->last_name;
	$this->post_name			= $testCreds->hubspotList->post_name;
  }

  /**
   * @group success
   */
  function test_get_hubspot_lists_success(){
	//assert that class has been instantiated
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_hubspot_lists($this->apiKey, $this->name );
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group success
   */

  function test_hubspot_subscribe_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->hubspot_subscribe($this->apiKey, $this->email, $this->list_id, $this->first_name, $this->last_name);
	$expectedResult = 'success';//expected result if the api key were good
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group fail
   */

  function test_get_hubspot_lists_fail(){
	//assert that class has been instantiated
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_hubspot_lists($this->badApiKey, $this->name );
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group fail
   */
  function test_hubspot_subscribe_fail(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->hubspot_subscribe($this->badApiKey, $this->email, $this->list_id, $this->first_name, $this->last_name);
	$expectedResult = 'success';//expected result if the api key were good
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group fail
   */
  function test_hubspot_subscribe_fail_bad_email(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->hubspot_subscribe($this->apiKey, $this->bademail, $this->list_id, $this->first_name, $this->last_name);
	$expectedResult = 'success';//expected result if the api key were good
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

}