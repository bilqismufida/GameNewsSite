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
require_once(BASE_PATH . '/template/app/layout/header.php');
?>
<!-- ##### Header Area End ##### -->

<!-- ##### Post Area Start ##### -->
<section class="trending-posts-area section-padding-80 mt-30 mb-30">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <!-- All Post Area -->
                <div class="all-posts-area">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Edit Profile</h4>
                        <div class="line"></div>
                    </div>

                    <!-- <div class="single-widget single-post-area">
                        <ul>
                            <li class="mb-5">
                                <h4>Username:</h4>
                                <h2><?= htmlspecialchars($user['username']) ?></h2>
                            </li>
                            <li class="mb-5">
                                <h4>Email:</h4>
                                <h2><?= htmlspecialchars($user['email']) ?></h2>
                            </li>
                        </ul>
                        <a class="btn vizew-btn mt-10" href="<?= url('logout') ?>">
                            <span style="font-size:15px;"> logout</span>
                        </a>
                    </div> -->

                    <form method="post" action="<?= url('user/update/' . $user['id']) ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?= $user['username'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $user['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Input your new password here">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ##### Post Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/footer.php');
?>