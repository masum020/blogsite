<?php include_once("inc/function.php");isLogged();?>
<?php include_once("action.php");?>
<?php
  $action = new action();
  $id = $_GET['id'];
	$singleJobDetails = $action->singleJobDetails($id);
  $res = mysql_fetch_assoc($singleJobDetails);
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
                <h2>Job Detail
                    <small>Welcome to Nexa Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                  <li class="breadcrumb-item"><a href="../dashboard"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                  <li class="breadcrumb-item active"><a href="jobs/">Job List</a></li>
                  <li class="breadcrumb-item active">Job Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 left-box">
                <div class="card single-blog-post">
                    <div class="img-holder">
                        <div class="img-post"><img src="image/<?php echo $res['company_image'];?>" alt="Awesome Image"></div>
                        <div class="date-box"><span><?php echo $res['post_date'];?></span>June</div>
                    </div>
                    <div class="body">
                        <ul class="meta list-inline">
                            <li><a href="javascript:void(0);"><i class="fa fa-comments" aria-hidden="true"></i>Comments: 3</a></li>
                        </ul>
                        <h3 class="m-t-20"><a href="job-details.php?id=<?php echo $res['id']; ?>"><?php echo $res['job_title'];?></a></h3>
                        <p><?php echo $res['job_details']; ?></p>
                    </div>
                    <div class="img-holder">
                        <div class="img-post"><img src="image/<?php echo $res['circular_image'];?>" alt="Awesome Image"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <h4 class="m-b-20">COMMENTS 3</h4>
                        <ul class="comment-reply list-unstyled">
                            <li class="row">
                                <div class="icon-box col-md-2 col-4"><img class="img-fluid" src="assets/images/sm/avatar2.jpg" alt="Awesome Image"></div>
                                <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                    <h5 class="m-b-0">Gigi Hadid </h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                    <ul class="list-inline">
                                        <li><a href="javascript:void(0);">Feb 09 2017</a></li>
                                        <li><a href="javascript:void(0);">Reply</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="comment-form">
                            <h4>LEAVE A REPLY</h4>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="#" class="row ft-fm-2 mtt40">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-raised btn-primary">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 right-box">
                <div class="card">
                    <div class="body">
                        <div class="widget popular-post">
                            <h2 class="title">Related Posts</h2>
                            <ul class="list-unstyled">
                              <?php
                                $category = $res['job_category'];
                                $jobDetailslist = $action->jobDetailsCategory($category);
                                while ($res = mysql_fetch_array($jobDetailslist)) {
                              ?>
                                <li class="row">
                                    <div class="icon-box col-4">
                                        <img class="img-fluid" src="image/<?php echo $res['company_image'];?>" alt="Awesome Image">
                                    </div>
                                    <div class="text-box col-8 p-l-0">
                                        <h5><a href="job-details.php?id=<?php echo $res['id']; ?>"><?php echo $res['job_title'];?></a></h5>
                                        <span class="time"><?php echo $res['post_date'];?></span>
                                    </div>
                                </li>
                              <?php } ?>
                            </ul>
                        </div>
                        <div class="widget newsletter">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Enter Your Email Address">
                                </div>
                                <button class="btn btn-raised btn-primary m-t-10" type="submit">SUBSCRIBE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>

<!-- Mirrored from thememakker.com/templates/nexa/html/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Aug 2018 08:16:39 GMT -->
</html>
