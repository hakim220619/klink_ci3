<?php
class Konten01 extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_konten01','m_konten01');
        $this->load->library('upload');
    }

    

	function index(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->session->userdata('idadmin');
			$x['konten01']=$this->m_konten01->get_all_konten01();
			$this->load->view('admin/v_konten01',$x);
		}else{
			redirect('admin/pengguna');
        }
	}

    function add_new(){
        $this->load->view('admin/v_add_konten01');
    }

    function edit(){
        $kode=$this->uri->segment(4);
        $x['konten01']=$this->m_konten01->get_konten01_by_kode($kode);
        $this->load->view('admin/v_edit_konten01',$x);
    }

    function simpan_konten01(){
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name']))
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 770;
                $config['height']= 420;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
                $deskripsi=$this->input->post('xdeskripsi',TRUE);
                            
                $this->m_konten01->simpan_konten01($nama,$deskripsi,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/konten01');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/konten01');
            }
                     
        }else{
            redirect('admin/konten01');
        }
    }

    function update_konten01(){
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name']))
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 770;
                $config['height']= 420;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
                $deskripsi=$this->input->post('xdeskripsi',TRUE);
                            
                $this->m_konten01->update_konten01($kode,$nama,$deskripsi,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/konten01');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/konten01');
            }
                     
        }else{
            $kode=$this->input->post('kode');
            $nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
            $deskripsi=$this->input->post('xdeskripsi',TRUE);
                            
            $this->m_konten01->update_konten01_no_img($kode,$nama,$deskripsi);
            echo $this->session->set_flashdata('msg','success');
            redirect('admin/konten01');
        }
    }

    function hapus_konten01(){
        $kode=$this->input->post('kode2');
        $this->m_konten01->hapus_konten01($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/konten01');
    }


}