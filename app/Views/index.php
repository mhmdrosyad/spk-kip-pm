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
                        <option value="1|Kartu KIP">Kartu KIP</option>
                        <option value="1|KKS">KKS</option>
                        <option value="1|PKH">PKH</option>
                        <option value="1|Surat Tidak Mampu">Surat Tidak Mampu</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPekerjaanOrtu">Pekerjaan Orang Tua</label>
                    <select class="form-control" id="inputPekerjaanOrtu" name="pekerjaan_ortu" required>
                        <option value="1|Tidak Bekerja">Tidak Bekerja</option>
                        <option value="2|Buruh">Buruh</option>
                        <option value="3|Pegawai">Pegawai</option>
                        <option value="4|Wira Swasta">Wira Swasta</option>
                        <option value="5|Lainya">Lainnya</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputPenghasilanOrtu">Penghasilan Orang Tua</label>
                    <select class="form-control" id="inputPenghasilanOrtu" name="penghasilan_ortu" required>
                        <option value="1|Tidak Bekerja">Tidak Bekerja</option>
                        <option value="2|750.000">&le;750.000</option>
                        <option value="3|1.250.000">&le;1.250.000</option>
                        <option value="4|2.000.000">&le;2.000.000</option>
                        <option value="5|3.000.000">&ge;3.000.000</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputTanggunganOrtu">Tanggungan Orang Tua</label>
                    <select class="form-control" id="inputTanggunganOrtu" name="tanggungan_ortu" required>
                        <option value="1|1 Orang">1 Orang</option>
                        <option value="2|2 Orang">&ge;2 Orang</option>
                        <option value="3|3 Orang">&ge;3 Orang</option>
                        <option value="4|5 Orang">&ge;5 Orang</option>
                        <option value="5|7 Orang">&ge;7 Orang</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputStatusAnak">Status Anak</label>
                    <select class="form-control" id="inputStatusAnak" name="status_anak" required>
                        <option value="1|Anak Kandung">Anak Kandung</option>
                        <option value="2|Anak Asuh">Anak Asuh</option>
                        <option value="3|Anak Piatu">Anak Piatu</option>
                        <option value="4|Anak Yatim">Anak Yatim</option>
                        <option value="5|Anak Yatim Piatu">Anak Yatim Piatu</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputPrestasi">Prestasi</label>
                    <select class="form-control" id="inputPrestasi" name="prestasi" required>
                        <option value="1|Tidak ada Prestasi">Tidak ada Prestasi</option>
                        <option value="2|Tingkat Sekolah">Tingkat Sekolah</option>
                        <option value="3|Tingkat Kecamatan">Tingkat Kecamatan</option>
                        <option value="4|Tingkat Kota">Tingkat Kota</option>
                        <option value="5|Tingkat Nasional">Tingkat Nasional</option>
                    </select>
                </div>





                <!-- Add more input fields for other data -->
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

<table class="table table-bordered table-hover" id="dataTable">
    <thead class="thead-dark">
        <tr>
            <th class="col-md-1">No</th>
            <th class="col-md-2">Nama</th>
            <th class="col-md-2">Pemberkasan</th>
            <th class="col-md-2">Prestasi</th>
            <th class="col-md-2">Status Anak</th>
            <th class="col-md-2">Pekerjaan ORTU</th>
            <th class="col-md-2">Penghasilan ORTU</th>
            <th class="col-md-2">Tanggungan ORTU</th>
            <th class="col-md-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Assuming $siswa is an array of data fetched from the database
        foreach ($siswa as $index => $data) {
        ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td class="editable"><?= $data['nama'] ?></td>
                <td class="editable"><?= $data['pemberkasan'] ?></td>
                <td class="editable"><?= $data['prestasi'] ?></td>
                <td class="editable"><?= $data['status'] ?></td>
                <td class="editable"><?= $data['pk_ortu'] ?></td>
                <td class="editable">
                    <?php if ($data['ph_ortu'] !== 'Tidak Bekerja') : ?>
                        &le;
                    <?php endif; ?>
                    <?= $data['ph_ortu'] ?>
                <td class="editable"> &ge; <?= $data['tg_ortu'] ?></td>


                <td class="td-actions d-flex justify-content-center">
                    <a href="<?= route_to('Home::edit', $data['id']) ?>" class="btn btn-dark btn-sm btn-edit" title="Edit">
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
    <div class="mb-3 text-right">
        <a href="/delete-all" id="btn-delete-selected" class="btn btn-danger btn-sm">Hapus Semua Data</a>
    </div>



</table>
<form class="pb-3" action="<?= base_url('home/processData') ?>" method="post">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputNamaPeriode">Periode</label>
            <select class="form-control" id="inputNamaPeriode" name="id_periode" required>
                <!-- Loop through periode options and create dropdown options -->
                <?php foreach (array_reverse($periodeOptions) as $periode) : ?>
                    <option value="<?= $periode['id']; ?>"><?= $periode['periode']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputNama">Jumlah Mahasiswa diterima</label>
            <div class="form-inline">
                <input type="number" class="form-control" id="jmlDiterima" name="jml_diterima" required>
                <button type="submit" class="ml-2 btn btn-success">Proses</button>
            </div>
        </div>

    </div>
</form>


</div>

<!-- Content Row -->
<script>
    function deleteSelected() {
        var selectedPeriode = document.getElementById("filterPeriode").value;

        if (selectedPeriode !== "") {
            // Send an AJAX request to delete data
            fetch("/home/deleteByPeriode", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest", // Add this header for CodeIgniter to recognize AJAX requests
                    },
                    body: JSON.stringify({
                        periode: selectedPeriode
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        alert("Data deleted successfully");
                        location.reload();
                    } else {
                        alert("Failed to delete data: " + data.message);
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred");
                });
        } else {
            alert("Please select a period");
        }
    }
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
<?= view('templates/footer') ?>