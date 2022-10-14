<?php defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_midtrans');
        $this->load->model('m_pelanggan');
    }



    public function index()
    {

        $this->pelanggan_login->proteksi();
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Keranjang',
            'akun' => $this->m_pelanggan->get_dataakun(),
            'isi' => 'v_belanja',
        );
        $this->load->view('layout/v_wrapper_frontend', $data);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   =>  $this->input->post('price'),
            'name'    =>  $this->input->post('name'),
        );
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);

        redirect('belanja');
    }
    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' =>  $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
            );

            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Keranjang Berhasil Di Ubah !');
        redirect('belanja');
    }
    public function clear()
    {
        $this->cart->destroy();
        redirect('home');
    }

    public function checkout()
    {
        $this->pelanggan_login->proteksi();
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array('required' => '%s Harus diisi !'));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Harus diisi !'));
        $this->form_validation->set_rules('ekspedisi', 'Ekspedisi', 'required', array('required' => '%s Harus diisi !'));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array('required' => '%s Harus diisi !'));
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Check Out Belanja',
                'akun' => $this->m_pelanggan->get_datagambar(),
                'isi' => 'v_checkout',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $tgl = date('Y-m-d', strtotime('+1 days'));
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'tanggal_order' => date('Y-m-d'),
                'tanggal_exp' => $tgl,
                'nama_penerima' => $this->input->post('nama_penerima'),
                'telp_penerima' => $this->input->post('telp_penerima'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('kode_pos'),
                'ekspedisi' => $this->input->post('ekspedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'berat' => $this->input->post('berat'),
                'ongkir' => $this->input->post('ongkir'),
                'total_harga' => $this->input->post('total_harga'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0',
            );
            $this->m_transaksi->simpan_transaksi($data);



            $i = 1;
            foreach ($this->cart->contents() as $items) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                    'id_barang' => $items['id'],
                    'nama_barang' => $items['name'],
                    'status_order' => '0',
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_transaksi->simpan_rincitransaksi($data_rinci);
            }
            $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}
