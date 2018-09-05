<?php include_once("inc/function.php");?>
<?php include_once("action.php");?>
<?php
  $action = new action();
  $jobList = $action->jobList();
  $newsList = $action->newsList();
  $newsLists = $action->newsLists();
  $entertainmentList = $action->entertainmentList();
  $entertainmentLists = $action->entertainmentLists();
  $internationalList = $action->internationalList();
  $internationalLists = $action->internationalLists();
  $sportList = $action->sportList();
  $sportLists = $action->sportLists();
  $educationList = $action->educationList();
  $generalknowledgeList = $action->generalknowledgeList();
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
            <!-- News Slider Area Start Here -->
            <section class="bg-accent section-space-less2">
                <div class="container">
                    <div class="row tab-space1">
                        <div class="col-lg-6 col-md-12">
                          <?php while ($res = mysql_fetch_array($newsLists)) {?>
                            <div class="img-overlay-70 img-scale-animate mb-2">
                                <img src="admin/image/<?php echo $res['post_image'];?>" style="height:434px;" alt="news" class="img-fluid width-100">
                                <div class="mask-content-lg">
                                    <h1 class="title-medium-light">
                                        <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                    </h1>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="row tab-space1">
                                <div class="col-12">
                                  <?php while ($res = mysql_fetch_array($sportLists)) {?>
                                    <div class="img-overlay-70 img-scale-animate mb-2">
                                        <img src="admin/image/<?php echo $res['post_image'];?>" style="height:214px;" alt="news" class="img-fluid width-100">
                                        <div class="mask-content-lg">
                                            <h1 class="title-medium-light">
                                                <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                            </h1>
                                        </div>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="col-sm-6 col-12">
                                  <?php while ($res = mysql_fetch_array($entertainmentLists)) {?>
                                    <div class="img-overlay-70 img-scale-animate mb-2">
                                        <img src="admin/image/<?php echo $res['post_image'];?>" style="height:218px;" alt="news" class="img-fluid width-100">
                                        <div class="mask-content-lg">
                                            <h1 class="title-medium-light">
                                                <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                            </h1>
                                        </div>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="col-sm-6 col-12">
                                  <?php while ($res = mysql_fetch_array($internationalLists)) {?>
                                    <div class="img-overlay-70 img-scale-animate mb-2">
                                        <img src="admin/image/<?php echo $res['post_image'];?>" style="height:218px;" alt="news" class="img-fluid width-100">
                                        <div class="mask-content-lg">
                                            <h1 class="title-medium-light">
                                                <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                            </h1>
                                        </div>
                                    </div>
                                  <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- News Slider Area End Here -->
            <!-- Top Story Area Start Here -->
            <section class="bg-body section-space-default">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="topic-border color-azure-radiance mb-30">
                                    <div class="topic-box-lg color-azure-radiance">জব</div>
                                </div>
                            </div>
                        </div>
                          <div class="row">
                            <?php
                              while ($res = mysql_fetch_array($jobList)) {
                            ?>
                              <div class="col-sm-3 col-12">
                                  <div class="position-relative mb-30">
                                    <?php if ($res['company_image'] != "") {?>
                                      <a class="img-opacity-hover" href="job-details?job_id=<?php echo $res['id']; ?>">
                                          <img src="admin/image/<?php echo $res['company_image'];?>" alt="news" class="img-fluid width-100 mb-15">
                                      </a>
                                      <div class="topic-box-top-xs">
                                          <div class="topic-box-sm color-cod-gray mb-20"><?php echo $res['job_type'];?></div>
                                      </div>
                                    <?php } ?>
                                      <div class="post-date-dark">
                                          <ul>
                                              <li>
                                                  <span>
                                                      <i class="fa fa-calendar" aria-hidden="true"></i>
                                                  </span><?php echo $res['post_date'];?></li>
                                          </ul>
                                      </div>
                                      <h3 class="title-medium-dark size-lg mb-none">
                                          <a href="job-details?job_id=<?php echo $res['id']; ?>"><?php echo $res['job_title'];?></a>
                                      </h3>
                                  </div>
                              </div>
                            <?php } ?>
                          </div>
                      </div>
                  </div>
              </div>
            </section>
            <!-- Top Story Area End Here -->
            <!-- Latest News Area Start Here -->
            <section class="bg-body section-space-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="topic-border color-cutty-sark mb-30 width-100">
                                <div class="topic-box-lg color-cutty-sark">নিউস</div>
                            </div>
                            <?php while ($res = mysql_fetch_array($newsList)) {?>
                            <div class="media mb-30">
                                <a class="img-opacity-hover" href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>">
                                    <img src="admin/image/<?php echo $res['post_image'];?>" style="width:180px; height:90px;" alt="news" class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span><?php echo $res['post_date'];?></li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                    </h3>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="topic-border color-pomegranate mb-30 width-100">
                                <div class="topic-box-lg color-pomegranate">ইন্টারটেইনমেনট</div>
                            </div>
                            <?php
                              while ($res = mysql_fetch_array($entertainmentList)) {
                            ?>
                            <div class="media mb-30">
                                <a class="img-opacity-hover" href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>">
                                    <img src="admin/image/<?php echo $res['post_image'];?>" style="width:180px; height:90px;" alt="news" class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span><?php echo $res['post_date'];?></li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                    </h3>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="topic-border color-web-orange mb-30 width-100">
                                <div class="topic-box-lg color-web-orange">Internationnal</div>
                            </div>
                            <?php
                              while ($res = mysql_fetch_array($internationalList)) {
                            ?>
                            <div class="media mb-30">
                                <a class="img-opacity-hover" href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>">
                                    <img src="admin/image/<?php echo $res['post_image'];?>" style="width:180px; height:90px;" alt="news" class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span><?php echo $res['post_date'];?></li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                    </h3>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="ne-isotope">
                      <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="topic-border color-azure-radiance mb-30">
                                        <div class="topic-box-lg color-azure-radiance">স্পোর্টস</div>
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                                <?php
                                  while ($res = mysql_fetch_array($sportList)) {
                                ?>
                                  <div class="col-sm-3 col-12">
                                      <div class="position-relative mb-30">
                                        <a class="img-opacity-hover" href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>">
                                            <img src="admin/image/<?php echo $res['post_image'];?>" style="height:150px;" alt="news" class="img-fluid">
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
            <!-- Latest News Area End Here -->
            <!-- Latest News Area Start Here -->
            <section class="bg-body section-space-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="topic-border color-cutty-sark mb-30 width-100">
                                <div class="topic-box-lg color-cutty-sark">ইডুুকেশন</div>
                            </div>
                            <?php
                              while ($res = mysql_fetch_array($educationList)) {
                            ?>
                            <div class="media mb-30">
                                <a class="img-opacity-hover" href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>">
                                    <img src="admin/image/<?php echo $res['post_image'];?>" style="width:200px; height:130px;" alt="news" class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span><?php echo $res['post_date'];?></li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                    </h3>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="topic-border color-pomegranate mb-30 width-100">
                                <div class="topic-box-lg color-pomegranate">জেনারেন নলেজ</div>
                            </div>
                            <?php
                              while ($res = mysql_fetch_array($generalknowledgeList)) {
                            ?>
                            <div class="media mb-30">
                                <a class="img-opacity-hover" href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>">
                                    <img src="admin/image/<?php echo $res['post_image'];?>" style="width:200px; height:130px;" alt="news" class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span><?php echo $res['post_date'];?></li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a href="details?id=<?php echo $res['id']; ?> & category=<?php echo $res['post_category']; ?>"><?php echo $res['post_title'];?></a>
                                    </h3>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Latest News Area End Here -->
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
