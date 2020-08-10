<?php
         $NAME=$this->session->userdata('NAME');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Smart Gate | Dashboard</title>

    <link href="<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?= base_url()?>assets/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?= base_url()?>assets/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/admin/css/animate.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/admin/css/style.css" rel="stylesheet">
    <!-- <link href="<?= base_url()?>assets/admin/css/plugins/dataTables/datatables.min.css" rel="stylesheet"> -->
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <a href="http://www.nitrr.ac.in"  target="_blank"><img alt="image" class="img img-responsive" src="<?=base_url()?>/assets/admin/img/nitrr.jpg"/></a>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$NAME  ?></strong>
                             </span> <span class="text-muted text-xs block">System Admin <b class="caret"></b></span> </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?= base_url('Admin-Profile')?>">Admin Profile</a></li>
                                <li><a href="<?= base_url('View-Users')?>">Users</a></li>
                                <!-- <li><a href="mailbox.html">Mailbox</a></li> -->
                                <li class="divider"></li>
                                <li><a href="<?= base_url('Log-out')?>">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            NITRR
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('Admin-Dashboard')?>"><i class="fa fa-th-large"></i>
                         <span class="nav-label">Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Activate-User')?>"><i class="fa fa-toggle-on"></i>
                         <span class="nav-label">Activate User</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?= base_url('Activate-Admin') ?>">Admin's</a></li>
                            <!-- <li><a href="<?= base_url('View-User-Activities'); ?>">Get Details</a></li> -->
                            <!-- <li><a href="form_file_upload.html">File Upload</a></li> -->
                            <!-- <li><a href="validation.html">Validation</a></li> -->
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Staff</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                          <li><a href="<?= base_url('View-Staff') ?>"><i class="fa fa-group"></i>View Staff</a></li>
                          <li><a href="<?= base_url('View-Staffs-Availibility') ?>"><i class="fa fa-search"></i>Staff Availibility</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Students</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                             <li><a href="<?= base_url('Look-Students') ?>"><i class="fa fa-graduation-cap"></i>View Students</a></li>
                             <li><a href="<?= base_url('View-Students-Availibility') ?>"><i class="fa fa-search"></i>Students Availibility</a></li>
                        </ul>
                    </li>

                    <li>
                        <!-- <a href="#"><i class="fa fa-pencil"></i><span class="nav-label">Database Operations<span class="fa arrow"></span></span></a>
                         <ul class="nav nav-second-level collapse">
                            <li><a href="">Add table</a></li>
                            <li><a href="">Add Fields</a></li>
                            <!-- <li><a href="mail_compose.html">Compose email</a></li>
                            <li><a href="email_template.html">Email templates</a></li> -->
                        <!-- </ul> -->
                    </li>
<li>
                         <?php

                            $NAME=$this->session->userdata('NAME');
                            if($NAME=='PREET SAHU')
                            {
                                ?>
                            <li><a href="<?= base_url('Create-Admin') ?>"><i class="fa fa-registered"></i> <span class="nav-label">Create Admin</span></a></li>
                            <?PHP
                             }
                        ?>
                    <li>
                        <!-- <a href="<?= base_url('Email-us')?>"><i class="fa fa-th-large"></i>
                         <span class="nav-label">Contact Us</span>
                        </a> -->
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1" >
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#3C8DBC">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn" style="color:white"  href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message text-white" >Welcome to Smart Gate Admin Panel</span>
                        </li>
                        <li>
                            <a style="color:white;" href="<?=base_url('Log-out') ?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>