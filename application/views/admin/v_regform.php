<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Klini KI</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url().'theme/regform/vendor/mdi-font/css/material-design-iconic-font.min.css'?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url().'theme/regform/vendor/font-awesome-4.7/css/font-awesome.min.css'?>" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url().'theme/regform/vendor/select2/select2.min.css'?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url().'theme/regform/vendor/datepicker/daterangepicker.css'?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url().'theme/regform/css/main.css'?>" rel="stylesheet" media="all">
    <style>
    ::placeholder {
      color: blue;
      font-size: 12px;
      opacity: 0.5;
      
    }
    </style>

    <style>
        .errorOne{color:red;font-size: 13px;}

    </style>

    <script type="text/javascript">
     window.onload = function() {
    
    

    if(document.getElementById('bina').checked)
    {
        document.getElementById('try').style.display = 'block';
    }
    else if (document.getElementById('orang').checked)
     {
       document.getElementById('try').style.display = 'none';

     }



    if(document.getElementById('orang').checked)
    {
    document.getElementById("file").required = false;
    }
    else if (document.getElementById('bina').checked)
    {
    document.getElementById("file").required = true;
    }

   
}
    

    function yesnoCheck() {
    if (document.getElementById('bina').checked) {
        document.getElementById('try').style.display = 'block';
     } 
    else if(document.getElementById('orang').checked) {
        document.getElementById('try').style.display = 'none';
     }
    
    }
    
    </script>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4" style="margin-right: 5px;margin-left: 5px;">
                <div class="card-body">

                    <h2 class="title">Daftar Sebagai Pengguna</h2>
                    <form action="<?php echo base_url().'administrator/registration_new'?>" id="form" method="post" enctype="multipart/form-data">
                        
                        
                                <div class="input-group">
                                    <label class="label">Jenis Pengguna</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45" for="orang">IKM
                                            <input type="radio" checked="checked" name="user" id="orang" value="Perorangan" <?= set_value('user') == 'Perorangan' ? "checked" : "" ?> onclick="javascript:yesnoCheck();">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container" for="bina">Pembina
                                           <input type="radio" name="user" id="bina" value="Pembina"  <?= set_value('user')== 'Pembina' ? "checked" : "" ?> onclick="javascript:yesnoCheck();">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                          
                            <!-- <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div> -->
                           
                        </div>
                         <div class="row row-space" id="try" style="display: none;">
                             <div class="col-4">
                                <div class="input-group" style="margin-bottom: 5px;">
                                    <label class="label" for="file">Upload Surat Pengantar <small>(File .pdf/Ukuran file maksimal 2 mb.)</small></label>
                                    <input class="input--style-4" type="file" id="pegguna_surtug" name="pegguna_surtug" value="<?= set_value('pegguna_surtug') ?>" required>
                                   
                                </div>
                            </div>
                                                       
                        </div>
                        <div class="row row-space">
                             <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="name">Nama Pengguna</label>
                                    <input class="input--style-4" type="text" id="name" name="name" value="<?= set_value('name') ?>">
                                    <br/><?= form_error('name','<small pl-3 style="color: red;">','</small>'); ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="ikm">Nama Instansi/Asosiasi</label>
                                    <input class="input--style-4" type="text" id="ikm" name="ikm" value="<?= set_value('ikm') ?>"><br/>
                                                <?= form_error('ikm','<small pl-3 style="color: red;">','</small>'); ?>
                                </div>
                            </div>
                                                       
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="email">Email</label>
                                    <input class="input--style-4" type="email" id="email" name="email" value="<?= set_value('email') ?>"><br/>
                                                <?= form_error('email','<small pl-3 style="color: red;">','</small>'); ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">No. Handphone</label>
                                    <input class="input--style-4" type="text" id="nohp" name="nohp" placeholder="Contoh : 628123456789" value="<?= set_value('nohp') ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><br/>
                                                <?= form_error('nohp','<small pl-3 style="color: red;">','</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="password1">Password</label>
                                    <input class="input--style-4" type="password" value="<?= set_value('password1') ?>" id="password1" name="password1" placeholder="Minimal 6 karakter huruf dan angka.">
                                    <br/><?= form_error('password1','<small pl-3 style="color: red;">','</small>'); ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="password2">Konfirmasi Password</label>
                                    <input class="input--style-4" type="password" value="<?= set_value('password2') ?>" id="password2" name="password2">
                                    <?= form_error('password2','<small pl-3 style="color: red;">','</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="input-group">
                            <label class="label">Subject</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> -->
                        <br/><?= form_error('user','<small pl-3 style="color: red;">','</small>'); ?>
                        <div class="p-t-10">
                            <button class="btn btn--radius-2 btn--blue" id="btn" type="submit">Daftar</button>
                        </div>
                        <div class="p-t-20">
                        <a class="txt2" href="<?php echo base_url().'administrator'?>">
                            </i>
                            Back to Login
                            
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url().'theme/regform/vendor/jquery/jquery.min.js'?>"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url().'theme/regform/vendor/select2/select2.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/regform/vendor/datepicker/moment.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/regform/vendor/datepicker/daterangepicker.js'?>"></script>
 <script src="<?php echo base_url();?>assets/front/vendors/jquery-validation/jquery.validate.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url().'theme/regform/js/global.js'?>"></script>
    
<script type="text/javascript">
$(document).on('change', '#form', function() {
    if(this.checked) {
        document.getElementById("form").reset();
        this.checked = true;
    }
});
</script>

 <script type="text/javascript">
        $(document).ready(function() {
        

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param) 
        });
        $("#form").validate({
            errorClass:'errorOne',
            rules: {
               
                pegguna_surtug: {
                    accept: "pdf",
                    filesize: 2000000
                    //required: true
                },
                
            },
            messages: {                
                pegguna_surtug: {
                    accept: "Silahkan unggah file dengan format .pdf",
                    filesize: "Ukuran file maksimal 2 mb."
                },
            },
            highlight: function(element, errorClass) {
                $(element).parent().addClass('has-error text-error')
                $(element).addClass('has-error text-error')
            },
            unhighlight: function(element, errorClass) {
                $(element).parent().removeClass('has-error text-error')
                $(element).removeClass('has-error text-error')
            },
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                    var controls = element.closest('div[class*="form-group"]');
                    if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                    else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                    error.addClass('has-error text-error');
                } else if(element.is('#file_photo_perusahaan')) {
                    error.insertAfter('.file_photo_perusahaan_feed').addClass('has-error text-error');
                } else if(element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                } else if(element.is('.chosen-select')) {
                    error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                } else {
                    error.insertAfter(element);
                }
            }
        });
        

       
    }); 
</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->