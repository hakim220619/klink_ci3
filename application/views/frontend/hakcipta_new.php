<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hak Cipta</title>
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
 
  
 

  

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/new/css/style.css'?>">
  
  
  

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
          <li><a href="<?php echo site_url('Home');?>">Beranda</a></li>
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
              <li class="#"><a class="nav-link scrollto active" href="<?php echo site_url('fasilities/hakcipta_new');?>"><span>Hak Cipta</span></a>
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
          <li><a href="<?php echo site_url('#recent-blog-posts');?>">Kegiatan</a></li>
          <li><a href="<?php echo base_url().'#portfolio'?>">Pustaka Digital</a></li>
          <li><a href="<?php echo base_url().'#contact'?>">Kontak</a></li>
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
          <h1 data-aos="fade-up">Definisi Hak Cipta</h1><br>
          <h5 data-aos="fade-up" data-aos-delay="400">Hak Cipta adalah hak eksklusif pencipta yang timbul secara otomatis berdasarkan prinsip deklaratif setelah suatu ciptaan diwujudkan dalam bentuk nyata tanpa mengurangi pembatasan sesuai dengan ketentuan peraturan perundang-undangan.</h5>
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
          <img src="<?php echo base_url().'theme/new/img/hc.png'?>" class="img-fluid" alt="">
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
          <p>Cipta Yang Tidak Dapat Didaftar</p>
        </header>

        
        <!-- Feature Tabs -->
        <div class="row feture-tabs mt-auto" data-aos="fade-up">
          <div class="col-lg-6">
            <!-- <h3>Tentang KI</h3> -->

            <!-- Tabs -->
            <ul class="nav nav-pills mb-3">
              <li>
                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Hasil Karya yang Tidak Dilindungi Hak Cipta</a>
              </li>
              
              
            </ul><!-- End Tabs -->
            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="tab1">
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;">Hasil karya yang belum diwujudkan dalam bentuk nyata;</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;">Setiap ide, prosedur, sistem, metode, konsep, prinsip, temuan atau data walaupun telah diungkapkan, dinyatakan, digambarkan, dijelaskan, atau digabungkan dalam sebuah ciptaan; dan</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;">Alat, benda, atau produk yang diciptakan hanya untuk menyelesaikan masalah teknis atau yang bentuknya hanya ditujukan untuk kebutuhan fungsional.</p>
                </div>
                
              </div><!-- End Tab 1 Content -->
              
              

            </div>

          </div>

          <div class="col-lg-6">
            <img src="<?php echo base_url().'theme/new/img/hc002.jpg'?>" style="border-radius: 4px;max-width: 100%;height: auto;" alt="">
          </div>

        </div><!-- End Feature Tabs -->

        

      </div>

    </section><!-- End Features Section -->

  <!-- ======= Layanan KI Section ======= -->
    <section id="features2" class="features2">

      <div class="container">
         <div class="row" data-aos="fade-up">
            <div class="col-lg-3">
               <ul class="nav nav-tabs flex-column">
                  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#tab-1">Ruang Lingkup Perlindungan Hak Cipta
                     </a>
                  </li>
                 <!--  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#tab-2">Jangka Waktu Perlindungan Hak Ekonomi </a>
                  </li> -->
                  <li class="nav-item">
                     <a class="nav-link show" data-toggle="tab" href="#tab-3">Syarat dan Prosedur Permohonan Hak Cipta</a>
                  </li>
               </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
               <div class="tab-content">
                  <div class="tab-pane active" id="tab-1">
                     <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                           <div style="padding-left: 30px;">
                              <ol start="1">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                              <li style="font-size:15px;padding-left: 5px;position: relative;">
                              Perlindungan Hak Cipta atas Ciptaan :
                              </li></h6>
                            </ol>
                              <ol type="a">
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Buku, pamflet, dan semua hasil karya tulis lainnya;</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Ceramah, kuliah, pidato dan ciptaan sejenis lainnya;</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Alat peraga yang dibuat untuk kepentingan pendidikan dan ilmu pengetahuan;</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Lagu atau musik dengan atau tanpa teks;</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Drama, drama musikal, tari, koreografi, pewayangan, dan pantonim;</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Karya seni rupa dalam segala bentuk seperti lukisan, gambar, ukiran, kaligrafi, seni pahat, patung, atau kolase;</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Karya Arsitektur;</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Peta;</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Karya seni batik atau seni motif lain. </p>
                                 </li>
                              </ol>
                              <p style="font-size:14px;margin-left: 30px;padding-left: 5px;position: relative;text-align: left;">berlaku selama hidup pencipta dan terus berlangsung hingga 70 (tujuh puluh) tahun setelah pencipta meninggal dunia, terhitung mulai 1 Januari tahun berikutnya.
                              </p>
                              <ol start="2">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                                <li style="font-size:15px;padding-left: 5px;position: relative;">
                              <p>Untuk Ciptaan sebagaimana di maksud pada butir 1 yang di miliki oleh 2 (dua) orang atau lebih, hak cipta berlaku selama hidup pencipta yang meninggal dunia paling akhir dan berlangsung hingga 70 (tujuh puluh) tahun sesudahnya.
                              </p>
                              </li>
                            </h6>
                              </ol>
                              <p></p>
                              <ol start="3">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                              <li style="font-size:15px;padding-left: 5px;position: relative;">
                              Perlindungan Hak Cipta atas Ciptaan :
                              </li></h6>
                            </ol>
                              <ol type="a">
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Karya fotografi</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Potret</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Karya sinematografi</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Permainan video</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Program komputer</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Perwajahan karya tulis</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Terjemahan, tafsir, saduran, bunga rampai, basis data, adaptasi, aransemen, modifikasi dan karya lain dari hasil transformasi</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Terjemahan, adaptasi, aransemen, transformasi atau modifikasi ekspresi budaya tradisional</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Kompilasi Ciptaan atau data, baik dalam format yang dapat dibaca dengan Program Komputer atau media lainnya; dan</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Kompilasi ekspresi budaya tradisional selama kompilasi tersebut merupakan karya yang asli, Berlaku selama 50 (lima puluh) tahun sejak pertama kali dilakukan pengumuman.
                                    </p>
                                 </li>
                              </ol>
                              <ol start="4">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                                <li style="font-size:15px;padding-left: 5px;position: relative;">
                              <p>Perlindungan Hak Cipta atas ciptaan berupa karya seni terapan berlaku selama 25 (dua puluh lima) tahun sejak pertama kali dilakukan pengumuman.
                              </p>
                              </li>
                            </h6>
                            </ol>
                              <ol start="5">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                                <li style="font-size:15px;padding-left: 5px;position: relative;">
                              <p>Hak cipta atas ciptaannya sebagaimana di maksud pada butir 1 dan 2 yang dimiliki atau dipegang oleh suatu badan hukum berlaku selama 50 (lima puluh) tahun sejak pertama kali dilakukan pengumuman.
                              </p>
                              </li>
                            </h6>
                            </ol>
                              <ol start="6">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                                <li style="font-size:15px;padding-left: 5px;position: relative;">
                              <p>Hak Cipta atas ekspresi budaya tradisional yang dipegang oleh negara berlaku tanpa batas waktu.
                              </p>
                              </li>
                              </ol>
                            </h6>
                            <ol start="7">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                                <li style="font-size:15px;padding-left: 5px;position: relative;">
                              <p>Hak Cipta atas Ciptaan yang Penciptanya tidak diketahui yang dipegang oleh negara apabila ciptaan dimaksud belum dilakukan pengumuman dan atau ciptaan telah diterbitkan tetapi tidak diketahui siapa pencipta dan pihak yang melakukan pengumuman, berlaku selama 50 (lima puluh) tahun sejak Ciptaan tersebut pertama kali dilakukan Pengumuman.
                              </p>
                              </li>
                            </h6>
                            </ol>
                            <ol start="8">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                                <li style="font-size:15px;padding-left: 5px;position: relative;">
                              <p>Hak Cipta atas Ciptaan yang dilaksanakan oleh pihak yang melakukan Pengumuman dalam hal ciptaan tersebut tidak diketahui penciptanya atau hanya tertera nama alias atau samaran penciptanya, berlaku selama 50 (lima puluh) tahun sejak Ciptaan tersebut pertama kali dilakukan Pengumuman.
                              </p>
                              </li>
                            </h6>
                            </ol>
                             
                              <div>
                              <ol start="9">
                              <h6 style="font-weight: 500;position: relative;text-align: left;">
                              <li style="font-size:15px;padding-left: 5px;position: relative;">
                              Perlindungan Hak Ekonomi bagi :
                              </li></h6>
                            </ol>
                              <ol type="a">
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Pelaku Pertunjukan, berlaku selama 50 (lima puluh) tahun sejak pertunjukannya difiksasi dalam fonogram atau audio visual</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Produser Fonogram, berlaku selama 50 (lima puluh) tahun sejak fonogramnya difiksasi; dan</p>
                                 </li>
                                 <li style="font-size:14px;margin-left: 20px;padding-left: 5px;position: relative;">
                                    <p align="left">Lembaga Penyiaran, berlaku selama 20 (dua puluh) tahun sejak karya siarannya pertama kali disiarkan</p>
                                 </li>
                              </ol>
                           </div>
                           </div>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                           <img src="<?php echo base_url().'theme/new/img/Hakciptaa.jpg'?>" alt="" class="img-fluid">
                        </div>
                     </div>
                  </div>
                  
                  <div class="tab-pane" id="tab-3">
                     <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                           <div style="padding-left: 30px;">
                              <h6 style="margin-bottom: 7px;color: #4154f1;font-weight: 600;">Syarat dan Prosedur Perlindungan Hak Cipta :
                              </h6>
                              <div>
                                 <ol>
                                    <li style="padding-left: 10px; font-size:14px;position: relative;">
                                       <p style="text-align:justify;font-size:14px;">Pencatatan Ciptaan tidak dapat dilakukan terhadap seni lukis yang berupa logo atau tanda pembeda yang digunakan sebagai merek dalam perdagangan barang/jasa atau digunakan sebagai lambang organisasi, badan usaha, atau badan hukum.</p>
                                    </li>
                                    <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                       <p style="margin-top: 15px;font-size:14px;" align="justify">Dalam hal Permohonan Pencatatan Ciptaan dan produk Hak Terkait diajukan oleh :</p>
                                       <ol type="a">
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Beberapa orang yang secara bersama-sama berhakatas suatu Ciptaan atau produk Hak Terkait, Permohonan dilampiri keterangan tertulis yang membuktikan hak tersebut; atau</p>
                                          </li>
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Badan hukum, Permohonan dilampiri salinan resmi akta pendirian badan hukum yang telah disahkan oleh pejabat berwenang.</p>
                                          </li>
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Dalam hal Permohonan diajukan oleh beberapa orang, nama pemohon harus dituliskan semua dengan menetapkan satu alamat pemohon yang terpilih.</p>
                                          </li>
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Dalam hal Permohonan diajukan oleh pemohon yang berasal dari luar wilayah Negara Kesatuan Republik Indonesia, Permohonan wajib dilakukan melalui konsultan kekayaan intelektual yang terdaftar sebagai Kuasa.</p>
                                          </li>
                                       </ol>
                                    </li>
                                    <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                       <p style="margin-top: 15px;font-size:14px;" align="justify">Pencatatan ciptaan saat ini seluruhnya dilakukan secara online, dengan proses penyelesaian 1 (satu) hari kerja, kecuali jenis ciptaan yang dikecualikan.
                                       </p>
                                    </li>
                                    <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                       <p style="margin-top: 15px;font-size:14px;" align="justify">Prosedur permohonan pencatatan ciptaan online</p>
                                       <ol type="a">
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Daftar Akun, Registrasi Akun Hak Cipta <br> 
                                                <a href="https://klinikki.kemenperin.go.id/administrator/registration">https://klinikki.kemenperin.go.id/administrator/registration</a> kemudian pilih Daftar Untuk mendapatkan Username dan Password.
                                             </p>
                                          </li>
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="margin-bottom: 0;font-size:14px;" align="justify">Upload File</p>
                                             <ul style="margin-left:-40px;list-style: none;font-size:14px;">
                                                <li style="padding-left: 10px; font-size: 14px;position: relative;"><i class="ri-check-double-line"></i> Surat Pernyataan <br>
                                                   Mencantumkan semua nama pencipta sesuai dengan nama yang tercantum pada contoh ciptaan.
                                                </li>
                                                <li style="padding-left: 10px; font-size: 14px;position: relative;"><i class="ri-check-double-line"></i> Surat Pengalihan Hak <br>
                                                   Dilampirkan jika nama pencipta dan pemegang hak cipta berbeda, maka harus melampirkan Surat Pengalihan Hak dan Surat Pernyataan dibuat atas nama Pemegang Hak Cipta.
                                                </li>
                                                <li style="padding-left: 10px; font-size: 14px;position: relative;"><i class="ri-check-double-line"></i> Contoh Ciptaan maksimum 20 MB.</li>
                                             </ul>
                                          </li>
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                       <p style="margin-top: 15px;font-size:14px;" align="justify">Jenis dan file contoh ciptaan yang dilampirkan
                                       </p>
                                       <ol type="a">
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Buku : Cover Buku, Daftar Isi dan Daftar Pustaka (referensi), dalam bentuk pdf.</p>
                                          </li>
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Program Komputer : Cover, Program dan Manual Book penggunaan program, dalam bentuk pdf.</p>
                                          </li>
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Lagu atau musik dengan atau tanpa teks : Rekaman/ Partitur (notasi angka/ notasi balok), dalam bentuk mp4/ pdf.</p>
                                          </li>
                                          
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Seni Rupa dalam segala bentuk seperti Seni Lukis, Gambar, Seni Ukir, Seni Kaligrafi, Seni Pahat, Seni Patung, Kolase dan Seni Terapan : Foto/gambar, dalam bentuk jpg.</p>
                                          </li>
                                          
                                          <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                             <p style="text-align:justify;font-size:14px;">Seni Batik : Foto/ gambar, dalam bentuk jpg.</p>
                                          </li>
                                          
                                       </ol>
                                    </li>
                                    <li style="padding-left: 10px; font-size: 14px;position: relative;">
                                      <p style="text-align:justify;font-size:14px;">Formalitas<br>
                                      Pengecekan file persyaratan pendaftaran pencatatan ciptaan oleh Klinik KI
                                      </p>
                                    </li>
                                  </ol>
                                    </li>
                                    
                                        
                                 </ol>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                           <img src="<?php echo base_url().'theme/new/img/Hakciptaa.jpg'?>" alt="" class="img-fluid">
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="tab-4">
                     <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                           <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                           <p class="font-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                           <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                           <img src="<?php echo base_url().'theme/new/img/Hakciptaa.jpg'?>" alt="" class="img-fluid">
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="tab-5">
                     <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                           <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                           <p class="font-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                           <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                           <img src="<?php echo base_url().'theme/new/img/Hakciptaa.jpg'?>" alt="" class="img-fluid">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

    </section><!-- End Layanan KI Section -->
   
   <!-- ======= F.A.Q Section ======= 
    <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>------</h2>
          <p>Berapa Lama Perlindungan Cipta Terdaftar</p>
        </header>

        <div class="row">
          <div class="col-lg-12">
            
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  Berlaku selama hidup pencipta dan terus berlangsung hingga 70 (tujuh puluh) tahun setelah pencipta meninggal dunia, terhitung mulai 1 Januari tahun berikutnya, sebagai berikut :
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    <div>
                     <ol type='A'>
                      <li> <p align="justify">Buku, pamflet, dan semua hasil karya tulis lainnya;</p></li>
                      <li> <p align="justify">Ceramah, kuliah, pidato dan ciptaan sejenis lainnya;</p></li>
                      <li> <p align="justify">Alat peraga yang dibuat untuk kepentingan pendidikan dan ilmu pengetahuan;</p></li>
                      <li> <p align="justify">Lagu atau musik dengan atau tanpa teks;</p></li>
                      <li> <p align="justify">Drama, drama musikal, tari, koreografi, pewayangan, dan pantonim;</p></li>
                      <li> <p align="justify">Karya seni rupa dalam segala bentuk seperti lukisan, gambar, ukiran, kaligrafi, seni pahat, patung, atau kolase;</p></li>
                      <li> <p align="justify">Peta;</p></li>
                      <li> <p align="justify">Karya seni batik atau seni motif lain. </p></li>
                     </ol>
                  </div>
                  
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse">
                    Untuk Ciptaan sebagaimana di maksud pada butir 1 yang di miliki oleh 2 (dua) orang atau lebih, hak cipta berlaku selama hidup pencipta yang meninggal dunia paling akhir dan berlangsung hingga 70 (tujuh puluh) tahun sesudahnya.
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
               
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                     Berlaku selama 50 (lima puluh) tahun sejak pertama kali dilakukan pengumuman. Sebagai berikut :
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                     <div>
                     <ol type='A'>
                      <li> <p align="justify">Karya fotografi;</p></li>
                      <li> <p align="justify">Potret;</p></li>
                      <li> <p align="justify">Karya sinematografi;</p></li>
                      <li> <p align="justify">Permainan video;</p></li>
                      <li> <p align="justify">Program komputer;</p></li>
                      <li> <p align="justify">Perwajahan karya tulis;</p></li>
                      <li> <p align="justify">Terjemahan, tafsir, saduran, bunga rampai, basis data, adaptasi, aransemen, modifikasi dan karya lain dari hasil transformasi;</p></li>
                      <li> <p align="justify">Terjemahan, adaptasi, aransemen, transformasi atau modifikasi ekspresi budaya tradisional;</p></li>
                      <li> <p align="justify">Kompilasi Ciptaan atau data, baik dalam format yang dapat dibaca dengan Program Komputer atau media lainnya; dan</p></li>
                      <li> <p align="justify">Kompilasi ekspresi budaya tradisional selama kompilasi tersebut merupakan karya yang asli, Berlaku selama 50 (lima puluh) tahun sejak
pertama kali dilakukan pengumuman.</p></li>
                     </ol>
                  </div>
                               
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse">
                     Perlindungan Hak Cipta atas ciptaan berupa karya seni terapan berlaku selama 25 (dua puluh lima) tahun sejak pertama kali dilakukan pengumuman.
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
               
                  </div>
                </div>
              </div>
              
               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse">
                     Hak cipta atas ciptaannya sebagaimana di maksud pada butir 1 dan 2 yang dimiliki atau dipegang oleh suatu badan hukum berlaku selama 50 (lima puluh) tahun sejak pertama kali dilakukan pengumuman.
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
               
                  </div>
                </div>
              </div>

               <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse">
                     Hak Cipta atas ekspresi budaya tradisional yang dipegang oleh negara berlaku tanpa batas waktu.
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
               
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse">
                     Hak Cipta atas Ciptaan yang Penciptanya tidak diketahuiyang dipegang oleh negara apabila ciptaan dimaksud belum dilakukan pengumuman dan atau ciptaan telah diterbitkan tetapi tidak diketahui siapa pencipta dan pihak yang melakukan pengumuman, berlaku selama 50 (lima puluh)tahun sejak Ciptaan tersebut pertama kali dilakukan Pengumuman.
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
               
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse">
                     Hak Cipta atas Ciptaan yang dilaksanakan oleh pihak yang melakukan Pengumuman dalam hal ciptaan tersebut tidak diketahui penciptanya atau hanya tertera nama alias atau samaran penciptanya, berlaku selama 50 (lima puluh) tahun sejak Ciptaan tersebut pertama kali dilakukan Pengumuman.
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
               
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  Berikut Pelindungan hak ekonomi bagi :
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    <div>
                     <ol type='A'>
                      <li> <p align="justify">Pelaku Pertunjukan, berlaku selama 50 (lima puluh) tahun sejak pertunjukannya difiksasi dalam fonogram atau audiovisual;</p></li>
                      <li> <p align="justify">Produser Fonogram, berlaku selama 50(lima puluh) tahun sejak fonogramnya difiksasi; dan</p></li>
                      <li> <p align="justify">Lembaga Penyiaran, berlaku selama 20 (dua puluh) tahun sejak karya siarannya pertama kali disiarkan.</p></li>
                      </ol>
                  </div>
                  
                  </div>
                </div>
              </div>

            </div>
          </div>



        </div>

      </div>

    </section>End F.A.Q Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>---</h2>
          <p>Undang-Undang Hak Cipta</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-12 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <i class="ri-download-cloud-line icon"></i>
              <h3>UU No. 28 Tahun 2014</h3>
              <p>Tentang Hak Cipta.</p>
              <a href="<?php echo base_url().'assets/img/uuno28.pdf'?>" target="_blank" class="read-more"><span>Download</span> <i class="bi bi-arrow-right"></i></a>
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
                    ">Pencatatan Hak Cipta
                 </h1>
                 <p style="
                    color: #444444;
                    font-size: 20px;
                    font-weight: 400;
                    ">Catatkan Hak Cipta Anda bersama Klinik KI Ditjen IKMA</p>
                 <div class="navbar" style="position:relative;left:-30px" class="aos-init aos-animate" data-aos-delay="600" data-aos="fade-up">
                    
                    <div>
                      <a class="getstarted scrollto" href="https://klinikki.kemenperin.go.id/administrator" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
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