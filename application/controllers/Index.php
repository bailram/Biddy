<?php

class Index extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model('m_search_component');
	}

	function index()
	{
		$data['provinsi'] = $this->m_search_component->provinsi();
		//$data['kota'] = $this->m_search_component->kota(2);

		$this->load->view('nav');
		$this->load->view('search_component', $data);
		$this->load->view('index');
	}


	public function ambil_data()
	{
		$id = $this->input->post('id');
		echo $this->m_search_component->kota($id);
		//echo $this->m_search_component->kota($this->input->post('id'));
	}

	public function aksi_form()
	{ }
}