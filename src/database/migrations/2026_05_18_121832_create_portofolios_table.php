<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pake dropIfExists biar aman pas migrate:fresh
        Schema::dropIfExists('portofolios');

        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            // Data lama lu (tidak dikurangi)
            $table->string('image');
            $table->string('title');
            $table->string('category');
            $table->string('client')->nullable(); // Client lama
            $table->string('role');
            $table->text('description');

            // Data baru yang lu minta
            $table->date('year')->nullable(); // Diubah ke date biar bisa jadi kalender
            $table->string('client_name')->nullable(); // Tambahan untuk Nama Client

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portofolios');
    }
};
