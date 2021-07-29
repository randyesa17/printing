<?= $this->extend('templates/user') ?>
<?= $this->section('content') ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Produk</h2>
                <ol>
                    <li><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li>Produk</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="produk" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>PRODUK KAMI</h2>
                <p>KATEGORI PRODUK KAMI</p>
            </div>

            <div class="row portfolio-container">
                <?php foreach ($produk as $key => $value) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="<?= site_url('assets/images/produk/'.$value['gambar']) ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $value['namaproduk'] ?></h4>
                            <p>Rp <?= number_format($value['harga']) ?>,-</p>
                            <p><?= $value['berat'] ?> Kg/Pcs</p>
                            <div class=""><br />
                                <a href="<?= site_url('user/produk/detail?kodeproduk='.$value['kodeproduk']) ?>"
                                    class="btn btn-danger" data-gall="portfolioGallery" class="venobox"
                                    title="Pesan">Pesan Sekarang...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->

</main>
<!-- End #main -->
<?= $this->endSection() ?>