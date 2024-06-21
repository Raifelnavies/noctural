<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyticket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $kategori = $this->input->get('kategori');
        $price = $this->input->get('price');
        $ticket_id = $this->input->get('ticket_id'); // Pastikan ini berisi nilai ID tiket yang benar

        // Mengirim parameter ke view
        $data['kategori'] = $kategori;
        $data['price'] = $price;
        $data['ticket_id'] = $ticket_id;

        $this->load->view('buyticket', $data);
    }


    public function buy_ticket()
    {
        // Validate form input
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nomerTelpon', 'Phone Number', 'required');
        $this->form_validation->set_rules('TanggalKonser', 'Tanggal', 'required');
        $this->form_validation->set_rules('payment', 'Payment Method', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, load the view with errors
            $this->load->view('buyticket');
        } else {
            // Generate unique ticket number
            $random_number = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
            $number_of_ticket = 'NF' . $random_number;
    
            // Prepare data to insert into 'user' table
            $data = array(
                'nama' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'nomerTelpon' => $this->input->post('nomerTelpon'),
                'NumberOfTicket' => $number_of_ticket,
                'TicketCategory' => $this->input->post('TicketCategory'),
                'price' => $this->input->post('price'),
                'TanggalKonser' => $this->input->post('TanggalKonser'),
                'payment' => $this->input->post('payment'),
            );
    
            // Insert user data into 'user' table
            $this->user_model->buy_ticket($data);
    
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
    
                // Set flash message and redirect
                $this->session->set_flashdata('pesandaily', 'Tiket Daily Pass berhasil ditambahkan');
    
                // Save ticket data to session
                $this->session->set_userdata('ticket_data', $data);
    
                // Redirect to cetaktiket
                redirect('cetaktiket');
            } else {
                // Handle ticket not found scenario
                // Redirect or show error message
            }
        }
    }
    
}

/* End of file Buyticket.php and path \application\controllers\Buyticket.php */
