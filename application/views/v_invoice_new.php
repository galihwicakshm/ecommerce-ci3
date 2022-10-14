<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid mt-3">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card">
                <div class="card-header">Invoice
                    <strong>#<?= $pesanan->no_order ?></strong>
                    <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                        <i class="fa fa-print"></i> Print</a>

                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">To:</h6>

                            <div> <?= $pesanan->nama_penerima ?></div>
                            <div> <?= $pesanan->alamat ?></div>
                            <div> <?= $pesanan->telp_penerima ?></div>
                            <div><?= $pesanan->kode_pos ?></div>
                        </div>

                        <div class="col-sm-6">
                            <h6 class="mb-3">Details:</h6>
                            <div>Invoice
                                <strong>#<?= $pesanan->no_order ?></strong>
                            </div>
                            <div><?= $pesanan->tanggal_order ?></div><br>
                            <div>Status Bayar</div>
                            <div><?php if ($pesanan->status_code == "") { ?>
                                    <span class="badge badge-danger"> Belum Bayar</span>
                                <?php }
                                    if ($pesanan->status_code == "201") { ?>
                                    <span class="badge badge-info "> Pending </span>
                                <?php } elseif ($pesanan->status_code == "200") { ?>
                                    <span class="badge badge-success"> Sudah Bayar</span>
                                <?php }    ?>
                            </div>


                        </div>


                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Produk</th>
                                    <th class="center">Jumlah</th>
                                    <th class="right">Harga</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totals = 0;
                                $tsemua = 0;
                                $ongkir = 0;
                                $i = 1;
                                foreach ($rincian as $key => $rincian) {
                                    $tsemua = $rincian->qty * $rincian->harga;
                                    $ongkir = $rincian->ongkir;
                                    $totals = $totals + $tsemua;

                                ?>
                                    <tr>
                                        <td class="center"><?= $i++ ?></td>
                                        <td class="left"><?= $rincian->nama_barang ?></td>
                                        <td class="center"><?= $rincian->qty ?></td>
                                        <td class="right">Rp.<?= number_format($rincian->harga) ?></td>
                                        <td class="right">Rp. <?= number_format($tsemua) ?></td>
                                    </tr>

                                <?php    } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">

                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right">Rp. <?= number_format($totals, 0) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Ongkir</strong>
                                        </td>
                                        <td class="right">Rp. <?= number_format($pesanan->ongkir) ?></td>
                                    </tr>

                                    <tr>
                                        <td class="left">
                                            <strong>Total Bayar</strong>
                                        </td>
                                        <td class="right">
                                            <strong>Rp. <?= number_format($pesanan->total_bayar) ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>