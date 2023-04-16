<?php
class Fasilities extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_fasilities','m_fasilities');
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['data']=$this->m_fasilities->get_all_falilitas();
		$this->load->view('frontend/fasilities_view',$x);
	}

	

    function hakcipta(){
        $this->load->view('frontend/hakcipta_view');
    }

    function hakcipta_new(){
        $this->load->view('frontend/hakcipta_new');
    }

    function paten_new(){
        $this->load->view('frontend/paten_new');
    }

    function merek_new(){
        $this->load->view('frontend/merek_new');
    }

    function desain_new(){
        $this->load->view('frontend/desain_new');
    }

    function desain(){
        $this->load->view('frontend/desain_view');
    }

    function paten(){
        $this->load->view('frontend/paten_view');
    }

    function semarak(){
        $this->load->view('frontend/semarak');
    }

    function fasilitatorki(){
        $this->load->view('frontend/fasilitatorki');
    }

    function partisipasipameran(){
        $this->load->view('frontend/partisipasipameran');
    }
}