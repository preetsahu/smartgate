<?php
    
    $usertype=$this->session->userdata('uRTYPE');
    $mob=$this->session->userdata('uMOB');
    $NAME=$this->session->userdata('uNAME');
    $uid=$this->session->userdata('uSID');
    // error_reporting(0);
    require 'profilpic.php';
    // $pic=$this->session->userdata('uPic');
    // if($usertype=='1')
    //     $user="staff";
    // elseif($usertype=="2")
    //     $user="student";
    // else
    //     $user="visitor";
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
    <!-- <link href="<?= base_url()?>assets/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet"> -->

    <!-- Gritter -->
    <link href="<?= base_url()?>assets/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <!-- <link href="<?= base_url()?>assets/admin/css/animate.css" rel="stylesheet"> -->
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
                            <a href="" type="file"><img alt="image" style="width:150px;height:150px" class="img img-thumbnail img-container" src="<?=base_url()?>assets/ProfilePic/<?=$user?>/<?=$uid?>/<?=$pic?>"></a>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$NAME  ?></strong>
                             </span> <span class="text-muted text-xs block">System User <b class="caret"></b></span> </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <?php
                                if($usertype=='1')
                                {
                                    error_reporting(0);
                                    ?>
                                    <li><a href="<?= base_url('Staff-Profile')?>">View Profile</a></li>
                                <?php
                                }
                                elseif($usertype=='2')
                                {
                                    ?>
                                    <li><a href="<?= base_url('Student-Profile')?>">View Profile</a></li>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <li><a href="<?= base_url('Visitor-Profile')?>">View Profile</a></li>
                                <?php
                                }
                            ?>  
                                
                                <li class="divider"></li>
                                <li><a href="<?= base_url('User-Logout')?>">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                          <img class="img  img-rounded img-small  img-responsive" style="width:130px;height:60px;" src="<?=base_url()?>assets/ProfilePic/<?=$user?>/<?=$uid?>/<?=$pic?>">
                        </div>
                    </li>

                    <li class="active">
                        <a href="<?= base_url('User-Dashboard')?>"><i class="fa fa-th-large"></i>
                         <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                 
                    <li>
                        <a href="<?= base_url('User-QR')?>"><i class="fa fa-qrcode" aria-hidden="true"></i>
                         <span class="nav-label">Your QR</span>
                        </a>
                    </li>
                            <?php
                                if($usertype=='1')
                                {
                                    error_reporting(0);
                                    ?>
                                    <li><a href="<?= base_url('Staff-Profile')?>"><i class="fa fa-user"></i><span class="nav-label">View Profile</span></a></li> 
                                <?php
                                }
                                elseif($usertype=='2')
                                {
                                    ?>
                                    <li><a href="<?= base_url('Student-Profile')?>"><i class="fa fa-user"></i><span class="nav-label">View Profile</span></a></li> 
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <li><a href="<?= base_url('Visitor-Profile')?>"><i class="fa fa-user"></i><span class="nav-label">View Profile</span></a></li> 
                                <?php
                                }
                            ?>  
                
                    <li><a href="<?= base_url('View-Faculties') ?>"><i class="fa fa-search"></i><span class="nav-label">Look Faculties</span></a></li>
                        <?php
                        if($usertype=='1')
                        {
                            ?>
                        <li><a href="<?= base_url('View-Students') ?>"><i class="fa fa-group"></i> <span class="nav-label">Look Students</span></a></li>
                        <?PHP
                        }
                        ?>
                    <li>
                    <a href=""><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?=base_url('Mail-Box')?>">Inbox</a></li>
                        <li><a href="<?=base_url('eMail')?>">Email view</a></li>
                        <li><a href="<?=base_url('Compose-Email')?>">Compose email</a></li>
                    </ul>
                    </li>

                    <li><a href="<?= base_url('QR-Scanner') ?>"><i class="fa fa-search"></i><span class="nav-label">Scan QR</span></a></li>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#3C8DBC">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn" href="#" style="color:white"><i class="fa fa-bars"></i> </a>
                        <!-- <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.7.1/search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form> -->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message text-white">Welcome User to Smart Gate </span>
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
                            <a style="color:white;" href="<?=base_url('User-Logout') ?>">
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