<?php $panel='schedule'; include "admin_frame.php"; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Add New Schedule</h4>
            <div class="card-body">

                <?php echo form_open("admin/add_new_schedule"); ?>

                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" placeholder="Enter id..." value="<?php echo set_value('id'); ?>" name="id" required>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <input type="text" class="form-control" placeholder="Enter schedule content..." value="<?php echo set_value('content'); ?>" name="content" required>
                </div>

                <div class="form-group">
                    <label>Days Per Week</label>
                    <textarea type="text" class="form-control" placeholder="Enter days per week..." value="<?php echo set_value('days'); ?>" name="days" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>

<?php include "footer.php"; ?>