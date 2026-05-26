<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::dropIfExists('profiles'); // Biar gak bentrok
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            // Data buat About Me
            $table->string('headline')->nullable();
            $table->text('about_me')->nullable();
            $table->string('profile_photo')->nullable();
            // Data buat Services & Testimoni (Sesuai kode lu)
            $table->text('what_i_do')->nullable();
            $table->text('testimoni_client')->nullable();
            $table->timestamps();
        });
    }
};
