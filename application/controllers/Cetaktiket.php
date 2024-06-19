<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetaktiket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Ambil data tiket dari session
        $data['ticket'] = $this->session->userdata('ticket_data');

        if (empty($data['ticket'])) {
            redirect('buyticket');
        }

        $this->load->view('cetaktiket', $data);
    }
}
