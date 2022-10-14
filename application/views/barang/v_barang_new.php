<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Barang</h3>

      <div class="card-tools">
        <a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-primary btn-sm">
          <i class="fas fa-plus"></i> Add</a>
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
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Berat</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Stok</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($barang as $key => $value) { ?>
              <tr>
                <td class=""><?= $no++; ?></td>
                <td class=""><?= $value->nama_barang ?></td>
                <td class=""><?= $value->berat ?> Gram</td>
                <td class=""><?= $value->nama_kategori ?></td>
                <td class="">Rp. <?= number_format($value->harga, 0) ?></td>
                <td class=""><?= ($value->stock) ?></td>
                <td class="">
                  <a href="<?= base_url('barang/edit/' . $value->id_barang) ?>" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i> Edit</a>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=
                                                                                                $value->id_barang ?>"><i class="fas fa-trash"></i> Delete</button>

                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<?php foreach ($barang as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value->id_barang ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1"><?= $value->nama_barang ?></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5>Apakah Anda Yakin Untuk Menghapus Barang ini?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
            Close
          </button>
          <a href="<?= base_url('barang/delete/' . $value->id_barang) ?>" class="btn btn-primary">Delete</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>


<?php } ?>