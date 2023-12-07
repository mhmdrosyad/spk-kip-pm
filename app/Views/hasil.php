<?= view('templates/header', ['title' => 'Hasil'])
?>
<div class="bg-white">
    <h1 class="h3 mb-4 text-gray-800">Hasil Penerimaan Beasiswa KIP</h1>
    <div class="table-responsive">
        <label for="filterPeriode">Filter Periode:</label>
        <select id="filterPeriode" class="form-control mb-3">
            <option value="" disabled selected>Pilih Periode</option>
            <!-- Tambahkan opsi periode sesuai dengan data yang ada -->
            <?php foreach (array_reverse($periodeOptions) as $periodeOption) : ?>
                <option value="<?= $periodeOption['id'] ?>"><?= $periodeOption['periode'] ?></option>
            <?php endforeach; ?>
        </select>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="border-right">No</th>
                        <th>Nama Siswa</th>
                        <th>Skor</th>
                        <th>Periode</th>
                        <th>Diterima</th> <!-- Tambahkan kolom aksi -->

                    </tr>
                </thead>
                <tbody>
                    <?php include('_hasil_table.php'); ?>
                </tbody>

            </table>
        </div>
    </div>
    <form action="<?= base_url('home/deletehasil') ?>" method="post">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputNamaPeriode">Periode</label>
                <div class="form-inline">
                    <select class="form-control" id="inputNamaPeriode" name="id_periode" required>
                        <!-- Loop through periode options and create dropdown options -->
                        <?php foreach (array_reverse($periodeOptions) as $periode) : ?>
                            <option value="<?= $periode['id']; ?>"><?= $periode['periode']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-danger mt-6">Hapus</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Tambahkan ini di dalam bagian head HTML atau sesuaikan dengan kebutuhan Anda -->
    <script>
        $(document).ready(function() {
            $('#filterPeriode').change(function() {
                var selectedPeriode = $(this).val();

                // Lakukan permintaan Ajax untuk mendapatkan hasilPerhitungan berdasarkan periode
                $.ajax({
                    url: '/hasil', // Ganti dengan URL yang benar
                    method: 'POST',
                    data: {
                        filterPeriode: selectedPeriode
                    },
                    success: function(response) {
                        // Perbarui tabel dengan hasilPerhitungan yang baru
                        $('#dataTable tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <?= view('templates/footer') ?>