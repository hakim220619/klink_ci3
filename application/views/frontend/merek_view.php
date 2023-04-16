<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Detail Merek</title>
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
						
										
                            <div class="scale">Apa yang dimaksud Merek?</div><br/>
                            <div>
                            <div><p align="justify">Merek adalah tanda yang dapat ditampilkan secara grafis berupa gambar, logo, nama, kata, huruf, angka, susunan warna, dalam bentuk 2 (dua) dimensi dan/atau 3 {tiga) dimensi, suara, hologram, atau kombinasi dari 2 (dua) atau lebih unsur tersebut untuk membedakan barang dan/atau jasa yang diproduksi oleh orang atau badan hukum dalam kegiatan perdagangan barang dan/atau jasa.</p></div><br>

                            <div class="scale">Apakah fungsi pemakaian Merek itu?</div>
                            <div>
                            <div><p align="justify">Pemakaian Merek berfungsi sebagai :</p></div>
                            <div style="margin-left: 0px">
                            <ol start="1">
                            <li> <p align="justify">Tanda pengenal untuk membedakan hasil produksi yang dihasilkan seseorang atau beberapa orang secara bersama-sama atau badan hukum dengan produksi orang lain atau badan hukum lainnya;</p></li>
                            <li> <p align="justify">Alat promosi, sehingga mempromosikan hasil produksinya cukup dengan menyebut Mereknya;</p></li>
                            <li> <p align="justify">Jaminan atas mutu barangnya;</p></li>
                            <li> <p align="justify">Penunjuk asal barang/jasa dihasilkan.</p></li>
                            </ol></div><br>

                            <div class="scale">Apakah fungsi pendaftaran Merek itu?</div>
                            <div><p align="justify">Pendaftaran Merek berfungsi sebagai :</p></div>
                            <div style="margin-left: 0px">
                            <ol start="1">
                            <li> <p align="justify">Alat bukti bagi pemilik yang berhak atas Merek yang didaftarkan;</p></li>
                            <li> <p align="justify">Dasar penolakan terhadap Merek yang sama keseluruhan atau sama pada pokoknya yang dimohonkan pendaftaran oleh orang lain untuk barang/jasa sejenisnya;</p></li>
                            <li> <p align="justify">Dasar untuk mencegah orang lain memakai Merek yang sama keseluruhan atau  sama  pada pokoknya  dalam  peredaran  untuk barang/jasa sejenisnya.</p></li>
                            </ol></div><br>


                            <div class="scale">Merek bagaimanakah yang tidak dapat didaftarkan?</div>
                            <div style="margin-left: 0px">
                            <ol start="1">
                            <li> <p align="justify">bertentangan dengan ideologi negara, peraturan perundang-undangan, moralitas, agama, kesusilaan, atau ketertiban umum;</p></li>
                            <li> <p align="justify">sama dengan, berkaitan dengan, atau hanya menyebut barang dan/atau jasa yang dimohonkan pendaftarannya;</p></li>
                            <li> <p align="justify">memuat unsur yang dapat menyesatkan masyarakat tentang asal, kualitas, jenis, ukuran, macam, tujuan penggunaan barang dan/atau jasa yang dimohonkan pendaftarannya atau merupakan nama varietas tanaman yang dilindungi untuk barang dan/atau jasa yang sejenis;</p></li>
                            <li> <p align="justify">memuat keterangan yang tidak sesuai dengan kualitas, manfaat, atau khasiat dari barang dan/atau jasa yang diproduksi;</p></li>
                            <li> <p align="justify">tidak memiliki daya pembeda; dan/atau</p></li>
                            <li> <p align="justify">merupakan nama umum dan/atau lambang milik umum.</p></li>
                            </ol></div><br>

                            <div class="scale">Apakah yang menyebabkan permohonan pendaftaran Merek ditolak?</div>
                            <div><p align="justify">Permohonan pendaftaran Merek ditolak apabila Merek tersebut :</p></div>
                            <div style="margin-left: 0px">
                            <ol start="1">
                            <li> <p align="justify">mempunyai persamaan pada pokoknya atau keseluruhannya dengan Merek milik pihak lain yang sudah terdaftar lebih dahulu untuk barang dan/atau jasa yang sejenis;</p></li>
                            <li> <p align="justify">mempunyai persamaan pada pokoknya atau keseluruhannya dengan Merek yang sudah terkenal milik pihak lain untuk barang dan/atau jasa sejenis;</p></li>
                            <li> <p align="justify">mempunyai persamaan pada pokoknya atau keseluruhannya dengan Merek yang sudah terkenal milik pihak lain untuk barang dan/atau jasa tidak sejenis sepanjang memenuhi persyaratan tertentu yang ditetapkan lebih lanjut dengan peraturan pemerintah;</p></li>
                            <li> <p align="justify">mempunyai persamaan pada pokoknya atau keseluruhannya dengan indikasi-geografis yang sudah dikenal;</p></li>
                            <li> <p align="justify">merupakan atau menyerupai nama orang terkenal, foto, atau nama badan hukum yang dimiliki orang lain, kecuali atas persetujuan tertulis dari yang berhak;</p></li>
                            <li> <p align="justify">merupakan tiruan atau menyerupai nama atau singkatan nama, bendera, lambang atau simbol atau emblem negara atau lembaga nasional maupun internasional, kecuali atas persetujuan tertulis dari pihak yang berwenang;</p></li>
                            <li> <p align="justify">merupakan tiruan atau menyerupai tanda atau cap atau stempel resmi yang digunakan oleh Negara atau lembaga pemerintah, kecuali atas persetujuan tertulis dari pihak yang berwenang.</p></li>
                            </ol></div><br>

                            <div class="scale">Berapa lama perlindungan hukum Merek terdaftar?</div><br/>
                            <div>
                            <div><p align="justify">Merek terdaftar mendapatkan perlindungan hukum untuk jangka waktu 10 tahun sejak tanggal penerimaan permohonan pendaftaran Merek yang bersangkutan dan jangka waktu perlindungan itu dapat diperpanjang.</p></div><br>

                            <div class="scale">Daftar Merek Sekarang Klik <a href="<?php echo site_url('administrator');?>" class="awe-btn awe-btn-14">Daftar</a> </div><br/><br/>
                            
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