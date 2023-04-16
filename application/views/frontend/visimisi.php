<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Visi Misi KI</title>
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

@media screen and (min-width: 601px) {
  div.scale {
    font-size: 26px;
  }
}

@media screen and (max-width: 600px) {
  div.scale {
    font-size: 18px;
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
						
										
                            <div class="scale">A. Visi Dan Misi Klinik KI Ditjen IKMA</div><br/>
                            <div class="container" style="margin-left: 17px"><label>VISI</label></div>
                            <div class="container" style="margin-left: 17px"><p align="justify">Menjadikan Klinik HKI Ditjen IKMA sebagai lembaga layanan kekayaan intelektual yang profesional, dinamis dan bersinergi dalam meningkatkan daya saing IKM.</p></div><br>
                            <div class="container" style="margin-left: 17px"><label>MISI</label></div>
                            <div class="container" style="margin-left: 0px">
<ol type='1'>
<li> <p align="justify">Mengembangkan IKM melalui bimbingan dan konsultasi, fasilitasi, promosi dan informasi, advokasi serta meningkatkan kerjasama kelembagaan.</p></li>
<li> <p align="justify">Meningkatkan kemampuan SDM di bidang Kekayaan Intelektual</p></li>
</ol></div><br>

<div class="scale">B. Sasaran Klinik HKI Ditjen IKMA</div>
<div class="container"><ol type='1'>
<li> <p align="justify">Meningkatnya jumlah pengusaha industri kecil dan menengah yang memperoleh pelayanan dari Klinik HKI.</p></li>
<li> <p align="justify">Meningkatnya kesadaran para pengusaha industri kecil menengah untuk memanfaatkan layanan pendaftaran subyek-subyek KI.</p></li>
<li> <p align="justify">Terciptanya kesamaan persepsi antara para pengusaha industri kecil menengah dan aparat pembina.</p></li>
<li> <p align="justify">Meningkatkan jumlah dan kemampuan fasilitator KI.</p></li>
</ol></div><br>

<div class="scale">C. Tugas Dan Wewenang Klinik KI Ditjen IKMA</div>
<div class="container" style="margin-left: 10px"><p align="justify">Untuk meningkatkan pelayanan terhadap dunia usaha melalui pembinaan dan penerapan KI, Klinik HKI Ditjen IKMA mempunyai tugas dan wewenang sebagai berikut:</p></div>
<div class="container"><ol type='1'>
<li> <p align="justify">Menyebarluaskan informasi tentang KI khususnya bagi IKM melalui buku panduan KI, brosur/ leaflet, dan sarana informasi lainnya tentang KI;</p></li>
<li> <p align="justify">Memberikan layanan konsultasi dan bimbingan menyangkut KI kepada IKM;</p></li>
<li> <p align="justify">Memberikan pelindungan hukum terhadap IKM dalam penyelesaian permasalahan di bidang KI;</p></li>
<li> <p align="justify">Menyusun pola kerja keterkaitan dan pelaksanaan koordinasi KI dengan instansi dan lembaga terkait, baik di pusat dan daerah (provinsi dan kabupaten/kota), khususnya program KI dalam rangka mendukung daya saing IKM);</p></li>
<li> <p align="justify">Melakukan koordinasi dengan Pusat Manajemen Hak Kekayaan Intelektual Kementerian Perindustrian dalam penerapan KI di bidang industri khususnya IKM;</p></li>
<li> <p align="justify">Memantau, analisa dan evaluasi pelaksanaan kegiatan layanan KI (kendala, peluang, tantangan) yang dilakukan terhadap masyarakat Industri khususnya IKM; </p></li>
<li> <p align="justify">Menyediakan bantuan fasilitator dan tenaga ahli KI kepada IKM; dan</p></li>
<li> <p align="justify">Meningkatkan profesionalitas pengelola Klinik HKI Ditjen IKMA.</p></li>
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