<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('m_user');
            $this->load->model('m_login');
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

        function delete_user($id){
            $where = array('id_user' => $id);
            $this->m_user->hapus_data($where,'user');
           redirect('admin/user');
        }

        function edit_user($id){
            $where = array('id_user' => $id);
            $data['user'] = $this->m_user->edit_data($where,'user')->result();
            $this->load->view('admin/view_admin_top');
            $this->load->view('admin/view_admin_edit_user',$data);
            $this->load->view('admin/view_admin_bottom');
        }

        function add_admin(){
            $this->load->view('admin/view_admin_top');
            $this->load->view('admin/view_admin_add_user');
            $this->load->view('admin/view_admin_bottom');

        }

        function update(){
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

        
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'password' => $password,
            );
        
            $where = array(
                'id_user' => $id
            );
        
            $this->m_login->update_data($where,$data,'user');
            redirect('admin/user');
        }

        function do_add_admin(){

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->add_admin();
            } else {
                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $data = array(
                    'nama' => $nama,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'role' => 1,
                    'is_ban' => 0
                    );

                $this->m_login->input_data($data,'user');
                redirect('admin/user');
            }    
        }

      
    
    }
    
    /* End of file Admin_controller.php */
    
?>