<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_admin');
        $this->load->model('m_pelanggan');
    }


    public function error()
    {

        $this->load->view('v_error_page');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'akun' => $this->m_pelanggan->get_datagambar(),
            'barang' => $this->m_home->get_all_data(),
            'barang_trend' => $this->m_home->get_all_data_trend(),
            'isi' => 'v_home',
        );
        $this->load->view('layout/v_wrapper_frontend_home', $data);
    }

    public function home()
    {
        $data = array(
            'title' => 'Home',
            'barang' => $this->m_home->get_all_data(),
            'barang_trend' => $this->m_home->get_all_data_trend(),
            'isi' => 'v_home',
        );
        $this->load->view('layout/v_wrapper_frontend_home', $data);
    }


    public function detail_barang($id_barang)
    {

        $keranjang = $this->cart->contents();
        $data = array(
            'title' => 'Detail Barang',
            'keranjang' => $keranjang,
            'akun' => $this->m_pelanggan->get_datagambar(),
            'gambar' => $this->m_home->gambar_barang($id_barang),
            'barang' => $this->m_home->detail_barang($id_barang),
            'review' => $this->m_home->getReview($id_barang),
            'isi' => 'v_detail_barang_new',
        );
        $this->load->view('layout/v_wrapper_detailbarang_front', $data);
    }


    public function produk()
    {
        $this->load->library('pagination');
        $row = $this->m_home->baris_data();

        $config['base_url'] = 'http://localhost:8080/berkahkomputer/home/produk';
        $config['total_rows'] = $row;
        $config['per_page'] = 6;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $start = $this->uri->segment(3);
        $this->pagination->initialize($config);

        $data = array(

            'pag' => $this->pagination->create_links(),
            'title' => 'Produk',
            'akun' => $this->m_pelanggan->get_datagambar(),
            'total_barang' =>
            $row,
            'barang' => $this->m_home->get_all_data_produk($config['per_page'], $start),
            'isi' => 'layout/v_filter_produk',
        );

        $this->load->view('layout/v_wrapper_detailbarang_front', $data);
    }

    public function kategori_filter($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'akun' => $this->m_pelanggan->get_datagambar(),
            'title' => 'Kategori Barang : ' . $kategori->nama_kategori,
            'total_barang' => $this->m_admin->total_kategori($id_kategori),
            'barang' => $this->m_home->get_all_data_barang($id_kategori),
            'isi' => 'layout/v_urut_kategori',
        );
        $this->load->view('layout/v_wrapper_detailbarang_front', $data, FALSE);
    }

    public function kategori_price()
    {
        if ($price = $this->input->get('price')) {
            $prices = explode('-', $price);
            $lowprice = removeAllCharsExceptNumbers($prices[0]);
            $highprice = removeAllCharsExceptNumbers($prices[1]);
        }
        $data = array(
            'title' => 'Kategori',
            'akun' => $this->m_pelanggan->get_datagambar(),
            'total_barang' => $this->m_home->total_price($lowprice, $highprice),
            'barang' => $this->m_home->getPrice($lowprice, $highprice),
            'isi' => 'layout/v_kategori_price',
        );
        $this->load->view('layout/v_wrapper_detailbarang_front', $data, FALSE);
    }
}

/* End of file Controllername.php */
