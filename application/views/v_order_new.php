<div class="col-12">
  <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
    <i class="fa fa-print"></i> Print</a>
  <br>
  <br>
  <!-- Main content -->
  <div class="card card-primary">

    <!-- /.card-header -->
    <div class="card-body">
      <h5>
        <?php ?>
        <?= $rinciandata->no_order ?>
        <?php ?>
        <small class="float-end">Tanggal Order : <?= $rinciandata->tanggal_order ?></small>
        <?php        ?>
      </h5>
      <?php ?>

      <small>
        <h5><?= $rinciandata->nama_penerima ?></h5>
      </small>
      <?php         ?>


      <div class="ml-3 mt-5">
        <h5>Detail Barang Pembeli</h5>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Jumlah Barang</th>
              <th>Nama Barang</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($rincianorder as $key => $value) { ?>
              <tr>
                <th><?= $value->qty ?></th>
                <th><?= $value->nama_barang ?></th>

              </tr>

            <?php        } ?>


        </table>
      </div>


    </div>
    <!-- /.col -->
  </div>
</div>

<div class="card card-primary mt-5">

  <!-- /.card-header -->
  <div class="card-body">
    <h5>Detail Alamat Pembeli</h5>


    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Alamat Lengkap</th>
            <th>Kode Pos</th>
            <th>Ekspedisi
            </th>



          </tr>
        </thead>
        <tbody>
          <?php
          ?>

          <tr>
            <th><?= $rinciandata->alamat ?></th>
            <th><?= $rinciandata->kode_pos ?></th>
            <td><b><?= strtoupper($rinciandata->ekspedisi) ?></b><br>
              Paket : <?= $rinciandata->paket ?><br>
              Ongkir Rp. <?= number_format($rinciandata->ongkir) ?>

            </td>
          </tr>

          <?php   ?>


      </table>
    </div>
    <!-- /.col -->



    <!-- /.row -->


    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print mt-3">
      <div class="col-12">
        <a href="<?= base_url('rincian') ?>" class="btn btn-success float-right"><i class="fas fa-reply"></i>
          Kembali
        </a>

        </a>
      </div>
    </div>
  </div>
  <!-- /.invoice -->
</div><!-- /.col -->
</div>
</div>
<!-- /.invoice -->
</div><!-- /.col -->
</div><!-- /.row -->