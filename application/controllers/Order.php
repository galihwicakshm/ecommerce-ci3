<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('m_rincian');
            $this->load->model('m_transaksi');
            
        }
    
    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Rincian',
            'rinci' => $this->m_rincian->get_all_data(),
            'isi' => 'v_orderan',
     );
     $this->load->view('layout/v_wrapper_backend', $data, FALSE);
     
    }

    public function orderan()
    {
        $data = array(
            'title' => 'Rincian',
            'rinci' => $this->m_rincian->rinci(),
            'isi' => 'v_rinciannih',
     );
     $this->load->view('layout/v_wrapper_backend', $data, FALSE);
     
    }

}