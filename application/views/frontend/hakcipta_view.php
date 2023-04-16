<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Detail Hak Cipta</title>
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
						
										
                            <div class="scale">Definisi Umum Hak Cipta</div><br/>
                            <div>
                            <div><p align="justify">Hak Cipta merupakan salah satu bagian dari kekayaan intelektual yang memiliki ruang lingkup objek dilindungi paling luas, karena mencakup ilmu pengetahuan, seni dan sastra (art and literary) yang di dalamnya mencakup pula program komputer. Perkembangan ekonomi kreatif yang menjadi salah satu andalan Indonesia dan berbagai negara dan berkembang pesatnya teknologi informasi dan komunikasi mengharuskan adanya pembaruan Undang-Undang Hak Cipta, mengingat Hak Cipta menjadi basis terpenting dari ekonomi kreatif nasional. Dengan Undang-Undang Hak Cipta yang memenuhi unsur pelindungan dan pengembangan ekonomi kreatif ini maka diharapkan kontribusi sektor Hak Cipta dan Hak Terkait bagi perekonomian negara dapat lebih optimal.</p></div><br>

                            <div class="scale">Definisi Hak Cipta</div>
                            <div>
                            <div style="margin-left: 0px">
                            <ul>
                            <li> <p align="justify">Hak Cipta adalah hak eksklusif pencipta yang timbul secara otomatis berdasarkan prinsip deklaratif setelah suatu ciptaan diwujudkan dalam bentuk nyata tanpa mengurangi pembatasan sesuai dengan ketentuan peraturan perundang-undangan.</p></li>
                            <li> <p align="justify">Hak Terkait itu adalah hak yang berkaitan dengan Hak Cipta yang merupakan hak eksklusif bagi pelaku pertunjukan, produser fonogram, atau lembaga penyiaran.</p></li>
                            </ul></div><br>

                            <div class="scale">Ciptaan yang dapat dilindungi</div>
                            <div style="margin-left: 0px">
                            <ol start="1">
                            <li> <p align="justify">Buku, program komputer, pamflet, perwajahan (layout) karya tulis yang diterbitkan, dan semua hasil karya tulis lain;</p></li>
                            <li> <p align="justify">Ceramah, kuliah, pidato, dan ciptaan lain yang sejenis dengan itu;</p></li>
                            <li> <p align="justify">Alat peraga yang dibuat untuk kepentingan pendidikan dan ilmu pengetahuan;</p></li>
                            <li> <p align="justify">Lagu atau musik dengan atau tanpa teks;</p></li>
                            <li> <p align="justify">Drama atau drama musikal, tari, koreografi, pewayangan, dan pantomim;</p></li>
                            <li> <p align="justify">Seni rupa dalam segala bentuk seperti seni lukis, gambar, seni ukir, seni kaligrafi, seni pahat, seni patung, kolase, dan seni terapan;</p></li>
                            <li> <p align="justify">Arsitektur;</p></li>
                            <li> <p align="justify">Peta;</p></li>
                            <li> <p align="justify">Seni Batik;</p></li>
                            <li> <p align="justify">Fotografi;</p></li>
                            <li> <p align="justify">Terjemahan, tafsir, saduran, bunga rampai, dan karya lain dari hasil pengalihwujudan.</p></li>
                            </ol></div><br>


                            
                            <div class="scale">Masa Pelindungan Ciptaan</div>
                            <div style="margin-left: 0px">
                            <ol start="1">
                            <li> <p align="justify">Perlindungan Hak Cipta : Seumur Hidup Pencipta + 70 Tahun.</p></li>
                            <li> <p align="justify">Program Komputer : 50 tahun Sejak pertama kali dipublikasikan.</p></li>
                            <li> <p align="justify">Pelaku : 50 tahun sejak pertama kali di pertunjukkan.</p></li>
                            <li> <p align="justify">Produser Rekaman : 50 tahun sejak Ciptaan di fiksasikan.</p></li>
                            <li> <p align="justify">Lembaga Penyiaran : 20 tahun sejak pertama kali di siarkan.</p></li>
                            </ol></div><br>

                            <div class="scale">Daftar Hak Cipta Sekarang Klik <a href="<?php echo site_url('administrator');?>" class="awe-btn awe-btn-14">Daftar</a> </div><br/><br/>
                            
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