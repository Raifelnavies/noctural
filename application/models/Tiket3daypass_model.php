<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket3daypass_model extends CI_Model 
{
    public function get_three_days_pass_terjual()
    {
        return $this->db->count_all('Tiket3daypass');
    }

    public function get_all_3day()
    {
        $query = $this->db->get('Tiket3daypass');
        return $query->result();
    }

    public function add_tiket_3day($data)
    {
        return $this->db->insert('Tiket3daypass', $data);
    }
    
    public function get_tiket_by_id($id)
    {
        $query = $this->db->get_where('Tiket3daypass', array('id' => $id));
        return $query->row();
    }

    public function update_tiket_3day($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('Tiket3daypass', $data);
    }

    public function delete_tiket_3day($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('Tiket3daypass');
    }
}
