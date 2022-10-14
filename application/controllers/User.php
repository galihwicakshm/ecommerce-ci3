<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'User Admin',
            'user' => $this->m_user->get_all_data(),
            'isi' => 'v_user',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }

    public function add()
    {
        $data = array(
            'nama_admin' => $this->input->post('nama_admin'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );

        $this->m_user->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
        redirect('user');
    }

    //Update one item
    public function edit($id_admin)
    {
        $data = array(
            'id_admin' => $id_admin,
            'nama_admin' => $this->input->post('nama_admin'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );
        $this->m_user->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
        redirect('user');
    }


    public function delete($id_admin)
    {
        $data = array('id_admin' => $id_admin);
        $this->m_user->delete($data);
        $this->session->set_flashdata('pesan', 'User berhasil dihapus!');
        redirect('user');
    }
}

/* End of file User.php */
