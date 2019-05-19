<?php

class User extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_search_component');
	}

	private function _uploadImage()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload("foto")) {
			return $this->upload->data("file_name");
		}
		return "default.jpg";
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

	function update()
	{
		$id = $this->uri->segment(3);
		$where = array('id_user' => $id);
		$data['user'] = $this->m_home->get_user_info($where)->result();
		$this->load->view('nav');
		$this->load->view('user/v_user_update.php', $data);
	}

	function do_update()
	{
		$id = $this->uri->segment(3);
		$nama =  $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$username = $this->input->post('username');
		if (!empty($_FILES["foto"]["name"])) {
			$foto = $this->_uploadImage();
		} else {
			if ($_FILES["foto"]["name"] != $foto = $this->input->post('old_foto')) {
				$foto = $_FILES["foto"]["name"];
			} else {
				$foto = $this->input->post('old_foto');
			}
		}

		$data = array(
			'id_user' => $id,
			'nama' => $nama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'email' => $email,
			'username' => $username,
			'foto' => $foto
		);

		$where = array('id_user' => $id);
		$this->m_home->update_data_user($where, $data);

		redirect('user/info/' . $id, 'refresh');
	}

	function change_password()
	{
		$this->load->view('nav');
		$this->load->view('user/change_password.php');
	}

	function do_change_password()
	{
		$id = $this->uri->segment(3);
		$password_lama =  $this->input->post('password_lama');
		$password_baru =  $this->input->post('password_baru');

		$where = array(
			'id_user' => $id,
			'password' => $password_lama
		);

		if ($this->m_home->get_user_info($where)->num_rows() == 1) {
			$data = array('password' => $password_baru);

			$this->m_home->update_data_user($where, $data);
			redirect('user/info/' . $id, 'refresh');
		} else {
			redirect('user/change_password/' . $id . '/1', 'refresh');
		}
	}
}