<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-hubspot-standard.php');

class IntegrationsTestHubspotStandard extends WP_UnitTestCase {
  function setup(){
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path.'/testCreds.php');

	$this->instance				= $testCreds->hubspotStandard->instance;
	$this->integration			= new $testCreds->hubspotStandard->instance();
	$this->account_id			= $testCreds->hubspotStandard->account_id;
	$this->account_id_bad		= $testCreds->hubspotStandard->account_id_bad;
	$this->apiKey				= $testCreds->hubspotStandard->apiKey;
	$this->badApiKey			= $testCreds->hubspotStandard->badApiKey;
	$this->email				= $testCreds->hubspotStandard->email;
	$this->bademail				= $testCreds->hubspotStandard->bademail;
	$this->list_id				= $testCreds->hubspotStandard->list_id;
	$this->name					= $testCreds->hubspotStandard->name;
	$this->first_name			= $testCreds->hubspotStandard->first_name;
	$this->last_name			= $testCreds->hubspotStandard->last_name;
	$this->post_name			= $testCreds->hubspotStandard->post_name;
	$this->cookie				= $testCreds->hubspotStandard->cookie;
  }

  /**
   * @group success
   */
  function test_get_hubspot_forms_success(){
	//assert that class has been instantiated
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_hubspot_forms($this->account_id, $this->apiKey, $this->name );
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group success
   */

  function test_submit_hubspot_form_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->submit_hubspot_form($this->apiKey, $this->account_id,  $this->email, $this->list_id, $this->first_name, $this->last_name, $this->post_name, $this->cookie);
	$expectedResult = 'success';//expected result if the api key were good
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group fail
   */

  function test_get_hubspot_forms_fail_badkey(){
	//assert that class has been instantiated
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_hubspot_forms($this->account_id, $this->badApiKey, $this->name );
	$expectedResult = 'success';//expected result if the api key were good
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }
  /**
   * @group fail
   */
  function test_submit_hubspot_form_fail(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->submit_hubspot_form($this->badApiKey, $this->account_id_bad,  $this->email, $this->list_id, $this->first_name, $this->last_name, $this->post_name, '');
	$expectedResult = 'success';//expected result if the api key were good
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  function test_submit_hubspot_form_bad_email(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->submit_hubspot_form($this->apiKey, $this->account_id,  $this->bademail, $this->list_id, $this->first_name, $this->last_name, $this->post_name, $this->cookie);
	$expectedResult = 'success';//expected result if the api key were good
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }
}