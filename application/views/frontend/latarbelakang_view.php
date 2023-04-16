<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Latar Belakang</title>
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
						
										
                            <h2>A. Latar Belakang</h2><br/>
                            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Industri Kecil dan Menengah (IKM) adalah salah satu sub sektor ekonomi strategis karena memberikan sumbangan yang besar terhadap perekonomian nasional. Pada tahun 2018, jumlah unit usaha IKM mencapai ± 4,29 juta unit usaha dan menyerap tenaga kerja sebanyak 10,56 juta orang. Dengan kontribusi tersebut, IKM memiliki peran untuk membuka peluang usaha, menyerap tenaga kerja dalam jumlah besar, memberikan nilai tambah pada hasil produksi serta berkontribusi terhadap pemasukan devisa melalui ekspor yang turut serta mendorong pertumbuhan ekonomi.<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk lebih meningkatkan peranan IKM dalam perekonomian nasional, berbagai kebijakan dan program yang mendukung penumbuhan dan pengembangan IKM telah banyak diterbitkan, diantaranya pemberian fasilitas melalui pengembangan produk IKM, restrukturisasi mesin; promosi dan pameran; serta penguatan kelembagaan melalui pengembangan sentra IKM dan peningkatan kemampuan Unit Pelayanan Teknis (UPT). Program dukungan tersebut dimaksudkan untuk meningkatkan daya saing IKM, baik persaingan antara usaha besar dengan kecil dan menengah maupun persaingan usaha antar negara.<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dalam perkembangan arus perdagangan bebas serta kemajuan teknologi, komunikasi dan informasi, transaksi perdagangan produk dan jasa semakin cepat dan tak terbatas. Perkembangan di pasar internasional juga ditindaklanjuti dengan kesepakatan perdagangan internasional oleh Negara-negara anggota World Trade Organization (WTO) untuk melancarkan arus distribusi barang, jasa dan investasi dengan mengurangi secara bertahap hambatan-hambatan tarif bea masuk. Hal ini menuntut adanya standard kualitas produk dan jasa, persaingan usaha yang sehat serta adanya komitmen terhadap peraturan perdagangan internasional yang disepakati bersama.<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;Mengingat liberalisasi perdagangan yang persaingannya sangat ketat khususnya di pasar internasional, selain meningkatkan daya saing, IKM perlu menjaga daya saing yang telah dimiliki antara lain dengan melindungi Intellectual Property Rights (IPR). Pasar tunggal ASEAN merupakan salah satu contoh bahwa dengan bebasnya peredaran barang dan jasa antar negara ASEAN, memberikan pembinaan dan pelindungan terkait Kekayaan Intelektual (KI) adalah hal yang mutlak diperlukan sebagai upaya pelindungan dari praktek-praktek peniruan, penjiplakan atas produk barang dan jasa karya intelektual.<br/><br/>
Ketentuan tentang Trade-Related Aspects of Intellectual Property Rights (TRIPs) sebagai bagian yang tidak terpisahkan dari ketentuan WTO merupakan ketentuan yang berlaku dalam sistem liberalisasi perdagangan antar negara anggota WTO.<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latar belakang lahirnya World Trade Organization (WTO/ TRIP’s) didasari oleh banyaknya kasus sengketa perdagangan, antara lain pembatasan impor melalui tarif bea masuk tinggi dalam rangka melindungi industri dalam negeri, pemberian subsidi yang berlebihan, diskriminasi pasar domestik, diskriminasi standar barang, serta perdagangan barang palsu dan pembajakan. Selain itu, terdapat kecenderungan negara-negara maju menggunakan kebijakan unilateral dan menerapkan praktek-praktek perdagangan yang bersifat anti persaingan dalam menghambat impor dan melakukan proteksi domestik secara tidak wajar. Hal ini dilakukan dengan mengkaitkan perdagangan dengan masalah-masalah terkait KI. <br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indonesia telah meratifikasi ketentuan Trade Related Aspects of Intellectual Property Rights (TRIPs) melalui Undang-Undang Nomor 7 Tahun 1994 tentang Pengesahan Agreement Establishing The World Trade Organization (WTO) yang mencakup juga tentang Trade Related Aspects of Intellectual Property Rights-Including Trade in Counterfeit Goods/ TRIPs (aspek-aspek KI yang terkait dengan perdagangan). Adapun Undang-Undang Nomor 7 Tahun 1994 mengamanatkan hal-hal tentang:<br/>
<ol>
<li> Meningkatkan pelindungan terhadap KI dari produk-produk yang diperdagangkan;</li><br/>
<li> Menjamin prosedur pelaksanaan KI yang tidak menghambat kegiatan perdagangan;</li><br/>
<li> Merumuskan aturan serta disiplin mengenai pelaksanaan pelindungan terhadap KI; dan</li><br/>
<li> Mengemban prinsip, aturan, mekanisme kerjasama internasional untuk menangani perdagangan barang-barang hasil pemalsuan atau pembajakan atas KI.</li>
</ol><p>
<p align="justify">Dalam perdagangan internasional, klasifikasi tidak dilakukan berdasarkan hasil produksi industri besar, menengah atau kecil, namun berdasarkan klasifikasi barang menurut Harmony System Nomenclature. Oleh karena itu, pelaku IKM wajib untuk memahami ketentuan TRIPs/ KI dalam rangka menghadapi persaingan dalam era liberalisasi perdagangan khususnya yang akan melakukan pemasaran internasional.<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dalam menghadapi liberalisasi ekonomi, IKM masih memiliki berbagai keterbatasan diantaranya kemampuan untuk mengakses sumber daya produktif dan dalam menerapkan berbagai peraturan yang diberlakukan oleh WTO di era perdagangan bebas. Penerapan KI pada era liberalisasi saat ini sangat penting untuk kelangsungan dan pengembangan usaha IKM, oleh karenanya informasi yang berkaitan dengan substansi KI harus disosialisasikan dengan lebih intensif kepada pelaku usaha IKM.<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Timbulnya berbagai masalah dan sengketa hukum dalam perlindungan KI membutuhkan penegakkan hukum yang tegas dan upaya bersama dalam memberantas pelanggaran peraturan KI. Dengan penegakan hukum KI secara optimal diharapkan agar sektor swasta, mulai dari IKM hingga industri besar dapat memanfaatkan aset kekayaan intelektualnya dalam industri dan ekonomi yang berbasis ilmu pengetahuan. Untuk mewujudkan kebijakan yang strategis tersebut dan memberikan pelindungan hukum terhadap produk-produk khusus IKM, maka Direktorat Jenderal Industri Kecil, Menengah dan Aneka (Ditjen IKMA) Kementerian Perindustrian telah mendirikan Klinik KI–IKM sebagai upaya meminimalisir kasus-kasus yang timbul di IKM.<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beberapa kegiatan yang telah diimplementasikan antara lain sosialisasi kebijakan, bimbingan layanan dan advokasi, serta pelatihan teknis KI pada instansi-instansi terkait dan dunia usaha IKM. <br/><br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Melihat kenyataan tersebut, maka Ditjen IKMA telah mendirikan Klinik Hak Kekayaan Intelektual pada tahun 1998, yang selanjutnya disebut Klinik HKI-IKM. Unit tersebut merupakan unit kerja ad hoc yang memberikan pelayanan di bidang KI. Pendirian Klinik HKI-IKM dimaksudkan untuk memfasilitasi IKM yang tersebar luas di seluruh wilayah Indonesia dan sebagian besar berada di pedesaan. Kemampuan IKM untuk melindungi produknya melalui pendaftaran KI sangatlah terbatas, disebabkan lokasi IKM yang tersebar luas di seluruh Indonesia dan pemahaman IKM terhadap KI yang masih sangat terbatas. Melalui Klinik HKI-IKM, penyebaran informasi, fasilitasi pendaftaran KI, dan advokasi diharapkan dapat dilakukan dengan lebih efisien dan efektif. Sejak berdirinya, Klinik HKI-IKM telah melakukan berbagai kegiatan bimbingan dan konsultasi, promosi dan penyebaran informasi, layanan advokasi serta kerja sama dengan instansi terkait, sentra-sentra KI, perguruan tinggi, serta lembaga penelitian dan pengembangan. <br/><br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk lebih menyebarluaskan informasi KI bagi IKM di berbagai daerah maka Klinik HKI-IKM telah melakukan pelatihan Fasilitator bagi Aparat, baik yang berasal dari Pusat, Provinsi maupun Kabupaten/ Kota. Jumlah Fasilitator yang telah terlatih dan mendapatkan sertifikat sebagai Tenaga Fasilitator KI telah berjumlah sebanyak 1075 orang yang tersebar di Pusat, Provinsi dan Kabupaten/ Kota. <br/><br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada beberapa daerah, Dinas Perindustrian Provinsi dan Kabupaten/ Kota telah mendirikan Klinik HKI, dimana fasilitator tersebut berperan aktif dalam pelindungan KI untuk IKM. Fasilitator Daerah merupakan mitra kerja Klinik HKI Ditjen IKMA yang memberikan penyuluhan, bimbingan dan penyebaran informasi bagi IKM. Melalui kerja sama tersebut telah diperoleh hasil yang cukup baik, terlihat dari peningkatan pendaftaran KI oleh pengusaha IKM dari tahun ke tahun. Untuk mengoptimalkan kegiatan bimbingan dan penerapan KI di masyarakat, Ditjen IKMA terus memacu program pembinaan dan pengembangan KI melalui Klinik HKI-IKM.</p>
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