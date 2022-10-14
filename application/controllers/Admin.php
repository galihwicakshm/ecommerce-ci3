<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesananmasuk');
        $this->load->model('m_transaksi');
        $this->load->model('m_rincian');
    }

    public function index()
    {
        $this->user_login->proteksi();

        $data = array(
            'title' => 'Dashboard',
            'total_barang' => $this->m_admin->total_barang(),
            'pelanggan' => $this->m_admin->pelanggan(),
            'admin' => $this->m_admin->admin(),
            'kategori' => $this->m_admin->kategori(),
            'isi' => 'v_admin_new',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }

    // public function dashboard()
    // {
    //     $data = array(
    //         'title' => 'Dashboard',
    //         'total_barang' => $this->m_admin->total_barang(),
    //         'pelanggan' => $this->m_admin->pelanggan(),
    //         'admin' => $this->m_admin->admin(),
    //         'kategori' => $this->m_admin->kategori(),
    //         'isi' => 'v_admin',
    //  );
    //  $this->load->view('layout/v_wrapper_backend_new', $data, FALSE);

    // }
    public function setting()
    {
        $this->form_validation->set_rules(
            'nama_toko',
            'Nama Toko',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'kota',
            'Kota',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'alamat_toko',
            'Alamat Toko',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'no_telpon',
            'No Telpon',
            'required',
            array('required' => '%s Harus diisi !')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'setting' => $this->m_admin->data_setting(),
                'isi' => 'v_setting_new',
            );
            $this->load->view('layout/v_wrapper_backend_new', $data);
        } else {
            $data = array(
                'id' => 1,
                'nama_toko' => $this->input->post('nama_toko'),
                'lokasi' => $this->input->post('kota'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_telpon' => $this->input->post('no_telpon'),
            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Berhasil di Ganti!');
            redirect('admin/setting');
        }
    }

    public function pesananmasuk()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'pesanan' => $this->m_pesananmasuk->pesanan(),
            'pesanan_diproses' => $this->m_pesananmasuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesananmasuk->pesanan_dikirim(),
            'pesanan_diterima' => $this->m_pesananmasuk->pesanan_diterima(),
            'pesanan_dibatalkan' => $this->m_pesananmasuk->pesanan_dibatalkan(),
            'dibatalkan_user' => $this->m_transaksi->dibatalkan(),
            'pembatalan' => $this->m_pesananmasuk->batal(),
            'isi' => 'v_pesananmasuk',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data, FALSE);
    }

    public function proses($no_order)
    {
        $data =  array(
            'no_order' => $no_order,
            'status_order' => '1'
        );
        $this->m_pesananmasuk->status_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil di Proses');
        redirect('admin/pesananmasuk');
    }

    public function kirim($no_order)
    {

        $data =  array(
            'no_order' => $no_order,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2'
        );
        $this->m_pesananmasuk->status_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil di Kirim');
        redirect('admin/pesananmasuk');
    }

    public function delete($no_order)
    {
        $data = array('no_order' => $no_order);
        $this->m_transaksi->delete($data);
        $this->m_rincian->delete($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil dihapus!');
        redirect('admin/pesananmasuk');
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
        redirect('admin/pesananmasuk');
    }
}
