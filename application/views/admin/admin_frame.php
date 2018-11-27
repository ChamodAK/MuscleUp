<?php $page='dashboard'; include 'header.php'; ?>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h3><i class="fas fa-user-circle"></i> Admin Dashboard <small style="color: red"><?php echo $this->session->userdata['username']?></small></h3>
                </div>
            </div>
        </div>
    </header>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="<?php echo base_url('index.php/admin')?>" class="list-group-item list-group-item-action <?php if($panel=='dashboard'){echo " active";}?>"><i class="fas fa-sliders-h"></i> Dashboard </a>
                        <a href="<?php echo base_url('index.php/admin/admin_articles')?>" class="list-group-item list-group-item-action <?php if($panel=='admin_articles'){echo " active";}?>"><i class="fas fa-feather"></i> Articles <span class="badge badge-pill badge-danger float-right">4</span></a>
                        <a href="<?php echo base_url('index.php/admin/admin_forum')?>" class="list-group-item list-group-item-action <?php if($panel=='admin_forum'){echo " active";}?>"><i class="fas fa-question-circle"></i> Forum <span class="badge badge-pill badge-danger float-right">7</span></a>
                        <a href="<?php echo base_url('index.php/admin/admin_enquiries')?>" class="list-group-item list-group-item-action <?php if($panel=='admin_enquiries'){echo " active";}?>"><i class="fas fa-exclamation-triangle"></i> Enquiries <span class="badge badge-pill badge-danger float-right">7</span></a>
                    </div>
                </div>

