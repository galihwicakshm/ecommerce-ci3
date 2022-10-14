 <section class="products-grid pb-4 pt-4">
     <div class="container">
         <div class="row">
             <div class="col-lg-3 col-md-4 col-12">
                 <div class="sidebar">
                     <div class="sidebar-widget">
                         <div class="widget-title">
                             <h3>Shop by Price</h3>
                         </div>
                         <div class="widget-content shop-by-price">
                             <form method="GET" action="<?= site_url('/home/kategori_price') ?>">
                                 <div class="price-filter">
                                     <div class="price-filter-inner">
                                         <div id="slider-range"></div>
                                         <div class="price_slider_amount">
                                             <div class="label-input">
                                                 <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                                 <button type="submit">Filter</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                     <div class="sidebar-widget">
                         <div class="widget-title">
                             <h3>Categories</h3>
                         </div>
                         <div class="widget-content widget-categories" id="category">

                             <ul>
                                 <?php $kategori = $this->m_home->get_all_data_kategori();
                                    foreach ($kategori as $key => $value) { ?>


                                     <li><a href="<?= base_url('home/kategori_filter/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></li>

                                 <?php } ?>
                             </ul>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="col-lg-9 col-md-8 col-12">
                 <div class="row">
                     <div class="col-12">
                         <div class="products-top">
                             <div class="products-top-inner mb-3">
                                 <div class="products-found">
                                     <p><span><?= $total_barang ?></span> produk ditemukan </p>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">

                     <?php foreach ($barang as $key => $value) { ?>
                         <div class="col-lg-4 col-md-6 col-12">

                             <div class="single-product">
                                 <div class="product-img">
                                     <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>">
                                         <center><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" class="mt-4" width="200px" height="200px" /></center>
                                     </a>
                                 </div>
                                 <div class="product-content">
                                     <h3 class="ml-2"><a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>"><?= $value->nama_barang ?> </a></h3>
                                     <div class="product-price">
                                         <?php if ($value->stock < 10) { ?>
                                             <h6 class="ml-2 stock-tipis"> <b>Stock <?= $value->stock ?></b></h6>
                                         <?php  } else { ?>
                                             <h6 class="ml-2 stock-banyak"> <b>Stock <?= $value->stock ?></b></h6>
                                         <?php } ?>
                                         <h6 class="ml-2"> <b>Rp. <?= number_format($value->harga, 0) ?></b></h6>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>
                 </div>
                 <div class="row">
                     <div class="col-12">

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>