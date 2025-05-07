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

<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

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
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Great to have you back!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="<?= url('check-login') ?>" method="post">
                            <?php
                            $message = flash('login_error');
                            if (!empty($message)) {
                                ?>
                                <div class="mb-2 alert alert-danger"> <small
                                        class="form-text text-danger"><?= $message ?></small>
                                </div>
                                <?php
                            } ?>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="vizew-control">
                                    <a class="txt2" href="<?= url('register') ?>">
                                        <p><i>

                                                Create your Account
                                            </i>
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </p>
                                    </a>
                                    <a class="txt2" href="<?= url('register-aut') ?>">
                                        <p>
                                            <i>or Become an Author!</i>
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <button type="submit" class="btn vizew-btn w-100 mt-30">Login</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
    require_once(BASE_PATH . '/template/app/layout/footer.php');
    ?>