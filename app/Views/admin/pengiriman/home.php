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
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Tujuan Pengiriman</th>
                                        <th>Ongkos Kirim</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pesanan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['idtransaksi'] ?></td>
                                        <td>
                                            <?php foreach ($user as $keyU => $valueU) {
                                                    if ($value['iduser'] == $valueU['iduser']) {
                                                        echo $valueU['namauser'];
                                                    }
                                                } ?>
                                        </td>
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
                                                        echo $valueP['berat'] * $value['jumlah'] . " Kg";
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
                                        <td>
                                            <a href="<?= site_url('admin/pengiriman/pesan?idtransaksi=' . $value['idtransaksi']) ?>"
                                                class="btn-md"><i class="fa fa-whatsapp"></i></a>
                                        </td>
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