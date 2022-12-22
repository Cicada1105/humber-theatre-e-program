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
            'is_active' => $this->faker->boolean(),
            'is_published' => $this->faker->boolean(),
            'title' => $this->faker->sentence(),
            'authors' => $this->faker->name(),
            'directors' => $this->faker->name(),
            'choreographers' => $this->faker->name(),
            'dates' => $this->faker->sentence(5),
            'poster_img_src' => $this->faker->imageUrl(640, 480),
            'poster_img_caption' => $this->faker->sentence(),
            'location' => $this->faker->word(2),
            'blurb' => $this->faker->paragraph(),
            'land_acknowledgment' => $this->faker->paragraph(),
            'about_humber' => $this->faker->paragraph(),
            'special_thanks' => $this->faker->paragraph()
        ];
    }
}
