<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('tabel_transaksi', $data);
    }
    public function simpan_rincitransaksi($data_rinci)
    {
        $this->db->insert('tabel_rincian', $data_rinci);
    }

    public function rinciandata($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_rincian');
        $this->db->where('no_order', $no_order);
        return $this->db->get()->row();
    }


    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('tabel_transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function diterima()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pesanan1($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }

    public function detail_pesanan($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('no_order', $no_order);
        return $this->db->get()->row();
    }

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tabel_rekening');
        return $this->db->get()->result();
    }

    public function upload_pembayaran($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tabel_transaksi', $data);
    }

    public function batal()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function dibatalkan()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=4');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function delete($data)
    {
        $this->db->where('no_order', $data['no_order']);
        $this->db->delete('tabel_transaksi', $data);
    }

    public function updatecode($data)
    {
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('tabel_transaksi', $data);
    }

    public function review()
    {
        $this->db->select('*');
        $this->db->from('tabel_rincian');
        $this->db->where('no_order', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->result();
    }

    public function gambarReview($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_rincian');
        $this->db->join('tabel_barang', 'tabel_barang.id_barang = tabel_rincian.id_barang');
        $this->db->where('tabel_rincian.no_order', $no_order);
        return $this->db->get()->result();
    }

    public function tambahreview($data)
    {
        $this->db->insert('tabel_review', $data);
    }
}
