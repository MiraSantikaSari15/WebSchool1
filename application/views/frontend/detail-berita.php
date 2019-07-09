 <!-- ====================================
  ——— BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/banner-1082646_1280.jpg')?>) ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">Berita</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="<?php echo site_url('home')?>">Beranda</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Berita
            </li>
          </ul>
        </div>
      </div>
    </div>
</section>

<!-- ====================================
———	SINGLE-EVENT LEFT-SIDEBAR
===================================== -->
<section class="py-8 py-md-10">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-9">
        <div class="card">
          <div class="position-relative">
            <img class="card-img-top" src="<?=base_url()?>/assets/images/page/<?=$berita->cover?>" alt="Card image cap">
            <div class="card-img-overlay">
              <span class="badge badge-rounded badge-success"><?php $b = date('d M Y', strtotime($berita->updated_at)); echo $b ?></span>
            </div>
          </div>
          <div class="card-body border-top-5 px-3 rounded-bottom border-success">
            <h3 class="card-title text-success mb-4"><?php echo $berita->judul_page?></h3>

            <p class="card-text text-justify mb-6">
              <?php echo $berita->deskripsi ?>
            </p>
          </div>
        </div>  
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="mb-4">
          <h3 class="bg-success rounded-top font-weight-bold text-white mb-0 py-2 px-4">Berita Terkini</h3>
          <div class="border border-top-0 rounded">
            <?php 
              foreach ($berita_terkini as $row) {
            ?>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom p-3">
                <div class="media">
                  <div class="media-body">
                    <h5 class="mb-1">
                      <a class="btn-link font-base text-hover-purple" href="<?php echo site_url('home/detail_berita/'.$row->id) ?>"><?php echo $row->judul_page ?></a>
                    </h5>
                    <time class="text-muted"><?php $b = date('d M Y', strtotime($row->updated_at)); echo $b ?></time>
                  </div>
                </div>
              </li>
            </ul>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div> <!-- element wrapper ends -->