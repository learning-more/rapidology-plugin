<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-constant_contact.php');

class IntegrationsTestActiveCampaign extends WP_UnitTestCase {

  function setup() {
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path . '/testCreds.php');

	$this->instance    	= $testCreds->constantcontact->instance;
	$this->integration 	= new $this->instance();
	$this->email		= $testCreds->constantcontact->email;
	$this->emailBad		= $testCreds->constantcontact->email_bad;
	$this->apiKey		= $testCreds->constantcontact->api_key;
	$this->apiKeyBad	= $testCreds->constantcontact->api_key_bad;
	$this->token		= $testCreds->constantcontact->token;
	$this->list_id		= $testCreds->constantcontact->list_id;
	$this->name			= $testCreds->constantcontact->name;
	$this->first_name	= $testCreds->constantcontact->first_name;
	$this->last_name	= $testCreds->constantcontact->last_name ;
  }

  /**
   * group success
   */

  function test_get_constant_contact_lists_success(){
	//ensure this is instanceated
	$this->assertInstanceof($this->instance, $this->integration);

	//get the result of the method get_constant_contact_list, should equal success
	$result = $this->integration->get_constant_contact_lists($this->apiKey, $this->token, $this->name);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);
  }

  /**
   * group success
   */

  function test_subscribe_constant_contact_success(){
	//ensure this is instanceated
	$this->assertInstanceof($this->instance, $this->integration);

	$result = $this->integration->subscribe_constant_contact( $this->email, $this->apiKey, $this->token, $this->list_id, $this->first_name, $this->last_name);
	//we expect success back from the method call.
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);
  }



  /**
   * group fail
   */

  function test_get_constant_contact_lists_fail_bad_apikey(){
	//ensure this is instanceated
	$this->assertInstanceof($this->instance, $this->integration);

	$result = $this->integration->get_constant_contact_lists($this->apiKeyBad, $this->token, $this->name);
	//we expect success back from the method call if it is successful, this should not return success. Should return a 4xx code

	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);
  }


  /**
   * group fail
   */

  function test_subscribe_constant_contact_fail_bad_apikey(){
	//ensure this is instanceated
	$this->assertInstanceof($this->instance, $this->integration);

	$result = $this->integration->subscribe_constant_contact( $this->email, $this->apiKeyBad, $this->token, $this->list_id, $this->first_name, $this->last_name);
	//we expect success back from the method call if it is successful, this should not return success. Should return a 4xx code
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);
  }

  /**
   * group fail
   */

  function test_subscribe_constant_contact_fail_bad_email(){
	//ensure this is instance of class
	$this->assertInstanceof($this->instance, $this->integration);
	//bad email is missing .com should fail
	$result = $this->integration->subscribe_constant_contact( $this->emailBad, $this->apiKeyBad, $this->token, $this->list_id, $this->first_name, $this->last_name);
	//we expect success back from the method call if it is successful, this should not return success. Should return a 4xx code
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);
  }
}