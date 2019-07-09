<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          <?php echo $userdata->nama; ?>
        </p>
        <!-- Status -->
        <a href=""><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page=='home' ) {echo 'class="active"' ;} ?>>
        <a href="<?php echo base_url('admin/home'); ?>">
          <i class="fa fa-home"></i> 
          <span>Home</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Setting Web</span>
          <span class="pull-right-container">
            <i class="fa fa-sort-desc"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($page=='main_user' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/main_user');?>">
            <i class="fa fa-user"></i>Manajemen User</a>
            <li <?php if ($page=='identitas' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/identitas');?>">
            <i class="fa fa-globe"></i>Identitas Web</a>
            </li>
          </li>
        </ul>
      </li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Setting Menu</span>
          <span class="pull-right-container">
            <i class="fa fa-sort-desc"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($page=='main_menu' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/main_menu');?>">
            <i class="fa fa-circle-o"></i>Main Menu</a>
            <li <?php if ($page=='sub_menu' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/sub_menu');?>">
            <i class="fa fa-circle-o"></i>Sub Menu</a>
            </li>
          </li>
        </ul>
      </li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-reorder"></i> <span>Manajemen page</span>
          <span class="pull-right-container">
            <i class="fa fa-sort-desc"></i>
          </span>
        </a>
    <ul class="treeview-menu">
          <li <?php if ($page=='tag' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/tag');?>">
            <i class="fa fa-tags"></i>Tag</a>
            <li <?php if ($page=='kategori' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/kategori');?>">
            <i class="fa fa-user"></i>Kategori</a>
             <li <?php if ($page=='komentar' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/komentar');?>">
            <i class="fa fa-comment-o"></i>Komentar</a>
            </li>
            </li>
          </li>
        </ul>
       </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-th-large"></i> <span>Media</span>
          <span class="pull-right-container">
            <i class="fa fa-sort-desc"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($page=='album' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/album');?>">
            <i class="fa fa-image"></i>Album</a>
            <li <?php if ($page=='galeri' ) {echo 'class="active"' ;} ?>><a href="<?php echo base_url('admin/galeri');?>">
            <i class="fa fa-image"></i>Galeri</a>
          </li>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="<?php echo base_url('admin/guru');?>">
          <i class="fa fa-users"></i> <span>Guru</span>
        </a>
      </li>

      <li class="treeview">
        <a href="<?php echo base_url('admin/banner');?>">
          <i class="fa fa-reorder"></i> <span>Banner</span>
        </a>
      </li>

      <li class="treeview">
       <a href="<?php echo base_url('admin/page');?>">
         <i class="fa fa-reorder"></i> <span>Page</span>
       </a>
     </li>

     <li class="treeview">
       <a href="<?php echo base_url('auth/logout');?>">
         <i class="fa fa-power-off"></i> <span>Logout</span>
       </a>
     </li>
     </ul>


  </section>
</aside>

<script>
  var url = window.location;
  // for sidebar menu but not for treeview submenu
  $('ul.sidebar-menu a').filter(function () {
    return this.href == url;
  }).parent().siblings().removeClass('active').end().addClass('active');
  // for treeview which is like a submenu
  $('ul.treeview-menu a').filter(function () {
      var return_data = this.href == url;
      if(url == '<?=base_url().'admin/main_menu/add_data'?>') {
        return_data = "<?=base_url().'admin/main_menu'?>";
      }
      return return_data;
  }).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end().addClass('active menu-open');
</script>
