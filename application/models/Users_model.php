<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {


    public function login($email, $password){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('user_login', $email);
        $this->db->where('user_status', '1');
        $query = $this->db->get();
        $row = $query->row_array();
        if ($query->num_rows() > 0 && password_verify( $password, $row['user_senha'])) {
            return $query->row_array();
        }else {
            return FALSE;
        }
    }
}

/* End of file Users_model.php */
