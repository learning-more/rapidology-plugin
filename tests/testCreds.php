<?php

$testCreds = new stdClass();

/**
 * Emma test credientals
 */
$testCreds->emma 						= new stdClass();
$testCreds->emma->instance				= 'rapidology_emma';
$testCreds->emma->public_key 			= '';//public api key
$testCreds->emma->public_key_invalid 	= 'badkey';//public api key
$testCreds->emma->private_key			= '';//private api key
$testCreds->emma->account_id			= '';//account id
$testCreds->emma->name					= 'emmatest';
$testCreds->emma->fistname				= 'rapidology';
$testCreds->emma->last_name				= 'test';
$testCreds->emma->email					= '';
$testCreds->emma->list_id				= '';

/**
 * Active Campaign test credientals
 */

$testCreds->activecampaign				= new stdClass();
$testCreds->activecampaign->instance	= 'rapidology_activecampaign';
$testCreds->activecampaign->apiKey 		= '';
$testCreds->activecampaign->url 		= '://leadpages.api-us1.com';
$testCreds->activecampaign->name 		= '';
$testCreds->activecampaign->badApiKey 	= 'badkey';

$testCreds->activecampaign->form_id		= '';
$testCreds->activecampaign->first_name 	= 'Rapidology';
$testCreds->activecampaign->last_name 	= 'Integration Test';
$testCreds->activecampaign->email 		= '';
$testCreds->activecampaign->lists 		= ['']; //needs to be an array, should be list id(numeric but passed as string)

/**
 * Salesforce setup
 */
$testCreds->salesforce					= new stdClass();
$testCreds->salesforce->instance		= 'rapidology_salesforce';
$testCreds->salesforce->url				= ''; // url just needs to be the suddomain of the url you see when you login to salesforce. Method fills out the rest
$testCreds->salesforce->url_invalid		= '';
$testCreds->salesforce->version			= ''; //needs to be a float
$testCreds->salesforce->client_key		= '';
$testCreds->salesforce->client_secret	= '';
$testCreds->salesforce->username_sf		= '';
$testCreds->salesforce->password_sf		= '';
$testCreds->salesforce->token			= '';
$testCreds->salesforce->token_invalid	= 'invalidtoken';
$testCreds->salesforce->name 			= 'salesforcetest';
$testCreds->salesforce->fistname		= 'rapidology';
$testCreds->salesforce->last_name		= 'test';
$testCreds->salesforce->email			= '';
$testCreds->salesforce->list_id			= '';

/**
 * Campaign Monitor test creds
 */

$testCreds->campaignmonitior				= new stdClass();
$testCreds->campaignmonitior->instance 		= 'rapidology_campaign_monitor';
$testCreds->campaignmonitior->apiKey 		= '';
$testCreds->campaignmonitior->name 			= 'CampaignMonitorTest';
$testCreds->campaignmonitior->badApiKey 	= 'badkey';
$testCreds->campaignmonitior->first_name 	= 'Rapidology';
$testCreds->campaignmonitior->last_name 	= 'Integration Test';
$testCreds->campaignmonitior->email 		= '';
$testCreds->campaignmonitior->list_id 		= '';
$testCreds->campaignmonitior->bademail 		= ''; //add email that is not valid(leave off .com)
