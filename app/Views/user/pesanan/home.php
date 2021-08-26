<?= $this->extend('templates/user') ?>
<?= $this->section('content') ?>
<!-- Icons -->
<link rel="stylesheet" href="<?= site_url('assets/publik/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
<link rel="stylesheet" href="<?= site_url('assets/publik/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>"
    type="text/css">
<!-- Argon CSS -->
<link rel="stylesheet" href="<?= site_url('assets/publik/css/argon.css?v=1.2.0') ?>" type="text/css">
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pesanan Saya</h2>
                <ol>
                    <li><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li>Pesanan Saya</li>
                </ol>
            </div>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="contact" class="contact">
        <div class="container">
            <div class="card-header border-0">
                <h3 class="mb-0">Pesanan Saya</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Ongkos Kirim</th>
                            <th scope="col">Total Biaya</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php foreach ($pesanan as $key => $value) : ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($value['tgl'])) ?></td>
                            <td>
                                <?php foreach ($produk as $keyP => $valueP) : ?>
                                <?php if ($value['kodeproduk'] == $valueP['kodeproduk']) : ?>
                                <div class="media align-items-center">
                                    <a href="<?= site_url('user/produk/detail?kodeproduk='.$valueP['kodeproduk']) ?>"
                                        class="avatar rounded-circle mr-3">
                                        <img alt="Image placeholder"
                                            src="<?= site_url('assets/images/produk/'.$valueP['gambar']) ?>">
                                    </a>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm"><?= $valueP['namaproduk'] ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td><?= $value['jumlah'] ?></td>
                            <td class="budget">Rp. <?= number_format($value['totalharga']) ?></td>
                            <td class="budget">Rp. <?= number_format($value['ongkir']) ?></td>
                            <td class="budget">Rp. <?= number_format($value['totalbiaya']) ?></td>
                            <td><?= $value['status'] ?></td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <?php if($value['status'] == 'Belum Bayar') : ?>
                                        <a class="dropdown-item"
                                            href="<?= site_url('user/pesanan/bayar?idtransaksi='.$value['idtransaksi']) ?>">Bayar</a>
                                        <?php elseif($value['status'] == 'Dikirim') : ?>
                                        <a class="dropdown-item"
                                            href="<?= site_url('user/pesanan/terima?idtransaksi='.$value['idtransaksi']) ?>">Diterima</a>
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
</main>
<!-- End #main -->
<?= $this->endSection() ?>