<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem Informasi Bimbingan Belajar</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('welcome_page/css/styles.css') ?>" rel="stylesheet" />
        <!-- <link href="css/styles.css" rel="stylesheet" /> -->
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="">SIBEL</a>
                <a class="btn btn-primary" href="<?= base_url('login/viewLogin') ?>">Login</a>
                <!-- <a class="btn btn-success" href="<?= base_url('login/register') ?>">Register</a> -->
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">Selamat Datang !</h1>
                            <h1 class="mb-5">Sistem Informasi Bimbingan Belajar (SIBEL) </h1>
                            <!-- Signup form-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center py-5">
        <div class="container">
            <div class="row">

                <!-- PAKET REGULER -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow-sm border-0 h-100 paket-card"
                        onclick="window.location.href='<?= base_url('paket/reguler'); ?>'">
                        <div class="card-body text-center">
                            <div class="features-icons-icon mb-3">
                                <i class="bi-window text-primary fs-1"></i>
                            </div>
                            <h5 class="fw-bold">PAKET REGULER</h5>
                            <p class="text-muted mt-2">
                                Tingkat SD/SMP/SMA mencakup materi persiapan ujian sekolah umum.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- PAKET PLUS -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow-sm border-0 h-100 paket-card"
                        onclick="window.location.href='<?= base_url('paket/plus'); ?>'">
                        <div class="card-body text-center">
                            <div class="features-icons-icon mb-3">
                                <i class="bi-layers text-success fs-1"></i>
                            </div>
                            <h5 class="fw-bold">PAKET PLUS</h5>
                            <p class="text-muted mt-2">
                                Tingkat SD/SMP/SMA mencakup materi umum + persiapan ujian khusus seperti Bahasa Inggris dan kurikulum intensif.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- BIMBEL ONLINE -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow-sm border-0 h-100 paket-card"
                        onclick="window.location.href='<?= base_url('paket/online'); ?>'">
                        <div class="card-body text-center">
                            <div class="features-icons-icon mb-3">
                                <i class="bi-terminal text-info fs-1"></i>
                            </div>
                            <h5 class="fw-bold">BIMBEL ONLINE</h5>
                            <p class="text-muted mt-2">
                                Belajar fleksibel secara daring melalui platform website & aplikasi modern.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

        <!-- Image Showcases-->

        <!-- Testimonials-->
       
        <!-- Foot8er-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2025. All Rights Reserved.</p>
                    </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('welcome_page/js/scripts.js') ?>"></script>
        <!-- <script src="welcome_page/js/scripts.js"></script> -->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
