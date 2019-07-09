<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url('auth'); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><small>075</small></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b></b><?=$this->session->userdata('identitas_nama');?></span>
  </a>

  <!-- nav -->
  <?php echo @$_nav; ?>
</header>