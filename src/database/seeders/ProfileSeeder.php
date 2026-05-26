<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Profile::create([
        'headline' => 'Building Digital Solutions.',
        'about_me' => 'Hello, I am Rifalsya...',
    ]);
}
}
