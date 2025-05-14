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
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="<?=url('/')?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->


<!-- ##### Post Area Start ##### -->
<section class="vizew-post-area mt-5 mb-50">
    <div class="container">
        <div class="row">
            <!-- ##### SIDE BAR PROFILE ##### -->
            <div class="col-12 col-md-5 col-lg-4">
                <div class="sidebar-area">
                    <!-- ***** Single Widget ***** -->
                    <div class="single-widget latest-video-widget mb-50">
                        <!-- Section Heading -->
                        <div class="section-heading style-2 mb-30">
                            <h4>Profile</h4>
                            <div class="line"></div>
                        </div>
                        <div class="row-profile">
                            <p class="text-danger fw-bold">
                                Username
                            </p>
                            <p class="text-black fw-bold mb-3">
                                <?= $user['username'] ?>
                            </p>
                            <p class="text-danger fw-bold">
                                Email
                            </p>
                            <p class="text-black fw-bold">
                                <?= $user['email'] ?>
                            </p>
                        </div>
                        <!-- Newsletter Form -->
                        <div class="newsletter-form mt-1">
                            <button class="no-btn text-left w-100 mt-3 mb-5" data-bs-toggle="modal"
                                data-bs-target="#editProfileModal">
                                <u>Edit Profile</u>
                            </button>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus akun?');"
                                href="<?= url('user-delete/' . $_SESSION['user']) ?>"
                                class="btn btn-outline-danger">delete
                                account</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ##### RECENT COMMENT -->
            <div class=" col-12 col-md-7 col-lg-8">
                <!-- All Post Area -->
                <div class="all-posts-area">
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Your Recent Comment</h4>
                        <div class="line"></div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table custom-table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Post Title</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($comments)): ?>
                                            <?php foreach ($comments as $index => $comment): ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td>
                                                        <a href="<?= url('show-post/' . $comment['post_id']) ?>"
                                                            class="post-title mb-2">
                                                            <?= htmlspecialchars($comment['post_title']) ?>
                                                        </a>
                                                    </td>
                                                    <td><?= htmlspecialchars($comment['comment']) ?></td>
                                                    <td><?= htmlspecialchars($comment['status']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center">No comments found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
            <!-- ## SIDE BAR ### -->
        </div>
    </div>
</section>

<!-- ##### Post Area End ##### -->

<!-- ##### Edit Profile Modal ##### -->
<div class="modal-overlay">
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="<?= url('user/update/' . $user['id']) ?>">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title text-white" id="editProfileModalLabel">Edit Profile</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?= $user['username'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $user['email'] ?>">
                        </div>
                        <div class="form-group mb-5">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Input your new password here">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-danger mr-3"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn vizew-btn"
                                onclick="return confirm('Apakah anda yakin ingin mengubah data akun?');">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- ##### Post Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/footer.php');
?>