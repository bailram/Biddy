<?php

class Transaksi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->model('m_lelang');
		$this->load->model('m_transaksi');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		}
	}

	function index()
	{
		$where = array('id_user' => $this->session->userdata('id_user'));
		$data['transaksi'] = $this->m_transaksi->tampil_data_status_pelelangan_where($where)->result();
		$this->load->view('nav');
		$this->load->view('transaksi/view_content_transaksi.php',$data);
	}

	function do_update()
	{
		/*$alasan = $this->input->post('alasan');
		$status = $this->input->post('status');
		$id = $this->uri->segment(3);
		$where = array('id_status_pelelangan' => $id);
		$data = array(
			'alasan' => $alasan, 
			'status' => $status
		);
		$this->m_transaksi->update_data_status_pelelangan($where,$data);

		$whereT = array('id_transaksi' => $this->uri->segment(4));
		if($this->uri->segment(5) == 3 && $status == 1){
			$statusT = 1;
		}else if($this->uri->segment(5) == 3 && $status == 1 || $this->uri->segment(5) == 0 && $status == 2){
			$statusT = 2;
		}else{
			$statusT = 3;
		}
		
		$dataT = array('status' => $statusT);
		$this->m_transaksi->update_data_transaksi($whereT,$dataT);

		redirect(base_url('transaksi'),'refresh');*/
		echo $this->uri->segment(3);
	}
}