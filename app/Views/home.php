<?= $this->extend('templates/publik') ?>
<?= $this->section('content') ?>
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active"
                style="background-image: url(<?= site_url('assets/publik/img/slide/slide1.jpg') ?>)">
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item"
                style="background-image: url(<?= site_url('assets/publik/img/slide/slide2.jpg') ?>)">
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item"
                style="background-image: url(<?= site_url('assets/publik/img/slide/slide3.jpg') ?>)">
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Sebelumnya</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Selanjutnya</span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>Tentang</h2>
                <p>AMIK Digital Printing</p>
            </div>

            <div class="row content">
                <div class="col-lg-6">
                    <p>
                        AMIK Printing adalah sebuah perusahaan digital printing online yang berdiri pada tahun 2020.
                        Meski baru berdiri, kami berupaya untuk memberikan solusi terbaik untuk kebutuhan printing
                        anda. Adalah menjadi keunggulan kami dengan memiliki fasilitas mesin produksi sendiri, kami
                        percaya mampu memberikan hasil cetakan berkualitas tinggi dengan harga yang terjangkau.
                    </p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        Bersamaan dengan berkembangnya zaman yang menuntut kecepatan, kemudahan, dan efisiensi kami
                        pun menawarkan pelayanan menggunakan website untuk menjadi solusi kebutuhan printing anda.
                        Bersama kami anda dapat mencetak kapan saja dan dari mana saja. Cetak Online Cepat, Murah &
                        Berkualitas - AMIK Printing
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Kontak</h2>
                <p>Kontak Kami</p>
            </div>

            <div class="row">

                <div class="col-lg">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Lokasi :</h4>
                            <p>Jl. Ir. Djuanda No. 120 Kec.Indramayu - Kab. Indramayu 45213</p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>digitalprinting@amik.com</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Telepon :</h4>
                            <p>0893 2031 2304</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?= $this->endSection() ?>