<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Desain Industri</title>
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
          <li><a class="nav-link scrollto" href="<?php echo base_url().'#recent-blog-posts'?>">Kegiatan</a></li>
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
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

      <div class="container">
         <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
               <h1 data-aos="fade-up" class="aos-init aos-animate">Desain Industri </h1>
               <br>
               <h5 data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">Desain Industri adalah suatu kreasi tentang bentuk, konfigurasi, komposisi garis atau warna, atau garis dan warna, atau gabungan dari padanya yang berbentuk tiga dimensi atau dua dimensi yang memberikan kesan estetis dan dapat diwujudkan dalam pola tiga dimensi atau dua dimensi serta dapat dipakai untuk menghasilkan suatu produk, barang, komoditas industri, atau kerajinan tangan.</h5>
            </div>
            <div class="col-lg-6 hero-img aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
               <img src="<?php echo base_url().'theme/new/img/des.png'?>" class="img-fluid" alt="">
            </div>
         </div>
      </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Services Section ======= -->
      
      <div class="container aos-init aos-animate" data-aos="fade-up">
         <section id="features" class="features2">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3">
                     <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                           <a class="nav-link show active" data-toggle="tab" href="#tab-1">Desain Industri yang Tidak Dapat Didaftar</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#tab-2">
                           Berapa Lama Perlindungan Desain Industri Terdaftar
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#tab-3">Syarat dan Prosedur Permohonan Desain Industri</a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-9 mt-4 mt-lg-0">
                     <div class="tab-content">
                        <div class="tab-pane show active" id="tab-1">
                           <div class="row">
                              <div class="col-lg-8 details order-2 order-lg-1">
                                 <div style="padding-left: 30px;">
                                    <ol>
                                       <p>Hak Desain Industri tidak dapat diberikan apabila Desain Industri tersebut bertentangan dengan peraturan perundang-undangan yang berlaku, ketertiban umum, agama, atau kesusilaan.</p>
                                    </ol>
                                 </div>
                              </div>
                              <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <img src="<?php echo base_url().'theme/new/img/des.png'?>" alt="" class="img-fluid">
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                           <div class="row">
                              <div class="col-lg-8 details order-2 order-lg-1">
                                 <div style="padding-left: 30px;">
                                    <ol type="1">
                                       <li style="padding-left: 10px;position: relative;">
                                          <p>Pelindungan terhadap Hak Desain Industri diberikan untuk jangka waktu 10 (sepuluh) tahun terhitung sejak Tanggal Penerimaan.</p>
                                       </li>
                                       <li style="padding-left: 10px;position: relative;">
                                          <p>Tanggal mulai berlakunya jangka waktu pelindungan dicatat dalam Daftar Umum Desain Industri dan diumumkan dalam Berita Resmi Desain Industri.</p>
                                       </li>
                                    </ol>
                                 </div>
                              </div>
                              <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <img src="<?php echo base_url().'theme/new/img/des.png'?>" alt="" class="img-fluid">
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                           <div class="row">
                              <div class="col-lg-8 details order-2 order-lg-1">
                                 <div style="padding-left: 30px;">
                                    <h5 style="margin-bottom: 7px;">Syarat dan Prosedur Permohonan Desain Industri :
                                    </h5>
                                    <div>
                                       <ol>
                                          <li style="padding-left: 10px; position: relative;">
                                             <p style="margin-top: 15px;" align="">Permohonan Desain Industri paling sedikit memuat:</p>
                                             <ol type="a">
                                                <li style="padding-left: 10px;position: relative;">
                                                   <p align="">Tanggal, bulan, dan tahun surat permohonan</p>
                                                </li>
                                                <li style="padding-left: 10px;position: relative;">
                                                   <p align="">Nama, alamat lengkap, dan kewarganegaraan Inventor</p>
                                                </li>
                                                <li style="padding-left: 10px;position: relative;">
                                                   <p align="">Nama, alamat lengkap, dan kewarganegaraan Pemohon dalam hal Pemohon adalah bukan badan hukum</p>
                                                </li>
                                                <li style="padding-left: 10px;position: relative;">
                                                   <p align="">Nama dan alamat lengkap Pemohon dalam hal Pemohon adalah badan hukum</p>
                                                </li>
                                                <li style="padding-left: 10px;position: relative;">
                                                   <p>Nama, dan alamat lengkap Kuasa dalam hal Permohonan diajukan melalui Kuasa</p>
                                                </li>
                                                <li style="padding-left: 10px;position: relative;">
                                                   <p align="">Nama negara dan Tanggal penerimaan permohonan yang pertama kali dalam hal permohonan diajukan dengan Hak Prioritas</p>
                                                </li>
                                             </ol>
                                          </li>
                                          <li style="padding-left: 10px; position: relative;">
                                             <p style="margin-top: 15px;">Pendaftaran desain industri saat ini seluruhnya dilakukan secara online, <br> Prosedur permohonan pendaftaran paten online:</p>
                                          </li>
                                          <ol type="a">
                                             <li style="padding-left: 10px;position: relative;">
                                                <p>Daftar Akun <br>Registrasi Akun Paten Online: <a href="https://klinikki.kemenperin.go.id/administrator/registration">https://klinikki.kemenperin.go.id/administrator/registration</a><br> kemudian pilih Daftar untuk mendapatkan Username dan Password</p>
                                             </li>
                                             
                                             <li style="padding-left: 10px;position: relative;">
                                                <p style="margin-bottom: 0;" align="">Data Dukung yang Diunggah:</p>
                                                <ol type="1">
                                                   
                                                   <li style="10px;position: relative;">
                                                      <p align="">Gambar Desain Industri (tampak depan, tampak belakang, tampak kiri, tampak kanan, tampak atas dan perspektif), bisa di tambah tampak bawah, gambar potongan atau gambar referensi (misal benda dalam keadaan terbuka dan tertutup) jika diperlukan.</p>
                                                   </li>
                                                   <li style="10px;position: relative;">
                                                      <p align="">Uraian Desain Industri yang dimohonkan pendaftarannya terdiri dari : judul desain, kegunaan desain, klaim (bentuk, konfigurasi dan komposisi garis dan/ warna).</p>
                                                   </li>
                                                   <li style="10px;position: relative;">
                                                      <p align="">Surat Pernyataan Kepemilikan Desain Industri</p>
                                                   </li>
                                                   <li style="10px;position: relative;">
                                                      <p align="">Surat Pernyataan Pengalihan Hak (jika pemohon dan pendesain berbeda)</p>
                                                   </li>
                                                   <li style="10px;position: relative;">
                                                      <p align="">Surat Keterangan UMK (jika pemohon merupakan usaha mikro atau usaha kecil)</p>
                                                   </li>
                                                   <li style="10px;position: relative;">
                                                      <p align="">SK Akta Pendirian (Jika pemohon merupakan lembaga pendidikan atau litbang pemerintah)</p>
                                                   </li>
                                                </ol>
                                             </li>
                                             <li style="padding-left: 10px;position: relative;">
                                                <p style="margin-bottom: 0;" align="">Membuat Permohonan Desain Industri Baru :</p>
                                                <ol type="1">
                                                   
                                                   <li style="10px;position: relative;">
                                                      <p align="">Data Permohonan.</p>
                                                   </li>
                                                   <li style="10px;position: relative;">
                                                      <p align="">Data Desain.</p>
                                                   </li>
                                                   <li style="10px;position: relative;">
                                                      <p align="">Prioritas</p>
                                                   </li>
                                                   <li style="10px;position: relative;">
                                                      <p align="">Dokumen</p>
                                                   </li>
                                                   
                                                </ol>
                                             </li>
                                             <li style="padding-left: 10px;position: relative;">
                                                <p style="margin-bottom: 0;" align="">Formalitas <br>Pengecekan file persyaratan pendaftaran Desain Industri oleh Klinik KI</p>
                                                
                                             </li>
                                          </ol>
                                       </ol>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <img src="<?php echo base_url().'theme/new/img/des.png'?>" alt="" class="img-fluid">
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="tab-4">
                           <div class="row">
                              <div class="col-lg-8 details order-2 order-lg-1">
                                 <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                                 <p class="font-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                                 <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                              </div>
                              <div class="col-lg-4 text-center order-1 order-lg-2">
                                 <img src="assets/img/features-5.png" alt="" class="img-fluid">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>

    <!-- End Services Section -->

    <!-- ======= Download Section ======= -->

      <section id="services" class="services">
         <div class="container aos-init aos-animate" data-aos="fade-up">
            <header class="section-header">
               <h2>---</h2>
               <p>Undang-Undang Desain Industri</p>
            </header>
            <div class="row gy-4">
               <div class="col-lg-12 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                  <div class="service-box blue">
                     <i class="ri-download-cloud-line icon"></i>
                     <h3>UU No. 31 Tahun 2000</h3>
                     <p>Tentang Desain Industri</p>
                     <a href="<?php echo base_url().'assets/img/uuno31.pdf'?>" target="_blank" class="read-more"><span>Download</span> <i class="bi bi-arrow-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </section>

    <!-- End Download Section -->

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
                    ">Pendaftaran Desain Industri
                 </h1>
                 <p style="
                    color: #444444;
                    font-size: 20px;
                    font-weight: 400;
                    ">Daftarkan Desain Industri Anda bersama Klinik KI Ditjen IKMA</p>
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