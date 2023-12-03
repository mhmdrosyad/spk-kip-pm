<?= view('templates/header', ['title' => 'Dashboard']) ?>

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
                        <option value="2|750.000">&lt;=750.000</option>
                        <option value="3|1.250.000">&lt;=1.250.000</option>
                        <option value="4|2.000.000">&lt;=2.000.000</option>
                        <option value="5|3.000.000">&gt;=3.000.000</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputTanggunganOrtu">Tanggungan Orang Tua</label>
                    <select class="form-control" id="inputTanggunganOrtu" name="tanggungan_ortu" required>
                        <option value="1|1 Orang">1 Orang</option>
                        <option value="2|2 Orang">&gt;=2 Orang</option>
                        <option value="3|3 Orang">&gt;=3 Orang</option>
                        <option value="4|5 Orang">&gt;=5 Orang</option>
                        <option value="5|7 Orang">&gt;=7 Orang</option>
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

<div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable">
        <thead class="thead-dark">
            <tr>
                <th class="border-right">No</th>
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
                    <td class="editable"><?= $data['nama'] ?></td>
                    <td class="editable"><?= $data['pemberkasan'] ?></td>
                    <td class="editable"><?= $data['prestasi'] ?></td>
                    <td class="editable"><?= $data['status'] ?></td>
                    <td class="editable"><?= $data['pk_ortu'] ?></td>
                    <td class="editable">
                        <= <?= $data['ph_ortu'] ?></td>
                    <td class="editable"> >= <?= $data['tg_ortu'] ?></td>
                    <td class="td-actions">
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

    </table>
    <form action="<?= base_url('home/processData') ?>" method="post">
        <button type="submit" class="btn btn-success mt-6">Proses</button>
    </form>

</div>

<!-- Content Row -->


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