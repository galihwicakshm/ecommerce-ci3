<div class="row">
  <div class="container">
    <div class="col-md-6">
      <div class="card card-solid">
        <div class="card-body pb-0">
          <?php
          echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi);
          ?>
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group mt-3">
                  <label>Atas Nama</label>
                  <?php if ($pesanan->status_code == "" || $pesanan->status_code == "201" || $pesanan->status_code == "200") { ?>
                    <input name="atas_nama" id="atas_nama" class="form-control text-muted" placeholder="Nama Penerima" readonly value="<?= $pesanan->nama_penerima ?>">
                  <?php } ?>
                  <?php echo form_close() ?>

                  <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-outline-primary mt-4">Kembali</a>
                  <?php
                  if ($pesanan->status_code == 201 || $pesanan->status_code == 200) { ?>

                  <?php    } else if ($pesanan->status_code == NULL) { ?>
                    <button id="pay-button" type="submit" class="btn btn-success mt-4"> Submit
                    </button>

                </div>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="col-md-6">
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="col-lg-6">
            <div class="form-group">
              Invoice
              <a href="<?= base_url('pesanan_saya/invoice/' . $no_order) ?>" target="_blank" class="btn btn-success btn-sm">Download</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-solid">
          <div class="card-body pb-0">
            <table class="table" cellpadding="6" cellspacing="1" id="example1">
              <thead class="">
                <tr>
                  <th>No Order</th>
                  <th>Total Bayar</th>
                  <th>Status</th>
                  <th>Virtual Akun</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($midtrans as $key => $midtrans) { ?>
                  <tr>

                    <td><?= $midtrans->no_order ?></td>
                    <td>Rp.<?= number_format($midtrans->gross_amount, 0) ?></td>
                    <td>
                      <?php if ($midtrans->status_code == "200") { ?>
                        <label for="" class="badge bg-success">Berhasil</label>
                      <?php } else { ?>
                        <label for="" class="badge bg-primary">Pending</label>

                      <?php   } ?>

                    </td>

                    <td>
                      <a href="<?= $midtrans->pdf_url ?>" target="_blank" class="btn btn-success btn-sm">Download</a>
                    </td>


                  </tr>


                <?php    } ?>

              </tbody>
            </table>


          </div>
          <!-- /.card-body -->


        </div>
        <!-- /.card -->
      </div>
    </div>


    <form id="payment-form" method="post" action="<?= site_url() ?>snap/finish">
      <input type="hidden" name="result_type" id="result-type" value="">

      <input type="hidden" name="result_data" id="result-data" value="">

      <input type="hidden" name="telp" id="telp" class="form-control" value=<?= $pesanan->telp_penerima ?>>
      <input type="hidden" name="no_order" id="no_order" class="form-control" value=<?= $pesanan->no_order ?>>
      <input type="hidden" name="total_bayar" id="total_bayar" class="form-control" value=<?= $pesanan->total_bayar ?>>

    </form>


    <script type="text/javascript">
      $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var harga = $("#total_bayar").val();
        var nama = $("#atas_nama").val();
        var telp = $("#telp").val();
        var order = $("#no_order").val();

        $.ajax({
          type: 'POST',
          url: '<?= site_url() ?>/snap/token',
          data: {
            harga: harga,
            nama: nama,
            telp: telp,
            order: order,

          },
          cache: false,
          success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
              $("#result-type").val(type);
              $("#result-data").val(JSON.stringify(data));
              //resultType.innerHTML = type;
              //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

              onSuccess: function(result) {
                changeResult('success', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
              },
              onPending: function(result) {
                changeResult('pending', result);
                console.log(result.status_message);
                $("#payment-form").submit();
              },
              onError: function(result) {
                changeResult('error', result);
                console.log(result.status_message);
                $("#payment-form").submit();
              }
            });
          }
        });
      });
    </script>

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