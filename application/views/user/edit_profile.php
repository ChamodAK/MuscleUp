<?php $panel='my_profile'; include 'my_profile_frame.php'; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Edit My Profile</h4>
            <div class="card-body">

                <?php echo form_open("User_Profile/add_edit_profile"); ?>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter new name ... " value="<?php echo set_value('name'); ?>" name="name" required>
                </div>

                <div class="form-group">
                    <label>Birth Day</label>
                    <textarea type="text" class="form-control" placeholder="Enter new birthday ..." value="<?php echo set_value('dob'); ?>" name="dob" required></textarea>
                </div>

                <div class="form-group">
                    <label>NIC</label>
                    <textarea type="text" class="form-control" placeholder="Enter new nic ..." value="<?php echo set_value('nic'); ?>" name="nic" required></textarea>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea type="text" class="form-control" placeholder="Enter new address ..." value="<?php echo set_value('address'); ?>" name="address" required></textarea>
                </div>

                <div class="form-group">
                    <label>Contact No</label>
                    <textarea type="text" class="form-control" placeholder="Enter new contact no ..." value="<?php echo set_value('contactNo'); ?>" name="contactNo" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

                <?php echo form_close(); ?>


            </div>
        </div>
    </div>

<?php include "footer.php"; ?>