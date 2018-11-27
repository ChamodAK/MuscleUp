<?php $panel='edit_article'; include "admin_frame.php"; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Edit Article</h4>
            <div class="card-body">

                <?php echo form_open("admin/add_edit_article"); ?>

                <p style="color: red;">Title: </p>
                <?=$article['title']?>

                <p style="color: red;">Article details: </p>
                <?=$article['content']?>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter new title ... " value="<?php echo set_value('title'); ?>" name="title" required>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea type="text" class="form-control" placeholder="Enter new content ..." value="<?php echo set_value('content'); ?>" name="content" required></textarea>
                </div>

                <input type="hidden" name="id" value=<?=$article['id']?>>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

                <?php echo form_close(); ?>


            </div>
        </div>
    </div>

<?php include "footer.php"; ?>