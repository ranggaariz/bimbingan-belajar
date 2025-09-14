<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Bimbingan Belajar (SIBEL)</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.min.css'); ?>">

    <!-- <style>
        body {
            background-image: url('<?= base_url("Bimbingan-belajar\assets\img"); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style> -->
</head>

<body>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 mt-5">
                    <h2 class="text-center">Sistem Informasi Bimbingan Belajar (SIBEL) </h2>

                    <!-- Flash Message -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('message'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('password')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('password'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <img src="<?= base_url('asset/dist/img/book.jpg') ?>" alt="GenBI" width="80%" class="brand-image" style="opacity: .8"><br>
                                <!-- <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Login</h4> -->
                                <p class="text-muted mb-4">Silahkan masukkan Username dan Password Anda di bawah!</p>
                            </div>

                            <form action="<?= base_url('login/aksi_login'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required placeholder="Masukkan username Anda">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required placeholder="Masukkan password Anda">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Log In</button>
                                    <a href="<?= base_url('login/register');?>" class="btn btn-success">Daftar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
</body>

</html>
