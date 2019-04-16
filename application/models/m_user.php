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

    function get_total_user()
    {
        return $this->db->count_all('user');
    }
}
    
    /* End of file M_user.php */