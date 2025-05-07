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

<!-- ##### Breadcrumb Area Start ##### -->
<div class="vizew-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=url('/')?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Most Viewed News</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Grid Posts Area Start ##### -->
<div class="vizew-grid-posts-area mb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7  col-lg-8">
                <!-- Archive Catagory & View Options -->
                <div class="section-heading style-2">
                        <h4>Most Viewed News</h4>
                        <div class="line"></div>
                    </div>
                <div class="row">
                    <?php foreach ($popularPosts as $popularPost) { ?>
                        <div class="single-post-area mb-30">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="<?= asset($popularPost['image']) ?>" alt="Post Image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        <a href="<?= url('show-category/' . $popularPost['cat_id']) ?>"
                                            class="post-cata cata-sm cata-danger">
                                            <?= $popularPost['category'] ?>
                                        </a>
                                        <a href="<?= url('show-post/' . $popularPost['id']) ?>" class="post-title mb-2">
                                            <?= $popularPost['title'] ?>
                                        </a>
                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-author"><?= $popularPost['username'] ?></a>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <a href="#" class="post-date"><?= $popularPost['created_at'] ?></a>
                                        </div>
                                        <p class="mb-2"><?= $popularPost['summary'] ?></p>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o"
                                                    aria-hidden="true"></i><?= $popularPost['comments_count'] ?></a>
                                            <a href="#"><i class="fa fa-eye"
                                                    aria-hidden="true"></i><?= $popularPost['view'] ?></a>
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
</div>

<!-- ##### Archive Grid Posts Area End ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/footer.php');
?>
<!-- ##### Footer Area Start ##### -->