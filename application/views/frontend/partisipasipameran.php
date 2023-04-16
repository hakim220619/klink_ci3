<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Partisipasi Pameran Klinik KI</title>
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
  
  <style>
     .top-buffer { margin-top:60px; }
     .margin-top { margin-top:8px; }
  </style>
  

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

  

  <main id="main">
    
 <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
        <div class="container">
           <div class="row top-buffer">
              <div class="col-lg-6">
                 <img src="<?php echo base_url().'theme/new/img/blog/partisipasi.jpg'?>" style="border-radius: 4px;max-width: 100%;height: auto;" alt="">
              </div>
              
              <div class="col-lg-6 margin-top">
                 <h1 data-aos="fade-up" class="aos-init aos-animate" style="
                    margin: 0;
                    font-size: 30px;
                    font-weight: 700;
                    color: #012970;
                    ">Partisipasi Pameran Klinik KI
                 </h1>
                 <br>
                 <p style="
                    color: #444444;
                    font-size: 16px;
                    font-weight: 400;
                    ">Untuk memudahkan kalangan masyarakat khususnya pelaku usaha IKM yang berasal dari daerah-daerah di Indonesia mendapatkan layanan dan konsultasi seputar KI, Klinik KI Ditjen IKMA berpartisipasi pada pameran produk-produk IKM berskala nasional yang diikuti oleh pengusaha IKM dari berbagai daerah baik yang diadakan di Jakarta maupun di daerah. 
                    <br><br>
                    Klinik KI Ditjen IKMA memberikan pelayanan pada stand pameran yang telah disiapkan oleh penyelenggara pameran/event organizer dengan dilayani oleh fasilitator Klinik KI yang bertugas setiap hari secara bergantian selama penyelenggaraan pameran berlangsung, layanan yang diberikan berupa konsultasi, pendaftaran KI dan Advokasi.
                          
                  </p>
                 
                    
                   
                    
                 </div>
                 <div class="col-lg-12 margin-top">
                 
                 <p style="
                    color: #444444;
                    font-size: 16px;
                    font-weight: 400;
                    ">Pameran–pameran yang diikuti pada tahun 2019 diantaranya : 
                    <ol type="1">
                     <li style="margin: -8px 0;padding-left: 10px; font-size: 16px;position: relative;">
                     <p style="text-align:justify;font-size:146x;">Pameran Ralali Food Preneur </p>
                     </li>
                     <li style="margin: -8px 0;padding-left: 10px; font-size: 16px;position: relative;">
                      <p style="text-align:justify;font-size:16px;">Pameran Indonesia Industrian Summit (IIS) </p>
                     </li>
                     <li style="margin: -8px 0;padding-left: 10px; font-size: 16px;position: relative;">
                      <p style="text-align:justify;font-size:16px;">Pameran Inacraft</p>
                     </li>                
                     <li style="margin: -8px 0;padding-left: 10px; font-size: 16px;position: relative;">
                      <p style="text-align:justify;font-size:16px;">Pameran Indonesia International Toys & Kids Expo (IITE)</p>
                     </li>
                     <li style="margin: -8px 0;padding-left: 10px; font-size: 16px;position: relative;">
                      <p style="text-align:justify;font-size:16px;">Pameran Pasar IDEA</p>
                     </li>
                     <li style="margin: -8px 0;padding-left: 10px; font-size: 16px;position: relative;">
                      <p style="text-align:justify;font-size:16px;">Pameran INAGRITECH</p>
                     </li>
                     <li style="margin: -8px 0;padding-left: 10px; font-size: 16px;position: relative;">
                      <p style="text-align:justify; font-size:16px;">Pameran Semarak Festival</p>
                     </li>
                    </ol>
                  </p>
                  <br>
                  
                  <div class="navbar" style="position:relative;left:-30px" class="aos-init aos-animate" data-aos-delay="200" data-aos="fade-up">
                  <div>
                      <a class="getstarted scrollto" href="<?php echo site_url('#recent-blog-posts');?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Kembali</span>
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                    
                   
                    
                 </div>

              </div>
             
           </div>

        </div>
     </div>


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
   

  </main><!-- End #main -->

 

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