<?php
class Konten01 extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_konten01','m_konten01');
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['data']=$this->m_konten01->get_all_konten01();
		$this->load->view('frontend/konten01_view',$x);
	}
}