<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_rincian extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function rinci()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->join('tabel_rincian', 'tabel_rincian.no_order = tabel_transaksi.no_order', 'left');
        $this->db->order_by('tabel_rincian.no_order', 'asc');
        return $this->db->get()->result();
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('id_transaksi', $this->session->userdata('id_transaksi'));
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->row();
    }

    public function get_data($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->join('tabel_rincian', 'tabel_rincian.no_order = tabel_transaksi.no_order', 'left');
        $this->db->where('tabel_transaksi.no_order', $no_order);
        return $this->db->get()->row();
    }
    public function get_rincian($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_rincian');
        $this->db->where('no_order', $no_order);
        return $this->db->get()->result();
    }

    public function invoice($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_rincian');
        $this->db->join('tabel_barang', 'tabel_barang.id_barang = tabel_rincian.id_barang  ', 'left');
        $this->db->join('tabel_transaksi', 'tabel_transaksi.no_order = tabel_rincian.no_order', 'left');

        $this->db->where('tabel_rincian.no_order', $no_order);
        return $this->db->get()->result();
    }

    public function detail($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->join('tabel_rincian', 'tabel_rincian.no_order = tabel_transaksi.no_order', 'left');
        $this->db->where('tabel_transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }
    public function delete($data)
    {
        $this->db->where('no_order', $data['no_order']);
        $this->db->delete('tabel_rincian', $data);
    }

    public function getRincian($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_rincian');
        $this->db->where('no_order', $no_order);
        return $this->db->get()->result();
    }
}
