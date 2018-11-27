<?php $panel = "my_enquiries"; include 'my_profile_frame.php' ?>


    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Send a Enquiry</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <?php echo form_open("user_profile/send_enquiry"); ?>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="your email..." value="<?php echo set_value('email'); ?>" name="email" required>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter title" value="<?php echo set_value('title'); ?>" name="title" required>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea type="text" class="form-control" placeholder="your enquiry..." value="<?php echo set_value('content'); ?>" name="content" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

<?php include 'my_profile_footer.php' ?>