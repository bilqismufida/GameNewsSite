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
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area mb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-lg-8">
                <!-- Section Heading -->
                <div class="section-heading style-2">
                    <h4>Contact</h4>
                    <div class="line"></div>
                </div>

                <p>
                    Kami menghargai masukan, pertanyaan, dan saran Anda. Jika Anda memiliki berita menarik, ide cerita,
                    atau sekadar ingin terhubung dengan kami, jangan ragu untuk menghubungi.
                    <br><br>📍 Lokasi: Jl. Bhakti Suci No.100, Cimpaeun, Kec. Tapos, Kota Depok
                    Jawa Barat 16459
                    <br>📧 Email: gamenewssite@gmail.com
                    <br>📞 Telepon: (021) 879072338
                    <br><br>Untuk pertanyaan umum, silakan isi formulir di bawah ini, dan kami akan segera menghubungi
                    Anda.
                    <br>Tetap terhubung—tetap terinformasi.
                </p>
                <!-- Contact Form Area -->
                <div class="contact-form-area mt-50">
                    <h3 class="fw-bold">Hubungi Kami</h3>
                    <form action="<?= url('contact-store') ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control mb-3 " id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control mb-3 " id="email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" name="message" class="form-control mb-3 " id="message" cols="30"
                                rows="10"></textarea>
                        </div>
                        <button class="btn vizew-btn mt-30" type="submit">Send Now</button>
                    </form>
                </div>
            </div>
        </div>
</section>
<!-- ##### Contact Area End ##### -->


<!-- ##### Footer Area Start ##### -->
<?php
require_once(BASE_PATH . '/template/app/layout/footer.php');
?>
<!-- ##### Footer Area Start ##### -->