<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-icontact.php');

class IntegrationsTestInfusionsoft extends WP_UnitTestCase {

  function setup() {
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path . '/testCreds.php');

	$this->instance    = $testCreds->icontact->instance;
	$this->integration = new $this->instance();
	$this->app_id      = $testCreds->icontact->app_id;
	$this->username	   = $testCreds->icontact->username;
	$this->password	   = $testCreds->icontact->password;
	$this->folder_id   = $testCreds->icontact->folder_id;
	$this->account_id  = $testCreds->icontact->account_id;
	$this->name        = $testCreds->icontact->name;
	$this->bad_app_id   = $testCreds->icontact->bad_app_id;
	$this->email       = $testCreds->icontact->email;
	$this->first_name  = $testCreds->icontact->first_name;
	$this->last_name   = $testCreds->icontact->last_name;
	$this->list_id     = $testCreds->icontact->list_id;
	$this->bademail    = $testCreds->icontact->bademail;
  }

  /**
   *@group success
   */
  function test_get_icontact_lists_success(){

	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_icontact_lists( $this->app_id, $this->username, $this->password, $this->name );
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return

  }

  /**
   * @group success
   */

  function test_subscribe_icontact_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_icontact($this->app_id, $this->username, $this->password, $this->folder_id, $this->account_id, $this->list_id, $this->email, $this->first_name, $this->last_name);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group fail
   */

  function test_get_icontact_lists_fail_bad_app_id(){

	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_icontact_lists( $this->bad_app_id, $this->username, $this->password, $this->name );
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return

  }

  /**
   * @group fail
   */

  function test_subscribe_icontact_fail_bad_appid(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_icontact($this->bad_app_id, $this->username, $this->password, $this->folder_id, $this->account_id, $this->list_id, $this->email, $this->first_name, $this->last_name);
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group fail
   */

  function test_subscribe_icontact_fail_bad_email(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->subscribe_icontact($this->app_id, $this->username, $this->password, $this->folder_id, $this->account_id, $this->list_id, $this->bademail, $this->first_name, $this->last_name);
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

}