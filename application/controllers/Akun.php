<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
    }

    public function index()
    {
        $this->pelanggan_login->proteksi();
        $data = array(
            'title' => 'User Pelanggan',
            'akun' => $this->m_pelanggan->get_dataakun(),
            'isi' => 'v_akun_saya_edit',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }


    public function ubah($id_pelanggan)
    {


        $this->pelanggan_login->proteksi();

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama',
            'required',
            array('required' => '%s Harus diisi !')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Harus diisi !')
        );
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/pelanggan';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'User Pelanggan',
                    'akun' => $this->m_pelanggan->get_dataakun(),
                    'pelanggan' => $this->m_pelanggan->get_data(),
                    'isi' => 'v_akun_saya_edit',
                    'error_upload' => $this->upload->display_errors(),
                );
                $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
            } else {
                $pelanggan = $this->m_pelanggan->get_dataakun();
                if ($pelanggan->gambar != "") {
                    unlink('./assets/pelanggan/' . $pelanggan->gambar);
                }
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/pelanggan' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_pelanggan' => $id_pelanggan,
                    'email' => $this->input->post('email'),
                    'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                    'password' => $this->input->post('password'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_pelanggan->editpelanggan($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
                $this->session->set_flashdata('pesan1', 'Email dan Nama akan berubah jika anda logout terlebih dahulu!');
                redirect('/');
            }

            $data = array(
                'id_pelanggan' => $id_pelanggan,
                'email' => $this->input->post('email'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'password' => $this->input->post('password'),

            );
            $this->m_pelanggan->editpelanggan($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
            $this->session->set_flashdata('pesan1', 'Email dan Nama akan berubah jika anda logout terlebih dahulu!');
            redirect('/');
        }


        //  if ($this->form_validation->run() == TRUE) {
        //     $config['upload_path'] = './assets/gambar';
        //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //     $config['max_size']     = '2000';
        //     $this->upload->initialize($config);
        //     $field_name = "gambar";
        //      $data = array(
        //     'id_pelanggan' =>$id_pelanggan,
        //     'email' => $this->input->post('email'),
        //     'nama_pelanggan' => $this->input->post('nama_pelanggan'),
        //     'password' => $this->input->post('password'),
        // );
        // $this->m_pelanggan->editpelanggan($data);
        // $this->session->set_flashdata('pesan','Data Berhasil Diubah!');
        // $this->session->set_flashdata('pesan1','Email dan Nama akan berubah jika anda logout terlebih dahulu!');
        // redirect('akun');

        // }
        $data = array(
            'title' => 'User Pelanggan',
            'akun' => $this->m_pelanggan->get_dataakun(),
            'isi' => 'v_akun_saya_edit',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
