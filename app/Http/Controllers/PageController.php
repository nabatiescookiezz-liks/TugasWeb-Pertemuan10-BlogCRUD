<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   public function home()
{
    $pageTitle = 'Beranda';
    $welcomeMessage = 'Halo! Selamat datang di website portofolio saya. Saya mahasiswa Ilmu Komputer yang sedang belajar pemrograman dan pengembangan web.';

    $features = [
        'Belajar Pemrograman',
        'Pengembangan Website',
        'Mempelajari Teknologi',
    ];

    return view('home', compact('pageTitle', 'welcomeMessage', 'features'));
}

    public function about()
    {
        $pageTitle = 'Tentang';

        $student = [
            'nama' => 'Ayshia Alika Az-zahra Pelis',
            'program_studi' => 'Ilmu Komputer',
            'universitas' => 'Universitas Negeri Medan',
            'angkatan' => 2025,
            'hobi' => 'merajut',
        ];

        return view('about', compact('pageTitle', 'student'));
    }

    public function contact()
    {
        $pageTitle = 'Kontak';

        $contact = [
            'email' => 'nabatiescookiezz@gmail.com',
            'lokasi' => 'Medan, Sumatera Utara',
        ];

        return view('contact', compact('pageTitle', 'contact'));
    }
}