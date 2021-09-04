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
                        <form action="<?= site_url('admin/karyawan/ubah') ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="kode" value="<?= $karyawan['kodekaryawan'] ?>">
                            <div class="form-group">
                                <label for="nama">Nama Karyawan</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Nama Karyawan" value="<?= $karyawan['nama'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" id="jabatan"
                                    placeholder="Jabatan" value="<?= $karyawan['jabatan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"
                                    required><?= $karyawan['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                    value="<?= $karyawan['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telepon</label>
                                <input type="text" name="telp" class="form-control" id="telp"
                                    placeholder="Nomor Telepon" value="<?= $karyawan['telp'] ?>" required>
                            </div>
                            <div class="col-18 text-right">
                                <a href="<?= site_url('admin/karyawan') ?>" class="btn">Kembali</a>
                                <button type="submit" class="btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>