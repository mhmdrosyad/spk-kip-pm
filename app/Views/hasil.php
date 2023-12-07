<?= view('templates/header', ['title' => 'Hasil'])
?><h1 class="h3 mb-4 text-gray-800">Hasil Profile Matching</h1>
<div class="table-responsive">
    <label for="nomorUrut">Siswa Diterima:</label>
    <input type="number" id="nomorUrut" class="form-control mb-3" min="1" max="<?= count($hasilPerhitungan) ?>" placeholder="Masukkan Nomor">

    <!-- Tambahkan elemen berikut dalam formulir atau bagian yang sesuai -->
    <label for="filterPeriode">Filter Periode:</label>
    <select id="filterPeriode" class="form-control">
        <option value="">Pilih Periode</option>
        <!-- Tambahkan opsi periode sesuai dengan data yang ada -->
        <?php foreach ($periodeOptions as $periodeOption) : ?>
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
                    <tr data-periode="<?= $hasil['id_periode'] ?>">
                        <td><?= $index + 1 ?></td>
                        <td><?= $hasil['nama'] ?></td>
                        <td><?= $hasil['skor'] ?></td>
                        <td><?= $hasil['periode'] ?></td>
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
    <!-- Tambahkan ini di dalam bagian head HTML atau sesuaikan dengan kebutuhan Anda -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hanya tampilkan baris dengan periode 1 saat halaman dimuat
            $('tbody tr[data-periode!="1"]').hide();

            $('#filterPeriode').on('change', function() {
                var selectedPeriode = $(this).val();

                // Reset warna teks dan sembunyikan/barikan baris yang tidak sesuai dengan periode yang dipilih
                $('tbody td').css('color', '');
                if (selectedPeriode) {
                    $('tbody tr').hide();
                    $('tbody tr[data-periode="' + selectedPeriode + '"]').show();
                } else {
                    $('tbody tr').show();
                }
            });

            $('#nomorUrut').on('input', function() {
                var nomorUrut = $(this).val();

                // Clear only the "Diterima" or "Tidak Diterima" text when the input is empty
                if (nomorUrut === "") {
                    $('tbody tr td:nth-child(3)').each(function(index, element) {
                        var skor = parseFloat($(element).text());
                        if (!isNaN(skor)) {
                            $(element).text(skor);
                            $(element).css('color', ''); // Reset color
                        }
                    });
                    return;
                }

                nomorUrut = parseInt(nomorUrut);

                // Reset warna teks pada kolom nomor, nama, dan skor
                $('tbody td:nth-child(1), tbody td:nth-child(2), tbody td:nth-child(3)').css('color', '');

                if (!isNaN(nomorUrut) && nomorUrut > 0 && nomorUrut <= <?= count($hasilPerhitungan) ?>) {
                    $('tbody td').css('color', ''); // Reset warna teks di semua kolom

                    $('tbody tr:lt(' + nomorUrut + ') td:nth-child(1), tbody tr:eq(' + (nomorUrut - 1) + ') td:nth-child(1)').css('color', 'green');
                    $('tbody tr:gt(' + (nomorUrut - 1) + ') td:nth-child(1)').css('color', 'red');

                    $('tbody tr:lt(' + nomorUrut + ') td:nth-child(2), tbody tr:eq(' + (nomorUrut - 1) + ') td:nth-child(2)').css('color', 'green');
                    $('tbody tr:gt(' + (nomorUrut - 1) + ') td:nth-child(2)').css('color', 'red');

                    // Show the "Diterima" or "Tidak Diterima" text along with the score
                    $('tbody tr td:nth-child(3)').each(function(index, element) {
                        var skor = parseFloat($(element).text());
                        if (!isNaN(skor)) {
                            if (index < nomorUrut) {
                                $(element).text(skor + '| Diterima');
                                $(element).css('color', 'green');
                            } else {
                                $(element).text(skor + '| Tidak Diterima');
                                $(element).css('color', 'red');
                            }
                        }
                    });
                }
            });
        });
    </script>



    <?= view('templates/footer') ?>