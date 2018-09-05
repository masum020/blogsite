<?php include_once("inc/function.php");?>
<?php include_once("action.php");?>
<?php
  $action = new action();

  $page = $_GET['page'];
  if($page == "" || $page == "1" || $pagenumber<$page) {
    $page1 = "0";
    $entertainmentList = $action->entertainmentsList($page1);
  }else {
    $page1 = ($page*10)-10;
    $entertainmentList = $action->entertainmentsList($page1);
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
            <!-- Post Style 2 Page Area Start Here -->
            <section class="bg-body section-space-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2"></div>
                        <div class="col-lg-10 col-md-12">
                            <div class="row">
                              <?php
                                while ($res = mysql_fetch_array($entertainmentList)) {
                              ?>
                                <div class="col-sm-4 col-12">
                                    <div class="position-relative mb-30">
                                        <a class="img-opacity-hover" href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>">
                                            <img src="admin/image/<?php echo $res['post_image'];?>" alt="news" class="img-fluid width-100 mb-15">
                                        </a>
                                        <div class="post-date-dark">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span><?php echo $res['post_date'];?></li>
                                            </ul>
                                        </div>
                                        <h3 class="title-medium-dark size-lg mb-none">
                                            <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                        </h3>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="row mt-20-r mb-30">
                                <?php
                                  $entertainmentcount = $action->entertainmentcount();
                                  $pagenumber = ceil($entertainmentcount/10);
                                ?>
                                <div class="col-sm-6 col-12">
                                    <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                                        <ul>
                                          <?php if ($page>1 && $pagenumber>=$page) {?>
                                          <li class="active">
                                              <a href="entertainments?page=<?php echo ($page-1);?>"><?php echo "<<"; ?></a>
                                          </li>
                                          <?php } ?>
                                          <?php for ($i=1; $i <= $pagenumber; $i++) { ?>
                                            <li class="active">
                                                <a href="entertainments?page=<?php echo $i;?>"><?php echo $i;?></a>
                                            </li>
                                          <?php } ?>
                                          <li class="active">
                                              <a href="entertainments?page=<?php echo ($page+1);?>"><?php echo ">>"; ?></a>
                                          </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="pagination-result text-right pt-10 text-center--xs">
                                        <p class="mb-none">Page <?php echo $page;?> of <?php echo $pagenumber;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Post Style 2 Page Area End Here -->
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


<!-- Mirrored from www.radiustheme.com/demo/html/newsedge/newsedge/post-style-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Aug 2018 17:10:26 GMT -->
</html>
