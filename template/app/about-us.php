<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/header.php');
?>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="vizew-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= url('/') ?>"><i class="fa fa-home"
                                    aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### about-us Area Start ##### -->
<section class="about-us-area mb-80">
    <div class="container">
        <div class="row w-100 d-flex justify-content-center">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="about-us-section section-heading style-2 text-center ">
                    <h4>About Us</h4>
                    <h1 class="fw-bold text-danger">GameNewsSite</h1>
                    <div class="container mx-30 gap-5 d-flex mb-5">
                        <p class="text-justify">Selamat datang di Game News Site, portal berita game yang menghadirkan
                            informasi terkini
                            dan terpercaya bagi para gamer di seluruh dunia.
                            Kami berkomitmen untuk menyajikan berita terbaru, ulasan mendalam, pembaruan patch,
                            serta perkembangan kompetisi e-sport yang sedang berlangsung.
                        </p>
                        <p class="text-justify">
                            Dengan visi untuk menjadi sumber utama dalam memberikan wawasan tentang industri game,
                            Game News Site hadir untuk menghubungkan komunitas gamer dengan berbagai informasi yang
                            relevan dan akurat.
                            Kami percaya bahwa dunia game bukan hanya sekadar hiburan, tetapi juga ruang berkembangnya
                            kreativitas, strategi,
                            dan kompetisi.
                        </p>
                    </div>
                    <p class="text-center fw-bold">
                        Terus ikuti Game News Site dan jadilah bagian dari komunitas yang selalu terdepan dalam berita
                        game!
                    </p>
                    <div class="w-100 d-flex justify-content-center gap-5">
                        <a href="<?= url('/') ?>" class="btn vizew-btn">Home Page</a>
                        <a href="<?= url('login') ?>" class="btn btn-cancel">Login</a>
                    </div>
                </div>

                <div class=" about-us-section container ">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="p-4 border rounded square-box d-flex flex-column justify-content-between">
                                <h1 class="fw-bold">Kategori Kami</h1>
                                <p>This is the only text & heading box.</p>
                            </div>
                        </div>
                        <?php foreach ($categories as $category): ?>
                            <a href="<?= url('show-category/'.$category['id'])?>" class="col-md-4">
                                <div class="category-box rounded shadow-sm">
                                    <h1><?= htmlspecialchars($category['name']) ?></h1>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### about-us Area End ##### -->


<!-- ##### Footer Area Start ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/footer.php');
?>
<!-- ##### Footer Area Start ##### -->