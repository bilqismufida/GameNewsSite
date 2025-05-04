<?php

require_once(BASE_PATH . '/template/author/layout/header.php')

    ?>
<div class="vizew-post-area mt-5 mb-50">
    <div class="container">
        <div class="row">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h5"><i class="fas fa-newspaper"></i> Articles</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a role="button" href="<?= url('author/post/create') ?>" class="btn btn-sm btn-success">create</a>
                </div>
            </div>

        </div>
    </div>
</div>
<section class="vizew-post-area mt-5 mb-50">
    <div class="container">
        <div class="row">
            <div class=" col-12 col-md-7 col-lg-8">
                <!-- All Post Area -->
                <div class="all-posts-area">
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Create </h4>
                        <div class="line"></div>
                    </div>
                </div>


            </div>
            <?php
            require_once(BASE_PATH . "/template/author/layout/sidebar.php");
            ?>
        </div>
    </div>
</section>
<?php

require_once(BASE_PATH . '/template/author/layout/footer.php')

    ?>