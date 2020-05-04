<?php include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');

?>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Inside</span>
                    <h5>Student</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">386</h1>
                    <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                    <small>Campus</small>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">inside</span>
                    <h5>Staffs</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">60</h1>
                    <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                    <small>Campus</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Inside</span>
                    <h5>visitor</h5>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins">100</h1>
                            <div class="font-bold text-navy">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>Gaurdian</small></div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins">20</h1>
                            <div class="font-bold text-navy">
                            <!-- <i class="fa fa-level-up"></i>  -->
                            <small>Others</small></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>People Count</h5>
                    <div class="ibox-tools">
                        <span class="label label-primary">updated today</span>
                    </div>
                </div>
                <div class="ibox-content no-padding">
                    <div class="flot-chart m-t-lg" style="height: 55px;">
                        <div class="flot-chart-content" id="flot-chart1"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <span class="pull-right text-right">
                                        <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                            <br/>
                                            All sales: 162,862
                                        </span>
                        <h3 class="font-bold no-margins">
                            Half-year revenue margin
                        </h3>
                        <small>Sales marketing.</small>
                    </div>

                    <div class="m-t-sm">

                        <div class="row">
                            <div class="col-md-8">
                                <div>
                                    <canvas id="lineChart" height="114"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="stat-list m-t-lg">
                                    <li>
                                        <h2 class="no-margins">2,346</h2>
                                        <small>Total orders in period</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar" style="width: 48%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">4,422</h2>
                                        <small>Orders in last month</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar" style="width: 60%;"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="m-t-md">
                        <small class="pull-right">
                                <i class="fa fa-clock-o"> </i>
                                Update on 16.07.2015
                            </small>
                        <small>
                                <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                            </small>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning pull-right">Data has changed</span>
                    <h5>User activity</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <small class="stats-label">Pages / Visit</small>
                            <h4>236 321.80</h4>
                        </div>

                        <div class="col-xs-4">
                            <small class="stats-label">% New Visits</small>
                            <h4>46.11%</h4>
                        </div>
                        <div class="col-xs-4">
                            <small class="stats-label">Last week</small>
                            <h4>432.021</h4>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <small class="stats-label">Pages / Visit</small>
                            <h4>643 321.10</h4>
                        </div>

                        <div class="col-xs-4">
                            <small class="stats-label">% New Visits</small>
                            <h4>92.43%</h4>
                        </div>
                        <div class="col-xs-4">
                            <small class="stats-label">Last week</small>
                            <h4>564.554</h4>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <small class="stats-label">Pages / Visit</small>
                            <h4>436 547.20</h4>
                        </div>

                        <div class="col-xs-4">
                            <small class="stats-label">% New Visits</small>
                            <h4>150.23%</h4>
                        </div>
                        <div class="col-xs-4">
                            <small class="stats-label">Last week</small>
                            <h4>124.990</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> -->

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Data</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
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
                      <form>
                        <div class="col-sm-4 m-b-xs">
                            <div data-toggle="buttons" class="btn-group">
                                 <div class="form-group">
                                        <label>Look For</label>
                                            <select class="form-control" name="usertype" id="usertype" required>
                                                <option value="">No Selected</option>
                                                <option value="1">Staff</option>
                                                <option value="2">Students</option>
                                                <option value="3">Visitors</option>
                                            </select>
                                  </div>
                            </div>
                        </div>

                        <div class="col-sm-4 m-b-xs">
                            <div data-toggle="buttons" class="btn-group">
                            <label>Department/Branch</label>
                              <select class="form-control" name="usertype" id="usertype" required>
                                  <option value="">No Selected</option>
                                  <option value="1">Staff</option>
                                  <option value="2">Students</option>
                                  <option value="3">Visitors</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 m-b-xs">
                          <label>Name</label>
                              <select class="form-control" name="usertype" id="usertype" required>
                                  <option value="">No Selected</option>
                                  <option value="1">Staff</option>
                                  <option value="2">Students</option>
                                  <option value="3">Visitors</option>
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
                                    <th>S.No.</th>
                                    <th>Name </th>
                                    <th>Dept </th>
                                    <th>Phone </th>
                                    <th>Purpose</th>
                                    <th>Status</th>
                                    <th>In Time</th>
                                    <th>Out Time</th>
                                    <th>qr</th>
                                </tr>
                            </thead>
                            <tbody id="users">
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
<script src="<?= base_url()?>assets/js/jquery-3.3.1.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
            $('#usertype').change(function(){

                var id=$(this).val();
                $.ajax({
                    url : "<?=base_url('AdminController/GetUserDetails'); ?>",
                    method : "POST",
                    // data: $('#package_call').serialize(),
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html +='<tr>'+
                            '<td>'+data[i].REGISTRATION_ID+'</td>'+
                                '<td>'+data[i].FIRST_NAME+' '+data[i].  LAST_NAME+'</td>'+
                                '<td>'+data[i].DEPARTMENT_NAME+'</td>'+
                                '<td>'+data[i].MOBILE_NUMBER+'</td>'+
                                '<td>'+data[i].REG_USR_CONTACT+'</td>'+
                                '<td><a href="#"><i class="fa fa-check text-navy"></i></a>'+data[i].PRESENCE_STATUS+'</td>'+
                                '<td>'+data[i].IN_DATE_TIME+'</td>'+
                                '<td>'+data[i].OUT_DATE_TIME+'</td>'+
                                '<td>'+data[i].MOBILE_NUMBER+'</td>'+
                                '</tr>';
                        }
                        $('#users').html(html);

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
