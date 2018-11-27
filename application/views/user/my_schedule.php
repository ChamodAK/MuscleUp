<?php $panel = "my_schedule"; include 'my_profile_frame.php' ?>


    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">My Forum Posts</h4>
            <div class="card-body">
            <?php if(!isset($fitness)): ?>
                <p> You haven't any schedule yet. </p>
                <?php else: ?>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Checked-Date</th>
                                <th scope="col">Attendance</th>
                                <th scope="col">Height</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($fitness ->result() as $fit): ?>
                                <tr>
                                    <th scope="row"><?=$fit->checkedDate?></th>
                                    <td><?=$fit->attendance?></td>
                                    <td><?=$fit->height?></td>
                                    <td><?=$fit->weight?></td>
                                    <td><?=$fit->remarks?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php include 'my_profile_footer.php' ?>