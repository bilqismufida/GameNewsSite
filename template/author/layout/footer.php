<?php
require_once(BASE_PATH . '/template/app/layout/script.php');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="<?= asset('public/admin-panel/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('public/admin-panel/js/mdb.min.js') ?>"></script>
<script src="<?= asset('public/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= asset('public/jalalidatepicker/persian-date.min.js') ?>"></script>
<script src="<?= asset('public/jalalidatepicker/persian-datepicker.min.js') ?>"></script>

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
                            src="<?= asset('public/setting/icon.png') ?>" alt="logo"></a>
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
                </div>
            </div>
        </div>
    </div> 
</footer>

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>

<!-- Quill for text area form -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Write your article...',
        modules: {
            toolbar: true
        }
    });

</script>

<script>
    const form = document.querySelector('quill-form'); // or use a specific ID
    form.addEventListener('submit', function (e) {
        const quillContent = quill.getText().trim();
        const quillHtml = quill.root.innerHTML.trim();

        if (quillContent.length === 0) {
            e.preventDefault(); // stop form
            alert("Please fill in the body content.");
            return;
        }

        document.querySelector('#body').value = quillHtml;
    });
</script>


<script>
    function validateQuill() {
        const quillContent = quill.getText().trim();
        const quillHtml = quill.root.innerHTML.trim();

        if (quillContent.length === 0) {
            alert("Please fill in the body content.");
            return false; // prevent submission
        }

        // sync HTML to hidden textarea
        document.querySelector('#body').value = quillHtml;
        return true; // allow submission
    }
</script>



<!-- ##### Footer Area End ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- ## PROFILE MODAL ## -->
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