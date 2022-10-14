<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Laporan Penjualan',
            'isi' => 'v_laporan_new',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data, FALSE);
    }

    public function laporan_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = array(
            'title' => 'Laporan Penjualan Harian',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_harian($tanggal, $bulan, $tahun),
            'isi' => 'v_laporan_harian',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }

    public function laporan_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_bulanan($bulan, $tahun),
            'isi' => 'v_laporan_bulanan',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }

    public function laporan_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => 'Laporan Penjualan Tahunan',
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_tahunan($tahun),
            'isi' => 'v_laporan_tahunan',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }
}
