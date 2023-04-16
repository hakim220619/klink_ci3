<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Edit Merek</title>

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
                $b=$merek->row_array();
                if ($merek->num_rows() < 1) {
                    redirect('admin/merek');
                }
            ?>
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                <form action="<?php echo base_url().'admin/merek/update_merek'?>" method="post" enctype="multipart/form-data">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <div class="col-md-8">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Edit Merek</h3>
                                </div>
                                <div class="block-content">
                                    
                                    <div class="form-group">
                                            <input type="text" name="merek_nama" value="<?php echo $b['merek_nama'];?>" class="form-control" placeholder="Nama" required>
                                    </div>
                                    <div class="form-group">
                                            <input type="text" name="merek_email" value="<?php echo $b['merek_email'];?>" class="form-control" placeholder="Email" readonly>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                        
                                            <input type="tel" name="merek_nohp" value="<?php echo $b['merek_nohp'];?>" class="form-control" placeholder="Nomor Whatsapp Gunakan Awalan 62 contoh: 6287782728299" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    </div>
                                    </div>
                                   <div class="form-group">
                                         <?php if($this->session->userdata('akses')=='1'):?>
                                        <label class="control-label">Status:</label><br>
                                         <select name="merek_statusid" id="merek_statusid" class="form-control opt1hid" readonly>
                                     <option value="" disabled selected hidden>------------------------------- Status -------------------------------</option>
                                      <?php $status = $this->db->query("SELECT * FROM status ORDER BY status_nama ASC")->result(); ?>
                                        <?php foreach ($status as $pr) { ?>
                                        <?php if($b['merek_statusid'] == 0) { ?>
                                            <option value="<?php echo $pr->status_id; ?>"><?php echo $pr->status_nama; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $pr->status_id; ?>" <?php echo ($pr->status_id == $b['merek_statusid']) ? "selected" : ""; ?>>
                                                <?php echo $pr->status_nama; ?>
                                            </option>
                                        <?php }; ?>
                                      <?php }; ?>
                                     </select>
                                        <?php else:?>    
                                        <label class="control-label" hidden>Status:</label><br>
                                         <select name="merek_statusid" id="merek_statusid" class="form-control opt1hid" hidden>
                                     <option value="" disabled selected hidden>------------------------------- Status -------------------------------</option>
                                      <?php $status = $this->db->query("SELECT * FROM status ORDER BY status_nama ASC")->result(); ?>
                                        <?php foreach ($status as $pr) { ?>
                                        <?php if($b['merek_statusid'] == 0) { ?>
                                            <option value="<?php echo $pr->status_id; ?>"><?php echo $pr->status_nama; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $pr->status_id; ?>" <?php echo ($pr->status_id == $b['merek_statusid']) ? "selected" : ""; ?>>
                                                <?php echo $pr->status_nama; ?>
                                            </option>
                                        <?php }; ?>
                                      <?php }; ?>
                                     </select>   
                                     <?php endif;?>                    
                                  </div>

                                    <div class="form-group">
                                            <?php if($this->session->userdata('akses')=='1'):?>
                                            <div class="form-group">
                                                <label class="control-label">Keterangan:</label><br>
                                                <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                                                <textarea name="merek_ket" id="merek_ket" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_ket']; ?></textarea>
                                            </div>
                                            <?php else:?>
                                            <div class="form-group">
                                                <label class="control-label" hidden>Keterangan:</label><br>
                                                <small class="text-note" hidden><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                                                <textarea name="merek_ket" id="merek_ket" class="form-control" rows="4" maxlength="300" hidden><?php echo $b['merek_ket']; ?></textarea>
                                            </div>
                                                
                                            <?php endif;?>
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
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Foto Produk</h3> 
                                </div>

                                <div class="block-content">
                                <small class="text-note"><i class="fa fa-info-circle"></i> (Max-size: 1MB. Format .Jpeg/Jpg dan klik <a href="<?php echo base_url().'assets/images/'.'cthproduk.pdf' ?>">disini</a> untuk mengunduh contoh foto produk ukuran 640 x 480 pixel)</small>
                                    <div class="form-group">
                                        <input type="file" name="filefoto" class="dropify2" data-height="230" data-default-file="<?php echo base_url().'assets/images/'.$b['merek_photo'];?>">
                                    </div>
                                    
                                    
                                </div>
                                <div class="block-content block-content-full block-content-md bg-body-light">
                                    <input type="hidden" name="kode" value="<?php echo $b['merek_id'];?>" required>
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('.dropify').dropify({
                    messages: {
                        default: 'Image 235 X 270 Pixels',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });

                $('.dropify2').dropify({
                    messages: {
                        default: 'Gambar Berukuran 640 X 480 Pixels',
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
        
    </body>
</html>