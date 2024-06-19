<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }

    public function check_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password); 
        $query = $this->db->get('admin'); 

        if ($query->num_rows() > 0) {
            return $query->row(); 
        } else {
            return false;
        }
    }
}

/* End of file Admin_model.php and path \application\models\Admin_model.php */
