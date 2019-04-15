<?php 

class Home extends CI_Controller{

	function __construct(){
        
        parent::__construct();
        $this->load->model('m_home');
	}

	function index(){
		$data['lelang'] = $this->m_home->tampil_data()->result();
		$this->load->view('nav');
		$this->load->view('search_component',$data);
		$this->load->view('home/index.php');
	}

    function home(){
    	$data['lelang'] = $this->m_home->tampil_data()->result();
    	$this->load->view('home/index.php', $data);
    }
}