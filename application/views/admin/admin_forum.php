<?php $panel='admin_forum'; include "admin_frame.php"; ?>

<div class="col-md-9">
    <div class="card">
        <h4 class="card-header">Manage Posts</h4>
        <div class="card-body">

            <?php
            if($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <div align="center" style="padding-bottom: 20px;">
                <a href="<?=base_url('index.php/Forum/add_post')?>" class="btn btn-primary">Add a Post</a>
            </div>

            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Post</th>
                    <th>Post by</th>
                    <th>Date Posted</th>
                    <th></th>
                </tr>
                </thead>
                <?php
                if(!empty($posts)) {
                    foreach($posts as $post) {
                        echo "<tr >";
                        echo "<td >$post->title</td >";
                        echo "<td >$post->username</td >";
                        echo "<td >$post->timestamp</td >";
                        echo "<td ><a href = \"".base_url('index.php/Admin/delete_post')."/$post->id\" ><i style=\"color: red;\" class=\"fas fa-trash\"></i></a ></td >";
                        echo "</tr >";
                    }
                }
                ?>
            </table>

        </div>
    </div>
</div>

<?php include "footer.php"; ?>
