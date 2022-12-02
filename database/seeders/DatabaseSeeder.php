<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Production;
use App\Models\FacultyInvolvement;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Faculty::truncate();
        Production::truncate();
        FacultyInvolvement::truncate();

        Faculty::factory()->count(10)->create();
        Production::factory()->count(2)->create();
        FacultyInvolvement::factory()->count(5)->create();
    }
}
