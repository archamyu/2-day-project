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

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

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
            <h1 class="h3 mb-4 text-gray-800">Persetujuan Penyewaan Kendaraan ( Admin )</h1>
            <hr class="sidebar-divider my-0">
            <div class="row p-3">
                <?php if (!empty($list)) {
                    foreach ($list as $l) : ?>
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
                                                    <a href="<?= base_url('admin/kirim/') . $l['id_riwayat'] ?>" class="btn btn-success mt-4">Kirim</a>
                                                    <a href="#" class="btn btn-danger mt-4">Tolak</a>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                } else { ?>
                    <div class="alert alert-info m-0 mt-3 w-100 text-center" role="alert">
                        Data belum ada data / Belum ada yang menyetujui pemesanan kendaraan
                    </div>
                <?php } ?>
            </div>
            <hr class="sidebar-divider my-4">
            <h1 class="h3 mb-4 text-gray-800">Pemesanan Angkutan Untuk Orang</h1>
            <hr class="sidebar-divider my-0">


            <div class="row p-3 justify-content-between">
                <div class="card shadow col-12 p-3">
                    <div class="card-header p-0 pb-4 pt-3" style="background: none;">
                        <h6 class=" d-inline font-weight-bold text-primary">Tabel Riwayat Pemesanan</h6>
                        <a href="#" class="btn btn-success d-inline ml-3">Export to Excel<i class="far fa-file-excel ml-2"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Riwayat</th>
                                        <th>ID Pemesan</th>
                                        <th>Nama Pemesan</th>
                                        <th>ID Driver</th>
                                        <th>Nama Driver</th>
                                        <th>ID Penyetuju</th>
                                        <th>Nama Penyetuju</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Tanggal Disetujui</th>
                                        <th>Tanggal Dikirim</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Riwayat</th>
                                        <th>ID Pemesan</th>
                                        <th>Nama Pemesan</th>
                                        <th>ID Driver</th>
                                        <th>Nama Driver</th>
                                        <th>ID Penyetuju</th>
                                        <th>Nama Penyetuju</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Tanggal Disetujui</th>
                                        <th>Tanggal Dikirim</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $a = 1;
                                    foreach ($laporan as $lap) : ?>
                                        <tr>
                                            <td><?= $a ?></td>
                                            <td><?= $lap['id_riwayat'] ?></td>
                                            <td><?= $lap['id_pemesan'] ?></td>
                                            <td><?= $lap['nama_pemesan'] ?></td>
                                            <td><?= $lap['id_driver'] ?></td>
                                            <td><?= $lap['nama_driver'] ?></td>
                                            <td><?= $lap['id_penyetuju'] ?></td>
                                            <td><?= $lap['nama_penyetuju'] ?></td>
                                            <td><?= $lap['jenis_kendaraan'] ?></td>
                                            <td><?= date('d-m-Y | H:i:s', $lap['tanggal_pemesanan']) ?></td>
                                            <td><?php if ($lap['tanggal_disetujui'] == 0) {
                                                    echo "Belum Disetujui";
                                                } else {
                                                    echo date('d-m-Y | H:i:s', $lap['tanggal_disetujui']);
                                                } ?>
                                            </td>
                                            <td><?php if ($lap['tanggal_dikirim'] == 0) {
                                                    echo "Belum Dikirim";
                                                } else {
                                                    echo date('d-m-Y | H:i:s', $lap['tanggal_dikirim']);
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php $a++;
                                    endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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