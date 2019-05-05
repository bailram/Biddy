<?php

class Lelang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lelang');
		
	}

	function index(){
		$this->load->view('nav');
		$this->load->view('lelang/view_lelang_content');
	}

	function add(){
		$this->load->view('nav');
		$this->load->view('lelang/view_add_lelang');
	}

	function do_add(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			redirect('register');
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
				'role' => 0,
				'is_ban' => 0
			);

			$this->m_login->input_data($data,'user');
			redirect('login');
		}    
	}
}