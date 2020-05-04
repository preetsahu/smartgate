<?php include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');

?>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Look Acedemic Staffs</h5>
                            <div class="ibox-tools">
                                <!-- <a href="#" class="btn btn-primary btn-xs">Create new project</a> -->
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-12">
                                    <div class="input-group"><input type="text" id="staffSearch" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="project-list">
                                <table class="table table-hover">
                                    <tbody id="showstaff">
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      


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
                                   html +='<tr>'+
                                       '<td class="project-status"><label class="label label-primary"  btnChgStatus-id="'+i+'" data1="'+data[i].REGISTRATION_ID+'">'+data[i].DESIGNATION+'</label></td>'+
                                       '<td class="project-title"><a href="">'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</a><br/><small>'+data[i].EMAIL_ID+'</small></td>'+
                                       '<td class="project-completion">'+data[i].REGISTRATION_ID+'</td>'+
                                       '<td class="project-actions"><a href="<?=base_url('Staff-Activity-View')?>?regID='+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View Complete Activity</a><button  btnEdit-id="'+i+'" data3="'+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </button><button btnDelete-id="'+i+'" data4="'+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm btn-del"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete </button></td>'+
                                       '</tr>';
                               }
                               $('#showstaff').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}

  

    //  delete Student
    $('#showstaff').on('click','button[btnDelete-id]',function(e){
            var regID=$(this).attr('data4');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url:'<?=base_url('adminController/AdminController/DeleteRegisteredStudent'); ?>',
                data:{regID:regID},
                dataType:'json',
                success:function(response){
                    if(response.success)
                    {
                        showStaff();
                    }else{
                        alert('Error');
                    }
                },
                error:function(){
                    alert('Error Deleting');
                }
        });
    });


</script>



<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->


<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->
