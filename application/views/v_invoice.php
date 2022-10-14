<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="invoice-title">
				<h2>Invoice</h2>
				<h3 class="pull-right">Order # <?= $pesanan->no_order ?></h3>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-6">
					<address>
						<strong>Shipped To:</strong><br>
						<?= $pesanan->nama_penerima ?><br>
						<?= $pesanan->alamat ?><br>
						<?= $pesanan->kode_pos ?><br>
					</address>
				</div>

			</div>
			<div class="row">
				<div class="col-xs-6">
					<address>
						<strong>Order Date:</strong><br>
						<?= $pesanan->tanggal_order ?><br><br>
					</address>
				</div>
				<div class="col-xs-6 float-right">
					<address>
						<strong>Status Bayar:</strong><br>
						<?php if ($pesanan->status_code == "") { ?>
							<span class="label label-danger"> Belum Bayar</span>
						<?php }
						if ($pesanan->status_code == "201") { ?>
							<span class="label label-info"> Pending</span>
						<?php } elseif ($pesanan->status_code == "200") { ?>
							<span class="label label-success"> Sudah Bayar</span>
						<?php }	?>


					</address>
				</div>
				<div class="col-xs-6 text-right">

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Order summary</strong></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-condensed">
							<thead>
								<tr>
									<td><strong>Produk</strong></td>
									<td class="text-center"><strong>Harga</strong></td>
									<td class="text-center"><strong>Jumlah</strong></td>
									<td class="text-right"><strong>Total</strong></td>
								</tr>
							</thead>
							<tbody>
								<!-- foreach ($order->lineItems as $line) or some such thing here -->
								<?php
								$totals = 0;
								$tsemua = 0;
								$ongkir = 0;
								foreach ($rincian as $key => $rincian) {
									$tsemua = $rincian->qty * $rincian->harga;
									$ongkir = $rincian->ongkir;
								?>

									<tr>
										<td><?= $rincian->nama_barang ?></td>
										<td class="text-center">Rp.<?= number_format($rincian->harga) ?></td>
										<td class="text-center"><?= $rincian->qty ?></td>
										<td class="text-right">Rp. <?= number_format($tsemua) ?></td>
									</tr>


								<?php    } ?>
								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Ongkir</strong></td>
									<td class="no-line text-right">Rp. <?= number_format($rincian->ongkir) ?></td>
								</tr>
								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Total Semua</strong></td>
									<td class="no-line text-right"> Rp. <?= number_format($rincian->total_bayar) ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>