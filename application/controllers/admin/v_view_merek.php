<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Add Merek</title>

        <meta name="description" content="">
        <meta name="author" content="VR">
        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

        <!-- END Icons -->
<!-- bootstrap -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
           
        <!-- bootstrap fileupload -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet">

        <!-- bootstrap datepicker -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropify.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">
        

   


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
                                    <a class="link-effect font-w700" href="<?php echo base_url().'admin/dashboard'?>">
                                        <i class="text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">VR</span><span class="font-size-xl text-success">DEVELOPMENT</span>
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
            <?php echo $this->load->view('admin/header.php');?>
            <!-- END Header -->
            <?php 
                $b=$vmerek->row_array();
            ?>
            <!-- Main Container -->
            <main id="main-container">
             <!-- Page Content -->
            <div class="content"> <!-- div class conten -->
            
            <form method="post" id="form-edit-data" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:center;">FORMULIR PERMOHONAN PENDAFTARAN MEREK</h2>
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                <div class="col-md-6 pr-md-5 text-center">
                    <div class="media intro-heading align-self-center">
                        <div class="media-body align-self-center">
                            <h3 class="font-weight-bold">Selamat Datang</h3><h4>Hi, <?php echo $b['merek_nama'];?></h4>
                            <a class="img-link" href="#">
                                 <img  style="width:150px;height:150px;" src="<?php echo base_url().'assets/images/'.$b['merek_photo'];?>" alt="">
                            </a> 
                            <br>
                           <a href="<?php echo site_url('admin/merek/viewmerek1/'.$b['merek_id']);?>" class="btn btn-primary">Edit Formulir Permohonan</a>
                                
                           
                        </div>
                    </div>
                </div>

                    <div class="col-md-6 pr-md-5 mt-10">
                        <div class="form-group">
                            <label class="control-label">Tanggal Pengajuan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_register'];?>" class="form-control" readonly>
                        </div>

                         <div class="form-group">
                            <label class="control-label">Tanggal Penerimaan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $get_user->nama_perusahaan; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                        <label class="control-label">No. Ref. Pemohon:*<small>(jika ada)</small></label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $get_user->nama_perusahaan; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nomor Permohonan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $get_user->nama_perusahaan; ?>" class="form-control">
                        </div>

                    </div>

                   
                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
<!-----------------------------------------END FORM SECTION 1----------------------------------------->



<!------------------------------------------ FORM SECTION 2------------------------------------------->      

            <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">IDENTITAS PEMOHON</h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Nama Pengusul:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Bentuk Badan Usaha</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                 <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jkl" value="L" <?php echo ($get_user->jenis_kelamin == 'L') ? "checked" : ""; ?>>
                                <label class="custom-control-label" for="jkl">Perorangan</label>
                                </div>
                                
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="jenis_kelamin" id="jkp" value="P" <?php echo ($get_user->jenis_kelamin == 'P') ? "checked" : ""; ?>>
                                    <label class="custom-control-label" for="jkp">Badan Hukum</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kewarganegaraan:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara Pendirian:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                        </div>


                   </div>
                    
                    <div class="col-md-6 pr-md-5">
                       
                        <div class="form-group">
                            <label class="control-label">Provinsi Domisili Perusahaan</label>
                         <select name="id_prov_perusahaan" id="id_prov_perusahaan" class="form-control opt1hid">
                         <option value="" disabled selected hidden>Pilih Provinsi</option>
                          <?php $provinsi = $this->db->query("SELECT * FROM tb_provinsi ORDER BY nama ASC")->result(); ?>
                            <?php foreach ($provinsi as $pr) { ?>
                            <?php if($get_user->id_prov_perusahaan == 0) { ?>
                                <option value="<?php echo $pr->id; ?>"><?php echo $pr->nama; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pr->id; ?>" <?php echo ($pr->id == $get_user->id_prov_perusahaan) ? "selected" : ""; ?>>
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
                             <option value="<?php echo $kb->id; ?>" <?php echo ($kb->id == $get_user->id_kab_perusahaan) ? "selected" : ""; ?>>
                                 <?php echo $kb->nama; ?>
                             </option>
                              <?php }; ?>
                             </select>
                        </div>
        

                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>


                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->

<!-- ---------------------------------- END FORM SECTION 2------------------------------------------->



<!-------------------------------------- FORM SECTION 3 --------------------------------------------->      

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
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Provinsi Domisili Perusahaan</label>
                         <select name="id_prov_perusahaan" id="id_prov_perusahaan" class="form-control opt1hid">
                         <option value="" disabled selected hidden>Pilih Provinsi</option>
                          <?php $provinsi = $this->db->query("SELECT * FROM tb_provinsi ORDER BY nama ASC")->result(); ?>
                            <?php foreach ($provinsi as $pr) { ?>
                            <?php if($get_user->id_prov_perusahaan == 0) { ?>
                                <option value="<?php echo $pr->id; ?>"><?php echo $pr->nama; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $pr->id; ?>" <?php echo ($pr->id == $get_user->id_prov_perusahaan) ? "selected" : ""; ?>>
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
                             <option value="<?php echo $kb->id; ?>" <?php echo ($kb->id == $get_user->id_kab_perusahaan) ? "selected" : ""; ?>>
                                 <?php echo $kb->nama; ?>
                             </option>
                              <?php }; ?>
                             </select>
                        </div>


                   </div>
                    
                    <div class="col-md-6 pr-md-5">
                       
                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>


                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
<!-- ---------------------------------- END FORM SECTION 3------------------------------------------->      

<!-------------------------------------- FORM SECTION 4 --------------------------------------------->      

             <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">IDENTITAS KUASA</h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                                               
                        <div class="form-group">
                            <label class="control-label">Nama Kuasa:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">No. Konsultan:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama Kantor:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        
                   </div>
                    
                    <div class="col-md-6 pr-md-5">
                       
                        <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Telepon:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Fax:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>


                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
<!-- ---------------------------------- END FORM SECTION 4------------------------------------------->



<!----------------------------------------- FORM SECTION 5 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">KLAIM PRIORITAS</h2>
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-4 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Tanggal Prioritas:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $get_user->nama_perusahaan; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Negara/Kantor Merek:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $get_user->nama_perusahaan; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Nomor Prioritas:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $get_user->nama_perusahaan; ?>" class="form-control">
                        </div>
                    </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
<!-----------------------------------------END FORM SECTION 5----------------------------------------->



<!----------------------------------------- FORM SECTION 6 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">SPESIFIKASI MEREK</h2>
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
                                                <input class="custom-control-input" type="radio" name="typemerek" id="merekkata1" value="merekkata"     <?php echo ($get_user->komersial == 'merekkata') ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="merekkata1">Merek kata</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="lukisan1" value="lukisan" <?php echo ($get_user->komersial == 'lukisan') ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="lukisan1">Merek lukisan/logo</label>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="melugo1" value="melugo" <?php echo ($get_user->komersial == 'melugo') ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="melugo1">Merek kata + lukisan/logo</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="metidi1" value="metidi" <?php echo ($get_user->komersial == 'metidi') ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="metidi1">Merek tiga dimensi</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="mersu1" value="mersu" <?php echo ($get_user->komersial == 'mersu') ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="mersu1">Merek suara</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="merholo1" value="merholo" <?php echo ($get_user->komersial == 'merholo') ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="merholo1">Merek hologram</label>
                                            </div>
                                       </div>
                           </div>

                          <div class="form-group">
                            <label class="control-label">Merek Terjemahan:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> Terjemahan jika merek menggunakan istilah asing (maksimal 300 karakter).</small>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                          </div> 

                          <div class="form-group">
                            <label class="control-label">Transliterasi/pengucapan:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> jika merek menggunakan karakter huruf non-latin (maksimal 300 karakter).</small>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                          </div>                        
                        
                           <div class="form-group">
                            <label class="control-label">Unsur warna dalam merek:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                          </div> 

                     </div>
                    
                    <div class="col-md-6 pr-md-5">
                       
                        <div class="form-group">
                            <label class="control-label">Gambar Label Merek</label>
                            <input type="file" name="filefoto" class="dropify2" data-height="230" data-default-file="<?php echo base_url().'assets/images/'.$b['merek_photo'];?>">
                            <small class="text-note"><i class="fa fa-info-circle"></i> Max Size 1.5 Mb. &nbsp;Format file .png/.jpg/.jpeg.</small>
                        </div>

                         <div class="form-group">
                            <label class="control-label">Nama Merek:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Deskripsi Merek:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                        </div>
                       

                        <div class="form-group">
                            <label class="control-label">Fax:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama'];?>" class="form-control">
                        </div>


                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
<!-----------------------------------------END FORM SECTION 6----------------------------------------->



<!----------------------------------------- FORM SECTION 7 -------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">JENIS BARANG DAN/ATAU JASA</h2>
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-1 pr-md-1">
                        <div class="form-group">
                            <label class="control-label">Kelas:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $get_user->nama_perusahaan; ?>" class="form-control">
                        </div>
                    </div>
                    


                    <div class="col-md-11 pr-md-1">
                        <div class="form-group">
                            <label class="control-label">Deskripsi Jenis Barang dan/atau Jasa:</label><br>
                            
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                        </div>

                    </div>

                    <div class="col-md-1 pr-md-1">
                        <div class="form-group">
                            <label class="control-label">Kelas:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $get_user->nama_perusahaan; ?>" class="form-control">
                        </div>
                    </div>
                    


                    <div class="col-md-11 pr-md-1">
                        <div class="form-group">
                            <label class="control-label">Deskripsi Jenis Barang dan/atau Jasa:</label><br>
                            
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $get_user->deskripsi_produk; ?></textarea>
                        </div>

                    </div>

                    
                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
<!-----------------------------------------END FORM SECTION 7----------------------------------------->



            </form>
            </div> <!-- End div class conten -->
           
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Created with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://vr.com" target="_blank">VR</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://vr.com" target="_blank">VR</a> &copy; <span class="js-year-copy"><?php echo date('Y');?></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->



        <!-- Codebase Core JS -->
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('.dropify').dropify({
                    messages: {
                        default: 'Image 230 X 230 Pixels',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });

                $('.dropify2').dropify({
                    messages: {
                        default: 'Image 230 X 230 Pixels',
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


    </body>
</html>