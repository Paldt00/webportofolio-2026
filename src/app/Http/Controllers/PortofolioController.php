<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;

class PortofolioController extends Controller
{
    public function index()
    {
        // 1. Ambil data asli yang lu input lewat Filament dari database
        $projects = Portofolio::all();

        // 2. JIKA DATABASE MASIH KOSONG, sistem otomatis pakai data dummy ini sebagai cadangan (Biar gak kosong melongpong)
        if ($projects->isEmpty()) {
            $projects = collect([
                (object)[
                    'title' => 'Sistem Informasi Absensi',
                    'category' => 'Web Application',
                    'description' => 'Aplikasi absensi berbasis web dengan fitur geolokasi dan scan QR Code untuk mendeteksi kehadiran karyawan secara realtime.',
                    'client' => 'PT Maju Mundur (Cadangan Database Kosong)',
                    'year' => '2025',
                    'role' => 'Fullstack Developer',
                    'link' => '#',
                    'image' => null
                ],
                (object)[
                    'title' => 'E-Commerce Portofolio',
                    'category' => 'E-Commerce Design',
                    'description' => 'Membangun platform toko online responsif dengan integrasi payment gateway dan manajemen inventaris otomatis.',
                    'client' => 'Internal Project',
                    'year' => '2026',
                    'role' => 'Backend Engineer',
                    'link' => '#',
                    'image' => null
                ]
            ]);
        }

        // 3. Lempar data (baik asli database atau cadangan dummy) ke view welcome
        return view('welcome', compact('projects'));
    }
}
