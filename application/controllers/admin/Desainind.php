<?php
class Desainind extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_pengguna','m_pengguna');
        $this->load->model('M_desainind','m_desainind');
        $this->load->model('Main_model','main_model');
        $this->load->model('M_status','m_status');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->library('mypdf');
        $this->load->helper(array('url','download'));    

    }

    
     function get_kabupaten()
        {
            $id  = $this->input->post('id');
            $kabupaten = $this->db->query("SELECT * FROM tb_kabupaten WHERE id_prov='$id' ORDER BY nama ASC")->result();

            $show = "<option value=''>-- Pilih Kabupaten --</pilih>";
            foreach ($kabupaten as $data )
            {
                $show.= "<option value='$data->id'>$data->nama</option>";
            }
            echo $show;
        }


	function index(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->session->userdata('idadmin');
			$x['desainind']=$this->m_desainind->get_desainind_status();
			$this->load->view('admin/v_desainind',$x);
		}elseif($this->session->userdata('akses')=='2'){
            $kode=$this->session->userdata('idadmin');
            $x['desainind']=$this->m_desainind->get_desainindsession_by_kode($kode);
            $this->load->view('admin/v_desainind',$x);
        }elseif($this->session->userdata('akses')=='3'){
            $kode=$this->session->userdata('idadmin');
            $x['desainind']=$this->m_desainind->get_desainindsession_by_kode($kode);
            $this->load->view('admin/v_desainind',$x);
        }else{
			redirect('admin/pengguna');
        }

	}

    function add_new(){
        $id = $this->session->userdata('idadmin');
        
        $cek = $this->db->query("SELECT COUNT(a.pengguna_id) as koun, b.pengguna_limiter_di as limiter
            FROM desainind a INNER JOIN pengguna b ON a.pengguna_id = b.pengguna_id 
            WHERE a.pengguna_id = $id ")->row();
                 
        if($this->session->userdata('akses')== 3 && $cek->koun < 1) { 
            $x['sta']=$this->m_status->get_all_status();
            $this->load->view('admin/v_add_di_new',$x);        
        }elseif($this->session->userdata('akses')== 2 && $cek->koun < 10 || $cek->koun < $cek->limiter){
            $x['sta']=$this->m_status->get_all_status();
            $this->load->view('admin/v_add_di_new',$x);        
        }elseif($this->session->userdata('akses')=='1'){
            $x['sta']=$this->m_status->get_all_status();
            $this->load->view('admin/v_add_di_new',$x);
        }else{
            echo $this->session->set_flashdata('msg','bates-input');
            redirect('admin/desainind');
        }
 
    }

    function view(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();
        if ($cek->persentase <= 99) {
            $update['di_statusid']  =  1;
            $this->main_model->update_data('desainind', $update, 'di_id', $kodex);
            }      

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_view_desainind',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_view_desainind',$x);
            $this->output->delete_cache('admin/v_view_desainind');
        }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_view_desainind',$x);
            $this->output->delete_cache('admin/v_view_desainind');
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/desainind');
        }

    }

    function cetakpdf(){

       
    if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['jta']=$this->m_desainind->get_all_jta();
            $x['vdi']=$this->m_desainind->get_detaildipdfx_by_kode($kode);
            $this->load->view('admin/v_dipdf',$x);
        }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['jta']=$this->m_desainind->get_all_jta();
            $x['vdi']=$this->m_desainind->get_disessionpdfx_by_kode($kode,$id);
            $this->load->view('admin/v_dipdf',$x);
        }else{
            redirect('admin/desainind');
    
    }$this->mypdf->generate('admin/v_dipdf', $x, 'desainind-Form', 'A4', 'portrait');
  
    }

    function viewdicert(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_di_cert',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='4'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_cert',$x);
         }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='4'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_cert',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view-proses');
            redirect('admin/desainind');
        }
    }

    function viewdi1(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();

        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_di_step1_new',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step1_new',$x);
         }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step1_new',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/desainind');
        }
    }

    function viewdi2(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();

        if ($cek->persentase == 100 AND $cek->di_no_permohonan != "") {
            $update['di_statusid']  =  3;
            $this->main_model->update_data('desainind', $update, 'di_id', $kodex);
            } 

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_di_step2',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step2',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step2',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/desainind');
        }
    }

    function viewdi3(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_di_step3',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step3',$x);
         }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step3',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/desainind');
        }
    }

    function viewdi4(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_di_step4',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step4',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step4',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/desainind');
        }
    }

     function viewdi5(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);
            $x['jta']=$this->m_desainind->get_all_jta();    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_di_step5',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['jta']=$this->m_desainind->get_all_jta();
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step5',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['jta']=$this->m_desainind->get_all_jta();
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_step5',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/desainind');
        }
    }

    function edit(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $x['sta']=$this->m_status->get_status_kode($kode);
            $this->load->view('admin/v_edit_di',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $x['sta']=$this->m_status->get_status_kode($kode);
            $this->load->view('admin/v_edit_di',$x);
         }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $x['sta']=$this->m_status->get_status_kode($kode);
            $this->load->view('admin/v_edit_di',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/desainind');
        }
        
    }

    function simpan_di(){
      $this->form_validation->set_rules('nama','Nama IKM', 'required|htmlspecialchars|trim|alpha_numeric_spaces');
      $this->form_validation->set_rules('filefoto','Foto Pengusul', 'callback_validate_image');
      $this->form_validation->set_rules('no_telp','No Handphone','required|trim|htmlspecialchars|numeric|nohp_check',['nohp_check' => 'Gunakan input awalan 62 untuk 2 digit pertama']);
      $this->form_validation->set_rules('email','Email','required|htmlspecialchars|trim|valid_emails');
      
      if ( $this->form_validation->run() == false)
      {
      $data['judul'] = 'Registration';
        //$data['nama'] = $nama;
       // $this->load->view('templates/headerlogin', $data);
        $this->load->view('admin/v_add_di_new', $data);
        //$this->load->view('templates/footerlogin');
      } else {
        // $nohp=$this->input->post('no_telp');
        // if(substr($nohp, 0, 2)!=62){
        //   echo $this->session->set_flashdata('msg','nohp');
        //   redirect(base_url()."admin/desainind/add_new/");
        // }
    $nama=$this->input->post('nama');

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = FALSE; //nama yang terupload nantinya
        $config['file_name']    = $nama.'-'.substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
        $config['max_size'] ='1000000';

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
                $config['width']= 640;
                $config['height']= 480;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $di_photo=$gbr['file_name'];
                $di_nama=strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
                $di_email=strip_tags(htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
                $di_nohp=strip_tags(htmlspecialchars($this->input->post('no_telp',TRUE),ENT_QUOTES));
                //$status_id=strip_tags($this->input->post('xstatus'));
                $hcta = date('Y');
                $hcbln = date('m');
                $status_id=1;
                $data=$this->m_status->get_status_byid($status_id);
                $q=$data->row_array();
                $status_nama=$q['status_nama'];
                $pengguna_id=$this->session->userdata('idadmin');
                            
                $this->m_desainind->simpan_desainind($pengguna_id,$di_nama,$di_email,$di_nohp,$hcta,$hcbln,$status_id,$status_nama,$di_photo);
                //echo $this->session->set_flashdata('msg','success');
                //redirect('admin/desainind');
                $kodex=$this->session->userdata('idadmin');
                $url = $this->db->query("SELECT uf.di_id, uf.di_statusid, uf.di_nama
                FROM desainind uf 
                LEFT JOIN pengguna us ON uf.pengguna_id = us.pengguna_id 
                WHERE uf.di_statusid = 1 AND uf.pengguna_id='$kodex' ORDER BY uf.di_id DESC LIMIT 1")->row();
                redirect('admin/desainind/viewdi2/'.$url->di_id);
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/desainind');
            }
                     
        }else{
            redirect('admin/desainind');
        }
    }
    }

    
    public function validate_image() {
    $check = TRUE;
    if ((!isset($_FILES['filefoto'])) || $_FILES['filefoto']['size'] == 0) {
        $this->form_validation->set_message('validate_image', '{field} harus diisi.');
        $check = FALSE;
    }
    else if (isset($_FILES['filefoto']) && $_FILES['filefoto']['size'] != 0) {
        $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["filefoto"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['filefoto']['tmp_name']);
        $type = $_FILES['filefoto']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image', 'file gambar salah hanya boleh jpg/jpeg/png.');
            $check = FALSE;
        }
        if(filesize($_FILES['filefoto']['tmp_name']) > 1000000) {
            $this->form_validation->set_message('validate_image', 'Maksimal ukuran file 1000kb');
            $check = FALSE;
        }
        if(!in_array($extension, $allowedExts)) {
            $this->form_validation->set_message('validate_image', ".{$extension} adalah Ekstensi file yang salah, silahkan unggah file jpg/jpeg/png. ");
            $check = FALSE;
        }
    }
    return $check;
    }

    function simpan_desainind(){
        $di_email = $this->input->post('email');
        $sql = $this->db->query("SELECT di_email FROM desainind where di_email='$di_email'");
        $di_email = $sql->num_rows();
        if ($di_email > 0) {
        echo $this->session->set_flashdata('msg','sudahada');
        redirect(base_url()."admin/desainind/add_new");
        }

       

        $di_nama=strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        //$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['file_name']     = $di_nama.'-penggunadi';

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
                $config['width']= 500;
                $config['height']= 500;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();



                $di_photo=$gbr['file_name'];
                $di_nama=strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
                $di_email=strip_tags(htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
                $di_nohp=strip_tags(htmlspecialchars($this->input->post('no_telp',TRUE),ENT_QUOTES));
                // $time = time();
                $dita = date('Y');
                $dibln = date('m');
                // $di_no_permohonan = strip_tags(htmlspecialchars($this->input->post('di_no_permohonan',TRUE),ENT_QUOTES));
                $status_id=1;
                $data=$this->m_status->get_status_byid($status_id);
                $q=$data->row_array();
                $status_nama=$q['status_nama'];
                $pengguna_id=$this->session->userdata('idadmin');
              
                
                $this->m_desainind->simpan_desainind($pengguna_id,$di_nama,$di_email,$di_nohp,$dita,$dibln,$status_id,$status_nama,$di_photo);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/desainind');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/desainind');
            }
                     
        }else{
            redirect('admin/desainind');
        }
    }

    function cek_email()
    {
        $email = $this->input->post('email');
        $query = $this->db->query("SELECT * FROM desainind WHERE di_email='$email'")->num_rows();

        if ($query > 0) {
            echo '<label class="text-danger">Email telah terdaftar.</label>';
        } else {
            return false;
        }
    }    

    function update_di(){
        
        $di_email = $this->input->post('email');
        $sql = $this->db->query("SELECT di_email FROM desainind where di_email='$di_email'");
        $di_email = $sql->num_rows();
        if ($di_email > 0) {
        echo  '<script language="javascript">
                      alert ("Email Sudah");
                      window.location="add_new";
                      </script>';
                      exit();
        }

        $di_nama=strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name']     = $di_nama.'-gambarlabel';
        //$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

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
                $config['max_size']= 1150;
                $config['width']= 500;
                $config['height']= 500;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $di_photo=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $di_nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
                $di_email=strip_tags(htmlspecialchars($this->input->post('xemail',TRUE),ENT_QUOTES));
                $di_nohp=strip_tags(htmlspecialchars($this->input->post('xnohp',TRUE),ENT_QUOTES));
                $di_ket=strip_tags(htmlspecialchars($this->input->post('di_ket',TRUE),ENT_QUOTES));
                $status_id=strip_tags($this->input->post('di_statusid'));
                $data=$this->m_status->get_status_byid($status_id);
                $q=$data->row_array();
                $di_status=$q['status_nama'];
                
                            
                $this->m_desainind->update_di($kode,$di_nama,$di_email,$di_nohp,$status_id,$di_ket,$di_status,$di_photo);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/desainind');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/desainind');
            }
                     
        }else{
            $kode=$this->input->post('kode');
                $di_nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
                $di_email=strip_tags(htmlspecialchars($this->input->post('xemail',TRUE),ENT_QUOTES));
                $di_nohp=strip_tags(htmlspecialchars($this->input->post('xnohp',TRUE),ENT_QUOTES));
                $di_ket=strip_tags(htmlspecialchars($this->input->post('di_ket',TRUE),ENT_QUOTES));
                $status_id=strip_tags($this->input->post('di_statusid'));
                $data=$this->m_status->get_status_byid($status_id);
                $q=$data->row_array();
                $di_status=$q['status_nama'];
                
                            
            $this->m_desainind->update_di_no_img($kode,$di_nama,$di_email,$di_nohp,$status_id,$di_ket,$di_status);
            echo $this->session->set_flashdata('msg','success');
            redirect('admin/desainind');
        }
    }

    function update_di1(){
        $id=$this->input->post('kode');
        $nohp=$this->input->post('di_nohp');
        if(substr($nohp, 0, 2)!=62){
          echo $this->session->set_flashdata('msg','nohp');
          redirect(base_url()."admin/desainind/viewdi1/".$id);
        } 

        $data['di_tgl_penerimaan']       = $this->input->post('di_tgl_penerimaan');
        //$data['di_noref_pemohon'] = $this->input->post('norefpemohon');
        $data['di_no_permohonan']     = $this->input->post('di_no_permohonan');
        $data['di_nama']     = $this->input->post('di_nama');
        $data['di_nohp']     = $this->input->post('di_nohp');

        if ($_FILES["di_photo"]["name"]) {
            $data['di_photo'] = $this->upload_file_pdf("di_photo", "di_photo");
        }


        $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);


        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/desainind/viewdi2/".$id);
        //redirect('admin/hakcipta/viewmerek2');
       
    }

    function update_di2(){
        $id=$this->input->post('kode');
        if ($_FILES["di_fileketusaha"]["name"]) {
            $data['di_fileketusaha'] = $this->upload_file_pdf("di_fileketusaha", "di_fileketusaha");
        }
        
        $data['di_nama']       = $this->input->post('di_nama');
        $data['di_perusahaan']       = $this->input->post('di_perusahaan');
        $data['di_ketusaha'] = $this->input->post('typeusaha');
        //$data['di_warganegara'] = $this->input->post('di_warganegara');
        $data['di_alamat']     = $this->input->post('di_alamat');
        $data['di_idprovinsi']       = $this->input->post('id_prov_perusahaan');
        $data['di_idkabkota']        = $this->input->post('id_kab_perusahaan');
        $data['di_kodepos']     = $this->input->post('di_kodepos');
        //$data['di_npwp']     = $this->input->post('di_npwp');
        $data['di_alamatsurat']     = 'Klinik HKI Kementerian Perindustrian Jalan Jenderal Gatot Subroto Kav. 52-53 Lt. 15 (Gedung Kementerian Perindustrian)';
        $data['di_provsurat']     = 'DKI Jakarta';
        $data['di_kabkotasurat']     = 'Jakarta Selatan';
        $data['di_kodepossurat']     = '12950';
        $data['di_negarasurat']     = 'Indonesia';
        
        $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);
        $this->persentase();
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/desainind/viewdi3/".$id);
        
    }

    function update_di3(){
        $id=$this->input->post('kode');
        if ($_FILES["file_filektp"]["name"]) {
            $data['di_filektp'] = $this->upload_file_pdf("file_filektp", "di_filektp");
        }

        if ($_FILES["file_filebkp"]["name"]) {
        $data['di_filebkp'] = $this->upload_file_pdf("file_filebkp", "di_filebkp");
        }
        
         if ($_FILES["di_filettd"]["name"]) {
        $data['di_filettd'] = $this->upload_file_pdf("di_filettd", "di_filettd");
        }
        
                
        $data['di_juduldes'] = $this->input->post('di_juduldes');
        $data['di_namapendesain1']     = $this->input->post('di_namapendesain1');
        $data['di_negarapendaftar']        = $this->input->post('di_negarapendaftar');
        $data['di_kegunaan']     = $this->input->post('di_kegunaan');
        $data['di_jenis']     = $this->input->post('di_jenis');
        $data['di_klaim2']     = $this->input->post('di_klaim');


        
        $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);
        $this->persentase();
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/desainind/viewdi4/".$id);
        
    }

    function update_di4(){
        $id=$this->input->post('kode');
       
        $data['di_id'] = $this->input->post('kode');
        if ($_FILES["file_gbrdpn"]["name"]) {
            $data['di_gbrdpn'] = $this->upload_file_pdf("file_gbrdpn", "di_gbrdpn");
        }

        if ($_FILES["file_gbrblk"]["name"]) {
        $data['di_gbrblk'] = $this->upload_file_pdf("file_gbrblk", "di_gbrblk");
        }

        if ($_FILES["file_gbrskanan"]["name"]) {
        $data['di_gbrskanan'] = $this->upload_file_pdf("file_gbrskanan", "di_gbrskanan");
        }

        if ($_FILES["file_gbrskiri"]["name"]) {
        $data['di_gbrskiri'] = $this->upload_file_pdf("file_gbrskiri", "di_gbrskiri");
        }

        if ($_FILES["file_gbratas"]["name"]) {
        $data['di_gbratas'] = $this->upload_file_pdf("file_gbratas", "di_gbratas");
        }

        if ($_FILES["file_gbrbawah"]["name"]) {
        $data['di_gbrbawah'] = $this->upload_file_pdf("file_gbrbawah", "di_gbrbawah");
        }

        if ($_FILES["file_gbrperspektif"]["name"]) {
    $data['di_gbrperspektif'] = $this->upload_file_pdf("file_gbrperspektif", "di_gbrperspektif");
        }
        
        $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);
        $this->persentase();
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/desainind/view/".$id);
        
    }

    function update_di5(){
        $id=$this->input->post('kode');
        if ($_FILES["file_ktp"]["name"]) {
            $data['di_ktp'] = $this->upload_file_pdf("file_ktp", "di_ktp");
        }
        if ($_FILES["file_spernyataan"]["name"]) {
        $data['di_spernyataan'] = $this->upload_file_pdf("file_spernyataan", "di_spernyataan");
        }
        if ($_FILES["file_contodiiptaan"]["name"]) {
        $data['di_contodiiptaan'] = $this->upload_file_pdf("file_contodiiptaan", "di_contodiiptaan");
        }
        
        $data['di_jenis']       = $this->input->post('di_jenis');
        $data['di_judul']       = $this->input->post('di_judul');
        $data['di_tgldi'] = $this->input->post('di_tgldi');
        $data['di_tempat']     = $this->input->post('di_tempat');
        $data['di_uraian']       = $this->input->post('di_uraian');
        
        
        
        $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);
        $this->persentase();

        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/desainind/viewdi5/".$id);
        
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


    function hapus_desainind(){
        $kode=$this->input->post('kode2');
        $this->m_desainind->hapus_desainind($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/desainind');
    }

  

    function export(){

        if($this->session->userdata('akses')!='1'){
            redirect('admin/desainind');
        }

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Layanan HKI')
                     ->setLastModifiedBy('Layanan HKI')
                     ->setTitle("Data Layanan Hak Cipta")
                     ->setSubject("Hak Cipta Subject")
                     ->setDescription("Laporan Data Layanan Hak Cipta")
                     ->setKeywords("Hak Cipta");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
          'font' => array('bold' => true), // Set font nya jadi bold
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, // Set text jadi di tengah secara vertical (middle)

            'wrap' => true
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR USULAN LAYANAN HAK CIPTA"); // Set kolom A1 dengan tulisan ""
        $excel->getActiveSheet()->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet() // Set warna header row
        ->getStyle('A3:K3')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()  
        ->setRGB('90F06D');
        
        $excel->getActiveSheet()
        ->getStyle('A1:A1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->getActiveSheet()
        ->getStyle('D4:K1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $excel->getActiveSheet()->getStyle('B4:K1000')->getAlignment()->setIndent(1);


        $excel->getActiveSheet()
        ->getPageSetup()
        ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $excel->getActiveSheet()
        ->getPageSetup()
        ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

        $excel->getActiveSheet()->getPageSetup()->setFitToPage(true);
        $excel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
        $excel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

        $excel->getActiveSheet()
        ->getPageMargins()->setTop(1);
        $excel->getActiveSheet()
        ->getPageMargins()->setRight(0.25);
        $excel->getActiveSheet()
        ->getPageMargins()->setLeft(0.25);
        $excel->getActiveSheet()
        ->getPageMargins()->setBottom(0.5);

        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA PEMOHON"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "ALAMAT"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "KABUPATEN/KOTA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "PROVINSI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "NOMOR AGENDA PENDAFTARAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "JUDUL DESAIN INDUSTRI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "NAMA PENDESAIN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "STATUS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "PENJELASAN DESAIN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $desainind = $this->m_desainind->get_excel_desainind_detail_new();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($desainind as $x){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $x->di_nama);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $x->di_alamat);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $x->namakabkota);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $x->namaprov);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $x->di_no_permohonan);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $x->di_juduldes);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $x->di_namapendesain1);
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $x->status);
          $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $x->di_kegunaan);
          $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $x->instansi);
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);

          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(35); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)

        $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("DAFTAR USULAN");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Layanandesainind.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }

    public function persentase()
    {   
        $id = $id=$this->input->post('kode');
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$id."' ")->row();

          $jum = 0;
          if ($cek->di_nama != "") { $jum = $jum+5; }
          if ($cek->di_perusahaan != "") { $jum = $jum+5; }
          if ($cek->di_ketusaha != "") { $jum = $jum+5; }
          if ($cek->di_fileketusaha != "") { $jum = $jum+5; }
          if ($cek->di_alamat != "") { $jum = $jum+5; }
          // if ($cek->di_warganegara != "") { $jum = $jum+5; }
          // if ($cek->di_npwp != "") { $jum = $jum+5; }
                    
          if ($cek->di_filektp != "") { $jum = $jum+5; }
          if ($cek->di_juduldes != "") { $jum = $jum+10; }
          if ($cek->di_namapendesain1 != "") { $jum = $jum+5; }
          if ($cek->di_kegunaan != "") { $jum = $jum+5; }
          if ($cek->di_filebkp != "") { $jum = $jum+5; }
          if ($cek->di_filettd != "") { $jum = $jum+5; }
          if ($cek->di_klaim2 != "") { $jum = $jum+5; }
          //if ($cek->di_negarapendesain1 != "") { $jum = $jum+5; }
          //if ($cek->di_negarapendaftar != "") { $jum = $jum+5; }
          if ($cek->di_gbrdpn != "") { $jum = $jum+5; }
          if ($cek->di_gbrblk != "") { $jum = $jum+5; }
          if ($cek->di_gbrskanan != "") { $jum = $jum+5; }
          if ($cek->di_gbrskiri != "") { $jum = $jum+5; }
          if ($cek->di_gbrperspektif != "") { $jum = $jum+5; }
          if ($cek->di_gbratas != "") { $jum = $jum+5; }
          if ($cek->di_gbrbawah != "") { $jum = $jum+5; }
         

          $update['persentase']  =  $jum;
          $this->main_model->update_data('desainind', $update, 'di_id', $id);

                              
    }

     private function upload_file_pdf($filename, $name)
    {
        $id = $this->input->post('kode');
        $get_user = $this->db->query("SELECT * FROM desainind WHERE di_id='$id'")->row();

        if ($name == "di_filektp") {
            $get = $get_user->di_filektp;
        } elseif ($name == "di_filebkp") {
            $get = $get_user->di_filebkp;
        } elseif ($name == "di_photo") {
            $get = $get_user->di_filebkp;
        } elseif ($name == "di_gbrdpn") {
            $get = $get_user->di_gbrdpn;
        } elseif ($name == "di_gbrblk") {
            $get = $get_user->di_gbrblk;
        } elseif ($name == "di_gbrskanan") {
            $get = $get_user->di_gbrskanan;
        } elseif ($name == "di_gbrskiri") {
            $get = $get_user->di_gbrskiri;
        } elseif ($name == "di_gbratas") {
            $get = $get_user->di_gbratas;
        } elseif ($name == "di_gbrbawah") {
            $get = $get_user->di_gbrbawah;
        } elseif ($name == "di_filettd") {
            $get = $get_user->di_gbrbawah;
        } else {
            $get = $get_user->di_gbrperspektif;
        }

        $config['upload_path']  = "./assets/images/";
        $config['allowed_types']= 'pdf|jpeg|jpg';
        $config['file_name']    = $id.'-'.$filename.'-'.substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);

        if($get) {
            $config['overwrite']    = true;
            unlink(FCPATH.'assets/images/'.$get);
        }

        $this->upload->initialize($config);

        if ($this->upload->do_upload($filename)) 
        { 
            return $this->upload->data("file_name"); 
        }
    }

   function update_di_cert(){
        $id=$this->input->post('kode');

        if ($_FILES["di_cert"]["name"]) {
            $data['di_cert'] = $this->upload_file_pdf("di_cert", "di_cert");
        }

        
        $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);
        
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/desainind/viewdicert/".$id);
        
    }

    function update_di_cert_cancel(){
        $id=$this->input->post('kode');

        if ($_FILES["di_cert_cancel"]["name"]) {
            $data['di_cert_cancel'] = $this->upload_file_pdf("di_cert_cancel", "di_cert_cancel");
        }

        
        $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);
        
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/desainind/viewdicert_cancel/".$id);
        
    }


   function submit(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();
            
            if ($cek->di_statusid == 2 || $cek->di_statusid == 3 || $cek->di_statusid == 4) {
            echo $this->session->set_flashdata('msg','sudah-submit');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }

            if ($cek->persentase == 100) {
            $update['di_statusid']  =  2;
            echo $this->session->set_flashdata('msg','sukses-submit');
            $this->main_model->update_data('desainind', $update, 'di_id', $kodex);
            redirect(base_url()."admin/desainind/");
            }


            if ($cek->persentase <= 99) {
            echo $this->session->set_flashdata('msg','gagal-submit');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
        

            // if ($cek->persentase == 100 AND $cek->merek_no_permohonan != "") {
            // $update['merek_statusid']  =  3;
            // $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
            // }       

       // echo $this->session->set_flashdata('msg','success');
        //redirect(base_url()."admin/desainind/view/".$id, 'refresh');
        

        
    }

    function diproses(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();
        //$mails = $this->db->query("SELECT di_email FROM merek WHERE di_id = '".$kodex."' ")->row();
            
        if ($cek->di_statusid == 3 || $cek->di_statusid == 4) {
            echo $this->session->set_flashdata('msg','sudah-diproses');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }

        if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','hak-akses');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }      
           
            if ($cek->di_statusid == 2) {
            $update['di_statusid']  =  3;
            echo $this->session->set_flashdata('msg','sendmail');
            $this->main_model->update_data('desainind', $update, 'di_id', $kodex);
             $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port'   => 465,
                'smtp_user' => 'klinik.hkiikm@gmail.com',  // Email gmail
                'smtp_pass'   => 'Sesdjikm4',  // Password gmail
                'smtp_crypto' => 'ssl',
                'mailtype'  => 'html'
                );       
             
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
                
            $this->email->from('klinik.hkiikm@gmail.com', 'Layanan KI');
            $this->email->to($cek->di_email);
            $this->email->set_header('Content-Type', 'text/html');
            $this->email->subject('Usulan Sedang Diproses');
            $message = '
          <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldnt be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesnt work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size youd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}


    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        .primary{
    background: #4154f1;
}
.bg_white{
    background: #ffffff;
}
.bg_light{
    background: #f7fafa;
}
.bg_black{
    background: #000000;
}
.bg_dark{
    background: rgba(0,0,0,.8);
}
.email-section{
    padding:2.5em;
}

/*BUTTON*/
.btn{
    padding: 10px 15px;
    display: inline-block;
}
.btn.btn-primary{
    border-radius: 5px;
    background: #4154f1;
    color: #ffffff;
}
.btn.btn-white{
    border-radius: 5px;
    background: #ffffff;
    color: #000000;
}
.btn.btn-white-outline{
    border-radius: 5px;
    background: transparent;
    border: 1px solid #fff;
    color: #fff;
}
.btn.btn-black-outline{
    border-radius: 0px;
    background: transparent;
    border: 2px solid #000;
    color: #000;
    font-weight: 700;
}
.btn-custom{
    color: rgba(0,0,0,.3);
    text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
    font-family: "Poppins", sans-serif;
    color: #000000;
    margin-top: 0;
    font-weight: 400;
}

body{
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-size: 15px;
    line-height: 1.8;
    color: rgba(0,0,0,.4);
}

a{
    color: #4154f1;
}

table{
}
/*LOGO*/

.logo h1{
    margin: 0;
}
.logo h1 a{
    color: #4154f1;
    font-size: 24px;
    font-weight: 700;
    font-family: "Poppins", sans-serif;
}

/*HERO*/
.hero{
    position: relative;
    z-index: 0;
}

.hero .text{
    color: rgba(0,0,0,.3);
}
.hero .text h2{
    color: #000;
    font-size: 34px;
    margin-bottom: 0;
    font-weight: 200;
    line-height: 1.4;
}
.hero .text h3{
    font-size: 24px;
    font-weight: 300;
}
.hero .text h2 span{
    font-weight: 600;
    color: #000;
}

.text-author{
    bordeR: 1px solid rgba(0,0,0,.05);
    max-width: 50%;
    margin: 0 auto;
    padding: 2em;
}
.text-author img{
    border-radius: 50%;
    padding-bottom: 20px;
}
.text-author h3{
    margin-bottom: 0;
}
ul.social{
    padding: 0;
}
ul.social li{
    display: inline-block;
    margin-right: 10px;
}

/*FOOTER*/

.footer{
    border-top: 1px solid rgba(0,0,0,.05);
    color: rgba(0,0,0,.5);
}
.footer .heading{
    color: #000;
    font-size: 20px;
}
.footer ul{
    margin: 0;
    padding: 0;
}
.footer ul li{
    list-style: none;
    margin-bottom: 10px;
}
.footer ul li a{
    color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
    <center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
        <!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="logo" style="text-align: left;">
                        <h1 style="font-family: verdana;"><a href="#">Usulan Sedang Diproses</a></h1>
                      </td>
                </tr>
            </table>
          </td>
          </tr><!-- end tr -->
                <tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 0 2.5em; text-align: justify; padding-bottom: 3em;">
                        <div class="text">
                    <h4 style="font-family: verdana;">Yth. Bapak/Ibu,</h4>
                            <h4 style="font-family: verdana;">Pendaftaran usulan Desain Industri dengan judul usulan : <b>' . $cek->di_juduldes . '</b> sedang kami proses. Tim kami akan memverifikasi berkas yang anda kirimkan. Mohon ditunggu untuk mendapatkan informasi selanjutnya.</h4>
                        </div>
                    </td>
                </tr>
                
            </table>
          </td>
          </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
              <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <h3 class="logo">Klinik Kekayaan Intelektual</h3>
                        <p style="text-align: justify;font-size: 12px;">
Direktorat Jenderal Industri Kecil, Menengah dan Aneka Kementerian Perindustrian <br>
Alamat: Jl. Jend. Gatot Subroto Kav. 52-53 Lantai 15, Jakarta Selatan 12950<br>
Contact Person dan Whatsapp : 082312901430<br>
No. Tlp : 021 - 5255509 ext. 2168<br>
Email: klinik.hkiikm@gmail.com<br>
Website: <a href="https://klinikki.kemenperin.go.id">klinikki.kemenperin.go.id</a></p>
                      </td>
                    </tr>
                  </table>
                </td>
              
        </tr><!-- end: tr -->
        
      </table>

    </div>
  </center>
</body>
</html>';
            $this->email->message($message);
            if ($this->email->send()) {
            echo $this->session->set_flashdata('msg','sendmail');
        redirect('https://wa.me/'.$cek->di_nohp.'?text=Yth. Bapak/Ibu, Pendaftaran usulan Desain Industri anda sedang kami proses. Tim kami akan memverifikasi berkas yang anda kirimkan. Mohon ditunggu mendapatkan informasi selanjutnya.');
            redirect(base_url()."admin/desainind/view/".$kodex);
            } else {
                echo $this->email->print_debugger();
                die;
            }   
            redirect(base_url()."admin/desainind/view/".$kodex);
            }  

            if ($cek->persentase <= 99) {
            echo $this->session->set_flashdata('msg','sudah-diproses');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
        
    }

     function diajukan(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();
            
         if ($cek->di_statusid == 4) {
            echo $this->session->set_flashdata('msg','sudah-diproses');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
     if ($cek->di_no_permohonan == "") {
            echo $this->session->set_flashdata('msg','noper');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
    
     if ($cek->persentase <= 99) {
            echo $this->session->set_flashdata('msg','gagal-submit');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }

        if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','hak-akses');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
                  
            if ($cek->di_statusid == 3) {
            $update['di_statusid']  =  4;
            echo $this->session->set_flashdata('msg','sendmail');
            $this->main_model->update_data('desainind', $update, 'di_id', $kodex);
             $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port'   => 465,
                'smtp_user' => 'klinik.hkiikm@gmail.com',  // Email gmail
                'smtp_pass'   => 'Sesdjikm4',  // Password gmail
                'smtp_crypto' => 'ssl',
                'mailtype'  => 'html'
                );       
             
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
                
            $this->email->from('klinik.hkiikm@gmail.com', 'Layanan KI');
            $this->email->to($cek->di_email);
            $this->email->set_header('Content-Type', 'text/html');
            $this->email->subject('Usulan Diajukan');
            $message = '
          <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldnt be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesnt work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size youd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}


    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        .primary{
    background: #4154f1;
}
.bg_white{
    background: #ffffff;
}
.bg_light{
    background: #f7fafa;
}
.bg_black{
    background: #000000;
}
.bg_dark{
    background: rgba(0,0,0,.8);
}
.email-section{
    padding:2.5em;
}

/*BUTTON*/
.btn{
    padding: 10px 15px;
    display: inline-block;
}
.btn.btn-primary{
    border-radius: 5px;
    background: #4154f1;
    color: #ffffff;
}
.btn.btn-white{
    border-radius: 5px;
    background: #ffffff;
    color: #000000;
}
.btn.btn-white-outline{
    border-radius: 5px;
    background: transparent;
    border: 1px solid #fff;
    color: #fff;
}
.btn.btn-black-outline{
    border-radius: 0px;
    background: transparent;
    border: 2px solid #000;
    color: #000;
    font-weight: 700;
}
.btn-custom{
    color: rgba(0,0,0,.3);
    text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
    font-family: "Poppins", sans-serif;
    color: #000000;
    margin-top: 0;
    font-weight: 400;
}

body{
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-size: 15px;
    line-height: 1.8;
    color: rgba(0,0,0,.4);
}

a{
    color: #4154f1;
}

table{
}
/*LOGO*/

.logo h1{
    margin: 0;
}
.logo h1 a{
    color: #4154f1;
    font-size: 24px;
    font-weight: 700;
    font-family: "Poppins", sans-serif;
}

/*HERO*/
.hero{
    position: relative;
    z-index: 0;
}

.hero .text{
    color: rgba(0,0,0,.3);
}
.hero .text h2{
    color: #000;
    font-size: 34px;
    margin-bottom: 0;
    font-weight: 200;
    line-height: 1.4;
}
.hero .text h3{
    font-size: 24px;
    font-weight: 300;
}
.hero .text h2 span{
    font-weight: 600;
    color: #000;
}

.text-author{
    bordeR: 1px solid rgba(0,0,0,.05);
    max-width: 50%;
    margin: 0 auto;
    padding: 2em;
}
.text-author img{
    border-radius: 50%;
    padding-bottom: 20px;
}
.text-author h3{
    margin-bottom: 0;
}
ul.social{
    padding: 0;
}
ul.social li{
    display: inline-block;
    margin-right: 10px;
}

/*FOOTER*/

.footer{
    border-top: 1px solid rgba(0,0,0,.05);
    color: rgba(0,0,0,.5);
}
.footer .heading{
    color: #000;
    font-size: 20px;
}
.footer ul{
    margin: 0;
    padding: 0;
}
.footer ul li{
    list-style: none;
    margin-bottom: 10px;
}
.footer ul li a{
    color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
    <center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
        <!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="logo" style="text-align: left;">
                        <h1 style="font-family: verdana;"><a href="#">Usulan Diajukan</a></h1>
                      </td>
                </tr>
            </table>
          </td>
          </tr><!-- end tr -->
                <tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 0 2.5em; text-align: justify; padding-bottom: 3em;">
                        <div class="text">
                    <h4 style="font-family: verdana;">Yth. Bapak/Ibu,</h4>
                            <h4 style="font-family: verdana;">Selamat usulan Desain Industri dengan judul cipta : <b>' . $cek->di_juduldes . '</b>  telah kami ajukan ke Direktorat Jenderal Kekayaan Intelektual, Kementerian Hukum dan HAM. Pengusulan Desain Industri memakan waktu 1 - 1,5 Tahun. Ketika sertifikat Desain Industri sudah selesai, kami akan mengirimkan email notifikasi kembali.</h4>
                        </div>
                    </td>
                </tr>
                
            </table>
          </td>
          </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
              <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <h3 class="logo">Klinik Kekayaan Intelektual</h3>
                        <p style="text-align: justify;font-size: 12px;">
Direktorat Jenderal Industri Kecil, Menengah dan Aneka Kementerian Perindustrian <br>
Alamat: Jl. Jend. Gatot Subroto Kav. 52-53 Lantai 15, Jakarta Selatan 12950<br>
Contact Person dan Whatsapp : 082312901430<br>
No. Tlp : 021 - 5255509 ext. 2168<br>
Email: klinik.hkiikm@gmail.com<br>
Website: <a href="https://klinikki.kemenperin.go.id">klinikki.kemenperin.go.id</a></p>
                      </td>
                    </tr>
                  </table>
                </td>
              
        </tr><!-- end: tr -->
        
      </table>

    </div>
  </center>
</body>
</html>';
            $this->email->message($message);
            if ($this->email->send()) {
            echo $this->session->set_flashdata('msg','sendmail');
        redirect('https://wa.me/'.$cek->di_nohp.'?text=Yth. Bapak/Ibu, Selamat usulan Desain Industri anda telah kami ajukan ke Direktorat Jenderal Kekayaan Intelektual, Kementerian Hukum dan HAM. Pengusulan Desain Industri memakan waktu 1 - 1,5 Tahun. Ketika sertifikat Desain Industri sudah selesai, kami akan mengirimkan email notifikasi kembali.');
            redirect(base_url()."admin/desainind/view/".$kodex);
            } else {
                echo $this->email->print_debugger();
                die;
            }
            redirect(base_url()."admin/desainind/");
            }  

    }

function selesai(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();
            
        if ($cek->di_statusid == 5) {
            echo $this->session->set_flashdata('msg','selesai');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
    

        if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','hak-akses');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
                  
            if ($cek->di_statusid == 4) {
            $update['di_statusid']  =  5;
            echo $this->session->set_flashdata('msg','sendmail');
            $this->main_model->update_data('desainind', $update, 'di_id', $kodex);
             $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port'   => 465,
                'smtp_user' => 'klinik.hkiikm@gmail.com',  // Email gmail
                'smtp_pass'   => 'Sesdjikm4',  // Password gmail
                'smtp_crypto' => 'ssl',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1',
                 'wordwrap'  => TRUE
                );       
            
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            // $this->load->helper('path');
            // $path = set_realpath('./assets/images/');
            //$attched_file= $_SERVER["DOCUMENT_ROOT"]."/assets/images/".$cek->di_cert;
            //$file_path= $_SERVER["DOCUMENT_ROOT"]."/var/www/html/klinikki/assets/images/".$cek->di_cert;
            //$file_path = FCPATH.'/assets/images/'.$cek->di_email;
            //$file_path = base_url() . '/assets/images/'. $cek->di_email;
           // $this->email->attach($file_path);
            //$this->email->attach($path . $cek->di_cert, 'report.pdf', 'application/pdf');
           // $this->email->attach(FCPATH.'/assets/images/'.$cek->di_cert);                
            $this->email->from('klinik.hkiikm@gmail.com', 'Layanan KI');
            $this->email->to($cek->di_email);
            $this->email->set_header('Content-Type', 'text/html');
            $this->email->subject('Sertifikat Desain Industri Anda Telah Terbit');
            $message = '
          <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldnt be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesnt work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size youd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}


    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        .primary{
    background: #4154f1;
}
.bg_white{
    background: #ffffff;
}
.bg_light{
    background: #f7fafa;
}
.bg_black{
    background: #000000;
}
.bg_dark{
    background: rgba(0,0,0,.8);
}
.email-section{
    padding:2.5em;
}

/*BUTTON*/
.btn{
    padding: 10px 15px;
    display: inline-block;
}
.btn.btn-primary{
    border-radius: 5px;
    background: #4154f1;
    color: #ffffff;
}
.btn.btn-white{
    border-radius: 5px;
    background: #ffffff;
    color: #000000;
}
.btn.btn-white-outline{
    border-radius: 5px;
    background: transparent;
    border: 1px solid #fff;
    color: #fff;
}
.btn.btn-black-outline{
    border-radius: 0px;
    background: transparent;
    border: 2px solid #000;
    color: #000;
    font-weight: 700;
}
.btn-custom{
    color: rgba(0,0,0,.3);
    text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
    font-family: "Poppins", sans-serif;
    color: #000000;
    margin-top: 0;
    font-weight: 400;
}

body{
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-size: 15px;
    line-height: 1.8;
    color: rgba(0,0,0,.4);
}

a{
    color: #4154f1;
}

table{
}
/*LOGO*/

.logo h1{
    margin: 0;
}
.logo h1 a{
    color: #4154f1;
    font-size: 24px;
    font-weight: 700;
    font-family: "Poppins", sans-serif;
}

/*HERO*/
.hero{
    position: relative;
    z-index: 0;
}

.hero .text{
    color: rgba(0,0,0,.3);
}
.hero .text h2{
    color: #000;
    font-size: 34px;
    margin-bottom: 0;
    font-weight: 200;
    line-height: 1.4;
}
.hero .text h3{
    font-size: 24px;
    font-weight: 300;
}
.hero .text h2 span{
    font-weight: 600;
    color: #000;
}

.text-author{
    bordeR: 1px solid rgba(0,0,0,.05);
    max-width: 50%;
    margin: 0 auto;
    padding: 2em;
}
.text-author img{
    border-radius: 50%;
    padding-bottom: 20px;
}
.text-author h3{
    margin-bottom: 0;
}
ul.social{
    padding: 0;
}
ul.social li{
    display: inline-block;
    margin-right: 10px;
}

/*FOOTER*/

.footer{
    border-top: 1px solid rgba(0,0,0,.05);
    color: rgba(0,0,0,.5);
}
.footer .heading{
    color: #000;
    font-size: 20px;
}
.footer ul{
    margin: 0;
    padding: 0;
}
.footer ul li{
    list-style: none;
    margin-bottom: 10px;
}
.footer ul li a{
    color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
    <center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
        <!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="logo" style="text-align: left;">
                        <h1 style="font-family: verdana;"><a href="#">Sertifikat Desain Industri Anda Telah Terbit</a></h1>
                      </td>
                </tr>
            </table>
          </td>
          </tr><!-- end tr -->
                <tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 0 2.5em; text-align: justify; padding-bottom: 3em;">
                        <div class="text">
                    <h4 style="font-family: verdana;">Yth. Bapak/Ibu,</h4>
                            <h4 style="font-family: verdana;">Selamat sertifikat Desain Industri dengan judul cipta : <b>' . $cek->di_juduldes . '</b> telah terbit. Silahkan klik tombol berikut untuk mengunduh sertifikat.</h4>
                            <br><a class="btn btn-primary" href="' . base_url() . 'assets/images/' . $cek->di_cert . '">Sertifikat Desain Industri</a>
                        </div>
                    </td>
                </tr>
                
            </table>
          </td>
          </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
              <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <h3 class="logo">Klinik Kekayaan Intelektual</h3>
                        <p style="text-align: justify;font-size: 12px;">
Direktorat Jenderal Industri Kecil, Menengah dan Aneka Kementerian Perindustrian <br>
Alamat: Jl. Jend. Gatot Subroto Kav. 52-53 Lantai 15, Jakarta Selatan 12950<br>
Contact Person dan Whatsapp : 082312901430<br>
No. Tlp : 021 - 5255509 ext. 2168<br>
Email: klinik.hkiikm@gmail.com<br>
Website: <a href="https://klinikki.kemenperin.go.id">klinikki.kemenperin.go.id</a></p>
                      </td>
                    </tr>
                  </table>
                </td>
              
        </tr><!-- end: tr -->
        
      </table>

    </div>
  </center>
</body>
</html>';
            $this->email->message($message);
            if ($this->email->send()) {
            echo $this->session->set_flashdata('msg','sendmail');
        redirect('https://wa.me/'.$cek->di_nohp.'?text=Yth. Bapak/Ibu, Selamat sertifikat Desain Industri anda telah terbit. Silahkan Cek Email anda atau kunjungi website https://klinikki.kemenperin.go.id dan login menggunakan akun anda untuk mengunduh sertifikat.');
            redirect(base_url()."admin/desainind/viewcert/".$kodex);
            } else {
                echo $this->email->print_debugger();
                die;
            }
            redirect(base_url()."admin/desainind/view/".$kodex);
            }  

    }

function viewcert(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_di_cert',$x);
         }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='5'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_cert',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='5'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_cert',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view-proses');
            redirect('admin/desainind');
        }
    }

    function viewdicert_cancel(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vdi']=$this->m_desainind->get_detaildi_by_kode($kode);
            $this->load->view('admin/v_di_cert_cancel',$x);
         }elseif($this->session->userdata('akses')=='2' && $cek->di_statusid =='6'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_cert_cancel',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->di_statusid =='6'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vdi']=$this->m_desainind->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_di_cert_cancel',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view-proses');
            redirect('admin/desainind');
        }
    }

    function ditolak(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM desainind WHERE di_id = '".$kodex."' ")->row();
            
        if ($cek->di_statusid == 6) {
            echo $this->session->set_flashdata('msg','selesai');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
    

        if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','hak-akses');
            redirect(base_url()."admin/desainind/view/".$kodex);
            }
                  
            if ($cek->di_statusid == 4) {
            $update['di_statusid']  =  6;
            echo $this->session->set_flashdata('msg','sendmail');
            $this->main_model->update_data('desainind', $update, 'di_id', $kodex);
             $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port'   => 465,
                'smtp_user' => 'klinik.hkiikm@gmail.com',  // Email gmail
                'smtp_pass'   => 'Sesdjikm4',  // Password gmail
                'smtp_crypto' => 'ssl',
                'mailtype'  => 'html'
                );       
             
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
                
            $this->email->from('klinik.hkiikm@gmail.com', 'Layanan KI');
            $this->email->to($cek->di_email);
            $this->email->set_header('Content-Type', 'text/html');
            $this->email->subject('Penolakan atas Permohonan Desain Industri');
            $message = '
          <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldnt be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesnt work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size youd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}


    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

        .primary{
    background: #4154f1;
}
.bg_white{
    background: #ffffff;
}
.bg_light{
    background: #f7fafa;
}
.bg_black{
    background: #000000;
}
.bg_dark{
    background: rgba(0,0,0,.8);
}
.email-section{
    padding:2.5em;
}

/*BUTTON*/
.btn{
    padding: 10px 15px;
    display: inline-block;
}
.btn.btn-primary{
    border-radius: 5px;
    background: #4154f1;
    color: #ffffff;
}
.btn.btn-white{
    border-radius: 5px;
    background: #ffffff;
    color: #000000;
}
.btn.btn-white-outline{
    border-radius: 5px;
    background: transparent;
    border: 1px solid #fff;
    color: #fff;
}
.btn.btn-black-outline{
    border-radius: 0px;
    background: transparent;
    border: 2px solid #000;
    color: #000;
    font-weight: 700;
}
.btn-custom{
    color: rgba(0,0,0,.3);
    text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
    font-family: "Poppins", sans-serif;
    color: #000000;
    margin-top: 0;
    font-weight: 400;
}

body{
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-size: 15px;
    line-height: 1.8;
    color: rgba(0,0,0,.4);
}

a{
    color: #4154f1;
}

table{
}
/*LOGO*/

.logo h1{
    margin: 0;
}
.logo h1 a{
    color: #4154f1;
    font-size: 24px;
    font-weight: 700;
    font-family: "Poppins", sans-serif;
}

/*HERO*/
.hero{
    position: relative;
    z-index: 0;
}

.hero .text{
    color: rgba(0,0,0,.3);
}
.hero .text h2{
    color: #000;
    font-size: 34px;
    margin-bottom: 0;
    font-weight: 200;
    line-height: 1.4;
}
.hero .text h3{
    font-size: 24px;
    font-weight: 300;
}
.hero .text h2 span{
    font-weight: 600;
    color: #000;
}

.text-author{
    bordeR: 1px solid rgba(0,0,0,.05);
    max-width: 50%;
    margin: 0 auto;
    padding: 2em;
}
.text-author img{
    border-radius: 50%;
    padding-bottom: 20px;
}
.text-author h3{
    margin-bottom: 0;
}
ul.social{
    padding: 0;
}
ul.social li{
    display: inline-block;
    margin-right: 10px;
}

/*FOOTER*/

.footer{
    border-top: 1px solid rgba(0,0,0,.05);
    color: rgba(0,0,0,.5);
}
.footer .heading{
    color: #000;
    font-size: 20px;
}
.footer ul{
    margin: 0;
    padding: 0;
}
.footer ul li{
    list-style: none;
    margin-bottom: 10px;
}
.footer ul li a{
    color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
    <center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
        <!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="logo" style="text-align: left;">
                        <h1 style="font-family: verdana;"><a href="#">Penolakan atas Permohonan Desain Industri</a></h1>
                      </td>
                </tr>
            </table>
          </td>
          </tr><!-- end tr -->
                <tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 0 2.5em; text-align: justify; padding-bottom: 3em;">
                        <div class="text">
                    <h4 style="font-family: verdana;">Yth. Bapak/Ibu,</h4>
                            <h4 style="font-family: verdana;">Dapat kami sampaikan bahwa permohonan Desain Industri dengan judul cipta : <b>' . $cek->di_juduldes . '</b> ditolak. Silahkan klik tombol berikut untuk mengunduh surat penolakan.</h4>
                            <a class="btn btn-primary" href="' . base_url() . 'assets/images/' . $cek->di_cert_cancel . '">Surat Penolakan</a> <br><br><h4>Penjelasan mengenai alasan penolakan secara detail, silahkan hubungi kami pada 021 - 5255509 ext. 2168 atau melalui aplikasi whatsapp pada 082312901430.</h4>
                        </div>
                    </td>
                </tr>
                
            </table>
          </td>
          </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
              <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <h3 class="logo">Klinik Kekayaan Intelektual</h3>
                        <p style="text-align: justify;font-size: 12px;">
Direktorat Jenderal Industri Kecil, Menengah dan Aneka Kementerian Perindustrian <br>
Alamat: Jl. Jend. Gatot Subroto Kav. 52-53 Lantai 15, Jakarta Selatan 12950<br>
Contact Person dan Whatsapp : 082312901430<br>
No. Tlp : 021 - 5255509 ext. 2168<br>
Email: klinik.hkiikm@gmail.com<br>
Website: <a href="https://klinikki.kemenperin.go.id">klinikki.kemenperin.go.id</a></p>
                      </td>
                    </tr>
                  </table>
                </td>
              
        </tr><!-- end: tr -->
        
      </table>

    </div>
  </center>
</body>
</html>';
            $this->email->message($message);
            if ($this->email->send()) {
            echo $this->session->set_flashdata('msg','sendmail');
        redirect('https://wa.me/'.$cek->di_nohp.'?text=Yth. Bapak/Ibu, Dapat kami sampaikan bahwa permohonan Desain Industri yang anda ajukan ditolak. Surat penolakan telah dikirim melalui email dan untuk Penjelasan mengenai alasan penolakan secara detail, silahkan hubungi kami pada 021 - 5255509 ext. 2168 atau melalui aplikasi whatsapp pada 082312901430.');
            redirect(base_url()."admin/desainind/viewcert/".$kodex);
            } else {
                echo $this->email->print_debugger();
                die;
            }
            redirect(base_url()."admin/desainind/view/".$kodex);
            }  

    }

    function update_di_cert_pop_ok(){
        
        

        if($this->input->post('sbm') == "ditolak") { 
            $id=$this->input->post('kode');

            if ($_FILES["di_cert_cancel"]["name"]) {
                $data['di_cert_cancel'] = $this->upload_file_pdf("di_cert_cancel", "di_cert_cancel");
            }

            
            $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);
            
            echo $this->session->set_flashdata('msg','success');
            redirect(base_url()."admin/desainind/view/".$id);
        } else {
            $id=$this->input->post('kode');

            if ($_FILES["di_cert"]["name"]) {
                $data['di_cert'] = $this->upload_file_pdf("di_cert", "di_cert");
            }

            
            $query = $this->main_model->update_data('desainind', $data, 'di_id', $id);
            
            echo $this->session->set_flashdata('msg','success');
            redirect(base_url()."admin/desainind/view/".$id);
            }        
    }



    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->m_merek->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->kelas;
                echo json_encode($arr_result);
            }
        }
    }

}