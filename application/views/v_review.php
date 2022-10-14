<div class="container mt-4">
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    No Order <strong>#<?= $pesanan->no_order ?></strong>


                </div>
                <div class="col-6">
                    <div class="text-end"> Pesanan Tanggal <?= $pesanan->tanggal_order ?></div>
                </div>
            </div>

        </div>
        <div class="card-body">


            <?php foreach ($gambar as $key => $gambar) { ?>
                <div class="row">
                    <div class="col-1 mt-5 ml-5">
                        <img src="<?= base_url('assets/gambar/' . $gambar->gambar) ?>" alt="" width="100px" height="100px" class="mt-3">
                    </div>
                    <div class="col-4 ml-5">
                        <div class="mt-5">
                            <br>
                            <b> <?= $gambar->nama_barang ?></b>
                        </div>
                    </div>
                    <div class="col-4 mt-5">
                        <?php if ($gambar->status_order == 0) { ?>
                            <br>
                            <a href="<?= base_url('pesanan_saya/review_produk/' . $gambar->no_order . '/' . $gambar->id_barang) ?>" class="btn btn-primary btn-sm">Beri Ulasan</a>
                        <?php } else { ?>
                            <br>
                            <span class="btn btn-danger btn-sm">Sudah Memberi Ulasan</span>
                        <?php } ?>

                    </div>


                </div>
            <?php } ?>










            <div class="container mt-5">
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr>
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
                                    <td class="left"><?= $rincian->nama_barang ?></td>
                                    <td class="center"><?= $rincian->qty ?></td>
                                    <td class="right">Rp.<?= number_format($rincian->harga) ?></td>
                                    <td class="right">Rp. <?= number_format($tsemua) ?></td>
                                </tr>

                            <?php    } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>