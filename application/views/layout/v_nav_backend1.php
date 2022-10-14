<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">David Grey. H</span>
                <span class="text-secondary text-small">Project Manager</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
         
          <li class="nav-item">
          <a href="<?= base_url('user')?> " class="nav-link <?php if($this->uri->segment(1)=='user') {
                                                                echo"active";}
                                                                ?>">
           <span class="menu-title">User</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
          <a href="<?=base_url('kategori') ?>" class="nav-link <?php if($this->uri->segment(1)=='kategori') {
                                                                echo"active";}
                                                                ?>">              
            <span class="menu-title">Kategori</span>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?=base_url('barang') ?>" class="nav-link <?php if($this->uri->segment(1)=='barang') {
                                                                echo"active";}
                                                                ?>">
            <span class="menu-title">Barang</span>
              <i class="mdi mdi-cube-outline menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <span class="menu-title">Tables</span>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>
          </li>
         
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel ml-2 mt-2">
      
          <div class="row">
            <div class="col-12">
      