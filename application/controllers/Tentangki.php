<?php
class Tentangki extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_tentangki','m_tentangki');
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['data']=$this->m_tentangki->get_all_tentangki();
		$this->load->view('frontend/about_view_new',$x);
	}
	 function latarbelakang(){
        $this->load->view('frontend/latarbelakang_view');
    }
    function pengertian(){
        $this->load->view('frontend/pengertian');
    }
    function visimisi(){
        $this->load->view('frontend/visimisi');
    }
    function layanan(){
        $this->load->view('frontend/layanan');
    }
}