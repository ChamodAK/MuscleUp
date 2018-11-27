<?php $panel='dashboard'; include "admin_frame.php"; ?>

    <!-- Display the status message -->

<?php
if($this->session->flashdata('msg')) {
    echo $this->session->flashdata('msg');
}
?>
    <div class="col-md-9">
        <div class="card">
            <div class="container" align="center" style="padding: 10px;">
                <h3> Welcome to Muscle Up Admin Dashboard </h3>
            </div>
            <div class="card" align="center">
                <h4 class="card-header" style="color: orangered;">Website Overview</h4>
                <div class="card-body" align="center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-light card-body dash-box">
                                <a href="<?php echo base_url('index.php/admin/admin_articles')?>"><h4><i class="fas fa-feather"></i><?php echo $article_count?></h4></a>
                                <p>Articles</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light card-body dash-box">
                                <a href="<?php echo base_url('index.php/admin/notifications')?>"><h4><i class="fas fa-bell"></i></h4></a>
                                <p>Notifications</p>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 20px;">
                            <div class="card bg-light card-body dash-box">
                                <a href="<?php echo base_url('index.php/admin/schedule')?>"><h4><i class="fas fa-clipboard-list"></i></h4></a>
                                <p>Manage Schedule</p>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 20px;">
                            <div class="card bg-light card-body dash-box">
                                <a href="<?php echo base_url('index.php/admin/admin_manage_users')?>"><h4><i class="fas fa-users-cog"></i></h4></a>
                                <p>Manage Users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "footer.php"; ?>