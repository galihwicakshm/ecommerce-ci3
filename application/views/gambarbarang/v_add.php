<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Gambar Barang : <?= $barang->nama_barang ?> </h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php
                if ($this->session->flashdata('pesan')) {
                       echo ' <div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   ';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
                ?>
                   <?php
              //notif form kosong
              echo validation_errors('<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i>','</h5></div>'); 

              //notif gagal upload
              if (isset($error_upload)) {
                  echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>'.$error_upload.'</h5></div>';
              }
              echo form_open_multipart('gambarbarang/add/'.$barang->id_barang) ?>
              <div class="row">
                <div class="col-sm-4">
                <div class="form-group">
                        <label>Keterangan Gambar</label>
                            <input name="ket" class="form-control" placeholder="Keterangan Barang" value="<?= set_value('ket')?>">
                        </div>
                </div>
                
              <div class="col-sm-4">
              <div class="form-group">
                     <label class="mt-2">Upload Gambar(Max 2MB) : </label>
                     <input type="file" name="gambar" id="preview_gambar" width="200px" required>
                    </div>
              </div>
             

              <div class="col-sm-4">
              <div class="form-group mr-2">
                     <img class="mr-2" src="<?= base_url('assets/gambar/noimage.jpg') ?>" id="load_gambar" width="200px">
                     </div>
              </div>     
               
             </div>
             <p class="text-danger">*Disarankan untuk upload gambar dengan ukuran pixel 500x500<p>


            
              <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="<?= base_url('gambarbarang')?>" class="btn btn-warning btn-sm">Kembali</a>
                         </div>
                         
              <?php echo form_close() ?>
              <hr>
              <div class="row">
                <?php foreach ($gambar as $key => $value) { ?>
                  <div class="col-sm-3">
                  <div class="form-group">
                     <img  src="<?= base_url('assets/gambarbarang/'. $value->gambar) ?>" id="load_gambar" width="250px" height="250px">
                     </div>
                     <p class="text-center" for> <?= $value->ket?></p>
                     <button data-toggle="modal" data-target="#delete<?=$value->id_gambar?>" class="btn btn-danger btn-sm btn-block"><i class="fas fa-trash">  </i> Delete</a>      
              </div>    
               <?php } ?>

                
             </div>

              </div>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

      





          <?php foreach ($gambar as $key => $value){ ?>

      <div class="modal fade" id="delete<?=$value->id_gambar?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Delete <?= $value->ket?></h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <h5>Apakah Anda Yakin Untuk Menghapus Kategori ini?</h5>
                              <div class="form-group">
                              <center><img  src="<?= base_url('assets/gambarbarang/'. $value->gambar) ?>" id="load_gambar" width="250px" height="250px"></center>
                              </div>

                              </div>
                              <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             <a href="<?=base_url('gambarbarang/delete/'.$value->id_barang.'/'.$value->id_gambar)?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
  <?php } ?>
  

    
          <script>
    function bacaGambar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#load_gambar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    
        
    }
    $('#preview_gambar').change(function(){
        bacaGambar(this);
    });
</script>
