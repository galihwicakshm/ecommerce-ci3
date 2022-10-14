<h3>Rincian Orderan</h3>

<div class="col-md-12">
  <div class="card card-primary">

    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="example1">
          <thead class="text-center">
            <tr>
              <th>Nama Pembeli</th>
              <th>No Order</th>
              <th>Tanggal Order</th>
              <th>Status Bayar</th>
              <th>Detail Rincian</th>
            </tr>
          </thead>
          <tbody>
            <?php $tgl = date('Y-m-d');
            foreach ($rinci as $key => $value) { ?>
              <tr>
                <td><?= $value->nama_penerima ?></td>
                <td><?= $value->no_order ?></td>
                <td><?= $value->tanggal_order ?></td>
                <td>
                  <?php if ($value->status_bayar == 0 && $value->status_order == 4) : ?>
                    <span class="badge bg-danger"> Pesanan Dibatalkan Pelanggan</span><br>
                  <?php elseif ($value->status_code == 201 && $tgl >= $value->tanggal_exp || $value->status_code == "" && $tgl >= $value->tanggal_exp) :  ?>
                    <span class="badge bg-danger"> Dibatalkan ( EXP )</span>
                  <?php elseif ($value->status_bayar == 0 && $tgl <= $value->tanggal_exp && $value->status_code == "") : ?>
                    <span class="badge bg-warning">Belum Bayar</span>
                  <?php elseif ($value->status_bayar == 0 && $value->status_code == 201) : ?>
                    <span class="badge bg-info">Pending</span>
                  <?php elseif ($value->status_bayar == 1 && $value->status_code == 200) : ?>
                    <span class="badge bg-success">Sudah Dibayar</span><br>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="<?= base_url('rincian/order/' . $value->no_order) ?>" class="btn btn-danger btn-sm"><i class="fas fa-eye"></i></a>
                </td>
              </tr>
            <?php      } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>