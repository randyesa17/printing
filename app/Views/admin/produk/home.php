<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1><?= $judul ?></h1>
            </div>
            <a href="<?= site_url('admin/produk/tambah') ?>" class="btn section shopping-summery"
                weight="50px">Tambahkan Data</a>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Produk</li>
                    <li class="breadcrumb-item active">Produk</li>
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
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Nama Produk</th>
                                    <th class="text-center">Harga Satuan</th>
                                    <th class="text-center">Berat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produk as $key => $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="image" data-title="No"><img
                                            src="<?= site_url('assets/images/produk/'.$value['gambar']) ?>" alt="#">
                                    </td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a><?= $value['namaproduk'] ?></a></p>
                                    </td>
                                    <td class="price" data-title="Price">Rp. <?= number_format($value['harga']) ?></td>
                                    <td class="price"><?= $value['berat'] ?> Kg/Pcs</td>
                                    <td class="text-center">
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a href="<?= site_url('admin/produk/desain?kodeproduk='.$value['kodeproduk']) ?>"
                                                class="btn-sm btn-primary">Lihat Desain</a>
                                            <a href="<?= site_url('admin/produk/ubah?kodeproduk='.$value['kodeproduk']) ?>"
                                                class="btn-sm btn-info">
                                                <i class="ace-icon fa fa-edit bigger-120"></i>
                                            </a>
                                            <a onclick="return confirm('Apa anda yakin?')"
                                                href="<?= site_url('admin/produk/hapus?kodeproduk='.$value['kodeproduk']) ?>"
                                                class="btn-sm btn-danger">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </a>
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
</section>
<?= $this->endSection() ?>