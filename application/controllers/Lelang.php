<?php

class Lelang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
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
		foreach ($data['lelang'] as $l) {
			$data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
			$data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
		}

		$this->load->view('nav');
		$this->load->view('lelang/view_lelang_content', $data);
	}

	function add(){
		$this->load->view('nav');
		$this->load->view('lelang/view_add_lelang');
	}

	function do_add(){
		/*$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');*/

		/*$nama = $this->input->post('nama');
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
		redirect('login');*/

		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$foto = $this->input->post('foto');
		$kondisi = $this->input->post('kondisi');
		$final_bid = $this->input->post('final_bid');
		$next_bid = $this->input->post('next_bid');
		$kategori = $this->input->post('kategori');
		$tanggal = $this->input->post('tanggal');
		$id_pelelang = $this->session->userdata('id_user');

		$now = new DateTime();
		//echo $now->format('Y-m-d');
		$status = ($now->format('Y-m-d')>$tanggal) ? 1 : 0 ;

		$data = array(
			'id_lelang'=> null,
			'judul' => $judul,
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
			'id_kota' => 158,
			'id_provinsi' => 11,
		);

		$this->m_lelang->tambah_data($data);
		redirect('lelang');
		/*$data = array(
			'nama' => $nama,
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'role' => 0,
			'is_ban' => 0
		);

		$this->m_login->input_data($data,'user');
		redirect('login');*/

	}
}