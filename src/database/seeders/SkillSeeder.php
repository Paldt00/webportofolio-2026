<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void {
        $skills = ['PHP', 'Laravel', 'Tailwind CSS', 'MySQL', 'Filament', 'JavaScript'];
        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    }
}
