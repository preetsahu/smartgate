<?php include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');

?>
          <div class="middle-box text-center loginscreen  animated fadeInDown">
          <div>
                <div>
                    <h1 class="logo-name">NIT</h1>
                </div>
                <h3>Administrator Registration to <br></h3><h4>Smart Gate System</h4>
                <p>Create account to see it in action.</p>
                <form id="createForm" class="m-t" method="post" action="<?=base_url('Register-Admin') ?>" role="form">
                    <div class="form-group">
                        <input type="text" id="finame" class="form-control" placeholder="First Name" name="fname" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" id="laname" class="form-control" placeholder="Last Name" name="lname" required="">
                    </div>
                    <div class="form-group">
                        <input type="email" id="Email" class="form-control" placeholder="Email" name="email" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" id="Pass" class="form-control" placeholder="Password" name="pass" required="">
                    </div>
                    <div class="form-group">
                            <!-- <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div> -->
                    </div>
                    <button type="submit" id="butsave" class="btn btn-success block full-width m-b">Register</button>
                </form>
        </div>
        </div>
<!---------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>
<!------------------------------------------------------------------------------------------------------------------------------ -->
</div>

<!------------------------------------------------------------------------------------------------------------------------------ -->

<?php include 'layout/footer.php'; ?>

<!------------------------------------------------------------------------------------------------------------------------------ -->
