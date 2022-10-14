<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('tabel_pelanggan', $data);
    }

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_pelanggan');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->result();
    }
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_pelanggan');
        $this->db->order_by('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tabel_pelanggan', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('tabel_pelanggan', $data);
    }

    public function editpelanggan($data)
    {

        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('tabel_pelanggan', $data);
    }
    public function get_dataakun()
    {
        $this->db->select('*');
        $this->db->from('tabel_pelanggan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->row();
    }

    public function get_datagambar()
    {
        $this->db->select('*');
        $this->db->from('tabel_pelanggan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->row();
    }



    public function delete($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->delete('tabel_pelanggan', $data);
    }
    public function pelanggan()
    {
        return $this->db->get('tabel_pelanggan')->num_rows();
    }
}

/* End of file ModelName.php */
