<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lineup extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');  // Memuat URL Helper
    }

    public function index() {
        $this->load->view('lineup');
    }
}
?>
