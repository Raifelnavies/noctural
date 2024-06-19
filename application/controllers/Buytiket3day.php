<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Buytiket3day extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index()
    {
        $kategori = $this->input->get('kategori');
        $price = $this->input->get('price');
        $ticket_id = $this->input->get('ticket_id');

        // Mengirim parameter ke view
        $data['kategori'] = $kategori;
        $data['price'] = $price;
        $data['ticket_id'] = $ticket_id;

        $this->load->view('buytiket3day', $data);
    }

    public function buy_ticket3day()
    {
        // Validasi input di sisi server
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nomerTelpon', 'Phone Number', 'required');
        $this->form_validation->set_rules('payment', 'Payment Method', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke form dengan pesan kesalahan
            $kategori = $this->input->post('TicketCategory');
            $price = $this->input->post('price');

            $data['kategori'] = $kategori;
            $data['price'] = $price;
            

            $this->load->view('buytiket3day', $data);
        } else {
            // Validasi berhasil, lanjutkan proses penyimpanan data
            $this->db->select_max('id');
            $query = $this->db->get('user');
            $row = $query->row();
            $new_id = $row->id + 1;

            $random_number = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
            $number_of_ticket = 'NF' . $random_number;

            $data = array(
                'id' => $new_id,
                'nama' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'nomerTelpon' => $this->input->post('nomerTelpon'),
                'NumberOfTicket' => $number_of_ticket,
                'TanggalKonser' => 'Full Days',
                'TicketCategory' => $this->input->post('TicketCategory'),
                'price' => $this->input->post('price'),
                'payment' => $this->input->post('payment'),
            );
            $this->user_model->buy_ticket3day($data);

            // Reduce ticket stock in 'Tiketdailypass' table
            $id = $this->input->post('ticket_id'); // Assuming you have a hidden field for ticket ID in your form

            // Fetch current ticket stock
            $ticket = $this->Tiket3daypass_model->get_tiket_by_id($id);
            if ($ticket) {
                // Update ticket stock
                $new_stok = $ticket->stok - 1;
                $this->Tiket3daypass_model->update_tiket_3day($id, array('stok' => $new_stok));

                // Check if stock has become 0
                if ($new_stok == 0) {
                    // Delete ticket entry if stock is 0
                    $this->Tiket3daypass_model->delete_tiket_3day($id);
                }

                $this->session->set_flashdata('pesandaily', 'Tiket Daily Pass berhasil ditambahkan');
                redirect('cetaktiket');
            } else {

            }
        }
    }
}

/* End of file Buytiket3day.php and path \application\controllers\Buytiket3day.php */
