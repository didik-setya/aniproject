<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Home extends CI_Controller {
    public function index(){
        $data = [
            'view' => 'home/index',
            'title' => 'Aniproject'
        ];
        $this->load->view('template', $data);
    }
}