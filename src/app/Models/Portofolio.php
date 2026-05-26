<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    // Tetap gunakan guarded = [] biar bisa input semua field
    protected $guarded = [];

    // Tambahkan ini biar Laravel otomatis ngerubah kolom 'year' jadi object Tanggal
    // Jadi lu gak perlu lagi nulis Carbon::parse() di view
    protected $casts = [
        'year' => 'date',
    ];
}
