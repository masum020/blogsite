<?php
  $newPost = $action->newPost();
?>
<section class="bg-accent border-bottom add-top-margin">
    <div class="container">
        <div class="row no-gutters d-flex align-items-center">
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="topic-box mt-4 mb-5">নতুন পোস্ট</div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-7">
                <div class="feeding-text-dark">
                    <ol id="sample" class="ticker">
                      <?php
                        while ($result = mysql_fetch_array($newPost)) {
                      ?>
                        <li>
                            <a href="details?id=<?php echo $result['id']; ?> & category=<?php echo $result['post_category']; ?>"><?php echo $result['post_title'];?></a>
                        </li>
                      <?php } ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
