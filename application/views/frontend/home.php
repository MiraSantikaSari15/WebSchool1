<!--====================================
——— BEGIN MAIN SLIDE LIST
===================================== -->
<section>
  <div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="">

      <div class="item active" style="width: 100%; ">
        <img src="<?=base_url()?>/assets/frontend/v1/img/banner/slider-1/img-3.jpg?>" alt="" style="width: 100%;">
      </div>
    <?php if ($banner) {
      foreach ($banner as $row) {
      ?>
      <div class="item" style="width: 100%; ">
        <img src="<?=base_url()?>/assets/frontend/v1/img/banner/slider-1/<?=$row->foto?>" alt="" style="width: 100%;">
      </div>
       <?php }
  } ?>
    </div>
 
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <!-- <span class="glyphicon glyphicon-chevron-left"></span> -->
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <!-- <span class="glyphicon glyphicon-chevron-right"></span> -->
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</section>

<!-- ====================================
——— BOX SECTION
===================================== -->
<section class="d-none d-sm-block mtn-50">
  <div class="container">
    <div class="row wow fadeInUp">
      <div class="col-sm-3">
        <a href="#courses">
          <div class="card bg-success card-hover scrolling">
            <div class="card-body text-center p-0">
              <div class="card-icon-border-large border-success">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
              </div>
              <h2 class="text-white font-size-32 pt-5 pb-6 mb-0 font-dosis">Berita</h2>
              <a href="#courses" class="btn-scroll-down d-block pb-5">
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-3">
        <a href="#teachers">
          <div class="card bg-warning card-hover scrolling">
            <div class="card-body text-center p-0">
              <div class="card-icon-border-large border-warning">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <h2 class="text-white font-size-32 pt-5 pb-6 mb-0 font-dosis">Guru</h2>
              <a href="#teachers" class="btn-scroll-down d-block pb-5">
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-3">
        <a href="#gallery">
          <div class="card bg-danger card-hover scrolling">
            <div class="card-body text-center p-0">
              <div class="card-icon-border-large border-danger">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
              </div>
              <h2 class="text-white font-size-32 pt-5 pb-6 mb-0 font-dosis">Gallery</h2>
              <a href="#gallery" class="btn-scroll-down d-block pb-5">
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-3">
        <a href="#blog">
          <div class="card bg-info card-hover scrolling">
            <div class="card-body text-center p-0">
              <div class="card-icon-border-large border-info">
                <i class="fa  fa-building-o" aria-hidden="true"></i>
              </div>
              <h2 class="text-white font-size-32 pt-5 pb-6 mb-0 font-dosis">Fasilitas</h2>
              <a href="#blog" class="btn-scroll-down d-block pb-5">
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ====================================
——— HOME FEATURE
===================================== -->
<section class="pt-9 pb-6 py-md-7">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">Sambutan Kepala Sekolah</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="row wow fadeInUp">
      <!-- Media -->
      <div class="pic">
        <img src="<?=base_url()?>/assets/images/identitas/<?=$identitas->foto?>"  class="w3-hover-opacity"  style="float: left; margin-right: 20px;padding-bottom: 30px;border-radius: 5px;height: 275px;">
          <?php echo $identitas->sambutan ?>
        
  </div>
</section>
<!-- ====================================
——— CALL TO ACTION
===================================== -->

<!-- ====================================
——— COURSES SECTION
===================================== -->
<section class="py-1" id="courses">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">Berita</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="row wow fadeInUp">
    <div class="row">
      <?php foreach ($berita1 as $row) {?>
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="position-relative">
            <a href="detail_berita.html">
              <img class="card-img-top" src="<?=base_url()?>/assets/images/page/<?=$row->cover?>" alt="Card image">
            </a>
            <div class="card-img-overlay p-0">
              <span class="badge badge-rounded badge-success m-4"> <?php $b = date('d M Y', strtotime($row->updated_at)); echo $b ?></span>
            </div>
          </div>

          <div class="card-body border-top-5 px-3 rounded-bottom border-success">
            <h3 class="card-title">
              <a class="text-success text-capitalize d-block text-truncate" href="detail_berita.html"><?php echo($row->judul_page) ?></a>
            </h3>
            <p class="mb-2"><?php echo substr($row->deskripsi, 0, 100) ?> ....</p>
            <a class="btn btn-link text-hover-success pl-0" href="<?php echo site_url('home/detail_berita/'.$row->id) ?> ">
              <i class="fa fa-angle-double-right mr-1" aria-hidden="true"></i> Baca Selengkapnya
            </a>
          </div>
        </div>
      
    </div> 
    <?php } ?>
  </div>
</div>
  <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="<?php echo site_url('home/berita') ?>" class="btn btn-danger text-uppercase box-shadow">Baca Selengkapnya</a>
  </div>
</section>

<!-- ====================================
——— TEACHERS SECTION
===================================== -->
<section class="pt-3 bg-danger" id="teachers" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/avator-bg.png')?>);padding-bottom: 30px;">
  <div class="container">
    <div class="section-title justify-content-center mb-2 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-white">Guru</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="team-slider owl-carousel owl-theme wow fadeInUp" dir="ltr">
      <?php foreach ($guru as $row) {
      ?>
      <div class="card card-hover card-transparent shadow-none">
        <div class="card-img-wrapper position-relative shadow-sm rounded-circle mx-auto">
          <img class="card-img-top rounded-circle lazyestload" data-src="<?=base_url()?>/assets/images/guru/<?=$row->foto ?>" src="<?=base_url()?>/assets/frontend/v1/img/avator/<?=$row->foto ?>"/>
        </div>
        <div class="card-body text-center">
          <a class="font-size-20 font-weight-medium d-block" href="<?php echo site_url('home/detail_guru/'.$row->id) ?>"><?php echo $row->nama ?></a>
          <span class="text-white"><?php echo $row->mata_pelajaran ?></span>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
  <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="<?php echo site_url('home/guru') ?>" class="btn btn-info text-uppercase box-shadow text-white">Baca Selengkapnya</a>
  </div>
</section>

<!-- ====================================
——— GALLERY
===================================== -->
<section class="pt-9 pb-7 py-md-10" id="gallery">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">Gallery</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="d-flex justify-content-center wow fadeInUp">
      <div id="filters" class="button-group">
        <button class="button is-checked" data-filter="*">Semua</button>
        <button class="button" data-filter=".charity">Ekstrakulikuler</button>
        <button class="button" data-filter=".nature">Kegiatan Sekolah</button>
        <button class="button" data-filter=".teachers">Kegiatan Guru</button>
      </div>
    </div>

    <div id="gallery-grid">
      <div class="row grid wow fadeInUp">

        <?php foreach ($sekolah as $row) {?>
        <div class="col-md-4 col-lg-3 col-xs-12 element-item nature">
          <div class="media media-hoverable justify-content-center">
            <div class="position-relative w-100">
              <img class="media-img w-100 lazyestload" data-src="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>" src="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>" alt="gallery-img">
              <a class="media-img-overlay" data-fancybox="gallery" href="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>">
                <div class="btn btn-squre">
                  <i class="fa fa-search-plus"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
        <?php } ?>

        <?php foreach ($kguru as $row) {?>
        <div class="col-md-4 col-lg-3 col-xs-12 element-item teachers">
          <div class="media media-hoverable justify-content-center">
            <div class="position-relative w-100">
              <img class="media-img w-100 lazyestload" data-src="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>" src="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>" alt="gallery-img">
              <a class="media-img-overlay" data-fancybox="gallery" href="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>">
                <div class="btn btn-squre">
                  <i class="fa fa-search-plus"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
        <?php } ?>

        <?php foreach ($eskul as $row) {?>
        <div class="col-md-4 col-lg-3 col-xs-12 element-item charity">
          <div class="media media-hoverable justify-content-center">
            <div class="position-relative w-100">
              <img class="media-img w-100 lazyestload" data-src="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>" src="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>" alt="gallery-img">
              <a class="media-img-overlay" data-fancybox="gallery" href="<?=base_url()?>/assets/images/galeri/<?=$row->cover ?>">
                <div class="btn btn-squre">
                  <i class="fa fa-search-plus"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      <?php } ?>

</div>

    <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="<?php echo site_url('home/galeri') ?>" class="btn btn-danger text-uppercase box-shadow">Baca Selengkapnya</a>
    </div>
  </div>
</section>

<!-- ====================================
——— COUNTER-UP SECTION
===================================== -->
<section class="py-9 bg-parallax">
  <div class="container">
    <div class="wow fadeInUp">
      <div class="section-title justify-content-center">
        <h2 class="text-dark text-center">Butuh Informasi Lebih?</h2>
      </div>
      <div style="margin-top: -100px;">
      <img src="<?php echo base_url('assets/frontend/v1/img/background/telephoneorg.png')?>" style="width: 20%;float: left;">
      <img src="<?php echo base_url('assets/frontend/v1/img/background/telephoneorg2.png')?>" style="width: 20%;float: right;">
      </div>
      <div class="text-center">
        <p class="text-dark font-size-18 mb-0" style="margin-top: 100px;">Hubungi Kami Untuk Informasi Lebih Lanjut, Klik Tombol Kontak Dibawah</p>
        <a href="contact-us.html" class="btn btn-danger shadow-sm text-uppercase mt-4">
          <i class="fa fa-phone mr-2" aria-hidden="true"></i>Kontak
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ====================================
——— BLOG SECTION
===================================== -->
<section class="pt-9 pb-7" id="blog">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">Fasilitas</h2>
      <span class="shape shape-right bg-info"></span>
    </div>
    <div class="row wow fadeInUp">
    <div class="row">
      <?php 
        foreach ($fas as $row){
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="position-relative">
            <a href="detail_fasilitas.html">
              <img class="card-img-top" src="<?=base_url()?>/assets/images/page/<?=$row->cover?>" alt="Card image">
            </a>
          </div>

          <div class="card-body border-top-5 px-3 rounded-bottom border-warning">
            <h3 class="card-title">
              <a class="text-warning text-capitalize d-block text-truncate" href="detail_fasilitas.html"><?php echo $row->judul_page ?></a>
            </h3>
            <p class="mb-2"><?php echo substr($row->deskripsi, 0, 100) ?> ....</p>
            <a class="btn btn-link text-hover-warning pl-0" href="<?php echo site_url('home/detail_fasilitas/'.$row->id) ?>">
              <i class="fa fa-angle-double-right mr-1" aria-hidden="true"></i> Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
    <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="<?php echo site_url('home/fasilitas') ?>" class="btn btn-danger text-uppercase">Baca Selengkapnya</a>
    </div>
  </div>
</section>

<!-- ====================================
——— CONTACT SECTION
===================================== -->
</div> <!-- element wrapper ends -->