<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Faculty;
use App\Models\Production;

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
            'involvement' => $this->faker->randomElement(['senior_dean','associate_dean','head_of_carpentry','theatre_director','head_of_properties','voice_professor','academic_program_manager','head_of_lighting','head_of_wardrobe','head_of_movement','head_of_sound','head_of_paint','technical_director','pso'])
        ];
    }
}
