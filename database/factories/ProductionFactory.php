<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Faculty;

//define("FACULTY",["Guillermo Acosta","Sylvia Sweeney","Tom Baranski","Tanya Greve","Nina Hartt","Fides Krucker","Richard Lee","Laird Macdonald","Barbara Martin","Sharon B. Moore","Emily Porter","David Rayfield","John Reid","Joe Bowden","Derek Aasland","Liza Balkan","Rick Banville","John Beale","Tyrone Benskin","Cameron Davis","Paul De Jong","Chris Earle","Colin Edwards","Nina Hartt","Jonathan Higgins","Heather Hill"]);
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Production>
 */
class ProductionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'authors' => $this->faker->name(),
            'directors' => $this->faker->name(),
            'choreographers' => $this->faker->name(),
            'is_active' => $this->faker->boolean(),
            'poster_img_src' => $this->faker->imageUrl(640, 480),
            'poster_img_caption' => $this->faker->sentence(),
            'blurb' => $this->faker->paragraph(),
            'land_acknowledgment' => $this->faker->paragraph(),
            'about_humber' => $this->faker->paragraph(),
            'special_thanks' => $this->faker->paragraph(),
            'senior_dean' => Faculty::all()->random(),
            'associate_dean' => Faculty::all()->random(),
            'head_of_carpentry' => Faculty::all()->random(),
            'theatre_director' => Faculty::all()->random(),
            'head_of_properties' => Faculty::all()->random(),
            'voice_professor' => Faculty::all()->random(),
            'academic_program_manager' => Faculty::all()->random(),
            'head_of_lighting' => Faculty::all()->random(),
            'head_of_wardrobe' => Faculty::all()->random(),
            'head_of_movement' => Faculty::all()->random(),
            'head_of_sound' => Faculty::all()->random(),
            'head_of_paint' => Faculty::all()->random(),
            'technical_director' => Faculty::all()->random(),
            'pso' => Faculty::all()->random()
        ];
    }
}
