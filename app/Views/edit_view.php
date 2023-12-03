<?= view('templates/header', ['title' => 'Edit Data']) ?>

<!-- Form for Adding Data -->
<div class="card mb-3">
    <div class="card-body">
        <h3 class="card-title mb-3">Edit Data</h3>
        <form action="<?= base_url('/updateData') ?>" method="POST">
            <!-- Add your form input fields here -->
            <input name="id" type="hidden" value="<?= $siswa['id']; ?>">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="nama" required value="<?= $siswa['nama'] ?>">
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
                        <?php
                        $pekerjaanOptions = [
                            "1|Tidak Bekerja",
                            "2|Buruh",
                            "3|Pegawai",
                            "4|Wira Swasta",
                            "5|Lainnya"
                        ];

                        foreach ($pekerjaanOptions as $option) :
                            list($value, $text) = explode('|', $option);
                            $selected = ($siswa['pk_ortu'] === $option) ? 'selected' : '';
                        ?>
                            <option value="<?= $option ?>" <?= $selected ?>><?= $text ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputPenghasilanOrtu">Penghasilan Orang Tua</label>
                    <select class="form-control" id="inputPenghasilanOrtu" name="penghasilan_ortu" required>
                        <?php
                        $penghasilanOptions = [
                            "1|Tidak Bekerja",
                            "2|750.000",
                            "3|1.250.000",
                            "4|2.000.000",
                            "5|3.000.000"
                        ];

                        foreach ($penghasilanOptions as $option) :
                            list($value, $text) = explode('|', $option);
                            $selected = ($siswa['ph_ortu'] === $option) ? 'selected' : '';
                        ?>
                            <option value="<?= $option ?>" <?= $selected ?>>
                                <= <?= $text ?></option>
                                <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputTanggunganOrtu">Tanggungan Orang Tua</label>
                    <select class="form-control" id="inputTanggunganOrtu" name="tanggungan_ortu" required>
                        <?php
                        $penghasilanOptions = [
                            "1|1 Orang",
                            "2|2 Orang",
                            "3|3 Orang",
                            "4|5 Orang",
                            "5|7 Orang"
                        ];

                        foreach ($penghasilanOptions as $option) :
                            list($value, $text) = explode('|', $option);
                            $selected = ($siswa['tg_ortu'] === $option) ? 'selected' : '';
                        ?>
                            <option value="<?= $option ?>" <?= $selected ?>>
                                >= <?= $text ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputStatusAnak">Status Anak</label>
                    <select class="form-control" id="inputStatusAnak" name="status_anak" required>
                        <?php
                        $penghasilanOptions = [
                            "1|Anak Kandung",
                            "2|Anak Asuh",
                            "3|Anak Piatu",
                            "4|Anak Yatim",
                            "5|Anak Yatim Piatu"
                        ];

                        foreach ($penghasilanOptions as $option) :
                            list($value, $text) = explode('|', $option);
                            $selected = ($siswa['status'] === $option) ? 'selected' : '';
                        ?>
                            <option value="<?= $option ?>" <?= $selected ?>>
                                <?= $text ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputPrestasi">Prestasi</label>
                    <select class="form-control" id="inputPrestasi" name="prestasi" required>
                        <?php
                        $penghasilanOptions = [
                            "1|Tidak ada Prestasi",
                            "2|Tingkat Sekolah",
                            "3|Tingkat Kecamatan",
                            "4|Tingkat Kota",
                            "5|Tingkat Nasional"
                        ];

                        foreach ($penghasilanOptions as $option) :
                            list($value, $text) = explode('|', $option);
                            $selected = ($siswa['prestasi'] === $option) ? 'selected' : '';
                        ?>
                            <option value="<?= $option ?>" <?= $selected ?>>
                                <?= $text ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Add more input fields for other data -->
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>


<!-- Content Row -->
<script>
    $(document).ready(function() {
        // Inisialisasi Bootstrap Selectpicker
        $('.selectpicker').selectpicker();

        // Ambil nilai Pemberkasan dari data siswa dan konversi ke dalam bentuk array
        var selectedPemberkasanString = "<?= $siswa['pemberkasan'] ?>";
        var selectedPemberkasan = selectedPemberkasanString.split(',').map(function(item) {
            return item.trim();
        });

        // Set opsi yang dipilih pada dropdown 'inputPemberkasan'
        $('#inputPemberkasan').selectpicker('val', selectedPemberkasan);

        // Tangani perubahan pada dropdown 'inputPemberkasan'
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