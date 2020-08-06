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
				<p><h3>Update Credential Password</h3><h5>Smart Gate Entrance System</h5>
				 </p></div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="error"></div>
				<div style="border: #E0E0E0 1px solid;border-radius: 3px;padding: 30px;">
					<div class="form-heading" style="text-align:center;">Update Your Password</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password"  name="txtpass" pattern=".{8,}" class="form-control" id="txtpass">
					</div>
					<button class="btn btn-md btn-block" id="btnUpdate" style="background-color:#1AB394;color:white">Submit</button>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

    <div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<a class="btn btn-md btn-danger" style="color:white;float:right;" href="<?=base_url('Forgot-Password')?>">Back</a>
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
$(document).ready(function()
{
	$("#btnUpdate").click(function(e)
	{
			$(".error").html("").hide();
      		var pass=$('#txtpass').val();
			$.ajax({
				url:'<?=base_url('OTPcontroller/updatePassword')?>',
				method:"POST", 
                async : true,
				data: {pass:pass},
                dataType :'json',
				success:function(response) 
				{
					if(response.success == true)
					{
					alert("Password updated successfully!");
					self.location.replace('<?=base_url('User-Login-View') ?>');
					}
					else
					{
						$(".error").html('You are not registered! please register first..')
						$(".error").show();
					}
				},
				error:function()
				{
					alert("Something Went Wrong Try Again!!");
				}
			});
	}
}
</script>

</body>
</html>