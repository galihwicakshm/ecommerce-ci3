<div class="col-12">
  <!-- Main content -->
  <div class="card card-primary">

    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fas fa-shopping"></i> <?= $title ?>
            <small class="float-end">Tanggal: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
          </h4>
        </div>
        <!-- /.col -->
      </div>



      <div class="row">
        <div class="col-12 table-responsive"><br>
          <table class="table" id="example">
            <thead>
              <tr>
                <th>No</th>
                <th>No Order</th>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total Harga</th>
              </tr>
            </thead>
            <tbody>

              <?php $i = 1;
              $totals = 0;
              $tsemua = 0;
              foreach ($laporan as $key => $value) {
                $tsemua = $value->qty * $value->harga;
                $totals = $totals + $tsemua;
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $value->no_order ?></td>
                  <td><?= $value->nama_barang ?></td>
                  <td>Rp. <?= number_format($value->harga, 0) ?></td>
                  <td><?= $value->qty ?></td>
                  <td>Rp. <?= number_format($tsemua, 0) ?></td>
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
<script>
  $(function() {
    $("#example").DataTable({
      "responsive": true,
      "autoWidth": false,
      dom: 'Bfrtip',
      buttons: [
        'csv', 'excel'
      ]
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