<!-- ====================================
  ——— BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/banner-1082646_1280.jpg')?>) ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">Galeri</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="<?php echo site_url('home')?>">Beranda</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Galeri
            </li>
          </ul>
        </div>
      </div>
    </div>
</section>

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

  </div>
</section>

</div> <!-- element wrapper ends -->

