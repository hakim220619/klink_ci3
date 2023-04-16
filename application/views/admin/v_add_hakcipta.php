<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Add Hak Cipta</title>

        <meta name="description" content="">
        <meta name="author" content="VR">
        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropify.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
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

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                <form action="<?php echo base_url().'admin/hakcipta/simpan_hakcipta'?>" id="form" method="post" enctype="multipart/form-data">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <div class="col-md-8">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Identitas Pengusul</h3>
                                </div>

                              <div class="block-content">
                              
                                    <div class="form-group">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pengusul" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Pengusul contoh: example@mail.com" required>
                                            <div><span id="cek_email_feedback"></span></div>
                                    </div>
                                    <div class="form-group">
                                             <div class="input-group">
                                        <div class="input-group-addon position-absolute">
                                             <span>+62</span>
                                        </div>
                                        <input type="tel" name="no_telp" id="no_telp" class="form-control" placeholder="87782728299" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                            <?php if($this->session->userdata('akses')=='1'):?>
                                            <select name="xstatus" class="form-control" required>
                                                <option value="">Status</option>
                                                <?php 
                                                    foreach ($sta->result_array() as $k) :
                                                        $status_id=$k['status_id'];
                                                        $status_nama=$k['status_nama'];
                                                ?>
                                                <option value="<?php echo $status_id;?>"><?php echo $status_nama;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php else:?>
                                            <select name="xstatus" class="form-control" hidden>
                                                <option value="">Status</option>
                                                <?php 
                                                    foreach ($sta->result_array() as $k) :
                                                        $status_id=$k['status_id'];
                                                        $status_nama=$k['status_nama'];
                                                ?>
                                                <option value="<?php echo $status_id;?>"><?php echo $status_nama;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                                
                                            <?php endif;?>
                                    </div><!-- <div class="form-group">
                                        <textarea name="xdeskripsi" id="ckeditor" required></textarea>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Photo Pengusul</h3>
                                </div>
                                    <div class="block-content">
                                        <div class="form-group">
                                            <input type="file" id="filefoto" name="filefoto" class="dropify2" data-height="213" required>
                                        </div>                                        
                                    </div>
                                <div class="block-content block-content-full block-content-md bg-body-light">
                                        <button type="submit" class="btn btn-primary btn-square btn-block">SIMPAN</button>
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

        <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
        



        <script type="text/javascript">
            $(document).ready(function(){
                $('.dropify').dropify({
                    messages: {
                        default: 'Image 354 X 472 Pixels',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'Photo belum diisi'
                    }
                });

                $('.dropify2').dropify({
                    messages: {
                        default: 'Image 354 X 472 Pixels',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'Photo belum diisi'
                    }
                });
            });
             
            $("#formw").validate({
            rules: {
                nama: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                no_telp: {
                    required: true,
                    maxlength: 12
                },
                filefoto: {
                    required: true,
                    accept: "jpg|jpeg|png",
                    filesize: 500000
                }
            },
            messages: {
                nama: {
                    required: "Nama harus diisi."
                },
                email: {
                    required: "Email harus diisi.",
                    email: "Silahkan masukan alamat email dengan benar."
                },
                no_telp: {
                    required: "No Handphone harus diisi.",
                    maxlength: "No Handphone maksimal 12 karakter."
                },
                filefoto: {
                    required: "asdas",
                    accept: "Silahkan unggah foto dengan format .PNG/.JPG/.JPEG",
                    filesize: "Foto maksimal 500 Kb.",
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
                    error.addClass('has-error text-error');
                    error.insertAfter(element.parent('.input-group'));
                } else if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                    var controls = element.closest('div[class*="form-group"]');
                    if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                } else if(element.is('input[type=file]')) {
                    error.insertAfter(element.parent());
                } else if(element.is('input[type=tel]')) {
                    error.insertAfter(element.parent());
                } else if(element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                } else if(element.is('.chosen-select')) {
                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                } else {
                    error.insertAfter(element);
                }
            }
        });


        $('#email').change(function() {
            var email = $('#email').val();  
            if(email != '') {
                $.ajax({
                    url: "<?php echo base_url('admin/hakcipta/cek_email'); ?>",
                    method : "post",
                    data   : { email:email },
                    success:function(response) {
                        $('#cek_email_feedback').html(response);  
                    }
                });
            }
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
                        bgColor: 'blue'
                    });
            </script>

        <?php elseif($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Pengguna Berhasil disimpan ke database.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
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