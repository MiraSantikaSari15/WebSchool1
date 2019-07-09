<!DOCTYPE HTML>
<html lang="en">
<head>
  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $identitas->nama ?></title>

  <!-- Plugins css Style -->

  <link href="<?php echo base_url('assets/frontend/v1/plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/frontend/v1/css/Banner.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/frontend/v1/plugins/no-ui-slider/nouislider.min.css')?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/frontend/v1/plugins/owl-carousel/owl.carousel.min.css')?>" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('assets/frontend/v1/plugins/owl-carousel/owl.theme.default.min.css')?>" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('assets/frontend/v1/plugins/fancybox/jquery.fancybox.min.css')?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/frontend/v1/plugins/isotope/isotope.min.css')?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/frontend/v1/plugins/animate/animate.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/frontend/v1/plugins/select2/css/select2.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/frontend/v1/plugins/revolution/css/settings.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/frontend/v1/plugins/revolution/css/layers.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/frontend/v1/plugins/revolution/css/navigation.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/v1/css/bootstrap.min.css')?>" />
  <script src="<?php echo base_url('assets/frontend/v1/css/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/frontend/v1/css/bootstrap.min.js')?>"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,600,700|Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Custom css -->
  <link href="<?php echo base_url('assets/frontend/v1/css/kidz.css')?>" id="option_style" rel="stylesheet">

  <!-- Favicon -->
  <link href="<?=base_url()?>/assets/images/identitas/<?=$identitas->logo?>" rel="shortcut icon">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<header class="header" id="pageTop">
    <!-- Top Color Bar -->
    <div class="color-bars">
      <div class="container-fluid">
        <div class="row">
          <div class="col color-bar bg-warning d-none d-md-block"></div>
          <div class="col color-bar bg-success d-none d-md-block"></div>
          <div class="col color-bar bg-danger d-none d-md-block"></div>
          <div class="col color-bar bg-info d-none d-md-block"></div>
          <div class="col color-bar bg-purple d-none d-md-block"></div>
          <div class="col color-bar bg-pink d-none d-md-block"></div>
          <div class="col color-bar bg-warning"></div>
          <div class="col color-bar bg-success"></div>
          <div class="col color-bar bg-danger"></div>
          <div class="col color-bar bg-info"></div>
          <div class="col color-bar bg-purple"></div>
          <div class="col color-bar bg-pink"></div>
        </div>
      </div>
    </div>

            <!-- Top Bar-->
        <div class=" bg-stone d-none d-md-block top-bar">
          <div class="container">
            <div class="row">
              <div class="col-lg-7 d-none d-lg-block">
                <ul class="list-inline d-flex justify-content-xl-start align-items-center h-100 mb-0">
                  <li>
                    <span class="bg-warning icon-header mr-xl-2">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="mr-lg-4 mr-xl-6 text-white opacity-80">
                      <?php echo $identitas->email ?></a>
                  </li>
                  <li>
                    <span class="bg-success icon-header mr-xl-2">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="mr-lg-4 mr-xl-6 text-white opacity-80"> <?php echo $identitas->nomor_telepon ?> </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-scrollUp navbar-sticky navbar-white">
      <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('home')?>" style="color: black;font-size: 23px;" >
          <img class="d-inline-block" src="<?=base_url()?>/assets/images/identitas/<?=$identitas->logo?>" alt="SDN 075 Jatayu" style='width: 20%;'>
            <b> <?php echo $identitas->nama ?></b>
        </a>


        <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item dropdown bg-warning">
               <a class="nav-link dropdown-toggle " href="<?php echo site_url('home')?>">
                <i class="fa fa-home nav-icon" aria-hidden="true"></i>
                <span>Beranda</span>
              </a>
            </li>

            <li class="nav-item dropdown bg-danger">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                data-toggle="dropdown">
                <i class="fa fa-list-ul nav-icon" aria-hidden="true"></i>
                <span>Profile</span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item " href="<?php echo site_url('home/visimisi')?>">Visi & Misi</a>
                </li>
                <li>
                  <a class="dropdown-item " href="<?php echo site_url('home/tujuan')?>">Tujuan</a>
                </li>
                <li>
                  <a class="dropdown-item " href="<?php echo site_url('home/sejarah')?>">Sejarah</a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown mega-dropdown bg-success">
               <a class="nav-link dropdown-toggle " href="<?php echo site_url('home/berita')?>">
                <i class="fa fa-newspaper-o nav-icon" aria-hidden="true"></i>
                <span>Berita</span>
              </a>
            </li>

            <li class="nav-item dropdown bg-info">
               <a class="nav-link dropdown-toggle " href="<?php echo site_url('home/eskul')?>">
                <i class="fa fa-star nav-icon" aria-hidden="true"></i>
                <span>Ekskul</span>
              </a>
            </li>

            <li class="nav-item dropdown bg-pink">
              <a class="nav-link dropdown-toggle " href="<?php echo site_url('home/kontak')?>">
                <i class="fa fa-phone nav-icon" aria-hidden="true"></i>
                <span>Kontak</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="main-wrapper home">