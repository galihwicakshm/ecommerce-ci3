<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    public function index()
    {
        $data = array(
            'title' => 'Kategori',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'v_kategori_new',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }

    public function add()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
        );
        $this->m_kategori->add($data);
        $this->session->set_flashdata('pesan', 'Data  Berhasil Ditambahkan!');
        redirect('kategori');
    }


    public function edit($id_kategori)
    {
        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->input->post('nama_kategori'),

        );
        $this->m_kategori->edit($data);
        $this->session->set_flashdata('pesan', 'Data  Berhasil Diupdate!');
        redirect('kategori');
    }

    public function delete($id_kategori)
    {

        $data = array('id_kategori' => $id_kategori);
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('pesan', 'Kategori berhasil dihapus!');
        redirect('kategori');
    }
}

/* End of file Kategori.php */
