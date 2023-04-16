<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Merek</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url().'theme/new/img/favicon.png'?>" rel="icon">
  
  <link href="<?php echo base_url().'theme/new/img/apple-touch-icon.png'?>" rel="apple-touch-icon"> 
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url().'theme/new/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet" >
  <link rel="stylesheet" href="<?php echo base_url().'theme/new/vendor/bootstrap-icons/bootstrap-icons.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'theme/new/vendor/aos/aos.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'theme/new/vendor/remixicon/remixicon.css'?>">

  <link rel="stylesheet" href="<?php echo base_url().'theme/new/vendor/swiper/swiper-bundle.min.css'?>">
  
  <link rel="stylesheet" href="<?php echo base_url().'theme/new/vendor/glightbox/css/glightbox.min.css'?>">

  <!-- Vendor CSS Files Sailor -->
  <link href="<?php echo base_url().'theme/new/vendor/bootstrap2/css/bootstrap.min.css'?>" rel="stylesheet">
 
  
  <style>
     .google-maps {
     position: relative;
     padding-bottom: 75%; // This is the aspect ratio
     height: 0;
     overflow: hidden;
     }
     .google-maps iframe {
     position: absolute;
     top: 0;
     left: 0;
     width: 100% !important;
     height: 100% !important;
     }
     .responsive-map{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
        }
        .responsive-map iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
      }
    </style>

  

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/new/css/style.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'theme/new/css/style2.css'?>">
  
  

  <!-- =======================================================
  * Template Name: FlexStart - v1.1.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?php echo site_url('Home');?>" class="logo d-flex align-items-center">
        <img src="<?php echo base_url().'theme/images/logo-header.png'?>" alt="">
        
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo site_url('Home');?>">Beranda</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">Tentang</a></li> -->
          <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url().'#features'?>">Tujuan</a></li>
              <!-- <li><a href="#features">Visi</a></li>
              <li><a href="#features">Misi</a></li> -->
              <li><a href="<?php echo base_url().'#features'?>">Sasaran</a></li>
              <li><a href="<?php echo base_url().'#faq'?>">Program Layanan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Fasilitasi KI</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="#"><a href="<?php echo site_url('fasilities/hakcipta_new');?>"><span>Hak Cipta</span></a>
                <!-- <ul>
                  <li><a href="#">Pengenalan</a></li>
                  <li><a href="#">Undang-Undang</a></li>
                  <li><a href="#">Syarat dan Prosedur</a></li>
                </ul> -->
              </li>
              <li class="#"><a href="<?php echo site_url('fasilities/paten_new');?>"><span>Paten</span></a>
                <!-- <ul>
                  <li><a href="#">Pengenalan</a></li>
                  <li><a href="#">Undang-Undang</a></li>
                  <li><a href="#">Syarat dan Prosedur</a></li>
                </ul> -->
              </li>
              <li class="#"><a href="<?php echo site_url('fasilities/merek_new');?>"><span>Merek</span></a>
                <!-- <ul>
                  <li><a href="#">Pengenalan</a></li>
                  <li><a href="#">Undang-Undang</a></li>
                  <li><a href="#">Syarat dan Prosedur</a></li>
                </ul> -->
              </li>
              <li class="#"><a href="<?php echo site_url('fasilities/desain_new');?>"><span>Desain Industri</span></a>
                <!-- <ul>
                  <li><a href="#">Pengenalan</a></li>
                  <li><a href="#">Undang-Undang</a></li>
                  <li><a href="#">Syarat dan Prosedur</a></li>
                </ul> -->
              </li>
              
            </ul>
          </li>
          <li><a href="<?php echo base_url().'#recent-blog-posts'?>">Kegiatan</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url().'#portfolio'?>">Pustaka Digital</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url().'#contact'?>">Kontak</a></li>
          <!-- <li><a href="blog.html">Blog</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
          <li><a class="getstarted scrollto" href="<?php echo site_url('administrator');?>">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Definisi Merek</h1><br>
          <h5 data-aos="fade-up" data-aos-delay="400">Merek adalah tanda yang dapat ditampilkan secara grafis berupa gambar, logo, nama, kata, huruf, angka, susunan warna dalam bentuk 2 (dua) dimensi dan/atau 3 (tiga) dimensi, suara, hologram, atau kombinasi dari 2 (dua) atau lebih unsur tersebut untuk membedakan barang dan/ atau jasa yang diproduksi oleh orang atau badan hukum dalam kegiatan perdagangan barang dan/ atau jasa.</h5>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <!-- <a href="<?php echo site_url('administrator');?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Daftar Sekarang</span>
                <i class="bi bi-arrow-right"></i>
              </a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?php echo base_url().'theme/new/img/mer.png'?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>---</h2>
          <p>Fungsi Merek</p>
        </header>

        
        <!-- Feature Tabs -->
        <div class="row feture-tabs mt-auto" data-aos="fade-up">
          <div class="col-lg-6">
            <!-- <h3>Tentang KI</h3> -->

            <!-- Tabs -->
            <ul class="nav nav-pills mb-3">
              <li>
                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Fungsi Merek</a>
              </li>
              <li>
                <a class="nav-link" data-bs-toggle="pill" href="#tab2">Fungsi Daftar Merek</a>
              </li>
              
            </ul><!-- End Tabs -->
            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="tab1">
                <p>Pemakaian Merek berfungsi sebagai :</p>
               <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;position: relative;">Tanda pengenal untuk membedakan hasil produksi yang dihasilkan seseorang atau beberapa orang secara bersama-sama atau badan hukum dengan produksi orang lain atau badan hukum lainnya;</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;position: relative;">Alat promosi, sehingga mempromosikan hasil produksinya cukup dengan menyebut Mereknya;</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;position: relative;">Jaminan atas mutu barangnya;</p>
                </div>
                 <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;position: relative;">Penunjuk asal barang/jasa dihasilkan.</p>
                </div>
              </div><!-- End Tab 1 Content -->


              <div class="tab-pane fade show" id="tab2">
                <p>Pendaftaran Merek berfungsi sebagai :</p>
               <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;position: relative;">Alat bukti bagi pemilik yang berhak atas Merek yang didaftarkan;</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;position: relative;">Dasar penolakan terhadap Merek yang sama keseluruhan atau sama pada pokoknya yang dimohonkan pendaftaran oleh orang lain untuk barang/jasa sejenisnya;</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;position: relative;">Dasar untuk mencegah orang lain memakai Merek yang sama keseluruhan atau sama pada pokoknya dalam peredaran untuk barang/jasa sejenisnya.</p>
                </div>
                 
              </div><!-- End Tab 2 Content -->

                       
              

            </div>

          </div>

          <div class="col-lg-6">
            <img src="<?php echo base_url().'theme/new/img/merek02.png'?>" class="img-fluid" alt="">
          </div>

        </div><!-- End Feature Tabs -->

        

      </div>

    </section><!-- End Features Section -->

  <!-- ======= Layanan KI Section ======= -->
    <section id="features2" class="features2">

      <div class="container">
         <div class="row">
            <div class="col-lg-3">
               <ul class="nav nav-tabs flex-column">
                  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#tab-1">Merek bagaimana yang tidak dapat didaftarkan
                     </a>
                  </li>
                 <!--  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#tab-2">Jangka Waktu Perlindungan Hak Ekonomi </a>
                  </li> -->
                  <li class="nav-item">
                     <a class="nav-link show" data-toggle="tab" href="#tab-2">Yang menyebabkan permohonan merek ditolak</a>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link show" data-toggle="tab" href="#tab-3">Berapa lama perlindungan hukum merek terdaftar</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link show" data-toggle="tab" href="#tab-4">Syarat dan Prosedur Permohonan Merek</a>
                  </li>
               </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
               <div class="tab-content">
                  <div class="tab-pane active" id="tab-1">
                     <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                           <div style="padding-left: 30px;">
                              
                              <h5 style="font-weight: 600;position: relative;text-align: left;">
                              Merek tidak dapat didaftar jika :
                              </h5>
                            
                              <ol type="1">
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Bertentangan dengan ideologi Negara, peraturan perundang-undangan, moralitas, agama, kesusilaan atau ketertiban umum;</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Sama dengan, berkaitan dengan, atau hanya menyebut barang dan/jasa yang dimohonkan pendaftarannya;</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Memuat unsur yang dapat menyesatkan masyarakat tentang asal, kualitas, jenis, ukuran, macam, tujuan penggunaan barang dan/atau jasa;</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Memuat keterangan yang tidak sesuai dengan kualitas, manfaat, atau khasiat dari barang dan/atau jasa yang diproduksi;</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Tidak memiliki daya pembeda; dan/atau.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Merupakan nama umum dan/atau lambang milik umum.</p>
                                 </li>
                                 
                              </ol>
                              
                                                          
                              <div>
                              
                           </div>
                           </div>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                           <img src="<?php echo base_url().'theme/new/img/merektrans.png'?>" alt="" class="img-fluid">
                        </div>
                        </div>
                        </div>


                        <div class="tab-pane" id="tab-2">
                        <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                           <div style="padding-left: 30px;">
                              
                              <h5 style="font-weight: 600;position: relative;text-align: left;">
                              Permohonan ditolak jika : 
                              </h5>
                            
                              <ol type="1">
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Mempunyai persamaan pada pokoknya/ keseluruhannya dengan:</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Merek terdaftar milik pihak lain atau dimohonkan lebih dahulu oleh pihak lain untuk barang dan/ atau jasa sejenis.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Merek terkenal milik pihak lain untuk barang dan/ atau jasa sejenis.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Merek terkenal milik pihak lain untuk barang dan/ atau jasa tidak sejenis yang memenuhi persyaratan tertentu.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Indikasi Geografis terdaftar.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Merupakan atau menyerupai nama orang terkenal, foto, atau nama badan hukum yang dimiliki orang lain, kecuali atas persetujuan tertulis dari yang berhak.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Merupakan tiruan atau menyerupai nama atau singkatan nama, bendera, lambang atau simbol atau emblem suatu negara atau lembaga nasional maupun internasional, kecuali atas persetujuan tertulis dari pihak yang berwenang.</p>
                                 </li>
                              </ol>
                              
                                                          
                              <div>
                              
                           </div>
                           </div>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                           <img src="<?php echo base_url().'theme/new/img/merektrans.png'?>" alt="" class="img-fluid">
                        </div>
                        </div>
                        </div>

                         <div class="tab-pane" id="tab-3">
                        <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                           <div style="padding-left: 30px;">
                              <h5 style="font-weight: 600;position: relative;text-align: left;">
                              Berapa lama perlindungan hukum merek terdaftar :
                              </h5>
                                                         
                              <ol type="1">
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Merek terdaftar mendapat pelindungan hukum untuk jangka waktu 10 (sepuluh) tahun terhitung sejak tanggal penerimaan pendaftaran (Filing Date). Setelah 10 tahun dapat diperpanjang untuk jangka waktu yang sama.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Permohonan perpanjangan diajukan dalam jangka waktu 6 (enam) bulan sebelum berakhirnya jangka waktu perlindungan bagi merek terdaftar tersebut dengan dikenai biaya.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Permohonan perpanjangan masih didapat diajukan dalam jangka waktu paling lama 6 (enam) bulan setelah berakhirnya jangka waktu perlindungan merek terdaftar tersebut dengan dikenai biaya dan denda sebesar biaya perpanjangan.</p>
                                 </li>
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Permohonan perpanjangan merek disetujui jika pemohon melampirkan surat pernyataan tentang :</p>
                                    <ol type="a">
                                    <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Merek yang bersangkutan masih digunakan pada barang atau jasa sebagaimana dicantumkan dalam sertifikat Merek tersebut; dan</p>
                                    </li>
                                    <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Barang atau jasa masih diproduksi dan/atau diperdagangkan.</p>
                                    </li>
                                    <ol>
                                 </li>
                                 
                                 
                              </ol>
                              
                                                          
                              <div>
                              
                           </div>
                           </div>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                           <img src="<?php echo base_url().'theme/new/img/merektrans.png'?>" alt="" class="img-fluid">
                        </div>
                        </div>
                        </div>



                        <div class="tab-pane" id="tab-4">
                        <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                           <div style="padding-left: 30px;">
                              <h5 style="font-weight: 600;position: relative;text-align: left;">
                              Syarat dan Prosedur Permohonan Merek :
                              </h5>
                                                         
                              <ol type="1">
                                 
                                 <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Syarat dan Tata Cara Permohonan :</p>
                                    <ol type="a">
                                    <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Mengajukan permohonan pendaftaran dengan mengisi formulir dalam bahasa Indonesia dengan melampirkan:</p>
                                      <ul>  
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Surat pernyataan kepemilikan merek.</p>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Identitas diri berupa fotocopy KTP dari pemilik merek.</p>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Fotocopy akte pendirian Badan Hukum yang dilegalisir notaris bagi pemohon atas nama Badan Hukum, ijin industri untuk skala usaha mikro& kecil</p>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Label Merek dalam format JPEG max 4 MB.</p>
                                      </li>
                                      </ul>
                                    </li>

                                    
                                    <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Dalam hal Merek sebagaimana dimaksud diatas, berupa bentuk 3 (tiga) dimensi, label Merek yang dilampirkan dalam bentuk karakteristik dari Merek tersebut.</p>
                                    </li>
                                     <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Dalam hal Merek sebagaimana dimaksud diatas, berupa suara, label Merek yang dilampirkan berupa notasi dan rekaman suara.</p>
                                    </li>
                                     <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Dalam hal permohonan diajukan oleh lebih dari satu Pemohon yang secara bersama sama berhak atas Merek tersebut, semua nama Pemohon dicantumkan dengan memilih salah satu alamat sebagai alamat Pemohon.</p>
                                    </li>
                                     <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Permohonan sebagaimana pada butir d ditandatangani oleh salah satu dari Pemohon yang berhak atas Merek tersebut dengan melampirkan persetujuan tertulis dari para Pemohon yang mewakilkan.</p>
                                    </li>
                                    
                                    </ol>
                                 </li><br>
                                                                                          
                                
                              
                              
                                <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Pendaftaran merek saat ini seluruhnya dilakukan secara online, Prosedur permohonan pendaftaran merek online :</p>
                                    <ol type="a">
                                    <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Daftar Akun, Registrasi Akun Merek Online:<br> <a href="https://klinikki.kemenperin.go.id/administrator/registration">https://klinikki.kemenperin.go.id/administrator/registration</a> kemudian pilih Daftar Untuk mendapatkan Username dan Password.</p>
                                    </li>
                                    <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Data Dukung yang Diunggah :</p>
                                      <ul>  
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Label Merek;</p>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Tanda Tangan Pemohon; dan</p>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Surat Keterangan UMK (jika pemohon merupakan usaha mikro atau usaha kecil).</p>
                                      </li>
                                      </ul>
                                    </li>

                                    
                                    <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Mengisi data seperti dibawah ini :</p>
                                    <ul>  
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">General;</p>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Data Pemohon;</p>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Kuasa.</p>
                                      </li>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Prioritas;</p>
                                      </li>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Merek;</p>
                                      </li>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Kelas;</p>
                                      </li>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Lampiran; dan</p>
                                      </li>
                                      </li>
                                      <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                      <p align="left">Resume.</p>
                                      </li>
                                      
                                      </ul>
                                    </li>
                                    
                                    <li style="margin-left: 0px;padding-left: 5px;position: relative;">
                                    <p align="left">Formalitas : <br>Pengecekan file persyaratan pendaftaran merek.</p>
                                    </li>

                                    
                                     
                                    </ol>
                             
                              <div>
                              
                           </div>
                           </div>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                           <img src="<?php echo base_url().'theme/new/img/merektrans.png'?>" alt="" class="img-fluid">
                        </div>

                     </div>
                  </div>
                  
              

    </section>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>---</h2>
          <p>Undang-Undang Merek dan Indikasi Geografis</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-12 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <i class="ri-download-cloud-line icon"></i>
              <h3>UU No. 20 Tahun 2016</h3>
              <p>Tentang Merek dan Indikasi Geografis.</p>
              <a href="<?php echo base_url().'assets/img/uuno20.pdf'?>" target="_blank" class="read-more"><span>Download</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          

        </div>

      </div>

    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
        <div class="container">
           <div class="row">
              <div class="col-lg-6 d-flex flex-column justify-content-center">
                 <h1 data-aos="fade-up" class="aos-init aos-animate" style="
                    margin: 0;
                    font-size: 48px;
                    font-weight: 700;
                    color: #012970;
                    ">Pendaftaran Merek
                 </h1>
                 <p style="
                    color: #444444;
                    font-size: 20px;
                    font-weight: 400;
                    ">Daftarkan Merek Anda bersama Klinik KI Ditjen IKMA</p>
                 <div style="position:relative;left:-30px" class="navbar" class="aos-init aos-animate" data-aos-delay="600" data-aos="fade-up">
                    
                    <div>
                      <a class="getstarted scrollto" href="<?php echo site_url('administrator');?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Daftar Sekarang</span>
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                 </div>
              </div>
              <div class="col-lg-6 hero-img aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                 <img src="<?php echo base_url().'theme/new/img/daftar.png'?>" class="img-fluid" alt="">
              </div>
           </div>
        </div>
     </div>

   <!--  <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="<?php echo base_url().'theme/new/img/logo.png'?>" alt="">
              <span></span>
            </a>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
               <br>
              <br>
               <br><br>
              <strong>Phone:</strong> +62 8839 0303<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

        </div>
      </div>
    </div> -->

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://klinikki.kemenperin.go.id/">Klinik KI</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
 
   <script src="<?php echo base_url().'theme/new/vendor/bootstrap/js/bootstrap.bundle.js'?>"></script>
    <script src="<?php echo base_url().'theme/new/vendor/aos/aos.js'?>"></script>
  <script src="<?php echo base_url().'theme/new/vendor/php-email-form/validate.js'?>"></script>
  <script src="<?php echo base_url().'theme/new/vendor/swiper/swiper-bundle.min.js'?>"></script>
  <script src="<?php echo base_url().'theme/new/vendor/purecounter/purecounter.js'?>"></script>
  <script src="<?php echo base_url().'theme/new/vendor/isotope-layout/isotope.pkgd.min.js'?>"></script>
  <script src="<?php echo base_url().'theme/new/vendor/glightbox/js/glightbox.min.js'?>"></script>
  
   <!-- Vendor JS Files Sailor -->
  <script src="<?php echo base_url().'theme/new/vendor/jquery/jquery.min.js'?>"></script>
  <script src="<?php echo base_url().'theme/new/vendor/bootstrap2/js/bootstrap.bundle.min.js'?>"></script>
  

  <!-- Template Main JS File -->
  <script src="<?php echo base_url().'theme/new/js/main.js'?>"></script>
 

  
</body>

</html>