<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_midtrans extends CI_Model 
{
    public function get1($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_midtrans');    
        $this->db->join('tabel_transaksi', 'tabel_transaksi.no_order = tabel_midtrans.no_order','left');
        $this->db->order_by('tabel_midtrans.no_order',$no_order);
        return $this->db->get()->result();
        
    }

    public function get($no_order)
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');    
        $this->db->join('tabel_midtrans', 'tabel_midtrans.no_order = tabel_transaksi.no_order','left');
        $this->db->where('tabel_midtrans.no_order', $no_order);
        return $this->db->get()->result();
        


    }

    public function sudahbayar($data)
    {
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('tabel_transaksi', $data);
        
    }

    public function m_bayar()
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');      
        $this->db->where('tabel_transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
   
    }


    public function simpan_midtrans($data_mid)
    {
        $this->db->insert('tabel_midtrans', $data_mid);
        
    }
    
   

}