<style>
    .search-container {
        display: flex;
        /* Arrange items (input and button) in a row */
        align-items: center;
        /* Vertically align items in the center */
    }

    .search-input {
        padding: 8px 12px;
        /* Add some space inside the input box */
        border: 1px solid #ccc;
        /* Add a light gray border */
        border-radius: 5px 0 0 5px;
        /* Round the left corners */
        font-size: 16px;
        /* Make the text a bit bigger */
        flex-grow: 1;
        /* Make the input box take up available space */
    }

    .search-button {
        padding: 8px 15px;
        /* Add space inside the button */
        background-color: #007bff;
        /* A nice blue color */
        color: white;
        /* White text on the button */
        border: none;
        /* Remove the default button border */
        border-radius: 0 5px 5px 0;
        /* Round the right corners */
        cursor: pointer;
        /* Change the mouse cursor to a pointer on hover */
        font-size: 16px;
    }

    .search-button:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
    }
</style>

<?php if (!isset($isSticky))
    $isSticky = false; ?>
<button class="btn text-white" id="menu-toggle">
    <span class="lnr lnr-menu"></span>
</button>
<div class="d-flex">
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

    <!-- <form class="Search">
        <div class="input-group">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
            <div class="form-outline">
                <input type="search" id="form1" class="form-control" placeholder="Search.." />
            </div>
        </div>
    </form> -->

    <div class="search-container">
        <button type="submit" class="search-button">Go!</button>
        <input type="text" class="search-input" placeholder="Search...">
    </div>
</div>

<div class="collapse navbar-collapse" id="mainNavbar">
    <ul class="nav-menu">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php foreach ($categories as $cat) { ?>
                    <li><a class="dropdown-item"
                            href="http://localhost/GameNewsSite/show-category/<?= $cat['id'] ?>"><?= $cat['name'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </li>
        <?php foreach ($menus as $menu) { ?>
            <li class="menu-active">
                <a href="<?= $menu['url'] ?>">
                    <?= $menu['name'] ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
<a class="navbar-brand text-white" href="#">Brand</a>