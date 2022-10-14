<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function total_barang()
    {
        return $this->db->get('tabel_barang')->num_rows();
    }

    public function total_kategori($id_kategori)
    {

        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->num_rows();
    }

    public function total_price()
    {

        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->where('id_kategori');
        return $this->db->get()->num_rows();
    }

    public function pesanan_masuk()
    {
        return $this->db->get('tabel_transaksi')->num_rows();
    }

    public function pelanggan()
    {
        return $this->db->get('tabel_pelanggan')->num_rows();
    }

    public function admin()
    {
        return $this->db->get('tabel_admin')->num_rows();
    }

    public function kategori()
    {
        return $this->db->get('tabel_kategori')->num_rows();
    }
    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tabel_lokasi');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tabel_lokasi', $data);
    }

    public function pesanan_dibatalkan()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('status_order', 4);
        return $this->db->get()->result();
    }
}
