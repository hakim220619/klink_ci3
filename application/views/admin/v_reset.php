<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/reset/vendor/bootstrap/css/bootstrap.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/reset/fonts/font-awesome-4.7.0/css/font-awesome.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/reset/vendor/animate/animate.css'?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/reset/vendor/css-hamburgers/hamburgers.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/reset/vendor/select2/select2.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/reset/css/util.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/reset/css/main.css'?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url().'theme/reset/images/img-01.jpg'?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="form" action="<?php echo base_url().'administrator/forgotPassword'?>" method="post">
					<span class="login100-form-title">
						Masukkan Email Anda				
					</span>
						<span style="font-size: 14px;">
							<?php echo $this->session->flashdata('msg');?>
						</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: mail@mail.com">
						<input class="input100" type="text" value="<?= set_value('email') ?>"  id="email" name="email" required placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<?= form_error('email','<small pl-3 style="color: red;">','</small>'); ?>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Reset 
						</button>
					</div>

					
					
					<div class="text-center p-t-125">
						<a class="txt2" href="<?php echo base_url().'administrator'?>">
							<i class="fa fa-long-arrow-left m-l-0" aria-hidden="true"></i>
							Back to login
							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url().'theme/reset/vendor/jquery/jquery-3.2.1.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'theme/reset/vendor/bootstrap/js/popper.js'?>"></script>
	<script src="<?php echo base_url().'theme/reset/vendor/bootstrap/js/bootstrap.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'theme/reset/vendor/select2/select2.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'theme/reset/vendor/tilt/tilt.jquery.min.js'?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'theme/reset/js/main.js'?>"></script>

</body>
</html>