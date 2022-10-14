<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_auth->login_admin($username, $password);
        if ($cek) {
            $nama_user = $cek->nama_user;
            $username = $cek->username;
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            redirect('admin');
        } else {
            $this->ci->session->set_flashdata('error', 'Username atau Password salah');
            redirect('auth/login_admin');
        }
    }

    public function proteksi()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda belum login');
            redirect('auth/login_admin');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->set_flashdata('pesan', 'Anda berhasil Logout!');
        redirect('auth/login_admin');
    }
}



/* End of file LibraryName.php */
