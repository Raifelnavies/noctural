<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Mengambil data dari model
        $data['total_pemasukan'] = $this->user_model->get_total_pemasukan();
        $data['tiket_terjual'] = $this->user_model->get_tiket_terjual();

        // Load view dengan data
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
