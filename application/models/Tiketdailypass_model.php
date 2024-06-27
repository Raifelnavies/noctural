<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiketdailypass_model extends CI_Model 
{
    public function get_all_tickets()
    {
        $query = $this->db->get('Tiketdailypass');
        return $query->result();
    }

    public function get_tiket_terjual()
    {
        return $this->db->count_all('Tiketdailypass');
    }
    
    public function add_tiket_daily($data)
    {
        return $this->db->insert('Tiketdailypass', $data);
    }
    
    public function get_tiket_by_id($id)
    {
        $query = $this->db->get_where('Tiketdailypass', array('id' => $id));
        return $query->row();
    }

    public function update_tiket_daily($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('Tiketdailypass', $data);
    }

    public function delete_tiket_daily($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('Tiketdailypass');
    }

    public function get_tanggal_kegiatan($ticket_id)
    {
        $this->db->select('Tanggal');
        $this->db->from('Tiketdailypass');
        $this->db->where('id', $ticket_id);
        $query = $this->db->get();

        // Ambil semua data tanggal
        $result = $query->result_array();
        $tanggal_kegiatan = array_column($result, 'Tanggal');

        // Decode JSON string menjadi array tanggal
        return json_decode($tanggal_kegiatan[0], true);
    }

}
