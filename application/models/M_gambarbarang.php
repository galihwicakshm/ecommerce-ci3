<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gambarbarang extends CI_Model 
{

    public function get_all_data()
    {
        $this->db->select('tabel_barang.*,COUNT(tabel_gambar.id_barang) as total_gambar');
        $this->db->from('tabel_barang');
        $this->db->join('tabel_gambar', 'tabel_gambar.id_barang = tabel_barang.id_barang','left');
        $this->db->group_by('tabel_barang.id_barang');
        $this->db->order_by('tabel_barang.id_barang', 'desc');
        return $this->db->get()->result();
 
    }

    public function get_data($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('tabel_gambar');
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get()->row();
    }
    public function get_gambar($id_barang){
        $this->db->select('*');
        $this->db->from('tabel_gambar');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->result();

        

        

    }
    public function add($data)
    {
        $this->db->insert('tabel_gambar', $data);
        
    }

    
    public function delete($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tabel_gambar', $data);
        
        
    }
}