<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rincian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rincian');
    }


    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Rincian',
            'rinci' => $this->m_rincian->get_all_data(),
            'isi' => 'v_rincian_new',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }

    public function order($no_order)
    {
        $data = array(
            $no_order = $this->uri->segment(3),
            'title' => 'Rincian Order',
            'rinciandata' => $this->m_rincian->get_data($no_order),
            'rincianorder' => $this->m_rincian->get_rincian($no_order),
            'isi' => 'v_order_new',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }
}
