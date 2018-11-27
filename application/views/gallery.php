<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $page = 'gallery'; include 'header.php';?>

<br>
<br>
<div class="row mt-500">


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url() ?>asset/gallery_images/rsz_1scott-webb-22697-unsplash.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url() ?>asset/gallery_images/rsz_trust-tru-katsande-592917-unsplash.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url() ?>asset/gallery_images/rsz_victor-freitas-546919-unsplash.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




</div>
<br>
<br>
<div class="photo">
<img src="<?php echo base_url() ?>asset/gallery_images/rsz_471845047.jpg" class="img-fluid" alt="Responsive image">
<img src="<?php echo base_url() ?>asset/gallery_images/rsz_bigstock-group-of-young-people-running-85541696.jpg" class="img-fluid" alt="Responsive image">
<img src="<?php echo base_url() ?>asset/gallery_images/rsz_maxresdefault.jpg" class="img-fluid" alt="Responsive image">
<img src="<?php echo base_url() ?>asset/gallery_images/rsz_noosa-aquatic-gym.jpg" class="img-fluid" alt="Responsive image">
<img src="<?php echo base_url() ?>asset/gallery_images/rsz_alora-griffiths-781450-unsplash.jpg" class="img-fluid" alt="">
<img src="<?php echo base_url() ?>asset/gallery_images/rsz_appetite-bowl-centimeter-1332189.jpg" class="img-fluid" alt="">
<img src="<?php echo base_url() ?>asset/gallery_images/rsz_chuttersnap-1111548-unsplash (1).jpg" class="img-fluid" alt="">
<img src="<?php echo base_url() ?>asset/gallery_images/rsz_danielle-cerullo-782569-unsplash.jpg" class="img-fluid" alt="">


</div>
<?php include 'footer.php'?>