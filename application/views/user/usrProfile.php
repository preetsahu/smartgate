<?php 

    $MOB=$this->session->userdata('uMOB');
    $Name=$this->session->userdata('uNAME');
    $usertype=$this->session->userdata('uRTYPE');
    $qr=$this->session->userdata('uqr');
    if($usertype=='1')
    {
        $user="staff";
    }
    elseif($usertype=='2')
    {
        $user="student";
    }
    else
    {
        $user="visitor";
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title> </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="nitrr nitraipur raipurnit nit raipur nitrrac nitrr.ac.in smartgatesystem smartsystem gateentrancesystem gate entrance system attendancesystem gateattendancesystem gateentrance gateattendancesysten messmagmt messmannagement "/>
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/user/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="<?=base_url()?>assets/user/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <!-- //Fonts -->

    <link href="<?=base_url()?>assets/user/css/main.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/user/css/util.css" rel="stylesheet">
</head>

<body>s
    <!-- main-content -->
    <div class="main-banner" id="home">

        <!--/banner-->
        <div class="banner-info">
            <div class="w3pvt-logo text-center">
                <h1> <a href="usrProfile.php">Smart Gate System</a></h1>
            </div>
            <div class="middile-inner-con">
                <div class="tab-main mx-auto">

                    <input id="tab1" type="radio" name="tabs" class="w3layouts-sm" checked>
                    <label  for="tab1"><span class="fa fa-home" aria-hidden="true"></span>Home</label>

                    <input id="tab3" type="radio" class="w3layouts-sm" name="tabs">
                    <label for="tab3"><span class="fa fa-files-o" aria-hidden="true"></span>
                    Feed
                    <?=$user?>
                    Details
                    </label>

                    <input id="tab7" type="radio" class="w3layouts-sm" name="tabs">
                    <label for="tab7"><span class="fa fa-files-o" aria-hidden="true"></span>Personal Details</label>

                    <?php
{
       if ($user == "student") {
            ?>
                    <input id="tab8" type="radio" class="w3layouts-sm" name="tabs">
                    <label for="tab8"><span class="fa fa-files-o" aria-hidden="true"></span>Hostel Details</label>
                        <?php
}
   }
    ?>

                    <input id="tab2" type="radio" class="w3layouts-sm" name="tabs">
                    <label for="tab2"><span class="fa fa-users" aria-hidden="true"></span>View Details</label>

                    <input id="tab4" type="radio" class="w3layouts-sm" name="tabs">
                    <label for="tab4"><span class="fa fa-envelope" aria-hidden="true"></span>Email us</label>


                    <input id="tab5" type="radio" class="w3layouts-sm" name="tabs">
                    <label for="tab5"><span class="fa fa-files-o" aria-hidden="true"></span>Reports</label>


                    <input id="tab6" type="radio" class="w3layouts-sm" name="tabs">
                    <a href="<?=base_url('User-Logout')?>"> <label class="label label-primary""><span class="fa fa-envelope" aria-hidden="true"></span> Log out</label></a>

                    <section id="content1" class="inner-w3layouts-wrap">                    
            
                        <img src="<?=base_url()?>assets/RegisteredUserQR/<?=$user?>/<?=$qr?>/<?=$qr?>.png" class="admin img-thumbnail" style="width:150px;height:150px;" alt="mobile-image"><br>
                        <a href="<?=base_url('QR-Download')?>" class="btn btn-primary btn-lg">Download QR</a>
                        <h4>Hi  <?=$Name ?></h4>
                        <h2>Smart Gate Entrance</h2>
                        <p style="color: beige;">Welcome To Smart Gate Entrance System.</p>
                    </section>

                    <section id="content2" class="inner-w3layouts-wrap">
                        <h3 class="head-w3ls">See My Latest Works.</h3>
                        <div class="row news-grids">
                            <div class="col-4 gal-img">
                                <a href="#gal1"><img src="images/g1.jpg" alt="news image" class="img-fluid"></a>
                                <a href="#gal2"><img src="images/g3.jpg" alt="news image" class="img-fluid"></a>
                            </div>
                            <div class="col-4 gal-img">
                                <a href="#gal3"><img src="images/g2.jpg" alt="news image" class="img-fluid"></a>
                                <a href="#gal4"><img src="images/g4.jpg" alt="news image" class="img-fluid"></a>
                            </div>
                            <div class="col-4 gal-img">
                                <a href="#gal5"><img src="images/g5.jpg" alt="news image" class="img-fluid"></a>
                                <a href="#gal6"><img src="images/g6.jpg" alt="news image" class="img-fluid"></a>
                            </div>
                            <!-- popup-->
                        </div>
                    </section>

                    <section id="content3" class="inner-w3layouts-wrap">
                    <div class="container-login100-form-btn" style="margin-top:20px;">
                            <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
                                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                                    <form class="login100-form validate-form" method="post" action="regUser.php">
                                        <span class="login100-form-title p-b-49">
                                        Registration
                                    </span>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Registration Type</label>
                                            <select name="regType" class="form-control" id="exampleFormControlSelect1">
                                        <option value="1">Staff</option>
                                        <option value="2">Student</option>
                                        <option value="3">Visitors</option>
                                        </select>
                                        </div>

                                        <div class="wrap-input100 validate-input m-b-23" data-validate="First Name is required">
                                            <span class="label-input100">First Name</span>
                                            <input class="input100" type="text" name="txtFname" placeholder="Type your First Name">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>

                                        <div class="wrap-input100 validate-input m-b-23" data-validate="Last Name is required">
                                            <span class="label-input100">last Name</span>
                                            <input class="input100" type="text" name="txtLname" placeholder="Type Your Last Name">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>

                                        <div class="wrap-input100 validate-input m-b-23" data-validate="Mobile number is required">
                                            <span class="label-input100">Contact</span>
                                            <input class="input100" type="number" name="txtMob" placeholder="Type Your Mobile Number">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>


                                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                                            <span class="label-input100">Password</span>
                                            <input class="input100" type="password" name="txtPass" placeholder="Type your password">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>
                                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                                            <span class="label-input100">Confirm Password</span>
                                            <input class="input100" type="password" name="txtcpass" placeholder="Confirm your password">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>



                                        <div class="container-login100-form-btn" style="margin-top:20px;">
                                            <div class="wrap-login100-form-btn">
                                                <div class="login100-form-bgbtn"></div>
                                                <button class="login100-form-btn">
                                                Register Here
                                            </button>
                                            </div>
                                        </div>

                                        <div class="txt1 text-center p-t-54 p-b-20">
                                            <span>
                                            Already Registered...<br>
                                            <a class="h2" href="loginPg.php">Login here..</a>

                                        </span>
                                        </div>

                                        <div class="flex-c-m">
                                            <a href="#" class="login100-social-item bg1">
                                                <i class="fa fa-facebook"></i>
                                            </a>

                                            <a href="#" class="login100-social-item bg2">
                                                <i class="fa fa-twitter"></i>
                                            </a>

                                            <a href="#" class="login100-social-item bg3">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>


                                    </form>
                                </div>
                            </div>
                    </div>
                    </section>

                    <section id="content4" class="inner-w3layouts-wrap">
                        <h3 class="head-w3ls"> Get In Touch</h3>
                        <form name="contact-form" class="contact-form" method="post" action="Email_Us.php">
                            <div class="row">
                                <div class="col-6 con-gd">
                                    <div class="form-group">
                                        <p>Name *</p>
                                        <input type="text" class="form-control" id="name" placeholder="" name="txtSenderName" required="">
                                    </div>
                                    <div class="form-group">
                                        <p>Your Email *</p>
                                        <input type="email" class="form-control" id="email" placeholder="" name="txtSenderemail" required="">
                                    </div>

                                </div>
                                <div class="col-6 con-gd">
                                    <div class="form-group">
                                        <p>Send a Message *</p>
                                        <textarea name="txtSenderMessage" placeholder="" required=""></textarea>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group">

                                <button type="submit" name="sendmail" class="btn btn-default">Submit</button>
                            </div>

                        </form>
                        <ul class="w3pvt_social_list list-unstyled mt-4">
                            <li>
                                <a href="#" class="w3layouts-icon">
                                    <span class="fa fa-facebook-f"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="w3layouts-icon">
                                    <span class="fa fa-twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="w3layouts-icon">
                                    <span class="fa fa-dribbble"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="w3layouts-icon">
                                    <span class="fa fa-google-plus"></span>
                                </a>
                            </li>
                        </ul>
                    </section>

                    <section id="content5" class="inner-w3layouts-wrap">
                    </section>

                    <section id="content6" class="inner-w3layouts-wrap">

                    </section>

                    <section id="content7" class="inner-w3layouts-wrap">
                    <div class="container-login100-form-btn" style="margin-top:20px;">
                            <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
                                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                                    <form class="login100-form validate-form" method="post" action="regUser.php">
                                        <span class="login100-form-title p-b-49">
                                        Personal Details
                                    </span>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Registration Type</label>
                                            <select name="regType" class="form-control" id="exampleFormControlSelect1">
                                        <option value="1">Staff</option>
                                        <option value="2">Student</option>
                                        <option value="3">Visitors</option>
                                        </select>
                                        </div>

                                        <div class="wrap-input100 validate-input m-b-23" data-validate="First Name is required">
                                            <span class="label-input100">First Name</span>
                                            <input class="input100" type="text" name="txtFname" placeholder="Type your First Name">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>

                                        <div class="wrap-input100 validate-input m-b-23" data-validate="Last Name is required">
                                            <span class="label-input100">last Name</span>
                                            <input class="input100" type="text" name="txtLname" placeholder="Type Your Last Name">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>

                                        <div class="wrap-input100 validate-input m-b-23" data-validate="Mobile number is required">
                                            <span class="label-input100">Contact</span>
                                            <input class="input100" type="number" name="txtMob" placeholder="Type Your Mobile Number">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>


                                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                                            <span class="label-input100">Password</span>
                                            <input class="input100" type="password" name="txtPass" placeholder="Type your password">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>
                                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                                            <span class="label-input100">Confirm Password</span>
                                            <input class="input100" type="password" name="txtcpass" placeholder="Confirm your password">
                                            <span class="focus-input100" data-symbol=""></span>
                                        </div>



                                        <div class="container-login100-form-btn" style="margin-top:20px;">
                                            <div class="wrap-login100-form-btn">
                                                <div class="login100-form-bgbtn"></div>
                                                <button class="login100-form-btn">
                                                Register Here
                                            </button>
                                            </div>
                                        </div>

                                        <div class="txt1 text-center p-t-54 p-b-20">
                                            <span>
                                            Already Registered...<br>
                                            <a class="h2" href="loginPg.php">Login here..</a>

                                        </span>
                                        </div>

                                        <div class="flex-c-m">
                                            <a href="#" class="login100-social-item bg1">
                                                <i class="fa fa-facebook"></i>
                                            </a>

                                            <a href="#" class="login100-social-item bg2">
                                                <i class="fa fa-twitter"></i>
                                            </a>

                                            <a href="#" class="login100-social-item bg3">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>


                                    </form>
                                </div>
                            </div>
                    </div>
                    </section>

                    <section id="content8" class="inner-w3layouts-wrap">

                    <div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="">
					Provide Hostel Details
				</span>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Your Hostel</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                </div>

				<div class="form-group">
                    <label for="formGroupExampleInput">Enter Room Number</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Your Room Number">
               </div>

               <div class="form-group">
                    <label for="formGroupExampleInput">Room Mate Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Room mate Name">
               </div>
				
				
			</form>
		</div>

                    </section>
                    <!-- <section id="content3" class="inner-w3layouts-wrap">
                        <h3 class="head-w3ls">Log out</h3>
                        <div class="row news-grids">

                        </div>
                    </section> -->

                </div>
                <!--// banner-inner -->
            </div>
        </div>
        <div class="nitrr-right text-center pb-3">
            <p style="color: whitesmoke;">© 2020 NIT RAIPUR| Design by
                <a href="https://nitrr.ac.in">Preet Sahu</a>
            </p>

        </div>
    </div>
    <!--//main-content-->


</body>
<script src="<?=base_url()?>assets/user/js/main.js"></script>

</html>
