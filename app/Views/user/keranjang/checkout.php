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

                <div class="row">
                    <div class="col-md-6">
                        <label>Nama Pemesan : <?= $user['namauser'] ?></label>
                    </div>
                    <div class="col-md-6">
                        <label>Email : <?= $user['email'] ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Nomor Telpon/HP : <?= $user['telp'] ?></label>
                    </div>
                    <div class="col-md-6">
                        <label>Alamat : <?= $user['alamat'] ?></label>
                    </div>
                </div>

                <form action="<?= site_url('user/pesanan/masuk') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idtransaksi" value="<?= $kode ?>">
                    <input type="hidden" name="iduser" value="<?= $user['iduser'] ?>">
                    <input type="hidden" name="kodeproduk" value="<?= $produk['kodeproduk'] ?>">
                    <input type="hidden" name="idkeranjang" value="<?= $keranjang['idkeranjang'] ?>">
                    <hr>
                    <div class="md-form mb-3">
                        <h4>Nama Barang</h4>
                        <div class="">
                            <input type="text" class="form-control" value="<?= $produk['namaproduk'] ?>" readonly>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Harga Satuan</h4>
                        <div class="">
                            <input type="text" class="form-control" value="Rp. <?= number_format($produk['harga']) ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Jumlah</h4>
                        <div class="">
                            <input type="text" name="jumlah" class="form-control"
                                value="<?= number_format($keranjang['jumlah']) ?>" readonly>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Harga Barang Total</h4>
                        <div class="">
                            <input type="text" class="form-control"
                                value="Rp. <?= number_format($produk['harga'] * $keranjang['jumlah']) ?>" readonly>
                            <input type="hidden" name="totalharga"
                                value="<?= $produk['harga'] * $keranjang['jumlah'] ?>">
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Berat Barang(Kg)</h4>
                        <div class="">
                            <input type="text" id="berat" class="form-control"
                                value="<?= ceil(($produk['berat'] * $keranjang['jumlah'])/1000) ?>" readonly>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <h4>Keterangan Pesan</h4>
                        <div class="">
                            <textarea class="form-control" readonly><?= $keranjang['keterangan'] ?></textarea>
                        </div>
                    </div>
                    <div class="md-form mt-4 row">
                        <div class="col-md-6">
                            <label class=""><strong>Jenis yang diinginkan</strong></label><br /><br />
                            <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start">
                                <img class="img-fluid"
                                    src="<?= site_url('assets/images/desain/'.$keranjang['desain']) ?>" width="550"
                                    alt="" /><br /><br />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=""><strong>Tambahan Gambar</strong></label><br /><br />
                            <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start">
                                <img class="img-fluid"
                                    src="<?= site_url('assets/images/tambahan/'.$keranjang['tambahan']) ?>" width="550"
                                    alt="" /><br /><br />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="md-form mb-3">
                        <h4>Daerah Pengiriman</h4>
                        <div class="">
                            <select class="custom-select d-block w-100" id="daerah" name="kodepos" required>
                                <option value="">Pilih Daerah yang dituju...</option>
                                <?php foreach ($daerah as $key => $value) : ?>
                                <option value="<?= $value['kodepos'] ?>"><?= $value['namadaerah'] ?></option>
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
                                <input type="text" id="total1" placeholder="Rp. 0,-" class="form-control" readonly>
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
    <?php foreach ($daerah as $key => $value) : ?>
    else if (daerah === "<?= $value['kodepos'] ?>") {
        biaya = <?= $value['hargakirim'] ?>;
    }
    <?php endforeach; ?>
    var berat = document.getElementById("berat").value;
    document.getElementById("ongkir").value = biaya * berat;
    document.getElementById("ongkir1").value = Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(document.getElementById("ongkir").value);
    var b = <?= $produk['harga'] * $keranjang['jumlah'] ?>;
    var o = document.getElementById("ongkir").value;
    var t = parseInt(b) + parseInt(o);
    document.getElementById("total").value = t;
    document.getElementById("total1").value = Intl.NumberFormat('id-ID', {
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