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
                                        <input type="text" id="staffSearch" placeholder="Search by Name Or Department" class="input-sm form-control"> <span class="input-group-btn">
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
    <div class="modal fade" id="MailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                <div class="alert alert-success" style="display:none;">
                                    <!-- Display Dynamic Message -->
                </div>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 animated fadeInRight">
                    <div class="mail-box-header">
                        <div class="pull-right tooltip-demo">
                            <a href="" id="btnDraft" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Draft</a>
                        </div>
                        <h2>
                            Compose mail
                        </h2>
                    </div>
                        <div class="mail-box">
                        <div class="mail-body">
                            <form class="form-horizontal" method="get">
                                <!-- <div class="form-group"><label class="col-sm-2 control-label">To:</label>
                                    <div class="col-sm-10"><input type="text" name="class="form-control" value=""></div>
                                </div> -->
                               
                                <div class="form-group"><label class="col-sm-2 control-label">Subject:</label>
                                    <div class="col-sm-10"><input type="text" name="msubject" id="msubject" class="form-control" value=""></div>
                                </div>  
                                
                            </div>
                            <div class="mail-text h-200">
                                <!-- <div class="note-editable panel-body" name="mbody" id="mbody" contenteditable="true">
                                    <h3></h3>
                                        Contents....
                                    <br>
                                    <br>
                                </div> -->
                                <div class="form-group panel-body">
                                <label for="exampleFormControlTextarea1">Contents</label>
                                <textarea class="form-control" id="mbody" name="mbody" rows="3"></textarea>
                                </div>
                            </div>
                            
                            </form>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="mail-body text-right tooltip-demo">
                    <a href="" class="btn btn-sm btn-primary" id="btnSend" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Send</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------------- Mail modal ------------------------------------------------------------------>


<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>
<script type="text/javascript">
    $(function(){
        // load data on document ready
        showStaff();

        // // search admin by search bar
        $('#staffSearch').keyup(function(){
            showStaff();
        });
       
    });
    //   show data 
        function showStaff(){
                           var str=$('#staffSearch').val();
                           $.ajax({
                           type: 'ajax',
                           url : "<?=base_url('adminController/AdminController/getAllStaffDetails');?>",
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
                                   '<div class="col-lg-4"><div class="contact-box"><a href="profile.html"><div class="col-sm-4"><div class="text-center"><img alt="image" class="img-circle m-t-xs img-responsive" src="<?=base_url()?>assets/RegisteredUserQR/staff/'+data[i].REGISTRATION_ID+'/'+data[i].REGISTRATION_ID+'.png"><div class="m-t-xs font-bold">'+data[i].DESIGNATION+'</div></div></div><div class="col-sm-8"><h3><strong>'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</strong></h3><p><i style="margin-right:5px;" class="fa fa-envelope"></i>'+data[i].EMAIL_ID+'</p><address><strong>'+data[i].DEPARTMENT_NAME+' Department</strong><br>Address:<br>'+data[i].ADDRESS+'<br><abbr title="Phone">M:</abbr> '+data[i].MOBILE_NUMBER+'</address></div><div class="clearfix"></div></a><div class="user-button"><div class="row"><div class="col-md-6"><button staffid='+ i +' FID='+data[i].STAFF_ID+' sender=<?=$ID?> class="btn btn-primary btn-sm btn-block mail-staff"><i class="fa fa-envelope"></i> Send Message</button></div><div class="col-md-6"><a href="<?=base_url('Profile')?>"  class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i>Profile</a></div></div></div></div></div>';   
                               }
                               $('#st').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}


        
        
        //  Faculty Mail 
        $('#st').on('click','button[staffid]',function(){
                var fid=$(this).attr('FID');
                var sender=$(this).attr('sender');
                var sub=$('#msubject').val();
                var content=$('#mbody').val();
                $('#MailModal').modal('show');
                $('#btnSend').unbind().click(function(){
                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        async: false,
                        url:'<?=base_url('userController/UserController/FacultyMailer'); ?>',
                        data:{fid:fid,sub:sub,content:content,sender:sender},
                        dataType:'json',
                        success:function(response){
                            if(response.success){
                                alert('Mailed Successfully');
                                $('#MailModal').modal('hide');
                                $('.alert-success').html('Mailed Successfully').fadeIn().delay(10000).fadeOut('slow');
                               // showStaff();
                            }else{
                                alert('Error');
                            }
                        },
                        error:function()
                        {
                            alert('Something went wrong');
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

