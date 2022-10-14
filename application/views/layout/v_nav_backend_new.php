<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="<?= base_url('admin') ?>" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <div class="container">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
            </div>
          </a>


          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item <?php if ($this->uri->segment(1) == 'admin' and $this->uri->segment(2) == '') {
                                  echo "active";
                                }
                                ?>">
            <a href="<?= base_url('admin') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Layouts -->
          <li class="menu-item <?php if (
                                  $this->uri->segment(2) == 'pesananmasuk'
                                ) {
                                  echo "active";
                                }
                                ?>">
            <a href="<?= base_url('admin/pesananmasuk') ?>" class="menu-link">
              <i class='menu-icon tf-icons bx bx-download'></i>
              <div data-i18n="Layouts">Pesanan Masuk</div>
            </a>


          </li>

          <li class="menu-item <?php if (
                                  $this->uri->segment(1) == 'rincian'
                                ) {
                                  echo "active";
                                }
                                ?>">
            <a href="<?= base_url('rincian') ?>" class="menu-link">
              <i class='menu-icon tf-icon bx bx-box'></i>
              <div data-i18n="Layouts">Rincian Order</div>
            </a>


          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Inventory</span>
          </li>
          <li class="menu-item <?php if ($this->uri->segment(1) == 'kategori' || $this->uri->segment(1) == 'barang' || $this->uri->segment(1) == 'gambarbarang') {
                                  echo "active open";
                                }
                                ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-package"></i>
              <div data-i18n="Account Settings">Barang</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item <?php if ($this->uri->segment(1) == 'kategori') {
                                      echo "active";
                                    }
                                    ?>">
                <a href="<?= base_url("kategori") ?>" class="menu-link">
                  <div data-i18n="Notifications">Kategori Barang</div>
                </a>
              </li>

              <li class="menu-item <?php if ($this->uri->segment(1) == 'barang') {
                                      echo "active";
                                    }
                                    ?>">
                <a href="<?= base_url("barang") ?>" class="menu-link">
                  <div data-i18n="Account">Daftar Barang</div>
                </a>
              </li>
              <li class="menu-item <?php if ($this->uri->segment(1) == 'gambarbarang') {
                                      echo "active";
                                    }
                                    ?>">
                <a href="<?= base_url("gambarbarang") ?>" class="menu-link">
                  <div data-i18n="Notifications">Gambar Barang</div>
                </a>
              </li>

            </ul>
          </li>

          <li class="menu-item <?php if ($this->uri->segment(1) == 'user' || $this->uri->segment(1) == 'datapelanggan') {
                                  echo "active open";
                                }
                                ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Authentications">User</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item  <?php if ($this->uri->segment(1) == 'user') {
                                      echo "active";
                                    }
                                    ?>">
                <a href="<?= base_url('user') ?>" class="menu-link">
                  <div data-i18n="Basic">Admin</div>
                </a>
              </li>
              <li class="menu-item  <?php if ($this->uri->segment(1) == 'datapelanggan') {
                                      echo "active";
                                    }
                                    ?>">
                <a href="<?= base_url('datapelanggan') ?>" class="menu-link">
                  <div data-i18n="Basic">Pelanggan</div>
                </a>
              </li>

            </ul>
          </li>


          <!-- Components -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Lokasi</span></li>
          <li class="menu-item <?php if ($this->uri->segment(2) == 'setting') {
                                  echo "active";
                                }
                                ?>">
            <a href="<?= base_url('admin/setting') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-location-plus"></i>
              <div data-i18n="Basic">Lokasi Toko</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase"><span class="menu-header-text">Keuangan</span></li>
          <li class="menu-item <?php if ($this->uri->segment(1) == 'laporan') {
                                  echo "active";
                                }
                                ?>">
            <a href="<?= base_url('laporan') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dollar"></i>
              <div data-i18n="Basic">Laporan Keuangan</div>
            </a>
          </li>
          <!-- Cards -->


          <!-- Forms & Tables -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Keluar</span></li>
          <!-- Forms -->
          <li class="menu-item">
            <a href="<?= base_url('auth/logout_admin') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Basic">Log Out</div>
            </a>
          </li>


        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->