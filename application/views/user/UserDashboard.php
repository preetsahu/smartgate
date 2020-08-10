<?php include 'layout/header.php';

      $MOB=$this->session->userdata('uMOB');   

?>
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

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                            <div class="ibox-title" style="background-color:#00b357;color:white">
                                <h5><?=$user?> : <?=$Name?></h5>
                            </div>
                            <div class="ibox-title" >
                                <h5>Mobile : <?=$MOB ?></h5>
                            </div>
                            <div>
                                <div class="ibox-content no-padding  border-left-right">
                                    <img alt="image" class="img-responsive" src="<?=base_url()?>assets/RegisteredUserQR/<?=$user?>/<?=$qr?>/<?=$qr?>.png">
                                </div>
                                <div class="ibox-content profile-content">
                                <a href="<?=base_url('QR-Download')?>" class="btn btn-primary btn-SM">Download QR</a>  
                                 </div>
                            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color:#00ACD7;color:white">
                    <span class="label label-success pull-right">Inside</span>
                    <h5>Student</h5>
                </div>
                <div id="Student_Count" class="ibox-content" style="background-color:#00C0EF;color:white">
                    <h1 id="count_show" class="no-margins"  style="font-weight:bold;">
                    <?php  foreach($stuCount As $c) {$stuCount=$c->stuCount;}
                      echo $stuCount;
                    ?>
                    </h1>
                    <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                    <small>Campus</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color:#009551;color:white">
                    <span class="label label-success pull-right" style="color:white;">inside</span>
                    <h5>Staffs</h5>
                </div>
                <div class="ibox-content" style="background-color:#00A65A;color:white">
                    <h1 class="no-margins"  style="font-weight:bold;">
                    <?php  foreach($staffCount As $c) {$staffCount=$c->staffCount;}
                      echo $staffCount;
                    ?>
                    </h1>
                    <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                    <small>Campus</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color:#DA8C10;color:white">
                    <span class="label label-success pull-right" style="color:white;">Inside</span>
                    <h5>visitor</h5>
                </div>
                <div class="ibox-content" style="background-color:#F39C12;color:white;">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins"  style="font-weight:bold;">
                            <?php  foreach($GaurdianCount As $G) {$GaurdianCount=$G->GaurdianCount;}
                            echo $GaurdianCount;
                            ?>
                            </h1>
                            <div class="font-bold text-white">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>Gaurdian</small></div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins"  style="font-weight:bold;">
                            <?php  foreach($OthersCount As $G) {$OthersCount=$G->OtherCount;}
                            echo $OthersCount;
                            ?>
                            </h1>
                            <div class="font-bold text-white">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>Others</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color:#C64333;color:white">
                    <span class="label label-success pull-right">Inside</span>
                    <h5>People Count</h5>
                </div>
                <div class="ibox-content" style="background-color:#DD4B39;color:white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins" style="font-weight:bold;">
                            <?php  
                                $count=$stuCount+$OthersCount+$GaurdianCount+$staffCount;
                                echo $count;
                            ?>
                            </h1>
                            <div class="font-bold text-white">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>Today</small></div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins" style="font-weight:bold;" >
                            <?php 
                                $count=0;
                                echo $count;
                            ?>
                            </h1>
                            <div class="font-bold text-white">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>This Week</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                
            </div>
        </div>

        </div>
</div>
        

    </div>
<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>

<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->

</div>

<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->
