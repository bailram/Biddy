<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
	}


	public function index()
	{
		if ($this->session->userdata('status') == "login") {
			redirect(base_url(""));
		} else {
			$this->load->view('nav');
			$this->load->view('login/index.php');
		}
	}

	function do_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			redirect(base_url("login"));
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$cek = $this->m_login->cek_login("user", $where)->num_rows();
			if ($cek > 0) {
				$result = $this->m_login->read_user_information($username);
				$data_session = array(
					'id_user' => $result[0]->id_user,
					'nama' => $result[0]->nama,
					'role' => $result[0]->role,
					'ban' => $result[0]->is_ban,
					'status' => "login"
				);

				$this->session->set_userdata($data_session);

				redirect(base_url("index"));
			} else {
				echo "Username dan password salah !";
			}
		}
	}

	function logout()
	{
		if ($this->session->userdata('status') == "login") {
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}
	}
}
