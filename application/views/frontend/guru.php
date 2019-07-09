  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/banner-1082646_1280.jpg')?>) ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">Guru</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="<?php echo site_url('home')?>">Beranda</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Guru
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
———	OUR TEACHER 1
===================================== -->
<section class="py-10 bg-white">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">Guru</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="row">
      <?php foreach ($guru as $row) {
      ?>
      <div class="col-sm-3">
        <div class="card card-hover bg-transparent shadow-none">
          <div class="card-img-wrapper position-relative shadow-sm rounded-circle mx-auto">
            <img class="card-img-top rounded-circle" src="<?=base_url()?>/assets/images/guru/<?=$row->foto ?>" alt="carousel-img"/>
          </div>
          <div class="card-body text-center">
            <a class="text-danger font-size-20 font-weight-medium d-block mb-1" href="<?php echo site_url('home/detail_guru/'.$row->id) ?>"><?php echo $row->nama ?></a>
            <span class="text-muted font-size-15"><?php echo $row->mata_pelajaran ?></span>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>

<section class="py-5">
  <div class="col">
    <?php echo $pagination; ?>
  </div>
</section>

 </div>
  </div>
</section>

</div> <!-- element wrapper ends -->