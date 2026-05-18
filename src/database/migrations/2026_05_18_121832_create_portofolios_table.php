<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('portofolios', function (Blueprint $table) {
        $table->id();
        $table->string('title');            // Judul Project
        $table->string('category')->nullable(); // Kategori (Web Design, Fullstack, dll)
        $table->text('description');        // Deskripsi Project
        $table->string('client')->nullable();   // Nama Client / Internal
        $table->string('year')->nullable();     // Tahun Pembuatan
        $table->string('role')->nullable();     // Peran Lu (Frontend, Developer, dll)
        $table->string('link')->nullable();     // Link Demo Project
        $table->string('image')->nullable();    // Path Foto Project
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolios');
    }
};
