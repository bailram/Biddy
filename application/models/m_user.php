<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_user extends CI_Model {
        function tampil_data(){
            return $this->db->get('user');
        }
        
        
    
    }
    
    /* End of file M_user.php */
    