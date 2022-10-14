<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Barang',
            'barang' => $this->m_barang->get_all_data(),
            'isi' => 'barang/v_barang_new',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }


    public function add()
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'deskripsi_singkat',
            'Deskripsi Singkat',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'status_barang',
            'Status Barang',
            'required',
            array('required' => '%s Harus diisi !')
        );
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|jfif';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah Barang',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_add_new',
                );
                $this->load->view('layout/v_wrapper_backend_new', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|jfif';
                $config['max_size']     = '2000';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
                    'stock' => $this->input->post('stock'),
                    'gambar' => $upload_data['uploads']['file_name'],
                    'status_barang' => $this->input->post('status_barang'),
                );
                $this->m_barang->add($data);
                $this->session->set_flashdata('pesan', 'Data  Berhasil Ditambahkan!');
                redirect('barang');
            }
        }
        $data = array(
            'title' => 'Tambah Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'barang/v_add_new',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }



    public function edit($id_barang)
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'deskripsi_singkat',
            'Deskripsi Singkat',
            'required',
            array('required' => '%s Harus diisi !')
        );
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Barang',
                    'barang' => $this->m_barang->get_data($id_barang),
                    'kategori' => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_edit',
                );
                $this->load->view('layout/v_wrapper_backend_new', $data, FALSE);
            } else {
                $barang = $this->m_barang->get_data($id_barang);
                if ($barang->gambar != "") {
                    unlink('./assets/gambar/' . $barang->gambar);
                }
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
                    'stock' => $this->input->post('stock'),
                    'status_barang' => $this->input->post('status_barang'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
                redirect('barang');
            }

            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'berat' => $this->input->post('berat'),
                'deskripsi' => $this->input->post('deskripsi'),
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
                'status_barang' => $this->input->post('status_barang'),
                'stock' => $this->input->post('stock'),

            );
            $this->m_barang->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
            redirect('barang');
        }

        $data = array(
            'title' => 'Edit Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'barang' => $this->m_barang->get_data($id_barang),
            'isi' => 'barang/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend_new', $data);
    }

    //Delete one item
    public function delete($id_barang)
    {
        $barang = $this->m_barang->get_data($id_barang);
        if ($barang->gambar != "") {
            unlink('./assets/gambar/' . $barang->gambar);
        }

        $data = array('id_barang' => $id_barang);
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Barang berhasil dihapus!');
        redirect('barang');
    }
}

/* End of file Barang.php */
