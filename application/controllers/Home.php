<?php

class Home extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_lelang');
		$this->load->model('m_search_component');
	}

	function index()
	{
		$data['provinsi'] = $this->m_search_component->provinsi();
		$data['lelang'] = $this->m_home->tampil_data()->result();
		/*foreach ($data['lelang'] as $l) {
			$whereU = array('id_user' => $l->id_pemenang);
			$data['user'] = $this->m_home->get_user_info($whereU)->result();
			$data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
			$data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
		}*/
		$this->load->view('nav');
		$this->load->view('search_component', $data);
		$this->load->view('home/index.php');
	}

	function search()
	{
		$key = $this->input->post('search_product');
		$id_provinsi = $this->input->post('provinsi');
		$id_kota = $this->input->post('kota');

		if (is_null($key)) {
			$id = $this->uri->segment(3);
			$data['lelang'] = $this->m_home->tampil_data_where_kategori($id)->result();
		} else {
			if (isset($key)) {
				if($id_provinsi>0 && $id_kota>0){
					$data['lelang'] = $this->m_home->get_search_with_location_and_key($key,$id_provinsi,$id_kota)->result();
				} else {
					$data['lelang'] = $this->m_home->get_search($key)->result();
				}
			} else {
				if($id_provinsi>0 && $id_kota>0){
					$data['lelang'] = $this->m_home->get_search_with_location($id_provinsi,$id_kota)->result();
				} else {
					$data['lelang'] = $this->m_home->tampil_data()->result();	
				}
			}
		}
		$data['provinsi'] = $this->m_search_component->provinsi();
		$this->load->view('nav');
		$this->load->view('search_component', $data);
		$this->load->view('home/index.php');
	}

	function getKota()
	{
		$prov_id = $this->input->post('prov_id');
		$kota = $this->m_home->get_kota($prov_id);

		$data .= "<option value=''>--Pilih--</option>";
		foreach ($kota as $k) {
			$data .= "<option value='$k[id_kota]'>$k[nama]</option>\n";
		}
		echo $data;
	}


	function post()
	{
		$data['provinsi'] = $this->m_search_component->provinsi();
		$id = $this->uri->segment(3);
		$where = array('id_lelang' => $id);
		$data['lelang'] = $this->m_home->get_post($where)->result();
		
		$this->load->view('nav');
		$this->load->view('search_component', $data);
		$this->load->view('detail_posting/index', $data);
	}

	function make_bid(){
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		}else {
			$id_lelang = $this->uri->segment(3);
			$id_pemenang = $this->uri->segment(4);

			$where = array('id_lelang' => $id_lelang);
			$data['result'] = $this->m_home->get_post($where)->result();

			foreach ($data['result'] as $res) {
				$final = $res->final_bid + $res->next_bid;
				$update_data = array(
					'final_bid' => $final, 
					'id_pemenang' => $id_pemenang
				);

				$this->m_lelang->update_data($where,$update_data);
				redirect('home/post/'.$id_lelang);
			}
		}
	}
}