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
                            <img alt="image" class="img-circle" src="<?=base_url()?>/assets/img/logo.jpg"/>
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
                            IN+
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('Admin-Dashboard')?>"><i class="fa fa-th-large"></i>
                         <span class="nav-label">Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?= base_url('Activate-Admin') ?>">Admin's</a></li>
                            <li><a href="<?= base_url('View-User-Activities'); ?>">Get Details</a></li>
                            <!-- <li><a href="form_file_upload.html">File Upload</a></li> -->
                            <!-- <li><a href="validation.html">Validation</a></li> -->
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Staff</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                          <li><a href="<?= base_url('View-Staff') ?>"><i class="fa fa-group"></i> <span class="nav-label">View Staff</span></a></li>
                          <li><a href="<?= base_url('View-Staffs-Availibility') ?>"><i class="fa fa-search"></i> <span class="nav-label">Staff Availibility</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Students</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                             <li><a href="<?= base_url('View-Students') ?>"><i class="fa fa-graduation-cap"></i><span class="nav-label">View Students</span></a></li>
                             <li><a href="<?= base_url('View-Students-Availibility') ?>"><i class="fa fa-search"></i><span class="nav-label">Students Availibility</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-pencil"></i><span class="nav-label">Database Operations<span class="fa arrow"></span></span></a>
                         <ul class="nav nav-second-level collapse">
                            <li><a href="">Add table</a></li>
                            <li><a href="">Add Fields</a></li>
                            <!-- <li><a href="mail_compose.html">Compose email</a></li>
                            <li><a href="email_template.html">Email templates</a></li> -->
                        </ul>
                    </li>

                    <?php

                            $NAME=$this->session->userdata('NAME');
                            if($NAME=='PREET SAHU')
                            {
                                ?>
                            <li><a href="<?= base_url('Create-Admin') ?>"><i class="fa fa-registered"></i> <span class="nav-label">Create Admin</span></li>
                            <?PHP
                             }
                    ?>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <!-- <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.7.1/search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form> -->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to Smart Gate Admin Panel.</span>
                        </li>

                        <!-- <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="pull-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div> 
                                     </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>  -->

                        <li>
                            <a href="<?=base_url('Log-out') ?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                        <!-- <li>
                             <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li> -->
                    </ul>

                </nav>
            </div>