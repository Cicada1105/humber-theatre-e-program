<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Contributor;
use App\Models\Production;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contribution>
 */
class ContributionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contributor_id' => Contributor::all()->random(),
            'production_id' => Production::all()->random(),
            'category' => $this->faker->randomElement(['performance','guest_artist','production']),
            'role' => $this->faker->words(2, true)
        ];
    }
}
