<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_barang.id_kategori', 'left');
        $this->db->order_by('id_barang', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_data_produk($perPage, $start)
    {
        return $get = $this->db->get('tabel_barang', $perPage, $start)->result();

        // $this->db->select('*');
        // $this->db->from('tabel_barang', $perPage, $start);
        // $this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_barang.id_kategori', 'left');
        // $this->db->order_by('id_barang', 'desc');
        // return $this->db->get()->result();
    }
    public function baris_data()
    {
        return $this->db->get('tabel_barang')->num_rows();
    }


    public function getPrice($lowprice, $highprice)
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_barang.id_kategori', 'left');
        $this->db->where('harga >=', $lowprice);
        $this->db->where('harga <=', $highprice);
        $this->db->order_by('id_barang', 'desc');
        return $this->db->get()->result();
    }

    public function getInput($input)
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->where('harga', $input);
        return $this->db->get()->result();
    }

    public function total_barangs($input)
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->where('harga', $input);
        return $this->db->get()->num_rows();
    }

    public function total_price($lowprice, $highprice)
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_barang.id_kategori', 'left');
        $this->db->where('harga >=', $lowprice);
        $this->db->where('harga <=', $highprice);
        $this->db->order_by('id_barang', 'desc');
        return $this->db->get()->num_rows();
    }

    public function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('tabel_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }
    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tabel_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function detail_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_barang.id_kategori', 'left');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }


    public function gambar_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tabel_gambar');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->result();
    }
    public function get_all_data_barang($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_barang.id_kategori', 'left');
        $this->db->where('tabel_barang.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }
    public function get_all_data_trend()
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_barang.id_kategori', 'left');
        $this->db->where("status_barang=1");
        $this->db->order_by('id_barang', 'desc');
        return $this->db->get()->result();
    }

    public function getReview($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tabel_review');
        $this->db->join('tabel_barang', 'tabel_barang.id_barang = tabel_review.id_barang');
        $this->db->join('tabel_pelanggan', 'tabel_pelanggan.id_pelanggan = tabel_review.id_pelanggan');
        $this->db->where('tabel_review.id_barang', $id_barang);
        return $this->db->get()->result();
    }

    public function detailReview($id_barang)
    {
        $this->db->select('*');

        $this->db->from('tabel_barang');
        $this->db->where('id_barang', $id_barang);

        return $this->db->get()->row();
    }

    public function addReview($data)
    {
        $this->db->insert('tabel_review', $data);
    }

    public function updateReview($dataupdate)
    {
        $this->db->where('no_order', $dataupdate['no_order']);
        $this->db->where('id_barang', $dataupdate['id_barang']);
        $this->db->update('tabel_rincian', $dataupdate);
    }
}
