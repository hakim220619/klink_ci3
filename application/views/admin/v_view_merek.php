<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>View Merek</title>

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
          <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
         <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropify.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">
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
                
                if ($vmerek->num_rows() < 1) {
                    redirect('admin/merek');
                }
            ?>

            <!-- Main Container -->
            <main id="main-container">
             <!-- Page Content -->
            <div class="content"> <!-- div class conten -->
            
            <!-- <form method="post" id="form-edit-data" enctype="multipart/form-data" class="form-style"> -->
            <form action="<?php echo base_url().'admin/merek/update_merek_cert_pop_ok'?>" id="form" method="post" enctype="multipart/form-data" class="form-style">
<!----------------------------------------- FORM SECTION 1 ------------------------------------------->

              <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align: center;"><b>PRATINJAU PENDAFTARAN MEREK</span></b></h2>
                 <!-- <h2 class="block-title" style="text-align:right;"><b>(Form Isian 1 - 3)</b></h2> -->
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row gutters-tiny invisible" data-toggle="appear"> <!-- div row -->
                    
                <div class="col-md-6 pr-md-5 text-center">
                    <div class="media intro-heading align-self-center">
                        
                           
                        <div class="media-body align-self-left">
                            <?php if($b['persentase'] == '100'  && $b['merek_statusid'] == '1' ):?>
                            <h4 style="margin-bottom: -10px;"><span style="text-transform:uppercase">DATA LENGKAP</h4>
                            <?php else:?>
                            <h4 style="margin-bottom: -10px;"><span style="text-transform:uppercase"><?php echo $b['status_nama']; ?></h4>
                            <?php endif;?>
                            <div id="chartsFactsheet" style="width: 45%;"></div>
                            <?php if($this->session->userdata('akses')!='1' && $b['merek_statusid'] == '1' ):?>
			    <a href="<?php echo site_url('admin/merek/viewmerek1/'.$b['merek_id']);?>" class="btn btn-primary">Edit Formulir</a>          
			    <?php elseif($this->session->userdata('akses')=='1' && $b['merek_statusid'] != '4' ):?>
			    <a href="<?php echo site_url('admin/merek/viewmerek1/'.$b['merek_id']);?>" class="btn btn-primary">Edit Formulir</a>          
                            <?php else:?>
			    <a href="<?php echo site_url('admin/merek/viewmerek1/'.$b['merek_id']);?>" class="btn btn-primary" hidden>Edit Formulir</a>
			    <?php endif;?>
                           
                        </div>
                    </div>
                </div>

                    <div class="col-md-6 pr-md-5 mt-10">
                        <div class="form-group">
                            <label class="control-label">Tanggal Pengajuan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_tgl_pengajuan']; ?>" class="form-control" readonly>
                        </div>

                         <!-- <div class="form-group">
                            <label class="control-label">Tanggal Penerimaan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_tgl_penerimaan']; ?>" class="form-control">
                        </div> -->
                        

                        <div class="form-group">
                            <label class="control-label">Nomor Permohonan:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_no_permohonan']; ?>" class="form-control">
     			    <small class="text-note"><i class="fa fa-info-circle"></i> Diisi oleh petugas.</small>
                        </div>

                        <?php if($this->session->userdata('akses')=='1' && $b['merek_statusid'] == '3'):?>
                        <a href="<?php echo site_url('admin/merek/diajukan/'.$b['merek_id']);?>" class="btn btn-danger" data-toggle="modal" data-target="#diajukan">Diajukan</a>
			<!--<a href="<?php echo site_url('admin/merek/waproses/'.$b['merek_id']);?>" class="btn btn-warning">WA</a>
			<a href="<?php echo ('https://wa.me/'.$b['merek_nohp']).'?text=Permohonan Merek Anda Telah *Diajukan* Ke Ditjen KI';?>" target="_blank" class="btn btn-success">Whatsapp</a>-->
                        <?php endif;?>
                        <?php if($this->session->userdata('akses')=='1' && $b['merek_statusid'] == '4'):?>
                        <a href="<?php echo site_url('admin/merek/selesai/'.$b['merek_id']);?>" class="btn btn-info" data-toggle="modal" data-target="#selesai">Selesai</a>
                        <a href="<?php echo site_url('admin/merek/ditolak/'.$b['merek_id']);?>" class="btn btn-danger" data-toggle="modal" data-target="#ditolak">Ditolak</a>
                        <?php endif;?>
                        <!-- <?php if($this->session->userdata('akses')=='1' && $b['merek_statusid'] == '5'):?>

                        <a href="<?php echo site_url('admin/merek/viewcert/'.$b['merek_id']);?>" class="btn btn-danger">Upload Sertifikat</a>
                        <?php endif;?>
  -->

                    </div>

                     
                   
                </div> <!-- End div row -->


            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            
<!-- Modal -->
<div class="modal fade" id="diajukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usulan Diajukan?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<div class="modal-footer">
	</div>
      <div class="modal-body">
<ol start="1">
                            <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Harap dicek kembali form usulan sebelum diteruskan ke Ditjen KI.
                             </p>
                             </li> 
			    <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Pastikan Usulan telah mendapatkan Nomor Permohonan.
                             </p>
                             </li> 
                            <li style="margin-left: -25px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan Aplikasi Whatsapp Telah <b>Aktif</b> (Komputer/Handphone).</b>.
                             </p>
                             </li>                            
                             </ol>
 	
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> -->
        <a href="<?php echo site_url('admin/merek/view/'.$b['merek_id']);?>" class="btn btn-primary">Tutup</a>
        <a href="<?php echo site_url('admin/merek/diajukan/'.$b['merek_id']);?>" class="btn btn-danger" target="_blank">Diajukan</a>      </div>
 
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usulan Selesai?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<div class="modal-footer">
	</div>
      <div class="modal-body">
<ol start="1">
                            <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Harap unggah terlebih dahulu sertifikat.
                             </p>
                             </li> 
			                <div class="form-group" style="margin-left: -16px;">
                            <label class="control-label">Unggah Sertifikat</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 2 MB. Format .pdf (Wajib diisi).</small>

                            <div>
                                <div class="row form-group" id="merek_cert">
                                 <label class="col-md-12">
                                    <?php if($b['merek_cert'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                          <input type="file" name="merek_cert" value="<?php echo $b['merek_cert']; ?>" id="merek_cert" class="btn custom-input-file"><br><a href="<?php echo base_url().'assets/images/'.$b['merek_cert'];?>"><?php echo $b['merek_cert']; ?></a>

                                        </div>
                                        <input type="hidden" name="kode" value="<?php echo $b['merek_id']; ?>">
                                        <button type="submit" name="sbm" value="selesai" class="btn btn-danger" style="margin-left: 16px;margin-top: 4px;">Unggah</button>
                                        <!-- <a href="<?php echo base_url().'admin/merek/update_merek_cert'?>" class="btn btn-danger" style="margin-left: 16px;margin-top: 4px;">Unggah</a>  -->
                                </div>

                                </div>
                            <li style="margin-left: -12px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan Aplikasi Whatsapp Telah <b>Aktif</b> (Komputer/Handphone).</b>
                             </p>
                             </li>                            
                             </ol>
 	
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> -->
        <?php if($b['merek_cert'] == "") { ?>
        <a href="<?php echo site_url('admin/merek/view/'.$b['merek_id']);?>" class="btn btn-primary">Tutup</a>
        <?php } else { ?>
        <a href="<?php echo site_url('admin/merek/viewcert/'.$b['merek_id']);?>" class="btn btn-primary">Tutup</a>
        <?php } ?>
        <?php if($b['merek_cert'] == "") { ?>
        <a href="<?php echo site_url('admin/merek/selesai/'.$b['merek_id']);?>" class="btn btn-danger" target="_blank" hidden>Selesai</a></div>
        <?php } else { ?>
        <a href="<?php echo site_url('admin/merek/selesai/'.$b['merek_id']);?>" class="btn btn-danger" target="_blank">Selesai</a></div>
        <?php } ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ditolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usulan Selesai?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-footer">
    </div>
      <div class="modal-body">
        
<ol start="1">
                            <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Harap unggah terlebih dahulu surat penolakan.
                             </p>
                             </li> 
                            <div class="form-group" style="margin-left: -16px;">
                            <label class="control-label">Unggah Surat Penolakan</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 2 MB. Format .pdf (Wajib diisi).</small>
                            
                            <div>
                                <div class="row form-group" id="merek_cert_cancel">
                                 <label class="col-md-12">
                                    <?php if($b['merek_cert_cancel'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                        <?php } else { ?>
                                        <i class="fa fa-check text-success font-11" aria-hidden="true"></i> <font style="color:green"> File Sudah Ada </font>
                                        <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                                          <input type="file" name="merek_cert_cancel" value="<?php echo $b['merek_cert_cancel']; ?>" id="merek_cert_cancel" class="btn custom-input-file"><br><a href="<?php echo base_url().'assets/images/'.$b['merek_cert_cancel'];?>"><?php echo $b['merek_cert_cancel']; ?></a>

                                        </div>
                                        <input type="hidden" name="kode" value="<?php echo $b['merek_id']; ?>">
                                       
                                        <button type="submit" name="sbm" value="ditolak" class="btn btn-danger" style="margin-left: 16px;margin-top: 4px;">Unggah</button>
                                       
                                </div>

                                </div>
                            <li style="margin-left: -12px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan Aplikasi Whatsapp Telah <b>Aktif</b> (Komputer/Handphone).</b>
                             </p>
                             </li>                            
                             </ol>
    
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> -->
        <?php if($b['merek_cert'] == "") { ?>
        <a href="<?php echo site_url('admin/merek/view/'.$b['merek_id']);?>" class="btn btn-primary">Tutup</a>
        <?php } else { ?>
        <a href="<?php echo site_url('admin/merek/viewcert/'.$b['merek_id']);?>" class="btn btn-primary">Tutup</a>
        <?php } ?>
        <?php if($b['merek_cert'] == "") { ?>
        <a href="<?php echo site_url('admin/merek/ditolak/'.$b['merek_id']);?>" class="btn btn-danger" target="_blank" hidden>Ditolak</a></div>
        <?php } else { ?>
        <a href="<?php echo site_url('admin/merek/ditolak/'.$b['merek_id']);?>" class="btn btn-danger" target="_blank">Ditolak</a></div>
        <?php } ?>
    </div>

  </div>
</div>



            </div> <!-- End div class block -->
            
<!-----------------------------------------END FORM SECTION 1----------------------------------------->


<!----------------------------------------- FORM SECTION 1xx ------------------------------------------->

              <div class="block-header block-header-default">
		
                 <a href="javascript:void(0);" class="btn btn-danger">Catatan</a>    
		
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                <div class="col-md-12">
                    <div class="media intro-heading">
                        
                           
                        <div>
                            
                            
			     <ol start="1">
                             <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Halaman ini adalah halaman pratinjau yang berfungsi untuk melihat progress/update Pengusul dalam melengkapi formulir isian.</p>
                             </li> 
			     <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Untuk melakukan pengisian/perubahan data Pengusul dapat menekan tombol <b>Edit Formulir</b> yang berada diatas.</p>
                             </li> 
			     <li style="margin-left: -25px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan untuk menekan <b>tombol kirim usulan yang berada di akhir halaman</b> agar formulir anda dapat diproses.
                             </p>
                             </li>                            
                             </ol>                          
                        </div>
                    </div>
                </div>

                     
                   
                </div> <!-- End div row -->

                
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            

            </div> <!-- End div class block -->
         
<!-----------------------------------------END FORM SECTION 1xx----------------------------------------->


<!------------------------------------------ FORM SECTION 2------------------------------------------->      

            <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">IDENTITAS IKM</h2>
                 <h2 class="block-title" style="text-align:right;"><b>(Form Isian 2 - 3)</b></h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                            <label class="control-label">Nama Lengkap:</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_nama']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Bentuk Badan Usaha</label>
                            <div>
                                <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                <input class="custom-control-input" type="radio" name="bentukbb" id="bbup" value="Perorangan" <?php echo $b['merek_badan_usaha'] == 'Perorangan' ? "checked" :""; ?>>
                                <label class="custom-control-label" for="bbup">Perorangan</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="bentukbb" id="bbub" value="Badan Hukum" <?php echo $b['merek_badan_usaha'] == 'Badan Hukum' ? "checked" : ""; ?>>
                                <label class="custom-control-label" for="bbub">Badan Hukum</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama Perusahaan/IKM:</label>
                            <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi.)</small>
                            <input type="text" name="merek_perusahaan" id="merek_perusahaan" value="<?php echo $b['merek_perusahaan']; ?>" class="form-control"  oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No. Telp:</label>
                                <input type="text" name="no_tlp" id="no_tlp" value="<?php echo $b['merek_nohp']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email:</label>
                                <input type="text" name="merek_email" id="merek_email" value="<?php echo $b['merek_email']; ?>" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label">Kewarganegaraan:</label>
                                <input type="text" name="merek_warga" id="merek_warga" value="<?php echo $b['merek_warganegara']; ?>" class="form-control">
                        </div>
 -->
                        <!-- <div class="form-group">
                            <label class="control-label">Negara Pendirian:</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $b['merek_negarapendiri']; ?>" class="form-control">
                        </div> -->
                       <div class="form-group">

                                        <label class="control-label">Surat Keterangan Usaha :</label>
                                        <small class="text-note"><i class="fa fa-info-circle"></i> (Wajib diisi).</small>
                                        <div class="row">
                                        <div class="col-sm-3 pr-sm-5">
                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typeusaha" id="iumk1"  value="IUMK" <?php echo $b['merek_ketusaha'] == 'IUMK' ? "checked" : ""; ?>>
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
                                          <input type="file" name="merek_fileketusaha" value="<?php echo $b['merek_fileketusaha']; ?>" id="merek_fileketusaha" class="btn custom-input-file" disabled><a href="<?php echo base_url().'assets/images/'.$b['merek_fileketusaha'];?>"><?php echo $b['merek_fileketusaha']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                        



                    </div>
                                             

                   </div>
                    


                    <div class="col-md-6 pr-md-5">
                        <div class="form-group">
                        <label class="control-label">Unggah Kartu Tanda Penduduk (KTP)</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 2 MB. Format .pdf (Wajib diisi).</small>

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
                                          <input type="file" name="merek_ktp" value="<?php echo $b['merek_ktp']; ?>" id="merek_ktp" class="btn custom-input-file" disabled><a href="<?php echo base_url().'assets/images/'.$b['merek_ktp'];?>"><?php echo $b['merek_ktp']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                        
                    </div>

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
                                          <input type="file" name="merek_srtpernyataan" value="<?php echo $b['merek_srtpernyataan']; ?>" id="merek_srtpernyataan" class="btn custom-input-file" disabled><a href="<?php echo base_url().'assets/images/'.$b['merek_srtpernyataan'];?>"><?php echo $b['merek_srtpernyataan']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_alamat']; ?></textarea>
                        </div>      
                        
                        <div class="form-group">
                            <label class="control-label">Provinsi Domisili Perusahaan</label>
                         <select name="id_prov_perusahaan" id="id_prov_perusahaan" class="form-control opt1hid">
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
                                <label class="control-label">Kota Domisili Perusahaan</label>
                             <select name="id_kab_perusahaan" id="id_kab_perusahaan" class="form-control opt1hid">
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

                        <!-- <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="merek_negara" id="merek_negara" value="<?php echo $b['merek_negara']; ?>" class="form-control">
                        </div> -->

                        

                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->

<!-- -------------------------------- END FORM SECTION 2----------------------------------------->



<!---------------------------------- FORM SECTION 3 --------------------------------------------->      

             <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">ALAMAT SURAT MENYURAT</h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                    <div class="col-md-6 pr-md-5">
                                               
                        <div class="form-group">
                            <label class="control-label">Alamat:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="merek_alamatsurat" id="merek_alamatsurat" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_alamatsurat']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Provinsi</label>
                                <input type="text" name="merek_provsurat" id="merek_provsurat" value="<?php echo $b['merek_provsurat']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kabupaten Kota:</label>
                                <input type="text" name="merek_kabkotasurat" id="merek_kabkotasurat" value="<?php echo $b['merek_kabkotasurat']; ?>" class="form-control">
                        </div>

                    </div>
                    
                    <div class="col-md-6 pr-md-5">
                       
                        <div class="form-group">
                            <label class="control-label">Kode Pos:</label>
                                <input type="text" name="merek_kodepossurat" id="merek_kodepossurat" value="<?php echo $b['merek_kodepossurat']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara:</label>
                                <input type="text" name="merek_negarasurat" id="merek_negarasurat" value="<?php echo $b['merek_negarasurat']; ?>" class="form-control">
                        </div>


                   </div>


                </div> <!-- End div row -->
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
<!-- -------------------------------- END FORM SECTION 3----------------------------------------->      





<!----------------------------------------- FORM SECTION 6 ------------------------------------------->

               <div class="block-header block-header-default">
                 <h2 class="block-title" style="text-align:left;">DETAIL MEREK</h2>
                 <h2 class="block-title" style="text-align:right;"><b>(Form Isian 3 - 3)</b></h2>
             </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            

            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                     <div class="col-md-6 pr-md-5">
                                               
                            <div class="form-group">
                                        <label class="control-label">Tipe Merek :</label>

                                        <div>
                                            <div class="custom-control custom-radio"><!-- custom-control-inline -->
                                                <input class="custom-control-input" type="radio" name="typemerek" id="merekkata1"  value="Merek Kata" <?php echo $b['merek_type'] == 'Merek Kata' ? "checked" : ""; ?>>
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
                            <small class="text-note"><i class="fa fa-info-circle"></i> Terjemahan jika merek menggunakan istilah asing (maksimal 300 karakter).</small>
                            <textarea name="rekter" id="rekter" class="form-control" rows="4" maxlength="300"><?php echo $b['merek_terjemahan']; ?></textarea>
                          </div> 

                          <div class="form-group">
                            <label class="control-label">Transliterasi/pengucapan:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> jika merek menggunakan karakter huruf non-latin (maksimal 300 karakter).</small>
                            <textarea name="transli" id="transli" class="form-control" rows="3" maxlength="300"><?php echo $b['merek_pengucapan']; ?></textarea>
                          </div>                        
                        
                           <div class="form-group">
                            <label class="control-label">Unsur warna dalam merek:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> maksimal 300 karakter.</small>
                            <textarea name="unsurwarna" id="unsurwarna"  class="form-control" rows="7" maxlength="300"><?php echo $b['merek_unsurwarna']; ?></textarea>
                          </div> 

                          <div class="form-group">
                            <label class="control-label">Nama Merek:</label>
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
                                    <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                            <img src="<?php echo base_url().'assets/images/'.$b['merek_gambarmerek'];?>" alt="" class="img-fluid" style="max-height: 105px;"/><br>
                            <a href="<?php echo base_url().'assets/images/'.$b['merek_gambarmerek'];?>"><?php echo $b['merek_gambarmerek']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                    </div>
                 
                        <!-- <div class="form-group">
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
                                          <input type="file" name="merek_gambarmerek" value="<?php echo $b['merek_gambarmerek']; ?>" id="merek_gambarmerek" class="btn custom-input-file"><a href="<?php echo base_url().'assets/images/'.$b['merek_gambarmerek'];?>"><?php echo $b['merek_gambarmerek']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                    </div> -->
                        <!-- <div class="form-group">
                            <label class="control-label">Gambar Label Merek</label>
                            <input type="file" name="filefoto" class="dropify2" data-height="230" data-default-file="<?php echo base_url().'assets/images/'.$b['merek_gambarmerek'];?>">
                            <small class="text-note"><i class="fa fa-info-circle"></i> Max Size 1.5 Mb. &nbsp;Format file .png/.jpg/.jpeg.</small>
                        </div> -->

                         

                        <div class="form-group">
                            <label class="control-label">Deskripsi Merek:</label><br>
                            <small class="text-note"><i class="fa fa-info-circle"></i> Deskripsi merek wajib diisi hanya untuk merek tiga dimensi, merek suara, atau merek hologram. maksimal 300 karakter.</small>
                            <textarea name="deskmerek" id="deskmerek" class="form-control" rows="3" maxlength="300"><?php echo $b['merek_deskripsi']; ?></textarea>
                        </div>

                        
                         <div class="form-group">
                            <label class="control-label">Kelas Klasifikasi Merek:</label><small class="text-note"> <i class="fa fa-info-circle"></i><a href="http://skm.dgip.go.id/" target="_blank"> Tabel pencarian kelas </a></small><br>
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
                            <label class="control-label">Gambar Tanda Tangan Digital</label><br>
                            <small class="text-note font-12"><i class="fa fa-info-circle"></i> Max-size: 1MB. Format .Jpeg/jpg/png (Wajib diisi).</small>

                            <div class="mt-2">
                                <div class="row form-group" id="merek_file_ttd">
                                 <label class="col-md-12">
                                    <?php if($b['merek_file_ttd'] == "") { ?>
                                        <i class="fa fa-times text-default font-11" aria-hidden="true"></i> <font style="color:red">File Belum Diunggah</font>
                                    <?php } ?>
                                        
                                        </label>
                                        <div class="col-md-12">
                            <img src="<?php echo base_url().'assets/images/'.$b['merek_file_ttd'];?>" alt="" class="img-fluid" style="max-height: 105px;"/><br>
                            <a href="<?php echo base_url().'assets/images/'.$b['merek_file_ttd'];?>"><?php echo $b['merek_file_ttd']; ?></a>
                                        </div>
                                </div>

                               
                        </div>
                    </div>
                   </div>

                   </div>
                   </div>
                   </div>
                </div> <!-- End div row -->

                
            
<!------------------------------------END FORM SECTION 6----------------------------------------->


<!----------------------------------------- FORM SECTION 1x ------------------------------------------->
<?php if($b['merek_statusid'] == '1' ):?>

              <div class="block-header block-header-default">
		
                 <a href="<?php echo site_url('admin/merek/submit/'.$b['merek_id']);?>" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Kirim Usulan</a>    
		
              </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                <div class="col-md-12">
                    <div class="media intro-heading">
                        
                           
                        <div>
                            
                                                    
                        </div>
                    </div>
                </div>

                     
                   
                </div> <!-- End div row -->

                
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            

            </div> <!-- End div class block -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Usulan?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<div class="modal-footer">
	</div>
      <div class="modal-body">
 	<p style="text-align:justify;">Harap cek kembali form usulan sebelum dikirim karena perubahan data tidak dapat dilakukan setelah usulan dikirim.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        <a href="<?php echo site_url('admin/merek/submit/'.$b['merek_id']);?>" class="btn btn-danger">Kirim Usulan</a>      </div>
 
    </div>
  </div>
</div>        

       <?php endif;?>         
<!-----------------------------------------END FORM SECTION 1x----------------------------------------->

<!----------------------------------------- FORM SECTION 2x ------------------------------------------->
	<?php if($this->session->userdata('akses')=='1' && $b['merek_statusid'] == '2'):?>
              <div class="block-header block-header-default">
                 <a href="<?php echo site_url('admin/merek/diproses/'.$b['merek_id']);?>" class="btn btn-success" data-toggle="modal" data-target="#proses">Usulan Diproses</a>
		 <!--<a href="<?php echo ('https://wa.me/'.$b['merek_nohp']).'?text=Permohonan Merek Anda Telah *Diproses* Oleh Klinik KI Ditjen IKMA';?>" target="_blank" class="btn btn-success">Whatsapp</a>-->
	      </div>
            
            <div class="block"> <!-- div class block -->
            
            <div class="col-md-12"> <!-- div col-md-12 -->
            
           
            <div class="card-body"> <!-- div card-body -->
                <div class="row"> <!-- div row -->
                    
                <div class="col-md-12">
                    <div class="media intro-heading">
                        
                           
                        <div class="media-body align-self-left" style="margin-left: -10px;">
                            
                           
                           
                        </div>
                    </div>
                </div>

                     
                   
                </div> <!-- End div row -->

                
            </div> <!-- End div card-body -->    
            
            
            </div> <!-- End div col-md-12 -->
            


            </div> <!-- End div class block -->
<!-- Modal -->
<div class="modal fade" id="proses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usulan Diproses?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<div class="modal-footer">
	</div>
      <div class="modal-body">
 	<ol start="1">
                            <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Harap dicek kembali form usulan yang telah lengkap sebelum diproses ke Ditjen KI.
                             </p>
                             </li> 
			    <li style="margin-bottom: -15px;margin-left: -25px;text-align:justify;padding-left: 5px;position: relative;">
                             <p>Pastikan Aplikasi Whatsapp Telah <b>Aktif</b> (Komputer/Handphone).
                             </p>
                             </li> 
                            <li style="margin-left: -25px;padding-left: 5px;text-align:justify;position: relative;">
                             <p>Pastikan Format No. Handphone/Whatsapp Sudah Benar contoh: <b>6287712345678</b>.
                             </p>
                             </li>                            
                             </ol>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> -->
        <a href="<?php echo site_url('admin/merek/view/'.$b['merek_id']);?>" class="btn btn-primary">Tutup</a>
        <a href="<?php echo site_url('admin/merek/diproses/'.$b['merek_id']);?>" class="btn btn-danger" target="_blank">Diproses</a>      </div>
 
    </div>
  </div>
</div> 
        <?php endif;?>     
<!-----------------------------------------END FORM SECTION 2x----------------------------------------->



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
       
        <link href="<?php echo base_url();?>assets/front/vendors/jquery-circliful/css/jquery.circliful.css" rel="stylesheet">
        <script src="<?php echo base_url();?>assets/front/vendors/jquery-circliful/js/jquery.circliful.js"></script>
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
	<script type="text/javascript" language="Javascript">window.open(https://wa.me/'.$cek->merek_nohp.'?text=Permohonan Merek Anda Telah *Diproses* Oleh Klinik KI Ditjen IKMA');</script>

        <script>
            $("#chartsFactsheet").circliful({
                animation: 1,
                animationStep: 15,
                foregroundBorderWidth: 30,
                backgroundBorderWidth: 30,
                backgroundColor: "#eee",
                foregroundColor: '#F12F2F',
                fillColor: '#ffffff',
                percent: <?php echo $b['persentase']; ?>,
                textSize: 100,
                percentageTextSize: 28,
                textAdditionalCss: 'font-weight: bold;',
                textColor: '#000000',
                fontColor: '#000000'
            });

            $("#chartsFactsheet-mobile").circliful({
                animation: 1,
                animationStep: 15,
                foregroundBorderWidth: 20,
                backgroundBorderWidth: 20,
                backgroundColor: "#eee",
                foregroundColor: '#F12F2F',
                fillColor: '#ffffff',
                percent: <?php echo $b['persentase']; ?>,
                textSize: 100,
                percentageTextSize: 22,
                textAdditionalCss: 'font-weight: bold;',
                textColor: '#000000',
                fontColor: '#000000'
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.dropify').dropify({
                    messages: {
                        default: 'Image 800 X 600 Pixels',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });

                $('.dropify2').dropify({
                    messages: {
                        default: 'Image 800 X 600 Pixels',
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
               
                merek_cert: {
                    accept: "pdf",
                    filesize: 2000000,
                    required: true
                    
                },
                merek_cert_cancel: {
                    accept: "pdf",
                    filesize: 2000000,
                    required: true
                    
                },
                  
            },
            messages: {                
                merek_cert: {
                    accept: "Silahkan unggah file dengan format .PDF",
                    filesize: "File maksimal 2 Mb.",
                    required: "Tidak ada file yang Diunggah"
                },
                merek_cert_cancel: {
                    accept: "Silahkan unggah file dengan format .PDF",
                    filesize: "File maksimal 2 Mb.",
                    required: "Tidak ada file yang Diunggah"
                },
            },
            
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
	
	   <?php elseif($this->session->flashdata('msg')=='sudah-wa'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Sudah di whatsapp sebelumnya.",
                        showHideTransition: 'slide',
                        icon: 'warning',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#FFC017'
                    });
            </script>

	 <?php elseif($this->session->flashdata('msg')=='gagal-wa'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Gagal Kirim Whatsapp.",
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

	   <?php elseif($this->session->flashdata('msg')=='selesai'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Gagal diproses, Usulan Telah Selesai.",
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
                        text: "Kirim Usulan berhasil.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>

            <?php elseif($this->session->flashdata('msg')=='succes'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Data berhasil disimpan.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>

    <?php elseif($this->session->flashdata('msg')=='sendmail'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Email Notifikasi Terkirim.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>  
        
        <?php elseif($this->session->flashdata('msg')=='gagal-submit'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Kirim Usulan Gagal, Usulan Anda belum lengkap. Cek kembali usulan anda.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: 'orange'
                    });
            </script>
	
	<?php elseif($this->session->flashdata('msg')=='hak-akses'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Pengusul Tidak Dapat Mengakses Perintah ini.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: 'orange'
                    });
            </script>

    <?php elseif($this->session->flashdata('msg')=='sudah-submit'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Sudah kirim usulan sebelumnya.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: 'orange'
                    });
            </script>

    <?php elseif($this->session->flashdata('msg')=='sudah-diproses'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Gagal diproses.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: 'orange'
                    });
            </script>

	<?php elseif($this->session->flashdata('msg')=='noper'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Nomor Permohonan Belum Ada.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 4000,
                        position: 'bottom-right',
                        bgColor: 'orange'
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