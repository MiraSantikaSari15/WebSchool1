

  <section class="breadcrumb-bg" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/banner-1082646_1280.jpg')?>) ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">Visi & Misi</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="<?php echo site_url('home')?>">Beranda</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Visi & Misi
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	SERVICE DETAILS
===================================== -->
<section class="py-6 py-md-9">
  <div class="container">
    <div class="py-5">
      <div class="section-title align-items-baseline">
        <h3 class="text-warning font-weight-bold pl-0 mb-3">VISI</h3>
      </div>

      <p class="text-muted" style="font-size: 16px;"><b> <?php echo $visi['deskripsi'] ?> </b></p>
    </div>

      <div class="section-title align-items-baseline">
        <h3 class="text-warning font-weight-bold pl-0 mb-3">MISI</h3>
      </div>
        <ol type="1" class="text-muted" style="font-size: 16px;text-align: justify;">
        <?php echo $misi['deskripsi'] ?>
        </ol>
    </div>
  </div>
</section>

</div> <!-- element wrapper ends -->