<?php
$db = new Database\DataBase();
$categories = $db->select("SELECT * FROM categories")->fetchAll();
$setting = $db->select('SELECT * FROM websetting')->fetch();
$topSelectedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE posts.selected = 2 ORDER BY created_at DESC LIMIT 0, 3')->fetchAll();
$user = null;
if (isset($_SESSION['user'])) {
    $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();
}
?>

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
     
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

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

        /* Semi-transparent background overlay */
        .overlay-background {
            height: 100%;
            width: 100%;
            position: fixed;
            z-index: 1999;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent black */
            display: none;
        }

        /* Profile Overlay */
        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 0;
            background-color: #212121;
            /* Solid color for the sidebar */
            overflow-x: hidden;
            transition: 0.4s;
            padding-top: 60px;
        }

        .overlay-content {
            position: relative;
            top: 10%;
            width: 80%;
            margin: auto;
            text-align: center;
            color: white;
        }

        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 40px;
            cursor: pointer;
            color: #ffffff;
        }

        .profile-info h3 {
            margin-top: 20px;
        }

        .profile-info a {
            display: block;
            margin: 10px 0;
        }

        .form-control {
            position: relative;
            z-index: 2;
            height: 48px;
            width: 100%;
            background-color: #393c3d;
            font-size: 12px;
            margin-bottom: 15px;
            padding: 10px 30px;
            color: #ffffff;
            -webkit-transition-duration: 500ms;
            -o-transition-duration: 500ms;
            transition-duration: 500ms;
            border: none;
            border-radius: 0;
        }

        .form-control:focus {
            box-shadow: none;
            color: #ffffff;
            background-color: #393c3d;
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
                                <a class="login-btn" href="javascript:void(0)" onclick="openProfileMenu()">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span style="font-size:15px;"> Profile</span>
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
                                    <li><a href="<?= url('most-view') ?>">Most Viewed</a></li>
                                    <li><a href="#">Categories</a>
                                        <ul class="dropdown">
                                            <?php foreach ($categories as $category) { ?>
                                                <li><a class="dropdown-item"
                                                        href="http://localhost/GameNewsSite/show-category/<?= $category['id'] ?>"><?= $category['name'] ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?= url('contact') ?> ">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Semi-transparent background overlay -->
    <div id="overlayBackground" class="overlay-background" onclick="closeProfileMenu()"></div>

    <!-- Profile Overlay -->
    <div id="profileOverlay" class="overlay">
        <div class="overlay-content">
            <!-- <span class="closebtn" onclick="closeProfileMenu()">&times;</span> -->
            <?php if (isset($_SESSION['user'])): ?>
                <div class="profile-info">
                    <i class="fa fa-user-circle" style="font-size: 60px;"></i>
                    <h3><?= htmlspecialchars($user['username']) ?></h3>
                    <h5><?= htmlspecialchars($user['email']) ?></h5>
                    <a href="<?= url('profile') ?>" class="btn btn-primary" style="margin-top: 10px;">Go to Profile</a>
                    <a href="<?= url('logout') ?>" class="btn btn-danger" style="margin-top: 10px;">Logout</a>
                </div>
            <?php else: ?>
                <div class="profile-info">
                    <h3>Welcome, Guest!</h3>
                    <a href="<?= url('login') ?>" class="btn btn-primary" style="margin-top: 10px;">Login</a>
                </div>
            <?php endif; ?>
        </div>
    </div>