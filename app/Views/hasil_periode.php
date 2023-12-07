<?= view('templates/header', ['title' => 'Hasil'])
?>

<div class="bg-white">
    <h1 class="h3 mb-4 text-gray-800">Hasil Penerimaan Beasiswa Periode <?= $periodeOptions['periode'] ?></h1>
    <div class="table-responsive">
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
                    <?php
                    // Urutkan array hasilPerhitungan berdasarkan 'skor' secara descending
                    usort($hasilPerhitungan, function ($a, $b) {
                        return $b['skor'] <=> $a['skor'];
                    });

                    foreach ($hasilPerhitungan as $index => $hasil) : ?>
                        <tr data-periode="<?= $hasil['id_periode'] ?>">
                            <td><?= $index + 1 ?></td>
                            <td><?= $hasil['nama'] ?></td>
                            <td><?= $hasil['skor'] ?></td>
                            <td><?= $hasil['periode'] ?></td>
                            <td><?= $hasil['diterima'] ?></td>
                            <!-- <td class="text-center">
                            <a href="<?= route_to('Home::deleteHasil', $hasil['id']) ?>" class="btn btn-danger btn-sm btn-lg" title="Hapus" data-method="get" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <i class="material-icons">delete</i>
                            </a>
                        </td> -->

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
    <!-- Tambahkan ini di dalam bagian head HTML atau sesuaikan dengan kebutuhan Anda -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <?= view('templates/footer') ?>