<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    function tambah_data_transaksi($data){
        $this->db->insert('transaksi',$data);
    }

    function tambah_data_status_pelelangan($data){
        $this->db->insert('status_pelelangan', $data);
    }

    function update_data_transaksi($where,$data){
        $this->db->where($where);
        $this->db->update('transaksi',$data);
    }

    function update_data_status_pelelangan($where,$data){
        $this->db->where($where);
        $this->db->update('status_pelelangan', $data);
    }

    function tampil_data_transaksi()
    {
        return $this->db->get('transaksi');
    }

    function tampil_data_transaksi_where($where)
    {
        return $this->db->get_where('transaksi', $where);
    }

    function tampil_data_status_pelelangan(){
        return $this->db->get('status_pelelangan');
    }

    function tampil_data_status_pelelangan_where($where){
        return $this->db->get_where('status_pelelangan', $where);
    }

    function get_trans()
    {
        // return $this->db->get('transaksi');
        $this->db->select('transaksi.*,lelang.*');
        $this->db->from('transaksi');
        $this->db->join('lelang', 'lelang.id_lelang = transaksi.id_lelang');
        $query = $this->db->get();
        return $query->result();
    }

    function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('lelang');
    }
}