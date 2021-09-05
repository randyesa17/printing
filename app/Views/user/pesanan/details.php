<?= $this->extend('templates/user') ?>
<?= $this->section('content') ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Pesanan</h2>
                <ol>
                    <li><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li><a href="<?= site_url('user/pesanan') ?>">Pesanan</a></li>
                    <li>Detail</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="contact" class="contact">
        <div class="container">
            <h2><strong>Detail Pesanan</strong></h2><br /><br />

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
                <?php $sat = ''; foreach ($pesanan as $key => $value) : ?>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label><strong>Nama Produk : </strong><?php
                        foreach ($produk as $keyP => $valueP) {
                            if ($value['kodeproduk'] == $valueP['kodeproduk']) {
                                echo $valueP['namaproduk'];
                            }
                        }
                        ?></label>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Harga Satuan : </strong><?php
                        foreach ($produk as $keyP => $valueP) {
                            if ($value['kodeproduk'] == $valueP['kodeproduk']) {
                                echo "Rp. ".number_format($valueP['harga']);
                            }
                        }
                        ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        foreach ($produk as $keyP => $valueP) {
                            if ($value['kodeproduk'] == $valueP['kodeproduk']) {
                                foreach ($satuan as $keyS => $valueS) {
                                    if ($valueP['idsatuan'] == $valueS['idsatuan']) {
                                        $sat = $valueS['satuan'];
                                    }
                                }
                            }
                        }
                        ?>
                        <?php if (!empty($value['p'])) : ?>
                        <label><strong>Jumlah : </strong><?= $value['p'] ?> X <?= $value['l'] ?> =
                            <?= $value['jumlah']." ".$sat ?></label>
                        <?php else : ?>
                        <label><strong>Jumlah : </strong><?= $value['jumlah']." ".$sat ?></label>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label><strong>Harga Total : </strong>Rp. <?= number_format($value['totalharga']) ?></label>
                    </div>
                </div>
                <div class="md-form row">
                    <div class="col-md-6">
                        <label class=""><strong>Keterangan Pesan :</strong></label><br>
                        <?php if(!empty($value['ket'])) : ?>
                        <?= $pesanan['ket']?>
                        <?php else : ?>
                        Tidak Ada<br /><br />
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label class=""><strong>Tambahan :</strong></label><br>
                        <?php if(!empty($value['tambahan'])) : ?>
                        <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start">
                            <img class="img-fluid" src="<?= site_url('assets/images/tambahan/'.$value['tambahan']) ?>"
                                width="550" alt="" />
                        </div>
                        <?php else : ?>
                        Tidak Ada<br /><br />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="md-form">
                    <label class=""><strong>Jenis Yang Diinginkan :</strong></label><br /><br />
                    <div class="col-md-5 col-lg-6 order-md-0 text-center text-md-start">
                        <img class="img-fluid" src="<?= site_url('assets/images/desain/'.$value['desain']) ?>"
                            width="550" alt="" /><br /><br />
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label>
                            <strong>
                                <h4>Ongkos Kirim : Rp. <?= number_format($pesanan[0]['ongkir']) ?></h4>
                            </strong>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>
                            <strong>
                                <h4>Total Biaya : Rp. <?= number_format($pesanan[0]['totalbiaya']) ?></h4>
                            </strong>
                        </label>
                    </div>
                </div>
                <br />
            </div>
        </div>
</main>
<!-- End #main -->
<?= $this->endSection() ?>