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
            <h1 class="h3 mb-4 text-gray-800">Pemesanan Angkutan Untuk Orang</h1>
            <hr class="sidebar-divider my-0">

            <div class="row p-3 justify-content-between">
                <div class="col-md-4 col-12 pl-md-0">
                    <form class="p-4 shadow-lg rounded" style="background: white;" method="post" action="<?= base_url('admin/pemesanan') ?>">
                        <span class="text-primary font-weight-bold">Pesan</span>
                        <hr class="sidebar-divider my-3">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama Pemesan</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="nama" value="<?= $user['nama'] ?>" readonly>
                            <?= form_error('nama', '<div style="color: #FF1C1C; font-size: 13px; text-align: left;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nama Driver</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="nDriver" placeholder="Driver" autocomplete="off">
                            <?= form_error('nDriver', '<div style="color: #FF1C1C; font-size: 13px; text-align: left;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Nama Pihak Yang Menyetujui</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="nPenyetuju" placeholder="Penyetuju" autocomplete="off">
                            <?= form_error('nPenyetuju', '<div style="color: #FF1C1C; font-size: 13px; text-align: left;">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis Kendaraan</label>
                            <select class="custom-select" name="Jkendaraan">
                                <option value="Angkutan Barang">Angkutan Barang</option>
                                <option value="Angkutan Orang">Angkutan Orang</option>
                            </select>
                            <?= form_error('Jkendaraan', '<div style="color: #FF1C1C; font-size: 13px; text-align: left;">', '</div>'); ?>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="form-group mt-5">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card shadow col-md-8 col-12 p-3">
                    <div class="card-header p-0" style="background: none;">
                        <h6 class="mb-4 mt-1 font-weight-bold text-primary">Tabel Pemesanan ( Belum disetujui )</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Pemesan</th>
                                        <th>Nama Pemesan</th>
                                        <th>ID Driver</th>
                                        <th>Nama Driver</th>
                                        <th>ID Penyetuju</th>
                                        <th>Nama Penyetuju</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Tanggal Memesan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Pemesan</th>
                                        <th>Nama Pemesan</th>
                                        <th>ID Driver</th>
                                        <th>Nama Driver</th>
                                        <th>ID Penyetuju</th>
                                        <th>Nama Penyetuju</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Tanggal Memesan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $a = 1;
                                    foreach ($pesanan as $pesan) : ?>
                                        <tr>
                                            <td><?= $a ?></td>
                                            <td><?= $pesan['id_pemesan'] ?></td>
                                            <td><?= $pesan['nama_pemesan'] ?></td>
                                            <td><?= $pesan['id_driver'] ?></td>
                                            <td><?= $pesan['nama_driver'] ?></td>
                                            <td><?= $pesan['id_penyetuju'] ?></td>
                                            <td><?= $pesan['nama_penyetuju'] ?></td>
                                            <td><?= $pesan['jenis_kendaraan'] ?></td>
                                            <td><?= date('d-m-Y | H:i:s', $pesan['tanggal_pemesanan']) ?></td>
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