<?php

class Lelang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_search_component');
		$this->load->model('m_lelang');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		}
	}

	function index(){
		$id = $this->session->userdata('id_user');
		$where = array('id_user' => $id);
		$data['user'] = $this->m_home->get_user_info($where)->result();
		$where = array('id_pelelang' => $id);
		$data['lelang'] =  $this->m_home->get_data_lelang_user($where)->result();

		$this->load->view('nav');
		$this->load->view('lelang/view_lelang_content', $data);
	}

	function add(){
		$data['provinsi'] = $this->m_search_component->provinsi();
		$this->load->view('nav');
		$this->load->view('lelang/view_add_lelang',$data);
	}

	function update(){
		$id = $this->uri->segment(3);
		$where = array('id_lelang' => $id);
		$data['provinsi'] = $this->m_search_component->provinsi();
		$data['lelang'] = $this->m_home->get_post($where)->result();
		$this->load->view('nav');
		$this->load->view('lelang/view_update_lelang', $data);
	}

	function do_add(){
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$foto = $this->input->post('foto');
		$kondisi = $this->input->post('kondisi');
		$final_bid = $this->input->post('final_bid');
		$next_bid = $this->input->post('next_bid');
		$kategori = $this->input->post('kategori');
		$tanggal = $this->input->post('tanggal');
		$id_pelelang = $this->session->userdata('id_user');
		$id_provinsi = $this->input->post('provinsi');
		$id_kota = $this->input->post('kota');

		$now = new DateTime();
		$status = ($now->format('Y-m-d')>$tanggal) ? 1 : 0 ;

		$data = array(
			'id_lelang'=> null,
			'judul' => $judul,
			'tanggal' => $tanggal,
			'deskripsi' => $deskripsi,
			'foto' => $foto,
			'kondisi' => $kondisi,
			'status' => $status,
			'next_bid' => $next_bid,
			'final_bid' => $final_bid,
			'total_bidder' => 0,
			'kategori' => $kategori,
			'id_pemenang' => 0,
			'id_pelelang' => $id_pelelang,
			'id_kota' => $id_kota,
			'id_provinsi' => $id_provinsi
		);

		$this->m_lelang->tambah_data($data);
		redirect('lelang');
	}

	function do_update(){
		$id_lelang = $this->uri->segment(3);
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$foto = $this->input->post('foto');
		$kondisi = $this->input->post('kondisi');
		$final_bid = $this->input->post('final_bid');
		$next_bid = $this->input->post('next_bid');
		$kategori = $this->input->post('kategori');
		$tanggal = $this->input->post('tanggal');
		$id_pelelang = $this->session->userdata('id_user');
		$id_provinsi = $this->input->post('provinsi');
		$id_kota = $this->input->post('kota');

		$now = new DateTime();
		$status = ($now->format('Y-m-d')>$tanggal) ? 1 : 0 ;

		$data = array(
			'judul' => $judul,
			'tanggal' => $tanggal,
			'deskripsi' => $deskripsi,
			'foto' => $foto,
			'kondisi' => $kondisi,
			'status' => $status,
			'next_bid' => $next_bid,
			'final_bid' => $final_bid,
			'kategori' => $kategori,
			'id_kota' => $id_kota,
			'id_provinsi' => $id_provinsi
		);

		$where = array('id_lelang' => $id_lelang);

		$this->m_lelang->update_data($where,$data);
		redirect('lelang');
	}

	function do_delete(){
		$id_lelang = $this->uri->segment(3);
		$where = array('id_lelang' => $id_lelang);
		$this->m_lelang->hapus_data($where);
		redirect('lelang');
	}

	function getKota()
	{
		$prov_id = $this->input->post('provinsi');
		$kota = $this->m_home->get_kota($prov_id);
		foreach ($kota as $k) {
			$data .= "<option value='$k[id_kota]'>$k[nama]</option>\n";
		}
		echo $data;
	}
}