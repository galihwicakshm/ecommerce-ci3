<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
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

    public function index()
    {
        $data = array(
            'akun' => $this->m_pelanggan->get_datagambar(),
            'title' => 'Pesanan Saya',
            'belum_bayar' => $this->m_transaksi->belum_bayar(),
            'diproses' => $this->m_transaksi->diproses(),
            'dikirim' => $this->m_transaksi->dikirim(),
            'diterima' => $this->m_transaksi->diterima(),
            'batal' => $this->m_transaksi->batal(),
            'dibatalkan' => $this->m_transaksi->dibatalkan(),
            'review' => $this->m_transaksi->review(),
            'isi' => 'v_pesanan_saya',
        );

        $this->load->view('layout/v_wrapper_frontend', $data);
    }

    public function bayar($no_order)
    {

        $data = array(
            $no_order = $this->uri->segment(3),
            'title' => 'Pembayaran',
            'akun' => $this->m_pelanggan->get_datagambar(),
            'midtrans' => $this->m_midtrans->get($no_order),
            'pesanan' => $this->m_transaksi->detail_pesanan($no_order),
            'rincian' => $this->m_rincian->get_data($no_order),
            'rincianinp' => $this->m_rincian->get_rincian($no_order),
            'no_order' => $no_order,
            'status_order' => '1',
            'isi' => 'v_bayar_new',
        );
        $this->load->view('layout/v_wrapper_frontend', $data);
    }

    public function invoice($no_order)
    {

        $data = array(

            'rincian' => $this->m_rincian->invoice($no_order),
            'pesanan' => $this->m_transaksi->detail_pesanan($no_order),
            'isi' => 'v_invoice',
        );
        $this->load->view('v_invoice_new', $data);
    }

    public function diterima($no_order)
    {

        $data =  array(
            'no_order' => $no_order,
            'status_order' => '3'
        );
        $this->m_pesananmasuk->status_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah di Terima');
        redirect('pesanan_saya');
    }


    public function batal($no_order)
    {

        $data =  array(
            'no_order' => $no_order,
            'status_order' => '4'
        );
        $this->m_pesananmasuk->status_order($data);
        $this->m_pesananmasuk->status_orderinci($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah di Batalkan');
        redirect('pesanan_saya');
    }

    public function review($no_order)
    {
        $data = array(
            $no_order = $this->uri->segment(3),
            'title' => 'Pembayaran',
            'akun' => $this->m_pelanggan->get_datagambar(),
            'midtrans' => $this->m_midtrans->get($no_order),
            'pesanan' => $this->m_transaksi->detail_pesanan($no_order),
            'rincian' => $this->m_rincian->invoice($no_order),
            'rincianinp' => $this->m_rincian->get_rincian($no_order),
            'no_order' => $no_order,
            'pesanan' => $this->m_transaksi->detail_pesanan($no_order),
            'gambar' => $this->m_transaksi->gambarReview($no_order),
            'isi' => 'v_review',
            'getrincian'
            => $this->m_rincian->getRincian($no_order),
        );
        $this->load->view('layout/v_wrapper_frontend', $data);
    }

    public function review_produk($no_order)
    {
        $id_barang =  $this->uri->segment(4);
        $data = array(
            'pesanan' => $this->m_transaksi->detail_pesanan($no_order),
            'title' => 'Ulasan',
            'gambar' =>
            $this->m_home->detailReview($id_barang),
            'review' => $this->m_home->detailReview($id_barang),
            'isi' => 'v_ulasan',
            'akun' => $this->m_pelanggan->get_datagambar(),

        );
        $this->load->view('layout/v_wrapper_frontend', $data);
    }

    public function addreview()
    {
        $config['upload_path'] = './assets/review';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|jfif';
        $config['max_size']     = '2000';
        $this->upload->initialize($config);
        $field_name = "gambar";
        if (!$this->upload->do_upload($field_name)) {
            $data = array(
                'title' => 'Ulasan',
                'error_upload' => $this->upload->display_errors(),
                'isi' => 'v_ulasan',
            );
            $this->load->view($this->upload->display_errors());
        } else {
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|jfif';
            $config['max_size']     = '2000';
            $config['source_image'] = './assets/review' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'id_barang' => $this->input->post('id_barang'),
                'review' => $this->input->post('review'),
                'rating' => $this->input->post('rating'),
                'gambarreview' => $upload_data['uploads']['file_name'],

            );
            $this->m_home->addReview($data);

            $dataupdate = array(
                'no_order' => $this->input->post('no_order'),
                'id_barang' => $this->input->post('id_barang'),
                'status_order' => 1,
            );
            $this->m_home->updateReview($dataupdate);
            redirect('pesanan_saya');
        }
    }
}
