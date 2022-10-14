<!-- Navbar -->

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
<div class="container">
 <body onload="initClock()">

<!--digital clock start-->


   
    <a class="navbar-brand col-1 mr-5"></a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        
        <ul class="navbar-nav">
          <li class=" nav-item ">
            <a href="<?= base_url()?>" class="navbar-brand mr-4">
            Home</a>
          </li>
          <li class=" nav-item">
          <a class="navbar-brand" href="<?= base_url('profilecom')?>">Profile</a>
          </li>
        </ul>

     

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->

        <li class="nav-item dropdown">
        <?php if ($this->session->userdata('email')=="") { ?>
          <a class="nav-link"  href="<?= base_url('pelanggan/login') ?>">
       <i class="fa-solid fa-user"></i> <span class="brand-text ">Login</span>
      </a>
         <?php } else { ?>
          <a class="nav-link" data-toggle="dropdown" href="#">
        <span class="brand-text font-weight-dark"><?= $this->session->userdata('nama_pelanggan') ?></span>
      </a>
    
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('akun') ?> " class="dropdown-item">
              <i class="fas fa-user "></i> Akun Saya
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pesanan_saya') ?> " class="dropdown-item">
              <i class="fas fa-shopping-cart "></i> Pesanan Saya
            </a>
            
            <div class="dropdown-divider"></div>
            <a href="<?=base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Log out</a>
          </div>
       

          <?php } ?>
      </li>

      <?php 
      $keranjang = $this->cart->contents();
      $jumlah_item = 0;
      foreach ($keranjang as $key => $value) {
       $jumlah_item = $jumlah_item + $value['qty'];
      }
      ?>

      <?php if ($this->session->userdata('email')=="") { ?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-shopping-cart"></i></a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <a href='#' class="dropdown-item">
                <center><p>Harus Login</p></center>
            </a>         
            </div>
            <?php } else { ?>
            
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-shopping-cart "></i>
            <span class="badge badge-danger navbar-badge "><?= $jumlah_item?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         

          <?php if(empty($keranjang)) { ?>
            <a href='#' class="dropdown-item">
                <center><p>Keranjang Kosong</p></center>
            </a>
            <?php } else {
             foreach ($keranjang as $key => $value) { 
                $barang = $this->m_home->detail_barang($value['id']);
              
              ?>      
          <div class="dropdown-divider"></div>
          
            <a href="#" class="dropdown-item">
              <div class="media">
                <img src="<?=base_url('assets/gambar/'.$barang->gambar)?>" alt="User Avatar" class="img-size-50 mr-2">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                   <?= $value['name']?>
                  </h3>
                  <p class="text-sm"><?=$value['qty'] ?> x Rp. <?=number_format($value['price'],0) ?></p>
                  <p class="text-sm text-muted"><i class="fas fa-coins"></i> Rp. <?=$this->cart->format_number($value['subtotal']); ?></p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body text-center">
                <tr>
                  <td colspan="2"> </td>
                 <td class="center"><strong>Total</strong></td>
                 <td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                  </tr>
                 </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            
            <a href="<?=base_url('belanja')?>" class="dropdown-item dropdown-footer">View Cart</a>
            <a href="<?=base_url('belanja/checkout')?>" class="dropdown-item dropdown-footer">Checkout</a>

          <?php }?>
          <?php } ?>
            
            
          </div>
       
        <!-- Notifications Dropdown Menu -->
    
       
      </ul>
      
    </div>
    
  </nav>
  
  
  
    <!-- /.navbar -->
              <div class="aja">gg</div>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
<!--<h1 class="m-0"><?=$title ?></h1>-->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Artomoro </a></li>
              <li class="breadcrumb-item"><a href="#"><?=$title?></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
    
    <div class="container">

