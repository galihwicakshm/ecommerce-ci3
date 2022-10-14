<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_pesananmasuk');
        $this->load->model('m_midtrans');
        $this->load->model('m_rincian');
        $this->load->model('m_pelanggan');
    }

    public function ulasan($no_order)
    {
        $data = array(

            'akun' => $this->m_pelanggan->get_datagambar(),
            'gambar' => $this->m_transaksi->gambarReview($no_order),
            'isi' => 'v_ulasan',
        );
        $this->load->view('layout/v_wrapper_frontend', $data);
    }
}
