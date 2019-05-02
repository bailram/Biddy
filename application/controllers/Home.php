<?php

class Home extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_search_component');
	}

	function index()
	{
		$data['provinsi'] = $this->m_search_component->provinsi();
		$data['lelang'] = $this->m_home->tampil_data()->result();
		foreach ($data['lelang'] as $l) {
			$whereU = array('id_user' => $l->id_pemenang);
			$data['user'] = $this->m_home->get_user_info($whereU)->result();
			$data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
			$data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
		}
		$this->load->view('nav');
		$this->load->view('search_component', $data);
		$this->load->view('home/index.php');
	}

	function search()
	{
		$id = $this->uri->segment(3);
		$data['provinsi'] = $this->m_search_component->provinsi();
		$data['lelang'] = $this->m_home->tampil_data_where_kategori($id)->result();
		foreach ($data['lelang'] as $l) {
			$whereU = array('id_user' => $l->id_pemenang);
			$data['user'] = $this->m_home->get_user_info($whereU)->result();
			$data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
			$data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
		}
		$this->load->view('nav');
		$this->load->view('search_component', $data);
		$this->load->view('home/index.php');
	}

	function post(){
		$data['provinsi'] = $this->m_search_component->provinsi();
		$id = $this->uri->segment(3);
		$where = array('id_lelang' => $id);
		$data['lelang'] = $this->m_home->get_post($where)->result();
		foreach ($data['lelang'] as $l) {
			$whereU = array('id_user' => $l->id_pelelang);
			$data['user'] = $this->m_home->get_user_info($whereU)->result();
			$data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
			$data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
		}
		$this->load->view('nav');
		$this->load->view('search_component',$data);
		$this->load->view('detail_posting/index', $data);
	}
}