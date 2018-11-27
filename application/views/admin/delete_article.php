<?php $panel='schedule'; include "admin_frame.php"; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Delete Article</h4>
            <div class="card-body">

                <h6 style="color: #004594"> Are you sure you want delete the schedule with Article ID: <?=$id?> ?</h6>

                <div>
                    <div style="display: inline">
                        <a href="<?=base_url('index.php/admin/delete_article_confirm/')."$id"?>" class="btn btn-primary"> Yes </a>
                        <a href="<?=base_url('index.php/admin/admin_articles')?>" class="btn btn-danger"> No </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include "footer.php"; ?>