<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelolatiket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tiket3daypass_model');
        $this->load->model('Tiketdailypass_model');
    }

    public function index()
    {
        $data['ticket'] = $this->Tiketdailypass_model->get_all_tickets();
        $data['tickets'] = $this->Tiket3daypass_model->get_all_3day();

        $this->load->view('admin/layout/header'); 
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar');
        $this->load->view('admin/kelolatiket', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add_tiket_3day()
    {
        $this->db->select_max('id');
        $query = $this->db->get('Tiket3daypass');
        $row = $query->row();
        $new_id = $row->id + 1;

        $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
        $tanggal_kegiatan_json = json_encode($tanggal_kegiatan);

        $data = array(
            'id' => $new_id,
            'ticketKategori' => $this->input->post('kategori'),
            'price' => $this->input->post('price'),
            'stok' => $this->input->post('stok'),
            'Tanggal' => $tanggal_kegiatan_json
        );
        $this->Tiket3daypass_model->add_tiket_3day($data);
        $this->session->set_flashdata('pesan', 'Tiket 3 Day Pass berhasil ditambahkan');
        redirect('kelolatiket');
    }

    public function add_tiket_daily()
    {
        $this->db->select_max('id');
        $query = $this->db->get('Tiketdailypass');
        $row = $query->row();
        $new_id = $row->id + 1;

        $tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
        $tanggal_kegiatan_json = json_encode($tanggal_kegiatan);

        $data = array(
            'id' => $new_id,
            'ticketKategori' => $this->input->post('kategori'),
            'price' => $this->input->post('price'),
            'stok' => $this->input->post('stok'),
            'Tanggal' => $tanggal_kegiatan_json
        );
        
        $this->Tiketdailypass_model->add_tiket_daily($data);
        $this->session->set_flashdata('pesandaily', 'Tiket Daily Pass berhasil ditambahkan');
        redirect('kelolatiket');
    }

    public function edit_tiket_3day($id)
    {
        $data['ticket'] = $this->Tiket3daypass_model->get_tiket_by_id($id);
        $this->load->view('admin/layout/header'); 
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar');
        $this->load->view('admin/edit_tiket_3day', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update_tiket_3day()
    {
        $id = $this->input->post('id');
        $data = array(
            'ticketKategori' => $this->input->post('kategori'),
            'price' => $this->input->post('price'),
            'stok' => $this->input->post('stok'),
            'Tanggal' => $this->input->post('Tanggal_konser'),
        );
        $this->Tiket3daypass_model->update_tiket_3day($id, $data);
        $this->session->set_flashdata('pesan', 'Tiket 3 Day Pass berhasil diubah');
        redirect('kelolatiket');
    }

    public function delete_tiket_3day($id)
    {
        $this->Tiket3daypass_model->delete_tiket_3day($id);
        $this->session->set_flashdata('pesan', 'Tiket 3 Day Pass berhasil dihapus');
        redirect('kelolatiket');
    }

    public function edit_tiket_daily($id)
    {
        $data['ticket'] = $this->Tiketdailypass_model->get_tiket_by_id($id);
        $this->load->view('admin/layout/header'); 
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar');
        $this->load->view('admin/edit_tiket_daily', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update_tiket_daily()
    {
        $id = $this->input->post('id');
        $data = array(
            'ticketKategori' => $this->input->post('kategori'),
            'price' => $this->input->post('price'),
            'stok' => $this->input->post('stok'),
        );
        $this->Tiketdailypass_model->update_tiket_daily($id, $data);
        $this->session->set_flashdata('pesandaily', 'Tiket Daily Pass berhasil diubah');
        redirect('kelolatiket');
    }

    public function delete_tiket_daily($id)
    {
        $this->Tiketdailypass_model->delete_tiket_daily($id);
        $this->session->set_flashdata('pesandaily', 'Tiket Daily Pass berhasil dihapus');
        redirect('kelolatiket');
    }
}
