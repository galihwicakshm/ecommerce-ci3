<div class="col-12">
  <!-- Main content -->
  <div class="card card-primary">

    <div class="card-body">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fas fa-shopping"></i> <?= $title ?>
            <small class="float-end">Tahun : <?= $tahun ?></small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->


      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive"><br>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>No Order</th>
                <th>Tanggal Order</th>
                <th>Total Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              $totals = 0;
              foreach ($laporan as $key => $value) {
                $totals = $totals + $value->total_harga;
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $value->no_order ?></td>
                  <td><?= $value->tanggal_order ?></td>
                  <td>Rp. <?= number_format($value->total_harga, 0) ?></td>
                </tr>

              <?php   } ?>






            </tbody>


          </table>
          <h5 class="mt-4">Total Harga : Rp. <?= number_format($totals, 0) ?></h5>
          <button class="btn btn-outline-primary" onclick="window.print()"><i class='bx bx-printer'></i> Print</button>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- /.row -->

      <!-- this row will not appear when printing -->

    </div>
    <!-- /.invoice -->
  </div><!-- /.col -->
</div><!-- /.row -->