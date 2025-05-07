
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="<?= asset('public/app-layout/js/jquery/jquery-2.2.4.min.js') ?>"></script>
<script src="<?= asset('public/app-layout/js/bootstrap/popper.min.js') ?>"></script>
<script src="<?= asset('public/app-layout/js/bootstrap/bootstrap.min.js') ?>"></script>
<script src="<?= asset('public/app-layout/js/plugins/plugins.js') ?>"></script>
<script src="<?= asset('public/app-layout/js/active.js') ?>"></script>

<footer class="footer-area">
    <div class="container">
        <div class="row" style="
    display: flex;
    justify-content: space-between;">
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="footer-widget mb-70">
                    <!-- Logo -->
                    <a href="<?= url('/')?>" class="foo-logo d-block mb-4"><img
                            src="<?= asset('public/setting/icon.jpeg') ?>" alt="logo"></a>
                    <!-- Footer Newsletter Area -->
                    <div class="footer-nl-area">
                        <form action="#" method="post">
                            <input type="email" name="nl-email" class="form-control" id="nlEmail"
                                placeholder="Your email">
                            <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="footer-widget mb-70 text-white">
                    <h6 class="widget-title">Our Address</h6>
                    <!-- Contact Address -->
                    <div class="contact-address">
                        <p>Jl. Bhakti Suci No.100, Cimpaeun, Kec. Tapos, Kota Depok<br>Jawa Barat 16459</p>
                        <p>Phone: (021) 879072338</p>
                        <p>Email: gamenewssite@gmail.com</p>
                    </div>
                    <!-- Footer Social Area -->
                    <div class="footer-social-area">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</footer>
<!-- ##### Footer Area End ##### -->


<!-- ##### All Javascript Script ##### -->
<!-- Bootstrap 5 JS + Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
    function toggleProfileDropdown() {
        const dropdown = document.getElementById("profileDropdown");
        dropdown.classList.toggle("show");
    }

    document.addEventListener("click", function (event) {
        const dropdown = document.getElementById("profileDropdown");
        const toggle = document.querySelector(".profile-toggle");

        if (!dropdown.contains(event.target) && !toggle.contains(event.target)) {
            dropdown.classList.remove("show");
        }
    });
</script>

<script>
    function openProfileMenu() {
        document.getElementById("profileOverlay").style.width = "30%";
        document.getElementById("overlayBackground").style.display = "block";
    }

    function closeProfileMenu() {
        document.getElementById("profileOverlay").style.width = "0";
        document.getElementById("overlayBackground").style.display = "none";
    }

    // Close the overlay when clicking outside of it
    document.addEventListener('click', function (event) {
        var overlay = document.getElementById('profileOverlay');
        var background = document.getElementById('overlayBackground');

        // Check if the click was outside the overlay content and the overlay is open
        if (overlay.style.width !== "0px" && !event.target.closest('.overlay-content') &&
            !event.target.closest('.profile-toggle') && event.target.id === 'overlayBackground') {
            closeProfileMenu();
        }
    });
</script>


</body>

</html>