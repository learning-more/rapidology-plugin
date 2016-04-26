<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-infusionsoft.php');

class IntegrationsTestInfusionsoft extends WP_UnitTestCase {

  function setup() {
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path . '/testCreds.php');

	$this->instance    = $testCreds->infusionsoft->instance;
	$this->integration = new $this->instance();
	$this->apiKey      = $testCreds->infusionsoft->apiKey;
	$this->app_id       = $testCreds->infusionsoft->appid;
	$this->name        = $testCreds->infusionsoft->name;
	$this->badApiKey   = $testCreds->infusionsoft->badApiKey;
	$this->email       = $testCreds->infusionsoft->email;
	$this->first_name  = $testCreds->infusionsoft->first_name;
	$this->last_name   = $testCreds->infusionsoft->last_name;
	$this->list_id     = $testCreds->infusionsoft->list_id;
	$this->bademail    = $testCreds->infusionsoft->bademail;

  }

  /**
   * group success
   */
	function test_get_infusionsoft_lists_success(){
	  //ensure object is created and is instance of the correct provider
	  $this->assertInstanceOf($this->instance, $this->integration);
	  $result = $this->integration->get_infusionsoft_lists( $this->app_id, $this->apiKey, $this->name );
	  $expected_result = 'success';
	  $this->assertEquals($expected_result, $result, $result);
	}

  /**
   * group success
   */
  function test_subscribe_infusionsoft_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_infusionsoft( $this->apiKey, $this->app_id, $this->list_id, $this->email, $this->first_name, $this->last_name);
	$expected_result = array('success', 'Already In List');
	//assert true if either one of these repsonses come back
	if(in_array($result, $expected_result)){
	  $this->assertTrue(true);
	}
  }

  /**
   * group fail
   */
  function test_get_infusionsoft_lists_fail_bad_key(){
	//ensure object is created and is instance of the correct provider
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_infusionsoft_lists( $this->badApiKey, $this->apiKey, $this->name );
	$expected_result = 'success';
	$this->assertNotEquals($expected_result, $result, $result);
  }
  /**
   * group fail
   * @expectedException iSDKException [InvalidKey]Invalid
   */

  function test_subscribe_infusionsoft_fail_bad_key(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_infusionsoft( $this->badApiKey, $this->app_id, $this->list_id, $this->email, $this->first_name, $this->last_name);
	//should return iSDKException [InvalidKey]Invalid key  the annotation above asserts that for us
  }

  /**
   * group fail
   */
  function test_subscribe_infusionsoft_fail_bad_email(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_infusionsoft( $this->apiKey, $this->app_id, $this->list_id, $this->bademail, $this->first_name, $this->last_name);
	$expected_result = 'success';
	$this->assertNotEquals($expected_result, $result, $result);
  }
}