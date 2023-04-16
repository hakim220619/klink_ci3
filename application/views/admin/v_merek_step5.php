<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Merek - Step 3</title>

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
        
        .modal-dialog,
        .modal-content {
            /* 80% of window height */
            width:  100%;
            height: 98%;
        }

        .modal-body {
            /* 100% = dialog height, 120px = header + footer */
            
            
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
            
            <form action="<?php echo base_url().'admin/merek/update_merek5'?>" id="form" method="post" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">DETAIL MEREK</h2>
                 <h2 class="block-title" style="text-align:right;"><b>Form Isian </b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp; </h2>
<a href="<?php echo base_url()."admin/merek/viewmerek1/".$b['merek_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 1 </a>
<a href="<?php echo base_url()."admin/merek/viewmerek2/".$b['merek_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 2 </a>
<a href="<?php echo base_url()."admin/merek/viewmerek5/".$b['merek_id'];?>" class="badge badge-primary badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 3 </a>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                     <div class="col-md-6 pr-md-5">
                                               
                            <div class="form-group">
                                        <label class="control-label">Tipe Merek :</label>
                                        <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi).</small>
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
                            <small class="text-note"><i class="fa fa-info-circle"></i> Terjemahan jika merek menggunakan istilah asing maksimal 300 karakter (opsional).</small>
                            <textarea name="rekter" id="rekter" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_terjemahan']; ?></textarea>
                          </div> 

                          <div class="form-group">
                            <label class="control-label">Transliterasi/pengucapan:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> jika merek menggunakan karakter huruf non-latin maksimal 300 karakter (opsional).</small>
                            <textarea name="transli" id="transli" class="form-control" rows="3" maxlength="300"><?php echo $b['merek_pengucapan']; ?></textarea>
                          </div>                        
                        
                           <div class="form-group">
                            <label class="control-label">Unsur warna dalam merek:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter. (Wajib diisi)</small>
                            <textarea name="unsurwarna" id="unsurwarna" required class="form-control" rows="7" maxlength="300" required oninvalid="this.setCustomValidity('')" oninput="setCustomValidity('')"><?php echo $b['merek_unsurwarna']; ?></textarea>
                          </div> 

                          <div class="form-group">
                            <label class="control-label">Nama Merek:</label>
                            <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi)</small>
                                <input type="text" name="mereknama" id="mereknama" value="<?php echo $b['merek_namamerek']; ?>" class="form-control">
                          </div>

                     </div>
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Gambar Label Merek</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 1MB. Format .Jpeg/jpg/png (Wajib diisi).</small>

                            <div class="mt-2">
                                <div class="row form-group" id="merek_gambarmerek">
                                 <label class="col-md-12">
                                    <?php if($b['merek_gambarmerek'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                    <?php if($b['merek_gambarmerek'] == "") { ?>
                                          <input type="file" name="merek_gambarmerek" value="<?php echo $b['merek_gambarmerek']; ?>" id="merek_gambarmerek" class="btn custom-input-file" required>
                                         <?php } else { ?>
                                            <input type="file" name="merek_gambarmerek" value="<?php echo $b['merek_gambarmerek']; ?>" id="merek_gambarmerek" class="btn custom-input-file">
                                        <?php } ?>
                                            <a href="<?php echo base_url().'assets/images/'.$b['merek_gambarmerek'];?>"><?php echo $b['merek_gambarmerek']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                    </div>
                       
                       
                        <div class="form-group">
                            <label class="control-label">Kelas Klasifikasi Merek:</label><small class="text-note"> <i class="fa fa-info-circle"></i> Dapat dicek pada tautan berikut <a href="http://skm.dgip.go.id/" target="_blank"> Tabel pencarian kelas </a></small><br>
                             <select name="xjta" id="xjta" class="form-control opt1hid">
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
                                             
                      </div>
                        
                        <div class="form-group">
                            <label class="control-label">Jenis Produk:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> Penjelasan mendetail mengenai  jenis produk termasuk bentuk dan bahan baku utama dalam Bahasa Indonesia. maksimal 300 karakter (Wajib diisi).</small>
                            <textarea name="kelas" id="kelas" class="form-control" rows="7" maxlength="600"><?php echo $b['merek_kelas']; ?></textarea>
                        </div> 
                        <!-- <div class="form-group">
                            <label class="control-label">Jenis Barang/Jasa:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="merek_kelas" id="merek_kelas" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_kelas']; ?></textarea>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label">Unggah Tanda Tangan Digital</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 1MB. Format .Jpeg/jpg/png (Wajib diisi).</small>

                            <div class="mt-2">
                                <div class="row form-group" id="merek_file_ttd">
                                 <label class="col-md-12">
                                    <?php if($b['merek_file_ttd'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                    <?php if($b['merek_file_ttd'] == "") { ?>
                                          <input type="file" name="merek_file_ttd" value="<?php echo $b['merek_file_ttd']; ?>" id="merek_file_ttd" class="btn custom-input-file" required>
                                        <?php } else { ?>
                                          <input type="file" name="merek_file_ttd" value="<?php echo $b['merek_file_ttd']; ?>" id="merek_file_ttd" class="btn custom-input-file">
                                          <?php } ?>
                                            <a href="<?php echo base_url().'assets/images/'.$b['merek_file_ttd'];?>"><?php echo $b['merek_file_ttd']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                    </div>
                   </div>


                </div> <!-- End div row -->

                 <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="hidden" name="kode" value="<?php echo $b['merek_id']; ?>" required>
			    <!-- <a href="<?php echo base_url()."admin/merek/view/".$b['merek_id'];?>" class="btn btn-danger btn-sm pull-right" style="width: 70px;margin-left: 2px !important;">Selesai</a>    -->
                <button type="submit" class="btn btn-primary btn-sm pull-left" style="width: 70px;margin-left: 2px;">Simpan</button>
                <button type="submit" class="btn btn-danger btn-sm pull-right" style="width: 70px;margin-left: 2px;">Selesai</button>                         
			    <a href="<?php echo base_url()."admin/merek/viewmerek2/".$b['merek_id'];?>" class="btn btn-danger btn-sm pull-right" style="width: 70px;">Kembali</a>
                            

                        </div>
                    </div>
                     <!-- <small class="text-note font-12"><i class="fa fa-info-circle"></i>  Wajib simpan data. Jika tidak, data yang anda isi akan hilang </small> -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->


            <!-- Modal -->
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tabel Pencarian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <embed type="text/html" src="snippet.html" width="500" height="200">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div> -->
<!-----------------------------------------END FORM SECTION 1----------------------------------------->


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

        // $( "#kelas" ).autocomplete({
        //           //url: "<?php echo base_url('admin/merek/get_autocomplete'); ?>"
        //           source: "<?php echo site_url('admin/merek/get_autocomplete/?');?>"
        // });

        $("input[name='ijin_usaha']").click(function() {
            if ($(this).val() == "1") {
                $('#group_ijin').show();
            } else {
                $('#group_ijin').hide();
            }
        });

        $("input[name='ijin_edar']").click(function() {
            if ($(this).val() == "1") {
                $('#group_edar').show();
            } else {
                $('#group_edar').hide();
            }
        });

        if($('#th_akte_perusahaan').length) {
            var date = new Date();
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            $('#th_akte_perusahaan').datepicker({
                format: "yyyy-mm-dd",
                todayHighlight: true,
                autoclose: true
            });
        }

        if($('#tgl_ijin_usaha').length) {
            var date = new Date();
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            $('#tgl_ijin_usaha').datepicker({
                format: "yyyy-mm-dd",
                todayHighlight: true,
                autoclose: true
            });
        }

        if($('#tgl_ijin_edar').length) {
            var date = new Date();
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            $('#tgl_ijin_edar').datepicker({
                format: "yyyy-mm-dd",
                todayHighlight: true,
                autoclose: true
            });
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        })

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param) 
        });
        $("#form").validate({
            errorClass:'errorOne',
            rules: {
                mereknama: {
                    required: true
                },
                unsurwarna: {
                    required: true
                },
                kelas: {
                    required: true
                },
                id_kategori_perusahaan: {
                    required: true
                },
                email_perusahaan: {
                    email: true,
                    required: true
                },
                gambarlabel: {
                    accept: "jpg|jpeg|png",
                    filesize: 1000000
                },
                merek_file_ttd: {
                    accept: "jpg|jpeg|png",
                    filesize: 1000000
                    //required: true
                },
                merek_gambarmerek: {
                    accept: "jpg|jpeg|png",
                    filesize: 1000000
                    //required: true
                },
                file_md: {
                    accept: "pdf",
                    filesize: 1000000
                },
            },
            messages: {
                
                email_perusahaan: {
                    email: "Mohon masukan alamat email yg benar",
                    required: "Email perusahaan harus diisi."
                },
                gambarlabel: {
                    accept: "Silahkan unggah foto dengan format .PNG/.JPG/.JPEG",
                    filesize: "Foto maksimal 1 Mbps."
                },
                merek_file_ttd: {
                    accept: "Silahkan unggah file dengan format .jpg/jpeg/png",
                    filesize: "File maksimal 1 Mbps."
                    //required: "File Tanda Tangan Wajib diisi."
                },
                merek_gambarmerek: {
                    accept: "Silahkan unggah file dengan format .jpg/jpeg/png",
                    filesize: "File maksimal 1 Mbps."
                    //required: "File Tanda Tangan Wajib diisi."
                },
                file_md: {
                    accept: "Silahkan unggah file dengan format .PDF",
                    filesize: "File maksimal 1 Mbps."
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