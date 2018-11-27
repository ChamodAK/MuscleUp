<?php $page = 'forum'; include 'header.php';?>

    <header class="masthead" style="background-image: url('<?= base_url('asset/images/forum.jpg')?>');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-left">
                    <h1 class="m-0 display-4" style="color: gold">Welcome to the MuscleUp Community</h1>
                </div>
                <div class="container">
                    <h2 style="color:gold;">Here's your chance to connect with our friendly community</h2>
                    <h5 style="color:gold;">Share your experiences, issues and get in touch with people like you.</h5>
                </div>
            </div>
        </div>
    </header>

    <?php
    if($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
    }
    ?>

    <br><br>
    <h2 style="color: #4F5155">Latest Forum Posts</h2>
    <br>
    <div class="text-center">
        <a href="<?php echo base_url('index.php/Forum/add_post')?>" class="btn btn-danger"><i class="fas fa-plus-circle"></i> ADD NEW POST </a>
    </div>
    <br>

    <div class="container">
        <?php if(!empty($posts)) { foreach ($posts as $post) {?>
        <div class="row">
                <div class="col-md-9">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row-content">
                                <h4><a href="<?php echo base_url('index.php/Forum/view_full_post');?><?php echo "/".$post->id;?>"><?php echo $post->title;?></a></h4>
                                <div class="text-right">
                                    <a href = "<?php echo base_url('index.php/Forum/view_full_post');?><?php echo "/".$post->id;?>" ><i style=\"color: red;\" class=\"fas fa-trash\"></i></a >
                                </div>
                                <div class="list-group-item-heading">
                                    <a href="<?php echo base_url('index.php/Home/my_profile');?>">
                                        <small><?php echo $post->username;?></small>
                                    </a>
                                </div>
                                <small>
                                    <i class="glyphicon glyphicon-time"></i> <?php echo $post->timestamp;?> <span class="twitter"> <i class="fa fa-twitter"></i></span>
                                    <br>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <hr>
        </div>
        <?php } }?>
    </div>



<?php include 'footer.php' ?>