<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Register extends CI_Controller {
    
        public function index()
        {
            $this->load->view('nav');
            $this->load->view('register/index.php');
            
        }
    
    }
    
    /* End of fils Register.php */
    
?>