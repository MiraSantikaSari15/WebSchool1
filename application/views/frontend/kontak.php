  <section class="breadcrumb-bg" style="background-image: url(<?php echo base_url('assets/frontend/v1/img/background/banner-1082646_1280.jpg')?>) ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">Kontak</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="<?php echo site_url('home')?>">Beranda</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Kontak
            </li>
          </ul>
        </div>
      </div>
    </div>
</section>
<!-- ====================================
——— ABOUT MEDIA
===================================== -->
<section class="py-8 py-md-10">
  <div class="container">
    <div class="mb-9">
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <div class="media flex-md-column flex-lg-row mb-4">
            <div class="icon-rounded-circle-large shadow-sm mb-md-2 mr-md-0 mr-2 mr-lg-2 bg-warning">
              <i class="fa fa-map-marker text-white" aria-hidden="true"></i>
            </div>
            <div class="media-body">
              <h3 class="media-heading text-warning mt-0 font-weight-bold mb-3">Address:</h3>
              <p class="text-muted font-weight-medium"><?php echo $identitas->alamat ?></p>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-xs-12">
          <div class="media flex-md-column flex-lg-row mb-6">
            <div class="icon-rounded-circle-large shadow-sm mr-2 mb-md-2 mr-md-0 mr-lg-2 bg-success">
              <i class="fa fa-phone text-white" aria-hidden="true"></i>
            </div>
            <div class="media-body">
              <h3 class="media-heading text-success mt-0 font-weight-bold mb-3">Phone:</h3>
                <p class="text-muted font-weight-medium"><?php echo $identitas->nomor_telepon ?></p>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-xs-12">
          <div class="media flex-md-column flex-lg-row mb-3 mb-md-0">
            <div class="icon-rounded-circle-large shadow-sm mr-2 mb-md-2 mr-md-0 mr-lg-2 bg-danger">
              <i class="fa fa-envelope-o text-white" aria-hidden="true"></i>
            </div>
            <div class="media-body">
              <h3 class="media-heading text-danger">Email:</h3>
              <p class="font-weight-medium">
                <?php echo $identitas->email ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
<div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126745.77590711486!2d107.58333949372074!3d-6.913844219685173!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9bbbe0c435c7674b!2sSD+Negeri+075+Jatayu!5e0!3m2!1sen!2sid!4v1552887770215" style="border:0;width:100%; height:420px;" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</section>

</div> <!-- element wrapper ends -->