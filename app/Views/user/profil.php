<?= $this->extend('templates/user') ?>
<?= $this->section('content') ?>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Profil</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Data User</h3>
                </div>
                <form action="<?= site_url('user/profil/ubah') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['namauser'] ?>"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telp">Nomor Telpon</label>
                        <?php if($user['telp'] == '') : ?>
                        <input type="text" class="form-control" name="telp" id="telp" required autofocus>
                        <?php else : ?>
                        <input type="text" class="form-control" name="telp" id="telp" value="<?= $user['telp'] ?>"
                            readonly>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $user['email'] ?>"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <?php if($user['alamat'] == '') : ?>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
                        <small>
                            Masukkan Alamat yang Valid
                        </small>
                        <?php else : ?>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"
                            readonly><?= $user['alamat'] ?></textarea>
                        <?php endif; ?>
                    </div>
                    <div class="btn-group">
                        <button type="submit" id="submit" class="ml-auto btn btn-danger"
                            style="display:none;">Simpan</button>
                        <a href="#" class="ml-auto btn btn-warning" id="ubah">Ubah</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById("ubah").onclick = function() {
    ubah()
};

function ubah() {
    if (document.getElementById("ubah").innerHTML == "Ubah") {
        document.getElementById("ubah").innerHTML = "Batal";
        document.getElementById("submit").style.display = "block";
        document.getElementById("nama").readOnly = false;
        document.getElementById("telp").readOnly = false;
        document.getElementById("email").readOnly = false;
        document.getElementById("alamat").readOnly = false;
    } else {
        document.getElementById("ubah").innerHTML = "Ubah";
        document.getElementById("submit").style.display = "none";
        document.getElementById("nama").readOnly = true;
        document.getElementById("telp").readOnly = true;
        document.getElementById("email").readOnly = true;
        document.getElementById("alamat").readOnly = true;
    }
}
</script>
<?= $this->endSection() ?>