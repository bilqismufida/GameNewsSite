<div class="col-12 col-md-5 col-lg-4">
    <div class="sidebar-area">

        <!-- ***** Single Widget ***** -->
        <div class="single-widget followers-widget mb-50">
            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span
                    class="counter">198</span><span>Fan</span></a>
            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span
                    class="counter">220</span><span>Followers</span></a>
            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i><span
                    class="counter">140</span><span>Subscribe</span></a>
        </div>

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
                            <a href="#"><i class="fa fa-comments-o"
                                    aria-hidden="true"></i><?= $topSelectedPost['comments_count'] ?></a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>


        <!-- ***** Single Widget ***** -->
        <div class="single-widget newsletter-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Newsletter</h4>
                <div class="line"></div>
            </div>
            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.
            </p>
            <!-- Newsletter Form -->
            <div class="newsletter-form">
                <form action="#" method="post">
                    <input type="email" name="nl-email" class="form-control mb-15" id="emailnl"
                        placeholder="Enter your email">
                    <button type="submit" class="btn vizew-btn w-100">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>