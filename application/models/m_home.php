<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('lelang');
    }

    function tampil_data_where_kategori($id)
    {
        $where = array('kategori' => $id);
        return $this->db->get_where('lelang', $where);
    }

    function get_provinsi()
    {
        return $this->db->get('provinsi');
    }

    function get_kota($id_prov)
    {
        $this->db->where('id_prov', $id_prov);
        $result =  $this->db->get('kota');
        return $result->result_array();
    }

    function get_post($where)
    {
        return $this->db->get_where('lelang', $where);
    }

    function get_search($key)
    {
        $this->db->like('judul', $key);
        return $this->db->get('lelang');
    }

    function get_search_with_location($id_provinsi,$id_kota){
        $this->db->where('id_provinsi',$id_provinsi);
        $this->db->where('id_kota', $id_kota);
        return $this->db->get('lelang');
    }

    function get_search_with_location_and_key($key,$id_provinsi,$id_kota){
        $this->db->like('judul', $key);
        $this->db->where('id_provinsi',$id_provinsi);
        $this->db->where('id_kota', $id_kota);
        return $this->db->get('lelang');
    }

    function get_user_info($where)
    {
        return $this->db->get_where('user', $where);
    }

    function get_nama_provinsi($where)
    {
        return $this->db->get_where('provinsi', $where);
    }

    function get_nama_kota($where)
    {
        return $this->db->get_where('kota', $where);
    }

    function get_data_lelang_user($where)
    {
        return $this->db->get_where('lelang', $where);
    }
}

/* End of file M_home.php */