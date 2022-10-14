<div class="container mt-4">
    <div class="card card-solid">
        <div class="card-body pb-0">
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
                    ?> </div>
                <div class="col-sm-12">

                    <?php echo form_open('belanja/update'); ?>

                    <table class="table" style="width:100%">

                        <tr>
                            <th class="text-center" width="90px">QTY</th>
                            <th>Nama Barang</th>
                            <th>Berat Barang</th>
                            <th>Harga</th>
                            <th>Sub-Total</th>
                            <th class="text-center">Action</th>

                        </tr>

                        <?php $i = 1; ?>

                        <?php
                        $total_berat = 0;
                        $keranjang = $this->cart->contents();
                        // $maks = $barang->stock;
                        foreach ($keranjang as $items) {
                            $barang = $this->m_home->detail_barang($items['id']);
                            $maks = $barang->stock;
                            $berat = $items['qty'] * $barang->berat;
                            $total_berat = $total_berat + $berat;
                        ?>
                            <tr>
                                <td><?php echo form_input(array(
                                        'name' => $i . '[qty]',
                                        'value' => $items['qty'],
                                        'maxlength' => '3',
                                        'min' => '0',
                                        'size' => '5',
                                        'max' => $maks,
                                        'type' => 'number',

                                        'class' => 'form-control text-center'
                                    )); ?></td>
                                <td><?php echo $items['name']; ?></td>
                                <td><?= $berat ?> Gram</td>
                                <td>Rp. <?php echo number_format($items['price'], 0); ?></td>
                                <td>Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class=" fa fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php $i++; ?>

                        <?php } ?>
                        <td></td>
                        <td>Total Berat</td>
                        <td><?php echo number_format($total_berat) ?> Gram</td>
                        <td>Total Harga</td>
                        <td>

                            Rp. <?php echo number_format($this->cart->total()); ?>
                        </td>

                        <td></td>

                    </table>
                    <div class="row">
                        <div class="text-left col-sm-4">
                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> Update</button>

                            <a href="<?= base_url('belanja/clear') ?>" class="btn btn-outline-danger ml-1"><i class="fa fa-times-circle"></i> Clear Cart</a>
                        </div>
                        <div class="text-right col-sm-8">
                            <a href="<?= base_url('belanja/checkout') ?>" class="btn btn-success"><i class="fa fa-check-square"></i> Checkout</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>