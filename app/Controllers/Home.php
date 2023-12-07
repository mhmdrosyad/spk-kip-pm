<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\HasilModel;
use App\Models\PeriodeModel;

class Home extends BaseController
{
    public function index()
    {
        // Load the SiswaModel
        $siswaModel = new SiswaModel();

        // Fetch all data from the SiswaModel with periode information
        $data['siswa'] = $siswaModel->getAllSiswaWithPeriode();

        // Load the PeriodeModel
        $periodeModel = new PeriodeModel();

        // Get all periode data
        $data['periodeOptions'] = $periodeModel->getAllPeriode();

        // Process the siswa data (remove numbers before '|')
        foreach ($data['siswa'] as &$siswa) {
            foreach ($siswa as $key => $value) {
                // Menghilangkan angka sebelum karakter '|' pada setiap kata setelah '|'
                $siswa[$key] = preg_replace("/\b(\d+)\|/", "", $value);
            }
        }



        return view('index', $data);
    }

    public function tambahdata()
    {
        // Dapatkan nilai dari form
        $pemberkasanValues = $this->request->getPost('pemberkasan');

        // Ubah array menjadi string (misalnya, dengan pemisah koma)
        $pemberkasan = !empty($pemberkasanValues) ? implode(', ', $pemberkasanValues) : '0|Tidak Ada';;
        // $totalPemberkasan = count($pemberkasanValues);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'pemberkasan' => $pemberkasan,
            'prestasi' => $this->request->getPost('prestasi'),
            'status' => $this->request->getPost('status_anak'),
            'pk_ortu' => $this->request->getPost('pekerjaan_ortu'),
            'ph_ortu' => $this->request->getPost('penghasilan_ortu'),
            'tg_ortu' => $this->request->getPost('tanggungan_ortu')
        ];

        // Insert the data into the database using the SiswaModel
        $siswaModel = new SiswaModel();
        $siswaModel->insert($data);
        // Set success flash message
        $session = session();
        $session->setFlashdata('success', 'Data berhasil ditambahkan.');
        // Redirect back to the index page
        return redirect()->to(base_url('/'));
    }

    public function deleteData($id)
    {
        // Panggil model untuk menghapus data berdasarkan ID
        $siswaModel = new SiswaModel();
        $siswaModel->delete($id);

        // Set success flash message
        $session = session();
        $session->setFlashdata('success', 'Data berhasil dihapus.');

        // Redirect kembali ke halaman index
        return redirect()->to(base_url('/'))->with('success', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->find($id);

        return view('edit_view', $data);
    }

    public function updateData()
    {
        try {
            // Ambil data dari request
            $pemberkasanValues = $this->request->getPost('pemberkasan');

            // Ubah array menjadi string (misalnya, dengan pemisah koma)
            $pemberkasan = implode(', ', $pemberkasanValues);

            $id = $this->request->getPost('id');
            $nama = $this->request->getPost('nama');
            $prestasi = $this->request->getPost('prestasi');
            $status = $this->request->getPost('status_anak');
            $pk_ortu = $this->request->getPost('pekerjaan_ortu');
            $ph_ortu = $this->request->getPost('penghasilan_ortu');
            $tg_ortu = $this->request->getPost('tanggungan_ortu');

            // Simpan data ke database
            $model = new SiswaModel();
            $data = [
                'nama' => $nama,
                'pemberkasan' => $pemberkasan,
                'prestasi' => $prestasi,
                'status' => $status,
                'pk_ortu' => $pk_ortu,
                'ph_ortu' => $ph_ortu,
                'tg_ortu' => $tg_ortu,
                // Tambahkan field lainnya sesuai kebutuhan
            ];

            $model->update($id, $data);

            return redirect()->to(base_url('/'))->with('success', 'Data berhasil diupdate.');
        } catch (\Exception $e) {
            // Tampilkan pesan error dan informasi debug
            $errorMessage = 'Terjadi kesalahan saat menyimpan data. Error: ' . $e->getMessage();
            log_message('error', $errorMessage);

            return $this->response->setJSON(['status' => 'error', 'message' => $errorMessage]);
        }
    }

    public function processData()
    {
        $id_periode = $this->request->getPost('id_periode');
        $jml_diterima = $this->request->getPost('jml_diterima');
        // Load the SiswaModel
        $siswaModel = new SiswaModel();
        $hasilModel = new HasilModel();

        // Fetch all data from the SiswaModel
        $siswaData = $siswaModel->findAll();

        foreach ($siswaData as &$siswa) {
            foreach ($siswa as $key => $value) {
                // Jika key adalah "pemberkasan", menjumlahkan nilai di dalamnya
                if ($key === "pemberkasan") {
                    $matches = [];
                    preg_match_all("/(\d+)\|/", $value, $matches);
                    $jumlah = array_sum($matches[1]);
                    $siswa[$key] = $jumlah;
                } else {
                    $siswa[$key] = strtok($value, "|");
                }
            }
        }

        // Lakukan perhitungan jika ada siswa yang belum ada di hasilData
        if (!empty($siswaData)) {
            $existingData = $hasilModel->where('id_periode', $id_periode)->findAll();

            // Jika ada, hapus semua data terkait dengan $id_periode
            if (!empty($existingData)) {
                foreach ($existingData as $data) {
                    $hasilModel->delete($data['id']);
                }
            }

            $hasilPerhitungan = $this->hitungProfileMatching($siswaData);

            usort($hasilPerhitungan, function ($a, $b) {
                return $b['skor'] <=> $a['skor'];
            });

            foreach ($hasilPerhitungan as $key => $hasil) {
                // Ambil id_periode dari siswa (sesuaikan dengan struktur data Anda)
                $dataHasil = [
                    'nama' => $hasil['nama'],
                    'skor' => $hasil['skor'],
                    'tgl'  => date('Y-m-d H:i:s'), // Tambahkan tanggal saat ini
                    'id_periode' => $id_periode,
                    'diterima' => $key < $jml_diterima ? 'YA' : 'TIDAK', // Tambahkan id_periode
                ];

                $hasilModel->insertHasil($dataHasil);
            }

            // Set flash data untuk notifikasi
            // Set flash data untuk notifikasi dengan link ke halaman hasil
            $session = session();
            $session->setFlashdata('success', 'Perhitungan berhasil dilakukan.');

            // Redirect kembali ke halaman index
            return redirect()->to(base_url('/hasil-by-periode/' . $id_periode));
        } else {
            return redirect()->to(base_url('/'));
        }
    }

    private function hitungProfileMatching($siswaData)
    {
        // Bobot Core dan Secondary Factor
        $bobotCoreFactor = 0.7; // 70%
        $bobotSecondaryFactor = 0.3; // 30%

        // Bobot untuk perbedaan nilai target
        $bobotSelisih = [
            0 => 5.0,
            1 => 4.5,
            -1 => 4.0,
            2 => 3.5,
            -2 => 3.0,
            3 => 2.5,
            -3 => 2.0,
            4 => 1.5,
            -4 => 1.0,
        ];

        // Array untuk menyimpan skor per siswa
        $skorSiswa = [];

        // Nilai target
        $nilaiTarget = [
            'pemberkasan' => 4,
            'prestasi' => 5,
            'status' => 5,
            'pk_ortu' => 1,
            'ph_ortu' => 1,
            'tg_ortu' => 5,
        ];

        // Perulangan untuk setiap siswa
        foreach ($siswaData as $data) {
            // Menghitung jarak Euclidean untuk setiap kriteria
            $jumlahAtribut = 0;
            $jumlahAtributSecondary = 0;

            foreach ($nilaiTarget as $key => $target) {
                if ($key !== 'id' && $key !== 'nama') {
                    // Menggunakan bobot selisih sesuai dengan kriteria
                    $selisih = $data[$key] - $target;

                    if ($key === 'tg_ortu' || $key === 'prestasi') {
                        $jumlahAtributSecondary += abs($bobotSelisih[$selisih]);
                    } else {
                        // Memperbarui jumlah atribut core factor
                        $jumlahAtribut += abs($bobotSelisih[$selisih]);
                    }
                }
            }

            $nsf = $jumlahAtribut / 4;
            $nt = $jumlahAtributSecondary / 2;

            // Menentukan nilai Core Factor dan Secondary Factor
            $coreFactor = $nsf * $bobotCoreFactor;
            $secondaryFactor = $nt * $bobotSecondaryFactor;

            // Menyimpan skor per siswa
            $skorSiswa[] = [
                'id' => $data['id'],
                'nama' => $data['nama'],
                'skor' => $coreFactor + $secondaryFactor,
            ];
        }

        // Urutkan skor siswa secara descending
        usort($skorSiswa, function ($a, $b) {
            return $b['skor'] <=> $a['skor'];
        });

        return $skorSiswa;
    }

    // HomeController.php
    public function hasil()
    {
        // Load the HasilModel
        $hasilModel = new HasilModel();

        // Fetch selected periode (if any)
        $selectedPeriode = $this->request->getPost('filterPeriode');

        // Fetch all hasil data from the database with optional periode filter
        $hasilPerhitungan = $hasilModel->getAllHasilWithPeriode($selectedPeriode);

        // Load the view and pass the hasil data
        if ($this->request->isAJAX()) {
            return view('_hasil_table', ['hasilPerhitungan' => $hasilPerhitungan]);
        } else {
            // Fetch all periode data from the database
            $periodeModel = new PeriodeModel();
            $periodeOptions = $periodeModel->getAllPeriode();

            // Load the view and pass the hasil data and periode options
            return view('hasil', ['hasilPerhitungan' => $hasilPerhitungan, 'periodeOptions' => $periodeOptions]);
        }
    }


    public function hasilByPeriode($id)
    {
        // Load the HasilModel
        $hasilModel = new HasilModel();

        // Load the PeriodeModel
        $periodeModel = new PeriodeModel();

        // Fetch selected periode (if any)
        $selectedPeriode = $id;

        // Fetch all hasil data from the database with optional periode filter
        $hasilPerhitungan = $hasilModel->getAllHasilWithPeriode($selectedPeriode);

        // Fetch all periode data from the database
        $periodeOptions = $periodeModel->find($selectedPeriode);

        // Load the view and pass the hasil data and periode options
        return view('hasil_periode', ['hasilPerhitungan' => $hasilPerhitungan, 'periodeOptions' => $periodeOptions]);
    }

    // HomeController.php
    public function fetchHasilByPeriode()
    {
        $hasilModel = new HasilModel();
        $selectedPeriode = $this->request->getPost('periode');

        $hasilPerhitungan = $hasilModel->getAllHasilWithPeriode($selectedPeriode);

        // Load a partial view with the fetched hasil data
        return view('hasil', ['hasilPerhitungan' => $hasilPerhitungan]);
    }


    public function deleteHasil()
    {
        $idPeriode = $this->request->getPost('id_periode');
        // Panggil model untuk menghapus data hasil berdasarkan ID
        $hasilModel = new HasilModel();
        $hasilModel->deleteHasilByPeriode($idPeriode);

        // Set success flash message
        $session = session();
        $session->setFlashdata('success', 'Data hasil berhasil dihapus.');

        // Redirect kembali ke halaman hasil
        return redirect()->to(base_url('/hasil'))->with('success', 'Data hasil berhasil dihapus.');
    }

    public function tambahPeriode()
    {
        $periodeModel = new PeriodeModel();
        $periodeOptions = $periodeModel->getAllPeriode();

        return view('tambah_periode', ['periodeOptions' => $periodeOptions]);
    }
    public function addPeriode()
    {
        $namaPeriode = $this->request->getPost('nama_periode');
        $periodeModel = new PeriodeModel();

        $data = [
            'periode' => $namaPeriode,
        ];

        $periodeModel->insert($data);
        $session = session();
        $session->setFlashdata('success', 'Data hasil berhasil ditambah.');

        // Redirect kembali ke halaman hasil
        return redirect()->to(base_url('/tambah-periode'))->with('success', 'Data hasil berhasil ditambah.');
    }

    public function deletePeriode($id)
    {
        $hasilModel = new HasilModel();
        $PeriodeModel = new PeriodeModel();

        $hasilModel->deleteHasilByPeriode($id);
        $PeriodeModel->delete($id);

        // Set success flash message
        $session = session();
        $session->setFlashdata('success', 'Data berhasil dihapus.');

        // Redirect kembali ke halaman index
        return redirect()->to(base_url('/tambah-periode'))->with('success', 'Data berhasil dihapus.');
    }

    public function deleteAll()
    {
        $siswaModel = new SiswaModel();
        $siswaModel->truncate();
        $session = session();
        $session->setFlashdata('success', 'Data berhasil dihapus.');

        // Redirect kembali ke halaman index
        return redirect()->to(base_url('/'))->with('success', 'Data berhasil dihapus.');
    }
}
