
  <section class="breadcrumb-bg" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/banner-1082646_1280.jpg')?>) ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">Tujuan</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="<?php echo site_url('home')?>">Beranda</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Tujuan
            </li>
          </ul>
        </div>
      </div>
    </div>
</section>

  <div class="container">
    <div class="py-5">
      <div class="section-title align-items-baseline">
        <h3 class="text-warning font-weight-bold pl-0 mb-3">Tujuan</h3>
      </div>
        <ol type="1" class="text-muted" style="font-size: 16px;text-align: justify;">
          <?php echo $tujuan['deskripsi'];?>
        </ol>
    </div>

</section>

</div> <!-- element wrapper ends -->