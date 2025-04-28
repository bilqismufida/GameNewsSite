<?php
$db = new \Database\DataBase();
$categories = $db->select("SELECT * FROM categories")->fetchAll();

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= asset($setting['icon']) ?>">
    <!-- Meta Description -->
    <meta name="description" content="<?= $setting['description'] ?>">
    <!-- Meta Keyword -->
    <meta name="keywords" content="<?= $setting['keywords'] ?>">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title><?= $setting['title'] ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= asset('public/app-layout/style.css') ?>">

    <style>
        .single-post-area .post-thumbnail {
            position: relative;
            z-index: 1;
            aspect-ratio: 16 / 9;
            overflow: hidden;
        }

        .single-post-area .post-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Keep your existing media queries */
        @media only screen and (min-width: 768px) and (max-width: 991px),
        only screen and (max-width: 767px) {
            .single-post-area .post-thumbnail {
                margin-bottom: 30px;
            }
        }

        /* Existing .video-duration styling stays the same */
        .single-post-area .post-thumbnail .video-duration {
            display: inline-block;
            position: absolute;
            right: 15px;
            bottom: 15px;
            background-color: #0f1112;
            padding: 6px 10px;
            border-radius: 2px;
            font-size: 14px;
            color: #ffffff;
            line-height: 1;
            z-index: 79;
        }
    </style>
</head>

<body> 
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6"></div>
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
                            <!-- Login -->
                            <?php if (isset($_SESSION['user'])): ?>
                                <a class="btn btn-danger" href="<?= url('logout') ?>">
                                    <span class="lnr lnr-exit"></span>
                                    <span style="font-size:15px;"> Logout</span>
                                </a>
                            <?php else: ?>
                                <a class="btn btn-primary" href="<?= url('login') ?>">
                                    <span class="lnr lnr-enter-down"></span>
                                    <span style="font-size:15px;"> Login</span>
                                </a>
                            <?php endif; ?>
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
                            <img class="nav-brand" src="<?= asset($setting['icon']) ?>" alt="">
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
                            <div class="classynav">
                                <ul>
                                    <?php foreach ($menus as $menu) { ?>
                                        <li class="menu-active">
                                            <a href="<?= $menu['url'] ?>">
                                                <?= $menu['name'] ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li><a href="#">Categories</a>
                                        <ul class="dropdown">
                                            <?php foreach ($categories as $category) { ?>
                                                <li><a class="dropdown-item"
                                                        href="http://localhost/GameNewsSite/show-category/<?= $category['id'] ?>"><?= $category['name'] ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>

                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>