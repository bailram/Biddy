<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('user');
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function get_total_user($table)
    {
        return $this->db->count_all($table);
    }

    function get_ban()
    {
        $this->db->select('transaksi.*,lelang.*');
        $this->db->from('transaksi');
        $this->db->join('lelang', 'lelang.id_lelang = transaksi.id_lelang');
        $query = $this->db->get();
        return $query->result();
    }
}


    
    /* End of file M_user.php */