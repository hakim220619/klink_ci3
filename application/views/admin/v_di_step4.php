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
        

        
        <!-- font awesome -->
        <link href="<?php echo base_url();?>assets/front/vendors/font-awesome/css/fontawesome-all.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
        <link rel="stylesheet" href="<?php echo base_url().'theme/new/vendor/aos/aos.css'?>">

       <style>
        .errorOne{color:red;}
        
        
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
            
            <form action="<?php echo base_url().'admin/desainind/update_di4'?>" id="formdi3" method="post" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

             <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">DETAIL GAMBAR DESAIN INDUSTRI</h2>
                 <h2 class="block-title" style="text-align:right;"><b>Form Isian </b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp; </h2>
<a href="<?php echo base_url()."admin/desainind/viewdi1/".$b['di_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 1 </a>
<a href="<?php echo base_url()."admin/desainind/viewdi2/".$b['di_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 2 </a>
<a href="<?php echo base_url()."admin/desainind/viewdi3/".$b['di_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 3 </a>
<a href="<?php echo base_url()."admin/desainind/viewdi4/".$b['di_id'];?>" class="badge badge-primary badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 4 </a>
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                                           
                                                      
                        <div class="form-group">
                            <label class="control-label">Upload File Gambar Desain Industri</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 2 MB. Format .pdf/jpg/jpeg</small>
                            
                            <div class="mt-20">
                               <div class="row form-group" id="div_gbrdpn">
                                <label class="col-md-12">
                                    Tampak Depan 
                                </label>
                               
                               <div class="col-md-12" style="color:red;">
                                   <?php if($b['di_gbrdpn'] == "") { ?>
                                   <input type="file" name="file_gbrdpn" class="btn custom-input-file" required>
                                    <?php } else { ?>
                                    <input type="file" name="file_gbrdpn" id="file_gbrdpn" class="btn custom-input-file">
                                    <?php } ?>
                                    <a href="<?php echo base_url().'assets/images/'.$b['di_gbrdpn'];?>"><?php echo $b['di_gbrdpn']; ?></a>
                                   </div>
                               </div>


                               <div class="row form-group" id="div_gbrblk">
                                <label class="col-md-12">
                                Tampak Belakang 
                                </label>
                               
                               <div class="col-md-12"  style="color:red;">
                                   
                                   <?php if($b['di_gbrblk'] == "") { ?>
                                   <input type="file" name="file_gbrblk" id="file_gbrblk" class="btn custom-input-file" required>
                                   <?php } else { ?>
                                   <input type="file" name="file_gbrblk" id="file_gbrblk" class="btn custom-input-file">
                                   <?php } ?>
                                   <a href="<?php echo base_url().'assets/images/'.$b['di_gbrblk'];?>"><?php echo $b['di_gbrblk']; ?></a>
                                   </div>
                               </div>

                               <div class="row form-group" id="div_gbrskanan">
                                 <label class="col-md-12">
                                   Tampak Samping Kanan
                                 </label>
                            
                            <div class="col-md-12" style="color: red;">
                                
                                <?php if($b['di_gbrskanan'] == "") { ?>
                                <input type="file" name="file_gbrskanan" id="file_gbrskanan" class="btn custom-input-file" required>
                                <?php } else { ?>
                                <input type="file" name="file_gbrskanan" id="file_gbrskanan" class="btn custom-input-file">
                                <?php } ?>
                                <a href="<?php echo base_url().'assets/images/'.$b['di_gbrskanan'];?>"><?php echo $b['di_gbrskanan']; ?></a>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                          
                                    

                     </div>
                    
                    <div class="col-md-6 pr-md-5">
                         <div class="form-group">

                               <div class="row form-group" id="div_gbrskiri">
                                <label class="col-md-12">
                                    Tampak Samping Kiri 
                                </label>
                               
                               <div class="col-md-12" style="color: red;">
                                   
                                   <?php if($b['di_gbrskiri'] == "") { ?>
                                   <input type="file" name="file_gbrskiri" id="file_gbrskiri" class="btn custom-input-file" required>
                                   <?php } else { ?>
                                   <input type="file" name="file_gbrskiri" id="file_gbrskiri" class="btn custom-input-file">
                                   <?php } ?>
                                    <a href="<?php echo base_url().'assets/images/'.$b['di_gbrskiri'];?>"><?php echo $b['di_gbrskiri']; ?></a>
                                   </div>
                               </div>

                               <div class="row form-group" id="div_gbratas">
                                 <label class="col-md-12">
                                   Tampak Atas
                                 </label>
                            
                            <div class="col-md-12" style="color: red;">
                                
                                <?php if($b['di_gbratas'] == "") { ?>
                                <input type="file" name="file_gbratas" id="file_gbratas" class="btn custom-input-file" required>
                                <?php } else { ?>
                                <input type="file" name="file_gbratas" id="file_gbratas" class="btn custom-input-file">
                                <?php } ?>
                                 <a href="<?php echo base_url().'assets/images/'.$b['di_gbratas'];?>"><?php echo $b['di_gbratas']; ?></a>                                
                                </div>
                            </div>

                               <div class="row form-group" id="div_gbrbawah">
                                 <label class="col-md-12">
                                  Tampak Bawah 
                                 </label>
                            
                            <div class="col-md-12" style="color: red;">
                                
                                <?php if($b['di_gbrbawah'] == "") { ?>
                                <input type="file" name="file_gbrbawah" id="file_gbrbawah" class="btn custom-input-file" required>
                                <?php } else { ?>
                                <input type="file" name="file_gbrbawah" id="file_gbrbawah" class="btn custom-input-file">
                                <?php } ?>
                                 <a href="<?php echo base_url().'assets/images/'.$b['di_gbrbawah'];?>"><?php echo $b['di_gbrbawah']; ?></a>
                                </div>
                            </div>

                            <div class="row form-group" id="div_gbrperspektif">
                                 <label class="col-md-12">
                                   Tampak Perspektif
                                 </label>
                            
                            <div class="col-md-12" style="color: red;">
                                <?php if($b['di_gbrperspektif'] == "") { ?>
                                <input type="file" name="file_gbrperspektif" id="file_gbrperspektif" class="btn custom-input-file" required>
                                <?php } else { ?>
                                <input type="file" name="file_gbrperspektif" id="file_gbrperspektif" class="btn custom-input-file">
                                <?php } ?>
                                 <a href="<?php echo base_url().'assets/images/'.$b['di_gbrperspektif'];?>"><?php echo $b['di_gbrperspektif']; ?></a>
                                </div>
                            </div>


                   </div>


                </div> <!-- End div row -->

                <div class="row" style="width: 1100px;">
                        <div class="col-md-12 mt-3">
                            <input type="hidden" name="kode" value="<?php echo $b['di_id']; ?>" required>
                            <button type="submit" class="btn btn-primary btn-sm pull-left" style="width: 70px;margin-left: 2px;">Simpan</button>
                            <button type="submit" class="btn btn-danger btn-sm pull-right" style="width: 70px;margin-left: 2px;">Selesai</button>
                            <a href="<?php echo base_url()."admin/desainind/viewdi3/".$b['di_id'];?>" class="btn btn-danger btn-sm pull-right" style="width: 70px;">Kembali</a>
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
            rules: {
                file_gbrdpn: {
                    accept: "pdf, jpeg, jpg",
                    filesize: 1000000
                },
                file_gbrblk: {
                    accept: "pdf, jpeg, jpg",
                    filesize: 1000000
                },
                file_gbrskanan: {
                    accept: "pdf, jpeg, jpg",
                    filesize: 1000000
                },
                file_gbrskiri: {
                    accept: "pdf, jpeg, jpg",
                    filesize: 1000000
                },
                file_gbratas: {
                    accept: "pdf, jpeg, jpg",
                    filesize: 1000000
                },
                file_gbrbawah: {
                    accept: "pdf, jpeg, jpg",
                    filesize: 1000000
                },
                file_gbrperspektif: {
                    accept: "pdf, jpeg, jpg",
                    filesize: 1000000
                },
            },
            messages: {
                file_gbrdpn: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
                    filesize: "File maksimal 2 Mb."
                },
                file_gbrblk: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
                    filesize: "File maksimal 2 Mb."
                },
                file_gbratas: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
                    filesize: "File maksimal 2 Mb."
                },
                file_gbrbawah: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
                    filesize: "File maksimal 2 Mb."
                },
                file_gbrskanan: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
                    filesize: "File maksimal 2 Mb."
                },
                file_gbrskiri: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
                    filesize: "File maksimal 2 Mb."
                },
                file_gbrperspektif: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg",
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