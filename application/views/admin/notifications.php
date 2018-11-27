<?php $panel='notifications'; include "admin_frame.php"; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Send Notification</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <a href="<?=base_url('index.php/admin/noti_one')?>" class="btn btn-primary"> Send to One </a>
                <a href="<?=base_url('index.php/admin/noti_all')?>" class="btn btn-primary"> Send to All </a>

            </div>
        </div>
    </div>

<?php include "footer.php"; ?>