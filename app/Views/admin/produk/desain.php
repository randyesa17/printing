<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1><?= $judul ?></h1>
            </div>
        </div>
    </div>
</div>
<!-- /# row -->

<section id="contact" class="contact">
    <div class="container">
        <!-- Shopping Cart -->
        <div class="shopping-cart section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4 text-center mb-4">
                                <h6>Jenis 1</h6>
                                <br>
                                <img width="200px" src="<?= site_url('assets/images/desain/'.$produk['desain1']) ?>"
                                    alt="">
                                <form action="<?= site_url('admin/produk/desain/ubah') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="kodeproduk" value="<?= $produk['kodeproduk'] ?>">
                                    <div class="md-form">
                                        <label for="desain">Ubah Jenis 1 : </label>
                                        <input type="file" name="desain1" class="form-control-file" id="desain1"
                                            accept="image/*" required>
                                    </div><br>
                                    <div class="col-18 text-right">
                                        <button type="submit" class="btn btn-sm">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-4 text-center mb-4">
                                <h6>Jenis 2</h6>
                                <br>

                                <?php if (!empty($produk['desain2'])) : ?>
                                <img width="200px" src="<?= site_url('assets/images/desain/'.$produk['desain2']) ?>"
                                    alt="">
                                <form action="<?= site_url('admin/produk/desain/ubah') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="kodeproduk" value="<?= $produk['kodeproduk'] ?>">
                                    <div class="md-form">
                                        <label for="desain">Ubah Jenis 2 : </label>
                                        <input type="file" name="desain2" class="form-control-file" id="desain2"
                                            accept="image/*" required>
                                    </div><br>
                                    <div class="col-18 text-right">
                                        <button type="submit" class="btn btn-sm">Simpan</button>
                                    </div>
                                </form>
                                <?php else : ?>
                                <span>Tidak Ada</span>
                                <?php endif; ?>
                            </div>
                            <div class="col-4 text-center mb-4">
                                <h6>Jenis 3</h6>
                                <br>
                                <?php if (!empty($produk['desain3'])) : ?>
                                <img width="200px" src="<?= site_url('assets/images/desain/'.$produk['desain3']) ?>"
                                    alt="">
                                <form action="<?= site_url('admin/produk/desain/ubah') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="kodeproduk" value="<?= $produk['kodeproduk'] ?>">
                                    <div class="md-form">
                                        <label for="desain">Ubah Jenis 3 : </label>
                                        <input type="file" name="desain3" class="form-control-file" id="desain3"
                                            accept="image/*" required>
                                    </div><br>
                                    <div class="col-18 text-right">
                                        <button type="submit" class="btn btn-sm">Simpan</button>
                                    </div>
                                </form>
                                <?php else : ?>
                                <span>Tidak Ada</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Shopping Summery -->
                        <?php if (empty($produk['desain1'] && $produk['desain2'] && $produk['desain3'])) : ?>
                        <hr>
                        <form action="<?= site_url('admin/produk/desain/tambah') ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="kodeproduk" value="<?= $produk['kodeproduk'] ?>">
                            <div class="md-form">
                                <label for="desain">Tambah Jenis Produk : </label>
                                <input type="file" name="desain" class="form-control-file" id="desain" accept="image/*"
                                    required>
                            </div><br>
                            <div class="col-18 text-right">
                                <a href="<?= site_url('admin/produk') ?>" class="btn">Kembali</a>
                                <button type="submit" class="btn">Simpan</button>
                            </div>
                        </form>
                        <?php else : ?>
                        <div class="col-18 text-right">
                            <a href="<?= site_url('admin/produk') ?>" class="btn">Kembali</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>