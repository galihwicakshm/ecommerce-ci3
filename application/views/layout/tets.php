<body>
    <header class="header clearfix">
        <div class="top-bar d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">
                        <ul class="top-links contact-info">
                            <li><i class="fa fa-envelope-o"></i> <a href="#">contact@example.com</a></li>
                            <li><i class="fa fa-whatsapp"></i> +1 5589 55488 55</li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <ul class="top-links account-links">
                            <li><i class="fa fa-user-circle-o"></i> <a href="#">My Account</a></li>
                            <li><i class="fa fa-power-off"></i> <a href="#">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         <?php 
      $keranjang = $this->cart->contents();
      $jumlah_item = 0;
      foreach ($keranjang as $key => $value) {
       $jumlah_item = $jumlah_item + $value['qty'];
      }
      ?>
        <div class="header-main border-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-12 col-sm-6">
                        <a class="navbar-brand mr-lg-5" href="./index.html">
                            <i class="fa fa-shopping-bag fa-3x"></i> <span class="logo">IndoMarket</span>
                        </a>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">
                      
                    </div>
                    <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <div class="nav-item dropdown single-icon shopping-cart">
                                <a data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart fa-2x"></i></a>
                                <span class="badge badge-danger"><?= $jumlah_item?></span>
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
      
            
            
          </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-main navbar-expand-lg navbar-white border-top border-bottom">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">Pages</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="products.html">Products</a>
                                <a class="dropdown-item" href="<?=base_url('home/kategori/')?>"">Product Detail</a>
                                <a class="dropdown-item" href="cart.html">Cart</a>
                                <a class="dropdown-item" href="checkout.html">Checkout</a>
                            </div>
                        </li>
                    </ul>
                </div> <!-- collapse .// -->
            </div> <!-- container .// -->
        </nav>
    </header>
    <!------------------------------------------
    SLIDER
    ------------------------------------------->
   

    <!-- Services -->
    
    <!-- End Services -->
   
    
   
    <!-- Core -->
   
