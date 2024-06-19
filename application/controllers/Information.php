<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');  // Load URL Helper
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('information');
        $this->load->view('footer');
    }
}
?>
