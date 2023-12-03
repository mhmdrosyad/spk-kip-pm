<?= view('templates/header', ['title' => 'Hasil']) ?>
<h1 class="h3 mb-4 text-gray-800">Hasil Profile Matching</h1>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
            <tr>
                <th class="border-right">No</th>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Skor</th>
                <th>Tanggal|Waktu</th>
                <th>Aksi</th> <!-- Tambahkan kolom aksi -->

            </tr>
        </thead>
        <tbody>
            <?php
            // Urutkan array hasilPerhitungan berdasarkan 'skor' secara descending
            usort($hasilPerhitungan, function ($a, $b) {
                return $b['skor'] <=> $a['skor'];
            });

            foreach ($hasilPerhitungan as $index => $hasil) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $hasil['id'] ?></td>
                    <td><?= $hasil['nama'] ?></td>
                    <td><?= $hasil['skor'] ?></td>
                    <td><?= $hasil['tgl'] ?></td>
                    <td class="text-center">
                        <a href="<?= route_to('Home::deleteHasil', $hasil['id']) ?>" class="btn btn-danger btn-sm btn-lg" title="Hapus" data-method="get" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>

<?= view('templates/footer') ?>