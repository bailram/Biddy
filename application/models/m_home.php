<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_home extends CI_Model {
        function tampil_data(){
            return $this->db->get('lelang');
        }
        
        function get_provinsi(){
        	return $this->db->get('provinsi');
        }

        function get_kota(){
        	return $this->db->get('kota');
        }
    
    }
    
    /* End of file M_home.php */
    