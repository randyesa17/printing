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
                        <form action="<?= site_url('admin/produk/ubah') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kodeproduk" value="<?= $produk['kodeproduk'] ?>">
                            <input type="hidden" name="gambar" value="<?= $produk['gambar'] ?>">
                            <div class="form-group">
                                <label for="namaproduk">Nama Produk</label>
                                <input type="text" name="namaproduk" class="form-control" id="namaproduk"
                                    value="<?= $produk['namaproduk'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan Produk</label>
                                <select name="satuan" id="satuan" class="form-control">
                                    <option value="0">-- Pilih Satuan Produk --</option>
                                    <?php foreach ($satuan as $key => $value) : ?>
                                    <option value="<?= $value['idsatuan'] ?>"
                                        <?php if ($value['idsatuan'] == $produk['idsatuan']) echo "selected" ?>>
                                        <?= $value['satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Satuan per Satuan</label>
                                <input type="number" name="harga" class="form-control" id="harga"
                                    value="<?= $produk['harga'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat Produk(gram) per Satuan</label>
                                <input type="number" name="berat" class="form-control" id="berat"
                                    value="<?= $produk['berat'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control"
                                    placeholder="Keterangan Produk" required><?= $produk['keterangan'] ?></textarea>
                            </div>
                            <div class="md-form">
                                <label for="gambar">Gambar Produk : </label>
                                <input type="file" name="gambar" class="form-control-file" id="gambar" accept="image/*">
                            </div><br>
                            <div class="form-group">
                                <label for="minimal">Minimal Pesan per Satuan</label>
                                <input type="number" name="minimal" class="form-control" id="minimal"
                                    value="<?= $produk['minimal'] ?>" min="1" required>
                            </div>
                            <div class="col-18 text-right">
                                <a href="<?= site_url('admin/produk') ?>" class="btn">Kembali</a>
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