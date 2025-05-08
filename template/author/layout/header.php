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
    <link rel="icon" type="image/png" href="<?= asset($setting['icon']) ?>" />
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    

    
    <!-- Quill for text area form -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2663004844.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= asset('template/author/layout/style-aut.css') ?>">

</head>

<body>

    <header class="header-area text-decoration-none text-white bg-dark">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
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
                            <form action="<?= url('author-search') ?>" method="GET">
                                    <input type="text" name="q" placeholder="Cari berita..." required>
                                    <button type="submit"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                                </form>
                            </div>
                            <!-- Login -->
                            <a class="ms-3 text-danger " href="<?= url('logout') ?>"><i
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
                            <img class="nav-brand" src="<?= asset('public/setting/icon.png') ?>" alt="">
                        </a>

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

    <!-- Edit Profile Modal -->
    <div class="modal-overlay">
        <div class="modal fade" id="editProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-2"
            aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title text-white" id="editProfileModalLabel">Edit Profile</h5>
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
                                <button type="button" class="btn btn-outline-danger mr-3"
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