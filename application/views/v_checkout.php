<div class="container mt-5 justify">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-solid">
        <div class="card-body pb-0">
          <h4>
            <small>Tanggal : <?= date('d-m-y') ?></small>
            <br>

            <?php
            $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
            ?>

          </h4>

          <!-- /.col -->

          <!-- info row -->
          <!-- /.row -->
          <!-- Table row -->
          <div class="row">

            <div class="col-12 table-responsive mt-3">
              <table class="table text-dark ">
                <thead>
                  <tr class="table-active">
                    <th>Qty</th>
                    <th>Nama Barang</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $i = 1;
                  $total_berat = 0;
                  foreach ($this->cart->contents() as $items) {
                    $barang = $this->m_home->detail_barang($items['id']);
                    $berat = $items['qty'] * $barang->berat;
                    $total_berat = $total_berat + $berat; ?>

                    <tr>
                      <td class="text-center" width="50px"><?php echo $items['qty']; ?></td>
                      <td><?php echo $items['name']; ?></td>
                      <td><?= $berat ?> Gram</td>
                      <td>Rp. <?php echo number_format($items['price'], 0); ?></td>
                      <td>Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <?php
          echo validation_errors('<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
          ?>
          <?php
          echo form_open('belanja/checkout');

          ?>
          <div class="row">
            <!-- accepted payments column -->
            <div class="col-sm-8 invoice-col">

              <label> Tujuan Pengiriman:</label>

              <div class="row">
                <div class="col-sm-6 mt-2">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <select name="provinsi" class="form-control"></select>
                  </div>
                </div>
                <div class="col-sm-6 mt-2">
                  <div class="form-group">
                    <label>Kota/Kabupaten</label>
                    <select name="kota" class="form-control">
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Ekspedisi</label>
                    <select name="ekspedisi" class="form-control">
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Paket</label>
                    <select name="paket" class="form-control">
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nama Penerima</label>
                    <input name="nama_penerima" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nomor Telpon Penerima</label>
                    <input name="telp_penerima" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input name="alamat" class="form-control" required>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Kode POS</label>
                    <input name="kode_pos" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-4 mt-5">
              <div class="table-responsive table-borderless text-dark ">
                <table class="table">

                  <tr>
                    <th>Total Harga</th>
                    <th>: Rp. <?php echo number_format($this->cart->total()); ?></th>


                  </tr>

                  <tr>
                    <th>Total Berat </th>
                    <th>: <?php echo number_format($total_berat) ?> Gram</th>

                  </tr>


                  <tr>
                    <th>Ongkir</th>
                    <th> :<class id="ongkir">
                    </th>

                  </tr>




                  <tr>
                    <th>Total Bayar</th>
                    <th>:<class id="total_bayar">
                    </th>
                    <th> </th>
                  </tr>

                </table>
                <button type="submit" class=" btn btn-success btn-lg btn-block"><i class="fas fa-shopping-cart"></i> Submit
                </button>

              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- simpan transaksi-->

          <input name="no_order" value="<?= $no_order ?>" hidden>
          <input name="estimasi" hidden>
          <input name="ongkir" hidden>
          <input name="berat" value="<?= $total_berat ?>" hidden><br>
          <input name="total_harga" value="<?= $this->cart->total() ?>" hidden>
          <input name="total_bayar" hidden>

          <!--simpan rinci transaksi-->

          <?php
          $i = 1;
          foreach ($this->cart->contents() as $items) {
            echo form_hidden('qty' . $i++, $items['qty']);
          }
          ?>
          <!-- end simpan rinci transaksi-->
          <!-- end simpan transaksi-->
          <div class="row no-print">
            <div class="col-12 mb-3">

              <a href="<?= base_url('belanja') ?>" rel="noopener" class="mr-2 btn btn-outline-primary"><i class="fas fa-reply"></i> Kembali</a>

            </div>
          </div>
          <?php echo form_close() ?>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.col -->
  </div><!-- /.col -->
</div><!-- /.col -->

<!-- /.col -->

<script>
  $(document).ready(function() {
    //provinsi
    $.ajax({
      type: "POST",
      url: "<?= base_url('rajaongkir/provinsi') ?>",
      success: function(hasil_provinsi) {
        //console.log(hasil_provinsi);
        $("select[name=provinsi]").html(hasil_provinsi);
      }
    });
    $("select[name=provinsi]").on("change", function() {
      var id_provinsi_pilih = $("option:selected", this).attr("id_provinsi");
      $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/kota') ?>",
        data: 'id_provinsi=' + id_provinsi_pilih,
        success: function(hasil_kota) {
          $("select[name=kota]").html(hasil_kota);

        }
      });
    });
    $("select[name=kota]").on("change", function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/ekspedisi') ?>",
        success: function(hasil_ekspedisi) {
          $("select[name=ekspedisi]").html(hasil_ekspedisi);
        }
      });
    });

    $("select[name=ekspedisi]").on("change", function() {
      var ekspedisi_terpilih = $("select[name=ekspedisi]").val()
      var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
      var total_berat = <?= $total_berat ?>;
      $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/paket') ?>",
        data: 'ekspedisi=' + ekspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
        success: function(hasil_paket) {
          $("select[name=paket]").html(hasil_paket);
        }
      });
    });

    //hitung ongkir
    $("select[name=paket]").on("change", function() {

      //menampilkan ongkir
      var dataongkir = $("option:selected", this).attr('ongkir');
      var reverse = dataongkir.toString().split('').reverse().join(''),
        ribuan_ongkir = reverse.match(/\d{1,3}/g);
      ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
      $("#ongkir").html(" Rp. " + ribuan_ongkir);

      //menghitung total
      var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
      var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
        ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
      ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');
      $("#total_bayar").html(" Rp. " + ribuan_total_bayar);

      //estimasi dan ongkir
      var estimasi = $("option:selected", this).attr('estimasi');
      $("input[name=estimasi]").val(estimasi);
      $("input[name=ongkir]").val(dataongkir);
      $("input[name=total_bayar]").val(data_total_bayar);


    });
  });
</script>

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