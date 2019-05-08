<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_lelang extends CI_Model
{

    function tambah_data($data){
        $this->db->insert('lelang',$data);
    }

    function update_data($where,$data){
        $this->db->where($where);
        $this->db->update('lelang',$data);
    }

    function tampil_data()
    {
        return $this->db->get('lelang');
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

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}