 <!-- Page Content -->




 <section class="slider-section pt-4 pb-4">
   <div class="container">
     <div class="slider-inner">

       <div class="row">
         <div class="col-12">
           <div class="section-title">
             <center>
               <h2>Trending Items</h2>
             </center>
           </div>
         </div>
       </div>
       <div class="row mt-4">
         <?php foreach ($barang_trend as $key => $value) { ?>
           <div class="col-xl-3 col-lg-4 col-md-4 col-12">
             <div class="single-product mt-4">
               <div class="product-img">
                 <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>">
                   <center><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" class="mt-4" width="200px" height="200px" /></center>
                 </a>
               </div>
               <div class="product-content">
                 <h3 class="ml-2"><a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>"><?= $value->nama_barang ?> </a></h3>
                 <div class="product-price">
                   <?php if ($value->stock <= 10) { ?>
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
     </div>
   </div>
 </section>

 <script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
 <script>
   $(function() {
     var Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
     });

     $('.swalDefaultSuccess').click(function() {
       Toast.fire({
         icon: 'success',
         title: 'Berhasil ditambahkan!'
       })
     });
   });
 </script>