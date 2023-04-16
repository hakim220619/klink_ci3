<?php
class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('masuk') != TRUE) {
      $url = base_url('administrator');
      redirect($url);
    };
    $this->load->helper('short_number');
    $this->load->helper('short_number_helper');
    $this->load->model('M_pengunjung', 'm_pengunjung');
    $this->load->model('M_tulisan', 'm_tulisan');
    $this->load->model('M_events', 'm_events');
    $this->load->model('M_merek', 'm_merek');
    $this->load->library('upload');
  }

  function index()
  {
    if ($this->session->userdata('akses') == '1') {
      $x['visitor'] = $this->m_pengunjung->statistik_pengujung();
      $x['visitor_this_year'] = $this->m_pengunjung->visitor_this_year();
      $x['sum_visitor_year'] = $this->m_pengunjung->get_sum_visitor_this_year();
      $x['sum_visitor_last_year'] = $this->m_pengunjung->get_sum_visitor_last_year();
      $x['sum_visitor_average_this_year'] = $this->m_pengunjung->get_average_perbulan();
      $x['visitor_this_month'] = $this->m_pengunjung->get_sum_visitor_this_month();
      $x['visitor_last_month'] = $this->m_pengunjung->get_sum_visitor_last_month();
      $x['visitor_average_day'] = $this->m_pengunjung->get_average_perday();
      $x['total_post'] = $this->m_tulisan->get_all_tulisan()->num_rows();
      $x['pengunjung_total'] = $this->m_pengunjung->get_all_visitors()->num_rows();
      $x['total_users'] = $this->db->query("SELECT * FROM pengguna")->num_rows();
      $x['count_merek'] = $this->db->query("SELECT * FROM merek")->num_rows();
      $x['count_hc'] = $this->db->query("SELECT * FROM hakcipta")->num_rows();
      $x['count_desind'] = $this->db->query("SELECT * FROM desainind")->num_rows();
      $x['count_paten'] = $this->db->query("SELECT * FROM paten")->num_rows();
      $x['page_views'] = $this->db->query("SELECT * FROM post_views")->num_rows();
      $x['total_users'] = $this->db->query("SELECT * FROM pengguna")->num_rows();
      $x['total_admin'] = $this->db->query("SELECT * FROM pengguna where pengguna_level=1")->num_rows();
      $x['count_ikm'] = $this->db->query("SELECT * FROM pengguna where pengguna_level=3")->num_rows();
      $x['count_dinas'] = $this->db->query("SELECT * FROM pengguna where pengguna_level=2")->num_rows();
      $this->load->view('admin/v_dashboard', $x);
    } elseif ($this->session->userdata('akses') == '2') {
      $kode = $this->session->userdata('idadmin');
      $x['visitor'] = $this->m_pengunjung->statistik_pengujung();
      $x['visitor_this_year'] = $this->m_pengunjung->visitor_this_year();
      $x['sum_visitor_year'] = $this->m_pengunjung->get_sum_visitor_this_year();
      $x['sum_visitor_last_year'] = $this->m_pengunjung->get_sum_visitor_last_year();
      $x['sum_visitor_average_this_year'] = $this->m_pengunjung->get_average_perbulan();
      $x['visitor_this_month'] = $this->m_pengunjung->get_sum_visitor_this_month();
      $x['visitor_last_month'] = $this->m_pengunjung->get_sum_visitor_last_month();
      $x['visitor_average_day'] = $this->m_pengunjung->get_average_perday();
      $x['count_merek'] = $this->m_pengunjung->view_mereksession_by_kode($kode)->num_rows();
      $x['count_hc'] = $this->m_pengunjung->view_hcsession_by_kode($kode)->num_rows();
      $x['count_desind'] = $this->m_pengunjung->view_desainindsession_by_kode($kode)->num_rows();
      $x['count_paten'] = $this->m_pengunjung->view_patensession_by_kode($kode)->num_rows();
      $x['total_post'] = $this->m_tulisan->get_all_tulisan()->num_rows();
      $x['pengunjung_total'] = $this->m_pengunjung->get_all_visitors()->num_rows();
      $x['total_users'] = $this->db->query("SELECT * FROM pengguna")->num_rows();
      $x['page_views'] = $this->db->query("SELECT * FROM post_views")->num_rows();
      $this->load->view('admin/v_dashboard', $x);
    } elseif ($this->session->userdata('akses') == '3') {
      $kode = $this->session->userdata('idadmin');
      $x['visitor'] = $this->m_pengunjung->statistik_pengujung();
      $x['visitor_this_year'] = $this->m_pengunjung->visitor_this_year();
      $x['sum_visitor_year'] = $this->m_pengunjung->get_sum_visitor_this_year();
      $x['sum_visitor_last_year'] = $this->m_pengunjung->get_sum_visitor_last_year();
      $x['sum_visitor_average_this_year'] = $this->m_pengunjung->get_average_perbulan();
      $x['visitor_this_month'] = $this->m_pengunjung->get_sum_visitor_this_month();
      $x['visitor_last_month'] = $this->m_pengunjung->get_sum_visitor_last_month();
      $x['visitor_average_day'] = $this->m_pengunjung->get_average_perday();
      $x['total_post'] = $this->m_tulisan->get_all_tulisan()->num_rows();
      $x['pengunjung_total'] = $this->m_pengunjung->get_all_visitors()->num_rows();
      $x['total_users'] = $this->db->query("SELECT * FROM pengguna")->num_rows();
      $x['page_views'] = $this->db->query("SELECT * FROM post_views")->num_rows();
      $x['count_merek'] = $this->m_pengunjung->view_mereksession_by_kode($kode)->num_rows();
      $x['count_hc'] = $this->m_pengunjung->view_hcsession_by_kode($kode)->num_rows();
      $x['count_desind'] = $this->m_pengunjung->view_desainindsession_by_kode($kode)->num_rows();
      $x['count_paten'] = $this->m_pengunjung->view_patensession_by_kode($kode)->num_rows();
      //$x['count_merek']=$this->db->query("SELECT * FROM merek where pengguna_id = $kode")->num_rows();
      $this->load->view('admin/v_dashboard', $x);
    } else {
      redirect('administrator');
    }
  }

  function tulisan()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/slider');
    } else {
      redirect('admin/pengguna');
    }
  }

  function contact()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/contact');
    } else {
      redirect('admin/pengguna');
    }
  }

  function pustaka()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/pustaka');
    } else {
      redirect('admin/pengguna');
    }
  }

  function events()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/events');
    } else {
      redirect('admin/pengguna');
    }
  }

  function fasilitas()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/fasilitas');
    } else {
      redirect('admin/pengguna');
    }
  }

  function tentangki()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/tentangki');
    } else {
      redirect('admin/pengguna');
    }
  }

  function konten01()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/konten01');
    } else {
      redirect('admin/pengguna');
    }
  }

  function inbox()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/inbox');
    } else {
      redirect('admin/pengguna');
    }
  }

  function pengguna()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/pengguna');
    } else {
      redirect('admin/dashboard');
    }
  }

  function kategori()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/kategori');
    } else {
      redirect('admin/pengguna');
    }
  }

  function menu()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/menu');
    } else {
      redirect('admin/pengguna');
    }
  }

  function schedule()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/schedule');
    } else {
      redirect('admin/pengguna');
    }
  }

  function room()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/room');
    } else {
      redirect('admin/pengguna');
    }
  }

  function slider()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1') {
      redirect('admin/slider');
    } else {
      redirect('admin/pengguna');
    }
  }

  function merek()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      redirect('admin/merek');
    } else {
      redirect('admin/pengguna');
    }
  }

  function hakcipta()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      redirect('admin/hakcipta');
    } else {
      redirect('admin/pengguna');
    }
  }

  function desainind()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      redirect('admin/desainind');
    } else {
      redirect('admin/pengguna');
    }
  }

  function paten()
  {
    // function ini hanya boleh diakses oleh admin dan dosen
    if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2' || $this->session->userdata('akses') == '3') {
      redirect('admin/paten');
    } else {
      redirect('admin/pengguna');
    }
  }
  public function kegiatan()
  {
    $x['keg'] = $this->db->query("SELECT * FROM kegiatan")->result();
    // var_dump($x);
    // die;
    $this->load->view('admin/v_kegiatan', $x);
  }
  function add_kegiatan()
  {
    $this->load->view('admin/v_add_kegiatan');
  }
  function simpan_kegiatan()
  {
    $config['upload_path'] = './assets/images/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

    $this->upload->initialize($config);
    if (!empty($_FILES['filefoto']['name'])) {
      if ($this->upload->do_upload('filefoto')) {
        $gbr = $this->upload->data();
        //Compress Image
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/' . $gbr['file_name'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '60%';
        $config['width'] = 770;
        $config['height'] = 420;
        $config['new_image'] = './assets/images/' . $gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $data = [
          'title' => $this->input->post('title'),
          'slug' => slug($this->input->post('title'), 'dash', true),
          'deskripsi' => $this->input->post('deskripsi'),
          'content' => $this->input->post('content'),
          'image' => $gbr['file_name'],
          'created_at' => date('Y-m-d H:i:s')
        ];

        // var_dump($data);
        // die;
        $this->db->insert('kegiatan', $data);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/Dashboard/kegiatan');
      } else {
        echo $this->session->set_flashdata('msg', 'warning');
        redirect('admin/Dashboard/kegiatan');
      }
    } else {
      redirect('admin/Dashboard/kegiatan');
    }
  }
  function edit_kegiatan()
  {
    $kode = $this->uri->segment(4);
    $x['b']  = $this->db->query("select * from kegiatan where id = '$kode'")->row_array();


    $this->load->view('admin/v_edit_kegiatan', $x);
  }
  function update_kegiatan()
  {
    $config['upload_path'] = './assets/images/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
    $kode = $this->input->post('kode');
    $this->upload->initialize($config);
    if (!empty($_FILES['filefoto']['name'])) {
      if ($this->upload->do_upload('filefoto')) {
        $gbr = $this->upload->data();
        //Compress Image
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/' . $gbr['file_name'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '60%';
        $config['width'] = 770;
        $config['height'] = 420;
        $config['new_image'] = './assets/images/' . $gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $data = [
          'title' => $this->input->post('title'),
          'slug' => slug($this->input->post('title'), 'dash', true),
          'deskripsi' => $this->input->post('deskripsi'),
          'content' => $this->input->post('content'),
          'image' => $gbr['file_name'],
          'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $kode);
        $this->db->update('kegiatan', $data);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/dashboard/kegiatan');
      } else {
        echo $this->session->set_flashdata('msg', 'warning');
        redirect('admin/dashboard/kegiatan');
      }
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'slug' => slug($this->input->post('title'), 'dash', true),
        'deskripsi' => $this->input->post('deskripsi'),
        'content' => $this->input->post('content'),
        'updated_at' => date('Y-m-d H:i:s')
      ];

      $this->db->where('id', $kode);
      $this->db->update('kegiatan', $data);
      echo $this->session->set_flashdata('msg', 'success');
      redirect('admin/dashboard/kegiatan');
    }
  }
  function hapus_kegiatan()
  {
    $kode = $this->input->post('kode2');
    $this->db->where('id', $kode);
    $this->db->delete('kegiatan');
    echo $this->session->set_flashdata('msg', 'success-hapus');
    redirect('admin/dashboard/kegiatan');
  }
}
