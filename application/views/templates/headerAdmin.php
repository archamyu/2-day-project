<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.js"></script>


</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background: #16191e;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-car fa-3x"></i>
                <div class="sidebar-brand-text mx-2">Pemesanan Kendaraan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php if ($user['level'] == 1) {
                                                echo base_url('admin');
                                            } else {
                                                echo base_url('pegawai');
                                            } ?>">
                    <span><?php if ($user['level'] == 1) { ?>
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                        <?php echo "Dashboard";
                            } else { ?>
                            <i class="fas fa-fw fa-home"></i>
                        <?php echo "Homepage";
                            } ?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php if ($user['level'] == 1) { ?>
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('admin/pemesanan') ?>">
                        <i class="fas fa-fw fa-address-book"></i>
                        <span class="collapse-item">Pemesanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= base_url('admin/laporan') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span class="collapse-item">Laporan Pemesanan</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
            <?php } else {
            } ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline mt-auto">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->