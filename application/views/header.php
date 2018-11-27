<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url('asset/images/logo_white.jpg') ?>">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url("asset/css/style.css")?>">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

    <title> Muscleup.lk </title>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url('index.php/home'); ?>">
        <img src="<?php echo base_url() ?>asset/images/Gym Logo.jpg" width="30" height="30" class="rounded-circle" alt="image">
         Muscle Up
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if($this->session->userdata('flag')!='a'): ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='home'){echo " active";}?>" href="<?php echo base_url('index.php/home'); ?>"> Home <span class="sr-only">(current)</span></a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='dashboard'){echo " active";}?>" href="<?php echo base_url('index.php/admin'); ?>"> Dashboard <span class="sr-only">(current)</span></a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='classes'){echo " active";}?>" href="<?php echo base_url('index.php/home/classes') ?>">Classes & Time</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='articles'){echo " active";}?>" href="<?php echo base_url('index.php/home/articles') ?>">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='forum'){echo " active";}?>" href="<?php echo base_url('index.php/home/forum') ?>">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='gallery'){echo " active";}?>" href="<?php echo base_url('index.php/home/get_photos') ?>">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='success_stories'){echo " active";}?>" href="<?php echo base_url('index.php/home/success_stories') ?>">Success Stories</a>
            </li>
        </ul>

        <ul class="navbar-nav navbar-right" style="margin-right: 10px;">
            <li class="nav-item">
                <a class="nav-link <?php if($page=='login'){echo " active";}?>" href="<?php echo base_url("index.php/home/login") ?>">
                    <?php
                    if($this->session->userdata('username')==false) {
                        echo "Login";
                    }
                    ?>
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php
            if($this->session->userdata('username')) {
                echo "<li class=\"nav-item dropdown\">";
                echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n";
                echo $this->session->userdata('username');
                echo "</a>\n";
                echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">\n";
                if($this->session->userdata('flag')!='a') {
                    echo "<a class=\"dropdown-item\" href=\"" . base_url('index.php/home/my_profile');
                    echo "\">Profile</a>\n";
                }
                echo "<a class=\"dropdown-item\" href=\"" . base_url('index.php/login/user_logout');
                echo "\">Logout</a>\n";
                echo " </div>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</nav>