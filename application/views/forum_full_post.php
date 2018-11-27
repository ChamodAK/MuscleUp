<?php $page = 'forum_full_post'; include 'header.php';?>

<div class="container">

    <h3 class="my-4"> <?php echo $post['title']; ?> </h3>
    <h6 style="color: red;"> Posted by </h6><a href="<?php echo base_url('index.php/Home/my_profile'); ?>"><?php echo $post['username']; ?></a>
    <br>
    <small><?php echo $post['timestamp']; ?></small>
    <br><br>
    <div>
        <p> <?php echo $post['details']; ?> </p>
    </div>
    <?php if(!($post['image'] == "")) {?>
    <div class="text-center">
        <img class="img-fluid mb-3 mb-md-0" src="<?php echo $post['image'] ?>" alt="Image not found">
    </div>
    <?php }?>
    <hr>
    <?php
    if($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
    }
    ?>
    <br>
    <h4>Replies</h4>
    <?php if (!empty($replies)) { foreach ($replies as $reply) {?>
    <div class="row">
        <div class="col-md-12">
            <div class="list-group">
                <div class="list-group-item">
                    <div class="row-content">
                        <p><?php echo $reply->details?></p>
                        <div class="list-group-item-heading">
                            <a href="<?php echo base_url('index.php/Home/my_profile')?>">
                                <small><?php echo $reply->username?></small>
                            </a>
                        </div>
                        <small>
                            <i class="glyphicon glyphicon-time"></i> <?php echo $reply->timestamp?><span class="twitter"> <i class="fa fa-twitter"></i></span>
                            <br>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <?php } }
        else {
            echo 'No replies under this post.';
        }?>
        <hr>
        <br><br>
        <?php echo form_open('Forum/add_new_reply/'.$post['id']); ?>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $post['id']?>">
            <label style="font-size: large"> Type a Reply </label>
            <textarea class="form-control" rows="5" placeholder="Type your reply here..." name="content"><?php echo set_value('content'); ?></textarea>
        </div>

        <div class="text-left">
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>




<?php include 'footer.php'; ?>
