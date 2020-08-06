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
        .tabo ,.tabo tbody, .tabo tr,.tabo td
        {
            display:block;
            width:100%;
        }
        .tabo tr
        {
            margin-bottom:15px;
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

        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title iboxColor">
                            <h5>Look Available Students</h5>
                            <div class="ibox-tools">
                                <!-- <a href="#" class="btn btn-primary btn-xs">Create new project</a> -->
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-12">
                                    <div class="input-group"><input type="text" id="studentSearch" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-success"> Go!</button> </span>
                                    </div>
                                </div>
                            </div>   
                            <div class="project-list">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover tabo">
                                    <thead>
                                    <tr>
                                    <th>Check-in Status</th>
                                    <th>Details</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody id="showD">
                                    
                                    </tbody>
                                </table>
                            </div>
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
                           url : "<?=base_url('adminController/AdminController/viewAvailStudents');?>",
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
                                       '<td data-label="Check-in Status"><label class="label label-success">'+data[i].PRESENCE_STATUS+'</label></td>'+
                                       '<td data-label="Details">'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'<br/><small>Student ID:-'+data[i].STUDENT_ID+' || '+data[i].DEPARTMENT_NAME+'</small></td>'+
                                       '<td data-label="Contact">'+data[i].MOBILE_NUMBER+'</td>'+
                                       '<td data-label="Email">'+data[i].EMAIL_ID+'</td>'+
                                       '<td data-label="Action" class="project-actions"><a href="<?=base_url('Student-Activity-View')?>?SID='+data[i].STUDENT_ID+'" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View Complete Activity</a></td>'+
                                       '</tr>';
                               }
                               $('#showD').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}

    //  delete Student
    $('#showD').on('click','button[btnDelete-id]',function(e){
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

</script>



<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->


<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->
