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
                    
                    <div class="ibox float-e-margins" >
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
                                <div class="col-sm-4">
                                        <div data-toggle="buttons" class="btn-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="utype" id="utype" required>
                                            <option value="">No Selected</option>
                                            <option value="1">Staff</option>
                                            <option value="2">Student</option>
                                            <option value="3">Vistior</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-sm-4">
                                        <div class="input-group"> <label>Search by Name</label>
                                        <input type="text" id="usrSearch" name="txtAdm" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <!-- <button type="button" class="btn btn-sm btn-success"> Go!</button> </span> -->
                                        </div>
                                </div>
                            </div>
                            <div class="alert alert-success" style="display:none;">
                            <!-- Display Dynamic Message -->
                            </div>
                            <div class="">
                                <table class="table table-striped tabo" style="margin-top:25px">
                                    <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Name</th>
                                        <!-- <th>Email</th> -->
                                        <th>Type</th>
                                        <!-- <th>Status</th> -->
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="usrDetails">
                                    
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
        showUser();

        // search admin by search bar
        $('#usrSearch').keyup(function(){
            showUser();
        });
       
       $('#utype').click(function()
       {
        showUser();
       });

    });
    
    // $(document.ready(function(){
    //     showAdmin();
    // });

   
    //   show admin 
    function showUser(){
                var utype=$('#utype').val();
                var str=$('#usrSearch').val();
                    $.ajax({
                           url : "<?=base_url('adminController/AdminController/getNewUser'); ?>",
                           method : "POST", 
                           async : true,
                           data:{str:str,utype:utype},
                           dataType : 'json',
                           success: function(data){
                               var html = '';
                               var i;
                               for(i=0; i<data.length; i++)
                               {
                                   html +='<tr>'+
                                   '<td data-label="username">'+data[i].REGISTRATION_ID +'</td>'+
                                       '<td data-label="Name">'+data[i].REG_USR_FIRSTNAME+' '+data[i].REG_USR_LASTNAME+'</td>'+
                                       '<td data-label="USER_TYPE">'+data[i].TYPE_NAME+'</td>'+
                                        '<td data-label="Action"><button type="button" class="btn btn-sm" style="background-color:#00A65A;color:white;margin-right:5px;" data-id="'+ i +'" style="margin-right:5px;" data="'+data[i].REGISTRATION_ID+'" state="'+data[i].STATUS +'">'+data[i].STATUS +'</button><a class="btn btn-sm btn-danger usr-delete" data="'+data[i].REGISTRATION_ID+'" href="#">Remove User</a>'+
                                       '</tr>';
                               }
                               $('#usrDetails').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}

         
    //  delete admin
    $('#usrDetails').on('click','.usr-delete',function(){
        var uid=$(this).attr('data');
        $('#DeleteModal').modal('show');
        $('#btnDelete').unbind().click(function(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url:'<?=base_url('adminController/AdminController/removeRegUser'); ?>',
                data:{uid:uid},
                dataType:'json',
                success:function(response){
                    if(response.success){
                        $('#DeleteModal').modal('hide');
                        $('.alert-success').html('User Removed Successfully').fadeIn().delay(4000).fadeOut('slow');
                        showUser();
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

    // change  registered user Status
    $('#usrDetails').on('click', 'button[data-id]', function (e){
        var uid=$(this).attr('data');
        var status=$(this).attr('state');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url:'<?=base_url('adminController/AdminController/ChangeUserStatus'); ?>',
                data:{uid:uid,status:status},
                dataType:'json',
                success:function(response){
                    if(response.success){
                      showUser();
                    }else{
                        alert('Error');
                    }
                },
                error:function(){
                    alert('Error in Update');
                }
        });
    });

    $('#uid').click(function()
    {
        var utype=$(this).value();
        $.ajax({
                type: 'ajax',
                method: 'post',
                async: false,
                url:'<?=base_url('adminController/AdminController/ChangeUserStatus'); ?>',
                data:{utype:utype},
                dataType:'json',
                success:function(response)
                {
                    if(response.success)
                    {
                      showUser();
                    }else{
                        alert('Error');
                    }
                },
                error:function(){
                    alert('Error in Update');
                }
        });
    })
</script>
    
<!-- -------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>


<!-- ---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/footer.php'; ?>


