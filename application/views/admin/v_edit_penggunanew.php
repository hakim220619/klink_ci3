<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Halaman Edit User</title>

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

        
        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropify.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">
        

        <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
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
                $c=$con->row_array();
                $d=$cme->row_array();
                $f=$chc->row_array();
                $b=$vhc->row_array();
                if ($vhc->num_rows() < 1) {
                    redirect('admin/dashboard');
                }
                
            ?>
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                <form action="<?php echo base_url().'admin/pengguna/update_penggunanew'?>" method="post" id="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Edit User</h3>
                                </div>
                                <div class="block-content">
                               <div class="form-group">
                                <label class="control-label">Jenis User</label>
                                <div>
                                    <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                    <input class="custom-control-input" type="radio" name="user" id="bbup" value="Perorangan" <?php echo $b['pengguna_jenis'] == 'Perorangan' ? "checked" :""; ?> required>
                                    <label class="custom-control-label" for="bbup">Perorangan</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="user" id="bbub" value="Pembina" <?php echo $b['pengguna_jenis'] == 'Pembina' ? "checked" : ""; ?> required>
                                    <label class="custom-control-label" for="bbub">Pembina</label>
                                    </div>
                                </div>
                              </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama User:</label>
                                            <input type="text" name="xnama" value="<?php echo $b['pengguna_nama'];?>" class="form-control" placeholder="Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama Perusahaan/Instansi:</label>
                                            <input type="text" name="ikm" value="<?php echo $b['pengguna_ikm'];?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">E-Mail:</label>
                                            <input type="text" name="xemail" value="<?php echo $b['pengguna_email'];?>" class="form-control" placeholder="Email" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">No. HP:</label>
                                        <div class="input-group">
                                        
                                            <input type="tel" name="xnohp" value="<?php echo $b['pengguna_nohp'];?>" class="form-control" placeholder="No. Handphone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group">
                            <label class="control-label">File Surat Tugas</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 1MB. Format .pdf.</small>

                            <div class="mt-2">
                                <div class="row form-group" id="pegguna_surtug">
                                 <label class="col-md-12">
                                    <?php if($b['pegguna_surtug'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                          <input type="file" name="pegguna_surtug" value="<?php echo $b['pegguna_surtug']; ?>" id="pegguna_surtug" style="border: 1px solid rgba(34, 34, 34, 0.7);padding: 5px;width: 100%;display: inline-block;"><br><a style="margin-left: 15px;" href="<?php echo base_url().'assets/images/user/'.$b['pegguna_surtug'];?>"><?php echo $b['pegguna_surtug']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                    </div>
                    
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Register:</label>
                                        <input type="text" name="pengguna_register" id="pengguna_register" value="<?php echo $b['pengguna_register']; ?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Count Merek:</label>
                                        <div class="input-group">
                                        
                                            <input type="text" name="koun" value="<?php echo $d['koun'];?>" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Limiter Merek:</label>
                                        <div class="input-group">
                                        
                                            <input type="text" name="limiter_merek" value="<?php echo $b['pengguna_limiter_merek'];?>" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Count Hak Cipta:</label>
                                        <div class="input-group">
                                        
                                            <input type="text" name="koun" value="<?php echo $f['koun'];?>" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Limiter Hak Cipta:</label>
                                        <div class="input-group">
                                        
                                            <input type="text" name="limiter_hc" value="<?php echo $b['pengguna_limiter_hc'];?>" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Count Desain Industri:</label>
                                        <div class="input-group">
                                        
                                            <input type="text" name="koun" value="<?php echo $c['koun'];?>" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Limiter Desain Industri:</label>
                                        <div class="input-group">
                                        
                                            <input type="text" name="limiter_di" value="<?php echo $b['pengguna_limiter_di'];?>" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </div>

                                   <div class="form-group">
                                         <label class="control-label">Level User:</label><br>
                                         <select name="pengguna_level" id="pengguna_level" class="form-control opt1hid" required>
                                     <option value="" disabled selected hidden>------------------------------- Level User -------------------------------</option>
                                      <?php $level = $this->db->query("SELECT * FROM role ORDER BY role_nama ASC")->result(); ?>
                                        <?php foreach ($level as $pr) { ?>
                                        <?php if($b['pengguna_level'] == 0) { ?>
                                            <option value="<?php echo $pr->role_id; ?>"><?php echo $pr->role_nama; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $pr->role_id; ?>" <?php echo ($pr->role_id == $b['pengguna_level']) ? "selected" : ""; ?>>
                                                <?php echo $pr->role_nama; ?>
                                            </option>
                                        <?php }; ?>
                                      <?php }; ?>
                                     </select>
                                        
                                  </div>
                                    <div class="form-group">
                                        <input type="hidden" name="kode" value="<?php echo $b['pengguna_id'];?>" required>
                                        <button type="submit" class="btn btn-danger">Update</button>
                                        <a class="btn btn-danger" href="<?php echo base_url().'admin/pengguna'?>">Cancel</a>
                                    </div>
                                    
                                   
                                    <!-- <div class="form-group">
                                            <input type="text" name="xstatus" value="<?php echo $b['merek_status'];?>" class="form-control" placeholder="Status" required>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <textarea name="xdeskripsi" id="ckeditor" required><?php echo $b['detail'];?></textarea>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                         
                            </div>
                          
                        </div>
                        
                    </div>
                </form>
                    
                  
                 
                </div>
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
    $(document).ready(function() {
        

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param) 
        });
        $("#form").validate({
            errorClass:'errorOne',
            rules: {
               
                pegguna_surtug: {
                    accept: "pdf",
                    filesize: 1000000
                    //required: true
                },
                
            },
            messages: {                
                pegguna_surtug: {
                    accept: "Silahkan unggah file dengan format .pdf",
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
                        hideAfter: false,
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
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FFC017'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Pengguna Berhasil disimpan ke database.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='info'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Info',
                        text: "Pengguna berhasil di update",
                        showHideTransition: 'slide',
                        icon: 'info',
                        hideAfter: false,
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
                        hideAfter: false,
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