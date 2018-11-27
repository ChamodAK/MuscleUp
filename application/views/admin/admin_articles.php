<?php $panel='admin_articles'; include "admin_frame.php"; ?>
<script>
    function delete_confirm(){
        if($('.checkbox:checked').length > 0){
            var result = confirm("Are you sure to delete selected articles?");
            if(result){
                return true;
            }else{
                return false;
            }
        }else{
            alert('Select at least 1 record to delete.');
            return false;
        }
    }

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

<?php include "footer.php"; ?>
