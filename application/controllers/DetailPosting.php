<?php 
class DetailPosting extends CI_Controller{
	function _construct(){
		parent:: __construct();
		$this->load->helper('url');
	}

	function index(){
		$this->load->view('nav');
		$this->load->view('search_component');
		$this->load->view('detail_posting/index.php');
	}
}

