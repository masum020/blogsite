<?php include_once("inc/function.php");isLogged();?>
<?php include_once("action.php");?>
<?php
  $action = new action();
  $postDetailslist = $action->postDetailslist();
?>

<?php
  $page = $_GET['page'];
  if($page == "" || $page == "1" || $pagenumber<$page) {
    $page1 = "0";
  	$postDetails = $action->postDetails($page1);
  }else {
    $page1 = ($page*10)-10;
  	$postDetails = $action->postDetails($page1);
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
                <h2>New Posts
                    <small>Welcome to Nexa Application</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="../dashboard"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li class="breadcrumb-item active">Blog List</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-box">
                <?php
                  while ($res = mysql_fetch_array($postDetails)) {
                ?>
                <div class="card single-blog-post">
                    <div class="img-holder">
                        <div class="img-post"><img src="image/<?php echo $res['post_image'];?>" alt="Awesome Image"></div>
                        <div class="date-box"><span><?php echo $res['post_date'];?></span></div>
                    </div>
                    <div class="body">
                        <ul class="meta list-inline">
                            <li><a href="javascript:void(0);"><i class="fa fa-comments" aria-hidden="true"></i>Comments: 3</a></li>
                        </ul>
                        <h3 class="m-t-20"><a href="blog_details/?id=<?php echo $res['id']; ?>"><?php echo $res['post_title'];?></a></h3>

                        <p><?php echo substr($res['post_details_first'],0, 200).'.....';?></p>
                        <a href="blog-details?id=<?php echo $res['id']; ?>" class="btn btn-raised btn-default">Read More</a>
                        <a href="blog-delete.php?id=<?php echo $res['id']; ?>" class="btn btn-raised btn-default">Delete Post</a>
                    </div>
                </div>
              <?php } ?>
              <?php
                $postcount = $action->postcount();
                $pagenumber = ceil($postcount/10);
              ?>
                <ul class="pagination">
                    <?php if ($page>1 && $pagenumber>=$page) {?>
                    <li class="page-item"><a class="page-link" href="blog-list?page=<?php echo ($page-1);?>">Previous</a></li>
                    <?php } ?>
                    <?php for ($i=1; $i <= $pagenumber; $i++) { ?>
                    <li class="page-item active"><a class="page-link" href="blog-list?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" href="blog-list?page=<?php echo ($page+1);?>">Next</a></li>
                </ul>
            </div>
            <div class="col-lg-4 right-box">
                <div class="card">
                    <div class="body">
                        <div class="widget popular-post">
                            <h2 class="title">Popular Posts</h2>
                            <ul class="list-unstyled">
                              <?php
                                while ($res = mysql_fetch_array($postDetailslist)) {
                              ?>
                                <li class="row">
                                    <div class="icon-box col-4">
                                        <img class="img-fluid" src="image/<?php echo $res['post_image'];?>" alt="Awesome Image">
                                    </div>
                                    <div class="text-box col-8 p-l-0">
                                        <h5><a href="blog_details/?id=<?php echo $res['id']; ?>"><?php echo $res['post_title'];?></a></h5>
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

<!-- Mirrored from thememakker.com/templates/nexa/html/blog-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Aug 2018 08:16:39 GMT -->
</html>
