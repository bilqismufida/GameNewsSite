<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <title><?= $setting['title'] ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('public/app/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/main.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<header>
    <!-- Top Navbar -->
    <div class="bg-danger py-2 px-3 d-flex justify-content-between align-items-center" id="top-navbar">
        <!-- Brand -->
        <div class="navbar-brand text-white font-weight-bold">ONLINE NEWS</div>

        <!-- Menus (Hidden on Small Screens) -->
        <nav class="d-none d-lg-block">
            <ul class="nav-menu d-flex list-unstyled mb-0">
                <?php foreach ($menus as $menu) { ?>
                    <li class="mx-3">
                        <a href="<?= $menu['url'] ?>" class="text-white"><?= $menu['name'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>

        <!-- Search & Login (Hidden on Small Screens) -->
        <div class="d-none d-lg-flex align-items-center">
            <input type="text" class="form-control me-3" placeholder="Search">
            <a href="<?= url('login') ?>" class="text-white btn btn-outline-light">Login</a>
        </div>

        <!-- Burger Menu (Visible on Small Screens) -->
        <button class="btn text-white d-lg-none" id="menu-toggle">
            <span class="lnr lnr-menu"></span>
        </button>
    </div>

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

            <!-- Login Button -->
            <a href="<?= url('login') ?>" class="btn btn-outline-light">Login</a>
        </div>
    </div>

    <div id="sidebar-overlay"></div> <!-- Dark Transparent Background -->
</header>

<!-- JavaScript -->
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

<!-- Styles -->
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
</style>
</body>
</html>
