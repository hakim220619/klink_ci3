<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengunjung', 'm_pengunjung');
		$this->load->model('M_slider', 'm_slider');
		$this->load->model('M_tulisan', 'm_tulisan');
		$this->load->model('M_room', 'm_room');
		$this->m_pengunjung->count_visitor();
		$this->load->model('dynamic_chart_model');
	}

	public function index()
	{
		$x['slider'] = $this->m_slider->get_all_slider();
		$x['rooms'] = $this->m_room->get_all_room_home();
		$x['blog'] = $this->m_tulisan->get_blog_home();
		$x['tahun_list'] = $this->dynamic_chart_model->fetch_tahun();
		$x['kegiatan'] = $this->db->query('select * from kegiatan ORDER by created_at DESC LIMIT 6')->result();
		$this->load->view('frontend/home_new', $x);
		//$this->load->view('frontend/home_view',$x);


	}
	public function content($id)
	{

		$x['k'] = $this->db->query('select * from kegiatan where id = ' . $id . '')->row_array();
		$this->load->view('frontend/content', $x);
		//$this->load->view('frontend/home_view',$x);


	}

	function fetch_data()
	{
		if ($this->input->post('tahun')) {
			$chart_data = $this->dynamic_chart_model->fetch_chart_data($this->input->post('tahun'));

			foreach ($chart_data->result_array() as $row) {
				$output[] = array(
					'komoditi'  => $row["komoditi"],
					'jml' => floatval($row["jml"])
				);
			}
			echo json_encode($output);
		}
	}
}
