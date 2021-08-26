<?= $this->extend('templates/user') ?>
<?= $this->section('content') ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Checkout</h2>
                <ol>
                    <li><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li><a href="<?= site_url('user/keranjang') ?>">Keranjang</a></li>
                    <li>Checkout</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="contact" class="contact">
        <div class="container">
            <h5><i><?= date("d-M-Y") ?></i></h5><br />
            <h2><strong>Lengkapi Informasi</strong></h2><br /><br />

            <div class="col-lg-8 mt-5 mt-lg-0">

                <form action="<?= site_url('user/pesanan/masuks') ?>" method="post" enctype="multipart/form-data">
                    <?php $no = 1; ?>

                    <div class="md-form mb-3">
                        <label for="nama">Nama Depan</label>
                        <input type="text" class="form-control" placeholder="<?= $user['namauser'] ?>" readonly>
                    </div>
                    <div class="md-form mb-3">
                        <label for="telp">Nomor Telpon/HP</label>
                        <?php if ($user['telp'] == '') : ?>
                        <input type="text" name="telp" id="telp" class="form-control" required autofocus>
                        <?php else : ?>
                        <input type="text" class="form-control" value="<?= $user['telp'] ?>" readonly>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" value="<?= $user['email'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <?php if ($user['alamat'] == '') : ?>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
                        <small>
                            Masukkan Alamat yang Valid
                        </small>
                        <?php else : ?>
                        <textarea class="form-control" rows="3" readonly><?= $user['alamat'] ?></textarea>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="iduser" value="<?= $user['iduser'] ?>">
                    <hr>
                    <?php foreach ($keranjang as $key => $value) : ?>
                    <input type="hidden" name="idtransaksi<?= $no ?>" value="<?= $kode[$no] ?>">
                    <input type="hidden" name="kodeproduk<?= $no ?>" value="<?= $produk[$no - 1]['kodeproduk'] ?>">
                    <input type="hidden" name="idkeranjang<?= $no ?>" value="<?= $keranjang[$no - 1]['idkeranjang'] ?>">
                    <div class="md-form mb-3">
                        <h3>Barang<?= $no ?></h3>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Nama Barang</h4>
                        <div class="">
                            <input type="text" class="form-control" value="<?= $produk[$no - 1]['namaproduk'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Harga Satuan</h4>
                        <div class="">
                            <input type="text" class="form-control"
                                value="Rp. <?= number_format($produk[$no - 1]['harga']) ?>" readonly>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Jumlah</h4>
                        <div class="row">
                            <?php if (!empty($value['p'])) : ?>
                            <div class="col">
                                <span>P</span>
                                <input type="text" name="p<?= $no ?>" class="form-control"
                                    value="<?= number_format($value['p']) ?>" readonly>
                            </div>
                            <div class="col">
                                <span>L</span>
                                <input type="text" name="l<?= $no ?>" class="form-control"
                                    value="<?= number_format($value['l']) ?>" readonly>
                            </div>
                            <?php endif; ?>
                            <div class="col">
                                <span>&nbsp;</span>
                                <input type="text" name="jumlah<?= $no ?>" class="form-control"
                                    value="<?= number_format($value['jumlah']) ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Harga Barang Total</h4>
                        <div class="">
                            <input type="text" class="form-control"
                                value="Rp. <?= number_format($produk[$no - 1]['harga'] * $value['jumlah']) ?>" readonly>
                            <input type="hidden" name="totalharga<?= $no ?>"
                                value="<?= $produk[$no - 1]['harga'] * $value['jumlah'] ?>">
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Berat Barang(Kg)</h4>
                        <div class="">
                            <input type="text" id="berat<?= $no ?>" class="form-control"
                                value="<?= ceil($produk[$no - 1]['berat'] * $value['jumlah']) ?>" readonly>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Desain</h4>
                        <div>
                            <select name="desain<?= $no ?>" id="desain<?= $no ?>" class="form-control">
                                <option value="1">Pilih Desain</option>
                                <option value="desain1">Desain 1</option>
                                <option value="desain2">Desain 2</option>
                                <option value="desain3">Desain 3</option>
                                <option value="custom">Upload Sendiri</option>
                            </select>
                        </div>
                        <div class="row mt-1">
                            <div class="col">
                                <img src="<?= site_url('assets/images/desain/' . $produk[$no - 1]['desain1']) ?>"
                                    style="display: none;" id="desain1<?= $no ?>" width="300" alt="">
                                <img src="<?= site_url('assets/images/desain/' . $produk[$no - 1]['desain2']) ?>"
                                    style="display: none;" id="desain2<?= $no ?>" width="300" alt="">
                                <img src="<?= site_url('assets/images/desain/' . $produk[$no - 1]['desain3']) ?>"
                                    style="display: none;" id="desain3<?= $no ?>" width="300" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="md-form">
                        <label for="desain" class="">Upload Desain : </label>
                        <input type="file" name="desain<?= $no ?>" id="custom<?= $no ?>" class="form-control-file"
                            disabled>
                    </div>
                    <div class="md-form">
                        <h4>Keterangan</h4>
                        <div>
                            <textarea name="ket<?= $no ?>" id="ket<?= $no ?>" class="form-control"></textarea>
                        </div>
                    </div>
                    <hr>
                    <?php $banyak = $no;
                        $no++;
                    endforeach; ?>
                    <div class="md-form mb-3">
                        <h4>Daerah Pengiriman</h4>
                        <div class="">
                            <select class="custom-select d-block w-100" id="daerah" name="kodepos" required>
                                <option value="">Pilih Daerah yang dituju...</option>
                                <?php foreach ($daerah as $keyD => $valueD) : ?>
                                <option value="<?= $valueD['kodepos'] ?>"><?= $valueD['namadaerah'] ?></option>
                                <!-- <input type="hidden" name=""> -->
                                <?php endforeach; ?>
                            </select>
                            <small>
                                Pilih daerah yang sesuai dengan alamat anda
                            </small>
                        </div><br />
                        <div class="md-form mb-3">
                            <div class="md-form mb-3">
                                <label for="ongkir1" class="">Ongkos Pengiriman</label>
                                <input type="text" id="ongkir1" class="form-control" placeholder="Rp. 0,-" readonly>
                                <input type="hidden" id="ongkir" name="ongkir">
                                <small>
                                    Barang akan diterima dalam waktu 3 sampai 7 hari, setelah pemesanan
                                </small>
                            </div>
                            <hr>
                        </div>
                        <div class="md-form mb-3">
                            <h4>Total Biaya</h4>
                            <div class="">
                                <input type="text" id="totall" placeholder="Rp. 0,-" class="form-control" readonly>
                                <input type="hidden" id="total" name="total">
                            </div>
                        </div>
                        <hr>
                        <div class="md-form mb-3">
                            <h4><strong>Transfer ke :</strong></h4>
                            <label for="alamat" class="">Kode Bank: <strong>451</strong></label><br />
                            <label for="alamat" class="">No. Rekening: <strong>7112893201</strong></label><br />
                            <label for="alamat" class="">a.n <strong>Hendrawan</strong> (Bank Syariah Mandiri)</label>
                        </div>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Checkout</button>
                </form>

            </div>
        </div>
</main>
<!-- End #main -->
<script>
document.getElementById("daerah").onchange = function() {
    // coba()
    ongkir()
    // total()
};

document.getElementById("desain").onchange = function() {
    desain()
}

function ongkir() {
    var daerah = document.getElementById("daerah").value;
    var biaya = 0;
    if (daerah === "") {
        biaya = 0;
    }
    <?php foreach ($daerah as $keyD => $valueD) : ?>
    else if (daerah === "<?= $valueD['kodepos'] ?>") {
        biaya = <?= $valueD['hargakirim'] ?>;
    }
    <?php endforeach; ?>
    <?php for ($i = 1; $i < $no; $i++) : ?>
    var berat<?= $i ?> = document.getElementById("berat<?= $i ?>").value
    <?php endfor; ?>
    var beratTotal = <?php for ($i = 1; $i < $no; $i++) : ?>parseInt(berat<?= $i ?>) + <?php endfor; ?>parseInt(0);
    document.getElementById("ongkir").value = biaya * beratTotal;
    document.getElementById("ongkir1").value = Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(document.getElementById("ongkir").value);
    var b = <?= $produk[$no - 2]['harga'] * $value['jumlah'] ?>;
    var o = document.getElementById("ongkir").value;
    var t = parseInt(b) + parseInt(o);
    document.getElementById("total").value = t;
    document.getElementById("totall").value = Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(document.getElementById("total").value);;
}

function total() {
    var h = document.getElementById("harga").value;
    var j = document.getElementById("jumlah").value;
    var t = 0;
    if (h > 0 && j > 0) {
        t = h * j;
    } else {
        t = 0;
    }
    document.getElementById("total").value = t;
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