<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesananmasuk extends CI_Model
{

    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('status_order = 0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function status_order($data)
    {
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('tabel_transaksi', $data);
    }
    public function status_orderinci($data)
    {
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('tabel_rincian', $data);
    }
    public function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function pesanan_dikirim()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_diterima()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_dibatalkan()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('status_order=4');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function delete($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('tabel_transaksi', $data);
    }

    public function batal()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
}
