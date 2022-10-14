<div class="col-md-12">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lokasi Toko Website</h3>
                 </div>
              <!-- /.card-header -->
                <div class="card-body"> 

                    <?php 
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</h5></div>';
                        }
                    echo form_open('admin/setting');?>
                <div class="row">
                <div class="col-sm-6">
                      <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>
                        
                            </div>
                         </div>
                         <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kota</label>
                                     <select name="kota" class="form-control">
                                     </select>
                            </div>
                        </div>
                     </div>
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group">
                                 <label>Nama Toko</label>
                                <input type="text" name="nama_toko" class="form-control" value="<?=$setting->nama_toko?>" required>                            
                                 </div>
                            </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                 <label>No Telpon</label>
                                <input type="text" name="no_telpon" class="form-control" value="<?=$setting->no_telpon?>"required>                            
                                 </div>
                              </div>
                             </div>
                         
                         <div class="form-group">
                        <label>Alamat</label>
                         <input type="text" name="alamat_toko" class="form-control" value="<?=$setting->alamat_toko?>"required>                            
                        </div>
                        <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="<?=base_url('admin')?>" class="btn btn-warning btn-sm">Kembali</a>
                         </div>
               <?php 
               echo form_close(); ?>      
              </div>
        </div>
    </div>

<script>

    $(document).ready(function() {
        $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        success: function(hasil_provinsi){
            $("select[name=provinsi]").html(hasil_provinsi);
        }
    });
    $("select[name=provinsi").on("change",function(){
        var id_provinsi_pilih = $("option:selected",this).attr("id_provinsi");
        $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/kota') ?>",
        data: 'id_provinsi=' + id_provinsi_pilih,
        success: function(hasil_kota){
            console.log(hasil_kota)
            $("select[name=kota]").html(hasil_kota);
           

        }
        });
    });

    });

</script>


