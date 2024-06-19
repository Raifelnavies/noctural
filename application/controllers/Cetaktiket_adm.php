<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetaktiket_adm extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index($id)
    {
        $data['ticket'] = $this->user_model->get_user_ticket($id); // Mengambil data tiket berdasarkan user_id

        $this->load->view('admin/layout/header'); 
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar');
        $this->load->view('admin/cetaktiket_adm', $data); // Mengirim data tiket ke view
        $this->load->view('admin/layout/footer');
    }
}
