<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Sign In</title>

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
                <div class="bg-image" style="background-image: url('assets/img/bg-login.jpg');">
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
                                    <a href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url().'theme/new/img/logoki00.png'?>" style="border-radius: 4px;max-width: 100%;height: auto;margin-left: -8px;" alt=""></a>
                                    <!-- <a class="link-effect font-w700" href="<?php echo base_url();?>">
                                        <i class=""></i>
                                        <span class="font-size-xl text-primary-dark">KLINIK </span><span class="font-size-xl text-primary">KI DITJEN IKMA</span>
                                    </a> -->
                                    <?php echo $this->session->flashdata('msg');?> 
                                    <h1 class="h3 font-w700 mt-30 mb-10">Masuk Sebagai Pengguna.</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Masukkan Email dan Kata Sandi</h2> 
                                </div>
                                <!-- END Header -->

                                <form class="js-validation-signin px-30" id="form" action="<?php echo base_url().'administrator/auth'?>" method="post">
                                    
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="login-username" name="username" required>
                                                <label for="login-username">Email</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="login-password" name="password" required>
                                                <label for="login-password">Kata Sandi</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm  btn-alt-primary btn-block">
                                            Masuk                               </button>
                                        <!-- <a href="<?php echo base_url().'administrator/registration'?>" class="btn btn-sm  btn-alt-primary btn-block">
                                            <i class="si si-login mr-20"></i>Daftar
                                        </a> -->
                                        <div class="text-center">
                                        <a class="badge badge-primary btn-alt-primary btn-block" href="<?php echo base_url().'administrator/registration'?>">Daftar Akun</a>
                                        </div>
                                        <div class="text-center">
                                        <a class="badge badge-success btn-alt-primary btn-block" href="<?= base_url('administrator/forgotPassword'); ?>">Lupa Sandi?</a>
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
       <script src="<?php echo base_url();?>assets/front/vendors/jquery-validation/jquery.validate.min.js"></script>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url().'assets/js/pages/op_auth_signin.js'?>"></script>

        <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
        
        <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
        
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>

       
    </body>
</html>