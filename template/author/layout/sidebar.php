<div class="col-12 col-md-5 col-lg-4">
    <div class="sidebar-area">

        <!-- ***** Single Widget ***** -->
        <div class="single-widget latest-video-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Article Data</h4>
                <div class="line"></div>
            </div>
            <div class="col-12"> <!-- full width -->
                <div class="d-flex gap-5 justify-content-between">
                    <!-- Article Card -->
                    <div class="card ">
                        <div class="card-header">
                            <i class="fas fa-newspaper me-1"></i> Article
                        </div>
                        <div class="card-body">
                            <?= $postCount['COUNT(*)']; ?>
                        </div>
                    </div>

                    <!-- Views Card -->
                    <div class="card ">
                        <div class="card-header">
                            <i class="fas fa-eye me-1"></i> Views
                        </div>
                        <div class="card-body">
                            <?= $postsViews['SUM(view)']; ?>
                        </div>
                    </div>

                </div>
                <div class=" mt-3">
                    <a href="<?=url('author/post/create')?>" class="text-center vizew-btn w-100">
                    <i class="fa-solid fa-pen-fancy me-1"></i>Write an Article
                    </a>
                </div>
            </div>
        </div>

        <!-- ***** Single Widget ***** -->
        <div class="single-widget latest-video-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Profile</h4>
                <div class="line"></div>
            </div>
            <p class="text-black fw-bold">
                <?= $user['username'] ?>
            </p>
            <p class="text-black fw-bold">
                <?= $user['email'] ?>
            </p>
            <!-- Newsletter Form -->
            <div class="newsletter-form">
                <button class="no-btn text-left w-100" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>


