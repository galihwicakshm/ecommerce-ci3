 <!-- Page Content -->

 <div class="container">
 
<!--digital clock end-->
<div class="row">

  <div class="col-lg-3">

  <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
 
    <h2 class="my-2">Kategori</h2>
    
    <div class="list-group">
      <?php foreach ($kategori as $key => $value) { ?>
        <a href="<?= base_url('home/kategori/'. $value->id_kategori)?>" class="list-group-item"><?= $value->nama_kategori?></a>

     <?php  } ?>
  
    </div>
   

  </div>
  

  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="<?=base_url('carousell/c3.jpg')?>" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?=base_url('carousell/c1.jpg')?>" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?=base_url('carousell/c4.jpg')?>" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

   
  <div class="row">  
    <?php foreach ($barang as $key => $value) { ?>
      <div class="col-lg-4 col-md-6 mb-3">
                     <?php
                         echo form_open('belanja/add');
                         echo form_hidden('id',$value->id_barang);
                         echo form_hidden('qty',1);
                         echo form_hidden('price',$value->harga);
                         echo form_hidden('name',$value->nama_barang);
                         echo form_hidden('redirect_page',str_replace('index.php/', '', current_url()));
                         ?>
                        <div class="card h-100">
                         <center> <img src="<?=base_url('assets/gambar/' . $value->gambar)?>"  class="mt-3"  width="200px"></center>
                           <div class="card-body">   
                          <b> <hr></b>  
                                 <h4 class="card-title ml-1 mb-2"><?=$value->nama_barang?></h4>
                                
                                 </div>
                                 <p class="card-title ml-4"><b> Kategori : </b> <?=$value->nama_kategori ?></p>
                                 <span class="card-text mt-2 ml-4 mb-2 fas fa-coins"> Rp <?=number_format($value->harga,0)?></span>
                                 <div class="card-footer">
                                 <div class="text-right">
                            <a href="<?=base_url('home/detail_barang/'.$value->id_barang)?>" class="mt-2 btn btn-sm btn-info">
                          <i class="fas fa-eye"> Detail</i>
                        </a>
                        <?php if ($this->session->userdata('email')=="") { ?>
                     
                       </button>        
                       <?php } else { ?>
                        <button type="submit" class="mt-2 btn btn-sm btn-success swalDefaultSuccess">
                        <i class="fas fa-cart-plus"> Add</i>
                       </button>      

                     <?php  } ?>

                                </div>
                             </div>
                           </div>
                        <?php echo form_close();?>
                     </div>
                       
                          <?php } ?>

                      </div>
                   </div>
               </div>
           </div>

 <script src="<?=base_url()?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
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
 
        
  


 