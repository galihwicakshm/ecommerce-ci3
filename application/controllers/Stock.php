<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Datapelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        

    }

    public function update( $id_barang )
    {
        $data = array(
            'id_baraang' =>$id_barang,
            'stock' => $this->input->post('stock'),
           
        );
        $this->m_barang->update($data);
        $this->session->set_flashdata('pesan','Data  Berhasil Diupdate!');
        redirect('kategori');
    }

}