<body>
    <header class="header clearfix ">
        <div class="top-bar d-none d-sm-block bg-primary text-white">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">

                    </div>
                    <div class="col-6 text-right">
                        <ul class="top-links account-links">

                            <li class="nav-item dropdown">
                                <?php if ($this->session->userdata('email') == "") { ?>
                                    <a class="nav-link" href="<?= base_url('pelanggan/login') ?>">
                                        <i class="fa fa-power-off text-white"></i> <span class="brand-text text-white">Login</span>
                                    </a>
                                <?php } else { ?>

                                    <a class="nav-link" data-toggle="dropdown" href="#">

                                        <?php $gam = $this->m_pelanggan->get_datagambar();

                                        if ($gam->gambar == "") { ?>
                                            <i class="fa-solid fa-circle-user text-white"></i>
                                        <?php } else if ($gam->gambar == $gam->gambar) { ?>
                                            <img src="<?= base_url('assets/pelanggan/' . $akun->gambar) ?>" class="rounded-circle" width="25px" height="25px" alt="Gambar Kosong">
                                        <?php }
                                        $gam = $this->m_pelanggan->get_datagambar(); ?>


                                        <span id="text-pelanggan" class="text-white pelanggan-text"> <?= $gam->nama_pelanggan ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        <a href="<?= base_url('akun') ?> " class="dropdown-item">
                                            <i class="fa-solid fa-user"></i> Akun Saya </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?= base_url('pesanan_saya') ?> " class="dropdown-item">
                                            <i class="fas fa-shopping-cart "></i> Pesanan Saya
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item">
                                            <i class="fa fa-power-off"></i> <span> Log out</a>
                                    </div>


                                <?php } ?>
                                <!-- <?php echo $akun->slug ?> -->
                            </li>
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
                        <a class="navbar-brand " href="<?= base_url("/") ?>">
                            <i class="fa-solid fa-shop fa-3x"></i> <span class="logo">Berkah Komputer</span>
                        </a>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">

                    </div>



                    <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <?php if ($this->session->userdata('email') == "") { ?>
                                <div class="nav-item dropdown single-icon shopping-cart mr-2">
                                    <a lass="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart fa-2x"></i></a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        <a href='#' class="dropdown-item">
                                            <center>
                                                <p>Harus Login</p>
                                            </center>
                                        </a>
                                    <?php } else { ?>
                                        <div class="nav-item dropdown single-icon shopping-cart mr-2">
                                            <a lass="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart fa-2x"></i></a>
                                            <span class="badge badge-danger"><?= $jumlah_item ?></span>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                <?php if (empty($keranjang)) { ?>
                                                    <a href='#' class="dropdown-item">
                                                        <center>
                                                            <p>Keranjang Kosong</p>
                                                        </center>
                                                    </a>
                                                    <?php } else {
                                                    foreach ($keranjang as $key => $value) {
                                                        $barang = $this->m_home->detail_barang($value['id']);
                                                    ?>
                                                        <a href="#" class="dropdown-item">
                                                            <div class="media">
                                                                <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" alt="User Avatar" class="img-size-50 mt-2 mr-2" height="60px" width="60px">
                                                                <div class="media-body">

                                                                    <h5 class="dropdown-item-title ml-3">
                                                                        <?= $value['name'] ?>
                                                                    </h5>

                                                                    <p class="text-sm ml-3"><?= $value['qty'] ?> x Rp. <?= number_format($value['price'], 0) ?></p>
                                                                    <p class="text-sm text-muted ml-3"><i></i> Rp. <?= $this->cart->format_number($value['subtotal']); ?></p>
                                                                </div>
                                                            </div>
                                                            <!-- Message End -->
                                                        </a>
                                                    <?php } ?>
                                                    <div class="dropdown-divider"></div>
                                                    <span class="dropdown-item">
                                                        <div class="media-body text-center">
                                                            <p class="text-muted">
                                                            <p><strong>Total</strong> Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>
                                                            <p>
                                                        </div>
                                                    </span>
                                                    <div class="dropdown-divider"></div>

                                                    <center><a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">View Cart</a></center>
                                                    <div class="dropdown-divider"></div>
                                                    <center> <a href="<?= base_url('belanja/checkout') ?>" class="dropdown-item dropdown-footer">Checkout</a></center>
                                                <?php } ?>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-main navbar-expand-lg navbar-white border-top border-bottom">
                    <div class="container">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="<?= base_url("/") ?>">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('home/produk') ?>">Produk</a>
                                </li>

                            </ul>
                        </div> <!-- collapse .// -->
                    </div> <!-- container .// -->
                </nav>
    </header>