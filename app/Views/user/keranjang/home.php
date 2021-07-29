<?= $this->extend('templates/user') ?>
<?= $this->section('content') ?>
<!-- Icons -->
<link rel="stylesheet" href="<?= site_url('assets/publik/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
<link rel="stylesheet" href="<?= site_url('assets/publik/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>"
    type="text/css">
<!-- Argon CSS -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/argon.css?v=1.2.0') ?>" type="text/css">

<!-- StyleSheet -->
<!-- Magnific Popup -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/magnific-popup.min.css') ?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/font-awesome.css') ?>">
<!-- Fancybox -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/jquery.fancybox.min.css') ?>">
<!-- Themify Icons -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/themify-icons.css') ?>">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/niceselect.css') ?>">
<!-- Animate CSS -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/animate.css') ?>">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/flex-slider.min.css') ?>">
<!-- Owl Carousel -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/owl-carousel.css') ?>">
<!-- Slicknav -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/slicknav.min.css') ?>">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/reset.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/publik/css/styless.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/publik/css/responsive.css') ?>">
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Keranjang Belanja</h2>
                <ol>
                    <li><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li>Keranjang Belanja</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="contact" class="contact">
        <div class="container">
            <!-- Shopping Cart -->
            <div class="shopping-cart section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shopping Summery -->
                            <table class="table shopping-summery">
                                <thead>
                                    <tr class="main-hading">
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th class="text-center">Harga Satuan</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($keranjang as $key => $value) : ?>
                                    <form action="<?= site_url('user/keranjang/update') ?>" method="get">
                                        <input type="hidden" name="idkeranjang" value="<?= $value['idkeranjang'] ?>">
                                        <tr>
                                            <td class="image" data-title="No">
                                                <?php foreach ($produk as $keyP => $valueP) : ?>
                                                <?php if($value['kodeproduk'] == $valueP['kodeproduk']) : ?>
                                                <img src="<?= site_url('assets/images/produk/'.$valueP['gambar']) ?>"
                                                    alt="#">
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td class="product-des" data-title="Description">
                                                <?php
                                            foreach ($produk as $keyP => $valueP) {
                                                if($value['kodeproduk'] == $valueP['kodeproduk']){
                                                    echo "<p class='product-name'><a>".$valueP['namaproduk']."</a></p>";
                                                }
                                            }
                                            ?>
                                            </td>
                                            <td class="price" data-title="Price">
                                                <?php
                                            foreach ($produk as $keyP => $valueP) {
                                                if($value['kodeproduk'] == $valueP['kodeproduk']){
                                                    echo "<span>Rp. ".number_format($valueP['harga'])."</span>";
                                                    echo "<input type='hidden' id='harga".$no."'
                                                    value='".$valueP['harga']."'>";
                                                }
                                            }
                                            ?>
                                            </td>
                                            <td class="qty text-center" data-title="Qty">
                                                <input type="number" size="4" value="<?= $value['jumlah'] ?>" min="<?php
                                            foreach ($produk as $keyP => $valueP) {
                                                if($value['kodeproduk'] == $valueP['kodeproduk']){
                                                    echo $valueP['minimal'];
                                                }
                                            }
                                            ?>" step="1" class="c-input-text qty text" name="jumlah"
                                                    id="jumlah<?= $no ?>" onchange="total<?= $no ?>()">
                                            </td>
                                            <td class="total-amount" data-title="Total">
                                                <span id="total<?= $no ?>">
                                                    <?php
                                                foreach ($produk as $keyP => $valueP) {
                                                    if($value['kodeproduk'] == $valueP['kodeproduk']){
                                                        echo "Rp. ".number_format($valueP['harga']*$value['jumlah']).",00";
                                                    }
                                                }
                                                ?>
                                                </span>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-primary">Checkout</button>
                                            </td>
                                        </tr>
                                    </form>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                            <!--/ End Shopping Summery -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Shopping Cart -->
        </div>
    </section>
</main>
<!-- End #main -->
<script>
<?php for($i=1; $i<=$no; $i++) : ?>

function total<?= $i ?>() {
    var h = document.getElementById("harga<?= $i ?>").value;
    var j = document.getElementById("jumlah<?= $i ?>").value;
    var t = 0;
    t = h * j;
    // Create our number formatter.
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'IDR',

        // These options are needed to round to whole numbers if that's what you want.
        //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
        //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
    });

    document.getElementById("total<?= $i ?>").innerHTML = Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(t);
}

<?php endfor; ?>
</script>
<?= $this->endSection() ?>