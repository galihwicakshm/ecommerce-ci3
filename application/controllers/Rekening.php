<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rekening');
        

    }

    public function index()
    {
        $data = array(
            'title' => 'Rekening Admin',
            'rekening' => $this->m_rekening->get_all_data(),
            'isi' => 'v_rekening', 
     );
     $this->load->view('layout/v_wrapper_backend', $data, FALSE);
     
    }
    public function add()
    {
            $data = array(
                'nama_bank' => $this->input->post('nama_bank'),
                'no_rek' => $this->input->post('no_rek'),
                'atas_nama' => $this->input->post('atas_nama'),
            );
            
            $this->m_rekening->add($data);
            $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan!');
            redirect('rekening');
    }

    
    public function edit( $id_rekening = NULL )
    {
        $data = array(
            'id_rekening' => $id_rekening,
            'nama_bank' => $this->input->post('nama_bank'),
            'no_rek' => $this->input->post('no_rek'),
            'atas_nama' => $this->input->post('atas_nama'),
        );
        $this->m_rekening->edit($data);
        $this->session->set_flashdata('pesan','Data Berhasil Diubah!');
        redirect('rekening');
    }

    
    public function delete( $id_rekening = NULL )
    {
        $data = array('id_rekening' => $id_rekening);
        $this->m_rekening->delete($data);
        $this->session->set_flashdata('pesan','User berhasil dihapus!');
        redirect('rekening');

    }
}



