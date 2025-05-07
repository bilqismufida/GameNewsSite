<?php

require_once(BASE_PATH . '/template/author/layout/header.php')

    ?>

<section class="vizew-post-area mt-5 mb-50">
    <div class="container">
        <div class="row">
            <div class=" col-12 col-md-7 col-lg-8">
                <!-- All Post Area -->
                <div class="all-posts-area">
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Write an Article</h4>
                        <div class="line"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <form method="post" action="<?= url('author/post/update/' . $post['id']) ?>"
                                enctype="multipart/form-data" onsubmit="return syncQuill()">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="<?= $post['title'] ?>" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="cat_id">Category</label>
                                    <select name="cat_id" id="cat_id" class="form-control" required autofocus>
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?= $category['id'] ?>" <?php if ($category['id'] == $post['cat_id'])
                                                  echo 'selected' ?>>
                                                <?= $category['name'] ?>
                                            </option>
                                        <?php } ?>


                                    </select>
                                </div>

                                <div class="img-wrap">
                                    <img src="<?= asset($post['image']) ?>" alt="picture of <?= $post['title'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" class="form-control-file" autofocus>
                                </div>
                                
                                <div class="form-group">
                                    <label for="summary">summary</label>
                                    <textarea maxlength="290" class="form-control" id="summary" name="summary" placeholder="summary ..."
                                        rows="3" required><?= $post['summary'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="body">body</label>
                                    <!-- <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5" required
                    autofocus></textarea> -->
                                    <!-- The Quill editor -->
                                    <div id="toolbar"></div>
                                    <div id="editor" style="height: 200px;"><?= $post['body'] ?></div>

                                    <!-- Hidden textarea that will be submitted -->
                                    <textarea name="body" id="body" style="display: none;"><?= $post['body'] ?></textarea>
                                </div>

                                <button type="submit" class="btn vizew-btn w-100">store</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<?php

require_once(BASE_PATH . '/template/author/layout/footer.php')

    ?>