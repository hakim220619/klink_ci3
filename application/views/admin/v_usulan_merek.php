<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>View Merek</title>

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
                                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
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
                                    <a href="<?php echo base_url()?>">
                                        <!-- <i class="text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">KLINIK KI</span><span class="font-size-xl text-success"></span> -->
                                        <img src="<?php echo base_url().'theme/new/img/logoki03.png'?>" style="width: 116px;height: auto;margin-top: -8px;" alt="">
                                    </a>                                </div>
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
                
                $b=$vmerek->row_array();
                
                if ($vmerek->num_rows() < 1) {
                    redirect('admin/merek');
                }
            ?>

            <!-- Main Container -->
            <main id="main-container">
             <!-- Page Content -->
            <div class="content"> <!-- div class conten -->
            
            <form method="post" id="form-edit-data" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align: center;"><b>PRATINJAU PENDAFTARAN MEREK</b></h2>
                 <!-- <h2 class="block-title" style="text-align:right;"><b>(Form Isian 1 - 3)</b></h2> -->
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                <div class="col-md-6 pr-md-5 text-center">
                    <div class="media intro-heading align-self-center">
                        
                           
                        <div class="media-body align-self-left">
                            <h4 style="margin-bottom: -10px;"><span style="text-transform:uppercase"><?php echo $b['status_nama']; ?></h4>
                            <div id="chartsFactsheet" style="width: 45%;"></div>
                                                      
                        </div>
                    </div>
                </div>

                    <div class="col-md-6 pr-md-5 mt-10">
                        <div class="form-group">
                            <label class="control-label">Tanggal Pengajuan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_tgl_pengajuan']; ?>" class="form-control" readonly>
                        </div>

                         <!-- <div class="form-group">
                            <label class="control-label">Tanggal Penerimaan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_tgl_penerimaan']; ?>" class="form-control">
                        </div> -->
                        

                        <div class="form-group">
                            <label class="control-label">Nomor Permohonan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_no_permohonan']; ?>" class="form-control">
                        </div>

                        

                    </div>

                     
                   
                </div> <!-- End div row -->


            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
<!-----------------------------------------END FORM SECTION 1----------------------------------------->




<!------------------------------------------ FORM SECTION 2------------------------------------------->      

            <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">IDENTITAS IKM</h2>
                 <h2 class="block-title" style="text-align:right;"><b>(Form Isian 2 - 3)</b></h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Nama Lengkap:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Bentuk Badan Usaha</label>
                            <div>
                                <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                <input class="custom-control-input" type="radio" name="bentukbb" id="bbup" value="Perorangan" <?php echo $b['merek_badan_usaha'] == 'Perorangan' ? "checked" :""; ?>>
                                <label class="custom-control-label" for="bbup">Perorangan</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="bentukbb" id="bbub" value="Badan Hukum" <?php echo $b['merek_badan_usaha'] == 'Badan Hukum' ? "checked" : ""; ?>>
                                <label class="custom-control-label" for="bbub">Badan Hukum</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama Perusahaan/IKM:</label>
                            <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi.)</small>
                            <input type="text" name="merek_perusahaan" id="merek_perusahaan" value="<?php echo $b['merek_perusahaan']; ?>" class="form-control" required oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')">
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label">Kewarganegaraan:</label>
                                <input type="text" name="merek_warga" id="merek_warga" value="<?php echo $b['merek_warganegara']; ?>" class="form-control">
                        </div>
 -->
                        <!-- <div class="form-group">
                            <label class="control-label">Negara Pendirian:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_negarapendiri']; ?>" class="form-control">
                        </div> -->
                       
                        <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_alamat']; ?></textarea>
                        </div>                           

                   </div>
                    
                    <div class="col-md-6 pr-md-5">
                        
                        
                        
                        <div class="form-group">
                            <label class="control-label">Provinsi Domisili Perusahaan</label>
                         <select name="id_prov_perusahaan" id="id_prov_perusahaan" class="form-control opt1hid">
                         <option value="" disabled selected hidden>Pilih Provinsi</option>
                          <?php $provinsi = $this->db->query("SELECT * FROM tb_provinsi ORDER BY nama ASC")->result(); ?>
                            <?php foreach ($provinsi as $pr) { ?>
                            <?php if($b['merek_idprovinsi'] == 0) { ?>
                                <option value="<?php echo $pr->id; ?>"><?php echo $pr->nama; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pr->id; ?>" <?php echo ($pr->id == $b['merek_idprovinsi']) ? "selected" : ""; ?>>
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
                             <option value="<?php echo $kb->id; ?>" <?php echo ($kb->id == $b['merek_idkabkota']) ? "selected" : ""; ?>>
                                 <?php echo $kb->nama; ?>
                             </option>
                              <?php }; ?>
                             </select>
                        </div>
        

                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="merek_kdps" id="merek_kdps" value="<?php echo $b['merek_kodepos']; ?>" class="form-control">
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="merek_negara" id="merek_negara" value="<?php echo $b['merek_negara']; ?>" class="form-control">
                        </div> -->

                        <div class="form-group">
                            <label class="control-label">No. Telp:</label>
                                <input type="text" name="no_tlp" id="no_tlp" value="<?php echo $b['merek_nohp']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email:</label>
                                <input type="text" name="merek_email" id="merek_email" value="<?php echo $b['merek_email']; ?>" class="form-control">
                        </div>

                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->

<!-- -------------------------------- END FORM SECTION 2----------------------------------------->



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
                            <textarea name="merek_alamatsurat" id="merek_alamatsurat" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_alamatsurat']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Provinsi</label>
                                <input type="text" name="merek_provsurat" id="merek_provsurat" value="<?php echo $b['merek_provsurat']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kabupaten Kota:</label>
                                <input type="text" name="merek_kabkotasurat" id="merek_kabkotasurat" value="<?php echo $b['merek_kabkotasurat']; ?>" class="form-control">
                        </div>

                    </div>
                    
                    <div class="col-md-6 pr-md-5">
                       
                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="merek_kodepossurat" id="merek_kodepossurat" value="<?php echo $b['merek_kodepossurat']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="merek_negarasurat" id="merek_negarasurat" value="<?php echo $b['merek_negarasurat']; ?>" class="form-control">
                        </div>


                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
<!-- -------------------------------- END FORM SECTION 3----------------------------------------->      





<!----------------------------------------- FORM SECTION 6 ------------------------------------------->

               <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">DETAIL MEREK</h2>
                 <h2 class="block-title" style="text-align:right;"><b>(Form Isian 3 - 3)</b></h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                     <div class="col-md-6 pr-md-5">
                                               
                            <div class="form-group">
                                        <label class="control-label">Tipe Merek :</label>

                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="merekkata1" required value="Merek Kata" <?php echo $b['merek_type'] == 'Merek Kata' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="merekkata1">Merek kata</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="lukisan1"  value="Merek lukisan/logo" <?php echo $b['merek_type'] == 'Merek lukisan/logo' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="lukisan1">Merek lukisan/logo</label>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="melugo1" value="Merek kata + lukisan/logo" <?php echo $b['merek_type'] == 'Merek kata + lukisan/logo' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="melugo1">Merek kata + lukisan/logo</label>
                                            </div>
                                        </div>
                                        
                                        <!-- <div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="typemerek" id="metidi1" value="Merek tiga dimensi" <?php echo $b['merek_type'] == 'Merek tiga dimensi' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="metidi1">Merek tiga dimensi</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="typemerek" id="mersu1" value="Merek suara" <?php echo $b['merek_type'] == 'Merek suara' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="mersu1">Merek suara</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="typemerek" id="merholo1" value="Merek hologram" <?php echo $b['merek_type'] == 'Merek hologram' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="merholo1">Merek hologram</label>
                                            </div>
                                       </div> -->
                           </div>

                          <div class="form-group">
                            <label class="control-label">Merek Terjemahan:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> Terjemahan jika merek menggunakan istilah asing (maksimal 300 karakter).</small>
                            <textarea name="rekter" id="rekter" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_terjemahan']; ?></textarea>
                          </div> 

                          <div class="form-group">
                            <label class="control-label">Transliterasi/pengucapan:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> jika merek menggunakan karakter huruf non-latin (maksimal 300 karakter).</small>
                            <textarea name="transli" id="transli" class="form-control" rows="3" maxlength="300"><?php echo $b['merek_pengucapan']; ?></textarea>
                          </div>                        
                        
                           <div class="form-group">
                            <label class="control-label">Unsur warna dalam merek:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="unsurwarna" id="unsurwarna" required class="form-control" rows="7" maxlength="300"><?php echo $b['merek_unsurwarna']; ?></textarea>
                          </div> 

                          <div class="form-group">
                            <label class="control-label">Nama Merek:</label>
                                <input type="text" name="mereknama" id="mereknama" value="<?php echo $b['merek_namamerek']; ?>" class="form-control">
                          </div>

                     </div>
                    
                   <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Gambar Label Merek</label>
                            <div><small class="text-note font-12">*Max Size 1MB. &nbsp;Format file .png/.jpg/.jpeg. (Wajib diisi).</small></div>

                            <div class="fileupload fileupload-new file_photo_perusahaan_feed" data-provides="fileupload">
                            <div class="fileupload-new thumbnail">
                            <?php if ($b['merek_gambarmerek'] == "") { ?>
                            <img src="<?php echo base_url();?>assets/images/noimage2.png" alt="" class="img-fluid img-circle" style="max-height: 115px;"/>
                            <?php } else { ?>
                            <img src="<?php echo base_url();?>assets/images/<?php echo $b['merek_gambarmerek']; ?>" alt="" class="img-fluid" style="max-height: 105px;"/><?php }; ?>
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: auto; max-height: 100px;"></div>
                            <div>
                            <!-- <span class="btn btn-sm btn-info btn-file">
                            <span class="fileupload-new"><i class="fa fa-picture-o"></i> Pilih Gambar</span>
                            <span class="fileupload-exists"><i class="fa fa-picture-o"></i> Ganti</span>
                            <input type="file" name="gambarlabel" id="gambarlabel"> -->
                            <input type="hidden" name="gambarlabel_old" value="<?php echo $b['merek_gambarmerek']; ?>">
                            </span>
                            <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">
                            <i class="fa fa-trash-o"></i> Hapus
                            </a>
                            <a href="<?php echo base_url().'assets/images/'.$b['merek_gambarmerek'];?>"><?php echo $b['merek_gambarmerek']; ?></a>
                            </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label">Gambar Label Merek</label>
                            <input type="file" name="filefoto" class="dropify2" data-height="230" data-default-file="<?php echo base_url().'assets/images/'.$b['merek_gambarmerek'];?>">
                            <small class="text-note"><i class="fa fa-info-circle"></i> Max Size 1.5 Mb. &nbsp;Format file .png/.jpg/.jpeg.</small>
                        </div> -->

                         

                        <div class="form-group">
                            <label class="control-label">Deskripsi Merek:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="deskmerek" id="deskmerek" class="form-control" rows="3" maxlength="300"><?php echo $b['merek_deskripsi']; ?></textarea>
                        </div>

                        
                        <!-- <div class="form-group">
                            <label class="control-label">Kelas Barang Jasa:</label><br>
                             <select name="xjta" id="xjta" class="form-control opt1hid" required>
                         <option value="" disabled selected hidden>---------------------------- Kelas Barang Jasa -------------------------------</option>
                          <?php $kelas = $this->db->query("SELECT * FROM kelas ORDER BY id ASC")->result(); ?>
                            <?php foreach ($kelas as $kl) { ?>
                            <?php if($b['merek_kelasid'] == 0) { ?>
                                <option value="<?php echo $kl->id; ?>"><?php echo $kl->kelas; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $kl->id; ?>" <?php echo ($kl->id == $b['merek_kelasid']) ? "selected" : ""; ?>>
                                    <?php echo $kl->kelas; ?>
                                </option>
                            <?php }; ?>
                          <?php }; ?>
                         </select>
                                                        
                      </div> -->
                        
                        <div class="form-group">
                            <label class="control-label">Keterangan Produk:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> Penjelasan mendetail mengenai produk termasuk bentuk dan bahan baku. maksimal 300 karakter (Wajib diisi).</small>
                            <textarea name="kelas" id="kelas" class="form-control" rows="7" maxlength="600" required oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')"><?php echo $b['merek_kelas']; ?></textarea>
                        </div> 
                        <!-- <div class="form-group">
                            <label class="control-label">Jenis Barang/Jasa:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="merek_kelas" id="merek_kelas" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_kelas']; ?></textarea>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label">Unggah Foto Tanda Tangan</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 1MB. Format .Jpeg/jpg (Wajib diisi).</small>

                            <div class="mt-2">
                                <div class="row form-group" id="merek_file_ttd">
                                 <label class="col-md-12">
                                    <?php if($b['merek_file_ttd'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                    <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                            <img src="<?php echo base_url().'assets/images/user/'.$b['merek_file_ttd'];?>" alt="" class="img-fluid" style="max-height: 105px;"/><br>
                            <a href="<?php echo base_url().'assets/images/user/'.$b['merek_file_ttd'];?>"><?php echo $b['merek_file_ttd']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                    </div>
                   </div>

                   </div>
                   </div>
                   </div>
                </div> <!-- End div row -->

                
            
<!------------------------------------END FORM SECTION 6----------------------------------------->





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
            });
             
        </script>
        <script type="text/javascript">
          $(function () {
            CKEDITOR.replace( 'ckeditor' ,{
                height: '200px',
                extraPlugins : 'syntaxhighlight',        
                toolbar: [
                     ['Source'] ,
                     ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','Image','-','Blockquote','-','Styles','-','Format','-','FontSize']
                   ]              
            });
          });
        </script>
        
        <script type="text/javascript">
            $(function() {
                $.ajaxSetup({
                    type:"POST",
                    url: "<?php echo base_url('admin/merek/get_kabupaten'); ?>",
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

    <?php if($this->session->flashdata('msg')=='error'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Password dan Confirm Password yang Anda masukan tidak sama.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>

            <?php elseif($this->session->flashdata('msg')=='warning'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Gambar yang Anda masukan terlalu besar.",
                        showHideTransition: 'slide',
                        icon: 'warning',
                        hideAfter: 4000,
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
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#FFC017'
                    });
            </script>

        <?php elseif($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Submit berhasil.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
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

        <?php elseif($this->session->flashdata('msg')=='bates-input'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Kuota permohonan Hak Cipta anda sudah habis.",
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
                        hideAfter: 4000,
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
                        hideAfter: 4000,
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
                        hideAfter: 4000,
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