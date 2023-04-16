<?php
class Pustaka extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
		$this->load->model('M_pustaka','m_pustaka');
	}

	function index(){
		$x['pustaka']=$this->m_pustaka->get_pustaka_status();
		$this->load->view('frontend/pustaka_view',$x);
		
	}

		

	function kirim(){
		$nama=htmlspecialchars($this->input->post('name',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$subject=htmlspecialchars($this->input->post('subject',TRUE),ENT_QUOTES);
		$pesan=htmlspecialchars($this->input->post('message',TRUE),ENT_QUOTES);

		$data=array(
			'inbox_nama' => $nama,
			'inbox_email' => $email,
			'inbox_subject' => $subject,
			'inbox_pesan' => $pesan
		);

		$this->db->insert('inbox',$data);
		echo $this->session->set_flashdata("msg","<div class='alert alert-info'>Terima kasih telah menghubungi kami.</div>");
		redirect('contact');
	}
}