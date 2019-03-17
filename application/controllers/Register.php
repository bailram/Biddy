<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Register extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('m_login');
            $this->load->helper('form');

            // Load form validation library
            $this->load->library('form_validation');
        }
        
    
        public function index()
        {	
            if ($this->session->userdata('status') == "login") {
			    redirect(base_url(""));
		    } else {
                $this->load->view('nav');
                $this->load->view('register/index.php');
            } 
        }


        public function do_register(){
            
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('register');
            } else {
                $nama = $this->input->post('username');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $data = array(
                    'nama' => $nama,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'role' => 0,
                    'is_ban' => 0
                    );

                $this->m_login->input_data($data,'user');
                redirect('login');
            }    
        }
    
    }
    
    /* End of fils Register.php */
    
?>