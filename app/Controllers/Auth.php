<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Tampilkan halaman login
        return view('login');
    }

    public function attemptLogin()
    {
        $UserModel = new UserModel();
        // Ambil data dari form registrasi
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $UserModel->findByUsername($username);
        if ($user && password_verify((string) $password, $user['password'])) {
            // Login berhasil, simpan informasi pengguna ke sesi
            session()->set('user', $user);
            // Alihkan ke halaman utama atau tindakan selanjutnya
            return redirect()->to(base_url('/'));
        } else {
            // Login gagal, kembali ke halaman login dengan pesan error
            return redirect()->to(base_url('/login'))->with('error', 'Login failed. Check your username and password.');
        }
    }

    public function register()
    {
        // Tampilkan halaman registrasi
        return view('register');
    }

    public function attemptRegister()
    {
        $UserModel = new UserModel();
        // Ambil data dari form registrasi
        $username = $this->request->getPost('username');
        $password = password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'password' => $password,
        ];

        $result = $UserModel->insert($data);

        if ($result) {
            // Registrasi berhasil, alihkan ke halaman login atau tindakan selanjutnya
            return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
        } else {
            // Registrasi gagal, kembali ke halaman registrasi dengan pesan error
            return redirect()->to('/register')->with('error', 'Registration failed. Please try again.');
        }
    }

    public function logout()
    {
        // Hapus informasi pengguna dari sesi
        session()->remove('user');

        // Alihkan ke halaman login atau halaman lain yang sesuai
        return redirect()->to(base_url('/login'))->with('success', 'Logout successful.');
    }
}
