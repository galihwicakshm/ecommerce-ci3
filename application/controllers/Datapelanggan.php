<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Datapelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'User Pelanggan',
            'pelanggan' => $this->m_pelanggan->get_all_data(),
            'isi' => 'v_datapelanggan',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }

    public function add()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'password' => $this->input->post('password'),
        );

        $this->m_pelanggan->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
        redirect('datapelanggan');
    }

    //Update one item
    public function edit($id_pelanggan)
    {
        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'email' => $this->input->post('email'),
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'password' => $this->input->post('password'),
        );
        $this->m_pelanggan->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
        redirect('datapelanggan');
    }

    //Delete one item
    public function delete($id_pelanggaan)
    {
        $data = array('id_pelanggan' => $id_pelanggaan);
        $this->m_pelanggan->delete($data);
        $this->session->set_flashdata('pesan', 'User berhasil dihapus!');
        redirect('datapelanggan');
    }
}
