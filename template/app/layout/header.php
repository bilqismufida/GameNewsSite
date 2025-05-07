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
    <!-- <link rel="icon" type="image/png" href="icon.png" /> -->
    <link rel="shortcut icon" type="x-icon" href="<?= asset($setting['icon']) ?>">

    <meta name="description" content="Game News Website">
    <!-- Meta Keyword -->
    <meta name="keywords" content="Game News Website">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Game News Website</title>


    <!-- Stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset('public/app-layout/style.css') ?>">
    <style>
        .modal-overlay .show {
            background-color: rgba(0, 0, 0, 0.46) !important;
        }

        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }

        .btn-close:disabled {
            pointer-events: none;
        }
    </style>
</head>

<body>

    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="top-meta-data d-flex align-items-center justify-content-end">
                            <!-- Top Social Info -->
                            <div class="top-social-info">
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="<?= url('search') ?>" method="GET">
                                    <input type="text" name="q" placeholder="Cari berita..." required>
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>

                            </div>
                            <!-- Login -->
                            <?php if (isset($_SESSION['user'])): ?>
                                <div class="profile-wrapper">
                                    <div class="profile-toggle">
                                        <i class="fa fa-user-circle"></i> <!-- Bisa tambahin nama user juga -->
                                    </div>
                                    <div class="profile-dropdown">
                                        <a href="<?= url('profile') ?>" class="dropdown-item">Profile</a>
                                        <a href="<?= url('logout') ?>" class="dropdown-item">Logout</a>
                                    </div>
                                </div>


                            <?php else: ?>
                                <a class="login-btn" href="<?= url('login') ?>">
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
                                    <li><a href="<?= url('about-us') ?> ">About Us</a></li>
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