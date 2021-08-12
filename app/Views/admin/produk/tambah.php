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
                        <form action="<?= site_url('admin/produk/tambah') ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="kodeproduk" value="<?= $kode ?>">
                            <div class="form-group">
                                <label for="namaproduk">Nama Produk</label>
                                <input type="text" name="namaproduk" class="form-control" id="namaproduk"
                                    placeholder="Nama Produk" required>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan Produk</label>
                                <select name="satuan" id="satuan" class="form-control">
                                    <option value="0">-- Pilih Satuan Produk --</option>
                                    <?php foreach ($satuan as $key => $value) : ?>
                                    <option value="<?= $value['idsatuan'] ?>"><?= $value['satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga per Satuan</label>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga"
                                    min="1" required>
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat Produk(Kg) per Satuan</label>
                                <input type="number" name="berat" class="form-control" id="berat"
                                    placeholder="Berat (Kg)" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="10" rows="5"
                                    placeholder="Keterangan Produk" required></textarea>
                            </div>
                            <div class="md-form">
                                <label for="gambar">Gambar Produk : </label>
                                <input type="file" name="gambar" class="form-control-file" id="gambar" accept="image/*"
                                    required>
                            </div><br>
                            <div class="md-form">
                                <label for="desain1">Desain Produk : </label>
                                <input type="file" name="desain1" class="form-control-file" id="desain1"
                                    accept="image/*" required>
                            </div><br>
                            <div class="form-group">
                                <label for="minimal">Minimal Pesan per Satuan</label>
                                <input type="number" name="minimal" class="form-control" id="minimal"
                                    placeholder="Minimal Pesan" min="1" required>
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