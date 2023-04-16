<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Step 3-4</title>

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
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
        

<!-- font awesome -->
        <link href="<?php echo base_url();?>assets/front/vendors/font-awesome/css/fontawesome-all.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
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
                                    <a class="link-effect font-w700" href="<?php echo base_url().'admin/dashboard'?>">
                                        <i class="text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">KLINIK KI</span><span class="font-size-xl text-success"></span>
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
                $b=$vdi->row_array();
            ?>

            <?php if ($vdi->num_rows() < 1) {
            redirect('admin/desainind');
            }
            ?>
           
            <!-- Main Container -->
            <main id="main-container">
             <!-- Page Content -->
            <div class="content"> <!-- div class conten -->
            
            <form action="<?php echo base_url().'admin/desainind/update_di3'?>" id="formdi3" method="post" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

            <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">DETAIL DESAIN INDUSTRI</h2>
                 <h2 class="block-title" style="text-align:right;"><b>Form Isian </b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp; </h2>
<a href="<?php echo base_url()."admin/desainind/viewdi1/".$b['di_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 1 </a>
<a href="<?php echo base_url()."admin/desainind/viewdi2/".$b['di_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 2 </a>
<a href="<?php echo base_url()."admin/desainind/viewdi3/".$b['di_id'];?>" class="badge badge-primary badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 3 </a>
<a href="<?php echo base_url()."admin/desainind/viewdi4/".$b['di_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 4 </a>
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="row form-group" id="div_filektp">
                                <label class="col-md-12">
                                        Unggah File KTP: <br><small class="text-note"><i class="fa fa-info-circle"></i> Max-size: 2 MB. Format .pdf/jpg/jpeg (Wajib diisi).</small>
                                </label>
                               
                               <div class="col-md-12">
                                   
                                   <?php if($b['di_filektp'] == "") { ?>
                                   <input type="file" name="file_filektp" id="file_filektp" class="btn custom-input-file" required>
                                   <?php } else { ?>
                                   <input type="file" name="file_filektp" id="file_filektp" class="btn custom-input-file">
                                   <?php } ?>    
                                    <a href="<?php echo base_url().'assets/images/'.$b['di_filektp'];?>"><?php echo $b['di_filektp']; ?></a>
                                   
                                    </div>
                               </div>

                         <div class="form-group">
                                <label class="control-label">Jenis Permohonan Desain Industri (Wajib diisi).</label>
                             <select name="di_jenis" id="di_jenis" class="form-control opt1hid">
                             <option value="" disabled selected hidden>-Jenis Permohonan-</option>
                              <?php $jenisdi = $this->db->query("SELECT * FROM jenis_di ORDER BY jenis ASC")->result(); ?>
                                <?php foreach ($jenisdi as $kb) { ?>
                             <option value="<?php echo $kb->di_jenis; ?>" <?php echo ($kb->di_jenis == $b['di_jenis']) ? "selected" : ""; ?>>
                                 <?php echo $kb->jenis; ?>
                             </option>
                              <?php }; ?>
                             </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Judul Desain Industri: (Wajib diisi).</label>
                            <input type="text" name="di_juduldes" id="di_juduldes" value="<?php echo $b['di_juduldes']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama Pendesain: (Wajib diisi).</label>
                            <input type="text" name="di_namapendesain1" id="di_namapendesain1" value="<?php echo $b['di_namapendesain1']; ?>" class="form-control">
                        </div>

                      
                        <div class="form-group">
                            <label class="control-label">Penjelasan Desain Industri:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> Kegunaaan, Fungsi, Inovasi, dan Nilai Kebaruan maksimal 300 karakter (Wajib diisi)..</small>
                            <textarea name="di_kegunaan" id="di_kegunaan" class="form-control" rows="4" maxlength="300"><?php echo $b['di_kegunaan']; ?></textarea>
                        </div>

                                      

                   </div>
                    
                    <div class="col-md-6 pr-md-5">
                        
                         
                         <div class="row form-group" id="div_filebkp">
                                <label class="col-md-12">
                                Surat Pernyataan Kepemilikan: (Wajib diisi). <br/><small class="text-note"><i class="fa fa-info-circle"></i> (Max-size: 2 MB. Format .pdf dan klik <a href="<?php echo base_url().'assets/images/'.'kepemilikandi.doc' ?>">disini</a> untuk mengunduh format file)</small>
                                </label>
                               
                               <div class="col-md-12">
                               <?php if($b['di_filebkp'] == "") { ?>
                               <input type="file" name="file_filebkp" id="file_filebkp" class="btn custom-input-file" required>
                               <?php } else { ?>
                               <input type="file" name="file_filebkp" id="file_filebkp" class="btn custom-input-file">
                               <?php } ?>                                   
                               <a href="<?php echo base_url().'assets/images/'.$b['di_filebkp'];?>"><?php echo $b['di_filebkp']; ?></a>
                              </div>
                        </div>

                               
                         <div class="form-group">
                                <label class="control-label">Klaim (Wajib diisi).</label>
                             <select name="di_klaim" id="di_klaim" class="form-control opt1hid">
                             <option value="" disabled selected hidden>-Jenis Klaim-</option>
                              <?php $klaimdi = $this->db->query("SELECT * FROM klaim_di ORDER BY klaim ASC")->result(); ?>
                                <?php foreach ($klaimdi as $kb) { ?>
                             <option value="<?php echo $kb->di_klaim; ?>" <?php echo ($kb->di_klaim == $b['di_klaim2']) ? "selected" : ""; ?>>
                                 <?php echo $kb->klaim; ?>
                             </option>
                              <?php }; ?>
                             </select>
                        </div>

                        <div class="row form-group" id="di_filettd">
                                <label class="col-md-12">
                                Unggah Tanda Tangan Digital: (Wajib diisi). <br/><small class="text-note"><i class="fa fa-info-circle"></i> (Max-size: 2 MB. Format .pdf/jpeg/jpg)</small>
                                </label>
                               
                               <div class="col-md-12">
                               <?php if($b['di_filettd'] == "") { ?>
                               <input type="file" name="di_filettd" id="di_filettd" class="btn custom-input-file" required>
                               <?php } else { ?>
                               <input type="file" name="di_filettd" id="di_filettd" class="btn custom-input-file">
                               <?php } ?>                                   
                               <a href="<?php echo base_url().'assets/images/'.$b['di_filettd'];?>"><?php echo $b['di_filettd']; ?></a>
                              </div>
                        </div>

                   </div>


                </div> <!-- End div row -->

                <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="hidden" name="kode" value="<?php echo $b['di_id']; ?>" required>
                            <button type="submit" class="btn btn-primary btn-sm pull-left" style="width: 70px;margin-left: 2px;">Simpan</button>
                            <button type="submit" class="btn btn-danger btn-sm pull-right" style="width: 70px;margin-left: 2px;">Lanjut</button>
                            <a href="<?php echo base_url()."admin/desainind/viewdi2/".$b['di_id'];?>" class="btn btn-danger btn-sm pull-right" style="width: 70px;">Kembali</a>
                        </div>
                </div>

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

         <script src="<?php echo base_url();?>assets/front/vendors/jquery-validation/jquery.validate.min.js"></script>
        
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
        
        <!-- bootstrap datepicker -->
        <script src="<?php echo base_url();?>assets/front/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

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

            $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param) 
        });                        

        $("#formdi3").validate({
            errorClass:'errorOne',
            rules: {
                file_filektp: {
                     accept: "pdf, jpeg, jpg",
                    filesize: 2000000
                },
                di_filettd: {
                     accept: "pdf, jpeg, jpg",
                    filesize: 2000000
                },
                di_juduldes: {
                    required: true
                },
                di_namapendesain1: {
                    required: true
                },
                di_kegunaan: {
                    required: true
                },
                di_klaim: {
                    required: true
                },
                file_filebkp: {
                    accept: "pdf",
                    filesize: 2000000
                },
                
            },
            messages: {
                
                file_filektp: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
                    filesize: "File maksimal 2 Mbps."
                },
                di_filettd: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
                    filesize: "File maksimal 2 Mbps."
                },
                file_filebkp: {
                    accept: "Silahkan unggah file dengan format .pdf",
                    filesize: "File maksimal 2 Mbps."
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
            // --------------------------- end edit data ---------------------------
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