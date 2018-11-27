<?php $panel = "admin_manage_users"; include 'admin_frame.php' ?>


    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Recent Users</h4>
            <div class="card-body">
            <?php echo form_open("admin/delete_user"); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                        <input type="text" class="form-control" id = "userid" placeholder="Enter UserID:"value="<?php echo set_value('userid'); ?>">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">DELETE!</button>
                            </span>
                            
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <?php echo form_close(); ?>
            <?php if(!isset($userdata)): ?>
                <p> You haven't any user yet. </p>
                <?php else: ?>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">UserID</th>
                                <th scope="col">Name</th>
                                <th scope="col">UserName</th>
                                <th scope="col">DOB</th>
                                <th scope="col">NIC</th>
                                <th scope="col">Email</th>
                                <th scope="col">ContactNo</th>
                                <th scope="col">Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($userdata ->result() as $data): ?>
                                <tr>
                                    <th scope="row"><?=$data->id?></th>
                                    <td><?=$data->name?></td>
                                    <td><?=$data->username?></td>
                                    <td><?=$data->dob?></td>
                                    <td><?=$data->nic?></td>
                                    <td><?=$data->email?></td>
                                    <td><?=$data->contactNo?></td>
                                    <td><?=$data->address?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php include 'footer.php' ?>