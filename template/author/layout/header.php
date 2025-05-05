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

    <!-- Stylesheet -->

    <link rel="stylesheet" href="<?= asset('public/app-layout/style.css') ?>">
    <!-- Bootstrap CSS (already included, probably) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Quill for text area form -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2663004844.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= asset('template/author/layout/style-aut.css') ?>">

    <style>
        .vizew-breadcrumb .breadcrumb .breadcrumb-item li {
            color: #000;
            font-size: 16px;
            font-weight: 400;
        }

        .single-post-area .post-thumbnail {
            position: relative;
            z-index: 1;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            /* background-color: black; */
            /* for the black bars */
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid black;
            border-radius: 5px;
        }

        .single-post-area .post-thumbnail img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            /* ✨ key change here */
            background-color: black;
        }

        .modal-overlay .show {
            background-color: rgba(0, 0, 0, 0.46) !important;
        }
    </style>
</head>

<body>


    <header class="header-area text-decoration-none text-white bg-dark">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6"></div>
                    <div class="col-12 col-md-6">
                        <div class="top-meta-data d-flex align-items-center justify-content-end text-white ">
                            <!-- Top Social Info -->
                            <div class="top-social-info text-white">
                                <a href="#"><i class="fa-brands fa-github"></i></a>
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
                            <a class="ms-3 text-white " href="<?= url('logout') ?>"><i
                                    class="fa-solid fa-right-to-bracket"></i> Logout</a>
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
                        <a href="<?= url('author') ?>">
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
                            <!-- <div class="classynav">
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
                            </div> -->
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


    <!-- Edit Profile Modal -->
    <div class="modal-overlay">
        <div class="modal fade" id="editProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-2"
            aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form method="post" action="<?= url('user/update/' . $user['id']) ?>">
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

                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Input your new password here">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-danger me-3"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn vizew-btn"
                                    onclick="return confirm('Apakah anda yakin ingin mengubah data akun?');">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>