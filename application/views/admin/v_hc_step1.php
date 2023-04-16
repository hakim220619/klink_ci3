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
           
        <!-- bootstrap fileupload -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet">

        <!-- bootstrap datepicker -->
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
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

            <?php 
            
            if ($vhc->num_rows() < 1) {
            redirect('admin/hakcipta');
            }
            ?>

            <!-- Main Container -->
            <main id="main-container">
             <!-- Page Content -->
            <div class="content"> <!-- div class conten -->
            
            <form action="<?php echo base_url().'admin/hakcipta/update_hc1'?>" method="post" enctype="multipart/form-data" class="form-style">

<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:center;">FORMULIR PERMOHONAN PENDAFTARAN HAK CIPTA</h2>
                 <h2 class="block-title" style="text-align:right;"><b>(Form Isian 1 - 3)</b></h2>
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                <div class="col-md-6 pr-md-5 text-center">
                    <div class="media intro-heading align-self-center">
                        <div class="media-body align-self-center">
                            <h3 class="font-weight-bold">Selamat Datang</h3><h4>Hi, <?php echo $b['hc_nama'];?></h4>
                            <a class="img-link" href="#">
                                 <img  style="width:150px;height:150px;" src="<?php echo base_url().'assets/images/'.$b['hc_photo'];?>" alt="">
                            </a> 
                                                                                       
                        </div>
                    </div>
                </div>

                    <div class="col-md-6 pr-md-5 mt-10">
                        <div class="form-group">
                            <label class="control-label">Tanggal Pengajuan:</label>
                            <input type="text" name="hc_tgl_pengajuan" id="hc_tgl_pengajuan" value="<?php echo $b['hc_tgl_pengajuan']; ?>" class="form-control" readonly>
                        </div>

                        <!-- <div class="form-group">
                            <?php if($this->session->userdata('akses')=='1'):?>
                            <label class="control-label">Tanggal Penerimaan</label>
                            <input type="text" name="hc_tgl_penerimaan" id="hc_tgl_penerimaan" class="form-control" value="<?php if($b['hc_tgl_penerimaan'] == "0000-00-00") { } else { echo $b['hc_tgl_penerimaan']; }; ?>" data-date-format="yyyy-mm-dd" autocomplete="off">
                            <?php else:?>
                                <label class="control-label">Tanggal Penerimaan</label>
                            <input type="text" name="hc_tgl_penerimaan" id="vhc_tgl_penerimaan" class="form-control" value="<?php if($b['hc_tgl_penerimaan'] == "0000-00-00") { } else { echo $b['hc_tgl_penerimaan']; }; ?>" data-date-format="yyyy-mm-dd" autocomplete="off" readonly>
                            <?php endif;?>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label">Nomor Permohonan:</label>
                           <?php if($this->session->userdata('akses')=='1'):?>
                            <input type="text" name="hc_no_permohonan" id="hc_no_permohonan" value="<?php echo $b['hc_no_permohonan']; ?>" class="form-control">
                            <?php else:?>
                            <input type="text" name="hc_no_permohonan" id="hc_no_permohonan" value="<?php echo $b['hc_no_permohonan']; ?>" class="form-control" readonly>
                            <?php endif;?>
                        </div>

                    </div>

                   
                </div> <!-- End div row -->
                
                

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="hidden" name="kode" value="<?php echo $b['hc_id']; ?>" required>
                            <!-- <a href="<?php echo base_url()."admin/hakcipta/view/".$b['hc_id'];?>" class="btn btn-danger btn-sm" style="width: 70px;">Kembali</a> -->
                            <button type="submit" class="btn btn-danger btn-sm" style="width: 70px;">Lanjut</button>
                        </div>
                    </div>

             
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
            
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

        <script type="text/javascript">
        $(document).ready(function() {
            if($('#hc_tgl_penerimaan').length) {
                var date = new Date();
                var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                $('#hc_tgl_penerimaan').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true,
                    autoclose: true
                });
                // $('#tgl_lahir').datepicker('setDate', today);
            }

            
            // --------------------------- end edit data ---------------------------
        }); 
</script>
       
        
       

       

    </body>
</html>