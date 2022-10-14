<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Edit Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            //notif form kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i>', '</h5></div>');

            //notif gagal upload
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>' . $error_upload . '</h5></div>';
            }
            echo form_open_multipart('barang/edit/' . $barang->id_barang) ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $barang->nama_barang ?>" required>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" min="0" name="stock" class="form-control" placeholder="Stok Barang" value="<?= $barang->stock ?>" required>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Status Barang</label>
                        <select name="status_barang" class="form-control">
                            <option value="1">Trend</option>
                            <option value="0">Tidak Trend</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="<?= $barang->id_kategori ?>"><?= $barang->nama_kategori ?></option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" class="form-control" placeholder="Harga Barang" value=<?= $barang->harga ?> required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Berat (Gr)</label>
                        <input name="berat" class="form-control" placeholder="Berat Barang dalam Gram" value="<?= $barang->berat ?>" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Deskripsi Singkat</label>
                <textarea name="deskripsi_singkat" class="form-control" cols="30" rows="6" placeholder="Deskripsi"> <?= $barang->deskripsi_singkat ?></textarea>
            </div>
            <div class="form-group">
                <label>Deskripsi Barang</label>
                <textarea name="deskripsi" class="form-control" cols="30" rows="6" placeholder="Deskripsi"> <?= $barang->deskripsi ?></textarea>
            </div>


            <hr>
            <p class="text-danger">*Disarankan untuk upload gambar dengan ukuran pixel 500x500
            <p>

            <div class="form-group mt-3">
                <label class="mr-2">Upload Gambar(Max 2MB) : </label>
                <input type="file" name="gambar" id="preview_gambar" width="400px">
                <p class="col-sm-6 text-lg-center">
            </div>

            <div class="form-group mt-3">
                <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" id="load_gambar" width="400px">
            </div>
        </div>



    </div>
    <hr>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="<?= base_url('barang') ?>" class="btn btn-warning btn-sm">Kembali</a>
    </div>



    <?php echo form_close() ?>
</div>

</div>
</div>


<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#load_gambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }


    }
    $('#preview_gambar').change(function() {
        bacaGambar(this);
    });
</script>