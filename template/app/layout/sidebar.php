

<div class="col-12 col-md-5 col-lg-4">
    <div class="sidebar-area">
        <!-- ***** Single Widget ***** -->
        <div class="single-widget latest-video-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Editor's Choice</h4>
                <div class="line"></div>
            </div>

            <?php foreach ($topSelectedPosts as $topSelectedPost) { ?>
                <!-- Single Blog Post -->
                <div class="single-post-area mb-30">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                        <img src="<?= asset($topSelectedPost['image']) ?>" alt="Post Image">
                    </div>

                    <!-- Post Content -->
                    <div class="post-content">
                        <a href="<?= url('show-category/' . $topSelectedPost['cat_id']) ?>"
                            class="post-cata cata-sm cata-danger">
                            <?= $topSelectedPost['category'] ?>
                        </a>
                        <a href="<?= url('show-post/' . $topSelectedPost['id']) ?>" class="post-title mb-2">
                            <?= $topSelectedPost['title'] ?>
                        </a>
                        <div class="post-meta d-flex align-items-center mb-2">
                            <a href="#" class="post-author"><?= $topSelectedPost['username'] ?></a>
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <a href="#" class="post-date"><?= $topSelectedPost['created_at'] ?></a>
                        </div>
                        <div class="post-meta d-flex">
                            <a href="#">
                                <i class="fa fa-comments-o" aria-hidden="true"></i>
                                <?= $topSelectedPost['comments_count'] ?>
                            </a>
                            <a href="#">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <?= $topSelectedPost['view'] ?>
                            </a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div> 
    </div>
</div>