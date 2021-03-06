<?php $panel='schedule'; include "admin_frame.php"; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Edit Schedule</h4>
            <div class="card-body">

                <?php echo form_open("admin/add_edit_schedule"); ?>

                <p style="color: red;">Schedule: </p>
                <?=$schedule['content']?>

                <p style="color: red;">Days per week: <?=$schedule['daysPerWeek']?></p>

                <div class="form-group">
                    <label>Content</label>
                    <input type="text" class="form-control" placeholder="Enter new content ... " value="<?php echo set_value('content'); ?>" name="content" required>
                </div>

                <div class="form-group">
                    <label>Days Per Week</label>
                    <textarea type="text" class="form-control" placeholder="Enter new days per week ..." value="<?php echo set_value('daysPerWeek'); ?>" name="daysPerWeek" required></textarea>
                </div>

                <input type="hidden" name="id" value=<?=$schedule['id']?>>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

                <?php echo form_close(); ?>


            </div>
        </div>
    </div>

<?php include "footer.php"; ?>