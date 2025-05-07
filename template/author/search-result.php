<?php
require_once(BASE_PATH . "/template/author/layout/header.php");
?>

<!-- ##### Post Area Start ##### -->
<section class="vizew-post-area mt-5 mb-50">
    <div class="container">
        <div class="row">
            <div class=" col-12 col-md-7 col-lg-8">
                <!-- All Post Area -->
                <div class="all-posts-area">
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Hasil pencarian untuk: <?= htmlspecialchars($_GET['q']) ?></h4>
                        <div class="line"></div>
                    </div>

                    <div class="row mt-2">
                        <!-- Tabs Nav -->
                        <div class="col-12">
                        <?php if (!empty($results)): ?>
                            <?php foreach ($results as $post): ?>
                                <div class="single-post-area mb-30">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-6">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="<?= asset($post['image']) ?>" alt="Post Image">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <!-- Post Content -->
                                            <div class="post-content mt-0">
                                                <a href="<?= url('show-category/' . $post['cat_id']) ?>"
                                                    class="post-cata cata-sm cata-danger">
                                                    <?= $post['category'] ?>
                                                </a>
                                                <a href="<?= url('show-post/' . $post['id']) ?>" class="post-title mb-2">
                                                    <?= $post['title'] ?>
                                                </a>
                                                <div class="post-meta d-flex align-items-center mb-2">
                                                    <a href="#" class="post-author"><?= $post['username'] ?></a>
                                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                                    <a href="#" class="post-date"><?= $post['created_at'] ?></a>
                                                </div>
                                                <p class="mb-2"><?= $post['summary'] ?></p>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-comments-o"
                                                            aria-hidden="true"></i><?= $post['comments_count'] ?></a>
                                                    <a href="#"><i class="fa fa-eye"
                                                            aria-hidden="true"></i><?= $post['view'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada hasil ditemukan.</p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>


        <?php
        require_once(BASE_PATH . "/template/author/layout/sidebar.php");
        ?>
        </div>
    </div>
    </div>
</section>
<!-- ##### Post Area End ##### -->








<?php
require_once(BASE_PATH . "/template/author/layout/footer.php");
?>