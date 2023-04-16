<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Hak Cipta</title>

        <meta name="description" content="">
        <meta name="author" content="VR">
        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

        <!-- END Icons -->
        <link rel="stylesheet" href="<?php echo base_url().'assets/js/plugins/datatables/dataTables.bootstrap4.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">

       <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
        <link rel="stylesheet" href="<?php echo base_url().'theme/new/vendor/aos/aos.css'?>">
       
       <style type="text/css">
           a.disabled {
                pointer-events: none;
            }
       </style>

       <style>
        .blink {
          animation: blink-animation 1s steps(5, start) infinite;
          -webkit-animation: blink-animation 1s steps(5, start) infinite;
        }
        @keyframes blink-animation {
          to {
            visibility: hidden;
          }
        }
        @-webkit-keyframes blink-animation {
          to {
            visibility: hidden;
          }
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
                                <?php if($this->session->userdata('akses')=='4'):?>
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
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Hak Cipta</h3>
                                    <div class="block-options">
                                        <?php if($this->session->userdata('akses')=='1'):?>
                                        <a href="<?php echo site_url('admin/hakcipta/export');?>" class="btn btn-success"><span class="fa fa-plus"></span> Exp. to Excel</a>
                                        <?php else:?>
                                        <a href="<?php echo site_url('admin/hakcipta/export');?>" class="btn btn-success" hidden><span class="fa fa-plus" hidden></span> Exp. to Excel</a>
                                        <?php endif;?>                                           
                                        <a href="<?php echo site_url('admin/hakcipta/add_new');?>" class="btn btn-primary"><span class="fa fa-plus"></span> Add New</a>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table id="mytable" class="table table-striped table-responsive table-bordered nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;text-align: center;">No</th>
                                                <th style="width: 130px;text-align: center;">Photo</th>
                                                <th style="width: 230px;text-align: center;">Nama Pengusul</th>
                                                <th style="width: 130px;text-align: center;">Email</th>
                                                <th style="width: 30px;text-align: center;">No. Hp</th>
                                                <th style="width: 25px;text-align: center;">Tgl Daftar</th>
                                                <th style="width: 30px;text-align: center;">Status</th>
                                                <th style="width: 130px;text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $no=0;
                                            foreach ($hakcipta->result() as $row) :
                                            $no++;
                                        ?>
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;"><?php echo $no;?></td>
                                                <td align="center"><img style="width:50px;height:40px;" src="<?php echo base_url().'assets/images/'.$row->hc_photo;?>"></td>
                                                <td style="vertical-align: middle;text-transform: lowercase;"><?php echo $row->hc_nama;?></td>
                                                <td style="vertical-align: middle;text-transform: lowercase;"><?php echo $row->hc_email;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->hc_nohp;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->hc_register;?></td>
                                              <?php if($row->idstatus == 1):?>
                                                <td style="vertical-align: middle; color: white;"><a href="<?php echo site_url('admin/hakcipta/viewhc1/'.$row->hc_id);?>" class="btn btn-warning btn-block"><?php echo $row->namastatus;?></td></a>
                                                <?php elseif($row->idstatus == 2):?>
                                                <td style="vertical-align: middle; color: white;"><a href="<?php echo site_url('admin/hakcipta/view/'.$row->hc_id);?>" class="btn btn-primary btn-block"><?php echo $row->namastatus;?></td></a>
                                               <?php elseif($row->idstatus == 3):?>
                                                <td style="vertical-align: middle; color: white;"><a href="<?php echo site_url('admin/hakcipta/view/'.$row->hc_id);?>" class="btn btn-secondary btn-block"><?php echo $row->namastatus;?></td></a>
                                                <?php elseif($row->idstatus == 4):?>
                                                <td style="vertical-align: middle; color: white;"><a href="<?php echo site_url('admin/hakcipta/view/'.$row->hc_id);?>" class="btn btn-success btn-block"><?php echo $row->namastatus;?></td></a>
                                                <?php elseif($row->idstatus == 5):?>
                                                <td style="vertical-align: middle; color: white;"><a href="<?php echo site_url('admin/hakcipta/viewhccert/'.$row->hc_id);?>" class="btn btn-danger btn-block"><?php echo $row->namastatus;?></td></a>
                                                <?php elseif($row->idstatus == 6):?>
                                                <td style="vertical-align: middle; color: white;"><a href="<?php echo site_url('admin/hakcipta/viewhccert_cancel/'.$row->hc_id);?>" class="btn btn-info btn-block"><?php echo $row->namastatus;?></td></a>
                                                <?php else:?>
                                                <td style="vertical-align: middle; color: white;"><a href="<?php echo site_url('admin/hakcipta/view/'.$row->hc_id);?>" class="btn btn-secondary btn-block"><?php echo $row->namastatus;?></td></a>
                                                <?php endif;?>
                                                <td style="width: 90px;text-align: center;vertical-align: middle;">
                                                    <a href="<?php echo site_url('admin/hakcipta/view/'.$row->hc_id);?>"><span class="fa fa-pencil">
                                                    <?php if($this->session->userdata('akses')=='1' && $row->idstatus == 4 && $row->hari > 365):?><span class="badge badge-primary" style="font-family: system-ui; text-decoration: blink; width: 45px;margin-left: 4px !important;"><span class="blink" style="font-family: system-ui;font-size: 10.5px;">Limit</span></span>
                                                    <?php else:?>
                                                    <sup><span class="badge badge-primary badge-sm pull-right" style="font-family: system-ui; width: 35px;margin-left: 2px !important;" hidden>New</span></sup></span>
                                                    <?php endif;?></a>  
                                                    <!-- <a href="javascript:void(0);" class="btn btn-sm btn-secondary btn-circle btn-hapus" data-id="<?php echo $row->hc_id;?>"><span class="fa fa-trash"></span></a> -->
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                 
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

        <!-- Modal Hapus -->
        <form action="<?php echo base_url().'admin/hakcipta/hapus_hakcipta'?>" method="post">
        <div class="modal" id="Modalhapus" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Info</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Anda yakin mau menghapus data ini?</p>
                            <input type="hidden" name="kode2" id="kode" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-square" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary btn-square">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- END Normal Modal -->


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
        <script src="<?php echo base_url().'assets/js/plugins/datatables/jquery.dataTables.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/plugins/datatables/dataTables.bootstrap4.min.js'?>"></script>
        
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

         <?php elseif($this->session->flashdata('msg')=='sukses-submit'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Submit berhasil, usulan anda akan segera di tindaklanjuti.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>

        <?php elseif($this->session->flashdata('msg')=='gagal-view'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'warning',
                        text: "Usulan telah submit, tidak dapat menampilkan data.",
                        showHideTransition: 'slide',
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
                        text: "Pengguna Berhasil disimpan ke database.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
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
            
      <?php elseif($this->session->flashdata('msg')=='gagal-view-proses'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'warning',
                        text: "Usulan masih dalam proses, tidak dapat menampilkan data.",
                        showHideTransition: 'slide',
                        icon: 'warning',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#FFC017'
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