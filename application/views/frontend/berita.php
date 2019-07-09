 <!-- ====================================
  ———	BREADCRUMB
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
———	EVENTS SECTION
===================================== -->
<section class="py-8 py-md-10">
  <div class="container">
    <div class="row">
      <?php foreach ($berita as $row) { ?>
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="position-relative">
            <a href="<?php echo site_url('home/detail_berita/'.$row->id) ?>">
              <img class="card-img-top" src="<?=base_url()?>/assets/images/page/<?=$row->cover?>" alt="Card image">
            </a>
            <div class="card-img-overlay p-0">
              <span class="badge badge-rounded badge-success m-4"><?php $b = date('d M Y', strtotime($row->updated_at)); echo $b ?></span>
            </div>
          </div>

          <div class="card-body border-top-5 px-3 rounded-bottom border-success">
            <h3 class="card-title">
              <a class="text-success text-capitalize d-block text-truncate" href="<?php echo site_url('home/detail_berita/'.$row->id) ?>"><?php echo $row->judul_page ?></a>
            </h3>
            <p class="mb-2"><?php echo substr($row->deskripsi, 0,100) ?></p>
            <a class="btn btn-link text-hover-success pl-0" href=" <?php echo site_url('home/detail_berita/'.$row->id) ?> ">
              <i class="fa fa-angle-double-right mr-1" aria-hidden="true"></i> Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
    <?php } ?>
      </div>
		<!-- ====================================
———	PAGINATION
===================================== -->
<section class="py-5">
  <div class="col">
    <?php echo $pagination; ?>
  </div>
</section>

	</div>
</section>

</div> <!-- element wrapper ends -->
