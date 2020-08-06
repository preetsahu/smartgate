<?php include 'layout/header.php';
     $MOB=$this->session->userdata('uMOB');
     $Name=$this->session->userdata('uNAME');
     $ID=$this->session->userdata('uSID');
?>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title iboxColor">
                            <h5>Look For Student</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" id="studentSearch" placeholder="Search by Name Or Department" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm" style="background-color:#3C8DBC;color:white"> Go!</button> </span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="project-list" >
                                <div class="row">
                                    <div id="st">
                                <?php
                                    foreach($studentCard as $sc)
                                    {
                                        
                                        ?>
                                    <div class="col-md-3">
                                        <div class="ibox">
                                            <div class="ibox-content product-box">
                                                <div class="product-imitation" style="padding:10px 5px;">
                                            <?php
                                                if($sc->IMAGE=='')
                                                {
                                            ?>
                                                <img class="img img-circle" style="width:100px;height:100px" src="<?=base_url()?>assets/user/extra/stu2.png">
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <img class="img img-circle" style="width:100px;height:100px" src="<?=base_url()?>assets/ProfilePic/student/<?=$sc->REGISTRATION_ID?>/<?=$sc->IMAGE?>">
                                            <?php
                                                }
                                            ?>
                                                </div>
                                                <div class="product-desc">
                                                    <span class="product-price" style="background-color:#3Cab4C;color:white"><?=$sc->STUDENT_ID?></span><small class="text-muted"><?=$sc->DEPARTMENT_NAME?> || Student ID:<?=$sc->STUDENT_ID?></small>
                                                    <a href="#" class="product-name"><?=$sc->FIRST_NAME?>' '<?=$sc->LAST_NAME?></a>
                                                    <div class="small m-t-xs">Branch:<?=$sc->COURSE_NAME?><BR>Semester:<?=$sc->SEMESTER?>
                                                    </div>
                                                    <div class="m-t text-righ">
                                                        <a class="btn btn-xs btn-outline btn-primary mail-student" data="<?=$sc->REGISTRATION_ID?>" href="#">Mail <i class="fa fa-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                <?php
                                    }
                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
        </div>

    <!---------------------------------------------------------------------- Mail modal ------------------------------------------------------------------>
<div class="modal fade" id="MailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mail </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form" method="post" id="formMail">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Subject:</label>
                    <input type="text" class="form-control" name="subject" id="subject">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" name="contents" id="contents"></textarea>
                </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <div class="alert alert-success" style="display:none;"></div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnMail" class="btn btn-primary">Send message</button>
            </div>
            </div>
        </div>
</div>
    <!---------------------------------------------------------------------- Mail modal ------------------------------------------------------------------>


<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>
<script type="text/javascript">
  
     //  mail student
     $('#st').on('click','.mail-student',function(){
        var sid=$(this).attr('data');
        $('#MailModal').modal('show');
        $('#btnMail').unbind().click(function()
        {
            var sub=$('#subject').val();
            var content=$('#contents').val();
            $.ajax({
                type: 'ajax',
                method: 'post',
                async: false,
                url:'<?=base_url('userController/UserController/studentMailer'); ?>',
                data:{sid:sid,sub:sub,content:content},
                dataType:'json',
                success:function(response){
                    if(response.success){
                        alert('Mail has been sent successfully');
                        $('.alert-success').html('Mail Sent Successfully').fadeIn().delay(4000).fadeOut('slow');
                        // $('#MailModal').modal('hide');
                        $('#formMail')[0].reset();
                       
                    }else{
                        alert('Error');
                    }
                },
                error:function(){
                    alert('Mail Failed!!!');
                }
            });
        });
    });
</script>





<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->


<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->

