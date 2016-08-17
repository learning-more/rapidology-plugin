<?php

class  IntegrationsTestCenter  extends WP_Ajax_UnitTestCase
{

    public $url = "/webhooks/6QL5VPJBn2XNwcujPUXfqc/sinkers";

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();

    }


//    function test_ajax_initiate_upload() {
//
//
//
//    $response = json_decode( $this->_last_response );
//    $this->assertInternalType( 'object', $response );
//    $this->assertObjectHasAttribute( 'success', $response );
//    $this->assertTrue( $response->success );
//    $this->assertObjectHasAttribute( data, $response );
//    $this->assertEquals( ‘Upload initiated’, $response->data );
//}

    public function test_submit_ajax_call_to_center()
    {
        //mock out the nonce
        $_POST['_wpnonce'] = wp_create_nonce('center_nonce');
        $_POST['data'] = $this->mockData();

        //make ajax call
        try {
            $this->_handleAjax('rapidology_center_webhooks');
        } catch ( WPAjaxDieContinueException $e ) {
            //doesn't actually execute but I guess it needs something here to handle the exception?
            echo $e->getMessage();
        }

        $response = json_decode( $this->_last_response );
        $status = json_decode($response->data);
        $this->assertInternalType( 'object', $response );
        $this->assertTrue($response->success);
        $this->assertEquals(202, $status->_status->code);



    }

    public function mockData()
    {
        $data ="{'email': 'johnnytest@example.com,'first_name': 'John','last_name': 'Test','full_name': 'John Test'}";

        $mapping = '{"mapping":[[["email"], "WebhookEvent", "EmailField"],[["first_name"], "WebhookEvent", "FirstNameField"],[["last_name"], "WebhookEvent", "LastNameField"],[["full_name"], "WebhookEvent", "FullNameField"]]}';

        $submit_data = array(
            'url' => $this->url,
            'data' => $data,
            'mapping' => $mapping
        );

        return $submit_data;
    }
}