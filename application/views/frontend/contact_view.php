<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?php echo base_url().'theme/images/favicon.png'?>"/>
	<meta name="description" content="Layanan HKI">
    
	<!-- META FOR IOS & HANDHELD -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="HandheldFriendly" content="true" />
	<meta name="apple-mobile-web-app-capable" content="YES" />
	<!-- //META FOR IOS & HANDHELD -->

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>
	

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
     .responsive-map{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
        }
        .responsive-map iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
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
        
        <!--BANNER -->
        <section class="section-sub-banner bg-9">
            <div></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                    </div>
                </div>

            </div>

        </section>
        <!-- END BANNER -->

        <!-- CONTACT -->
        <section class="section-contact">
            <div class="container">
                <div class="contact">
                    <div class="row">
                        <div class="col-md-6 col-lg-5">

                            <div class="text">
							<?php
											
									
									$sqf=$this->db->query("SELECT * from kontak");
									$dataf=$sqf->row_array();
											
													
							?>
							
                                <h2>Kontak</h2>
                                <p><?php echo $dataf['des']?> </p>
                                <ul>
                                    <li><i class="icon lotus-icon-location"></i> <?php echo $dataf['alamat']?></li>
                                    <li><i class="icon lotus-icon-phone"></i> <?php echo $dataf['telp']?></li>
                                    <li><i class="icon fa fa-envelope-o"></i> <?php echo $dataf['email']?></li>
                                    <li><div class="responsive-map"><iframe class=".google-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.195191457879!2d106.82879891431041!3d-6.237984562820852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6bc23da9955%3A0xa874f440f556cc6e!2sKementerian%20Perindustrian%20RI!5e0!3m2!1sen!2sid!4v1611544747171!5m2!1sen!2sid" width="450" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div></li>
                                </ul>
							
									
								
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-lg-offset-1">
                            <div class="contact-form">
                                <form action="<?php echo site_url('contact/kirim');?>" method="post"> 
                                    <div class="row">       
                                        <div class="col-sm-6">
                                            <input type="text" class="field-text"  name="name" placeholder="Nama" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" class="field-text" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" class="field-text" name="subject" placeholder="Subjek" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea cols="30" rows="10" name="message"  class="field-textarea" placeholder="Tinggalkan Pesan Anda" required></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="awe-btn awe-btn-14">KIRIM</button>
                                        </div>
                                    </div>
                                    <div id="contact-content"><?php echo $this->session->flashdata('msg');?></div>
                                </form>
                            </div>
                        </div>

                    </div>  
                </div>
            </div>
        </section>
        <!-- END / CONTACT -->

       
        
        <!-- FOOTER -->
        <?php $this->load->view('frontend/footer');?>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->

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

    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.form.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.validate.min.js'?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'theme/js/scripts.js'?>"></script>
</body>
</html>