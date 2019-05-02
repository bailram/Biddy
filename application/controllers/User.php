<?php

class User extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_search_component');
	}

	function info(){
		$data['provinsi'] = $this->m_search_component->provinsi();
		$id = $this->uri->segment(3);
		$where = array('id_user' => $id);
		$data['user'] = $this->m_home->get_user_info($where)->result();
		$this->load->view('nav');
		$this->load->view('search_component', $data);
		$this->load->view('user/v_index_user', $data);
	}
}