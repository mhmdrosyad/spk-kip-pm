<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables CSS dan JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .editable.active {
        background-color: #f8d7da;
        /* Ganti warna latar belakang sesuai keinginan Anda */
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class=""></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin KIP </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider 

            <!-- Divider -->
            <hr class=" sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Dashboard</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Dashboard:</h6>
                        <a class="collapse-item" href="buttons.html">Proses</a>
                        <a class="collapse-item" href="cards.html">Hasil</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->

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

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->
                <?php
                $session = session();
                if ($session->has('success')) {
                    echo '<div class="alert alert-success">' . $session->getFlashdata('success') . '</div>';
                }
                ?>

                <!-- Content Row -->
                <div class="container-fluid">
                    <!-- Form for Adding Data -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Tambah Data</h3>
                            <form action="<?= site_url('home/tambahdata') ?>" method="POST">
                                <!-- Add your form input fields here -->
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputNama">Nama</label>
                                        <input type="text" class="form-control" id="inputNama" name="nama" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPemberkasan">Pemberkasan</label>
                                        <select class="form-control selectpicker" id="inputPemberkasan" name="pemberkasan[]" multiple data-live-search="true">
                                            <option value="1">Kartu KIP</option>
                                            <option value="1">KKS</option>
                                            <option value="1">PKH</option>
                                            <option value="1">Surat Tidak Mampu</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPekerjaanOrtu">Pekerjaan Orang Tua</label>
                                        <select class="form-control" id="inputPekerjaanOrtu" name="pekerjaan_ortu" required>
                                            <option value="5">Tidak Bekerja</option>
                                            <option value="4">Buruh</option>
                                            <option value="3">Pegawai</option>
                                            <option value="2">Wira Swasta</option>
                                            <option value="1">Lainnya</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputPenghasilanOrtu">Penghasilan Orang Tua</label>
                                        <select class="form-control" id="inputPenghasilanOrtu" name="penghasilan_ortu" required>
                                            <option value="5">Tidak Bekerja</option>
                                            <option value="4">&lt;=750.000</option>
                                            <option value="3">&lt;=1.250.000</option>
                                            <option value="2">&lt;=2.000.000</option>
                                            <option value="1">&gt;=3.000.000</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputTanggunganOrtu">Tanggungan Orang Tua</label>
                                        <select class="form-control" id="inputTanggunganOrtu" name="tanggungan_ortu" required>
                                            <option value="5">&gt;=7 Orang</option>
                                            <option value="4">&gt;=5 Orang</option>
                                            <option value="3">&gt;=3 Orang</option>
                                            <option value="2">&gt;=2 Orang</option>
                                            <option value="1">1 Orang</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputStatusAnak">Status Anak</label>
                                        <select class="form-control" id="inputStatusAnak" name="status_anak" required>
                                            <option value="5">Anak Yatim Piatu</option>
                                            <option value="4">Anak Yatim</option>
                                            <option value="3">Anak Piatu</option>
                                            <option value="2">Anak Asuh</option>
                                            <option value="1">Anak Kandung</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputPrestasi">Prestasi</label>
                                        <select class="form-control" id="inputPrestasi" name="prestasi" required>
                                            <option value="5">Tingkat Nasional</option>
                                            <option value="4">Tingkat Kota</option>
                                            <option value="3">Tingkat Kecamatan</option>
                                            <option value="2">Tingkat Sekolah</option>
                                            <option value="1">Tidak ada Prestasi</option>
                                        </select>
                                    </div>

                                    <!-- Add more input fields for other data -->
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="border-right">No</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Pemberkasan</th>
                                    <th>Prestasi</th>
                                    <th>Status Anak</th>
                                    <th>Pekerjaan ORTU</th>
                                    <th>Penghasilan ORTU</th>
                                    <th>Tanggungan ORTU</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Assuming $siswa is an array of data fetched from the database
                                foreach ($siswa as $index => $data) {
                                ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $data['id'] ?></td>
                                        <td class="editable"><?= $data['nama'] ?></td>
                                        <td class="editable"><?= $data['pemberkasan'] ?></td>
                                        <td class="editable"><?= $data['prestasi'] ?></td>
                                        <td class="editable"><?= $data['status'] ?></td>
                                        <td class="editable"><?= $data['pk_ortu'] ?></td>
                                        <td class="editable"><?= $data['ph_ortu'] ?></td>
                                        <td class="editable"><?= $data['tg_ortu'] ?></td>
                                        <td class="td-actions">
                                            <a href="#" class="btn btn-dark btn-sm btn-edit" title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button class="btn btn-primary btn-sm btn-save" style="display:none;">Simpan</button>
                                            <a href="<?= route_to('Home::deleteData', $data['id']) ?>" class="btn btn-danger btn-sm" title="Hapus" data-method="get">
                                                <i class="material-icons">delete</i>
                                                <!-- Tambahkan tombol 'Simpan' (sembunyikan awalnya) -->
                                                <button id="btn-save" class="btn btn-primary btn-sm" style="display:none;">Simpan</button>
                                            </a>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                        <form action="<?= base_url('home/processData') ?>" method="post">
                            <button type="submit" class="btn btn-success mt-6">Proses</button>
                        </form>

                    </div>

                    <!-- Content Row -->

                </div>

            </div>
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
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- DataTables Script -->
        <!-- Modifikasi script JavaScript -->
        <script>
            $(document).ready(function() {
                $('#dataTables').DataTable({
                    "lengthMenu": [10, 25, 50, 75, 100], // Opsi tampilan jumlah data
                    "pageLength": 10, // Jumlah data per halaman
                    "searching": true, // Aktifkan fitur pencarian
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                // Inisialisasi Bootstrap Selectpicker
                $('.selectpicker').selectpicker();

                // Tangani perubahan pada dropdown 'pemberkasan'
                $('#inputPemberkasan').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
                    // Hitung totalPemberkasan berdasarkan jumlah opsi yang dipilih
                    var totalPemberkasan = $('#inputPemberkasan').val().length;

                    // Set totalPemberkasan value pada input hidden
                    $('#totalPemberkasan').val(totalPemberkasan);
                });

                // Trigger initial change event to set the initial value
                $('#inputPemberkasan').trigger('change');
            });
        </script>
        <script>
            $(document).ready(function() {
                // Meng-handle klik pada tombol Edit
                $('.btn-edit').on('click', function() {
                    // Menyembunyikan tombol Edit
                    $(this).hide();

                    // Menampilkan tombol Simpan pada baris yang diklik
                    var currentRow = $(this).closest('tr');
                    currentRow.find('.btn-save').show();

                    // Mengaktifkan kolom-kolom tabel untuk diedit
                    currentRow.find('.editable').prop('contenteditable', true).addClass('active');
                });

                // Meng-handle klik pada tombol Simpan
                $('.btn-save').on('click', function() {
                    // Menampilkan kembali tombol Edit pada baris yang diklik
                    var currentRow = $(this).closest('tr');
                    currentRow.find('.btn-edit').show();

                    // Menyembunyikan tombol Simpan pada baris yang diklik
                    $(this).hide();

                    // Menonaktifkan kolom-kolom tabel dari diedit pada baris yang diklik
                    currentRow.find('.editable').prop('contenteditable', false).removeClass('active');

                    // Mengambil data dari baris yang diedit
                    var id = currentRow.find('td[data-field="id"]').text();
                    var nama = currentRow.find('td[data-field="nama"]').text();
                    var pemberkasan = currentRow.find('td[data-field="pemberkasan"]').text();
                    var prestasi = currentRow.find('td[data-field="prestasi"]').text();
                    var status = currentRow.find('td[data-field="status"]').text();
                    var pk_ortu = currentRow.find('td[data-field="pk_ortu"]').text();
                    var ph_ortu = currentRow.find('td[data-field="ph_ortu"]').text();
                    var tg_ortu = currentRow.find('td[data-field="tg_ortu"]').text();

                    // Kirim data ke server menggunakan AJAX
                    $.ajax({
                        url: '<?= base_url('Home/updateData') ?>',
                        method: 'POST',
                        data: {
                            id: id,
                            nama: nama,
                            pemberkasan: pemberkasan,
                            prestasi: prestasi,
                            status: status,
                            pk_ortu: pk_ortu,
                            ph_ortu: ph_ortu,
                            tg_ortu: tg_ortu,
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Tampilkan pesan sukses atau error
                            alert(response.message);

                            // Jika penyimpanan ke basis data berhasil, perbarui tampilan
                            if (response.status === 'success') {
                                // Update isi sel-sel yang diedit dengan nilai baru
                                currentRow.find('td[data-field="nama"]').text(nama);
                                currentRow.find('td[data-field="pemberkasan"]').text(pemberkasan);
                                currentRow.find('td[data-field="prestasi"]').text(prestasi);
                                currentRow.find('td[data-field="status"]').text(status);
                                currentRow.find('td[data-field="pk_ortu"]').text(pk_ortu);
                                currentRow.find('td[data-field="ph_ortu"]').text(ph_ortu);
                                currentRow.find('td[data-field="tg_ortu"]').text(tg_ortu);

                                // Sembunyikan tombol Simpan dan tampilkan tombol Edit lagi
                                currentRow.find('.btn-save').hide();
                                currentRow.find('.btn-edit').show();
                            }
                        },
                        error: function() {
                            // Tampilkan pesan error jika terjadi kesalahan
                            alert('Terjadi kesalahan saat menyimpan data.');
                        }
                    });
                });
            });
        </script>

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- Bootstrap Selectpicker CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

        <!-- Bootstrap JS (popper.js required) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!-- Bootstrap Selectpicker JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


</body>

</html>