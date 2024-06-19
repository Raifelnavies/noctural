<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');  // Memuat URL Helper
    }

    public function index() {
        $data['tickets'] = $this->Tiket3daypass_model->get_all_3day();
        $data['ticket'] = $this->Tiketdailypass_model->get_all_tickets(); 
        $this->load->view('home', $data);
    }
}
