<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Detail Desain Industri</title>
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
    font-size: 18px;
    font-weight: bold;
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
                        
                                        
                            <div class="scale">Apa yang dimaksud desain industri?</div><br/>
                            <div>
                            <div><p align="justify">Desain Industri adalah suatu kreasi tentang bentuk, konfigurasi atau komposisi garis atau warna, atau garis dan warna, atau gabungan daripadanya yang berbentuk tiga dimensi atau dua dimensi yang memberikan kesan estetis dan dapat diwujudkan dalam pola tiga dimensi atau dua dimensi serta dapat dipakai untuk menghasilkan suatu produk, barang, komoditas industri atau kerajinan tangan.</p></div><br>

                            <div class="scale">Desain Industri yang dapat didaftarkan</div>
                            <div style="margin-left: 0px">
                            <ol start="1">
                            <li> <p align="justify">Desain Industri yang memiliki kebaruan (novelty) dengan catatan jika pada tanggal penerimaan permohonan pendaftaran Desain Industri tersebut tidak sama dengan pengungkapan Desain Industri yang telah ada sebelumnya;</p></li>
                            <li> <p align="justify">Tidak bertentangan dengan peraturan perundang-undangan yang berlaku, ketertiban umum, agama, atau kesusilaan.</p></li>
                            </ol></div><br>

                            <div class="scale">Masa Pelindungan Desain Industri</div><br/>
                            <div>
                            <div><p align="justify">Pemegang hak desain industri memiliki hak eksklusif untuk melaksanakan hak yang dimilikinya dan untuk melarang orang lain tanpa persetujuannya membuat, memakai, menjual, mengimpor, mengekspor, dan/atau mengedarkan produk-produk terkait.</p></div><br>


                            
                           
                            <div class="scale">Daftar Desain Industri Sekarang Klik <a href="<?php echo site_url('administrator');?>" class="awe-btn awe-btn-14">Daftar</a> </div><br/><br/>
                            
                                <!-- <p><?php echo $dataf['detailing']?> </p> -->
                             <a href="<?php echo site_url('fasilities');?>" class="awe-btn awe-btn-13">Halaman sebelumnya....</a> 
                            
                            
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