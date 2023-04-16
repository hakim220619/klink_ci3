<?php
class Merek extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_pengguna','m_pengguna');
        $this->load->model('M_merek','m_merek');
        $this->load->model('Main_model','main_model');
        $this->load->model('M_status','m_status');
        $this->load->library('upload');
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
       date_default_timezone_set('Asia/Jakarta');

        if($this->session->userdata('akses')=='1'){
            $kode=$this->session->userdata('idadmin');
            $x['merek']=$this->m_merek->get_merek_status();
            $this->load->view('admin/v_merek',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $kode=$this->session->userdata('idadmin');
            $x['merek']=$this->m_merek->get_mereksession_by_kode($kode);
            $this->load->view('admin/v_merek',$x);
        }elseif($this->session->userdata('akses')=='3'){
            $kode=$this->session->userdata('idadmin');
            $x['merek']=$this->m_merek->get_mereksession_by_kode($kode);
            $this->load->view('admin/v_merek',$x); 
        }else{
            redirect('admin/pengguna');
        }

    }

    function add_new(){
        // $id = $this->session->userdata('idadmin');
        
        // $cek = $this->db->query("SELECT COUNT(a.pengguna_id) as koun, b.pengguna_limiter_merek as limiter
        //     FROM merek a INNER JOIN pengguna b ON a.pengguna_id = b.pengguna_id 
        //     WHERE a.pengguna_id = $id ")->row();
                 
        // if($this->session->userdata('akses')== 3 && $cek->koun < 1) { 
        //     $x['sta']=$this->m_status->get_all_status();
        //     $this->load->view('admin/v_add_merek',$x);        
        // }elseif($this->session->userdata('akses')== 2 && $cek->koun < 10 || $cek->koun < $cek->limiter){
        //     $x['sta']=$this->m_status->get_all_status();
        //     $this->load->view('admin/v_add_merek',$x);        
        // }elseif($this->session->userdata('akses')=='1'){
        //     $x['sta']=$this->m_status->get_all_status();
        //     $this->load->view('admin/v_add_merek',$x);
        // }else{
        //     echo $this->session->set_flashdata('msg','bates-input');
        //     redirect('admin/merek');
        // }
        
        $id = $this->session->userdata('idadmin');
        
        $cek = $this->db->query("SELECT COUNT(a.pengguna_id) as koun, b.pengguna_limiter_merek as limiter
            FROM merek a INNER JOIN pengguna b ON a.pengguna_id = b.pengguna_id 
            WHERE a.pengguna_id = $id ")->row();
                 
        if($this->session->userdata('akses')== 3 && $cek->koun < 1) { 
            //$x['sta']=$this->m_status->get_all_status();

            $this->load->view('admin/v_add_merek_new');        
            // $id = $this->session->userdata('idadmin');
            // $x['getid']=$this->m_merek->get_id_mereklast($id);
            // $this->load->view('admin/v_add_merek_new',$x);
        }elseif($this->session->userdata('akses')== 2 && $cek->koun < 10 || $cek->koun < $cek->limiter){
            //$x['sta']=$this->m_status->get_all_status();
            $this->load->view('admin/v_add_merek_new');        
        }elseif($this->session->userdata('akses')=='1'){
            //$x['sta']=$this->m_status->get_all_status();
            // $id = $this->session->userdata('idadmin');
            // $x['getid']=$this->m_merek->get_id_mereklast($id);
            // $this->load->view('admin/v_add_merek_new',$x);
            $this->load->view('admin/v_add_merek_new');
        }else{
            echo $this->session->set_flashdata('msg','bates-input');
            redirect('admin/merek/');
        }
    }

    function view(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
        if ($cek->persentase <= 99) {
            $update['merek_statusid']  =  1;
            $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
            }

            // if ($cek->persentase == 100) {
            // $update['merek_statusid']  =  1;
            // $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
            // }

            // if ($cek->persentase == 100 AND $cek->merek_no_permohonan != "") {
            // $update['merek_statusid']  =  3;
            // $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
            // }       

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            //$x['jta']=$this->m_merek->get_all_jta();
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_view_merek',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            //$x['jta']=$this->m_merek->get_all_jta();
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_view_merek',$x);
            $this->output->delete_cache('admin/v_view_merek');
        }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            //$x['jta']=$this->m_merek->get_all_jta();
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_view_merek',$x);
            $this->output->delete_cache('admin/v_view_merek');
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/merek');
        }

    }
    
    function usulan(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
        if ($cek->persentase <= 99) {
            $update['merek_statusid']  =  1;
            $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
            }

            
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            //$x['jta']=$this->m_merek->get_all_jta();
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_usulan_merek',$x);
        }elseif($this->session->userdata('akses')=='2'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            //$x['jta']=$this->m_merek->get_all_jta();
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_usulan_merek',$x);
            $this->output->delete_cache('admin/v_usulan_merek');
        }elseif($this->session->userdata('akses')=='3'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            //$x['jta']=$this->m_merek->get_all_jta();
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_usulan_merek',$x);
            $this->output->delete_cache('admin/v_usulan_merek');
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/merek');
        }

    }

    function viewmerek1(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_merek_step1',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step1',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step1',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/merek');
        }
    }

    function viewcert(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_merek_cert',$x);
         }elseif($this->session->userdata('akses')=='2' && $cek->merek_statusid =='5'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_cert',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->merek_statusid =='5'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_cert',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view-proses');
            redirect('admin/merek');
        }
    }

    function viewcert_cancel(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_merek_cert_cancel',$x);
         }elseif($this->session->userdata('akses')=='2' && $cek->merek_statusid =='6'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_cert_cancel',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->merek_statusid =='6'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_cert_cancel',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view-proses');
            redirect('admin/merek');
        }
    }

    function viewmerek2(){
         $kodex=$this->uri->segment(4);
         $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
        
        
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_merek_step2',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step2',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step2',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/merek');
        }
    }

    function viewmerek3(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_merek_step3',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step3',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step3',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/merek');
        }
    }

     function viewmerek4(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_merek_step4',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step4',$x);
         }elseif($this->session->userdata('akses')=='3' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step4',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/merek');
        }
    }

     function viewmerek5(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
        
        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vmerek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $this->load->view('admin/v_merek_step5',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step5',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['vmerek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $this->load->view('admin/v_merek_step5',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/merek', 'refresh');
        }
    }

    function edit(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['merek']=$this->m_merek->get_detailmerek_by_kode($kode);
            $x['sta']=$this->m_status->get_all_status();
            $this->load->view('admin/v_edit_merek',$x);
        }elseif($this->session->userdata('akses')=='2' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['merek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $x['sta']=$this->m_status->get_all_status();
            $this->load->view('admin/v_edit_merek',$x);
        }elseif($this->session->userdata('akses')=='3' && $cek->merek_statusid =='1'){
            $id=$this->session->userdata('idadmin');
            $kode=$this->uri->segment(4);
            $x['merek']=$this->m_merek->get_mereksession2_by_kode($kode,$id);
            $x['sta']=$this->m_status->get_all_status();
            $this->load->view('admin/v_edit_merek',$x);
        }else{
            echo $this->session->set_flashdata('msg','gagal-view');
            redirect('admin/merek');
        }
        
    }

     function export(){

        if($this->session->userdata('akses')!='1'){
            redirect('admin/merek');
        }

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Layanan HKI')
                     ->setLastModifiedBy('Layanan HKI')
                     ->setTitle("Data Layanan Merek")
                     ->setSubject("Merek Subject")
                     ->setDescription("Laporan Data Layanan Merek")
                     ->setKeywords("Merek");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR USULAN LAYANAN MEREK"); // Set kolom A1 dengan tulisan ""
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
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "NAMA MEREK"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "KELAS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "URAIAN KELAS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "STATUS"); // Set kolom E3 dengan tulisan "ALAMAT"
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
        $hakcipta = $this->m_merek->get_excel_hakcipta_detail_new();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($hakcipta as $x){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $x->merek_nama);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $x->merek_alamat);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $x->namakabkota);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $x->namaprov);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $x->merek_no_permohonan);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $x->merek_namamerek);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $x->merek_deskripsi);
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $x->merek_kelas);
          $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $x->status);
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
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Set width kolom E
        
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
        header('Content-Disposition: attachment; filename="LayananMerek.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }

    
    function simpan_merek(){
      $this->form_validation->set_rules('nama','Nama IKM', 'required|htmlspecialchars|trim|alpha_numeric_spaces');
      $this->form_validation->set_rules('merek_photo','Foto Produk', 'callback_validate_image');
      $this->form_validation->set_rules('no_telp','No Handphone','required|trim|htmlspecialchars|numeric|nohp_check',['nohp_check' => 'Gunakan input awalan 62 untuk 2 digit pertama']);
      $this->form_validation->set_rules('email','Email','required|htmlspecialchars|trim|valid_emails');
      
      if ( $this->form_validation->run() == false)
      {
      $data['judul'] = 'Registration';
        //$data['nama'] = $nama;
       // $this->load->view('templates/headerlogin', $data);
        $this->load->view('admin/v_add_merek_new', $data);
        //$this->load->view('templates/footerlogin');
      } else {
        // $nohp=$this->input->post('no_telp');
        // if(substr($nohp, 0, 2)!=62){
        //   echo $this->session->set_flashdata('msg','nohp');
        //   redirect(base_url()."admin/merek/add_new/");
        // }
	$nama=$this->input->post('nama');

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = FALSE; //nama yang terupload nantinya
	    $config['file_name']    = $nama.'-'.substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
        $config['max_size'] ='1000000';

        $this->upload->initialize($config);
        if(!empty($_FILES['merek_photo']['name']))
        {
            if ($this->upload->do_upload('merek_photo'))
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

                $merek_photo=$gbr['file_name'];
                $merek_nama=strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
                $merek_email=strip_tags(htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
                $merek_nohp=strip_tags(htmlspecialchars($this->input->post('no_telp',TRUE),ENT_QUOTES));
                //$status_id=strip_tags($this->input->post('xstatus'));
                $hcta = date('Y');
                $hcbln = date('m');
                $status_id=1;
                $data=$this->m_status->get_status_byid($status_id);
                $q=$data->row_array();
                $status_nama=$q['status_nama'];
                $pengguna_id=$this->session->userdata('idadmin');
                            
                $this->m_merek->simpan_merek($pengguna_id,$merek_nama,$merek_email,$merek_nohp,$hcta,$hcbln,$status_id,$status_nama,$merek_photo);
                //echo $this->session->set_flashdata('msg','success');
                //redirect('admin/merek');
                $kodex=$this->session->userdata('idadmin');
                $url = $this->db->query("SELECT uf.merek_id, uf.merek_statusid, uf.merek_nama
                FROM merek uf 
                LEFT JOIN pengguna us ON uf.pengguna_id = us.pengguna_id 
                WHERE uf.merek_statusid = 1 AND uf.pengguna_id='$kodex' ORDER BY uf.merek_id DESC LIMIT 1")->row();
                redirect('admin/merek/viewmerek2/'.$url->merek_id);
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/merek');
            }
                     
        }else{
            redirect('admin/merek');
        }
    }
    }

     public function image_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['merek_photo']['name']);
        if(isset($_FILES['merek_photo']['name']) && $_FILES['merek_photo']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('image_check', 'File hanya boleh jpeg/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('image_check', 'Plih file yang diunggah.');
            return false;
        }
    }

    public function validate_image() {
    $check = TRUE;
    if ((!isset($_FILES['merek_photo'])) || $_FILES['merek_photo']['size'] == 0) {
        $this->form_validation->set_message('validate_image', '{field} harus diisi.');
        $check = FALSE;
    }
    else if (isset($_FILES['merek_photo']) && $_FILES['merek_photo']['size'] != 0) {
        $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $extension = pathinfo($_FILES["merek_photo"]["name"], PATHINFO_EXTENSION);
        $detectedType = exif_imagetype($_FILES['merek_photo']['tmp_name']);
        $type = $_FILES['merek_photo']['type'];
        if (!in_array($detectedType, $allowedTypes)) {
            $this->form_validation->set_message('validate_image', 'file gambar salah hanya boleh jpg/jpeg/png.');
            $check = FALSE;
        }
        if(filesize($_FILES['merek_photo']['tmp_name']) > 1000000) {
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
    

    function update_merek(){
       
        $merek_nama=strip_tags(htmlspecialchars($this->input->post('merek_nama',TRUE),ENT_QUOTES));

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name']     = $merek_nama.'-gambarlabel';

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

                $merek_photo=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $merek_nama=strip_tags(htmlspecialchars($this->input->post('merek_nama',TRUE),ENT_QUOTES));
                $merek_email=strip_tags(htmlspecialchars($this->input->post('merek_email',TRUE),ENT_QUOTES));
                $merek_nohp=strip_tags(htmlspecialchars($this->input->post('merek_nohp',TRUE),ENT_QUOTES));
                $merek_ket=strip_tags(htmlspecialchars($this->input->post('merek_ket',TRUE),ENT_QUOTES));
                $merek_statusid=strip_tags($this->input->post('merek_statusid'));
                $data=$this->m_status->get_status_byid($merek_statusid);
                $q=$data->row_array();
                $merek_status=$q['status_nama'];
                
                            
                $this->m_merek->update_merek($kode,$merek_nama,$merek_email,$merek_nohp,$merek_statusid,$status_nama,$merek_ket,$merek_photo);
                echo $this->session->set_flashdata('msg','success');
                redirect('admin/merek');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/merek');
            }
                     
        }else{
            $kode=$this->input->post('kode');
                $merek_nama=strip_tags(htmlspecialchars($this->input->post('merek_nama',TRUE),ENT_QUOTES));
                $merek_email=strip_tags(htmlspecialchars($this->input->post('merek_email',TRUE),ENT_QUOTES));
                $merek_nohp=strip_tags(htmlspecialchars($this->input->post('merek_nohp',TRUE),ENT_QUOTES));
                $merek_ket=strip_tags(htmlspecialchars($this->input->post('merek_ket',TRUE),ENT_QUOTES));
                $merek_statusid=strip_tags($this->input->post('merek_statusid'));
                $data=$this->m_status->get_status_byid($merek_statusid);
                $q=$data->row_array();
                $merek_status=$q['status_nama'];
                
                            
            $this->m_merek->update_merek_no_img($kode,$merek_nama,$merek_email,$merek_nohp,$merek_statusid,$merek_status,$merek_ket);
            echo $this->session->set_flashdata('msg','success');
            redirect('admin/merek');
        }
    }

    function update_merek1(){
        $id=$this->input->post('kode');
        $nohp=$this->input->post('merek_nohp');
        if(substr($nohp, 0, 2)!=62){
          echo $this->session->set_flashdata('msg','nohp');
          redirect(base_url()."admin/merek/viewmerek1/".$id);
        } 

        $data['merek_tgl_penerimaan']       = $this->input->post('merek_tgl_penerimaan');
        //$data['merek_noref_pemohon'] = $this->input->post('norefpemohon');
        $data['merek_no_permohonan']     = $this->input->post('merek_no_permohonan');
        $data['merek_nama']     = $this->input->post('merek_nama');
        $data['merek_nohp']     = $this->input->post('merek_nohp');

        if ($_FILES["merek_photo"]["name"]) {
            $data['merek_photo'] = $this->upload_file_pdf("merek_photo", "merek_photo");
        }


        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);


        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/merek/viewmerek2/".$id);
        //redirect('admin/merek/viewmerek2');
       
    }

    function update_merek2(){
        $id=$this->input->post('kode');

        if ($_FILES["merek_fileketusaha"]["name"]) {
            $data['merek_fileketusaha'] = $this->upload_file_pdf("merek_fileketusaha", "merek_fileketusaha");
        }

        
        if ($_FILES["merek_srtpernyataan"]["name"]) {
            $data['merek_srtpernyataan'] = $this->upload_file_pdf("merek_srtpernyataan", "merek_srtpernyataan");
        }

        if ($_FILES["merek_ktp"]["name"]) {
            $data['merek_ktp'] = $this->upload_file_pdf("merek_ktp", "merek_ktp");
        }

        $data['merek_nama']       = $this->input->post('nama_pengusul');
        $data['merek_badan_usaha'] = $this->input->post('bentukbb');
        $data['merek_ketusaha'] = $this->input->post('typeusaha');
        $data['merek_perusahaan']       = $this->input->post('merek_perusahaan');
        //$data['merek_warganegara']     = $this->input->post('merek_warga');
        //$data['merek_negarapendiri']     = $this->input->post('merek_negaraPen');
        //$data['tempatlahir']     = $this->input->post('tempatlhr');
        //$data['tgllahir']     = $this->input->post('tgllahiraja');
        $data['merek_alamat']     = $this->input->post('merek_almt');
        $data['merek_idprovinsi']       = $this->input->post('id_prov_perusahaan');
        $data['merek_idkabkota']        = $this->input->post('id_kab_perusahaan');
        $data['merek_kodepos']     = $this->input->post('merek_kdps');
        //$data['merek_negara']     = $this->input->post('merek_negara');
        $data['merek_alamatsurat']     = 'Klinik HKI Kementerian Perindustrian Jalan Jenderal Gatot Subroto Kav. 52-53 Lt. 15 (Gedung Kementerian Perindustrian)';
        $data['merek_provsurat']     = 'DKI Jakarta';
        $data['merek_kabkotasurat']     = 'Jakarta Selatan';
        $data['merek_kodepossurat']     = '12950';
        $data['merek_negarasurat']     = 'Indonesia';
        
        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);
        $this->persentase();

        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/merek/viewmerek5/".$id);
        
    }

    function update_merek_cert(){
        $id=$this->input->post('kode');

        if ($_FILES["merek_cert"]["name"]) {
            $data['merek_cert'] = $this->upload_file_pdf("merek_cert", "merek_cert");
        }

        
        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);
        
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/merek/viewcert/".$id);
        
    }

    function update_merek_cert_cancel(){
        $id=$this->input->post('kode');

        if ($_FILES["merek_cert_cancel"]["name"]) {
            $data['merek_cert_cancel'] = $this->upload_file_pdf("merek_cert_cancel", "merek_cert_cancel");
        }

        
        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);
        
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/merek/viewcert_cancel/".$id);
        
    }

    function update_merek_cert_pop(){
        $id=$this->input->post('kode');

        if ($_FILES["merek_cert"]["name"]) {
            $data['merek_cert'] = $this->upload_file_pdf("merek_cert", "merek_cert");
        }

        
        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);
        
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/merek/view/".$id);
        
    }

    function update_merek_cert_pop_ok(){
        
        

        if($this->input->post('sbm') == "ditolak") { 
            $id=$this->input->post('kode');

            if ($_FILES["merek_cert_cancel"]["name"]) {
                $data['merek_cert_cancel'] = $this->upload_file_pdf("merek_cert_cancel", "merek_cert_cancel");
            }

            
            $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);
            
            echo $this->session->set_flashdata('msg','success');
            redirect(base_url()."admin/merek/view/".$id);
        } else {
            $id=$this->input->post('kode');

            if ($_FILES["merek_cert"]["name"]) {
                $data['merek_cert'] = $this->upload_file_pdf("merek_cert", "merek_cert");
            }

            
            $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);
            
            echo $this->session->set_flashdata('msg','success');
            redirect(base_url()."admin/merek/view/".$id);
            }        
    }

    function update_merek_cert_pop_cancel(){
        $id=$this->input->post('kode');

        if ($_FILES["merek_cert_cancel"]["name"]) {
            $data['merek_cert_cancel'] = $this->upload_file_pdf("merek_cert_cancel", "merek_cert_cancel");
        }

        
        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);
        
        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/merek/view/".$id);
        
    }

    function update_merek3(){
        $id=$this->input->post('kode');

        
        $data['merek_namakuasa']       = $this->input->post('namakuasa');
        $data['merek_nokonsultan'] = $this->input->post('nokonsul');
        $data['merek_namakantor']     = $this->input->post('namakantor');
        $data['merek_alamatkuasa']     = $this->input->post('alamatkonsul');
        $data['merek_teleponkuasa']     = $this->input->post('tlpkuasa');
        $data['merek_faxkuasa']       = $this->input->post('faxkuasa');
        
        
        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);

        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/merek/viewmerek4/".$id);
        
    }

        function update_merek4(){
        $id=$this->input->post('kode');

        
        $data['merek_tglklaim']       = $this->input->post('tglprio');
        $data['merek_kantorklaim'] = $this->input->post('negaramerek');
        $data['merek_noprioklaim']     = $this->input->post('nomorprio');
        
        
        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);

        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/merek/viewmerek5/".$id);
        
    }

    function update_merek5(){
        $id=$this->input->post('kode');


        // if ($_FILES["gambarlabel"]["name"]) {
        //     $data['merek_gambarmerek'] = $this->upload_label_merek();
        // } else {
        //     $data['merek_gambarmerek'] = $this->input->post('gambarlabel_old');
        // }
        
        if ($_FILES["merek_gambarmerek"]["name"]) {
            $data['merek_gambarmerek'] = $this->upload_file_pdf("merek_gambarmerek", "merek_gambarmerek");
        }

        if ($_FILES["merek_file_ttd"]["name"]) {
            $data['merek_file_ttd'] = $this->upload_file_pdf("merek_file_ttd", "merek_file_ttd");
        }

        $data['merek_type']       = $this->input->post('typemerek');
        $data['merek_terjemahan'] = $this->input->post('rekter');
        $data['merek_pengucapan']     = $this->input->post('transli');
        $data['merek_unsurwarna']       = $this->input->post('unsurwarna');
        $data['merek_namamerek']     = $this->input->post('mereknama');
        $data['merek_kelasid']     = $this->input->post('xjta');
        $data['merek_kelas']     = $this->input->post('kelas');
        
        $query = $this->main_model->update_data('merek', $data, 'merek_id', $id);
        $this->persentase();
        
        
        echo $this->session->set_flashdata('msg','succes');
        redirect(base_url()."admin/merek/view/".$id, 'refresh');
        

        
    }

    function submit(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
            
        if ($cek->merek_statusid == 2 || $cek->merek_statusid == 3 || $cek->merek_statusid == 4) {
            echo $this->session->set_flashdata('msg','sudah-submit');
            redirect(base_url()."admin/merek/view/".$kodex);
            }

            if ($cek->persentase == 100) {
            $update['merek_statusid']  =  2;
            echo $this->session->set_flashdata('msg','sukses-submit');
            $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
            redirect(base_url()."admin/merek/");
            }


            if ($cek->persentase <= 99) {
            echo $this->session->set_flashdata('msg','gagal-submit');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
        

            // if ($cek->persentase == 100 AND $cek->merek_no_permohonan != "") {
            // $update['merek_statusid']  =  3;
            // $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
            // }       

       // echo $this->session->set_flashdata('msg','success');
        //redirect(base_url()."admin/merek/view/".$id, 'refresh');
        

        
    }

    function diproses(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
        //$mails = $this->db->query("SELECT merek_email FROM merek WHERE merek_id = '".$kodex."' ")->row();
            
        if ($cek->merek_statusid == 3 || $cek->merek_statusid == 4) {
            echo $this->session->set_flashdata('msg','sudah-diproses');
            redirect(base_url()."admin/merek/view/".$kodex);
            }

        if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','hak-akses');
            redirect(base_url()."admin/merek/view/".$kodex);
            }      
           
            if ($cek->merek_statusid == 2) {
            $update['merek_statusid']  =  3;
            echo $this->session->set_flashdata('msg','sendmail');
            $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
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
            $this->email->to($cek->merek_email);
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
                            <h4 style="font-family: verdana;">Pendaftaran usulan MEREK anda sedang kami proses. Tim kami akan memverifikasi berkas yang anda kirimkan. Mohon ditunggu untuk mendapatkan informasi selanjutnya.</h4>
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
	    redirect('https://wa.me/'.$cek->merek_nohp.'?text=Yth. Bapak/Ibu, Pendaftaran usulan MEREK anda sedang kami proses. Tim kami akan memverifikasi berkas yang anda kirimkan. Mohon ditunggu mendapatkan informasi selanjutnya.');
            redirect(base_url()."admin/merek/view/".$kodex);
            } else {
                echo $this->email->print_debugger();
                die;
            }   
            redirect(base_url()."admin/merek/view/".$kodex);
            }  

            
        
    }
    
    function waproses(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
            
        if ($cek->merek_stwaproses == 1) {
            echo $this->session->set_flashdata('msg','sudah-wa');
            redirect(base_url()."admin/merek/view/".$kodex);
            }

        if ($cek->merek_statusid != 3) {
            echo $this->session->set_flashdata('msg','gagal-wa');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
    
           if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','gagal-wa');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
                  
            if ($cek->merek_stwaproses == '') {
            $update['merek_stwaproses']  =  1;
            $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
            redirect('https://wa.me/'.$cek->merek_nohp.'?text=Permohonan Merek Anda Telah *Diproses* Oleh Klinik KI Ditjen IKMA','_blank');
            
            } else {
            echo $this->session->set_flashdata('msg','gagal-wa');
            redirect(base_url()."admin/merek/view/".$kodex);
            }  

    }

    function diajukan(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
            
         if ($cek->merek_statusid == 4) {
            echo $this->session->set_flashdata('msg','sudah-diproses');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
  	 if ($cek->merek_no_permohonan == "") {
            echo $this->session->set_flashdata('msg','noper');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
    
   	 if ($cek->persentase <= 99) {
            echo $this->session->set_flashdata('msg','gagal-submit');
            redirect(base_url()."admin/merek/view/".$kodex);
            }

        if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','hak-akses');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
                  
            if ($cek->merek_statusid == 3) {
            $update['merek_statusid']  =  4;
            echo $this->session->set_flashdata('msg','sendmail');
            $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
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
            $this->email->to($cek->merek_email);
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
                            <h4 style="font-family: verdana;">Selamat usulan MEREK anda telah kami ajukan ke Direktorat Jenderal Kekayaan Intelektual, Kementerian Hukum dan HAM. Pengusulan MEREK memakan waktu 1 - 1,5 Tahun. Ketika sertifikat MEREK sudah selesai, kami akan mengirimkan email notifikasi kembali.</h4>
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
	    redirect('https://wa.me/'.$cek->merek_nohp.'?text=Yth. Bapak/Ibu, Selamat usulan MEREK anda telah kami ajukan ke Direktorat Jenderal Kekayaan Intelektual, Kementerian Hukum dan HAM. Pengusulan MEREK memakan waktu 1 - 1,5 Tahun. Ketika sertifikat MEREK sudah selesai, kami akan mengirimkan email notifikasi kembali.');
            redirect(base_url()."admin/merek/view/".$kodex);
            } else {
                echo $this->email->print_debugger();
                die;
            }
            redirect(base_url()."admin/merek/");
            }  

    }

	function selesai(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
            
        if ($cek->merek_statusid == 5) {
            echo $this->session->set_flashdata('msg','selesai');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
    

        if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','hak-akses');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
                  
            if ($cek->merek_statusid == 4) {
            $update['merek_statusid']  =  5;
            echo $this->session->set_flashdata('msg','sendmail');
            $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
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
            //$attched_file= $_SERVER["DOCUMENT_ROOT"]."/assets/images/".$cek->merek_cert;
            //$file_path= $_SERVER["DOCUMENT_ROOT"]."/var/www/html/klinikki/assets/images/".$cek->merek_cert;
            //$file_path = FCPATH.'/assets/images/'.$cek->merek_email;
            //$file_path = base_url() . '/assets/images/'. $cek->merek_email;
           // $this->email->attach($file_path);
            //$this->email->attach($path . $cek->merek_cert, 'report.pdf', 'application/pdf');
           // $this->email->attach(FCPATH.'/assets/images/'.$cek->merek_cert);                
            $this->email->from('klinik.hkiikm@gmail.com', 'Layanan KI');
            $this->email->to($cek->merek_email);
            $this->email->set_header('Content-Type', 'text/html');
            $this->email->subject('Sertifikat MEREK Anda Telah Terbit');
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
                        <h1 style="font-family: verdana;"><a href="#">Sertifikat Merek Anda Telah Terbit</a></h1>
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
                            <h4 style="font-family: verdana;">Selamat sertifikat MEREK dengan nama merek : <b>' . $cek->merek_namamerek . '</b> telah terbit. Silahkan klik tombol berikut untuk mengunduh sertifikat.</h4>
                            <br><a class="btn btn-primary" href="' . base_url() . 'assets/images/' . $cek->merek_cert . '">Sertifikat Merek</a>
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
        redirect('https://wa.me/'.$cek->merek_nohp.'?text=Yth. Bapak/Ibu, Selamat sertifikat MEREK anda telah terbit. Silahkan kunjungi website https://klinikki.kemenperin.go.id dan login menggunakan akun anda untuk mengunduh sertifikat.');
            redirect(base_url()."admin/merek/viewcert/".$kodex);
            } else {
                echo $this->email->print_debugger();
                die;
            }
            redirect(base_url()."admin/merek/view/".$kodex);
            }  

    }

    function ditolak(){
        $kodex=$this->uri->segment(4);
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$kodex."' ")->row();
            
        if ($cek->merek_statusid == 6) {
            echo $this->session->set_flashdata('msg','selesai');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
    

        if ($this->session->userdata('akses')== 3 || $this->session->userdata('akses')== 2) {
            echo $this->session->set_flashdata('msg','hak-akses');
            redirect(base_url()."admin/merek/view/".$kodex);
            }
                  
            if ($cek->merek_statusid == 4) {
            $update['merek_statusid']  =  6;
            echo $this->session->set_flashdata('msg','sendmail');
            $this->main_model->update_data('merek', $update, 'merek_id', $kodex);
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
            $this->email->to($cek->merek_email);
            $this->email->set_header('Content-Type', 'text/html');
            $this->email->subject('Penolakan atas Permohonan MEREK');
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
                        <h1 style="font-family: verdana;"><a href="#">Penolakan atas Permohonan MEREK</a></h1>
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
                            <h4 style="font-family: verdana;">Dapat kami sampaikan bahwa permohonan MEREK dengan nama merek : <b>' . $cek->merek_namamerek . '</b> ditolak. Silahkan klik tombol berikut untuk mengunduh surat penolakan.</h4>
                            <a class="btn btn-primary" href="' . base_url() . 'assets/images/' . $cek->merek_cert_cancel . '">Surat Penolakan</a> <br><br><h4>Penjelasan mengenai alasan penolakan secara detail, silahkan hubungi kami pada 021 - 5255509 ext. 2168 atau melalui aplikasi whatsapp pada 082312901430.</h4>
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
        redirect('https://wa.me/'.$cek->merek_nohp.'?text=Yth. Bapak/Ibu, Dapat kami sampaikan bahwa permohonan MEREK yang anda ajukan ditolak. Penjelasan mengenai alasan penolakan secara detail, silahkan hubungi kami pada 021 - 5255509 ext. 2168 atau melalui aplikasi whatsapp pada 082312901430.');
            redirect(base_url()."admin/merek/viewcert/".$kodex);
            } else {
                echo $this->email->print_debugger();
                die;
            }
            redirect(base_url()."admin/merek/view/".$kodex);
            }  

    }

    private function upload_file_pdf($filename, $name)
    {
        $id = $this->input->post('kode');
        $get_user = $this->db->query("SELECT * FROM merek WHERE merek_id='$id'")->row();

        if ($name == "merek_file_ttd") {
            $get = $get_user->merek_file_ttd;
        } 

        if ($name == "merek_gambarmerek") {
            $get = $get_user->merek_gambarmerek;
        } 

        if ($name == "merek_photo") {
            $get = $get_user->merek_photo;
        } 

        if ($name == "merek_ktp") {
            $get = $get_user->merek_ktp;
        }

        if ($name == "merek_srtpernyataan") {
            $get = $get_user->merek_srtpernyataan;
        } 

        $config['upload_path']  = "./assets/images/";
        $config['allowed_types']= 'pdf|jpg|jpeg|png';
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
        $config['width']= 640;
        $config['height']= 480;
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

    
    function hapus_merek(){
        $kode=$this->input->post('kode2');
        $this->m_merek->hapus_merek($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/merek');
    }


    function cek_email()
    {
        $email = $this->input->post('email');
        $query = $this->db->query("SELECT * FROM merek WHERE merek_email='$email'")->num_rows();

        if ($query > 0) {
            echo '<label class="text-danger">Email telah terdaftar.</label>';
        } else {
            return false;
        }
    }    
    
    public function persentase()
    {   
        $id = $id=$this->input->post('kode');
        $cek = $this->db->query("SELECT * FROM merek WHERE merek_id = '".$id."' ")->row();

          $jum = 0;
          if ($cek->merek_nama != "") { $jum = $jum+5; }
          if ($cek->merek_nohp != "") { $jum = $jum+5; }
          if ($cek->merek_photo != "") { $jum = $jum+5; }
          if ($cek->merek_badan_usaha != "") { $jum = $jum+5; }
          if ($cek->merek_ketusaha != "") { $jum = $jum+5; }
          if ($cek->merek_fileketusaha != "") { $jum = $jum+10; }
          if ($cek->merek_ktp != "") { $jum = $jum+5; }
          if ($cek->merek_srtpernyataan != "") { $jum = $jum+5; }
          if ($cek->merek_alamat != "") { $jum = $jum+5; }
          if ($cek->merek_idprovinsi > 0) { $jum = $jum+5; }
          if ($cek->merek_idkabkota > 0) { $jum = $jum+5; }
          if ($cek->merek_type != "") { $jum = $jum+5; }
          if ($cek->merek_unsurwarna != "") { $jum = $jum+5; }
          if ($cek->merek_namamerek != "") { $jum = $jum+10; }
          if ($cek->merek_gambarmerek != "") { $jum = $jum+5; }
          //if ($cek->merek_kelasid > 0) { $jum = $jum+5; }
          if ($cek->merek_kelas != "") { $jum = $jum+10; }
          if ($cek->merek_file_ttd != "") { $jum = $jum+5; }
          
                    
          $update['persentase']  =  $jum;
          $this->main_model->update_data('merek', $update, 'merek_id', $id);
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