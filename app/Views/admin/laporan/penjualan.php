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
                <form action="<?= site_url('admin/laporan/penjualan/cari?laporan=penjualan')?>" method="post">
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
                                        <th>Produk</th>
                                        <th>Terjual</th>
                                        <th>Uang Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($produk as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['namaproduk'] ?></td>
                                        <td><?= number_format($value['terjual']) ?></td>
                                        <td>Rp. <?= number_format($value['total']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="3">Total Uang yang Masuk</td>
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