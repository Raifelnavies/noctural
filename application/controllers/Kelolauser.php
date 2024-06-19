<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolauser extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('Tiketdailypass_model');
    }

    public function index()
    {
        $data['users'] = $this->user_model->get_all_users(); // Mengambil data pengguna
        $data['tickets'] = $this->Tiketdailypass_model->get_all_tickets(); // Mengambil data tiket

        $this->load->view('admin/layout/header'); 
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar');
        $this->load->view('admin/kelolauser', $data); 
        $this->load->view('admin/layout/footer');
    }

    public function show_tiket($id)
    {
        $data['ticket'] = $this->user_model->get_tiket_by_id($id);
        $this->load->view('admin/cetaktiket_adm', $data);
    }
}

/* End of file Kelolauser.php and path \application\controllers\Kelolauser.php */
