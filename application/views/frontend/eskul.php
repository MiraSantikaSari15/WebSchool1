 <!-- ====================================
  ——— BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/banner-1082646_1280.jpg')?>) ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">Ekstrakulikuler</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="<?php echo site_url('home')?>">Beranda</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Ekstrakulikuler
            </li>
          </ul>
        </div>
      </div>
    </div>
</section>
<!-- ====================================
———	TESTIMONIAL
===================================== -->
<section class="pt-10 my-md-5">
  <div class="container">
    <div class="row">
<?php foreach ($eskul as $row) { ?>
      <div class="col-md-6 col-lg-4">
        <div class="card bg-info card-hover mb-9">
          <div class="card-body text-center px-md-5 px-lg-6 my-2">
            <blockquote class="blockquote blockquote-sm mt-2">
              <footer class="blockquote-footer text-uppercase text-white"><?php echo $row->judul_page ?><cite class="d-block text-capitalize font-size-14 opacity-80 mt-1"
                title="Source Title"></cite></footer>
                <img class="" src="<?=base_url()?>/assets/images/page/<?=$row->cover?>" alt="testimonial1.jpg" style="width: 40%; margin-bottom: 20px;margin-top: 20px;">
                <br>
                <?php echo $row->deskripsi ?>
            </blockquote>
          </div>
        </div>
      </div>
<?php } ?>
      
    </div>
  </div>
</section>

</div> <!-- element wrapper ends -->