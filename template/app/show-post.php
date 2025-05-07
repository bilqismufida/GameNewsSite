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

if (!isset($_SESSION['permission']) || $_SESSION['permission'] != 'author') {
    require_once(BASE_PATH . '/template/app/layout/header.php');
} else {
    require_once(BASE_PATH . '/template/author/layout/header.php');
}
?>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="vizew-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= url('/') ?>"><i class="fa fa-home"
                                    aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="<?= url('show-category/' . $post['cat_id']) ?>"><?= $post['category'] ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $post['title'] ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Post Details Area Start ##### -->
<section class="post-details-area single-post-area mb-80">
    <div class="container">

        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-lg-8 col-xl-7">
                <div class="post-details-content">
                    <!-- Blog Content -->
                    <div class="blog-content">

                        <!-- Post Content -->
                        <div class="post-content mt-0">
                            <a href="#" class="post-title mb-2">
                                <h1 class="fw-bold">
                                    <?= $post['title'] ?>
                                </h1>
                            </a>
                            <div class="d-flex justify-content-between mb-30">
                                <div class="post-meta d-flex align-items-center">
                                    <a href="#" class="text-danger fw-bold post-author"><?= $post['username'] ?></a>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <a href="#" class="post-date"><?= $post['created_at'] ?></a>
                                </div>
                                <div class="post-meta d-flex">
                                    <a href="#comment-area"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                        <?= $post['comments_count'] ?></a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                                        <?= $post['view'] ?></a>
                                </div>
                            </div>

                            <div class="post-thumbnail mb-5">
                                <img src="<?= asset($post['image']) ?>" alt="">
                            </div>
                        </div>
                        <div class="mb-5">
                            <p>
                                <?= $post['body'] ?>
                            </p>
                        </div>

                        <!-- Post Author -->
                        <div class="vizew-post-author d-inline align-items-center py-5 mt-50">
                            <!-- <div class="post-author-thumb">
                                <img class="single-post-area" src="img/bg-img/30.jpg" alt="">
                            </div> -->
                            <div class="post-author-desc d-flex gap-3">
                                <p>Written By: </p>
                                <a href="#" class="author-name"><?= $post['username'] ?></a>
                            </div>
                            <div class="mt-3">
                                <a class="post-cata cata-sm text-white cata-danger"
                                    href="<?= url('show-category/' . $post['cat_id']) ?>"><?= $post['category'] ?></a>
                            </div>
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix mt-50 mb-50" id="comment-area">

                            <!-- Section Title -->
                            <div class="section-heading style-2 mb-1">
                                <h4>Comment</h4>
                                <div class="line"></div>
                            </div>

                            <ul>
                                <?php foreach ($comments as $comment) { ?>
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <h6><?= $comment['username'] ?></h6>
                                                <a href="#" class="comment-date"><?= $comment['created_at'] ?></a>
                                                <p><?= $comment['comment'] ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>

                            <?php
                            if (!isset($_SESSION['permission']) || $_SESSION['permission'] != 'author') { ?>

                                <div class="contact-form-area">
                                    <form action="<?= url('comment-store') ?>" method="post">
                                        <?php
                                        $message = flash('after-comment');
                                        if (!empty($message)) {
                                            ?>
                                            <div class="mb-2 alert alert-primary"> <small
                                                    class="form-text text-primary"><?= $message ?></small>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="form-group mt-30">
                                            <input type="text" value="<?= $id ?>" name="post_id" class="d-none">
                                            <textarea class="form-control mb-10 text-left" rows="5" name="comment"
                                                placeholder="text" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'text'" required=""></textarea>
                                        </div>
                                        <?php if (isset($_SESSION['user'])) { ?>
                                            <button type="submit" class="btn vizew-btn text-uppercase">Send</button>
                                        <?php } else { ?>
                                            <p class="btn btn-outline-danger">Please <a href="<?= url('login') ?>"
                                                    class="font-italic font-underline">Login</a> Before Commenting</p>

                                        <?php } ?>
                                    </form>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- ##### Show category Area Start ##### -->
                <div class="archive-catagory-view ">
                    <!-- Catagory -->
                    <div class="section-heading style-2 mb-3">
                        <h4>Postingan Selaras</h4>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($categoryPosts as $categoryPost) { ?>
                        <div class="single-post-area mb-30">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="<?= asset($categoryPost['image']) ?>" alt="Post Image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        <a href="<?= url('show-category/' . $categoryPost['cat_id']) ?>"
                                            class="post-cata cata-sm cata-danger">
                                            <?= $categoryPost['category'] ?>
                                        </a>
                                        <a href="<?= url('show-post/' . $categoryPost['id']) ?>" class="post-title mb-2">
                                            <?= $categoryPost['title'] ?>
                                        </a>
                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-author"><?= $categoryPost['username'] ?></a>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <a href="#" class="post-date"><?= $categoryPost['created_at'] ?></a>
                                        </div>
                                        <p class="mb-2"><?= $categoryPost['summary'] ?></p>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o"
                                                    aria-hidden="true"></i><?= $categoryPost['comments_count'] ?></a>
                                            <a href="#"><i class="fa fa-eye"
                                                    aria-hidden="true"></i><?= $categoryPost['view'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- ##### Show category Area End ##### -->

            </div>
            <?php
            require_once(BASE_PATH . '/template/app/layout/sidebar.php');
            ?>
        </div>
    </div>
</section>

<?php
require_once(BASE_PATH . '/template/app/layout/footer.php');
?>
<!-- ##### Post Details Area End ##### -->

<!-- ##### Footer Area Start ##### -->

<!-- ##### Footer Area End ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
</body>

</html>