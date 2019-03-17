<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('m_user');
            if($this->session->userdata('status') != "login" || $this->session->userdata('role') != 1 ){
			    redirect(base_url());
            }
        }
        
    
        public function index()
        {
            $this->load->view('admin/view_admin_top');
            $this->load->view('admin/view_admin_content');
            $this->load->view('admin/view_admin_bottom');
            
        }

        public function user()
        {
            $data['user'] = $this->m_user->tampil_data()->result();
            $this->load->view('admin/view_admin_top');
            $this->load->view('admin/view_admin_user',$data);
            $this->load->view('admin/view_admin_bottom');
        }
    
    }
    
    /* End of file Admin_controller.php */
    
?>