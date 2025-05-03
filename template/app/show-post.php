<!-- Preloader -->
<!-- <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->

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
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#"><?= $post['category'] ?></a></li>
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
        <div class="row">
            <div class="col-12">
                <div class=" mb-50  post-thumbnail">
                    <img class="" src="<?= asset($post['image']) ?>" alt="">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-lg-8 col-xl-7">
                <div class="post-details-content">
                    <!-- Blog Content -->
                    <div class="blog-content">

                        <!-- Post Content -->
                        <div class="post-content mt-0">
                            <a class="post-cata cata-sm cata-danger"
                                href="<?= url('show-category/' . $post['cat_id']) ?>"><?= $post['category'] ?></a>
                            <a href="#" class="post-title mb-2"><?= $post['title'] ?></a>

                            <div class="d-flex justify-content-between mb-30">
                                <div class="post-meta d-flex align-items-center">
                                    <!-- <a href="#" class="post-author"><?= $post['username'] ?></a>
                                    <i class="fa fa-circle" aria-hidden="true"></i> -->
                                    <a href="#" class="post-date"><?= $post['created_at'] ?></a>
                                </div>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                        <?= $post['comments_count'] ?></a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>
                                        <?= $post['view'] ?></a>
                                </div>
                            </div>
                        </div>

                        <p>
                            <?= $post['body'] ?>
                        </p>

                        <!-- Post Author -->
                        <div class="vizew-post-author d-flex align-items-center py-5">
                            <!-- <div class="post-author-thumb">
                                <img class="single-post-area" src="img/bg-img/30.jpg" alt="">
                            </div> -->
                            <div class="post-author-desc pl-4">
                                <h4>Written By: </h4>
                                <a href="#" class="author-name"><?= $post['username'] ?></a>
                                <!-- <p>Hello! My name is Nicolas Sarkozy. I’m a web designer and front-end web developer
                                    with over fifteen years of professional.</p>
                                <div class="post-author-social-info">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                </div> -->
                            </div>
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix mb-50">

                            <!-- Section Title -->
                            <div class="section-heading style-2">
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
                                                <a href="#" class="comment-date"><?= $comment['created_at'] ?></a>
                                                <h6><?= $comment['username'] ?></h6>
                                                <p><?= $comment['comment'] ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php
                        if (!isset($_SESSION['permission']) || $_SESSION['permission'] != 'author') {
                            ?>
                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Leave a reply</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Reply Form -->
                                <?php if (isset($_SESSION['user'])) { ?>
                                    <div class="contact-form-area">
                                        <form action="<?= url('comment-store') ?>" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <textarea name="comment" class="form-control" id="comment"
                                                        placeholder="Comment Here*"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn vizew-btn mt-30" type="submit">Submit Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php } else { ?>
                                    <h5><i>Please Login Before Commenting</i></h5>
                                    <a href="<?= url('login') ?>" class="btn vizew-btn mt-30">Login</a>
                                <?php } ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
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