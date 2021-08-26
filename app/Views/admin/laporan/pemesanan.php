<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<style>
@media print {
    body * {
        visibility: hidden;
    }

    #section-to-print,
    #section-to-print * {
        visibility: visible;
    }

    #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
    }

    #print {
        visibility: hidden;
    }
}
</style>
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
                    <li class="breadcrumb-item active">Laporan</li>
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
        <div class="row">
            <div class="col-12">
                <form action="<?= site_url('admin/laporan/pemesanan/cari?laporan=pemesanan')?>" method="post">
                    <div class="form-group col-6 float-left">
                        <label for="awal">Awal</label>
                        <input class="form-control" type="date" name="awal" id="awal" required>
                    </div>
                    <div class="form-group col-6 float-left">
                        <label for="sampai">Sampai</label>
                        <input class="form-control" type="date" name="sampai" id="sampai" required>
                    </div>
                    <div class="form-group mt-3">
                        <input class="btn btn-primary" type="submit" value="CARI" name="cari">
                    </div>
                </form>
            </div>
        </div>
        <div class="shopping-cart section" id="section-to-print">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-3"><?= $judul ?></h4>
                        <!-- Shopping Summery -->
                        <div class="table-responsive-lg">
                            <table class="table shopping-summery">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="100">Tanggal</th>
                                        <th>Nama Pemesan</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>Produk</th>
                                        <th>Desain</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($transaksi as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= date('d/m/Y', strtotime($value['tgl'])) ?></td>
                                        <td>
                                            <?php foreach ($user as $keyU => $valueU) {
                                            if ($value['iduser'] == $valueU['iduser']) {
                                                echo $valueU['namauser'];
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
                                        <td>
                                            <?php foreach ($user as $keyU => $valueU) {
                                            if ($value['iduser'] == $valueU['iduser']) {
                                                echo $valueU['telp'];
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
                                        <td class="image" data-title="No"><a
                                                href="<?= site_url('assets/images/desain/'.$value['desain']) ?>"
                                                download>Download Desain</a>
                                        </td>
                                        <td><?= $value['jumlah'] ?></td>
                                        <td>Rp. <?= number_format($value['totalbiaya']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="8">Total Uang yang Masuk</td>
                                        <td class="text-right">Rp. <?= number_format($total) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($total != 0) : ?>
        <input class="btn btn-primary" onclick="window.print()" value="PRINT">
        <?php endif; ?>
    </div>
</section>
<?= $this->endSection() ?>