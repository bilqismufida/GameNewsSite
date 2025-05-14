</main>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="<?= asset('public/admin-panel/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('public/admin-panel/js/mdb.min.js') ?>"></script>
<script src="<?= asset('public/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= asset('public/jalalidatepicker/persian-date.min.js') ?>"></script>
<script src="<?= asset('public/jalalidatepicker/persian-datepicker.min.js') ?>"></script>


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

</body>

</html>