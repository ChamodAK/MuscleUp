<?php $panel='schedule'; include "admin_frame.php"; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Manage Schedules</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <div align="center" style="padding-bottom: 20px;">
                    <a href="<?=base_url('index.php/admin/add_schedule')?>" class="btn btn-primary">Add a Schedule</a>
                </div>

                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Content</th>
                        <th>Days per Week</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    if(!empty($schedules)) {
                        foreach($schedules as $schedule) {
                            echo "<tr >";
                            echo "<td >$schedule->id</td >";
                            echo "<td >$schedule->content</td >";
                            echo "<td >$schedule->daysPerWeek</td >";
                            echo "<td ><a href = \"".base_url('index.php/admin/edit_schedule')."/$schedule->id\" ><i class=\"fas fa-edit\"></i></a > <a href = \"".base_url('index.php/admin/delete_schedule')."/$schedule->id\" ><i style=\"color: red;\" class=\"fas fa-trash\"></i></a ></td >";
                            echo "</tr >";
                        }
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>

<?php include "footer.php"; ?>