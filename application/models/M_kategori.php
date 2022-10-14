<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model 
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
 
    }
    public function add($data)
    {
        $this->db->insert('tabel_kategori', $data);
        
    }
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('tabel_kategori', $data);
        
        
    }

    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('tabel_kategori', $data);
        
        
    }
}