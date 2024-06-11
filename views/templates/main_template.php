<?php
$title = 'Login';
$content = $content ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $title; ?> - SP Stunting</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/sb-admin-template/') ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="" style="background-color: #f5f5f5;">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= base_url() ?>">SP Deteksi Stunting</a>
        <!-- Sidebar Toggle-->

        <div class="d-flex justify-content-between align-items-center w-100 ms-4">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <span class="text-white"><?= $this->session->userdata('username') ?? 'default name'; ?></span>
        </div>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Acti
                            vity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                        <?php if ($this->session->userdata('role') === 'admin') : ?>
                            <a class="nav-link" href="<?= base_url() ?>dashboard   ">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="<?= base_url() ?>penyakit">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data Penyakit
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>gejala">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Gejala
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>terminator">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Terminator
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>diagnosa">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Data Diagnosa
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>antropometri">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Antropometri
                            </a>
                            <div class="sb-sidenav-menu-heading">Knowledge</div>
                            <a class="nav-link" href="<?= base_url() ?>rules">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Basis Pengetahuan
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>admin">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Admin
                            </a>
                        <?php else : ?>
                            <a class="nav-link" href="<?= base_url() ?>dashboard   ">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>diagnosa">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Diagnosa
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>antropometri">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Antropometri
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>rules">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Basis Pengetahuan
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <?php if ($content) : ?>
                <?php echo $content ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/sb-admin-template/') ?>js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/sb-admin-template/') ?>js/datatables-simple-demo.js"></script>
</body>

</html>