<?php

require_once(BASE_PATH . '/template/admin/layouts/head-tag.php');


?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i>Contact</h1>
    <!-- <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="#" class="btn btn-sm btn-success disabled">create</a>
    </div> -->
</div>
<section class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of contact</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $key => $contact) { ?>
                <tr>
                    <td><a href=""><?= $key += 1 ?></a>
                    </td>
                    <td>
                        <?= $contact['name'] ?>
                    </td>
                    <td>
                        <?= $contact['email'] ?>
                    </td>
                    <td>
                        <?= $contact['message'] ?>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary text-white">
                            See Detail
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</section>




<?php

require_once(BASE_PATH . '/template/admin/layouts/footer.php');


?>