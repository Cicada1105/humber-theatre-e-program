<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

define("FACULTY",["Guillermo Acosta","Sylvia Sweeney","Tom Baranski","Tanya Greve","Nina Hartt","Fides Krucker","Richard Lee","Laird Macdonald","Barbara Martin","Sharon B. Moore","Emily Porter","David Rayfield","John Reid","Joe Bowden","Derek Aasland","Liza Balkan","Rick Banville","John Beale","Tyrone Benskin","Cameron Davis","Paul De Jong","Chris Earle","Colin Edwards","Nina Hartt","Jonathan Higgins","Heather Hill"]);
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
            'special_thanks' => $this->faker->paragraph(),
            'senior_dean' => $this->faker->randomElement(FACULTY),
            'associate_dean' => $this->faker->randomElement(FACULTY),
            'head_of_carpentry' => $this->faker->randomElement(FACULTY),
            'theatre_director' => $this->faker->randomElement(FACULTY),
            'head_of_properties' => $this->faker->randomElement(FACULTY),
            'voice_professor' => $this->faker->randomElement(FACULTY),
            'academic_program_manager' => $this->faker->randomElement(FACULTY),
            'head_of_lighting' => $this->faker->randomElement(FACULTY),
            'head_of_wardrobe' => $this->faker->randomElement(FACULTY),
            'head_of_movement' => $this->faker->randomElement(FACULTY),
            'head_of_sound' => $this->faker->randomElement(FACULTY),
            'head_of_paint' => $this->faker->randomElement(FACULTY),
            'technical_director' => $this->faker->randomElement(FACULTY),
            'pso' => $this->faker->randomElement(FACULTY)
        ];
    }
}
