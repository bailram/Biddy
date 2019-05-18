<?php

class Lelang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_search_component');
		$this->load->model('m_lelang');
		$this->load->model('m_transaksi');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		}
	}

	private function _uploadImage()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("foto")) {
			return $this->upload->data("file_name");
		}
		return "default.jpg";
	}

	function index()
	{
		$id = $this->session->userdata('id_user');
		$where = array('id_user' => $id);
		$data['user'] = $this->m_home->get_user_info($where)->result();
		$where = array('id_pelelang' => $id);
		$data['lelang'] =  $this->m_home->get_data_lelang_user($where)->result();

		$this->load->view('nav');
		$this->load->view('lelang/view_lelang_content', $data);
	}

	function add()
	{
		$data['provinsi'] = $this->m_search_component->provinsi();
		$this->load->view('nav');
		$this->load->view('lelang/view_add_lelang', $data);
	}

	function update()
	{
		$id = $this->uri->segment(3);
		$where = array('id_lelang' => $id);
		$data['provinsi'] = $this->m_search_component->provinsi();
		$data['lelang'] = $this->m_home->get_post($where)->result();
		$this->load->view('nav');
		$this->load->view('lelang/view_update_lelang', $data);
	}

	function do_add()
	{
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$foto = $this->_uploadImage();
		$kondisi = $this->input->post('kondisi');
		$final_bid = $this->input->post('final_bid');
		$next_bid = $this->input->post('next_bid');
		$kategori = $this->input->post('kategori');
		$tanggal = $this->input->post('tanggal');
		$id_pelelang = $this->session->userdata('id_user');
		$id_provinsi = $this->input->post('provinsi');
		$id_kota = $this->input->post('kota');


		if (!empty($_FILES["foto"]["name"])) {
			$this->image = $this->_uploadImage();
		} else {
			$this->image = "default.jpg";
		}

		$now = new DateTime();
		$status = ($now->format('Y-m-d') > $tanggal) ? 1 : 0;

		$data = array(
			'id_lelang' => null,
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

		//cek apakah sudah ada transaksi atau belum
		redirect('lelang');
	}

	function do_update()
	{
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
		$status = ($now->format('Y-m-d') > $tanggal) ? 1 : 0;

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

		$this->m_lelang->update_data($where, $data);

		$row = $this->m_transaksi->tampil_data_transaksi_where($where)->num_rows();
		if ($status == 1 && $row == 0) {
			$data['data_lelang'] = $this->m_lelang->tampil_data_where($where)->result();
			foreach ($data['data_lelang'] as $dl) {
				redirect(base_url('lelang/do_add_transaksi/' . $id_lelang . '/' . $dl->id_pelelang . '/' . $dl->id_pemenang), 'refresh');
			}
		} else {
			redirect('lelang');
		}
	}

	function do_delete()
	{
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

	function do_add_transaksi()
	{
		//tambah transaksi
		$tgl = date('Y-m-d', time());
		$deadline = date('Y-m-d', strtotime('+6 days', strtotime($tgl)));
		$data_transaksi = array(
			'id_transaksi' => null,
			'tanggal' => $tgl,
			'deadline' => $deadline,
			'status' => 0,
			'id_lelang' => $this->uri->segment(3)
		);
		$this->m_transaksi->tambah_data_transaksi($data_transaksi);

		//cari id transaksi yang baru saja diinput
		$where = array('id_lelang' => $this->uri->segment(3));
		$data['transaksi'] = $this->m_transaksi->tampil_data_transaksi_where($where)->result();
		//tambah status pelelangan untuk pelelang dan pemenang
		foreach ($data['transaksi'] as $t) {
			if ($this->uri->segment(4) > 0) {
				$data_pelelang = array(
					'id_status_pelelangan' => null,
					'id_lelang' => $this->uri->segment(3),
					'id_transaksi' => $t->id_transaksi,
					'id_user' =>  $this->uri->segment(4),
					'alasan' => "",
					'status' => 0
				);
			}
			if ($this->uri->segment(5) > 0) {
				$data_pemenang = array(
					'id_status_pelelangan' => null,
					'id_lelang' => $this->uri->segment(3),
					'id_transaksi' => $t->id_transaksi,
					'id_user' =>  $this->uri->segment(5),
					'alasan' => "",
					'status' => 0
				);
			}
			$this->m_transaksi->tambah_data_status_pelelangan($data_pelelang);
			$this->m_transaksi->tambah_data_status_pelelangan($data_pemenang);
		}

		redirect(base_url('lelang'), 'refresh');
	}

	function tes()
	{
		$where = array('id_lelang' => 15);
		//$this->m_lelang->tampil_data_where($where)->result();
		//$data['result'] = $this->m_transaksi->tampil_data_transaksi_where($where)->result();
		//$row = $this->m_transaksi->tampil_data_transaksi_where($where)->num_rows();
		$row = $this->m_transaksi->tampil_data_transaksi_where($where)->num_rows();

		echo $row;
		//if($data['result'])


	}
}