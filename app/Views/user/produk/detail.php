<?= $this->extend('templates/user') ?>
<?= $this->section('content') ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Produk</h2>
                <ol>
                    <li><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li><a href="<?= site_url('user/produk') ?>">Produk</a></li>
                    <li>Detail Produk</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="<?= site_url('assets/images/produk/'.$produk['gambar']) ?>" width="500"
                                    alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="portfolio-info">
                    <h4><?= $produk['namaproduk'] ?></h4>
                    <hr>
                    <ul>
                        <!--Content-->
                        <li>
                            <h5>DETAIL</h5>
                        </li>
                        <li>
                            <h6>Harga : Rp. <?= number_format($produk['harga']) ?> / Pcs</h6>
                        </li>
                        <li>
                            <h6>Berat Produk : <?= $produk['berat'] ?> Kg/ Pcs</h6>
                        </li>
                        <li>
                            <h6>Minimal Pembelian : <?= $produk['minimal'] ?> Pcs</h6>
                        </li>
                        <li>
                            <h6>Keterangan : <?= $produk['keterangan'] ?></h6>
                        </li>
                        <hr>
                        <li>
                            <h5>PESAN</h5>
                        </li>
                        <form action="<?= site_url('user/produk/keluar') ?>" method="post">
                            <input type="hidden" name="kodeproduk" value="<?= $produk['kodeproduk'] ?>">
                            <li>
                                <h6>Jumlah Barang</h6>
                                <input type="number" name="jumlah" value="<?= $produk['minimal'] ?>"
                                    min="<?= $produk['minimal'] ?>" class="form-control" style="width: 100px"> &nbsp;
                                &nbsp; &nbsp;
                            </li>
                            <li>
                                <button type="submit" class="btn btn-primary btn-md my-0 p">Pesan</button>
                            </li>
                        </form>
                    </ul>
                </div>

            </div>

        </div>
    </section>
    <!-- End Portfolio Details Section -->
</main>
<!-- End #main -->
<?= $this->endSection() ?>