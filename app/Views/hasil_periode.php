<?= view('templates/header', ['title' => 'Hasil'])
?>

<div class="bg-white">
    <h1 class="h3 mb-4 text-gray-800">Hasil Penerimaan Beasiswa Periode <?= $periodeOptions['periode'] ?></h1>

    <h2 class="h4 mb-4 text-gray-800">1. Data Awal</h2>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th class="border-right">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Pemberkasan</th>
                    <th>Prestasi</th>
                    <th>Status Anak</th>
                    <th>Pekerjaan Ortu</th>
                    <th>Penghasilan Ortu</th>
                    <th>Tanggungan Ortu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($dataSiswa as $index => $data) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['pemberkasan'] ?></td>
                        <td><?= $data['prestasi'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td><?= $data['pk_ortu'] ?></td>
                        <td><?= $data['ph_ortu'] ?></td>
                        <td><?= $data['tg_ortu'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <h2 class="h4 mb-4 text-gray-800">2. Skoring</h2>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th class="border-right">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Pemberkasan</th>
                    <th>Prestasi</th>
                    <th>Status Anak</th>
                    <th>Pekerjaan Ortu</th>
                    <th>Penghasilan Ortu</th>
                    <th>Tanggungan Ortu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($dataSiswaSkor as $index => $data) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['pemberkasan'] ?></td>
                        <td><?= $data['prestasi'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td><?= $data['pk_ortu'] ?></td>
                        <td><?= $data['ph_ortu'] ?></td>
                        <td><?= $data['tg_ortu'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <h2 class="h4 mb-4 text-gray-800">3. Perhitungan GAP</h2>
    <p>Nilai Target:</p>
    <ul>
        <li>Pemberkasan = 4</li>
        <li>Prestasi = 5</li>
        <li>Status = 5</li>
        <li>Pekerjaan Orang Tua = 1</li>
        <li>Penghasilan Orang Tua = 1</li>
        <li>Tanggungan Orang Tua = 5</li>
    </ul>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th class="border-right">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Pemberkasan</th>
                    <th>Prestasi</th>
                    <th>Status Anak</th>
                    <th>Pekerjaan Ortu</th>
                    <th>Penghasilan Ortu</th>
                    <th>Tanggungan Ortu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($hasilGAP as $index => $data) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['pemberkasan'] ?></td>
                        <td><?= $data['prestasi'] ?></td>
                        <td><?= $data['status'] ?></td>
                        <td><?= $data['pk_ortu'] ?></td>
                        <td><?= $data['ph_ortu'] ?></td>
                        <td><?= $data['tg_ortu'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <h2 class="h4 mb-4 text-gray-800">4. Pembobotan</h2>
    <p>Aturan</p>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="auto" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th>Selisih</th>
                    <th>Bobot Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0</td>
                    <td>5,0</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>4,5</td>
                </tr>
                <tr>
                    <td>-1</td>
                    <td>4,0</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>3,5</td>
                </tr>
                <tr>
                    <td>-2</td>
                    <td>3,0</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2,5</td>
                </tr>
                <tr>
                    <td>-3</td>
                    <td>2,0</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>1,5</td>
                </tr>
                <tr>
                    <td>-4</td>
                    <td>1,0</td>
                </tr>
            </tbody>

        </table>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="border-right">No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Pemberkasan</th>
                        <th>Prestasi</th>
                        <th>Status Anak</th>
                        <th>Pekerjaan Ortu</th>
                        <th>Penghasilan Ortu</th>
                        <th>Tanggungan Ortu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasilPembobotan as $index => $data) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['pemberkasan'] ?></td>
                            <td><?= $data['prestasi'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td><?= $data['pk_ortu'] ?></td>
                            <td><?= $data['ph_ortu'] ?></td>
                            <td><?= $data['tg_ortu'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <h2 class="h4 mb-4 text-gray-800">5. Hitung NCF dan NSF</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="border-right">No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nilai NCF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasilNCF as $index => $data) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['NCF'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <div class="mt-3 table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="border-right">No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nilai NSF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hasilNSF as $index => $data) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['NCF'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <h2 class="h4 mb-4 text-gray-800">6. Hitung Nilai Total</h2>
        <p>NCF(60%) + NSF(40%)</p>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="border-right">No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($nilaiTotal as $index => $data) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['skor'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <h2 class="h4 mb-4 text-gray-800">7. Hasil Perankingan dan Keputusan</h2>

        <!-- Tampilkan nilai hasilProfileMatching -->
        <p>Jumlah Diterima: <?= $jmlDiterima; ?></p>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="border-right">No</th>
                        <th>Nama Mahasiswa</th>
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
        <div class="mb-3">
            <a href="/hasil" class="btn btn-primary btn-sm">Lihat Histori</a>
        </div>
        <!-- Tambahkan ini di dalam bagian head HTML atau sesuaikan dengan kebutuhan Anda -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <?= view('templates/footer') ?>