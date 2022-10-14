<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    public function login_admin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tabel_admin');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
    public function login_pelanggan($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tabel_pelanggan');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}

/* End of file ModelName.php */
