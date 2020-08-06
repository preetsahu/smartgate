<?php include 'layout/header.php';
    $MOB=$this->session->userdata('uMOB');
    foreach($studentprofile as $p)
    {
        // $pic=$p->IMAGE;
        // $utype=$p->REGISTRATION_TYPE;
        $id=$p->REGISTRATION_ID;
        $mob=$p->MOBILE_NUMBER;
        $email=$p->EMAIL_ID;
       
        $sid=$p->STUDENT_ID;
        $dob=$p->STUDENT_DOB;
        $dobCreate=date_create("$p->STUDENT_DOB");
        $dobFormat=date_format($dobCreate,"Y-m-d");
        $deptid=$p->DEPARTMENT_ID;
        $dept=$p->DEPARTMENT_NAME;
        $course=$p->COURSE_NAME;
        $courseID=$p->COURSE_ID;
        $semester=$p->SEMESTER;
        $fname=$p->FIRST_NAME;
        $lname=$p->LAST_NAME;
        $mess=$p->MESS_NAME;
        $hostel=$p->HOSTEL_NAME;
    }
    
    //     error_reporting;
    foreach ($userAddress aS $a)
    {
        $country=$a->COUNTRY;
        $state=$a->STATE;
        $city=$a->CITY;
        $PIN=$a->PIN;
        $AREA=$a->AREA;
    }

?>

<!-- update photo modal -->
<div class="modal fade" id="editphoto" style="display: none; padding-right: 17px;" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Update Profile Pic</b><small> please select the 100X100 image for better appearance</small></h4>
        </button>
      </div>
      <form class="form-horizontal" id="upload_form" method="POST" enctype="multipart/form-data">
         <div class="modal-body">
            <div class="form-group">
                    <input class="form-control" type="text" value="<?=$MOB?>" style="display:none">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>
                    <div class="col-sm-9">
                    <input type="file" id="image_file" name="image_file" required>
                    </div>
            </div>
         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i>Update</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!-- update photo modal -->
<style>
    .uploaded_image
    {
        position: relative;
        width: 70%;
        max-width: 400px;
    }
    .uploaded_image img {
        width: 80%;
        height: auto;
        margin-top:30px;
        margin-left:60px;
    }
    .uploaded_image .btn {
        position: absolute;
        top: 86%;
        left: 73%;
        display:inline-block;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color:white;
        color: black;
        border: none;
        cursor: pointer;
        border-radius: 40%;
        text-align: center;
        font-size:15px
        }

        .uploaded_image .btn:hover {
        background-color: black;
        color: white;
        }
</style>

        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Basic Form</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>update details</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                           
                </div>
        </div> 
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" >
                            <h5 style="color:Blue">Update<small> login credential</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                            
                            <div class="alert alert-success" style="display:none;">
                                <!-- Display Dynamic Message -->
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                
                                <div class="col-sm-6 b-r"><h4 style="text-align:center">Upload Profile Pic</h4>
                                    <p class="text-center">
                                        
                                        <?php
                                        if($pic)
                                        {
                                            ?>
                                            <div class="uploaded_image" id="uploaded_image">
                                            <img class="img img-responsive img-circle" src="<?=base_url()?>assets/ProfilePic/<?=$user?>/<?=$id?>/<?=$pic?>" />
                                            <a href="#editphoto" data-toggle="modal" class="btn"><span class="fa fa-edit "></span></a>
                                            </div>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                            <a href="#editphoto" data-toggle="modal" class="btn"><span class="fa fa-user big-icon"></span></a>
                                                <?php
                                            }
                                            ?>
                                    </p>
                                </div>
                                <div class="col-sm-6 ">
                                    <form role="form">
                                        <div class="form-group"><label>Contact</label> <input type="email" placeholder="<?=$mob?>" class="form-control"></div>
                                        <div class="form-group"><label>Email</label> <input type="email" placeholder="<?=$email?>" class="form-control"></div>
                                        <div class="form-group"><label>Password</label> <input type="password" placeholder="Password" class="form-control"></div>
                                        <div>
                                            <button style="background-color:#00B357;color:white" class="btn btn-sm s pull-left m-t-n-xs" type="submit"><strong> Update Details</strong></button><br><br><br><br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Academic Details</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                               
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal">
                                <div class="form-group"><label class="col-lg-4 control-label">Department</label>        
                                    <div class="col-lg-8">
                                            <select class="form-control m-b" name="Department" disabled>
                                            <Option value="<?=$deptid?>" ><?=$dept?> </option>
                                            <option>MCA</option>
                                            <option>B.TECH</option>
                                            </select>
                                    </div> 
                                </div>   
                                <div class="form-group"><label class="col-lg-4 control-label">Branch</label>        
                                    <div class="col-lg-8">
                                            <select class="form-control m-b" id="branch" name="branch" disabled>
                                            <Option value="<?=$courseID?>" diabled=""><?=$course?></option>
                                            </select>
                                    </div> 
                                </div>      
                                <div class="form-group"><label class="col-lg-4 control-label">Semester/Year</label>
                                <div class="col-lg-8">
                                            <select class="form-control m-b" id="Semester" name="Semester"  disabled>
                                            <Option value="<?=$semester?>"><?=$semester?></option>
                                            </select>
                                    </div> 
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Roll Number</label>
                                    <div class="col-lg-8"><input type="TEXT" placeholder="<?=$sid?>" class="form-control" disabled></div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-lg-10">
                                        <button style="background-color:#00B357;color:white" class="btn btn-md" type="submit" disabled>Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="color:Blue">Hostel Details</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                               
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                                <form role="form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Select Hostel</label> 
                                            <select class="form-control m-b" name="account" disabled>
                                                <Option><?=$hostel?></option>
                                                <option>Hostel-B:CHITRAKOT</option>
                                                <option>Hostel-H:SIRPUR</option>
                                                <option>Hostel-H:SIRPUR</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"><label>Select Mess</label> 
                                            <select class="form-control m-b" name="account" disabled>
                                                <Option><?=$mess?></option>
                                                <option>Mess - A </option>
                                                <option>Mess - B </option>
                                                <option>Mess - C </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-top:30px;">
                                    <button style="background-color:#00B357;color:white" class="btn btn-sm pull-left m-t-n-xs" type="submit" disabled><strong> Update Details</strong></button><br><br><br><br>
                                    </div> 
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="color:Blue">Personal Details <small>please provide some personal details to help us in reaching you.</small></h5>
                            <div class="alert alert-success updatePersonal" style="display:none;">
                                <!-- Display Dynamic Message -->
                            </div>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" >
                            <form method="post" class="form-horizontal">
                              <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name</label>
                                    <div class="col-sm-4"><input type="text"  placeholder="<?=$fname?>" class="form-control"></div>
                                    <label class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-4"><input type="text"  placeholder="<?=$lname?>" class="form-control"></div>
                                </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="row" >
                                <div class="form-group" >
                                        <label class="col-sm-2 control-label">Email Address</label>
                                        <div class="col-sm-3"><input type="EMAIL" placeholder="<?=$email?>" class="form-control"></div>
                                        <label class="col-sm-1 control-label">Contact</label>
                                    <div class="col-sm-2"><input type="text" placeholder="<?=$mob?>" class="form-control"></div>
                                    <label class="col-sm-1 control-label">DOB</label>
                                    <div class="col-sm-2"><input type="date"  value="<?=$dobFormat?>" class="form-control"></div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                            <button style="background-color:#00B357;color:white;margin-left:50px;margin-top:20px;" class="btn btn-sm" type="submit" disabled><strong> Update Details</strong></button><br><br><br><br>
                                    </div> 
                              </div> 
                              <div class="row">
                                <div class="ibox-title"><h5 style="color:Blue">Address <small>please provide local address.</small></h5></div>
                              </div>
                            </form>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-5 b-r" style="">
                                 <form class="form"  id="frmPermanentAddress" method="post">
                                    <div class="form-group">
                                        <div class="alert alert-success updatepermanent" style="display:none;">
                                            <!-- Display Dynamic Message -->
                                        </div>
                                        <h4 style="color:brown;margin-top:10px;">Permanent Address <small>please provide local address.</small></h5></div>
                                        <div class="form-group">
                                            <label>Country</label>       
                                                <select id="country" name="country" class="form-control m-b" >
                                                        <option value="">No Selected</option>
                                                </select>
                                        </div>   
                                        <div class="form-group">
                                            <label>State</label>        
                                                    <select class="form-control m-b" id="state" name="state">
                                                    <option value=""><?=$state?></option>
                                                    </select>
                                        </div>      
                                        <div class="form-group"><label>City</label>
                                                    <select class="form-control m-b" id="city" name="city">
                                                    <option value=""><?=$city?></option>
                                                    </select>
                                        </div>
                                        <div class="form-group"><label>Area</label>
                                                <textarea class="form-control" rows="5" placeholder="<?=$AREA?>" name="area" id="txtArea"></textarea>
                                                </select>
                                        </div>
                                        <div class="form-group"><label>Pin Code</label>
                                                <input type="number" class="form-control"  placeholder="<?=$PIN?>" maxlength="8" name="Pin" id="Pin">
                                        </div>
                                        <div class="form-group">
                                                <button  style="background-color:#00B357;color:white" class="btn btn-md " id="btnPermanentAddressupdate">Update</button>
                                        </div>
                                    </div>   

                                </form>
                                
                                <div class="col-sm-5">
                                <form class="form" method="post" id="frmCurrentAddress">
                                    <div class="form-group">
                                        <h4 style="color:brown;margin-top:10px;">Current Address <small>please provide current address.</small></h5></div>
                                        <div class="alert alert-success updatecurrent" style="display:none;">
                                            <!-- Display Dynamic Message -->
                                        </div>
                                        <div class="form-group"><label>Country</label>       
                                                <select id="country1" name="country1" class="form-control m-b">
                                                        <option value="<?=$country?>">No selected</option>
                                                </select>
                                        </div>   
                                        <div class="form-group"><label">State</label>        
                                                    <select class="form-control m-b" id="state1" name="state1">
                                                    <option value=""><?=$state?></option>
                                                    </select>
                                        </div>      
                                        <div class="form-group"><label>City</label>
                                                    <select class="form-control m-b" id="city1" name="city1">
                                                    <option value=""><?=$city?></option>
                                                    </select>
                                        </div>
                                        <div class="form-group"><label>Area</label>
                                                <textarea class="form-control" rows="5" placeholder="<?=$AREA?>" name="area1" id="txtArea"></textarea>
                                                </select>
                                        </div>
                                        <div class="form-group"><label>Pin Code</label>
                                                <input type="number" class="form-control" placeholder="<?=$PIN?>"  maxlength="8" name="Pin1" id="txtPin">
                                        </div>
                                        <div class="form-group">
                                                <button style="background-color:#00B357;color:white" class="btn btn-md " id="btnCurrentAddressUpdate">Update</button>
                                        </div>
                                    </div>   

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        </div>

<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>
<script type="text/javascript">

    //  user profile pic update 
   
        $('#upload_form').on('submit',function(e){
            // var usrid=$(this).attr('data');
            e.preventDefault();
            if($('#image_file').val()== '')
            {
                alert("please select the file!!");
            }
            else
            {
                $.ajax({
                url:'<?=base_url('userController/UserController/uploadPic'); ?>',
                method:'POST',
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(response)
                {
                        $('#editphoto').modal('hide');
                        // $('#uploaded_image').html(response); 
                        $('.alert-success').html(response).fadeIn().delay(4000).fadeOut('slow');
                },
                error:function(){
                    alert('Error on Upload');
                    $('.alert-success').html('updated failed').fadeIn().delay(4000).fadeOut('slow');
                }
                });
            }
    });

    $('#btnPermanentAddressupdate').click(function(){
        var data=$('#frmPermanentAddress').serialize();
        // alert(data);
        $.ajax({
                url:'<?=base_url('userController/UserController/updateAddress'); ?>',
                method:'POST',
                data:data,
                dataType:'json',
                async:false,
                success:function(response)
                {
                    // alert(data);
                       if(response.success)
                       {
                        alert("Address Updated Successfully");
                        $('#currentAddressform')[0].reset(); 
                        if(response.type=='add')
                        {
                            var type='added';
                        }
                        else if(response.type=='update')  
                        {
                            var type='updated';
                        }
                        $('.updatepermanent').html(response).fadeIn().delay(4000).fadeOut('slow');
                       }
                       else
                       {
                        $('.updatepermanent').html('updated failed').fadeIn().delay(4000).fadeOut('slow');
                       }
                },
                error:function(){
                    alert('Error on Upload');
                    $('.updatepermanent').html('updated failed').fadeIn().delay(4000).fadeOut('slow');
                }
                });
    });


    $('#btnCurrentAddressUpdate').click(function(){
        var data=$('#frmCurrentAddress').serialize();
        // alert(data);
        $.ajax({
                url:'<?=base_url('userController/UserController/updateCurrentAddress'); ?>',
                method:'POST',
                data:data,
                dataType:'json',
                async:false,
                success:function(response)
                {
                    alert("Address Updated Successfully");
                       if(response.success)
                       {
                        // alert(data);
                        $('#frmCurrentAddress')[0].reset(); 
                        if(response.type=='add')
                        {
                            var type='added';
                        }
                        else if(response.type=='update')  
                        {
                            var type='updated';
                        }
                        $('.updatecurrent').html(response).fadeIn().delay(4000).fadeOut('slow');
                       }
                       else
                       {
                        $('.updatecurrent').html('updated failed').fadeIn().delay(4000).fadeOut('slow');
                       }
                },
                error:function(){
                    alert('Error on Upload');
                    $('.updatecurrent').html('updated failed').fadeIn().delay(4000).fadeOut('slow');
                }
                });
    });
</script>

<script type="text/javascript">
    $(function(){
        
        showCountry();

    });

    function showCountry(){
                $.ajax({
                    url : "<?=base_url('addressController/getCountry'); ?>",
                    method : "POST",
                    async : true,
                    dataType : 'json',
                    success: function(data){
                      var html = '<option value=""><?=$country?></option>';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                       }
                       $('#country').html(html);
                       $('#country1').html(html);
                    }
                });
            }
        
    
    
    $('#country').click(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?=base_url('addressController/getState'); ?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                      var html = '';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                       }
                       $('#state').html(html);

                    }
                });
                return false;
            });

    $('#country1').click(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?=base_url('addressController/getState'); ?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                      var html = '<option value=""><?=$city?></option>';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                       }
                       $('#state1').html(html);

                    }
                });
                return false;
            });

        $('#state').click(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?=base_url('addressController/getCity'); ?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                      var html = '';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                       }
                       $('#city').html(html);

                    }
                });
                return false;
            });
        
            $('#state1').click(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?=base_url('addressController/getCity'); ?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                      var html = '';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                       }
                       $('#city1').html(html);

                    }
                });
                return false;
            });

</script>
<!---------------------------------------------------------------------------------------------------------------------------- -->

<!------------------------------------------------------------------------------------------------------------------------------ -->

                          
<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>


<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->

