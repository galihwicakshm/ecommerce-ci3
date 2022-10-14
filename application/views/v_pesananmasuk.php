<div class="col-sm-12">
  <?php
  if ($this->session->flashdata('pesan')) {
    echo ' <div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   ';
    echo $this->session->flashdata('pesan');
    echo '</div>';
  }
  ?>
  <div class="row">
    <div class="col-12">
      <h3>Pesanan Masuk</h3>
      <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
              Pesanan Masuk
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
              Diproses
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false">
              Dikirim
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-diterima" aria-controls="navs-top-diterima" aria-selected="false">
              Diterima
            </button>
          </li>


          <?php

          if ($dibatalkan_user) { ?>
            <li class="nav-item">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-dibatalkan" aria-controls="navs-top-dibatalkan" aria-selected="false">
                Dibatalkan
              </button>
            </li>

          <?php  } ?>



        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
            <table class="table">
              <tr>

                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Expired Pembayaran</th>
                <th>Ekspedisi</th>
                <th>Total Bayar</th>
                <th></th>

              </tr>
              <?php $tgl = date('Y-m-d');
              foreach ($pesanan as $key => $value) { ?>

                <tr>
                  <td><?= $value->no_order ?></td>


                  <td><?= $value->tanggal_order ?></td>
                  <td><?= $value->tanggal_exp ?></td>
                  <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                    Paket : <?= $value->paket ?> <br>
                    Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                  </td>
                  <td>
                    <b> Rp. <?= number_format($value->total_bayar, 0) ?><b><br>
                        <?php if ($value->status_code == 201 && $tgl >= $value->tanggal_exp || $value->status_code == "" && $tgl >= $value->tanggal_exp) { ?>
                          <span class="badge bg-danger col-sm-10">Dibatalkan</span>
                        <?php } elseif ($value->status_code == 201 && $value->status_bayar == 0) { ?>
                          <span class="badge bg-info col-sm-10"> Pending</span>
                        <?php } elseif ($value->status_code == "" && $value->status_bayar == 0) { ?>
                          <span class="badge bg-warning col-sm-10"> Belum Bayar</span>
                        <?php } else if ($value->status_code == 200 && $value->status_bayar == 1) { ?>
                          <span class="badge bg-success col-sm-10">Sudah Bayar</span><br>
                          <a href="<?= base_url('admin/proses/' . $value->no_order) ?>" class=" btn btn-sm btn-primary mt-1">Proses</a>

                        <?php } ?>


                  </td>
                  <td>

                    <?php if ($value->status_bayar == 0 && $tgl >= $value->tanggal_exp && $value->status_code == "" || $value->status_code == 201) { ?>
                      <button data-toggle="modal" data-target="#batal<?= $value->no_order ?>" class="btn btn-danger btn-sm">Batal</button>
                  </td>




                <?php } ?>

                </td>


                </tr>
              <?php    } ?>

            </table>



          </div>
          <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
            <table class="table">
              <tr>

                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Ekspedisi</th>
                <th>Total Bayar</th>


              </tr>
              <?php foreach ($pesanan_diproses as $key => $value) { ?>
                <tr>
                  <td><?= $value->no_order ?></td>
                  <td><?= $value->tanggal_order ?></td>
                  <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                    Paket : <?= $value->paket ?> <br>
                    Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                  </td>

                  <td>
                    <?php if ($value->status_code == 200) { ?>
                      <button data-toggle="modal" data-target="#kirim<?= $value->no_order ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-paper-plane"></i> Kirim</button>
                    <?php } ?>


                  </td>


                </tr>
              <?php    } ?>

            </table>

          </div>
          <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
            <table class="table">
              <tr>

                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Ekspedisi</th>
                <th>Total Bayar</th>
                <th>No Resi</th>

              </tr>
              <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                <tr>
                  <td><?= $value->no_order ?></td>



                  <td><?= $value->tanggal_order ?></td>
                  <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                    Paket : <?= $value->paket ?> <br>
                    Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                  </td>
                  <td>
                    <b> Rp. <?= number_format($value->total_bayar, 0) ?><b><br>
                        <span class="badge badge-success col-sm-7">Dikirim</span>




                  </td>
                  <td>

                    <h5><b><?= $value->no_resi ?></b></h5>

                  </td>


                </tr>
              <?php    } ?>

            </table>
          </div>
          <div class="tab-pane fade" id="navs-top-diterima" role="tabpanel">
            <table class="table">
              <tr>

                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Ekspedisi</th>
                <th>Total Bayar</th>
                <th>No Resi</th>

              </tr>
              <?php foreach ($pesanan_diterima as $key => $value) { ?>
                <tr>
                  <td><?= $value->no_order ?></td>



                  <td><?= $value->tanggal_order ?></td>
                  <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                    Paket : <?= $value->paket ?> <br>
                    Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                  </td>
                  <td>
                    <b> Rp. <?= number_format($value->total_bayar, 0) ?><b><br>
                        <span class="badge badge-success col-sm-7">Di Terima</span>




                  </td>
                  <td>

                    <h5><b><?= $value->no_resi ?></b></h5>

                  </td>


                </tr>
              <?php    } ?>

            </table>
          </div>
          <div class="tab-pane fade" id="navs-top-dibatalkan" role="tabpanel">
            <table class="table">
              <tr>

                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Ekspedisi</th>
                <th>Total Bayar</th>
                <th>Action</th>


              </tr>

              <?php foreach ($pesanan_dibatalkan as $key => $value) { ?>
                <tr>
                  <td><?= $value->no_order ?></td>

                  <td><?= $value->tanggal_order ?></td>



                  <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                    Paket : <?= $value->paket ?> <br>
                    Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                  </td>
                  <td>
                    <b> Rp. <?= number_format($value->total_bayar, 0) ?><b><br>
                  </td>
                  <td>
                    <button data-toggle="modal" data-target="#delete<?= $value->no_order ?>" class="btn btn-primary btn-sm">Hapus</button>
                  </td>


                </tr>
              <?php    } ?>

            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
</div>
</div>



<!-- /.modal kirim-->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
  <div class="modal fade" id="kirim<?= $value->no_order ?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1"><?= $value->no_order ?></h4>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <?php echo form_open('admin/kirim/' . $value->no_order) ?>
          <table class="table">
            <tr>
              <th>Ekspedisi</th>
              <th>:</th>
              <th><?= strtoupper($value->ekspedisi) ?></th>
            </tr>
            <tr>
              <th>Paket</th>
              <th>:</th>
              <th><?= strtoupper($value->paket) ?></th>
            </tr>
            <tr>
              <th>Ongkir</th>
              <th>:</th>
              <th>Rp. <?= number_format($value->ongkir, 0) ?></th>
            </tr>
            <tr>
              <th>No Resi</th>
              <th>:</th>
              <th><input name="no_resi" class="form-control" placeholder="No Resi" required></th>
            </tr>



          </table>



        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
            Close
          </button> <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>

<?php foreach ($pesanan_dibatalkan as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value->no_order ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete <?= $value->no_order ?></h4>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">


          <h5>Apakah Anda Yakin Untuk Menghapus Pesanan ini?</h5>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
            Close
          </button>
          <a href="<?= base_url('admin/delete/' . $value->no_order) ?>" class="btn btn-primary">Delete</a>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<?php } ?>



<?php foreach ($pembatalan as $key => $value) { ?>
  <div class="modal fade" id="batal<?= $value->no_order ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">Pesanan Dibatalkan</h4>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin pesanan dibatalkan?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
            Close
          </button> <a href="<?= base_url('admin/batal/' . $value->no_order) ?>" class="btn btn-primary">Ya</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>