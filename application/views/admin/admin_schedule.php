<?php $panel='admin_schedule'; include "admin_frame.php"; ?>
<?php echo form_open("admin/set_fitness_details"); ?>

    <div class="form-group">
        <label for="id">UserID:</label>
        <input type="text" class="form-control" id="id" placeholder = "Enter uesrID"value="<?php echo set_value('id'); ?>" name="id" required>
    </div>

    <div class="form-group">
        <label>Checked Date:</label>
        <input type="date" class="form-control" id="checked_date" value="<?php echo set_value('checked_date'); ?>" name="checked_date" required>
    </div>

    <div class="form-group">
        <label for="attendence">Attendence:</label>
        <input type="text" class="form-control" id="attendence" placeholder = "Enter the attendence"value="<?php echo set_value('attendence'); ?>" name="attendence" required>
    </div>

     <div class="form-group">
        <label for="schedule">Schedule:</label>
        <input type="text" class="form-control" id="schedule"placeholder = "Enter the schedule"value="<?php echo set_value('schedule'); ?>" name="schedule" required>
    </div>

    <div class="form-group">
        <label for="weight">Weight:</label>
        <input type="text" class="form-control" id="weight" placeholder = "Enter the weight(KG)" value="<?php echo set_value('weight'); ?>" name="weight" required>
    </div>

    <div class="form-group">
        <label for="height">Height:</label>
        <input type="text" class="form-control" id="height" placeholder = "Enter the height(cm)"value="<?php echo set_value('height'); ?>" name="height" required>
    </div>

    <div class="form-group">
        <label for="remarks">Remarks:</label>
        <input type="text" class="form-control" id="remarks"placeholder = "Enter the remarks" value="<?php echo set_value('remark'); ?>" name="remark" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>

<?php include "footer.php"; ?>
