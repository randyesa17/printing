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
                        <form action="<?= site_url('admin/daerah/tambah') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="kodepos">Kode Pos</label>
                                <input type="number" name="kodepos" class="form-control" id="kodepos"
                                    placeholder="Kode Pos" min="1" required>
                            </div>
                            <div class="form-group">
                                <label for="namadaerah">Nama Daerah</label>
                                <input type="text" name="namadaerah" class="form-control" id="namadaerah"
                                    placeholder="Nama Daerah" required>
                            </div>
                            <div class="form-group">
                                <label for="hargakirim">Harga Kirim</label>
                                <input type="number" name="hargakirim" class="form-control" id="hargakirim"
                                    placeholder="Harga" min="1" required>
                            </div><br>
                            <div class="col-18 text-right">
                                <a href="<?= site_url('admin/daerah') ?>" class="btn">Kembali</a>
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