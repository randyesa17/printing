<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AMIK Digital Printing - Daftar</title>
    <link rel="icon" href="<?= site_url('assets/publik/img/favicon1.png') ?>">
    <link rel="stylesheet" href="<?= site_url('assets/publik/css/styles.css') ?>">
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"><?= $judul ?></h3>
                                    <p class="text-center">Selamat Datang, Silahkan Lengkapi Data Di Bawah Ini</p>
                                </div>
                                <div class="card-body">
                                    <div class="col">
                                        <?php if(!empty(session()->getFlashdata('info'))) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php 
                                                echo session()->getFlashdata('info'); 
                                            ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <form action="<?= site_url('user/daftar') ?>" method="post">
                                        <input type="hidden" name="iduser" value="<?= $kode ?>">
                                        <div class="form-group">
                                            <label for="namauser" class="small mb-1">Nama Lengkap</label>
                                            <input type="text" name="namauser" id="namauser" class="form-control py-4"
                                                placeholder="Masukkan Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="small mb-1">Email</label>
                                            <input type="email" name="email" id="email" class="form-control py-4"
                                                placeholder="Masukkan Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="small mb-1">Password</label>
                                            <input type="password" name="password" id="password"
                                                class="form-control py-4" placeholder="Masukkan Password" required>
                                        </div>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?= site_url('user/login') ?>">Saya Memiliki Akun...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; Copyright <strong><span>AMIK STUDIO</span></strong>. 2021</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= site_url('assets/publik/js/scripts.js') ?>"></script>
</body>

</html>