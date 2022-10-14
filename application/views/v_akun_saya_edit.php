<div class="container mt-5 justify">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-solid border-light">
        <div class="card-body pb-0">
          <?php
          if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
            echo $this->session->flashdata('pesan');
            echo '</h5></div>';
          }
          if ($this->session->flashdata('pesan1')) {
            echo '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>';
            echo $this->session->flashdata('pesan1');
            echo '</h5></div>';
          }
          ?>
          <div class="form-group">
            <?php echo form_open_multipart('akun/ubah/' . $akun->id_pelanggan) ?>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group mt-3">
                  <label>Email</label>
                  <input type="email" name="email" value="<?= $akun->email ?>" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group ">
                  <label>Nama Pelanggan</label>
                  <input type="text" name="nama_pelanggan" value="<?= $akun->nama_pelanggan ?>" class="form-control" placeholder="Nama Pelanggan" required>
                </div>
                <div class="form-group ">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group ">
                  <label>Upload Gambar(Max 2MB) : </label>

                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar" id="preview_gambar">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <!-- <label>Upload Gambar(Max 2MB) : </label>
                  <input class="custom-file-input" type="file" name="gambar" id="preview_gambar" width="400px"> -->
                </div>
              </div>



              <div class="col-lg-6 mt-4">
                <div class="form-group">
                  <?php $gam = $this->m_pelanggan->get_datagambar();
                  if ($gam->gambar == "") { ?>
                    <img src="<?= base_url('assets/gambar/noimage.jpg') ?>" class="container rounded-circle " id="load_gambar" width="300px">
                  <?php } else { ?>
                    <img src="<?= base_url('assets/pelanggan/' . $akun->gambar) ?>" class="container rounded-circle " id="load_gambar">
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="<?= base_url('/') ?>" class="btn btn-warning btn-sm">Kembali</a>
            <?php echo form_close() ?>
          </div>

        </div>
      </div>
      <br>

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