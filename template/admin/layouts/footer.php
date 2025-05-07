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


</body>

</html>