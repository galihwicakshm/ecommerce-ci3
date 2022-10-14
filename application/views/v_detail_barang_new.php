<section class="slider-section product-page">
    <div class="container">
        <div class="row slider-inner">
            <div class="col-lg-6 col-md-6 col-12">
                <div id="product-images" class="carousel slide" data-ride="carousel">
                    <!-- slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active mt-4"> <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" alt="Product 1"> </div>
                        <?php foreach ($gambar as $key => $value) { ?>
                            <div class="carousel-item"><img src="<?= base_url('assets/gambarbarang/' . $value->gambar) ?>" alt="Product Image"></div>
                        <?php } ?>
                    </div> <!-- Left right -->
                    <a class="carousel-control-prev" href="#product-images" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#product-images" data-slide="next"> <span class="carousel-control-next-icon"></span> </a><!-- Thumbnails -->
                    <ol class="carousel-indicators list-inline">
                        <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#product-images"> <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" class="img-fluid"> </a> </li>
                        <?php $i = 1;
                        foreach ($gambar as $key => $value) { ?>

                            <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="<?= $i++ ?>" data-target="#product-images"> <img src="<?= base_url('assets/gambarbarang/' . $value->gambar) ?>" class="img-fluid"> </a> </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="product-detail">
                    <h2 class="product-name mt-4"><?= $barang->nama_barang ?></h2>
                    <div class="product-price">
                        <span class="price">Rp.<?= number_format($barang->harga, 0) ?> </span>
                        <!-- <span class="price-muted">IDR 499.000</span> -->
                    </div>
                    <div class="text-justify mt-2">
                        <?= $barang->deskripsi_singkat ?>
                    </div>
                    <?php
                    echo form_open('belanja/add');
                    echo form_hidden('id', $barang->id_barang);
                    echo form_hidden('price', $barang->harga);
                    echo form_hidden('name', $barang->nama_barang);
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>
                    <div class="product-select">
                        <?php if ($barang->stock == 0) { ?>
                            <div class="alert alert-danger" role="alert">
                                <span> Maaf, barang sudah habis</span>
                            </div>

                        <?php } else { ?>
                            <div class="row mt-2">
                                <?php if ($this->session->userdata('email') == '') { ?>
                                    <div class="col-3">
                                        <input id="myInput" type="number" name="qty" class="form-control text-center" value="1" min="0" oninvalid="setCustomValidity('Barang yang dipesan sudah mencapai batas stock yang tersedia')" oninput="setCustomValidity('')"> <br>
                                    </div>
                                    <div class="stok mt-2">

                                        Stok <b><?= $barang->stock ?></b>
                                    </div>
                                    <div class="col-12">
                                        <a href="<?= base_url('pelanggan/login') ?>" class="kotak btn btn-primary">Keranjang</a>
                                    </div>
                                <?php } else { ?>
                                    <?php
                                    $keranjang = $this->cart->contents();
                                    $jumlah_item = 0;
                                    $maks = $barang->stock;
                                    foreach ($keranjang as $key => $value) {
                                        if ($value['id'] == $this->uri->segment(3)) { ?>
                                            <?php ($value) ?>
                                            <?php ($value['qty']); ?>
                                            <?php $maks = $barang->stock - $value['qty'] ?>
                                        <?php  } ?>
                                    <?php  } ?>
                                    <div class="col-3">
                                        <input id="myInput" type="number" name="qty" class="form-control text-center" value="1" min="0" max="<?= $maks ?>" oninvalid="setCustomValidity('Barang yang dipesan sudah mencapai batas stock yang tersedia')" oninput="setCustomValidity('')"> <br>
                                    </div>
                                    <div class="stok mt-2">
                                        <?php if ($barang->stock < 10) { ?>
                                            <h6 class="ml-2 stock-tipis"> <b>Stock <?= $barang->stock ?></b></h6>
                                        <?php  } else { ?>
                                            <h6 class="ml-2 stock-banyak"> <b>Stock <?= $barang->stock ?></b></h6>
                                        <?php } ?>
                                        <!-- Stok <b><?= $barang->stock ?></b> -->
                                    </div>
                                    <div class="col-12">

                                        <?php if ($maks == 0) { ?>
                                            <button id="btnInput" class="kotak btn btn-primary ">Keranjang</button>

                                        <?php } elseif ($maks != 0) { ?>
                                            <button id="myBtn" type="submit" class="kotak btn btn-primary ">Keranjang</button>

                                        <?php } ?>

                                    </div>
                                <?php } ?>

                            </div>
                        <?php } ?>
                        <?php echo form_close(); ?>

                        <div class="product-categories">
                            <ul>
                                <li class="categories-title">Categories :</li>
                                <li><a href="<?= base_url('home/kategori_filter/' . $barang->id_kategori) ?>"><?= $barang->nama_kategori ?></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="product-details">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill mt-5">
                            <li class="nav-item">
                                <span class="nav-link mb-sm-3 mb-md-0 active col-12">Deskripsi</span>
                            </li>

                        </ul>
                    </div>
                    <!-- <div class="card border-light">
                         <div class="card-body ">
                             <div class="tab-content" id="myTabContent"> -->
                    <textarea disabled class="form-control" name="" cols="10" rows="10"> <?= $barang->deskripsi ?></textarea>



                    <!-- </div>
                         </div>
                        
                 </div> -->
                    <ul class="nav nav-pills nav-fill mt-5">
                        <li class="nav-item">
                            <span class="nav-link mb-sm-3 mb-md-0 active col-12">Ulasan Produk</span>
                        </li>


                    </ul>

                    <?php foreach ($review as $key => $review) { ?>

                        <div class="ulasan-pembeli mt-3">
                            <?php if ($review->gambar == '') { ?>
                                <img src="<?= base_url('assets/pelanggan/default.png') ?>" alt="" width="50px" height="50px" class="mr-3">
                            <?php } else { ?>
                                <img src="<?= base_url('assets/pelanggan/' . $review->gambar) ?>" alt="" width="50px" height="50px" class="mr-3">
                            <?php } ?>
                            <?= $review->nama_pelanggan ?>
                            <div class="komentar mt-4">

                                <p> <?= $review->review ?></p>
                            </div>
                            <div class="rating">


                                <?php if ($review->rating == 1) : ?>
                                    <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span>
                                <?php elseif ($review->rating == 2) : ?>
                                    <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span>
                                    <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span>
                                <?php elseif ($review->rating == 3) : ?>
                                    <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span>
                                <?php elseif ($review->rating == 4) : ?>
                                    <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span>
                                <?php elseif ($review->rating == 5) : ?>
                                    <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span> <span> <i class="fa-solid fa-star" style="color:var(--fa-primary-color);"></i> </span>
                                <?php endif ?>
                            </div>
                            <div class="gambar-produk mt-2">
                                <img src="<?= base_url('assets/review/' . $review->gambarreview) ?>" style="object-fit:fill;" width="100px" alt="">
                            </div>
                            <hr>
                        </div>
                    <?php    } ?>

                </div>




            </div>
</section>

<script>
    $(function() {

        $("#rateYo").rateYo({
            rating: 2,
            fullStar: true
        });
    });
</script>
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- <script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });

     
        });
    });
</script> -->
<script>
    $('.swalDefaultSuccess').click(function() {
        Swal.fire(
            'Keranjang!',
            'Berhasil ditambahklan!',
            'success'
        )
    });
</script>
<script>
    $('.swalDefaultFailed').click(function() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Barang sudah mencapai batas stock, silahkan cek keranjang anda!',
        })
    });
</script>
<script src="<?= base_url() ?>template/dist/js/bootstrap-input-spinner.js"> </script>
<script>
    $('input[type=number]').inputSpinner()
</script>