<?php $page = 'forum_add_post'; include 'header.php'; ?>

<?php
if(!$this->session->userdata('username')) {
    redirect('Home/login');
}
?>

<div class="container">

    <h1 class="my-4"> Add Your Post </h1>

<!--    <span style="color: red">--><?php //echo validation_errors(); ?><!--</span>-->
<!--    <span style="color: red">--><?php //echo $error; ?><!--</span>-->

    <?php echo form_open_multipart('Forum/add_new_post'); ?>

    <div class="form-group">
        <label> Title </label>
        <input type="text" class="form-control" placeholder="Enter title of the post" value="<?php echo set_value('title'); ?>" name="title">
    </div>

    <div class="form-group">
        <label> Post Content </label>
        <textarea class="form-control" rows="10" placeholder="Enter post content" name="content"><?php echo set_value('content'); ?></textarea>
    </div>

    <div class="form-group">
        <label> Upload an Image (Optional) </label><br>
        <input type="file" class="" name="userfile">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary"> Submit </button>
    </div>

    <?php echo form_close(); ?>

</div>

<?php include 'footer.php'; ?>
