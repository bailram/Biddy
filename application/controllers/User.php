<?php

class User extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_search_component');
	}

	function info()
	{
		$data['provinsi'] = $this->m_search_component->provinsi();
		$id = $this->uri->segment(3);
		$where = array('id_user' => $id);
		$data['user'] = $this->m_home->get_user_info($where)->result();
		$where = array('id_pelelang' => $id);
		$data['lelang'] =  $this->m_home->get_data_lelang_user($where)->result();
		foreach ($data['lelang'] as $l) {
			$data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
			$data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
		}

		$this->load->view('nav');
		$this->load->view('user/v_index_user', $data);
	}
}