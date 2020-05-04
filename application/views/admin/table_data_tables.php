
<?php include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');
    
?>


<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                            <h5>View System Admins </h5>
                                            <div class="ibox-tools">
                                                <a class="collapse-link">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user">
                                                    <li><a href="#">Config option 1</a>
                                                    </li>
                                                    <li><a href="#">Config option 2</a>
                                                    </li>
                                                </ul>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                        </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" id="admSearch" name="txtAdm" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-success" style="display:none;">
                                                <!-- Display Dynamic Message -->
                        </div>
                        <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>User Name</th>
                                                        <th>Name</th>
                                                        <!-- <th>Email</th> -->
                                                        <th>Phone</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody id="Details"><tr><td>kunalnag86@gmail.com</td><td>kunal nag</td><td></td><td><button class="btn btn-sm btn-primary" data-id="0" style="margin-right:5px;" data="kunalnag86@gmail.com" state="BLOCKED">BLOCKED</button></td><td><a class="btn btn-sm btn-success adm-update" style="margin-right:5px;" data="kunalnag86@gmail.com" href="#">Update</a><a class="btn btn-sm btn-danger adm-delete" data="kunalnag86@gmail.com" href="#">Delete</a></td></tr><tr><td>praveenjanghel28@gmail.com</td><td>praveen janghel</td><td></td><td><button class="btn btn-sm btn-primary" data-id="1" style="margin-right:5px;" data="praveenjanghel28@gmail.com" state="BLOCKED">BLOCKED</button></td><td><a class="btn btn-sm btn-success adm-update" style="margin-right:5px;" data="praveenjanghel28@gmail.com" href="#">Update</a><a class="btn btn-sm btn-danger adm-delete" data="praveenjanghel28@gmail.com" href="#">Delete</a></td></tr><tr><td>raunakkabi23@gmail.com</td><td>raunak kabiraj</td><td></td><td><button class="btn btn-sm btn-primary" data-id="2" style="margin-right:5px;" data="raunakkabi23@gmail.com" state="BLOCKED">BLOCKED</button></td><td><a class="btn btn-sm btn-success adm-update" style="margin-right:5px;" data="raunakkabi23@gmail.com" href="#">Update</a><a class="btn btn-sm btn-danger adm-delete" data="raunakkabi23@gmail.com" href="#">Delete</a></td></tr></tbody>
                                                </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
       </div>
  
<script src="<?= base_url()?>assets/admin/js/jquery-3.3.1.js"></script>
    
<script type="text/javascript">
    $(document).ready(function(){
        showData();   
    });

    //   show data 
    function showData(){
                    $.ajax({
                           type: 'ajax',
                           url : "<?=base_url('adminController/AdminController/GetDetails');?>",
                           method : "get", 
                           async : false,
                           dataType : 'json',
                           success: function(data){
                               var html = '';
                               var i;
                               for(i=0; i<data.length; i++)
                               {
                                   html +='<tr class="gradeX even" role="row">'+
                                       '<td class="sorting_1">'+data[i].ADM_ID+'</td>'+
                                       '<td>'+data[i].ADM_FIRST_NAME+' '+data[i].ADM_LAST_NAME+'</td>'+
                                       '<td class="center">'+data[i].ADM_STATUS+'</td>'+
                                       '<td class="center">'+data[i].ADM_ID+'</td>'+
                                       '<td class="center">'+data[i].ADM_ID+'</td>'+
                                       '</tr>';
                               }
                               $('#Details').html(html);
                           },
                           error:function(){
                               alert('could not get data from database');
                           }
         });}
</script>

      
<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->


<!------------------------------------------------------------------------------------------------------------------------------ -->
<?php include 'layout/footer.php'; ?>


<!------------------------------------------------------------------------------------------------------------------------------ -->
