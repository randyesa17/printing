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
                                <img src="<?= site_url('assets/images/produk/' . $produk['gambar']) ?>" width="500"
                                    alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="portfolio-info">
                    <?php
                    $sat;
                    foreach ($satuan as $key => $value) {
                        if ($value['idsatuan'] == $produk['idsatuan']) {
                            $sat = $value['satuan'];
                        }
                    }
                    ?>
                    <h4><?= $produk['namaproduk'] ?></h4>
                    <hr>
                    <ul>
                        <!--Content-->
                        <li>
                            <h5>DETAIL</h5>
                        </li>
                        <li>
                            <h6>Harga : Rp. <?= number_format($produk['harga']) ?> / <?= $sat ?></h6>
                        </li>
                        <li>
                            <h6>Berat Produk : <?= $produk['berat'] ?> g(<?= $produk['berat'] / 1000 ?>Kg)/ <?= $sat ?>
                            </h6>
                        </li>
                        <li>
                            <h6>Minimal Pembelian : <?= $produk['minimal'] ?> <?= $sat ?></h6>
                        </li>
                        <li>
                            <h6>Keterangan : <?= $produk['keterangan'] ?></h6>
                        </li>
                        <hr>
                        <li>
                            <h5>PESAN</h5>
                        </li>
                        <hr>
                        <form action="<?= site_url('user/produk/keluar') ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="kodeproduk" value="<?= $produk['kodeproduk'] ?>">
                            <div class="md-form mb-3">
                                <h4>Desain</h4>
                                <div>
                                    <select name="desain" id="desain" class="form-control">
                                        <option value="1">Pilih Desain</option>
                                        <option value="desain1">Desain 1</option>
                                        <option value="desain2">Desain 2</option>
                                        <option value="desain3">Desain 3</option>
                                        <option value="custom">Upload Sendiri</option>
                                    </select>
                                </div>
                                <div class="row mt-1">
                                    <div class="col">
                                        <img src="<?= site_url('assets/images/desain/' . $produk['desain1']) ?>"
                                            style="display: none;" id="desain1" width="300" alt="">
                                        <img src="<?= site_url('assets/images/desain/' . $produk['desain2']) ?>"
                                            style="display: none;" id="desain2" width="300" alt="">
                                        <img src="<?= site_url('assets/images/desain/' . $produk['desain3']) ?>"
                                            style="display: none;" id="desain3" width="300" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="md-form">
                                <label for="desain" class="">Upload Desain : </label>
                                <input type="file" name="desain" id="custom" class="form-control-file" accept="image/*"
                                    disabled>
                            </div>
                            <hr>
                            <div class="md-form">
                                <label for="keterangan" class="">Keterangan Pesan : </label>
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div>
                            <div class="md-form">
                                <label for="tambahan" class="">Tambahan Gambar : </label>
                                <input type="file" name="tambahan" id="tambahan" class="form-control-file"
                                    accept="image/*">
                            </div>
                            <hr>
                            <?php if ($sat == 'cm²') : ?>
                            <li>
                                <h6>Ukuran Barang(centimeter/cm)</h6>
                                <div class="row">
                                    <input type="number" name="p" id="p" class="form-control" style="width: 100px">
                                    &nbsp;x&nbsp;
                                    <input type="number" name="l" id="l" class="form-control" style="width: 100px">
                                    &nbsp;=&nbsp;
                                    <input type="number" name="jumlah" id="jumlah" value="<?= $produk['minimal'] ?>"
                                        min="<?= $produk['minimal'] ?>" class="form-control" style="width: 100px"
                                        readonly>
                                    &nbsp;
                                    <a href="#" id="hitung" class="btn btn-primary btn-sm my-0 p">Hitung</a>
                                </div>
                                &nbsp; &nbsp;
                            </li>
                            <?php elseif ($sat == 'm²') : ?>
                            <li>
                                <h6>Ukuran Barang(meter/m)</h6>
                                <div class="row">
                                    <input type="number" name="p" id="p" class="form-control" style="width: 100px">
                                    &nbsp;x&nbsp;
                                    <input type="number" name="l" id="l" class="form-control" style="width: 100px">
                                    &nbsp;=&nbsp;
                                    <input type="number" name="jumlah" id="jumlah" value="<?= $produk['minimal'] ?>"
                                        min="<?= $produk['minimal'] ?>" class="form-control" style="width: 100px"
                                        readonly>
                                    &nbsp;
                                    <a href="#" id="hitung" class="btn btn-primary btn-sm my-0 p">Hitung</a>
                                </div>
                                &nbsp; &nbsp;
                            </li>
                            <?php else : ?>
                            <li>
                                <h6>Jumlah Barang</h6>
                                <input type="number" name="jumlah" value="<?= $produk['minimal'] ?>"
                                    min="<?= $produk['minimal'] ?>" class="form-control" style="width: 100px"> &nbsp;
                                &nbsp; &nbsp;
                            </li>
                            <?php endif; ?>
                            <li>
                                <?php if ($sat == 'cm²') : ?>
                                <button type="submit" id="masuk" class="btn btn-primary btn-md my-0 p" disabled>Masukkan
                                    Keranjang</button>
                                <?php elseif ($sat == 'm²') : ?>
                                <button type="submit" id="masuk" class="btn btn-primary btn-md my-0 p" disabled>Masukkan
                                    Keranjang</button>
                                <?php else : ?>
                                <button type="submit" id="masuk" class="btn btn-primary btn-md my-0 p">Masukkan
                                    Keranjang</button>
                                <?php endif; ?>
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
<script>
document.getElementById("desain").onchange = function() {
    desain()
};
document.getElementById("hitung").onclick = function() {
    hitung()
};
document.getElementById("masuk").onclick = function() {
    masuk()
};

function hitung() {
    var p = document.getElementById("p").value;
    var l = document.getElementById("l").value;
    var h = p * l;
    if (h >= <?= $produk['minimal'] ?>) {
        document.getElementById("masuk").disabled = false;
        document.getElementById("jumlah").value = h;
    } else {
        document.getElementById("masuk").disabled = true;
        document.getElementById("jumlah").value = h;
        alert('Ukuran tidak sesuai dengan minimal beli');
    }
}

function masuk() {
    if (document.getElementById("jumlah").value <= <?= $produk['minimal'] ?>) {
        alert('Ukuran tidak sesuai dengan minimal beli');
    } else {
        this.form.submit();
    }
}

function desain() {
    var pilihan = document.getElementById("desain").value;
    var desain1 = document.getElementById("desain1");
    var desain2 = document.getElementById("desain2");
    var desain3 = document.getElementById("desain3");
    var upload = document.getElementById("custom");
    if (pilihan === "desain1") {
        desain1.style.display = "block";
        desain2.style.display = "none";
        desain3.style.display = "none";
        upload.disabled = true;
        upload.required = false;
    } else if (pilihan === "desain2") {
        desain1.style.display = "none";
        desain2.style.display = "block";
        desain3.style.display = "none";
        upload.disabled = true;
        upload.required = false;
    } else if (pilihan === "desain3") {
        desain1.style.display = "none";
        desain2.style.display = "none";
        desain3.style.display = "block";
        upload.disabled = true;
        upload.required = false;
    } else if (pilihan === "custom") {
        desain1.style.display = "none";
        desain2.style.display = "none";
        desain3.style.display = "none";
        upload.disabled = false;
        upload.required = true;
    }
}
</script>
<?= $this->endSection() ?>