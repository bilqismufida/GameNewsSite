<?php
require_once(BASE_PATH . '/template/app/layout/script.php');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<footer class="footer-area">
    <div class="container">
        <div class="row" style="
    display: flex;
    justify-content: space-between;">
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="footer-widget mb-70">
                    <!-- Logo -->
                    <a href="index.php" class="foo-logo d-block mb-4"><img src="<?= asset('public/setting/icon.jpeg')?>" alt="logo"></a>
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
                <div class="footer-widget mb-70">
                    <h6 class="widget-title">Our Address</h6>
                    <!-- Contact Address -->
                    <div class="contact-address">
                        <p>101 E 129th St, East Chicago, <br>IN 46312, US</p>
                        <p>Phone: 001-1234-88888</p>
                        <p>Email: info.colorlib@gmail.com</p>
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

    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Copywrite Text -->
                <div class="col-12 col-sm-6">
                    <p class="copywrite-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template
                        is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
                <div class="col-12 col-sm-6">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="#">Advertise</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Disclaimer</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Quill for text area form -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
  theme: 'snow',
  placeholder: 'Write your article...',
  modules: {
    toolbar: true // 👈 THIS loads Quill’s default full toolbar
  }
});

</script>

<script>
  function syncQuill() {
    document.querySelector('#body').value = quill.root.innerHTML;
    return true;
  }
</script>

<!-- ##### Footer Area End ##### -->

<!-- ##### All Javascript Script ##### -->

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
document.addEventListener('click', function(event) {
    var overlay = document.getElementById('profileOverlay');
    var background = document.getElementById('overlayBackground');
    
    // Check if the click was outside the overlay content and the overlay is open
    if (overlay.style.width !== "0px" && !event.target.closest('.overlay-content') && 
        !event.target.closest('.profile-toggle') && event.target.id === 'overlayBackground') {
        closeProfileMenu();
    }
});</script>

</body>

</html>