<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Edit Hak Cipta</title>

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
                $b=$vhc->row_array();
            ?>

            <?php if ($vhc->num_rows() < 1) {
            redirect('admin/hakcipta');
            }
            ?>
           
            <!-- Main Container -->
            <main id="main-container">
             <!-- Page Content -->
            <div class="content"> <!-- div class conten -->
            
            <form action="<?php echo base_url().'admin/hakcipta/update_hc5'?>" id="formhc5" method="post" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

               <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">Detail Ciptaan</h2>
                 <h2 class="block-title" style="text-align:right;"><b>Form Isian </b><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp; </h2>
<a href="<?php echo base_url()."admin/hakcipta/viewhc1/".$b['hc_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 1 </a>
<a href="<?php echo base_url()."admin/hakcipta/viewhc2/".$b['hc_id'];?>" class="badge badge-danger badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 2 </a>
<a href="<?php echo base_url()."admin/hakcipta/viewhc5/".$b['hc_id'];?>" class="badge badge-primary badge-sm pull-right" style="width: 40px;margin-left: 2px !important;"> 3 </a>
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                                               
                        <div class="form-group">
                            <label class="control-label">Jenis Ciptaan: (Wajib diisi).</label>
                            <br/>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Contoh : Buku, Karya Tulis, Alat Peraga, Seni Lukisan, Seni Ukiran, Seni Patung, Seni Kaligrafi, Seni Motif Batik, Seni Motif Tenun, Seni Kolase, Program Komputer (Wajib diisi).</small>
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
                                    KTP (Kartu Tanda Penduduk)<br>
                                    <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 1 MB. Format .pdf/jpeg/jpg/png</small>
                                    
                                 </label>
                                        <div class="col-md-12">
                                        <?php if($b['hc_ktp'] == "") { ?>
                                        <input type="file" name="file_ktp" value="<?php echo $b['hc_ktp']; ?>" id="file_ktp" class="btn custom-input-file" required>
                                        <?php } else { ?>
                                        <input type="file" name="file_ktp" value="<?php echo $b['hc_ktp']; ?>" id="file_ktp" class="btn custom-input-file">
                                        <?php } ?>
                                        <a href="<?php echo base_url().'assets/images/'.$b['hc_ktp'];?>"><?php echo $b['hc_ktp']; ?></a>
                                        </div>
                                </div>

                               <div class="row form-group" id="hc_spernyataan">
                                    <label class="col-md-12">
                                    Surat Pernyataan <a href="<?php echo base_url().'assets/images/'.'suratpernyataanhc.docx' ?>" target="_blank"><small class="text-note font-12" style="color: blue;">(Download Format)</small></a><br>
                                     <small class="text-note font-12"><i class="fa fa-info-circle"></i> 
                                     Max-size: 2 MB. Format .pdf</small></label>
                               
                                   <div class="col-md-12">
                                    <?php if($b['hc_spernyataan'] == "") { ?>
                                        <input type="file" name="file_spernyataan" id="file_spernyataan" class="btn custom-input-file" required>
                                        <?php } else { ?>
                                        <input type="file" name="file_spernyataan" id="file_spernyataan" class="btn custom-input-file">
                                        <?php } ?>
                                        <a href="<?php echo base_url().'assets/images/'.$b['hc_spernyataan'];?>"><?php echo $b['hc_spernyataan']; ?></a>
                                  </div>
                               </div>

                               <div class="row form-group" id="hc_contohciptaan">
                                 <label class="col-md-12">
                                   Contoh Ciptaan <a href="<?php echo base_url().'assets/images/'.'contohciptaan.jpeg' ?>" target="_blank"><small class="text-note font-12" style="color: blue;">(Panduan Contoh Ciptaan)</small></a><br>
                                     <small class="text-note font-12"><i class="fa fa-info-circle"></i> 
                                     Max-size: 20 MB. Format .pdf/jpeg/jpg/png/mp4</small>
                                 </label>
                                
                                <div class="col-md-12">
                                <?php if($b['hc_contohciptaan'] == "") { ?>
                                <input type="file" name="file_contohciptaan" id="file_contohciptaan" class="btn custom-input-file" required>
                                <?php } else { ?>
                                <input type="file" name="file_contohciptaan" id="file_contohciptaan" class="btn custom-input-file">
                                <?php } ?>
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
                        
                                                

                     </div>
                    
                    <div class="col-md-6 pr-md-5">

                          <div class="form-group">
                            <label class="control-label">Tanggal Diumumkan: (Wajib diisi).</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> tanggal diumumkan untuk pertama kali.</small>
                            <input type="text" name="hc_tglhc" id="hc_tglhc" class="form-control" value="<?php if($b['hc_tglhc'] == "0000-00-00") { } else { echo $b['hc_tglhc']; }; ?>" data-date-format="yyyy-mm-dd" autocomplete="off">
                          </div>


                        <div class="form-group">
                            <label class="control-label">Tempat Diumumkan: (Wajib diisi).</label><br>
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

               <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="hidden" name="kode" value="<?php echo $b['hc_id']; ?>" required>
                            <button type="submit" class="btn btn-primary btn-sm pull-left" style="width: 70px;margin-left: 2px;">Simpan</button>
                            <button type="submit" class="btn btn-danger btn-sm pull-right" style="width: 70px;margin-left: 2px;">Selesai</button>
                            <a href="<?php echo base_url()."admin/hakcipta/viewhc2/".$b['hc_id'];?>" class="btn btn-danger btn-sm pull-right" style="width: 70px;">Kembali</a>
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

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param) 
        });                        

        $("#formhc5").validate({
            errorClass:'errorOne',
            rules: {
                file_ktp: {
                     accept: "pdf, jpeg, jpg, png",
                    filesize: 1000000
                },
                hc_jenis: {
                    required: true
                },
                hc_judul: {
                    required: true
                },
                hc_tglhc: {
                    required: true
                },
                hc_tempat: {
                    required: true
                },
                hc_uraian: {
                    required: true
                },
                file_spernyataan: {
                    accept: "pdf",
                    filesize: 2000000
                },
                file_contohciptaan: {
                    accept: "pdf, jpeg, jpg, png, mp4",
                    filesize: 20000000
                },
            },
            messages: {
                file_ktp: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg/png",
                    filesize: "File maksimal 1 Mb."
                },
                file_spernyataan: {
                    accept: "Silahkan unggah file dengan format .pdf",
                    filesize: "File maksimal 2 Mb."
                },
                file_contohciptaan: {
                    accept: "Silahkan unggah file dengan format .pdf/jpg/jpeg/png/mp4",
                    filesize: "File maksimal 20 Mb."
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