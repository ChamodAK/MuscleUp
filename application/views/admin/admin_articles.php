<?php $panel='admin_articles'; include "admin_frame.php"; ?>

<div class="col-md-9">
    <div class="card">
        <h4 class="card-header">Manage Articles</h4>
        <div class="card-body">

            <?php
            if($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <div align="center" style="padding-bottom: 20px;">
                <a href="<?=base_url('index.php/Admin/add_article')?>" class="btn btn-primary">Add Article</a>
            </div>

            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Date Posted</th>
                    <th></th>
                </tr>
                </thead>
                <?php
                if(!empty($articles)) {
                    foreach($articles as $article) {
                        echo "<tr >";
                        echo "<td >$article->title</td >";
                        echo "<td >$article->timestamp</td >";
                        echo "<td ><a href = \"".base_url('index.php/admin/edit_article')."/$article->id\" ><i class=\"fas fa-edit\"></i></a ><a href = \"".base_url('index.php/Admin/delete_article')."/$article->id\" ><i style=\"color: red;\" class=\"fas fa-trash\"></i></a ></td >";
                        echo "</tr >";
                    }
                }
                ?>
            </table>

        </div>
    </div>
</div>
<?php include "footer.php"; ?>
