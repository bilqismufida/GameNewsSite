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
}else{
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
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
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
<section class="trending-posts-area section-padding-80 mt-30 mb-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 ">
                <!-- All Post Area -->
                <div class="all-posts-area style-2">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Edit Profile</h4>
                        <div class="line"></div>
                    </div>

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
                        <button type="submit" class="btn btn-danger btn-md col-12" onclick="return confirm('Apakah anda yakin ingin mengubah data akun?');">update</button>
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