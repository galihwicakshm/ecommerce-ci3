<div class="container mt-4">
  <div class="row">

    <div class="col-sm-12">

      <?php

      if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
        echo $this->session->flashdata('pesan');
        echo '</h5></div>';
      }
      ?>
      <ul class="nav nav-pills flex-column flex-md-row mb-3" id="custom-tabs-four-tab" role="tablist">
        <li class=" nav-item">

          <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fa-solid fa-clipboard-list"> </i> Pesanan</a>

        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fa-solid fa-box"></i> Dikemas</a>

        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false"><i class="fa-solid fa-truck-arrow-right"></i> Dikirim</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false"><i class="fa-solid fa-clipboard-check"></i> Diterima</a>
        </li>
        <?php if ($dibatalkan) { ?>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-batal-tab" data-toggle="pill" href="#custom-tabs-four-batal" role="tab" aria-controls="custom-tabs-four-batal" aria-selected="false"><i class="fa-solid fa-ban"></i> Pesanan Dibatalkan</a>
          </li>
        <?php } ?>
      </ul>



      <div class="card card-primary card-outline card-outline-tabs">
        <!--  <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Diproses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Diterima</a>
                  </li>
                <?php if ($dibatalkan) { ?>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-batal-tab" data-toggle="pill" href="#custom-tabs-four-batal" role="tab" aria-controls="custom-tabs-four-batal" aria-selected="false">Pesanan Dibatalkan</a>
                  </li>
                  <?php } ?>

                </ul>
              </div> -->
        <div class="ml-4 mr-4">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
              <div class="table-responsive">
                <table class="table" style="overflow-x:auto;">
                  <tr>

                    <th>No Order</th>
                    <!-- <th>Tanggal Order</th> -->
                    <th>Expired Pembayaran</th>
                    <th>Ekspedisi</th>
                    <th>Total Bayar</th>
                    <th>Action</th>

                  </tr>

                  <?php
                  $tgl = date('Y-m-d');
                  foreach ($belum_bayar as $key => $value) { ?>

                    <tr>

                      <td><?= $value->no_order ?></td>


                      <!-- <td><?= $value->tanggal_order ?></td> -->
                      <td><?= $value->tanggal_exp ?></td>
                      <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                        Paket : <?= $value->paket ?> <br>
                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                      </td>
                      <td>
                        <b> Rp. <?= number_format($value->total_bayar, 0) ?><b><br>
                            <?php if ($value->status_code == 201 && $tgl >= $value->tanggal_exp || $value->status_code == "" && $tgl >= $value->tanggal_exp) { ?>
                              <span class="badge badge-danger col-sm-10">Dibatalkan</span>
                            <?php } elseif ($value->status_code == 200 && $value->status_bayar == 1) { ?>
                              <span class="badge badge-success col-sm-10"> Sudah Bayar</span>
                            <?php } elseif ($value->status_code == 201 && $value->status_bayar == 0) { ?>
                              <span class="badge badge-info col-sm-10">Pending</span>
                            <?php } elseif ($value->status_code == "" && $value->status_bayar == 0) { ?>
                              <span class="badge badge-warning col-sm-10"> Belum Bayar</span>
                            <?php } ?>


                      </td>
                      <td>

                        <?php $tgl = date('Y-m-d');
                        if ($tgl >= $value->tanggal_exp) { ?>
                        <?php } ?>
                        <?php $tgl = date('Y-m-d');
                        if ($value->status_code == 201 && $tgl >= $value->tanggal_exp || $value->status_code == "" && $tgl >= $value->tanggal_exp) { ?>
                          Maaf, Pesanan Telah dibatalkan<br>
                          Karena Melebihi Batas Waktu<br>
                          Pembayaran <br>
                        <?php } else if ($value->status_order == 0) { ?>
                          <a href="<?= base_url('pesanan_saya/bayar/' . $value->no_order) ?>" class="rounded btn btn-sm btn-primary mt-2">Detail</a>
                        <?php } ?>
                        <?php if ($value->status_code == 201 && $tgl >= $value->tanggal_exp || $value->status_code == "" && $tgl >= $value->tanggal_exp) { ?>
                          <!-- <p>Tidak Dibatalkan</p> -->
                        <?php } else if ($value->status_code == 201 || $value->status_code == "") { ?>
                          <button data-toggle="modal" data-target="#dibatalkan<?= $value->no_order ?>" class="btn btn-danger btn-sm mt-2">Batal</button>

                        <?php } ?>

                      </td>

                    </tr>
                  <?php    } ?>

                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
              <div class="table-responsive">

                <table class="table">
                  <tr>

                    <th>No Order</th>
                    <th>Tanggal Order</th>
                    <th>Ekspedisi</th>
                    <th>Total Bayar</th>

                  </tr>
                  <?php foreach ($diproses as $key => $value) { ?>
                    <tr>
                      <td><?= $value->no_order ?></td>



                      <td><?= $value->tanggal_order ?></td>
                      <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                        Paket : <?= $value->paket ?> <br>
                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                      </td>
                      <td>
                        <b> Rp. <?= number_format($value->total_bayar, 0) ?><b><br>

                            <span class="badge badge-info col-sm-7">Barang diKemas</span>

                    </tr>
                  <?php    } ?>

                </table>
              </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
              <div class="table-responsive">

                <table class="table">
                  <tr>

                    <th>No Order</th>
                    <th>Tanggal Order</th>
                    <th>Ekspedisi</th>
                    <th>Total Bayar</th>
                    <th>No Resi</th>
                    <th></th>


                  </tr>
                  <?php foreach ($dikirim as $key => $value) { ?>
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
                        <button data-toggle="modal" data-target="#diterima<?= $value->no_order ?>" class="btn btn-primary btn-sm">Diterima</button>
                      </td>




                    </tr>
                  <?php    } ?>

                </table>
              </div>


            </div>
            <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
              <div class="table-responsive">

                <table class="table">
                  <tr>

                    <th>No Order</th>
                    <th>Tanggal Order</th>
                    <th>Ekspedisi</th>
                    <th>Total Bayar</th>
                    <th>No Resi</th>
                    <th>Review</th>


                  </tr>
                  <?php foreach ($diterima as $key => $value) { ?>
                    <tr>
                      <td><?= $value->no_order ?></td>



                      <td><?= $value->tanggal_order ?></td>
                      <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                        Paket : <?= $value->paket ?> <br>
                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                      </td>
                      <td>
                        <b> Rp. <?= number_format($value->total_bayar, 0) ?><b><br>
                            <span class="badge badge-success col-sm-7">Diterima</span>
                      </td>
                      <td>
                        <h5><b><?= $value->no_resi ?></b></h5>
                      </td>
                      <td> <a href="<?= base_url('pesanan_saya/review/' . $value->no_order) ?>" class="rounded btn btn-sm btn-primary mt-2">Berikan Ulasan</a>
                      </td>

                    </tr>
                  <?php    } ?>

                </table>
              </div>
            </div>

            <div class="tab-pane fade" id="custom-tabs-four-batal" role="tabpanel" aria-labelledby="custom-tabs-four-batal-tab">
              <div class="table-responsive">

                <table class="table">
                  <tr>

                    <th>No Order</th>
                    <th>Tanggal Order</th>
                    <th>Ekspedisi</th>
                    <th>Total Bayar</th>



                  </tr>

                  <?php foreach ($dibatalkan as $key => $value) { ?>
                    <tr>
                      <td><?= $value->no_order ?></td>

                      <td><?= $value->tanggal_order ?></td>



                      <td><b><?= strtoupper($value->ekspedisi) ?> </b><br>
                        Paket : <?= $value->paket ?> <br>
                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                      </td>
                      <td>
                        <b> Rp. <?= number_format($value->total_bayar, 0) ?><b><br>



                    </tr>
                  <?php    } ?>

                </table>
              </div>

            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>



</div>



<?php foreach ($dikirim as $key => $value) { ?>
  <div class="modal fade" id="diterima<?= $value->no_order ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pesanan Diterima</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin pesanan sudah diterima?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <a href="<?= base_url('pesanan_saya/diterima/' . $value->no_order) ?>" class="btn btn-primary">Ya</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>

<?php foreach ($batal as $key => $value) { ?>
  <div class="modal fade" id="dibatalkan<?= $value->no_order ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pesanan Dibatalkan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin pesanan dibatalkan?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <a href="<?= base_url('pesanan_saya/batal/' . $value->no_order) ?>" class="btn btn-primary">Ya</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>

<!-- <?php foreach ($batal as $key => $value) { ?> -->
<div class="modal fade" id="prdkrev" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        echo form_open('kategori/add');
        ?>
        <div class="row">
          <div class="col mb-3">
            <label for="nameBasic" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" placeholder="Input Nama Kategori" required>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php
        echo form_close();
        ?>
      </div>
    </div>
  </div>
</div>
<!-- <?php } ?> -->




</div>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove()
    });
  }, 3000)
</script>