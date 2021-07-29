<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1><?= $judul ?></h1>
            </div>
            <a href="<?= site_url('admin/atur/tambah') ?>" class="btn section shopping-summery" weight="50px">Tambahkan
                Data</a>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Data Admin</li>
                    <li class="breadcrumb-item active">Admin</li>
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
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode admin</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($admin as $key => $value) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['kodeadmin'] ?></td>
                                    <td class="text-center"><?= $value['nama'] ?></td>
                                    <td class="text-center"><?= $value['email'] ?></td>
                                    <td class="text-center">
                                        <?php if($value['kodeadmin'] != session()->get('kodeadmin')) : ?>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a onclick="return confirm('Apa anda yakin?')"
                                                href="<?= site_url('admin/atur/hapus?kodeadmin='.$value['kodeadmin']) ?>"
                                                class="btn btn-xs btn-danger">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </a>
                                        </div>
                                        <?php endif; ?>
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