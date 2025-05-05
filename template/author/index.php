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
                        <h4>Your Articles</h4>
                        <div class="line"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <!-- Tabs Nav -->
                            <ul class="nav nav-tabs custom-tabs" id="postCommentTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="posts-tab" data-bs-toggle="tab"
                                        data-bs-target="#posts" type="button" role="tab" aria-controls="posts"
                                        aria-selected="true">
                                        Posts
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="comments-tab" data-bs-toggle="tab"
                                        data-bs-target="#comments" type="button" role="tab" aria-controls="comments"
                                        aria-selected="false">
                                        Comments
                                    </button>
                                </li>
                            </ul>

                            <!-- Tabs Content -->
                            <div class="tab-content pt-3" id="postCommentTabContent">
                                <!-- Posts Tab -->
                                <div class="tab-pane fade show active" id="posts" role="tabpanel"
                                    aria-labelledby="posts-tab">
                                    <?php foreach ($posts as $post) { ?>
                                        <div class="single-post-area mb-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="post-thumbnail">
                                                        <img src="<?= asset($post['image']) ?>" class="img-fluid"
                                                            alt="Post Image">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="post-content mt-0">
                                                        <a href="<?= url('show-category/' . $post['cat_id']) ?>"
                                                            class="post-cata cata-sm cata-danger">
                                                            <?= $post['category'] ?>
                                                        </a>
                                                        <a href="<?= url('show-post/' . $post['id']) ?>"
                                                            class="post-title mb-2 d-block">
                                                            <?= $post['title'] ?>
                                                        </a>
                                                        <div class="post-meta d-flex align-items-center mb-2">
                                                            <a href="#" class="post-author"><?= $post['username'] ?></a>
                                                            <i class="fa fa-circle mx-2 text-muted" aria-hidden="true"></i>
                                                            <a href="#" class="post-date"><?= $post['created_at'] ?></a>
                                                        </div>
                                                        <p class="mb-2"><?= $post['summary'] ?></p>
                                                        <div class="post-meta d-flex">
                                                            <a href="#"><i class="fa fa-comments-o me-1"
                                                                    aria-hidden="true"></i><?= $post['comments_count'] ?></a>
                                                            <a href="#" class="ms-3"><i class="fa fa-eye me-1"
                                                                    aria-hidden="true"></i><?= $post['view'] ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                                <!-- Comments Tab -->
                                <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Post</th>
                                                    <th>User</th>
                                                    <th>Comment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($comments as $key => $comment) { ?>
                                                    <tr>
                                                        <td><a class="text-primary"
                                                                href="<?= url('author/comment') ?>"><?= $key + 1 ?></a></td>
                                                        <td><a class="text-dark"
                                                                href="<?= url('author/comment') ?>"><?= $comment['title'] ?></a>
                                                        </td>
                                                        <td><a class="text-dark"
                                                                href="<?= url('author/comment') ?>"><?= $comment['username'] ?></a>
                                                        </td>
                                                        <td><a class="text-dark"
                                                                href="<?= url('author/comment') ?>"><?= $comment['comment'] ?></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                
            </div>
            <?php
                require_once(BASE_PATH . "/template/author/layout/sidebar.php");
                ?>
        </div>
    </div>
</section>
<!-- ##### Post Area End ##### -->








<?php
require_once(BASE_PATH . "/template/author/layout/footer.php");
?>