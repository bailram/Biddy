<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_lelang extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('lelang');
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}