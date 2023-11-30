<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Home extends BaseController
{
    public function index()
    {
        // Load the SiswaModel
        $siswaModel = new SiswaModel();

        // Fetch all data from the SiswaModel
        $data['siswa'] = $siswaModel->findAll();
        foreach ($data['siswa'] as &$siswa) {
            foreach ($siswa as $key => $value) {
                // Menghilangkan angka sebelum karakter '|' pada setiap kata setelah '|'
                $siswa[$key] = preg_replace("/\b(\d+)\|/", "", $value);
            }
        }
        // foreach ($data['siswa'] as &$siswa) {
        //     foreach ($siswa as $key => $value) {
        //         // Jika key adalah "pemberkasan", menjumlahkan nilai di dalamnya
        //         if ($key === "pemberkasan") {
        //             $matches = [];
        //             preg_match_all("/(\d+)\|/", $value, $matches);
        //             $jumlah = array_sum($matches[1]);
        //             $siswa[$key] = $jumlah;
        //         } else {
        //             $siswa[$key] = strtok($value, "|");
        //         }
        //     }
        // }


        // Load the view with data
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
        $data = [
            'nama' => $this->request->getPost('nama'),
            'pemberkasan' => $pemberkasan,
            'prestasi' => $this->request->getPost('prestasi'),
            'status' => $this->request->getPost('status_anak'),
            'pk_ortu' => $this->request->getPost('pekerjaan_ortu'),
            'ph_ortu' => $this->request->getPost('penghasilan_ortu'),
            'tg_ortu' => $this->request->getPost('tanggungan_ortu'),
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

    public function updateData()
    {
        try {
            // Ambil data dari request
            $id = $this->request->getPost('id');
            $nama = $this->request->getPost('nama');
            $pemberkasan = $this->request->getPost('pemberkasan');
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
                'status_anak' => $status,
                'pk_ortu' => $pk_ortu,
                'ph_ortu' => $ph_ortu,
                'tg_ortu' => $tg_ortu,
                // Tambahkan field lainnya sesuai kebutuhan
            ];

            $model->update($id, $data);

            // Tampilkan pesan sukses atau error
            $response = ['status' => 'success', 'message' => 'Data berhasil disimpan.'];

            // Tambahkan informasi debug
            log_message('info', 'Update data berhasil: ' . json_encode($response));

            return $this->response->setJSON($response);
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

        // Print data for debugging
        echo '<pre>';
        print_r($siswaData);
        echo '</pre>';

        // Hitung Profile Matching
        $hasilPerhitungan = $this->hitungProfileMatching($siswaData);

        // Tampilkan hasil perhitungan (Anda dapat mengubah ini sesuai kebutuhan)
        echo 'Hasil Profile Matching:<br>';
        echo '<pre>';
        print_r($hasilPerhitungan);
        echo '</pre>';
    }

    private function hitungProfileMatching($siswaData)
    {
        // Bobot Core dan Secondary Factor
        $bobotCoreFactor = 0.6; // 60%
        $bobotSecondaryFactor = 0.4; // 40%

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

        // Data siswa referensi (misalnya, siswa pertama sebagai referensi)
        $siswaReferensi = $siswaData[0];

        // Nilai target
        $nilaiTarget = [
            'pemberkasan' => 5,
            'prestasi' => 4,
            'status' => 3,
            'pk_ortu' => 2,
            'ph_ortu' => 1,
            'tg_ortu' => 3,
        ];

        // Perulangan untuk setiap siswa
        foreach ($siswaData as $data) {
            // Menghitung jarak Euclidean untuk setiap kriteria
            $jumlahAtribut = 0;
            $jumlahAtributSecondary = 0;

            foreach ($siswaReferensi as $key => $value) {
                if ($key !== 'id' && $key !== 'nama') {
                    // Menggunakan bobot selisih sesuai dengan kriteria
                    $selisih = $data[$key] - $nilaiTarget[$key];

                    if ($key === 'tg_ortu') {
                        $jumlahAtributSecondary += abs($bobotSelisih[$selisih]);
                    } else {
                        // Memperbarui jumlah atribut core factor
                        $jumlahAtribut += abs($bobotSelisih[$selisih]);
                    }
                }
            }

            $nsf = $jumlahAtribut / 5;
            $nt = $jumlahAtributSecondary / 1;

            // Menentukan nilai Core Factor dan Secondary Factor
            $coreFactor = $nsf * $bobotCoreFactor;
            $secondaryFactor = $nt * $bobotSecondaryFactor;

            // Menyimpan skor per siswa
            $skorSiswa[] = [
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
}
