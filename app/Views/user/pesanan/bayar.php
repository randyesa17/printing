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
                        <label><strong>Nama Pemesan : </strong><?= $user['namauser'] ?></label>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Email : </strong><?= $user['email'] ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label><strong>Nomor Telpon/HP : </strong><?= $user['telp'] ?></label>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Alamat : </strong><?= $user['alamat'] ?></label>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label><strong>Nama Produk : </strong><?= $produk['namaproduk'] ?></label>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Harga Satuan : </strong>Rp. <?= number_format($produk['harga']) ?></label>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php $sat = '';
                            foreach ($satuan as $keyS => $valueS) {
                                if ($produk['idsatuan'] == $valueS['idsatuan']) {
                                    $sat = $valueS['satuan'];
                                }
                            }
                        ?>
                        <?php if (!empty($pesanan['p'])) : ?>
                        <label><strong>Jumlah : </strong><?= $pesanan['p'] ?> X <?= $pesanan['l'] ?> =
                            <?= $pesanan['jumlah']." ".$sat ?></label>
                        <?php else : ?>
                        <label><strong>Jumlah : </strong><?= $pesanan['jumlah']." ".$sat ?></label>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Harga Total : </strong>Rp. <?= number_format($pesanan['totalharga']) ?></label>
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label class=""><strong>Keterangan Pesan :</strong></label><br>
                        <?php if(!empty($pesanan['tambahan'])) : ?>
                        <p><?= $pesanan['jumlah']?></p>
                        <?php else : ?>
                        Tidak Ada<br /><br />
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label class=""><strong>Tambahan :</strong></label><br>
                        <?php if(!empty($pesanan['tambahan'])) : ?>
                        <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start">
                            <img class="img-fluid" src="<?= site_url('assets/images/tambahan/'.$pesanan['tambahan']) ?>"
                                width="550" alt="" />
                        </div>
                        <?php else : ?>
                        Tidak Ada<br /><br />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="md-form mt-4">
                    <label class=""><strong>Jenis yang diinginkan :</strong></label><br /><br />
                    <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start"><img class="img-fluid"
                            src="<?= site_url('assets/images/desain/'.$pesanan['desain']) ?>" width="550"
                            alt="" /><br /><br />
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label>
                            <strong>
                                <h4>Ongkos Kirim : Rp. <?= number_format($pesanan['ongkir']) ?></h4>
                            </strong>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>
                            <strong>
                                <h4>Total Biaya : Rp. <?= number_format($pesanan['totalbiaya']) ?></h4>
                            </strong>
                        </label>
                    </div>
                </div><br />

                <hr>
                <div class="md-form mb-3">
                    <div class="md-form mb-3">
                        <h4><strong>Transfer ke :</strong></h4>
                        <label for="alamat" class="">Kode Bank: <strong>451</strong></label><br />
                        <label for="alamat" class="">No. Rekening: <strong>7112893201</strong></label><br />
                        <label for="alamat" class="">a.n <strong>Emmily</strong> (Bank Syariah Mandiri)</label>
                    </div>
                    <hr>
                </div>
                <form action="<?= site_url('user/pesanan/bayar?idtransaksi='.$pesanan['idtransaksi']) ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="md-form mb-3">
                        <h4>Bukti Upload Pembayaran</h4>
                        <input type="file" name="bukti" class="form-control-file" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-danger btn-lg btn-block">Konfirmasi</button>
                </form>

            </div>
        </div>
</main>
<!-- End #main -->
<?= $this->endSection() ?>