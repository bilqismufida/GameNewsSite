<section class="trending-posts-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h4>Trending News</h4>
                    <div class="line"></div>
                </div>
            </div>
        </div>

        <div class="row">
            
            <?php foreach ($popularPosts as $popularPost)  { ?>
                <!-- Single Blog Post -->
                <div class="col-12 col-md-4">
                    <div class="single-post-area mb-80">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="<?= asset($popularPost['image']) ?>" alt="Post Image">
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">
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
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-comments-o"
                                        aria-hidden="true"></i><?= $popularPost['comments_count'] ?></a>
                                <a href="#"><i class="fa fa-eye"
                                        aria-hidden="true"></i><?= $popularPost['view'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div>
</section>