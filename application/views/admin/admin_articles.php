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

<<<<<<< HEAD
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
=======
    // $(document).ready(function(){
    //     $('#select_all').on('click',function(){
    //         if(this.checked){
    //             $('.checkbox').each(function(){
    //                 this.checked = true;
    //             });
    //         }else{
    //             $('.checkbox').each(function(){
    //                 this.checked = false;
    //             });
    //         }
    //     });
    //
    //     $('.checkbox').on('click',function(){
    //         if($('.checkbox:checked').length == $('.checkbox').length){
    //             $('#select_all').prop('checked',true);
    //         }else{
    //             $('#select_all').prop('checked',false);
    //         }
    //     });
    // });
</script>

<div class="col-md-9">
    <div class="card">
        <h4 class="card-header">Articles</h4>
        <div class="card-body">

            <?php
            if($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <form name="bulk_action_form" action="" method="post" onSubmit="return delete_confirm();"/>
            <table class="bordered">
                <thead>
                <tr>
                    <th>Check</th>
                    <th>Title</th>
                    <th>Date Posted</th>
                </tr>
                </thead>
                <?php foreach($articles as $article){ ?>
                    <tr>
                        <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $article->id; ?>"/></td>
                        <td><?php echo $article->title ?></td>
                        <td><?php echo $article->timestamp; ?></td>
                    </tr>
                <?php }?>
            </table>
            <input type="submit" class="btn btn-danger" name="bulk_delete_submit" value="DELETE"/>
            </form>
            <br><br><br>
            <div class="text-right">
                <a href="<?php echo base_url('index.php/Admin/add_article')?>" class="btn btn-warning"><i class="fas fa-plus-circle"></i> ADD NEW ARTICLE </a>
            </div>

        </div>
    </div>
</div>
>>>>>>> 86ebfb0118cb7aa06b8f3e5ce46064691f20ace1

        </div>
    </div>
</div>
<?php include "footer.php"; ?>
