<?php

namespace Kanvas\Apps\Apps\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AppsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'key' => Str::random(10),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'url' => $this->faker->url(),
            'settings' => $this->faker->company(),
        ];
    }
}
