<?php
require_once(BASE_PATH . '/activities/Home.php');
global $categories;
$categories = $db->select('SELECT * FROM categories')->fetchAll();
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
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="<?= asset('public/app/css/linearicons.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/main.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .sticky-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(220, 53, 69, 0.9);
            /* Red with transparency */
            transition: top 0.3s ease-in-out;
            display: none;
            z-index: 999;
        }

        .bottom-navbar {
            position: relative;
            z-index: 10;
        }

        @media (max-width: 767px) {
            .bottom-navbar {
                display: none;
            }

            .navbar-expand-lg {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 998;
            }

            .sticky-navbar {
                display: block;
                /* Show sticky navbar on small screens */
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                background: rgba(220, 53, 69, 0.9);
                transition: top 0.3s ease-in-out;
                z-index: 999;
            }
        }
    </style>
</head>

<body>

    <!-- Original Top Navbar -->
    <nav class="navbar navbar-expand-lg bg-danger py-2 px-3" id="top-navbar">
        <div class="container">
            <?php include 'navbar-content.php'; ?>
        </div>
    </nav>

    <!-- Sticky Cloned Navbar -->
    <nav class="navbar navbar-expand-lg bg-danger py-2 px-3 sticky-navbar" id="sticky-navbar">
        <div class="container">
            <?php $isSticky = true;
            include 'navbar-content.php'; ?>
        </div>
    </nav>


    <!-- Bottom Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark py-3 bottom-navbar mb-3" id="bottom-navbar">
        <div class="container">
            <!-- <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link text-white" href="#">Category 1</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Category 2</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Category 3</a></li>
            </ul> -->
            <ul class="nav-menu text-light">
                <?php foreach ($categories as $cat) { ?>
                    <li class="menu-active">
                        <a href="http://localhost/GameNewsSite/show-category/<?= $cat['id'] ?>">
                            <?= $cat['name'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <!-- Sidebar for Mobile -->
    <div id="sidebar" class="sidebar">
        <div class="sidebar-content">
            <button class="close-btn" id="close-sidebar">&times;</button>

            <!-- Search Box -->
            <input type="text" class="form-control mb-3" placeholder="Search">

            <!-- Menus -->
            <ul class="list-unstyled">
                <?php foreach ($menus as $menu) { ?>
                    <li><a href="<?= $menu['url'] ?>" class="text-white"><?= $menu['name'] ?></a></li>
                <?php } ?>
            </ul>

            <br>

            <!-- Categories -->
            <ul class="list-unstyled">
                <?php foreach ($categories as $cat) { ?>
                    <li class="menu-active">
                        <a href="http://localhost/GameNewsSite/show-category/<?= $cat['id'] ?>">
                            <?= $cat['name'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>

            <!-- Login Button -->
            <a href="<?= url('login') ?>"><span class="lnr lnr-enter-down"></span><span style="font-size:15px;">
                    Login</span></a>
        </div>
    </div>

    <div id="sidebar-overlay"></div>

    <script>
        $(document).ready(function () {
            var bottomNavbar = $('#bottom-navbar');
            var stickyNavbar = $('#sticky-navbar');

            $(window).on('scroll', function () {
                var bottomNavbarOffset = bottomNavbar.offset().top + bottomNavbar.outerHeight();
                var scrollPosition = $(window).scrollTop();

                if (scrollPosition > bottomNavbarOffset) {
                    stickyNavbar.fadeIn();
                } else {
                    stickyNavbar.fadeOut();
                }
            });
        });
    </script>

    <!-- Sidebar toggle -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let menuToggle = document.getElementById("menu-toggle");
            let sidebar = document.getElementById("sidebar");
            let closeSidebar = document.getElementById("close-sidebar");
            let overlay = document.getElementById("sidebar-overlay");

            menuToggle.addEventListener("click", function () {
                sidebar.classList.add("active");
                overlay.classList.add("active");
            });

            closeSidebar.addEventListener("click", function () {
                sidebar.classList.remove("active");
                overlay.classList.remove("active");
            });

            overlay.addEventListener("click", function () {
                sidebar.classList.remove("active");
                overlay.classList.remove("active");
            });
        });
    </script>

    <!-- Sidebar Styles -->
    <style>
        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 250px;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            padding: 20px;
            transition: 0.3s ease;
            z-index: 999;
        }

        .sidebar.active {
            right: 0;
        }

        .sidebar-content {
            color: white;
        }

        .sidebar .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            float: right;
            cursor: pointer;
        }

        .sidebar ul {
            padding: 0;
            margin: 20px 0;
        }

        .sidebar ul li {
            padding: 10px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
        }

        .sidebar .btn {
            width: 100%;
        }

        /* Sidebar Background Overlay */
        #sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
            display: none;
        }

        #sidebar-overlay.active {
            display: block;
        }

        /* Hide elements on small screens */
        @media (max-width: 991px) {

            #top-navbar nav,
            #top-navbar .d-lg-flex {
                display: none !important;
            }
        }

        @media (min-width: 991px) {
            #menu-toggle {
                display: none !important;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>