<?php include_once("inc/function.php");isLogged();?>
<?php include_once("action.php");?>
<?php
  $action = new action();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_insert_job_post'])){
			$post = $action->addJobPost($_POST, $_FILES);
    }
?>
<!doctype html>
<html class="no-js " lang="en">
<?php include_once("inc/header.php");?>
<body class="theme-blush">
<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Explore Nexa...">
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>

<!-- Top Bar -->
<?php include_once("inc/topbar.php");?>
<!-- Left Sidebar -->
<?php include_once("inc/leftbar.php");?>
<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>New Post
                    <small>Welcome to Nexa Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href=""><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li class="breadcrumb-item active">New Post</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <?php
                if (isset($post)) {
                  echo $post;
                }
              ?>
                <div class="card">
                    <div class="body">
                      <form role="form" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group form-float">
                            <p> <b>Job Title</b> </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="job_title" placeholder="Enter Post Title">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <p> <b>Job Category</b> </p>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="job_category" value="Job">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float">
                                <p> <b>Job Type</b> </p>
                                <select class="form-control show-tick" data-live-search="true" name="job_type">
                                    <option>select One</option>
                                    <option>Governmant</option>
                                    <option>Private</option>
                                    <option>Bank</option>
                                    <option>NGO</option>
                                </select>
                          </div>
                          <div class="form-group custom-file">
                            <input type="file" class="custom-file-input" name="companyImage" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Company Image</label>
                          </div>
                          <div class="form-group custom-file">
                            <input type="file" class="custom-file-input" name="circularImage" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Circular Image</label>
                          </div>
                          <div class="form-group form-float">
                            <p> <b>Job Details</b> </p>
                            <textarea class="form-control tinymce" id="myarea" name="job_description" rows="3" style="min-height: 100px"></textarea>
                          </div>
                        <button type="submit" class="btn btn-outline-success" name="_insert_job_post"><i class="fa fa-plus"></i>&nbsp;Add Post</button>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
<script src="assets/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/forms/editors.js"></script>
<script type="text/javascript" src="assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="assets/js/tinymce/init-tinymce.js"></script>
<script src="assets/plugins/summernote/summernote.js"></script>
</body>
</html>
