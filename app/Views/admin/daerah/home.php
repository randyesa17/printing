<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1><?= $judul ?></h1>
            </div>
            <a href="<?= site_url('admin/daerah/tambah') ?>" class="btn section shopping-summery"
                weight="50px">Tambahkan Data</a>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Daerah</li>
                    <li class="breadcrumb-item active">Daerah</li>
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
                                    <th>Kode Pos</th>
                                    <th>Nama Daerah</th>
                                    <th>Harga Kirim</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($daerah as $key => $value) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['kodepos'] ?></td>
                                    <td class="product-des text-center" data-title="Description">
                                        <p class="product-name"><a><?= $value['namadaerah'] ?></a></p>
                                    </td>
                                    <td class="price" data-title="Price">Rp. <?= number_format($value['hargakirim']) ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a href="<?= site_url('admin/daerah/ubah?kodepos='.$value['kodepos']) ?>"
                                                class="btn-sm btn-info">
                                                <i class="ace-icon fa fa-edit bigger-120"></i>
                                            </a>
                                            <a onclick="return confirm('Apa anda yakin?')"
                                                href="<?= site_url('admin/daerah/hapus?kodepos='.$value['kodepos']) ?>"
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