<?php
class Paten extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_pengguna','m_pengguna');
        $this->load->model('M_paten','m_paten');
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
			$x['paten']=$this->m_paten->get_paten_status();
			$this->load->view('admin/v_paten',$x);
		}elseif($this->session->userdata('akses')=='2'){
            $kode=$this->session->userdata('idadmin');
            $x['paten']=$this->m_paten->get_patensession_by_kode($kode);
            $this->load->view('admin/v_paten',$x);
        }elseif($this->session->userdata('akses')=='3'){
            $kode=$this->session->userdata('idadmin');
            $x['paten']=$this->m_paten->get_patensession_by_kode($kode);
            $this->load->view('admin/v_paten',$x);
        }else{
			redirect('admin/pengguna');
        }

	}

    function add_new(){
        $id = $this->session->userdata('idadmin');
        
        $cek = $this->db->query("SELECT COUNT(a.pengguna_id) as koun 
            FROM paten a INNER JOIN pengguna b ON a.pengguna_id = b.pengguna_id 
            WHERE a.pengguna_id = $id ")->row();
                 
        if($this->session->userdata('akses')== 3 && $cek->koun < 1) { 
            $x['sta']=$this->m_status->get_all_status();
           // $x['vpt']=$this->m_paten->get_paten();
            $this->load->view('admin/v_add_paten',$x);        
        }elseif($this->session->userdata('akses')== 2 && $cek->koun < 10){
            $x['sta']=$this->m_status->get_all_status();
            //$x['vpt']=$this->m_paten->get_paten();
            $this->load->view('admin/v_add_paten',$x);        
        }elseif($this->session->userdata('akses')=='1'){
            $x['sta']=$this->m_status->get_all_status();
            //$x['vpt']=$this->m_paten->get_paten();
            $this->load->view('admin/v_add_paten',$x);
        }else{
            echo $this->session->set_flashdata('msg','bates-input');
            redirect('admin/paten');
        }
 
    }

    function view(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM paten WHERE pt_id = '".$kodex."' ")->row();
        if ($cek->persentase <= 99) {
            $update['pt_statusid']  =  1;
            $this->main_model->update_data('paten', $update, 'pt_id', $kodex);
            }

            if ($cek->persentase == 100) {
            $update['pt_statusid']  =  2;
            $this->main_model->update_data('paten', $update, 'pt_id', $kodex);
            }

            if ($cek->persentase == 100 AND $cek->pt_no_permohonan != "") {
            $update['pt_statusid']  =  3;
            $this->main_model->update_data('paten', $update, 'pt_id', $kodex);
            }       

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vpt']=$this->m_paten->get_detailpt_by_kode($kode);
            $this->load->view('admin/v_view_paten',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_view_paten',$x);
            $this->output->delete_cache('admin/v_view_paten');
        }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_view_paten',$x);
            $this->output->delete_cache('admin/v_view_paten');
        }else{
            redirect('admin/paten');
        }

    }

    function cetakpdf(){

       
    if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['jta']=$this->m_paten->get_all_jta();
            $x['vpt']=$this->m_paten->get_detaildipdfx_by_kode($kode);
            $this->load->view('admin/v_dipdf',$x);
        }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['jta']=$this->m_paten->get_all_jta();
            $x['vpt']=$this->m_paten->get_disessionpdfx_by_kode($kode,$id);
            $this->load->view('admin/v_dipdf',$x);
        }else{
            redirect('admin/paten');
    
    }$this->mypdf->generate('admin/v_dipdf', $x, 'paten-Form', 'A4', 'portrait');
  
    }

    function viewdi1(){
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vpt']=$this->m_paten->get_detailpt_by_kode($kode);
            $this->load->view('admin/v_pt_step1',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step1',$x);
         }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step1',$x);
        }else{
            redirect('admin/paten');
        }
    }

    function viewdi2(){
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vpt']=$this->m_paten->get_detailpt_by_kode($kode);
            $this->load->view('admin/v_pt_step2',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step2',$x);
        }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step2',$x);
        }else{
            redirect('admin/paten');
        }
    }

    function viewdi3(){
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vpt']=$this->m_paten->get_detailpt_by_kode($kode);
            $this->load->view('admin/v_pt_step3',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step3',$x);
         }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step3',$x);
        }else{
            redirect('admin/paten');
        }
    }

    function viewdi4(){
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vpt']=$this->m_paten->get_detailpt_by_kode($kode);
            $this->load->view('admin/v_pt_step4',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step4',$x);
        }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step4',$x);
        }else{
            redirect('admin/paten');
        }
    }

     function viewdi5(){
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);
            $x['jta']=$this->m_paten->get_all_jta();    
            $x['vpt']=$this->m_paten->get_detailpt_by_kode($kode);
            $this->load->view('admin/v_pt_step5',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['jta']=$this->m_paten->get_all_jta();
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step5',$x);
        }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['jta']=$this->m_paten->get_all_jta();
            $x['vpt']=$this->m_paten->get_disession2_by_kode($kode,$id);
            $this->load->view('admin/v_pt_step5',$x);
        }else{
            redirect('admin/paten');
        }
    }

    function edit(){

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vpt']=$this->m_paten->get_detailpt_by_kode($kode);
            $x['sta']=$this->m_status->get_status_kode_paten($kode);
            $this->load->view('admin/v_edit_pt',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_ptsession2_by_kode($kode,$id);
            $x['sta']=$this->m_status->get_status_kode_paten($kode);
            $this->load->view('admin/v_edit_pt',$x);
         }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vpt']=$this->m_paten->get_ptsession2_by_kode($kode,$id);
            $x['sta']=$this->m_status->get_status_kode_paten($kode);
            $this->load->view('admin/v_edit_pt',$x);
        }else{
            redirect('admin/paten');
        }
        
    }

    function simpan_paten(){
        $pt_email = $this->input->post('email');
        $sql = $this->db->query("SELECT pt_email FROM paten where pt_email='$pt_email'");
        $pt_email = $sql->num_rows();
        if ($pt_email > 0) {
        echo $this->session->set_flashdata('msg','sudahada');
        redirect(base_url()."admin/paten/add_new");
        }

       

        $pt_nama=strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        //$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['file_name']     = $pt_nama.'-penggunapt';

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



                $pt_photo=$gbr['file_name'];
                $pt_nama=strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
                $pt_perusahaan=strip_tags(htmlspecialchars($this->input->post('ikm',TRUE),ENT_QUOTES));
                $pt_email=strip_tags(htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
                $pt_nohp=strip_tags(htmlspecialchars($this->input->post('no_telp',TRUE),ENT_QUOTES));
                $pt_alamat=strip_tags(htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES));
                $id_prov_perusahaan=strip_tags(htmlspecialchars($this->input->post('id_prov_perusahaan',TRUE),ENT_QUOTES));
                $id_kab_perusahaan=strip_tags(htmlspecialchars($this->input->post('id_kab_perusahaan',TRUE),ENT_QUOTES));
                $pt_kodepos=strip_tags(htmlspecialchars($this->input->post('kodepos',TRUE),ENT_QUOTES));
                // $time = time();
                $ptta = date('Y');
                $ptbln = date('m');
                // $pt_no_permohonan = strip_tags(htmlspecialchars($this->input->post('pt_no_permohonan',TRUE),ENT_QUOTES));
                $pt_statusid=2;
                $data=$this->m_status->get_status_byid($pt_statusid);
                $q=$data->row_array();
                $status_nama=$q['status_nama'];
                $pengguna_id=$this->session->userdata('idadmin');
              
                
                $this->m_paten->simpan_paten($pengguna_id,$pt_nama,$pt_perusahaan,$pt_email,$pt_nohp,$ptta,$ptbln,$pt_statusid,$status_nama,$pt_alamat,$id_prov_perusahaan,$id_kab_perusahaan,$pt_kodepos,$pt_photo);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/paten');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/paten');
            }
                     
        }else{
            redirect('admin/paten');
        }
    }

    function cek_email()
    {
        $email = $this->input->post('email');
        $query = $this->db->query("SELECT * FROM paten WHERE pt_email='$email'")->num_rows();

        if ($query > 0) {
            echo '<label class="text-danger">Email telah terdaftar.</label>';
        } else {
            return false;
        }
    }    

    function update_pt(){
        
        $pt_email = $this->input->post('email');
        $sql = $this->db->query("SELECT pt_email FROM paten where pt_email='$pt_email'");
        $pt_email = $sql->num_rows();
        if ($pt_email > 0) {
        echo  '<script language="javascript">
                      alert ("Email Sudah");
                      window.location="add_new";
                      </script>';
                      exit();
        }

        $pt_nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name']     = $pt_nama.'-gambarlabel';
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

                $pt_photo=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $pt_nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
                $pt_perusahaan=strip_tags(htmlspecialchars($this->input->post('xikm',TRUE),ENT_QUOTES));
                $pt_email=strip_tags(htmlspecialchars($this->input->post('xemail',TRUE),ENT_QUOTES));
                $pt_nohp=strip_tags(htmlspecialchars($this->input->post('xnohp',TRUE),ENT_QUOTES));
                $pt_alamat=strip_tags(htmlspecialchars($this->input->post('xalamat',TRUE),ENT_QUOTES));
                $pt_idprovinsi=strip_tags(htmlspecialchars($this->input->post('id_prov_perusahaan',TRUE),ENT_QUOTES));
                $pt_idkabkota=strip_tags(htmlspecialchars($this->input->post('id_kab_perusahaan',TRUE),ENT_QUOTES));
                $pt_kodepos=strip_tags(htmlspecialchars($this->input->post('pt_kodepos',TRUE),ENT_QUOTES));
                //$pt_ket=strip_tags(htmlspecialchars($this->input->post('pt_ket',TRUE),ENT_QUOTES));
                $status_id=strip_tags($this->input->post('pt_statusid'));
                $data=$this->m_status->get_status_byid($status_id);
                $q=$data->row_array();
                $pt_status=$q['status_nama'];
                
                            
                $this->m_paten->update_pt($kode,$pt_nama,$pt_perusahaan,$pt_email,$pt_nohp,$status_id,$status_nama,$pt_alamat,$pt_idprovinsi,$pt_idkabkota,$pt_kodepos,$pt_photo);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/paten');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/paten');
            }
                     
        }else{
            $kode=$this->input->post('kode');
                $pt_nama=strip_tags(htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES));
                $pt_perusahaan=strip_tags(htmlspecialchars($this->input->post('xikm',TRUE),ENT_QUOTES));
                $pt_email=strip_tags(htmlspecialchars($this->input->post('xemail',TRUE),ENT_QUOTES));
                $pt_nohp=strip_tags(htmlspecialchars($this->input->post('xnohp',TRUE),ENT_QUOTES));
                $pt_alamat=strip_tags(htmlspecialchars($this->input->post('xalamat',TRUE),ENT_QUOTES));
                $pt_idprovinsi=strip_tags(htmlspecialchars($this->input->post('id_prov_perusahaan',TRUE),ENT_QUOTES));
                $pt_idkabkota=strip_tags(htmlspecialchars($this->input->post('id_kab_perusahaan',TRUE),ENT_QUOTES));
                $pt_kodepos=strip_tags(htmlspecialchars($this->input->post('pt_kodepos',TRUE),ENT_QUOTES));
                $status_id=strip_tags($this->input->post('pt_statusid'));
                $data=$this->m_status->get_status_byid($status_id);
                $q=$data->row_array();
                $pt_status=$q['status_nama'];
                
                            
            $this->m_paten->update_pt_no_img($kode,$pt_nama,$pt_perusahaan,$pt_email,$pt_nohp,$status_id,$pt_status,$pt_alamat,$pt_idprovinsi,$pt_idkabkota,$pt_kodepos);
            echo $this->session->set_flashdata('msg','success');
            redirect('admin/paten');
        }
    }

    function update_di1(){
        $id=$this->input->post('kode');

        
        $data['pt_tgl_pengajuan']       = $this->input->post('pt_tgl_pengajuan');
        $data['pt_tgl_penerimaan'] = $this->input->post('pt_tgl_penerimaan');
        $data['pt_no_permohonan']     = $this->input->post('pt_no_permohonan');

        $query = $this->main_model->update_data('paten', $data, 'pt_id', $id);
        $this->persentase();
        //echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/paten/viewdi2/".$id);
        //redirect('admin/merek/viewmerek2');
        
    }

    function update_di2(){
        $id=$this->input->post('kode');

        
        $data['pt_nama']       = $this->input->post('pt_nama');
        $data['pt_perusahaan']       = $this->input->post('pt_perusahaan');
        //$data['pt_warganegara'] = $this->input->post('pt_warganegara');
        $data['pt_alamat']     = $this->input->post('pt_alamat');
        $data['pt_idprovinsi']       = $this->input->post('id_prov_perusahaan');
        $data['pt_idkabkota']        = $this->input->post('id_kab_perusahaan');
        $data['pt_kodepos']     = $this->input->post('pt_kodepos');
        //$data['pt_npwp']     = $this->input->post('pt_npwp');
        $data['pt_alamatsurat']     = 'Klinik HKI Kementerian Perindustrian Jalan Jenderal Gatot Subroto Kav. 52-53 Lt. 15 (Gedung Kementerian Perindustrian)';
        $data['pt_provsurat']     = 'DKI Jakarta';
        $data['pt_kabkotasurat']     = 'Jakarta Selatan';
        $data['pt_kodepossurat']     = '12950';
        $data['pt_negarasurat']     = 'Indonesia';
        
        $query = $this->main_model->update_data('paten', $data, 'pt_id', $id);
        $this->persentase();
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/paten/viewdi2/".$id);
        
    }

    function update_di3(){
        $id=$this->input->post('kode');
        if ($_FILES["file_filektp"]["name"]) {
            $data['pt_filektp'] = $this->upload_file_pdf("file_filektp", "pt_filektp");
        }

        if ($_FILES["file_filebkp"]["name"]) {
        $data['pt_filebkp'] = $this->upload_file_pdf("file_filebkp", "pt_filebkp");
        }
        
                
        $data['pt_juduldes'] = $this->input->post('pt_juduldes');
        $data['pt_namapendesain1']     = $this->input->post('pt_namapendesain1');
        $data['pt_negarapendesain1']       = $this->input->post('pt_negarapendesain1');
        $data['pt_negarapendaftar']        = $this->input->post('pt_negarapendaftar');
        $data['pt_kegunaan']     = $this->input->post('pt_kegunaan');
        $data['pt_klaim']     = $this->input->post('pt_klaim');

        
        $query = $this->main_model->update_data('paten', $data, 'pt_id', $id);
        $this->persentase();
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/paten/viewdi3/".$id);
        
    }

    function update_di4(){
        $id=$this->input->post('kode');
       
        $data['pt_id'] = $this->input->post('kode');
        if ($_FILES["file_gbrdpn"]["name"]) {
            $data['pt_gbrdpn'] = $this->upload_file_pdf("file_gbrdpn", "pt_gbrdpn");
        }

        if ($_FILES["file_gbrblk"]["name"]) {
        $data['pt_gbrblk'] = $this->upload_file_pdf("file_gbrblk", "pt_gbrblk");
        }

        if ($_FILES["file_gbrskanan"]["name"]) {
        $data['pt_gbrskanan'] = $this->upload_file_pdf("file_gbrskanan", "pt_gbrskanan");
        }

        if ($_FILES["file_gbrskiri"]["name"]) {
        $data['pt_gbrskiri'] = $this->upload_file_pdf("file_gbrskiri", "pt_gbrskiri");
        }

        if ($_FILES["file_gbratas"]["name"]) {
        $data['pt_gbratas'] = $this->upload_file_pdf("file_gbratas", "pt_gbratas");
        }

        if ($_FILES["file_gbrbawah"]["name"]) {
        $data['pt_gbrbawah'] = $this->upload_file_pdf("file_gbrbawah", "pt_gbrbawah");
        }

        if ($_FILES["file_gbrperspektif"]["name"]) {
    $data['pt_gbrperspektif'] = $this->upload_file_pdf("file_gbrperspektif", "pt_gbrperspektif");
        }
        
        $query = $this->main_model->update_data('paten', $data, 'pt_id', $id);
        $this->persentase();
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/paten/viewdi4/".$id);
        
    }

    function update_di5(){
        $id=$this->input->post('kode');
        if ($_FILES["file_ktp"]["name"]) {
            $data['pt_ktp'] = $this->upload_file_pdf("file_ktp", "pt_ktp");
        }
        if ($_FILES["file_spernyataan"]["name"]) {
        $data['pt_spernyataan'] = $this->upload_file_pdf("file_spernyataan", "pt_spernyataan");
        }
        if ($_FILES["file_contodiiptaan"]["name"]) {
        $data['pt_contodiiptaan'] = $this->upload_file_pdf("file_contodiiptaan", "pt_contodiiptaan");
        }
        
        $data['pt_jenis']       = $this->input->post('pt_jenis');
        $data['pt_judul']       = $this->input->post('pt_judul');
        $data['pt_tgldi'] = $this->input->post('pt_tgldi');
        $data['pt_tempat']     = $this->input->post('pt_tempat');
        $data['pt_uraian']       = $this->input->post('pt_uraian');
        
        
        
        $query = $this->main_model->update_data('paten', $data, 'pt_id', $id);
        $this->persentase();

        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/paten/viewdi5/".$id);
        
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


    function hapus_paten(){
        $kode=$this->input->post('kode2');
        $this->m_paten->hapus_paten($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/paten');
    }

  

    function export(){

        if($this->session->userdata('akses')!='1'){
            redirect('admin/paten');
        }

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Layanan KI')
                     ->setLastModifiedBy('Layanan KI')
                     ->setTitle("Data Layanan Paten")
                     ->setSubject("Paten Subject")
                     ->setDescription("Laporan Data Layanan Paten")
                     ->setKeywords("Paten");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR USULAN LAYANAN PATEN"); // Set kolom A1 dengan tulisan ""
        $excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet() // Set warna header row
        ->getStyle('A3:J3')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()  
        ->setRGB('90F06D');
        
        $excel->getActiveSheet()
        ->getStyle('A1:A1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->getActiveSheet()
        ->getStyle('D4:J1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $excel->getActiveSheet()->getStyle('B4:C1000')->getAlignment()->setIndent(1);


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
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA LENGKAP"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA IKM"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "KABUPATEN/KOTA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "PROVINSI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "NOMOR AGENDA PENDAFTARAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "EMAIL"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "NO. TELP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "STATUS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
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
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $paten = $this->m_paten->get_excel_paten_detail_new();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($paten as $x){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $x->pt_nama);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $x->pt_perusahaan);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $x->namakabkota);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $x->namaprov);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $x->pt_no_permohonan);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $x->pt_email);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $x->pt_nohp);
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $x->status);
          $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $x->instansi);
          
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
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom E
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
        header('Content-Disposition: attachment; filename="Layananpaten.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }

    public function persentase()
    {   
        $id = $id=$this->input->post('kode');
        $cek = $this->db->query("SELECT * FROM paten WHERE pt_id = '".$id."' ")->row();

          $jum = 0;
          if ($cek->pt_nama != "") { $jum = $jum+5; }
          if ($cek->pt_perusahaan != "") { $jum = $jum+5; }
          if ($cek->pt_alamat != "") { $jum = $jum+5; }
          // if ($cek->pt_warganegara != "") { $jum = $jum+5; }
          // if ($cek->pt_npwp != "") { $jum = $jum+5; }
                    
          if ($cek->pt_filektp != "") { $jum = $jum+5; }
          if ($cek->pt_juduldes != "") { $jum = $jum+10; }
          if ($cek->pt_namapendesain1 != "") { $jum = $jum+10; }
          if ($cek->pt_kegunaan != "") { $jum = $jum+10; }
          if ($cek->pt_filebkp != "") { $jum = $jum+5; }
          if ($cek->pt_klaim != "") { $jum = $jum+10; }
          //if ($cek->pt_negarapendesain1 != "") { $jum = $jum+5; }
          //if ($cek->pt_negarapendaftar != "") { $jum = $jum+5; }
          if ($cek->pt_gbrdpn != "") { $jum = $jum+5; }
          if ($cek->pt_gbrblk != "") { $jum = $jum+5; }
          if ($cek->pt_gbrskanan != "") { $jum = $jum+5; }
          if ($cek->pt_gbrskiri != "") { $jum = $jum+5; }
          if ($cek->pt_gbrperspektif != "") { $jum = $jum+5; }
          if ($cek->pt_gbratas != "") { $jum = $jum+5; }
          if ($cek->pt_gbrbawah != "") { $jum = $jum+5; }
         

          $update['persentase']  =  $jum;
          $this->main_model->update_data('paten', $update, 'pt_id', $id);

                              
    }

     private function upload_file_pdf($filename, $name)
    {
        $id = $this->input->post('kode');
        $get_user = $this->db->query("SELECT * FROM paten WHERE pt_id='$id'")->row();

        if ($name == "pt_filektp") {
            $get = $get_user->pt_filektp;
        } elseif ($name == "pt_filebkp") {
            $get = $get_user->pt_filebkp;
        } elseif ($name == "pt_gbrdpn") {
            $get = $get_user->pt_gbrdpn;
        } elseif ($name == "pt_gbrblk") {
            $get = $get_user->pt_gbrblk;
        } elseif ($name == "pt_gbrskanan") {
            $get = $get_user->pt_gbrskanan;
        } elseif ($name == "pt_gbrskiri") {
            $get = $get_user->pt_gbrskiri;
        } elseif ($name == "pt_gbratas") {
            $get = $get_user->pt_gbratas;
        } elseif ($name == "pt_gbrbawah") {
            $get = $get_user->pt_gbrbawah;
        } else {
            $get = $get_user->pt_gbrperspektif;
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