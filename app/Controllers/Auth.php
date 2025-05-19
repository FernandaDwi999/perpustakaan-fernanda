<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function createManualAccount()
    {
        // Nama dan password yang di-hardcode langsung
        $username = 'fernanda';  // Username yang diinginkan
        $password = 'fernanda123';  // Password yang diinginkan

        // Hash password untuk keamanan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan akun di sesi (simulasi tanpa database)
        session()->set('user', [
            'username' => $username,
            'password' => $hashedPassword,
        ]);

        // Beri pesan sukses
        session()->setFlashdata('success', 'Akun berhasil dibuat secara manual. Silakan login.');

        // Redirect ke halaman login
        return redirect()->to('/auth/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Ambil data user dari sesi
        $user = session()->get('user');

        if ($user && $user['username'] === $username && password_verify($password, $user['password'])) {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $user['username'],
            ]);
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Username atau password salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
