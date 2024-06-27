<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyticket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $ticket_id = $this->input->get('ticket_id');
        $kategori = $this->input->get('kategori');
        $price = $this->input->get('price');

        // Mengambil data tanggal dari database
        $this->load->model('Tiketdailypass_model');
        $tanggal_kegiatan = $this->Tiketdailypass_model->get_tanggal_kegiatan($ticket_id);

        // Format each date individually
        if (!empty($tanggal_kegiatan)) {
            $formatted_dates = [];
            foreach ($tanggal_kegiatan as $date) {
                // Pastikan $date adalah dalam format yang bisa di-parse oleh PHP
                $timestamp = strtotime($date);
                $day = date('d', $timestamp);
                $month = date('F', $timestamp);
                $month = $this->translate_month($month); // Translate month to Indonesian
                $year = date('Y', $timestamp);
                $formatted_dates[] = [
                    'date' => $date,
                    'formatted' => "$day $month $year"
                ];
            }
        } else {
            $formatted_dates = [];
        }

        // Mengirim parameter ke view
        $data['ticket_id'] = $ticket_id;
        $data['kategori'] = $kategori;
        $data['price'] = $price;
        $data['Tanggal'] = $formatted_dates;
        $data['tanggal_kegiatan'] = $tanggal_kegiatan;

        $this->load->view('Buyticket', $data);
    }

    private function translate_month($month) {
        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        return $months[$month] ?? $month;
    }

    public function buy_ticket()
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
            $this->load->view('buyticket', $data);
        } 
        else {
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
                'TanggalKonser' => $this->input->post('Tanggal'),
                'TicketCategory' => $this->input->post('TicketCategory'),
                'price' => $this->input->post('price'),
                'payment' => $this->input->post('payment'),
            );
            $this->user_model->buy_ticket3day($data);

            // Reduce ticket stock in 'Tiketdailypass' table
            $id = $this->input->post('ticket_id'); // Assuming you have a hidden field for ticket ID in your form

            // Fetch current ticket stock
            $ticket = $this->Tiketdailypass_model->get_tiket_by_id($id);
            if ($ticket) {
                // Update ticket stock
                $new_stok = $ticket->stok - 1;
                $this->Tiketdailypass_model->update_tiket_daily($id, array('stok' => $new_stok));

                // Check if stock has become 0
                if ($new_stok == 0) {
                    // Delete ticket entry if stock is 0
                    $this->Tiketdailypass_model->delete_tiket_daily($id);
                }

                // Set session data for the ticket
                $this->session->set_userdata('ticket_data', $data);

                $this->session->set_flashdata('pesandaily', 'Tiket Daily Pass berhasil ditambahkan');
                redirect('cetaktiket');
            } else {
                // Handle ticket not found scenario
                $this->session->set_flashdata('error', 'Ticket not found.');
                redirect('buyticket');
            }
        }
    }

}

/* End of file Buyticket.php and path \application\controllers\Buyticket.php */
