  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/banner-1082646_1280.jpg')?>) ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">Detail Guru</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="index.html">Beranda</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
             Detail Guru
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	TEACHERS DETAILS
===================================== -->
<section class="py-7 py-md-10">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <div class="image mb-5 mb-md-0">
          <img class="w-100 rounded" src="<?=base_url()?>/assets/images/guru/<?=$guru->foto ?>" alt="<?php echo $guru->foto ?>">
        </div>
      </div>
      <div class="col-sm-8 col-xs-12">

        <h2 class="text-danger font-weight-medium mb-3 ">Informasi Guru</h2>

        <div class="text-white rounded bg-warning text-uppercase font-weight-medium px-6 py-3 mb-3">Nama Lengkap</div>

        <div class="text-muted text-capitalize font-weight-medium ml-4 mb-5 font-size-20"><?php echo $guru->nama ?></div>

        <div class="text-white rounded bg-success text-uppercase font-weight-medium px-6 py-3 mb-3">Tempat, Tanggal Lahir</div>

        <div class="text-muted text-capitalize font-weight-medium ml-4 mb-5 font-size-20"><?php echo $guru->tempat_lahir ?>, <?php echo $guru->tanggal_lahir ?></div>

        <div class="text-white rounded bg-danger text-uppercase font-weight-medium px-6 py-3 mb-3">Jenis Kelamin</div>

        <div class="text-muted text-capitalize font-weight-medium ml-4 mb-5 font-size-20"><?php echo $guru->jk ?></div>

        <div class="text-white rounded bg-info text-uppercase font-weight-medium px-6 py-3 mb-3">Sebagai</div>

        <div class="text-muted text-capitalize font-weight-medium ml-4 mb-5 font-size-20"><?php echo $guru->mata_pelajaran ?></div>

      </div>
    </div>
  </div>
</section>