<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <?= $this->session->flashdata('message'); ?>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-inline text-gray-600 small" style="font-size: 20px;"><?= $user['nama'] ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Persetujuan Penyewaan Kendaraan</h1>
            <hr class="sidebar-divider my-0">
            <div class="row p-3">
                <?php foreach ($list as $l) : ?>
                    <div class="col-4 mb-4">
                        <div class="card p-3">
                            <div class="card-body p-0">
                                <table class="table table-borderless m-0">
                                    <tbody>
                                        <tr>
                                            <td>Nama Penyewa</td>
                                            <td>:</td>
                                            <td><?= $l['nama_pemesan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Driver</td>
                                            <td>:</td>
                                            <td><?= $l['nama_driver'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kendaraan</td>
                                            <td>:</td>
                                            <td><?= $l['jenis_kendaraan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Menyewa</td>
                                            <td>:</td>
                                            <td><?= date('d-m-Y | H:i:s', $l['tanggal_pemesanan']) ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <a href="<?= base_url('pegawai/setuju/') . $l['id_pesanan'] ?>" class="btn btn-success mt-4">Setujui</a>
                                                <a href="#" class="btn btn-danger mt-4">Tolak</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Pemesanan Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>