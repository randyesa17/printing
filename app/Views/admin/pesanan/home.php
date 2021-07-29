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
                    <li class="breadcrumb-item active">Pesanan</li>
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
                                        <th width="100">Tanggal</th>
                                        <th>Nama Pemesan</th>
                                        <th>Produk</th>
                                        <th>Desain</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pesanan as $key => $value) : ?>
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
                                        <td class="image" data-title="No">
                                            <?php if(!empty($value['bukti'])) : ?>
                                            <a href="<?= site_url('assets/images/bukti/'.$value['bukti']) ?>"
                                                target="_blank">Lihat Bukti</a>
                                            <?php else : ?>
                                            -
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $value['status'] ?></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn-md btn-icon-only" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <?php if($value['status'] == 'Menunggu Verifikasi') : ?>
                                                    <a class="dropdown-item"
                                                        href="<?= site_url('admin/transaksi/verifikasi?idtransaksi='.$value['idtransaksi']) ?>">Verifikasi</a>
                                                    <?php elseif($value['status'] == 'Diproses') : ?>
                                                    <a class="dropdown-item"
                                                        href="<?= site_url('admin/transaksi/kirim?idtransaksi='.$value['idtransaksi']) ?>">Kirim
                                                        Barang</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
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