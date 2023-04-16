<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Layanan KI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?php echo base_url().'theme/images/favicon.png'?>"/>
	<meta name="description" content="OpenSource SOURCE CODE company profile hotel yang di develop oleh M Fikri Setiadi">
    
	<!-- META FOR IOS & HANDHELD -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="HandheldFriendly" content="true" />
	<meta name="apple-mobile-web-app-capable" content="YES" />
	<!-- //META FOR IOS & HANDHELD -->

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/font-awesome.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/font-lotusicon.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/owl.carousel.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/magnific-popup.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/settings.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/bootstrap-select.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/helper.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/custom.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/responsive.css'?>">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/style.css'?>">
   <style>
li {
    position: relative;
    padding-left: 10px;
}

img.scale{
  border-radius: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
}

@media screen and (min-width: 601px) {
  div.scale {
    font-size: 26px;
  }
}

@media screen and (max-width: 600px) {
  div.scale {
    font-size: 22px;
  }

  
</style>
</head>

<body>

    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
        <header id="header" class="header-v2">
            
            <!-- HEADER TOP -->
           <?php $this->load->view('frontend/headertop');?>
            <!-- END / HEADER TOP -->
            
            <!-- HEADER LOGO & MENU -->
          <?php $this->load->view('frontend/header');?>
           <!-- END / HEADER LOGO & MENU -->

        </header>
        <!-- END / HEADER -->
        
        <!-- SUB BANNER -->
        <section class="section-sub-banner bg-9">
            <div></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- ABOUT -->
        <section class="section-about">
            <div class="container">

                <div>

                    <!-- ITEM -->
                    <div>
                        <?php
							
								$sqf=$this->db->query("SELECT * from tentangki");
                                $dataf=$sqf->row_array();
						
						?>
                        <div>
                            <!-- <img src="<?php echo base_url().'assets/images/'.$dataf['gambar'];?>" style="width: 100%;max-width: 1000px; height: auto;" alt=""> -->
                        </div>

                        <div>
						
										
                            <div class="scale">D. Layanan Klinik HKI Ditjen IKMA</div><br/>
                            <div>
                         <img class="scale" src="<?php echo base_url().'assets/images/layanan03.jpg';?>" style="width: 100%;max-width: 700px; height: auto;" alt="">
                        </div><br>
                            <div class="container"><label>Bimbingan dan Konsultasi</label></div>
                            <div class="container"><p align="justify">Dalam pelaksanaan kegiatan, Klinik HKI-IKM memberikan layanan berupa bimbingan dan konsultasi terkait KI, diantaranya:</p></div>
                            <div class="container" style="margin-left: 0px">
                            <ol type='1'>
<li> <p align="justify">Mengembangkan IKM melalui bimbingan dan konsultasi, fasilitasi, promosi dan informasi, advokasi serta meningkatkan kerjasama kelembagaan.</p></li></ol>
</div>
<div class="container" style="margin-left: 25px">
<ol type='a'>
<li> <p align="justify">Pemecahan masalah penerapan substansi KI;</p></li>
<li> <p align="justify">Pemecahan masalah pelindungan terhadap KI;</p></li>
<li> <p align="justify">Penyelesaian kelengkapan dokumen dalam rangka pendaftaran KI.
</p></li>
</ol></div>

<div class="container" style="margin-left: 50px">
<p align="justify">Untuk mendapatkan layanan bimbingan dan konsultasi, dapat dilakukan sebagai berikut:</p>
</div>
<div class="container" style="margin-left: 25px">
<ol type='a'>
<li> <p align="justify">Menghubungi kantor sekretariat Klinik HKI-IKM melalui telepon, website, surat menyurat dan e-mail pada setiap hari kerja. </p></li>
<li> <p align="justify">Mendatangi kantor sekretariat Klinik HKI-IKM untuk melakukan konsultasi langsung dengan Tim Klinik HKI-IKM.</p></li>
<li> <p align="justify">Untuk memperlancar jalannya konsultasi, pengusaha IKM atau masyarakat lainnya terlebih dahulu agar mempersiapkan pokok-pokok materi KI yang akan dikonsultasikan.</p></li>
<li> <p align="justify">Pelaksanaan konsultasi dilakukan pada setiap hari kerja, yakni Hari Senin s/d Jum’at mulai pukul 08.00 s/d 16.00 WIB.
</p></li>
</ol></div><br>

<div class="container" style="margin-left: 0px">
<ol start="2">
<li> <p align="justify">Klinik HKI-IKM menyediakan bantuan fasilitator dan tenaga ahli untuk memberikan bimbingan dan konsultasi bagi IKM dan masyarakat lain yang membutuhkan yang menyangkut Kekayaan Intelektual. untuk mendapatkan layanan dimaksud, dapat dilakukan sebagai berikut menyampaikan permohonan secara tertulis kepada Sekretaris Direktorat Jenderal, tembusan kepada Direktur Jenderal IKMA dengan mencantumkan identitas, alamat dan telepon/ faximile yang bersangkutan.</p></li></ol>
</div>

<div class="container" style="margin-left: 0px">
<ol start="3">
<li> <p align="justify">Klinik HKI-IKM menyediakan layanan penyelenggaraan bimbingan teknis di bidang KI meliputi pelatihan fasilitator KI tingkat pemula, pelatihan fasilitator KI tingkat lanjutan dan sosialisasi KI.</p></li></ol>
</div>

<div class="container"><label>Fasilitasi</label></div>
<div class="container"><p align="justify">Klinik HKI-IKM memberikan fasilitasi kepada IKM berupa permohonan pendaftaran di bidang KI yaitu Cipta, Paten, Merek dan Desain Industri.</p></div>
<div class="container"><label>Promosi dan Informasi</label></div>

<div class="container" style="margin-left: 0px">
<ol start="1">
<li> <p align="justify">Layanan Pameran.</p></li></ol>
</div>
<div class="container" style="margin-left: 50px"><p align="justify">Klinik HKI-IKM memberikan layanan dan pemberian informasi tentang KI pada IKM dan masyarakat luas dengan turut berpartisipasi dalam berbagai event pameran di dalam negeri termasuk memberikan fasilitas ruang pamer di stand Klinik HKI-IKM bagi produk industri yang telah terdaftar KI-nya.</p></div>

<div class="container" style="margin-left: 0px">
<ol start="2">
<li> <p align="justify">Layanan Informasi.</p></li></ol>
</div>
<div class="container" style="margin-left: 50px"><p align="justify">Klinik HKI-IKM memberikan berbagai informasi di bidang KI berupa penyebarluasan:</p></div>

<div class="container" style="margin-left: 25px">
<ol type='a'>
<li> <p align="justify">Buku panduan KI;</p></li>
<li> <p align="justify">Leaflet; dan</p></li>
<li> <p align="justify">Informasi lainnya tentang KI.</p></li>
</ol></div>

<div class="container" style="margin-left: 50px"><p align="justify">Perolehan layanan informasi ini dapat dilakukan dengan mendatangi kantor sekretariat Klinik HKI-IKM dengan membawa identitas diri dan tidak dikenakan biaya sepanjang jenis informasi yang dibutuhkan tersedia di Klinik HKI-IKM.</p></div>

<div class="container"><label>Advokasi</label></div>
<div class="container"><p align="justify">Klinik HKI-IKM memberikan fasilitasi layanan konsultasi kepada IKM dalam rangka membantu/ memberikan saran penyelesaian kasus/ permasalahan di bidang KI, menyangkut:</p></div>

<div class="container" style="margin-left: 0px">
<ol start="1">
<li> <p align="justify">Kasus pemalsuan;</p></li>
<li> <p align="justify">Kasus pembajakan;</p></li>
<li> <p align="justify">Kasus peniruan; dan</p></li>
<li> <p align="justify">Kasus penolakan.</p></li>
</ol></div>

<div class="container"><label>Kerjasama Kelembagaan</label></div>
<div class="container"><p align="justify">Klinik HKI-IKM melakukan kerjasama kelembagaan dengan instansi terkait dan stakeholder lainnya di bidang KI, misalnya dengan Direktorat Jenderal Kekayaan Intelektual Kementerian Hukum dan HAM, Balai Besar, Perguruan Tinggi, dan Pemerintah Daerah.</p></div>

<div class="container"><p align="justify">Bentuk kerjasama yang dapat dilakukan antara Klinik HKI-IKM dengan Kementerian Hukum dan HAM antara lain:</p></div>

<div class="container" style="margin-left: 0px">
<ol start="1">
<li> <p align="justify">Pelindungan dan pendaftaran bidang KI;</p></li>
<li> <p align="justify">Narasumber dan instruktur bidang KI; dan</p></li>
<li> <p align="justify">Fasilitasi penyelesaian sengketa bidang KI.</p></li>
</ol></div>

<div class="container"><p align="justify">Bentuk kerjasama yang dapat dilakukan antara Klinik HKI-IKM dengan Dinas yang membawahi sektor industri di daerah antara lain:</p></div>

<div class="container" style="margin-left: 0px">
<ol start="1">
<li> <p align="justify">Penyediaan peserta pelatihan fasilitator KI;</p></li>
<li> <p align="justify">Pengiriman fasilitator dan tenaga ahli KI ke daerah;</p></li>
<li> <p align="justify">Koordinasi fasilitasi KI ke daerah;</p></li>
<li> <p align="justify">Koordinasi terkait pelanggaran KI oleh IKM (Kepolisisan, Kejaksaan); dan</p></li>
<li> <p align="justify">Koordinasi bidang paten hasil invensi IKM terkait penulisan deskripsi paten (Balai Besar, Baristand, Kemenristek, LIPI, Perguruan Tinggi).</p></li>
</ol></div><br>



                                <!-- <p><?php echo $dataf['detailing']?> </p> -->
                             <a href="<?php echo site_url('tentangki');?>" class="awe-btn awe-btn-13">Halaman sebelumnya....</a> 
							
							
                        </div>

                    </div>
                    <!-- END / ITEM -->

                </div>

            </div>
        </section>
        <!-- END / ABOUT -->
        
        <!-- FOOTER -->
         <?php $this->load->view('frontend/footer');?>
		<!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery-1.11.0.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery-ui.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/bootstrap.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/bootstrap-select.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/isotope.pkgd.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.themepunch.revolution.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.themepunch.tools.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/owl.carousel.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.appear.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.countTo.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.countdown.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.parallax-1.1.3.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.magnific-popup.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/scripts.js'?>"></script>
</body>
</html>