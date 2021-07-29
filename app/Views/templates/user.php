<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMIK Digital Printing | Cepat, Murah & Berkualitas</title>
    <!-- Favicons -->
    <link href="<?= site_url('assets/publik/img/favicon.png') ?>" rel="icon">
    <link href="<?= site_url('assets/publik/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= site_url('assets/publik/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/publik/vendor/icofont/icofont.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/publik/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/publik/vendor/animate.css/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/publik/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/publik/vendor/venobox/venobox.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/publik/vendor/owl.carousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= site_url('assets/publik/css/style.css') ?>" rel="stylesheet">


</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo"><a href="<?= site_url('user') ?>"><img src="<?= site_url('assets/publik/img/logo.jpg') ?>"
                        alt=""></a></h1>

            <nav class="nav-menu d-none d-lg-block">

                <ul>
                    <li class="active"><a href="<?= site_url('user') ?>">Beranda</a></li>
                    <li><a href="<?= site_url('user/produk') ?>">Produk</a></li>
                    <li><a href="<?= site_url('user/keranjang') ?>">Keranjang</a></li>
                    <li><a href="<?= site_url('user/pesanan') ?>">Pesanan</a></li>
                    <li><a href="<?= site_url('user/profil') ?>">Profil Saya</a></li>
                    <li><a href="<?= site_url('user') ?>#about">Tentang</a></li>
                    <li><a href="<?= site_url('user') ?>#contact">Kontak</a></li>
                </ul>

            </nav><!-- .nav-menu -->

            <a href="<?= site_url('user/logout') ?>" class="get-started-btn ml-auto">Keluar</a>

        </div>
    </header><!-- End Header -->

    <?= $this->renderSection('content') ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>AMIK Digital Printing</span></strong>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="<?= site_url('assets/publik/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= site_url('assets/publik/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= site_url('assets/publik/vendor/jquery.easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= site_url('assets/publik/vendor/php-email-form/validate.js') ?>"></script>
    <script src="<?= site_url('assets/publik/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= site_url('assets/publik/vendor/venobox/venobox.min.js') ?>"></script>
    <script src="<?= site_url('assets/publik/vendor/waypoints/jquery.waypoints.min.js') ?>"></script>
    <script src="<?= site_url('assets/publik/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= site_url('assets/publik/js/main.js') ?>"></script>
</body>

</html>