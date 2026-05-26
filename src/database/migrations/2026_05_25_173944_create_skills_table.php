<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();

            // Diubah dari string('name') menjadi text('name') biar gak limit 255 karakter
            $table->text('name');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('skills');
    }
};
