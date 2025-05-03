<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

<!-- ##### Header Area Start ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/header.php');
?>
<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->
<?php
//require_once('app/layout/hero.php');
?>
<!-- ##### Hero Area End ##### -->

<!-- ##### Trending Posts Area Start ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/trending.php');
?>
<!-- ##### Trending Posts Area End ##### -->

<!-- ##### Post Area Start ##### -->
<section class="vizew-post-area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 col-lg-8">
                <!-- All Post Area -->
                <div class="all-posts-area">
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Latest NewsZZZ</h4>
                        <div class="line"></div>
                    </div>

                    <!-- Latest News -->
                    <?php foreach ($lastPosts as $lastPost) { ?>
                        <div class="single-post-area mb-30">
                            <div class="row align-items-center"> 
                                <div class="col-12 col-lg-6">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="<?= asset($lastPost['image']) ?>" alt="Post Image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        <a href="<?= url('show-category/' . $lastPost['cat_id']) ?>"
                                            class="post-cata cata-sm cata-danger">
                                            <?= $lastPost['category'] ?>
                                        </a>
                                        <a href="<?= url('show-post/' . $lastPost['id']) ?>" class="post-title mb-2">
                                            <?= $lastPost['title'] ?>
                                        </a>
                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-author"><?= $lastPost['username'] ?></a>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <a href="#" class="post-date"><?= $lastPost['created_at'] ?></a>
                                        </div>
                                        <p class="mb-2"><?= $lastPost['summary'] ?></p>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o"
                                                    aria-hidden="true"></i><?= $lastPost['comments_count'] ?></a>
                                            <a href="#"><i class="fa fa-eye"
                                                    aria-hidden="true"></i><?= $lastPost['view'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
 
            <?php
            require_once(BASE_PATH . '/template/app/layout/sidebar.php');
            ?>
        </div>
    </div>
</section>
<!-- ##### Post Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/footer.php');
?>
<!-- ##### Footer Area Start ##### -->