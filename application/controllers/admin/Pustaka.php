<?php
class Pustaka extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_pengguna','m_pengguna');
        $this->load->model('M_pustaka','m_pustaka');
        $this->load->model('Main_model','main_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->helper(array('url','download'));    

    }

    
     // function get_kabupustaka()
     //    {
     //        $id  = $this->input->post('id');
     //        $kabupustaka = $this->db->query("SELECT * FROM tb_kabupustaka WHERE id_prov='$id' ORDER BY nama ASC")->result();

     //        $show = "<option value=''>-- Pilih Kabupustaka --</pilih>";
     //        foreach ($kabupustaka as $data )
     //        {
     //            $show.= "<option value='$data->id'>$data->nama</option>";
     //        }
     //        echo $show;
     //    }


	function index(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->session->userdata('idadmin');
			$x['pustaka']=$this->m_pustaka->get_pustaka_status();
			$this->load->view('admin/v_pustaka',$x);
		}else{
			redirect('admin/pengguna');
        }

	}

    function add_new(){
        $id = $this->session->userdata('idadmin');
        
       if($this->session->userdata('akses')=='1'){
            //$x['pus']=$this->m_pustaka->get_all_pustaka();
            $x['kat']=$this->m_pustaka->get_all_status();
            //$x['vpt']=$this->m_pustaka->get_pustaka();
            $this->load->view('admin/v_add_pustaka', $x);
        }else{
            redirect('admin/pustaka');
        }
 
    }

    
    function edit(){

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['pus']=$this->m_pustaka->get_pustaka2_by_kode($kode);
            //$x['sta']=$this->m_pustaka->get_status_kode_pustaka($kode);
            $this->load->view('admin/v_edit_pustaka',$x);
        }else{
            redirect('admin/pustaka');
        }
        
    }

   function simpan(){
        $pu_registerx = time();
        $pu_nama=strip_tags(htmlspecialchars($this->input->post('namafile',TRUE),ENT_QUOTES));

        $config['upload_path'] = './assets/images/user/';//path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        //$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['file_name']     = $pu_nama.$pu_registerx.'-upload';

        $this->upload->initialize($config);
        if(!empty($_FILES['link']['name']))
        {
            if ($this->upload->do_upload('link'))
            {
                $gbr = $this->upload->data();
                //Compress Image
                $config['upload_path']          = './assets/images/user/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1000000;
                
                $this->load->library('upload', $config);



                $pu_link=$gbr['file_name'];
                $pu_namafile=strip_tags(htmlspecialchars($this->input->post('namafile',TRUE),ENT_QUOTES));
                $pu_kategori=strip_tags(htmlspecialchars($this->input->post('xjta',TRUE),ENT_QUOTES));
                $pu_keterangan=strip_tags(htmlspecialchars($this->input->post('ket',TRUE),ENT_QUOTES));
                // $time = time();
                $pu_register = date("Y-m-d h:i:sa");
                $pengguna_id=$this->session->userdata('idadmin');
                
              
                
                $this->m_pustaka->simpan_pustaka($pengguna_id,$pu_namafile,$pu_kategori,$pu_keterangan,$pu_link,$pu_register);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/pustaka');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/pustaka');
            }
                     
        }else{
            redirect('admin/pustaka');
        }
    }
   

    function edit_pustaka(){
        $pu_registery = time();
        $pu_nama=strip_tags(htmlspecialchars($this->input->post('namafile',TRUE),ENT_QUOTES));

        $config['upload_path'] = './assets/images/user/';//path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        //$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['file_name']     = $pu_nama.$pu_registery.'-upload';

        $this->upload->initialize($config);
        if(!empty($_FILES['link']['name']))
        {
            if ($this->upload->do_upload('link'))
            {
                $gbr = $this->upload->data();
                //Compress Image
                $config['upload_path']          = './assets/images/user/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1000000;
                
                $this->load->library('upload', $config);
        
                $kode=$this->input->post('kode');

                $pu_link=$gbr['file_name'];
                $kode=htmlspecialchars($this->input->post('kode'),ENT_QUOTES);
                $pu_namafile=strip_tags(htmlspecialchars($this->input->post('namafile',TRUE),ENT_QUOTES));
                $pu_kategori=strip_tags(htmlspecialchars($this->input->post('xjta',TRUE),ENT_QUOTES));
                $pu_keterangan=strip_tags(htmlspecialchars($this->input->post('ket',TRUE),ENT_QUOTES));
                
                
                            
                $this->m_pustaka->edit_pustaka($kode,$pu_namafile,$pu_kategori,$pu_keterangan,$pu_link);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/pustaka');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/pustaka');
            }
                     
        }else{
                $kode=htmlspecialchars($this->input->post('kode'),ENT_QUOTES);
                $pu_namafile=strip_tags(htmlspecialchars($this->input->post('namafile',TRUE),ENT_QUOTES));
                $pu_kategori=strip_tags(htmlspecialchars($this->input->post('xjta',TRUE),ENT_QUOTES));
                $pu_keterangan=strip_tags(htmlspecialchars($this->input->post('ket',TRUE),ENT_QUOTES));
                
                            
            $this->m_pustaka->update_pu_no_img($kode,$pu_namafile,$pu_kategori,$pu_keterangan);
            echo $this->session->set_flashdata('msg','success');
            redirect('admin/pustaka');
        }
    }

       

    private function upload_label_merek()
    {
        $id=$this->input->post('kode');

        $config['upload_path']   = './assets/images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name']     = $id.'-gambarlabel';
        $config['quality']       = '50%';
        $config['max_size']      = 1150;
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= FALSE;
        $config['quality']= '60%';
        $config['width']= 800;
        $config['height']= 600;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();        

        $query = $this->db->query("SELECT * FROM merek WHERE merek_id='$id'")->row();
        if($query->merek_gambarmerek) {
            $config['overwrite']    = true;
            unlink(FCPATH.'assets/images/'.$query->merek_gambarmerek);
        }

        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('gambarlabel')) 
        {
            return $this->upload->data("file_name");
        }
        return "";
    }


    function hapus_pustaka(){
        $kode=$this->input->post('kode2');
        $this->m_pustaka->hapus_pustaka($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/pustaka');
    }

     

     private function upload_file_pdf($filename, $name)
    {
        $id = $this->session->userdata('idadmin');
        $get_user = $this->db->query("SELECT * FROM pustaka WHERE pengguna_id='$id'")->row();

        if ($name == "pu_link") {
            $get = $get_user->pu_link;
        } 

        $config['upload_path']  = "./assets/images/user/";
        $config['allowed_types']= 'pdf|jpeg|jpg';
        $config['file_name']    = $id.'-'.$filename.'-'.substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);

        if($get) {
            $config['overwrite']    = true;
            unlink(FCPATH.'assets/images/user/'.$get);
        }

        $this->upload->initialize($config);

        if ($this->upload->do_upload($filename)) 
        { 
            return $this->upload->data("file_name"); 
        }
    }

   

}