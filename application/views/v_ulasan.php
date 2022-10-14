<div class="container mt-3">
    <div class="card">
        <div class="card-header text-end">
            Pesanan Tanggal <?= $pesanan->tanggal_order ?>
        </div>
        <div class="card-body">

            <?= form_open_multipart('pesanan_saya/addreview') ?>
            <input type="hidden" name="id_barang" value="<?= $this->uri->segment(4) ?>">
            <input type="hidden" name="no_order" value="<?= $this->uri->segment(3) ?>">
            <div class="row">
                <div class="col-1 mt-3">
                    <img src="<?= base_url('assets/gambar/' . $gambar->gambar) ?>" alt="" width="100px" height="100px" class="mt-3">
                </div>
                <div class="col-5 ml-4">
                    <div class="mt-5">
                        <b> <?= $gambar->nama_barang ?></b>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="ratings ml-2 mb-2">
                Rating :
            </div>
            <div class="rateYo" id="rating">
            </div>


            <input type="hidden" name="rating">

            <div class="textarea mt-5">
                <div class="kata mb-3"> Pastikan anda melakukan review sesuai dengan kualitas barang</div>

                <textarea class="form-control" cols="10" rows="10" name="review"> </textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Input Gambar</label>
                <input class="form-control" type="file" name="gambar">
            </div>

            <button type="submit" class="btn btn-primary"> Submit</button>
            <?= form_close() ?>

        </div>
    </div>
</div>



<script>
    $(function() {
        $(".rateYo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            fullStar: true;
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>

<script>
    $(".rateYo").each(function(e) {
        $(this).rateYo({
            onSet: function(rating, rateYoInstance) {
                $(this).next().val(rating);
            },
            rating: 0,
            starWidth: "30px",
            numStars: 5,
            fullStar: true
        });
    });
</script>