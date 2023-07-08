<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Api extends CI_Controller {
    public function index(){
        $url = curl_init();

        curl_setopt($url, CURLOPT_URL, 'https://api.jikan.moe/v4/seasons/now');
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($url);
        curl_close($url);

        $new_out = json_decode($output['data']);

        echo json_encode($new_out);
    }
}