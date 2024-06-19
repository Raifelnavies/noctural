<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    {
        $this->load->view('admin/index');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->admin_model->check_login($username, $password);

        if ($user) {
            // Simpan data pengguna ke session
            $this->session->set_userdata('admin', $user);
            redirect('dashboard');
        } else {
            // Login gagal
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('admin');
        }
    }
}

/* End of file Admin.php and path \application\controllers\Admin.php */
