<?php include_once("admin/inc/function.php");?>
<?php include_once("admin/action.php");?>
<?php
  $action = new action();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])){
			$adminlogin = $action->adminlogin($_POST);
    }
?>

<!doctype html>
<html class="no-js " lang="en">
<?php include_once("admin/inc/header-admin.php");?>

<body class="theme-orange">
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <h1>Admin Login</h1>
                    </div>
                </div>
                <form class="col-lg-12" id="sign_in" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username">
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password">
                            <label class="form-label">Password</label>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-raised btn-primary waves-effect" name="signin">Sign In</button>
                    </div>
                </form>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="forgot-password">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="admin/assets/bundles/libscripts.bundle.js"></script>
<script src="admin/assets/bundles/vendorscripts.bundle.js"></script>
<script src="admin/assets/bundles/mainscripts.bundle.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/nexa/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Aug 2018 08:12:50 GMT -->
</html>
