<!-- Default box -->
<div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang ?></h3>
              <div class="col-12">
                <img src="<?=base_url('assets/gambar/'.$barang->gambar)?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active" ><img src="<?=base_url('assets/gambar/'.$barang->gambar)?>" alt="Product Image"></div>
                <?php foreach ($gambar as $key => $value) { ?>
                    <div class="product-image-thumb" ><img src="<?=base_url('assets/gambarbarang/'.$value->gambar)?>" alt="Product Image"></div>
                
                <?php } ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?= $barang->nama_barang ?></h3>
              <hr>
              <h4><?= $barang->nama_kategori ?></h4>
              <p><?= $barang->deskripsi ?></p>

              <hr>
              
            

              <div class="bg-white py-2 mt-3">
                <h3 class="mb-0">
                  Rp. <?= number_format($barang->harga,0) ?>
                </h3>
                
              </div>
              <hr>  
              <?php
             
              echo form_open('belanja/add');
              echo form_hidden('id',$barang->id_barang);
              echo form_hidden('price',$barang->harga);
              echo form_hidden('name',$barang->nama_barang);
              echo form_hidden('redirect_page',str_replace('index.php/', '', current_url()));
              ?>
              <h3>Stock Tersisa <?= $barang->stock ?><h3>
                <?php if ($barang->stock==0) { ?>
                 
                <?php }else { ?>
                  <div class="row">
               <div class="col-sm-3">
                    <input type="number" name="qty" class="form-control" value="1" min="1">
               </div>
                 <div class="col-sm-6">
                 <button type="submit" class="kotak btn btn-primary swalDefaultSuccess">
                  <i class="fas fa-cart-plus fa-lg mr-2 "></i>
                  Add to Cart
                </button>
                
                 </div>

               </div>
                
               <?php } ?>
              <div class="kotak mt-4">
               

                  <?php echo form_close(); ?>
              

            </div>
            
          </div>

        </div>
       
        <a href="<?=base_url() ?>" rel="noopener"  class="border border-dark btn btn-light float-right"><i class="fas fa-reply"></i> Kembali</a>

        <!-- /.card-body -->
      </div>
      </div>
      <!-- /.card -->


<script src="<?= base_url()?>template/dist/js/demo.js"></script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
<script src="<?=base_url()?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
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

   
      <script src="<?= base_url()?>template/dist/js/bootstrap-input-spinner.js"> </script>
      <script>
      $('input[type=number]').inputSpinner()
      </script>
