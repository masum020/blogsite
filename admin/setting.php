<?php include_once("inc/function.php");isLogged();?>
<?php include_once("action.php");?>
<?php
  $action = new action();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_admin'])){
			$addAdmin = $action->addAdmin($_POST);
    }
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
			$updatePassword = $action->updatePassword($_POST);
    }
?>
<!doctype html>
<html class="no-js " lang="en">
<?php include_once("inc/header.php");?>
<body class="theme-blush">
<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->

<!-- Top Bar -->
<?php include_once("inc/topbar.php");?>
<!-- Left Sidebar -->
<?php include_once("inc/leftbar.php");?>
<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Blog Settings
                    <small>Welcome to our blog</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="../dashboard"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 right-box">
                <div class="card">
                    <div class="body">
                      <form action="" method="POST" role="form">
                            <label for="email_address">Add Admin</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" class="form-control" placeholder="Enter your username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect" name="add_admin">Save</button>
                        </form>
                    </div>
                </div>
                <?php if (isset($addAdmin)) {
                  echo $addAdmin;
                } ?>
            </div>
            <div class="col-lg-6 right-box">
                <div class="card">
                    <div class="body">
                      <form action="" method="POST" role="form">
                            <label for="email_address">Change Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect" name="update">Update</button>
                        </form>
                    </div>
                </div>
                <?php if (isset($updatePassword)) {
                  echo $updatePassword;
                } ?>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>

<!-- Mirrored from thememakker.com/templates/nexa/html/blog-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Aug 2018 08:16:39 GMT -->
</html>
