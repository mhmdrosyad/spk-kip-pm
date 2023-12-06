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
        $pemberkasan = implode(', ', $pemberkasanValues);
        $totalPemberkasan = count($pemberkasanValues);

        // Setelah itu, masukkan ke dalam array data yang akan disimpan
        $id_periode = $this->request->getPost('id_periode');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'pemberkasan' => $pemberkasan,
            'prestasi' => $this->request->getPost('prestasi'),
            'status' => $this->request->getPost('status_anak'),
            'pk_ortu' => $this->request->getPost('pekerjaan_ortu'),
            'ph_ortu' => $this->request->getPost('penghasilan_ortu'),
            'tg_ortu' => $this->request->getPost('tanggungan_ortu'),
            'id_periode' => ($id_periode !== null) ? $id_periode : 0,
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
        // Load the SiswaModel
        $siswaModel = new SiswaModel();
        $hasilModel = new HasilModel();

        // Fetch all data from the SiswaModel
        $siswaData = $siswaModel->findAll();
        $hasilData = $hasilModel->findAll();

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


        // Ambil kolom 'id' dari hasilData
        $hasilDataIds = array_column($hasilData, 'id');

        // Temukan siswa yang id-nya tidak ada di hasilData
        $siswaDataFiltered = array_filter($siswaData, function ($siswa) use ($hasilDataIds) {
            return !in_array($siswa['id'], $hasilDataIds);
        });


        // Lakukan perhitungan jika ada siswa yang belum ada di hasilData
        if (!empty($siswaDataFiltered)) {
            $hasilPerhitungan = $this->hitungProfileMatching($siswaDataFiltered);

            foreach ($hasilPerhitungan as $hasil) {
                // Ambil id_periode dari siswa (sesuaikan dengan struktur data Anda)
                $idPeriode = $hasil['id_periode'];

                $dataHasil = [
                    'id' => $hasil['id'],
                    'nama' => $hasil['nama'],
                    'skor' => $hasil['skor'],
                    'tgl'  => date('Y-m-d H:i:s'), // Tambahkan tanggal saat ini
                    'id_periode' => $idPeriode, // Tambahkan id_periode
                ];

                $hasilModel->insertHasil($dataHasil);
            }

            // Set flash data untuk notifikasi
            // Set flash data untuk notifikasi dengan link ke halaman hasil
            $session = session();
            $session->setFlashdata('success', 'Perhitungan berhasil dilakukan. <a href="' . base_url('/hasil') . '">Lihat hasil</a>');

            // Redirect kembali ke halaman index
            return redirect()->to(base_url('/'));
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
                'id_periode' => $data['id_periode'],
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

        // Load the PeriodeModel
        $periodeModel = new PeriodeModel();

        // Fetch selected periode (if any)
        $selectedPeriode = $this->request->getPost('filterPeriode');

        // Fetch all hasil data from the database with optional periode filter
        $hasilPerhitungan = $hasilModel->getAllHasilWithPeriode($selectedPeriode);

        // Fetch all periode data from the database
        $periodeOptions = $periodeModel->getAllPeriode();

        // Load the view and pass the hasil data and periode options
        return view('hasil', ['hasilPerhitungan' => $hasilPerhitungan, 'periodeOptions' => $periodeOptions]);
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


    public function deleteHasil($id)
    {
        // Panggil model untuk menghapus data hasil berdasarkan ID
        $hasilModel = new HasilModel();
        $hasilModel->deleteHasil($id);

        // Set success flash message
        $session = session();
        $session->setFlashdata('success', 'Data hasil berhasil dihapus.');

        // Redirect kembali ke halaman hasil
        return redirect()->to(base_url('/hasil'))->with('success', 'Data hasil berhasil dihapus.');
    }

    public function login()
    {
        return view('login');
    }
    public function proseslogin()
    {
        return view('index');
    }
    public function logout()
    {
        // Lakukan aksi logout disini
        // ...

        // Kemudian kembalikan view login
        return view('login');
    }
}
