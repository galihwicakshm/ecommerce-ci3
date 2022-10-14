<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function laporan_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tabel_rincian');
        $this->db->join('tabel_transaksi', 'tabel_transaksi.no_order = tabel_rincian.no_order', 'left');
        $this->db->join('tabel_barang', 'tabel_barang.id_barang = tabel_rincian.id_barang', 'left');
        $this->db->where('DAY(tabel_transaksi.tanggal_order)', $tanggal);
        $this->db->where('MONTH(tabel_transaksi.tanggal_order)', $bulan);
        $this->db->where('YEAR(tabel_transaksi.tanggal_order)', $tahun);
        $this->db->where('status_code=200');
        return $this->db->get()->result();
    }

    public function laporan_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('MONTH(tanggal_order)', $bulan);
        $this->db->where('YEAR(tanggal_order)', $tahun);
        $this->db->where('status_code=200');
        return $this->db->get()->result();
    }

    public function laporan_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('tabel_transaksi');
        $this->db->where('YEAR(tanggal_order)', $tahun);
        $this->db->where('status_code=200');
        return $this->db->get()->result();
    }
}
