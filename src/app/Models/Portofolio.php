<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    // Daftarkan nama kolom agar bisa diisi lewat Panel Admin (Filament)
    protected $fillable = [
        'title',
        'category',
        'description',
        'client',
        'year',
        'role',
        'link',
        'image'
    ];
}
