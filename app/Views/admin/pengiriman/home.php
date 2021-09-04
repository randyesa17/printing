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
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Transaksi</li>
                    <li class="breadcrumb-item active">Pengiriman</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
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
                        <div class="table-responsive-lg">
                            <table class="table shopping-summery">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Transaksi</th>
                                        <th>Nama Pemesan</th>
                                        <th>IDGroup</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Tujuan Pengiriman</th>
                                        <th>Ongkos Kirim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pesanan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['idtransaksi'] ?></td>
                                        <?php if($value['idgroup'] == 0) : ?>
                                        <td colspan="2">
                                            <?php else : ?>
                                        <td>
                                            <?php endif; ?>
                                            <?php foreach ($user as $keyU => $valueU) {
                                                    if ($value['iduser'] == $valueU['iduser']) {
                                                        echo $valueU['namauser'];
                                                    }
                                                } ?>
                                        </td>
                                        <td><?= $value['idgroup'] ?></td>
                                        <td>
                                            <?php foreach ($produk as $keyP => $valueP) {
                                                    if ($value['kodeproduk'] == $valueP['kodeproduk']) {
                                                        echo $valueP['namaproduk'];
                                                    }
                                                } ?>
                                        </td>
                                        <td><?= $value['jumlah'] ?></td>
                                        <td>
                                            <?php foreach ($produk as $keyP => $valueP) {
                                                    if ($value['kodeproduk'] == $valueP['kodeproduk']) {
                                                        echo $valueP['berat'] * $value['jumlah'] . " gram";
                                                    }
                                                } ?>
                                        </td>
                                        <td>
                                            <?php foreach ($user as $keyU => $valueU) {
                                                    if ($value['iduser'] == $valueU['iduser']) {
                                                        echo $valueU['alamat'];
                                                    }
                                                } ?>
                                        </td>
                                        <td>Rp. <?= number_format($value['ongkir']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>