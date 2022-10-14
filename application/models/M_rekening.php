<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekening extends CI_Model 
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_rekening');    
        $this->db->order_by('id_rekening', 'desc');
        return $this->db->get()->result();
       
    }
    public function add($data){
        $this->db->insert('tabel_rekening', $data);
        
    }
    
    public function edit($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->update('tabel_rekening', $data);
        
    }

    public function delete($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->delete('tabel_rekening', $data);
        
        
    }

}