<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_pengguna','m_pengguna');
		$this->load->model('Main_model','main_model');
		$this->load->library('upload');
	}


	function index(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->session->userdata('idadmin');
			$x['pengguna']=$this->m_pengguna->get_all_pengguna();
			$this->load->view('admin/v_penggunanew',$x);
		}else{
			redirect('admin/dashboard');
        }
	}

	function edit(){

        if($this->session->userdata('akses')=='1'){
            $kode=$this->uri->segment(4);    
            $x['vhc']=$this->m_pengguna->get_pengguna_login($kode);
            $x['con']=$this->m_pengguna->get_pengguna_koun($kode);
            $x['chc']=$this->m_pengguna->get_pengguna_koun_hc($kode);
            $x['cme']=$this->m_pengguna->get_pengguna_koun_merek($kode);
            //$x['rol']=$this->m_pengguna->get_status_kode($kode);
            $this->load->view('admin/v_edit_penggunanew',$x);
        }else{
            redirect('admin/dashboard');
        }
        
    }

    
     function delete(){

    if($this->session->userdata('akses')=='1'){
        $kode=$this->uri->segment(4);    
        $delete = $this->m_pengguna->delete_pengguna($kode); // call the delete function from model
        if($delete){
            $this->session->set_flashdata('success_msg','Pengguna berhasil dihapus');
        }else{
            $this->session->set_flashdata('error_msg','Gagal menghapus pengguna');
        }
        redirect('admin/dashboard');
    }else{
        redirect('admin/dashboard');
    }
}

	
	function update_penggunanew(){
        $id=$this->input->post('kode');
        if ($_FILES["pegguna_surtug"]["name"]) {
            $data['pegguna_surtug'] = $this->upload_file_pdf("pegguna_surtug", "pegguna_surtug");
        }
        
        $data['pengguna_jenis']       = $this->input->post('user');
        $data['pengguna_nama']       = $this->input->post('xnama');
        $data['pengguna_ikm']       = $this->input->post('ikm');
        $data['pengguna_nohp'] = $this->input->post('xnohp');
        $data['pengguna_limiter_di'] = $this->input->post('limiter_di');
        $data['pengguna_limiter_hc'] = $this->input->post('limiter_hc');
        $data['pengguna_limiter_merek'] = $this->input->post('limiter_merek');
        $data['pengguna_level']     = $this->input->post('pengguna_level');
             
        
        $query = $this->main_model->update_data('pengguna', $data, 'pengguna_id', $id);

        echo $this->session->set_flashdata('msg','success');
        redirect(base_url()."admin/pengguna");
        
    }

	function simpan_pengguna(){
		if($this->session->userdata('akses')=='1'){
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
	                        $config['width']= 800;
	                        $config['height']= 600;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $nama=htmlspecialchars($this->input->post('xnama'),ENT_QUOTES);
	                        $jenkel=htmlspecialchars($this->input->post('xjenkel'),ENT_QUOTES);
	                        $username=htmlspecialchars($this->input->post('xusername'),ENT_QUOTES);
	                        $password=htmlspecialchars($this->input->post('xpassword'),ENT_QUOTES);
                            $konfirm_password=htmlspecialchars($this->input->post('xpassword2'),ENT_QUOTES);
                            $email=htmlspecialchars($this->input->post('xemail'),ENT_QUOTES);
                            $nohp=htmlspecialchars($this->input->post('xkontak'),ENT_QUOTES);
                            $level=htmlspecialchars($this->input->post('xlevel'),ENT_QUOTES);
     						if ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/pengguna');
     						}else{
	               				$this->m_pengguna->simpan_pengguna($nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level);
	                    		echo $this->session->set_flashdata('msg','success');
	               				redirect('admin/pengguna');
	               				
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/pengguna');
	                }
	                 
	            }else{
	            	$nama=htmlspecialchars($this->input->post('xnama'),ENT_QUOTES);
	                $jenkel=htmlspecialchars($this->input->post('xjenkel'),ENT_QUOTES);
	                $username=htmlspecialchars($this->input->post('xusername'),ENT_QUOTES);
	                $password=htmlspecialchars($this->input->post('xpassword'),ENT_QUOTES);
                    $konfirm_password=htmlspecialchars($this->input->post('xpassword2'),ENT_QUOTES);
                    $email=htmlspecialchars($this->input->post('xemail'),ENT_QUOTES);
                    $nohp=htmlspecialchars($this->input->post('xkontak'),ENT_QUOTES);
                    $level=htmlspecialchars($this->input->post('xlevel'),ENT_QUOTES);
	            	if ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/pengguna');
     				}else{
	               		$this->m_pengguna->simpan_pengguna_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','success');
	               		redirect('admin/pengguna');
	               	}
	            } 

	    }else{
            redirect('administrator');
        }

	}

	function update_pengguna(){
		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'|| $this->session->userdata('akses')=='3'){
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
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $kode=htmlspecialchars($this->input->post('kode'),ENT_QUOTES);
	                        $nama=htmlspecialchars($this->input->post('xnama'),ENT_QUOTES);
	                		$jenkel=htmlspecialchars($this->input->post('xjenkel'),ENT_QUOTES);
	                		$username=htmlspecialchars($this->input->post('xusername'),ENT_QUOTES);
	                		$password=htmlspecialchars($this->input->post('xpassword'),ENT_QUOTES);
                    		$konfirm_password=htmlspecialchars($this->input->post('xpassword2'),ENT_QUOTES);
                    		$email=htmlspecialchars($this->input->post('xemail'),ENT_QUOTES);
                    		$nohp=htmlspecialchars($this->input->post('xkontak'),ENT_QUOTES);
                    		$level=htmlspecialchars($this->input->post('xlevel'),ENT_QUOTES);

                            if (empty($password) && empty($konfirm_password)) {
                            	$this->m_pengguna->update_pengguna_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/pengguna');
     						}elseif ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/pengguna');
     						}else{
	               				$this->m_pengguna->update_pengguna($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/pengguna');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/pengguna');
	                }
	                
	            }else{
	            	$kode=htmlspecialchars($this->input->post('kode'),ENT_QUOTES);
	            	$nama=htmlspecialchars($this->input->post('xnama'),ENT_QUOTES);
	                $jenkel=htmlspecialchars($this->input->post('xjenkel'),ENT_QUOTES);
	                $username=htmlspecialchars($this->input->post('xusername'),ENT_QUOTES);
	                $password=htmlspecialchars($this->input->post('xpassword'),ENT_QUOTES);
                    $konfirm_password=htmlspecialchars($this->input->post('xpassword2'),ENT_QUOTES);
                    $email=htmlspecialchars($this->input->post('xemail'),ENT_QUOTES);
                    $nohp=htmlspecialchars($this->input->post('xkontak'),ENT_QUOTES);
                    $level=htmlspecialchars($this->input->post('xlevel'),ENT_QUOTES);

	            	if (empty($password) && empty($konfirm_password)) {
                       	$this->m_pengguna->update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','info');
	               		redirect('admin/pengguna');
     				}elseif ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/pengguna');
     				}else{
	               		$this->m_pengguna->update_pengguna_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','warning');
	               		redirect('admin/pengguna');
	               	}
	            } 
	    }else{
            redirect('administrator');
        }

	}

	function hapus_pengguna(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->input->post('kode2');
			$this->m_pengguna->hapus_pengguna($kode);
		    echo $this->session->set_flashdata('msg','success-hapus');
		    redirect('admin/pengguna');
	    }else{
            redirect('administrator');
        }
	}

	function export(){

        if($this->session->userdata('akses')!='1'){
            redirect('admin/pengguna');
        }

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Layanan HKI')
                     ->setLastModifiedBy('Layanan HKI')
                     ->setTitle("Data Pendaftar")
                     ->setSubject("Peserta Subject")
                     ->setDescription("Laporan Data Peserta")
                     ->setKeywords("Peserta");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR PENGGUNA LAYANAN KI"); // Set kolom A1 dengan tulisan ""
        $excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet() // Set warna header row
        ->getStyle('A3:H3')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()  
        ->setRGB('90F06D');
        
        $excel->getActiveSheet()
        ->getStyle('A1:A1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->getActiveSheet()
        ->getStyle('E4:H1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $excel->getActiveSheet()->getStyle('B4:D1000')->getAlignment()->setIndent(1);


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
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA LENGKAP"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "IKM/INSTANSI"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "EMAIL"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "NO. HP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "JENIS USER"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "LEVEL"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "TANGGAL DAFTAR"); // Set kolom E3 dengan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        
        
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $pengguna = $this->m_pengguna->get_excel_pengguna();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($pengguna as $x){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $x->pengguna_nama);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $x->pengguna_ikm);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $x->pengguna_email);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $x->pengguna_nohp);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $x->pengguna_jenis);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $x->pengguna_level);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $x->pengguna_register);
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
          
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(35); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(18); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom E
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)

        $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("DAFTAR PENDAFTAR");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="DaftarPeserta.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }

    function exportikm(){

        if($this->session->userdata('akses')!='1'){
            redirect('admin/pengguna');
        }

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Layanan HKI')
                     ->setLastModifiedBy('Layanan HKI')
                     ->setTitle("Data Pendaftar")
                     ->setSubject("Peserta Subject")
                     ->setDescription("Laporan Data Peserta")
                     ->setKeywords("Peserta");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR PENGGUNA IKM LAYANAN KI"); // Set kolom A1 dengan tulisan ""
        $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet() // Set warna header row
        ->getStyle('A3:G3')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()  
        ->setRGB('90F06D');
        
        $excel->getActiveSheet()
        ->getStyle('A1:A1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->getActiveSheet()
        ->getStyle('E4:G1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $excel->getActiveSheet()->getStyle('B4:D1000')->getAlignment()->setIndent(1);


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
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA LENGKAP"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "IKM/INSTANSI"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "EMAIL"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "NO. HP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "JENIS USER"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "TANGGAL DAFTAR"); // Set kolom E3 dengan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
                
        
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $pengguna = $this->m_pengguna->get_excel_pengguna_ikm();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($pengguna as $x){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $x->pengguna_nama);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $x->pengguna_ikm);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $x->pengguna_email);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $x->pengguna_nohp);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $x->jenis_user);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $x->pengguna_register);
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
                    
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(35); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(18); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom E
                
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)

        $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("DAFTAR PENGGUNA IKM");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="DaftarIkm.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }

    function exportdinas(){

        if($this->session->userdata('akses')!='1'){
            redirect('admin/pengguna');
        }

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Layanan HKI')
                     ->setLastModifiedBy('Layanan HKI')
                     ->setTitle("Data Pendaftar")
                     ->setSubject("Peserta Subject")
                     ->setDescription("Laporan Data Peserta")
                     ->setKeywords("Peserta");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR PENGGUNA DINAS LAYANAN KI"); // Set kolom A1 dengan tulisan ""
        $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet() // Set warna header row
        ->getStyle('A3:G3')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()  
        ->setRGB('90F06D');
        
        $excel->getActiveSheet()
        ->getStyle('A1:A1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->getActiveSheet()
        ->getStyle('E4:G1000')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $excel->getActiveSheet()->getStyle('B4:D1000')->getAlignment()->setIndent(1);


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
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA LENGKAP"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "IKM/INSTANSI"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "EMAIL"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "NO. HP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "JENIS USER"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "TANGGAL DAFTAR"); // Set kolom E3 dengan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
                
        
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $pengguna = $this->m_pengguna->get_excel_pengguna_dinas();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($pengguna as $x){ // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $x->pengguna_nama);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $x->pengguna_ikm);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $x->pengguna_email);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $x->pengguna_nohp);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $x->jenis_user);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $x->pengguna_register);
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
                    
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(35); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(18); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom E
                
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)

        $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("DAFTAR PENGGUNA DINAS");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="DaftarIkm.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
      }

    private function upload_file_pdf($filename, $name)
    {
        $id = $this->input->post('kode');
        $get_user = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id='$id'")->row();

        if ($name == "pegguna_surtug") {
            $get = $get_user->pegguna_surtug;
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


	function reset_password(){
   		if($this->session->userdata('akses')=='1'){
	        $id=$this->uri->segment(4);
	        $get=$this->m_pengguna->getusername($id);
	        if($get->num_rows()>0){
	            $a=$get->row_array();
	            $b=$a['pengguna_username'];
	        }
	        $pass=rand(123456,999999);
	        $this->m_pengguna->reset_password($id,$pass);
	        echo $this->session->set_flashdata('msg','show-modal');
	        echo $this->session->set_flashdata('uname',$b);
	        echo $this->session->set_flashdata('upass',$pass);
		    redirect('admin/pengguna');
   		}else{
            redirect('administrator');
        }
    }
  public function deleteSlct()
  {
    $ids = $this->input->post('ids');
    // var_dump($ids);
    $this->db->where_in('pengguna_id', explode(",", $ids));
    $this->db->delete('pengguna');

    echo json_encode(['success' => "Item Deleted successfully."]);
  }

}