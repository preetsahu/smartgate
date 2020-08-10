<?php include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');

?>
<style type="text/css">
@media(max-width:700px)
{
    .tabo thead
    {
        display:none;
    }
    /* .tabo td:hover
    {
        background-color:#1AB394;
        color:#ffffff;
    } */
    .tabo ,.tabo tbody, .tabo tr,.tabo td
    {
        display:block;
        width:100%;
    }
    .tabo tr
    {
        margin-bottom:1px;
        border-bottom:5px solid #1AB394;
        border-top:5px solid #1AB394;
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
         width:50%;
         padding-left:15px;
         font-size:13px;
         /* font-weight:bold; */
         text-align:left;
    }
}

</style>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title iboxColor">
                            <h5>Look Available Staff</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-12">
                                    <div class="input-group"><input type="text" id="staffsearch" placeholder="Search by Department" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-success"> Go!</button> </span>
                                    </div>
                                    
                                </div>
                                <div class="alert alert-success" style="display:none;">
                                    <!-- Display Dynamic Message -->
                                </div>
                            </div>
                            <div class="project-list">
                                <table class="table table-hover tabo">
                                    <tbody id="showstaff">
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
 <!-- Delete Modal -->
 <div class="modal fade" id="StaffDeleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do You Want To Delete this record ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDeleteStaff" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
    <!-- Delete Modal -->

<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>

<script type="text/javascript">
    $(function(){
        // load data on document ready
        showStaff();

        // // search admin by search bar
        $('#staffsearch').keyup(function(){
            showStaff();
        });
       
    });
    //   show data 
    function showStaff(){
                          var deptID=$('#staffsearch').val();
                           $.ajax({
                           type: 'ajax',
                           url : "<?=base_url('adminController/AdminController/viewAvailStaff');?>",
                           data : {deptID:deptID},
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
                                       '<td data-label="Available Status" class="project-status"><label class="label label-success"  btnChgStatus-id="'+i+'" staffdata1="'+data[i].REGISTRATION_ID+'">'+data[i].PRESENCE_STATUS+'</label></td>'+
                                       '<td data-label="Details" class="project-title"><a href="#">'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</a><br/><small>'+data[i].MOBILE_NUMBER+'||'+data[i].STAFF_ID+'</small></td>'+
                                    //    '<td class="project-completion">'+data[i].EMAIL_ID+'<div class="progress progress-mini"><div style="width: 48%;" class="progress-bar"></div></div></td>'+
                                    '<td data-label="Email ID" class="project-completion">'+data[i].EMAIL_ID+'</td>'+
                                    //    '<td data-label="Action" class="project-actions"><a href="<?= base_url('Staff-Activity-View') ?>?regID='+data[i].REGISTRATION_ID+'" staffdata2="'+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View Complete Activity</a></td>'+
                                       '</tr>';
                               }
                               $('#showstaff').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}

  
     //  delete staff
     $('#showstaff').on('click','.staff-delete',function(e)
     {
        var regID=$(this).attr('staffdata4');
        $('#StaffDeleteModal').modal('show');
        $('#btnDeleteStaff').unbind().click(function(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url:'<?=base_url('adminController/AdminController/DeleteRegisteredStaff'); ?>',
                data:{regID:regID},
                dataType:'json',
                success:function(response){
                    if(response.success){
                        $('#DeleteModal').modal('hide');
                        $('.alert-success').html('Staff Removed Successfully').fadeIn().delay(4000).fadeOut('slow');
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
    });

    // //View Staff Activities
    // $('#showstaff').on('click','button[btnView-id]',function(e)
    //  {
    //     var regID=$(this).attr('staffdata2');
    //     $.ajax({
    //         type:'ajax',
    //         method:'post',
    //         async:false,
    //         data:{regID:regID},
    //         url:'<?//=base_url('AdminController/ViewStaffActivities'); ?>',
    //         datatype:'json',
    //         success:function(resp)
    //         {
    //             // if (resp.status == "success")
    //             window.location.href = resp.redirect_url;
    //             // else
    //             // $('#error-msg').html('<div class="alert alert-danger">' + resp.message + '</div>');
    //         },
    //         error:function()
    //         {
    //             alert('Error');
    //         }
    //     });
   // });
</script>



<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->


<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->
