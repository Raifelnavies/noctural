<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Buytiket3day extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('Tiket3daypass_model'); // Jangan lupa untuk load model Tiket3daypass_model jika belum
    }

    public function index()
    {
        $ticket_id = $this->input->get('ticket_id');
        $kategori = $this->input->get('kategori');
        $price = $this->input->get('price');
        $Tanggal_konser = urldecode($this->input->get('Tanggal_konser'));

        // Decode JSON string to PHP array
        $Tanggal_array = json_decode($Tanggal_konser);

        // If the array is not empty, format the dates
        if (is_array($Tanggal_array)) {
            // Extract the year and month from the first date
            $year = date('Y', strtotime($Tanggal_array[0]));
            $month = date('F', strtotime($Tanggal_array[0]));
            $month = $this->translate_month($month); // Translate month to Indonesian

            // Extract the day parts and format them
            $days = array_map(function($date) {
                return date('d', strtotime($date));
            }, $Tanggal_array);

            $formatted_date = implode(",", $days) . " - " . $month . " - " . $year;
        } else {
            $formatted_date = '';
        }

        // Mengirim parameter ke view
        $data['ticket_id'] = $ticket_id;
        $data['kategori'] = $kategori;
        $data['price'] = $price;
        $data['Tanggal'] = $formatted_date;

        $this->load->view('buytiket3day', $data);
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
                'TanggalKonser' => $this->input->post('Tanggal'),
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

                // Set session data for the ticket
                $this->session->set_userdata('ticket_data', $data);

                $this->session->set_flashdata('pesandaily', 'Tiket Daily Pass berhasil ditambahkan');
                redirect('cetaktiket');
            } else {
                // Handle ticket not found scenario
                $this->session->set_flashdata('error', 'Ticket not found.');
                redirect('buytiket3day');
            }
        }
    }
}

/* End of file Buytiket3day.php and path \application\controllers\Buytiket3day.php */
