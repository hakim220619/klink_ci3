<?php
class tentangki extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_tentangki','m_tentangki');
        $this->load->library('upload');
    }

    

	function index(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->session->userdata('idadmin');
			$x['tentangki']=$this->m_tentangki->get_all_tentangki();
			$this->load->view('admin/v_tentangki',$x);
		}else{
			redirect('admin/pengguna');
        }
	}

    function add_new(){
        $this->load->view('admin/v_add_tentangki');
    }

    function latarbelakang(){
        $this->load->view('admin/v_add_tentangki');
    }

    function edit(){
        $kode=$this->uri->segment(4);
        $x['tentangki']=$this->m_tentangki->get_tentangki_by_kode($kode);
        $this->load->view('admin/v_edit_tentangki',$x);
    }

    function simpan_tentangki(){
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
                            
                $this->m_tentangki->simpan_tentangki($nama,$deskripsi,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/tentangki');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/tentangki');
            }
                     
        }else{
            redirect('admin/tentangki');
        }
    }

    function update_tentangki(){
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
                            
                $this->m_tentangki->update_tentangki($kode,$nama,$deskripsi,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/tentangki');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/tentangki');
            }
                     
        }else{
            $kode=$this->input->post('kode');
            $nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
            $deskripsi=$this->input->post('xdeskripsi',TRUE);
                            
            $this->m_tentangki->update_tentangki_no_img($kode,$nama,$deskripsi);
            echo $this->session->set_flashdata('msg','success');
            redirect('admin/tentangki');
        }
    }

    function hapus_tentangki(){
        $kode=$this->input->post('kode2');
        $this->m_tentangki->hapus_fasilitas($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/fasilitas');
    }


}