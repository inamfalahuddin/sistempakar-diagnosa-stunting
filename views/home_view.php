<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Pakar Diagnosa Stunting</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/') ?>template/landing_page/assets/img/MI1.png" rel="icon">
    <link href="<?= base_url() ?> assets/template/landing_page/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/template/landing_page/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/template/landing_page/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/template/landing_page/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/template/landing_page/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/template/landing_page/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/template/landing_page/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/template/landing_page/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/template/landing_page/assets/css/style.css" rel="stylesheet">

    <style>
        .gambar {
            width: 50px;
            height: auto;
            margin-right: 20px;
        }
    </style>
    <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jul 05 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <img src="<?= base_url() ?>assets/template/landing_page/assets/img/MI1.png" class="gambar">
            <h1 class="logo me-auto"><a href="<?= base_url('home'); ?>">diagnosa stunting</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#certainty">Certainty Factor</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('login') ?>">Login</a></li>
                    <li><a class="getstarted scrollto" href="<?= base_url('register') ?>">Register</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="height: 100vh;">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>Selamat Datang...!</h1>
                    <h2>Ayo Identifikasi Kesehatan Anakmu...</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="<?= base_url('auth') ?>" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <!-- <img src="<?= base_url() ?>assets/template/landing_page/assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
                    <img src="<?= base_url() ?>assets/template/landing_page/assets/img/MI.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Us</h2>
                </div>

                <!-- <div class="row content mb-4">
                    <h2>Apa Itu Sistem Pakar Diagnosa Stunting ....?</h2>
                </div> -->
                <div class="row content">
                    <div class="col-lg-12">
                        <h2 class="text-text-capitalize mb-4">Apa Itu Sistem Pakar Diagnosa Stunting ....?</h2>

                        <p style="text-align: justify;">
                            Aplikasi "Deteksi Stunting Balita berdasarkan Multiple Intelligence menggunakan Metode Certainty Factor" adalah sebuah sistem yang dikembangkan untuk membantu mengidentifikasi stunting pada balita berdasarkan teori Multiple Intelligence dengan memanfaatkan metode Certainty Factor (CF).
                        </p>

                        <p style="text-align: justify;">
                            Dalam konteks ini, metode Certainty Factor digunakan sebagai algoritma pemrosesan data untuk menganalisis informasi yang diberikan oleh pengguna aplikasi. Tujuan utama aplikasi ini adalah memberikan rekomendasi tentang status stunting pada balita berdasarkan teori Multiple Intelligence yang dikemukakan oleh Howard Gardner.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Belum Mempunyai Akun...?</h3>
                        <p> Registrasi Sekarang Juga Untuk Bisa MengAkses Website Sistem Pakar Diagnosa Stunting..!!</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="<?= base_url('auth/register') ?>">Registrasi</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Cta Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="certainty" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-5 align-items-stretch img" style='background-image: url("<?= base_url() ?>assets/template/landing_page/assets/img/MI1.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>Apa itu metode <strong>Certainty Factor</strong></h3>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li class="bg-light">
                                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Dalam konteks sistem pakar
                                        dan kecerdasan buatan <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p style="text-align: justify;">
                                            Certainty Factor, dalam konteks sistem pakar dan kecerdasan buatan, adalah
                                            metode yang digunakan untuk mengukur dan menggambarkan tingkat kepastian
                                            atau keyakinan dalam sebuah pernyataan atau diagnosis. Hal ini membantu
                                            dalam pengambilan keputusan berdasarkan pengetahuan dan informasi yang
                                            tersedia.
                                        </p>
                                    </div>
                                </li>

                                <li class="bg-light">
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Sejarah Certainty Factor <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p style="text-align: justify;">
                                            Certainty Factor diperkenalkan sebagai salah satu teknik dalam sistem pakar
                                            oleh Arthur L. Bier pada tahun 1975. Metode ini digunakan untuk
                                            menggambungkan pengetahuan ahli manusia dengan data dan informasi yang
                                            dihasilkan oleh sistem untuk menghasikan kesimpulan atau diagnosis yang
                                            akurat.
                                        </p>
                                    </div>
                                </li>

                                <li class="bg-light">
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Pendekatan Certainty Factor <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p style="text-align: justify;">
                                            Certainty Factor menghitung tingkat keyakinan berdasarkan dua faktor utama
                                            yaitu faktor penunjang (supporting factor), dan faktor penolakan (opposing
                                            factor). Faktor penunjang adalah informasi yang mendukung suatu pernyataan
                                            atau diagnosis, sedangkan faktor penolakan adalah informasi yang
                                            bertentangan dengan pernyataan
                                            atau diagnosis tersebut.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- End Why Us Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Sistem Pakar Diagnosa Stunting</h3>
                        <p>
                            Dea Sinta Nurhidayah <br>
                            Klaten<br>
                            Indonesia <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#certainty">Certainty Factor</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#bayes">Teorema Bayes</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('auth'); ?>">Login</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('auth/register'); ?>">Register</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> -->
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Sistem Pakar Diagnosa Stunting</span></strong>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>assets/template/landing_page/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url(); ?>assets/template/landing_page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/template/landing_page/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>assets/template/landing_page/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/template/landing_page/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/template/landing_page/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url(); ?>assets/template/landing_page/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/template/landing_page/assets/js/main.js"></script>

</body>

</html>