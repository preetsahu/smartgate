<?php include 'layout/header.php';
     $MOB=$this->session->userdata('uMOB');
     $Name=$this->session->userdata('uNAME');
     $ID=$this->session->userdata('uSID');
?>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Look Acedemic Staffs</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" id="studentSearch" placeholder="Search by Name Or Department" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="project-list" >
                                <div class="row">
                                    <div id="st">

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
    $(function(){
        // load data on document ready
        showStudent();
        // // search admin by search bar
        $('#studentSearch').keyup(function(){
            showStudent();
        });
    });
    //   show data 
        function showStudent(){
                           var str=$('#studentSearch').val();
                           $.ajax({
                           type: 'ajax',
                           url : "<?=base_url('userController/UserController/getAllStudentDetails');?>",
                           data : {str:str},
                           method : "POST", 
                           async : false,
                           dataType : 'json',
                           success: function(data)
                           {
                               var html = '';
                               var i;
                               for(i=0; i<data.length; i++)
                               {
                                   html +=
                                   '<div class="col-md-3"><div class="ibox"><div class="ibox-content product-box"><div class="product-imitation" style="padding:10px 5px;"><img class="img img-circle" style="width:100px;height:100px" src="<?=base_url()?>assets/ProfilePic/student/'+data[i].REGISTRATION_ID+'/'+data[i].IMAGE+'"></div><div class="product-desc"><span class="product-price">'+data[i].STUDENT_ID+'</span><small class="text-muted">'+data[i].DEPARTMENT_NAME+' || Student ID:'+data[i].STUDENT_ID+'</small><a href="#" class="product-name">'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</a><div class="small m-t-xs">Branch:'+data[i].COURSE_NAME+'<BR>Semester:'+data[i].SEMESTER+'</div><div class="m-t text-righ"><a class="btn btn-xs btn-outline btn-primary mail-student" data="'+data[i].REGISTRATION_ID+'" href="#">Mail <i class="fa fa-long-arrow-right"></i> </a></div></div></div></div></div>';  
                                //    '<div class="col-lg-4"><div class="contact-box"><a href="profile.html"><div class="col-sm-4"><div class="text-center"><img alt="image" class="img-circle m-t-xs img-responsive" style="width:110px;height:96px" src="<?=base_url()?>assets/ProfilePic/staff/'+data[i].REGISTRATION_ID+'/'+data[i].IMAGE+'"><div class="m-t-xs font-bold">'+data[i].DESIGNATION+'</div></div></div><div class="col-sm-8"><h3><strong>'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</strong></h3><p><i style="margin-right:5px;" class="fa fa-envelope"></i>'+data[i].EMAIL_ID+'</p><address><strong>'+data[i].DEPARTMENT_NAME+' Department</strong><br>Address:<br>'+data[i].ADDRESS+'<br><abbr title="Phone">M:</abbr> '+data[i].MOBILE_NUMBER+'</address></div><div class="clearfix"></div></a><div class="user-button"><div class="row"><div class="col-md-6"><button staffid='+ i +' FID='+data[i].STAFF_ID+' sender=<?=$ID?> class="btn btn-primary btn-sm btn-block mail-staff"><i class="fa fa-envelope"></i> Send Message</button></div><div class="col-md-6"><a href="<?=base_url('Profile')?>"  class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i>Profile</a></div></div></div></div></div>';   
                               }
                               $('#st').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}


        
    
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
                        showStudent();
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

