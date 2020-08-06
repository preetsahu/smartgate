<?php
    include 'layout/header.php';
    $MOB=$this->session->userdata('MOB');
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
            font-size:12px;
            font-weight:bold;
            text-align:left;
        }
    }

</style>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="ibox float-e-margins">
                        <div class="ibox-title iboxColor">
                            <h5>View System Admins </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link" style="color:white">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link" style="color:white">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="text" id="admSearch" name="txtAdm" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-success"> Go!</button> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-success" style="display:none;">
                            <!-- Display Dynamic Message -->
                            </div>
                            <div class="">
                                <table class="table table-striped tabo">
                                    <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Name</th>
                                        <!-- <th>Email</th> -->
                                        <!-- <th>Phone</th> -->
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="admDetails">
                                    
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Delete Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
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
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
    <!-- Delete Modal -->
<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>

<script type="text/javascript">
    $(function(){
        // load data on document ready
        showAdmin();

        // search admin by search bar
        $('#admSearch').keyup(function(){
            showAdmin();
        });
       
    });
    
    // $(document.ready(function(){
    //     showAdmin();
    // });

   
    //   show admin 
    function showAdmin(){
                var eid=$(this).attr('data');
                var str=$('#admSearch').val();
                    $.ajax({
                           url : "<?=base_url('adminController/AdminController/GetAdmin'); ?>",
                           method : "POST", 
                           async : true,
                           data:{str:str},
                           dataType : 'json',
                           success: function(data){
                               var html = '';
                               var i;
                               for(i=0; i<data.length; i++)
                               {
                                   html +='<tr>'+
                                   '<td data-label="username">'+data[i].ADM_ID+'</td>'+
                                       '<td data-label="Admin Name">'+data[i].ADM_FIRST_NAME+' '+data[i].ADM_LAST_NAME+'</td>'+
                                    //    '<td data-label="Contact">'+data[i].ADM_CONTACT+'</td>'+
                                       '<td data-label="Status"><button class="btn btn-sm" style="background-color:#00A65A;color:white;margin-right:5px;" data-id="'+ i +'" data="'+data[i].ADM_ID+'" state="'+data[i].ADM_STATUS+'">'+data[i].ADM_STATUS+'</button></td>'+
                                       '<td data-label="Action"><a class="btn btn-sm btn-success adm-update"  style="margin-right:5px;" data="'+data[i].ADM_ID+'" href="#">Update</a><a class="btn btn-sm btn-danger adm-delete" data="'+data[i].ADM_ID+'" href="#">Delete</a></td>'+
                                       '</tr>';
                               }
                               $('#admDetails').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}

         
    //  delete admin
    $('#admDetails').on('click','.adm-delete',function(){
        var eid=$(this).attr('data');
        $('#DeleteModal').modal('show');
        $('#btnDelete').unbind().click(function(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url:'<?=base_url('adminController/AdminController/DeleteAdmin'); ?>',
                data:{eid:eid},
                dataType:'json',
                success:function(response){
                    if(response.success){
                        $('#DeleteModal').modal('hide');
                        $('.alert-success').html('Admin Removed Successfully').fadeIn().delay(4000).fadeOut('slow');
                        showAdmin();
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

    // change Admin Status
    $('#admDetails').on('click', 'button[data-id]', function (e){
        var eid=$(this).attr('data');
        var status=$(this).attr('state');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url:'<?=base_url('adminController/AdminController/ChangeAdminStatus'); ?>',
                data:{eid:eid,status:status},
                dataType:'json',
                success:function(response){
                    if(response.success){
                      //  $('.alert-success').html('Admin Status Updated').fadeIn().delay(4000).fadeOut('slow');
                        showAdmin();
                    }else{
                        alert('Error');
                    }
                },
                error:function(){
                    alert('Error in Update');
                }
        });
    });
</script>
    
<!-- -------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>


<!-- ---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/footer.php'; ?>


