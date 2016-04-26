<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-getresponse.php');

class IntegrationsTestGetResponse extends WP_UnitTestCase {

  function setup() {
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path . '/testCreds.php');

	$this->instance    = $testCreds->getresponse->instance;
	$this->integration = new $this->instance();
	$this->apiKey      = $testCreds->getresponse->apiKey;
	$this->name        = $testCreds->getresponse->name;
	$this->badApiKey   = $testCreds->getresponse->badApiKey;
	$this->email       = $testCreds->getresponse->email;
	$this->first_name  = $testCreds->getresponse->first_name;
	$this->last_name   = $testCreds->getresponse->last_name;
	$this->list_id     = $testCreds->getresponse->list_id;
	$this->bademail    = $testCreds->getresponse->bademail;
  }


  /**
   * group success
   */
  function test_get_getresponse_lists_success(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_getresponse_lists($this->apiKey, $this->name);
	$expected_result = 'success';
	$this->assertEquals($expected_result, $result, $result);
  }

  /**
   * group success
   */

  function test_subscribe_get_response_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_get_response($this->list_id, $this->email, $this->apiKey, $this->first_name);
	$expected_result = 'success';
	$this->assertEquals($expected_result, $result, $result);
  }

  /**
   * group fail
   */
  function test_get_getresponse_lists_fail_api_key(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_getresponse_lists($this->badApiKey, $this->name);
	$expected_result = 'success';
	$this->assertNotEquals($expected_result, $result, $result);
  }

  /**
   * group fail
   */

  function test_subscribe_get_response_fail_bad_key(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_get_response($this->list_id, $this->email, $this->badApiKey, $this->first_name);
	$expected_result = 'success';
	$this->assertNotEquals($expected_result, $result, $result);
  }

  /**
   * group fail
   */

  function test_subscribe_get_response_fail_bad_email(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_get_response($this->list_id, $this->bademail, $this->apiKey, $this->first_name);
	$expected_result = 'success';
	$this->assertNotEquals($expected_result, $result, $result);
  }


}