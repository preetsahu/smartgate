<?php include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');

?>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Look Students Activity</h5>
                            <div class="ibox-tools">
                                <!-- <a href="#" class="btn btn-primary btn-xs">Create new project</a> -->
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-12">
                                    <div class="input-group"><input type="text" id="studentSearch" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="project-list">
                                <table class="table table-hover">
                                    <tbody id="showD">
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      


<script src="<?= base_url()?>assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript">
    $(function(){
        // load data on document ready
        showStudents();

        // // search admin by search bar
        $('#studentSearch').keyup(function(){
            showStudents();
        });
       
    });
    //   show data 
    function showStudents(){
                           var str=$('#studentSearch').val();
                           $.ajax({
                           type: 'ajax',
                           url : "<?=base_url('AdminController/ViewStudents');?>",
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
                                       '<td class="project-status"><label class="label label-primary"  btnChgStatus-id="'+i+'" data1="'+data[i].REGISTRATION_ID+'" state="'+data[i].STUDENT_ID+'">'+data[i].STUDENT_ID+'</label></td>'+
                                       '<td class="project-title"><a href="<?=base_url('Student-Activity-View');?>?'+data[i].REGISTRATION_ID+'">'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</a><br/><small>Created 18.04.2020</small></td>'+
                                       '<td class="project-completion">'+data[i].REGISTRATION_ID+'<div class="progress progress-mini"><div style="width: 48%;" class="progress-bar"></div></div></td>'+
                                       '<td class="project-actions"><button btnView-id="'+i+'" data2="'+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </button><button  btnEdit-id="'+i+'" data3="'+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </button><button btnDelete-id="'+i+'" data4="'+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm btn-del"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete </button></td>'+
                                       '</tr>';
                               }
                               $('#showD').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}

  
    //   // change Admin Status
    //   $('#showD').on('click', 'button[btnChgStatus-id]', function (e){
    //     var eid=$(this).attr('data1');
    //     var status=$(this).attr('state');
    //         $.ajax({
    //             type: 'ajax',
    //             method: 'get',
    //             async: false,
    //             url:'<?=base_url('AdminController/ChangeAdminStatus'); ?>',
    //             data:{eid:eid,status:status},
    //             dataType:'json',
    //             success:function(response){
    //                 if(response.success){
    //                   //  $('.alert-success').html('Admin Status Updated').fadeIn().delay(4000).fadeOut('slow');
    //                     showActivity();
    //                 }else{
    //                     alert('Error');
    //                 }
    //             },
    //             error:function(){
    //                 alert('Error in Update');
    //             }
    //     });
    // });

    //  delete Student
    $('#showD').on('click','button[btnDelete-id]',function(e){
            var regID=$(this).attr('data4');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url:'<?=base_url('AdminController/DeleteRegisteredStudent'); ?>',
                data:{regID:regID},
                dataType:'json',
                success:function(response){
                    if(response.success)
                    {
                        showStudents();
                    }else{
                        alert('Error');
                    }
                },
                error:function(){
                    alert('Error Deleting');
                }
        });
    });

    // //View student Activities
    // $('#showD').on('click','button[btn-ID]',function(e))
    // {
    //     var regID=$(this).attr('data2');
    //     $.ajax({
    //         type:'ajax',
    //         method:'post',
    //         async:false,
    //         url:'',
    //         data:{regID:regID},
    //         datatype:'json',
    //         success:function(response)
    //         {}
    //     });
    // }
</script>



<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->


<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->
