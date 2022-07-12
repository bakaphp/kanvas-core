<?php

namespace Kanvas\Users\Users\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Kanvas\Users\Users\Models\Users;
use Kanvas\Roles\Models\Roles;
use Kanvas\SystemModules\Models\SystemModules;
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
        $systemModule = SystemModules::factory(1)->create();
        $role = Roles::factory(1)->create();
        return [
            "firstname" => $this->faker->firstName(),
            "lastname" => $this->faker->lastName(),
            "displayname" => $this->faker->word(),
            "email" => $this->faker->email(),
            "password" => Str::random(10),
            "default_company" => 1,
            "user_active" => 1,
            "roles_id" => $role->getKey(),
            "system_modules_id" => $systemModule->getKey(),
        ];
    }
}
