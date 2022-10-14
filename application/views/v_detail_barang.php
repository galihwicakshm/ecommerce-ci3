 <section class="slider-section product-page">
     <div class="container">
         <div class="row slider-inner">
             <div class="col-lg-6 col-md-6 col-12">
                 <div id="product-images" class="carousel slide" data-ride="carousel">
                     <!-- slides -->
                     <div class="carousel-inner">
                         <div class="carousel-item active mt-4"> <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" alt="Product 1"> </div>
                         <?php foreach ($gambar as $key => $value) { ?>
                             <div class="carousel-item"><img src="<?= base_url('assets/gambarbarang/' . $value->gambar) ?>" alt="Product Image"></div>
                         <?php } ?>
                     </div> <!-- Left right -->
                     <a class="carousel-control-prev" href="#product-images" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#product-images" data-slide="next"> <span class="carousel-control-next-icon"></span> </a><!-- Thumbnails -->


                     <ol class="carousel-indicators list-inline">
                         <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#product-images"> <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" class="img-fluid"> </a> </li>
                         <?php $i = 1;
                            foreach ($gambar as $key => $value) { ?>

                             <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="<?= $i++ ?>" data-target="#product-images"> <img src="<?= base_url('assets/gambarbarang/' . $value->gambar) ?>" class="img-fluid"> </a> </li>
                         <?php } ?>
                     </ol>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-12">
                 <div class="product-detail">
                     <h2 class="product-name mt-4"><?= $barang->nama_barang ?></h2>
                     <div class="product-price">
                         <span class="price">Rp.<?= number_format($barang->harga, 0) ?> </span>
                         <!-- <span class="price-muted">IDR 499.000</span> -->
                     </div>
                     <div class="product-short-desc mt-5 mb-5">
                         <span> <?= $barang->deskripsi_singkat ?>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, tempore!
                         </span>

                         <br>
                         ID PRODUK





                     </div>
                     <?php
                        echo form_open('belanja/add');
                        echo form_hidden('id', $barang->id_barang);
                        echo form_hidden('price', $barang->harga);

                        echo form_hidden('name', $barang->nama_barang);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>
                     <div class="product-select">


                         <?php if ($barang->stock == 0) { ?>
                             <h6>Maaf, barang sudah habis</h6>

                         <?php } else { ?>
                             <div class="row mt-2">
                                 <div class="col-4">
                                     <input type="number" name="qty" class="form-control" value="1" min="1" max="<?= $barang->stock ?>">
                                 </div>
                                 <div class="stok mt-2">
                                     Stok <b><?= $barang->stock ?></b>
                                 </div>
                                 <div class="col-md-12 mt-4 mb-2">
                                     <?php if ($this->session->userdata('email') == '') { ?>
                                         <a href="<?= base_url('pelanggan/login') ?>" class="kotak btn btn-primary">Keranjang</a>
                                     <?php } else { ?>
                                         <button type="submit" class="kotak btn btn-primary swalDefaultSuccess">Keranjang</button>
                                     <?php } ?>
                                 </div>
                             </div>
                         <?php } ?>
                         <?php echo form_close(); ?>

                         <div class="product-categories">
                             <ul>
                                 <li class="categories-title">Categories :</li>
                                 <li><a href="<?= base_url('home/kategori_filter/' . $barang->id_kategori) ?>"><?= $barang->nama_kategori ?></a></li>
                             </ul>
                         </div>

                     </div>
                 </div>
             </div>
             <div class="col-12 mt-5">
                 <div class="product-details">
                     <div class="nav-wrapper">
                         <ul class="nav nav-pills nav-fill mt-5">
                             <li class="nav-item">
                                 <span class="nav-link mb-sm-3 mb-md-0 active col-12">Deskripsi</span>
                             </li>

                         </ul>
                     </div>
                     <!-- <div class="card border-light">
                         <div class="card-body ">
                             <div class="tab-content" id="myTabContent"> -->
                     <textarea disabled class="form-control" name="" cols="10" rows="10"> <?= $barang->deskripsi ?></textarea>
                     <p>
                     </p>
                     <!-- </div>
                         </div>
                        
                 </div> -->
                 </div>

             </div>
 </section>
 <script src="<?= base_url() ?>template/dist/js/demo.js"></script>
 <script>
     $(document).ready(function() {
         $('.product-image-thumb').on('click', function() {
             var $image_element = $(this).find('img')
             $('.product-image').prop('src', $image_element.attr('src'))
             $('.product-image-thumb.active').removeClass('active')
             $(this).addClass('active')
         })
     })
 </script>
 <script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
 <script>
     $(function() {
         var Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 6000
         });

         $('.swalDefaultSuccess').click(function() {
             Toast.fire({
                 icon: 'success',
                 title: 'Barang berhasil ditambahkan!'
             })
         });
     });
 </script>
 <script>




 </script>
 <script src="<?= base_url() ?>template/dist/js/bootstrap-input-spinner.js"> </script>
 <script>
     $('input[type=number]').inputSpinner()
 </script>