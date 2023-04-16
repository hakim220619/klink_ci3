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
        <link href="<?php echo base_url();?>assets/front/vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
           
        
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
                 <div class="bg-image" style="background-image: url('../assets/img/regist00.jpg');">
                    <div class="row mx-0 bg-black-op">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                            <div class="p-30 invisible" data-toggle="appear">
                                 <p class="font-size-h3 font-w600 text-white">
                                    Selamat Datang Di <span class="font-size-h3 text-primary"><br>Klinik KI Ditjen IKMA</span>
                                </p>
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
                                    <h1 class="h3 font-w700 mt-30 mb-10">Daftar Sebagai Pengguna </h1>
                                    <h2 class="h5 font-w400 text-muted mb-0"></h2>
                                </div>
                                <!-- END Header -->

                                <form class="js-validation-signin px-30" action="<?php echo base_url().'administrator/registration'?>" method="post">
                                     <div class="form-group">
                                        <label for="name">Jenis User</label><br>
                                        
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="user" id="orang" value="Perorangan" <?= set_value('user') == 'Perorangan' ? "checked" : "" ?>>
                                                <label class="custom-control-label" for="orang">Perorangan</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="user" id="bina" value="Pembina" <?= set_value('user')== 'Pembina' ? "checked" : "" ?>>
                                                <label class="custom-control-label" for="bina">Pembina</label>
                                            
                                        </div>
                                                <br/><?= form_error('user','<small pl-3 style="color: red;">','</small>'); ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                                                <label for="name">Nama Lengkap</label><small class="text-note"><i class="fa fa-info-circle"></i> contoh : Budi Gunawan.</small><br/>
                                                <?= form_error('name','<small pl-3 style="color: red;">','</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="ikm" name="ikm" value="<?= set_value('ikm') ?>">
                                                <label for="ikm">Nama Instansi/Asosiasi</label><small class="text-note"><i class="fa fa-info-circle"></i> Misalkan : Perorangan/Dinas Terkait/Asosiasi.</small><br/>
                                                <?= form_error('ikm','<small pl-3 style="color: red;">','</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                                                <label for="email">Email</label><small class="text-note"><i class="fa fa-info-circle"></i> contoh : pendaftar@gmail.com.</small><br/>
                                                <?= form_error('email','<small pl-3 style="color: red;">','</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="nohp" name="nohp" value="<?= set_value('nohp') ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><label for="nohp">No. Handphone</label><small class="text-note"><i class="fa fa-info-circle"></i> contoh : 081212345678.</small><br/>
                                                <?= form_error('nohp','<small pl-3 style="color: red;">','</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" value="<?= set_value('password1') ?>" class="form-control" id="password1" name="password1">
                                                <label for="password1">Kata Sandi</label><small class="text-note"><i class="fa fa-info-circle"></i> Minimal 6 karakter dan kombinasi huruf dan angka.</small><br/>
                                                 <?= form_error('password1','<small pl-3 style="color: red;">','</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" value="<?= set_value('password2') ?>" class="form-control" id="password2" name="password2">
                                                <label for="password2">Konfirmasi Kata Sandi</label>
                                                <?= form_error('password2','<small pl-3 style="color: red;">','</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-alt-primary btn-block">
                                            Daftar
                                        </button>
                                         <div class="text-center">
                                        <a class="badge badge-primary btn-alt-primary btn-block" href="<?php echo base_url().'administrator'?>">Masuk</a>
                                        </div>
                                        <!-- <div class="text-center">
                                        <a class="badge badge-success btn-alt-primary btn-block" href="<?= base_url('administrator/registration'); ?>">Daftar?</a>
                                        </div> -->
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