<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - AMIK Digital Printing | Cepat, Murah & Berkualitas</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Toastr -->
    <link href="<?= site_url('assets/admin/css/lib/toastr/toastr.min.css') ?>" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="<?= site_url('assets/admin/css/lib/sweetalert/sweetalert.css') ?>" rel="stylesheet">
    <!-- Range Slider -->
    <link href="<?= site_url('assets/admin/css/lib/rangSlider/ion.rangeSlider.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/admin/css/lib/rangSlider/ion.rangeSlider.skinFlat.css') ?>" rel="stylesheet">
    <!-- Bar Rating -->
    <link href="<?= site_url('assets/admin/css/lib/barRating/barRating.css') ?>" rel="stylesheet">
    <!-- Nestable -->
    <link href="<?= site_url('assets/admin/css/lib/nestable/nestable.css') ?>" rel="stylesheet">
    <!-- JsGrid -->
    <link href="<?= site_url('assets/admin/css/lib/jsgrid/jsgrid-theme.min.css') ?>" rel="stylesheet" />
    <link href="<?= site_url('assets/admin/css/lib/jsgrid/jsgrid.min.css') ?>" type="text/css" rel="stylesheet" />
    <!-- Datatable -->
    <link href="<?= site_url('assets/admin/css/lib/datatable/dataTables.bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?= site_url('assets/admin/css/lib/data-table/buttons.bootstrap.min.css') ?>" rel="stylesheet" />
    <!-- Calender 2 -->
    <link href="<?= site_url('assets/admin/css/lib/calendar2/pignose.calendar.min.css') ?>" rel="stylesheet">
    <!-- Weather Icon -->
    <link href="<?= site_url('assets/admin/css/lib/weather-icons.css') ?>" rel="stylesheet" />
    <!-- Owl Carousel -->
    <link href="<?= site_url('assets/admin/css/lib/owl.carousel.min.css') ?>" rel="stylesheet" />
    <link href="<?= site_url('assets/admin/css/lib/owl.theme.default.min.css') ?>" rel="stylesheet" />
    <!-- Select2 -->
    <link href="<?= site_url('assets/admin/css/lib/select2/select2.min.css') ?>" rel="stylesheet">
    <!-- Chartist -->
    <link href="<?= site_url('assets/admin/css/lib/chartist/chartist.min.css') ?>" rel="stylesheet">
    <!-- Calender -->
    <link href="<?= site_url('assets/admin/css/lib/calendar/fullcalendar.css') ?>" rel="stylesheet" />

    <!-- Common -->
    <link href="<?= site_url('assets/admin/css/lib/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/admin/css/lib/themify-icons.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/admin/css/lib/menubar/sidebar.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/admin/css/lib/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/admin/css/lib/helper.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/admin/css/style.css') ?>" rel="stylesheet">

    <!-- StyleSheet -->
    <!-- Magnific Popup -->
    <link href="<?= site_url('assets/publik/css/magnific-popup.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= site_url('assets/publik/css/font-awesome.css') ?>" rel="stylesheet">
    <!-- Fancybox -->
    <link href="<?= site_url('assets/publik/css/jquery.fancybox.min.css') ?>" rel="stylesheet">
    <!-- Themify Icons -->
    <link href="<?= site_url('assets/publik/css/themify-icons.css') ?>" rel="stylesheet">
    <!-- Nice Select CSS -->
    <link href="<?= site_url('assets/publik/css/niceselect.css') ?>" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="<?= site_url('assets/publik/css/animate.css') ?>" rel="stylesheet">
    <!-- Flex Slider CSS -->
    <link href="<?= site_url('assets/publik/css/flex-slider.min.css') ?>" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="<?= site_url('assets/publik/css/owl-carousel.css') ?>" rel="stylesheet">
    <!-- Slicknav -->
    <link href="<?= site_url('assets/publik/css/slicknav.min.css') ?>" rel="stylesheet">

    <!-- Eshop StyleSheet -->
    <link href="<?= site_url('assets/publik/css/reset.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/publik/css/styless.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/publik/css/responsive.css') ?>" rel="stylesheet">
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo">
                    <a href="<?= site_url('admin') ?>">
                        <span>AMIK Digital Printing</span>
                    </a>
                </div>
                <ul>
                    <li class="label">Halaman Utama</li>
                    <li>
                        <a href="<?= site_url('admin') ?>">
                            <i class="ti-home"></i> Beranda
                        </a>
                    </li>
                    <li class="label">Produk</li>
                    <li>
                        <a href="<?= site_url('admin/produk') ?>">
                            <i class="ti-layout"></i> Produk
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/daerah') ?>">
                            <i class="ti-map"></i> Daerah
                        </a>
                    </li>
                    <li class="label">Pemesanan</li>
                    <li>
                        <a href="<?= site_url('admin/transaksi') ?>">
                            <i class="ti-shopping-cart"></i> Transaksi
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/pengiriman') ?>">
                            <i class="ti-map-alt"></i> Pengiriman
                        </a>
                    </li>
                    <li class="label">Laporan</li>
                    <li>
                        <a href="<?= site_url('admin/laporan') ?>">
                            <i class="ti-files"></i> Laporan
                        </a>
                    </li>
                    <li class="label">Admin</li>
                    <li>
                        <a href="<?= site_url('admin/atur') ?>">
                            <i class="ti-user"></i> Admin
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/logout') ?>">
                            <i class="ti-power-off"></i> Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">Admin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
                <footer id="footer">
                    <div class="container">
                        <div class="copyright">
                            &copy; Copyright <strong><span>AMIK Digital Printing</span></strong>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Common -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/jquery.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jquery.nanoscroller.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/menubar/sidebar.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/preloader/pace.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/bootstrap.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/scripts.js"></script>

    <!-- Calender -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/moment/moment.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/calendar/fullcalendar.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/calendar/fullcalendar-init.js"></script>

    <!--  Flot Chart -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/excanvas.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/jquery.flot.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/jquery.flot.time.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/jquery.flot.stack.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/jquery.flot.resize.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/curvedLines.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/flot-chart/flot-chart-init.js"></script>

    <!--  Chartist -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/chartist/chartist.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/chartist/chartist-init.js"></script>

    <!--  Chartjs -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/chart-js/chartjs-init.js"></script>

    <!--  Knob -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/knob/jquery.knob.min.js "></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/knob/knob.init.js "></script>

    <!--  Morris -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/morris-chart/raphael-min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/morris-chart/morris.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/morris-chart/morris-init.js"></script>

    <!--  Peity -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/peitychart/jquery.peity.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/peitychart/peitychart.init.js"></script>

    <!--  Sparkline -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/sparklinechart/sparkline.init.js"></script>

    <!-- Select2 -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/select2/select2.full.min.js"></script>

    <!--  Validation -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/form-validation/jquery.validate-init.js"></script>

    <!--  Circle Progress -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/circle-progress/circle-progress-init.js"></script>

    <!--  Vector Map -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/jquery.vmap.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.algeria.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.argentina.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.brazil.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.france.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.germany.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.greece.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.iran.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.iraq.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.russia.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.tunisia.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.europe.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/vector-map/country/jquery.vmap.usa.js"></script>

    <!--  Simple Weather -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/weather/weather-init.js"></script>

    <!--  Owl Carousel -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/owl-carousel/owl.carousel-init.js"></script>

    <!--  Calender 2 -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/calendar-2/pignose.init.js"></script>


    <!-- Datatable -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/datatables.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/buttons.dataTables.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/buttons.flash.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/jszip.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/pdfmake.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/data-table/datatables-init.js"></script>

    <!-- JS Grid -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/db.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/jsgrid.core.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/jsgrid.load-indicator.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/jsgrid.load-strategies.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/jsgrid.sort-strategies.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/jsgrid.field.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/fields/jsgrid.field.text.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/fields/jsgrid.field.number.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/fields/jsgrid.field.select.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/fields/jsgrid.field.checkbox.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/fields/jsgrid.field.control.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/jsgrid/jsgrid-init.js"></script>

    <!--  Datamap -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/datamap/d3.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/datamap/topojson.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/datamap/datamaps.world.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/datamap/datamap-init.js"></script>

    <!--  Nestable -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/nestable/jquery.nestable.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/nestable/nestable.init.js"></script>

    <!--ION Range Slider JS-->
    <script src="<?= site_url('assets/admin/') ?>js/lib/rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/rangeSlider/moment.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/rangeSlider/moment-with-locales.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/rangeSlider/rangeslider.init.js"></script>

    <!-- Bar Rating-->
    <script src="<?= site_url('assets/admin/') ?>js/lib/barRating/jquery.barrating.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/barRating/barRating.init.js"></script>

    <!-- jRate -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/rating1/jRate.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/rating1/jRate.init.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/sweetalert/sweetalert.init.js"></script>

    <!-- Toastr -->
    <script src="<?= site_url('assets/admin/') ?>js/lib/toastr/toastr.min.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/lib/toastr/toastr.init.js"></script>

    <!--  Dashboard 1 -->
    <script src="<?= site_url('assets/admin/') ?>js/dashboard1.js"></script>
    <script src="<?= site_url('assets/admin/') ?>js/dashboard2.js"></script>
</body>

</html>