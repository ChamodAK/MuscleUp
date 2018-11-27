<?php $panel = "my_profile"; include 'my_profile_frame.php' ?>

    <div class="col-md-9">
        <div class="card">
            <div class="card">
                <h4 class="card-header">My Profile Overview</h4>

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <div class="container" style="padding: 20px;" align="center">
                    <i class="fas fa-user fa-5x"></i>
                    <h4 style="margin-top: 10px; color: #003399"><?=$profile['name']?></h4>
                    <h6 style="color: red"> B'Day: <?=$profile['dob']?></h6>
                    <hr>
                </div>
                <div class="container" align="center">
                    <p>Username: <span style="color: steelblue"><?=$profile['username']?></span></p>
                    <p>Email: <span style="color: steelblue"><?=$profile['email']?></span></p>
                    <p>NIC: <span style="color: steelblue"><?=$profile['nic']?></span></p>
                    <p>Address: <span style="color: steelblue"><?=$profile['address']?></span></p>
                    <p>Contact No: <span style="color: steelblue"><?=$profile['contactNo']?></span></p>

                    <a href="<?=base_url('index.php/User_Profile/edit_profile')?>" class="btn btn-primary" style="margin-bottom: 20px;">Edit Profile</a>

                </div>
            </div>
        </div>
    </div>

<?php include 'my_profile_footer.php' ?>
