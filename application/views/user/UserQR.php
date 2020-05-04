<?php 
        include 'layout/header.php';
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
            <div class="row animated fadeInRight">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5><?=$user?> : <?=$Name?></h5>
                            </div>
                            <div class="ibox-title">
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
                <div class="col-md-3"></div>
            </div>
        </div>
<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->

</div>

<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->
