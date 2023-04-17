<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Layanan KI</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url() . 'theme/new/img/favicon.png' ?>" rel="icon">

  <link href="<?php echo base_url() . 'theme/new/img/apple-touch-icon.png' ?>" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() . 'theme/new/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/new/vendor/bootstrap-icons/bootstrap-icons.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/new/vendor/aos/aos.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/new/vendor/remixicon/remixicon.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'theme/new/vendor/swiper/swiper-bundle.min.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url() . 'theme/new/vendor/glightbox/css/glightbox.min.css' ?>">
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

    .responsive-map {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }

    .responsive-map iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
    }

    .gchart {
      width: 110%;
      height: 400px;
      margin-left: -10px;
      padding: 0px;
      box-shadow: 0px 0 15px rgb(1 41 112 / 8%);
      transition: 0.3s;

    }


    @media only screen and (min-width: 300px) {
      .gchart {
        width: 110%;
        height: 300px;
        padding-right: 0%;
        padding-left: 0%;
        padding-top: 0%;
        padding-bottom: 0%;
      }

    }
  </style>



  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/new/css/style.css' ?>">

  <!-- Graph -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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

      <a href="<?php echo site_url('Home'); ?>" class="logo d-flex align-items-center">
        <img src="<?php echo base_url() . 'theme/images/logo-header.png' ?>" alt="">
        <!-- <img src="<?php echo base_url() . 'theme/images/logoki.png' ?>" alt=""> -->
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">Tentang</a></li> -->
          <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="#features">Tujuan & Sasaran</a></li>


              <li><a class="nav-link scrollto" href="#faq">Program Layanan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Fasilitasi KI</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="#"><a href="<?php echo site_url('fasilities/hakcipta_new'); ?>"><span>Hak
                    Cipta</span></a>
                <!-- <ul>
                  <li><a href="#">Pengenalan</a></li>
                  <li><a href="#">Undang-Undang</a></li>
                  <li><a href="#">Syarat dan Prosedur</a></li>
                </ul> -->
              </li>
              <li class="#"><a href="<?php echo site_url('fasilities/paten_new'); ?>"><span>Paten</span></a>
                <!-- <ul>
                  <li><a href="#">Pengenalan</a></li>
                  <li><a href="#">Undang-Undang</a></li>
                  <li><a href="#">Syarat dan Prosedur</a></li>
                </ul> -->
              </li>
              <li class="#"><a href="<?php echo site_url('fasilities/merek_new'); ?>"><span>Merek</span></a>
                <!-- <ul>
                  <li><a href="#">Pengenalan</a></li>
                  <li><a href="#">Undang-Undang</a></li>
                  <li><a href="#">Syarat dan Prosedur</a></li>
                </ul> -->
              </li>
              <li class="#"><a href="<?php echo site_url('fasilities/desain_new'); ?>"><span>Desain
                    Industri</span></a>
                <!-- <ul>
                  <li><a href="#">Pengenalan</a></li>
                  <li><a href="#">Undang-Undang</a></li>
                  <li><a href="#">Syarat dan Prosedur</a></li>
                </ul> -->
              </li>

            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#recent-blog-posts">Kegiatan</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Pustaka Digital</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
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
          <li><a class="getstarted scrollto" href="<?php echo site_url('administrator'); ?>">Login</a></li>
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
          <h1 data-aos="fade-up">Klinik KI Ditjen IKMA</h1><br>
          <h5 data-aos="fade-up" data-aos-delay="400">Klinik KI Ditjen IKMA adalah unit kerja yang berfungsi
            melaksanakan pembinaan dan penerapan Kekayaan Inteletual (KI) kepada aparatur pembina IKM dan
            masyarakat Industri khususnya IKM.</h5>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="<?php echo site_url('administrator'); ?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Daftar Sekarang</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?php echo base_url() . 'theme/new/img/hero-img.png' ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Definisi</h3>
              <h2>KEKAYAAN INTELEKTUAL</h2>
              <p>
                Kekayaan Intelektual, disingkat KI adalah hak yang timbul sebagai hasil olah pikir yang
                menghasilkan suatu produk atau proses yang berguna untuk manusia. Pada intinya KI adalah
                hak untuk menikmati secara ekonomis dari suatu kreativitas intelektual. Obyek dalam KI
                adalah karya karya yang timbul atau lahir karena kemampuan intelektual manusia.
              </p>
              <div class="text-center text-lg-start">
                <a href="<?php echo base_url() . '#features' ?>" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?php echo base_url() . 'theme/new/img/abouttt.jpg' ?>" style="border-radius: 4px;max-width: 100%;height: auto;" alt="">
          </div>

        </div>
      </div>



    </section><!-- End About Section -->

    <!-- ======= About Section 2 ======= -->
    <section id="aboutsection2" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?php echo base_url() . 'theme/new/img/portfolio/capaian-ki3.jpg' ?>" style="border-radius: 8px;max-width: 99.8%;padding-bottom: 1px;height: auto;" alt="">
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?php echo base_url() . 'theme/new/img/portfolio/fasilitas-ki2.jpg' ?>" style="border-radius: 8px;max-width: 99.8%;height: auto;padding-top: 1px;" alt="">
          </div>

        </div>
      </div>



    </section><!-- End About Section 2-->


    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Fasilitasi</h2>
          <p>Layanan KI Ditjen IKMA</p>
        </header>

        <div class="row">

          <div class="col-lg-3">
            <div class="box" data-aos="fade-up" data-aos-delay="200">
              <img src="<?php echo base_url() . 'theme/new/img/hakcipta.png' ?>" class="img-fluid" alt=""><br>
              <h3>Hak Cipta</h3>
              <p style="font-size: 15px;">Hak Cipta adalah hak eksklusif pencipta yang timbul secara
                otomatis berdasarkan prinsip deklaratif setelah suatu ciptaan diwujudkan dalam bentuk
                nyata... </p>
              <a href="<?php echo site_url('fasilities/hakcipta_new'); ?>" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="box" data-aos="fade-up" data-aos-delay="200">
              <img src="<?php echo base_url() . 'theme/new/img/paten.png' ?>" class="img-fluid" alt="">
              <h3>Paten</h3>
              <p style="font-size: 15px;">Paten adalah hak eksklusif yang diberikan oleh Negara kepada
                Inventor atas hasil Invensinya dibidang teknologi, untuk jangka waktu tertentu ...</p>
              <a href="<?php echo site_url('fasilities/paten_new'); ?>" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 mt-3 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="400">
              <img src="<?php echo base_url() . 'theme/new/img/merek.png' ?>" class="img-fluid" alt="">
              <h3>Merek</h3>
              <p style="font-size: 15px;">Merek adalah tanda yang dapat ditampilkan secara grafis berupa
                gambar, logo, nama, kata, huruf, angka, susunan warna dalam bentuk 2 (dua) dimensi
                dan/atau 3 (tiga) dimensi ...</p>
              <a href="<?php echo site_url('fasilities/merek_new'); ?>" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 mt-3 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="600">
              <img src="<?php echo base_url() . 'theme/new/img/desainindustri.png' ?>" class="img-fluid" alt="">
              <h3>Desain Industri</h3>
              <p style="font-size: 15px;">Desain Industri adalah suatu kreasi tentang bentuk, konfigurasi
                atau komposisi garis atau warna, atau garis dan warna, atau gabungan... </p>
              <a href="<?php echo site_url('fasilities/desain_new'); ?>" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->


    <!-- ======= Values Section ======= -->
    <section id="graph" class="graph">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Grafik</h2>
          <p>Layanan Merek</p>
        </header>

        <div class="row">

          <div class="col-lg-12">
            <div class="box" data-aos="fade-up" data-aos-delay="200">

              <div class="container">
                <div class="row" style="justify-content: center;">
                  <div class="col-md-4">
                    <h5>Pilih Data Berdasarkan Tahun</h5>
                  </div>
                  <div class="col-md-8">
                    <select name="tahun" id="tahun" class="form-group">
                      <option value="">Pilih tahun</option>
                      <?php
                      foreach ($tahun_list->result_array() as $row) {
                        echo '<option value="' . $row["tahun"] . '">' . $row["tahun"] . '</option>';
                      }
                      ?>

                    </select>
                  </div>
                  <div class="row" style="justify-content: center;">
                    <div class="col-md-6">
                      <div id="piechart" class="gchart"></div>
                    </div>
                    <div class="col-md-6">
                      <div id="chart_area" class="gchart"></div>
                    </div>

                  </div>
                </div>
              </div>





            </div>
          </div>


        </div>
      </div>

    </section><!-- End Values Section -->


    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Tentang</h2>
          <p> Klinik Kekayaan Intelektual</p>
        </header>


        <!-- Feature Tabs -->
        <div class="row feture-tabs mt-auto" data-aos="fade-up">
          <div class="col-lg-6">
            <!-- <h3>Tentang KI</h3> -->

            <!-- Tabs -->
            <ul class="nav nav-pills mb-3">
              <li>
                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Sasaran</a>
              </li>
              <li>
                <a class="nav-link" data-bs-toggle="pill" href="#tab2">Tujuan</a>
              </li>
              <!-- <li>
                <a class="nav-link" data-bs-toggle="pill" href="#tab3">Visi</a>
              </li>
              <li>
                <a class="nav-link" data-bs-toggle="pill" href="#tab4">Misi</a>
              </li> -->

            </ul><!-- End Tabs -->
            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="tab1">
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;font-size: 15px;">Meningkatnya jumlah pengusaha
                    industri kecil dan menengah yang memperoleh pelayanan dari Klinik KI IKM.</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;font-size: 15px;">Meningkatnya kesadaran para
                    pengusaha industri kecil menengah untuk memanfaatkan layanan pendaftaran
                    subyek-subyek KI.</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;font-size: 15px;">Terciptanya kesamaan persepsi antara
                    para pengusaha industri kecil menengah dan aparat pembina.</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;font-size: 15px;">Meningkatkan jumlah dan kemampuan
                    fasilitator KI.</p>
                </div>
              </div><!-- End Tab 1 Content -->
              <div class="tab-pane fade show" id="tab2">
                <p style="text-align: justify;font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dalam
                  rangka mengoptimalkan KI di masyarakat industri kecil dan menengah, Direktorat
                  Jenderal Industri Kecil, Menengah dan Aneka (Ditjen IKMA) Kementerian Perindustrian
                  terus memacu program pembinaan dan pengembangan KI dengan membentuk "Klinik KI-IKM"
                  yang bertujuan memberikan pengetahuan dan pemahaman tentang perlindungan terhadap
                  karya-karya intelektual, yaitu: Paten, Merk, Indikasi Geografis, Cipta, Desain
                  Industri, Rahasia Dagang dan Desain Tata Letak Sirkuit Terpadu melalui pelatihan,
                  bimbingan dan konsultasi, advokasi, layanan pendaftaran serta promosi dan informasi.
                </p>

              </div><!-- End Tab 2 Content -->

              <!-- <div class="tab-pane fade show" id="tab3">
                <p style="text-align: justify;">Menjadikan Klinik KI Ditjen IKMA sebagai lembaga layanan kekayaan intelektual yang profesional, dinamis dan bersinergi dalam meningkatkan daya saing IKM.</p>
              </div>End Tab 3 Content -->

              <!--<div class="tab-pane fade show" id="tab4">
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;">Mengembangkan IKM melalui bimbingan dan konsultasi, fasilitasi, promosi dan informasi, advokasi serta meningkatkan kerjasama kelembagaan</p>
                </div>
                <div class="d-flex align-items mb-2">
                  <i class="bi bi-check2"></i>
                  <p style="text-align: justify;">Meningkatkan kemampuan SDM di bidang Kekayaan Intelektuals</p>
                </div>
                
              </div> End Tab 4 Content -->



            </div>

          </div>

          <div class="col-lg-6">
            <img src="<?php echo base_url() . 'theme/new/img/aboutt.jpeg' ?>" style="border-radius: 4px;max-width: 100%;height: auto;" alt="">
          </div>

        </div><!-- End Feature Tabs -->



      </div>

    </section><!-- End Features Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Program</h2>
          <p>Layanan Kekayaan Intelektual</p>
        </header>

        <div class="row">
          <div class="col-lg-6">
            <img src="<?php echo base_url() . 'theme/new/img/collapse.png' ?>" style="border-radius: 4px;max-width: 100%;height: auto;" alt="">
          </div>
          <div class="col-lg-6">
            <!-- F.A.Q List 1-->
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    Bimbingan dan Konsultasi
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">

                    <div>
                      <p align="justify">Dalam pelaksanaan kegiatan, Klinik KI-IKM memberikan
                        layanan berupa bimbingan dan konsultasi terkait KI, diantaranya:</p>
                    </div>
                    <div>
                      <ol type='1'>
                        <li>
                          <p align="justify">Klinik KI-IKM memberikan kesempatan kepada
                            aparat, pengusaha IKM dan masyarakat luas untuk mendapatkan
                            pelayanan bimbingan dan konsultasi baik secara langsung maupun
                            tidak langsung melalui telepon, e-mail dan surat menyurat dengan
                            Tim Klinik KI-IKM, menyangkut :</p>
                        </li>
                      </ol>
                    </div>
                    <div style="margin-left: 25px">
                      <ol type='a'>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Pemecahan masalah penerapan substansi KI;</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Pemecahan masalah pelindungan terhadap KI;</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Penyelesaian kelengkapan dokumen dalam rangka
                            pendaftaran KI.
                          </p>
                        </li>
                      </ol>
                    </div>

                    <div style="margin-left: 30px">
                      <p align="justify">Untuk mendapatkan layanan bimbingan dan konsultasi, dapat
                        dilakukan sebagai berikut:</p>
                    </div>
                    <div style="margin-left: 25px">
                      <ol type='a'>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Menghubungi kantor sekretariat Klinik KI-IKM
                            melalui telepon, website, surat menyurat dan e-mail pada setiap
                            hari kerja. </p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Mendatangi kantor sekretariat Klinik KI-IKM untuk
                            melakukan konsultasi langsung dengan Tim Klinik KI-IKM.</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Untuk memperlancar jalannya konsultasi, pengusaha
                            IKM atau masyarakat lainnya terlebih dahulu agar mempersiapkan
                            pokok-pokok materi KI yang akan dikonsultasikan.</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Pelaksanaan konsultasi dilakukan pada setiap hari
                            kerja, yakni Hari Senin s/d Jum’at mulai pukul 08.00 s/d 16.00
                            WIB.
                          </p>
                        </li>
                      </ol>
                    </div><br>

                    <div>
                      <ol start="2">
                        <li>
                          <p align="justify">Klinik KI-IKM menyediakan bantuan fasilitator dan
                            tenaga ahli untuk memberikan bimbingan dan konsultasi bagi IKM
                            dan masyarakat lain yang membutuhkan yang menyangkut Kekayaan
                            Intelektual. untuk mendapatkan layanan dimaksud, dapat dilakukan
                            sebagai berikut menyampaikan permohonan secara tertulis kepada
                            Sekretaris Direktorat Jenderal, tembusan kepada Direktur
                            Jenderal IKMA dengan mencantumkan identitas, alamat dan telepon/
                            faximile yang bersangkutan.</p>
                        </li>
                      </ol>
                    </div>

                    <div>
                      <ol start="3">
                        <li>
                          <p align="justify">Klinik KI-IKM menyediakan layanan penyelenggaraan
                            bimbingan teknis di bidang KI meliputi pelatihan fasilitator KI
                            tingkat pemula, pelatihan fasilitator KI tingkat lanjutan dan
                            sosialisasi KI tingkat lanjutan dan sosialisasi KI. Untuk
                            mendapatkan layanan tersebut, dapat dilakukan sebagai berikut :
                          </p>
                        </li>
                      </ol>
                    </div>

                    <div style="margin-left: 25px">
                      <ol type='a'>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Menyampaikan permohonan secara tertulis kepada
                            Sekretaris Direktorat Jenderal, tembusan kepada Direktur
                            Jenderal IKMA dengan mencantumkan identitas, alamat dan telepon/
                            faximile yang bersangkutan.</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Pelaksanaan pelatihan akan diselenggarakan
                            apabila jumlah peserta pelatihan minimal 20 orang dan maksimal
                            30 orang dan tersedianya ruangan yang cukup layak untuk
                            kebutuhan proses belajar.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    Advokasi
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    <div>
                      <p align="justify">Klinik KI-IKM memberikan fasilitasi layanan konsultasi
                        kepada IKM dalam rangka membantu/ memberikan saran penyelesaian kasus/
                        permasalahan di bidang KI, menyangkut :</p>
                    </div>
                    <div>
                      <ol type='1'>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Kasus pemalsuan;</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Kasus pembajakan;</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Kasus peniruan; dan</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Kasus penolakan.</p>
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    Kerjasama Kelembagaan
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    <div>
                      <p align="justify">Klinik KI-IKM melakukan kerja sama kelembagaan dengan
                        instansi terkait dan stakeholder lainnya di bidang KI, misalnya dengan
                        Direktorat Jenderal Kekayaan Intelektual Kementerian Hukum dan HAM,
                        Balai Besar, Perguruan Tinggi, dan
                        Pemerintah Daerah. Bentuk kerja sama yang dapat dilakukan antara Klinik
                        KI-IKM dengan Kementerian Hukum dan HAM antara lain :</p>
                    </div>
                    <div>
                      <ol type='1'>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Pelindungan dan pendaftaran bidang KI;</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Narasumber dan instruktur bidang KI; dan</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Fasilitasi penyelesaian sengketa bidang KI.</p>
                        </li>
                      </ol>
                    </div>
                    <div>
                      <p align="justify">Bentuk kerja sama yang dapat dilakukan antara Klinik
                        KI-IKM dengan Dinas yang membawahi sector industry di daerah antara lain
                        :</p>
                    </div>
                    <div>
                      <ol type='1'>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Penyediaan peserta pelatihan fasilitator KI;</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Pengiriman fasilitator dan tenaga ahli KI ke
                            daerah;</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Koordinasi fasilitasi KI ke daerah;</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Koordinasi terkait pelanggaran KI oleh IKM
                            (Kepolisisan, Kejaksaan); dan</p>
                        </li>
                        <li style="padding-left: 10px;position: relative;">
                          <p align="justify">Koordinasi bidang paten hasil invensi IKM terkait
                            penulisan deskripsi paten
                            (Balai Besar, Baristand/ PM KI, Kemenristek, LIPI, Perguruan
                            Tinggi).</p>
                        </li>
                      </ol>

                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                      Promosi dan Informasi
                    </button>
                  </h2>
                  <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                    <div class="accordion-body">
                      <div>
                        <ol type='1'>
                          <li>
                            <p align="justify">Partisipasi Pameran :</p>
                          </li>
                        </ol>
                      </div>
                      <div>
                        <p style="margin-left: 30px" align="justify">Klinik KI-IKM memberikan
                          layanan dan pemberian informasi tentang KI pada IKM dan masyarakat
                          luas dengan turut berpartisipasi dalam berbagai event pameran di
                          dalam negeri termasuk memberikan fasilitas ruang pamer di stand
                          Klinik KI-IKM bagi produk industri yang telah terdaftar KI-nya.</p>
                      </div>
                      <div>
                        <ol start="2">
                          <li>
                            <p align="justify">Layanan Informasi :</p>
                          </li>
                        </ol>
                      </div>
                      <div>
                        <p style="margin-left: 30px" align="justify">Klinik KI-IKM memberikan
                          berbagai informasi di bidang KI berupa penyebarluasan :</p>
                      </div>
                      <div style="margin-left: 25px">
                        <ol type='a'>
                          <li style="padding-left: 10px;position: relative;">
                            <p align="justify">Buku panduan KI;</p>
                          </li>
                          <li style="padding-left: 10px;position: relative;">
                            <p align="justify">Leaflet; dan</p>
                          </li>
                          <li style="padding-left: 10px;position: relative;">
                            <p align="justify">Informasi lainnya tentang KI.</p>
                          </li>
                        </ol>
                      </div>
                      <div>
                        <p style="margin-left: 30px" align="justify">Perolehan layanan informasi
                          ini dapat dilakukan dengan mendatangi kantor sekretariat Klinik
                          KI-IKM dengan membawa identitas diri dan tidak dikenakan biaya
                          sepanjang jenis informasi yang dibutuhkan tersedia di Klinik KI-IKM.
                        </p>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                      Fasilitasi
                    </button>
                  </h2>
                  <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                    <div class="accordion-body">
                      Klinik KI-IKM memberikan fasilitasi kepada IKM berupa permohonan pendaftaran
                      di bidang KI yaitu Cipta, Paten, Merek dan Desain Industri.
                    </div>
                  </div>
                </div>

              </div>
            </div>



          </div>

        </div>

    </section><!-- End F.A.Q Section -->

    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>---</h2>
          <p>Pustaka Digital</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-buku">Buku</li>
              <li data-filter=".filter-flyer">Flyer</li>
              <li data-filter=".filter-ln">Lain-Lain</li>
            </ul>
          </div>
        </div>

        <div class="row gy-4 portfolio-container" style="text-align: center;" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-buku">
            <div class="portfolio-wrap">
              <img style="border-radius: 4px;max-width: 100%;height: auto;" src="<?php echo base_url() . 'theme/new/img/portfolio/buku-ki.png' ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Buku KI</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="<?php echo base_url() . 'theme/new/img/portfolio/buku-ki.png' ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Buku KI, meningkatkan pengetahuan dan pemahaman IKM dan masyarakat tentang keberadaan dan pelaksanaan sistem pelindungan KI di tanah air sesuai dengan regulasi terbaru"><i class="bi bi-link"></i></a>
                  <a href="<?php echo base_url() . 'theme/new/img/portfolio/buku-ki.pdf' ?>" target="_blank" title="Download"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
              </div>
            </div>
          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-flyer">
            <div class="portfolio-wrap">
              <img style="border-radius: 4px;max-width: 100%;height: auto;" src="<?php echo base_url() . 'theme/new/img/portfolio/flyer-ki.png' ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Flyer KI</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="<?php echo base_url() . 'theme/new/img/portfolio/flyer-ki.png' ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i class="bi bi-link"></i></a>
                  <a href="<?php echo base_url() . 'theme/new/img/portfolio/flyer-ki.pdf' ?>" target="_blank" title="Download"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-ln">
            <div class="portfolio-wrap">
              <img style="border-radius: 4px;max-width: 100%;height: auto;" src="<?php echo base_url() . 'theme/new/img/portfolio/fasilitas-ki.jpeg' ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Fasilitas KI</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="<?php echo base_url() . 'theme/new/img/portfolio/fasilitas-ki.jpeg' ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i class="bi bi-link"></i></a>
                  <a href="<?php echo base_url() . 'theme/new/img/portfolio/fasilitas-ki.jpeg' ?>" target="_blank" title="Download"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
              </div>
            </div>
          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-ln">
            <div class="portfolio-wrap">
              <img style="border-radius: 4px;max-width: 100%;height: auto;" src="<?php echo base_url() . 'theme/new/img/portfolio/capain-ki.jpeg' ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>capaian KI</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="<?php echo base_url() . 'theme/new/img/portfolio/capain-ki.jpeg' ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i class="bi bi-link"></i></a>
                  <a href="<?php echo base_url() . 'theme/new/img/portfolio/capain-ki.jpeg' ?>" target="_blank" title="Download"><i class="bi bi-arrow-down-circle"></i></a>
                </div>
              </div>
            </div>
          </div>


        </div>

      </div>

    </section>


    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Kegiatan</h2>
          <p>Klinik KI Ditjen IKMA</p>
        </header>

        <div class="row">
          <?php foreach ($kegiatan as $k) { ?>
            <div class="col-lg-4" style="padding: 20px;">
              <div class="post-box">
                <div class="post-img"><img src="<?php echo base_url() . '/assets/images/' . $k->image . '' ?>" class="img-fluid" alt=""></div>
                <span class="post-date"><?= $k->created_at ?></span>
                <div class="post-title" style="margin-bottom: 0px;">
                  <p><?= $k->title ?></p>
                </div>
                <p><?= $k->deskripsi ?></p>

                <a href="<?php echo site_url('home/content/' . $k->id . ''); ?>" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          <?php } ?>





        </div>

      </div>
      <a href="<?php echo site_url('home/contentAll'); ?>" style="margin-left: 48%;">Read more..</a>
    </section><!-- End Recent Blog Posts Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Kontak</h2>
          <p>Hubungi Kami</p>
        </header>

        <div class="row gy-4" data-aos="zoom-out" data-aos-delay="200">

          <div class="col-lg-6">

            <div class="info-box">

              <h3>Peta</h3><br>
              <div class="responsive-map">
                <iframe class=".google-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.195191457879!2d106.82879891431041!3d-6.237984562820852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6bc23da9955%3A0xa874f440f556cc6e!2sKementerian%20Perindustrian%20RI!5e0!3m2!1sen!2sid!4v1611544747171!5m2!1sen!2sid" width="400" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
            </div>



          </div>

          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
            <form action="<?php echo site_url('contact/kirim'); ?>" method="post">
              <div class="php-email-form">
                <div class="row gy-4">

                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Isikan Nama" required>
                  </div>

                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>

                  <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                  </div>

                  <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Tinggalkan Pesan Anda" required></textarea>
                  </div>

                  <div class="col-md-12 text-center">

                    <button type="submit">Kirim Pesan</button><br>

                  </div>
            </form>
          </div>
          <div id="contact-content" style="text-align: center;">
            <?php echo $this->session->flashdata('msg'); ?></div>
        </div>
      </div>



      <div class="col-lg-12">
        <div class="row gy-4">

          <div class="col-md-3" data-aos="zoom-out" data-aos-delay="200">
            <div class="info-box">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>Jl. Jenderal Gatot Subroto,<br>Kav. 52-53 Lantai 15,<br>Kuningan Timur, Jakarta Selatan
                12950</p>
            </div>
          </div>

          <div class="col-md-3" data-aos="zoom-out" data-aos-delay="200">
            <div class="info-box">
              <i class="bi bi-telephone"></i>
              <h3>Hubungi Kami</h3>
              <p>+62 21 525 5509 <br>Ext. 2168</p>
              <p><a href="https://wa.me/6282312901430?text=" target="_blank">+62 823 1290 1430</a><img src="<?php echo base_url() . 'theme/new/img/logowa.png' ?>" style="width: 35px;height: auto;" alt=""></p>
            </div>
          </div>

          <div class="col-md-3" data-aos="zoom-out" data-aos-delay="200">
            <div class="info-box">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>klinik.hkiikm@gmail.com</p>
            </div>
          </div>

          <div class="col-md-3" data-aos="zoom-out" data-aos-delay="200">
            <div class="info-box">
              <i class="bi bi-clock"></i>
              <h3>Jam Kerja</h3>
              <p>Senin - Jumat<br>8:00 - 16:00 WIB</p>
            </div>
          </div>


        </div>

      </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">



    <!--  <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="<?php echo base_url() . 'theme/new/img/logo.png' ?>" alt="">
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

  <!--<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>-->

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url() . 'theme/new/vendor/bootstrap/js/bootstrap.bundle.js' ?>"></script>
  <script src="<?php echo base_url() . 'theme/new/vendor/aos/aos.js' ?>"></script>
  <script src="<?php echo base_url() . 'theme/new/vendor/php-email-form/validate.js' ?>"></script>
  <script src="<?php echo base_url() . 'theme/new/vendor/swiper/swiper-bundle.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'theme/new/vendor/purecounter/purecounter.js' ?>"></script>
  <script src="<?php echo base_url() . 'theme/new/vendor/isotope-layout/isotope.pkgd.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'theme/new/vendor/glightbox/js/glightbox.min.js' ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url() . 'theme/new/js/main.js' ?>"></script>


  <!-- Graph -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart']
    });
    google.charts.setOnLoadCallback();

    function load_komoditiwise_data(tahun, title) {
      var temp_title = title + ' ' + tahun;
      $.ajax({
        url: "<?php echo base_url(); ?>home/fetch_data",
        method: "POST",
        data: {
          tahun: tahun
        },
        dataType: "JSON",
        success: function(data) {
          drawkomoditiwiseChart(data, temp_title);
        }
      })
    }

    function drawkomoditiwiseChart(chart_data, chart_main_title) {
      var jsonData = chart_data;
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'komoditi');
      data.addColumn('number', 'jml');

      $.each(jsonData, function(i, jsonData) {
        var komoditi = jsonData.komoditi;
        var jml = parseFloat($.trim(jsonData.jml));
        data.addRows([
          [komoditi, jml]
        ]);
      });

      var options = {
        title: chart_main_title,

        hAxis: {
          title: "Komoditi"
        },
        vAxis: {
          title: 'Jumlah'
        },
        'legend': 'right',

        chartArea: {
          width: '75%',
          height: '70%'
        }

      }

      var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_area'));
      var chart2 = new google.visualization.PieChart(document.getElementById('piechart'));
      // var chart3 = new google.visualization.AreaChart(document.getElementById('chart_div'));
      // var chart4 = new google.visualization.LineChart(document.getElementById('donutchart'));

      chart1.draw(data, options);
      chart2.draw(data, options);
      // chart3.draw(data, options);
      // chart4.draw(data, options);


    }
  </script>

  <script type="text/javascript">
    (function() {
      var options = {
        whatsapp: "+62 823 1290 1430", // WhatsApp number
        call_to_action: "Kirimi kami pesan", // Call to action
        position: "right", // Position may be 'right' or 'left'
      };
      var proto = document.location.protocol,
        host = "getbutton.io",
        url = proto + "//static." + host;
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = url + '/widget-send-button/js/init.js';
      s.onload = function() {
        WhWidgetSendButton.init(host, proto, options);
      };
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    })();
  </script>

  <script>
    $(document).ready(function() {

      // var tahun='2014'; 
      // $("#tahun").val(tahun);


      $('#tahun').change(function() {
        var tahun = $(this).val();
        if (tahun != '') {
          load_komoditiwise_data(tahun, 'Data Merek Tahun');
        }

      });

      $(window).on("load", function() {
        var tahun = document.getElementById('tahun').value = '2014';
        load_komoditiwise_data('2014', 'Data Merek Tahun');

      });


    });
  </script>

</body>

</html>