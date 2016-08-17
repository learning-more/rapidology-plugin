<?php

if (!class_exists('RAD_Dashboard')) {
    require_once(RAD_RAPIDOLOGY_PLUGIN_DIR . 'rapidology.php');
}

class rapidology_center extends RAD_Rapidology
{

    public function __contruct()
    {
        parent::__construct();
        $this->permissionsCheck();
    }


    /**
     * submit user to form and lists active campaign
     * @return string
     */

    public function subscribeCenter($data)
    {
        $submit_data = $data['data'];
        $mapping = $data['mapping'];
        $url = "https://stargate-dot-leadpage-test.appspot.com/integration/v1".$data['url'];
        $this->centerMapping($url, $mapping);
        $response = $this->centerSubmitWebhook($url, $submit_data);
        return $response;
    }

    private function centerMapping($url, $mapping)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL            => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING       => "",
          CURLOPT_MAXREDIRS      => 10,
          CURLOPT_TIMEOUT        => 30,
          CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST  => "POST",
          CURLOPT_POSTFIELDS     => json_encode($mapping),
          CURLOPT_HTTPHEADER     => array(
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $response = "cURL Error #:" . $err;
        }

        return $response;
    }

    private function centerSubmitWebhook($url, $submitData)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL            => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING       => "",
          CURLOPT_MAXREDIRS      => 10,
          CURLOPT_TIMEOUT        => 30,
          CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST  => "POST",
          CURLOPT_POSTFIELDS     => json_encode($submitData),
          CURLOPT_HTTPHEADER     => array(
            "cache-control: no-cache",
            "content-type: application/json",
          ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $response = "cURL Error #:" . $err;
        }

        return $response;

    }

}