<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Lupa Kata Sandi</title>

        <meta name="description" content="VR - Membantu Anda menjadi Web Developer Profesional">
        <meta name="author" content="VR">
        <meta name="robots" content="noindex, nofollow">

        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">

    </head>
    <body>
        <!-- Page Container -->
       
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('../assets/img/forgot.jpg');">
                    <div class="row mx-0 bg-black-op">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                            <div class="p-30 invisible" data-toggle="appear">
                                <a class="link-effect font-w700" href="<?php echo base_url();?>">
                                <p class="font-size-h3 font-w600 text-white">
                                    Selamat Datang Di <span class="font-size-h3 text-primary"><br>Klinik KI Ditjen IKMA</span>
                                </p></a>
                                <p class="font-italic text-white-op">
                                    Copyright &copy; <span class="js-year-copy"><?php echo date('Y');?></span>
                                </p>
                            </div>
                        </div>
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                            <div class="content content-full">
                                <!-- Header -->
                                <div class="px-30 py-10">
                                    <a class="link-effect font-w700" href="<?php echo base_url();?>">
                                        <i class=""></i>
                                        <span class="font-size-xl text-primary-dark">KLINIK </span><span class="font-size-xl text-primary">KI DITJEN IKMA</span>
                                    </a>
                                    <?php echo $this->session->flashdata('msg');?> 
                                    <h1 class="h3 font-w700 mt-30 mb-10">Lupa Password?</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Masukkan Email Anda</h2>
                                </div>
                                <!-- END Header -->

                                <form class="js-validation-signin px-30" action="<?php echo base_url().'administrator/forgotPassword'?>" method="post">
                                    
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" value="<?= set_value('email') ?>"  id="email" name="email" required>
                                                <label for="email">Email</label>
                                            </div>
                                            <br/><?= form_error('email','<small pl-3 style="color: red;">','</small>'); ?>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm  btn-alt-primary btn-block">
                                            Reset Kata Sandi</button>
                                        <!-- <a href="<?php echo base_url().'administrator/registration'?>" class="btn btn-sm  btn-alt-primary btn-block">
                                            <i class="si si-login mr-20"></i>Daftar
                                        </a> -->
                                        <div class="text-center">
                                        <a class="badge badge-primary btn-alt-primary btn-block" href="<?php echo base_url().'administrator'?>">Masuk</a>
                                        </div>
                                        <div class="text-center">
                                        <a class="badge badge-success btn-alt-primary btn-block" href="<?= base_url('administrator/registration'); ?>">Daftar?</a>
                                        </div>
                                    </div>
                                    
                              </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="<?php echo base_url().'assets/js/core/jquery.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/popper.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.slimscroll.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.scrollLock.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.appear.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.countTo.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/js.cookie.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/codebase.js'?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url().'assets/js/plugins/jquery-validation/jquery.validate.min.js'?>"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url().'assets/js/pages/op_auth_signin.js'?>"></script>
    </body>
</html>