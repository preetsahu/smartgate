<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Gate | Register</title>

    <link href="<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/animate.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/style.css" rel="stylesheet">
    
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">NIT</h1>
            </div>
            <h3>Administrator Registration to <br></h3><h4>Smart Gate System</h4>
            <p>Create account to see it in action.</p>
            <form id="createForm" class="m-t" method="post" action="<?=base_url('Register-Admin') ?>" role="form">
                <div>
					<p style="font-size:15px;" class="alert-danger">
                        <?= $this->session->flashdata('success'); ?>
                        <?= $this->session->flashdata('err'); ?>
                    </p>
				</div>
                <div class="form-group">
                    <input type="text" id="finame" class="form-control" placeholder="First Name" name="fname" required="">
                </div>
                <div class="form-group">
                    <input type="text" id="laname" class="form-control" placeholder="Last Name" name="lname" required="">
                </div>
                <div class="form-group">
                    <input type="email" id="Email" class="form-control" placeholder="Email" name="email" required="">
                </div>
                <div class="form-group">
                    <input type="password" id="Pass" class="form-control" placeholder="Password" name="pass" required="">
                </div>
                <div class="form-group">
                        <!-- <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div> -->
                </div>
                <button type="submit" id="butsave" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?= base_url('Admin-Login-View')?>">Login</a>
            </form>
            <p class="m-t"> <small>Smart Gate System Provides smart entry to institution &copy; 2020</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    
<script type="text/javascript">

// // Ajax post
// $(document).ready(function() 
// {
// $("#butsave").click(function() 
// {
// var admFname = $('#finame').val();
// var admLname = $('#laname').val();
// var admEmail = $('#Email').val();
// var admPass = $('#Pass').val();

// 	if(admFname!="" && admLname!="" && admEmail!="" && admPass!="")
// 	{
// 		jQuery.ajax({
// 		type: "POST",
// 		url: "<?php echo base_url('AdminController/savedata'); ?>",
// 		dataType: 'html',
// 		data: {admFname: fname, admLname:lname, admEmail: email, admPass:pass},
// 		success: function(res) 
// 		{
// 			if(res==1)
// 			{
// 			alert('Data saved successfully');	
// 			}
// 			else
// 			{
// 			alert('Data not saved');	
// 			}
			
// 		},
// 		error:function()
// 		{
// 		alert('data not saved');	
// 		}
// 		});
// 	}
// 	else
// 	{
// 	alert("pls fill all fields first");
// 	}

// });
// });
</script>

<script type="text/javascript">

		$("#createForm").submit(function(event) {
			event.preventDefault();
			$.ajax({
		            url: "<?php echo base_url('adminController/AdminController/savedata'); ?>",
		            data: $("#createForm").serialize(),
		            type: "post",
		            async: false,
		            dataType: 'json',
		            success: function(response){
		                // $('#createForm')[0].reset();
		                alert('Successfully inserted');
		            //    $('#exampleTable').DataTable().ajax.reload();
		              },
		           error: function()
		           {
		            alert("error");
		           }
          });
		});

</body>
</html>
