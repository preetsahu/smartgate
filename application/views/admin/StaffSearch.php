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
                        <div class="ibox-title" style="background-color:#3C8DBC;color:white">
                            <h5>Look Academic Staff</h5>
                            <div class="ibox-tools">
                                <!-- <a href="#" class="btn btn-primary btn-xs">Create new project</a> -->
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-12">
                                    <div class="input-group"><input type="text" id="staffSearch" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-success"> Go!</button> </span>
                                    </div>
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
                                       '<td data-label="Designation" class="project-status"><label class="label label-success"  btnChgStatus-id="'+i+'" data1="'+data[i].REGISTRATION_ID+'">'+data[i].DESIGNATION+'</label></td>'+
                                       '<td data-label="Details" class="project-title"><a href="">'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</a><br/><small>'+data[i].EMAIL_ID+'</small></td>'+
                                       '<td data-label="Contact" class="project-completion">'+data[i].REGISTRATION_ID+'</td>'+
                                       '<td data-label="Action" class="project-actions"><a href="<?=base_url('Staff-Activity-View')?>?regID='+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm"><i class="fa fa-search"></i> Activity</a><button  btnEdit-id="'+i+'" data3="'+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </button><button btnDelete-id="'+i+'" data4="'+data[i].REGISTRATION_ID+'" class="btn btn-white btn-sm btn-del"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </button></td>'+
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
                url:'<?=base_url('adminController/AdminController/DeleteRegisteredStaff'); ?>',
                data:{regID:regID},
                dataType:'json',
                success:function(response){
                    if(response.success)
                    {
                        alert('faculty removed!!');
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
