 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="<?=base_url('admin')?>" class="brand-link">
      <span class="brand-text font-weight-light"><center>Admin</center></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel ml-2 mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
       <h4><a href="#" class="d-block"><?=$this->session->userdata('nama_user')?> </a></h4>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           

        <li class="nav-item">
            <a href="<?= base_url('admin')?> " class="nav-link <?php if($this->uri->segment(1)=='admin' and $this->uri->segment(2)=='') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('admin/pesananmasuk') ?>" class="nav-link <?php if($this->uri->segment(2)=='pesananmasuk' 
            and $this->uri->segment(1)=='admin') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Pesanan Masuk
              </p>
            </a>
          </li>

          <p class="ml-4">---------- Kelola Barang -----------</p>
          <li class="nav-item">
            <a href="<?=base_url('kategori') ?>" class="nav-link <?php if($this->uri->segment(1)=='kategori') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>

          
         

          <li class="nav-item">
            <a href="<?=base_url('rekening') ?>" class="nav-link <?php if($this->uri->segment(1)=='rekening') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fa fa-fax"></i>
              <p>
                Rekening
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="<?=base_url('barang') ?>" class="nav-link <?php if($this->uri->segment(1)=='barang') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Barang
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('gambarbarang') ?>" class="nav-link <?php if($this->uri->segment(1)=='gambarbarang') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-images"></i>
              <p>
               Gambar Barang
              </p>
            </a>
          </li>

        
          <li class="nav-item">
            <a href="<?= base_url('admin/setting')?>" class="nav-link <?php if($this->uri->segment(2)=='setting') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Setting
                              </p>
            </a>
          </li>

          <p class="ml-4">--------------- User ------------------</p>
          <li class="nav-item">
            <a href="<?= base_url('user')?> " class="nav-link <?php if($this->uri->segment(1)=='user') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Admin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('datapelanggan')?> " class="nav-link <?php if($this->uri->segment(1)=='datapelanggan') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Pelanggan
              </p>
            </a>
          </li>
          <p class="ml-4">------------- Rincian ----------------</p>
          
          <li class="nav-item">
            <a href="<?= base_url('rincian')?> " class="nav-link <?php if($this->uri->segment(1)=='rincian') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Rincian Order
              </p>
            </a>
          </li>

          <p class="ml-4">------------- Laporan ----------------</p>
          
          <li class="nav-item">
            <a href="<?= base_url('laporan')?> " class="nav-link <?php if($this->uri->segment(1)=='laporan') {
                                                                echo"active";}
                                                                ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <p class="ml-4">-----------------------------------------</p>


      

          
         

            
          


          <li class="nav-item">
            <a href="<?=base_url('auth/logout_admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">