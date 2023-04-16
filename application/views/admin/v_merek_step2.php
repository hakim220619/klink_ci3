<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Merek - Step 2</title>

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
        

        <!-- bootstrap datepicker -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropify.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">
        

        <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
         <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
   
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet">
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
                                    <a href="<?php echo base_url() ?>">
                                        <!-- <i class="text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">KLINIK KI</span><span class="font-size-xl text-success"></span> -->
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
                $b=$vmerek->row_array();
            ?>

            

            <!-- Main Container -->
            <main id="main-container">
             <!-- Page Content -->
            <div class="content"> <!-- div class conten -->
            
            <form action="<?php echo base_url().'admin/merek/update_merek2'?>" id="form" method="post" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

               <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">DATA PEMOHON</h2>
                 <h2 class="block-title" style="text-align:right;"><b>Form Isian </b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp; </h2>
<a href="<?php echo base_url()."admin/merek/viewmerek1/".$b['merek_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 1 </a>
<a href="<?php echo base_url()."admin/merek/viewmerek2/".$b['merek_id'];?>" class="badge badge-primary badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 2 </a>
<a href="<?php echo base_url()."admin/merek/viewmerek5/".$b['merek_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 3 </a>

             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Nama Pemohon:</label>
                            <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi.)</small>
                            <input type="text" name="nama_pengusul" id="nama_pengusul" value="<?php echo $b['merek_nama']; ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Bentuk Badan Usaha</label>
                            <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi.)</small>
                            <div>
                                <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                <input class="custom-control-input" type="radio" name="bentukbb" id="bbup" value="Perorangan" <?php echo $b['merek_badan_usaha'] == 'Perorangan' ? "checked" :""; ?> required>
                                <label class="custom-control-label" for="bbup">Perorangan</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="bentukbb" id="bbub" value="Badan Hukum" <?php echo $b['merek_badan_usaha'] == 'Badan Hukum' ? "checked" : ""; ?> required>
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
                                <input type="text" name="merek_warga" id="merek_warga" value="<?php echo $b['merek_warganegara']; ?>" class="form-control" required>
                        </div> -->

                        <!-- <div class="form-group">
                            <label class="control-label">Negara Pendirian:</label>
                                <input type="text" name="merek_negaraPen" id="merek_negaraPen" value="<?php echo $b['merek_negarapendiri']; ?>" class="form-control">
                        </div> -->
                        
                        <div class="form-group">

                                        <label class="control-label">Surat Keterangan Usaha :</label>
                                        <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi).</small>
                                        <div class="row">
                                        <div class="col-sm-3 pr-sm-5">
                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typeusaha" id="iumk1" required value="IUMK" <?php echo $b['merek_ketusaha'] == 'IUMK' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="iumk1">IUMK</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typeusaha" id="nib1"  value="NIB" <?php echo $b['merek_ketusaha'] == 'NIB' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="nib1">NIB</label>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typeusaha" id="tdi1" value="TDI" <?php echo $b['merek_ketusaha'] == 'TDI' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="tdi1">TDI</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="typeusaha" id="iui1" value="IUI" <?php echo $b['merek_ketusaha'] == 'IUI' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="iui1">IUI</label>
                                            </div>
                                        </div>

                                        </div>

                                        <div class="col-sm-9 pr-sm-5">
                                        <div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="typeusaha" id="siup1" value="SIUP" <?php echo $b['merek_ketusaha'] == 'SIUP' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="siup1">SIUP</label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="typeusaha" id="kop1" value="KOPERASI" <?php echo $b['merek_ketusaha'] == 'KOPERASI' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="kop1">Koperasi</label>
                                            </div>
                                       </div> 
                                       <div>
                                            <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="typeusaha" id="lainnya1" value="BENTUK KETERANGAN USAHA LAINNYA" <?php echo $b['merek_ketusaha'] == 'BENTUK KETERANGAN USAHA LAINNYA' ? "checked" : ""; ?>>
                                                <label class="custom-control-label" for="lainnya1">Bentuk Keterangan Usaha Lainnya</label>
                                            </div>
                                       </div>
                                       </div>

                                       
                                       </div>
                                       </div>

                    <div class="form-group">
                            <label class="control-label">Unggah Surat Keterangan Usaha</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 2 Mb. Format .pdf (Wajib diisi).</small>

                            <div class="mt-2">
                                <div class="row form-group" id="merek_fileketusaha">
                                 <label class="col-md-12">
                                    <?php if($b['merek_fileketusaha'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                        <?php if($b['merek_fileketusaha'] == "") { ?>
                                          <input type="file" name="merek_fileketusaha" value="<?php echo $b['merek_fileketusaha']; ?>" id="merek_fileketusaha" class="btn custom-input-file" required>
                                          <?php } else { ?>
                                          <input type="file" name="merek_fileketusaha" value="<?php echo $b['merek_fileketusaha']; ?>" id="merek_fileketusaha" class="btn custom-input-file">
                                          <?php } ?>
                                          <a href="<?php echo base_url().'assets/images/'.$b['merek_fileketusaha'];?>"><?php echo $b['merek_fileketusaha']; ?></a>
                                        </div>
                                </div>

                        </div>       
                        </div>

                   
                    <div class="form-group">
                        <label class="control-label">Unggah Kartu Tanda Penduduk (KTP)</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 2 MB. Format .pdf/jpg/jpeg/png (Wajib diisi).</small>

                            <div class="mt-2">
                                <div class="row form-group" id="merek_ktp">
                                 <label class="col-md-12">
                                    <?php if($b['merek_ktp'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                        <?php if($b['merek_fileketusaha'] == "") { ?>
                                          <input type="file" name="merek_ktp" value="<?php echo $b['merek_ktp']; ?>" id="merek_ktp" class="btn custom-input-file" required>
                                          <?php } else { ?>
                                          <input type="file" name="merek_ktp" value="<?php echo $b['merek_ktp']; ?>" id="merek_ktp" class="btn custom-input-file">
                                          <?php } ?>
                                          <a href="<?php echo base_url().'assets/images/'.$b['merek_ktp'];?>"><?php echo $b['merek_ktp']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                        
                    </div>



                   


                   </div>



                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                        <label class="control-label">Unggah Surat Pernyataan.</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Maksimal file 2 MB. Format .pdf, format surat dapat diunduh<a href="<?php echo base_url().'theme/images/SrtPernyataanIKM.docx';?>"> disini</a> (Wajib diisi).</small>

                            <div class="mt-2">
                                <div class="row form-group" id="merek_srtpernyataan">
                                 <label class="col-md-12">
                                    <?php if($b['merek_srtpernyataan'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                        <?php if($b['merek_srtpernyataan'] == "") { ?>
                                        <input type="file" name="merek_srtpernyataan" value="<?php echo $b['merek_srtpernyataan']; ?>" id="merek_srtpernyataan" class="btn custom-input-file" required>
                                          <?php } else { ?>
                                        <input type="file" name="merek_srtpernyataan" value="<?php echo $b['merek_srtpernyataan']; ?>" id="merek_srtpernyataan" class="btn custom-input-file">
                                        <?php } ?>
                                        <a href="<?php echo base_url().'assets/images/'.$b['merek_srtpernyataan'];?>"><?php echo $b['merek_srtpernyataan']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                        
                    </div>  
                         <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter (Wajib diisi).</small>
                            <textarea name="merek_almt" id="merek_almt" class="form-control" rows="4" maxlength="300" required oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')"><?php echo $b['merek_alamat']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Provinsi</label>
                         <select name="id_prov_perusahaan" required id="id_prov_perusahaan" class="form-control opt1hid">
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
                                <label class="control-label">Kabupaten/Kota</label>
                             <select name="id_kab_perusahaan" required id="id_kab_perusahaan" class="form-control opt1hid">
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

                       <!--  <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="merek_negara" id="merek_negara" value="<?php echo $b['merek_negara']; ?>" class="form-control">
                        </div> -->


                   </div>


                </div> <!-- End div row -->

                 <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="hidden" name="kode" value="<?php echo $b['merek_id']; ?>" required>
                            <!-- <a href="<?php echo base_url()."admin/merek/update_merek2/".$b['merek_id'];?>" class="btn btn-primary btn-sm pull-left" style="width: 70px;margin-left: 2px !important;">simpan</a> -->
                            <button type="submit" class="btn btn-primary btn-sm pull-left" style="width: 70px;margin-left: 2px;">Simpan</button>
                            <button type="submit" class="btn btn-danger btn-sm pull-right" style="width: 70px;margin-left: 2px;">Lanjut</button>
                            <a href="<?php echo base_url()."admin/merek/viewmerek1/".$b['merek_id'];?>" class="btn btn-danger btn-sm pull-right" style="width: 70px;">Kembali</a>
                        </div>
                    </div>
                    <!-- <small class="text-note font-12"><i class="fa fa-info-circle"></i>  Wajib simpan data. Jika tidak, data yang anda isi akan hilang </small> -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
<!---------------------------------------END FORM SECTION 1------------------------------------->


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

       <script type="text/javascript">
        $(document).ready(function() {
            if($('#tgllahiraja').length) {
                var date = new Date();
                var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                $('#tgllahiraja').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true,
                    autoclose: true
                });
                // $('#tgl_lahir').datepicker('setDate', today);
            }

            
            // --------------------------- end edit data ---------------------------
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


    <script type="text/javascript">
    $(document).ready(function() {
        

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param) 
        });
        $("#form").validate({
            errorClass:'errorOne',
            rules: {
               
                merek_fileketusaha: {
                    accept: "pdf",
                    filesize: 2000000
                    //required: true
                },

                merek_ktp: {
                    accept: "pdf|jpg|jpeg|png",
                    filesize: 2000000
                    //required: true
                },

                merek_srtpernyataan: {
                    accept: "pdf",
                    filesize: 2000000
                    //required: true
                },
                
            },
            messages: {                
                merek_fileketusaha: {
                    accept: "Silahkan unggah file dengan format .pdf",
                    filesize: "File maksimal 2 Mb."
                    
                },

                merek_ktp: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/png",
                    filesize: "File maksimal 2 Mb."
                    
                },

                merek_srtpernyataan: {
                    accept: "Silahkan unggah file dengan format .pdf",
                    filesize: "File maksimal 2 Mb."
                    
                },
            },
            highlight: function(element, errorClass) {
                $(element).parent().addClass('has-error text-error')
                $(element).addClass('has-error text-error')
            },
            unhighlight: function(element, errorClass) {
                $(element).parent().removeClass('has-error text-error')
                $(element).removeClass('has-error text-error')
            },
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                    var controls = element.closest('div[class*="form-group"]');
                    if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                    error.addClass('has-error text-error');
                } else if(element.is('#file_photo_perusahaan')) {
                    error.insertAfter('.file_photo_perusahaan_feed').addClass('has-error text-error');
                } else if(element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                } else if(element.is('.chosen-select')) {
                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                } else {
                    error.insertAfter(element);
                }
            }
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
                        text: "Data Berhasil disimpan ke database.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 2000,
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