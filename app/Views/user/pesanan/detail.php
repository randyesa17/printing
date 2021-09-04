<?= $this->extend('templates/user') ?>
<?= $this->section('content') ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Konfirmasi Bayar</h2>
                <ol>
                    <li><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li><a href="<?= site_url('user/pesanan') ?>">Pesanan</a></li>
                    <li>Konfirmasi Bayar</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="contact" class="contact">
        <div class="container">
            <h2><strong>Konfirmasi Bukti Transfer</strong></h2><br /><br />

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
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label>Nama Produk : <?= $produk['namaproduk'] ?></label>
                    </div>
                    <div class="col-md-6">
                        <?php $sat = '';
                        foreach ($produk as $keyP => $valueP) {
                            if ($produk['kodeproduk'] == $valueP['kodeproduk']) {
                                foreach ($satuan as $keyS => $valueS) {
                                    if ($valueP['idsatuan'] == $valueS['idsatuan']) {
                                        $sat = $valueS['satuan'];
                                    }
                                }
                            }
                        }
                        ?>
                        <label>Jumlah : <?= $pesanan['jumlah']." ".$sat ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Harga : Rp. <?= number_format($pesanan['totalharga']) ?></label>
                    </div>
                    <div class="col-md-6">
                        <label>Ongkos Kirim : Rp. <?= number_format($pesanan['ongkir']) ?></label>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label>
                            <strong>
                                <h4>Total Biaya : Rp. <?= number_format($pesanan['totalbiaya']) ?></h4>
                            </strong>
                        </label>
                    </div>
                </div>
                <div class="md-form mt-4">
                    <label class=""><strong>Tambahan</strong></label><br>
                    <?php if(!empty($pesanan['tambahan'])) : ?>
                    <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start">
                        <img class="img-fluid" src="<?= site_url('assets/images/tambahan/'.$pesanan['tambahan']) ?>"
                            width="550" alt="" />
                    </div>
                    <?php else : ?>
                    Tidak Ada<br /><br />
                    <?php endif; ?>
                    <label class=""><strong>Desain yang diinginkan</strong></label><br /><br />
                    <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start"><img class="img-fluid"
                            src="<?= site_url('assets/images/desain/'.$pesanan['desain']) ?>" width="550"
                            alt="" /><br /><br />
                    </div>
                </div><br />
            </div>
        </div>
</main>
<!-- End #main -->
<?= $this->endSection() ?>