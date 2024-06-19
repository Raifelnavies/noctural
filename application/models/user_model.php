<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
    public function get_all_users()
    {
        $query = $this->db->get('user'); // Mengambil semua data dari tabel 'user'
        return $query->result(); // Mengembalikan hasil sebagai objek
    }

    public function get_all_tickets()
    {
        $query = $this->db->get('Tiketdailypass'); // Mengambil semua data dari tabel 'ticket'
        return $query->result(); // Mengembalikan hasil sebagai objek
    }

    public function buy_ticket($data)
    {
        return $this->db->insert('user', $data);
    }

    public function buy_ticket3day($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_total_pemasukan()
    {
        $this->db->select_sum('price');
        $query = $this->db->get('user');
        return $query->row()->price; // Mengembalikan total pemasukan
    }

    public function get_tiket_terjual()
    {
        return $this->db->count_all('user'); // Menghitung total daily pass terjual
    }

    public function get_tiket_by_id($id)
    {
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row();
    }

    public function show_tiket($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('Tiket3daypass', $data);
    }
}

/* End of file User_model.php and path \application\models\User_model.php */
