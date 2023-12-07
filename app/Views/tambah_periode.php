<?= view('templates/header', ['title' => 'Dashboard']) ?>

<head>
    <style>
        #dataTable th:nth-child(1),
        #dataTable td:nth-child(1) {
            width: 5%;
            /* Sesuaikan dengan lebar yang diinginkan */
        }

        /* Ulangi pola di atas untuk setiap kolom */
    </style>
</head>


<!-- Form for Adding Data -->
<div class="card mb-3">
    <div class="card-body">
        <h3 class="card-title mb-3">Tambah Periode</h3>
        <form action="<?= site_url('/tambah-periode') ?>" method="POST">
            <!-- Add your form input fields here -->

            <div class="form-group col-md-4">
                <label for="inputNama">Nama Periode</label>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputNama" name="nama_periode" required>
                    </div>
                    <div class="form-group ml-1">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
                <!-- Add more input fields for other data -->
            </div>
        </form>
    </div>
</div>

<table class="table table-bordered table-hover" id="dataTable">
    <thead class="thead-dark">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-2">Nama</th>
            <th class="col-md-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Assuming $siswa is an array of data fetched from the database
        foreach ($periodeOptions as $index => $data) {
        ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td class="editable"><?= $data['periode'] ?></td>


                <td class="td-actions d-flex justify-content-center">
                    <a href="<?= route_to('Home::edit', $data['id']) ?>" class="btn btn-dark btn-sm btn-edit" title="Edit">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="<?= route_to('Home::deletePeriode', $data['id']) ?>" class="btn btn-danger btn-sm" title="Hapus" data-method="get">
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

</div>

<!-- Content Row -->
<?= view('templates/footer') ?>