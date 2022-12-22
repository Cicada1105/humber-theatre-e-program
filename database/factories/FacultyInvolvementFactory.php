<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Faculty;
use App\Models\Production;
use App\Models\FacultyRole;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacultyInvolvement>
 */
class FacultyInvolvementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'faculty_id' => Faculty::all()->random(),
            'production_id' => Production::all()->random(),
            'faculty_role_id' => FacultyRole::all()->random()
        ];
    }
}
