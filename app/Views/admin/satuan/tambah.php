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
                        <!-- Shopping Summery -->
                        <form action="<?= site_url('admin/satuan/tambah') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="satuan">Satuan Produk</label>
                                <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Satuan"
                                    required>
                            </div><br>
                            <div class="col-18 text-right">
                                <a href="<?= site_url('admin/satuan') ?>" class="btn">Kembali</a>
                                <button type="submit" class="btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>