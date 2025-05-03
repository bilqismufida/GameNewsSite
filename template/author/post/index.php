<?php

require_once(BASE_PATH . '/template/author/layout/header.php')

    ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i> Articles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= url('author/post/create') ?>" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of posts</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>summary</th>
                <th>view</th>
                <th>category</th>
                <th>comments</th>
                <th>image</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody> 

            <?php foreach ($posts as $key => $post) { ?>

                <tr>
                    <td>
                        <?= $key += 1 ?>
                    </td>
                    <td>
                        <?= $post['title'] ?>
                    <td class="truncate-cell">
                        <?= $post['summary'] ?>
                    </td>
                    <td>
                        <?= $post['view'] ?>
                    </td>
                    <td>
                        <?= $post['category'] ?>
                    </td>
                    <td>
                        <?= $post['comments_count'] ?>
                    </td>
                    <td>
                        <img style="width: 80px;" src="<?= asset($post['image']) ?>" alt="">
                    </td>
                    <td>
                        <hr class="my-1" />
                        <a role="button" class="btn btn-sm btn-primary text-white"
                            href="<?= url('author/post/edit/' . $post['id']) ?>">edit</a>
                        <a role="button" class="btn btn-sm btn-danger text-white"
                            href="<?= url('author/post/delete/' . $post['id']) ?>">delete</a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>

    </table>
</div>



<?php

require_once(BASE_PATH . '/template/author/layout/footer.php')

    ?>