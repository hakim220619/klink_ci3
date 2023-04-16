<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/sign/vendor/bootstrap/css/bootstrap.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/sign/fonts/font-awesome-4.7.0/css/font-awesome.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/sign/vendor/animate/animate.css'?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/sign/vendor/css-hamburgers/hamburgers.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/sign/vendor/select2/select2.min.css'?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/sign/css/util.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/sign/css/main.css'?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url().'theme/sign/images/img-01.jpg'?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="form" action="<?php echo base_url().'administrator/changePassword'?>" method="post">
					<span class="login100-form-title">
						Change Password						
					</span>
						<span style="font-size: 14px;">
							<?php echo $this->session->flashdata('msg');?>
						</span>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password1" name="password1" required placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<?= form_error('password1','<small pl-3 style="color: red;margin-left: 13px;">','</small>'); ?>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password2" name="password2" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<?= form_error('password2','<small pl-3 style="color: red;margin-left: 13px;justify-content: flex-start;">','</small>'); ?>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Change Password
						</button>
					</div>

					
					<div class="text-center p-t-136">
						<a class="txt2" href="<?php echo base_url().'administrator'?>">
							<i class="fa fa-long-arrow-left m-l-0" aria-hidden="true"></i>
							Back to Login
							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url().'theme/sign/vendor/jquery/jquery-3.2.1.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'theme/sign/vendor/bootstrap/js/popper.js'?>"></script>
	<script src="<?php echo base_url().'theme/sign/vendor/bootstrap/js/bootstrap.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'theme/sign/vendor/select2/select2.min.js'?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'theme/sign/vendor/tilt/tilt.jquery.min.js'?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url().'theme/sign/js/main.js'?>"></script>

</body>
</html>