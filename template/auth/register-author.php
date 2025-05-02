<!-- ##### Header Area Start ##### -->

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="<?= asset('public/setting/icon.jpeg') ?>" />
    <!-- Meta Description -->
    <meta name="description" content="Game News Website">
    <!-- Meta Keyword -->
    <meta name="keywords" content="Game News Website">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Game News Website</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= asset('public/app-layout/style.css') ?>">
</head>

<body>
    <!-- Top Header Area -->
    <header class="header-area">
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="top-meta-data d-flex align-items-center justify-content-end">
                            <!-- Top Social Info -->
                            <div class="top-social-info">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="index.php" method="post">
                                    <input type="search" name="top-search" id="topSearch" placeholder="Search...">
                                    <button type="submit" class="btn"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                            <!-- <a href="login.php" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="vizew-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">

                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="vizewNav">

                        <!-- Nav brand -->
                        <!-- <a href="index.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a> -->
                        <a href="http://localhost/GameNewsSite/home">
                            <img class="nav-brand" src="<?= asset('public/setting/icon.jpeg') ?>" alt="Icon Brand">
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->

                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/GameNewsSite/"><i class="fa fa-home"
                                        aria-hidden="true"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Register Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Come be one of them author!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="<?= url('register/store') ?>" method="post">
                            <?php
                            $message = flash('register_error');
                            if (!empty($message)) {
                                ?>
                                <div class="mb-2 alert alert-danger"> <small
                                        class="form-text text-danger"><?= $message ?></small>
                                </div>
                                <?php
                            } ?>
                            <div class="form-group" data-validate="Valid email is required: ex@abc.xyz">
                                <input class="form-control" type="text" name="username" placeholder="Username">

                            </div>

                            <div class="form-group" data-validate="Valid email is required: ex@abc.xyz">
                                <input class="form-control" type="email" name="email" placeholder="Email">

                            </div>

                            <div class="form-group" data-validate="Password is required">
                                <input class="form-control" type="password" name="password" placeholder="Password">

                            </div>

                            <div class="form-group">
                                <div class="vizew-control">
                                    <a class="txt2" href="<?= url('login') ?>">
                                        <p>
                                            <i>Login your Account</i>
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <button type="submit" class="btn vizew-btn w-100 mt-30">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Register Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
    require_once(BASE_PATH . '/template/app/layout/footer.php');
    ?>