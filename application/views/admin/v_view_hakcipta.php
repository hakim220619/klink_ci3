<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Pratinjau</title>

        <meta name="description" content="">
        <meta name="author" content="VR">
        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

        <!-- END Icons -->
        <!-- bootstrap -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
           <link href="<?php echo base_url();?>assets/front/css/style.css" rel="stylesheet" type="text/css">
        <!-- bootstrap fileupload -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet">

        <!-- bootstrap datepicker -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
          <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
         <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropify.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'theme/new/vendor/aos/aos.css'?>">

        <style>
        .errorOne{color:red;}
        }
        </style>

    </head>
    <body>
        <!-- Page Container -->
       
        <div id="page-container" class="sidebar-o side-scroll main-content-boxed side-trans-enabled page-header-fixed">
            

            <!-- Sidebar -->
         
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="content-header content-header-fullrow px-15">
                            <!-- Mini Mode -->
                            <div class="content-header-section sidebar-mini-visible-b">
                                <!-- Logo -->
                                <div class="content-header-item">
                                    <a href="<?php echo base_url() ?>">
                                        <!-- <i class="text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">KLINIK KI</span><span class="font-size-xl text-success"></span> -->
                                        <img src="<?php echo base_url().'theme/new/img/logoki03.png'?>" style="width: 116px;height: auto;margin-top: -8px;" alt="">
                                    </a>
                                </div>
                                <!-- END Logo -->
                            </div>
                            <!-- END Mini Mode -->

                            <!-- Normal Mode -->
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <!-- Close Sidebar, Visible only on mobile screens -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <!-- END Close Sidebar -->

                                <!-- Logo -->
                                <div class="content-header-item">
                                    <a href="<?php echo base_url() ?>">
                                    <img src="<?php echo base_url().'theme/new/img/logoki03.png'?>" style="width: 116px;height: auto;margin-top: -8px;" alt="">
                                    </a>
                                </div>
                                <!-- END Logo -->
                            </div>
                            <!-- END Normal Mode -->
                        </div>
                        <!-- END Side Header -->

                        <!-- Side User -->
                        <div class="content-side content-side-full content-side-user px-10 align-parent">
                            <!-- Visible only in mini mode -->
                            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                                <img class="img-avatar img-avatar32" src="<?php echo base_url().'assets/images/user_blank.png'?>" alt="">
                            </div>
                            <!-- END Visible only in mini mode -->

                            <!-- Visible only in normal mode -->
                            <div class="sidebar-mini-hidden-b text-center">
                                <?php 
                                    error_reporting(0);
                                    $idadmin=$this->session->userdata('idadmin');
                                    $query=$this->db->query("SELECT * FROM pengguna WHERE pengguna_id='$idadmin'");
                                    $data=$query->row_array();
                                ?>
                                <?php if($this->session->userdata('akses')=='3'):?>
                                    <a class="img-link" href="<?php echo base_url().'assets/images/user_blank.png'?>">
                                        <img class="img-avatar" src="<?php echo base_url().'assets/images/user_blank.png'?>" alt="">
                                    </a>
                                <?php else:?>
                                    <a class="img-link" href="#">
                                        <img class="img-avatar" src="<?php echo base_url().'assets/images/'.$data['pengguna_photo'];?>" alt="">
                                    </a>
                                <?php endif;?>
                                <ul class="list-inline mt-10">
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="#"><?php echo $this->session->userdata('nama');?></a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- END Visible only in normal mode -->
                        </div>
                        <!-- END Side User -->

                        <!-- Side Navigation -->
                         <?php $this->load->view('admin/sidebar');?>
                        <!-- END Side Navigation -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <?php $this->load->view('admin/header.php');?>
            <!-- END Header -->
            
            <?php 
                
                $b=$vhc->row_array();
                
                if ($vhc->num_rows() < 1) {
                    redirect('admin/hakcipta');
                }
            ?>

            <!-- Main Container -->
            <main id="main-container">
             <!-- Page Content -->
            <div class="content"> <!-- div class conten -->
            
            <form action="<?php echo base_url().'admin/hakcipta/update_hc_cert_pop_ok'?>" id="form" method="post" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h3 class="block-title" style="text-align: center;"><b>PRATINJAU PENDAFTARAN HAK CIPTA</b></h3>
                 <!-- <h2 class="block-title" style="text-align:right;"><b>(Form Isian 1 - 3)</b></h2> -->
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                <div class="col-md-6 pr-md-5 text-center">
                    <div class="media intro-heading align-self-center">
                        
                           
                        <div class="media-body align-self-left">
                            <?php if($b['persentase'] == '100'  && $b['hc_statusid'] == '1' ):?>
                            <h4 style="margin-bottom: -10px;"><span style="text-transform:uppercase">DATA LENGKAP</h4>
                            <?php else:?>
                            <h4 style="margin-bottom: -10px;"><span style="text-transform:uppercase"><?php echo $b['status_nama']; ?></h4>
                            <?php endif;?>
                            <div id="chartsFactsheet" style="width: 45%;"></div>
                            <?php if($this->session->userdata('akses')!='1' && $b['hc_statusid'] == '1' ):?>
                <a href="<?php echo site_url('admin/hakcipta/viewhc1/'.$b['hc_id']);?>" class="btn btn-primary">Edit Formulir</a>          
                <?php elseif($this->session->userdata('akses')=='1' && $b['hc_statusid'] != '4' ):?>
                <a href="<?php echo site_url('admin/hakcipta/viewhc1/'.$b['hc_id']);?>" class="btn btn-primary">Edit Formulir</a>          
                            <?php else:?>
                <a href="<?php echo site_url('admin/hakcipta/viewhc1/'.$b['hc_id']);?>" class="btn btn-primary" hidden>Edit Formulir</a>
                <?php endif;?>
                           
                        </div>
                    </div>
                </div>

                    <div class="col-md-6 pr-md-5 mt-10">
                        <div class="form-group">
                            <label class="control-label">Tanggal Pengajuan:</label>
                            <input type="text" name="hc_tgl_pengajuan" id="hc_tgl_pengajuan" value="<?php echo $b['hc_tgl_pengajuan']; ?>" class="form-control">
                        </div>

                         <!-- <div class="form-group">
                            <label class="control-label">Tanggal Penerimaan:</label>
                            <input type="text" name="hc_tgl_penerimaan" id="hc_tgl_penerimaan" value="<?php echo $b['hc_tgl_penerimaan']; ?>" class="form-control">
                        </div> -->
                       
                        <div class="form-group">
                            <label class="control-label">Nomor Permohonan:</label>
                            <input type="text" name="hc_no_permohonan" id="hc_no_permohonan" value="<?php echo $b['hc_no_permohonan']; ?>" class="form-control">
                        </div>

                        <?php if($this->session->userdata('akses')=='1' && $b['hc_statusid'] == '3'):?>
                        <a href="<?php echo site_url('admin/hakcipta/diajukan/'.$b['hc_id']);?>" class="btn btn-danger" data-toggle="modal" data-target="#diajukan">Diajukan</a>
                        <?php endif;?>
                        <?php if($this->session->userdata('akses')=='1' && $b['hc_statusid'] == '4'):?>
                        <a href="<?php echo site_url('admin/hakcipta/selesai/'.$b['hc_id']);?>" class="btn btn-info" data-toggle="modal" data-target="#selesai">Selesai</a>
                        <a href="<?php echo site_url('admin/hakcipta/selesai/'.$b['hc_id']);?>" class="btn btn-danger" data-toggle="modal" data-target="#ditolak">Ditolak</a>
                        <?php endif;?>
                        <!-- <?php if($this->session->userdata('akses')=='1' && $b['hc_statusid'] == '5'):?>

                        <a href="<?php echo site_url('admin/hakcipta/viewcert/'.$b['hc_id']);?>" class="btn btn-danger">Upload Sertifikat</a>
                        <?php endif;?> -->

                    </div>

                   
                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
<!-----------------------------------------END FORM SECTION 1----------------------------------------->



<!----------------------------------------- FORM SECTION 1xx ------------------------------------------->

              <div class="block-header block-header-default">
        
                 <a href="javascript:void(0);" class="btn btn-danger">Catatan</a>    
        
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                <div class="col-md-12">
                    <div class="media intro-heading">
                        
                           
                        <div>
                            
                            
                 <ol start="1">
                             <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Halaman ini adalah halaman pratinjau yang berfungsi untuk melihat progress/update Pengusul dalam melengkapi formulir isian.</p>
                             </li> 
                 <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Untuk melakukan pengisian/perubahan data Pengusul dapat menekan tombol <b>Edit Formulir</b> yang berada diatas.</p>
                             </li> 
                 <li style="margin-left: -25px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan untuk menekan <b>tombol kirim usulan yang berada di akhir halaman</b> agar formulir anda dapat diproses.
                             </p>
                             </li>                            
                             </ol>                          
                        </div>
                    </div>
                </div>

                     
                   
                </div> <!-- End div row -->

                
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            

            </div> <!-- End div class block -->
         
<!-----------------------------------------END FORM SECTION 1xx----------------------------------------->

<!------------------------------------------ FORM SECTION 2------------------------------------------->      

          <!--   <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">IDENTITAS PEMOHON</h2>
             </div>
            
            <div class="block"> 
            
            <div class="col-md-12">
            

            
           
            <div class="card-body"> 
                <div class="row">
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Nama Pemohon:</label>
                            <input type="text" name="hc_nama" id="hc_nama" value="<?php echo $b['hc_nama']; ?>" class="form-control">
                        </div>

                       
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan:</label>
                                <input type="text" name="hc_warganegara" id="hc_warganegara" value="<?php echo $b['hc_warganegara']; ?>" class="form-control">
                        </div>

                    <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="hc_alamat" id="hc_alamat" class="form-control" rows="4" maxlength="300"><?php echo $b['hc_alamat']; ?></textarea>
                        </div>
                        
                                      

                   </div>
                    
                    <div class="col-md-6 pr-md-5">
                        
                        <div class="form-group">
                            <label class="control-label">Provinsi Domisili Perusahaan</label>
                         <select name="id_prov_perusahaan" id="id_prov_perusahaan" class="form-control opt1hid">
                         <option value="" disabled selected hidden>Pilih Provinsi</option>
                          <?php $provinsi = $this->db->query("SELECT * FROM tb_provinsi ORDER BY nama ASC")->result(); ?>
                            <?php foreach ($provinsi as $pr) { ?>
                            <?php if($b['hc_idprovinsi'] == 0) { ?>
                                <option value="<?php echo $pr->id; ?>"><?php echo $pr->nama; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pr->id; ?>" <?php echo ($pr->id == $b['hc_idprovinsi']) ? "selected" : ""; ?>>
                                    <?php echo $pr->nama; ?>
                                </option>
                            <?php }; ?>
                          <?php }; ?>
                         </select>
                        </div>

                        <div class="form-group">
                                <label class="control-label">Kota Domisili Perusahaan</label>
                             <select name="id_kab_perusahaan" id="id_kab_perusahaan" class="form-control opt1hid">
                             <option value="" readonly selected hidden>Pilih Kota/Kabupaten</option>
                              <?php $kabupaten = $this->db->query("SELECT * FROM tb_kabupaten ORDER BY nama ASC")->result(); ?>
                                <?php foreach ($kabupaten as $kb) { ?>
                             <option value="<?php echo $kb->id; ?>" <?php echo ($kb->id == $b['hc_idkabkota']) ? "selected" : ""; ?>>
                                 <?php echo $kb->nama; ?>
                             </option>
                              <?php }; ?>
                             </select>
                        </div>
        

                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="hc_kodepos" id="hc_kodepos" value="<?php echo $b['hc_kodepos']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="hc_negara" id="hc_negara" value="<?php echo $b['hc_negara']; ?>" class="form-control">
                        </div>


                   </div>


                </div> 
            </div>    
            
            
            </div> 
            


            </div>  -->

<!-- -------------------------------- END FORM SECTION 2----------------------------------------->

<!------------------------------------ FORM SECTION 4 ------------------------------------------->      

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">PEMEGANG HAK CIPTA</h2>
                 <h2 class="block-title" style="text-align:right;"><b>(Form Isian 2 - 3)</b></h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Nama Pengusul:</label>
                            <input type="text" name="hc_nama" id="hc_nama" value="<?php echo $b['hc_nama']; ?>" class="form-control">
                        </div>

                       <div class="form-group">
                            <label class="control-label">Nama Perusahaan/IKM:</label>
                            <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi.)</small>
                            <input type="text" name="hc_perusahaan" id="hc_perusahaan" value="<?php echo $b['hc_perusahaan']; ?>" class="form-control" required oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')">
                        </div>
                       <!--  <div class="form-group">
                            <label class="control-label">Kewarganegaraan:</label>
                                <input type="text" name="hc_warganegarapmg" id="hc_warganegarapmg" value="<?php echo $b['hc_warganegarapmg']; ?>" class="form-control">
                        </div>
 -->
                    <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="hc_alamatpmg" id="hc_alamatpmg" class="form-control" rows="4" maxlength="300"><?php echo $b['hc_alamatpmg']; ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Email :</label>
                                <input type="text" name="hc_email" id="hc_email" value="<?php echo $b['hc_email']; ?>" class="form-control">
                        </div>
                        


                   </div>
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">No. Hp :</label>
                                <input type="text" name="hc_nohp" id="hc_nohp" value="<?php echo $b['hc_nohp']; ?>" class="form-control">
                        </div>     

                        <div class="form-group">
                            <label class="control-label">Provinsi Domisili Perusahaan</label>
                         <select name="id_prov_perusahaan" id="id_prov_perusahaan" class="form-control opt1hid">
                         <option value="" disabled selected hidden>Pilih Provinsi</option>
                          <?php $provinsi = $this->db->query("SELECT * FROM tb_provinsi ORDER BY nama ASC")->result(); ?>
                            <?php foreach ($provinsi as $pr) { ?>
                            <?php if($b['hc_idprovinsipmg'] == 0) { ?>
                                <option value="<?php echo $pr->id; ?>"><?php echo $pr->nama; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pr->id; ?>" <?php echo ($pr->id == $b['hc_idprovinsipmg']) ? "selected" : ""; ?>>
                                    <?php echo $pr->nama; ?>
                                </option>
                            <?php }; ?>
                          <?php }; ?>
                         </select>
                        </div>

                        <div class="form-group">
                                <label class="control-label">Kota Domisili Perusahaan</label>
                             <select name="id_kab_perusahaan" id="id_kab_perusahaan" class="form-control opt1hid">
                             <option value="" readonly selected hidden>Pilih Kota/Kabupaten</option>
                              <?php $kabupaten = $this->db->query("SELECT * FROM tb_kabupaten ORDER BY nama ASC")->result(); ?>
                                <?php foreach ($kabupaten as $kb) { ?>
                             <option value="<?php echo $kb->id; ?>" <?php echo ($kb->id == $b['hc_idkabkotapmg']) ? "selected" : ""; ?>>
                                 <?php echo $kb->nama; ?>
                             </option>
                              <?php }; ?>
                             </select>
                        </div>
        

                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="hc_kodepospmg" id="hc_kodepospmg" value="<?php echo $b['hc_kodepospmg']; ?>" class="form-control">
                        </div>

                        

                        <!-- <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="hc_negarapmg" id="hc_negarapmg" value="<?php echo $b['hc_negarapmg']; ?>" class="form-control">
                        </div>
 -->

                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
<!-- ----------------------------------- END FORM SECTION 4------------------------------------------->

<!---------------------------------- FORM SECTION 3 --------------------------------------------->      

             <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">ALAMAT SURAT MENYURAT</h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                                               
                        <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="hc_alamatsurat" id="hc_alamatsurat" class="form-control" rows="4" maxlength="300"><?php echo $b['hc_alamatsurat']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Provinsi</label>
                                <input type="text" name="merek_provsurat" id="hc_provsurat" value="<?php echo $b['hc_provsurat']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kabupaten Kota:</label>
                                <input type="text" name="hc_kabkotasurat" id="hc_kabkotasurat" value="<?php echo $b['hc_kabkotasurat']; ?>" class="form-control">
                        </div>

                    </div>
                    
                    <div class="col-md-6 pr-md-5">
                       
                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="hc_kodepossurat" id="hc_kodepossurat" value="<?php echo $b['hc_kodepossurat']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="hc_negarasurat" id="hc_negarasurat" value="<?php echo $b['hc_negarasurat']; ?>" class="form-control">
                        </div>


                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
<!-- -------------------------------- END FORM SECTION 3----------------------------------------->      





<!----------------------------------------- FORM SECTION 5 ------------------------------------------->

           <!--      <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">IDENTITAS KUASA</h2>
             </div>
            
            <div class="block"> 
            
            <div class="col-md-12"> 
            

            
           
            <div class="card-body"> 
                <div class="row"> 
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Nama Identitas Kuasa:</label>
                            <input type="text" name="hc_namakuasa" id="hc_namakuasa" value="<?php echo $b['hc_namakuasa']; ?>" class="form-control">
                        </div>

                       
                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan:</label>
                                <input type="text" name="hc_warganegarakuasa" id="hc_warganegarakuasa" value="<?php echo $b['hc_warganegarakuasa']; ?>" class="form-control">
                        </div>

                    <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="hc_alamatkuasa" id="hc_alamatkuasa" class="form-control" rows="4" maxlength="300"><?php echo $b['hc_alamatkuasa']; ?></textarea>
                        </div>
                        
                                      

                   </div>
                    
                    <div class="col-md-6 pr-md-5">
                        
                        <div class="form-group">
                            <label class="control-label">Provinsi Domisili Perusahaan</label>
                         <select name="id_prov_perusahaan" id="id_prov_perusahaan" class="form-control opt1hid">
                         <option value="" disabled selected hidden>Pilih Provinsi</option>
                          <?php $provinsi = $this->db->query("SELECT * FROM tb_provinsi ORDER BY nama ASC")->result(); ?>
                            <?php foreach ($provinsi as $pr) { ?>
                            <?php if($b['hc_idprovinsikuasa'] == 0) { ?>
                                <option value="<?php echo $pr->id; ?>"><?php echo $pr->nama; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pr->id; ?>" <?php echo ($pr->id == $b['hc_idprovinsikuasa']) ? "selected" : ""; ?>>
                                    <?php echo $pr->nama; ?>
                                </option>
                            <?php }; ?>
                          <?php }; ?>
                         </select>
                        </div>

                        <div class="form-group">
                                <label class="control-label">Kota Domisili Perusahaan</label>
                             <select name="id_kab_perusahaan" id="id_kab_perusahaan" class="form-control opt1hid">
                             <option value="" readonly selected hidden>Pilih Kota/Kabupaten</option>
                              <?php $kabupaten = $this->db->query("SELECT * FROM tb_kabupaten ORDER BY nama ASC")->result(); ?>
                                <?php foreach ($kabupaten as $kb) { ?>
                             <option value="<?php echo $kb->id; ?>" <?php echo ($kb->id == $b['hc_idkabkotakuasa']) ? "selected" : ""; ?>>
                                 <?php echo $kb->nama; ?>
                             </option>
                              <?php }; ?>
                             </select>
                        </div>
        

                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="hc_kodeposkuasa" id="hc_kodeposkuasa" value="<?php echo $b['hc_kodeposkuasa']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="hc_negarakuasa" id="hc_negarakuasa" value="<?php echo $b['hc_negarakuasa']; ?>" class="form-control">
                        </div>


                   </div>


                </div> 
            </div> 
            
            
            </div> 
            


            </div>  -->
            
<!---------------------------------------END FORM SECTION 5----------------------------------------->



<!----------------------------------------- FORM SECTION 6 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">URAIAN HAK CIPTA</h2>
                 <h2 class="block-title" style="text-align:right;"><b>(Form Isian 3 - 3)</b></h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                                               
                        <div class="form-group">
                            <label class="control-label">Jenis Ciptaan: (Wajib diisi).</label>
                            <br/>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Contoh : Buku, Karya Tulis, Alat Peraga, Lagu, Tarian, Seni Lukisan, Seni Ukiran, Seni Patung, Seni Kaligrafi, Seni Motif Batik, Seni Motif Tenun, Program Komputer (Wajib diisi).</small>
                            <input type="text" name="hc_jenis" id="hc_jenis" value="<?php echo $b['hc_jenis']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Judul Ciptaan: (Wajib diisi).</label>
                            <input type="text" name="hc_judul" id="hc_judul" value="<?php echo $b['hc_judul']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Upload Berkas Pendukung (Wajib diisi).</label><br>
                            

                            <div class="mt-2">
                                <div class="row form-group" id="hc_ktp">
                                
                                 <label class="col-md-8">
                                    NIK (Nomor Induk Kependudukan)<br>
                                    <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 1 MB. Format .pdf/jpeg/jpg/png</small>
                                    
                                 </label>
                                        <div class="col-md-12">
                                        <input type="file" name="file_ktp" value="<?php echo $b['hc_ktp']; ?>" id="file_ktp" class="btn custom-input-file" disabled>
                                        <a href="<?php echo base_url().'assets/images/'.$b['hc_ktp'];?>"><?php echo $b['hc_ktp']; ?></a>
                                        </div>
                                </div>

                               <div class="row form-group" id="hc_spernyataan">
                                    <label class="col-md-12">
                                    Surat Pernyataan <a href="<?php echo base_url().'assets/images/'.'SPernyataanHakCipta.docx' ?>" target="_blank"><small class="text-note font-12" style="color: blue;">(Download Format)</small></a><br>
                                     <small class="text-note font-12"><i class="fa fa-info-circle"></i> 
                                     Max-size: 2 MB. Format .pdf</small></label>
                               
                                   <div class="col-md-12">
                                        <input type="file" name="file_spernyataan" id="file_spernyataan" class="btn custom-input-file" disabled>
                                        <a href="<?php echo base_url().'assets/images/'.$b['hc_spernyataan'];?>"><?php echo $b['hc_spernyataan']; ?></a>
                                  </div>
                               </div>

                               <div class="row form-group" id="hc_contohciptaan">
                                 <label class="col-md-12">
                                   Contoh Ciptaan <a href="<?php echo base_url().'assets/images/'.'contohciptaan.jpeg' ?>" target="_blank"><small class="text-note font-12" style="color: blue;">(Kriteria Upload)</small></a><br>
                                     <small class="text-note font-12"><i class="fa fa-info-circle"></i> 
                                     Max-size: 20 MB. Format .pdf/jpeg/jpg/png/mp4</small>
                                 </label>
                                
                                <div class="col-md-12">
                                <input type="file" name="file_contohciptaan" id="file_contohciptaan" class="btn custom-input-file" disabled>
                                <a href="<?php echo base_url().'assets/images/'.$b['hc_contohciptaan'];?>"><?php echo $b['hc_contohciptaan']; ?></a>
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Tautan untuk Ciptaan Video atau Lagu:</label><br>
                                <small class="text-note"><i class="fa fa-info-circle"></i> contoh Url dari: youtube, gdrive, dll.</small>
                                <input type="text" name="hc_tautan" id="hc_tautan" value="<?php echo $b['hc_tautan']; ?>" class="form-control">
                            </div>

                        </div>
                    </div>
                        
                        <!-- <div class="form-group">
                            <label class="control-label">Jenis Ciptaan:</label><br>
                             <select name="xjta" id="xjta" class="form-control opt1hid" required>
                         <option value="" disabled selected hidden>------------------------------- Jenis Ciptaan -------------------------------</option>
                          <?php $jenis_cipta = $this->db->query("SELECT * FROM jenis_cipta ORDER BY namacipta ASC")->result(); ?>
                            <?php foreach ($jenis_cipta as $pr) { ?>
                            <?php if($b['hc_type'] == 0) { ?>
                                <option value="<?php echo $pr->id_jta; ?>"><?php echo $pr->namacipta; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pr->id_jta; ?>" <?php echo ($pr->id_jta == $b['hc_type']) ? "selected" : ""; ?>>
                                    <?php echo $pr->namacipta; ?>
                                </option>
                            <?php }; ?>
                          <?php }; ?>
                         </select>
                                                        
                      </div> -->

                         <!--  <select name="xjta" class="form-control" required>
                            <option value="" disabled selected hidden>------------------------------- Jenis Ciptaan -------------------------------</option>
                              <?php 
                              foreach ($jta->result_array() as $k) :
                              $id_jta=$k['id_jta'];
                              $jenis_cipta=$k['jenis_cipta'];
                              ?>
                            <option value="<?php echo $id_jta;?>"><?php echo $jenis_cipta;?></option>
                             <?php endforeach; ?>
                            </select> -->

                          

                         

                     </div>
                    
                    <div class="col-md-6 pr-md-5">

                          <div class="form-group">
                            <label class="control-label">Tanggal Diumumkan:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> tanggal diumumkan untuk pertama kali.</small>
                            <input type="text" name="hc_tglhc" id="hc_tglhc" class="form-control" value="<?php if($b['hc_tglhc'] == "0000-00-00") { } else { echo $b['hc_tglhc']; }; ?>" data-date-format="yyyy-mm-dd" autocomplete="off">
                          </div>


                        <div class="form-group">
                            <label class="control-label">Tempat Diumumkan:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> tempat diumumkan untuk pertama kali di wilayah Indonesia atau di luar wilayah Indonesia (maksimal 200 karakter).</small>
                            <textarea name="hc_tempat" id="hc_tempat" class="form-control" rows="2" maxlength="200"><?php echo $b['hc_tempat']; ?></textarea>
                          </div> 
                       
                        <div class="form-group">
                            <label class="control-label">Uraian Ciptaan: (Wajib diisi).</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> Penjelasan dari Ciptaan baik dalam bentuk Filosofi, Sejarah, atau Bentuk Ciptaan.</small>
                            <textarea name="hc_uraian" id="hc_uraian" class="form-control" rows="14" maxlength="1000"><?php echo $b['hc_uraian']; ?></textarea>
                        </div>

                   </div>


                </div> <!-- End div row -->

               

            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
            
<!------------------------------------END FORM SECTION 6----------------------------------------->


<!----------------------------------------- FORM SECTION 1x ------------------------------------------->

              <?php if($b['hc_statusid'] == '1'):?>

              <div class="block-header block-header-default">
        
                 <a href="<?php echo site_url('admin/hakcipta/submit/'.$b['hc_id']);?>" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Kirim Usulan</a>    
        
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                <div class="col-md-12">
                    <div class="media intro-heading">
                        
                           
                        <div>
                            
                                                    
                        </div>
                    </div>
                </div>

                     
                   
                </div> <!-- End div row -->

                
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            

            </div> <!-- End div class block -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Usulan?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-footer">
    </div>
      <div class="modal-body">
    <p style="text-align:justify;">Harap cek kembali form usulan sebelum dikirim karena perubahan data tidak dapat dilakukan setelah usulan dikirim.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        <a href="<?php echo site_url('admin/hakcipta/submit/'.$b['hc_id']);?>" class="btn btn-danger">Kirim Usulan</a>      </div>
 
    </div>
  </div>
</div>        

       <?php endif;?>         
<!-----------------------------------------END FORM SECTION 1x----------------------------------------->

<!----------------------------------------- FORM SECTION 2x ------------------------------------------->
    <?php if($this->session->userdata('akses')=='1' && $b['hc_statusid'] == '2'):?>
              <div class="block-header block-header-default">
                 <a href="<?php echo site_url('admin/hakcipta/diproses/'.$b['hc_id']);?>" class="btn btn-success" data-toggle="modal" data-target="#proses">Usulan Diproses</a>
         
          </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                <div class="col-md-12">
                    <div class="media intro-heading">
                        
                           
                        <div class="media-body align-self-left" style="margin-left: -10px;">
                            
                           
                           
                        </div>
                    </div>
                </div>

                     
                   
                </div> <!-- End div row -->

                
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
<!-- Modal Diproses -->
<div class="modal fade" id="proses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usulan Diproses?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-footer">
    </div>
      <div class="modal-body">
    <ol start="1">
                            <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Harap dicek kembali form usulan yang telah lengkap sebelum diproses ke Ditjen KI.
                             </p>
                             </li> 
                <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Pastikan Aplikasi Whatsapp Telah <b>Aktif</b> (Komputer/Handphone).
                             </p>
                             </li> 
                            <li style="margin-left: -25px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan Format No. Handphone/Whatsapp Sudah Benar contoh: <b>6287712345678</b>.
                             </p>
                             </li>                            
                             </ol>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> -->
        <a href="<?php echo site_url('admin/hakcipta/view/'.$b['hc_id']);?>" class="btn btn-primary">Tutup</a>
        <a href="<?php echo site_url('admin/hakcipta/diproses/'.$b['hc_id']);?>" class="btn btn-danger" target="_blank">Diproses</a>      </div>
 
    </div>
  </div>
</div> 
        <?php endif;?>     
<!-----------------------------------------END FORM SECTION 1x----------------------------------------->
<!-- Modal Diajukan -->
<div class="modal fade" id="diajukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usulan Diajukan?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-footer">
    </div>
      <div class="modal-body">
<ol start="1">
                            <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Harap dicek kembali form usulan sebelum diteruskan ke Ditjen KI.
                             </p>
                             </li> 
                <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Pastikan Usulan telah mendapatkan Nomor Permohonan.
                             </p>
                             </li> 
                            <li style="margin-left: -25px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan Aplikasi Whatsapp Telah <b>Aktif</b> (Komputer/Handphone).</b>.
                             </p>
                             </li>                            
                             </ol>
    
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> -->
        <a href="<?php echo site_url('admin/hakcipta/view/'.$b['hc_id']);?>" class="btn btn-primary">Tutup</a>
        <a href="<?php echo site_url('admin/hakcipta/diajukan/'.$b['hc_id']);?>" class="btn btn-danger" target="_blank">Diajukan</a>      </div>
 
    </div>
  </div>
</div>

<!-- Modal Selesai -->
<div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usulan Selesai?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-footer">
    </div>
      <div class="modal-body">
<ol start="1">
                            <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Harap unggah terlebih dahulu sertifikat.
                             </p>
                             </li> 
                            <div class="form-group" style="margin-left: -16px;">
                            <label class="control-label">Unggah Sertifikat</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 2 MB. Format .pdf (Wajib diisi).</small>

                            <div>
                                <div class="row form-group" id="hc_cert">
                                 <label class="col-md-12">
                                    <?php if($b['hc_cert'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                          <input type="file" name="hc_cert" value="<?php echo $b['hc_cert']; ?>" id="hc_cert" class="btn custom-input-file"><br><a href="<?php echo base_url().'assets/images/'.$b['hc_cert'];?>"><?php echo $b['hc_cert']; ?></a>

                                        </div>
                                        <input type="hidden" name="kode" value="<?php echo $b['hc_id']; ?>">
                                        <button type="submit" name="sbm" value="selesai" class="btn btn-danger" style="margin-left: 16px;margin-top: 4px;">Unggah</button>
                                        <!-- <a href="<?php echo base_url().'admin/hakcipta/update_hc_cert'?>" class="btn btn-danger" style="margin-left: 16px;margin-top: 4px;">Unggah</a>  -->
                                </div>

                                </div>
                            <li style="margin-left: -12px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan Aplikasi Whatsapp Telah <b>Aktif</b> (Komputer/Handphone).</b>
                             </p>
                             </li>                            
                             </ol>
    
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> -->
        <?php if($b['hc_cert'] == "") { ?>
        <a href="<?php echo site_url('admin/hakcipta/view/'.$b['hc_id']);?>" class="btn btn-primary">Tutup</a>
        <?php } else { ?>
        <a href="<?php echo site_url('admin/hakcipta/viewcert/'.$b['hc_id']);?>" class="btn btn-primary">Tutup</a>
        <?php } ?>
        <?php if($b['hc_cert'] == "") { ?>
        <a href="<?php echo site_url('admin/hakcipta/selesai/'.$b['hc_id']);?>" class="btn btn-danger" target="_blank" hidden>Selesai</a></div>
        <?php } else { ?>
        <a href="<?php echo site_url('admin/hakcipta/selesai/'.$b['hc_id']);?>" class="btn btn-danger" target="_blank">Selesai</a></div>
        <?php } ?>
    </div>
  </div>
</div>

<!-- Modal Penolakan -->
<div class="modal fade" id="ditolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usulan Selesai?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-footer">
    </div>
      <div class="modal-body">
        
<ol start="1">
                            <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Harap unggah terlebih dahulu surat penolakan.
                             </p>
                             </li> 
                            <div class="form-group" style="margin-left: -16px;">
                            <label class="control-label">Unggah Surat Penolakan</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 2 MB. Format .pdf (Wajib diisi).</small>
                            
                            <div>
                                <div class="row form-group" id="hc_cert_cancel">
                                 <label class="col-md-12">
                                    <?php if($b['hc_cert_cancel'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                          <input type="file" name="hc_cert_cancel" value="<?php echo $b['hc_cert_cancel']; ?>" id="hc_cert_cancel" class="btn custom-input-file"><br><a href="<?php echo base_url().'assets/images/'.$b['hc_cert_cancel'];?>"><?php echo $b['hc_cert_cancel']; ?></a>

                                        </div>
                                        <input type="hidden" name="kode" value="<?php echo $b['hc_id']; ?>">
                                       
                                        <button type="submit" name="sbm" value="ditolak" class="btn btn-danger" style="margin-left: 16px;margin-top: 4px;">Unggah</button>
                                       
                                </div>

                                </div>
                            <li style="margin-left: -12px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan Aplikasi Whatsapp Telah <b>Aktif</b> (Komputer/Handphone).</b>
                             </p>
                             </li>                            
                             </ol>
    
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> -->
        <?php if($b['hc_cert_cancel'] == "") { ?>
        <a href="<?php echo site_url('admin/hakcipta/view/'.$b['hc_id']);?>" class="btn btn-primary">Tutup</a>
        <?php } else { ?>
        <a href="<?php echo site_url('admin/hakcipta/viewhccert_cancel/'.$b['hc_id']);?>" class="btn btn-primary">Tutup</a>
        <?php } ?>
        <?php if($b['hc_cert_cancel'] == "") { ?>
        <a href="<?php echo site_url('admin/hakcipta/ditolak/'.$b['hc_id']);?>" class="btn btn-danger" target="_blank" hidden>Ditolak</a></div>
        <?php } else { ?>
        <a href="<?php echo site_url('admin/hakcipta/ditolak/'.$b['hc_id']);?>" class="btn btn-danger" target="_blank">Ditolak</a></div>
        <?php } ?>
    </div>

  </div>
</div>



            </form>
            </div> <!-- End div class conten -->
           
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                         <a class="font-w600" href="https://klinikki.kemenperin.go.id" target="_blank">KLINIK KI</a>
                    </div>
                    <div class="float-left">
                        <a class="badge badge-pill badge-danger" href="<?php echo site_url('admin/dashboard');?>">Dashboard</a> &copy; <span class="js-year-copy"><?php echo date('Y');?></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->



        <!-- Codebase Core JS -->
        <script src="<?php echo base_url().'theme/new/vendor/aos/aos.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/popper.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.slimscroll.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.scrollLock.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.appear.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.countTo.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/js.cookie.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/codebase.js'?>"></script>
        <script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/dropify.min.js'?>"></script>
       
        <link href="<?php echo base_url();?>assets/front/vendors/jquery-circliful/css/jquery.circliful.css" rel="stylesheet">
        <script src="<?php echo base_url();?>assets/front/vendors/jquery-circliful/js/jquery.circliful.js"></script>
         <!-- bootstrap datepicker -->
        <script src="<?php echo base_url();?>assets/front/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <script src="<?php echo base_url();?>assets/front/vendors/jquery-validation/jquery.validate.min.js"></script>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>

         <!-- sweet alert 2 -->
        <script src="<?php echo base_url();?>assets/front/vendors/sweetalert2/sweetalert2.min.js"></script>
    
        <script src="<?php echo base_url();?>assets/front/vendors/bootstrap-fileupload/bootstrap-fileupload.js"></script>

        
        <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
        
        <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
        
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
        <script>
            $("#chartsFactsheet").circliful({
                animation: 1,
                animationStep: 15,
                foregroundBorderWidth: 30,
                backgroundBorderWidth: 30,
                backgroundColor: "#eee",
                foregroundColor: '#F12F2F',
                fillColor: '#ffffff',
                percent: <?php echo $b['persentase']; ?>,
                textSize: 100,
                percentageTextSize: 28,
                textAdditionalCss: 'font-weight: bold;',
                textColor: '#000000',
                fontColor: '#000000'
            });

            $("#chartsFactsheet-mobile").circliful({
                animation: 1,
                animationStep: 15,
                foregroundBorderWidth: 20,
                backgroundBorderWidth: 20,
                backgroundColor: "#eee",
                foregroundColor: '#F12F2F',
                fillColor: '#ffffff',
                percent: <?php echo $b['persentase']; ?>,
                textSize: 100,
                percentageTextSize: 22,
                textAdditionalCss: 'font-weight: bold;',
                textColor: '#000000',
                fontColor: '#000000'
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.dropify').dropify({
                    messages: {
                        default: 'Image 800 X 600 Pixels',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });

                $('.dropify2').dropify({
                    messages: {
                        default: 'Image 800 X 600 Pixels',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });

                if($('#hc_tglhc').length) {
                var date = new Date();
                var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                $('#hc_tglhc').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true,
                    autoclose: true
                });
                // $('#tgl_lahir').datepicker('setDate', today);
            }

            });
             
        </script>
        
        <script type="text/javascript">
    $(document).ready(function() {
        

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param) 
        });
        $("#form").validate({
            errorClass:'errorOne',
            rules: {
               
                hc_cert: {
                    accept: "pdf",
                    filesize: 2000000,
                    required: true
                    
                },
                hc_cert_cancel: {
                    accept: "pdf",
                    filesize: 2000000,
                    required: true
                    
                },
                  
            },
            messages: {                
                hc_cert: {
                    accept: "Silahkan unggah file dengan format .PDF",
                    filesize: "File maksimal 2 Mb.",
                    required: "Tidak ada file yang Diunggah"
                },
                hc_cert_cancel: {
                    accept: "Silahkan unggah file dengan format .PDF",
                    filesize: "File maksimal 2 Mb.",
                    required: "Tidak ada file yang Diunggah"
                },
            },
            
        });
        

       
    }); 
</script>
        
        <script type="text/javascript">
            $(function() {
                $.ajaxSetup({
                    type:"POST",
                    url: "<?php echo base_url('admin/hakcipta/get_kabupaten'); ?>",
                    cache: false,
                });

                $("#id_prov_perusahaan").change(function() {
                    var value = $(this).val();
                    if(value > 0) {
                        $.ajax({
                            data: { id:value },
                            success: function(respond) {
                                $("#id_kab_perusahaan").html(respond);
                            }
                        })
                    }
                })
            });
        </script>
 <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#mytable').DataTable();

                //Show Konfirmasi modal hapus record
                $('.btn-hapus').on('click',function(){
                    var id=$(this).data('id');
                    $('#Modalhapus').modal('show');
                    $('[name="kode2"]').val(id);
                });  

            });
        </script>
            

            <?php if($this->session->flashdata('msg')=='error'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Password dan Confirm Password yang Anda masukan tidak sama.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 3000,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>

            <?php elseif($this->session->flashdata('msg')=='noper'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Nomor Permohonan Belum Ada.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: 'orange'
                    });
            </script>

             <?php elseif($this->session->flashdata('msg')=='sendmail'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Email Notifikasi Terkirim.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>  

            <?php elseif($this->session->flashdata('msg')=='warning'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Gambar yang Anda masukan terlalu besar.",
                        showHideTransition: 'slide',
                        icon: 'warning',
                        hideAfter: 3000,
                        position: 'bottom-right',
                        bgColor: '#FFC017'
                    });
            </script>

            <?php elseif($this->session->flashdata('msg')=='sudahada'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Email sudah terdaftar.",
                        showHideTransition: 'plain',
                        icon: 'warning',
                        hideAfter: 3000,
                        position: 'bottom-right',
                        bgColor: '#FFC017'
                    });
            </script>

        <?php elseif($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Pengguna Berhasil disimpan ke database.",
                        showHideTransition: 'fade',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='bates-input'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Kuota permohonan Hak Cipta anda sudah habis.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 3000,
                        position: 'bottom-right',
                        bgColor: 'orange'
                    });
            </script>
       
        <?php elseif($this->session->flashdata('msg')=='gagal-submit'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Submit Gagal, Usulan Anda belum lengkap. Cek kembali usulan anda.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: 'orange'
                    });
            </script>

       <?php elseif($this->session->flashdata('msg')=='bates-input10'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Akun anda hanya bisa input maksimal 10 kali pendafaran.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 3000,
                        position: 'bottom-right',
                        bgColor: 'orange'
                    });
            </script>
       

        <?php elseif($this->session->flashdata('msg')=='info'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Info',
                        text: "Pengguna berhasil di update",
                        showHideTransition: 'slide',
                        icon: 'info',
                        hideAfter: 3000,
                        position: 'bottom-right',
                        bgColor: '#00C9E6'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Pengguna Berhasil dihapus.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 3000,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
            <script type="text/javascript">
                    $('#ModalResetPassword').modal('show');
            </script>
        <?php else:?>

        <?php endif;?>

    </body>
</html>