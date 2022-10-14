<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }
    
    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->login_pelanggan($email, $password);
        if($cek){
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $email = $cek->email;
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('email', $email);
            redirect('home');
        }else{
            $this->ci->session->set_flashdata('error','Email atau Password salah');
            redirect('pelanggan/login');
        }
    }
    
    public function proteksi(){
        if ($this->ci->session->userdata('email')==''){
            $this->ci->session->set_flashdata('error', 'Anda belum login');
            redirect('pelanggan/login');
        }

        }
    public function logout(){
            $this->ci->session->unset_userdata('id_pelanggan');
            $this->ci->session->unset_userdata('nama_pelanggan');
            $this->ci->session->unset_userdata('email');
            $this->ci->session->set_flashdata('pesan', 'Anda berhasil Logout!');
           
            redirect('pelanggan/login');
         }
    }



/* End of file LibraryName.php */
