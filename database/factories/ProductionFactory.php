<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'author' => $this->faker->name(),
            'poster_img_src' => $this->faker->imageUrl(640, 480),
            'poster_img_caption' => $this->faker->sentence(),
            'blurb' => $this->faker->paragraph(),
            'special_thanks' => $this->faker->paragraph()
        ];
    }
}
