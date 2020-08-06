<!DOCTYPE html>
<html>
<head>
	<title>User Login By OTP Smart Gate </title>
	<link href="<?=base_url()?>assets/otpVerification/style.css" type="text/css" rel="stylesheet" />
	
    <link href="<?= base_url()?>assets/otpVerification/css/bootstrap.min.css" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div class="container">
		<div class="row" style="text-align:center">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="btn-block btn-lg" style="padding:10px;background-color:#1AB394;color:white">
				<p><h3>Reset Password</h3><h5>Smart Gate Entrance System</h5>
				 </p></div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 m">
				<div class="error"></div>
				<form id="frm-mobile-verification">
					<div class="form-heading">Enter Mobile Number</div>
					<div class="form-row">
						<input type="number" max="9999999999"  id="mobile" limit=10 class="form-input" placeholder="Enter the 10 digit mobile">
					</div>
					<button class="btn btn-md btn-block" style="background-color:#1AB394;color:white" type="button" value="Send OTP" onClick="sendOTP();">Submit</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

    <div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<a class="btn btn-md btn-danger" style="color:white;float:right;" href="<?=base_url('User-Login-View')?>">Back</a>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">	
				<div class="footer">
					<div class="pull-right">
					</div>
						<div>
						<strong>Copyright @2020</strong> Smart Gate Entrance Nit Raipur 
						</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
    
	

<script src="<?=base_url()?>assets/otpVerification/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/otpVerification/jquery-3.3.1.js"></script>

<script type="text/javascript">
		function sendOTP() 
		{
			$(".error").html("").hide();
			var number = $('#mobile').val();
			if (number.length == 10 && number != null) 
			{
				$.ajax({
					url: '<?=base_url('OTPcontroller/getOTP')?>',
					method: 'POST',
					data: {mob: number},
					datatype:'json',
					success: function(resp) 
					{
						$(".m").html(resp);
					}
				});
			} 
			else 
			{
				$(".error").html('Please enter a valid number!')
				$(".error").show();
			}
		}

	function verifyOTP() {
		$(".error").html("").hide();
		$(".success").html("").hide();
        var otp = $('#mobileOtp').val();
		var input = "verify_updatepassotp";
		if (otp.length == 6 && otp != null)
		{
			$.ajax({
				url:'<?=base_url('OTPcontroller/verifyOTP')?>',
				method:"POST", 
                async : true,
				data: {reqType:input,otp:otp},
                dataType : 'json',
				success:function(response) 
				{
					if(response.success == true)
					{
					// alert(response.otpm);
					alert("verification done ! now you can reset your password.");
					self.location.replace('<?=base_url('Update-Password') ?>');
					} 
					else
					{
					// alert(response.otpm);
                    alert("Mobile number verification failed");
               		}
				},
				error:function()
				{
					alert("Something Went Wrong Try Again!!");
				}
			});
		} 
		else 
		{
			$(".error").html('You have entered wrong OTP.')
			$(".error").show();
		}
	}
</script>

</body>
</html>