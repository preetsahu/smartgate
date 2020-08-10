<?php include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');
    

?>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color:#00ACD7;color:white">
                    <span class="label label-success pull-right">Inside</span>
                    <h5>Student</h5>
                </div>
                <div id="Student_Count" class="ibox-content" style="background-color:#00C0EF;color:white">
                    <h1 id="count_show" class="no-margins" style="font-weight:bold;" >
                    <?php  foreach($stuCount As $c) {$stuCount=$c->stuCount;}
                      echo $stuCount;
                    ?>
                    </h1>
                    <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                    <small >Campus</small>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="background-color:#009551;color:white">
                    <span class="label label-success pull-right" style="color:white;">inside</span>
                    <h5>Staffs</h5>
                </div>
                <div class="ibox-content" style="background-color:#00A65A;color:white">
                    <h1 class="no-margins" style="font-weight:bold;">
                    <?php  foreach($staffCount As $c) {$staffCount=$c->staffCount;}
                      echo $staffCount;
                    ?>
                    </h1>
                    <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                    <small>Campus</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4" >
            <div class="ibox float-e-margins" >
                <div class="ibox-title" style="background-color:#DA8C10;color:white">
                    <span class="label label-success pull-right" style="color:white;">Inside</span>
                    <h5>Visitor</h5>
                </div>
                <div class="ibox-content" style="background-color:#F39C12;color:white;">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins" style="font-weight:bold;">
                            <?php  foreach($GaurdianCount As $G) {$GaurdianCount=$G->GaurdianCount;}
                            echo $GaurdianCount;
                            ?>
                            </h1>
                            <div class="font-bold text-white" >
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>Gaurdian</small></div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins" style="font-weight:bold;">
                            <?php  foreach($OthersCount As $G) {$OthersCount=$G->OtherCount;}
                            echo $OthersCount;
                            ?>
                            </h1>
                            <div class="font-bold text-white">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>Others</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title"  style="background-color:#C64333;color:white">
                    <span class="label label-success pull-right">Inside</span>
                    <h5>People Count</h5>
                </div>
                <div class="ibox-content"  style="background-color:#DD4B39;color:white">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins" style="font-weight:bold;">
                            <?php  
                                $count=$stuCount+$OthersCount+$GaurdianCount+$staffCount;
                                echo $count;
                            ?>
                            </h1>
                            <div class="font-bold text-white">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>Today</small></div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins" style="font-weight:bold;">
                            <?php 
                                $count=0;
                                echo $count;
                            ?>
                            </h1>
                            <div class="font-bold text-white">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>This Week</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title iboxColor">
                    <h5>Staff and Student Activity</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link" style="color:white">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                      
                        <a class="close-link" style="color:white">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" >
                    <div class="row">
                      <form>
                        <div class="col-sm-2 m-b-xs">
                            <div data-toggle="buttons" class="btn-group">
                                 <div class="form-group">
                                        <label>Look For</label>
                                            <select class="form-control" name="usertype" id="usertype" required>
                                                <option value="">No Selected</option>
                                                <option value="1">Staff</option>
                                                <option value="2">Students</option>
                                                <!-- <option value="3">Visitors</option> -->
                                            </select>
                                  </div>
                            </div>
                        </div>

                        <div class="col-sm-2 m-b-xs">
                            <div data-toggle="buttons" class="btn-group">
                            <label>Department</label>
                              <select class="form-control" name="Department" id="Department" required>
                                  <option value="">No Selected</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 m-b-xs">
                            <!-- <div data-toggle="buttons" class="btn-group"> -->
                            <label>Branch/Course</label>
                              <select class="form-control" name="Course" id="Course" required>
                                  <option value="">No Selected</option>
                                </select>
                            <!-- </div> -->
                        </div>

                        <div class="col-sm-4 m-b-xs">
                          <label>Name</label>
                              <select class="form-control" name="Student" id="Student" required>
                                  <option value="">No Selected</option>
                              </select>
                            <!-- <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div> -->
                        </div>
                      </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name </th>
                                    <th>Registration ID </th>
                                    <th>Phone </th>
                                    <!-- <th>Purpose</th> -->
                                    <th>Status</th>
                                    <th>In Time</th>
                                    <th>Out Time</th>
                                    <!-- <th>qr</th> -->
                                </tr>
                            </thead>
                            <tbody id="Details">
                            <!-- <tr > -->

                            <!-- </tr> -->
                            </tbody>
                        </table>
                    </div>

                </div>
                
            </div>

            <!-- ----------------------------------------Visitors------------------------------------------------------  -->
            <div class="ibox float-e-margins">
                <div class="ibox-title iboxColor">
                    <h5>Visitors Activity</h5>
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
                      <form>
                        <div class="col-sm-2 m-b-xs ">
                            <div data-toggle="buttons" class="btn-group">
                                        <label>Search By</label>
                                            <select class="form-control" name="searchby" id="searchby" required>
                                                <option value="">No Selected</option>
                                                <option value="1" >VisIted Section </option>
                                                <!-- <option value="2">Visited Department </option> -->
                                            </select>
                            </div>
                        </div>

                        <div class="col-sm-2 m-b-xs">
                            <div data-toggle="buttons" class="btn-group">
                            <label>Section/Department</label>
                              <select class="form-control" name="section" id="section" required>
                                  <option value="">No Selected</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 m-b-xs">
                        <div data-toggle="buttons" class="btn-group">
                            <label>Name</label>
                              <select class="form-control" name="vname" id="vname" required>
                                  <option value="">No Selected</option>
                                </select>
                                </div>
                        </div>

                        <div class="col-sm-4 m-b-xs">
                            <!-- <div data-toggle="buttons" class="btn-group"> -->
                            <label>Name Or Mobile Number</label>
                               <div class="input-group"><input type="text" id="txtvname" name="txtvname" placeholder="Search" class="input-sm form-control">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span>
                                </div>
                            <!-- </div> -->
                        </div>                       
                      </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Visitor ID</th>
                                    <th>Visitor Name </th>
                                    <th>Phone </th>
                                    <th>Status</th>
                                    <th>Visit Section</th>
                                    <th>Purpose</th>
                                    <th>In Time</th>
                                    <th>Out Time</th>
                                </tr>
                            </thead>
                            <tbody id="vDetails">
                            <!-- <tr > -->

                            <!-- </tr> -->
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
        $(document).ready(function(){
            $('#usertype').change(function(){
                $.ajax({
                    url : "<?=base_url('adminController/AdminController/GetDepartment'); ?>",
                    method : "POST",
                    async : true,
                    dataType : 'json',
                    success: function(data){
                      var html = '';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].DEPARTMENT_ID+'>'+data[i].DEPARTMENT_NAME+'</option>';
                       }
                       $('#Department').html(html);

                    }
                });
                return false;
            });

        });
</script>

<script type="text/javascript">
        $(document).ready(function(){
            $('#Department').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?=base_url('adminController/AdminController/GetCourse'); ?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                      var html = '';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].COURSE_ID+'>'+data[i].COURSE_NAME+'</option>';
                       }
                       $('#Course').html(html);

                    }
                });
                return false;
            });

        });
    </script>


<script type="text/javascript">
            $(document).ready(function(){
                $('#Course').change(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?=base_url('adminController/AdminController/GetStudent'); ?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success: function(data){
                          var html = '';
                           var i;
                           for(i=0; i<data.length; i++){
                               html += '<option value='+data[i].STUDENT_ID+'>'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</option>';
                           }
                           $('#Student').html(html);

                        }
                    });
                    return false;
                });

            });
        </script>


<script type="text/javascript">
                $(document).ready(function(){
                    $('#Student').change(function(){
                        var id=$(this).val();
                        $.ajax({
                            url : "<?=base_url('adminController/AdminController/GetUserDetails'); ?>",
                            method : "POST",
                            data : {id: id},
                            async : true,
                            dataType : 'json',
                            success: function(data){
                                var html = '';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html +='<tr>'+
                                    '<td>'+data[i].STUDENT_ID+'</td>'+
                                        '<td>'+data[i].FIRST_NAME+' '+data[i].LAST_NAME+'</td>'+
                                        '<td>'+data[i].REGISTRATION_ID+'</td>'+
                                        '<td>'+data[i].MOBILE_NUMBER+'</td>'+
                                        // '<td>'+data[i].REG_USR_CONTACT+'</td>'+
                                        '<td><a href="#"><i class="fa fa-check text-navy"></i></a>'+data[i].PRESENCE_STATUS+'</td>'+
                                        '<td>'+data[i].IN_DATE_TIME+'</td>'+
                                        '<td>'+data[i].OUT_DATE_TIME+'</td>'+
                                        // '<td>'+data[i].MOBILE_NUMBER+'</td>'+
                                        '</tr>';
                                }
                                $('#Details').html(html);
                            }
                        });
                        return false;
                    });

                });
</script>

<!--  ------------------------------------------------------- Visitor Details ----------------------------------------------------------------------------->
<script type="text/javascript">

            $(document).ready(function(){
                $('#searchby').click(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?=base_url('adminController/AdminController/GetAcademicSection'); ?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success: function(data){
                          var html = '';
                           var i;
                           for(i=0; i<data.length; i++){
                               html += '<option value='+data[i].ID+'>'+data[i].NAME+'</option>';
                           }
                           $('#section').html(html);

                        }
                    });
                    return false;
                });

            });
</script>

<script type="text/javascript">
            $(document).ready(function(){
                $('#section').change(function(){
                    var sid=$(this).val();
                    var stype=$('#searchby').val();
                    $.ajax({
                        url : "<?=base_url('adminController/AdminController/GetVisitorName'); ?>",
                        method : "POST",
                        data : {sid: sid,stype:stype},
                        async : true,
                        dataType : 'json',
                        success: function(data){
                          var html = '';
                           var i;
                           for(i=0; i<data.length; i++){
                               html += '<option value='+data[i].VISITOR_ID+'>'+data[i].VISITOR_FIRST_NAME+' '+data[i].VISITOR_LAST_NAME+'</option>';
                           }
                           $('#vname').html(html);

                        }
                    });
                    return false;
                });

            });
</script>

<script type="text/javascript">
            $(document).ready(function(){
                $('#vname').click(function(){
                    var vid=$(this).val();
                    // var sid=$('#section').val();
                    var stype=$('#searchby').val();
                    $.ajax({
                        url : "<?=base_url('adminController/AdminController/GetVisitorDetails'); ?>",
                        method : "POST",
                        data : {vid: vid , stype: stype},
                        async : true,
                        dataType : 'json',
                        success: function(data){
                           var html = '';
                           var i;
                           for(i=0; i<data.length; i++)
                           {
                            html += '<tr>'+
                                        '<td>'+data[i].VISITOR_ID+'</td>'+
                                        '<td>'+data[i].VISITOR_FIRST_NAME+' '+data[i].VISITOR_LAST_NAME+'</td>'+
                                        '<td>'+data[i].VISITOR_CONTACT+'</td>'+
                                        '<td><a href="#"><i class="fa fa-check text-navy"></i></a>'+data[i].STATUS+'</td>'+
                                        '<td>'+data[i].SECTION_NAME+'</td>'+
                                        '<td>'+data[i].VISIT_PURPOSE+'</td>'+
                                        '<td>'+data[i].IN_DATE_TIME+'</td>'+
                                        '<td>'+data[i].OUT_DATE_TIME+'</td>'+
                                    '</tr>';
                           }
                           $('#vDetails').html(html);

                        }
                    });
                    return false;
                });

            });
</script>

<script type="text/javascript">
            $(document).ready(function(){
                $('#txtvname').keyup(function(){
                    var vname=$(this).val();
                    $.ajax({
                        url : "<?=base_url('adminController/AdminController/GetVisitorAllDetails'); ?>",
                        method : "POST",
                        data : {vname:vname},
                        async : true,
                        dataType : 'json',
                        success: function(data){
                           var html = '';
                           var i;
                           for(i=0; i<data.length; i++)
                           {
                            html += '<tr>'+
                                        '<td>'+data[i].VISITOR_ID+'</td>'+
                                        '<td>'+data[i].VISITOR_FIRST_NAME+' '+data[i].VISITOR_LAST_NAME+'</td>'+
                                        '<td>'+data[i].VISITOR_CONTACT+'</td>'+
                                        '<td><a href="#"><i class="fa fa-check text-navy"></i></a>'+data[i].STATUS+'</td>'+
                                        '<td>'+data[i].SECTION_NAME+'</td>'+
                                        '<td>'+data[i].VISIT_PURPOSE+'</td>'+
                                        '<td>'+data[i].IN_DATE_TIME+'</td>'+
                                        '<td>'+data[i].OUT_DATE_TIME+'</td>'+
                                    '</tr>';
                           }
                           $('#vDetails').html(html);

                        },
                        error:function(){
                            alert("something went wrong");
                        }
                    });
                    return false;
                });

            });
</script>

<!--  -------------------------------------------------------------- Count ------------------------------------------------------------------------------ -->
<script type="text/javascript">
            $(document).ready(function(){
                $('#Student_Count').mouseenter(function(){
                    $.ajax({
                        url : "<?=base_url('adminController/AdminController/CountStudentInside'); ?>",
                        method : "POST",
                        async : true,
                        dataType : 'json',
                        success: function(data){
                          var html = '';
                           var i;
                        //    for(i=0; i<data.length; i++){
                               html += data[0].stuCount;
                        //    }
                           $('#count_show').html(html);

                        }
                    });
                    return false;
                });

            });
</script>


<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->

</div>

<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->
