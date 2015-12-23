<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-mailchimp.php');

class IntegrationsTestMailChimp extends WP_UnitTestCase {

  function setup() {
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path . '/testCreds.php');

	$this->instance    = $testCreds->mailchimp->instance;
	$this->integration = new $this->instance();
	$this->email       = $testCreds->mailchimp->email;
	$this->emailBad    = $testCreds->mailchimp->email_bad;
	$this->apiKey      = $testCreds->mailchimp->api_key;
	$this->apiKeyBad   = $testCreds->mailchimp->api_key_bad;
	$this->disable_dbl = $testCreds->mailchimp->disable_dbl;
	$this->list_id     = $testCreds->mailchimp->list_id;
	$this->name        = $testCreds->mailchimp->name;
	$this->first_name  = $testCreds->mailchimp->first_name;
	$this->last_name   = $testCreds->mailchimp->last_name;
  }


  /**
   * group success
   */

  function test_get_mailchimp_lists_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_mailchimp_lists($this->apiKey, $this->name);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);
  }

  /**
   * group success
   */

  function test_subscribe_mailchimp_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_mailchimp( $this->apiKey, $this->list_id, $this->email, $this->first_name, $this->last_name, $this->disable_dbl );
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);
  }

  /**
   * group fail
   */

  function test_get_mailchimp_lists_fail_badkey(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_mailchimp_lists($this->apiKeyBad, $this->name);
	//on a successfull cal we expect success, however we should be getting back a invalid API key
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);
  }

  /**
   * group fail
   */

  function test_subscribe_mailchimp_fail_bad_key(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_mailchimp( $this->apiKeyBad, $this->list_id, $this->email, $this->first_name, $this->last_name, $this->disable_dbl );
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);
  }

  /**
   * group fail
   */

  function test_subscribe_mailchimp_fail_bad_email(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_mailchimp( $this->apiKey, $this->list_id, $this->emailBad, $this->first_name, $this->last_name, $this->disable_dbl );
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);
  }

}