<?php include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');
      $mail=$this->session->userdata('EMAIL');
////////////////////////////////////////////////////////////////STAFF RECENT ACTIVITY/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      foreach($recentStaffActivity as $sa)
      {
          $name=$sa->FIRST_NAME.' '.$sa->LAST_NAME;
          $designation=$sa->DESIGNATION;
          $Department=$sa->DEPARTMENT_NAME;
          $staffId=$sa->STAFF_ID;
          $email=$sa->EMAIL_ID;
          $MOB=$sa->MOBILE_NUMBER;
          $regID=$sa->REGISTRATION_ID;
          $status=$sa->STATUS;
          $pic=$sa->IMAGE;
      }
      $count=0;
      if($name=='') {$count++;}
      if($designation==''){$count++;}
      if($Department==''){$count++;}
      if($staffId==''){$count++;}
      if($email==''){$count++;}
      if($MOB==''){$count++;}
      if($regID==''){$count++;}
      IF($status==''){$count++;}
      if ($pic=='') {$count++; }
      if($count!=0)
      {
          $per=round(100-(($count)/9)*100);
      }
      else
      {
          $per=100;
      }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
?>
<style type="text/css">
    @media(max-width:700px)
    {
        .tabo thead
        {
            display:none;
        }
        .tabo ,.tabo tbody, .tabo tr,.tabo td
        {
            display:block;
            width:100%;
            
        }
        .tabo tr
        {
            margin-bottom:15px;
        
        }
        .tabo td
        {
            text-align:right;
            padding-left:50%;
            postion:relative;
            
        }
        .tabo td:before
        {
            content:attr(data-label);
            position:absolute;
            left:25px;
            width:80%;
            padding-left:15px;
            font-size:12px;
            font-weight:bold;
            text-align:left;
            
        }
    }

</style>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <a href="<?=base_url('Update-Staff-Info')?>" class="btn btn-xs pull-right" style="background-color:#00b357;color:white">Update</a>
                                        <h2><?=$name?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <img class="img img-responsive img-circle" src="<?=base_url()?>assets/ProfilePic/<?=$user?>/<?=$id?>/<?=$pic?>" />
                                </div>
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                        <dt>Department:</dt> <dd><?=$Department?></dd>
                                        <dt>Designation:</dt> <dd><?=$designation?></dd>
                                        <dt>Email:</dt> <dd><a href="#" class="text-navy"><?=$email?></a> </dd>
                                        <dt>Contact:</dt> <dd> <?=$MOB?> </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-primary"><?=$status?></span></dd>
                                    </dl>
                                </div>
                                <div class="col-lg-5" id="cluster_info">
                                    <dl class="dl-horizontal" >
                                        <dt>Staff ID:</dt> <dd><?=$staffId?></dd>
                                        <dt>Email:</dt> <dd><?=$email?></dd>
                                        <dt>Reg.ID:</dt> <dd> <?=$regID?> </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Profile:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                            <div style="width: <?=$per?>%;" class="progress-bar"></div>
                                            </div>
                                            <small>Profile completed in <strong><?=$per?>%</strong></small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs" id="generate">
                                            <li class="active"><a href="#tab-1" data-toggle="tab">Activity</a></li>
                                            <li><a href="#tab-2" data-toggle="tab">Classes</a></li>
                                            <li><a href="<?=base_url('View-Staff-Report')?>" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
Generate PDF</a></li>
                                        </ul>
                                    </div>
                                </div>
              
                                <div class="panel-body">
                                <div class="tab-content">
                                <div class="tab-pane " id="tab-2">
                                    <!-- <div class="feed-activity-list">
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a2.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">2h ago</small>
                                                <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                                <div class="well">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                    Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                </div>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a3.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">2h ago</small>
                                                <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                                <small class="text-muted">2 days ago at 8:30am</small>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a4.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy">5h ago</small>
                                                <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                <div class="actions">
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a5.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">2h ago</small>
                                                <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                <div class="well">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                    Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                </div>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/profile.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">23h ago</small>
                                                <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                            </div>
                                        </div>
                                        <div class="feed-element">
                                            <a href="#" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a7.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">46h ago</small>
                                                <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="tab-pane active" id="tab-1">
                                    <table class="table table-striped tabo">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                            <th>Time Spent</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       <?php
                                        foreach($completeStaffActivity as $sca)
                                        {
                                            error_reporting(0);
                                            $date1=date_create("$sca->IN_DATE_TIME");
                                            $date2=date_create("$sca->OUT_DATE_TIME");
                                            $dateFormat=date_format($date1,"d-M-Y");
                                            $inTime=date_format($date1,"H:i:s:A");
                                            $outTime=date_format($date2,"g:i:s:A");
                                            $diff=date_diff($date1,$date2);
                                            ?>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i> </span>
                                            </td>
                                            <td>
                                                   <?=$dateFormat ?>
                                            </td>
                                            <td>
                                                 <i class="fa fa-clock-o "><?=$inTime ?></i>
                                            </td>
                                            <td>
                                                 <?=$outTime ?>
                                            </td>
                                            <td>
                                            <?=$diff->format("%h hour %I minutes %s seconds");?>
                                            </td>
                                            
                                        </tr>

                                        <?php

                                        }
                                    ?>
                                        </tbody>
                                    </table>

                                </div>
                                </div>

                                </div>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- <div class="wrapper wrapper-content project-manager">
                    <h4>Project description</h4>
                    <img src="img/zender_logo.png" class="img-responsive">
                    <p class="small">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look
                        even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                    </p>
                    <p class="small font-bold">
                        <span><i class="fa fa-circle text-warning"></i> High priority</span>
                    </p>
                    <h5>Project tag</h5>
                    <ul class="tag-list" style="padding: 0">
                        <li><a href="#"><i class="fa fa-tag"></i> Zender</a></li>
                        <li><a href="#"><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                        <li><a href="#"><i class="fa fa-tag"></i> Passages</a></li>
                        <li><a href="#"><i class="fa fa-tag"></i> Variations</a></li>
                    </ul>
                    <h5>Project files</h5>
                    <ul class="list-unstyled project-files">
                        <li><a href="#"><i class="fa fa-file"></i> Project_document.docx</a></li>
                        <li><a href="#"><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                        <li><a href="#"><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                        <li><a href="#"><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                    </ul>
                    <div class="text-center m-t-md">
                        <a href="#" class="btn btn-xs btn-primary">Add files</a>
                        <a href="#" class="btn btn-xs btn-primary">Report contact</a>

                    </div>
                </div> -->
            </div>
        </div>

<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->

                          
<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>

<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->


