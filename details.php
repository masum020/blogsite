<?php include_once("inc/function.php");?>
<?php include_once("action.php");?>
<?php
  $action = new action();
  $id = $_GET['id'];
  $category = $_GET['category'];
	$postDetails = $action->postDetails($id);
  $res = mysql_fetch_assoc($postDetails);
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_comment'])){
			$post = $action->addpostcomment($_POST, $id, $category);
    }
?>
<!doctype html>
<html class="no-js" lang="">

    <?php include_once("inc/header.php");?>
    <body>
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <div id="wrapper" class="wrapper">
            <!-- Header Area Start Here -->
            <?php include_once("inc/menu.php");?>
            <!-- Header Area End Here -->
            <!-- News Feed Area Start Here -->
            <?php include_once("inc/letest-post.php");?>
            <!-- News Feed Area End Here -->
            <!-- News Info List Area Start Here -->
            <?php include_once("inc/time-sec.php");?>
            <!-- News Info List Area End Here -->
            <!-- News Details Page Area Start Here -->
            <section class="bg-body section-space-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 mb-30">
                            <div class="news-details-layout1">
                                <div class="position-relative mb-30">
                                    <img src="admin/image/<?php echo $res['post_image'];?>" alt="news-details" class="img-fluid">
                                </div>
                                <h2 class="title-semibold-dark size-c30"><?php echo $res['post_title'];?></h2>
                                <ul class="post-info-dark mb-30">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar" aria-hidden="true"></i><?php echo $res['post_date'];?></a>
                                    </li>
                                </ul>
                                <p><?php echo $res['post_details_first'];?></p>
                                <p><?php echo $res['post_details_second'];?></p>
                                <div class="comments-area">
                                    <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20">
                                      <?php $totalcomment = $action->totalpostcomment($id);
                                     echo $totalcomment;?> Comments</h2>
                                    <ul>
                                      <?php
                                        $getcomment = $action->getpostcomment($id);

                                        while ($res = mysql_fetch_array($getcomment)) {
                                      ?>
                                        <li>
                                            <div class="media media-none-xs">
                                                <div class="media-body comments-content media-margin30">
                                                    <h3 class="title-semibold-dark">
                                                        <a href="#"><?php echo $res['viewer_name'];?></a>
                                                    </h3>
                                                    <p><?php echo $res['viewer_comment'];?></p>
                                                </div>
                                            </div>
                                        </li>
                                      <?php } ?>
                                    </ul>
                                </div>
                                <div class="leave-comments">
                                    <h2 class="title-semibold-dark size-xl mb-40">Leave Comments</h2>
                                    <form id="leave-comments" action="" method="POST" role="form">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input placeholder="Name*" name="name" required class="form-control" type="text">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input placeholder="Email*" name="email" required class="form-control" type="email">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Message*" name="comment" required class="textarea form-control" id="form-message" rows="8" cols="20"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mb-none">
                                                    <button type="submit" name="post_comment" class="btn-ftg-ptp-45">Post Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                            <div class="sidebar-box">
                                <div class="topic-border color-cod-gray mb-5">
                                    <div class="topic-box-lg color-cod-gray">একিধরনের পোস্ট</div>
                                </div>
                                <div class="row">
                                  <?php
                                    $relatedPost = $action->relatedPost($category);
                                    while ($res = mysql_fetch_array($relatedPost)) {
                                  ?>
                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                        <div class="mt-25 position-relative">
                                            <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>" class="mb-10 display-block img-opacity-hover">
                                                <img src="admin/image/<?php echo $res['post_image'];?>" style="width:160px; height:90px;" alt="ad" class="img-fluid m-auto width-100">
                                            </a>
                                            <h3 class="title-medium-dark size-md mb-none">
                                                <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- News Details Page Area End Here -->
            <!-- Footer Area Start Here -->
            <!-- Footer Area Start Here -->
            <?php include_once("inc/footer.php");?>
            <!-- Footer Area End Here -->
        </div>
        <!-- Wrapper End -->
        <!-- jquery-->
        <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <!-- Plugins js -->
        <script src="js/plugins.js" type="text/javascript"></script>
        <!-- Popper js -->
        <script src="js/popper.js" type="text/javascript"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- WOW JS -->
        <script src="js/wow.min.js"></script>
        <!-- Owl Cauosel JS -->
        <script src="vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
        <!-- Meanmenu Js -->
        <script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>
        <!-- Srollup js -->
        <script src="js/jquery.scrollUp.min.js" type="text/javascript"></script>
        <!-- jquery.counterup js -->
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <!-- Isotope js -->
        <script src="js/isotope.pkgd.min.js" type="text/javascript"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- Ticker Js -->
        <script src="js/ticker.js" type="text/javascript"></script>
        <!-- Custom Js -->
        <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>
