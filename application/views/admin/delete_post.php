<?php $panel='delete_post'; include "admin_frame.php"; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Delete Post</h4>
            <div class="card-body">

                <h6 style="color: #004594"> Are you sure you want delete the post with post ID: <?=$id?> ?</h6>

                <div>
                    <div style="display: inline">
                        <a href="<?=base_url('index.php/admin/delete_post_confirm/')."$id"?>" class="btn btn-primary"> Yes </a>
                        <a href="<?=base_url('index.php/admin/admin_forum')?>" class="btn btn-danger"> No </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include "footer.php"; ?>