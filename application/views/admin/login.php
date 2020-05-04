<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Smart Gate | Login</title>

    <link href="<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/admin/css/animate.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Smart Gate</h2>
                <p>
                    This webapplication is developed to help students , staffs , various visitors
                    to smartly enter to institution building as well as hostel mess.
                </p>
                <p>
                    By the help of QR generated at time of registration of user , we are working to create a gate which function as soon as
                </p>

                <p>
                    user scan the QR in embedded machine to gate and open the gate to provide entry.
                </p>
                <p>
                    By help of this system we can able to find various data like number of peoples in building , we can also take attendance based on it.
                </p>
            </div>

            <div class="col-md-6">
                <div class="ibox-content">

                        <h3 class="alert-warning">
                        <?= $this->session->flashdata('success'); ?>
                        <?= $this->session->flashdata('err'); ?>
                        </h3>

                    <form class="m-t" role="form" method="post" action="<?=base_url('Admin-Login') ?>">
                        <div class="form-group">
                            <input type="email" name="txtEmail" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="txtPass" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="<?=base_url('Forgot-Login-View')?>">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="<?= base_url('Register-Admin-View')?>">Create an account</a>
                    </form>
                    <p class="m-t"> <small>Smart Gate System Provides smart entry to institution &copy; 2020</small> </p>
                </div>
            </div>
        </div>
        <hr/>

        <div class="row">
            <div class="col-md-12">
                Copyright Nit Raipur@2020
            </div>
        </div>
    </div>
</body>
</html>
