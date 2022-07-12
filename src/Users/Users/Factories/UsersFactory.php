<?php

namespace Kanvas\Users\Users\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Kanvas\Users\Users\Models\Users;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsersFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var Users
    */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "firstname" => $this->faker->firstName(),
            "lastname" => $this->faker->lastName(),
            "displayname" => $this->faker->word(),
            "email" => $this->faker->email(),
            "password" => Str::random(10),
            "default_company" => 1,
        ];
    }
}
