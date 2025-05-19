<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layout/main', [
            'title' => 'Beranda',
            'content' => 'Selamat datang di Aplikasi Perpustakaan'
        ]);
    }
}
