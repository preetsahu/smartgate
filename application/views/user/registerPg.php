<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?=base_url()?>assets/user/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" action="<?=base_url('Register-User') ?>">
					<span class="login100-form-title p-b-49">
						Registration
					</span>

					<div>
						<p style="font-size:15px;" class="alert-warning">
							<?= $this->session->flashdata('success'); ?>
							<?= $this->session->flashdata('err'); ?>
						</p>
					</div>

					<div class="form-group">
					<label for="exampleFormControlSelect1">Registration Type</label>
						<select name="regType" class="form-control" id="userType">
						<option value="1">Staff</option>
						<option value="2">Student</option>
						<option value="3">Visitor</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="First Name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" pattern="[A-Za-z]+" title="alphabets only" type="text" name="txtFname" placeholder="Type your First Name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Last Name is required">
						<span class="label-input100">last Name</span>
						<input class="input100" pattern="[A-Za-z]+" title="alphabets only" type="text" name="txtLname" placeholder="Type Your Last Name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Mobile number is required">
						<span class="label-input100">Contact</span>
						<input class="input100" pattern="[0-9]+" title="number only" maxlength="10" name="txtMob" placeholder="Type Your Mobile Number">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="txtPass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					

					<div class="container-login100-form-btn" style="margin-top:20px;">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Register And Genreate QR
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span class="h5">
							Already Registered ?
							<a class="h5" style="color:blue;" href="<?=base_url('User-Login-View')?>" >Login here..</a>

						</span>
					</div>

					<div class="flex-c-m">
						<!-- <a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a> -->
					</div>


				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/user/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!-- <script>
	jQuery(function () {
    // remove the below comment in case you need chnage on document ready
    // location.href=jQuery("#selectbox").val(); 
    jQuery("#userType").change(function () {
        location.href = jQuery(this).val();
    })
	})
	</script> -->
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/user/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/user/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>assets/user/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/user/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/user/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>assets/user/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/user/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/user/js/main.js"></script>
	<script>
		setTimeout(function() {
		$('#msgDiv').fadeIn().delay(4000).fadeOut('slow');
	</script>

</body>
</html>
