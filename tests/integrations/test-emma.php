<?php

include(RAD_RAPIDOLOGY_PLUGIN_DIR.'/includes/classes/integrations/class.rapidology-emma.php');

class IntegrationsTestEmma extends WP_UnitTestCase {
  function setup(){
	$path = dirname(dirname(dirname(dirname(dirname(plugin_dir_path(__FILE__))))));
	include($path.'/testCreds.php');

	$this->instance				= $testCreds->emma->instance;
	$this->integration			= new $testCreds->emma->instance();
	$this->public_key 			= $testCreds->emma->public_key;//public api key
	$this->public_key_invalid 	= $testCreds->emma->public_key_invalid;//public api key
	$this->private_key			= $testCreds->emma->private_key;
	$this->account_id			= $testCreds->emma->account_id;//account id
	$this->name					= $testCreds->emma->name;
	$this->fistname				= $testCreds->emma->fistname	;
	$this->last_name			= $testCreds->emma->last_name;
	$this->email				= $testCreds->emma->email;
	$this->list_id				= $testCreds->emma->list_id;
  }

  /**
   * @group success
   */
  function test_get_emma_groups_success(){
	//assert that class has been instantiated
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_emma_groups( $this->public_key, $this->private_key, $this->account_id, $this->name );
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group fail
   */
  function test_get_emma_groups_fail_invalid_key(){
	//assert that class has been instantiated
	$this->assertInstanceOf($this->instance, $this->integration);
	$result = $this->integration->get_emma_groups( $this->public_key_invalid, $this->private_key, $this->account_id, $this->name );
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }

  /**
   * @group fail
   */
  function test_emma_memeber_subscribe_success(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result =$this->integration->emma_member_subscribe($this->public_key, $this->private_key, $this->account_id, $this->email, $this->list_id, $this->first_name, $this->last_name);
	$expectedResult = 'success';
	$this->assertEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }
  /**
   * @group success
   */
  function test_emma_memeber_subscribe_fail(){
	$this->assertInstanceOf($this->instance, $this->integration);
	$result =$this->integration->emma_member_subscribe($this->public_key_invalid, $this->private_key, $this->account_id, $this->email, $this->list_id, $this->first_name, $this->last_name);
	$expectedResult = 'success';
	$this->assertNotEquals($expectedResult, $result, $result);//passed result in as error as that is what the plugin will return
  }
}