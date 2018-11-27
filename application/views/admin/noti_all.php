<?php $panel='notifications'; include "admin_frame.php"; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Send Notification</h4>
            <div class="card-body">

                <?php echo form_open("admin/noti_all_send"); ?>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter title..." value="<?php echo set_value('title'); ?>" name="title" required>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea type="text" class="form-control" placeholder="Enter content..." value="<?php echo set_value('content'); ?>" name="content" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>

<?php include "footer.php"; ?>